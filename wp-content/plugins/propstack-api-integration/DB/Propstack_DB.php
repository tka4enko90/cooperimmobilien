<?php

namespace Propstack\DB;

class Propstack_DB {

	public function get_uploaded_images_source() {
		global $wpdb;
		$query = $wpdb->prepare( "select meta_value from $wpdb->postmeta where meta_key = %s", '_source_url' );

		return $wpdb->get_col( $query );
	}

	public function get_objects_ids() {
		global $wpdb;
		$query   = $wpdb->prepare( "select post_id, meta_value from $wpdb->postmeta where meta_key = '%s'", 'item_id' );
		$objects = $wpdb->get_results( $query, ARRAY_A );
		$ids     = [];
		foreach ( $objects as $object ) {
			$ids[ $object['meta_value'] ] = $object['post_id'];
		}

		return $ids;
	}

	public function get_object_last_update( $id ) {
		return get_post_meta( $id, 'updated_at', true );
	}
}