<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
        'styles'          => array(
		'label'   => esc_html__( 'Style', 'martin' ),
		'type'    => 'short-select',
		'value'   => '1',
		'desc'    => esc_html__( 'Select your blog style.', 'martin' ),
		'choices' => array(
			'1' => '3 Column',
			'2' => '2 Column',
			'3' => '1 Column',
		)
	),
        'number_of_item'                    => array(
		'label'        => esc_html__( 'Number of item', 'martin' ),
		'type'         => 'slider',
		'value'        => 3,
		'desc'         => esc_html__( 'How many item you want to show?', 'martin' ),
	)       
	
);