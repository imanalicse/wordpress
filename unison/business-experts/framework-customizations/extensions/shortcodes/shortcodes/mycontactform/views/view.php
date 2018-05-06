<?php
if (!defined('FW'))
{
   die('Forbidden');
}

$form_title = '';
if ($atts['form_title'] != '')
{
   $form_title = title_style($atts['form_title']);
}

$form_sub_title = '';
if ($atts['form_sub_title'] != '')
{
   $form_sub_title = $atts['form_sub_title'];
}

$con_shortcode = '';
if ($atts['con_shortcode'] != '')
{
   $con_shortcode = $atts['con_shortcode'];
}


$bg_color = '';
if ($atts['bg_color'] != '')
{
   $background = 'background: ' . $atts['bg_color'] . '; ';
}
?> 
<section class="dropLineArea"  style="<?php echo esc_attr($bg_color); ?>">
   <div class="container">
      <div class="row">
         <div class="col-sm-12 text-center">
            <span class="line"></span>
            <?php if ($form_title != ''): ?>
               <h2  class="sectionTitle white"><?php echo wp_kses($form_title, array('b' => array(), 'span' => array())); ?></h2>
            <?php endif; ?>
            <?php if ($form_sub_title != ''): ?>
               <p class="sectionSubtitle"><?php echo wp_kses($form_sub_title, array()); ?></p>
            <?php endif; ?>
         </div>
      </div>
      <div class="row">
         <div class="col-sm-8 col-sm-offset-2 col-xs-12 wow fadeInUp" data-wow-delay="300ms" data-wow-duration="700ms">
            <?php echo do_shortcode($con_shortcode); ?>
         </div>
      </div>
   </div>
</section>