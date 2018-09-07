<?php
/*
Plugin Name: Imn Plugin
Plugin URI: https://imn.com/plugin
Description: This is plugin for development
Author: IMN
Author URI: https://imn.com/
Text Domain: imn-plugin
Version: 1.0.0

@package ImnPlugin
*/

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

if (file_exists(dirname(__FILE__) . '/vendor/autoload.php')) {
    require_once dirname(__FILE__) . '/vendor/autoload.php';
}

/*
 * The code that runs during plugin activation
 */
function activate_imn_plugin()
{
    Inc\Base\Activate::activate();
}
/*
 * The code that runs during plugin deactivation
 */
function deactivate_imn_plugin()
{
    Inc\Base\Deactivate::deactivate();
}

register_activation_hook(__FILE__, 'activate_imn_plugin');
register_deactivation_hook(__FILE__, 'deactivate_imn_plugin');

/*
 * Initialize all the core classes of the plugin
 */
if (class_exists('Inc\\Init')) {
    \Inc\Init::register_services();
}