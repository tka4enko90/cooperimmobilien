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

//		add_action( 'propstack_cron', [ $this, 'update_posts' ] );
//		if ( is_admin() && ! wp_next_scheduled( 'propstack_cron' ) ) {
//			wp_schedule_event( time(), 'daily', 'propstack_cron' );
//		}
	}

	public function get_posts_from_api() {
		$url     = self::API_URL;
		$headers = [
			'X-API-KEY' => self::API_KEY
		];

		$response = wp_remote_get( $url, [ 'headers' => $headers ] );

		if ( isset( $response['response']['code'] ) && $response['response']['code'] === 200 ) {
			return json_decode( $response['body'] );
		}

		return [];
	}

	public function create_post_type() {
		global $wpdb;
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

	public function insert_posts( $posts = false ) {
		if ( ! $posts ) {
			$posts = $this->get_posts_from_api();
		}

		foreach ( $posts as $new_post ) {
			$this->insert_posts_in_background->push_to_queue( $new_post );
		}

		$this->insert_posts_in_background->save()->dispatch();
	}

	public function update_posts() {
		$new_posts = $this->get_posts_from_api();
		$meta_ids  = [];

		if ( empty( $new_posts ) ) {
			return;
		}

		foreach ( $new_posts as $new_post ) {
			$meta_ids[] = strval( $new_post->id );
		}

		$existing_posts = get_posts( [
			'numberposts' => - 1,
			'post_type'   => 'objects',
		] );

		foreach ( $existing_posts as $existing_post ) {
			$existing_post_api_id = get_post_meta( $existing_post->ID, 'api_id', true );
			if ( $existing_post_api_id && ! in_array( $existing_post_api_id, $meta_ids ) ) {
				wp_delete_post( $existing_post->ID );
			}
		}

		$this->insert_posts( $new_posts );
	}

	public function plugin_activation() {
		add_option( 'insert_post_status', false );
		add_option( 'insert_post_timestamp', false );
		$this->insert_posts();
	}

	public static function plugin_deactivation() {
		delete_option( 'insert_post_status' );
		delete_option( 'insert_post_timestamp' );
		wp_clear_scheduled_hook( 'propstack_cron' );
		unregister_post_type( 'objects' );
		flush_rewrite_rules();
	}

	public function admin_notification() {
		$status    = get_option( 'inert_post_status' );
		$timestamp = get_option( 'insert_post_timestamp' );
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