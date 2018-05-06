<?php if ( ! defined( 'FW' ) ) { die( 'Forbidden' );}
$options = array(
	'folio' => array(
		'title'   => esc_html__( 'Portfolio Optons', 'martin' ),
		'type'    => 'tab',
		'options' => array(
                        'folio_gallery'       => array(
                                'label' => esc_html__( 'Project Gallery', 'martin' ),
                                'desc'  => esc_html__( 'Upload portfolio gallery image for single folio.', 'martin' ),
                                'type'  => 'multi-upload',
                        ),
                        'project_title'       => array(
                                'label' => esc_html__( 'Project Title', 'martin' ),
                                'desc'  => esc_html__( 'Insert an short title for this project', 'martin' ),
                                'type'  => 'text',
                        ),
                        'metass' => array(
                                'label'         => esc_html__( 'Project Meta', 'martin' ),
                                'popup-title'   => esc_html__( 'Add/Edit Project Meta', 'martin' ),
                                'desc'          => esc_html__( 'Here you can add, remove and edit your Project Meta.', 'martin' ),
                                'type'          => 'addable-popup',
                                'template'      => '{{=title}}',
                                'popup-options' => array(
                                        'icon'    => array(
                                                'type'  => 'icon',
                                                'label' => esc_html__('Meta Icon', 'martin'),
                                                'set'  => 'tw_line_icon_set',
                                        ),
                                        'title'       => array(
                                                'label' => esc_html__( 'Meta Title', 'martin' ),
                                                'desc'  => esc_html__( 'Enter the project meta title.', 'martin' ),
                                                'type'  => 'text',
                                                'teeny' => true
                                        ),
                                        'content' => array(
                                                    'label' => esc_html__('Meta Content', 'martin'),
                                                    'desc'  => esc_html__('Insert your meta content here.', 'martin'),
                                                    'type'  => 'text',
                                                    'value' => ''
                                        )
                                )
                        ),
                        
		)
	)
);