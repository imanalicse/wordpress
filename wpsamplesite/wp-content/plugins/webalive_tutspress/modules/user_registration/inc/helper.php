<?php
namespace Module\UserRegistration\Helper;

class Webalive_User_Registration_Helper {

	public function __construct() {
		add_action( 'login_head', array( $this, 'ct_user_rl_custom_login' ) );
		add_filter( 'login_url', array( $this, 'ct_user_rl_login_link_url' ), 10, 2 );
		add_filter( 'wp_nav_menu_items', array( $this, 'ct_user_rl_add_login_logout_link' ), 10, 2 );
	}

	// Login redirects
	public function ct_user_rl_custom_login() {
		$login_reg_url = get_option('watp_lr_slug');
		$url = home_url( '/' ).$login_reg_url['login_slug'];
		echo '<script>window.location.href="'.esc_url( $url ).'"</script>';
	}
	 
	public function ct_user_rl_login_link_url( $url ) {
		$login_reg_url = get_option('watp_lr_slug');
	   	$url = home_url( '/' ).$login_reg_url['login_slug'];
	   	return $url;
	}

	// Login Logout Links
	public function ct_user_rl_add_login_logout_link($items, $args) {
	    ob_start();
	    wp_loginout('index.php');
	    $loginoutlink = ob_get_contents();
	    ob_end_clean();
	    $items .= '<li class="menu-item nav-item ct-login-logout">'. $loginoutlink .'</li>';
	    return $items;
	}

}