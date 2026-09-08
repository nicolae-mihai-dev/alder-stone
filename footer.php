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
					<p class="alder-stone-footer-brand mb-3"><?php esc_html_e( 'ALDER & STONE', 'alder-stone' ); ?></p>
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
