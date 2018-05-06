<?php if (!defined('FW'))
{
die('Forbidden');
}

$banner_bg = '';
if(is_array($atts['banner_bg']) && isset($atts['banner_bg']['url']) && $atts['banner_bg']['url'] != ''){
    $banner_bg = 'background-image: url('.esc_url($atts['banner_bg']['url']).'); background-repeat: no-repeat; background-position: center center; background-size: cover; ';
}

$banner_overlay = '';
if($atts['banner_overlay'] != ''){
    $banner_overlay = 'background-color: '.$atts['banner_overlay'].'; ';
}

$con_position = '';
if($atts['con_position'] != ''){
    $con_position = $atts['con_position'];
}

$banner_sub = '';
if($atts['banner_sub'] != ''){
    $banner_sub = $atts['banner_sub'];
}

$sub_color = '';
if($atts['sub_color'] != ''){
    $sub_color = 'color: '.$atts['sub_color'].'; ';
}

$banner_title = '';
if($atts['banner_title'] != ''){
    $banner_title = $atts['banner_title'];
}

$title_color = '';
if($atts['title_color'] != ''){
    $title_color = 'color: '.$atts['title_color'].'; ';
}

$button_style = 1;
if($atts['button_style'] != ''){
    $button_style = $atts['button_style'];
}

$button_label = '';
if($atts['button_label'] != ''){
    $button_label = $atts['button_label'];
}

$button_link = '#';
if($atts['button_link'] != ''){
    $button_link = $atts['button_link'];
}

?>
<section class="banner3 halfOverlay banners" style="<?php echo esc_attr($banner_bg); ?>">
    <div class="banOverlays <?php echo 'banOv_'.esc_attr($con_position); ?>" style="<?php echo esc_attr($banner_overlay); ?>"></div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6 col-sm-12 pull-<?php echo esc_attr($con_position); ?> noPadding">
                <div class="bancon3 slContent">
                    <?php if($banner_sub != ''): ?>
                    <p style="<?php echo esc_attr($sub_color); ?>"><?php echo esc_html($banner_sub); ?></p>
                    <?php endif; ?>
                    <?php if($banner_title != ''): ?>
                    <h2>
                        <?php echo strip_tags($banner_title, '<a><br/><br><span>'); ?>
                    </h2>
                    <?php endif; ?>
                    <?php if($button_style == 2): ?>
                        <a href="<?php echo esc_url($button_link); ?>" class="martin_btn btn_black marginRight"><i><?php echo esc_html($button_label); ?></i><span></span></a>
                    <?php elseif($button_style == 3): ?>
                        <a href="<?php echo esc_url($button_link); ?>" class="martin_btn btn_blue hover_black"><i><?php echo esc_html($button_label); ?></i><span></span></a>
                    <?php elseif($button_style == 4): ?>
                        <a href="<?php echo esc_url($button_link); ?>" class="martin_btn hover_black"><i><?php echo esc_html($button_label); ?></i><span></span></a>
                    <?php elseif($button_style == 5): ?>
                        <a href="<?php echo esc_url($button_link); ?>" class="martin_btn btn_dark2"><i><?php echo esc_html($button_label); ?></i><span></span></a>
                    <?php elseif($button_style == 6): ?>
                        <a class="martin_btn btn_blue" href="<?php echo esc_url($button_link); ?>"><i><?php echo esc_html($button_label); ?></i><span></span></a>
                    <?php elseif($button_style == 7): ?>
                        <a class="martin_btn noBG slRighta" href="<?php echo esc_url($button_link); ?>"><i><?php echo esc_html($button_label); ?></i><span></span></a>
                    <?php else: ?>
                        <a href="<?php echo esc_url($button_link); ?>" class="martin_btn hover_white"><i><?php echo esc_html($button_label); ?></i><span></span></a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>