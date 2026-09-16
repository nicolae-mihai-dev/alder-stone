<?php
/**
 * The footer for the Alder Stone theme.
 *
 * @package AlderStone
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

	<footer class="site-footer alder-stone-footer" id="colophon">
		<div class="container">
			<div class="row gy-4 align-items-start">
				<div class="col-lg-6">
					<a class="alder-stone-brand alder-stone-footer-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>">
						<svg class="alder-stone-brand__mark" viewBox="0 0 64 64" aria-hidden="true" focusable="false">
							<path class="alder-stone-brand__mark-primary" d="M6 39c0-16 12-28 28-28 12 0 22 6 25 17 3 13-5 25-20 28C23 59 6 53 6 39Z" />
							<path class="alder-stone-brand__mark-secondary" d="M16 48C5 35 12 13 30 7c12-4 23 1 27 12-7 1-12 4-16 9-5 7-7 15-7 22-7 2-13 1-18-2Z" />
							<path class="alder-stone-brand__mark-detail" d="M22 49c8-10 13-19 16-31m-7 13 10-4m-7-7 5-7m-10 22-7-5" />
						</svg>
						<span class="alder-stone-brand__wordmark"><?php esc_html_e( 'ALDER & STONE', 'alder-stone' ); ?></span>
					</a>
					<p class="alder-stone-footer-intro mb-0"><?php esc_html_e( 'Architecture shaped by purpose, material and place.', 'alder-stone' ); ?></p>
				</div>

				<div class="col-lg-6">
					<address class="alder-stone-footer-contact mb-0">
						<a href="mailto:hello@alderstone.com">hello@alderstone.com</a>
						<span><?php esc_html_e( 'Bucharest, Romania', 'alder-stone' ); ?></span>
					</address>
				</div>
			</div>

			<div class="alder-stone-footer-bottom">
				<p class="mb-0">
					&copy; <?php echo esc_html( wp_date( 'Y' ) ); ?> <?php esc_html_e( 'Alder & Stone.', 'alder-stone' ); ?>
					<?php esc_html_e( 'All rights reserved.', 'alder-stone' ); ?>
				</p>
			</div>
		</div>
	</footer>

</div>

<?php wp_footer(); ?>

</body>
</html>
