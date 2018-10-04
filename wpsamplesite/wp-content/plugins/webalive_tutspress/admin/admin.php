<?php 
namespace Admin;

use Module\Course;
use Module\Vimeo_Uploader;
use Module\Settings;
use Module\Checkout;
use Module\Ecommerce;

class Webalive_Tutspress_Admin {

    /**
     * Construct Function
     */
    public function __construct() {

        add_action( 'admin_menu', array( $this, 'create_menu' ) );
        add_action( 'admin_enqueue_scripts', array( $this, 'scripts_and_styles' ) );
        
        // Activating Admin Modules
        $course = new Course;
        $settings = new Settings;
        $vimeo_uploader = new Vimeo_Uploader;
        $checkout = new Checkout();
        $ecommerce = new Ecommerce();
    }

    /**
     * Load all scritps & styles
     */
    public function scripts_and_styles() {
        $page_name = isset($_GET['page']) ? $_GET['page'] : '';

        wp_enqueue_style('watp-sweetalert', WATP_URL . 'admin/assets/dist/css/sweetalert.min.css');
        wp_enqueue_style('watp-admin-style', WATP_URL . 'admin/assets/dist/css/admin.min.css');

        wp_enqueue_script('watp-sweetalert', WATP_URL . 'admin/assets/dist/js/sweetalert.min.js', array('jquery'), '20180909', true);
        if( $page_name == 'webalive-tutpress-vimeo-uploader' ) {
            wp_enqueue_script('watp-vimeo-uploader-script', WATP_URL . 'admin/assets/dist/js/vimeo_uploader.min.js', array('jquery', 'wp-util'), '20180925', true); 
        }
        wp_enqueue_script('watp-admin-script', WATP_URL . 'admin/assets/dist/js/admin.min.js', array('jquery', 'wp-util'), '20180909', true);

        $options = array(
            'ajax_url' => admin_url('admin-ajax.php'),
            'ajax_nonce' => wp_create_nonce('webalive_tutspress'),
        );
        wp_localize_script('watp-admin-script', 'admin_localizer', $options);
    }

    /**
     * Create Menu
     */
    public function create_menu() {
        add_menu_page(
            __( 'Webalive TutPress', 'webalive_tutspress' ), 
            'Webalive TutPress', 
            'manage_options', 
            'webalive-tutpress', 
            array( $this, 'template' ), 
            '', 
            10
        );
    }

    /**
     * Admin Template
     */
    public function template() {
        ?>
        <div class="watp-wrapper">
            <div class="watp-header">
                <h2><span class="dashicons dashicons-dashboard"></span> Dashboard</h2>
            </div>
            <div class="watp-body">
                <div class="watp-row-4">
                    <div class="watp-card">Card</div>
                    <div class="watp-card">Card</div>
                    <div class="watp-card">Card</div>
                    <div class="watp-card">Card</div>
                </div>
            </div>
            <div class="watp-footer"></div>
        </div>
        <?php
    }

    

}
