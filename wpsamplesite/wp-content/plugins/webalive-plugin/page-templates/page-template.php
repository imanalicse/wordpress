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

    // If is the front page, load a custom template
    if(is_front_page()) {
        $file = plugin_dir_path(__FILE__)."front-page.php";
        if (file_exists($file)) {
            //return $file;
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

add_action("webalive_after_header", 'webalive_after_header_callback');

function webalive_after_header_callback() {
    echo '<h2>'.apply_filters('webalive_page_title', 'Two Column page').'</h2>';
}

add_action("webalive_after_header", 'webalive_after_header_callback2', 10);

function webalive_after_header_callback2() {
    echo "<p>Text content 2</p>";
}

add_filter('webalive_page_title', 'webalive_page_title_modify');
function webalive_page_title_modify() {
    return 'Modified Two column page title using filter';
}