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

class ImnPlugin
{
    function __construct()
    {
        $this->init_hooks();
    }

    function init_hooks()
    {
        add_action('init', array($this, 'custom_post_type'));
    }

    function activate()
    {
        // generated a CTP
        flush_rewrite_rules();
    }

    function deactivate()
    {
        // flush rewrite rues
        flush_rewrite_rules();
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
}

if (class_exists("ImnPlugin")) {
    $imnPlugin = new ImnPlugin();
}

// Activation
register_activation_hook(__FILE__, array($imnPlugin, 'activate'));

//Deactivation
register_activation_hook(__FILE__, array($imnPlugin, 'deactivate'));

//register_uninstall_hook(__FILE__, array($imnPlugin, 'uninstall'));