<?php

/**
 * Options page
 */

function hookturn_acftcp_license_menu() {
	add_options_page( 'Theme Code Pro License', 'Theme Code Pro', 'manage_options', HOOKTURN_ACFTCP_LICENSE_PAGE, 'hookturn_acftcp_license_page' );
}
add_action('admin_menu', 'hookturn_acftcp_license_menu');

function hookturn_acftcp_license_page() {
	$license = get_option( 'hookturn_acftcp_license_key' );
	$status  = get_option( 'hookturn_acftcp_license_status' );
	?>
	<div class="wrap acf-settings-wrap acftcp-license-page__wrap">
		<h2><?php _e('ACF Theme Code Pro'); ?></h2>

		<div class="acf-box">
			
			<div class="title">
				<h3>License Information</h3>
			</div>

			<div class="inner">

				<p>To unlock updates please enter your license key, save it and then activate it.</p>

				<form method="post" action="options.php">

					<?php settings_fields('hookturn_acftcp_license'); ?>

					<table class="form-table">
						<tbody>
							<tr>
								<th>
									<label class="acftcp-license-page__label" for="hookturn_acftcp_license_key"><?php _e('License Key'); ?></label>
								</th>
								<td>
									<input id="hookturn_acftcp_license_key" name="hookturn_acftcp_license_key" type="password" class="regular-text acftcp-license-page__key" value="<?php esc_attr_e( $license ); ?>" />
									<?php if ( $license == '' ) : ?>
										<p class="description"><?php _e('Enter your license key.'); ?></p>
									<?php endif; ?>
									<?php submit_button( __('Save License Key'), 'button button-primary' ); ?>
								</td>
							</tr>
							<?php if ( '' != $license ) : ?>
								<tr>
									<th>
										<span class="acftcp-license-page__label"><?php _e('License Status'); ?></span>
									</th>
									<td>
										<?php if ( $status !== false && $status == 'valid' ) : ?>
											<p class="acftcp-license-page__status acftcp-license-page__status--active" ><?php _e('Active'); ?></p>
											<?php wp_nonce_field( 'hookturn_acftcp_nonce', 'hookturn_acftcp_nonce' ); ?>
											<p class="submit">
												<input type="submit" class="button button-primary" name="edd_license_deactivate" value="<?php _e('Deactivate License'); ?>"/>
											</p>
										<?php else : ?>
											<?php wp_nonce_field( 'hookturn_acftcp_nonce', 'hookturn_acftcp_nonce' ); ?>
											<p class="acftcp-license-page__status acftcp-license-page__status--inactive" ><?php _e('Inactive'); ?></p>
											<p class="description"><?php _e('Activate license to enable plugin updates.'); ?></p>
											<p class="submit">
												<input type="submit" class="button button-primary" name="edd_license_activate" value="<?php _e('Activate License'); ?>"/>
											</p>
										<?php endif; ?>
									</td>
								</tr>
							<?php endif; ?>
						</tbody>
					</table>

				</form>
			
			</div>

		</div>

	</div>
	<?php
}

function hookturn_acftcp_register_option() {
	// creates our settings in the options table
	register_setting('hookturn_acftcp_license', 'hookturn_acftcp_license_key', 'hookturn_acftcp_sanitize_license' );
}
add_action('admin_init', 'hookturn_acftcp_register_option');

function hookturn_acftcp_sanitize_license( $new ) {
	$old = get_option( 'hookturn_acftcp_license_key' );
	if( $old && $old != $new ) {
		delete_option( 'hookturn_acftcp_license_status' ); // new license has been entered, so must reactivate
	}
	return $new;
}



/**
* License activation
*/

function hookturn_acftcp_activate_license() {

	// listen for our activate button to be clicked
	if( isset( $_POST['edd_license_activate'] ) ) {

		// run a quick security check
	 	if( ! check_admin_referer( 'hookturn_acftcp_nonce', 'hookturn_acftcp_nonce' ) )
			return; // get out if we didn't click the Activate button

		// retrieve the license from the database
		$license = trim( get_option( 'hookturn_acftcp_license_key' ) );


		// data to send in our API request
		$api_params = array(
			'edd_action' => 'activate_license',
			'license'    => $license,
			'item_name'  => urlencode( HOOKTURN_ITEM_NAME ), // the name of our product in EDD
			'url'        => home_url()
		);

		// Call the custom API.
		$response = wp_remote_post( HOOKTURN_STORE_URL, array( 'timeout' => 15, 'sslverify' => false, 'body' => $api_params ) );

		// make sure the response came back okay
		if ( is_wp_error( $response ) || 200 !== wp_remote_retrieve_response_code( $response ) ) {

			if ( is_wp_error( $response ) ) {
				$message = $response->get_error_message();
			} else {
				$message = __( 'An error occurred, please try again.' );
			}

		} else {

			$license_data = json_decode( wp_remote_retrieve_body( $response ) );

			if ( false === $license_data->success ) {

				switch( $license_data->error ) {

					case 'expired' :

						$message = sprintf(
							__( '<b>Your license key expired on %1$s</b>.<br/><br/>To continue receiving new features, security updates and support, log into your <a href="https://hookturn.io/account/">Hookturn account</a> and renew your license.' ),
								date_i18n( get_option( 'date_format' ), strtotime( $license_data->expires, current_time( 'timestamp' ) ) )
						);
						break;

					case 'disabled' :
					case 'revoked' :

						$message = __( 'Your license key has been disabled.' );
						break;

					case 'missing' :

						$message = __( '<b>Invalid license</b>.<br/><br/>Try entering your <em>License Key</em> again. Then hit the <em>Save License Key</em> button followed by the <em>Activate License</em> button. If the issue persists, log into your <a href="https://hookturn.io/account/">Hookturn account</a> and check the status of your license.' );
						break;

					case 'invalid' :
					case 'site_inactive' :

						$message = __( 'Your license is not active for this URL.' );
						break;

					case 'item_name_mismatch' :

						$message = sprintf( __( 'This appears to be an invalid license key for %s.' ), HOOKTURN_ITEM_NAME );
						break;

					case 'no_activations_left':

						$message = __( 'Your license key has reached its activation limit.' );
						break;

					default :

						$message = __( 'An error occurred, please try again.' );
						break;
				}

			}

		}

		// Check if anything passed on a message constituting a failure
		if ( ! empty( $message ) ) {

			$notice_type = 'error';

		} else {

			// $license_data->license will be either "valid" or "invalid"
			update_option( 'hookturn_acftcp_license_status', $license_data->license );

			$notice_type = 'success';
			$message = __( '<b>Licence key activated</b>.<br/><br/>Plugin updates are now enabled.' );

		}
		
		$base_url = admin_url( 'options-general.php?page=' . HOOKTURN_ACFTCP_LICENSE_PAGE );
		$redirect = add_query_arg( array( 'notice_type' => $notice_type, 'message' => urlencode( $message ) ), $base_url );

		wp_redirect( $redirect );
		exit();
	}
}
add_action('admin_init', 'hookturn_acftcp_activate_license');


/**
 * Deactivate a license key (and decrease the site count).
 **/

function hookturn_acftcp_deactivate_license() {

	// listen for our activate button to be clicked
	if( isset( $_POST['edd_license_deactivate'] ) ) {

		// run a quick security check
	 	if( ! check_admin_referer( 'hookturn_acftcp_nonce', 'hookturn_acftcp_nonce' ) )
			return; // get out if we didn't click the Deactivate button

		// retrieve the license from the database
		$license = trim( get_option( 'hookturn_acftcp_license_key' ) );


		// data to send in our API request
		$api_params = array(
			'edd_action' => 'deactivate_license',
			'license'    => $license,
			'item_name'  => urlencode( HOOKTURN_ITEM_NAME ), // the name of our product in EDD
			'url'        => home_url()
		);

		// Call the custom API.
		$response = wp_remote_post( HOOKTURN_STORE_URL, array( 'timeout' => 15, 'sslverify' => false, 'body' => $api_params ) );

		// make sure the response came back okay
		if ( is_wp_error( $response ) || 200 !== wp_remote_retrieve_response_code( $response ) ) {

			if ( is_wp_error( $response ) ) {
				$message = $response->get_error_message();
			} else {
				$message = __( 'An error occurred, please try again.' );
			}

			$notice_type = 'error';

		} else {

			// decode the license data
			$license_data = json_decode( wp_remote_retrieve_body( $response ) );

			// $license_data->license will be either "deactivated" or "failed"
			if( $license_data->license == 'deactivated' ) {
				delete_option( 'hookturn_acftcp_license_status' );
			}

			$notice_type = 'warning';
			$message = __( '<b>License key deactived</b>. Updates now disabled.' );

		}

		$base_url = admin_url( 'options-general.php?page=' . HOOKTURN_ACFTCP_LICENSE_PAGE );
		$redirect = add_query_arg( array( 'notice_type' => $notice_type, 'message' => urlencode( $message ) ), $base_url );

		wp_redirect( $redirect );
		exit();

	}
}
add_action('admin_init', 'hookturn_acftcp_deactivate_license');


/**
* Check if a license key is still valid.
* The updater does this for you, so this is only needed if you want to do something custom
**/

function hookturn_acftcp_check_license() {

	global $wp_version;

	$license = trim( get_option( 'hookturn_acftcp_license_key' ) );

	$api_params = array(
		'edd_action' => 'check_license',
		'license' => $license,
		'item_name' => urlencode( HOOKTURN_ITEM_NAME ),
		'url'       => home_url()
	);

	// Call the custom API.
	$response = wp_remote_post( HOOKTURN_STORE_URL, array( 'timeout' => 15, 'sslverify' => false, 'body' => $api_params ) );

	if ( is_wp_error( $response ) )
		return false;

	$license_data = json_decode( wp_remote_retrieve_body( $response ) );

	if( $license_data->license == 'valid' ) {
		echo 'valid'; exit;
		// this license is still valid
	} else {
		echo 'invalid'; exit;
		// this license is no longer valid
	}
}

/**
 * This is a means of catching errors from the activation method above and displaying it to the customer
 */
function hookturn_acftcp_admin_notices() {

	if ( ! isset( $_GET['settings-updated'] ) 
		 && isset( $_GET['notice_type'] ) 
		 && ! empty( $_GET['message'] ) 
	) {
	/*
	 * Added check for `settings-updated` in the $_GET global to stop 'Invalid License' and similar notices from appearing after the License Key is resaved.
	 */

		$message = stripslashes( urldecode( $_GET['message'] ) ); // striplashes() is needed to remove back slashes that are introduced before double quotes charafcters in hrefs
		$notice_class = $_GET['notice_type']; ?>

		<div class="notice notice-<?php echo esc_attr( $notice_class ); ?> is-dismissible">
			<p><?php echo $message; ?></p>
		</div>

	<?php
	}
}
add_action( 'admin_notices', 'hookturn_acftcp_admin_notices' );
