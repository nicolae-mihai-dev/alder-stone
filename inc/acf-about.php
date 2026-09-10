<?php
/**
 * Advanced Custom Fields registrations for the About page.
 *
 * @package AlderStone
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

/**
 * Registers the About Page Content field group.
 *
 * @return void
 */
function alder_stone_register_about_acf_fields() {
	if ( ! function_exists( 'acf_add_local_field_group' ) ) {
		return;
	}

	$about_page = get_page_by_path( 'about' );

	if ( ! $about_page ) {
		return;
	}

	acf_add_local_field_group(
		array(
			'key'    => 'group_alder_stone_about_page_content',
			'title'  => __( 'About Page Content', 'alder-stone' ),
			'fields' => array(
				// Hero.
				array(
					'key'       => 'field_alder_stone_about_tab_hero',
					'label'     => __( 'Hero', 'alder-stone' ),
					'type'      => 'tab',
					'placement' => 'left',
				),
				array(
					'key'           => 'field_alder_stone_about_hero_eyebrow',
					'label'         => __( 'About Hero Eyebrow', 'alder-stone' ),
					'name'          => 'about_hero_eyebrow',
					'type'          => 'text',
					'default_value' => __( 'About Alder & Stone', 'alder-stone' ),
				),
				array(
					'key'           => 'field_alder_stone_about_hero_title',
					'label'         => __( 'About Hero Title', 'alder-stone' ),
					'name'          => 'about_hero_title',
					'type'          => 'text',
					'default_value' => __( 'Architecture rooted in place.', 'alder-stone' ),
				),
				array(
					'key'           => 'field_alder_stone_about_hero_text',
					'label'         => __( 'About Hero Text', 'alder-stone' ),
					'name'          => 'about_hero_text',
					'type'          => 'textarea',
					'default_value' => __( 'We create considered spaces shaped by the people who inhabit them, the materials that endure and the character of each setting.', 'alder-stone' ),
				),
				array(
					'key'           => 'field_alder_stone_about_hero_image',
					'label'         => __( 'About Hero Image', 'alder-stone' ),
					'name'          => 'about_hero_image',
					'type'          => 'image',
					'return_format' => 'id',
					'preview_size'  => 'medium_large',
					'library'       => 'all',
				),

				// Introduction.
				array(
					'key'       => 'field_alder_stone_about_tab_intro',
					'label'     => __( 'Introduction', 'alder-stone' ),
					'type'      => 'tab',
					'placement' => 'left',
				),
				array(
					'key'           => 'field_alder_stone_about_intro_eyebrow',
					'label'         => __( 'About Intro Eyebrow', 'alder-stone' ),
					'name'          => 'about_intro_eyebrow',
					'type'          => 'text',
					'default_value' => __( 'Our Perspective', 'alder-stone' ),
				),
				array(
					'key'           => 'field_alder_stone_about_intro_title',
					'label'         => __( 'About Intro Title', 'alder-stone' ),
					'name'          => 'about_intro_title',
					'type'          => 'text',
					'default_value' => __( 'Built with care for the way life unfolds.', 'alder-stone' ),
				),
				array(
					'key'           => 'field_alder_stone_about_intro_text',
					'label'         => __( 'About Intro Text', 'alder-stone' ),
					'name'          => 'about_intro_text',
					'type'          => 'wysiwyg',
					'default_value' => __( '<p>We approach every project with curiosity, clear thinking and respect for its setting. From first conversations to final details, our work brings architecture and construction together around a shared purpose.</p>', 'alder-stone' ),
				),

				// Values.
				array(
					'key'       => 'field_alder_stone_about_tab_values',
					'label'     => __( 'Values', 'alder-stone' ),
					'type'      => 'tab',
					'placement' => 'left',
				),
				array(
					'key'           => 'field_alder_stone_about_values_eyebrow',
					'label'         => __( 'Values Eyebrow', 'alder-stone' ),
					'name'          => 'about_values_eyebrow',
					'type'          => 'text',
					'default_value' => __( 'What Guides Us', 'alder-stone' ),
				),
				array(
					'key'           => 'field_alder_stone_about_values_title',
					'label'         => __( 'Values Title', 'alder-stone' ),
					'name'          => 'about_values_title',
					'type'          => 'text',
					'default_value' => __( 'Principles for thoughtful, lasting work.', 'alder-stone' ),
				),
				array(
					'key'           => 'field_alder_stone_about_value_1_title',
					'label'         => __( 'Value 1 Title', 'alder-stone' ),
					'name'          => 'about_value_1_title',
					'type'          => 'text',
					'default_value' => __( 'People First', 'alder-stone' ),
				),
				array(
					'key'           => 'field_alder_stone_about_value_1_text',
					'label'         => __( 'Value 1 Text', 'alder-stone' ),
					'name'          => 'about_value_1_text',
					'type'          => 'textarea',
					'default_value' => __( 'Every decision begins with the people who will live, work and gather in a space.', 'alder-stone' ),
				),
				array(
					'key'           => 'field_alder_stone_about_value_2_title',
					'label'         => __( 'Value 2 Title', 'alder-stone' ),
					'name'          => 'about_value_2_title',
					'type'          => 'text',
					'default_value' => __( 'Places Matter', 'alder-stone' ),
				),
				array(
					'key'           => 'field_alder_stone_about_value_2_text',
					'label'         => __( 'Value 2 Text', 'alder-stone' ),
					'name'          => 'about_value_2_text',
					'type'          => 'textarea',
					'default_value' => __( 'We listen closely to light, landscape, context and the character already present.', 'alder-stone' ),
				),
				array(
					'key'           => 'field_alder_stone_about_value_3_title',
					'label'         => __( 'Value 3 Title', 'alder-stone' ),
					'name'          => 'about_value_3_title',
					'type'          => 'text',
					'default_value' => __( 'Built to Last', 'alder-stone' ),
				),
				array(
					'key'           => 'field_alder_stone_about_value_3_text',
					'label'         => __( 'Value 3 Text', 'alder-stone' ),
					'name'          => 'about_value_3_text',
					'type'          => 'textarea',
					'default_value' => __( 'We favour clear ideas, honest materials and details that perform beautifully over time.', 'alder-stone' ),
				),

				// Studio.
				array(
					'key'       => 'field_alder_stone_about_tab_studio',
					'label'     => __( 'Studio', 'alder-stone' ),
					'type'      => 'tab',
					'placement' => 'left',
				),
				array(
					'key'           => 'field_alder_stone_about_studio_eyebrow',
					'label'         => __( 'Studio Eyebrow', 'alder-stone' ),
					'name'          => 'about_studio_eyebrow',
					'type'          => 'text',
					'default_value' => __( 'The Studio', 'alder-stone' ),
				),
				array(
					'key'           => 'field_alder_stone_about_studio_title',
					'label'         => __( 'Studio Title', 'alder-stone' ),
					'name'          => 'about_studio_title',
					'type'          => 'text',
					'default_value' => __( 'A collaborative practice for considered work.', 'alder-stone' ),
				),
				array(
					'key'           => 'field_alder_stone_about_studio_text',
					'label'         => __( 'Studio Text', 'alder-stone' ),
					'name'          => 'about_studio_text',
					'type'          => 'wysiwyg',
					'default_value' => __( '<p>Alder &amp; Stone brings architects, builders, consultants and clients into one focused conversation. We combine design rigour with practical coordination to carry ideas through to completion.</p>', 'alder-stone' ),
				),
				array(
					'key'           => 'field_alder_stone_about_studio_image',
					'label'         => __( 'Studio Image', 'alder-stone' ),
					'name'          => 'about_studio_image',
					'type'          => 'image',
					'return_format' => 'id',
					'preview_size'  => 'medium_large',
					'library'       => 'all',
				),

				// Call to action.
				array(
					'key'       => 'field_alder_stone_about_tab_cta',
					'label'     => __( 'CTA', 'alder-stone' ),
					'type'      => 'tab',
					'placement' => 'left',
				),
				array(
					'key'           => 'field_alder_stone_about_cta_title',
					'label'         => __( 'About CTA Title', 'alder-stone' ),
					'name'          => 'about_cta_title',
					'type'          => 'text',
					'default_value' => __( 'Let’s talk about what you want to build.', 'alder-stone' ),
				),
				array(
					'key'           => 'field_alder_stone_about_cta_text',
					'label'         => __( 'About CTA Text', 'alder-stone' ),
					'name'          => 'about_cta_text',
					'type'          => 'textarea',
					'default_value' => __( 'Tell us about your project, your site and the ambitions behind it.', 'alder-stone' ),
				),
				array(
					'key'           => 'field_alder_stone_about_cta_button',
					'label'         => __( 'About CTA Button', 'alder-stone' ),
					'name'          => 'about_cta_button',
					'type'          => 'link',
					'default_value' => array(
						'title'  => __( 'Start a conversation', 'alder-stone' ),
						'url'    => home_url( '/contact/' ),
						'target' => '',
					),
				),
			),
			'location'              => array(
				array(
					array(
						'param'    => 'page',
						'operator' => '==',
						'value'    => (string) $about_page->ID,
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
add_action( 'acf/init', 'alder_stone_register_about_acf_fields' );
