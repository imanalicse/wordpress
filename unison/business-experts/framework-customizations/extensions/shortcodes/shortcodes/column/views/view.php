<?php if (!defined('FW')) die('Forbidden');

$class = fw_ext_builder_get_item_width('page-builder', $atts['width'] . '/frontend_class');

if ( ! empty( $atts['custom_class'] ) ) {
    $class .= ' '.$atts['custom_class'];
}

if($atts['col_resonsive'] != '')
{
    $class .= ' '.$atts['col_resonsive'].' ';
}

if(isset($atts['col_resonsive2']) && $atts['col_resonsive2'] != ''){
    $class .= ' '.$atts['col_resonsive2'].' ';
}

if(isset($atts['col_pull']) && $atts['col_pull'] != '')
{
    $class .= ' '.$atts['col_pull'].' ';
}

if($atts['col_offset'] != '')
{
    $class .= ' '.$atts['col_offset'].' ';
}

$text_align = '';
if (!empty($atts['text_align'])) {
    $text_align = 'text-align: ' . $atts['text_align'] . '!important; ';
}

$background_color = '';
if ( ! empty( $atts['background_color'] ) ) {
    $background_color = 'background-color: ' . $atts['background_color'] . '; ';
}

if ( ! empty( $atts['col_animation'] ) ) {
    $class .= ' wow '.esc_attr($atts['col_animation']);
}

$animation_delay = '';
if ( ! empty( $atts['animation_delay'] ) && $atts['col_animation'] != '') {
    $animation_delay = ' data-wow-duration="700ms" data-wow-delay="'.esc_attr($atts['animation_delay']).'ms" ';
}


$padding_top = '';
if ( ! empty( $atts['padding_top'] )) {
    $padding_top = 'padding-top:' . $atts['padding_top'] . 'px; ';
}

$padding_left = '';
if ($atts['padding_left'] != '') {
    $padding_left = 'padding-left:' . $atts['padding_left'] . 'px; ';
}

$padding_right = '';
if ( $atts['padding_right'] != '') {
    $padding_right = 'padding-right:' . $atts['padding_right'] . 'px; ';
}

$padding_bottom = '';
if ( ! empty( $atts['padding_bottom'] )) {
    $padding_bottom = 'padding-bottom:' . $atts['padding_bottom'] . 'px; ';
}

$text_color = '';
if ( ! empty( $atts['text_color'] )) {
    $text_color = 'color: ' . $atts['text_color'] . ' !important; ';
}

$border_left = '';
if ( ! empty( $atts['border_left'] )) {
    $border_left = 'border-left: ' . $atts['border_left'] . '; ';
}

$border_top = '';
if ( ! empty( $atts['border_top'] )) {
    $border_top = 'border-top: ' . $atts['border_top'] . '; ';
}

$border_right = '';
if ( ! empty( $atts['border_right'] )) {
    $border_right = 'border-right: ' . $atts['border_right'] . '; ';
}

$border_bottom = '';
if ( ! empty( $atts['border_bottom'] )) {
    $border_bottom = 'border-bottom: ' . $atts['border_bottom'] . '; ';
}


$background_image = '';
if ( ! empty( $atts['col_background_image'] ) && ! empty( $atts['col_background_image']['attachment_id'] ) ) {
        $thumbs = wp_get_attachment_image_src( $atts['col_background_image']['attachment_id'], 'full' );
        if(isset($thumbs[0]) && $thumbs[0] != ''):
	$background_image = 'background-image:url(' . $thumbs[0] . '); ';
        endif;
}

$background_repeat = '';
if($atts['col_background_repeat'] != ''){
    $background_repeat = 'background-repeat: '.$atts['col_background_repeat'].'; ';
}

$background_size = '';
if($atts['col_background_size'] != ''){
    $background_size = 'background-size: '.$atts['col_background_size'].'; ';
}

$background_position = '';
if($atts['col_background_position'] != ''){
    $background_position = 'background-position: '.$atts['col_background_position'].'; ';
}

$background_attachment = '';
if($atts['col_background_attachment'] != ''){
    $background_attachment = 'background-attachment: '.$atts['col_background_attachment'].'; ';
}

$is_overlay = 2;
if($atts['col_is_overlay'] != ''){
    $is_overlay = $atts['col_is_overlay'];
}

$overlay_color = '';
if($atts['col_overlay_color'] != ''){
    $overlay_color = 'background: '.$atts['col_overlay_color'].'; ';
}

$column_style = ($background_image || $background_repeat || $background_size || $background_position || $background_attachment || $background_color || $text_align || $padding_top || $padding_left || $padding_right || $padding_bottom || $text_color || $border_left || $border_top || $border_right || $border_bottom)
        ? ' '. $background_image . $background_repeat . $background_size . $background_position . $background_attachment . $background_color . $text_align . $padding_top . $padding_left . $padding_right . $padding_bottom . $text_color . $border_left . $border_top . $border_right . $border_bottom . ' ' 
        : '';

?>
<div class="<?php echo esc_attr($class); ?>" style="<?php echo esc_attr($column_style); ?>" <?php echo $animation_delay; ?>>
    <?php if($is_overlay == 1): ?><div class="overlay" style="<?php echo esc_attr($overlay_color); ?>"></div><?php endif; ?>
    <?php echo do_shortcode($content); ?>
</div>
