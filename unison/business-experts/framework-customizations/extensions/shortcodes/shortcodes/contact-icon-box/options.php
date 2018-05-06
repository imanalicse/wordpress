<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
        'icon'    => array(
                'type'  => 'icon',
                'label' => esc_html__('Choose an Icon', 'martin'),
                'set'  => 'tw_line_icon_set',
        ),
        'icon_color' => array(
		'label' => esc_html__('Icon Color', 'martin'),
		'desc'  => esc_html__('Insert your title color. Default color is #f79521.', 'martin'),
		'type'  => 'color-picker',
                'value' => ''
	),
        'title'   => array(
                'type'  => 'text',
                'label' => esc_html__( 'Title', 'martin' ),
        ),
        'title_color' => array(
		'label' => esc_html__('Title Color', 'martin'),
		'desc'  => esc_html__('Insert your title color. Default color is #222222.', 'martin'),
		'type'  => 'color-picker',
                'value' => ''
	),
        'content'                 => array(
		'label' => esc_html__( 'Content', 'martin' ),
		'type'  => 'wp-editor',
		'value' => '',
		'desc'  => esc_html__( 'Please insert your icon box content', 'martin' ),
		'reinit' => true,
	),
        'content_color' => array(
		'label' => esc_html__('Content Color', 'martin'),
		'desc'  => esc_html__('Insert your content color. Default color is #777777.', 'martin'),
		'type'  => 'color-picker',
                'value' => ''
	),
        'padding_top'   => array(
                'type'  => 'text',
                'label' => esc_html__( 'Padding Top', 'martin' ),
                'desc'  => esc_html__('Do you need padding in Top. Please insert a number. Default padding 12px.', 'martin')
        ),
        'padding_bottom'   => array(
                'type'  => 'text',
                'label' => esc_html__( 'Padding Bottom', 'martin' ),
                'desc'  => esc_html__('Do you need padding in Bottom. Please insert a number. Default padding 12px.', 'martin')
        ),
		
);