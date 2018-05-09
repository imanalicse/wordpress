<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */

get_header(); ?>

	<div id="content">
        	<div id="content_body">            	
            	<h1 class="border">NEWS </h1>
                
                <div id="news_container">
                    <div id="news_left">					
						<?php 
								$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
								query_posts("cat=3&paged=".$paged);
								if ( have_posts() ) while ( have_posts() ) : the_post();
								?>
									<div class="news_left_each">
										<h2> <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a> </h2>
										<p class="date_news_article"><?php the_time('F m Y'); ?> </p>
										<?php
                                        the_content(); ?>
									</div>
						<?php endwhile; // end of the loop. ?>
                         <?php wp_pagenavi(); ?>
                    </div>
                    <div id="news_right"> 
						<?php dynamic_sidebar(); ?>
                    </div>
                  <div class="clear"></div>
                </div>   

            </div>
		</div>
<?php get_footer(); ?>
