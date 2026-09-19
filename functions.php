<?php
/**
 * Alder Stone theme functions and definitions
 *
 * @package AlderStone
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

require_once get_stylesheet_directory() . '/inc/post-types.php';
require_once get_stylesheet_directory() . '/inc/acf-fields.php';
require_once get_stylesheet_directory() . '/inc/acf-home.php';
require_once get_stylesheet_directory() . '/inc/acf-services.php';
require_once get_stylesheet_directory() . '/inc/acf-about.php';
require_once get_stylesheet_directory() . '/inc/acf-contact.php';
require_once get_stylesheet_directory() . '/inc/contact-form.php';



/**
 * Removes the parent themes stylesheet and scripts from inc/enqueue.php
 */
function alder_stone_remove_parent_scripts() {
	wp_dequeue_style( 'understrap-styles' );
	wp_deregister_style( 'understrap-styles' );

	wp_dequeue_script( 'understrap-scripts' );
	wp_deregister_script( 'understrap-scripts' );

	// The Alder Stone bundle uses Bootstrap 5's vanilla-JS components and has no
	// jQuery dependency. Understrap enqueues it by default, so remove it from
	// logged-out frontend views after the parent enqueue callback has run. Keep
	// it for the logged-in toolbar, where Rank Math uses jQuery.
	if ( ! is_admin_bar_showing() ) {
		wp_dequeue_script( 'jquery' );
	}
}
add_action( 'wp_enqueue_scripts', 'alder_stone_remove_parent_scripts', 20 );

/**
 * Removes legacy emoji detection from public pages.
 *
 * Modern browsers render native emoji without WordPress's compatibility
 * loader. Keep WordPress admin and feed transformations untouched.
 *
 * @return void
 */
function alder_stone_disable_frontend_emojis() {
	if ( is_admin() ) {
		return;
	}

	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'wp_enqueue_scripts', 'wp_enqueue_emoji_styles' );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );
}
add_action( 'init', 'alder_stone_disable_frontend_emojis', 20 );



/**
 * Enqueue our stylesheet and javascript file
 */
function alder_stone_enqueue_assets() {

	// Get the theme data.
	$the_theme     = wp_get_theme();
	$theme_version = $the_theme->get( 'Version' );

	$suffix = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';
	// Grab asset urls.
	$theme_styles  = "/css/alder-stone{$suffix}.css";
	$theme_scripts = "/js/child-theme{$suffix}.js";
	
	$css_version = $theme_version . '.' . filemtime( get_stylesheet_directory() . $theme_styles );

	wp_enqueue_style( 'alder-stone-styles', get_stylesheet_directory_uri() . $theme_styles, array(), $css_version );

	$page_style_handles = array();

	if ( is_front_page() ) {
		$page_style_handles['alder-stone-home'] = 'home';
	}

	if ( is_page( 'about' ) ) {
		$page_style_handles['alder-stone-about'] = 'about';
	}

	if ( is_page( 'services' ) ) {
		$page_style_handles['alder-stone-services'] = 'services';
	}

	if ( is_home() || is_singular( 'post' ) || is_category() || is_tag() || is_date() || is_author() ) {
		$page_style_handles['alder-stone-journal'] = 'journal';
	}

	if ( is_page( 'privacy-policy' ) ) {
		$page_style_handles['alder-stone-privacy-policy'] = 'privacy-policy';
	}

	foreach ( $page_style_handles as $style_handle => $style_name ) {
		$page_stylesheet      = "/css/{$style_name}{$suffix}.css";
		$page_stylesheet_path = get_stylesheet_directory() . $page_stylesheet;

		if ( file_exists( $page_stylesheet_path ) ) {
			wp_enqueue_style( $style_handle, get_stylesheet_directory_uri() . $page_stylesheet, array( 'alder-stone-styles' ), $theme_version . '.' . filemtime( $page_stylesheet_path ) );
		}
	}

	if ( is_page( 'contact' ) ) {
		$contact_styles      = "/css/contact{$suffix}.css";
		$contact_styles_path = get_stylesheet_directory() . $contact_styles;

		if ( file_exists( $contact_styles_path ) ) {
			$contact_css_version = $theme_version . '.' . filemtime( $contact_styles_path );

			wp_enqueue_style( 'alder-stone-contact', get_stylesheet_directory_uri() . $contact_styles, array( 'alder-stone-styles' ), $contact_css_version );
		}
	}

	if ( is_post_type_archive( 'project' ) || is_singular( 'project' ) ) {
		$projects_styles      = "/css/projects{$suffix}.css";
		$projects_styles_path = get_stylesheet_directory() . $projects_styles;

		if ( file_exists( $projects_styles_path ) ) {
			$projects_css_version = $theme_version . '.' . filemtime( $projects_styles_path );

			wp_enqueue_style( 'alder-stone-projects', get_stylesheet_directory_uri() . $projects_styles, array( 'alder-stone-styles' ), $projects_css_version );
		}
	}

	if ( is_404() ) {
		$not_found_styles      = "/css/not-found{$suffix}.css";
		$not_found_styles_path = get_stylesheet_directory() . $not_found_styles;

		if ( file_exists( $not_found_styles_path ) ) {
			wp_enqueue_style( 'alder-stone-not-found', get_stylesheet_directory_uri() . $not_found_styles, array( 'alder-stone-styles' ), $theme_version . '.' . filemtime( $not_found_styles_path ) );
		}
	}

	$js_version = $theme_version . '.' . filemtime( get_stylesheet_directory() . $theme_scripts );
	
	wp_enqueue_script( 'alder-stone-scripts', get_stylesheet_directory_uri() . $theme_scripts, array(), $js_version, true );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'alder_stone_enqueue_assets' );



/**
 * Load the child theme's text domain
 */
function alder_stone_load_textdomain() {
	load_child_theme_textdomain( 'alder-stone', get_stylesheet_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'alder_stone_load_textdomain' );

/**
 * Adds child-theme supports that improve WordPress and search-engine integration.
 *
 * @return void
 */
function alder_stone_theme_setup() {
	add_theme_support( 'title-tag' );
	add_image_size( 'home-project-card', 600, 0, false );
	add_image_size( 'home-project-primary', 900, 0, false );
	add_image_size( 'about-intro', 720, 0, false );
}
add_action( 'after_setup_theme', 'alder_stone_theme_setup', 20 );



/**
 * Overrides the theme_mod to default to Bootstrap 5
 *
 * This function uses the `theme_mod_{$name}` hook and
 * can be duplicated to override other theme settings.
 *
 * @return string
 */
function alder_stone_default_bootstrap_version() {
	return 'bootstrap5';
}
add_filter( 'theme_mod_understrap_bootstrap_version', 'alder_stone_default_bootstrap_version', 20 );



/**
 * Loads javascript for showing customizer warning dialog.
 */
function alder_stone_customize_controls_js() {
	wp_enqueue_script(
		'alder-stone-customizer',
		get_stylesheet_directory_uri() . '/js/customizer-controls.js',
		array( 'customize-preview' ),
		'20130508',
		true
	);
}
add_action( 'customize_controls_enqueue_scripts', 'alder_stone_customize_controls_js' );
