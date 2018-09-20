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
    register_setting("sunset-settings-group", 'profile_picture');
    register_setting("sunset-settings-group", 'first_name');
    register_setting("sunset-settings-group", 'last_name');
    register_setting("sunset-settings-group", 'twitter_handler');

    add_settings_section('sunset-sidebar-options', 'Sidebar Options', 'sunset_sidebar_options', 'alecaddd_sunset');

    add_settings_field('sidebar-profile-picture', 'Profile picture', 'sunset_sidebar_profile', 'alecaddd_sunset', 'sunset-sidebar-options');
    add_settings_field('sidebar-name', 'Full Name', 'sunset_sidebar_name', 'alecaddd_sunset', 'sunset-sidebar-options');
    add_settings_field('sidebar-twitter', 'Twitter', 'sunset_sidebar_twitter', 'alecaddd_sunset', 'sunset-sidebar-options');

    //
    $option_name = 'social_options';
    $section_id = 'sunset-social-options';
    $page = 'alecaddd_sunset_social';

    register_setting("sunset-settings-social-group", $option_name);
    add_settings_section($section_id, 'Social Options', 'sunset_social_options', $page);

    add_settings_field('social-facebook', 'Facebook', 'text_field_callback', $page, $section_id, array(
        'field' => 'facebook',
        'type' => 'text',
        'label'=>'Facebook',
        'option_name'=> $option_name
    ));
    add_settings_field('social-twitter', 'Twitter', 'text_field_callback', $page, $section_id, array(
        'field' => 'twitter',
        'type' => 'text',
        'label'=>'Twitter',
        'option_name'=> $option_name
    ));

}

function text_field_callback($args)
{
    $data = get_option($args['option_name']);
    $value = isset($data[$args['field']]) ? $data[$args['field']] : '';
    echo '<input type="text" name="'.$args['option_name'].'['.$args['field'].']'.'social_options[facebook]" value="' . $value . '" placeholder="'.$args['label'].'" style="width:300px"/>';

}

function sunset_social_options()
{
    echo "Social Options";
}

function sunset_sidebar_options()
{
    echo "Customize your sidebar information";
}

function sunset_sidebar_profile()
{
    $picture = get_option('profile_picture');

    echo '<input type="button" value="Upload Profile Picture" class="button button-secondary" id="upload-button"/>';
    echo '<input type="hidden" name="profile_picture" value="' . $picture . '" id="profile-picture"/>';
    echo '<img src="'.$picture.'" class="profile-picture-preview" style="display:block; padding-top:10px; width: 150px;border-radius: 50%;"/>';
}


function sunset_sidebar_name()
{
    $firstName = esc_attr(get_option('first_name'));
    $lastName = esc_attr(get_option('last_name'));

    echo '<input type="text" name="first_name" value="' . $firstName . '" placeholder="First Name"/>';
    echo '<input type="text" name="last_name" value="' . $lastName . '" placeholder="Last Name"/>';
}

function sunset_sidebar_twitter()
{
    $twitter = esc_attr(get_option('twitter_handler'));
    echo '<input type="text" name="twitter_handler" value="' . $twitter . '" placeholder="Twitter handler"/><p>@remove</p>';
}


function sunset_theme_create_page()
{

    require_once(get_template_directory() . '/inc/templates/sunset-admin.php');
}

function subset_theme_setting_page()
{

}