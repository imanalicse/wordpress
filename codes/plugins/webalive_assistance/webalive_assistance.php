<?php
/*
Plugin Name: Webalive Assistance
Plugin URI: http://bitmascot.com
Description: Webalive theme assistance. All Shortcode and Custome Post Type generator.
Version: 1.0
Author: Webalive
Author URI: http://bitmascot.com
License: 
Text Domain: webalive
*/
// ============================================================================================
// Enables theme custom post types, and Shortcodes
// --------------------------------------------------------------------------------------------
global $custom_post_type;
$custom_post_type = array('wa_event', 'wa_solution');


//===================================
// Generate Custom Post type
//===================================
if(isset($custom_post_type) && !empty($custom_post_type))
{
    foreach($custom_post_type as $key => $val)
    {
        $cup_name = $val;
        require plugin_dir_path( __FILE__ ).'custome_post_types/'.$cup_name.'.php';
    }
}

