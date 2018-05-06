<?php
if (!defined('FW'))
{
   die('Forbidden');
}

/* view process in style button bar */

$button_style = 1;
if ($atts['button_style'] != '')
{
   $button_style = $atts['button_style'];
}

$button_label = '';
if ($atts['button_label'] != '')
{
   $button_label = $atts['button_label'];
}

$button_link = '#';
if ($atts['button_link'] != '')
{
   $button_link = $atts['button_link'];
}

$margin_top = '';
if ($atts['margin_top'] != '')
{
   $margin_top = 'margin-top: ' . $atts['margin_top'] . 'px; ';
}

$margin_bottom = '';
if ($atts['margin_bottom'] != '')
{
   $margin_bottom = 'margin-bottom: ' . $atts['margin_bottom'] . 'px; ';
}

$margin_left = '';
if (isset($atts['margin_left']) && $atts['margin_left'] != '')
{
   $margin_left = 'margin-left: ' . $atts['margin_left'] . 'px; ';
}

$margin_right = '';
if (isset($atts['margin_right']) && $atts['margin_right'] != '')
{
   $margin_right = 'margin-right: ' . $atts['margin_right'] . 'px; ';
}
?>
<a style="<?php echo esc_attr($margin_bottom . $margin_top . $margin_left . $margin_right); ?>"  href="<?php echo esc_url($button_link); ?>" class="defaultButton"><?php echo esc_html($button_label); ?></a>
