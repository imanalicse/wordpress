<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
        'style'              => array(
		'label'   => esc_html__( 'Select Style', 'martin' ),
		'type'    => 'short-select',
		'value'   => '1',
		'desc'    => esc_html__( 'Select your partner logo style.', 'martin' ),
		'choices' => array(
			'1' => 'With Opacity Effect',
			'2' => 'Without Effect',
		),
	),
        'clients' => array(
		'label'         => esc_html__( 'Clients', 'martin' ),
		'popup-title'   => esc_html__( 'Add/Edit Clients', 'martin' ),
		'desc'          => esc_html__( 'Here you can add, remove and edit your Clients.', 'martin' ),
		'type'          => 'addable-popup',
		'template'      => '{{=client_name}}',
		'popup-options' => array(
                        'client_img'             => array(
                                'label' => esc_html__( 'Clients Image', 'martin' ),
                                'desc'  => esc_html__( 'Upload your Clients image with 134x101 for "With Opacity Effect" and 133x87 for "Without Effect" resulation.', 'martin' ),
                                'type'  => 'upload',
                        ),
                        'client_name'             => array(
                                'label' => esc_html__( 'Clients Name', 'martin' ),
                                'desc'  => esc_html__( 'Insert client name.', 'martin' ),
                                'type'  => 'text',
                        ),
                        'client_url'             => array(
                                'label' => esc_html__( 'Clients URL', 'martin' ),
                                'desc'  => esc_html__( 'Insert client URL.', 'martin' ),
                                'type'  => 'text',
                        )
			
		)
	)
);