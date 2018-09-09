<?php
/*
* @package ImnPlugin
*/

namespace Inc\Base;

use Inc\Base\BaseController;

class Enqueue extends BaseController
{
    public function register()
    {
        add_action('admin_enqueue_scripts', array($this, 'enqueue'));
    }

    function enqueue()
    {
        wp_enqueue_style('imn-style', $this->plugin_url . 'assets/imn-style.css');
        wp_enqueue_script('inm-script', $this->plugin_url . 'assets/inm-script.js');
    }
}