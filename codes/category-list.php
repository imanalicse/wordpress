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

