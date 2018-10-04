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
define("IMN_PLUGIN_URI", plugin_dir_url(__FILE__));

if(file_exists(IMN_PLUGIN_PATH . './vendor/autoload.php')) {
    require_once IMN_PLUGIN_PATH . './vendor/autoload.php';
}

use Inc\Admin\Pages;
Pages::register();


/**
 * The code that runs during plugin activation
 */
function activate_imn_plugin() {
    Inc\Base\Activate::activate();
}
register_activation_hook( __FILE__, 'activate_imn_plugin' );

/**
 * The code that runs during plugin deactivation
 */
function deactivate_imn_plugin() {
    Inc\Base\Deactivate::deactivate();
}
register_deactivation_hook( __FILE__, 'deactivate_imn_plugin' );