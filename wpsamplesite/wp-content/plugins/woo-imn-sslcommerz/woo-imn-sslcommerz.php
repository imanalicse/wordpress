<?php
/**
 * Plugin Name: Woo imn sslcommerz
 * Plugin URI: https://woocommerce.com/
 * Description: Woo Imn Sslcommerz
 * Version: 1.0.0
 * Author: Iman
 * Author URI: https://woocommerce.com
 * Text Domain: WooImnSslcommerz
 * Domain Path: /i18n/languages/
 *
 * @package WooCommerce
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

add_action( 'plugins_loaded', 'init_woo_imn_sslcommerz_gateway_class' );

function init_woo_imn_sslcommerz_gateway_class() {
    class WC_Gateway_Imn_Sslcommerz_Gateway extends WC_Payment_Gateway {

        public $domain;

         public function __construct(){

            $this->domain = 'imn_sslcommerz';

            $this->id = 'imn_sslcommerz';
            $this->icon = apply_filters('woocommerce_imn_sslcommerz_gateway_icon', '');
            $this->has_fields = false;
            $this->method_title = 'Imn sslcommerz';
            $this->method_description = 'Imn sslcommerz description';

              // Load the settings.
              $this->init_form_fields();
              $this->init_settings();

               // Actions
            add_action( 'woocommerce_update_options_payment_gateways_' . $this->id, array( $this, 'process_admin_options' ) );
            //add_action( 'woocommerce_thankyou_custom', array( $this, 'thankyou_page' ) );

         }
         
         /**
         * Initialise Gateway Settings Form Fields.
         */
        public function init_form_fields() {

            $this->form_fields = array(
                'enabled' => array(
                    'title'   => __( 'Enable/Disable', $this->domain ),
                    'type'    => 'checkbox',
                    'label'   => __( 'Enable Imn sslcommerz Payment', $this->domain ),
                    'default' => 'yes'
                ),
                'title' => array(
                    'title'       => __( 'Title', $this->domain ),
                    'type'        => 'text',
                    'description' => __( 'This controls the title which the user sees during checkout.', $this->domain ),
                    'default'     => __( 'Imn sslcommerz Payment', $this->domain ),
                    'desc_tip'    => true,
                ),
                'order_status' => array(
                    'title'       => __( 'Order Status', $this->domain ),
                    'type'        => 'select',
                    'class'       => 'wc-enhanced-select',
                    'description' => __( 'Choose whether status you wish after checkout.', $this->domain ),
                    'default'     => 'wc-completed',
                    'desc_tip'    => true,
                    'options'     => wc_get_order_statuses()
                ),
                'description' => array(
                    'title'       => __( 'Description', $this->domain ),
                    'type'        => 'textarea',
                    'description' => __( 'Payment method description that the customer will see on your checkout.', $this->domain ),
                    'default'     => __('Payment Information', $this->domain),
                    'desc_tip'    => true,
                ),
                'instructions' => array(
                    'title'       => __( 'Instructions', $this->domain ),
                    'type'        => 'textarea',
                    'description' => __( 'Instructions that will be added to the thank you page and emails.', $this->domain ),
                    'default'     => '',
                    'desc_tip'    => true,
                ),
            );
        }

        public function init_settings(){
            //$this->title = $this->settings['title'];
            $this->title = 'sslcommerz';
            //$this->description = $this->settings['description'];
        }

        function process_payment( $order_id ) {
            global $woocommerce;
            $order = new WC_Order( $order_id );
            write_log($order);
            print_r($order);
            die();
        
            // Mark as on-hold (we're awaiting the cheque)
            $order->update_status('on-hold', __( 'Awaiting cheque payment', 'woocommerce' ));
        
            // Reduce stock levels
            $order->reduce_order_stock();
        
            // Remove cart
            $woocommerce->cart->empty_cart();
        
            // Return thankyou redirect
            return array(
                'result' => 'success',
                'redirect' => $this->get_return_url( $order )
            );
        }

    }
}

function add_imn_sslcommerz_gateway_class( $methods ) {
    $methods[] = 'WC_Gateway_Imn_Sslcommerz_Gateway'; 
    return $methods;
}

add_filter( 'woocommerce_payment_gateways', 'add_imn_sslcommerz_gateway_class' );

if (!function_exists('write_log')) {

    function write_log($log) {
        if (true === WP_DEBUG) {
            if (is_array($log) || is_object($log)) {
                error_log(print_r($log, true));
            } else {
                error_log($log);
            }
        }
    }

}
