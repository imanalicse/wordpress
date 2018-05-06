<?php if ( ! defined( 'FW' ) ) { die( 'Forbidden' ); }

$options = array(
    'slider' => array(
        'title'   => esc_html__( 'Slider Settings', 'martin' ),
        'type'    => 'tab',
        'options' => array(
            'general-box' => array(
                'title'   => esc_html__( 'Slider Settings', 'martin' ),
                'type'    => 'box',
                'options' => array(
                    'slider_status'=> array(
                        'label'        => esc_html__( 'Slider Status', 'martin' ),
                        'type'         => 'switch',
                        'right-choice' => array(
                            'value' => '1',
                            'label' => esc_html__( 'Yes', 'martin' )
                        ),
                        'left-choice'  => array(
                            'value' => '2',
                            'label' => esc_html__( 'No', 'martin' )
                        ),
                        'value' => '1',
                        'desc' => esc_html__( 'Do you want to show slider on home page?',
                                'martin' )
                    ),
                    'slider_type' => array(
                        'type'         => 'multi-picker',
                        'label'        => false,
                        'desc'         => false,
                        'value'        => array(
                            'slide_type' => 'carousel',
                        ),
                        'picker'       => array(
                            'slide_type' => array(
                                'label'   => esc_html__( 'Slider Type', 'martin' ),
                                'type'    => 'radio',
                                'choices' => array(
                                    'carousel'  => esc_html__( 'Custom Slider', 'martin' ),
                                    'revolution' => esc_html__( 'Revolution Slider', 'martin' )
                                ),
                                'desc'    => esc_html__( 'Please select your slider type. ', 'martin' )
                            )
                        ),
                        'choices'   => array(
                            'carousel'  => array(
                                'carousel_style'              => array(
                                    'label'   => esc_html__( 'Carousel Style', 'martin' ),
                                    'type'    => 'short-select',
                                    'value'   => '1',
                                    'desc'    => esc_html__( 'Select your carousel style.', 'martin' ),
                                    'choices' => array(
                                            '1' => 'All Item In Center',
                                            '2' => 'All Item In Left',
                                            '3' => 'Center with Border'
                                    ),
                                ),
                                'category_ID'  => array(
                                    'type'  => 'text',
                                    'label' => esc_html__( 'Category ID', 'martin' ),
                                    'desc'    => esc_html__( 'Insert category ID if you want to show specific category item. ', 'martin' )
                                ),
                                'number_item'  => array(
                                    'type'  => 'text',
                                    'label' => esc_html__( 'Number of Item', 'martin' ),
                                    'desc'    => esc_html__( 'How many item do you want to show?. ', 'martin' )
                                ),
                        ),
                            'revolution' => array(
                                'rev_shortcode'  => array(
                                    'type'  => 'text',
                                    'label' => esc_html__( 'Slider Shortcode', 'martin' ),
                                    'desc'    => esc_html__( 'Please insert your Revolution Slider shortcode. ', 'martin' )
                                ),
                            ),
                        ),
                        'show_borders' => false,
                ),
                    
                    
                )
            ),
        )
    )
);