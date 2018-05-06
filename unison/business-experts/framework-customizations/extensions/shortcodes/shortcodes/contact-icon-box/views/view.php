<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
/**
 * @var array $atts
 */


$icon = '';
if($atts['icon'] != ''){
    $icon = $atts['icon'];
}

$icon_color = '';
if($atts['icon_color'] != ''){
    $icon_color = 'color: '.$atts['icon_color'].'; border-color: '.$atts['icon_color'].'; ';
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

$content_color = '';
if($atts['content_color'] != ''){
    $content_color = 'color: '.$atts['content_color'].'; ';
}

$padding_top = '';
if($atts['padding_top'] != ''){
    $padding_top = 'padding-top: '.$atts['padding_top'].'px; ';
}

$padding_bottom = '';
if($atts['padding_bottom'] != ''){
    $padding_bottom = 'padding-bottom: '.$atts['padding_bottom'].'px; ';
}


?>
<div class="contactAddCol text-center" style="<?php echo esc_attr($padding_top . $padding_bottom); ?>">
    <i style="<?php echo esc_attr($icon_color); ?>" class="<?php echo esc_attr($icon); ?>"></i>
    <h3 style="<?php echo esc_attr($title_color); ?>"><?php echo esc_html($title); ?></h3>
    <p style="<?php echo esc_attr($content_color); ?>"><?php echo strip_tags($content, '<br/><br><a>'); ?></p>
</div>