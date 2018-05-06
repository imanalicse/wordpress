<?php

if (!defined('FW')) {
    die('Forbidden');
}

$options = array(
    'postgeneral' => array(
	'title' => esc_html__('Audio', 'martin'),
	'type' => 'tab',
	'options' => array(
	    'audio-box' => array(
		'title' => esc_html__('Audio', 'martin'),
		'type' => 'box',
		'options' => array(
		    'audio_src' => array(
			'type' => 'textarea',
			'label' => esc_html__('Audio Embed', 'martin'),
			'desc' => 'Insert your audio iframe SRC here.',
		    ),
		)
	    ),
	)
    ),
    'video' => array(
	'title' => esc_html__('Video', 'martin'),
	'type' => 'tab',
	'options' => array(
	    'video-box' => array(
		'title' => esc_html__('Video', 'martin'),
		'type' => 'box',
		'options' => array(
		    'video_src' => array(
			'type' => 'textarea',
			'label' => esc_html__('Video Embed', 'martin'),
			'desc' => 'Insert your video iframe SRC here.',
		    ),
		)
	    ),
	)
    ),
    
    'gallery' => array(
	'title' => esc_html__('Gallery', 'martin'),
	'type' => 'tab',
	'options' => array(
	    'gallery-box' => array(
		'title' => esc_html__('Gallery', 'martin'),
		'type' => 'box',
		'options' => array(
		    'gallery_images' => array(
			'type' => 'multi-upload',
			'label' => esc_html__('Upload Gallery Image', 'martin'),
			'desc' => 'Upload multiple image for post thumbnail gallery.',
		    ),
		)
	    ),
	)
    ),
    
);
