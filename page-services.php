<?php
/**
 * The template for displaying the Services page.
 *
 * @package AlderStone
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
?>

<main class="site-main services-page" id="content" tabindex="-1">
	<?php while ( have_posts() ) : ?>
		<?php the_post(); ?>
		<?php
		$services_page_id = get_the_ID();
		$get_services_field = static function( $field_name ) use ( $services_page_id ) {
			return function_exists( 'get_field' ) ? get_field( $field_name, $services_page_id ) : null;
		};
		$has_value = static function( $value ) {
			return null !== $value && '' !== $value && false !== $value;
		};

		// Hero fields.
		$hero_eyebrow = $get_services_field( 'services_hero_eyebrow' );
		$hero_title   = $get_services_field( 'services_hero_title' );
		$hero_text    = $get_services_field( 'services_hero_text' );

		// Introduction fields.
		$intro_title = $get_services_field( 'services_intro_title' );
		$intro_text  = $get_services_field( 'services_intro_text' );

		// Service item fields.
		$service_items = array(
			array(
				'number' => $get_services_field( 'services_item_1_number' ),
				'title'  => $get_services_field( 'services_item_1_title' ),
				'text'   => $get_services_field( 'services_item_1_text' ),
			),
			array(
				'number' => $get_services_field( 'services_item_2_number' ),
				'title'  => $get_services_field( 'services_item_2_title' ),
				'text'   => $get_services_field( 'services_item_2_text' ),
			),
			array(
				'number' => $get_services_field( 'services_item_3_number' ),
				'title'  => $get_services_field( 'services_item_3_title' ),
				'text'   => $get_services_field( 'services_item_3_text' ),
			),
			array(
				'number' => $get_services_field( 'services_item_4_number' ),
				'title'  => $get_services_field( 'services_item_4_title' ),
				'text'   => $get_services_field( 'services_item_4_text' ),
			),
		);

		// Process fields.
		$process_eyebrow = $get_services_field( 'services_process_eyebrow' );
		$process_title   = $get_services_field( 'services_process_title' );
		$process_text    = $get_services_field( 'services_process_text' );

		// Call to action fields.
		$cta_title  = $get_services_field( 'services_cta_title' );
		$cta_text   = $get_services_field( 'services_cta_text' );
		$cta_button = $get_services_field( 'services_cta_button' );
		?>

		<?php if ( $has_value( $hero_eyebrow ) || $has_value( $hero_title ) || $has_value( $hero_text ) ) : ?>
			<section class="services-page__hero py-5">
				<div class="container">
					<div class="row">
						<div class="col-lg-8">
							<?php if ( $has_value( $hero_eyebrow ) ) : ?>
								<p class="text-uppercase small mb-3"><?php echo esc_html( $hero_eyebrow ); ?></p>
							<?php endif; ?>

							<?php if ( $has_value( $hero_title ) ) : ?>
								<h1 class="mb-4"><?php echo esc_html( $hero_title ); ?></h1>
							<?php endif; ?>

							<?php if ( $has_value( $hero_text ) ) : ?>
								<div class="lead mb-0"><?php echo wp_kses_post( wpautop( esc_html( $hero_text ) ) ); ?></div>
							<?php endif; ?>
						</div>
					</div>
				</div>
			</section>
		<?php endif; ?>

		<?php if ( $has_value( $intro_title ) || $has_value( $intro_text ) ) : ?>
			<section class="services-page__intro py-5">
				<div class="container">
					<div class="row">
						<div class="col-lg-8">
							<?php if ( $has_value( $intro_title ) ) : ?>
								<h2 class="mb-4"><?php echo esc_html( $intro_title ); ?></h2>
							<?php endif; ?>

							<?php if ( $has_value( $intro_text ) ) : ?>
								<div class="entry-content mb-0">
									<?php echo wp_kses_post( apply_filters( 'the_content', $intro_text ) ); ?>
								</div>
							<?php endif; ?>
						</div>
					</div>
				</div>
			</section>
		<?php endif; ?>

		<?php
		$available_service_items = array_filter(
			$service_items,
			static function( $service_item ) use ( $has_value ) {
				return $has_value( $service_item['number'] ) || $has_value( $service_item['title'] ) || $has_value( $service_item['text'] );
			}
		);
		?>
		<?php if ( ! empty( $available_service_items ) ) : ?>
			<section class="services-page__services py-5">
				<div class="container">
					<div class="row g-4">
						<?php foreach ( $available_service_items as $service_item ) : ?>
							<article class="col-md-6">
								<div class="border h-100 p-4">
									<?php if ( $has_value( $service_item['number'] ) ) : ?>
										<p class="small mb-3"><?php echo esc_html( $service_item['number'] ); ?></p>
									<?php endif; ?>

									<?php if ( $has_value( $service_item['title'] ) ) : ?>
										<h2 class="h3 mb-3"><?php echo esc_html( $service_item['title'] ); ?></h2>
									<?php endif; ?>

									<?php if ( $has_value( $service_item['text'] ) ) : ?>
										<div class="mb-0"><?php echo wp_kses_post( wpautop( esc_html( $service_item['text'] ) ) ); ?></div>
									<?php endif; ?>
								</div>
							</article>
						<?php endforeach; ?>
					</div>
				</div>
			</section>
		<?php endif; ?>

		<?php if ( $has_value( $process_eyebrow ) || $has_value( $process_title ) || $has_value( $process_text ) ) : ?>
			<section class="services-page__process py-5">
				<div class="container">
					<div class="row">
						<div class="col-lg-8">
							<?php if ( $has_value( $process_eyebrow ) ) : ?>
								<p class="text-uppercase small mb-3"><?php echo esc_html( $process_eyebrow ); ?></p>
							<?php endif; ?>

							<?php if ( $has_value( $process_title ) ) : ?>
								<h2 class="mb-4"><?php echo esc_html( $process_title ); ?></h2>
							<?php endif; ?>

							<?php if ( $has_value( $process_text ) ) : ?>
								<div class="entry-content mb-0">
									<?php echo wp_kses_post( apply_filters( 'the_content', $process_text ) ); ?>
								</div>
							<?php endif; ?>
						</div>
					</div>
				</div>
			</section>
		<?php endif; ?>

		<?php if ( $has_value( $cta_title ) || $has_value( $cta_text ) || ! empty( $cta_button ) ) : ?>
			<section class="services-page__cta py-5">
				<div class="container">
					<div class="row">
						<div class="col-lg-8">
							<?php if ( $has_value( $cta_title ) ) : ?>
								<h2 class="mb-4"><?php echo esc_html( $cta_title ); ?></h2>
							<?php endif; ?>

							<?php if ( $has_value( $cta_text ) ) : ?>
								<div class="mb-4"><?php echo wp_kses_post( wpautop( esc_html( $cta_text ) ) ); ?></div>
							<?php endif; ?>

							<?php if ( is_array( $cta_button ) && ! empty( $cta_button['url'] ) && ! empty( $cta_button['title'] ) ) : ?>
								<?php
								$cta_button_target = ! empty( $cta_button['target'] ) ? $cta_button['target'] : '_self';
								$cta_button_rel    = '_blank' === $cta_button_target ? 'noopener noreferrer' : '';
								?>
								<a class="btn btn-primary" href="<?php echo esc_url( $cta_button['url'] ); ?>" target="<?php echo esc_attr( $cta_button_target ); ?>"<?php echo $cta_button_rel ? ' rel="' . esc_attr( $cta_button_rel ) . '"' : ''; ?>>
									<?php echo esc_html( $cta_button['title'] ); ?>
								</a>
							<?php endif; ?>
						</div>
					</div>
				</div>
			</section>
		<?php endif; ?>
	<?php endwhile; ?>
</main>

<?php
get_footer();
