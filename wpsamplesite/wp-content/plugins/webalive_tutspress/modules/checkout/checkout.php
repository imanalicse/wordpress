<?php
namespace Module;

class Checkout {

    /**
     * Construct Fucntion
     */
    public function __construct() {
        add_filter('template_include', array($this, 'load_template'));
    }

    /**
     * Loading Checkout Templates
     */
    public function load_template($template) {

        global $post;
        
        if (!$post) {
            return $template;
        }

        if (is_page('checkout')) {
            if (file_exists(WATP_PATH . 'modules/checkout/templates/checkout.php')) {
                return WATP_PATH . 'modules/checkout/templates/checkout.php';
            }
        }

        return $template;
    }
}