<?php
if (!defined('FW')) {
    die('Forbidden');
}

$account_id = '';
if($atts['account_id'] != ''){
    $account_id = $atts['account_id'];
}

$consumer_key = '';
if($atts['consumer_key'] != ''){
    $consumer_key = $atts['consumer_key'];
}

$consumer_secret = '';
if($atts['consumer_secret'] != ''){
    $consumer_secret = $atts['consumer_secret'];
}

$access_token = '';
if($atts['access_token'] != ''){
    $access_token = $atts['access_token'];
}

$access_token_secret = '';
if($atts['access_token_secret'] != ''){
    $access_token_secret = $atts['access_token_secret'];
}

$limit = '';
if($atts['limit'] != ''){
    $limit = $atts['limit'];
}

if(function_exists('martin_generateTwitttShortcode')){
    echo martin_generateTwitttShortcode($limit, $account_id, $consumer_key, $consumer_secret, $access_token, $access_token_secret);
}
