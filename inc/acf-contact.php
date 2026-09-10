<?php
/**
 * Advanced Custom Fields registrations for the Contact page.
 *
 * @package AlderStone
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

/**
 * Registers the Contact Page Content field group.
 *
 * @return void
 */
function alder_stone_register_contact_acf_fields() {
	if ( ! function_exists( 'acf_add_local_field_group' ) ) {
		return;
	}

	$contact_page = get_page_by_path( 'contact' );

	if ( ! $contact_page ) {
		return;
	}

	acf_add_local_field_group(
		array(
			'key'    => 'group_alder_stone_contact_page_content',
			'title'  => __( 'Contact Page Content', 'alder-stone' ),
			'fields' => array(
				array(
					'key'       => 'field_alder_stone_contact_tab_intro',
					'label'     => __( 'Introduction', 'alder-stone' ),
					'type'      => 'tab',
					'placement' => 'left',
				),
				array(
					'key'           => 'field_alder_stone_contact_eyebrow',
					'label'         => __( 'Contact Eyebrow', 'alder-stone' ),
					'name'          => 'contact_eyebrow',
					'type'          => 'text',
					'default_value' => __( 'Begin a Conversation', 'alder-stone' ),
				),
				array(
					'key'           => 'field_alder_stone_contact_title',
					'label'         => __( 'Contact Title', 'alder-stone' ),
					'name'          => 'contact_title',
					'type'          => 'text',
					'default_value' => __( 'Tell us what you want to make possible.', 'alder-stone' ),
				),
				array(
					'key'           => 'field_alder_stone_contact_text',
					'label'         => __( 'Contact Introduction', 'alder-stone' ),
					'name'          => 'contact_text',
					'type'          => 'textarea',
					'default_value' => __( 'Whether you are exploring a new home, reimagining an existing place or bringing a complex brief into focus, we would like to hear where you are starting from.', 'alder-stone' ),
				),
				array(
					'key'       => 'field_alder_stone_contact_tab_details',
					'label'     => __( 'Contact Details', 'alder-stone' ),
					'type'      => 'tab',
					'placement' => 'left',
				),
				array(
					'key'           => 'field_alder_stone_contact_email',
					'label'         => __( 'Email Address', 'alder-stone' ),
					'name'          => 'contact_email',
					'type'          => 'email',
					'default_value' => 'hello@alderstone.com',
				),
				array(
					'key'           => 'field_alder_stone_contact_phone',
					'label'         => __( 'Phone Number', 'alder-stone' ),
					'name'          => 'contact_phone',
					'type'          => 'text',
					'default_value' => '+40 31 229 24 20',
				),
				array(
					'key'           => 'field_alder_stone_contact_location',
					'label'         => __( 'Studio Location', 'alder-stone' ),
					'name'          => 'contact_location',
					'type'          => 'text',
					'default_value' => __( 'Bucharest, Romania', 'alder-stone' ),
				),
				array(
					'key'           => 'field_alder_stone_contact_availability',
					'label'         => __( 'Availability Note', 'alder-stone' ),
					'name'          => 'contact_availability',
					'type'          => 'text',
					'default_value' => __( 'Monday–Friday · 09:00–18:00 EEST', 'alder-stone' ),
				),
				array(
					'key'       => 'field_alder_stone_contact_tab_form',
					'label'     => __( 'Inquiry Form', 'alder-stone' ),
					'type'      => 'tab',
					'placement' => 'left',
				),
				array(
					'key'           => 'field_alder_stone_contact_form_eyebrow',
					'label'         => __( 'Form Eyebrow', 'alder-stone' ),
					'name'          => 'contact_form_eyebrow',
					'type'          => 'text',
					'default_value' => __( 'Project Inquiry', 'alder-stone' ),
				),
				array(
					'key'           => 'field_alder_stone_contact_form_title',
					'label'         => __( 'Form Title', 'alder-stone' ),
					'name'          => 'contact_form_title',
					'type'          => 'text',
					'default_value' => __( 'A thoughtful first conversation starts here.', 'alder-stone' ),
				),
				array(
					'key'           => 'field_alder_stone_contact_form_text',
					'label'         => __( 'Form Introduction', 'alder-stone' ),
					'name'          => 'contact_form_text',
					'type'          => 'textarea',
					'default_value' => __( 'A few details are enough. We will reply within two working days with a clear next step.', 'alder-stone' ),
				),
			),
			'location'              => array(
				array(
					array(
						'param'    => 'page',
						'operator' => '==',
						'value'    => (string) $contact_page->ID,
					),
				),
			),
			'position'              => 'normal',
			'style'                 => 'default',
			'label_placement'       => 'top',
			'instruction_placement' => 'label',
			'hide_on_screen'        => array(),
			'active'                => true,
			'description'           => '',
		)
	);
}
add_action( 'acf/init', 'alder_stone_register_contact_acf_fields' );
