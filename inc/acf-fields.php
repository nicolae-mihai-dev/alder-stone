<?php
/**
 * Advanced Custom Fields registrations for Project case studies.
 *
 * @package AlderStone
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

/**
 * Registers the Project Case Study field group.
 *
 * @return void
 */
function alder_stone_register_project_acf_fields() {
	if ( ! function_exists( 'acf_add_local_field_group' ) ) {
		return;
	}

	acf_add_local_field_group(
		array(
			'key'      => 'group_alder_stone_project_details',
			'title'    => __( 'Project Case Study', 'alder-stone' ),
			'fields'   => array(
				array(
					'key'       => 'field_alder_stone_project_tab_summary',
					'label'     => __( 'Project Summary', 'alder-stone' ),
					'type'      => 'tab',
					'placement' => 'left',
				),
				array(
					'key'   => 'field_alder_stone_project_location',
					'label' => __( 'Location', 'alder-stone' ),
					'name'  => 'project_location',
					'type'  => 'text',
				),
				array(
					'key'   => 'field_alder_stone_project_year',
					'label' => __( 'Year', 'alder-stone' ),
					'name'  => 'project_year',
					'type'  => 'number',
				),
				array(
					'key'   => 'field_alder_stone_project_client',
					'label' => __( 'Client', 'alder-stone' ),
					'name'  => 'project_client',
					'type'  => 'text',
				),
				array(
					'key'   => 'field_alder_stone_project_type',
					'label' => __( 'Project Type', 'alder-stone' ),
					'name'  => 'project_type',
					'type'  => 'text',
				),
				array(
					'key'   => 'field_alder_stone_project_scope',
					'label' => __( 'Scope of Work', 'alder-stone' ),
					'name'  => 'project_scope',
					'type'  => 'text',
				),
				array(
					'key'   => 'field_alder_stone_project_area',
					'label' => __( 'Area / Scale', 'alder-stone' ),
					'name'  => 'project_area',
					'type'  => 'text',
				),
				array(
					'key'       => 'field_alder_stone_project_tab_story',
					'label'     => __( 'Challenge & Response', 'alder-stone' ),
					'type'      => 'tab',
					'placement' => 'left',
				),
				array(
					'key'   => 'field_alder_stone_project_challenge',
					'label' => __( 'The Challenge', 'alder-stone' ),
					'name'  => 'project_challenge',
					'type'  => 'textarea',
					'instructions' => __( 'Describe the central brief, constraint or opportunity that shaped the project.', 'alder-stone' ),
				),
				array(
					'key'   => 'field_alder_stone_project_response',
					'label' => __( 'Our Response', 'alder-stone' ),
					'name'  => 'project_response',
					'type'  => 'textarea',
					'instructions' => __( 'Explain the design decisions and approach taken in response.', 'alder-stone' ),
				),
				array(
					'key'       => 'field_alder_stone_project_tab_outcome',
					'label'     => __( 'The Outcome', 'alder-stone' ),
					'type'      => 'tab',
					'placement' => 'left',
				),
				array(
					'key'   => 'field_alder_stone_project_outcome',
					'label' => __( 'The Outcome', 'alder-stone' ),
					'name'  => 'project_outcome',
					'type'  => 'textarea',
					'instructions' => __( 'Summarise the lasting value and experience of the completed project.', 'alder-stone' ),
				),
				array(
					'key'           => 'field_alder_stone_project_outcome_image',
					'label'         => __( 'Outcome Background Image', 'alder-stone' ),
					'name'          => 'project_outcome_image',
					'type'          => 'image',
					'instructions'  => __( 'A dedicated background for The Outcome. Recommended: 1920 × 1080 px, with calm areas for text.', 'alder-stone' ),
					'return_format' => 'id',
					'preview_size'  => 'medium_large',
				),
				array(
					'key'       => 'field_alder_stone_project_tab_testimonial',
					'label'     => __( 'Client Testimonial', 'alder-stone' ),
					'type'      => 'tab',
					'placement' => 'left',
				),
				array(
					'key'   => 'field_alder_stone_project_quote',
					'label' => __( 'Client Quote', 'alder-stone' ),
					'name'  => 'project_quote',
					'type'  => 'textarea',
					'instructions' => __( 'A short first-person reflection from the client. It appears in its own testimonial section.', 'alder-stone' ),
				),
				array(
					'key'   => 'field_alder_stone_project_quote_attribution',
					'label' => __( 'Quote Attribution', 'alder-stone' ),
					'name'  => 'project_quote_attribution',
					'type'  => 'text',
				),
				array(
					'key'       => 'field_alder_stone_project_tab_gallery',
					'label'     => __( 'Project Gallery', 'alder-stone' ),
					'type'      => 'tab',
					'placement' => 'left',
				),
				array(
					'key'           => 'field_alder_stone_project_gallery',
					'label'         => __( 'Gallery Images', 'alder-stone' ),
					'name'          => 'project_gallery',
					'type'          => 'gallery',
					'instructions'  => __( 'Select and drag to reorder 2–6 images. Use consistent, high-quality project photography; landscape images work best.', 'alder-stone' ),
					'return_format' => 'id',
					'preview_size'  => 'medium_large',
				),
			),
			'location' => array(
				array(
					array(
						'param'    => 'post_type',
						'operator' => '==',
						'value'    => 'project',
					),
				),
			),
		)
	);
}
add_action( 'acf/init', 'alder_stone_register_project_acf_fields' );
