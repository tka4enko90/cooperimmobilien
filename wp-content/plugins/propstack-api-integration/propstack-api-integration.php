<?php
/*
Plugin Name: Propstack CRM API Integration plugin
Version: 1.0.0
Author: Markupus
*/

require 'vendor/autoload.php';

use Propstack\Fetch_Objects;
use Propstack\Register_Fields;

class Propstack_Addon {

	protected $fetch_objects;

	public function __construct() {
		new Register_Fields();
		$this->fetch_objects = new Fetch_Objects;

		add_action('init', [$this, 'create_taxonomy']);
		add_action( 'init', [ $this, 'create_post_type' ] );
		add_action( 'admin_notices', [ $this, 'admin_notification' ] );
		add_action( 'propstack_cron', [ $this, 'insert_posts' ] );

		if ( is_admin() && ! wp_next_scheduled( 'propstack_cron' ) ) {
			wp_schedule_event( time(), 'daily', 'propstack_cron' );
		}
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

	public function create_taxonomy() {
		$args = [
			'labels'                => [
				'name'              => 'Object tags',
				'singular_name'     => 'Object tag',
			],
			'public'                => true,
		];

		if (function_exists('register_taxonomy')) {
			register_taxonomy('object_tags', 'objects', $args);
		}
	}

	public function insert_posts() {
		$this->fetch_objects->dispatch();
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
		$status    = get_option( 'insert_post_status' );
		$timestamp = intval(get_option( 'insert_post_timestamp' ));
		if ( $status == 'running' ) {
			$class   = 'notice notice-info';
			$message = 'Objects updating';
			printf( '<div class="%s"><p>%s</p></div>', $class, $message );
		}

		if ( $status == 'fetching' ) {
			$class   = 'notice notice-info';
			$message = 'Objects fetching';
			printf( '<div class="%s"><p>%s</p></div>', $class, $message );
		}

		if ( $status === 'complete' && time() - $timestamp < 5 * 60 ) {
			$message = 'Objects was updated';
			$class   = 'notice notice-success';
			printf( '<div class="%s"><p>%s</p></div>', $class, $message );
		}

		if ( $status === 'error' && time() - $timestamp < 5 * 60 ) {
			$message = 'Couldn\'t update objects. Something went wrong.';
			$class   = 'notice notice-error';
			printf( '<div class="%s"><p>%s</p></div>', $class, $message );
		}
	}

	public function remove_posts() {
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

if ( ! class_exists('ACF') ) {
	add_action('admin_notices', 'require_acf_plugin');
	deactivate_plugins('propstack-api-integration/SendMyCall.php');
	return;
}
function require_acf_plugin() {
	echo '<div class="notice notice-error"><p>Please activate ACF plugin before using Propstack API Integration plugin</p></div>';
}

$plugin = new Propstack_Addon();

register_activation_hook( __FILE__, [ $plugin, 'plugin_activation' ] );
register_deactivation_hook( __FILE__, [ $plugin, 'plugin_deactivation' ] );