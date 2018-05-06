<?php if ( ! defined( 'FW' ) ) { die( 'Forbidden' );}
$options = array(
	'header' => array(
		'title'   => esc_html__( 'Header Settings', 'martin' ),
		'type'    => 'tab',
		'options' => array(
			'general-box' => array(
				'title'   => esc_html__( 'Header Settings', 'martin' ),
				'type'    => 'box',
				'options' => array(
                                        'is_sticky' => array(
                                                'label'        => esc_html__( 'Is Sticky', 'martin' ),
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
                                                'desc'         => esc_html__( 'Do you want to show sticky header?', 'martin' )
                                        ),
					'favicon' => array(
						'label' => esc_html__( 'Favicon', 'martin' ),
						'desc'  => esc_html__( 'Upload a favicon image', 'martin' ),
						'type'  => 'upload'
					),
                                        'header_style'              => array(
                                                'label'   => esc_html__( 'Header Style', 'martin' ),
                                                'type'    => 'image-picker',
                                                'value'   => '1',
                                                'desc'    => esc_html__( 'Select your Home page header style. If you selected Header Style 3 then please put Header 03 shortcode after banner or slider. ', 'martin' ),
                                                'choices' => array(
                                                        '1' => array(
                                                                'small' => array(
                                                                        'height' => 100,
                                                                        'src'    => get_template_directory_uri() . '/framework-customizations/Assets/images/options/h1.jpg'
                                                                ),
                                                                'large' => array(),
                                                        ),
                                                        '2' => array(
                                                                'small' => array(
                                                                        'height' => 100,
                                                                        'src'    => get_template_directory_uri() . '/framework-customizations/Assets/images/options/h2.jpg'
                                                                ),
                                                                'large' => array(),
                                                        ),
                                                        '3' => array(
                                                                'small' => array(
                                                                        'height' => 100,
                                                                        'src'    => get_template_directory_uri() . '/framework-customizations/Assets/images/options/h3.jpg'
                                                                ),
                                                                'large' => array(),
                                                        ),
                                                        '4' => array(
                                                                'small' => array(
                                                                        'height' => 100,
                                                                        'src'    => get_template_directory_uri() . '/framework-customizations/Assets/images/options/h4.jpg'
                                                                ),
                                                                'large' => array(),
                                                        ),
                                                        '5' => array(
                                                                'small' => array(
                                                                        'height' => 100,
                                                                        'src'    => get_template_directory_uri() . '/framework-customizations/Assets/images/options/h5.jpg'
                                                                ),
                                                                'large' => array(),
                                                        ),
                                                ),
                                        ),
                                        'phone_number'       => array(
                                                'label' => esc_html__( 'Phone Number', 'martin' ),
                                                'desc'  => esc_html__( 'Insert your phone number. This option only effective for header style 1, 5 and Inner Pages.', 'martin' ),
                                                'type'  => 'text',
                                        ),
                                        'email_address'       => array(
                                                'label' => esc_html__( 'Email_address', 'martin' ),
                                                'desc'  => esc_html__( 'Insert your email address. This option only effective for header style 1, 5 and Inner Pages.', 'martin' ),
                                                'type'  => 'text',
                                                'value' => ''
                                        ),
                                        'is_social'                    => array(
                                                'label'        => esc_html__( 'Is Social?', 'martin' ),
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
                                                'desc'         => esc_html__( 'Do you want to show social icon on top bar? Please trun it to Yes and Setup social links on Social Settings. This option only effective for header style 1, 5 and Inner Pages.', 'martin' ),
                                        ),
                                        'logo_img'       => array(
                                                'label' => esc_html__( 'Logo Image', 'martin' ),
                                                'desc'  => esc_html__( 'Upload your home page logo here. Suggested height is 38px.', 'martin' ),
                                                'type'  => 'upload',
                                        ),
                                        'logo_height'       => array(
                                                'label' => esc_html__( 'Logo Height', 'martin' ),
                                                'desc'  => esc_html__( 'Insert your logo height. Don\'t need to insert px. Default height is 38px.', 'martin' ),
                                                'type'  => 'text',
                                        ),
                                        'logo_padding_top'       => array(
                                                'label' => esc_html__( 'Logo Padding Top', 'martin' ),
                                                'desc'  => esc_html__( 'Insert your logo padding top. Don\'t need to insert px. Default padding top is 36px.', 'martin' ),
                                                'type'  => 'text',
                                        ),
                                        'logo_padding_bottom'       => array(
                                                'label' => esc_html__( 'Logo Padding Bottom', 'martin' ),
                                                'desc'  => esc_html__( 'Insert your logo padding bottom. Don\'t need to insert px. Default padding bottom is 36px.', 'martin' ),
                                                'type'  => 'text',
                                        ),
                                    
                                        
				)
			),
		)
	)
);