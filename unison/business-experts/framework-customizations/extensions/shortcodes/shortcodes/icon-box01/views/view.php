<?php
if (!defined('FW'))
{
   die('Forbidden');
}
/**
 * @var array $atts
 */
$icon_bg_color = '';
if ($atts['icon_bg_color'] != '')
{
   $icon_bg_color = 'background-color: ' . $atts['icon_bg_color'] . '; ';
}

$icon = '';
if ($atts['icon'] != '')
{
   $icon = $atts['icon'];
}
$icon_color = '';
if ($atts['icon_color'] != '')
{
   $icon_color = 'color: ' . $atts['icon_color'] . ';';
}

$icon_position = 1;
if ($atts['icon_position'] != '')
{
   $icon_position = $atts['icon_position'];
}

$title = '';
if ($atts['title'] != '')
{
   $title = $atts['title'];
}
$title_color = '';
if ($atts['title_color'] != '')
{
   $title_color = 'color: ' . $atts['title_color'] . ';';
}
$title_link = '#';
if ($atts['title_link'] != '')
{
   $title_link = $atts['title_link'];
}
$title = title_style($title);
$content = '';
if ($atts['content'] != '')
{
   $content = $atts['content'];
}
$cnt_color = '';
if ($atts['cnt_color'] != '')
{
   $cnt_color = 'color: ' . $atts['cnt_color'];
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
$style = ($icon_position == 2) ? "margin-right: 30px; margin-left: 0; text-align:right;" : "";
$single_class = ($icon_position == 3) ? "singleServicessThree  text-center" : "singleFeature";
$content_class = ($icon_position == 3) ? "featureCont" : "featureCont pull-left";
?>

<section class="featureArea" style="<?php echo esc_attr($margin_top . $margin_bottom); ?>">
   <div class="wow fadeInUp" data-wow-delay="300ms" data-wow-duration="700ms">
      <div class="<?php echo esc_attr($single_class); ?>  wow fadeInLeft" data-wow-delay="300ms" data-wow-duration="700ms">
         <?php if ($icon_position == 3): ?>
            <i style="<?php echo esc_attr($icon_color); ?>" class="<?php echo esc_attr($icon); ?>"></i>
         <?php endif; ?>

         <?php if ($icon_position == 1): ?>
            <div class="featureIcon pull-left" style="<?php echo esc_attr($icon_bg_color); ?>">
               <i style="<?php echo esc_attr($icon_color); ?>" class="<?php echo esc_attr($icon); ?>"></i>
            </div>
         <?php endif; ?>
         <div class="<?php echo esc_attr($content_class); ?>" style="<?php echo esc_attr($style); ?>">
            <h3  class="titleTwo">
               <a href="<?php echo esc_url($title_link); ?>" style="<?php echo esc_attr($title_color); ?>">
                  <?php echo wp_kses($title, array('b' => array(), 'span' => array())); ?>
               </a>
            </h3>
            <p style="<?php echo esc_attr($cnt_color); ?>">
               <?php echo wp_kses($content, array()); ?>
            </p>
         </div>
         <?php if ($icon_position == 2): ?>
            <div class="featureIcon pull-left" style="<?php echo esc_attr($icon_bg_color); ?>">
               <i style="<?php echo esc_attr($icon_color); ?>" class="<?php echo esc_attr($icon); ?>"></i>
            </div>
         <?php endif; ?>
         <div class="clearfix"></div>
      </div>
   </div>
</section>
