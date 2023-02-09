<?php

namespace Propstack;


use WP_Background_Process;
use Propstack\DB\Propstack_DB;

class Insert_Posts_In_Background extends WP_Background_Process {

	protected $action = 'insert_posts';

	protected function task( $item ) {
		update_option( 'insert_post_status', 'running' );

		$db = new Propstack_DB();
		$existing_objects = $db->get_objects_ids();
		$existing_images = $db->get_uploaded_images_source();

		$new_post_args = [
			'post_title'   => $item['name'],
			'post_content' => $item['title'],
			'post_author'  => 1,
			'post_type'    => 'objects',
			'post_status'  => 'publish'
		];

		if (array_key_exists($item['id'], $existing_objects)) {
			$new_post_args['ID'] = $existing_objects[$item['id']];
		}

		$post_id = wp_insert_post( $new_post_args );

		if ( $item['id'] ) {
			update_post_meta( $post_id, 'item_id', strval( $item['id'] ) );
		}

		if (isset($item['updated_at'])) {
			update_post_meta($post_id, 'updated_at', $item['updated_at']);
		}

		Register_Fields::updateFields( $item, $post_id, $existing_images );

		return false;
	}

	protected function complete() {
		parent::complete();
		update_option( 'insert_post_status', 'complete' );
		update_option( 'insert_post_timestamp', time() );
	}
}