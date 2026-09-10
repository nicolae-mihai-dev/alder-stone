<?php
/**
 * The template for displaying a Project case study.
 *
 * @package AlderStone
 */

defined( 'ABSPATH' ) || exit;

get_header();
?>

<main class="site-main project-case-study" id="content" tabindex="-1">
	<?php while ( have_posts() ) : ?>
		<?php
		the_post();
		$project_id = get_the_ID();
		$defaults   = array(
			'northline-offices' => array(
				'project_scope'    => __( 'Workplace strategy · Architecture · Delivery', 'alder-stone' ),
				'project_area'     => '4,800 m²',
				'project_challenge' => __( 'The brief called for a workplace that could feel composed and generous while adapting to changing teams, technologies and ways of working.', 'alder-stone' ),
				'project_response'  => __( 'We organised the building around daylight, shared thresholds and a clear structural rhythm. Flexible floor plates give teams room to change without losing the building’s sense of order.', 'alder-stone' ),
				'project_outcome'   => __( 'Northline brings a calm public face to a busy commercial setting, with resilient spaces that support focus, collaboration and long-term use.', 'alder-stone' ),
			),
			'courtyard-residence' => array(
				'project_scope'    => __( 'Architecture · Interiors · Landscape coordination', 'alder-stone' ),
				'project_area'     => '310 m²',
				'project_challenge' => __( 'The house needed privacy from the street without turning away from its landscape or the strong Texas light that defines daily life there.', 'alder-stone' ),
				'project_response'  => __( 'A sheltered courtyard became the project’s centre of gravity. Brick, timber and deep openings establish shade, texture and a sequence of rooms that open gradually to the garden.', 'alder-stone' ),
				'project_outcome'   => __( 'The finished home feels protected yet open: a set of quiet, material-rich spaces that make outdoor living part of the everyday routine.', 'alder-stone' ),
			),
			'stone-house' => array(
				'project_scope'    => __( 'Concept design · Planning · Technical design', 'alder-stone' ),
				'project_area'     => '420 m²',
				'project_challenge' => __( 'The aim was to make a substantial mountain home feel anchored rather than oversized, with winter performance and family life considered from the first sketch.', 'alder-stone' ),
				'project_response'  => __( 'The design works with the slope through low, stepped volumes and a durable palette of stone, timber and darkened metal. Views are carefully framed rather than simply maximised.', 'alder-stone' ),
				'project_outcome'   => __( 'Stone House is a robust retreat with a warm interior character, made to hold both expansive landscape views and close family gatherings.', 'alder-stone' ),
			),
		);
		$project_defaults = $defaults[ get_post_field( 'post_name', $project_id ) ] ?? array();
		$get_project_field = static function( $field_name ) use ( $project_id, $project_defaults ) {
			$value = function_exists( 'get_field' ) ? get_field( $field_name, $project_id ) : get_post_meta( $project_id, $field_name, true );

			return null !== $value && '' !== $value && false !== $value ? $value : ( $project_defaults[ $field_name ] ?? null );
		};
		$location  = $get_project_field( 'project_location' );
		$year      = $get_project_field( 'project_year' );
		$client    = $get_project_field( 'project_client' );
		$type      = $get_project_field( 'project_type' );
		$scope     = $get_project_field( 'project_scope' );
		$area      = $get_project_field( 'project_area' );
		$challenge = $get_project_field( 'project_challenge' );
		$response  = $get_project_field( 'project_response' );
		$outcome   = $get_project_field( 'project_outcome' );
		$gallery   = $get_project_field( 'project_gallery' );
		$quote     = $get_project_field( 'project_quote' );
		$quote_by  = $get_project_field( 'project_quote_attribution' );
		$facts     = array_filter( array( __( 'Location', 'alder-stone' ) => $location, __( 'Year', 'alder-stone' ) => $year, __( 'Client', 'alder-stone' ) => $client, __( 'Type', 'alder-stone' ) => $type, __( 'Scope', 'alder-stone' ) => $scope, __( 'Scale', 'alder-stone' ) => $area ) );
		?>
		<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
			<section class="project-hero">
				<div class="container">
					<div class="project-hero__header">
						<p class="projects-eyebrow"><?php echo esc_html( $type ? $type : __( 'Selected Project', 'alder-stone' ) ); ?></p>
						<h1 class="project-hero__title"><?php the_title(); ?></h1>
						<?php if ( $location || $year ) : ?><p class="project-hero__meta"><?php echo esc_html( trim( $location . ( $location && $year ? ' · ' : '' ) . $year ) ); ?></p><?php endif; ?>
					</div>
					<?php if ( has_post_thumbnail() ) : ?><figure class="project-hero__media"><?php the_post_thumbnail( 'full', array( 'class' => 'project-hero__image', 'fetchpriority' => 'high', 'loading' => 'eager', 'sizes' => '100vw' ) ); ?></figure><?php endif; ?>
				</div>
			</section>

			<section class="project-overview">
				<div class="container"><div class="project-overview__grid">
					<div><p class="projects-eyebrow"><?php esc_html_e( 'Project Overview', 'alder-stone' ); ?></p></div>
					<div class="project-overview__content entry-content"><?php the_content(); ?></div>
					<?php if ( $facts ) : ?><dl class="project-facts"><?php foreach ( $facts as $label => $value ) : ?><div><dt><?php echo esc_html( $label ); ?></dt><dd><?php echo esc_html( $value ); ?></dd></div><?php endforeach; ?></dl><?php endif; ?>
				</div></div>
			</section>

			<?php if ( $challenge || $response ) : ?><section class="project-story"><div class="container"><div class="project-story__grid">
				<?php if ( $challenge ) : ?><div><p class="projects-eyebrow"><?php esc_html_e( 'The Challenge', 'alder-stone' ); ?></p><p><?php echo esc_html( $challenge ); ?></p></div><?php endif; ?>
				<?php if ( $response ) : ?><div><p class="projects-eyebrow"><?php esc_html_e( 'Our Response', 'alder-stone' ); ?></p><p><?php echo esc_html( $response ); ?></p></div><?php endif; ?>
			</div></div></section><?php endif; ?>

			<?php if ( is_array( $gallery ) && $gallery ) : ?><section class="project-gallery"><div class="container"><div class="project-gallery__grid"><?php foreach ( $gallery as $image_id ) : ?><figure><?php echo wp_get_attachment_image( absint( $image_id ), 'large', false, array( 'loading' => 'lazy' ) ); ?></figure><?php endforeach; ?></div></div></section><?php endif; ?>

			<?php if ( $outcome || $quote ) : ?><section class="project-outcome"><div class="container"><div class="project-outcome__inner">
				<?php if ( $outcome ) : ?><div><p class="projects-eyebrow"><?php esc_html_e( 'The Outcome', 'alder-stone' ); ?></p><h2><?php echo esc_html( $outcome ); ?></h2></div><?php endif; ?>
				<?php if ( $quote ) : ?><blockquote><p>“<?php echo esc_html( $quote ); ?>”</p><?php if ( $quote_by ) : ?><cite><?php echo esc_html( $quote_by ); ?></cite><?php endif; ?></blockquote><?php endif; ?>
			</div></div></section><?php endif; ?>
		</article>
	<?php endwhile; ?>
</main>

<?php get_footer(); ?>
