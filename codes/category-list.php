<?php
	$arg = array(
		'depth' => 3,
		'echo' => 1,
		'hide_empty' => 1,
		'hide_title_if_empty' => false,
		'hierarchical' => true,
		'show_count' => 0,
		'show_option_all' => '',
		'show_option_none' => '',
		'style' => 'list',
		'taxonomy' => 'product_cat',
		'title_li' => '',
		'use_desc_for_title' => 1,
	);
	echo '<ul class="product_cats">';
	wp_list_categories($arg);
	echo '</ul>';

//
function getTemplateCategories() {
	$args = array(
		'hide_empty'=> false,
		'taxonomy'  => 'template_category',
		'slug' => 'online-stores'
	);
	$parent = get_categories($args);
	$parent_cat_id = $parent[0]->cat_ID;

	$categories = get_categories( array(
		'orderby'   => 'name',
		'hide_empty'=> false,
		'taxonomy'  => 'template_category',
		'parent'  => $parent_cat_id
	) );
	return $categories;
}

