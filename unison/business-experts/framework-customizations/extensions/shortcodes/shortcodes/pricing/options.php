<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
        'pricing_style' => array(
                'label'   => esc_html__( 'Pricing Style', 'martin' ),
                'type'    => 'short-select',
                'value'   => '1',
                'desc'    => esc_html__( 'Select your pricing table style.', 'martin' ),
                'choices' => array(
                        '1' => 'Style One',
                        '2' => 'Style Two',
                        '3' => 'Style Three'
                ),
        ),
        'is_active'                    => array(
		'label'        => esc_html__( 'Is Active', 'martin' ),
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
		'desc'         => esc_html__( 'Do you want to make this table Active? If is it then please select "Yes".', 'martin' ),
	),
        'header_bg'             => array(
		'label' => esc_html__( 'Pricing Bg', 'martin' ),
		'desc'  => esc_html__( 'Upload your pricing header bg image. This will only work for Style Two.',
			'martin' ),
		'type'  => 'upload',
	),
        'plan_name'              => array(
		'label'   => esc_html__( 'Plan Name', 'martin' ),
		'type'    => 'text',
		'desc'    => esc_html__( 'Insert your plan name.', 'martin' )
	),
        'currency'              => array(
		'label'   => esc_html__( 'Currency', 'martin' ),
		'type'    => 'text',
		'desc'    => esc_html__( 'Insert your currency.', 'martin' )
	),
        'price'              => array(
		'label'   => esc_html__( 'Price', 'martin' ),
		'type'    => 'text',
		'desc'    => esc_html__( 'Insert your Price amount.', 'martin' )
	),
        'period'              => array(
		'label'   => esc_html__( 'Price Period', 'martin' ),
		'type'    => 'text',
		'desc'    => esc_html__( 'Insert your Price period.', 'martin' ),
                'value'   => ''
	),
        'price_list' => array(
		'label'         => esc_html__( 'Table List Item', 'martin' ),
		'popup-title'   => esc_html__( 'Add/Edit List Item', 'martin' ),
		'desc'          => esc_html__( 'Here you can add, remove and edit your price table list item.', 'martin' ),
		'type'          => 'addable-popup',
		'template'      => '{{=content}}',
		'popup-options' => array(
			'content'       => array(
				'label' => esc_html__( 'List Item', 'martin' ),
				'desc'  => esc_html__( 'Enter list item text here', 'martin' ),
				'type'  => 'textarea',
				'teeny' => true
			),
		)
	),
        'label'              => array(
		'label'   => esc_html__( 'Button Label', 'martin' ),
		'type'    => 'text',
		'desc'    => esc_html__( 'Insert your Price button label.', 'martin' ),
                'value'   => 'Sign Up'
	),
        'link'              => array(
		'label'   => esc_html__( 'Button Link', 'martin' ),
		'type'    => 'text',
		'desc'    => esc_html__( 'Insert your Price button link.', 'martin' ),
                'value'   => '#'
	)
	
);