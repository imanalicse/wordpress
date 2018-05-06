<?php if ( ! defined( 'FW' ) ) { die( 'Forbidden' ); }

$options = array(
    'folios' => array(
        'title'   => esc_html__( 'Single Portfolio', 'martin' ),
        'type'    => 'tab',
        'options' => array(
            'blog-box' => array(
                'title'   => esc_html__( 'Single Portfolio Settings', 'martin' ),
                'type'    => 'box',
                'options' => array( 
                        'folio_bread_crumb_bg' => array(
                                'label' => esc_html__( 'Title Sction BG', 'martin' ),
                                'desc'  => esc_html__( 'Upload page title section background image if you want.', 'martin' ),
                                'type'  => 'upload', 
                        ),
                        'folio_title'       => array(
                                'label' => esc_html__( 'Page Title', 'martin' ),
                                'desc'  => esc_html__( 'Insert your single portfolio page title', 'martin' ),
                                'type'  => 'text',
                                'value' => 'Our Projects'
                        ),
                        'folio_is_breadcrumb'                    => array(
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
                        'folio_style'              => array(
                                'label'   => __( 'Single Folio Style', 'martin' ),
                                'type'    => 'short-select',
                                'value'   => '1',
                                'desc'    => __( 'Please select your folio single style. ',
                                        'martin' ),
                                'choices' => array(
                                        '1' => 'Full Width',
                                        '2' => 'Right Sidebar',
                                ),
                        ),
                        'desc_title'       => array(
                                'label' => esc_html__( 'Description Title', 'martin' ),
                                'desc'  => esc_html__( 'Please insert your project description area title.', 'martin' ),
                                'type'  => 'text',
                                'value' => 'Project Description'
                        ),
                        'recent_project'                    => array(
                                'label'        => esc_html__( 'Recent Projects', 'martin' ),
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
                                'desc'         => esc_html__( 'Do you want to show recent projects in single portfolio page?', 'martin' ),
                        ),
                        'recent_title'       => array(
                                'label' => esc_html__( 'Recent Project Sec. Title', 'martin' ),
                                'desc'  => esc_html__( 'Insert your recent project section title', 'martin' ),
                                'type'  => 'text',
                                'value' => 'Recent Project'
                        ),
                        'is_call_to_action'                    => array(
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
                                'value'        => '1',
                                'desc'         => esc_html__( 'Do you want to show call to action at the bottom of single portfolio page?', 'martin' ),
                        ),
                        'call_title'         => array(
                                'type'  => 'text',
                                'label' => esc_html__( 'Call Action Title', 'martin' ),
                                'desc'  => esc_html__( 'Insert your call to action title', 'martin' )
                        ),
                        'call_message'       => array(
                                'type'  => 'textarea',
                                'label' => esc_html__( 'Call Action Message', 'martin' ),
                                'desc'  => esc_html__( 'Enter some content for this message Box', 'martin' )
                        ),
                        'call_buttons' => array(
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