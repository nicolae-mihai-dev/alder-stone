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
require_once get_stylesheet_directory() . '/inc/seo.php';



/**
 * Removes the parent themes stylesheet and scripts from inc/enqueue.php
 */
function alder_stone_remove_parent_scripts() {
	wp_dequeue_style( 'understrap-styles' );
	wp_deregister_style( 'understrap-styles' );

	wp_dequeue_script( 'understrap-scripts' );
	wp_deregister_script( 'understrap-scripts' );
}
add_action( 'wp_enqueue_scripts', 'alder_stone_remove_parent_scripts', 20 );



/**
 * Enqueue our stylesheet and javascript file
 */
function alder_stone_enqueue_assets() {

	// Get the theme data.
	$the_theme     = wp_get_theme();
	$theme_version = $the_theme->get( 'Version' );

	$suffix = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';
	// Grab asset urls.
	$theme_styles  = "/css/child-theme{$suffix}.css";
	$theme_scripts = "/js/child-theme{$suffix}.js";
	
	$css_version = $theme_version . '.' . filemtime( get_stylesheet_directory() . $theme_styles );

	wp_enqueue_style( 'alder-stone-styles', get_stylesheet_directory_uri() . $theme_styles, array(), $css_version );

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

	wp_enqueue_script( 'jquery' );
	
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
