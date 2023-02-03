<?php
namespace Propstack;


use WP_Background_Process;
class Insert_Posts_In_Background extends WP_Background_Process {
	protected $action = 'insert_post_in_background';

	protected function task($new_post) {
		$existing_post = get_posts( [
			'post_type'   => 'objects',
			'meta_key'    => 'api_id',
			'meta_value'  => strval( $new_post->id ),
			'numberposts' => - 1
		] );

		$post_args = [
			'post_title'   => $new_post->name,
			'post_content' => $new_post->title,
			'post_author'  => 1,
			'post_type'    => 'objects',
			'post_status'  => 'publish'
		];

		if ( ! empty( $existing_post ) ) {
			$post_args['ID'] = $existing_post[0]->ID;
		}

		$post_id = wp_insert_post( $post_args );

		if ( $new_post->id ) {
			update_post_meta( $post_id, 'api_id', strval( $new_post->id ) );
		}

		Register_Fields::updateFields( $new_post, $post_id );

		return false;
	}
}