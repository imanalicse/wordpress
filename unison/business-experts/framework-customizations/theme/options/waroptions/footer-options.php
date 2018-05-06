<?php if ( ! defined( 'FW' ) ) { die( 'Forbidden' );}
$options = array(
	'footer' => array(
		'title'   => esc_html__( 'Footer Settings', 'martin' ),
		'type'    => 'tab',
		'options' => array(
			'general-box' => array(
				'title'   => esc_html__( 'Footer Settings', 'martin' ),
				'type'    => 'box',
				'options' => array(
                                        'footer_style'              => array(
                                                'label'   => esc_html__( 'Footer Style', 'martin' ),
                                                'type'    => 'short-select',
                                                'value'   => '1',
                                                'desc'    => esc_html__( 'Select your footer style for all pages.', 'martin' ),
                                                'choices' => array(
                                                        '1' => 'Style One',
                                                        '2' => 'Style Two',
                                                        '3' => 'Style Three',
                                                        '4' => 'Style Four',
                                                        '5' => 'Style Five',
                                                )
                                        ),
                                        'footer_logo'             => array(
                                                'label' => esc_html__( 'Footer Logo', 'martin' ),
                                                'desc'  => esc_html__( 'Upload your footer logo here. This logo will show on footer style 2, 3 and 5.',
                                                        'martin' ),
                                                'type'  => 'upload',
                                        ),
                                        'site_info'                 => array(
                                                'label' => esc_html__( 'Copyright Info', 'martin' ),
                                                'type'  => 'wp-editor',
                                                'value' => '&copy; 2016 All Rights Reserved',
                                                'desc'  => esc_html__( 'Insert Copyright Info.', 'martin' ),
                                                'reinit' => true,
                                        ),
                                        'social_status_footer'                    => array(
                                                'label'        => esc_html__( 'Social Status', 'martin' ),
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
                                                'desc'         => esc_html__( 'Do you want to show social buttons in footer? Social links will show on footer style 1, 4 and 5.', 'martin' )
                                        ),
                                        
				)
			),
		)
	)
);