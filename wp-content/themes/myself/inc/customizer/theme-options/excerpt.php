<?php
/**
 * Excerpt options
 *
 * @package Theme Palace
 * @subpackage Myself
 * @since Myself 1.0.0
 */

// Add excerpt section
$wp_customize->add_section( 'myself_excerpt_section', array(
	'title'             => esc_html__( 'Excerpt','myself' ),
	'description'       => esc_html__( 'Excerpt section options.', 'myself' ),
	'panel'             => 'myself_theme_options_panel',
) );


// long Excerpt length setting and control.
$wp_customize->add_setting( 'myself_theme_options[long_excerpt_length]', array(
	'sanitize_callback' => 'myself_sanitize_number_range',
	'validate_callback' => 'myself_validate_long_excerpt',
	'default'			=> $options['long_excerpt_length'],
) );

$wp_customize->add_control( 'myself_theme_options[long_excerpt_length]', array(
	'label'       		=> esc_html__( 'Blog Page Excerpt Length', 'myself' ),
	'description' 		=> esc_html__( 'Total words to be displayed in archive page/search page.', 'myself' ),
	'section'     		=> 'myself_excerpt_section',
	'type'        		=> 'number',
	'input_attrs' 		=> array(
		'style'       => 'width: 80px;',
		'max'         => 100,
		'min'         => 5,
	),
) );

