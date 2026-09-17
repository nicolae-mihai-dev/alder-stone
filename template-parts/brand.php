<?php
/**
 * Shared Alder & Stone brand lockup.
 *
 * @package AlderStone
 */

defined( 'ABSPATH' ) || exit;

$brand_classes = isset( $args['classes'] ) ? trim( (string) $args['classes'] ) : '';
$brand_variant = isset( $args['variant'] ) && 'light' === $args['variant'] ? 'light' : 'dark';
$brand_logo    = 'light' === $brand_variant ? 'alder-stone-logo-light.png' : 'alder-stone-logo-dark.png';
?>

<a class="alder-stone-brand<?php echo $brand_classes ? ' ' . esc_attr( $brand_classes ) : ''; ?>" href="<?php echo esc_url( home_url( '/' ) ); ?>" aria-label="<?php esc_attr_e( 'Alder & Stone home', 'alder-stone' ); ?>">
	<img class="alder-stone-brand__mark" src="<?php echo esc_url( get_stylesheet_directory_uri() . '/assets/' . $brand_logo ); ?>" width="512" height="512" alt="" decoding="async">
	<span class="alder-stone-brand__wordmark">Alder <span>&amp; Stone</span></span>
</a>
