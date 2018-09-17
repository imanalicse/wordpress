<?php


function register_my_custom_menu_page()
{
    // add_menu_page( $page_title, $menu_title, $capability, $menu_slug, $function, $icon_url, $position );
    add_menu_page('Webalive Setting', 'Webalive Setting', 'manage_options', 'webalive_setting', 'webalive_setting_callback', 'dashicons-welcome-widgets-menus', 90);

    add_options_page(
        __('My Options', 'textdomain'),
        __('My Plugin', 'textdomain'),
        'manage_options',
        'my-plugin.php',
        'my_plugin_page'
    );

    add_action("admin_init", "webalive_custom_settings");
}

function my_plugin_page()
{
    ?>
    <?php //settings_errors();
    ?>

    <form method="post" action="options.php">
        <?php
        settings_fields('webalive-setting-area');
        do_settings_sections("my-plugin.php");
        submit_button();
        ?>
    </form>
    <?php
}

add_action('admin_menu', 'register_my_custom_menu_page');

function webalive_custom_settings()
{
//    register_setting("webalive-settings-group", "first_name");
//    register_setting("webalive-settings-group", "last_name");
//    register_setting("webalive-settings-group", "twitter_handler", 'webalive_sanitize_twitter_handler');

    register_setting("webalive-settings-group", "webalive_plugin_setting");

    add_settings_section('webalive-sidebar-options', 'Sidebar Options', 'webalive_sidebar_options', 'webalive_setting');

    add_settings_field('sidebar-name', 'Full Name', 'webalive_sidebar_name', 'webalive_setting', 'webalive-sidebar-options');
    add_settings_field('sidebar-twitter', 'Twitter handler', 'webalive_sidebar_twitter', 'webalive_setting', 'webalive-sidebar-options');

    // Under setting
    register_setting("webalive-setting-area", "public_key");
    add_settings_section("webalive-setting-section-area", "Webalive options", "webalive_setting_area", "my-plugin.php");
    add_settings_field("public-key-handler", "Public Key", "public_key_callback", "my-plugin.php", "webalive-setting-section-area");
}

function webalive_sidebar_options()
{
    echo "Customize your sidebar Information";
}

function webalive_sidebar_name()
{
    $options = get_option('webalive_plugin_setting');
    $firstName = esc_attr($options['first_name']);
    $lastName = esc_attr($options['last_name']);

    echo '<input type="text" name="webalive_plugin_setting[first_name]" value="' . $firstName . '" placeholder="First Name">';
    echo '<input type="text" name="webalive_plugin_setting[last_name]" value="' . $lastName . '" placeholder="Last Name">';
}


function webalive_sidebar_twitter()
{
    $options = get_option('webalive_plugin_setting');
    $twitter = esc_attr($options['twitter_handler']);
    echo '<input type="text" name="webalive_plugin_setting[twitter_handler]" value="' . $twitter . '" placeholder="Twitter Handler"><p class="description">Input your twitter username without the @ character</p>';
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

// under setting
function webalive_setting_area()
{
    echo "Key Info";
}

function public_key_callback()
{
    $public_key = esc_attr(get_option('public_key'));
    echo '<input type="text" name="public_key" value="' . $public_key . '" placeholder="Public Key">';
}
