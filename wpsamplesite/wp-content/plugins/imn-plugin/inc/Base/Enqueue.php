<?php 
/**
 * @package  ImnPlugin
 */
namespace Inc\Base;

class Enqueue
{
	public function register() {

		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue' ) );
	}
	
	function enqueue() {
		// enqueue all our scripts
		wp_enqueue_style( 'imn-admin-style', IMN_PLUGIN_URL . 'assets/css/style.css' );
		wp_register_script ( 'imn-admin-script', IMN_PLUGIN_URL . 'assets/js/script.js' );
		wp_enqueue_script ( 'imn-admin-script' );

	}
}