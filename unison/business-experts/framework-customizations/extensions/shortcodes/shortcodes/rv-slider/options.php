<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

/*options process*/

$options = array(
    'sl_shortcode'   => array(
        'label'   => esc_html__('Rv slider Shortcode', 'martin'),
        'desc'    => esc_html__('add Your Slider Shortcode', 'martin'),
        'type'    => 'text'
    )
    
);