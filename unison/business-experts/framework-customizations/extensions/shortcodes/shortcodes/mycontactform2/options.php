<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
        'form_type'       => array(
		'type'         => 'multi-picker',
		'label'        => false,
		'desc'         => false,
		'picker'       => array(
			'gadget' => array(
				'label'   => esc_html__( 'Form Type', 'martin' ),
				'type'    => 'select',
				'choices' => array(
					'1'  => esc_html__( 'Default Form', 'martin' ),
					'2' => esc_html__( 'Contact Form 7', 'martin' )
				),
				'desc'    => esc_html__( 'Please select your contact form type.', 'martin' ),
			)
		),
		'choices'      => array(
			'2' => array(
				'con_shortcode'  => array(
					'type'  => 'text',
					'label' => esc_html__( 'Shortcode', 'martin' ),
					'label' => esc_html__( 'Please insert your contact form 7 shortcode.', 'martin' ),
				)
			),
		),
		'show_borders' => false,
	),
        'fname_place'       => array(
		'label'   => esc_html__( 'First Name Placeholder', 'martin' ),
		'type'    => 'text',
		'desc'    => esc_html__( 'Insert your first name field placeholder. This will only work for default form.', 'martin' ),
                'value'   => 'FIRST NAME'
	),
        'lname_place'       => array(
		'label'   => esc_html__( 'Last Name Placeholder', 'martin' ),
		'type'    => 'text',
		'desc'    => esc_html__( 'Insert your last name field placeholder. This will only work for default form.', 'martin' ),
                'value'   => 'LAST NAME'
	),
        'email_place'       => array(
		'label'   => esc_html__( 'Email Field Placeholder', 'martin' ),
		'type'    => 'text',
		'desc'    => esc_html__( 'Insert your email field placeholder. This will only work for default form.', 'martin' ),
                'value'   => 'EMAIL ADDRESS'
	),
        'subject_place'       => array(
		'label'   => esc_html__( 'Subject Field Placeholder', 'martin' ),
		'type'    => 'text',
		'desc'    => esc_html__( 'Insert your subject field placeholder. This will only work for default form.', 'martin' ),
                'value'   => 'SUBJECT'
	),
        'message_place'       => array(
		'label'   => esc_html__( 'Message Field Placeholder', 'martin' ),
		'type'    => 'text',
		'desc'    => esc_html__( 'Insert your Message field placeholder. This will only work for default form.', 'martin' ),
                'value'   => 'MESSAGE'
	),
        'con_email'       => array(
		'label'   => esc_html__( 'Contact Email', 'martin' ),
		'type'    => 'text',
		'desc'    => esc_html__( 'Insert your email address. This will only work for default form.', 'martin' ),
                'value'   => get_option('admin_email')
	),
        'btn_value'              => array(
		'label'   => esc_html__( 'Button Label', 'martin' ),
		'type'    => 'text',
		'desc'    => esc_html__( 'Insert your submit button label. This will only work for default form.', 'martin' ),
                'value'   => 'Send message'
	),
    
    
);