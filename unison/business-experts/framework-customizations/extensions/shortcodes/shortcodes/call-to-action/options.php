<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'title'         => array(
		'type'  => 'text',
		'label' => esc_html__( 'Title', 'martin' ),
		'desc'  => esc_html__( 'Insert your call to action title', 'martin' )
	),
        'title_color'              => array(
		'label' => esc_html__( 'Title Color', 'martin' ),
		'type'  => 'color-picker',
		'value' => '',
		'desc'  => esc_html__( 'You can choose your own title color.', 'martin' ),
	),
	'message'       => array(
		'type'  => 'textarea',
		'label' => esc_html__( 'Description', 'martin' ),
		'desc'  => esc_html__( 'Enter some content for this message Box', 'martin' )
	),
        'message_color'              => array(
		'label' => esc_html__( 'Description Color', 'martin' ),
		'type'  => 'color-picker',
		'value' => '',
		'desc'  => esc_html__( 'You can choose your own description color.', 'martin' ),
	),
        'buttons' => array(
		'label'         => esc_html__( 'Buttons', 'martin' ),
		'popup-title'   => esc_html__( 'Add/Edit Buttons', 'martin' ),
		'desc'          => esc_html__( 'Here you can add, remove and edit your Buttons.', 'martin' ),
		'type'          => 'addable-popup',
		'template'      => '{{=button_label}}',
		'popup-options' => array(
                        'btn_styles'          => array(
                                'label'   => esc_html__( 'BTN Style', 'martin' ),
                                'type'    => 'short-select',
                                'value'   => '2',
                                'desc'    => esc_html__( 'Select your button style.', 'martin' ),
                                'choices' => array(
                                        '1' => 'Blackish',
                                        '2' => 'Yellow',
                                        '3' => 'Blue'
                                )
                        ),
                        'button_label'  => array(
                                'label' => esc_html__( 'Button Label', 'martin' ),
                                'desc'  => esc_html__( 'Insert your button label text', 'martin' ),
                                'type'  => 'text',
                                'value' => 'Click'
                        ),
                        'button_link'   => array(
                                'label' => esc_html__( 'Button Link', 'martin' ),
                                'desc'  => esc_html__( 'Where should your button link to. If you want to make it Scroll Button then please insert your scroll to section id.', 'martin' ),
                                'type'  => 'text',
                                'value' => '#'
                        ),
                        'button_action' => array(
                                'type'    => 'switch',
                                'label'   => esc_html__( 'Button Action', 'martin' ),
                                'desc'    => esc_html__( 'Select your button action.', 'martin' ),
                                'value'   => '1',
                                'right-choice' => array(
                                        'value' => '1',
                                        'label' => esc_html__('Scroll', 'martin'),
                                ),
                                'left-choice' => array(
                                        'value' => '2',
                                        'label' => esc_html__('Load', 'martin'),
                                ),
                        ),
		)
	),
    
	
);