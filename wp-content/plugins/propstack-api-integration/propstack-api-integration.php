<?php
/*
Plugin Name: Propstack CRM API Integration plugin
Version: 1.0.0
Author: Markupus
*/

require 'vendor/autoload.php';

use Propstack\Register_Fields;
use Propstack\Insert_Posts_In_Background;

class Propstack_API {
	const API_KEY = 'dirFYBYVSO07DIXKETK1xBK4CTlyFV9eeA0Z6ZMS';
	const API_URL = 'https://api.propstack.de/v1/units';
	private $insert_posts_in_background;

	public function __construct() {
		new Register_Fields();
		$this->insert_posts_in_background = new Insert_Posts_In_Background();
		add_action( 'init', [ $this, 'create_post_type' ] );
		add_action( 'admin_notices', [ $this, 'admin_notification' ] );
		add_action( 'propstack_cron', [ $this, 'insert_posts' ] );
//		add_action( 'insert_objects', [ $this, 'insert_posts' ] );

		if ( is_admin() && ! wp_next_scheduled( 'propstack_cron' ) ) {
			wp_schedule_event( time(), 'daily', 'propstack_cron' );
		}
	}

	public function get_posts_from_api( $page = 1 ) {
		$url     = self::API_URL . '?page=' . $page;
		$headers = [
			'X-API-KEY' => self::API_KEY
		];

		$response = wp_remote_get( $url, [ 'headers' => $headers ] );

		if ( isset( $response['response']['code'] ) && $response['response']['code'] === 200 ) {
			return json_decode( $response['body'] );
		}

		return false;
	}

	public function create_post_type() {
		if ( function_exists( 'register_post_type' ) ) {
			register_post_type( 'objects', [
				'labels'      => [
					'name'          => 'Objects',
					'singular_name' => 'Object'
				],
				'public'      => true,
				'has_archive' => true,
				'menu_icon'   => 'dashicons-admin-home',
				'rewrite'     => [ 'slug' => 'objects' ],
			] );
		}
	}

	public function insert_posts() {
		global $wpdb;

		$page  = 1;
		$posts = $this->get_posts_from_api( $page );

		if ( ! $posts ) {
			update_option( 'insert_post_status', 'error' );

			return;
		}

		$existing_ids_db = $wpdb->get_results( "select post_id, meta_value from $wpdb->postmeta where meta_key = 'api_id'", ARRAY_A );
		$existing_ids    = [];

		foreach ( $existing_ids_db as $item ) {
			$existing_ids[ $item['meta_value'] ] = $item['post_id'];
		}

		while ( ! empty( $posts ) ) {
			foreach ( $posts as $new_post ) {
				if ( array_key_exists( $new_post->id, $existing_ids ) ) {
					$new_post->existing_post_id = $existing_ids[ $new_post->id ];
				}
				$this->insert_posts_in_background->push_to_queue( $new_post );
			}
			$page ++;
			$posts = $this->get_posts_from_api( $page );
		}

		$this->insert_posts_in_background->save()->dispatch();

	}

	public function plugin_activation() {
		add_option( 'insert_post_status', false );
		add_option( 'insert_post_timestamp', false );
	}

	public static function plugin_deactivation() {
		delete_option( 'insert_post_status' );
		delete_option( 'insert_post_timestamp' );

		$timestamp = wp_next_scheduled( 'propstack_cron' );
		wp_unschedule_event( $timestamp, 'propstack_cron' );

		unregister_post_type( 'objects' );
		flush_rewrite_rules();
	}

	public function admin_notification() {
		$status    = get_option( 'inert_post_status' );
		$timestamp = intval(get_option( 'insert_post_timestamp' ));
		if ( $status == 'running' ) {
			$class   = 'notice notice-info';
			$message = 'Objects updating';
			printf( '<div class="%s"><p>%s</p></div>', $class, $message );
		}

		if ( $status === 'complete' && time() - $timestamp < 5 * 60 ) {
			$message = 'Objects was updated';
			$class   = 'notice notice-success';
			printf( '<div class="%s"><p>%s</p></div>', $class, $message );
		}

		if ( $status === 'Error' && time() - $timestamp < 5 * 60 ) {
			$message = 'Couldn\'t update objects. Something went wrong.';
			$class   = 'notice notice-error';
			printf( '<div class="%s"><p>%s</p></div>', $class, $message );
		}
	}

	public static function remove_posts() {
		global $wpdb;
		$posts = get_posts( [
			'post_type'   => 'objects',
			'numberposts' => - 1
		] );

		foreach ( $posts as $ex_post ) {
			wp_delete_post( $ex_post->ID );
		}

		$query     = $wpdb->prepare( "select post_id from $wpdb->postmeta where meta_key = %s", '_source_url' );
		$image_ids = $wpdb->get_col( $query );

		foreach ( $image_ids as $image_id ) {
			wp_delete_attachment( intval( $image_id ) );
		}
	}
}

$plugin = new Propstack_API();

register_activation_hook( __FILE__, [ $plugin, 'plugin_activation' ] );
register_deactivation_hook( __FILE__, [ $plugin, 'plugin_deactivation' ] );