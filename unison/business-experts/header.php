<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package BusinessExperts
 * @subpackage BusinessExperts
 * @since BusinessExperts 1.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
   <head>
      <meta charset="<?php bloginfo('charset'); ?>">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="profile" href="http://gmpg.org/xfn/11">
      <?php if (is_singular() && pings_open(get_queried_object())) : ?>
         <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
      <?php endif; ?>

      <?php
      if (function_exists('has_site_icon') && has_site_icon())
      {
         if (function_exists('wp_site_icon'))
         {
            wp_site_icon();
         }
      } else
      {
         $favicon = array('url' => '');
         if (defined('FW'))
         {
            $favicon = fw_get_db_settings_option('favicon', array('url' => ''));
         }
         if (isset($favicon['url']) && $favicon['url'] != ''):
            ?>
            <link rel="icon"  type="image/png" href="<?php echo esc_url($favicon['url']); ?>">
         <?php else: ?>
            <link rel="icon"  type="image/png" href="<?php echo TW_ASSETS_IMAGES_URL . '/favicons.png'; ?>">
         <?php
         endif;
      }
      ?>

      <?php wp_head(); ?>
   </head>

   <body <?php body_class(); ?>>
      <div class="preloader">
            <div id="loading-center-absolute">
                <div id="first_object" class="object"></div>
                <div id="second_object" class="object"></div>
                <div id="third_object" class="object"></div>
                <div id="forth_object" class="object"></div>
            </div>
        </div>
        <div class="colorPresetArea">
            <div class="switchTittle">
                <p class="pull-left">Styles Selector</p>
                <a class="gearBtn pull-right" href="#"><i class="fa fa-cog"></i></a>
                <div class="clearfix"></div>
            </div>
            <div class="switches">
                <div class="singleSwitch light">
                    <p>Choose accent color:</p>
                    <div class="switch mainColors">
                        <a class="color1 active" href="color1"></a>
                        <a class="color2" href="color2"></a>
                        <a class="color3" href="color3"></a>
                        <a class="color4" href="color4"></a>
                        <a class="color5" href="color5"></a>
                        <a class="color6" href="color6"></a>
                        <a class="color7" href="color7"></a>
                        <a class="color8" href="color8"></a>
                        <div class="clearfix"></div>
                    </div>
                </div>
                <div class="singleSwitch">
                    <p>Color scheme:</p>
                    <div class="switch lightDark">
                        <a class="darkColor" href="dark">Dark</a>
                        <a class="lightColor" href="light">Light</a>
                        <div class="clearfix"></div>
                    </div>
                </div>
                <div class="singleSwitch light">
                    <p>Layout style:</p>
                    <div class="switch">
                        <a class="wide layout active" href="wide"><span></span>Wide</a>
                        <a class="boxed layout" href="box"><span></span>Boxed</a>
                        <div class="clearfix"></div>
                    </div>
                </div>
                <div id="patterns" class="singleSwitch">
                    <p>Background pattern:</p>
                    <div class="switch">
                        <a class="pat1" href="pat1"></a>
                        <a class="pat2" href="pat2"></a>
                        <a class="pat3" href="pat3"></a>
                        <a class="pat4" href="pat4"></a>
                        <a class="pat5" href="pat5"></a>
                        <a class="pat6" href="pat6"></a>
                        <a class="pat7" href="pat7"></a>
                        <a class="pat8" href="pat8"></a>
                        <a class="pat9" href="pat9"></a>
                        <a class="pat10" href="pat10"></a>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- =============== Header Section ================= -->
        <header class="HeadeWrap headerTopmenu">
            <div class="logo pull-left">
                <h2><a href="index.html">Business<b>.</b><span>Experts</span></a></h2>
            </div>
            <div class="mobileMenu hidden-lg hidden-md hidden-sm">
                <span></span>
                <span></span>
                <span></span>
            </div>
            <nav class="menus pull-left">
                <ul>
                    <li class="hasChild"><a href="javascript:void('0')">Homepage</a>
                        <ul class="subMenu">
                            <li><a href="index.html">Home One</a></li>
                            <li><a href="index2.html">Home Two</a></li>
                            <li><a href="index3.html">Home Three</a></li>
                            <li><a href="index_box.html">Home Box</a></li>                                                                   
                            <li><a href="index_light.html">Home Light</a></li>                                                                   
                        </ul>
                    </li>
                    <li class="hasChild"><a href="javascript:void('0')">Portfolio</a>
                        <ul class="subMenu">
                            <li><a href="javascript:void('0')">Style One</a>
                                <ul class="subMenu">
                                    <li><a href="folio_one3.html">Three Column</a></li>
                                    <li><a href="folio_one4.html">Four Column</a></li>                                                                   
                                </ul> 
                            </li>
                            <li><a href="javascript:void('0')">Style Two</a>
                                <ul class="subMenu">
                                    <li><a href="folio_two3.html">Three Column</a></li>                                                               
                                    <li><a href="folio_two4.html">Four Column</a></li>                                                               
                                </ul>  
                            </li>
                            <li><a href="javascript:void('0')">Style Three</a>
                                <ul class="subMenu">
                                    <li><a href="folio_three2.html">Two Column</a></li>
                                    <li><a href="folio_three3.html">Three Column</a></li>                                                                   
                                </ul>  
                            </li>
                            <li><a href="javascript:void('0')">Single Page</a>
                                <ul class="subMenu">
                                    <li><a href="item.html">Full width</a></li>                                                                
                                    <li><a href="item_box.html">Box version</a></li>                                                                
                                </ul> 
                            </li>
                        </ul>   
                    </li>
                    <li class="hasChild"><a href="javascript:void('0')">Blog</a>
                        <ul class="subMenu">
                            <li><a href="javascript:void('0')">List View</a>
                                <ul class="subMenu">
                                    <li><a href="blog_sidebar_left.html">Left Sidebar</a></li>
                                    <li><a href="blog_sidebar_right.html">Right Sidebar</a></li>                                                                 
                                </ul>
                            </li>
                            <li><a href="javascript:void('0')">Grid View</a>
                                <ul class="subMenu">
                                    <li><a href="blog_grid2.html">Two Column</a></li>
                                    <li><a href="blog_grid3.html">Three Column</a></li>                                                                 
                                </ul>
                            </li>                                                           
                            <li><a href="javascript:void('0')">Blog Single</a>
                                <ul class="subMenu">
                                    <li><a href="blog_post_left.html">left Sidebar</a></li>
                                    <li><a href="blog_post_right.html">Right Sidebar</a></li>                                                                 
                                </ul>
                            </li>                                                           
                        </ul>
                    </li>
                    <li class="hasChild"><a href="javascript:void('0')">Events</a>
                        <ul class="subMenu">
                            <li><a href="javascript:void('0')">Event list</a>
                                <ul class="subMenu">
                                    <li><a href="event_list_left.html">Left Sidebar</a></li>
                                    <li><a href="event_list_right.html">Right Sidebar</a></li>                                                                 
                                </ul>
                            </li>
                            <li><a href="javascript:void('0')">Single Event</a>
                                <ul class="subMenu">
                                    <li><a href="event_single_left.html">Left Sidebar</a></li>
                                    <li><a href="event_single_right.html">Right Sidebar</a></li>                                                                 
                                </ul>
                            </li>                                                   
                        </ul>
                    </li>
                    <li class="hasChild"><a href="javascript:void('0')">Pages</a>
                        <ul class="subMenu left">
                            <li><a href="about.html">About us</a></li>
                            <li><a href="member.html">Member</a></li>
                            <li><a href="404.html">404 Page</a></li>                                                                   
                        </ul>
                    </li>
                    <li class="hasChild"><a href="javascript:void('0')">Contact</a>
                        <ul class="subMenu">
                            <li><a href="contact_box.html">Boxed Version</a></li>
                            <li><a href="contact_full.html">Full Width</a></li>                                                                   
                        </ul> 
                    </li>                                                                     
                </ul>
            </nav>
            <div class="socialIcon pull-right">
                <a href="#"><i class="icon-social-facebook"></i></a>
                <a href="#"><i class="icon-social-twitter"></i></a>
                <a href="#"><i class="icon-google"></i></a>
            </div>
            <div class="clearfix"></div>
        </header>