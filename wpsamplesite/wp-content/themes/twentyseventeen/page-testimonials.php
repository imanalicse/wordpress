<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>

<div class="wrap">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php
			$args = array(
				'post_type' => 'testimonial',
				'posts_per_page' => 10,
			);

			$qeury = new WP_Query($args);
			$posts = get_posts($args);


			while ($qeury->have_posts()): $qeury->the_post();
				$data = get_post_meta($post->ID, '_webalive_testimonial_key', true);
				echo '<pre>';
				print_r($data);
				echo '</pre>';
				?>

				<p><?php the_title(); ?></p>

				<?php
			endwhile;
			wp_reset_query();
			?>

		</main><!-- #main -->
	</div><!-- #primary -->
</div><!-- .wrap -->

<?php get_footer();
