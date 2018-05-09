<?php

function my_item_func($atts) {

    extract(shortcode_atts(array(
        'display_num' => '5'
    ), $atts));
	
	$result = 'display ammount ='.$display_num;	
    return $result;
}
add_shortcode('my_item', 'my_item_func');

// call shortcode
[my_item display_num=10]