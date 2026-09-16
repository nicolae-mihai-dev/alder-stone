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
					'key'           => 'field_alder_stone_project_gallery_image_1',
					'label'         => __( 'Gallery Image 1', 'alder-stone' ),
					'name'          => 'project_gallery_image_1',
					'type'          => 'image',
					'instructions'  => __( 'First image in the gallery. Use a high-quality landscape image, at least 1536 × 1152 px.', 'alder-stone' ),
					'return_format' => 'id',
					'preview_size'  => 'medium_large',
				),
				array(
					'key'           => 'field_alder_stone_project_gallery_image_2',
					'label'         => __( 'Gallery Image 2', 'alder-stone' ),
					'name'          => 'project_gallery_image_2',
					'type'          => 'image',
					'instructions'  => __( 'Second image in the gallery. Use a high-quality landscape image, at least 1536 × 1152 px.', 'alder-stone' ),
					'return_format' => 'id',
					'preview_size'  => 'medium_large',
				),
				array(
					'key'           => 'field_alder_stone_project_gallery_image_3',
					'label'         => __( 'Gallery Image 3', 'alder-stone' ),
					'name'          => 'project_gallery_image_3',
					'type'          => 'image',
					'instructions'  => __( 'Third image in the gallery. When used after two images, it becomes the wide closing image.', 'alder-stone' ),
					'return_format' => 'id',
					'preview_size'  => 'medium_large',
				),
				array(
					'key'           => 'field_alder_stone_project_gallery_image_4',
					'label'         => __( 'Gallery Image 4 (optional)', 'alder-stone' ),
					'name'          => 'project_gallery_image_4',
					'type'          => 'image',
					'instructions'  => __( 'Optional fourth image. Images display in this numbered order.', 'alder-stone' ),
					'return_format' => 'id',
					'preview_size'  => 'medium_large',
				),
				array(
					'key'           => 'field_alder_stone_project_gallery_image_5',
					'label'         => __( 'Gallery Image 5 (optional)', 'alder-stone' ),
					'name'          => 'project_gallery_image_5',
					'type'          => 'image',
					'instructions'  => __( 'Optional fifth image. Images display in this numbered order.', 'alder-stone' ),
					'return_format' => 'id',
					'preview_size'  => 'medium_large',
				),
				array(
					'key'           => 'field_alder_stone_project_gallery_image_6',
					'label'         => __( 'Gallery Image 6 (optional)', 'alder-stone' ),
					'name'          => 'project_gallery_image_6',
					'type'          => 'image',
					'instructions'  => __( 'Optional sixth image. Images display in this numbered order.', 'alder-stone' ),
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
