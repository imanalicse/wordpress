<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
    'title'   => array(
        'type'  => 'text',
        'label' => esc_html__( 'Title', 'martin' ),
    ),
    'title_font_size' => array(
        'type'   => 'text',
        'label'  => esc_html__( 'Title Font Size', 'martin' ),
        'desc'   => esc_html__( 'Default title font size is 36px. Insert just numeric value. Don\'t need to insert "px".', 'martin' )
    ),
    'title_spacing' => array(
           'label' => esc_html__('Letter Spacing', 'martin'),
           'desc'  => esc_html__('Default line height is 8px. Insert just numeric value. Don\'t need to insert "px".', 'martin'),
           'type'  => 'text',
           'value' => ''
       ),  
    'paragrahp'   => array(
        'type'  => 'textarea',
        'label' => esc_html__( 'Notice', 'martin' ),
    ),
    'param_font_size' => array(
        'type'   => 'text',
        'label'  => esc_html__( 'Notice Font Size', 'martin' ),
        'desc'   => esc_html__( 'Default font size is 12px. Insert just numeric value. Don\'t need to insert "px".', 'martin' )
    ),
    'text_transform' => array(
        'label'   => esc_html__( 'Notice Text Transform', 'martin' ),
        'type'    => 'short-select',
        'value'   => 'none',
        'desc'    => esc_html__( 'Select your notice text transform.', 'martin' ),
        'choices' => array(
                'uppercase' => 'Uppercase',
                'capitalize' => 'Capitalize',
                'lowercase' => 'lowercase',
                'none' => 'None',
        )
    ),
    'shortcode_content' => array(
        'type'  => 'textarea',
        'label' => esc_html__( 'Shortcode', 'martin' ),
        'desc'  => esc_html__( 'Enter the desired shortcode', 'martin' ),
    ),
        
);
