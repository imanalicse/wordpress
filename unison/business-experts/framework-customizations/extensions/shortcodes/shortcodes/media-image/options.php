<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'image'            => array(
		'type'  => 'upload',
		'label' => esc_html__( 'Choose Image', 'martin' ),
		'desc'  => esc_html__( 'Either upload a new, or choose an existing image from your media library.', 'martin' )
	),
        'image_alingment'              => array(
		'label'   => esc_html__( 'Alignment', 'martin' ),
		'type'    => 'short-select',
		'value'   => 'center',
		'desc'    => esc_html__( 'Select your image title alignment.', 'martin' ),
		'choices' => array(
			'left' => 'Left Align',
			'center' => 'Center Align',
			'right' => 'Right Align'
		)
	),
	'margin'             => array(
		'type'    => 'group',
		'options' => array(
			'margin_top'  => array(
				'type'  => 'text',
				'label' => esc_html__( 'Margin Top', 'martin' ),
				'desc'  => esc_html__( 'Set image margin top.', 'martin' ),
				'value' => ''
			),
			'margin_bottom' => array(
				'type'  => 'text',
				'label' => esc_html__( 'Margin Botton', 'martin' ),
				'desc'  => esc_html__( 'Set image margin bottom', 'martin' ),
				'value' => ''
			)
		)
	),
	'size'             => array(
		'type'    => 'group',
		'options' => array(
			'width'  => array(
				'type'  => 'text',
				'label' => esc_html__( 'Width', 'martin' ),
				'desc'  => esc_html__( 'Set image width', 'martin' ),
				'value' => ''
			),
			'height' => array(
				'type'  => 'text',
				'label' => esc_html__( 'Height', 'martin' ),
				'desc'  => esc_html__( 'Set image height', 'martin' ),
				'value' => ''
			)
		)
	),
	'image-link-group' => array(
		'type'    => 'group',
		'options' => array(
			'link'   => array(
				'type'  => 'text',
				'label' => esc_html__( 'Image Link', 'martin' ),
				'desc'  => esc_html__( 'Where should your image link to?', 'martin' )
			),
			'target' => array(
				'type'         => 'switch',
				'label'        => esc_html__( 'Open Link in New Window', 'martin' ),
				'desc'         => esc_html__( 'Select here if you want to open the linked page in a new window', 'martin' ),
				'right-choice' => array(
					'value' => '_blank',
					'label' => esc_html__( 'Yes', 'martin' ),
				),
				'left-choice'  => array(
					'value' => '_self',
					'label' => esc_html__( 'No', 'martin' ),
				),
			),
		)
	)
);

