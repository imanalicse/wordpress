<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
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

$height = '';
if ( ! empty( $atts['height'] )) {
    $height =  'height: '.$atts['height'].'px !important;';
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
<section class="videoSection" style="<?php echo esc_attr($height); ?>">
    <div class="videoOver" style="<?php echo esc_attr($cover_overlay); ?>"></div>
    <div id="videoWrap1">
        <video id="myVideo1" muted="" loop="" poster="<?php echo esc_url($cover); ?>">
            <source src="<?php echo esc_url($video); ?>" type="video/mp4"></source>
        </video>
    </div>
    <div class="vidContent" style="<?php echo esc_attr($padding_top . $padding_bottom); ?>">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-8 col-xs-12 text-left">
                    <?php if($heading != ''): ?>
                    <h2 style="<?php echo esc_attr($heading_color); ?>">
                        <?php echo esc_html($heading); ?>
                    </h2>
                    <?php endif; ?>
                    <div class="clearfix"></div>
                    <a href="javascript:void('0')" id="playVideos">
                    </a>
                    <?php if($hints != ''): ?>
                    <p style="<?php echo esc_attr($hints_color); ?>"><?php echo esc_html($hints); ?></p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>