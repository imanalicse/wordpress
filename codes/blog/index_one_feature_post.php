<?php get_header(); ?>


<div class="site-content-inner">
	<div class="container">
			<div class="row">
				<div class="col-md-9 left-sidebar">

					<?php

					$paged = get_query_var("paged");

					if($paged==0) {

						$args = array(
							'numberposts' => 1,
							'orderby' => 'post_date',
							'order' => 'DESC',
							'post_type' => 'post',
							'post_status' => 'publish',
							'category'         => '-18',
						);

						$recent_posts = get_posts($args, OBJECT);

						if (!empty($recent_posts)) {
							$recent_post = $recent_posts[0];
							?>

							<div class="blog-recent-post">
								<a href="<?php echo get_permalink($recent_post); ?>"> <?php

									$image = wp_get_attachment_image_src(get_post_thumbnail_id($recent_post->ID), 'full');
									if(!empty($image)){
										echo '<img src="'.$image[0].'" title="'.$recent_post->post_title.'" alt="'.$recent_post->post_title.'">';
									}
									?></a>
								<h2>
									<a href="<?php echo get_permalink($recent_post); ?>"><?php echo $recent_post->post_title; ?></a>
								</h2>
								<div class="author-area">
                                        <span
											class="author-name"> <span>by</span><?php echo the_author_meta('display_name', $recent_post->post_author); ?></span>
									<span class="date"><?php echo get_the_date(); ?></span>
								</div>
							</div>
						<?php }
					}

					?>

					<div class="row gutter-55">
						<?php

						if($paged==0){
							query_posts( array('offset'=>1) );
						}


						if ( have_posts() ) :
							// Start the Loop.
							while ( have_posts() ) : the_post();

								/*
                                 * Include the post format-specific template for the content. If you want to
                                 * use this in a child theme, then include a file called called content-___.php
                                 * (where ___ is the post format) and that will be used instead.
                                 */

								//get_template_part( 'content', get_post_format() );
								get_template_part( 'template-parts/content', 'blog');

							endwhile;
							// Previous/next page navigation.
							the_posts_pagination( array(
								'prev_text'          => __( 'Prev', 'twentysixteen' ),
								'next_text'          => __( 'Next', 'twentysixteen' ),
								'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'twentysixteen' ) . ' </span>',
							) );


						else :
							// If no content, include the "No posts found" template.
							get_template_part( 'content', 'none' );

						endif;
						?>
					</div>
					<div class="clear"></div>
					<?php
					//twentyfourteen_paging_nav();
					?>
				</div>
				<div class="col-md-3 right-sidebar">
					<?php get_sidebar(); ?>
				</div>
				<div class="clear"></div>
			</div>
		</div>
	</div>
<?php get_footer();?>
