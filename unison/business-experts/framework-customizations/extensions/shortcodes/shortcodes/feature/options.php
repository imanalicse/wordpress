<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
        'title'   => array(
                        'type'  => 'text',
                        'label' => esc_html__( 'Title', 'martin' ),
        ),
        'title_color' => array(
                'label' => esc_html__('Title Color', 'martin'),
                'desc'  => esc_html__('Insert your title color. Default color is #FFFFFF.', 'martin'),
                'type'  => 'color-picker',
                'value' => ''
        ),
        'title_link' => array(
		'label' => esc_html__('Title Link', 'martin'),
		'desc'  => esc_html__('Insert your feature title link here.', 'martin'),
		'type'  => 'text',
                'value' => '#'
	),
        
		
);