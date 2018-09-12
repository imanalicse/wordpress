<?php
/*
Plugin Name: Webalive Plugin
Plugin URI: https://webalive.com.au/plugin
Description: This is plugin for development
Author: IMN
Author URI: https://webalive.com.au/
Text Domain: webalive-plugin
Version: 1.0.0

@package WebalivePlugin
*/

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

require_once "setting-api/settings.php";

add_action('init', 'custom_post_type');

function custom_post_type()
{
    register_post_type('testimonial', array(
        'labels' => array(
            'name' => __('Testimonials'),
            'singular_name' => __('Testimonial'),
            'add_new_item' => __('Add New', 'textdomain'),
            'edit_item' => __('Edit', 'textdomain'),
        ),
        'public' => true,
        'capability_type' => 'post',
        'supports' => array('title', 'editor', 'thumbnail', 'page-attributes'),
        'has_archive' => true
    ));
}