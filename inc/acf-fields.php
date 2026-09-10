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
					'label'     => __( 'Case Study Story', 'alder-stone' ),
					'type'      => 'tab',
					'placement' => 'left',
				),
				array(
					'key'   => 'field_alder_stone_project_challenge',
					'label' => __( 'The Challenge', 'alder-stone' ),
					'name'  => 'project_challenge',
					'type'  => 'textarea',
				),
				array(
					'key'   => 'field_alder_stone_project_response',
					'label' => __( 'Our Response', 'alder-stone' ),
					'name'  => 'project_response',
					'type'  => 'textarea',
				),
				array(
					'key'   => 'field_alder_stone_project_outcome',
					'label' => __( 'The Outcome', 'alder-stone' ),
					'name'  => 'project_outcome',
					'type'  => 'textarea',
				),
				array(
					'key'       => 'field_alder_stone_project_tab_gallery',
					'label'     => __( 'Gallery & Testimonial', 'alder-stone' ),
					'type'      => 'tab',
					'placement' => 'left',
				),
				array(
					'key'           => 'field_alder_stone_project_gallery',
					'label'         => __( 'Project Gallery', 'alder-stone' ),
					'name'          => 'project_gallery',
					'type'          => 'gallery',
					'return_format' => 'id',
					'preview_size'  => 'medium_large',
					'insert'        => 'append',
					'library'       => 'all',
				),
				array(
					'key'   => 'field_alder_stone_project_quote',
					'label' => __( 'Client Quote', 'alder-stone' ),
					'name'  => 'project_quote',
					'type'  => 'textarea',
				),
				array(
					'key'   => 'field_alder_stone_project_quote_attribution',
					'label' => __( 'Quote Attribution', 'alder-stone' ),
					'name'  => 'project_quote_attribution',
					'type'  => 'text',
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
