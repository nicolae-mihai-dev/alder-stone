<?php
/**
 * Advanced Custom Fields registrations for the Home page.
 *
 * @package AlderStone
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

/**
 * Registers the Home Page Content field group.
 *
 * @return void
 */
function alder_stone_register_home_acf_fields() {
	if ( ! function_exists( 'acf_add_local_field_group' ) ) {
		return;
	}

	acf_add_local_field_group(
		array(
			'key'    => 'group_alder_stone_home_page_content',
			'title'  => __( 'Home Page Content', 'alder-stone' ),
			'fields' => array(
				// Hero.
				array(
					'key'       => 'field_alder_stone_home_tab_hero',
					'label'     => __( 'Hero', 'alder-stone' ),
					'type'      => 'tab',
					'placement' => 'left',
				),
				array(
					'key'   => 'field_alder_stone_home_hero_eyebrow',
					'label' => __( 'Hero Eyebrow', 'alder-stone' ),
					'name'  => 'home_hero_eyebrow',
					'type'  => 'text',
					'default_value' => __( 'Architecture & Construction', 'alder-stone' ),
				),
				array(
					'key'   => 'field_alder_stone_home_hero_title',
					'label' => __( 'Hero Title', 'alder-stone' ),
					'name'  => 'home_hero_title',
					'type'  => 'text',
					'default_value' => __( 'Spaces built with purpose.', 'alder-stone' ),
				),
				array(
					'key'   => 'field_alder_stone_home_hero_text',
					'label' => __( 'Hero Text', 'alder-stone' ),
					'name'  => 'home_hero_text',
					'type'  => 'textarea',
					'default_value' => __( 'Alder & Stone creates considered architecture and construction solutions shaped by material, place, and the people who use them.', 'alder-stone' ),
				),
				array(
					'key'           => 'field_alder_stone_home_hero_image',
					'label'         => __( 'Hero Image', 'alder-stone' ),
					'name'          => 'home_hero_image',
					'type'          => 'image',
					'return_format' => 'id',
				),
				array(
					'key'   => 'field_alder_stone_home_hero_button',
					'label' => __( 'Hero Button', 'alder-stone' ),
					'name'  => 'home_hero_button',
					'type'  => 'link',
					'default_value' => array(
						'title'  => __( 'Explore Projects', 'alder-stone' ),
						'url'    => home_url( '/projects/' ),
						'target' => '',
					),
				),

				// Intro.
				array(
					'key'       => 'field_alder_stone_home_tab_intro',
					'label'     => __( 'About Alder & Stone', 'alder-stone' ),
					'type'      => 'tab',
					'placement' => 'left',
				),
				array(
					'key'   => 'field_alder_stone_home_intro_eyebrow',
					'label' => __( 'Intro Eyebrow', 'alder-stone' ),
					'name'  => 'home_intro_eyebrow',
					'type'  => 'text',
					'default_value' => __( 'About Alder & Stone', 'alder-stone' ),
				),
				array(
					'key'   => 'field_alder_stone_home_intro_title',
					'label' => __( 'Intro Title', 'alder-stone' ),
					'name'  => 'home_intro_title',
					'type'  => 'text',
					'default_value' => __( 'Architecture rooted in place.', 'alder-stone' ),
				),
				array(
					'key'   => 'field_alder_stone_home_intro_text',
					'label' => __( 'Intro Text', 'alder-stone' ),
					'name'  => 'home_intro_text',
					'type'  => 'wysiwyg',
					'default_value' => __( '<p>We approach each project with clarity, care, and respect for the character of its setting.</p>', 'alder-stone' ),
				),
				array(
					'key'           => 'field_alder_stone_home_intro_image',
					'label'         => __( 'About Image', 'alder-stone' ),
					'name'          => 'home_intro_image',
					'type'          => 'image',
					'return_format' => 'id',
				),

				// Services.
				array(
					'key'       => 'field_alder_stone_home_tab_services',
					'label'     => __( 'Services', 'alder-stone' ),
					'type'      => 'tab',
					'placement' => 'left',
				),
				array(
					'key'   => 'field_alder_stone_home_services_eyebrow',
					'label' => __( 'Services Eyebrow', 'alder-stone' ),
					'name'  => 'home_services_eyebrow',
					'type'  => 'text',
					'default_value' => __( 'What We Do', 'alder-stone' ),
				),
				array(
					'key'   => 'field_alder_stone_home_services_title',
					'label' => __( 'Services Title', 'alder-stone' ),
					'name'  => 'home_services_title',
					'type'  => 'text',
					'default_value' => __( 'Built around every stage of the project.', 'alder-stone' ),
				),
				array(
					'key'   => 'field_alder_stone_home_service_1_title',
					'label' => __( 'Service 1 Title', 'alder-stone' ),
					'name'  => 'home_service_1_title',
					'type'  => 'text',
					'default_value' => __( 'Architecture', 'alder-stone' ),
				),
				array(
					'key'   => 'field_alder_stone_home_service_1_text',
					'label' => __( 'Service 1 Text', 'alder-stone' ),
					'name'  => 'home_service_1_text',
					'type'  => 'textarea',
					'default_value' => __( 'Thoughtful design from early concept through planning and technical development.', 'alder-stone' ),
				),
				array(
					'key'   => 'field_alder_stone_home_service_2_title',
					'label' => __( 'Service 2 Title', 'alder-stone' ),
					'name'  => 'home_service_2_title',
					'type'  => 'text',
					'default_value' => __( 'Construction', 'alder-stone' ),
				),
				array(
					'key'   => 'field_alder_stone_home_service_2_text',
					'label' => __( 'Service 2 Text', 'alder-stone' ),
					'name'  => 'home_service_2_text',
					'type'  => 'textarea',
					'default_value' => __( 'Reliable delivery, carefully coordinated with the people and materials behind each build.', 'alder-stone' ),
				),
				array(
					'key'   => 'field_alder_stone_home_service_3_title',
					'label' => __( 'Service 3 Title', 'alder-stone' ),
					'name'  => 'home_service_3_title',
					'type'  => 'text',
					'default_value' => __( 'Renovation', 'alder-stone' ),
				),
				array(
					'key'   => 'field_alder_stone_home_service_3_text',
					'label' => __( 'Service 3 Text', 'alder-stone' ),
					'name'  => 'home_service_3_text',
					'type'  => 'textarea',
					'default_value' => __( 'Sensitive transformation of existing spaces for contemporary ways of living and working.', 'alder-stone' ),
				),

				// Featured Projects.
				array(
					'key'       => 'field_alder_stone_home_tab_projects',
					'label'     => __( 'Featured Projects', 'alder-stone' ),
					'type'      => 'tab',
					'placement' => 'left',
				),
				array(
					'key'   => 'field_alder_stone_home_projects_eyebrow',
					'label' => __( 'Featured Projects Eyebrow', 'alder-stone' ),
					'name'  => 'home_projects_eyebrow',
					'type'  => 'text',
					'default_value' => __( 'Selected Work', 'alder-stone' ),
				),
				array(
					'key'   => 'field_alder_stone_home_projects_title',
					'label' => __( 'Featured Projects Title', 'alder-stone' ),
					'name'  => 'home_projects_title',
					'type'  => 'text',
					'default_value' => __( 'Projects defined by context and craft.', 'alder-stone' ),
				),
				array(
					'key'           => 'field_alder_stone_home_featured_project_1',
					'label'         => __( 'Featured Project 1', 'alder-stone' ),
					'name'          => 'home_featured_project_1',
					'type'          => 'post_object',
					'post_type'     => array( 'project' ),
					'return_format' => 'id',
				),
				array(
					'key'           => 'field_alder_stone_home_featured_project_2',
					'label'         => __( 'Featured Project 2', 'alder-stone' ),
					'name'          => 'home_featured_project_2',
					'type'          => 'post_object',
					'post_type'     => array( 'project' ),
					'return_format' => 'id',
				),
				array(
					'key'           => 'field_alder_stone_home_featured_project_3',
					'label'         => __( 'Featured Project 3', 'alder-stone' ),
					'name'          => 'home_featured_project_3',
					'type'          => 'post_object',
					'post_type'     => array( 'project' ),
					'return_format' => 'id',
				),

				// Statistics.
				array(
					'key'       => 'field_alder_stone_home_tab_statistics',
					'label'     => __( 'Statistics', 'alder-stone' ),
					'type'      => 'tab',
					'placement' => 'left',
				),
				array(
					'key'   => 'field_alder_stone_home_stat_1_value',
					'label' => __( 'Stat 1 Value', 'alder-stone' ),
					'name'  => 'home_stat_1_value',
					'type'  => 'text',
					'default_value' => __( 'XX', 'alder-stone' ),
				),
				array(
					'key'   => 'field_alder_stone_home_stat_1_label',
					'label' => __( 'Stat 1 Label', 'alder-stone' ),
					'name'  => 'home_stat_1_label',
					'type'  => 'text',
					'default_value' => __( 'Projects completed', 'alder-stone' ),
				),
				array(
					'key'   => 'field_alder_stone_home_stat_2_value',
					'label' => __( 'Stat 2 Value', 'alder-stone' ),
					'name'  => 'home_stat_2_value',
					'type'  => 'text',
					'default_value' => __( 'XX', 'alder-stone' ),
				),
				array(
					'key'   => 'field_alder_stone_home_stat_2_label',
					'label' => __( 'Stat 2 Label', 'alder-stone' ),
					'name'  => 'home_stat_2_label',
					'type'  => 'text',
					'default_value' => __( 'Years of experience', 'alder-stone' ),
				),
				array(
					'key'   => 'field_alder_stone_home_stat_3_value',
					'label' => __( 'Stat 3 Value', 'alder-stone' ),
					'name'  => 'home_stat_3_value',
					'type'  => 'text',
					'default_value' => __( 'XX', 'alder-stone' ),
				),
				array(
					'key'   => 'field_alder_stone_home_stat_3_label',
					'label' => __( 'Stat 3 Label', 'alder-stone' ),
					'name'  => 'home_stat_3_label',
					'type'  => 'text',
					'default_value' => __( 'Spaces transformed', 'alder-stone' ),
				),

				// Process.
				array(
					'key'       => 'field_alder_stone_home_tab_process',
					'label'     => __( 'Process', 'alder-stone' ),
					'type'      => 'tab',
					'placement' => 'left',
				),
				array(
					'key'   => 'field_alder_stone_home_process_eyebrow',
					'label' => __( 'Process Eyebrow', 'alder-stone' ),
					'name'  => 'home_process_eyebrow',
					'type'  => 'text',
					'default_value' => __( 'Our Approach', 'alder-stone' ),
				),
				array(
					'key'   => 'field_alder_stone_home_process_title',
					'label' => __( 'Process Title', 'alder-stone' ),
					'name'  => 'home_process_title',
					'type'  => 'text',
					'default_value' => __( 'A clear process from first idea to final detail.', 'alder-stone' ),
				),
				array(
					'key'   => 'field_alder_stone_home_process_1_title',
					'label' => __( 'Process Step 1 Title', 'alder-stone' ),
					'name'  => 'home_process_1_title',
					'type'  => 'text',
					'default_value' => __( 'Discover', 'alder-stone' ),
				),
				array(
					'key'   => 'field_alder_stone_home_process_1_text',
					'label' => __( 'Process Step 1 Text', 'alder-stone' ),
					'name'  => 'home_process_1_text',
					'type'  => 'textarea',
					'default_value' => __( 'We listen carefully, understand the brief, and establish the project’s priorities.', 'alder-stone' ),
				),
				array(
					'key'   => 'field_alder_stone_home_process_2_title',
					'label' => __( 'Process Step 2 Title', 'alder-stone' ),
					'name'  => 'home_process_2_title',
					'type'  => 'text',
					'default_value' => __( 'Develop', 'alder-stone' ),
				),
				array(
					'key'   => 'field_alder_stone_home_process_2_text',
					'label' => __( 'Process Step 2 Text', 'alder-stone' ),
					'name'  => 'home_process_2_text',
					'type'  => 'textarea',
					'default_value' => __( 'We turn the initial direction into a considered, coordinated design.', 'alder-stone' ),
				),
				array(
					'key'   => 'field_alder_stone_home_process_3_title',
					'label' => __( 'Process Step 3 Title', 'alder-stone' ),
					'name'  => 'home_process_3_title',
					'type'  => 'text',
					'default_value' => __( 'Deliver', 'alder-stone' ),
				),
				array(
					'key'   => 'field_alder_stone_home_process_3_text',
					'label' => __( 'Process Step 3 Text', 'alder-stone' ),
					'name'  => 'home_process_3_text',
					'type'  => 'textarea',
					'default_value' => __( 'We oversee the details that bring the project to life with care and precision.', 'alder-stone' ),
				),

				// Call to action.
				array(
					'key'       => 'field_alder_stone_home_tab_cta',
					'label'     => __( 'Call to Action', 'alder-stone' ),
					'type'      => 'tab',
					'placement' => 'left',
				),
				array(
					'key'   => 'field_alder_stone_home_cta_title',
					'label' => __( 'CTA Title', 'alder-stone' ),
					'name'  => 'home_cta_title',
					'type'  => 'text',
					'default_value' => __( 'Start a conversation.', 'alder-stone' ),
				),
				array(
					'key'   => 'field_alder_stone_home_cta_text',
					'label' => __( 'CTA Text', 'alder-stone' ),
					'name'  => 'home_cta_text',
					'type'  => 'textarea',
					'default_value' => __( 'Tell us about your site, your ambitions, and the space you want to create.', 'alder-stone' ),
				),
				array(
					'key'   => 'field_alder_stone_home_cta_button',
					'label' => __( 'CTA Button', 'alder-stone' ),
					'name'  => 'home_cta_button',
					'type'  => 'link',
					'default_value' => array(
						'title'  => __( 'Get in Touch', 'alder-stone' ),
						'url'    => home_url( '/contact/' ),
						'target' => '',
					),
				),
			),
			'location' => array(
				array(
					array(
						'param'    => 'page_type',
						'operator' => '==',
						'value'    => 'front_page',
					),
				),
			),
		)
	);
}
add_action( 'acf/init', 'alder_stone_register_home_acf_fields' );
