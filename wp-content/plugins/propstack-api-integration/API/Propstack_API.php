<?php

namespace Propstack\API;

class Propstack_API {
	protected $url = 'https://api.propstack.de/v1/units';

	protected $objects = [];

	protected function fetch( $url ) {
		$headers  = [
			'X-API-KEY' => 'dirFYBYVSO07DIXKETK1xBK4CTlyFV9eeA0Z6ZMS'
		];
		$response = wp_remote_get( $url, [ 'headers' => $headers ] );

		if ( !is_wp_error($response) && isset( $response['response']['code'] ) && $response['response']['code'] === 200 ) {
			return json_decode( $response['body'], true );
		}

		return false;
	}

	public function get_object( $id ) {
		$query = add_query_arg( [
			'new' => 1,
		], $this->url . '/' . $id );

		return $this->fetch( $query );
	}

	public function get_objects( $page = 1 ) {
		$query = add_query_arg( [
			'with_meta' => 1,
			'status'    => 13754,
			'page'      => $page,
			'per'       => 20
		], $this->url );

		$response = $this->fetch( $query );

		if ( ! empty( $response ) ) {
			$total       = $response['meta']['total_count'];
			$per         = 20;
			$total_pages = floor( $total / $per );

			$this->objects = array_merge( $this->objects, $response['data'] );
			if ( $page <= $total_pages ) {
				return $this->get_objects( $page + 1 );
			}
		} else {
			update_option('insert_post_status', 'error');
		}

		$objects       = $this->objects;
		$this->objects = [];

		return $objects;
	}
}
