<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
get_header();

global $post;
$postID = $post->ID;

$bread_crumb_bg = '';
$blog_title = '';
$blog_bread_title = '';
$is_breadcrumb = 1;
$posts_sidebar = 2;
$post_share_status = 1;
$is_author = 2;
$is_pagination = 2;
$be_subs_title = 'Sign up to know about our latest news';
$be_subs_sc = '';
$blogPage = get_option('page_for_posts');
if (defined('FW'))
{
   $bg_option = fw_get_db_settings_option('post_bread_crumb_bg', array('url' => ''));
   if (is_array($bg_option) && isset($bg_option['url']) && $bg_option['url'] != '')
   {
      $bread_crumb_bg = 'background-image: url(' . $bg_option['url'] . '); background-repeat: no-repeat; background-size: cover; background-attachment: fixed; background-position: center center; ';
   }

   $blog_title = fw_get_db_settings_option('single_blog_title', 'Blog Post');
   $blog_bread_title = fw_get_db_settings_option('single_bread_title', '');
   $is_breadcrumb = fw_get_db_settings_option('is_single_breadcrumb', 1);
   $posts_sidebar = fw_get_db_settings_option('posts_sidebar', 2);
   $post_share_status = fw_get_db_settings_option('is_single_share', 1);
   $is_author = fw_get_db_settings_option('is_author', 2);
   $is_pagination = fw_get_db_settings_option('is_pagination', 2);
   $be_subs_title = fw_get_db_settings_option('blog_single_subs_title', 'Sign up to know about our latest news');
   $be_subs_sc = fw_get_db_settings_option('blog_single_subs_sc', '');
}
$blog_title = ($blog_title != '') ? $blog_title : get_the_title($postID);
$blog_bread_title = ($blog_bread_title != '') ? $blog_bread_title : $blog_title;
$blog_title = title_style($blog_title);
?>

<!-- ========= Page Head Section ========== -->
<section class="pageHeadSection" style="<?php echo esc_attr($bread_crumb_bg); ?>">
   <div class="container">
      <div class="col-xs-12 text-center">
         <div class="pageHeadInn">
            <?php if ($blog_title != ''): ?>
               <h2 class="pageTitle"><?php echo wp_kses($blog_title, array('b' => array(), 'span' => array())) ?></h2>
            <?php endif; ?>
            <?php if ($is_blog_breadcrumb == 1): ?>
               <ul class="breadcrumb">
                  <li> <a href="<?php echo esc_url(home_url('/')); ?>"><?php echo esc_html__('Home', 'martin'); ?></a></li>
                  <li> <a href="<?php echo esc_url(home_url('/blog')); ?>"><?php echo esc_html__('Blog', 'martin'); ?></a></li>
                  <?php if ($blog_bread_title != ''): ?>
                     <li><?php echo esc_html($blog_bread_title); ?></li>
                  <?php endif; ?>
               </ul>
            <?php endif; ?>
         </div>
      </div>
   </div>
</section>
<!-- ========= Blog Post Section ========== -->
<section class="blogSidebar">
   <div class="container">
      <div class="row">
         <!-- ========= Blog Post sidebar ========== -->
         <?php if ($posts_sidebar == 1): ?>
            <div class="col-md-3 col-sm-4">
               <div class="blogPostSingle">
                  <?php dynamic_sidebar('sidebar-1'); ?>
               </div>
            </div>
         <?php endif; ?>
         <div class="col-md-9 col-sm-8">
            <div class="blogLeftSide">
               <?php
               while (have_posts())
               {
                  the_post();
                  $audio_src = '';
                  $gallery_images = array();
                  $video_src = '';
                  if (defined('FW'))
                  {
                     $audio_src = fw_get_db_post_option(get_the_ID(), 'audio_src', '');
                     $gallery_images = fw_get_db_post_option(get_the_ID(), 'gallery_images', array());
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
                        $cat .= '<a href="' . get_category_link($cats->term_id) . '">' . $cats->name . '</a>';
                        $lp++;
                     }
                  } else
                  {
                     $cat = '<a href="#">Uncategorized</a>';
                  }
                  ?>
                  <div class="singleBlog wow fadeInUp" data-wow-delay="300ms" data-wow-duration="700ms">
                     <div class="blogDec singleblogDec">
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
                     </div>
                     <?php if ($audio_src != ''): ?>
                        <div class="audio_post">
                           <iframe src="<?php echo esc_url($audio_src); ?>"></iframe>
                        </div>
                     <?php elseif ($video_src != ''): ?>
                        <div class="video_post">
                           <iframe src="<?php echo esc_url($video_src); ?>"></iframe>
                        </div>
                     <?php elseif (is_array($gallery_images) && count($gallery_images) > 0): ?>
                        <div class="gallery_post carousel slide" id="post_gall_<?php echo get_the_ID(); ?>" data-ride="carousel">
                           <div class="carousel-inner">
                              <?php
                              $g = 1;
                              foreach ($gallery_images as $gal):
                                 ?>
                                 <div class="item <?php
                                 if ($g == 1)
                                 {
                                    echo 'active';
                                 }
                                 ?>">
                                         <?php
                                         $imgs = wp_get_attachment_image_src($gal['attachment_id'], 'event');
                                         $img = $imgs[0];
                                         ?>
                                    <img src="<?php echo esc_url($img); ?>" alt=""/>
                                 </div>
                                 <?php
                                 $g++;
                              endforeach;
                              ?>
                           </div>
                           <a class="left carousel-control" href="#post_gall_<?php echo get_the_ID(); ?>" role="button" data-slide="prev"><i class="fa fa-caret-left"></i></a>
                           <a class="right carousel-control" href="#post_gall_<?php echo get_the_ID(); ?>" role="button" data-slide="next"><i class="fa fa-caret-right"></i></a>
                        </div>
                     <?php else: ?>
                        <?php if (has_post_thumbnail()): ?>
                           <div class="blogImg">
                              <?php echo get_the_post_thumbnail(get_the_ID(), 'event'); ?>
                           </div>
                        <?php endif; ?>
                     <?php endif; ?>
                     <div class="blogPost blogPostDecip">
                        <?php
                        the_content();
                        ?>
                     </div>
                     <?php if($post_share_status==1):?>
                     <div class="bpaSocial pull-left share_social">
                        <ul >
                           <li><?php echo esc_html__('Share to friends: ', 'bike'); ?></li>
                           <li><a href="http://www.facebook.com/share.php?u=<?php echo get_the_permalink(); ?>&title=<?php echo get_the_title(); ?>"><i class="icon-social-facebook"></i></a></li>
                           <li><a href="http://twitter.com/intent/tweet?status=<?php echo get_the_title(); ?>+<?php echo get_the_permalink(); ?>"><i class="icon-social-twitter"></i></a></li>
                           <li><a href="https://plus.google.com/share?url=<?php echo get_the_permalink(); ?>"><i class="icon-google"></i></a></li>
                           <li><a href="http://pinterest.com/pin/create/bookmarklet/?url=<?php echo get_the_permalink(); ?>&is_video=false&description=<?php echo get_the_title(); ?>"><i class="fa fa-pinterest"></i></a></li>
                           <li><a href="http://www.linkedin.com/shareArticle?mini=true&url=<?php echo get_the_permalink(); ?>&title=<?php echo get_the_title(); ?>">
                              <i class="fa fa-linkedin"></i></a></li>
                        </ul>
                     </div>
                     <?php endif;?>
                     <?php
                     if ($is_pagination == 1)
                     {
                        echo '<div class="admin">';
                        the_post_navigation(array(
                            'next_text' => 'Next<i class="fa fa-angle-double-right"></i>',
                            'prev_text' => '<i class="fa fa-angle-double-left"></i>Prev',
                        ));
                        echo ' </div>';
                     }
                     ?>
                  </div>
                  <?php if ($is_author == 1): ?>
                     <div class="blogPostAuthor clearfix wow fadeInUp" data-wow-delay="350ms" data-wow-duration="700ms">
                        <div class="bpaimg pull-left">
                           <img src="<?php echo esc_url($av); ?>" alt="">
                        </div>
                        <div class="bpaDec pull-left">
                           <?php
                           $userdata = get_userdata($authID);
                           $user_info = '';
                           $des = '';
                           if (count($userdata) > 0)
                           {
                              $user_info = $userdata->first_name . ' ' . $userdata->last_name;
                              $des = $userdata->description;
                           }
                           $user_info = (trim($user_info) != '') ? $user_info : get_the_author();

                           $user_facebook = get_user_meta($authID, 'user_facebook', TRUE);
                           $user_twitter = get_user_meta($authID, 'user_twitter', TRUE);
                           $user_google_plus = get_user_meta($authID, 'user_google_plus', TRUE);
                           $user_dribbble = get_user_meta($authID, 'user_dribbble', TRUE);
                           ?>
                           <h3 class="titleTwo"><a href="<?php echo esc_url($authURL) ?>"><?php echo esc_attr($user_info); ?></a></h3>
                           <?php if ($des != ''): ?>
                              <p><?php echo esc_attr($des); ?></p>
                           <?php endif; ?>
                        </div>
                        <div class="bpaSocial pull-left">
                           <ul>
                              <?php if ($user_facebook != ''): ?>
                                 <li><a href="<?php echo esc_url($user_facebook); ?>"><i class="icon-social-facebook"></i></a></li>
                              <?php endif; ?>
                              <?php if ($user_twitter != ''): ?>
                                 <li><a href="<?php echo esc_url($user_twitter); ?>"><i class="icon-social-twitter"></i></a></li>
                              <?php endif; ?>
                              <?php if ($user_google_plus != ''): ?>
                                 <li><a href="<?php echo esc_url($user_google_plus); ?>"><i class="icon-google"></i></a></li>
                              <?php endif; ?>
                              <?php if ($user_dribbble != ''): ?>
                                 <li><a href="<?php echo esc_url($user_dribbble); ?>"><i class="icon-social-dribbble"></i></a></li>
                              <?php endif; ?>
                           </ul>
                        </div>
                     </div>
                  <?php endif; ?>
                  <!-- ========= Commends ========== -->
                  <div class="commentsWrap">
                     <?php
                     if (comments_open() || get_comments_number())
                     {
                        comments_template();
                     }
                     ?> 
                  </div>
                  <?php
               }
               ?>
            </div>
         </div>
         <?php if ($posts_sidebar == 2): ?>
            <div class="col-md-3 col-sm-4">
               <div class="blogPostSingle">
                  <?php dynamic_sidebar('sidebar-1'); ?>
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
