<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'image'            => array(
		'type'  => 'upload',
		'label' => esc_html__( 'Choose Image', 'martin' ),
		'desc'  => esc_html__( 'Upload an shortcode for consulting shortcode. Image minimum resolution is 460x805.', 'martin' )
	),
        'heading'              => array(
		'label'   => esc_html__( 'Consulting Heading', 'martin' ),
		'type'    => 'text',
		'value'   => '',
		'desc'    => esc_html__( 'Insert your consulting heading text.', 'martin' )
	),
	'consulting' => array(
		'label'         => esc_html__( 'Consulting Text Boxes', 'martin' ),
		'popup-title'   => esc_html__( 'Add/Edit Consulting Text Boxes', 'martin' ),
		'desc'          => esc_html__( 'Here you can add, remove and edit your Consulting Text Boxes.', 'martin' ),
		'type'          => 'addable-popup',
		'template'      => '{{=title}}',
		'popup-options' => array(
                        'title'             => array(
                                'label' => esc_html__( 'Title', 'martin' ),
                                'desc'  => esc_html__( 'Insert Title', 'martin' ),
                                'type'  => 'text',
                        ),
                        'title_link'             => array(
                                'label' => esc_html__( 'Title Link', 'martin' ),
                                'desc'  => esc_html__( 'Insert Title link if you want.', 'martin' ),
                                'type'  => 'text',
                                'value' => '#'
                        ),
			'content'       => array(
				'label' => esc_html__( 'Quote', 'martin' ),
				'desc'  => esc_html__( 'Enter the testimonial here', 'martin' ),
				'type'  => 'textarea'
			),
                        'icon' => array(
                                    'label' => esc_html__('Icon', 'martin'),
                                    'desc'  => esc_html__('Select your text box icon.', 'martin'),
                                    'type'  => 'icon',
                                    'set'  => 'tw_line_icon_set',
                        ),
			'margin_top'   => array(
				'label' => esc_html__( 'Margin Top', 'martin' ),
				'desc'  => esc_html__( 'Insert text box margin top. Default margin top 0px.', 'martin' ),
				'type'  => 'text'
			),
                        'margin_bottom' => array(
                                    'label' => esc_html__('Margin Bottom', 'martin'),
                                    'desc'  => esc_html__('Insert text box margin bottom. Default margin bottom 40px;', 'martin'),
                                    'type'  => 'text',
                        ),
		)
	)
);

