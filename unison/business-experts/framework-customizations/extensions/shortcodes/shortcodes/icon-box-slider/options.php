<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
        'boxes' => array(
		'label'         => esc_html__( 'Icon Box', 'martin' ),
		'popup-title'   => esc_html__( 'Add/Edit Icon Box', 'martin' ),
		'desc'          => esc_html__( 'Here you can add, remove and edit your Icon Box.', 'martin' ),
		'type'          => 'addable-popup',
		'template'      => '{{=title}}',
		'popup-options' => array(
                        'icon'    => array(
                                'type'  => 'icon',
                                'label' => esc_html__('Choose an Icon', 'martin'),
                                'set'  => 'tw_line_icon_set',
                        ),
                        'icon_color' => array(
                                'label' => esc_html__('Icon Color', 'martin'),
                                'desc'  => esc_html__('Insert your section sub title color. Default color is #FFFFFF.', 'martin'),
                                'type'  => 'color-picker',
                                'value' => ''
                        ),
                        'title'   => array(
                                'type'  => 'text',
                                'label' => esc_html__( 'Title', 'martin' ),
                        ),
                        'title_color' => array(
                                'label' => esc_html__('Title Color', 'martin'),
                                'desc'  => esc_html__('Insert your section sub title color. Default color is #FFFFFF.', 'martin'),
                                'type'  => 'color-picker',
                                'value' => ''
                        ),
                        'content' => array(
                                'type'   => 'wp-editor',
                                'label' => esc_html__( 'Content', 'martin' ),
                                'desc'  => esc_html__( 'Enter the desired content', 'martin' ),
                                'reinit' => true,
                        ),
                        'cnt_color' => array(
                                'label' => esc_html__('Content Color', 'martin'),
                                'desc'  => esc_html__('Insert your content color. Default color is #FFFFFF.', 'martin'),
                                'type'  => 'color-picker',
                                'value' => ''
                        ),
		)
	),
        'martin_top'   => array(
                'type'  => 'text',
                'label' => esc_html__( 'Martin Top', 'martin' ),
                'desc'  => esc_html__('Do you need martin in Top. Please insert a number. Default martin 0px.', 'martin')
        ),
        'martin_bottom'   => array(
                'type'  => 'text',
                'label' => esc_html__( 'Martin Bottom', 'martin' ),
                'desc'  => esc_html__('Do you need martin in Bottom. Please insert a number. Default martin 0px.', 'martin')
        ),
		
);