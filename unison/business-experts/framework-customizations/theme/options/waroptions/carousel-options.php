<?php if ( ! defined( 'FW' ) ) { die( 'Forbidden' );}

$options = array(
    'carousel' => array(
        'title'   => esc_html__( 'Carousel Settings', 'martin' ),
        'type'    => 'tab',
        'options' => array(
            'general-box' => array(
                'title'   => esc_html__( 'Carousel Settings', 'martin' ),
                'type'    => 'box',
                'options' => array(
                    
                    'slider_heading'    => array(
                        'label' => esc_html__( 'Slider Heading', 'martin' ),
                        'desc'  => esc_html__( 'Insert your slider heading.', 'martin' ),
                        'type'  => 'textarea',
                        'value' => ''
                    ),
                    'slider_subheading'    => array(
                        'label' => esc_html__( 'Slider Sub Heading', 'martin' ),
                        'desc'  => esc_html__( 'Insert your slider Sub heading. Only applicable for slider style 3.', 'martin' ),
                        'type'  => 'textarea',
                        'value' => ''
                    ),
                    'slider_desc'    => array(
                        'label' => esc_html__( 'Slider Description', 'martin' ),
                        'desc'  => esc_html__( 'Insert your slider short description.', 'martin' ),
                        'type'  => 'textarea',
                        'value' => ''
                    ),
                    'button_text' => array(
                        'label' => esc_html__( 'Button Label', 'martin' ),
                        'desc'  => esc_html__( 'Insert slider Item button label', 'martin' ),
                        'type'  => 'text',
                        'value' => 'Show More'
                    ),
                    'button_link' => array(
                        'label' => esc_html__( 'Button Link', 'martin' ),
                        'desc'  => esc_html__( 'Insert slider Item button Link', 'martin' ),
                        'type'  => 'text',
                        'value' => 'http://'
                    )
                )
            ),
        )
    )
);