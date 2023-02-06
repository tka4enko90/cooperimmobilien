<?php

namespace Propstack;

class Register_Fields {
	public function __construct() {
		if ( function_exists( 'acf_add_local_field_group' ) ):

			acf_add_local_field_group( array(
				'key'                   => 'group_63da3151555f4',
				'title'                 => 'Object fields',
				'fields'                => array(
					array(
						'key'               => 'field_63da3152803b4',
						'label'             => 'Street',
						'name'              => 'street',
						'type'              => 'text',
						'instructions'      => '',
						'required'          => 0,
						'conditional_logic' => 0,
						'wrapper'           => array(
							'width' => '',
							'class' => '',
							'id'    => '',
						),
						'default_value'     => '',
						'maxlength'         => '',
						'placeholder'       => '',
						'prepend'           => '',
						'append'            => '',
					),
					array(
						'key'               => 'field_63da50ea803b5',
						'label'             => 'House number',
						'name'              => 'house_number',
						'type'              => 'text',
						'instructions'      => '',
						'required'          => 0,
						'conditional_logic' => 0,
						'wrapper'           => array(
							'width' => '',
							'class' => '',
							'id'    => '',
						),
						'default_value'     => '',
						'maxlength'         => '',
						'placeholder'       => '',
						'prepend'           => '',
						'append'            => '',
					),
					array(
						'key'               => 'field_63da50f6803b6',
						'label'             => 'District',
						'name'              => 'district',
						'type'              => 'text',
						'instructions'      => '',
						'required'          => 0,
						'conditional_logic' => 0,
						'wrapper'           => array(
							'width' => '',
							'class' => '',
							'id'    => '',
						),
						'default_value'     => '',
						'maxlength'         => '',
						'placeholder'       => '',
						'prepend'           => '',
						'append'            => '',
					),
					array(
						'key'               => 'field_63da5102803b7',
						'label'             => 'Region',
						'name'              => 'region',
						'type'              => 'text',
						'instructions'      => '',
						'required'          => 0,
						'conditional_logic' => 0,
						'wrapper'           => array(
							'width' => '',
							'class' => '',
							'id'    => '',
						),
						'default_value'     => '',
						'maxlength'         => '',
						'placeholder'       => '',
						'prepend'           => '',
						'append'            => '',
					),
					array(
						'key'               => 'field_63da510f803b8',
						'label'             => 'Zip code',
						'name'              => 'zip_code',
						'type'              => 'text',
						'instructions'      => '',
						'required'          => 0,
						'conditional_logic' => 0,
						'wrapper'           => array(
							'width' => '',
							'class' => '',
							'id'    => '',
						),
						'default_value'     => '',
						'maxlength'         => '',
						'placeholder'       => '',
						'prepend'           => '',
						'append'            => '',
					),
					array(
						'key'               => 'field_63da511a803b9',
						'label'             => 'City',
						'name'              => 'city',
						'type'              => 'text',
						'instructions'      => '',
						'required'          => 0,
						'conditional_logic' => 0,
						'wrapper'           => array(
							'width' => '',
							'class' => '',
							'id'    => '',
						),
						'default_value'     => '',
						'maxlength'         => '',
						'placeholder'       => '',
						'prepend'           => '',
						'append'            => '',
					),
					array(
						'key'               => 'field_63da5128803ba',
						'label'             => 'Address',
						'name'              => 'address',
						'type'              => 'text',
						'instructions'      => '',
						'required'          => 0,
						'conditional_logic' => 0,
						'wrapper'           => array(
							'width' => '',
							'class' => '',
							'id'    => '',
						),
						'default_value'     => '',
						'maxlength'         => '',
						'placeholder'       => '',
						'prepend'           => '',
						'append'            => '',
					),
					array(
						'key'               => 'field_63da5132803bb',
						'label'             => 'Short address',
						'name'              => 'short_address',
						'type'              => 'text',
						'instructions'      => '',
						'required'          => 0,
						'conditional_logic' => 0,
						'wrapper'           => array(
							'width' => '',
							'class' => '',
							'id'    => '',
						),
						'default_value'     => '',
						'maxlength'         => '',
						'placeholder'       => '',
						'prepend'           => '',
						'append'            => '',
					),
					array(
						'key'               => 'field_63da5157803bc',
						'label'             => 'Number of rooms',
						'name'              => 'number_of_rooms',
						'type'              => 'number',
						'instructions'      => '',
						'required'          => 0,
						'conditional_logic' => 0,
						'wrapper'           => array(
							'width' => '',
							'class' => '',
							'id'    => '',
						),
						'default_value'     => '',
						'min'               => '',
						'max'               => '',
						'placeholder'       => '',
						'step'              => '',
						'prepend'           => '',
						'append'            => '',
					),
					array(
						'key'               => 'field_63da5188803bd',
						'label'             => 'Price',
						'name'              => 'price',
						'type'              => 'text',
						'instructions'      => '',
						'required'          => 0,
						'conditional_logic' => 0,
						'wrapper'           => array(
							'width' => '',
							'class' => '',
							'id'    => '',
						),
						'default_value'     => '',
						'maxlength'         => '',
						'placeholder'       => '',
						'prepend'           => '',
						'append'            => '',
					),
					array(
						'key'               => 'field_63da5199803be',
						'label'             => 'Living space',
						'name'              => 'living_space',
						'type'              => 'text',
						'instructions'      => '',
						'required'          => 0,
						'conditional_logic' => 0,
						'wrapper'           => array(
							'width' => '',
							'class' => '',
							'id'    => '',
						),
						'default_value'     => '',
						'maxlength'         => '',
						'placeholder'       => '',
						'prepend'           => '',
						'append'            => '',
					),
					array(
						'key'               => 'field_63db6bf723058',
						'label'             => 'Gallery',
						'name'              => 'gallery',
						'type'              => 'gallery',
						'instructions'      => '',
						'required'          => 0,
						'conditional_logic' => 0,
						'wrapper'           => array(
							'width' => '',
							'class' => '',
							'id'    => '',
						),
						'return_format'     => 'array',
						'library'           => 'all',
						'min'               => '',
						'max'               => '',
						'min_width'         => '',
						'min_height'        => '',
						'min_size'          => '',
						'max_width'         => '',
						'max_height'        => '',
						'max_size'          => '',
						'mime_types'        => '',
						'insert'            => 'append',
						'preview_size'      => 'medium',
					),
				),
				'location'              => array(
					array(
						array(
							'param'    => 'post_type',
							'operator' => '==',
							'value'    => 'objects',
						),
					),
				),
				'menu_order'            => 0,
				'position'              => 'normal',
				'style'                 => 'default',
				'label_placement'       => 'top',
				'instruction_placement' => 'label',
				'hide_on_screen'        => '',
				'active'                => true,
				'description'           => '',
				'show_in_rest'          => 0,
			) );

		endif;
	}

	public static function updateFields( $new_post, $post_id ) {

//		if ( isset( $new_post->street ) ) {
//			update_field( 'street', $new_post->street, $post_id );
//		}
//
//		if ( isset( $new_post->house_number ) ) {
//			update_field( 'house_number', $new_post->house_number, $post_id );
//		}
//
//		if ( isset( $new_post->district ) ) {
//			update_field( 'district', $new_post->district, $post_id );
//		}
//
//		if ( isset( $new_post->region ) ) {
//			update_field( 'region', $new_post->region, $post_id );
//		}
//
//		if ( isset( $new_post->zip_code ) ) {
//			update_field( 'zip_code', $new_post->zip_code, $post_id );
//		}
//
//		if ( isset( $new_post->city ) ) {
//			update_field( 'city', $new_post->city, $post_id );
//		}
//
//		if ( isset( $new_post->address ) ) {
//			update_field( 'address', $new_post->address, $post_id );
//		}
//
//		if ( isset( $new_post->short_address ) ) {
//			update_field( 'short_address', $new_post->short_address, $post_id );
//		}
//
//		if ( isset( $new_post->number_of_rooms ) ) {
//			update_field( 'number_of_rooms', $new_post->number_of_rooms, $post_id );
//		}
//
//		if ( isset( $new_post->price ) ) {
//			update_field( 'price', $new_post->price, $post_id );
//		}
//
//		if ( isset( $new_post->living_space ) ) {
//			update_field( 'living_space', $new_post->living_space, $post_id );
//		}

		if ( isset( $new_post['images'] ) ) {
			global $wpdb;
			require_once ABSPATH . 'wp-admin/includes/media.php';
			require_once ABSPATH . 'wp-admin/includes/file.php';
			require_once ABSPATH . 'wp-admin/includes/image.php';


			$query       = $wpdb->prepare( "select meta_value from $wpdb->postmeta where meta_key = %s", '_source_url' );
			$sources     = $wpdb->get_col( $query );
			$attachments = [];

			foreach ( $new_post['images'] as $image ) {
				if ( ! in_array( $image, $sources ) ) {
					$attachment_id = media_sideload_image( $image, $post_id, null, 'id' );
					$attachments[] = $attachment_id;
				}
			}
			if ( ! empty( $attachments ) ) {
				update_field( 'gallery', $attachments, $post_id );
			}
		}
	}
}