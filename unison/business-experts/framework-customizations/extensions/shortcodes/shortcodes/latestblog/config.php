<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$cfg = array();

$cfg['page_builder'] = array(
	'title'       => esc_html__( 'Latest Blog', 'martin' ),
	'description' => esc_html__( 'Show your latest blog.', 'martin' ),
	'tab'         => esc_html__( 'Content Elements', 'martin' ),
);