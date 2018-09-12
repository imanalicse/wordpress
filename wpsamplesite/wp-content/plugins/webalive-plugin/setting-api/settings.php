<?php


function register_my_custom_menu_page()
{
    // add_menu_page( $page_title, $menu_title, $capability, $menu_slug, $function, $icon_url, $position );
    add_menu_page('Webalive Setting', 'Webalive Setting', 'manage_options', 'webalive_setting', 'webalive_setting_callback', 'dashicons-welcome-widgets-menus', 90);

    add_action("admin_init", "webalive_custom_settings");
}

add_action('admin_menu', 'register_my_custom_menu_page');

function webalive_custom_settings()
{
    register_setting("webalive-settings-group", "first_name");
    register_setting("webalive-settings-group", "last_name");
    register_setting("webalive-settings-group", "twitter_handler", 'webalive_sanitize_twitter_handler');

    add_settings_section('webalive-sidebar-options', 'Sidebar Options', 'webalive_sidebar_options', 'webalive_setting');

    add_settings_field('sidebar-name', 'Full Name', 'webalive_sidebar_name', 'webalive_setting', 'webalive-sidebar-options');
    add_settings_field('sidebar-twitter', 'Twitter handler', 'webalive_sidebar_twitter', 'webalive_setting', 'webalive-sidebar-options');
}

function webalive_sidebar_options()
{
    echo "Customize your sidebar Information";
}

function webalive_sidebar_name()
{
    $firstName = esc_attr(get_option('first_name'));
    $lastName = esc_attr(get_option('last_name'));

    echo '<input type="text" name="first_name" value="' . $firstName . '" placeholder="First Name">';
    echo '<input type="text" name="last_name" value="' . $lastName . '" placeholder="Last Name">';
}


function webalive_sidebar_twitter()
{
    $twitter = esc_attr(get_option('twitter_handler'));
    echo '<input type="text" name="twitter_handler" value="' . $twitter . '" placeholder="Twitter Handler"><p class="description">Input your twitter username without the @ character</p>';
}

function webalive_sanitize_twitter_handler($input)
{
    $output = sanitize_text_field($input);
    $output = str_replace('@', '', $output);
    return $output;
}

function webalive_setting_callback()
{
    require_once "template.php";
}
