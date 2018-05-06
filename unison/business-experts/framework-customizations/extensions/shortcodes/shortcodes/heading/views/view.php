<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$heading_type = 'h1';
if ($atts['heading_type'] != '') {
	$heading_type =  $atts['heading_type'];
}
$heading_text = '';
if ($atts['heading_text'] != '') {
	$heading_text =  $atts['heading_text'];
}

$font_size = '';
if ( $atts['font_size'] != '') {
	$font_size =  'font-size: '.$atts['font_size'].'px; ';
}

$heading_color = '';
if ( isset($atts['heading_color']) && $atts['heading_color'] != '') {
	$heading_color =  'color: '.$atts['heading_color'].'; ';
}

$font_weight = '';
if ( $atts['font_weight'] != '') {
	$font_weight =  'font-weight: '.$atts['font_weight'].'; ';
}

$text_align = '';
if ( $atts['text_align'] != '') {
	$text_align =  'text-align: '.$atts['text_align'].'; ';
}

$text_transform = '';
if ( $atts['text_transform'] != '') {
	$text_transform =  'text-transform: '.$atts['text_transform'].'; ';
}

$margin_top = '';
if ( $atts['margin_top'] != '') {
	$margin_top =  'margin-top: '.$atts['margin_top'].'px; ';
}

$margin_bottom = '';
if ( $atts['margin_bottom'] != '') {
	$margin_bottom =  'margin-bottom: '.$atts['margin_bottom'].'px; ';
}

$margin_right = '';
if ( $atts['margin_right'] != '') {
	$margin_right =  'margin-right: '.$atts['margin_right'].'px; ';
}

$margin_left = '';
if ( $atts['margin_left'] != '') {
	$margin_left =  'margin-left: '.$atts['margin_left'].'px; ';
}

$line_height = '';
if ( $atts['line_height'] != '') {
	$line_height =  'line-height: '.$atts['line_height'].'px; ';
}

?>
<div class="aboutCont">
<<?php echo esc_attr($heading_type);?> class="" style="<?php echo esc_attr($margin_left . $margin_right . $font_weight . $font_size . $heading_color . $text_align . $text_transform . $margin_bottom . $margin_top . $line_height) ?>"><?php echo esc_html($heading_text); ?></<?php echo esc_attr($heading_type);?>>
</div>
