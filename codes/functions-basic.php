
<?php
define('css_path', get_template_directory_uri().'/css/');	//Path to the css file in the template folder
define('script_path', get_template_directory_uri().'/js/');	//Path to the JavaScript files in the template folder

add_action( 'wp_enqueue_scripts', 'netki_setup_scripts' );
//Sets up the javascript files
function netki_setup_scripts()
{
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'jquery-effects-core' );
	wp_enqueue_script( 'site-script', script_path.'script.js', array('jquery'));
	wp_localize_script( 'site-script', 'ajax_url', array('url' => admin_url('admin-ajax.php') ) );
	wp_enqueue_script('custom', script_path.'custom.js', array('jquery'));
}




//initialize at header
function init_header()
{
	?>
	<script type="text/javascript">
		ajax_url = '<?php echo admin_url( 'admin-ajax.php'); ?>';
		home_url = '<?php echo home_url(); ?>';
		directory_url = '<?php echo get_template_directory_uri(); ?>';
	</script>
	<?php
}

add_action('wp_head', 'init_header', 1);

add_filter('show_admin_bar', '__return_false');


function set_post_arguments($query){
	if(!is_admin() && is_post_type_archive('template')){
		$query->set('posts_per_page', 9999);
	}
	if ( !is_front_page() && is_home() ) {
		$query->set( 'cat', '-18' );
	}
}
add_action('pre_get_posts', 'set_post_arguments');


// ajax
add_action('wp_ajax_case_study', 'case_study');
add_action('wp_ajax_nopriv_case_study', 'case_study');

function case_study(){
	$post_id = $_POST['post_id'];

	exit();
}