<?php
/**
 * Contact form handling for Alder Stone.
 *
 * @package AlderStone
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

/**
 * Returns the contact page URL.
 *
 * @return string
 */
function alder_stone_get_contact_page_url() {
	$contact_page = get_page_by_path( 'contact' );

	return $contact_page ? get_permalink( $contact_page ) : home_url( '/contact/' );
}

/**
 * Returns the recipient configured on the Contact page, with a safe fallback.
 *
 * @return string
 */
function alder_stone_get_contact_recipient() {
	$contact_page = get_page_by_path( 'contact' );
	$contact_email = $contact_page && function_exists( 'get_field' ) ? get_field( 'contact_email', $contact_page->ID ) : '';
	$contact_email = sanitize_email( (string) $contact_email );

	return is_email( $contact_email ) ? $contact_email : get_option( 'admin_email' );
}

/**
 * Redirects back to Contact with a message state.
 *
 * @param string $status The message state.
 * @return void
 */
function alder_stone_redirect_contact_form( $status ) {
	wp_safe_redirect(
		add_query_arg(
			'contact-status',
			sanitize_key( $status ),
			alder_stone_get_contact_page_url()
		)
	);
	exit;
}

/**
 * Processes an inquiry submitted from the Contact page.
 *
 * @return void
 */
function alder_stone_handle_contact_inquiry() {
	$nonce = isset( $_POST['alder_stone_contact_nonce'] ) ? sanitize_text_field( wp_unslash( $_POST['alder_stone_contact_nonce'] ) ) : '';

	if ( ! wp_verify_nonce( $nonce, 'alder_stone_contact_inquiry' ) ) {
		alder_stone_redirect_contact_form( 'invalid' );
	}

	// A hidden field catches basic bots without affecting real visitors.
	$honeypot = isset( $_POST['company_website'] ) ? sanitize_text_field( wp_unslash( $_POST['company_website'] ) ) : '';

	if ( '' !== $honeypot ) {
		alder_stone_redirect_contact_form( 'success' );
	}

	$name         = isset( $_POST['name'] ) ? sanitize_text_field( wp_unslash( $_POST['name'] ) ) : '';
	$email        = isset( $_POST['email'] ) ? sanitize_email( wp_unslash( $_POST['email'] ) ) : '';
	$organisation = isset( $_POST['organisation'] ) ? sanitize_text_field( wp_unslash( $_POST['organisation'] ) ) : '';
	$project_type = isset( $_POST['project_type'] ) ? sanitize_text_field( wp_unslash( $_POST['project_type'] ) ) : '';
	$budget       = isset( $_POST['budget'] ) ? sanitize_text_field( wp_unslash( $_POST['budget'] ) ) : '';
	$timeline     = isset( $_POST['timeline'] ) ? sanitize_text_field( wp_unslash( $_POST['timeline'] ) ) : '';
	$message      = isset( $_POST['message'] ) ? sanitize_textarea_field( wp_unslash( $_POST['message'] ) ) : '';
	$project_types = array( 'New build', 'Renovation or extension', 'Interior or workplace', 'Other' );
	$budgets       = array( 'Under €150k', '€150k–€350k', '€350k–€750k', 'Over €750k', 'Not sure yet' );

	if ( ! in_array( $project_type, $project_types, true ) ) {
		$project_type = '';
	}

	if ( ! in_array( $budget, $budgets, true ) ) {
		$budget = '';
	}

	if ( '' === $name || ! is_email( $email ) || '' === $message ) {
		alder_stone_redirect_contact_form( 'invalid' );
	}

	$subject = sprintf(
		/* translators: %s: inquiry sender name. */
		__( 'New project inquiry from %s', 'alder-stone' ),
		$name
	);
	$body    = implode(
		PHP_EOL,
		array(
			__( 'A new project inquiry has been submitted through the Alder & Stone website.', 'alder-stone' ),
			'',
			__( 'Name:', 'alder-stone' ) . ' ' . $name,
			__( 'Email:', 'alder-stone' ) . ' ' . $email,
			__( 'Organisation:', 'alder-stone' ) . ' ' . ( $organisation ? $organisation : __( 'Not provided', 'alder-stone' ) ),
			__( 'Project type:', 'alder-stone' ) . ' ' . ( $project_type ? $project_type : __( 'Not provided', 'alder-stone' ) ),
			__( 'Indicative budget:', 'alder-stone' ) . ' ' . ( $budget ? $budget : __( 'Not provided', 'alder-stone' ) ),
			__( 'Preferred timeline:', 'alder-stone' ) . ' ' . ( $timeline ? $timeline : __( 'Not provided', 'alder-stone' ) ),
			'',
			__( 'Project details:', 'alder-stone' ),
			$message,
		)
	);
	$headers = array( 'Reply-To: ' . $name . ' <' . $email . '>' );
	$sent    = wp_mail( alder_stone_get_contact_recipient(), $subject, $body, $headers );

	alder_stone_redirect_contact_form( $sent ? 'success' : 'error' );
}
add_action( 'admin_post_nopriv_alder_stone_contact_inquiry', 'alder_stone_handle_contact_inquiry' );
add_action( 'admin_post_alder_stone_contact_inquiry', 'alder_stone_handle_contact_inquiry' );
