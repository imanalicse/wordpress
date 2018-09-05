<?php
/*
Plugin Name: Imn Plugin
Plugin URI: https://imn.com/plugin
Description: This is plugin for development
Author: IMN
Author URI: https://imn.com/
Text Domain: imn-plugin
Version: 1.0.0
*/

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

if (!class_exists('ImnPlugin')) {

    class ImnPlugin
    {
        function __construct()
        {
            $this->init_hooks();
        }

        function init_hooks()
        {
            add_action('init', array($this, 'custom_post_type'));

            add_action('admin_enqueue_scripts', array($this, 'admin_scripts'));
            add_action('wp_enqueue_scripts', array($this, 'frontend_scripts'));
        }

        function register() {
            add_action('admin_menu', array($this, 'add_admin_pages'));
        }

        public function add_admin_pages() {
            add_menu_page('Imn Plugin', 'Imn', 'manage_options', 'imn_plugin', array($this, 'admin_index'), 'dashicons-store', 110);
        }

        public function admin_index() {

        }

        function activate()
        {
            // generated a CTP
            require_once plugin_dir_path(__FILE__) . 'inc/imn-plugin-activate.php';
            ImnPluginActivate::activate();

        }

        function deactivate()
        {
            require_once plugin_dir_path(__FILE__) . 'inc/imn-plugin-deactivate.php';
            ImnPluginDeactivate::deactivate();
        }

        function uninstall()
        {
            // delete CTP
            // delete all the plugin data from the DB
        }

        function custom_post_type()
        {
            register_post_type('book', ['public' => true, 'label' => 'Books']);
        }

        function admin_scripts()
        {
            wp_enqueue_style('imn-style', plugins_url('/assets/imn-style.css', __FILE__));
            wp_enqueue_style('inm-script', plugins_url('/assets/inm-script.js', __FILE__));
        }

        function frontend_scripts()
        {
            wp_enqueue_style('frontend-imn-style', plugins_url('/assets/frontend-imn-style.css', __FILE__));
        }
    }

    if (class_exists("ImnPlugin")) {
        $imnPlugin = new ImnPlugin();
        $imnPlugin->register();
    }

    // Activation
    register_activation_hook(__FILE__, array($imnPlugin, 'activate'));

    //Deactivation
    register_activation_hook(__FILE__, array($imnPlugin, 'deactivate'));

    //register_uninstall_hook(__FILE__, array($imnPlugin, 'uninstall'));
}