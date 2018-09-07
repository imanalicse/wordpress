<?php
/*
* @package ImnPlugin
*/

namespace Inc;

final class Init
{
    /*
     * Store all the classes inside an array
     * @return array Full list of classes
     */
    public static function get_services()
    {
        return [
            Pages\Admin::class,
            Base\Enqueue::class,
            Base\SettingsLinks::class
        ];
    }

    /*
     * Loop through the classes, initialize them, and call the register() method if it is exists
     * @return
     */
    public static function register_services()
    {
        foreach (self::get_services() as $class) {
            $service = self::instantiate($class);
            if (method_exists($service, 'register')) {
                $service->register();
            }
        }
    }

    /*
     * Initialize the class
     * @param class $class class from the services array
     * @return class instance new instance of the class
     *
     */

    private static function instantiate($class)
    {
        $service = new $class();
        return $service;
    }
}

//
//use Inc\Base\Activate;
//use Inc\Base\Deactivate;
//use Inc\Pages\Admin;
//
//if (!class_exists('ImnPlugin')) {
//
//    class ImnPlugin
//    {
//        public $plugin;
//
//        function __construct()
//        {
//            $this->plugin = plugin_basename(__FILE__);
//            $this->init_hooks();
//        }
//
//        function init_hooks()
//        {
//            add_action('init', array($this, 'custom_post_type'));
//
//            add_action('wp_enqueue_scripts', array($this, 'frontend_scripts'));
//        }
//
//        function register()
//        {
//

//        }
//

//
//
//        function activate()
//        {
//            // generated a CTP
//            //require_once plugin_dir_path(__FILE__) . 'inc/imn-plugin-activate.php';
//            Activate::activate();
//
//        }
//
//        function deactivate()
//        {
//            require_once plugin_dir_path(__FILE__) . 'inc/imn-plugin-deactivate.php';
//            ImnPluginDeactivate::deactivate();
//        }
//
//        function uninstall()
//        {
//            // delete CTP
//            // delete all the plugin data from the DB
//        }
//
//        function custom_post_type()
//        {
//            register_post_type('book', ['public' => true, 'label' => 'Books']);
//        }
//
//
//        function frontend_scripts()
//        {
//            wp_enqueue_style('frontend-imn-style', plugins_url('/assets/frontend-imn-style.css', __FILE__));
//        }
//    }
//
//    if (class_exists("ImnPlugin")) {
//        $imnPlugin = new ImnPlugin();
//        $imnPlugin->register();
//    }
//
//    // Activation
//    register_activation_hook(__FILE__, array($imnPlugin, 'activate'));
//
//    //Deactivation
//    register_activation_hook(__FILE__, array('Inc\Base\Deactivate', 'deactivate'));
//
//    //register_uninstall_hook(__FILE__, array($imnPlugin, 'uninstall'));
//}