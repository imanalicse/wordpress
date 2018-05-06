<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
/**
 * @var array $atts
 */


$title = '';
if($atts['title'] != ''){
    $title = $atts['title'];
}
$title_link = '';
if($atts['title_link'] != ''){
    $title_link = $atts['title_link'];
}
$title_color = '';
if($atts['title_color'] != ''){
    $title_color = $atts['title_color'];
}

?>
<div class="singlePromo">
    <h4><a style="<?php echo esc_attr($title_color); ?>" href="<?php echo esc_url($title_link); ?>"><?php echo esc_html($title); ?></a></h4>
</div>