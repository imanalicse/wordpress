<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
        'imgs'                    => array(
		'label'       => esc_html__( 'Image', 'martin' ),
		'desc'        => esc_html__( 'Upload your image for this box. Please upload 146x133 resolution image.', 'martin' ),
		'type'        => 'upload',
	),
        'title'   => array(
                'type'  => 'text',
                'label' => esc_html__( 'Title', 'martin' ),
        ),
        'title_color' => array(
		'label' => esc_html__('Title Color', 'martin'),
		'desc'  => esc_html__('Insert your section sub title color. Default color is #222222.', 'martin'),
		'type'  => 'color-picker',
                'value' => ''
	),
        'content' => array(
                'type'   => 'wp-editor',
                'label' => esc_html__( 'Content', 'martin' ),
                'desc'  => esc_html__( 'Enter the desired content', 'martin' ),
                'reinit' => true,
        ),
        'cnt_color' => array(
                'label' => esc_html__('Content Color', 'martin'),
                'desc'  => esc_html__('Insert your content color. Default color is #777777.', 'martin'),
                'type'  => 'color-picker',
                'value' => ''
        ),
        'martin_top'   => array(
                'type'  => 'text',
                'label' => esc_html__( 'Martin Top', 'martin' ),
                'desc'  => esc_html__('Do you need martin in Top. Please insert a number. Default martin 0px.', 'martin')
        ),
        'martin_bottom'   => array(
                'type'  => 'text',
                'label' => esc_html__( 'Martin Bottom', 'martin' ),
                'desc'  => esc_html__('Do you need martin in Bottom. Please insert a number. Default martin 30px.', 'martin')
        ),
		
);