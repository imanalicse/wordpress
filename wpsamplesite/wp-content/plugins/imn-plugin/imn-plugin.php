<?php
/**
 * @package  ImnPlugin
 */
/*
Plugin Name: Imn Plugin
Plugin URI: https://imanalicse.github.io/imn-plugin
Description: This is a sample plugin for repeated uses resources
Version: 1.0.0
Author: Webalive
Author URI: https://imanalicse.github.io
License: GPLv2 or later
Text Domain: imn-plugin
*/

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

define("IMN_PLUGIN_PATH", plugin_dir_path(__FILE__));
define("IMN_PLUGIN_URL", plugin_dir_url(__FILE__));
define("IMN_PLUGIN_NAME", plugin_basename(__FILE__));

if(file_exists(IMN_PLUGIN_PATH . './vendor/autoload.php')) {
    require_once IMN_PLUGIN_PATH . './vendor/autoload.php';
}

/**
 * The code that runs during plugin activation
 */
function activate_imn_plugin() {
    \Imn_Inc\Base\Activate::activate();
}
register_activation_hook( __FILE__, 'activate_imn_plugin' );

/**
 * The code that runs during plugin deactivation
 */
function deactivate_imn_plugin() {
    \Imn_Inc\Base\Deactivate::deactivate();
}
register_deactivation_hook( __FILE__, 'deactivate_imn_plugin' );


/**
 * Initialize all the core classes of the plugin
 */
if ( class_exists( 'Imn_Inc\\Init' ) ) {
    Imn_Inc\Init::register_services();
}