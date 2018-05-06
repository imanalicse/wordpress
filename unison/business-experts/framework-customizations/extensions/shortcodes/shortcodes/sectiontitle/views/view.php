<?php
if (!defined('FW'))
{
   die('Forbidden');
}
/*
  view process
 */

$sec_title = '';
if ($atts['sec_title'] != '')
{
   $sec_title = $atts['sec_title'];
}

$sec_subtitle = '';
if ($atts['sec_subtitle'] != '')
{
   $sec_subtitle = $atts['sec_subtitle'];
}

$title_color = '';
if ($atts['title_color'] != '')
{
   $title_color = 'color: ' . $atts['title_color'] . '; ';
}

$subtitle_color = '';
if ($atts['subtitle_color'] != '')
{
   $subtitle_color = 'color: ' . $atts['subtitle_color'] . '; ';
}

$margin_top = '';
if ($atts['margin_top'] != '')
{
   $margin_top = 'martin-top: ' . $atts['margin_top'] . '; ';
}

$margin_bottom = '';
if ($atts['margin_bottom'] != '')
{
   $margin_bottom = 'martin-bottom: ' . $atts['margin_bottom'] . '; ';
}

$text_align = '';
if ($atts['text_align'] != '')
{
   $text_align = 'text-align: ' . $atts['text_align'] . '; ';
}
$sec_title = title_style($sec_title);
?>

<div class="text-center" style="<?php echo esc_attr($margin_bottom . $margin_top . $text_align); ?>">
   <span class="line"></span>
   <?php if ($sec_title != ''): ?>
   <h2 class="sectionTitle white" style="<?php echo esc_attr($title_color); ?>"><?php echo wp_kses($sec_title, array('b' => array(),'span'=>array())); ?></h2>
   <?php endif; ?>
   <?php if ($sec_subtitle != ''): ?>
   <p class="sectionSubtitle" style="<?php echo esc_attr($subtitle_color); ?>"><?php echo strip_tags($sec_subtitle, '<a><br/><b><strong><span>'); ?></p>
   <?php endif; ?>
</div>