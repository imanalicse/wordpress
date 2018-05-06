<?php
/**
 * THEME WAR WordPress Framework
 *
 * Copyright (c) 2016, THEME WAR, s.r.o. (http://themewar.com)
 */

define('THEME_DIR', get_template_directory());
define('THEME_URL', get_template_directory_uri());
define('STYLESHEET_URL', get_stylesheet_uri());

define('THEME_STYLESHEET_URL', get_bloginfo('stylesheet_url'));
define('THEME_STYLESHEET_FILE', THEME_DIR . '/style.css');

define('TW_FRAMEWORK_DIR', THEME_DIR . '/framework-customizations/Framework');
define('TW_FRAMEWORK_URL', THEME_URL . '/framework-customizations/Framework');

define('TW_ADMIN_DIR', THEME_DIR . '/framework-customizations/Admin');
define("TW_ADMIN_URL", THEME_URL . '/framework-customizations/Admin');

define('TW_ASSETS_DIR', THEME_DIR . '/framework-customizations/Assets');
define('TW_ASSETS_URL', THEME_URL . '/framework-customizations/Assets');


define('TW_ASSETS_CSS_DIR', THEME_DIR . '/framework-customizations/Assets/css');
define('TW_ASSETS_CSS_URL', THEME_URL . '/framework-customizations/Assets/css');

define('TW_ASSETS_JS_DIR', THEME_DIR . '/framework-customizations/Assets/js');
define('TW_ASSETS_JS_URL', THEME_URL . '/framework-customizations/Assets/js');

define('TW_ASSETS_IMAGES_DIR', THEME_DIR . '/framework-customizations/Assets/images');
define('TW_ASSETS_IMAGES_URL', THEME_URL . '/framework-customizations/Assets/images');



//======================================
// Load Framework Bootstrap
//======================================
require TW_FRAMEWORK_DIR.'/tw_framework_bootstrap.php';

//=========================================
// Martin Enqueue All Style 
//=========================================

function martin_font_url() 
{
	$fonts_url = '';
	$fonts     = array();
	$subsets   = 'latin,latin-ext';

	if ( 'off' !== _x( 'on', 'Noto Sans font: on or off', 'martin' ) ) 
        {
            $fonts[] = 'Noto Sans:400italic,700italic,400,700';
	}

	if ( 'off' !== _x( 'on', 'Noto Serif font: on or off', 'martin' ) ) 
        {
            $fonts[] = 'Noto Serif:400italic,700italic,400,700';
	}

	if ( 'off' !== _x( 'on', 'Inconsolata font: on or off', 'martin' ) ) 
        {
            $fonts[] = 'Inconsolata:400,700';
	}

	$subset = _x( 'no-subset', 'Add new subset (greek, cyrillic, devanagari, vietnamese)', 'martin' );

	if ( 'cyrillic' == $subset ) 
        {
            $subsets .= ',cyrillic,cyrillic-ext';
	} 
        elseif ( 'greek' == $subset ) 
        {
            $subsets .= ',greek,greek-ext';
	} 
        elseif ( 'devanagari' == $subset ) 
        {
            $subsets .= ',devanagari';
	} 
        elseif ( 'vietnamese' == $subset ) 
        {
            $subsets .= ',vietnamese';
	}

	if ( $fonts ) 
        {
            $fonts_url = esc_url(add_query_arg( array(
                    'family' => urlencode( implode( '|', $fonts ) ),
                    'subset' => urlencode( $subsets ),
            ), '//fonts.googleapis.com/css' ));
	}

	return $fonts_url;
}

function martin_google_fonts_url() {
    $fonts_url = '';
    $font_families = array();
 
    $Roboto = _x( 'on', 'Roboto Slab font: on or off', 'martin' );
    $Lato = _x( 'on', 'Lato font: on or off', 'martin' );
    $Raleway = _x( 'on', 'Raleway font: on or off', 'martin' );
 
    if ( 'off' !== $Roboto ) 
    {
        $font_families[] = 'Roboto Slab:400,100,300,700';
    }
    if ( 'off' !== $Lato ) 
    {
        $font_families[] = 'Lato:400,100,100italic,300,300italic,700,400italic,700italic,900,900italic';
    }
    if ( 'off' !== $Raleway ) 
    {
        $font_families[] = 'Raleway:600,600italic,700,700italic,800,800italic,900,900italic';
    }
    
    if ( $font_families) 
    {
        $query_args = array(
            'family' => urlencode( implode( '|', $font_families ) ),
            'subset' => urlencode( 'latin,latin-ext' ),
        );
 
        $fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
    }
 
    return esc_url_raw( $fonts_url );
}

function be_enqueue_all_style()
{
    
    wp_enqueue_style( 'be-lato', martin_font_url(), array(), null );
    wp_enqueue_style( 'be-google-fonts', martin_google_fonts_url(), array(), null );
    wp_enqueue_style( 'genericons', TW_ASSETS_CSS_URL. '/genericons/genericons.css', array(), '3.2' );
    wp_enqueue_style( 'be-style', STYLESHEET_URL );
    wp_enqueue_style( 'be-ie', TW_ASSETS_CSS_URL . '/ie.css', array( 'be-style' ), '20141010' );
    wp_style_add_data( 'be-ie', 'conditional', 'lt IE 9' );
    wp_enqueue_style( 'be-ie7', TW_ASSETS_CSS_URL . '/ie7.css', array( 'be-style' ), '20141010' );
    wp_style_add_data( 'be-ie7', 'conditional', 'lt IE 8' );
    
    //Css for Theme Styling
    wp_enqueue_style( 'preset', TW_ASSETS_CSS_URL. '/preset.css');
    wp_enqueue_style( 'animate', TW_ASSETS_CSS_URL. '/animate.css');
    wp_enqueue_style( 'magnific-popup', TW_ASSETS_CSS_URL. '/magnific-popup.css');
    wp_enqueue_style( 'slick-theme', TW_ASSETS_CSS_URL. '/slick-theme.css');
    wp_enqueue_style( 'slick', TW_ASSETS_CSS_URL. '/slick.css');
    wp_enqueue_style( 'jquery.bxslider', TW_ASSETS_CSS_URL. '/jquery.bxslider.css');
    wp_enqueue_style( 'settings', TW_ASSETS_CSS_URL. '/settings.css');
    wp_enqueue_style( 'owl.theme', TW_ASSETS_CSS_URL. '/owl.theme.css');
    wp_enqueue_style( 'owl.carousel', TW_ASSETS_CSS_URL. '/owl.carousel.css');
    wp_enqueue_style( 'be-fonts', TW_ASSETS_CSS_URL. '/fonts.css');
    wp_enqueue_style( 'be-icon', TW_ASSETS_CSS_URL. '/icon.css');
    wp_enqueue_style( 'bootstrap', TW_ASSETS_CSS_URL. '/bootstrap.css');
    wp_enqueue_style( 'be-theme-style', TW_ASSETS_CSS_URL. '/style.css');
    wp_enqueue_style( 'be-responsive', TW_ASSETS_CSS_URL. '/responsive.css');
    wp_enqueue_style( 'be-wide', TW_ASSETS_CSS_URL. '/lay_colors/wide.css');
    wp_enqueue_style( 'be-dark', TW_ASSETS_CSS_URL. '/lay_colors/dark.css');
    wp_enqueue_style( 'be-color1', TW_ASSETS_CSS_URL. '/lay_colors/color1.css');
}
add_action('wp_enqueue_scripts', 'be_enqueue_all_style');


//======================================
// Martin Load Css For WP Login
//======================================
add_action( 'login_enqueue_scripts', 'martin_wp_login_css', 10 );
function martin_wp_login_css()
{
    wp_enqueue_style( 'theme-core', TW_ASSETS_CSS_URL.'/login_style.css', false ); 
}



//=========================================
// Martin Enqueue all JS
//=========================================
function be_enqueue_all_script()
{
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) 
    {
        wp_enqueue_script( 'comment-reply' );
    }
    
    
    wp_enqueue_script( 'be-plugins', TW_ASSETS_JS_URL . '/plugins.js', array( 'jquery' ), '', TRUE );
    wp_enqueue_script( 'maps.googleapis', 'https://maps.googleapis.com/maps/api/js?sensor=true', array( 'be-plugins' ), '', TRUE );
    wp_enqueue_script( 'be-theme', TW_ASSETS_JS_URL . '/theme.js', array( 'maps.googleapis'), '', TRUE );
    wp_enqueue_script( 'be-ajax-contact', TW_ASSETS_JS_URL . '/be_ajax_contact.js', array( 'be-theme' ), '', TRUE );
    wp_localize_script( 'be-ajax-contact', 'be_ajax', array( 'ajaxurl' => admin_url( 'admin-ajax.php' )));
    
    wp_enqueue_script( 'sm-ajax-load-more', TW_ASSETS_JS_URL . '/sm_ajax_load_more.js', array( 'be-theme' ), '', TRUE );
    wp_localize_script( 'sm-ajax-load-more', 'sm_load', array( 'ajaxurl' => admin_url( 'admin-ajax.php' )));    
}
add_action('wp_enqueue_scripts', 'be_enqueue_all_script');


//======================================
// Enque JS For Admin
//======================================

function martin_enquey_admin_js()
{
    
    if(function_exists( 'wp_enqueue_media' ))
    {
        wp_enqueue_media();
    }
    else
    {
        wp_enqueue_style('thickbox');
        wp_enqueue_script('media-upload');
        wp_enqueue_script('thickbox');
    }
    wp_enqueue_script('martin_admin_js', TW_ASSETS_JS_URL.'/themewar_admin_js.js');
}
add_action( 'admin_enqueue_scripts', 'martin_enquey_admin_js' );