<?php
/* * *
 * Template Name: Event List Page
 */
get_header();
$be_subs_title = 'Sign up to know about our latest news';
$be_subs_sc = '';
$be_event_is_breadcrumb = 1;
$be_event_sidebar = 1;
$be_event_bread_crumb_bg = array();
$be_event_page_title = '';
$event_show = 12;
if (defined('FW'))
{
   $be_subs_title = fw_get_db_settings_option('be_event_subs_title', 'Sign up to know about our latest news');
   $be_subs_sc = fw_get_db_settings_option('be_event_subs_sc', '');
   $be_event_is_breadcrumb = fw_get_db_settings_option('be_event_is_breadcrumb', 1);
   $be_event_sidebar = fw_get_db_settings_option('be_event_sidebar', 1);
   $be_event_bread_crumb_bg = fw_get_db_settings_option('be_event_bread_crumb_bg', array());
   $be_event_page_title = fw_get_db_settings_option('be_event_page_title', '');
   $event_show = fw_get_db_settings_option('event_show', 12);
}
$be_event_page_title = title_style($be_event_page_title);
$bgs = '';
if (is_array($be_event_bread_crumb_bg) && isset($be_event_bread_crumb_bg['url']) && $be_event_bread_crumb_bg['url'] != '')
{
   $bgs .= 'background: url(' . esc_url($be_event_bread_crumb_bg['url']) . ') no-repeat scroll center center';
}

if ($be_event_is_breadcrumb == 1)
{
   ?>
   <!-- ========= Page Head Section ========== -->
   <section class="pageHeadSection" style="<?php echo esc_attr($bgs); ?>">
      <div class="container">
         <div class="col-xs-12 text-center">
            <div class="pageHeadInn">
               <h2 class="pageTitle"><?php echo wp_kses($be_event_page_title, array('b' => array(), 'span' => array())) ?></h2>
               <ul class="breadcrumb">
                  <li><a href="<?php echo esc_url(home_url('/')) ?>"><?php echo esc_html__('Home', 'martin'); ?></a></li>
                  <li><?php echo esc_html__('Event', 'martin'); ?></li>
               </ul>
            </div>
         </div>
      </div>
   </section>
   <?php
}
?>
<!-- ========= Events List Section ========== -->
<section class="eventsList">
   <div class="container">
      <div class="row">
         <?php if ($be_event_sidebar == 1): ?>
            <div class="col-sm-4">
               <div class="eventListLeft blogRightSide">
                  <?php
                  if (is_active_sidebar('event_sidebar'))
                  {
                     dynamic_sidebar('event_sidebar');
                  }
                  ?>
               </div>
            </div>
         <?php endif; ?>
         <div class="col-sm-8">
            <div class="eventListRight" id="sm_load_div">
               <?php
               $paged = 1;
               if (get_query_var('paged'))
                  $paged = get_query_var('paged');
               if (get_query_var('page'))
                  $paged = get_query_var('page');
               $event_args = array(
                   'post_type' => 'be_event',
                   'post_status' => 'publish',
                   'posts_per_page' => $event_show,
                   'paged' => $paged,
               );
               $events = new WP_Query($event_args);
//   echo "st$portfolio_show $styles $folio->post_count";
               if ($events->have_posts())
               {
                  while ($events->have_posts())
                  {
                     $events->the_post();
                     $event_subtitle = '';
                     $event_location = '';
                     $event_date = '';
                     if (defined('FW'))
                     {
                        $fw_meta = fw_get_db_post_option(get_the_ID());
                        $event_date = $fw_meta['event_date'];
                        $event_location = $fw_meta['event_location'];
                     }
                     ?>

                     <div class="singleEvent wow fadeInUp" data-wow-delay="300ms" data-wow-duration="700ms">
                        <div class="eventimg pull-left">
                           <?php echo get_the_post_thumbnail(get_the_ID(), 'team') ?>
                        </div>
                        <div class="eventDec pull-right">
                           <h2><a href="<?php echo get_the_permalink(); ?>"><?php echo get_the_title(); ?></a></h2>
                           <?php
                           if (has_excerpt())
                           {
                              the_excerpt();
                           }
                           ?>
                           <div class="eventmeta">
                              <div class="blogMetas clearfix">
                                 <?php if ($event_date != ''): ?>
                                    <div class="pull-left">
                                       <i class="icon-calender"></i>
                                       <span><?php echo date('d.m, Y H:i:s', strtotime($event_date)); ?></span>    
                                    </div>
                                 <?php endif; ?>
                                 <?php if ($event_location != ''): ?>
                                    <div class="pull-left">
                                       <i class="icon-location-outline"></i>
                                       <span><?php echo esc_html($event_location) ?></span>    
                                    </div>
                                 <?php endif; ?>
                              </div>
                           </div>

                        </div>
                     </div>
                     <?php
                  }
               }
               ?>
            </div>
            <?php
            if (function_exists('sm_load_more_button_event'))
            {
               $argument = base64_encode(serialize($event_args));
               echo sm_load_more_button_event($argument, $events->max_num_pages, $paged + 1);
            }
            ?>
         </div>
         <?php if ($be_event_sidebar == 2): ?>
            <div class="col-sm-4">
               <div class="eventListLeft blogRightSide">
                  <?php
                  if (is_active_sidebar('event_sidebar'))
                  {
                     dynamic_sidebar('event_sidebar');
                  }
                  ?>
               </div>
            </div>
         <?php endif; ?>

      </div>
   </div>
</section>

<?php
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

