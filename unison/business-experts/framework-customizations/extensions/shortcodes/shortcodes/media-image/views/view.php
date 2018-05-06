<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

/**
 * @var array $atts
 */

if ( empty( $atts['image'] ) ) {
	return;
}

$image = '';
if(is_array($atts['image']) && isset($atts['image']['attachment_id']) && $atts['image']['attachment_id'] != ''){
    $thum = wp_get_attachment_image_src( $atts['image']['attachment_id'], 'full' );
    $image = $thum[0];
}

$image_alingment = 'center';
if($atts['image_alingment'] != '')
{
    $image_alingment = 'text-align: '.$atts['image_alingment'].'; ';
}
$margin_top = '';
if($atts['margin_top'] != '')
{
    $margin_top = 'margin-top: '.$atts['margin_top'].'px; ';
}
$margin_bottom = '';
if($atts['margin_bottom'] != '')
{
    $margin_bottom = 'margin-bottom: '.$atts['margin_bottom'].'px; ';
}

$width = '';
if($atts['width'] != ''){
    $width = 'width: '.$atts['width'].'px; ';
}

$height = '';
if($atts['height'] != ''){
    $height = 'height: '.$atts['height'].'px; ';
}

?>
<?php if ( empty( $atts['link'] ) ) : ?>
<div class="imageDiv zindex" style="<?php echo esc_attr($image_alingment) . esc_attr($margin_top) . esc_attr($margin_bottom); ?>">
    <img class="img-responsive" src="<?php echo esc_url($image) ?>" alt="" style="<?php echo esc_attr($width . $height); ?>"/>
</div>
<?php else : ?>
<div class="imageDiv zindex" style="<?php echo esc_attr($image_alingment) . esc_attr($margin_top) . esc_attr($margin_bottom); ?>">
    <a href="<?php echo esc_url($atts['link']) ?>" target="<?php echo esc_attr($atts['target']) ?>">
        <img class="img-responsive" src="<?php echo esc_url($image) ?>" alt="" style="<?php echo esc_attr($width . $height); ?>"/>
    </a>
</div>
<?php endif ?>
