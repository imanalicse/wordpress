<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
        'banner_bg'                    => array(
		'label'       => esc_html__( 'Banner BG', 'martin' ),
		'desc'        => esc_html__( 'Upload banner bg image.', 'martin' ),
		'type'        => 'upload'
	),
        'banner_overlay' => array(
		'label' => esc_html__( 'RGBA Color Picker', 'martin' ),
		'type'  => 'rgba-color-picker',
		'value' => 'rgba(41, 194, 225, 0.9)',
		'desc'  => esc_html__( 'Insert your banner overlay image.', 'martin' ),
	),
        'con_position'                    => array(
		'label'        => esc_html__( 'Content Position', 'martin' ),
		'type'         => 'switch',
		'right-choice' => array(
			'value' => 'left',
			'label' => esc_html__( 'Left', 'martin' )
		),
		'left-choice'  => array(
			'value' => 'right',
			'label' => esc_html__( 'Right', 'martin' )
		),
		'value'        => 'right',
		'desc'         => esc_html__( 'Select your content position', 'martin' ),
	),
        'banner_sub'                    => array(
		'label'       => esc_html__( 'Banner Subtitle', 'martin' ),
		'desc'        => esc_html__( 'Insert your banner subtitle text.', 'martin' ),
		'type'        => 'textarea'
	),
        'sub_color'              => array(
		'label' => esc_html__( 'Subtitle Color', 'martin' ),
		'type'  => 'color-picker',
		'value' => '',
		'desc'  => esc_html__( 'Insert your subtitle color. Default color is #FFF.', 'martin' ),
	),
        'banner_title'                    => array(
		'label'       => esc_html__( 'Banner Title', 'martin' ),
		'desc'        => esc_html__( 'Insert your banner title text.', 'martin' ),
		'type'        => 'textarea'
	),
        'title_color'              => array(
		'label' => esc_html__( 'Title Color', 'martin' ),
		'type'  => 'color-picker',
		'value' => '',
		'desc'  => esc_html__( 'Insert your title color. Default color is #FFF.', 'martin' ),
	),
        'button_style'              => array(
                'label'   => esc_html__( 'Button Style', 'martin' ),
                'type'    => 'short-select',
                'value'   => '1',
                'desc'    => esc_html__( 'Select your button style.',
                        'martin' ),
                'choices' => array(
                        '1' => 'Yellow - White',
                        '2' => 'Blackish - Yellow',
                        '3' => 'Blue - Black',
                        '4' => 'Yellow - Black',
                        '5' => 'Black - Yellow',
                        '6' => 'Blue - Yellow',
                        '7' => 'Transparent - Yellow',
                ),
        ),
        'button_label'                    => array(
                'label'        => esc_html__( 'Button Label', 'martin' ),
                'type'         => 'text',
                'value'        => '',
                'desc'         => esc_html__( 'Insert your button label here.', 'martin' ),
        ),
        'button_link'                    => array(
                'label'        => esc_html__( 'Button Link', 'martin' ),
                'type'         => 'text',
                'value'        => '',
                'desc'         => esc_html__( 'Insert your button link here.', 'martin' ),
        ),
);