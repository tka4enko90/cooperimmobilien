<?php

namespace Propstack;


use WP_Background_Process;

class Insert_Posts_In_Background extends WP_Background_Process {
	protected $action = 'insert_post_in_background';

	protected function task( $item ) {
		global $wpdb;
		update_option( 'inert_post_status', 'running' );
		$existing_post = get_posts( [
			'post_type'   => 'objects',
			'meta_key'    => 'api_id',
			'meta_value'  => strval( $item->id ),
			'numberposts' => - 1
		] );

		$new_post_args = [
			'post_title'   => $item->name,
			'post_content' => $item->title,
			'post_author'  => 1,
			'post_type'    => 'objects',
			'post_status'  => 'publish'
		];

		if ( ! empty( $existing_post ) ) {
			$new_post_args['ID'] = $existing_post[0]->ID;
		}

		$post_id = wp_insert_post( $new_post_args );

		if ( $item->id ) {
			update_post_meta( $post_id, 'api_id', strval( $item->id ) );
		}

		Register_Fields::updateFields( $item, $post_id );

		return false;
	}

	protected function complete() {
		parent::complete();
		update_option( 'inert_post_status', 'complete' );
		update_option( 'insert_post_timestamp', time() );
	}
}