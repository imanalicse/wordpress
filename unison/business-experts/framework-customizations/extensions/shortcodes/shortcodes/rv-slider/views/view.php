<?php
if (!defined('FW')) {
    die('Forbidden');
}

/*
 * view process section 
 */

$sl_shortcode= '';
if($atts['sl_shortcode'] != ''){
    $sl_shortcode=$atts['sl_shortcode'];
}

/*show in front*/

if(!empty($sl_shortcode))
{ 
    echo do_shortcode($sl_shortcode);
}
?>