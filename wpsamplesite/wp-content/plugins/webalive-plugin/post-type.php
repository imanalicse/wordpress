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

    $labels = array(
        'name'              => _x( 'Genres', 'taxonomy general name', 'textdomain' ),
        'singular_name'     => _x( 'Genre', 'taxonomy singular name', 'textdomain' ),
        'search_items'      => __( 'Search Genres', 'textdomain' ),
        'all_items'         => __( 'All Genres', 'textdomain' ),
        'parent_item'       => __( 'Parent Genre', 'textdomain' ),
        'parent_item_colon' => __( 'Parent Genre:', 'textdomain' ),
        'edit_item'         => __( 'Edit Genre', 'textdomain' ),
        'update_item'       => __( 'Update Genre', 'textdomain' ),
        'add_new_item'      => __( 'Add New Genre', 'textdomain' ),
        'new_item_name'     => __( 'New Genre Name', 'textdomain' ),
        'menu_name'         => __( 'Genre', 'textdomain' ),
    );

    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'genre' ),
    );

    register_taxonomy(
        'portfolio_genre',
        'portfolio',
        $args
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