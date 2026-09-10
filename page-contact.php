<?php
/**
 * The template for displaying the Contact page.
 *
 * @package AlderStone
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
?>

<main class="site-main contact-page" id="content" tabindex="-1">
	<?php while ( have_posts() ) : ?>
		<?php the_post(); ?>
		<?php
		$contact_page_id = get_the_ID();
		$contact_defaults = array(
			'contact_eyebrow'     => __( 'Begin a Conversation', 'alder-stone' ),
			'contact_title'       => __( 'Tell us what you want to make possible.', 'alder-stone' ),
			'contact_text'        => __( 'Whether you are exploring a new home, reimagining an existing place or bringing a complex brief into focus, we would like to hear where you are starting from.', 'alder-stone' ),
			'contact_email'       => 'hello@alderstone.com',
			'contact_phone'       => '+40 31 229 24 20',
			'contact_location'    => __( 'Bucharest, Romania', 'alder-stone' ),
			'contact_availability' => __( 'Monday–Friday · 09:00–18:00 EEST', 'alder-stone' ),
			'contact_form_eyebrow' => __( 'Project Inquiry', 'alder-stone' ),
			'contact_form_title'  => __( 'A thoughtful first conversation starts here.', 'alder-stone' ),
			'contact_form_text'   => __( 'A few details are enough. We will reply within two working days with a clear next step.', 'alder-stone' ),
		);
		$get_contact_field = static function( $field_name ) use ( $contact_page_id, $contact_defaults ) {
			$value = function_exists( 'get_field' ) ? get_field( $field_name, $contact_page_id ) : null;

			return null !== $value && '' !== $value && false !== $value ? $value : ( $contact_defaults[ $field_name ] ?? null );
		};
		$has_value = static function( $value ) {
			return null !== $value && '' !== $value && false !== $value;
		};

		$hero_eyebrow = $get_contact_field( 'contact_eyebrow' );
		$hero_title   = $get_contact_field( 'contact_title' );
		$hero_text    = $get_contact_field( 'contact_text' );
		$contact_email = sanitize_email( (string) $get_contact_field( 'contact_email' ) );
		$contact_phone = $get_contact_field( 'contact_phone' );
		$contact_location = $get_contact_field( 'contact_location' );
		$contact_availability = $get_contact_field( 'contact_availability' );
		$form_eyebrow = $get_contact_field( 'contact_form_eyebrow' );
		$form_title   = $get_contact_field( 'contact_form_title' );
		$form_text    = $get_contact_field( 'contact_form_text' );
		$form_status  = isset( $_GET['contact-status'] ) ? sanitize_key( wp_unslash( $_GET['contact-status'] ) ) : '';
		$contact_details = array_filter(
			array(
				array(
					'label' => __( 'Email', 'alder-stone' ),
					'value' => $contact_email,
					'href'  => $contact_email ? 'mailto:' . $contact_email : '',
				),
				array(
					'label' => __( 'Phone', 'alder-stone' ),
					'value' => $contact_phone,
					'href'  => $contact_phone ? 'tel:' . preg_replace( '/[^0-9+]/', '', $contact_phone ) : '',
				),
				array(
					'label' => __( 'Studio', 'alder-stone' ),
					'value' => $contact_location,
					'href'  => '',
				),
				array(
					'label' => __( 'Hours', 'alder-stone' ),
					'value' => $contact_availability,
					'href'  => '',
				),
			),
			static function( $contact_detail ) use ( $has_value ) {
				return $has_value( $contact_detail['value'] );
			}
		);
		?>

		<section class="contact-hero">
			<div class="container">
				<div class="contact-hero__inner">
					<div class="contact-hero__content">
						<?php if ( $has_value( $hero_eyebrow ) ) : ?>
							<p class="contact-eyebrow"><?php echo esc_html( $hero_eyebrow ); ?></p>
						<?php endif; ?>

						<?php if ( $has_value( $hero_title ) ) : ?>
							<h1 class="contact-hero__title"><?php echo esc_html( $hero_title ); ?></h1>
						<?php endif; ?>

						<?php if ( $has_value( $hero_text ) ) : ?>
							<div class="contact-hero__text"><?php echo wp_kses_post( wpautop( esc_html( $hero_text ) ) ); ?></div>
						<?php endif; ?>
					</div>

					<?php if ( ! empty( $contact_details ) ) : ?>
						<dl class="contact-details">
							<?php foreach ( $contact_details as $contact_detail ) : ?>
								<div class="contact-details__item">
									<dt><?php echo esc_html( $contact_detail['label'] ); ?></dt>
									<dd>
										<?php if ( $contact_detail['href'] ) : ?>
											<a href="<?php echo esc_url( $contact_detail['href'] ); ?>"><?php echo esc_html( $contact_detail['value'] ); ?></a>
										<?php else : ?>
											<?php echo esc_html( $contact_detail['value'] ); ?>
										<?php endif; ?>
									</dd>
								</div>
							<?php endforeach; ?>
						</dl>
					<?php endif; ?>
				</div>
			</div>
		</section>

		<section class="contact-inquiry" aria-labelledby="contact-inquiry-title">
			<div class="container">
				<div class="contact-inquiry__inner">
					<div class="contact-inquiry__intro">
						<?php if ( $has_value( $form_eyebrow ) ) : ?>
							<p class="contact-eyebrow"><?php echo esc_html( $form_eyebrow ); ?></p>
						<?php endif; ?>

						<?php if ( $has_value( $form_title ) ) : ?>
							<h2 class="contact-inquiry__title" id="contact-inquiry-title"><?php echo esc_html( $form_title ); ?></h2>
						<?php endif; ?>

						<?php if ( $has_value( $form_text ) ) : ?>
							<div class="contact-inquiry__text"><?php echo wp_kses_post( wpautop( esc_html( $form_text ) ) ); ?></div>
						<?php endif; ?>

						<p class="contact-inquiry__privacy"><?php esc_html_e( 'Your details are used only to respond to this inquiry.', 'alder-stone' ); ?></p>
					</div>

					<div class="contact-inquiry__form-wrap">
						<?php if ( 'success' === $form_status ) : ?>
							<div class="contact-form-notice contact-form-notice--success" role="status">
								<?php esc_html_e( 'Thank you — your inquiry is on its way. We will be in touch within two working days.', 'alder-stone' ); ?>
							</div>
						<?php elseif ( 'invalid' === $form_status ) : ?>
							<div class="contact-form-notice contact-form-notice--error" role="alert">
								<?php esc_html_e( 'Please add your name, a valid email address and a short project description.', 'alder-stone' ); ?>
							</div>
						<?php elseif ( 'error' === $form_status ) : ?>
							<div class="contact-form-notice contact-form-notice--error" role="alert">
								<?php esc_html_e( 'We could not send your inquiry just now. Please email us directly and we will help.', 'alder-stone' ); ?>
							</div>
						<?php endif; ?>

						<form class="contact-form" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>" method="post">
							<input type="hidden" name="action" value="alder_stone_contact_inquiry">
							<?php wp_nonce_field( 'alder_stone_contact_inquiry', 'alder_stone_contact_nonce' ); ?>

							<div class="contact-form__honeypot" aria-hidden="true">
								<label for="company-website"><?php esc_html_e( 'Company website', 'alder-stone' ); ?></label>
								<input id="company-website" type="text" name="company_website" tabindex="-1" autocomplete="off">
							</div>

							<div class="contact-form__grid">
								<p class="contact-form__field">
									<label for="contact-name"><?php esc_html_e( 'Your name', 'alder-stone' ); ?> <span aria-hidden="true">*</span></label>
									<input id="contact-name" name="name" type="text" autocomplete="name" required>
								</p>

								<p class="contact-form__field">
									<label for="contact-email"><?php esc_html_e( 'Email address', 'alder-stone' ); ?> <span aria-hidden="true">*</span></label>
									<input id="contact-email" name="email" type="email" autocomplete="email" required>
								</p>

								<p class="contact-form__field">
									<label for="contact-organisation"><?php esc_html_e( 'Organisation', 'alder-stone' ); ?></label>
									<input id="contact-organisation" name="organisation" type="text" autocomplete="organization">
								</p>

								<p class="contact-form__field">
									<label for="contact-project-type"><?php esc_html_e( 'Project type', 'alder-stone' ); ?></label>
									<select id="contact-project-type" name="project_type">
										<option value=""><?php esc_html_e( 'Select an option', 'alder-stone' ); ?></option>
										<option value="New build"><?php esc_html_e( 'New build', 'alder-stone' ); ?></option>
										<option value="Renovation or extension"><?php esc_html_e( 'Renovation or extension', 'alder-stone' ); ?></option>
										<option value="Interior or workplace"><?php esc_html_e( 'Interior or workplace', 'alder-stone' ); ?></option>
										<option value="Other"><?php esc_html_e( 'Other', 'alder-stone' ); ?></option>
									</select>
								</p>

								<p class="contact-form__field">
									<label for="contact-budget"><?php esc_html_e( 'Indicative budget', 'alder-stone' ); ?></label>
									<select id="contact-budget" name="budget">
										<option value=""><?php esc_html_e( 'Select an option', 'alder-stone' ); ?></option>
										<option value="Under €150k"><?php esc_html_e( 'Under €150k', 'alder-stone' ); ?></option>
										<option value="€150k–€350k"><?php esc_html_e( '€150k–€350k', 'alder-stone' ); ?></option>
										<option value="€350k–€750k"><?php esc_html_e( '€350k–€750k', 'alder-stone' ); ?></option>
										<option value="Over €750k"><?php esc_html_e( 'Over €750k', 'alder-stone' ); ?></option>
										<option value="Not sure yet"><?php esc_html_e( 'Not sure yet', 'alder-stone' ); ?></option>
									</select>
								</p>

								<p class="contact-form__field">
									<label for="contact-timeline"><?php esc_html_e( 'Preferred timeline', 'alder-stone' ); ?></label>
									<input id="contact-timeline" name="timeline" type="text" placeholder="e.g. planning this autumn">
								</p>
							</div>

							<p class="contact-form__field contact-form__field--full">
								<label for="contact-message"><?php esc_html_e( 'Tell us a little about the project', 'alder-stone' ); ?> <span aria-hidden="true">*</span></label>
								<textarea id="contact-message" name="message" rows="6" required></textarea>
							</p>

							<button class="contact-form__submit" type="submit">
								<?php esc_html_e( 'Send inquiry', 'alder-stone' ); ?>
								<span aria-hidden="true">→</span>
							</button>
						</form>
					</div>
				</div>
			</div>
		</section>
	<?php endwhile; ?>
</main>

<?php
get_footer();
