<?php
get_header();
while (have_posts())
{
   the_post();

   $be_subs_title = 'Sign up to know about our latest news';
   $be_subs_sc = '';
   $be_event_single_is_breadcrumb = 1;
   $be_event_single_sidebar = 1;
   $be_event_single_bread_crumb_bg = array();
   $be_event_single_page_title = '';
   $be_event_single_is_comment = 1;
   $event_subtitle = '';
   $event_location = '';
   $event_date = '';
   if (defined('FW'))
   {
      $be_subs_title = fw_get_db_settings_option('be_event_single_subs_title', 'Sign up to know about our latest news');
      $be_subs_sc = fw_get_db_settings_option('be_event_single_subs_sc', '');
      $be_event_single_is_breadcrumb = fw_get_db_settings_option('be_event_single_is_breadcrumb', 1);
      $be_event_single_sidebar = fw_get_db_settings_option('be_event_single_sidebar', 1);
      $be_event_single_bread_crumb_bg = fw_get_db_settings_option('be_event_single_bread_crumb_bg', array());
      $be_event_single_page_title = fw_get_db_settings_option('be_event_single_page_title', '');
      $be_event_single_is_comment = fw_get_db_settings_option('be_event_single_is_comment', 1);
      
      $fw_meta = fw_get_db_post_option(get_the_ID());
      $event_subtitle = $fw_meta['event_subtitle'];
      $event_date = $fw_meta['event_date'];
      $event_location = $fw_meta['event_location'];
   }
   $be_event_single_page_title = title_style($be_event_single_page_title);
   $bgs = '';
   if (is_array($be_event_single_bread_crumb_bg) && isset($be_event_single_bread_crumb_bg['url']) && $be_event_single_bread_crumb_bg['url'] != '')
   {
      $bgs .= 'background: url(' . esc_url($be_event_single_bread_crumb_bg['url']) . ') no-repeat scroll center center';
   }
   $num_comments = get_comments_number(get_the_ID());
   if ($num_comments == 0)
   {
      $com = esc_html__('0 Comment', 'martin');
   } elseif ($num_comments > 1)
   {
      $com = $num_comments . esc_html__(' Comments', 'martin');
   } else
   {
      $com = esc_html__('1 Comment', 'martin');
   }



   if ($be_event_single_is_breadcrumb == 1)
   {
      ?>
      <!-- ========= Page Head Section ========== -->
      <section class="pageHeadSection" style="<?php echo esc_attr($bgs); ?>">
         <div class="container">
            <div class="col-xs-12 text-center">
               <div class="pageHeadInn">
                  <h2 class="pageTitle"><?php echo wp_kses($be_event_single_page_title, array('b' => array(), 'span' => array())) ?></h2>
                  <ul class="breadcrumb">
                     <li><a href="<?php echo esc_url(home_url('/')) ?>"><?php echo esc_html__('Home', 'martin'); ?></a></li>
                     <li><a href="<?php echo esc_url(home_url('/be_event')) ?>"><?php echo esc_html__('Event', 'martin'); ?></a></li>
                     <li><?php echo get_the_title(); ?></li>
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
            <?php if ($be_event_single_sidebar == 1): ?>
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
               <div class="eventListRight">
                  <div class="singleBlog wow fadeInUp" data-wow-delay="300ms" data-wow-duration="700ms">
                     <div class="blogImg">
                        <?php echo get_the_post_thumbnail(get_the_ID(), 'event') ?>
                     </div>
                     <div class="blogDec">
                        <h1><a href="#"><?php echo get_the_title(); ?></a></h1>
                        <div class="admin">
                           <p>by <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')) ?>"><?php echo get_the_author(); ?></a></p>
                        </div>
                        <div class="blogMetas clearfix">
                           <?php if ($event_date != ''): ?>
                              <div class="pull-left">
                                 <i class="icon-calender"></i>
                                 <span><?php echo date('d.m, Y H:i:s',  strtotime($event_date)); ?></span>    
                              </div>
                           <?php endif; ?>
                           <div class="pull-left">
                              <i class="icon-location-outline"></i>
                              <span><?php echo esc_html($event_location) ?></span>    
                           </div>
                           
                           <div class="pull-left">
                              <i class="icon-message"></i>
                              <span><?php echo esc_attr($com); ?></span>    
                           </div>
                        </div>
                        <div class="blogPost blogPostDecip">
                           <?php if ($event_subtitle != ''): ?>
                              <p class="lead"><?php echo esc_html($event_subtitle); ?></p>
                           <?php endif; ?>

                           <?php the_content(); ?>
                        </div>
                     </div>
                  </div>
               </div>
                     
               <div class="commentsWrap">
                     <?php comments_template( '', true ); ?>
                     
               </div>
               
            </div>
            <?php if ($be_event_single_sidebar == 2): ?>
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
