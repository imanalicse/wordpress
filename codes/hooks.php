<?php
// Add into where you want to display
do_action('the_plugin_action');
echo apply_filters('plugin_title', 'Tittle');

// add in functions.php
function handle_the_plugin_action( $arg ) {
    echo '<p>The action is happening now</p>';
}

function handle_the_plugin_action2() {
    echo '<p>Hello world </p>';
}
add_action('the_plugin_action', "handle_the_plugin_action", 10, 1);
add_action('the_plugin_action', "handle_the_plugin_action2", 5);

add_filter('plugin_title', 'change_plugin_title');

function change_plugin_title($value) {
    return 'New '. $value;
}