<?php
/**
 * The template for displaying the Project archive.
 *
 * @package AlderStone
 */

defined( 'ABSPATH' ) || exit;

get_header();
?>

<main class="site-main projects-archive" id="content" tabindex="-1">
	<section class="projects-archive__hero">
		<div class="container">
			<div class="projects-archive__hero-inner">
				<p class="projects-eyebrow"><?php esc_html_e( 'Selected Work', 'alder-stone' ); ?></p>
				<h1 class="projects-archive__title"><?php esc_html_e( 'Spaces made for the life around them.', 'alder-stone' ); ?></h1>
				<p class="projects-archive__intro"><?php esc_html_e( 'A selection of homes and workplaces shaped by context, material and the people who use them every day.', 'alder-stone' ); ?></p>
			</div>
		</div>
	</section>

	<section class="projects-archive__collection" aria-label="<?php esc_attr_e( 'Project collection', 'alder-stone' ); ?>">
		<div class="container">
			<?php if ( have_posts() ) : ?>
				<div class="projects-grid">
					<?php while ( have_posts() ) : ?>
						<?php
						the_post();
						$project_id       = get_the_ID();
						$project_location = function_exists( 'get_field' ) ? get_field( 'project_location', $project_id ) : get_post_meta( $project_id, 'project_location', true );
						$project_year     = function_exists( 'get_field' ) ? get_field( 'project_year', $project_id ) : get_post_meta( $project_id, 'project_year', true );
						$project_type     = function_exists( 'get_field' ) ? get_field( 'project_type', $project_id ) : get_post_meta( $project_id, 'project_type', true );
						?>
						<article <?php post_class( 'project-card' ); ?> id="post-<?php the_ID(); ?>">
							<a class="project-card__link" href="<?php echo esc_url( get_permalink() ); ?>">
								<?php if ( has_post_thumbnail() ) : ?>
									<figure class="project-card__media">
										<?php the_post_thumbnail( 'large', array( 'class' => 'project-card__image', 'sizes' => '(min-width: 992px) 50vw, 100vw' ) ); ?>
									</figure>
								<?php else : ?>
									<div class="project-card__placeholder" aria-hidden="true"><span><?php echo esc_html( $project_type ? $project_type : __( 'Alder & Stone', 'alder-stone' ) ); ?></span></div>
								<?php endif; ?>

								<div class="project-card__content">
									<p class="project-card__index"><?php echo esc_html( sprintf( '%02d', $wp_query->current_post + 1 ) ); ?></p>
									<h2 class="project-card__title"><?php the_title(); ?></h2>
									<p class="project-card__meta">
										<?php echo esc_html( $project_type ? $project_type : __( 'Architecture', 'alder-stone' ) ); ?>
										<?php if ( $project_location || $project_year ) : ?><span aria-hidden="true">·</span><?php endif; ?>
										<?php echo esc_html( $project_location ? $project_location : $project_year ); ?>
									</p>
								</div>
							</a>
						</article>
					<?php endwhile; ?>
				</div>

				<?php the_posts_pagination(); ?>
			<?php else : ?>
				<p class="projects-archive__empty"><?php esc_html_e( 'New case studies are being prepared. Please check back soon.', 'alder-stone' ); ?></p>
			<?php endif; ?>
		</div>
	</section>
</main>

<?php get_footer(); ?>
