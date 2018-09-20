<?php
/*

================
ADMIN THEME SUPPORT
================
*/

$options = get_option('post_formats');

if (!empty($options)) {
    add_theme_support('post-formats', array_keys($options));
}

add_theme_support('custom-header');
add_theme_support('custom-background');