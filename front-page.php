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

$is_placeholder_statistic_value = static function( $value ) {
	$normalized_value = strtoupper( trim( wp_strip_all_tags( (string) $value ) ) );

	return in_array( $normalized_value, array( 'X', 'XX', '-', '—' ), true );
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
$intro_image   = absint( $get_home_field( 'home_intro_image' ) );
$about_page       = get_page_by_path( 'about' );
$about_url        = $about_page ? get_permalink( $about_page ) : '';
$about_principles = array(
	array(
		'number' => '01',
		'label'  => __( 'People First', 'alder-stone' ),
	),
	array(
		'number' => '02',
		'label'  => __( 'Places Matter', 'alder-stone' ),
	),
	array(
		'number' => '03',
		'label'  => __( 'A Lasting Tomorrow', 'alder-stone' ),
	),
);

// Services fields.
$services_eyebrow = $get_home_field( 'home_services_eyebrow' );
$services_title   = $get_home_field( 'home_services_title' );
$services_page    = get_page_by_path( 'services' );
$services_url     = $services_page ? get_permalink( $services_page ) : '';
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

$projects_archive_url     = get_post_type_archive_link( 'project' );
$cta_background_image_id = isset( $featured_projects[2] ) ? get_post_thumbnail_id( $featured_projects[2]->ID ) : 0;

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

<main class="site-main home-page" id="content" tabindex="-1">

	<?php if ( $has_value( $hero_eyebrow ) || $has_value( $hero_title ) || $has_value( $hero_text ) || $hero_image || ! empty( $hero_button ) ) : ?>
		<section class="home-hero<?php echo esc_attr( $hero_image ? ' home-hero--with-media' : '' ); ?>">
			<?php if ( $hero_image ) : ?>
				<figure class="home-hero__media" aria-hidden="true">
					<?php echo wp_get_attachment_image( $hero_image, 'full', false, array( 'class' => 'home-hero__image', 'alt' => '' ) ); ?>
				</figure>
			<?php endif; ?>

			<div class="container">
				<div class="home-hero__grid">
					<div class="home-hero__content">
						<?php if ( $has_value( $hero_eyebrow ) ) : ?>
							<p class="home-eyebrow"><?php echo esc_html( $hero_eyebrow ); ?></p>
						<?php endif; ?>

						<?php if ( $has_value( $hero_title ) ) : ?>
							<h1 class="home-hero__title"><?php echo esc_html( $hero_title ); ?></h1>
						<?php endif; ?>

						<?php if ( $has_value( $hero_text ) ) : ?>
							<div class="home-hero__text">
								<?php echo wp_kses_post( wpautop( esc_html( $hero_text ) ) ); ?>
							</div>
						<?php endif; ?>

						<?php if ( is_array( $hero_button ) && ! empty( $hero_button['url'] ) && ! empty( $hero_button['title'] ) ) : ?>
							<?php
							$hero_button_target = ! empty( $hero_button['target'] ) ? $hero_button['target'] : '_self';
							$hero_button_rel    = '_blank' === $hero_button_target ? 'noopener noreferrer' : '';
							?>
							<a class="home-text-link" href="<?php echo esc_url( $hero_button['url'] ); ?>" target="<?php echo esc_attr( $hero_button_target ); ?>"<?php echo $hero_button_rel ? ' rel="' . esc_attr( $hero_button_rel ) . '"' : ''; ?>>
								<?php echo esc_html( $hero_button['title'] ); ?>
							</a>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</section>
	<?php endif; ?>

	<?php if ( $has_value( $intro_eyebrow ) || $has_value( $intro_title ) || $has_value( $intro_text ) || $intro_image ) : ?>
		<section class="about-intro<?php echo esc_attr( $intro_image ? ' about-intro--with-visual' : '' ); ?>">
			<div class="container">
				<div class="about-intro__inner">
					<div class="about-intro__content">
						<?php if ( $has_value( $intro_eyebrow ) ) : ?>
							<p class="about-intro__eyebrow">
								<span><?php echo esc_html( $intro_eyebrow ); ?></span>
							</p>
						<?php endif; ?>
						<?php if ( $has_value( $intro_title ) ) : ?>
							<h2 class="about-intro__title"><?php echo esc_html( $intro_title ); ?></h2>
						<?php endif; ?>

						<?php if ( $has_value( $intro_text ) ) : ?>
							<div class="about-intro__copy entry-content">
								<?php echo wp_kses_post( apply_filters( 'the_content', $intro_text ) ); ?>
							</div>
						<?php endif; ?>

						<?php if ( $about_url ) : ?>
							<a class="home-text-link about-intro__link" href="<?php echo esc_url( $about_url ); ?>">
								<?php esc_html_e( 'Our Story', 'alder-stone' ); ?>
							</a>
						<?php endif; ?>

						<ul class="about-intro__principles">
							<?php foreach ( $about_principles as $about_principle ) : ?>
								<li class="about-intro__principle">
									<span class="about-intro__principle-number"><?php echo esc_html( $about_principle['number'] ); ?></span>
									<span class="about-intro__principle-label"><?php echo esc_html( $about_principle['label'] ); ?></span>
								</li>
							<?php endforeach; ?>
						</ul>
					</div>

					<?php if ( $intro_image ) : ?>
						<figure class="about-intro__visual">
							<div class="about-intro__image-wrap">
								<?php echo wp_get_attachment_image( $intro_image, 'large', false, array( 'class' => 'about-intro__image' ) ); ?>
							</div>
						</figure>
					<?php endif; ?>
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
		<section class="home-services">
			<div class="container">
				<?php if ( $has_value( $services_eyebrow ) || $has_value( $services_title ) ) : ?>
					<header class="home-section-header">
						<div>
							<?php if ( $has_value( $services_eyebrow ) ) : ?>
								<p class="home-eyebrow"><?php echo esc_html( $services_eyebrow ); ?></p>
							<?php endif; ?>

							<?php if ( $has_value( $services_title ) ) : ?>
								<h2 class="home-section-title"><?php echo esc_html( $services_title ); ?></h2>
							<?php endif; ?>
						</div>
					</header>
				<?php endif; ?>

				<div class="home-services__list">
					<?php foreach ( $available_services as $service_index => $service ) : ?>
						<article class="home-service">
							<p class="home-service__number"><?php echo esc_html( sprintf( '%02d', $service_index + 1 ) ); ?></p>

							<?php if ( $has_value( $service['title'] ) ) : ?>
								<h3 class="home-service__title"><?php echo esc_html( $service['title'] ); ?></h3>
							<?php endif; ?>

							<?php if ( $has_value( $service['text'] ) ) : ?>
								<div class="home-service__text"><?php echo wp_kses_post( wpautop( esc_html( $service['text'] ) ) ); ?></div>
							<?php endif; ?>
						</article>
					<?php endforeach; ?>
				</div>

				<?php if ( $services_url ) : ?>
					<div class="home-services__cta">
						<a class="home-text-link" href="<?php echo esc_url( $services_url ); ?>">
							<?php esc_html_e( 'Explore Services', 'alder-stone' ); ?>
						</a>
					</div>
				<?php endif; ?>
			</div>
		</section>
	<?php endif; ?>

	<?php if ( ! empty( $featured_projects ) ) : ?>
		<section class="home-featured-projects">
			<div class="container">
				<?php if ( $has_value( $projects_eyebrow ) || $has_value( $projects_title ) ) : ?>
					<header class="home-section-header home-section-header--projects">
						<div>
							<?php if ( $has_value( $projects_eyebrow ) ) : ?>
								<p class="home-eyebrow"><?php echo esc_html( $projects_eyebrow ); ?></p>
							<?php endif; ?>

							<?php if ( $has_value( $projects_title ) ) : ?>
								<h2 class="home-section-title"><?php echo esc_html( $projects_title ); ?></h2>
							<?php endif; ?>
						</div>

						<?php if ( $projects_archive_url ) : ?>
							<a class="home-section-link" href="<?php echo esc_url( $projects_archive_url ); ?>">
								<?php esc_html_e( 'View all projects', 'alder-stone' ); ?>
								<span aria-hidden="true">&rarr;</span>
							</a>
						<?php endif; ?>
					</header>
				<?php endif; ?>

				<div class="home-featured-projects__grid">
					<?php foreach ( $featured_projects as $project_index => $featured_project ) : ?>
						<?php
						$project_id       = $featured_project->ID;
						$project_location = function_exists( 'get_field' ) ? get_field( 'project_location', $project_id ) : get_post_meta( $project_id, 'project_location', true );
						$project_year     = function_exists( 'get_field' ) ? get_field( 'project_year', $project_id ) : get_post_meta( $project_id, 'project_year', true );
						$project_image_size = 0 === $project_index ? 'full' : 'large';
						$project_image_attributes = array(
							'class' => 'home-project__image',
						);

						if ( 0 === $project_index ) {
							$project_image_attributes['sizes'] = '(min-width: 1200px) 42vw, 100vw';
						}
						?>

						<article class="home-project<?php echo esc_attr( 0 === $project_index ? ' home-project--primary' : '' ); ?>">
							<a class="home-project__link" href="<?php echo esc_url( get_permalink( $project_id ) ); ?>">
								<?php if ( has_post_thumbnail( $project_id ) ) : ?>
									<figure class="home-project__media">
										<?php echo get_the_post_thumbnail( $project_id, $project_image_size, $project_image_attributes ); ?>
									</figure>
								<?php endif; ?>

								<h3 class="home-project__title"><?php echo esc_html( get_the_title( $project_id ) ); ?></h3>

								<?php if ( $has_value( $project_location ) || $has_value( $project_year ) ) : ?>
									<p class="home-project__meta">
									<?php if ( $has_value( $project_location ) ) : ?>
										<span><?php echo esc_html( $project_location ); ?></span>
									<?php endif; ?>
									<?php if ( $has_value( $project_location ) && $has_value( $project_year ) ) : ?>
										<span class="home-project__meta-separator" aria-hidden="true">&middot;</span>
									<?php endif; ?>
									<?php if ( $has_value( $project_year ) ) : ?>
										<span><?php echo esc_html( $project_year ); ?></span>
									<?php endif; ?>
									</p>
								<?php endif; ?>
							</a>
						</article>
					<?php endforeach; ?>
				</div>
			</div>
		</section>
	<?php endif; ?>

	<?php
	$available_statistics = array_filter(
		$statistics,
		static function( $statistic ) use ( $has_value, $is_placeholder_statistic_value ) {
			return $has_value( $statistic['value'] ) && ! $is_placeholder_statistic_value( $statistic['value'] );
		}
	);
	?>
	<?php if ( ! empty( $available_statistics ) ) : ?>
		<section class="home-statistics">
			<div class="container">
				<div class="home-statistics__grid">
					<?php foreach ( $available_statistics as $statistic ) : ?>
						<div class="home-statistic">
							<?php if ( $has_value( $statistic['value'] ) ) : ?>
								<p class="home-statistic__value"><?php echo esc_html( $statistic['value'] ); ?></p>
							<?php endif; ?>

							<?php if ( $has_value( $statistic['label'] ) ) : ?>
								<p class="home-statistic__label"><?php echo esc_html( $statistic['label'] ); ?></p>
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
		<section class="home-process">
			<div class="container">
				<?php if ( $has_value( $process_eyebrow ) || $has_value( $process_title ) ) : ?>
					<header class="home-section-header">
						<div>
							<?php if ( $has_value( $process_eyebrow ) ) : ?>
								<p class="home-eyebrow"><?php echo esc_html( $process_eyebrow ); ?></p>
							<?php endif; ?>

							<?php if ( $has_value( $process_title ) ) : ?>
								<h2 class="home-section-title"><?php echo esc_html( $process_title ); ?></h2>
							<?php endif; ?>
						</div>
					</header>
				<?php endif; ?>

				<div class="home-process__list">
					<?php foreach ( $available_process_steps as $process_index => $process_step ) : ?>
						<article class="home-process__step">
							<p class="home-process__number"><?php echo esc_html( sprintf( '%02d', $process_index + 1 ) ); ?></p>

							<?php if ( $has_value( $process_step['title'] ) ) : ?>
								<h3 class="home-process__title"><?php echo esc_html( $process_step['title'] ); ?></h3>
							<?php endif; ?>

							<?php if ( $has_value( $process_step['text'] ) ) : ?>
								<div class="home-process__text"><?php echo wp_kses_post( wpautop( esc_html( $process_step['text'] ) ) ); ?></div>
							<?php endif; ?>
						</article>
					<?php endforeach; ?>
				</div>
			</div>
		</section>
	<?php endif; ?>

	<?php if ( $has_value( $cta_title ) || $has_value( $cta_text ) || ! empty( $cta_button ) ) : ?>
		<section class="home-cta<?php echo esc_attr( $cta_background_image_id ? ' home-cta--with-media' : '' ); ?>">
			<?php if ( $cta_background_image_id ) : ?>
				<figure class="home-cta__media" aria-hidden="true">
					<?php echo wp_get_attachment_image( $cta_background_image_id, 'full', false, array( 'class' => 'home-cta__image', 'alt' => '' ) ); ?>
				</figure>
			<?php endif; ?>

			<div class="container">
				<div class="home-cta__grid">
					<div>
						<?php if ( $has_value( $cta_title ) ) : ?>
							<h2 class="home-cta__title"><?php echo esc_html( $cta_title ); ?></h2>
						<?php endif; ?>
					</div>

					<div>
						<?php if ( $has_value( $cta_text ) ) : ?>
							<div class="home-cta__text"><?php echo wp_kses_post( wpautop( esc_html( $cta_text ) ) ); ?></div>
						<?php endif; ?>

						<?php if ( is_array( $cta_button ) && ! empty( $cta_button['url'] ) && ! empty( $cta_button['title'] ) ) : ?>
							<?php
							$cta_button_target = ! empty( $cta_button['target'] ) ? $cta_button['target'] : '_self';
							$cta_button_rel    = '_blank' === $cta_button_target ? 'noopener noreferrer' : '';
							?>
							<a class="home-cta__link" href="<?php echo esc_url( $cta_button['url'] ); ?>" target="<?php echo esc_attr( $cta_button_target ); ?>"<?php echo $cta_button_rel ? ' rel="' . esc_attr( $cta_button_rel ) . '"' : ''; ?>>
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
