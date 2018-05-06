<?php
/*
 * Template Name: portfolio-one-three-column
 * */
get_header();
global $post;
$postID = $post->ID;
$be_subs_title = 'Sign up to know about our latest news';
$be_subs_sc = '';
$is_breadcrumb = 1;
$bread_crumb_bg = array();
$page_title = '';
$page_bread_title='';
$portfolio_show = 12;
if (defined('FW'))
{
   $be_subs_title = fw_get_db_post_option($postID, 'page_subs_title', 'Sign up to know about our latest news');
   $be_subs_sc = fw_get_db_post_option($postID, 'page_subs_sc', '');
   $is_breadcrumb = fw_get_db_post_option($postID, 'page_is_breadcrumb', 1);
   $bread_crumb_bg = fw_get_db_post_option($postID, 'page_crumb_bg', array());
   $page_title = fw_get_db_post_option($postID, 'page_title', '');
   $page_bread_title = fw_get_db_post_option($postID, 'page_bread_title', '');
   $portfolio_show = fw_get_db_settings_option('portfolio_item_number',$portfolio_show);
}
$page_title=($page_title!='')? $page_title : get_the_title($postID);
$page_bread_title=($page_bread_title!='')? $page_bread_title : $page_title;
$page_title = title_style($page_title);
$bgs = '';
if (is_array($bread_crumb_bg) && isset($bread_crumb_bg['url']) && $bread_crumb_bg['url'] != '')
{
   $bgs .= 'background: url(' . esc_url($bread_crumb_bg['url']) . ') no-repeat scroll center center';
}

if ($is_breadcrumb == 1)
{
   ?>
   <!-- ========= Page Head Section ========== -->
   <section class="pageHeadSection" style="<?php echo esc_attr($bgs); ?>">
      <div class="container">
         <div class="col-xs-12 text-center">
            <div class="pageHeadInn">
               <h2 class="pageTitle"><?php echo wp_kses($page_title, array('b' => array(), 'span' => array())) ?></h2>
               <ul class="breadcrumb">
                  <li><a href="<?php echo esc_url(home_url('/')) ?>"><?php echo esc_html__('Home', 'martin'); ?></a></li>
                  <li><a href="<?php echo esc_url(home_url('/portfolio')) ?>"><?php echo esc_html__('Portfolio', 'martin'); ?></a></li>
                  <li><?php echo esc_html($page_bread_title); ?></li>
               </ul>
            </div>
         </div>
      </div>
   </section>
   <?php
}


$paged = 1;
if (get_query_var('paged'))
   $paged = get_query_var('paged');
if (get_query_var('page'))
   $paged = get_query_var('page');
$portfolio = array(
    'post_type' => 'folio',
    'post_status' => 'publish',
    'posts_per_page' => $portfolio_show,
    'paged' => $paged,
);
$folio = new WP_Query($portfolio);
//   echo "st$portfolio_show $styles $folio->post_count";
if ($folio->have_posts())
{
   ?>
   <div class="fullGellaryArea">
      <div class="fullGellaryInner ThreeCol">
         <?php
         while ($folio->have_posts())
         {
            $folio->the_post();
            if (has_post_thumbnail())
            {
               $img = wp_get_attachment_image_url(get_post_thumbnail_id(), 'portfolio_galary');
            } else
            {
               $img = 'http://plcehold.it/480x300';
            }
            ?>
            <div class="galleryImg">
               <img src="<?php echo esc_url($img); ?>" alt="<?php echo get_the_title(); ?>">
               <div class="galleryHover">
                  <a class="popup" data-rel="prettyPhoto" href="<?php echo esc_url($img); ?>"><i class="icon-zoom-outline"></i></a>
                  <a class="detailsLink" href="<?php echo get_the_permalink(); ?>"><i class="icon-location-outline"></i></a>
               </div>
            </div>
            <?php
         }
         ?>

         <div class="clearfix"></div>
      </div>
   </div>
   <!-- ========= Pagination Section ========== -->
   <div class="paginationSection">
      <div class="container text-center">
         <?php
         if (function_exists('sm_custom_pagination'))
         {
            sm_custom_pagination($folio->max_num_pages, "", $paged);
         }
         ?>
      </div>
   </div>
   <?php
   wp_reset_postdata();
}
if ($be_subs_sc != '')
{
   ?>
   <!-- ========= Subscribe Section ========== -->
   <section class="subscribeArea" style="padding: 40px 0 35px;">
      <div class="container">
         <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
               <div class="row">
                  <div class="col-sm-6 col-xs-12 noPaddingRight">
                     <p><?php echo esc_html($be_subs_title); ?></p>
                  </div>
                  <div class="col-sm-6 col-xs-12">
                     <div class="subscribeForm">
                        <?php
                        echo do_shortcode($be_subs_sc);
                        ?>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
   <?php
}
get_footer();

