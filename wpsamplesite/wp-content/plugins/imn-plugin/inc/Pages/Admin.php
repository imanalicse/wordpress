<?php
/*
* @package ImnPlugin
*/

namespace Inc\Pages;

use Inc\Base\BaseController;
use Inc\Api\SettingsApi;
use Inc\Api\Callbacks\AdminCallbacks;

class Admin extends BaseController
{
    public $settings;

    public $pages = array();

    public $subpages = array();

    public $callbacks;

    public function register()
    {
        $this->settings = new SettingsApi();

        $this->callbacks = new AdminCallbacks();

        $this->setPages();

        $this->setSubPages();

        $this->settings->addPages($this->pages)->withSubPage('Dashboard')->addSubPages($this->subpages)->register();
    }

    public function setPages()
    {
        $this->pages = array(
            array(
                'page_title' => 'Imn Plugin',
                'menu_title' => 'Imn',
                'capability' => 'manage_options',
                'menu_slug' => 'imn_plugin',
                'callback' => array($this->callbacks, 'AdminDashboard'),
                'icon_url' => 'dashicons-store',
                'position' => 110
            )
        );
    }

    public function setSubPages()
    {
        $this->subpages = array(
            array(
                'parent_slug' => 'imn_plugin',
                'page_title' => 'Custom post type',
                'menu_title' => 'CPT',
                'capability' => 'manage_options',
                'menu_slug' => 'imn_cpt',
                'callback' => function () {
                    echo "CPT manager";
                },
                'icon_url' => 'dashicons-store',
                'position' => 110
            ),
            array(
                'parent_slug' => 'imn_plugin',
                'page_title' => 'Custom taxonomy',
                'menu_title' => 'Taxonomies',
                'capability' => 'manage_options',
                'menu_slug' => 'imn_taxonomies',
                'callback' => function () {
                    echo "Taxonomy manager";
                },
                'icon_url' => 'dashicons-store',
                'position' => 110
            ),
            array(
                'parent_slug' => 'imn_plugin',
                'page_title' => 'Custom widgets',
                'menu_title' => 'Widgets',
                'capability' => 'manage_options',
                'menu_slug' => 'imn_widgets',
                'callback' => function () {
                    echo "Widget manager";
                },
                'icon_url' => 'dashicons-store',
                'position' => 110
            )
        );
    }
}