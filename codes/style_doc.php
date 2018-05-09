For separate css in different page

<?php 
function filter_theme_styles() {
    global $wp_styles;
    if (  is_front_page()) {
        $wp_styles->registered['twentyfourteen-style']->src = get_template_directory_uri().'/style-home.css';
    }
}
add_action('wp_print_styles', 'filter_theme_styles', 100);