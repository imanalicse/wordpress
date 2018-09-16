<?php

add_action('init', 'testimonial_cpt');

function testimonial_cpt()
{

    $args = array(
        'labels' => array(
            'name' => __('Testimonials'),
            'singular_name' => __('Testimonial'),
            'add_new_item' => __('Add New Testimonial', 'textdomain'),
            'edit_item' => __('Edit Testimonial', 'textdomain'),
        ),
        'public' => true,
        'has_archive' => true,
        'menu_icon' => 'dashicons-testimonial',
        'exclude_from_search'=> true,
        'plublicly_queryable'=>false,
        'support'=> array('title', 'editor')
    );

    register_post_type('testimonial', $args);
}