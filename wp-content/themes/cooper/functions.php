<?php

	add_action('after_setup_theme', 'project_setup');
	add_action('manage_posts_custom_column', 'posts_custom_columns', 5, 2);
	add_action('wp_enqueue_scripts', 'project_styles');
	add_action('wp_enqueue_scripts', 'project_scripts');
	// add_action('upload_mimes', 'add_file_types_to_uploads');

	add_filter('show_admin_bar', '__return_false');

	add_theme_support( 'custom-logo' );

	// Колонка миниатюры в списке записей админки
	add_filter('manage_posts_columns', 'posts_columns', 1);

	function posts_columns($defaults) {
	    $defaults['riv_post_thumbs'] = __('Миниатюра');
	    return $defaults;
	}
	function posts_custom_columns($column_name, $id) {
		if($column_name === 'riv_post_thumbs'){
	        the_post_thumbnail( array(50, 50) );
	    }
	}

	//svg support
	add_filter( 'upload_mimes', 'svg_upload_allow' );
	# Добавляет SVG в список разрешенных для загрузки файлов.
	function svg_upload_allow( $mimes ) {
		$mimes['svg']  = 'image/svg+xml';
		return $mimes;
	}

	add_filter( 'wp_check_filetype_and_ext', 'fix_svg_mime_type', 10, 5 );
	# Исправление MIME типа для SVG файлов.
	function fix_svg_mime_type( $data, $file, $filename, $mimes, $real_mime = '' ){
		if( version_compare( $GLOBALS['wp_version'], '5.1.0', '>=' ) )
			$dosvg = in_array( $real_mime, [ 'image/svg', 'image/svg+xml' ] );
		else
			$dosvg = ( '.svg' === strtolower( substr($filename, -4) ) );
		// mime тип был обнулен, поправим его
		// а также проверим право пользователя
		if( $dosvg ){
			// разрешим
			if( current_user_can('manage_options') ){
				$data['ext']  = 'svg';
				$data['type'] = 'image/svg+xml';
			}
			// запретим
			else {
				$data['ext'] = $type_and_ext['type'] = false;
			}
		}
		return $data;
	}

	function project_setup() {
		add_theme_support( 'custom-logo' );
		add_theme_support( 'title-tag' );
		add_theme_support( 'menus' );
		add_theme_support( 'post-thumbnails' );
	}

	function project_styles() {
		wp_enqueue_style( 'libs', get_template_directory_uri() . '/css/libs.min.css', [], '1.0', 'all');
		wp_enqueue_style( 'style', get_template_directory_uri() . '/css/styles.css', [], '1.0', 'all');
		// wp_enqueue_style( 'mediacss', get_template_directory_uri() . '/css/media.css', [], '1.0', 'all');
	}

	function project_scripts() {
		// wp_deregister_script('jquery');
	  //   wp_register_script('jquery', get_template_directory_uri() . '/libs/jquery-3.6.0/jquery-3.6.0.min.js', array(), null, true);
	  //   wp_enqueue_script('jquery');
		wp_enqueue_script( 'scripts', get_template_directory_uri() . '/js/scripts.min.js', [], [1.0], true);
	}

	//Header menu
	register_nav_menus( array(
		'hmenu_left' => 'Menu header left',
		'hmenu_right' => 'Menu header right',
		'mobile_menu' => 'Menu mobile',
		'fmenu_desktop' => 'Menu footer desktop',
		'fmenu_mobile' => 'Menu footer mobile'));

	//acf option page
	if( function_exists('acf_add_options_page') ) {

		acf_set_options_page_menu('Main sections');

		acf_add_options_sub_page(array(
			'page_title' 	=> 'Main sections',
			'menu_title'	=> 'Main sections',
			'menu_slug' 	=> 'acf-options',
			'capability'	=> 'edit_posts',
			'parent_slug'	=> '',
			'redirect'		=> false
		));

		acf_add_options_sub_page(array(
			'page_title' 	=> 'Main page',
			'menu_title'	=> 'Main page',
			'menu_slug' 	=> 'acf-options-main',
			'capability'	=> 'edit_posts',
			'parent_slug'	=> 'acf-options',
		));

		acf_add_options_sub_page(array(
			'page_title' 	=> 'Contact',
			'menu_title'	=> 'Contact',
			'menu_slug' 	=> 'acf-options-contact',
			'capability'	=> 'edit_posts',
			'parent_slug'	=> 'acf-options',
		));

		acf_add_options_sub_page(array(
			'page_title' 	=> 'Logo',
			'menu_title'	=> 'Logo',
			'menu_slug' 	=> 'acf-options-logo',
			'capability'	=> 'edit_posts',
			'parent_slug'	=> 'acf-options',
		));
	}

	function wpsites_disable_self_pingbacks( &$links ) {
	  foreach ( $links as $l => $link )
			if ( 0 === strpos( $link, get_option( 'home' ) ) )
				unset($links[$l]);
	}

	add_action( 'pre_ping', 'wpsites_disable_self_pingbacks' );

	// Количество постов на страницу для разных категорий
	// function posts_count( $wp_query ) {
	// 	if ( !is_admin() && $wp_query->is_main_query() && is_category(3) ) {
	// 		$wp_query->set( 'posts_per_page', -1 );
	// 	} else if ( !is_admin() && $wp_query->is_main_query() && is_category(4) ) {
	// 		$wp_query->set( 'posts_per_page', 12 );
	// 	} else if ( !is_admin() && $wp_query->is_main_query() && is_category(5) ) {
	// 		$wp_query->set( 'posts_per_page', 12 );
	// 	} else if ( !is_admin() && $wp_query->is_main_query() && is_category(6) ) {
	// 		$wp_query->set( 'posts_per_page', 25 );
	// 	} else if ( !is_admin() && $wp_query->is_main_query() && is_category(10) ) {
	// 		$wp_query->set( 'posts_per_page', 8 );
	// 	}
	// }
	// add_action( 'pre_get_posts', 'posts_count' );
