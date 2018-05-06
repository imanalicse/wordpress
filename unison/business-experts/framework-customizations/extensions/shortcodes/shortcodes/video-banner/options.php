<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
        'video'                    => array(
		'label'       => esc_html__( 'Upload Video', 'martin' ),
		'desc'        => esc_html__( 'Please upload an MP4 Video.', 'martin' ),
		'type'        => 'upload',
		'images_only' => false,
	),
        'cover'             => array(
		'label' => esc_html__( 'Upload Cover IMG', 'martin' ),
		'desc'  => esc_html__( 'Please upload an cover image.', 'martin' ),
		'type'  => 'upload',
	),
        'cover_overlay' => array(
		'label' => esc_html__( 'Cover Overlay RGBA', 'martin' ),
		'type'  => 'rgba-color-picker',
		'value' => 'rgba(36, 34, 32, 0.6)',
		'desc'  => esc_html__( 'You can change your video cover overlay.', 'martin' )
	),
        'sub_title' => array(
		'type'   => 'text',
		'label'  => esc_html__( 'Sub Heading Text', 'martin' ),
		'desc'   => esc_html__( 'Imsert your video sub heading text.', 'martin' )
	),
        'sub_heading_color'              => array(
		'label' => esc_html__( 'Sub Heading Color', 'martin' ),
		'type'  => 'color-picker',
		'value' => '',
		'desc'  => esc_html__( 'You can change your sub heading color.', 'martin' ),
	),
        'heading' => array(
		'type'   => 'text',
		'label'  => esc_html__( 'Heading Text', 'martin' ),
		'desc'   => esc_html__( 'Imsert your video heading text.', 'martin' )
	),
        'heading_color'              => array(
		'label' => esc_html__( 'Heading Color', 'martin' ),
		'type'  => 'color-picker',
		'value' => '',
		'desc'  => esc_html__( 'You can change your heading color.', 'martin' ),
	),
        'hints' => array(
		'type'   => 'text',
		'label'  => esc_html__( 'Video Hints', 'martin' ),
		'desc'   => esc_html__( 'Imsert your video hints text.', 'martin' )
	),
        'hints_color'              => array(
		'label' => esc_html__( 'Hints Color', 'martin' ),
		'type'  => 'color-picker',
		'value' => '',
		'desc'  => esc_html__( 'You can change your hint color.', 'martin' ),
	),
        'padding_top' => array(
		'type'   => 'text',
		'label'  => esc_html__( 'Padding Top', 'martin' ),
		'desc'   => esc_html__( 'Insert your video content padding top. Default padding is 158px.', 'martin' )
	),
        'padding_bottom' => array(
		'type'   => 'text',
		'label'  => esc_html__( 'Padding Bottom', 'martin' ),
		'desc'   => esc_html__( 'Insert your video content padding bottom. Default padding is 158px.', 'martin' )
	),
);