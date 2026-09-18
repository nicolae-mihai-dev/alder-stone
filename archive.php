<?php
/**
 * The archive template for Journal categories, tags and dates.
 *
 * @package AlderStone
 */

defined( 'ABSPATH' ) || exit;

get_header();
?>

<main class="site-main journal-archive" id="content" tabindex="-1">
	<section class="journal-archive__hero">
		<div class="container">
			<p class="alder-eyebrow journal-archive__eyebrow"><?php esc_html_e( 'Journal', 'alder-stone' ); ?></p>
			<h1 class="alder-heading journal-archive__title"><?php the_archive_title(); ?></h1>
			<?php if ( get_the_archive_description() ) : ?><div class="alder-copy journal-archive__intro"><?php the_archive_description(); ?></div><?php endif; ?>
		</div>
	</section>

	<section class="journal-archive__collection" aria-label="<?php esc_attr_e( 'Journal articles', 'alder-stone' ); ?>">
		<div class="container">
			<?php if ( have_posts() ) : ?>
				<div class="journal-grid">
					<?php while ( have_posts() ) : ?>
						<?php the_post(); ?>
						<?php get_template_part( 'template-parts/journal-card' ); ?>
					<?php endwhile; ?>
				</div>

				<?php the_posts_pagination( array( 'mid_size' => 1 ) ); ?>
			<?php else : ?>
				<p class="alder-copy journal-archive__empty"><?php esc_html_e( 'No articles have been published in this collection yet.', 'alder-stone' ); ?></p>
			<?php endif; ?>
		</div>
	</section>
</main>

<?php get_footer(); ?>
