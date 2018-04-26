
<?php
add_action( 'wp_footer', 'contact_form_wp_footer' );

function contact_form_wp_footer() {
	?>
	<script type="text/javascript">
		document.addEventListener( 'wpcf7mailsent', function( event ) {
			if ( '4' == event.detail.contactFormId ) {
				location = home_url+ '/thank-you-contact-us/';
			} else if ( '98' == event.detail.contactFormId ) { // Sends submissions on form 1070 to the second thank you page
				location = home_url+ '/thank-you-request-quote';
			}
		}, false );
	</script>
	<?php
}