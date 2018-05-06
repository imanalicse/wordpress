<?php if ( ! defined( 'FW' ) ) { die( 'Forbidden' ); }

$options = array(
    'portfolio' => array(
        'title'   => esc_html__( 'Portfolio Settings', 'martin' ),
        'type'    => 'tab',
        'options' => array(
            'portfolio-box' => array(
                'title'   => esc_html__( 'Portfolio Settings', 'martin' ),
                'type'    => 'box',
                'options' => array(
                        'portfolio_bread_crumb_bg' => array(
                                'label' => esc_html__( 'Title Sction BG', 'martin' ),
                                'desc'  => esc_html__( 'Upload page title section background image if you want.', 'martin' ),
                                'type'  => 'upload', 
                        ),
                        'portfolio_title'       => array(
                                'label' => esc_html__( 'Page Title', 'martin' ),
                                'desc'  => esc_html__( 'Insert your portfolio page title', 'martin' ),
                                'type'  => 'text',
                                'value' => 'Our Projects'
                        ),
                        'is_breadcrumb'                    => array(
                                'label'        => esc_html__( 'Is Breadcrumb?', 'martin' ),
                                'type'         => 'switch',
                                'right-choice' => array(
                                        'value' => '1',
                                        'label' => esc_html__( 'Yes', 'martin' )
                                ),
                                'left-choice'  => array(
                                        'value' => '2',
                                        'label' => esc_html__( 'No', 'martin' )
                                ),
                                'value'        => '1',
                                'desc'         => esc_html__( 'Do you want to show breadcrumb?', 'martin' ),
                        ),
                        'bread_title'       => array(
                                'label' => esc_html__( 'Breadcrumb Title', 'martin' ),
                                'desc'  => esc_html__( 'Insert your portfolio page breadcrumb title', 'martin' ),
                                'type'  => 'text',
                                'value' => 'Fullwidth'
                        ),
                        'is_sec_title'                    => array(
                                'label'        => esc_html__( 'Is Section Title?', 'martin' ),
                                'type'         => 'switch',
                                'right-choice' => array(
                                        'value' => '1',
                                        'label' => esc_html__( 'Yes', 'martin' )
                                ),
                                'left-choice'  => array(
                                        'value' => '2',
                                        'label' => esc_html__( 'No', 'martin' )
                                ),
                                'value'        => '1',
                                'desc'         => esc_html__( 'Do you want to show section title and subtitle in portfolio page?', 'martin' ),
                        ),
                        'portfolio_sec_title'       => array(
                                'label' => esc_html__( 'Section Title', 'martin' ),
                                'desc'  => esc_html__( 'Insert your portfolio section title', 'martin' ),
                                'type'  => 'text',
                                'value' => 'Our Recent Projects'
                        ),
                        'portfolio_sec_sub_title'       => array(
                                'label' => esc_html__( 'Section Sub Title', 'martin' ),
                                'desc'  => esc_html__( 'Insert your portfolio section sub title', 'martin' ),
                                'type'  => 'text',
                                'value' => 'Explore Our works'
                        ),
                        'portfolio_item_number'       => array(
                                'label' => esc_html__( 'Number of Item', 'martin' ),
                                'desc'  => esc_html__( 'How many item do you want to show?', 'martin' ),
                                'type'  => 'slider',
                                'value' => 9
                        ),
                        'folio_is_call_to_action'                    => array(
                                'label'        => esc_html__( 'Is Call To Action?', 'martin' ),
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
                                'desc'         => esc_html__( 'Do you want to show call to action at the bottom of Portfolio page?', 'martin' ),
                        ),
                        'folio_call_title'         => array(
                                'type'  => 'text',
                                'label' => esc_html__( 'Call Action Title', 'martin' ),
                                'desc'  => esc_html__( 'Insert your call to action title', 'martin' )
                        ),
                        'folio_call_message'       => array(
                                'type'  => 'textarea',
                                'label' => esc_html__( 'Call Action Message', 'martin' ),
                                'desc'  => esc_html__( 'Enter some content for this message Box', 'martin' )
                        ),
                        'folio_call_buttons' => array(
                                'label'         => esc_html__( 'Buttons', 'martin' ),
                                'popup-title'   => esc_html__( 'Add/Edit Buttons', 'martin' ),
                                'desc'          => esc_html__( 'Here you can add, remove and edit your Buttons.', 'martin' ),
                                'type'          => 'addable-popup',
                                'template'      => '{{=button_label}}',
                                'popup-options' => array(
                                        'btn_styles'          => array(
                                                'label'   => esc_html__( 'BTN Style', 'martin' ),
                                                'type'    => 'short-select',
                                                'value'   => '2',
                                                'desc'    => esc_html__( 'Select your button style.', 'martin' ),
                                                'choices' => array(
                                                        '1' => 'Blackish',
                                                        '2' => 'Yellow',
                                                        '3' => 'Blue'
                                                )
                                        ),
                                        'button_label'  => array(
                                                'label' => esc_html__( 'Button Label', 'martin' ),
                                                'desc'  => esc_html__( 'Insert your button label text', 'martin' ),
                                                'type'  => 'text',
                                                'value' => 'Click'
                                        ),
                                        'button_link'   => array(
                                                'label' => esc_html__( 'Button Link', 'martin' ),
                                                'desc'  => esc_html__( 'Where should your button link to. If you want to make it Scroll Button then please insert your scroll to section id.', 'martin' ),
                                                'type'  => 'text',
                                                'value' => '#'
                                        ),
                                        'button_action' => array(
                                                'type'    => 'switch',
                                                'label'   => esc_html__( 'Button Action', 'martin' ),
                                                'desc'    => esc_html__( 'Select your button action.', 'martin' ),
                                                'value'   => '1',
                                                'right-choice' => array(
                                                        'value' => '1',
                                                        'label' => esc_html__('Scroll', 'martin'),
                                                ),
                                                'left-choice' => array(
                                                        'value' => '2',
                                                        'label' => esc_html__('Load', 'martin'),
                                                ),
                                        ),
                                )
                        ),
                )
            ),
        )
    )
);