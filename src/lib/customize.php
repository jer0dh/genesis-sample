<?php
/**
 * Genesis Sample.
 *
 * This file adds the Customizer additions to the Genesis Sample Theme.
 *
 * @package Genesis Sample
 * @author  StudioPress
 * @license GPL-2.0-or-later
 * @link    https://www.studiopress.com/
 */

add_action( 'customize_register', 'genesis_sample_customizer_register' );
/**
 * Registers settings and controls with the Customizer.
 *
 * @since 2.2.3
 *
 * @param WP_Customize_Manager $wp_customize Customizer object.
 */
function genesis_sample_customizer_register( $wp_customize ) {

	$appearance = genesis_get_config( 'appearance' );

	$wp_customize->add_setting(
		'genesis_sample_link_color',
		[
			'default'           => $appearance['default-colors']['link'],
			'sanitize_callback' => 'sanitize_hex_color',
		]
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'genesis_sample_link_color',
			[
				'description' => __( 'Change the color of post info links and button blocks, the hover color of linked titles and menu items, and more.', '<%= pkg.theme.textdomain %>' ),
				'label'       => __( 'Link Color', '<%= pkg.theme.textdomain %>' ),
				'section'     => 'colors',
				'settings'    => 'genesis_sample_link_color',
			]
		)
	);

	$wp_customize->add_setting(
		'genesis_sample_accent_color',
		[
			'default'           => $appearance['default-colors']['accent'],
			'sanitize_callback' => 'sanitize_hex_color',
		]
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'genesis_sample_accent_color',
			[
				'description' => __( 'Change the default hover color for button links, menu buttons, and submit buttons. The button block uses the Link Color.', '<%= pkg.theme.textdomain %>' ),
				'label'       => __( 'Accent Color', '<%= pkg.theme.textdomain %>' ),
				'section'     => 'colors',
				'settings'    => 'genesis_sample_accent_color',
			]
		)
	);

	$wp_customize->add_setting(
		'genesis_sample_logo_width',
		[
			'default'           => 350,
			'sanitize_callback' => 'absint',
		]
	);

	// Add a control for the logo size.
	$wp_customize->add_control(
		'genesis_sample_logo_width',
		[
			'label'       => __( 'Logo Width', '<%= pkg.theme.textdomain %>' ),
			'description' => __( 'The maximum width of the logo in pixels.', '<%= pkg.theme.textdomain %>' ),
			'priority'    => 9,
			'section'     => 'title_tagline',
			'settings'    => 'genesis_sample_logo_width',
			'type'        => 'number',
			'input_attrs' => [
				'min' => 100,
			],

		]
	);

}
