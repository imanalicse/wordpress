<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
        'margin_top' => array(
                'type'   => 'text',
                'label' => esc_html__( 'Margin Top', 'martin' ),
                'desc'  => esc_html__( 'Insert your devider margin top. Default margin top is 0.', 'martin' ),
        ),
        'margin_bottom' => array(
                'type'   => 'text',
                'label' => esc_html__( 'Margin Bottom', 'martin' ),
                'desc'  => esc_html__( 'Insert your devider margin bottom. Default margin bottom is 0.', 'martin' ),
        ),
        
		
);