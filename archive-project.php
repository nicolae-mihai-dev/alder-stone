<?php
/**
 * The template for displaying the Project archive.
 *
 * @package AlderStone
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

$container = get_theme_mod( 'understrap_container_type' );
?>

<div class="wrapper" id="project-archive-wrapper">

	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">

		<main class="site-main" id="main">

			<header class="page-header">
				<?php the_archive_title( '<h1 class="page-title">', '</h1>' ); ?>
			</header>

			<?php if ( have_posts() ) : ?>
				<div class="row">
					<?php
					while ( have_posts() ) :
						the_post();

						$project_id       = get_the_ID();
						$project_location = function_exists( 'get_field' ) ? get_field( 'project_location', $project_id ) : get_post_meta( $project_id, 'project_location', true );
						$project_year     = function_exists( 'get_field' ) ? get_field( 'project_year', $project_id ) : get_post_meta( $project_id, 'project_year', true );
						?>

						<article <?php post_class( 'col-md-6 mb-4' ); ?> id="post-<?php the_ID(); ?>">
							<?php if ( has_post_thumbnail() ) : ?>
								<a class="d-block mb-3" href="<?php echo esc_url( get_permalink() ); ?>">
									<?php the_post_thumbnail( 'large', array( 'class' => 'img-fluid' ) ); ?>
								</a>
							<?php endif; ?>

							<header class="entry-header">
								<h2 class="entry-title h3">
									<a href="<?php echo esc_url( get_permalink() ); ?>">
										<?php echo esc_html( get_the_title() ); ?>
									</a>
								</h2>
							</header>

							<?php if ( has_excerpt() ) : ?>
								<div class="entry-summary">
									<?php the_excerpt(); ?>
								</div>
							<?php endif; ?>

							<?php if ( ! empty( $project_location ) || '' !== (string) $project_year ) : ?>
								<div class="project-meta">
									<?php if ( ! empty( $project_location ) ) : ?>
										<p class="mb-1"><strong><?php esc_html_e( 'Location:', 'alder-stone' ); ?></strong> <?php echo esc_html( $project_location ); ?></p>
									<?php endif; ?>

									<?php if ( '' !== (string) $project_year ) : ?>
										<p class="mb-0"><strong><?php esc_html_e( 'Year:', 'alder-stone' ); ?></strong> <?php echo esc_html( $project_year ); ?></p>
									<?php endif; ?>
								</div>
							<?php endif; ?>
						</article>

					<?php endwhile; ?>
				</div>

				<?php the_posts_pagination(); ?>

			<?php else : ?>
				<p><?php esc_html_e( 'No projects found.', 'alder-stone' ); ?></p>
			<?php endif; ?>

		</main>

	</div>

</div>

<?php
get_footer();
