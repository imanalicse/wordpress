<?php 
namespace Module\UserRegistration\Success;

class Webalive_User_Registration_Success {

	public function __construct() {
		add_shortcode( 'ct_user_rl_success', array( $this, 'ct_user_rl_registration_success_shortcode' ) );
	}

	public function ct_user_rl_registration_success_shortcode( $atts, $content = null ) {
		$login_reg_url = get_option('watp_lr_slug');
		extract( shortcode_atts(array(
			'success_msg' => 'Thank you for getting registered!'
		), $atts) );
		$url = home_url('/').esc_attr( $login_reg_url['login_slug'] );
		$return = '
		<h4>'.$success_msg.'</h4>
		<p><a href="'.esc_url( $url ).'">Please Login!</a></p>
		';
		return $return;
	}

}
