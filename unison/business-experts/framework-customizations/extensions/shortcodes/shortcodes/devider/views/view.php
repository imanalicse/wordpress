<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
/**
 * @var array $atts
 */


$margin_top = '';
if($atts['margin_top'] != ''){
    $margin_top = 'margin-top: '.$atts['margin_top'].'px; ';
}


$margin_bottom = '';
if($atts['margin_bottom'] != ''){
    $margin_bottom = 'margin-bottom: '.$atts['margin_bottom'].'px; ';
}
?>
<div class="deviders clearfix" style="<?php echo esc_attr($margin_bottom . $margin_top); ?>"></div>