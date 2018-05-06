<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'gall_image'       => array(
		'label' => esc_html__( 'Gallery Images', 'martin' ),
		'desc'  => esc_html__( 'Upload your gallery images', 'martin' ),
		'type'  => 'multi-upload',
	),
	'margin_top'       => array(
		'label' => esc_html__( 'Margin Top', 'martin' ),
		'desc'  => esc_html__( 'Insert your margin top. Default margin top is 25px;', 'martin' ),
		'type'  => 'text',
	),
	'margin_bottom'       => array(
		'label' => esc_html__( 'Margin Bottom', 'martin' ),
		'desc'  => esc_html__( 'Insert your margin bottom. Default margin bottom is 25px;', 'martin' ),
		'type'  => 'text',
	),
);

