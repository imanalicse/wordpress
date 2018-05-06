<?php if (!defined('FW'))
{
die('Forbidden');
}

$video = '';
if ( ! empty( $atts['video'] ) && isset($atts['video']['url']) && $atts['video']['url'] != '') {
    $video =  $atts['video']['url'];
}

$cover = 'http://plachold.it/1920x1080';
if ( ! empty( $atts['cover'] ) && isset($atts['cover']['url']) && $atts['cover']['url'] != '') {
    $cover =  $atts['cover']['url'];
}

$cover_overlay = '';
if($atts['cover_overlay'] != ''){
    $cover_overlay = 'background:'.$atts['cover_overlay'].'; ';
}

$sub_title = '';
if($atts['sub_title'] != ''){
    $sub_title = $atts['sub_title'];
}

$sub_heading_color = '';
if ( ! empty( $atts['sub_heading_color'] )) {
    $sub_heading_color =  'color: '.$atts['sub_heading_color'].';';
}

$heading = '';
if($atts['heading'] != ''){
    $heading = $atts['heading'];
}

$heading_color = '';
if ( ! empty( $atts['heading_color'] )) {
    $heading_color =  'color: '.$atts['heading_color'].';';
}

$hints = '';
if($atts['hints'] != ''){
    $hints = $atts['hints'];
}

$hints_color = '';
if ( ! empty( $atts['hints_color'] )) {
    $hints_color =  'color: '.$atts['hints_color'].';';
}


$padding_top = '';
if ( ! empty( $atts['padding_top'] )) {
    $padding_top =  'padding-top: '.$atts['padding_top'].'px;';
}

$padding_bottom = '';
if ( ! empty( $atts['padding_bottom'] )) {
    $padding_bottom =  'padding-bottom: '.$atts['padding_bottom'].'px;';
}

?>
<section class="videoBanner">
    <div class="videoBannerOver"></div>
    <div id="videoBannerWrap1">
        <video poster="<?php echo esc_url($cover); ?>" loop="" muted="" id="myBannerVideo1">
            <source type="video/mp4" src="<?php echo esc_url($video); ?>">
        </video>
    </div>
    <div class="vidBannerContent">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 text-left banCon">
                    <?php if($sub_title != ''): ?>
                    <h4 style="<?php echo esc_attr($sub_heading_color); ?>"><?php echo strip_tags($sub_title); ?></h4>
                    <?php endif; ?>
                    <?php if($heading != ''): ?>
                    <h2 style="<?php echo esc_attr($heading_color); ?>">
                        <?php echo esc_attr($heading); ?>
                    </h2>
                    <?php endif; ?>
                    <div class="clearfix"></div>
                    <a id="playBannerVideos" href="javascript:void('0')"></a>
                    <?php if($hints != ''): ?>
                    <p style="<?php echo esc_attr($hints_color); ?>"><?php echo esc_attr($hints); ?></p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>