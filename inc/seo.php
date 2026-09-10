<?php
/**
 * Lightweight, theme-owned SEO metadata.
 *
 * @package AlderStone
 */

defined( 'ABSPATH' ) || exit;

/**
 * Prints a meaningful description and social sharing metadata.
 *
 * @return void
 */
function alder_stone_output_seo_meta() {
	if ( is_admin() || is_feed() ) {
		return;
	}

	$description = __( 'Alder & Stone is an architecture practice creating thoughtful spaces shaped by people, material and place.', 'alder-stone' );
	$title       = wp_get_document_title();
	$url         = home_url( '/' );
	$image       = '';

	if ( is_singular() ) {
		$post_id = get_queried_object_id();
		$url     = get_permalink( $post_id );

		if ( has_excerpt( $post_id ) ) {
			$description = wp_strip_all_tags( get_the_excerpt( $post_id ) );
		}

		if ( has_post_thumbnail( $post_id ) ) {
			$image = get_the_post_thumbnail_url( $post_id, 'full' );
		}
	}

	?>
	<meta name="description" content="<?php echo esc_attr( $description ); ?>">
	<meta property="og:title" content="<?php echo esc_attr( $title ); ?>">
	<meta property="og:description" content="<?php echo esc_attr( $description ); ?>">
	<meta property="og:type" content="<?php echo esc_attr( is_singular() ? 'article' : 'website' ); ?>">
	<meta property="og:url" content="<?php echo esc_url( $url ); ?>">
	<?php if ( $image ) : ?><meta property="og:image" content="<?php echo esc_url( $image ); ?>"><?php endif; ?>
	<meta name="twitter:card" content="<?php echo esc_attr( $image ? 'summary_large_image' : 'summary' ); ?>">
	<?php
}
add_action( 'wp_head', 'alder_stone_output_seo_meta', 5 );
