<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$cfg = array();

$cfg['page_builder'] = array(
	'title'       => esc_html__( 'Section Title', 'martin' ),
	'description' => esc_html__( 'Add your section title.', 'martin' ),
	'tab'         => esc_html__( 'Content Elements', 'martin' ),
);
