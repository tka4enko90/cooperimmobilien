<?php
/*
Plugin Name: Propstack CRM API Integration plugin
Version: 1.0.0
Author: Markupus
*/

class Propstack_API {
	const API_KEY = 'dirFYBYVSO07DIXKETK1xBK4CTlyFV9eeA0Z6ZMS';
	const API_URL = 'https://api.propstack.de/v1';

	public function __construct() {
		add_action('init', [$this, 'create_post_type']);
		add_action('propstack_cron', [$this, 'update_posts']);
		if (is_admin() && !wp_next_scheduled('propstack_cron')) {
			wp_schedule_event(time(), 'daily', 'propstack_cron');
		}
		add_action('admin_post_update_objects', [$this, 'update_posts']);
		add_action('admin_post_nopriv_update_objects', [$this, 'update_posts']);
	}

	public function get_objects_from_api() {
		$url = self::API_URL . '/units';
		$headers = [
			'X-API-KEY' => self::API_KEY
		];

		$response = wp_remote_get($url, ['headers' => $headers]);

		if (isset($response['response']['code']) && $response['response']['code'] === 200) {
			return json_decode($response['body']);
		}

		return [];
	}

	public function create_post_type() {
		if (function_exists('register_post_type')) {
			register_post_type('objects', [
				'labels' => [
					'name' => 'Objects',
					'singular_name' => 'Object'
				],
				'public' => true,
				'has_archive' => true,
				'menu_icon' => 'dashicons-admin-home'
			]);
		}
	}

	public function insert_posts($posts = false) {
		if (!$posts) {
			$posts = $this->get_objects_from_api();
		}

		foreach ( $posts as $new_post ) {
			$existing_post = get_posts([
				'post_type' => 'objects',
				'meta_key' => 'api_id',
				'meta_value' => strval($new_post->id),
				'numberposts' => -1
			]);

			$post_args = [
				'post_title' => $new_post->title,
				'post_content' => $new_post->content,
				'post_author' => 1,
				'post_type' => 'objects',
				'post_status' => 'publish'
			];

			if (!empty($existing_post)) {
				$post_args['ID'] = $existing_post[0]->ID;
			}

			$post_id = wp_insert_post($post_args);

			if ($new_post->id) {
				update_post_meta($post_id, 'api_id', strval($new_post->id));
			}
		}
	}

	public function update_posts() {
		$new_posts = $this->get_objects_from_api();
		$meta_ids = [];

		foreach ($new_posts as $new_post) {
			$meta_ids[] = strval($new_post->id);
		}

		$existing_posts = get_posts([
			'numberposts' => -1,
			'post_type' => 'objects',
		]);

		foreach ($existing_posts as $existing_post) {
			$existing_post_api_id = get_post_meta($existing_post->ID, 'api_id')[0];
			if ($existing_post_api_id && !in_array($existing_post_api_id, $meta_ids)) {
				wp_delete_post($existing_post->ID);
			}
		}

		$this->insert_posts($new_posts);
	}

	public function plugin_activation() {
		$this->insert_posts();
	}

	public static function plugin_deactivation() {
		wp_clear_scheduled_hook( 'propstack_cron' );
		unregister_post_type( 'objects' );
		flush_rewrite_rules();
	}
}

$plugin = new Propstack_API();

register_activation_hook(__FILE__, [$plugin, 'plugin_activation']);
register_deactivation_hook(__FILE__, [$plugin, 'plugin_deactivation']);