<?php
/**
 * Understrap Child Theme functions and definitions
 *
 * @package UnderstrapChild
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;



/**
 * Removes the parent themes stylesheet and scripts from inc/enqueue.php
 */
function understrap_remove_scripts() {
	wp_dequeue_style( 'understrap-styles' );
	wp_deregister_style( 'understrap-styles' );

	wp_dequeue_script( 'understrap-scripts' );
	wp_deregister_script( 'understrap-scripts' );
}
add_action( 'wp_enqueue_scripts', 'understrap_remove_scripts', 20 );



/**
 * Enqueue our stylesheet and javascript file
 */
function theme_enqueue_styles() {

	// Get the theme data.
	$the_theme = wp_get_theme();

	$suffix = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';
	// Grab asset urls.
	$theme_styles  = "/css/child-theme{$suffix}.css";
	$theme_scripts = "/js/child-theme{$suffix}.js";

	wp_enqueue_style( 'child-understrap-styles', get_stylesheet_directory_uri() . $theme_styles, array(), $the_theme->get( 'Version' ) );
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'child-understrap-scripts', get_stylesheet_directory_uri() . $theme_scripts, array(), $the_theme->get( 'Version' ), true );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	
	if( is_page( 211 ) ){
		wp_enqueue_script( 'fancybox-js', get_stylesheet_directory_uri() . '/src/fancybox/fancybox.umd.js', array(), $the_theme->get( 'Version' ), true );
	}
}
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );



/**
 * Load the child theme's text domain
 */
function add_child_theme_textdomain() {
	load_child_theme_textdomain( 'understrap-child', get_stylesheet_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'add_child_theme_textdomain' );



/**
 * Overrides the theme_mod to default to Bootstrap 5
 *
 * This function uses the `theme_mod_{$name}` hook and
 * can be duplicated to override other theme settings.
 *
 * @return string
 */
function understrap_default_bootstrap_version() {
	return 'bootstrap5';
}
add_filter( 'theme_mod_understrap_bootstrap_version', 'understrap_default_bootstrap_version', 20 );



/**
 * Loads javascript for showing customizer warning dialog.
 */
function understrap_child_customize_controls_js() {
	wp_enqueue_script(
		'understrap_child_customizer',
		get_stylesheet_directory_uri() . '/js/customizer-controls.js',
		array( 'customize-preview' ),
		'20130508',
		true
	);
}
add_action( 'customize_controls_enqueue_scripts', 'understrap_child_customize_controls_js' );


/**
 * Register ACF blocks.
 */
function understrap_child_register_acf_blocks() {
	
	$site_icon = '<svg xmlns="http://www.w3.org/2000/svg" xml:space="preserve" style="enable-background:new 0 0 655.1 160.3" viewBox="0 0 655.1 160.3">
	<path d="M578.5 152.8c14.2-.8 45.9.4 60 3 16 3 16-1 7-11-26.2-29.1-50.7-95.1-49.6-135.7.2-6.8-3-7.1-6.7-2.9C572.1 25.8 532 99.3 472 96.3c-10-1 5-12 0-15-56-29-84.3-39.9-128.9-50.8C333 28 318.7 47.3 306 56.6c-.3.2-.6.3-1 .3-9.9-1.4-57.8-41.7-66.3-48-.5-.4-1.1-.5-1.7-.4-5.1 1-29.9 8.3-54.6 52.5-.2.3-.4.5-.8.5-54.8 3.7-103.7 27.3-151 55.2-30.6 18-35.1 22.9-14.9 37.2" style="fill:none;stroke:#000;stroke-width:7;stroke-linecap:round;stroke-miterlimit:10"/>
	<path d="M524.5 104.5c0 2.4-.8 7.8-2.3 9.5-1.7 2-4.4 0-7.2 0-2.9 0-3.7.9-5.5-1.2-1.4-1.7-4-6-4-8.3 0-2.6 2.9-4.3 4.6-6 1.7-1.7 2.3-3.5 4.9-3.5 2.6 0 6.6.1 8.3 1.7 1.9 1.7 1.2 5.1 1.2 7.8z"/>
	</svg>';
	
	register_block_type( __DIR__ . '/blocks/banner',
	[
		'icon' => $site_icon
	]);
	
	register_block_type( __DIR__ . '/blocks/wrapper',
	[
		'icon' => $site_icon
	]);
	
	register_block_type( __DIR__ . '/blocks/content-row',
	[
		'icon' => $site_icon
	]);
	
	register_block_type( __DIR__ . '/blocks/content-columns',
	[
		'icon' => $site_icon
	]);
	
	register_block_type( __DIR__ . '/blocks/content-cards',
	[
		'icon' => $site_icon
	]);
	
	register_block_type( __DIR__ . '/blocks/contact-info',
	[
		'icon' => $site_icon
	]);
	
	register_block_type( __DIR__ . '/blocks/map',
	[
		'icon' => $site_icon
	]);
	
	register_block_type( __DIR__ . '/blocks/tabs',
	[
		'icon' => $site_icon
	]);
	
	register_block_type( __DIR__ . '/blocks/heading',
	[
		'icon' => $site_icon
	]);
	
	register_block_type( __DIR__ . '/blocks/paragraph',
	[
		'icon' => $site_icon
	]);
	
	register_block_type( __DIR__ . '/blocks/list',
	[
		'icon' => $site_icon
	]);
	
	register_block_type( __DIR__ . '/blocks/button',
	[
		'icon' => $site_icon
	]);
	
	register_block_type( __DIR__ . '/blocks/image',
	[
		'icon' => $site_icon
	]);
}
add_action( 'init', 'understrap_child_register_acf_blocks' );

/**
 * Custom ACF block categories.
 */
function register_layout_category( $categories ) {

	$categories[] = array(
		'slug'  => 'custom-theme',
		'title' => 'Custom Theme',
		'order' => 0
	);

	return $categories;
}
add_action( 'block_categories', 'register_layout_category', 10, 2 );


/**
 * ACF block editor scripts.
 */
function block_editor_scripts() {
	
	$cssPath = '/css/child-theme.min.css';
	
	wp_enqueue_style(
		'my-block-editor-css',
		get_stylesheet_directory_uri() . $cssPath,
		
		[ 'wp-edit-blocks' ],
		filemtime( get_stylesheet_directory() . $cssPath )
	);
	
}
add_action( 'enqueue_block_editor_assets', 'block_editor_scripts' );

/**
 * Remove AFC innerblocks default wrapper
 */
add_filter( 'acf/blocks/wrap_frontend_innerblocks', 'acf_should_wrap_innerblocks', 10, 2 );
function acf_should_wrap_innerblocks( $wrap, $name ) {
	if ( $name == 'acf/test-block' ) {
		return true;
	}
	return false;
}

/**
 * Add CTA to end of nav.
 */
function add_cta_to_nav( $items, $args ) {
	 if ($args->theme_location == 'primary') {
		 $url = get_permalink(32);
		 $items .= '<li class="nav-item ms-lg-auto"><a class="nav-link nav-btn btn btn-primary" href="'.$url.'">Schedule a Free Evaluation</a></li>';
	 }
	 return $items;
 }
 add_filter( 'wp_nav_menu_items', 'add_cta_to_nav', 10, 2 );

/**
 * Gravity Forms - change default button
 */
function form_submit_button( $button, $form ) {
	return "<button class='btn btn-secondary btn-accent btn-default ' id='gform_submit_button_{$form['id']}'>Send Message&nbsp;&nbsp;<i class='fa fa-angle-double-right'></i></button>";
}
add_filter( 'gform_submit_button', 'form_submit_button', 10, 2 );


/**
 * Clean ID string
 */
function cleanit($string) {
   $string = str_replace(' ', '_', $string);
   $string = strtolower($string);
   
   return preg_replace('/[^A-Za-z0-9\_]/', '', $string);
}

/**
 * Clean ID string
 */
function list_icon($icon) {
   $string = '<span class="fa-li">'.$icon.'</span>';
   
   return $string;
}