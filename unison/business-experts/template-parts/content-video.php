<?php
/**
 * The template part for displaying content
 *
 * @package Martin
 * @subpackage Martin
 * @since Martin  1.0
 */
$style = 1;
$video_src = '';
if (defined('FW'))
{
   $style = fw_get_db_settings_option('blog_style', 1);
   $video_src = fw_get_db_post_option(get_the_ID(), 'video_src', '');
}

$authID = get_the_author_meta('ID');
$authURL = get_author_posts_url($authID);
$avater_src = get_the_author_meta('user_avatar', $authID);
$av = ($avater_src != '') ? $avater_src : get_avatar_url($authID);

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

$categories = wp_get_object_terms(get_the_ID(), 'category');
$cat = '';
if (is_array($categories))
{
   $lastCat = count($categories);
   $lp = 1;
   foreach ($categories as $cats)
   {
      if ($lp > 1)
      {
         $cat .= ', ';
      }
      $cat = '<a href="' . get_category_link($cats->term_id) . '">' . $cats->name . '</a>';
      $lp++;
   }
} else
{
   $cat = '<a href="#">Uncategorized</a>';
}
?>
<?php if ($style == 2): ?>

   <div class="singleBlogGride wow fadeInUp" data-wow-delay="300ms" data-wow-duration="700ms">
      <?php if ($video_src != ''): ?>
         <div class="video_post">
            <iframe src="<?php echo esc_url($video_src); ?>"></iframe>
         </div>
      <?php else: ?>
         <?php if (has_post_thumbnail()): ?>
            <div class="blogThumb">
               <?php echo get_the_post_thumbnail(get_the_ID(), 'blog2'); ?>
               <p class="blogMeta">
                  <a href="<?php echo get_day_link(get_the_date('Y'), get_the_date('m'), get_the_date('d')) ?>" class="pull-left"><?php echo sm_time_ago(); ?></a>
                  <a href="<?php echo get_the_permalink(); ?>" class="pull-right"><i class="icon-heart-outline"></i></a>
               </p>
            </div>
         <?php endif; ?>
      <?php endif; ?>

      <div class="blogPostWrap">
         <div class="blogContent">
            <h3><a href="<?php echo get_the_permalink(); ?>"><?php echo get_the_title(); ?></a></h3>
            <?php
            if (has_excerpt())
            {
               the_excerpt();
            }
            ?>
         </div>
         <div class="blgoAuthor">
            <div class="authorImg pull-left">
               <img src="<?php echo esc_url($av); ?>" alt="">
            </div>
            <a href="<?php echo esc_url($authURL); ?>" class="pull-left"><?php echo get_the_author(); ?></a>
            <a href="<?php echo get_the_permalink(); ?>" class="pull-right"><i class="icon-message"></i><span><?php echo esc_attr($num_comments); ?></span></a>
         </div>
      </div>
   </div>
<?php else: ?>
   <div class="singleBlog wow fadeInUp" data-wow-delay="300ms" data-wow-duration="700ms">
      <div class="blogDec">
         <h1><a href="<?php echo get_the_permalink(); ?>"><?php echo get_the_title(); ?></a></h1>
         <div class="admin">
            <p>by <a href="<?php echo esc_attr($authURL); ?>"><?php echo get_the_author(); ?></a></p>
         </div>
         <div class="blogMetas clearfix">
            <div class="pull-left">
               <i class="icon-calender"></i>
               <span><?php echo get_the_date('d.m, Y'); ?></span>    
            </div>
            <div class="pull-left">
               <i class="icon-pen2"></i>
               <span>Posted <?php echo wp_kses($cat, array('a' => array('href' => array()))) ?></span>    
            </div>
            <div class="pull-left">
               <i class="icon-message"></i>
               <span><?php echo esc_attr($com); ?></span>    
            </div>
         </div>
         <div class="blogContents">
            <?php
            if (has_excerpt())
            {
               the_excerpt();
            }
            ?>
         </div>
      </div>
      <?php if ($video_src != ''): ?>
         <div class="video_post">
            <iframe src="<?php echo esc_url($video_src); ?>"></iframe>
         </div>
      <?php else: ?>
         <?php if (has_post_thumbnail()): ?>
            <div class="blogImg">
               <?php echo get_the_post_thumbnail(get_the_ID(), 'event'); ?>
            </div>
         <?php endif; ?>
      <?php endif; ?>
   </div>
<?php endif; ?>
