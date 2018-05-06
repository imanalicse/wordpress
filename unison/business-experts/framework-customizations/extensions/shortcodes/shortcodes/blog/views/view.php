<?php
if (!defined('FW'))
{
   die('Forbidden');
}
$column = ($atts['column'] != '') ? $atts['column'] : 2;
$column_class = ($column == 2) ? 'BlogCarowsel' : 'BlogCarowselTwo';
$title = ($atts['title'] != '') ? title_style($atts['title']) : '';
$subtitle = ($atts['subtitle'] != '') ? $atts['subtitle'] : '';
$blog_show = ($atts['blog_show'] != '') ? $atts['blog_show'] : 10;
$page_id = ($atts['page_id'] != '') ? $atts['page_id'] : '#';
$page_link = ($page_id != '') ? get_page_link($page_id) : '#';
$posts_args = array(
    'post_type' => 'post',
    'post_status' => 'publish',
    'posts_per_page' => $blog_show
);
$blogs = new WP_Query($posts_args);
if ($blogs->have_posts())
{
   ?>
   <section class="blogArea">
      <div class="container">
         <div class="row">
            <div class="col-sm-4">
               &nbsp;
            </div>
            <div class="col-sm-4 text-center">
               <div class="blogTitle">
                  <span class="line"></span>
                  <h2 class="sectionTitle white">Blog<b>.</b><span>Post</span></h2>
                  <p class="sectionSubtitle">Latest from blog</p>
               </div>
            </div>
            <div class="col-sm-4 blogSlideButton pull-right text-right">
               <a href="#" class="slidePrev">Prev</a>
               <a href="#" class="slideNext">Next</a>
               <a href="<?php echo esc_url($page_link); ?>" class="slideAll">All</a>
            </div>
         </div>
         <div class="row">
            <div class="<?php echo esc_attr($column_class); ?>">
               <?php
               while ($blogs->have_posts())
               {
                  $blogs->the_post();
                  if ($column == 2)
                  {
                     $img = 'http:placehold.it/570x285';
                     if (has_post_thumbnail())
                     {
                        $imgs = wp_get_attachment_image_src(get_post_thumbnail_id(), 'portfolio_galary3');
                        $img = $imgs[0];
                     }
                  } else
                  {
                     $img = 'http:placehold.it/370x285';
                     if (has_post_thumbnail())
                     {
                        $imgs = wp_get_attachment_image_src(get_post_thumbnail_id(), 'blog2');
                        $img = $imgs[0];
                     }
                  }
                  ?>
                  <div class="singleCarowsel">
                     <div class="blogThumb">
                        <img src="<?php echo esc_url($img); ?>" alt="<?php echo get_the_title(); ?>">
                        <p class="blogMeta">
                           <a href="<?php echo get_day_link(get_the_date('Y'), get_the_date('m'), get_the_date('d')) ?>" class="pull-left"><?php echo sm_time_ago(); ?></a>
                           <a href = "#" class = "pull-right"><i class = "icon-heart-outline"></i></a>
                        </p>
                     </div>
                     <div class = "blogPostWrap">
                        <div class = "blogContent">
                           <h3><a href = "<?php echo get_the_permalink(); ?>"><?php echo get_the_title(); ?></a></h3>
                           <?php
                           if (has_excerpt())
                           {
                              the_excerpt();
                           }
                           ?>
                           <a href = "<?php echo get_the_permalink(); ?>">Continue Reading</a>
                        </div>
                        <div class = "blgoAuthor">
                           <div class = "authorImg pull-left">
                              <?php
                              $authorID = get_the_author_meta('ID');
                              $authorsURL = get_author_posts_url($authorID);
                              $av_id = get_the_author_meta('user_av_ID', $authorID);
                              $user_av = get_avatar_url(get_the_author_meta('ID'), 50);
                              if ($av_id != '')
                              {
                                 $u_img = wp_get_attachment_image_src($av_id, 'author');
                                 $user_av = $u_img[0];
                              }
                              ?>
                              <img src = "<?php echo esc_url($user_av); ?>" alt = "<?php echo get_the_author(); ?>">
                           </div>
                           <a href = "<?php echo esc_url($authorsURL); ?>" class = "pull-left"><?php echo get_the_author(); ?></a>
                           <a href = "<?php echo get_the_permalink(); ?>" class = "pull-right"><i class = "icon-message"></i><span><?php comments_number('0', '1', '%'); ?></span></a>
                        </div>
                     </div>
                  </div>
                  <?php
               }
               ?>

            </div>
         </div>
      </div>
   </section>
   <?php
   wp_reset_postdata();
}
