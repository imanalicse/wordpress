<?php
/**
 * THEME WAR WordPress Framework
 *
 * Copyright (c) 2016, THEME WAR,(http://themewar.com)
 */


//===================================
// Admin Hook Variable
//===================================
function martin_custom_admin_head()
{
?>
<script type="text/javascript"> var url = '<?php get_template_directory_uri(); ?>';</script>
<?php
}
add_action('admin_head', 'martin_custom_admin_head');

//===================================
// Generate Widget
//===================================
if(isset($aitThemeWidgets) && !empty($aitThemeWidgets))
{
    foreach($aitThemeWidgets as $widget)
    {
        require TW_FRAMEWORK_DIR.'/widgets/tw_'.$widget.'_widget.php';
    }
}


//======================================
// Load Widgets Areas
//======================================

function martinRegisterWidgetAreas($areas, $defaultParams = array())
{
	if(empty($defaultParams)){
		$defaultParams = array(
			'before_widget' => '<div id="%1$s" class="box widget-container %2$s"><div class="box-wrapper">',
			'after_widget' => "</div></div>",
			'before_title' => '<h2 class="widget-title">',
			'after_title' => '</h2>',
		);
	}

	foreach($areas as $id => $area){
		$params = array_merge($defaultParams, $area, array('id' => $id));
		register_sidebar($params);
	}
}





//==============================================
// Make Widget Availabel In Shortcode
//==============================================
add_filter('widget_text', 'do_shortcode');



//==========================================
// Active user meta
//==========================================
require_once  TW_FRAMEWORK_DIR.'/extra/user-metabox.php';



//==========================================
// Marting Saving Hook
//==========================================
require_once  TW_FRAMEWORK_DIR.'/extra/themewar_saving_hooks.php';


//==========================================
// ThemeWar Line Icon
//==========================================

require_once TW_FRAMEWORK_DIR.'/extra/custom_icon_set.php';




//==========================================
// Extra Shortcode Inclide
//==========================================

require_once TW_FRAMEWORK_DIR.'/extra/class-tgm-plugin-activation.php';


add_action( 'tgmpa_register', 'martin_plugin_activation_notive' );
if(!function_exists('martin_plugin_activation_notive'))
{
    function martin_plugin_activation_notive()
    {
        $plugins = array(
            array(
                'name'      => 'Unyson',
                'slug'      => 'unyson',
                'required'  => TRUE,
            ),
            array(
                'name'      => 'MailChimp for WordPress',
                'slug'      => 'mailchimp-for-wp',
                'required'  => TRUE,
            ),
            array(
                'name'               => 'Martin Assistance', 
                'slug'               => 'martin_assistance', 
                'source'             => 'http://themewar.com/plugins/martin_assistance.zip',
                'required'           => TRUE, 
                'version'            => '', 
                'force_activation'   => false, 
                'force_deactivation' => false, 
                'external_url'       => '',
            ),
            array(
                'name'               => 'Martin Instagram', 
                'slug'               => 'martin_instagram', 
                'source'             => 'http://themewar.com/plugins/martin_instagram.zip',
                'required'           => false, 
                'version'            => '', 
                'force_activation'   => false, 
                'force_deactivation' => false, 
                'external_url'       => '',
            ),
            array(
                'name'               => 'Martin Tweets', 
                'slug'               => 'martin_tweets', 
                'source'             => 'http://themewar.com/plugins/martin_tweets.zip',
                'required'           => false, 
                'version'            => '', 
                'force_activation'   => false, 
                'force_deactivation' => false, 
                'external_url'       => '',
            ),

        );

        $config = array(
		'id'           => 'martin',                 
		'default_path' => '',                      
		'menu'         => 'tgmpa-install-plugins', 
		'has_notices'  => true,                    
		'dismissable'  => true,                    
		'dismiss_msg'  => '',                      
		'is_automatic' => false,                   
		'message'      => '',                      
	);

            tgmpa( $plugins, $config );
        }
}



//==========================================
// Martin Header Generator
//==========================================

require_once TW_FRAMEWORK_DIR.'/extra/martin_header_generator.php';