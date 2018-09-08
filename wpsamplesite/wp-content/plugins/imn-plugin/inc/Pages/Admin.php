<?php
/*
* @package ImnPlugin
*/

namespace Inc\Pages;

use Inc\Base\BaseController;
use Inc\Api\SettingsApi;

class Admin extends BaseController
{
    public $settings;

    public $pages = array();
    public $subpages = array();

    public function __construct()
    {
        $this->settings = new SettingsApi();

        $this->pages = array(
            array(
                'page_title' => 'Imn Plugin',
                'menu_title' => 'Imn',
                'capability' => 'manage_options',
                'menu_slug' => 'imn_plugin',
                'callback' => function () {
                    echo "<h1>Imn Plugin</h1>";
                },
                'icon_url' => 'dashicons-store',
                'position' => 110
            )
        );

        $this->subpages = array(
            array(
                'parent_slug' => 'imn_plugin',
                'page_title' => 'Custom post type',
                'menu_title' => 'CPT',
                'capability' => 'manage_options',
                'menu_slug' => 'imn_cpt',
                'callback' =>  function() { echo "CPT manager"; },
                'icon_url' => 'dashicons-store',
                'position' => 110
            ),
            array(
                'parent_slug' => 'imn_plugin',
                'page_title' => 'Custom taxonomy',
                'menu_title' => 'Taxonomies',
                'capability' => 'manage_options',
                'menu_slug' => 'imn_taxonomies',
                'callback' =>  function() { echo "Taxonomy manager"; },
                'icon_url' => 'dashicons-store',
                'position' => 110
            ),
            array(
                'parent_slug' => 'imn_plugin',
                'page_title' => 'Custom widgets',
                'menu_title' => 'Widgets',
                'capability' => 'manage_options',
                'menu_slug' => 'imn_widgets',
                'callback' =>  function() { echo "Widget manager"; },
                'icon_url' => 'dashicons-store',
                'position' => 110
            )
        );
    }

    public function register()
    {

        $this->settings->addPages($this->pages)->withSubPage('Dashboard')->addSubPages($this->subpages)->register();
    }
}