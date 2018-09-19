<?php
/*

================
ADMIN PAGE
================
*/

function sunset_add_admin_page()
{
    // Generate Sunset Admin page
    add_menu_page('Sunset Theme Options', 'Sunset', 'manage_options', 'alecaddd_sunset', 'sunset_theme_create_page', 'dashicons-admin-customizer', 110);

    // Generate Sunset admin Sub Pages

    add_submenu_page('alecaddd_sunset', 'Sunset Theme Options', 'General', 'manage_options', 'alecaddd_sunset', 'sunset_theme_create_page');

    add_submenu_page('alecaddd_sunset', 'Sunset CSS Options', 'Custom CSS', 'manage_options', 'alecaddd_sunset_css', 'subset_theme_setting_page');

    // Activate custom setting
    add_action('admin_init', 'sunset_custom_settings');
}

add_action('admin_menu', 'sunset_add_admin_page');

function sunset_custom_settings()
{
    register_setting("sunset-settings-group", 'first_name');
    register_setting("sunset-settings-group", 'last_name');
    register_setting("sunset-settings-group", 'twitter_handler');

    add_settings_section('sunset-sidebar-options', 'Sidebar Options', 'sunset_sidebar_options', 'alecaddd_sunset');

    add_settings_field('sidebar-name', 'Full Name', 'sunset_sidebar_name', 'alecaddd_sunset', 'sunset-sidebar-options');
    add_settings_field('sidebar-twitter', 'Twitter', 'sunset_sidebar_twitter', 'alecaddd_sunset', 'sunset-sidebar-options');
}

function sunset_sidebar_options()
{
    echo "Customize your sidebar information";
}

function sunset_sidebar_name()
{
    $firstName = esc_attr(get_option('first_name'));
    $lastName = esc_attr(get_option('last_name'));

    echo '<input type="text" name="first_name" value="' . $firstName . '" placeholder="First Name"/>';
    echo '<input type="text" name="last_name" value="' . $lastName . '" placeholder="Last Name"/>';
}

function sunset_sidebar_twitter() {
    $twitter = esc_attr(get_option('twitter_handler'));
    echo '<input type="text" name="twitter_handler" value="' . $twitter . '" placeholder="Twitter handler"/><>';
}


function sunset_theme_create_page()
{

    require_once(get_template_directory() . '/inc/templates/sunset-admin.php');
}

function subset_theme_setting_page()
{

}