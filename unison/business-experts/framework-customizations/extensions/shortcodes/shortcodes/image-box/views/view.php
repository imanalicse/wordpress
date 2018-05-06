<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
/**
 * @var array $atts
 */

$imgs = 'http://placehold.it/146x133';
if(is_array($atts['imgs']) && isset($atts['imgs']['attachment_id']) && $atts['imgs']['attachment_id'] != ''){
    $imgsss = wp_get_attachment_image_src($atts['imgs']['attachment_id'], 'martin_imgbox');
    $imgs = $imgsss[0];
}

$title = '';
if($atts['title'] != ''){
    $title = $atts['title'];
}
$title_color = '';
if($atts['title_color'] != ''){
    $title_color ='color: '.$atts['title_color'].';';
}

$content = '';
if($atts['content'] != ''){
    $content = $atts['content'];
}
$cnt_color = '';
if($atts['cnt_color'] != ''){
    $cnt_color ='color: '.$atts['cnt_color'];
}

$martin_top = '';
if($atts['martin_top'] != ''){
    $martin_top = 'margin-top: '.$atts['martin_top'].'px; ';
}

$martin_bottom = '';
if($atts['martin_bottom'] != ''){
    $martin_bottom = 'margin-bottom: '.$atts['martin_bottom'].'px; ';
}

?>

<div class="imgFeature" style="<?php echo esc_attr($martin_bottom . $martin_top); ?>">
    <div class="fImg">
        <img alt="<?php echo esc_attr($title); ?>" src="<?php echo esc_url($imgs); ?>">
    </div>
    <div class="f_img_inner">
        <h3 style="<?php echo esc_attr($title_color); ?>"><?php echo esc_html($title); ?></h3>
        <p style="<?php echo esc_attr($cnt_color); ?>">
            <?php echo strip_tags($content, '<a><span><br/><br><strong>'); ?>
        </p>
    </div>
</div>