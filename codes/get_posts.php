<?php

$items = get_posts(array(
		'order' => 'asc',
		'orderby' => 'menu_order',
		'post_type' => 'post',
		'post_status'      => 'publish',
		'numberposts'	   =>3,
		'meta_key'         => 'editor_picks',
		'meta_value'       => 'Yes',
	)
);