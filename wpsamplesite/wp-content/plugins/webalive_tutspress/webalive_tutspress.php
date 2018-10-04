<?php 
/**
 * Plugin Name: Webalive TutsPress
 * Plugin URI: https://webalive.com/wp/plugins/webalive-tutspress
 * Description: Tutorial course plugin
 * Version: 1.0.0
 * License: Webalive.com
 * Author: Md. Rabiul islam Robi
 * Author URI: https://robicse11127.github.com/me
 * Text Domain: webalive_tutspress
 */

if( !defined( 'ABSPATH' ) ) exit();

require_once 'vendor/autoload.php';

require_once __DIR__.'/testing/test.php';

use Admin\Webalive_Tutspress_Admin as Admin;
use Front\Webalive_Tutspress_Public as Front;

class Webalive_Tutspress {

    /**
     * Cunstruct Function
     */
    public function __construct() {
        $this->constants();
        $admin = new Admin;
        $front = new Front;
        add_action('init', array($this, 'do_output_buffer'));
    }

    /**
     * Defining Constants
     */
    public function constants() {
        define( 'WATP_URL', plugins_url( '/', __FILE__ ) );
        define( 'WATP_PATH', plugin_dir_path( __FILE__ ) );
    }


    public function do_output_buffer() {
        ob_start();
    }

}

new Webalive_Tutspress();