<?php if ( ! defined( 'FW' ) ) { die( 'Forbidden' );}
$options = array(
	'404' => array(
		'title'   => esc_html__( '404 Settings', 'martin' ),
		'type'    => 'tab',
		'options' => array(
			'general-box' => array(
				'title'   => esc_html__( '404 Settings', 'martin' ),
				'type'    => 'box',
				'options' => array(
                                        'fof_bread_crumb_bg'             => array(
                                                'label' => esc_html__( 'Title Sction BG', 'martin' ),
                                                'desc'  => esc_html__( 'Upload page title section background image if you want.',
                                                        'martin' ),
                                                'type'  => 'upload', 
                                        ),
                                        'fof_blog_title'  => array(
                                                'type'  => 'text',
                                                'label' => esc_html__( '404 Page Title', 'martin' ),
                                                'value' => 'Page Not Found',
                                                'desc'    => esc_html__( 'Insert 404 Page Title. ', 'martin' )
                                        ), 
                                        'fof_is_blog_breadcrumb'                    => array(
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
                                        'fof_blog_bread_title'       => array(
                                                'label' => esc_html__( 'Breadcrumb Title', 'martin' ),
                                                'desc'  => esc_html__( 'Insert your 404 page breadcrumb title', 'martin' ),
                                                'type'  => 'text',
                                                'value' => '404'
                                        ), 
                                        'four_heading'                 => array(
                                                'label' => esc_html__( 'Heading', 'martin' ),
                                                'type'  => 'text',
                                                'value' => '404',
                                                'desc'  => esc_html__( '404 heading text.', 'martin' )
                                        ),
                                        'search_heading'                 => array(
                                                'label' => esc_html__( 'Search Form Heading', 'martin' ),
                                                'type'  => 'text',
                                                'value' => '<span>Sorry,</span> The page was not found',
                                                'desc'  => esc_html__( 'Insert your search form heading here.', 'martin' ),
                                        ),
                                        'content_404'                 => array(
                                                'label' => esc_html__( '404 Content', 'martin' ),
                                                'type'  => 'wp-editor',
                                                'value' => 'They are all together ooky the addams family and we know flipper lives in a world full of wonder flying there under the sea knight rider a shadowy flight of a man. ',
                                                'desc'  => esc_html__( 'Please insert yor 404 page content.', 'martin' ),
                                                'reinit' => true,
                                        ),
                                        'fof_is_call_to_action'                    => array(
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
                                                'desc'         => esc_html__( 'Do you want to show call to action at the bottom of 404 page?', 'martin' ),
                                        ),
                                        'fof_call_title'         => array(
                                                'type'  => 'text',
                                                'label' => esc_html__( 'Call Action Title', 'martin' ),
                                                'desc'  => esc_html__( 'Insert your call to action title', 'martin' )
                                        ),
                                        'fof_call_message'       => array(
                                                'type'  => 'textarea',
                                                'label' => esc_html__( 'Call Action Message', 'martin' ),
                                                'desc'  => esc_html__( 'Enter some content for this message Box', 'martin' )
                                        ),
                                        'fof_call_buttons' => array(
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