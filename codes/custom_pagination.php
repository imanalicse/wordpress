http://codex.wordpress.org/Function_Reference/paginate_links

<?php

	$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;

	$args = array(
		'posts_per_page' => 2,
		'paged' => $paged,
	);

	$the_query = new WP_Query( $args );
	$big = 999999999; // need an unlikely integer

	echo paginate_links( array(
		'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
		'format' => '?paged=%#%',
		'current' => max( 1, get_query_var('paged') ),
		'total' => $the_query->max_num_pages
	) );


//===========Custom query pagination==================

	global $wpdb;

	$permalink_structure =  get_option('permalink_structure');
	$format = empty( $permalink_structure) ? '&paged=%#%' : '?paged=%#%';

	$current = (get_query_var('paged')) ? get_query_var('paged') : 1;
	$item_per_page = 2;
	$limit_start = $item_per_page * ($current-1);

	$cat_id = isset($_REQUEST['cat_id']) ? $_REQUEST['cat_id'] : '';

	$query = "SELECT * FROM ".$wpdb->prefix."works WHERE published = 1";

	if((int)$cat_id>0){
		$query .= " AND cat_id = ".$cat_id;
	}
	$query .= " ORDER BY ordering ASC";

	$total = sizeof($wpdb->get_col($query));

	$query .= " LIMIT ".$limit_start.", ".$item_per_page."";
	$works = $wpdb->get_results( $query );

	$total_page = ceil($total / $item_per_page);


	$args = array(
		'base'         => get_permalink(8).'%_%',
		'format'       => $format,
		'total'        => $total_page,
		'current'      => $current,
		'show_all'     => False,
		'end_size'     => 1,
		'mid_size'     => 2,
		'prev_next'    => True,
		'prev_text'    => __('« Previous'),
		'next_text'    => __('Next »'),
		'type'         => 'plain',
		'add_args'     => False,
		'add_fragment' => ''
	);
	echo paginate_links( $args );	
	
?>
