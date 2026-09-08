<?php
/**
 * Advanced Custom Fields registrations.
 *
 * @package AlderStone
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

/**
 * Registers the Project Details field group.
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
			'title'    => __( 'Project Details', 'alder-stone' ),
			'fields'   => array(
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
