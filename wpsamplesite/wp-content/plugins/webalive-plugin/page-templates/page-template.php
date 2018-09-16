<?php

add_filter('theme_page_templates', 'custom_template');
add_filter('template_include', 'webalive_load_template');

$plugin_templates = array(
    'two-column-tpl.php' => 'Two columns layout'
);

function custom_template($templates)
{
    global $plugin_templates;

    $templates = array_merge($templates, $plugin_templates);

    return $templates;
}

function webalive_load_template($template)
{
    global $post;
    global $plugin_templates;

    if (!$post) {
        return $template;
    }

    if(is_front_page()) {
        echo $file = plugin_dir_path(__FILE__)."front-page.php";
        if (file_exists($file)) {
            return $file;
        }
    }

    $template_name = get_post_meta($post->ID, '_wp_page_template', true);

    if (!isset($plugin_templates[$template_name])) {
        return $template;
    }

    $file = plugin_dir_path(__FILE__). $template_name;

    if (file_exists($file)) {
        return $file;
    }

    return $template;
}
