<?php
/**
 * Custom template tags for Slight Business
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Martin
 * @subpackage Martin
 * @since Martin 1.0
 */

if (!function_exists('martin_entry_meta')) :

   function martin_entry_meta()
   {
      if (is_sticky() && is_home() && !is_paged())
      {
         printf('<span class="sticky-post">%s</span>', esc_html__('Featured', 'martin'));
      }

      $format = get_post_format();
      if (current_theme_supports('post-formats', $format))
      {
         printf('<span class="entry-format">%1$s<a href="%2$s">%3$s</a></span>', sprintf('<span class="screen-reader-text">%s </span>', _x('Format', 'Used before post format.', 'martin')), esc_url(get_post_format_link($format)), get_post_format_string($format)
         );
      }

      if (in_array(get_post_type(), array('post', 'attachment')))
      {
         $time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';

         if (get_the_time('U') !== get_the_modified_time('U'))
         {
            $time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
         }

         $time_string = sprintf($time_string, esc_attr(get_the_date('c')), get_the_date(), esc_attr(get_the_modified_date('c')), get_the_modified_date()
         );

         printf('<span class="posted-on"><span class="screen-reader-text">%1$s </span><a href="%2$s" rel="bookmark">%3$s</a></span>', _x('Posted on', 'Used before publish date.', 'martin'), esc_url(get_permalink()), $time_string
         );
      }

      if ('post' == get_post_type())
      {
         if (is_singular() || is_multi_author())
         {
            printf('<span class="byline"><span class="author vcard"><span class="screen-reader-text">%1$s </span><a class="url fn n" href="%2$s">%3$s</a></span></span>', _x('Author', 'Used before post author name.', 'martin'), esc_url(get_author_posts_url(get_the_author_meta('ID'))), get_the_author()
            );
         }

         $categories_list = get_the_category_list(_x(', ', 'Used between list items, there is a space after the comma.', 'martin'));
         if ($categories_list && martin_categorized_blog())
         {
            printf('<span class="cat-links"><span class="screen-reader-text">%1$s </span>%2$s</span>', _x('Categories', 'Used before category names.', 'martin'), $categories_list
            );
         }

         $tags_list = get_the_tag_list('', _x(', ', 'Used between list items, there is a space after the comma.', 'martin'));
         if ($tags_list)
         {
            printf('<span class="tags-links"><span class="screen-reader-text">%1$s </span>%2$s</span>', _x('Tags', 'Used before tag names.', 'martin'), $tags_list
            );
         }
      }

      if (is_attachment() && wp_attachment_is_image())
      {
         // Retrieve attachment metadata.
         $metadata = wp_get_attachment_metadata();

         printf('<span class="full-size-link"><span class="screen-reader-text">%1$s </span><a href="%2$s">%3$s &times; %4$s</a></span>', _x('Full size', 'Used before full size attachment link.', 'martin'), esc_url(wp_get_attachment_url()), $metadata['width'], $metadata['height']
         );
      }

      if (!is_single() && !post_password_required() && ( comments_open() || get_comments_number() ))
      {
         echo '<span class="comments-link">';
         comments_popup_link(esc_html__('Leave a comment', 'martin'), esc_html__('1 Comment', 'martin'), esc_html__('% Comments', 'martin'));
         echo '</span>';
      }
   }

endif;


if (!function_exists('themeWar_comment_nav')) :

   function themeWar_comment_nav()
   {
      // Are there comments to navigate through?
      if (get_comment_pages_count() > 1 && get_option('page_comments')) :
         ?>
         <nav class="navigation comment-navigation" role="navigation">
            <h2 class="screen-reader-text"><?php esc_html_e('Comment navigation', 'martin'); ?></h2>
            <div class="nav-links">
               <?php
               if ($prev_link = get_previous_comments_link(esc_html__('Older Comments', 'martin'))) :
                  printf('<div class="nav-previous">%s</div>', $prev_link);
               endif;

               if ($next_link = get_next_comments_link(esc_html__('Newer Comments', 'martin'))) :
                  printf('<div class="nav-next">%s</div>', $next_link);
               endif;
               ?>
            </div><!-- .nav-links -->
         </nav><!-- .comment-navigation -->
         <?php
      endif;
   }

endif;

function martin_categorized_blog()
{
   if (false === ( $all_the_cool_cats = get_transient('twentyfifteen_categories') ))
   {
      // Create an array of all the categories that are attached to posts.
      $all_the_cool_cats = get_categories(array(
          'fields' => 'ids',
          'hide_empty' => 1,
          // We only need to know if there is more than one category.
          'number' => 2,
      ));

      // Count the number of categories that are attached to the posts.
      $all_the_cool_cats = count($all_the_cool_cats);

      set_transient('twentyfifteen_categories', $all_the_cool_cats);
   }

   if ($all_the_cool_cats > 1)
   {
      // This blog has more than 1 category so martin_categorized_blog should return true.
      return true;
   } else
   {
      // This blog has only 1 category so martin_categorized_blog should return false.
      return false;
   }
}

function martin_category_transient_flusher()
{
   // Like, beat it. Dig?
   delete_transient('twentyfifteen_categories');
}

add_action('edit_category', 'martin_category_transient_flusher');
add_action('save_post', 'martin_category_transient_flusher');




if (!function_exists('themeWar_excerpt_more') && !is_admin()) :

   function sapona_themeWar_excerpt_more($more)
   {
      $link = sprintf('<a href="%1$s" class="more-link">%2$s</a>', esc_url(get_permalink(get_the_ID())),
              /* translators: %s: Name of current post */ sprintf(__('Continue reading %s', 'martin'), '<span class="screen-reader-text">' . get_the_title(get_the_ID()) . '</span>')
      );
      return ' &hellip; ' . $link;
   }

   add_filter('excerpt_more', 'sapona_themeWar_excerpt_more');
endif;
