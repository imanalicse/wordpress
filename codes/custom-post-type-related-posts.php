
<?php

//			$post_terms = wp_get_object_terms($post->ID, 'resource_tag', array('fields'=>'names'));
//			echo '<pre>';
//			print_r($post_terms);
//			echo '</pre>';
			$post_terms_ids = wp_get_object_terms($post->ID, 'resource_tag', array('fields'=>'ids'));
			$args = array(
				'post_type' => 'resource',
				'tax_query' => array(
					array(
						'taxonomy' => 'resource_tag',
						'field' => 'id',
						'terms' => $post_terms_ids,
					)
				),
				'post__not_in' => array($post->ID),
				'posts_per_page' => 3,
				'orderby'          => 'tag_count',
				'order' => 'DESC'
			);
			$the_query = new WP_Query( $args );
			if ( $the_query->have_posts() ) {
				echo "<div class='recommended-resources-wrapper'>";
				echo '<h2 class="recommended-title">Recommended for you</h2>';
				echo '<ul class="related-resources">';
				while ( $the_query->have_posts() ) {
					$the_query->the_post();
					//global $post;

//					$post_terms = wp_get_object_terms($post->ID, 'resource_tag', array('fields'=>'names'));
//					echo '<pre>';
//					print_r($post_terms);
//					echo '</pre>';

					$post_thumbnail_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
					if(empty($post_thumbnail_url))
					{
						$post_thumbnail_url = get_template_directory_uri() . '/images/default-image.png';
					}

					?>
					<li>
						<a href="<?php the_permalink(); ?>">
							<img src="<?php echo $post_thumbnail_url; ?>" alt="<?php the_title(); ?>">
							<?php the_title(); ?>
							<div class="author-name"><?php echo get_the_excerpt( $post )?></div>
						</a>
					</li>
					<?php
				}
				echo '</ul>';
				echo '</div>';
			}
			wp_reset_postdata();
			?>
