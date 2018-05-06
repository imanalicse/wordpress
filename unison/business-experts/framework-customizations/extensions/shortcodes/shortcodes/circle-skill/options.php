<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
        'bar_color'              => array(
		'label' => esc_html__( 'Progress Bar Color', 'martin' ),
		'type'  => 'color-picker',
		'value' => '',
		'desc'  => esc_html__( 'Insert your progress round bar color. Default color is #F7941D.', 'martin' ),
	),
        'title' => array(
                'type'  => 'text',
                'label' => esc_html__('Skill Title', 'martin'),
                'value' => ''
        ),
        'title_color'              => array(
		'label' => esc_html__( 'Title Color', 'martin' ),
		'type'  => 'color-picker',
		'value' => '',
		'desc'  => esc_html__( 'Insert your title color. Default color is #FFFFFF.', 'martin' ),
	),
        'skill_percent'                 => array(
                'label' => esc_html__( 'Percent', 'martin' ),
                'type'  => 'text',
                'value' => '',
                'desc'  => esc_html__( 'Insert your skill percent.', 'martin' )
        ),
        'parcent_color'              => array(
		'label' => esc_html__( 'Parcent Color', 'martin' ),
		'type'  => 'color-picker',
		'value' => '',
		'desc'  => esc_html__( 'Insert your parcent color. Default color is #F7941D.', 'martin' ),
	)
);