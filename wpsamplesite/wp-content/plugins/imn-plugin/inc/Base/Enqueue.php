<?php
/*
* @package ImnPlugin
*/

namespace Inc\Base;

class Enqueue
{
    public function register()
    {
        add_action('admin_enqueue_scripts', array($this, 'enqueue'));
    }

    function enqueue()
    {
        wp_enqueue_style('imn-style', PLUGIN_URL . 'assets/imn-style.css');
        wp_enqueue_style('inm-script', PLUGIN_URL . 'assets/inm-script.js');
    }
}