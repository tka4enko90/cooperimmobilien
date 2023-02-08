<?php

namespace Propstack;

use Propstack\DB\Propstack_DB;
use WP_Async_Request;
use Propstack\API\Propstack_API;

class Fetch_Objects extends WP_Async_Request {
	protected $action = 'queue_objects';

	protected $insert_posts;

	public function __construct() {
		parent::__construct();

		$this->insert_posts = new Insert_Posts_In_Background();
	}

	protected function handle() {
		$api     = new Propstack_API();
		$objects = $api->get_objects();

		$db               = new Propstack_DB();
		$existing_objects = $db->get_objects_ids();
		$new_objects_ids = [];

		if ( empty( $objects ) ) {
			update_option( 'insert_post_status', 'error' );
			return;
		}

		update_option('insert_post_status', 'fetching');

		$fields = [
			'id',
			'name',
			'title',
			'street',
			'house_number',
			'district',
			'region',
			'zip_code',
			'city',
			'address',
			'short_address',
			'number_of_rooms',
			'price',
			'living_space'
		];

		$counter = 0;
		foreach ( $objects as $object ) {
			$new_objects_ids[$object['id']] = '';
			$item            = [];
			$object_response = $api->get_object( $object['id'] );
			if ( isset( $object_response['updated_at'] ) ) {
				$item['updated_at'] = $object_response['updated_at'];
			}

			foreach ( $fields as $field ) {
				$item[ $field ] = $object[ $field ];
			}
			if ( isset( $object['images'] ) ) {
				$item['images'] = [];
				foreach ( $object['images'] as $image ) {
					$item['images'][] = $image['original'];
				}
			}

			if ( array_key_exists( $item['id'], $existing_objects ) ) {
				$item['existing_post_id'] = $existing_objects[ $item['id'] ];

				$object_last_update = $db->get_object_last_update( $item['existing_post_id'] );

				if ( $object_last_update && $object_last_update === $item['updated_at'] ) {
					continue;
				}
			}

			$counter++;
			$this->insert_posts->push_to_queue( $item );
		}

//		$objects_to_remove = array_diff_key($existing_objects, $new_objects_ids);
//		foreach ( $objects_to_remove as $item ) {
//			wp_delete_post($item);
//		}

		if ($counter === 0) {
			update_option('insert_post_status', 'complete');
		}

		$this->insert_posts->save()->dispatch();
	}
}