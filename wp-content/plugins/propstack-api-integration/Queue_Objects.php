<?php
namespace Propstack;

use WP_Async_Request;

class Queue_Objects extends WP_Async_Request {
	protected $action = 'queue_objects';

	protected $insert_posts;

	public function __construct() {
		parent::__construct();

		$this->insert_posts = new Insert_Posts_In_Background();
	}

	protected function handle() {
		global $wpdb;
		$posts = $this->get_posts_from_api();

		if ( ! $posts ) {
			update_option( 'insert_post_status', 'error' );

			return;
		}

		$existing_ids_db = $wpdb->get_results( "select post_id, meta_value from $wpdb->postmeta where meta_key = 'api_id'", ARRAY_A );
		$existing_ids    = [];

		foreach ( $existing_ids_db as $item ) {
			$existing_ids[ $item['meta_value'] ] = $item['post_id'];
		}

		$page  = 1;
		while ( ! empty( $posts ) ) {

			foreach ( $posts as $new_post ) {
				if ( array_key_exists( $new_post->id, $existing_ids ) ) {
					$new_post->existing_post_id = $existing_ids[ $new_post->id ];
				}
				$this->insert_posts->push_to_queue( $new_post );
			}
			$this->insert_posts->save()->dispatch();

			$page ++;
			$posts = $this->get_posts_from_api( $page );
		}
	}

	protected function get_posts_from_api( $page = 1 ) {
		$url     = 'https://api.propstack.de/v1/units?page=' . $page;
		$headers = [
			'X-API-KEY' => 'dirFYBYVSO07DIXKETK1xBK4CTlyFV9eeA0Z6ZMS'
		];

		$response = wp_remote_get( $url, [ 'headers' => $headers ] );

		if ( isset( $response['response']['code'] ) && $response['response']['code'] === 200 ) {
			return json_decode( $response['body'] );
		}

		return false;
	}
}