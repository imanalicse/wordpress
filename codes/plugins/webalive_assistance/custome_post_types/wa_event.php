<?php

/**
 * Webalive WordPress Framework
 *
 */
add_action('init', 'register_event_post_type');

function register_event_post_type()
{
   register_post_type('wa_event', array(
       'labels' => array(
           'name' => __('Events', "webalive"),
           'singular_name' => __('Event', "webalive"),
           'add_new' => __('Add Event', "webalive"),
           'add_new_item' => __('Add Event', "webalive"),
           'edit_item' => __('Edit Event', "webalive"),
           'new_item' => __('New Event', "webalive"),
           'not_found' => __('No Event found', "webalive"),
           'not_found_in_trash' => __('No Event found in Trash', "webalive"),
           'menu_name' => __('Events', "webalive"),
       ),
       'description' => 'Manipulating with our Events',
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
       'menu_icon' => 'dashicons-vault',
       'query_var' => true,
       'rewrite' => array('slug' => 'wa_event'),
       'capability_type' => 'post',
       'map_meta_cap' => true
           )
   );
//    add_custom_taxonomies_event();
    flush_rewrite_rules(false);
}

//function add_custom_taxonomies_event()
//{
//    register_taxonomy('wa_event_cat', 'wa_event', array(
//        'hierarchical' => true,
//        'labels' => array(
//            'name' => _x('Event Types', 'taxonomy general name', "webalive"),
//            'singular_name' => _x('Event Type', 'taxonomy singular name', "webalive"),
//            'search_items' => __('Search Event Type', "webalive"),
//            'all_items' => __('All Event Types', "webalive"),
//            'parent_item' => __('Parent Event Type', "webalive"),
//            'parent_item_colon' => __('Parent Event Type:', "webalive"),
//            'edit_item' => __('Edit Event Type', "webalive"),
//            'update_item' => __('Update Event Type', "webalive"),
//            'add_new_item' => __('Add New Event Type', "webalive"),
//            'new_item_name' => __('New Event Type', "webalive"),
//            'menu_name' => __('Event Type', "webalive"),
//        ),
//        'rewrite' => array(
//            'slug' => 'wa_event_cat',
//            'with_front' => false,
//            'hierarchical' => true
//        )
//    ));
//}
add_action('init', 'register_solutions_post_type');