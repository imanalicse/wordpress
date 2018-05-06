<?php
if (!defined('FW')) {
    die('Forbidden');
}

/*
 * view process section 
 */

$latitude = '';
if($atts['latitude'] != ''){
    $latitude = $atts['latitude'];
}

$longitude = '';
if($atts['longitude'] != ''){
    $longitude = $atts['longitude'];
}


$markers = array();
if($atts['markers'] != ''){
    $markers = $atts['markers'];
}

$height = 'height: 835px; ';
if($atts['height'] != ''){
    $height = 'height: '.$atts['height'].'px; ';
}

$mar_img = '';
if(is_array($markers) && isset($markers['url']) && $markers['url'] != ''){
    $mar_img = $markers['url'];
}

?>
<div class="mapHolder" data-marker="<?php echo esc_url($mar_img); ?>" data-lat="<?php echo esc_attr($latitude); ?>" data-lon="<?php echo esc_attr($longitude); ?>">
<div style="width: 100%; <?php echo esc_attr($height); ?>"  class="map" id="map"></div>
</div>