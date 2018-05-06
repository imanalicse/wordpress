<?php

if (!function_exists('sm_custom_pagination')) :

   function sm_custom_pagination($numpages = '', $pagerange = '', $paged = '')
   {
      global $wp_query, $wp_rewrite;
      if ($pagerange == '')
      {
         $pagerange = 1;
      }
      if ($paged == '')
      {
         $paged = 1;
         if (get_query_var('paged'))
         {
            $paged = get_query_var('paged');
         }
         if (get_query_var('page'))
         {
            $paged = get_query_var('page');
         }
      }
      if ($numpages == '')
      {
         $numpages = $wp_query->max_num_pages;
      }
      $pagenum_link = html_entity_decode(get_pagenum_link());
      $query_args = array();
      $url_parts = explode('?', $pagenum_link);
      if (isset($url_parts[1]))
      {
         wp_parse_str($url_parts[1], $query_args);
      }
      $pagenum_link = remove_query_arg(array_keys($query_args), $pagenum_link);
      $pagenum_link = trailingslashit($pagenum_link) . '%_%';

      $format = $wp_rewrite->using_index_permalinks() && !strpos($pagenum_link, 'index.php') ? 'index.php/' : '';
      $format .= $wp_rewrite->using_permalinks() ? user_trailingslashit($wp_rewrite->pagination_base . '/%#%', 'paged') : '?paged=%#%';

      $pagination_args = array(
          'base' => $pagenum_link,
          'format' => $format,
          'total' => $numpages,
          'current' => $paged,
          'show_all' => False,
          'end_size' => 1,
          'mid_size' => $pagerange,
          'prev_next' => True,
          'prev_text' => __('<i class="fa fa-angle-left"></i>', 'trade'),
          'next_text' => __('<i class="fa fa-angle-right"></i>', 'trade'),
          'type' => 'plain',
          'add_args' => false,
          'add_fragment' => ''
      );

      echo '<div class="paginationIner">';
      echo paginate_links($pagination_args);
      echo '</div>';
   }

endif;


if (!function_exists('sm_load_more_pagination')) :

   function sm_load_more_pagination($args, $numpages, $page = 2, $pc_columns)
   {
      $output = '';
      //display load more if next page exists
      if ($numpages >= 2)
      {
         $output .= '<div class="loadMoregell text-center">
                        <a id="sm_load_more_pagination_portfolio" href="#" data-page="' . esc_attr($page) . '" data-maxpage="' . esc_attr($numpages) . '"  data-args="' . $args . '" data-pc_columns="' . esc_attr($pc_columns) . '" class="defaultButton">' . esc_html__('Load more', 'be') . '</a>
                     </div>';
      }

      return $output;
   }

endif;


/* =================================
  // Portfolio Ajax load
  ======================================= */
add_action('wp_ajax_sm_load_more_pagination_portfolio', 'sm_load_more_pagination_portfolio');
add_action('wp_ajax_nopriv_sm_load_more_pagination_portfolio', 'sm_load_more_pagination_portfolio');

function sm_load_more_pagination_portfolio()
{
   $portfolio = unserialize(base64_decode($_POST['args']));
   $portfolio['paged'] = $_POST['page'];
   $pc_columns = $_POST['pc_columns'];
   $folio = new WP_Query($portfolio);
   $op = '';
   if ($folio->have_posts())
   {
      while ($folio->have_posts())
      {
         $folio->the_post();
         $terms = get_the_terms(get_the_ID(), 'folio_cat');
         $cats = '';
         if (is_array($terms))
         {
            foreach ($terms as $term)
            {
               $cats .= ' cat_' . $term->term_id;
            }
         }
         if (has_post_thumbnail())
         {
            $img = wp_get_attachment_image_url(get_post_thumbnail_id(), 'portfolio_galary2');
         } else
         {
            $img = 'http://plcehold.it/480x300';
         }

         $op.='<div class="' . esc_attr($pc_columns) . 'mix ' . esc_attr($cats) . '"  style="display: inline-block; opacity: 1;">
                  <div class="galleryImg folio2">
                     <img alt="' . get_the_title() . '" src="' . esc_url($img) . '">
                     <div class="galleryHover">
                        <a class="popup" data-rel="prettyPhoto" href="' . esc_url($img) . '"><i class="icon-zoom-outline"></i></a>
                        <a class="detailsLink" href="' . get_the_permalink() . '"><i class="icon-location-outline"></i></a>
                     </div>
                  </div>
               </div>';
      }
   }

   echo $op;
   die();
}

if (!function_exists('sm_load_more_button_event')) :

   function sm_load_more_button_event($args, $numpages, $page)
   {
      $output = '';
      //display load more if next page exists
      if ($numpages >= 2)
      {
         $output .= '<div class="loadMoregell text-center">
                        <a id="sm_load_more_pagination_event" href="#" data-page="' . esc_attr($page) . '" data-maxpage="' . esc_attr($numpages) . '"  data-args="' . $args . '" class="defaultButton">' . esc_html__('Load more', 'be') . '</a>
                     </div>';
      }

      return $output;
   }

endif;
/* =================================
  // event Ajax load
  ======================================= */
add_action('wp_ajax_sm_load_more_pagination_event', 'sm_load_more_pagination_event');
add_action('wp_ajax_nopriv_sm_load_more_pagination_event', 'sm_load_more_pagination_event');

function sm_load_more_pagination_event()
{
   $event_args = unserialize(base64_decode($_POST['args']));
   $event_args['paged'] = $_POST['page'];
   $events = new WP_Query($event_args);
   $op = '';

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
         $op.='<div class="singleEvent wow fadeInUp" data-wow-delay="300ms" data-wow-duration="700ms" >
                  <div class="eventimg pull-left">
                     ' . get_the_post_thumbnail(get_the_ID(), 'team') . '
                  </div>
                  <div class="eventDec pull-right">
                     <h2><a href="' . get_the_permalink() . '">' . get_the_title() . '</a></h2><p>';

         if (has_excerpt())
         {
            $op.=get_the_excerpt();
         }

         $op.='</p><div class="eventmeta">
                        <div class="blogMetas clearfix">';
         if ($event_date != ''):
            $op.='<div class="pull-left">
                                 <i class="icon-calender"></i>
                                 <span>' . date('d.m, Y H:i:s', strtotime($event_date)) . '</span>    
                              </div>';
         endif;
         if ($event_location != ''):
            $op.='<div class="pull-left">
                                 <i class="icon-location-outline"></i>
                                 <span>' . esc_html($event_location) . '</span>    
                              </div>';
         endif;
         $op.=' </div>
                     </div>

                  </div>
               </div>';
      }
   }

   echo $op;
   die();
}

function title_style($title)
{
   if ($pos = strrpos($title, " "))
   {
      $fst = substr($title, 0, $pos) . '<b>.</b>';
      $lst = '<span>' . substr($title, $pos + 1) . '</span>';
      $title = $fst . $lst;
   }
   $title = str_replace(' ', '<b>.</b>', $title);
   return $title;
}
