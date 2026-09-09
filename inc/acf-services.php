<?php
/**
 * Advanced Custom Fields registrations for the Services page.
 *
 * @package AlderStone
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

/**
 * Registers the Services Page Content field group.
 *
 * @return void
 */
function alder_stone_register_services_acf_fields() {
	if ( ! function_exists( 'acf_add_local_field_group' ) ) {
		return;
	}

	$services_page = get_page_by_path( 'services' );

	if ( ! $services_page ) {
		return;
	}

	acf_add_local_field_group(
		array(
			'key'    => 'group_alder_stone_services_page_content',
			'title'  => __( 'Services Page Content', 'alder-stone' ),
			'fields' => array(
				// Hero.
				array(
					'key'       => 'field_alder_stone_services_tab_hero',
					'label'     => __( 'Hero', 'alder-stone' ),
					'type'      => 'tab',
					'placement' => 'left',
				),
				array(
					'key'           => 'field_alder_stone_services_hero_eyebrow',
					'label'         => __( 'Services Hero Eyebrow', 'alder-stone' ),
					'name'          => 'services_hero_eyebrow',
					'type'          => 'text',
					'default_value' => __( 'Our Services', 'alder-stone' ),
				),
				array(
					'key'           => 'field_alder_stone_services_hero_title',
					'label'         => __( 'Services Hero Title', 'alder-stone' ),
					'name'          => 'services_hero_title',
					'type'          => 'text',
					'default_value' => __( 'Architecture and construction, considered as one.', 'alder-stone' ),
				),
				array(
					'key'           => 'field_alder_stone_services_hero_text',
					'label'         => __( 'Services Hero Text', 'alder-stone' ),
					'name'          => 'services_hero_text',
					'type'          => 'textarea',
					'default_value' => __( 'From early thinking to final delivery, we bring clarity, coordination and craft to every stage of the project.', 'alder-stone' ),
				),

				// Introduction.
				array(
					'key'       => 'field_alder_stone_services_tab_intro',
					'label'     => __( 'Introduction', 'alder-stone' ),
					'type'      => 'tab',
					'placement' => 'left',
				),
				array(
					'key'           => 'field_alder_stone_services_intro_title',
					'label'         => __( 'Services Intro Title', 'alder-stone' ),
					'name'          => 'services_intro_title',
					'type'          => 'text',
					'default_value' => __( 'Built around the way you live and work.', 'alder-stone' ),
				),
				array(
					'key'           => 'field_alder_stone_services_intro_text',
					'label'         => __( 'Services Intro Text', 'alder-stone' ),
					'name'          => 'services_intro_text',
					'type'          => 'wysiwyg',
					'default_value' => __( '<p>We combine design intelligence with practical delivery to create spaces that feel purposeful, enduring and genuinely useful.</p>', 'alder-stone' ),
				),

				// Service 1.
				array(
					'key'       => 'field_alder_stone_services_tab_item_1',
					'label'     => __( 'Service 1', 'alder-stone' ),
					'type'      => 'tab',
					'placement' => 'left',
				),
				array(
					'key'           => 'field_alder_stone_services_item_1_number',
					'label'         => __( 'Service 1 Number', 'alder-stone' ),
					'name'          => 'services_item_1_number',
					'type'          => 'text',
					'default_value' => '01',
				),
				array(
					'key'           => 'field_alder_stone_services_item_1_title',
					'label'         => __( 'Service 1 Title', 'alder-stone' ),
					'name'          => 'services_item_1_title',
					'type'          => 'text',
					'default_value' => __( 'Architecture', 'alder-stone' ),
				),
				array(
					'key'           => 'field_alder_stone_services_item_1_text',
					'label'         => __( 'Service 1 Text', 'alder-stone' ),
					'name'          => 'services_item_1_text',
					'type'          => 'textarea',
					'default_value' => __( 'Thoughtful design from early concept through planning, technical development and delivery.', 'alder-stone' ),
				),

				// Service 2.
				array(
					'key'       => 'field_alder_stone_services_tab_item_2',
					'label'     => __( 'Service 2', 'alder-stone' ),
					'type'      => 'tab',
					'placement' => 'left',
				),
				array(
					'key'           => 'field_alder_stone_services_item_2_number',
					'label'         => __( 'Service 2 Number', 'alder-stone' ),
					'name'          => 'services_item_2_number',
					'type'          => 'text',
					'default_value' => '02',
				),
				array(
					'key'           => 'field_alder_stone_services_item_2_title',
					'label'         => __( 'Service 2 Title', 'alder-stone' ),
					'name'          => 'services_item_2_title',
					'type'          => 'text',
					'default_value' => __( 'Construction', 'alder-stone' ),
				),
				array(
					'key'           => 'field_alder_stone_services_item_2_text',
					'label'         => __( 'Service 2 Text', 'alder-stone' ),
					'name'          => 'services_item_2_text',
					'type'          => 'textarea',
					'default_value' => __( 'Reliable construction management and execution, coordinated around quality, programme and detail.', 'alder-stone' ),
				),

				// Service 3.
				array(
					'key'       => 'field_alder_stone_services_tab_item_3',
					'label'     => __( 'Service 3', 'alder-stone' ),
					'type'      => 'tab',
					'placement' => 'left',
				),
				array(
					'key'           => 'field_alder_stone_services_item_3_number',
					'label'         => __( 'Service 3 Number', 'alder-stone' ),
					'name'          => 'services_item_3_number',
					'type'          => 'text',
					'default_value' => '03',
				),
				array(
					'key'           => 'field_alder_stone_services_item_3_title',
					'label'         => __( 'Service 3 Title', 'alder-stone' ),
					'name'          => 'services_item_3_title',
					'type'          => 'text',
					'default_value' => __( 'Renovation', 'alder-stone' ),
				),
				array(
					'key'           => 'field_alder_stone_services_item_3_text',
					'label'         => __( 'Service 3 Text', 'alder-stone' ),
					'name'          => 'services_item_3_text',
					'type'          => 'textarea',
					'default_value' => __( 'Careful renewal of existing buildings, retaining character while improving performance and everyday use.', 'alder-stone' ),
				),

				// Service 4.
				array(
					'key'       => 'field_alder_stone_services_tab_item_4',
					'label'     => __( 'Service 4', 'alder-stone' ),
					'type'      => 'tab',
					'placement' => 'left',
				),
				array(
					'key'           => 'field_alder_stone_services_item_4_number',
					'label'         => __( 'Service 4 Number', 'alder-stone' ),
					'name'          => 'services_item_4_number',
					'type'          => 'text',
					'default_value' => '04',
				),
				array(
					'key'           => 'field_alder_stone_services_item_4_title',
					'label'         => __( 'Service 4 Title', 'alder-stone' ),
					'name'          => 'services_item_4_title',
					'type'          => 'text',
					'default_value' => __( 'Project Management', 'alder-stone' ),
				),
				array(
					'key'           => 'field_alder_stone_services_item_4_text',
					'label'         => __( 'Service 4 Text', 'alder-stone' ),
					'name'          => 'services_item_4_text',
					'type'          => 'textarea',
					'default_value' => __( 'Clear coordination across consultants, contractors and decisions to keep complex work moving with confidence.', 'alder-stone' ),
				),

				// Process and approach.
				array(
					'key'       => 'field_alder_stone_services_tab_process',
					'label'     => __( 'Process & Approach', 'alder-stone' ),
					'type'      => 'tab',
					'placement' => 'left',
				),
				array(
					'key'           => 'field_alder_stone_services_process_eyebrow',
					'label'         => __( 'Services Process Eyebrow', 'alder-stone' ),
					'name'          => 'services_process_eyebrow',
					'type'          => 'text',
					'default_value' => __( 'Our Approach', 'alder-stone' ),
				),
				array(
					'key'           => 'field_alder_stone_services_process_title',
					'label'         => __( 'Services Process Title', 'alder-stone' ),
					'name'          => 'services_process_title',
					'type'          => 'text',
					'default_value' => __( 'A clear route from first idea to finished space.', 'alder-stone' ),
				),
				array(
					'key'           => 'field_alder_stone_services_process_text',
					'label'         => __( 'Services Process Text', 'alder-stone' ),
					'name'          => 'services_process_text',
					'type'          => 'wysiwyg',
					'default_value' => __( '<p>Our process is collaborative and disciplined. We listen first, define the right priorities, then guide every decision with clear communication and attention to detail.</p>', 'alder-stone' ),
				),

				// Call to action.
				array(
					'key'       => 'field_alder_stone_services_tab_cta',
					'label'     => __( 'Call to Action', 'alder-stone' ),
					'type'      => 'tab',
					'placement' => 'left',
				),
				array(
					'key'           => 'field_alder_stone_services_cta_title',
					'label'         => __( 'Services CTA Title', 'alder-stone' ),
					'name'          => 'services_cta_title',
					'type'          => 'text',
					'default_value' => __( 'Start with a conversation.', 'alder-stone' ),
				),
				array(
					'key'           => 'field_alder_stone_services_cta_text',
					'label'         => __( 'Services CTA Text', 'alder-stone' ),
					'name'          => 'services_cta_text',
					'type'          => 'textarea',
					'default_value' => __( 'Tell us about your project, your site and the ambitions behind it.', 'alder-stone' ),
				),
				array(
					'key'   => 'field_alder_stone_services_cta_button',
					'label' => __( 'Services CTA Button', 'alder-stone' ),
					'name'  => 'services_cta_button',
					'type'  => 'link',
					'default_value' => array(
						'title'  => __( 'Discuss Your Project', 'alder-stone' ),
						'url'    => home_url( '/contact/' ),
						'target' => '',
					),
				),
			),
			'location' => array(
				array(
					array(
						'param'    => 'page',
						'operator' => '==',
						'value'    => (string) $services_page->ID,
					),
				),
			),
		)
	);
}
add_action( 'acf/init', 'alder_stone_register_services_acf_fields' );
