<?php

namespace Propstack;


use WP_Background_Process;

class Insert_Posts_In_Background extends WP_Background_Process {

	protected $action = 'insert_posts';

	protected function task( $item ) {
		update_option( 'insert_post_status', 'running' );

		$new_post_args = [
			'post_title'   => $item->name,
			'post_content' => $item->title,
			'post_author'  => 1,
			'post_type'    => 'objects',
			'post_status'  => 'publish'
		];

		if ( isset( $item->existing_post_id ) ) {
			$new_post_args['ID'] = intval($item->existing_post_id);
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
		update_option( 'insert_post_status', 'complete' );
		update_option( 'insert_post_timestamp', time() );
	}
}