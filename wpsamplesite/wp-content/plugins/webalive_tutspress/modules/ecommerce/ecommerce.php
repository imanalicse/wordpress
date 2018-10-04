<?php 
namespace Module;

class Ecommerce {
    /**
     * Construct Function
     */
    public function __construct() {
        add_action( 'admin_menu', array( $this, 'create_menu' ) );
    }

    /**
     * Create menu For Course
     */
    public function create_menu() {
        add_submenu_page(
            'webalive-tutpress', 
            __( 'Ecommerce', 'webalive_tutpress' ), 
            'Ecommerce', 
            'manage_options', 
            'webalive-tutpress-ecommerce', 
            array( $this, 'template' )
        );
    }
}