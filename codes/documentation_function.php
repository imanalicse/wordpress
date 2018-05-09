<?php
// remove admin bar from front end
add_filter('show_admin_bar', '__return_false');

// include js
function wa_include_jquery() {
    wp_deregister_script('jquery');
    wp_register_script('jquery', get_template_directory_uri() .'/js/jquery-1.8.3.min.js', false, false, true);
    wp_enqueue_script('jquery');
	
    wp_register_script('custom', get_template_directory_uri() .'/js/custom.js', array('jquery'), '1.3.3', true );
    wp_enqueue_script('custom');

}
add_action('wp_enqueue_scripts', 'wa_include_jquery');

// set uploaded image size
if ( function_exists( 'add_image_size' ) ) {
    add_image_size( 'product', 485, 464, true ); //425 pixels wide (and unlimited height)
    add_image_size( 'product-thumb', 193, 184, true ); //(cropped)
}



//place this code in functions.php
//For theme update notification disable
add_filter( 'pre_site_transient_update_core', create_function( '$a', "return null;" ) );

//For all plugin update notification disable
remove_action( 'load-update-core.php', 'wp_update_plugins' );
add_filter( 'pre_site_transient_update_plugins', create_function( '$a', "return null;" ) );

//For single plugin update notification disable

function stop_plugin_update( $value ) {
    unset( $value->response['testimonials/testimonials.php']);
    unset( $value->response['projects/projects.php']);
    return $value;
}
add_filter( 'site_transient_update_plugins', 'stop_plugin_update');


// comment form
add_filter('comment_form_defaults', 'remove_comment_styling_prompt');
function remove_comment_styling_prompt($defaults) {
    $defaults['comment_notes_after'] = '';
    return $defaults;
}

