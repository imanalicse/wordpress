<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$cfg = array();

$cfg['page_builder'] = array(
	'title'       => esc_html__( 'Twitter Feed', 'martin' ),
	'description' => esc_html__( 'Add a Twitt Feed Slider', 'martin' ),
	'tab'         => esc_html__( 'Content Elements', 'martin' ),
	'popup_size'  => 'medium'
);