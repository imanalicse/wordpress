<?php 
namespace Module;

use Module\Settings\Template;

class Settings {

    /**
     * WP_NONCE
     */
    private $wp_nonce = 'webalive_tutspress';

    /**
     * Template Instance
     */
    public $template;

    public function __construct() {
        add_action( 'admin_menu', array( $this, 'create_menu' ) );
        add_action( 'wp_ajax_save_api_credentials', array( $this, 'save_api_credentials' ) );
        add_action( 'wp_ajax_save_login_reg_page_slug', array( $this, 'save_login_reg_page_slug' ) );
        add_action( 'wp_ajax_save_reg_form_field_settings', array( $this, 'save_reg_form_field_settings' ) );
        add_action( 'wp_ajax_save_ecommerce_page_slug', array( $this, 'save_ecommerce_page_slug' ) );
    }

    /**
     * Create Settings Menu
     */
    public function create_menu() {
        add_submenu_page(
            'webalive-tutpress', 
            __( 'Settings', 'webalive_tutpress' ), 
            'Settings', 
            'manage_options', 
            'webalive-tutpress-settings', 
            array( $this, 'template' )
        );
    }

    /**
     * Settings Template
     */
    public function template() {
        $this->template = new Template();
        $this->template->tab_template();
    }

    /**
     * Save API Credentails
     */
    public function save_api_credentials() {
        // Checking wp_nonce
        check_ajax_referer( $this->wp_nonce, 'security' );

        if( isset($_POST['fields']) ) {
            parse_str( $_POST['fields'], $fields );

            $vimeo_api = array(
                'client_id' => $fields['watp_client_id'],
                'client_secret' => $fields['watp_client_secret'],
                'api_token' => $fields['watp_access_token']
            );

            update_option( 'watp_vimeo_api', $vimeo_api );

        }else {
            return;
        }

        echo wp_json_encode('success');

        die();
    }

    /**
     * Save Login / Register Page Slug
     */
    public function save_login_reg_page_slug() {
        if( isset($_POST['fields']) ) {
            parse_str( $_POST['fields'], $fields );

            $watp_lr_slug = array(
                'login_slug' => $fields['watp_login_slug'],
                'reg_slug' => $fields['watp_register_slug']
            );

            update_option( 'watp_lr_slug', $watp_lr_slug );
        }else {
            return;
        }

        echo wp_json_encode('success');

        die();
    }

    /**
     * Save Registration Form Fields Settings
     */
    public function save_reg_form_field_settings() {
        if( isset($_POST['fields']) ) {
            parse_str( $_POST['fields'], $fields );

            $watp_reg_form_fields_settings = array(
                'firstname'         => $fields['watp_reg_firstname_check'] ? true : false,
                'lastname'          => $fields['watp_reg_lastname_check'] ? true : false,
                'facebook'          => $fields['watp_reg_facebook_check'] ? true : false,
                'google'            => $fields['watp_reg_google_check'] ? true : false
            );

            update_option( 'watp_reg_form_fields_settings', $watp_reg_form_fields_settings );

        }else {
            return;
        }

        echo wp_json_encode('success');
        die();
    }

    /**
     * Save Ecommerce Pages Slug
     */
    public function save_ecommerce_page_slug() {
        if( isset($_POST['fields']) ) {
            parse_str( $_POST['fields'], $fields );

            $watp_ecommerce_page_slug = array(
                'checkout_slug' => $fields['watp_checkout_slug'],
                'payment_success_slug' => $fields['watp_payment_success_slug']
            );

            update_option( 'watp_ecommerce_page_slug', $watp_ecommerce_page_slug );
            echo wp_json_encode('success');
        }else {
            echo wp_json_encode('failure');
            return;
        }

        die();
    }

}