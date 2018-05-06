<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$cfg = array();

$cfg['page_builder'] = array(
	'title'       => esc_html__( 'My Video', 'martin' ),
	'description' => esc_html__( 'Add your video.', 'martin' ),
	'tab'         => esc_html__( 'Media Elements', 'martin' ),
);
