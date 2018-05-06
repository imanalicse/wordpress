<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
        'paragraph_text' => array(
		'type'   => 'wp-editor',
		'label'  => esc_html__( 'Content', 'martin' ),
		'desc'   => esc_html__( 'Insert your content text.', 'martin' ),
		'reinit' => true,
	),
        'font_styles'                    => array(
		'label'        => esc_html__( 'Special Font', 'martin' ),
		'type'         => 'switch',
		'right-choice' => array(
			'value' => '1',
			'label' => esc_html__( 'Yes', 'martin' )
		),
		'left-choice'  => array(
			'value' => '2',
			'label' => esc_html__( 'No', 'martin' )
		),
		'value'        => '2',
		'desc'         => esc_html__( 'Do you want to show spacial font content?', 'martin' ),
	),
        'text_color' => array(
            'label' => esc_html__('Text Color', 'martin'),
            'desc'  => esc_html__('Please select the text color. Default color is #777777.', 'martin'),
            'type'  => 'color-picker',
            'value' => ''
        ),
        'font_size' => array(
            'label' => esc_html__('Font Size', 'martin'),
            'desc'  => esc_html__('Default font size is 15px. Insert just numeric value. Don\'t need to insert "px".', 'martin'),
            'type'  => 'text',
            'value' => ''
        ),
        'line_height' => array(
            'label' => esc_html__('Line Height', 'martin'),
            'desc'  => esc_html__('Default line height is 26px. Insert just numeric value. Don\'t need to insert "px".', 'martin'),
            'type'  => 'text',
            'value' => ''
        ),      
        'letter_spacing' => array(
            'label' => esc_html__('Letter Spacing', 'martin'),
            'desc'  => esc_html__('Default letter spacing is 0px. Insert just numeric value. Don\'t need to insert "px".', 'martin'),
            'type'  => 'text',
            'value' => ''
        ),      
        'font_weight'      => array(
		'label'   => esc_html__( 'Font Weight', 'martin' ),
		'type'    => 'short-select',
		'value'   => '400',
		'desc'    => esc_html__( 'Select your content text alignment.', 'martin' ),
		'choices' => array(
			'100' => '100',
			'300' => '300',
			'400' => '400',
			'600' => '600',
			'700' => '700',
			'900' => '900',
		)
	),
        'text_style'      => array(
		'label'   => esc_html__( 'Font Style', 'martin' ),
		'type'    => 'short-select',
		'value'   => 'normal',
		'desc'    => esc_html__( 'Select your font style.', 'martin' ),
		'choices' => array(
			'normal' => 'Normal',
			'italic' => 'Italic'
		)
	),
        'text_align'      => array(
		'label'   => esc_html__( 'Title Alignment', 'martin' ),
		'type'    => 'short-select',
		'value'   => 'left',
		'desc'    => esc_html__( 'Select your content text alignment.', 'martin' ),
		'choices' => array(
			'left' => 'Left Align',
			'center' => 'Center Align',
			'right' => 'Right Align'
		)
	),
	'padding_left' => array(
		'type'   => 'text',
		'label'  => esc_html__( 'Padding Left', 'martin' ),
		'desc'   => esc_html__( 'Default Padding left is 0px. Insert just numeric value. Don\'t need to insert "px".', 'martin' )
	),
	'padding_right' => array(
		'type'   => 'text',
		'label'  => esc_html__( 'Padding Right', 'martin' ),
		'desc'   => esc_html__( 'Default Padding Right is 0px. Insert just numeric value. Don\'t need to insert "px".', 'martin' )
	),
	'margin_top' => array(
		'type'   => 'text',
		'label'  => esc_html__( 'Margin Top', 'martin' ),
		'desc'   => esc_html__( 'Default margin top is 0px. Insert just numeric value. Don\'t need to insert "px".', 'martin' )
	),
	'margin_bottom' => array(
		'type'   => 'text',
		'label'  => esc_html__( 'Margin Bottom', 'martin' ),
		'desc'   => esc_html__( 'Default margin top is 10px. Insert just numeric value. Don\'t need to insert "px".', 'martin' )
	)
);
