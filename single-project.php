<?php
/**
 * The template for displaying a single Project.
 *
 * @package AlderStone
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

$container = get_theme_mod( 'understrap_container_type' );
?>

<div class="wrapper" id="single-project-wrapper">

	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">

		<main class="site-main" id="main">

			<?php
			while ( have_posts() ) :
				the_post();

				$project_id       = get_the_ID();
				$project_location = function_exists( 'get_field' ) ? get_field( 'project_location', $project_id ) : get_post_meta( $project_id, 'project_location', true );
				$project_year     = function_exists( 'get_field' ) ? get_field( 'project_year', $project_id ) : get_post_meta( $project_id, 'project_year', true );
				$project_client   = function_exists( 'get_field' ) ? get_field( 'project_client', $project_id ) : get_post_meta( $project_id, 'project_client', true );
				$project_type     = function_exists( 'get_field' ) ? get_field( 'project_type', $project_id ) : get_post_meta( $project_id, 'project_type', true );

				$has_project_details = ! empty( $project_location ) || '' !== (string) $project_year || ! empty( $project_client ) || ! empty( $project_type );
				?>

				<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
					<header class="entry-header">
						<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
					</header>

					<?php if ( has_post_thumbnail() ) : ?>
						<div class="project-featured-image mb-4">
							<?php the_post_thumbnail( 'large', array( 'class' => 'img-fluid' ) ); ?>
						</div>
					<?php endif; ?>

					<div class="entry-content">
						<?php the_content(); ?>
					</div>

					<?php if ( $has_project_details ) : ?>
						<section class="project-details mt-4" aria-labelledby="project-details-title">
							<h2 class="h3" id="project-details-title"><?php esc_html_e( 'Project Details', 'alder-stone' ); ?></h2>
							<dl>
								<?php if ( ! empty( $project_location ) ) : ?>
									<dt><?php esc_html_e( 'Location', 'alder-stone' ); ?></dt>
									<dd><?php echo esc_html( $project_location ); ?></dd>
								<?php endif; ?>

								<?php if ( '' !== (string) $project_year ) : ?>
									<dt><?php esc_html_e( 'Year', 'alder-stone' ); ?></dt>
									<dd><?php echo esc_html( $project_year ); ?></dd>
								<?php endif; ?>

								<?php if ( ! empty( $project_client ) ) : ?>
									<dt><?php esc_html_e( 'Client', 'alder-stone' ); ?></dt>
									<dd><?php echo esc_html( $project_client ); ?></dd>
								<?php endif; ?>

								<?php if ( ! empty( $project_type ) ) : ?>
									<dt><?php esc_html_e( 'Project Type', 'alder-stone' ); ?></dt>
									<dd><?php echo esc_html( $project_type ); ?></dd>
								<?php endif; ?>
							</dl>
						</section>
					<?php endif; ?>
				</article>

			<?php endwhile; ?>

		</main>

	</div>

</div>

<?php
get_footer();
