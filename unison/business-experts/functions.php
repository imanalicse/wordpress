<?php
/**
 * ThemeWar Wordpress Theme Functions
 * ThemeWar Functions only works in WordPress.
 **/

//==================================
// Custom template tags for this theme.
//==================================
require get_template_directory() . '/inc/template-tags.php';

//============================================
// Load Language
//============================================

load_theme_textdomain('be', get_template_directory() . '/languages');

// ============================================================================================
// Enables theme custom post types, widget, Shortcodes
// --------------------------------------------------------------------------------------------
$aitThemeWidgets = array('flickr', 'social', 'recentpost', 'aboutus');

/*
 * Load THEME WAR Bootstrap
 * 
 * 
 *  */
require get_template_directory() . '/framework-customizations/tw-bootstrap.php';
require get_template_directory() . '/inc/sm.php';


//============================================
// Widget Settings
//============================================

function martin_widgets_init() 
{
        martinRegisterWidgetAreas(array(
		'sidebar-1'      => array('name' => esc_html__('Blog Sidebar', 'martin'), 'description'   => esc_html__( 'Blog sidebar, Only for blog pages.', 'martin' )),
		'sidebar-2'      => array('name' => esc_html__('Page Sidebar', 'martin'), 'description'   => esc_html__( 'Page sidebar, Only for Pages.', 'martin' )),
		'event_sidebar'      => array('name' => esc_html__('Event Sidebar', 'martin'), 'description'   => esc_html__( 'Event Sidebar only for Footer Style One.', 'martin' )),
		
	), array(
		'before_widget' => '<aside id="%1$s" class="widget %2$s wow fadeInUp" data-wow-duration="700ms" data-wow-delay="300ms">',
		'after_widget'  => "</aside>",
		'before_title'  => '<h3 class="widgetTitle">',
		'after_title'   => '</h3>',
	));
	
}
add_action( 'widgets_init', 'martin_widgets_init' );



//=======================================
// Set View Counter
//=======================================
function martin_PostViews($postID) 
{
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count=='')
    {
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }
    else
    {
        $count += 1;
        update_post_meta($postID, $count_key, $count);
    }
}

//============================================
// Action After Theme Setup
//============================================

function martin_themeSetup()
{
    add_editor_style( array( 'framework-customizations/Assets/css/editor-style.css', martin_font_url() ) );
    add_theme_support( 'automatic-feed-links' );
    add_theme_support('post-thumbnails');
    set_post_thumbnail_size( 755, 420, true );
    add_image_size('portfolio_carousel', 910, 521, true);
    add_image_size('portfolio_galary', 480, 480, true);
    add_image_size('portfolio_galary2', 480, 300, true);
    add_image_size('portfolio_galary3', 570, 285, true);
    add_image_size('author', 170, 170, true);
    add_image_size('team', 270, 270, true);
    add_image_size('team2', 930, 720, true);
    add_image_size('blog2', 370, 285, true);
    add_image_size('author', 50, 50, true);
    add_image_size('event', 770, 480, true);
    
    
    add_theme_support( 'title-tag' );
    
    register_nav_menu('primary-menu', esc_html__('Primary Menu', 'martin'));
    register_nav_menu('footer-menu', esc_html__('Primary Footer Menu', 'martin'));
    register_nav_menu('footer-menu2', esc_html__('Secondary Footer Menu', 'martin'));
    
    add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', ) );
    
    add_theme_support( 'post-formats', array('audio', 'video', 'gallery') );
}

add_action('after_setup_theme', 'martin_themeSetup');

//=========================================
// SET Content Width
//=========================================

if(!isset($content_width)) $content_width = 1170;

//=========================================
// Custome Post Class
//=========================================
function martin_post_classes( $classes ) 
{
    if ( ! post_password_required() && has_post_thumbnail() ) 
    {
        $classes[] = 'has-post-thumbnail';
    }
    return $classes;
}
add_filter( 'post_class', 'martin_post_classes' );


//=================================================
// Check Plugin Activity
//=================================================

function martin_is_plugin_active( $plugin ) 
{
    return in_array( $plugin, (array) get_option( 'active_plugins', array() ) );
}


//=======================================
// Alive Category & Archive Page title Change
//=======================================
add_filter( 'get_the_archive_title', 'martin_change_category_title_output');
function martin_change_category_title_output ( $title ) 
{

    if( is_category() ) {

        $title = single_cat_title( '', false );

    }

    return $title;

}

//=======================================
// Martin Comment Listing
//=======================================

function martin_comment_listing($comment, $args, $depth)
{
    $GLOBALS['comment'] = $comment;
    $avater = get_avatar_url($comment->comment_author_email);
    if($comment->user_id != '' && $comment->user_id != 0)
    {
        $userId = $comment->user_id;
        $avID = get_the_author_meta('user_av_ID', $userId);
        if($avID != '')
        {
            $thumb = wp_get_attachment_image_src( $avID, 'martin_testi1' );
            $userAvater = $thumb[0];
        }
        else
        {
            $userAvater = $avater;
        }
        $userUrl = get_author_posts_url($comment->user_id);
    }
    else
    {
        $userAvater = $avater;
        $userUrl = '#';
    }
    $upvote = (get_comment_meta( $comment->comment_ID, 'upvotes', true ) != '') ? get_comment_meta( $comment->comment_ID, 'upvotes', true ) : 0;
     ?>
    <li id="comment-<?php echo esc_attr($comment->comment_ID); ?>">
        <div class="singleComm">
           <img class="authImg" src="<?php echo esc_attr($userAvater); ?>" alt="">
            <div class="comHead">
                <h3 class="pull-left">
                    <a href="<?php echo esc_url($userUrl); ?>"><?php echo esc_html($comment->comment_author); ?></a>
                    <span>|</span>
                    <a class="comDate" href="#"><?php echo get_comment_time('M d, Y'); ?></a>
                </h3>
               <h3 class="pull-right">
                <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
               </h3>
                <div class="clearfix"></div>
            </div>
            <div class="comDec">
                <p>
                    <?php comment_text(); ?>
                </p>
                <div class="clearfix"></div>
            </div>
        </div>
     <?php
}

function be_move_comment_field_to_bottom($fields)
{
   $comment_field = $fields['comment'];
   unset($fields['comment']);
   $fields['comment'] = $comment_field;
   return $fields;
}

add_filter('comment_form_fields', 'be_move_comment_field_to_bottom');


/*=================================
// Martin Preloader
======================================= */
function martin_preloader_generator()
{
    $loader_status = 1;
    $loaders = 1;
    if(defined('FW'))
    {
        $loader_status = fw_get_db_settings_option('loader_status', 1);
        $loaders = fw_get_db_settings_option('loaders', 1);
    }
    
    /* Checking Preloader Status */
    if($loader_status == 1):
        echo '<div class="preloader">';
        
        switch($loaders)
        {
            case 1:
                ?>
                <div class="la-ball-circus la-2x">
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                </div>
                <?php
                break;
            case 2:
                ?>
                <div class="la-ball-climbing-dot la-2x">
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                </div>
                <?php
                break;
            case 3:
                ?>
                <div class="la-ball-clip-rotate la-2x">
                    <div></div>
                </div>
                <?php
                break;
            case 4:
                ?>
                <div class="la-ball-clip-rotate-multiple la-2x">
                    <div></div>
                    <div></div>
                </div>
                <?php
                break;
            case 5:
                ?>
                <div class="la-ball-clip-rotate-pulse la-2x">
                    <div></div>
                    <div></div>
                </div>
                <?php
                break;
            case 6:
                ?>
                <div class="la-ball-newton-cradle la-2x">
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                </div>
                <?php
                break;
            case 7:
                ?>
                <div class="la-ball-rotate la-2x">
                    <div></div>
                </div>
                <?php
                break;
            case 8:
                ?>
                <div class="la-ball-scale-multiple la-2x">
                    <div></div>
                    <div></div>
                    <div></div>
                </div>
                <?php
                break;
            case 9:
                ?>
                <div class="la-ball-scale-ripple-multiple la-2x">
                    <div></div>
                    <div></div>
                    <div></div>
                </div>
                <?php
                break;
            case 10:
                ?>
                <div class="la-ball-zig-zag la-2x">
                    <div></div>
                    <div></div>
                </div>
                <?php
                break;
            case 11:
                ?>
                <div class="la-fire la-2x">
                    <div></div>
                    <div></div>
                    <div></div>
                </div>
                <?php
                break;
            case 12:
                ?>
                <div class="la-line-scale la-2x">
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                </div>
                <?php
                break;
            case 13:
                ?>
                <div class="la-line-scale-party la-2x">
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                </div>
                <?php
                break;
            case 14:
                ?>
                <div class="la-line-scale-pulse-out la-2x">
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                </div>
                <?php
                break;
            case 15:
                ?>
                <div class="la-line-spin-clockwise-fade-rotating la-2x">
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                </div>
                <?php
                break;
            case 16:
                ?>
                <div class="la-square-jelly-box la-2x">
                    <div></div>
                    <div></div>
                </div>
                <?php
                break;
            case 17:
                ?>
                <div class="la-square-spin la-2x">
                    <div></div>
                </div>
                <?php
                break;
            case 18:
                ?>
                <div class="loader-inner sk-folding-cube">
                    <div class="sk-cube1 sk-cube"></div>
                    <div class="sk-cube2 sk-cube"></div>
                    <div class="sk-cube4 sk-cube"></div>
                    <div class="sk-cube3 sk-cube"></div>
                </div>
                <?php
                break;
            case 19:
                ?>
                <div class="la-pacman la-2x">
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                </div>
                <?php
                break;
            case 20:
                ?>
                <div class="la-timer la-2x">
                    <div></div>
                </div>
                <?php
                break;
            default:
                ?>
                <div class="la-square-spin la-2x">
                    <div></div>
                </div>
                <?php
                break;
        }
    
        echo '</div>';
    endif;
}

/*=================================
// Human Readable Time Formate
======================================= */
function martin_human_time_reader($time)
{
   $periods = array("s", "m", "h", "d", "w", "m", "y", "decade");
   $lengths = array("60","60","24","7","4.35","12","10");

   $now = time();
       $difference     = $now - $time;
       $tense         = "ago";
   for($j = 0; $difference >= $lengths[$j] && $j < count($lengths)-1; $j++)
   {
       $difference /= $lengths[$j];
   }
   $difference = round($difference);
   return $difference.$periods[$j];
}

function sm_time_ago( $type = 'post' ) {
    $d = 'comment' == $type ? 'get_comment_time' : 'get_post_time';
    return human_time_diff($d('U'), current_time('timestamp')) . " " . __('ago');

}
/*=================================
// Contact Ajax Mail
======================================= */
add_action( 'wp_ajax_contact_mail', 'be_ajax_contact_mail' );
add_action( 'wp_ajax_nopriv_contact_mail', 'be_ajax_contact_mail' );

require get_template_directory() . '/inc/mail.php';


/*=====================================
// Margin Comment Opener
======================================= */
add_filter( 'default_hidden_meta_boxes', 'martin_enable_comment_metabox_option', 10, 1 );
function martin_enable_comment_metabox_option( $hidden )
{
    $screen = get_current_screen();
    foreach ( $hidden as $i => $metabox )
    {
        if ( 'commentstatusdiv' == $metabox )
        {
            unset ( $hidden[$i] );
        }
    }
    return $hidden;
}
