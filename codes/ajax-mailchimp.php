<div class="newsletter-block">
	<h4>Newsletter Signup</h4>
	<!-- Begin MailChimp Signup Form -->
	<link href="http://cdn-images.mailchimp.com/embedcode/slim-081711.css" rel="stylesheet"
		  type="text/css">
	<form action="upload_mailchimp_subscriber"
		  method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form"
		  class="validate mailchimp">
		<div id="mc_embed_signup_scroll">
			<div class="mc-field-group newsletter-input">
				<div>
					<input type="email" value="" name="email" class="email" id="mce-EMAIL"
						   placeholder="Enter Address *" required="" aria-required="true">
					<span class="newsletter_mail_error"></span>
				</div>
				<div>
					<div style="position: absolute; left: -5000px;" aria-hidden="true"><input
							type="text" name="b_3eedf62523fb63e16a809814c_78cdb59ddb" tabindex="-1"
							value=""></div>
					<input type="submit" value="Sign Up" name="subscribe" id="mc-embedded-subscribe"
						   class="button submit-newsletter btn  btn-block">
				</div>
			</div>
		</div>
		<div class="loader" style="display: none;"><img
				src="http://blog.eventbookings.com/wp-content/themes/webalive/images/ajax-loader.gif"/></div>
	</form>
	<span class="message" style="display: none;"> </span>
	<!--End mc_embed_signup-->
</div>
<script>
	$('form.mailchimp').on('submit', function(e){
		var $this =$(this), dataString="action=upload_mailchimp_subscriber&"+$(this).serialize(); // Store form data
		$this.find('.loader').show();
		$this.siblings('.message').hide();
		$.ajax({
			type: "POST",
			dataType: 'json',
			url: ajax_url,
			data: dataString,
			success: function(response)
			{
				// If we have response
				if(response) {
					$this.find("#email").val("");
					$this.siblings('.message').show().html('Subscribed successfully');
				} else {
					$this.siblings('.message').show().html('Not subscribed. Please try again.');
				}
				$this.find('.loader').hide();
			}
		});
		e.preventDefault();

	});
</script>

<?php

add_action('wp_ajax_upload_mailchimp_subscriber', 'upload_mailchimp_subscriber');
add_action('wp_ajax_nopriv_upload_mailchimp_subscriber', 'upload_mailchimp_subscriber');
function upload_mailchimp_subscriber()
{
	$email = $_POST['email'];

	//CakeLog::write('debug', $user);
	$result = call('lists/subscribe', array(
		'id' => '0f59baddc7',
		'email' => array('email' => $email),
		'double_optin' => false,
		'update_existing' => true,
		'replace_interests' => false,
		'send_welcome' => false,
	));
	if(!empty($result["leid"]))
		echo true;
	else
		echo false;
	exit();

}
function call( $method, $args=array())
{
	$api_endpoint = 'https://<dc>.api.mailchimp.com/2.0';
	$api_key = '00287369063de1a0aaffa681f296a041-us17'; //live

	list(, $datacentre) = explode('-', $api_key);
	$api_endpoint = str_replace('<dc>', $datacentre, $api_endpoint);
	$args['apikey'] = $api_key;
	$url = $api_endpoint.'/'.$method.'.json';

	if (function_exists('curl_init') && function_exists('curl_setopt')){
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
		curl_setopt($ch, CURLOPT_USERAGENT, 'PHP-MCAPI/2.0');
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_TIMEOUT, 10);
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($args));
		$result = curl_exec($ch);
		curl_close($ch);
	}else{
		$json_data = json_encode($args);
		$result = file_get_contents($url, null, stream_context_create(array(
			'http' => array(
				'protocol_version' => 1.1,
				'user_agent'       => 'PHP-MCAPI/2.0',
				'method'           => 'POST',
				'header'           => "Content-type: application/json\r\n".
					"Connection: close\r\n" .
					"Content-length: " . strlen($json_data) . "\r\n",
				'content'          => $json_data,
			),
		)));
	}
	//CakeLog::write('debug', $result);
	return $result ? json_decode($result, true) : false;
}
