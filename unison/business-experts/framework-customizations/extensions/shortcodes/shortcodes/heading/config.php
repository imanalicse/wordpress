<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$cfg = array();

$cfg['page_builder'] = array(
	'title'       => esc_html__( 'Heading', 'martin' ),
	'description' => esc_html__( 'Add your heading.', 'martin' ),
	'tab'         => esc_html__( 'Content Elements', 'martin' ),
);
