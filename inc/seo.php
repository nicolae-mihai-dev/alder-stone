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

		if ( is_page( 'services' ) ) {
			$description = __( 'Alder & Stone provides architecture, interiors and strategic design for considered places to live and work.', 'alder-stone' );
		} elseif ( is_page( 'about' ) ) {
			$description = __( 'Meet Alder & Stone, an architecture practice guided by clear ideas, honest materials and lasting value.', 'alder-stone' );
		} elseif ( is_page( 'contact' ) ) {
			$description = __( 'Start a conversation with Alder & Stone about your next architecture or interior project.', 'alder-stone' );
		}
	} elseif ( is_post_type_archive( 'project' ) ) {
		$description = __( 'Selected architecture projects by Alder & Stone: thoughtful places shaped by material, purpose and context.', 'alder-stone' );
		$url         = get_post_type_archive_link( 'project' );
	}

	if ( ! $image && function_exists( 'get_field' ) ) {
		$front_page_id = absint( get_option( 'page_on_front' ) );
		$hero_image_id = $front_page_id ? absint( get_field( 'home_hero_image', $front_page_id ) ) : 0;

		if ( $hero_image_id ) {
			$image = wp_get_attachment_image_url( $hero_image_id, 'full' );
		}
	}

	?>
	<meta name="description" content="<?php echo esc_attr( $description ); ?>">
	<?php if ( ! is_singular() && ! is_404() ) : ?><link rel="canonical" href="<?php echo esc_url( $url ); ?>"><?php endif; ?>
	<meta property="og:title" content="<?php echo esc_attr( $title ); ?>">
	<meta property="og:description" content="<?php echo esc_attr( $description ); ?>">
	<meta property="og:type" content="<?php echo esc_attr( is_singular() ? 'article' : 'website' ); ?>">
	<meta property="og:url" content="<?php echo esc_url( $url ); ?>">
	<meta property="og:site_name" content="<?php esc_attr_e( 'Alder & Stone', 'alder-stone' ); ?>">
	<?php if ( $image ) : ?><meta property="og:image" content="<?php echo esc_url( $image ); ?>"><?php endif; ?>
	<meta name="twitter:card" content="<?php echo esc_attr( $image ? 'summary_large_image' : 'summary' ); ?>">
	<meta name="twitter:title" content="<?php echo esc_attr( $title ); ?>">
	<meta name="twitter:description" content="<?php echo esc_attr( $description ); ?>">
	<?php if ( $image ) : ?><meta name="twitter:image" content="<?php echo esc_url( $image ); ?>"><?php endif; ?>
	<?php
}
add_action( 'wp_head', 'alder_stone_output_seo_meta', 5 );
