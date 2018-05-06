<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
        'information'                      => array(
		'label' => esc_html__( 'Information', 'martin' ),
		'type'  => 'html',
		'value' => 'Read Carefully',
		'desc'  => esc_html__( 'Please active Martin Tweets plugin first.', 'martin' ),
	),
        'account_id' => array(
                'label' => esc_html__( 'Account ID', 'martin' ),
                'desc'  => esc_html__( 'Please insert your twitter account ID.', 'martin' ),
                'type'  => 'text'
        ),
        'consumer_key' => array(
                'label' => esc_html__( 'Consumer Key', 'martin' ),
                'desc'  => esc_html__( 'Please insert your twitter app consumer key.', 'martin' ),
                'type'  => 'text'
        ),
        'consumer_secret' => array(
                'label' => esc_html__( 'Consumer Secret', 'martin' ),
                'desc'  => esc_html__( 'Please insert your twitter app consumer secret.', 'martin' ),
                'type'  => 'text'
        ),
        'access_token' => array(
                'label' => esc_html__( 'Access Token', 'martin' ),
                'desc'  => esc_html__( 'Please insert your twitter app Access Token.', 'martin' ),
                'type'  => 'text'
        ),
        'access_token_secret' => array(
                'label' => esc_html__( 'Access Token Secret', 'martin' ),
                'desc'  => esc_html__( 'Please insert your twitter app Access Token Secret.', 'martin' ),
                'type'  => 'text'
        ),
        'limit' => array(
                'label' => esc_html__( 'Limit', 'martin' ),
                'desc'  => esc_html__( 'How many tweet feed you want to show?', 'martin' ),
                'type'  => 'slider',
                'value' => 3
        ),
	
);