<?php
/**
 * The template for displaying the static front page.
 *
 * @package AlderStone
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$get_home_field = static function( $field_name ) {
	return function_exists( 'get_field' ) ? get_field( $field_name ) : null;
};

$has_value = static function( $value ) {
	return null !== $value && '' !== $value && false !== $value;
};

// Hero fields.
$hero_eyebrow = $get_home_field( 'home_hero_eyebrow' );
$hero_title   = $get_home_field( 'home_hero_title' );
$hero_text    = $get_home_field( 'home_hero_text' );
$hero_image   = absint( $get_home_field( 'home_hero_image' ) );
$hero_button  = $get_home_field( 'home_hero_button' );

// Intro fields.
$intro_eyebrow = $get_home_field( 'home_intro_eyebrow' );
$intro_title   = $get_home_field( 'home_intro_title' );
$intro_text    = $get_home_field( 'home_intro_text' );

// Services fields.
$services_eyebrow = $get_home_field( 'home_services_eyebrow' );
$services_title   = $get_home_field( 'home_services_title' );
$services         = array(
	array(
		'title' => $get_home_field( 'home_service_1_title' ),
		'text'  => $get_home_field( 'home_service_1_text' ),
	),
	array(
		'title' => $get_home_field( 'home_service_2_title' ),
		'text'  => $get_home_field( 'home_service_2_text' ),
	),
	array(
		'title' => $get_home_field( 'home_service_3_title' ),
		'text'  => $get_home_field( 'home_service_3_text' ),
	),
);

// Featured Projects fields.
$projects_eyebrow     = $get_home_field( 'home_projects_eyebrow' );
$projects_title       = $get_home_field( 'home_projects_title' );
$featured_project_ids = array_unique(
	array_filter(
		array_map(
			'absint',
			array(
				$get_home_field( 'home_featured_project_1' ),
				$get_home_field( 'home_featured_project_2' ),
				$get_home_field( 'home_featured_project_3' ),
			)
		)
	)
);
$featured_projects    = array();

foreach ( $featured_project_ids as $featured_project_id ) {
	$featured_project = get_post( $featured_project_id );

	if ( $featured_project && 'project' === $featured_project->post_type ) {
		$featured_projects[] = $featured_project;
	}
}

// Statistics fields.
$statistics = array(
	array(
		'value' => $get_home_field( 'home_stat_1_value' ),
		'label' => $get_home_field( 'home_stat_1_label' ),
	),
	array(
		'value' => $get_home_field( 'home_stat_2_value' ),
		'label' => $get_home_field( 'home_stat_2_label' ),
	),
	array(
		'value' => $get_home_field( 'home_stat_3_value' ),
		'label' => $get_home_field( 'home_stat_3_label' ),
	),
);

// Process fields.
$process_eyebrow = $get_home_field( 'home_process_eyebrow' );
$process_title   = $get_home_field( 'home_process_title' );
$process_steps   = array(
	array(
		'title' => $get_home_field( 'home_process_1_title' ),
		'text'  => $get_home_field( 'home_process_1_text' ),
	),
	array(
		'title' => $get_home_field( 'home_process_2_title' ),
		'text'  => $get_home_field( 'home_process_2_text' ),
	),
	array(
		'title' => $get_home_field( 'home_process_3_title' ),
		'text'  => $get_home_field( 'home_process_3_text' ),
	),
);

// CTA fields.
$cta_title  = $get_home_field( 'home_cta_title' );
$cta_text   = $get_home_field( 'home_cta_text' );
$cta_button = $get_home_field( 'home_cta_button' );

get_header();
?>

<main class="site-main" id="content" tabindex="-1">

	<?php if ( $has_value( $hero_eyebrow ) || $has_value( $hero_title ) || $has_value( $hero_text ) || $hero_image || ! empty( $hero_button ) ) : ?>
		<section class="home-hero py-5">
			<div class="container">
				<div class="row align-items-center g-4">
					<div class="<?php echo esc_attr( $hero_image ? 'col-lg-6' : 'col-lg-8' ); ?>">
						<?php if ( $has_value( $hero_eyebrow ) ) : ?>
							<p class="text-uppercase small mb-3"><?php echo esc_html( $hero_eyebrow ); ?></p>
						<?php endif; ?>

						<?php if ( $has_value( $hero_title ) ) : ?>
							<h1 class="display-4 mb-4"><?php echo esc_html( $hero_title ); ?></h1>
						<?php endif; ?>

						<?php if ( $has_value( $hero_text ) ) : ?>
							<div class="mb-4">
								<?php echo wp_kses_post( wpautop( esc_html( $hero_text ) ) ); ?>
							</div>
						<?php endif; ?>

						<?php if ( is_array( $hero_button ) && ! empty( $hero_button['url'] ) && ! empty( $hero_button['title'] ) ) : ?>
							<?php
							$hero_button_target = ! empty( $hero_button['target'] ) ? $hero_button['target'] : '_self';
							$hero_button_rel    = '_blank' === $hero_button_target ? 'noopener noreferrer' : '';
							?>
							<a class="btn btn-dark" href="<?php echo esc_url( $hero_button['url'] ); ?>" target="<?php echo esc_attr( $hero_button_target ); ?>"<?php echo $hero_button_rel ? ' rel="' . esc_attr( $hero_button_rel ) . '"' : ''; ?>>
								<?php echo esc_html( $hero_button['title'] ); ?>
							</a>
						<?php endif; ?>
					</div>

					<?php if ( $hero_image ) : ?>
						<div class="col-lg-6">
							<?php echo wp_get_attachment_image( $hero_image, 'full', false, array( 'class' => 'img-fluid' ) ); ?>
						</div>
					<?php endif; ?>
				</div>
			</div>
		</section>
	<?php endif; ?>

	<?php if ( $has_value( $intro_eyebrow ) || $has_value( $intro_title ) || $has_value( $intro_text ) ) : ?>
		<section class="home-intro py-5">
			<div class="container">
				<div class="row">
					<div class="col-lg-8">
						<?php if ( $has_value( $intro_eyebrow ) ) : ?>
							<p class="text-uppercase small mb-3"><?php echo esc_html( $intro_eyebrow ); ?></p>
						<?php endif; ?>

						<?php if ( $has_value( $intro_title ) ) : ?>
							<h2 class="mb-4"><?php echo esc_html( $intro_title ); ?></h2>
						<?php endif; ?>

						<?php if ( $has_value( $intro_text ) ) : ?>
							<div class="entry-content">
								<?php echo wp_kses_post( apply_filters( 'the_content', $intro_text ) ); ?>
							</div>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</section>
	<?php endif; ?>

	<?php
	$available_services = array_filter(
		$services,
		static function( $service ) use ( $has_value ) {
			return $has_value( $service['title'] ) || $has_value( $service['text'] );
		}
	);
	?>
	<?php if ( ! empty( $available_services ) ) : ?>
		<section class="home-services py-5">
			<div class="container">
				<?php if ( $has_value( $services_eyebrow ) ) : ?>
					<p class="text-uppercase small mb-3"><?php echo esc_html( $services_eyebrow ); ?></p>
				<?php endif; ?>

				<?php if ( $has_value( $services_title ) ) : ?>
					<h2 class="mb-4"><?php echo esc_html( $services_title ); ?></h2>
				<?php endif; ?>

				<div class="row g-4">
					<?php foreach ( $available_services as $service ) : ?>
						<article class="col-md-4">
							<?php if ( $has_value( $service['title'] ) ) : ?>
								<h3 class="h4 mb-3"><?php echo esc_html( $service['title'] ); ?></h3>
							<?php endif; ?>

							<?php if ( $has_value( $service['text'] ) ) : ?>
								<div><?php echo wp_kses_post( wpautop( esc_html( $service['text'] ) ) ); ?></div>
							<?php endif; ?>
						</article>
					<?php endforeach; ?>
				</div>
			</div>
		</section>
	<?php endif; ?>

	<?php if ( ! empty( $featured_projects ) ) : ?>
		<section class="home-featured-projects py-5">
			<div class="container">
				<?php if ( $has_value( $projects_eyebrow ) ) : ?>
					<p class="text-uppercase small mb-3"><?php echo esc_html( $projects_eyebrow ); ?></p>
				<?php endif; ?>

				<?php if ( $has_value( $projects_title ) ) : ?>
					<h2 class="mb-4"><?php echo esc_html( $projects_title ); ?></h2>
				<?php endif; ?>

				<div class="row g-4">
					<?php foreach ( $featured_projects as $featured_project ) : ?>
						<?php
						$project_id       = $featured_project->ID;
						$project_location = function_exists( 'get_field' ) ? get_field( 'project_location', $project_id ) : get_post_meta( $project_id, 'project_location', true );
						$project_year     = function_exists( 'get_field' ) ? get_field( 'project_year', $project_id ) : get_post_meta( $project_id, 'project_year', true );
						?>

						<article class="col-md-4">
							<?php if ( has_post_thumbnail( $project_id ) ) : ?>
								<a class="d-block mb-3" href="<?php echo esc_url( get_permalink( $project_id ) ); ?>">
									<?php echo get_the_post_thumbnail( $project_id, 'large', array( 'class' => 'img-fluid' ) ); ?>
								</a>
							<?php endif; ?>

							<h3 class="h4 mb-2">
								<a href="<?php echo esc_url( get_permalink( $project_id ) ); ?>">
									<?php echo esc_html( get_the_title( $project_id ) ); ?>
								</a>
							</h3>

							<?php if ( $has_value( $project_location ) || $has_value( $project_year ) ) : ?>
								<p class="mb-0">
									<?php if ( $has_value( $project_location ) ) : ?>
										<span><?php echo esc_html( $project_location ); ?></span>
									<?php endif; ?>
									<?php if ( $has_value( $project_location ) && $has_value( $project_year ) ) : ?>
										<span aria-hidden="true"> &middot; </span>
									<?php endif; ?>
									<?php if ( $has_value( $project_year ) ) : ?>
										<span><?php echo esc_html( $project_year ); ?></span>
									<?php endif; ?>
								</p>
							<?php endif; ?>
						</article>
					<?php endforeach; ?>
				</div>
			</div>
		</section>
	<?php endif; ?>

	<?php
	$available_statistics = array_filter(
		$statistics,
		static function( $statistic ) use ( $has_value ) {
			return $has_value( $statistic['value'] ) || $has_value( $statistic['label'] );
		}
	);
	?>
	<?php if ( ! empty( $available_statistics ) ) : ?>
		<section class="home-statistics py-5">
			<div class="container">
				<div class="row g-4">
					<?php foreach ( $available_statistics as $statistic ) : ?>
						<div class="col-md-4">
							<?php if ( $has_value( $statistic['value'] ) ) : ?>
								<p class="display-6 mb-1"><?php echo esc_html( $statistic['value'] ); ?></p>
							<?php endif; ?>

							<?php if ( $has_value( $statistic['label'] ) ) : ?>
								<p class="mb-0"><?php echo esc_html( $statistic['label'] ); ?></p>
							<?php endif; ?>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
		</section>
	<?php endif; ?>

	<?php
	$available_process_steps = array_filter(
		$process_steps,
		static function( $process_step ) use ( $has_value ) {
			return $has_value( $process_step['title'] ) || $has_value( $process_step['text'] );
		}
	);
	?>
	<?php if ( ! empty( $available_process_steps ) ) : ?>
		<section class="home-process py-5">
			<div class="container">
				<?php if ( $has_value( $process_eyebrow ) ) : ?>
					<p class="text-uppercase small mb-3"><?php echo esc_html( $process_eyebrow ); ?></p>
				<?php endif; ?>

				<?php if ( $has_value( $process_title ) ) : ?>
					<h2 class="mb-4"><?php echo esc_html( $process_title ); ?></h2>
				<?php endif; ?>

				<div class="row g-4">
					<?php foreach ( $available_process_steps as $process_index => $process_step ) : ?>
						<article class="col-md-4">
							<p class="small mb-3"><?php echo esc_html( sprintf( '%02d', $process_index + 1 ) ); ?></p>

							<?php if ( $has_value( $process_step['title'] ) ) : ?>
								<h3 class="h4 mb-3"><?php echo esc_html( $process_step['title'] ); ?></h3>
							<?php endif; ?>

							<?php if ( $has_value( $process_step['text'] ) ) : ?>
								<div><?php echo wp_kses_post( wpautop( esc_html( $process_step['text'] ) ) ); ?></div>
							<?php endif; ?>
						</article>
					<?php endforeach; ?>
				</div>
			</div>
		</section>
	<?php endif; ?>

	<?php if ( $has_value( $cta_title ) || $has_value( $cta_text ) || ! empty( $cta_button ) ) : ?>
		<section class="home-cta py-5">
			<div class="container">
				<div class="row">
					<div class="col-lg-8">
						<?php if ( $has_value( $cta_title ) ) : ?>
							<h2 class="mb-3"><?php echo esc_html( $cta_title ); ?></h2>
						<?php endif; ?>

						<?php if ( $has_value( $cta_text ) ) : ?>
							<div class="mb-4"><?php echo wp_kses_post( wpautop( esc_html( $cta_text ) ) ); ?></div>
						<?php endif; ?>

						<?php if ( is_array( $cta_button ) && ! empty( $cta_button['url'] ) && ! empty( $cta_button['title'] ) ) : ?>
							<?php
							$cta_button_target = ! empty( $cta_button['target'] ) ? $cta_button['target'] : '_self';
							$cta_button_rel    = '_blank' === $cta_button_target ? 'noopener noreferrer' : '';
							?>
							<a class="btn btn-dark" href="<?php echo esc_url( $cta_button['url'] ); ?>" target="<?php echo esc_attr( $cta_button_target ); ?>"<?php echo $cta_button_rel ? ' rel="' . esc_attr( $cta_button_rel ) . '"' : ''; ?>>
								<?php echo esc_html( $cta_button['title'] ); ?>
							</a>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</section>
	<?php endif; ?>

</main>

<?php
get_footer();
