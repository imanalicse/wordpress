<?php
/*
  Template Name: Blog
  */
get_header(); ?>
<div id="content" class="blog">
    <div id="content_body">
        <div class="blog_area">
            <h2 class="blog-heading"><?php the_title(); ?></h2>

            <?php
            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
            query_posts("post_type=post&paged=".$paged);
            if ( have_posts() ) while ( have_posts() ) : the_post();


                $post_categories = wp_get_post_categories( $post->ID );
                $cats = array();
                foreach($post_categories as $cid){
                    $category = get_category( $cid );
                    $cats[] = '<a href="'.get_category_link($category->term_id).'">'.$category->name.'</a>';
                }
                $category_string = implode(',', $cats);

                ?>
                <div class="each-blog">
                    <h2> <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                    <div class="category-info">
                        <span class="date"><?php the_time('d'); ?><br/><?php the_time('M'); ?></span>
                        <span class="author"><?php the_author(); ?></> </span>
                        <span class="category"><?php echo $category_string; ?></span>
                    </div>
                    <?php the_excerpt(); ?>
                    <div class="clear"></div>
                </div>
            <?php endwhile; // end of the loop. ?>
            <?php wp_pagenavi(); ?>
         </div>
        <div class="sidebar_area">
            <?php get_sidebar() ?>
        </div>
    </div>
</div>
<?php get_footer(); ?>