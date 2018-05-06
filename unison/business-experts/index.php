<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Martin
 * @subpackage Martin
 * @since Martin 1.0
 */
get_header();

$bread_crumb_bg = '';
$blog_title = '';
$is_blog_breadcrumb = 2;
$blog_bread_title = '';
$style = 1;
$blog_sidebar = 2;
$blog_columns = 2;
$be_subs_title = 'Sign up to know about our latest news';
$be_subs_sc = '';
if (defined('FW'))
{
   $bg_option = fw_get_db_settings_option('bread_crumb_bg', array('url' => ''));
   if (is_array($bg_option) && isset($bg_option['url']) && $bg_option['url'] != '')
   {
      $bread_crumb_bg = 'background-image: url(' . $bg_option['url'] . '); background-repeat: no-repeat; background-size: cover; background-attachment: fixed; background-position: center center; ';
   }

   $blog_title = fw_get_db_settings_option('blog_title', 'Blog Updates');
   $is_blog_breadcrumb = fw_get_db_settings_option('is_blog_breadcrumb', 2);
   $blog_bread_title = fw_get_db_settings_option('blog_bread_title', '');
   $style = fw_get_db_settings_option('blog_style', 1);
   $blog_sidebar = fw_get_db_settings_option('blog_sidebar', 2);
   $blog_columns = fw_get_db_settings_option('blog_columns', 2);
   $be_subs_title = fw_get_db_settings_option('blog_subs_title', 'Sign up to know about our latest news');
   $be_subs_sc = fw_get_db_settings_option('blog_subs_sc', '');
}
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
                  <?php if ($blog_bread_title != ''): ?>
                     <li><?php echo esc_html($blog_bread_title); ?></li>
                  <?php endif; ?>
               </ul>
            <?php endif; ?>
         </div>
      </div>
   </div>
</section>

<?php if ($style == 2): ?>
   <section class="blogGridSection">
      <div class="container">
         <div class="row">

            <?php
            while (have_posts())
            {
               if ($blog_columns == 3):
                  ?>
                  <div class="col-sm-4">
                  <?php else: ?>
                     <div class="col-sm-6">
                     <?php
                     endif;
                     the_post();
                     get_template_part('template-parts/content', get_post_format());
                     ?>
                  </div>
                  <?php
               }
               ?>
               <div class="col-lg-12">
                  <div class="paginationSection">
                     <div class="container text-center">
                        <?php
                        if (function_exists('sm_custom_pagination'))
                        {
                           sm_custom_pagination();
                        }
                        ?>
                     </div>
                  </div>
               </div>
            </div>
         </div>
   </section>
<?php else: ?>
   <!-- ========= Blog Section ========== -->
   <section class="blogSidebar">
      <div class="container">
         <div class="row">
            <?php if ($blog_sidebar == 1): ?>
               <div class="col-sm-4 col-md-3">
                  <div class="blogRightSide">
                     <?php dynamic_sidebar('sidebar-1'); ?>
                  </div>
               </div>
            <?php endif; ?>
            <?php if ($blog_sidebar == 3): ?>
               <div class="col-md-12">
               <?php else: ?>
                  <div class="col-md-9 col-sm-8">
                  <?php endif; ?>
                  <div class="blogLeftSide">
                     <?php
                     while (have_posts())
                     {
                        the_post();
                        get_template_part('template-parts/content', get_post_format());
                     }
                     ?>
                  </div>
               </div>
               <?php if ($blog_sidebar == 2): ?>
                  <div class="col-sm-4 col-md-3">
                     <div class="blogRightSide">
                        <?php dynamic_sidebar('sidebar-1'); ?>
                     </div>
                  </div>
               <?php endif; ?>
               <div class="col-lg-12">
                  <div class="paginationSection">
                     <div class="container text-center">
                        <?php
                        if (function_exists('sm_custom_pagination'))
                        {
                           sm_custom_pagination();
                        }
                        ?>
                     </div>
                  </div>
               </div>
            </div>
         </div>
   </section>
<?php
endif;
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
