<?php if ( ! defined( 'FW' ) ) { die( 'Forbidden' ); }

$is_fullwidth = 2;
if(isset($atts['is_fullwidth']) && $atts['is_fullwidth'] != ''){
    $is_fullwidth = $atts['is_fullwidth'];
}

$is_banner = 2;
if($atts['is_banner'] != ''){
    $is_banner = $atts['is_banner'];
}

$background_color = '';
if($atts['background_color'] != '')
{
    $background_color = 'background-color: '.$atts['background_color'].'; ';
}

$background_image = '';
if ( ! empty( $atts['background_image'] ) && ! empty( $atts['background_image']['attachment_id'] ) ) {
        $thumbs = wp_get_attachment_image_src( $atts['background_image']['attachment_id'], 'full' );
        if(isset($thumbs[0]) && $thumbs[0] != ''):
	$background_image = 'background-image:url(' . $thumbs[0] . '); ';
        endif;
}

$background_repeat = '';
if($atts['background_repeat'] != ''){
    $background_repeat = 'background-repeat: '.$atts['background_repeat'].'; ';
}

$background_size = '';
if($atts['background_size'] != ''){
    $background_size = 'background-size: '.$atts['background_size'].'; ';
}

$background_position = '';
if($atts['background_position'] != ''){
    $background_position = 'background-position: '.$atts['background_position'].'; ';
}

$background_attachment = '';
if($atts['background_attachment'] != ''){
    $background_attachment = 'background-attachment: '.$atts['background_attachment'].'; ';
}

$is_overlay = '';
if($atts['is_overlay'] != ''){
    $is_overlay = $atts['is_overlay'];
}

$overlay_color = '';
if($atts['overlay_color'] != ''){
    $overlay_color = 'background: '.$atts['overlay_color'].'; ';
}

$padding_left = '';
if($atts['padding_left'] != ''){
    $padding_left = 'padding-left: '.$atts['padding_left'].'px; ';
}

$padding_right = '';
if($atts['padding_right'] != ''){
    $padding_right = 'padding-right: '.$atts['padding_right'].'px; ';
}

$padding_top = '';
if($atts['padding_top'] != ''){
    $padding_top = 'padding-top: '.$atts['padding_top'].'px; ';
}

$padding_bottom = '';
if($atts['padding_bottom'] != ''){
    $padding_bottom = 'padding-bottom: '.$atts['padding_bottom'].'px; ';
}

$border_top = '';
if($atts['border_top'] != ''){
    $border_top = 'border-top: '.$atts['border_top'].'; ';
}

$border_bottom = '';
if($atts['border_bottom'] != ''){
    $border_bottom = 'border-bottom: '.$atts['border_bottom'].'; ';
}

$class = '';
if($atts['custom_class'] != ''){
    $class .= ' '.$atts['custom_class'].' ';
}

$id = '';
if($atts['custom_id'] != ''){
    $id = 'id="'.  esc_attr($atts['custom_id']).'"';
}

$margin_top = '';
if($atts['margin_top'] != ''){
    $margin_top = 'margin-top: '.$atts['margin_top'].'px; ';
}

$margin_bottom = '';
if($atts['margin_bottom'] != ''){
    $margin_bottom = 'margin-bottom: '.$atts['margin_bottom'].'px; ';
}

$is_half_img = 2;
if(isset($atts['is_half_img']) && $atts['is_half_img'] != ''){
    $is_half_img = $atts['is_half_img'];
}

$half_position = '';
if(isset($atts['half_position']) && $atts['half_position'] != ''){
    $half_position = $atts['half_position'];
}

$half_image = array();
$h_img = '';
if(isset($atts['half_image']) && $atts['half_image']){
    $half_image = $atts['half_image'];
}
if(is_array($atts['half_image']) && isset($atts['half_image']['url']) && $atts['half_image']['url'] != ''){
    $h_img = $atts['half_image']['url'];
}

$is_absolute = 2;
if(isset($atts['is_absolute']) && $atts['is_absolute'] != ''){
    $is_absolute = $atts['is_absolute'];
}
if($is_absolute == 1)
{
    $class .= 'abslSections';
}


?>
<?php if($is_banner == 1): ?>
<section class="banner_section  <?php echo esc_attr($class); ?>" style="<?php echo esc_attr($margin_top . $margin_bottom . $background_color. $background_image. $background_position. $background_repeat. $background_size. $padding_bottom. $padding_left. $padding_right. $padding_top. $border_bottom. $border_top); ?>" <?php echo $id; ?>>
    <?php echo do_shortcode( $content ); ?>
</section>
<?php elseif($is_fullwidth == 1): ?>
    <section class="comonSection <?php if($is_half_img == 1){ echo 'halfimagesection'; } ?> <?php echo esc_attr($class); ?> <?php if($is_overlay == 1){ echo 'overlaySec'; } ?>" style="<?php echo esc_attr($background_attachment . $margin_top . $margin_bottom . $background_color. $background_image. $background_position. $background_repeat. $background_size. $padding_bottom. $padding_left. $padding_right. $padding_top. $border_bottom. $border_top); ?>" <?php echo $id; ?>>
        <?php if($is_half_img == 1): ?>
        <div class="halfImg <?php echo esc_attr($half_position); ?>">
            <img src="<?php echo esc_url($h_img); ?>" alt="">
        </div>
        <?php endif; ?>
        <?php if($is_overlay == 1): ?><div class="overlay" style="<?php echo esc_attr($overlay_color); ?>"></div><?php endif; ?>
        <div class="container-fluid">
            <?php echo do_shortcode( $content ); ?>
        </div>
    </section>
<?php else: ?>
<section class="comonSection <?php if($is_half_img == 1){ echo 'halfimagesection'; } ?> <?php echo esc_attr($class); ?> <?php if($is_overlay == 1){ echo 'overlaySec'; } ?>" style="<?php echo esc_attr($background_attachment . $margin_top . $margin_bottom . $background_color. $background_image. $background_position. $background_repeat. $background_size. $padding_bottom. $padding_left. $padding_right. $padding_top. $border_bottom. $border_top); ?>" <?php echo $id; ?>>
    <?php if($is_half_img == 1): ?>
        <div class="halfImg <?php echo esc_attr($half_position); ?>">
            <img src="<?php echo esc_url($h_img); ?>" alt="">
        </div>
    <?php endif; ?>
    <?php if($is_overlay == 1): ?><div class="overlay" style="<?php echo esc_attr($overlay_color); ?>"></div><?php endif; ?>
    <div class="container">
        <?php echo do_shortcode( $content ); ?>
    </div>
</section>
<?php endif; ?>