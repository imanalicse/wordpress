<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$paragraph_text = '';
if ($atts['paragraph_text'] != '') {
	$paragraph_text =  $atts['paragraph_text'];
}

$text_color = '';
if ( $atts['text_color'] != '') {
	$text_color =  'color: '.$atts['text_color'].' ; ';
}

$font_styles = 2;
if ( $atts['font_styles'] != '') {
    $font_styles = $atts['font_styles'];
}

$font_size = '';
if ( $atts['font_size'] != '') {
	$font_size =  'font-size: '.$atts['font_size'].'px; ';
}
$line_height = '';
if ( $atts['line_height'] != '') {
	$line_height =  'line-height: '.$atts['line_height'].'px; ';
}
$font_weight = '';
if ( $atts['font_weight'] != '') {
	$font_weight =  'font-weight: '.$atts['font_weight'].'; ';
}

$text_align = '';
if ( $atts['text_align'] != '') {
	$text_align =  'text-align: '.$atts['text_align'].'; ';
}

$margin_top = '';
if ( $atts['margin_top'] != '') {
	$margin_top =  'margin-top: '.$atts['margin_top'].'px; ';
}

$margin_bottom = '';
if ( $atts['margin_bottom'] != '') {
	$margin_bottom =  'margin-bottom: '.$atts['margin_bottom'].'px; ';
}

$padding_left = '';
if ( $atts['padding_left'] != '') {
	$padding_left =  'padding-left: '.$atts['padding_left'].'px; ';
}

$padding_right = '';
if ( $atts['padding_right'] != '') {
	$padding_right =  'padding-right: '.$atts['padding_right'].'px; ';
}

$font_class = '';
if($font_styles == 1)
{
    $font_class = 'spicial_font';
}

$text_style = '';
if(isset($atts['text_style']) && $atts['text_style'] != ''){
    $text_style = 'font-style: '.$atts['text_style'].'; ';
}

$letter_spacing = '';
if(isset($atts['letter_spacing']) && $atts['letter_spacing'] != ''){
    $letter_spacing = 'letter-spacing: '.$atts['letter_spacing'].'px; ';
}

?>

<?php if($paragraph_text != ''): ?>
<p class="<?php echo esc_attr($font_class); ?>" style="<?php echo esc_attr($letter_spacing . $text_style). esc_attr($padding_right) . esc_attr($padding_left). esc_attr($text_color). esc_attr($font_weight) . esc_attr($font_size). esc_attr($line_height).esc_attr($text_align) . esc_attr($margin_top) . esc_attr($margin_top) . esc_attr($margin_bottom); ?>">
    <?php echo strip_tags($paragraph_text, '<a><span><img><br><br/><small><strong><ul><ol><li><b>'); ?>
</p>
<div class="clearfix"></div>
<?php endif; ?>