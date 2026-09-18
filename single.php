<?php
/**
 * The template for displaying a Journal article.
 *
 * @package AlderStone
 */

defined( 'ABSPATH' ) || exit;

get_header();
?>

<main class="site-main journal-article" id="content" tabindex="-1">
	<?php while ( have_posts() ) : ?>
		<?php
		the_post();
		$post_id      = get_the_ID();
		$categories   = get_the_category( $post_id );
		$category_name = $categories ? $categories[0]->name : __( 'Journal', 'alder-stone' );
		$word_count   = str_word_count( wp_strip_all_tags( get_post_field( 'post_content', $post_id ) ) );
		$reading_time = max( 1, (int) ceil( $word_count / 220 ) );
		?>
		<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
			<header class="journal-article__hero">
				<div class="container">
					<p class="alder-eyebrow journal-article__eyebrow"><?php echo esc_html( $category_name ); ?></p>
					<h1 class="alder-heading journal-article__title"><?php the_title(); ?></h1>
					<p class="journal-article__meta"><?php echo esc_html( get_the_date( 'F j, Y' ) . ' · ' . sprintf( _n( '%d min read', '%d min read', $reading_time, 'alder-stone' ), $reading_time ) ); ?></p>
					<?php if ( has_post_thumbnail() ) : ?>
						<figure class="journal-article__media">
							<?php the_post_thumbnail( 'full', array( 'class' => 'journal-article__image', 'fetchpriority' => 'high', 'loading' => 'eager', 'sizes' => '(min-width: 1200px) 58.125rem, 100vw' ) ); ?>
						</figure>
					<?php endif; ?>
				</div>
			</header>

			<section class="journal-article__body">
				<div class="container">
					<div class="journal-article__content entry-content">
						<?php the_content(); ?>
					</div>
				</div>
			</section>

			<?php
			$related_posts = new WP_Query(
				array(
					'category__in'   => wp_list_pluck( $categories, 'term_id' ),
					'ignore_sticky_posts' => true,
					'posts_per_page' => 3,
					'post__not_in'   => array( $post_id ),
				)
			);
			?>
			<?php if ( $related_posts->have_posts() ) : ?>
				<section class="journal-related" aria-labelledby="journal-related-title-<?php echo esc_attr( $post_id ); ?>">
					<div class="container">
						<p class="alder-eyebrow journal-related__eyebrow"><?php esc_html_e( 'Continue reading', 'alder-stone' ); ?></p>
						<h2 class="alder-heading-section journal-related__title" id="journal-related-title-<?php echo esc_attr( $post_id ); ?>"><?php esc_html_e( 'More from the Journal', 'alder-stone' ); ?></h2>
						<div class="journal-grid">
							<?php while ( $related_posts->have_posts() ) : ?>
								<?php $related_posts->the_post(); ?>
								<?php get_template_part( 'template-parts/journal-card' ); ?>
							<?php endwhile; ?>
						</div>
					</div>
				</section>
				<?php wp_reset_postdata(); ?>
			<?php endif; ?>
		</article>
	<?php endwhile; ?>
</main>

<?php get_footer(); ?>
