<?php 
namespace Module\UserRegistration\Registration;

class Webalive_User_Registration {

	private $username;
	private $email;
	private $password;
	private $conf_password;
	private $firstname;
	private $lastname;
	private $redirect;

	public function __construct() {
		add_shortcode( 'ct_user_rl_register', array($this, 'ct_user_rl_registration_form_shortcode') );
	}

	public function ct_user_rl_registration_form_shortcode($atts, $content = null) {
		
		extract(shortcode_atts(array(
			'redirect' => ''
		), $atts));
		ob_start();
		$this->redirect = $redirect;
		$this->ct_user_rl_registration_form();
		$this->ct_user_rl_form_validation();
		$this->ct_user_rl_registration_process();
		return ob_get_clean();
	}

	public function ct_user_rl_registration_form() {
		if( get_option( 'users_can_register' ) ) {
			
			$reg_form_fields = get_option( 'watp_reg_form_fields_settings' );
			?>
			<div class="ct-user-registration-form">
				<form action="<?php echo esc_url( $_SERVER['REQUEST_URI'] ); ?>" method="POST">
					<?php if( $reg_form_fields['firstname'] === true ) : ?>
			    	<p>
			            <label form="firstname">FirstName:</label>
			            <input type="text" id="firstname" name="ct_firstname" value="<?php echo( isset( $_POST['ct_firstname'] ) ? $_POST['ct_firstname'] : null );  ?>" />
					</p>
					<?php endif; ?>
					<?php if( $reg_form_fields['lastname'] === true ) : ?>
			        <p>
			            <label form="lastname">Lastname:</label>
			            <input type="text" name="ct_lastname" value="<?php echo( isset( $_POST['ct_lastname'] ) ? $_POST['ct_lastname'] : null );  ?>" />
					</p>
					<?php endif; ?>
			        <p>
			            <label form="username">Username<span class="asteric">*</span> :</label>
			            <input type="text" name="ct_username" value="<?php echo( isset( $_POST['ct_username'] ) ? $_POST['ct_username'] : null );  ?>" />
					</p>
			        <p>
			            <label form="email">Email<span class="asteric">*</span> :</label>
			            <input type="text" name="ct_email" value="<?php echo( isset( $_POST['ct_email'] ) ? $_POST['ct_email'] : null );  ?>" />
					</p>
			        <p>
			            <label form="password">Password<span class="asteric">*</span> :</label>
			            <input type="password" name="ct_password" />
					</p>
					<?php if( $reg_form_fields['google'] === true ) : ?>
					<p>
						<?php echo do_shortcode('[nextend_social_login provider="google"]'); ?>
					</p>
					<?php endif; ?>
			        <p>
			            <input type="submit" name="submit" value="Register" >
			        </p>
			    </form>
			</div>
			<?php
		}else {
			echo '<div class="no-reg-allowed"><strong>Sorry!! Registration is currently not allowed!</strong></div>';
		}
	}

	public function ct_user_rl_form_validation() {
		if( isset( $_POST['submit'] ) ) {
			$this->firstname 		= ( $reg_form_fields['firstname'] === true ) ? esc_attr($_POST['ct_firstname']) : '';
			$this->lastname 		= ( $reg_form_fields['lastname'] === true ) ? esc_attr($_POST['ct_lastname']) : '';
			$this->username 		= esc_attr($_POST['ct_username']);
			$this->email 			= esc_attr($_POST['ct_email']);
			$this->password 		= esc_attr($_POST['ct_password']);

			$reg_form_fields = get_option( 'watp_reg_form_fields_settings' );

			if( empty( $this->username ) || empty( $this->email ) || empty( $this->password ) ) {
				return new WP_Error( 'field', 'You need to fill up all required fields' );
			}
			if( !is_email( $this->email ) ) {
				return new WP_Error( 'invalid_email', 'Your email is not valid!' );
			}
			if( email_exists( $this->email ) ) {
				return new WP_Error( 'email_exists', 'This email is already exists' );
			}
			if( empty( $this->password ) ) {
				return new WP_Error( 'empty_pass', 'You can not leave password field empty' );
			}
		}
	}

	public function ct_user_rl_registration_process() {
		$new_user = array(
			'first_name' 	=> esc_attr( $this->firstname ),
			'last_name' 	=> esc_attr( $this->lastname ),
			'user_login' 	=> esc_attr( $this->username ),
			'user_email' 	=> esc_attr( $this->email ),
			'user_pass' 	=> esc_attr( $this->password )
		);

		if( is_wp_error( $this->ct_user_rl_form_validation() ) ) {
			echo '<div class="error-msg">'.$this->ct_user_rl_form_validation()->get_error_message().'</div>';
		}else {
			$register_new_user = wp_insert_user( $new_user );
			if( !is_wp_error( $register_new_user ) ) {
				if( !empty( $this->redirect ) ) {
					$url = home_url( '/' ).$this->redirect;
					echo '<script>window.location.href="'.esc_url( $url ).'"</script>';
				}else {
					return false;
				}
				
			}
		}
	}

}