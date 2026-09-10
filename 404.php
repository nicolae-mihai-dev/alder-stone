<?php
/**
 * Custom 404 template.
 *
 * @package AlderStone
 */

defined( 'ABSPATH' ) || exit;

get_header();
?>
<main class="site-main not-found-page" id="content" tabindex="-1">
	<section class="container">
		<div class="not-found-page__inner">
			<div>
				<p class="not-found-page__eyebrow"><?php esc_html_e( '404 · Page Not Found', 'alder-stone' ); ?></p>
				<h1 class="not-found-page__title"><?php esc_html_e( 'This path has not been drawn yet.', 'alder-stone' ); ?></h1>
				<p class="not-found-page__text"><?php esc_html_e( 'The page may have moved, changed name or never existed. Let’s take you back to the work.', 'alder-stone' ); ?></p>
				<a class="not-found-page__link" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Return home', 'alder-stone' ); ?><span aria-hidden="true">→</span></a>
			</div>
			<p class="not-found-page__code" aria-hidden="true">404</p>
		</div>
	</section>
</main>
<?php get_footer(); ?>
