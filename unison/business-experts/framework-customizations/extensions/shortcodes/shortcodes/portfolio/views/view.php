<?php
if (!defined('FW'))
{
   die('Forbidden');
}
$portfolio_show = 12;
if ($atts['portfolio_show'] != '')
{
   $portfolio_show = $atts['portfolio_show'];
}
$portfolio_categories = null;
if ($atts['portfolio_categories'] != '')
{
   $portfolio_categories = $atts['portfolio_categories'];
}

$styles = (isset($atts['portfolio_style']['gadget']) && $atts['portfolio_style']['gadget'] != '') ? $atts['portfolio_style']['gadget'] : 1;
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

if ($portfolio_categories)
{
   $cat_ids = [];
   foreach ($portfolio_categories as $cat_id => $cat_val)
   {
      $cat_ids[] = $cat_id;
   }
   $portfolio['tax_query'] = array(
       array(
           'taxonomy' => 'folio_cat',
           'field' => 'term_id',
           'terms' => $cat_ids,
           'operator' => 'IN'
       )
   );
}



$folio = new WP_Query($portfolio);
//   echo "st$portfolio_show $styles $folio->post_count";
if ($folio->have_posts())
{
   if ($styles == 1)
   {
      ?>
      <section class="recentWorkArea">
         <div class="text-center">
            <div id="recentWorkImg-carowsel">
               <?php
               while ($folio->have_posts())
               {
                  $folio->the_post();
                  if (has_post_thumbnail())
                  {
                     $img = wp_get_attachment_image_url(get_post_thumbnail_id(), 'portfolio_carousel');
                  } else
                  {
                     $img = 'http://plcehold.it/910x521';
                  }
                  ?>
                  <div class="single-work">
                     <img alt="<?php echo get_the_title(); ?>" src="<?php echo esc_url($img); ?>">
                     <div class="recentWorkHover">
                        <a href="<?php echo esc_url($img); ?>" data-rel="prettyPhoto" class="popup a"><i class="icon-zoom-outline"></i></a>
                        <a href="<?php echo get_the_permalink(); ?>" class="detailsLink"><i class="icon-location-outline"></i></a>
                     </div>
                  </div>
                  <?php
               }
               ?>
            </div>
         </div>
      </section>
      <?php
   } elseif ($styles == 2)
   {
      $title = $title_color = $subtitle = $content = $sidebar_alignment = $sidebar_color = '';
      $sidebar_image = array();
      if (isset($atts['portfolio_style']['2']))
      {
         $s2 = $atts['portfolio_style']['2'];
         $title = ($s2['title'] != '') ? $s2['title'] : 'Our Gallery';
         $title_color = ($s2['title_color'] != '') ? $s2['title_color'] : '#323232';
         $subtitle = ( $s2['subtitle'] != '') ? $s2['subtitle'] : '';
         $content = ($s2['content'] != '') ? $s2['content'] : '';
         $sidebar_alignment = ($s2['sidebar_alignment'] != '') ? $s2['sidebar_alignment'] : 1;
         $sidebar_image = (isset($s2['sidebar_image']['url']) && $s2['sidebar_image']['url'] != '') ? $s2['sidebar_image']['url'] : '#';
         $sidebar_color = ($s2['sidebar_color'] != '') ? $s2['sidebar_color'] : '#fff';
         $page_id = ($s2['page_id'] != '') ? $s2['page_id'] : '';
      }
      $page_link = ($page_id != '') ? get_page_link($page_id) : '#';
      $title = str_replace(' ', '<b>.</b>', $title);
      $class1 = '';
      $class2 = '';
      if ($sidebar_alignment == 2)
      {
         $class1 = 'pull-right';
         $class2 = 'pull-left';
      }
      ?>
      <section class="galleryArea">
         <div class="galleryLeftSide <?php echo esc_attr($class1); ?>" style="background:<?php echo esc_attr($sidebar_color); ?> url(<?php echo esc_url($sidebar_image); ?>) repeat scroll center center">
            <span class="line"></span>
            <h2 class="sectionTitle" style="color:<?php echo esc_attr($title_color); ?>"><?php echo wp_kses($title, array('b' => array(), 'span' => array())); ?> </h2>
            <p class="sectionSubtitle"><?php echo wp_kses($subtitle, array()); ?></p>
            <div class="galleryCont">
               <p>
                  <?php echo wp_kses($content, array()); ?>
               </p>
            </div>
            <a href="<?php echo esc_url($page_link); ?>" class="defaultButton">go to gallery</a>
         </div>
         <div class="galleryContArea <?php echo esc_attr($class2); ?>">
            <?php
            while ($folio->have_posts())
            {
               $folio->the_post();
               if (has_post_thumbnail())
               {
                  $img = wp_get_attachment_image_url(get_post_thumbnail_id(), 'portfolio_galary');
               } else
               {
                  $img = 'http://plcehold.it/450x450';
               }
               ?>
               <div class="galleryImg">
                  <img alt="<?php echo get_the_title(); ?>" src="<?php echo esc_url($img); ?>">
                  <div class="galleryHover">
                     <a href="<?php echo esc_url($img); ?>" data-rel="prettyPhoto" class="popup"><i class="icon-zoom-outline"></i></a>
                     <a href="<?php echo get_the_permalink(); ?>" class="detailsLink"><i class="icon-location-outline"></i></a>
                  </div>
               </div>
               <?php
            }
            ?>
            <div class="clearfix"></div>
         </div>
         <div class="clearfix"></div>
      </section>
      <?php
   } elseif ($styles == 3)
   {
      ?>
      <section class="gellaryTwoArea">
         <div class="gellaryTwofillter">
            <ul class="filterMenu">
               <li class="filter active" data-filter="all">all</li>
               <?php
               if (isset($cat_ids))
               {
                  foreach ($cat_ids as $cat_id)
                  {
                     $cat_info = get_the_category_by_ID($cat_id);
                     echo '<li class="filter" data-filter="cat_' . esc_attr($cat_id) . '">' . esc_html($cat_info) . '</li>';
                  }
               } else
               {
                  $args = array(
                      'taxonomy' => 'folio_cat',
                      'orderby' => 'name',
                      'show_count' => 0,
                      'pad_counts' => 0,
                      'hierarchical' => 1,
                      'title_li' => '',
                      'hide_empty' => 0
                  );
                  $all_categories = get_categories($args);
                  foreach ($all_categories as $cat)
                  {
                     echo '<li class="filter" data-filter="cat_' . esc_attr($cat->term_id) . '">' . esc_html($cat->name) . '</li>';
                  }
               }
               ?>
            </ul>
            <div class="gellaryFilterContent">
               <?php
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
                  ?>
                  <div class="singleGellary mix <?php echo esc_attr($cats); ?>">
                     <div class="singleGaImg">
                        <img src="<?php echo esc_url($img); ?>" alt="<?php echo get_the_title(); ?>">
                     </div>
                     <div class="singleGaDec">
                        <p><a href="<?php echo get_the_permalink(); ?>"><?php echo get_the_title(); ?></a></p>
                     </div>
                  </div>
                  <?php
               }
               ?>
            </div>
         </div>
      </section>
      <?php
   } elseif ($styles == 4)
   {
      $post_column = 3;
      if (isset($atts['portfolio_style']['4']))
      {
         $s4 = $atts['portfolio_style']['4'];
         $post_column = ($s4['post_column'] != '') ? $s4['post_column'] : 3;
      }
      $pc_columns = ( $post_column == 3) ? ' ThreeCol' : '';
      ?>
      <!-- ========= Gellary Section ========== -->
      <div class="fullGellaryArea">
         <div class="fullGellaryInner <?php echo esc_attr($pc_columns); ?>">
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
   } elseif ($styles == 5)
   {
      $post_column = 3;
      if (isset($atts['portfolio_style']['5']))
      {
         $s4 = $atts['portfolio_style']['5'];
         $post_column = ($s4['post_column'] != '') ? $s4['post_column'] : 3;
      }
      $pc_columns = ( $post_column == 3) ? ' col-sm-4 col-xs-12' : ' col-lg-3 col-sm-6 col-xs-12';
      ?>
      <div class="fullGellaryArea gellaryTwo">
         <div class="container-fluid">
            <div class="row">
               <ul class="filterMmenu">
                  <li class="filter active" data-filter="all">all</li>
                  <?php
                  if (isset($cat_ids))
                  {
                     foreach ($cat_ids as $cat_id)
                     {
                        $cat_info = get_the_category_by_ID($cat_id);
                        echo '<li class="filter" data-filter="cat_' . esc_attr($cat_id) . '">' . esc_html($cat_info) . '</li>';
                     }
                  } else
                  {
                     $args = array(
                         'taxonomy' => 'folio_cat',
                         'orderby' => 'name',
                         'show_count' => 0,
                         'pad_counts' => 0,
                         'hierarchical' => 1,
                         'title_li' => '',
                         'hide_empty' => 0
                     );
                     $all_categories = get_categories($args);
                     foreach ($all_categories as $cat)
                     {
                        echo '<li class="filter" data-filter="cat_' . esc_attr($cat->term_id) . '">' . esc_html($cat->name) . '</li>';
                     }
                  }
                  ?>
               </ul>
            </div>
            <div class="filterContent" id="sm_load_div">
               <?php
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
                  ?>
                  <div class="<?php echo esc_attr($pc_columns); ?> mix <?php echo esc_attr($cats); ?>">
                     <div class="galleryImg folio2">
                        <img alt="<?php echo get_the_title(); ?>" src="<?php echo esc_url($img); ?>">
                        <div class="galleryHover">
                           <a class="popup" data-rel="prettyPhoto" href="<?php echo esc_url($img); ?>"><i class="icon-zoom-outline"></i></a>
                           <a class="detailsLink" href="<?php echo get_the_permalink(); ?>"><i class="icon-location-outline"></i></a>
                        </div>
                     </div>
                  </div>
                  <?php
               }
               ?>

            </div>
            <div class="clearfix"></div>
            <?php
            if (function_exists('sm_load_more_pagination'))
            {
               $argument= base64_encode(serialize($portfolio));
               echo sm_load_more_pagination($argument,$folio->max_num_pages, $paged+1, $pc_columns);
            }
            ?>
         </div>
      </div>
      <?php
   } elseif ($styles == 6)
   {
      $post_column = 2;
      if (isset($atts['portfolio_style']['6']))
      {
         $s4 = $atts['portfolio_style']['6'];
         $post_column = ($s4['post_column'] != '') ? $s4['post_column'] : 2;
      }
      $pc_columns = ( $post_column == 2) ? ' col-sm-6 col-xs-12' : ' col-lg-4 col-sm-6 col-xs-12';
      ?>
      <section class="blogPostsection">
         <div class="container">
            <div class="row">
               <ul class="filterMmenu">
                  <li class="filter active" data-filter="*">all</li>
                  <?php
                  if (isset($cat_ids))
                  {
                     foreach ($cat_ids as $cat_id)
                     {
                        $cat_info = get_the_category_by_ID($cat_id);
                        echo '<li class="filter" data-filter="cat_' . esc_attr($cat_id) . '">' . esc_html($cat_info) . '</li>';
                     }
                  } else
                  {
                     $args = array(
                         'taxonomy' => 'folio_cat',
                         'orderby' => 'name',
                         'show_count' => 0,
                         'pad_counts' => 0,
                         'hierarchical' => 1,
                         'title_li' => '',
                         'hide_empty' => 0
                     );
                     $all_categories = get_categories($args);
                     foreach ($all_categories as $cat)
                     {
                        echo '<li class="filter" data-filter="cat_' . esc_attr($cat->term_id) . '">' . esc_html($cat->name) . '</li>';
                     }
                  }
                  ?>
               </ul>
            </div>
            <div class="row">
               <div class="filterContent">
                  <?php
                  while ($folio->have_posts())
                  {
                     $folio->the_post();
                     $terms = get_the_terms(get_the_ID(), 'folio_cat');
                     $cats = '';
                     $cat_list = '';
                     if (is_array($terms))
                     {
                        $loop = 0;
                        foreach ($terms as $term)
                        {
                           $cats .= ' cat_' . $term->term_id;
                           $separator = ($loop > 0) ? ', ' : '';
                           $cat_list .='<li>' . esc_html($separator) . '<a href="' . esc_url(get_term_link($term->slug, 'folio_cat')) . '">' . esc_html($term->name) . '</a></li>';
                           $loop++;
                        }
                     }
                     if (has_post_thumbnail())
                     {
                        $img = wp_get_attachment_image_url(get_post_thumbnail_id(), 'portfolio_galary3');
                     } else
                     {
                        $img = 'http://plcehold.it/480x300';
                     }
                     ?>

                     <div class="<?php echo esc_attr($pc_columns); ?> mix <?php echo esc_attr($cats); ?>">
                        <div class="singlefolio">
                           <div class="blogThumb">
                              <img src="<?php echo esc_url($img); ?>" alt="<?php echo get_the_title(); ?>">
                              <p class="blogMeta">
                                 <a href="#" class="pull-left"><?php echo sm_time_ago(); ?></a>
                                 <a href="#" class="pull-right"><i class="icon-heart-outline"></i></a>
                              </p>
                           </div>
                           <div class="blogPostWrap">
                              <div class="blogContent">
                                 <h3><a href="<?php echo get_the_permalink(); ?>"><?php echo get_the_title(); ?></a></h3>
                                 <ul class="blogTag">
                                    <?php echo $cat_list; ?>
                                 </ul>
                                 <?php
                                 if (has_excerpt())
                                 {
                                    the_excerpt();
                                 }
                                 ?>
                                 <a href="<?php echo get_the_permalink(); ?>" class="defaultButton">Check it!</a>
                              </div>
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
   }
   wp_reset_postdata();
}

