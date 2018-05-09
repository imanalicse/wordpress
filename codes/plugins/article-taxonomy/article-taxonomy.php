<?php
/*
Plugin Name: Article Taxonomy
Plugin URI: http://www.webalive.com.au/
Description: Article Taxonomy
Version: 1.0
Author: Webalive
Author URI: http://www.webalive.com.au/
*/

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

if (!class_exists("Articles")) {

	class Articles
	{

		/**
		 * Constructor. Called when plugin is initialised
		 */
		function __construct()
		{
			// Disable display of errors and warnings
			@define('WP_DEBUG_DISPLAY', true);
			@ini_set('display_errors',1);

			add_action('init', array($this, 'init_taxonomy'));
			//add_filter('post_type_link', array(&$this, 'products_permalink_structure'), 10, 4);
		}

		function init_taxonomy() {

			register_taxonomy(
				'product_category',
				'product_post',
				array(
					'label' => __( 'Product categories' ),
					'singular_label' => 'Product Category',
					'hierarchical' => true,
					'query_var' => true,
					'rewrite' => array(
						'slug' => 'product-category'
					),
				)
			);

			$args = array(
				'labels' => array(
					'name' => _x('Products', 'post type general name'),
					'singular_name' => _x('Product', 'post type singular name')
				),
				'public' => true,
				'publicly_queryable' => true,
				'show_ui' => true,
				'query_var' => true,
				'capability_type' => 'post',
				'hierarchical' => false,
				'menu_position' => null,
				'supports' => array('title', 'editor', 'thumbnail', 'page-attributes'),
				'rewrite' => array(
					'slug' => 'product',
					'with_front' => false
				),
				'has_archive' => 'products'
			);

			register_post_type('product_post', $args);
			flush_rewrite_rules();
		}


		function products_permalink_structure($post_link, $post, $leavename, $sample)
		{

			if (false !== strpos($post_link, '%product-category%')) {

				$article_category_term = get_the_terms($post->ID, 'product_category');

				if(!empty($article_category_term)) {
					$post_link = str_replace('%product-category%', array_pop($article_category_term)->slug, $post_link);
				}else{
					$post_link = $post->guid;
				}
			}
			return $post_link;
		}

		//Walker function
		function custom_taxonomy_walker($taxonomy, $parent = 0)
		{
			$terms = get_terms($taxonomy, array('parent' => $parent, 'hide_empty' => false));
			//If there are terms, start displaying
			if(count($terms) > 0)
			{
				//Displaying as a list
				$out = "<ul>";
				//Cycle though the terms
				foreach ($terms as $term)
				{
					//Secret sauce.  Function calls itself to display child elements, if any
					$out .="<li>" . $term->name . custom_taxonomy_walker($taxonomy, $term->term_id) . "</li>";
				}
				$out .= "</ul>";
				return $out;
			}
			return;
		}
	}

	$Articles = new Articles();
}
