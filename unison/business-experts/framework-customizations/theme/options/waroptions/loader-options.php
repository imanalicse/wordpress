<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'loader' => array(
		'title'   => esc_html__( 'Loader Settings', 'martin' ),
		'type'    => 'tab',
		'options' => array(
			'loader-box' => array(
				'title'   => esc_html__( 'Loader Settings', 'martin' ),
				'type'    => 'box',
				'options' => array(
					'loader_status'                    => array(
                                                'label'        => esc_html__( 'Loader Status', 'martin' ),
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
                                                'desc'         => esc_html__( 'Do you want to show preloader?', 'martin' ),
                                        ),
                                        'loaders'              => array(
                                                'label'   => esc_html__( 'Loader Picker', 'martin' ),
                                                'type'    => 'image-picker',
                                                'value'   => '17',
                                                'desc'    => esc_html__( 'Select your loader please.',
                                                        'martin' ),
                                                'choices' => array(
                                                        '1' => array(
                                                                'small' => array(
                                                                        'height' => 150,
                                                                        'src'    => get_template_directory_uri() . '/framework-customizations/Assets/images/options/1.png'
                                                                ),
                                                                'large' => array( ),
                                                        ),
                                                        '2' => array(
                                                                'small' => array(
                                                                        'height' => 150,
                                                                        'src'    => get_template_directory_uri() . '/framework-customizations/Assets/images/options/2.png'
                                                                ),
                                                                'large' => array( ),
                                                        ),
                                                        '3' => array(
                                                                'small' => array(
                                                                        'height' => 150,
                                                                        'src'    => get_template_directory_uri() . '/framework-customizations/Assets/images/options/3.png'
                                                                ),
                                                                'large' => array( ),
                                                        ),
                                                        '4' => array(
                                                                'small' => array(
                                                                        'height' => 150,
                                                                        'src'    => get_template_directory_uri() . '/framework-customizations/Assets/images/options/4.png'
                                                                ),
                                                                'large' => array( ),
                                                        ),
                                                        '5' => array(
                                                                'small' => array(
                                                                        'height' => 150,
                                                                        'src'    => get_template_directory_uri() . '/framework-customizations/Assets/images/options/5.png'
                                                                ),
                                                                'large' => array( ),
                                                        ),
                                                        '6' => array(
                                                                'small' => array(
                                                                        'height' => 150,
                                                                        'src'    => get_template_directory_uri() . '/framework-customizations/Assets/images/options/6.png'
                                                                ),
                                                                'large' => array( ),
                                                        ),
                                                        '7' => array(
                                                                'small' => array(
                                                                        'height' => 150,
                                                                        'src'    => get_template_directory_uri() . '/framework-customizations/Assets/images/options/7.png'
                                                                ),
                                                                'large' => array( ),
                                                        ),
                                                        '8' => array(
                                                                'small' => array(
                                                                        'height' => 150,
                                                                        'src'    => get_template_directory_uri() . '/framework-customizations/Assets/images/options/8.png'
                                                                ),
                                                                'large' => array( ),
                                                        ),
                                                        '9' => array(
                                                                'small' => array(
                                                                        'height' => 150,
                                                                        'src'    => get_template_directory_uri() . '/framework-customizations/Assets/images/options/9.png'
                                                                ),
                                                                'large' => array( ),
                                                        ),
                                                        '10' => array(
                                                                'small' => array(
                                                                        'height' => 150,
                                                                        'src'    => get_template_directory_uri() . '/framework-customizations/Assets/images/options/10.png'
                                                                ),
                                                                'large' => array( ),
                                                        ),
                                                        '11' => array(
                                                                'small' => array(
                                                                        'height' => 150,
                                                                        'src'    => get_template_directory_uri() . '/framework-customizations/Assets/images/options/11.png'
                                                                ),
                                                                'large' => array( ),
                                                        ),
                                                        '12' => array(
                                                                'small' => array(
                                                                        'height' => 150,
                                                                        'src'    => get_template_directory_uri() . '/framework-customizations/Assets/images/options/12.png'
                                                                ),
                                                                'large' => array( ),
                                                        ),
                                                        '13' => array(
                                                                'small' => array(
                                                                        'height' => 150,
                                                                        'src'    => get_template_directory_uri() . '/framework-customizations/Assets/images/options/13.png'
                                                                ),
                                                                'large' => array( ),
                                                        ),
                                                        '14' => array(
                                                                'small' => array(
                                                                        'height' => 150,
                                                                        'src'    => get_template_directory_uri() . '/framework-customizations/Assets/images/options/14.png'
                                                                ),
                                                                'large' => array( ),
                                                        ),
                                                        '15' => array(
                                                                'small' => array(
                                                                        'height' => 150,
                                                                        'src'    => get_template_directory_uri() . '/framework-customizations/Assets/images/options/15.png'
                                                                ),
                                                                'large' => array( ),
                                                        ),
                                                        '16' => array(
                                                                'small' => array(
                                                                        'height' => 150,
                                                                        'src'    => get_template_directory_uri() . '/framework-customizations/Assets/images/options/16.png'
                                                                ),
                                                                'large' => array( ),
                                                        ),
                                                        '17' => array(
                                                                'small' => array(
                                                                        'height' => 150,
                                                                        'src'    => get_template_directory_uri() . '/framework-customizations/Assets/images/options/17.png'
                                                                ),
                                                                'large' => array( ),
                                                        ),
                                                        '18' => array(
                                                                'small' => array(
                                                                        'height' => 150,
                                                                        'src'    => get_template_directory_uri() . '/framework-customizations/Assets/images/options/18.png'
                                                                ),
                                                                'large' => array( ),
                                                        ),
                                                        '19' => array(
                                                                'small' => array(
                                                                        'height' => 150,
                                                                        'src'    => get_template_directory_uri() . '/framework-customizations/Assets/images/options/19.png'
                                                                ),
                                                                'large' => array( ),
                                                        ),
                                                        '20' => array(
                                                                'small' => array(
                                                                        'height' => 150,
                                                                        'src'    => get_template_directory_uri() . '/framework-customizations/Assets/images/options/20.png'
                                                                ),
                                                                'large' => array( ),
                                                        ),
                                                        
                                                ),
                                        ),
				)
			),
		)
	)
);