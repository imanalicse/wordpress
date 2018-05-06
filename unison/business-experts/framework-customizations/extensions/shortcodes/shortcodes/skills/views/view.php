<?php if (!defined('FW')) die('Forbidden'); ?>
<?php
/*
 * the `.fw-tabs-container` div also supports
 * a `tabs-justified` class, that strethes the tabs
 * to the width of the whole container
 */
$styles = 1;
if ($atts['styles'] != '')
{
   $styles = $atts['styles'];
}
$title = '';
if ($atts['title'] != '')
{
   $title = $atts['title'];
}

$title_color = '';
if ($atts['title_color'] != '')
{
   $title_color = 'color: ' . $atts['title_color'] . '; ';
}

$skill_percent = '';
if ($atts['skill_percent'] != '')
{
   $skill_percent = $atts['skill_percent'];
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
if ($styles == 2)
{
   ?>
   <div class="wow fadeInUp" data-wow-delay="300ms" data-wow-duration="700ms" style="<?php echo esc_attr($margin_top . $margin_bottom); ?>">
      <div class="singleSkill">
         <div class="chart" data-percent="<?php echo esc_attr($skill_percent); ?>">
            <p><?php echo esc_attr($skill_percent); ?><span>%</span></p>
         </div>
         <?php
         $title = title_style($title);
         if ($title != '')
         {
            ?>
            <h4 style="<?php echo esc_attr($title_color); ?>"><?php echo wp_kses($title, array('b' => array(), 'span' => array())); ?></h4>
            <?php
         }
         ?>
      </div>
   </div>
   <?php
} else
{
   ?>
   <div class="skill_set">
      <div class="singleSkill" data-limit="<?php echo esc_attr($skill_percent); ?>" style="<?php echo esc_attr($margin_top . $margin_bottom); ?>">
         <?php
         if ($title != '')
         {
            ?>
            <h5 style="<?php echo esc_attr($title_color); ?>"><?php echo esc_html($title); ?></h5>
            <?php
         }
         ?>
         <div class="skHolder2">
            <div class="skill" style="width:0;"></div>
         </div>
      </div>
   </div>
   <?php
}
?>