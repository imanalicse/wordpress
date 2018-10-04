<?php 
namespace Front;

use Module\UserRegistration\Webalive_User_Registration as UserRegistration;

class Webalive_Tutspress_Public {

    /**
     * Construct Function
     */
    public function __construct() {
        add_action( 'wp_enqueue_scripts', array( $this, 'scripts_and_styles' ) );

        $user_registration = new UserRegistration();
    }

    /**
     * Load all scritps & styles
     */
    public function scripts_and_styles() {
        wp_enqueue_style('watp-public-style', WATP_URL . 'public/assets/dist/css/public.min.css');

        wp_enqueue_script('watp-public-script', WATP_URL . 'public/assets/dist/js/public.min.js', array( 'jquery' ), '20180917', true);
    }

}
