<?php
/**
 * The Journal archive, powered by native WordPress Posts.
 *
 * Assign a page called "Journal" as the Posts page in Settings > Reading.
 *
 * @package AlderStone
 */

defined( 'ABSPATH' ) || exit;

$posts_page_id = (int) get_option( 'page_for_posts' );
$journal_title = $posts_page_id ? get_the_title( $posts_page_id ) : __( 'Journal', 'alder-stone' );
$journal_url   = $posts_page_id ? get_permalink( $posts_page_id ) : home_url( '/' );
$categories    = get_categories(
	array(
		'hide_empty' => true,
		'exclude'    => get_cat_ID( 'Uncategorized' ),
	)
);

get_header();
?>

<main class="site-main journal-archive" id="content" tabindex="-1">
	<section class="journal-archive__hero">
		<div class="container">
			<p class="alder-eyebrow journal-archive__eyebrow"><?php esc_html_e( 'Alder & Stone', 'alder-stone' ); ?></p>
			<h1 class="alder-heading journal-archive__title"><?php echo esc_html( $journal_title ); ?></h1>
			<p class="alder-copy journal-archive__intro"><?php esc_html_e( 'Practical notes on architecture, construction and the decisions that shape places made to last.', 'alder-stone' ); ?></p>
		</div>
	</section>

	<section class="journal-archive__collection" aria-label="<?php esc_attr_e( 'Journal articles', 'alder-stone' ); ?>">
		<div class="container">
			<?php if ( $categories ) : ?>
				<nav class="journal-categories" aria-label="<?php esc_attr_e( 'Journal categories', 'alder-stone' ); ?>">
					<a class="journal-categories__link<?php echo is_home() ? ' is-current' : ''; ?>" href="<?php echo esc_url( $journal_url ); ?>"><?php esc_html_e( 'All articles', 'alder-stone' ); ?></a>
					<?php foreach ( $categories as $category ) : ?>
						<a class="journal-categories__link" href="<?php echo esc_url( get_category_link( $category ) ); ?>"><?php echo esc_html( $category->name ); ?></a>
					<?php endforeach; ?>
				</nav>
			<?php endif; ?>

			<?php if ( have_posts() ) : ?>
				<div class="journal-grid">
					<?php while ( have_posts() ) : ?>
						<?php the_post(); ?>
						<?php get_template_part( 'template-parts/journal-card' ); ?>
					<?php endwhile; ?>
				</div>

				<?php the_posts_pagination( array( 'mid_size' => 1 ) ); ?>
			<?php else : ?>
				<div class="journal-archive__empty">
					<h2 class="alder-heading-item"><?php esc_html_e( 'The first notes are on their way.', 'alder-stone' ); ?></h2>
					<p class="alder-copy"><?php esc_html_e( 'We are preparing practical articles on architecture, construction and thoughtful project decisions. Please check back soon.', 'alder-stone' ); ?></p>
				</div>
			<?php endif; ?>
		</div>
	</section>
</main>

<?php get_footer(); ?>
