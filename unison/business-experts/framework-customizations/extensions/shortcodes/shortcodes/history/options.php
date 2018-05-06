<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
        'margin_top'       => array(
                'label' => esc_html__( 'Margin Top', 'martin' ),
                'desc'  => esc_html__( 'Insert margin top here. Default margin top is 90px.', 'martin' ),
                'type'  => 'text'
        ),
        'margin_bottom'       => array(
                'label' => esc_html__( 'Margin Bottom', 'martin' ),
                'desc'  => esc_html__( 'Insert margin Bottom here. Default margin top is 0px.', 'martin' ),
                'type'  => 'text'
        ),
	'history' => array(
		'label'         => esc_html__( 'History', 'martin' ),
		'popup-title'   => esc_html__( 'Add/Edit History', 'martin' ),
		'desc'          => esc_html__( 'Here you can add, remove and edit your History. Remember, you can insert maximum 4 history.', 'martin' ),
		'type'          => 'addable-popup',
		'template'      => '{{=yesr}}',
		'popup-options' => array(
                        'is_active'                    => array(
                                'label'        => esc_html__( 'Is Active?', 'martin' ),
                                'type'         => 'switch',
                                'right-choice' => array(
                                        'value' => '1',
                                        'label' => esc_html__( 'Yes', 'martin' )
                                ),
                                'left-choice'  => array(
                                        'value' => '2',
                                        'label' => esc_html__( 'No', 'martin' )
                                ),
                                'value'        => '2',
                                'desc'         => esc_html__( 'Do you want to make this history active?', 'martin' ),
                        ),
			'yesr'       => array(
				'label' => esc_html__( 'Year', 'martin' ),
				'desc'  => esc_html__( 'Inter year here.', 'martin' ),
				'type'  => 'text'
			),
                        'desc' => array(
                                    'label' => esc_html__('Short Desc', 'martin'),
                                    'desc'  => esc_html__('Insert a short desc for your history', 'martin'),
                                    'type'  => 'text',
                                    'value' => ''
                        )
		)
	)
);