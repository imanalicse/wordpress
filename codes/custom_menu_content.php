<?php

$menu_items = wp_get_nav_menu_items('main-menu');

if(sizeof($menu_items)>0)
{
	foreach ( $menu_items as $menu_item )
	{

		$post = get_post( $menu_item->object_id );			
			$content = apply_filters('the_content', $post->post_content);
			$content = str_replace(']]>', ']]&gt;', $content);
			echo '<div>'.$content.'</div>';
		
	}
}



  $menu_name = 'custom_menu_slug';

    if ( ( $locations = get_nav_menu_locations() ) && isset( $locations[ $menu_name ] ) ) {
	$menu = wp_get_nav_menu_object( $locations[ $menu_name ] );

	$menu_items = wp_get_nav_menu_items($menu->term_id);

	$menu_list = '<ul id="menu-' . $menu_name . '">';

	foreach ( (array) $menu_items as $key => $menu_item ) {
	    $title = $menu_item->title;
	    $url = $menu_item->url;
	    $menu_list .= '<li><a href="' . $url . '">' . $title . '</a></li>';
	}
	$menu_list .= '</ul>';
    } else {
	$menu_list = '<ul><li>Menu "' . $menu_name . '" not defined.</li></ul>';
    }
    // $menu_list now ready to output