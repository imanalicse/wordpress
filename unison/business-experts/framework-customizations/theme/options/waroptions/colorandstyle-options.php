<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}



$options = array(
	'colorandstyle' => array(
		'title'   => esc_html__( 'Style And Color', 'martin' ),
		'type'    => 'tab',
		'options' => array(
			'colorandstyle-box' => array(
				'title'   => esc_html__( 'Style And Color Settings', 'martin' ),
				'type'    => 'box',
				'options' => array(
				    'custom_css'              => array(
                                            'label'   => esc_html__( 'Custom CSS', 'martin' ),
                                            'type'    => 'textarea',
                                            'value'   => ''
                                    ),
                                    'default_accent'              => array(
                                                'label'   => esc_html__( 'Accent Color', 'martin' ),
                                                'type'    => 'image-picker',
                                                'value'   => 'color1',
                                                'desc'    => esc_html__( 'Select your default accent color.', 'martin' ),
                                                'choices' => array(
                                                        'color1' => array(
                                                                'small' => array(
                                                                        'height' => 20,
                                                                        'src'    => get_template_directory_uri() . '/framework-customizations/Assets/images/options/colors/1.png'
                                                                ),
                                                                'large' => array( ),
                                                        ),
                                                        'color2' => array(
                                                                'small' => array(
                                                                        'height' => 20,
                                                                        'src'    => get_template_directory_uri() . '/framework-customizations/Assets/images/options/colors/2.png'
                                                                ),
                                                                'large' => array( ),
                                                        ),
                                                        'color3' => array(
                                                                'small' => array(
                                                                        'height' => 20,
                                                                        'src'    => get_template_directory_uri() . '/framework-customizations/Assets/images/options/colors/3.png'
                                                                ),
                                                                'large' => array( ),
                                                        ),
                                                        'color4' => array(
                                                                'small' => array(
                                                                        'height' => 20,
                                                                        'src'    => get_template_directory_uri() . '/framework-customizations/Assets/images/options/colors/4.png'
                                                                ),
                                                                'large' => array( ),
                                                        ),
                                                        'color5' => array(
                                                                'small' => array(
                                                                        'height' => 20,
                                                                        'src'    => get_template_directory_uri() . '/framework-customizations/Assets/images/options/colors/5.png'
                                                                ),
                                                                'large' => array( ),
                                                        ),
                                                        'color6' => array(
                                                                'small' => array(
                                                                        'height' => 20,
                                                                        'src'    => get_template_directory_uri() . '/framework-customizations/Assets/images/options/colors/6.png'
                                                                ),
                                                                'large' => array( ),
                                                        ),
                                                        'color7' => array(
                                                                'small' => array(
                                                                        'height' => 20,
                                                                        'src'    => get_template_directory_uri() . '/framework-customizations/Assets/images/options/colors/7.png'
                                                                ),
                                                                'large' => array( ),
                                                        ),
                                                        'color8' => array(
                                                                'small' => array(
                                                                        'height' => 20,
                                                                        'src'    => get_template_directory_uri() . '/framework-customizations/Assets/images/options/colors/8.png'
                                                                ),
                                                                'large' => array( ),
                                                        ),
                                                        'color9' => array(
                                                                'small' => array(
                                                                        'height' => 20,
                                                                        'src'    => get_template_directory_uri() . '/framework-customizations/Assets/images/options/colors/9.png'
                                                                ),
                                                                'large' => array( ),
                                                        ),
                                                        'color10' => array(
                                                                'small' => array(
                                                                        'height' => 20,
                                                                        'src'    => get_template_directory_uri() . '/framework-customizations/Assets/images/options/colors/10.png'
                                                                ),
                                                                'large' => array( ),
                                                        ),
                                                        'color11' => array(
                                                                'small' => array(
                                                                        'height' => 20,
                                                                        'src'    => get_template_directory_uri() . '/framework-customizations/Assets/images/options/colors/11.png'
                                                                ),
                                                                'large' => array( ),
                                                        ),
                                                        'color12' => array(
                                                                'small' => array(
                                                                        'height' => 20,
                                                                        'src'    => get_template_directory_uri() . '/framework-customizations/Assets/images/options/colors/12.png'
                                                                ),
                                                                'large' => array( ),
                                                        ),
                                                        'color13' => array(
                                                                'small' => array(
                                                                        'height' => 20,
                                                                        'src'    => get_template_directory_uri() . '/framework-customizations/Assets/images/options/colors/13.png'
                                                                ),
                                                                'large' => array( ),
                                                        ),
                                                        'color14' => array(
                                                                'small' => array(
                                                                        'height' => 20,
                                                                        'src'    => get_template_directory_uri() . '/framework-customizations/Assets/images/options/colors/14.png'
                                                                ),
                                                                'large' => array( ),
                                                        ),
                                                        'color15' => array(
                                                                'small' => array(
                                                                        'height' => 20,
                                                                        'src'    => get_template_directory_uri() . '/framework-customizations/Assets/images/options/colors/15.png'
                                                                ),
                                                                'large' => array( ),
                                                        )
                                                        
                                                ),
                                        ),
                                        'is_custome_accent'                    => array(
                                                'label'        => esc_html__( 'Is Custom Color?', 'martin' ),
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
                                                'desc'         => esc_html__( 'Do you want to show your custome color preset? Please turn it to yes and insert your colors bellow fields.', 'martin' ),
                                        ),
                                        'primary_hex'              => array(
                                                'label' => esc_html__( 'Primary HEX', 'martin' ),
                                                'type'  => 'color-picker',
                                                'value' => '',
                                                'desc'  => esc_html__( 'Please insert your primary HEX color code.', 'martin' ),
                                        ),
                                        'primary_rgb' => array(
                                                'label' => esc_html__( 'Primary RGB', 'martin' ),
                                                'type'  => 'rgba-color-picker',
                                                'value' => '',
                                                'desc'  => esc_html__( 'Please insert your primary RGB color code.', 'martin' ),
                                        ),
                                        'secondary_hex'              => array(
                                                'label' => esc_html__( 'Secondary HEX', 'martin' ),
                                                'type'  => 'color-picker',
                                                'value' => '',
                                                'desc'  => esc_html__( 'Please insert your secondary HEX color code.', 'martin' ),
                                        ),
                                        'secondary_rgb' => array(
                                                'label' => esc_html__( 'Secondary RGB', 'martin' ),
                                                'type'  => 'rgba-color-picker',
                                                'value' => '',
                                                'desc'  => esc_html__( 'Please insert your secondary RGB color code.', 'martin' ),
                                        ),
                                    
				)
			),
		)
	)
);