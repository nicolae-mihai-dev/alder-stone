<?php
/**
 * Shared Alder & Stone call-to-action section.
 *
 * @package AlderStone
 */

defined( 'ABSPATH' ) || exit;

$cta_title  = isset( $args['title'] ) ? $args['title'] : null;
$cta_text   = isset( $args['text'] ) ? $args['text'] : null;
$cta_button = isset( $args['button'] ) ? $args['button'] : null;

$has_cta_title = null !== $cta_title && '' !== $cta_title && false !== $cta_title;
$has_cta_text  = null !== $cta_text && '' !== $cta_text && false !== $cta_text;
$has_cta_link  = is_array( $cta_button ) && ! empty( $cta_button['url'] ) && ! empty( $cta_button['title'] );

if ( ! $has_cta_title && ! $has_cta_text && ! $has_cta_link ) {
	return;
}

$cta_button_target = $has_cta_link && ! empty( $cta_button['target'] ) ? $cta_button['target'] : '_self';
$cta_button_rel    = '_blank' === $cta_button_target ? 'noopener noreferrer' : '';
?>

<section class="alder-cta">
	<div class="container">
		<div class="alder-cta__content">
			<?php if ( $has_cta_title ) : ?>
				<h2 class="alder-heading-section alder-cta__title"><?php echo esc_html( $cta_title ); ?></h2>
			<?php endif; ?>

			<?php if ( $has_cta_text ) : ?>
				<div class="alder-copy alder-cta__text"><?php echo wp_kses_post( wpautop( esc_html( $cta_text ) ) ); ?></div>
			<?php endif; ?>

			<?php if ( $has_cta_link ) : ?>
				<a class="alder-button alder-cta__button" href="<?php echo esc_url( $cta_button['url'] ); ?>" target="<?php echo esc_attr( $cta_button_target ); ?>"<?php echo $cta_button_rel ? ' rel="' . esc_attr( $cta_button_rel ) . '"' : ''; ?>>
					<?php echo esc_html( $cta_button['title'] ); ?>
				</a>
			<?php endif; ?>
		</div>
	</div>
</section>
