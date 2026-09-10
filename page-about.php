<?php
/**
 * The template for displaying the About page.
 *
 * @package AlderStone
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
?>

<main class="site-main about-page" id="content" tabindex="-1">
	<?php while ( have_posts() ) : ?>
		<?php the_post(); ?>
		<?php
		$about_page_id = get_the_ID();
		$get_about_field = static function( $field_name ) use ( $about_page_id ) {
			return function_exists( 'get_field' ) ? get_field( $field_name, $about_page_id ) : null;
		};
		$has_value = static function( $value ) {
			return null !== $value && '' !== $value && false !== $value;
		};

		// Hero fields.
		$hero_eyebrow = $get_about_field( 'about_hero_eyebrow' );
		$hero_title   = $get_about_field( 'about_hero_title' );
		$hero_text    = $get_about_field( 'about_hero_text' );
		$hero_image   = absint( $get_about_field( 'about_hero_image' ) );

		// Introduction fields.
		$intro_eyebrow = $get_about_field( 'about_intro_eyebrow' );
		$intro_title   = $get_about_field( 'about_intro_title' );
		$intro_text    = $get_about_field( 'about_intro_text' );

		// Values fields.
		$values_eyebrow = $get_about_field( 'about_values_eyebrow' );
		$values_title   = $get_about_field( 'about_values_title' );
		$value_items     = array(
			array(
				'title' => $get_about_field( 'about_value_1_title' ),
				'text'  => $get_about_field( 'about_value_1_text' ),
			),
			array(
				'title' => $get_about_field( 'about_value_2_title' ),
				'text'  => $get_about_field( 'about_value_2_text' ),
			),
			array(
				'title' => $get_about_field( 'about_value_3_title' ),
				'text'  => $get_about_field( 'about_value_3_text' ),
			),
		);

		// Studio fields.
		$studio_eyebrow = $get_about_field( 'about_studio_eyebrow' );
		$studio_title   = $get_about_field( 'about_studio_title' );
		$studio_text    = $get_about_field( 'about_studio_text' );
		$studio_image   = absint( $get_about_field( 'about_studio_image' ) );

		// Call to action fields.
		$cta_title  = $get_about_field( 'about_cta_title' );
		$cta_text   = $get_about_field( 'about_cta_text' );
		$cta_button = $get_about_field( 'about_cta_button' );
		$contact_page = get_page_by_path( 'contact' );
		$contact_url  = $contact_page ? get_permalink( $contact_page ) : home_url( '/contact/' );

		// ACF link fields can temporarily contain a placeholder while content is being prepared.
		// Keep the page client-ready by directing that state to the real Contact page instead.
		if ( ! is_array( $cta_button ) || empty( $cta_button['url'] ) || '#' === $cta_button['url'] ) {
			$cta_button = array(
				'title'  => __( 'Start a conversation', 'alder-stone' ),
				'url'    => $contact_url,
				'target' => '',
			);
		}
		?>

		<?php if ( $has_value( $hero_eyebrow ) || $has_value( $hero_title ) || $has_value( $hero_text ) || $hero_image ) : ?>
			<section class="about-hero">
				<div class="container">
					<div class="about-hero__inner">
						<div class="about-hero__content">
							<?php if ( $has_value( $hero_eyebrow ) ) : ?>
								<p class="about-hero__eyebrow"><?php echo esc_html( $hero_eyebrow ); ?></p>
							<?php endif; ?>

							<?php if ( $has_value( $hero_title ) ) : ?>
								<h1 class="about-hero__title"><?php echo esc_html( $hero_title ); ?></h1>
							<?php endif; ?>

							<?php if ( $has_value( $hero_text ) ) : ?>
								<div class="about-hero__text"><?php echo wp_kses_post( wpautop( esc_html( $hero_text ) ) ); ?></div>
							<?php endif; ?>
						</div>

						<?php if ( $hero_image ) : ?>
							<figure class="about-hero__media">
								<?php
								echo wp_get_attachment_image(
									$hero_image,
									'full',
									false,
									array(
										'class'         => 'about-hero__image',
										'fetchpriority' => 'high',
										'loading'       => 'eager',
										'sizes'         => '(min-width: 1200px) 50vw, 100vw',
									)
								);
								?>
							</figure>
						<?php endif; ?>
					</div>
				</div>
			</section>
		<?php endif; ?>

		<?php if ( $has_value( $intro_eyebrow ) || $has_value( $intro_title ) || $has_value( $intro_text ) ) : ?>
			<section class="about-intro">
				<div class="container">
					<div class="about-intro__inner">
						<?php if ( $has_value( $intro_eyebrow ) ) : ?>
							<p class="about-intro__eyebrow"><?php echo esc_html( $intro_eyebrow ); ?></p>
						<?php endif; ?>

						<?php if ( $has_value( $intro_title ) ) : ?>
							<h2 class="about-intro__title"><?php echo esc_html( $intro_title ); ?></h2>
						<?php endif; ?>

						<?php if ( $has_value( $intro_text ) ) : ?>
							<div class="about-intro__text entry-content">
								<?php echo wp_kses_post( apply_filters( 'the_content', $intro_text ) ); ?>
							</div>
						<?php endif; ?>
					</div>
				</div>
			</section>
		<?php endif; ?>

		<?php
		$available_value_items = array_values(
			array_filter(
				$value_items,
				static function( $value_item ) use ( $has_value ) {
					return $has_value( $value_item['title'] ) || $has_value( $value_item['text'] );
				}
			)
		);
		?>
		<?php if ( $has_value( $values_eyebrow ) || $has_value( $values_title ) || ! empty( $available_value_items ) ) : ?>
			<section class="about-values">
				<div class="container">
					<header class="about-values__header">
						<?php if ( $has_value( $values_eyebrow ) ) : ?>
							<p class="about-values__eyebrow"><?php echo esc_html( $values_eyebrow ); ?></p>
						<?php endif; ?>

						<?php if ( $has_value( $values_title ) ) : ?>
							<h2 class="about-values__title"><?php echo esc_html( $values_title ); ?></h2>
						<?php endif; ?>
					</header>

					<?php if ( ! empty( $available_value_items ) ) : ?>
						<div class="about-values__grid">
							<?php foreach ( $available_value_items as $value_item_index => $value_item ) : ?>
								<article class="about-values__item">
									<p class="about-values__number"><?php echo esc_html( sprintf( '%02d', $value_item_index + 1 ) ); ?></p>

									<?php if ( $has_value( $value_item['title'] ) ) : ?>
										<h3 class="about-values__item-title"><?php echo esc_html( $value_item['title'] ); ?></h3>
									<?php endif; ?>

									<?php if ( $has_value( $value_item['text'] ) ) : ?>
										<div class="about-values__item-text"><?php echo wp_kses_post( wpautop( esc_html( $value_item['text'] ) ) ); ?></div>
									<?php endif; ?>
								</article>
							<?php endforeach; ?>
						</div>
					<?php endif; ?>
				</div>
			</section>
		<?php endif; ?>

		<?php if ( $has_value( $studio_eyebrow ) || $has_value( $studio_title ) || $has_value( $studio_text ) || $studio_image ) : ?>
			<section class="about-studio">
				<div class="container">
					<div class="about-studio__inner">
						<div class="about-studio__content">
							<?php if ( $has_value( $studio_eyebrow ) ) : ?>
								<p class="about-studio__eyebrow"><?php echo esc_html( $studio_eyebrow ); ?></p>
							<?php endif; ?>

							<?php if ( $has_value( $studio_title ) ) : ?>
								<h2 class="about-studio__title"><?php echo esc_html( $studio_title ); ?></h2>
							<?php endif; ?>

							<?php if ( $has_value( $studio_text ) ) : ?>
								<div class="about-studio__text entry-content">
									<?php echo wp_kses_post( apply_filters( 'the_content', $studio_text ) ); ?>
								</div>
							<?php endif; ?>
						</div>

						<?php if ( $studio_image ) : ?>
							<figure class="about-studio__media">
								<?php
								echo wp_get_attachment_image(
									$studio_image,
									'large',
									false,
									array(
										'class'   => 'about-studio__image',
										'loading' => 'lazy',
										'sizes'   => '(min-width: 992px) 50vw, 100vw',
									)
								);
								?>
							</figure>
						<?php endif; ?>
					</div>
				</div>
			</section>
		<?php endif; ?>

		<?php if ( $has_value( $cta_title ) || $has_value( $cta_text ) || ! empty( $cta_button ) ) : ?>
			<section class="about-cta">
				<div class="container">
					<div class="about-cta__content">
						<?php if ( $has_value( $cta_title ) ) : ?>
							<h2 class="about-cta__title"><?php echo esc_html( $cta_title ); ?></h2>
						<?php endif; ?>

						<?php if ( $has_value( $cta_text ) ) : ?>
							<div class="about-cta__text"><?php echo wp_kses_post( wpautop( esc_html( $cta_text ) ) ); ?></div>
						<?php endif; ?>

						<?php if ( is_array( $cta_button ) && ! empty( $cta_button['url'] ) && ! empty( $cta_button['title'] ) ) : ?>
							<?php
							$cta_button_target = ! empty( $cta_button['target'] ) ? $cta_button['target'] : '_self';
							$cta_button_rel    = '_blank' === $cta_button_target ? 'noopener noreferrer' : '';
							?>
							<a class="about-cta__button" href="<?php echo esc_url( $cta_button['url'] ); ?>" target="<?php echo esc_attr( $cta_button_target ); ?>"<?php echo $cta_button_rel ? ' rel="' . esc_attr( $cta_button_rel ) . '"' : ''; ?>>
								<?php echo esc_html( $cta_button['title'] ); ?>
							</a>
						<?php endif; ?>
					</div>
				</div>
			</section>
		<?php endif; ?>
	<?php endwhile; ?>
</main>

<?php
get_footer();
