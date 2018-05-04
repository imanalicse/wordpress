<?php

/**
 * Webalive WordPress Framework
 *
 */
function register_solutions_post_type()
{
    register_post_type('wa_solution', array(
            'labels' => array(
                'name' => __('Solutions', "webalive"),
                'singular_name' => __('Solution', "webalive"),
                'add_new' => __('Add Solution', "webalive"),
                'add_new_item' => __('Add Solution', "webalive"),
                'edit_item' => __('Edit Solution', "webalive"),
                'new_item' => __('New Solution', "webalive"),
                'not_found' => __('No Solution found', "webalive"),
                'not_found_in_trash' => __('No Solution found in Trash', "webalive"),
                'menu_name' => __('Solutions', "webalive"),
            ),
            'description' => 'Manipulating with our Solutions',
            'public' => true,
            'show_in_nav_menus' => true,
            'supports' => array(
                'title',
                'thumbnail',
                'editor'
            ),
            'show_ui' => true,
            'show_in_menu' => true,
            'menu_position' => 35,
            'has_archive' => true,
            'menu_icon' => 'dashicons-lightbulb',
            'query_var' => true,
            'rewrite' => array('slug' => 'wa_solution'),
            'capability_type' => 'post',
            'map_meta_cap' => true
        )
    );
    flush_rewrite_rules(false);
}