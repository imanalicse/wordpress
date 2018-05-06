<?php
/*
 * Template Name: Full Width
 * */

get_header();

global $post;
$postID = $post->ID;

$page_title = '';
$page_is_breadcrumb = 1;
$page_bread_title = '';
$page_crumb_bg = '';
if (defined('FW'))
{
   $bg_option = fw_get_db_post_option($postID, 'page_crumb_bg', array('url' => ''));
   if (is_array($bg_option) && isset($bg_option['url']) && $bg_option['url'] != '')
   {
      $page_crumb_bg = 'background: url(' . $bg_option['url'] . ') no-repeat scroll center center;  background-position: center center; ';
   }
   $page_title = fw_get_db_post_option($postID, 'page_title', '');
   $page_is_breadcrumb = fw_get_db_post_option($postID, 'page_is_breadcrumb', 1);
   $page_bread_title = fw_get_db_post_option($postID, 'page_bread_title', '');
}

$title = get_the_title($postID);
$bread = get_the_title($postID);
if ($page_title != '')
{
   $title = $page_title;
}
if ($page_bread_title != '')
{
   $bread = $page_bread_title;
}
$title = title_style($title);
?>
<!-- ========= Page Head Section ========== -->
<?php if ($page_is_breadcrumb == 1): ?>
   <section class="pageHeadSection"  style="<?php echo esc_attr($page_crumb_bg); ?>">
      <div class="container">
         <div class="col-xs-12 text-center">
            <div class="pageHeadInn">
               <h2 class="pageTitle">About<b>.</b><span>Us</span></h2>
               <ul class="breadcrumb">
                  <li><a href="<?php echo esc_url(home_url('/')) ?>"><?php echo esc_html__('Home', 'martin'); ?></a></li>
                  <li><?php echo esc_html($bread); ?></li>
               </ul>
            </div>
         </div>
      </div>
   </section>
<?php endif; ?>
<?php
while (have_posts())
{
   the_post();
   the_content();
}
?>
<?php
get_footer();
