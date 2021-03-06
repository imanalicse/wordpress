<?php

add_action('init', 'custom_post_type');

function custom_post_type()
{
    register_taxonomy(
        'portfolio_category',
        'portfolio',
        array(
            'name' => __( 'Categories', 'taxonomy general name'),
            'singular_name' => __( 'Category', 'taxonomy singular name'),
            'all_items' => __( 'All Categories'),
            'edit_item' => __('Edit Category' ),
            'query_var' => true,
            'hierarchical' => true,
            'rewrite' => true
        )
    );

    register_post_type('portfolio', array(
        'labels' => array(
            'name' => __('Portfolios'),
            'singular_name' => __('Portfolio'),
            'add_new_item' => __('Add New', 'textdomain'),
            'edit_item' => __('Edit', 'textdomain'),
        ),
        'public' => true,
        'capability_type' => 'post',
        'supports' => array('title', 'editor', 'thumbnail', 'page-attributes'),
        'has_archive' => true
    ));
}