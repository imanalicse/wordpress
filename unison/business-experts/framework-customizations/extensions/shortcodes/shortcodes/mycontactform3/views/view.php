<?php
if (!defined('FW'))
{
   die('Forbidden');
}

$info_desc = '';
if ($atts['info_desc'] != '')
{
   $info_desc = $atts['info_desc'];
}

$info_color = '';
if ($atts['info_color'] != '')
{
   $info_color = 'color: ' . $atts['info_color'] . '; ';
}

$info_widget = array();
if (!empty($atts['info_widget']))
{
   $info_widget = $atts['info_widget'];
}

$form_title = '';
if (!empty($atts['form_title']))
{
   $form_title = $atts['form_title'];
}
$form_title = title_style($form_title);

$form_subtitle = '';
if (!empty($atts['form_subtitle']))
{
   $form_subtitle = $atts['form_subtitle'];
}

$con_shortcode = '';
if (!empty($atts['con_shortcode']))
{
   $con_shortcode = $atts['con_shortcode'];
}
?> 
<!-- ========= Contact page ========== -->
<section class="contactInfo">
   <div class="row">
      <div class="col-sm-12">
         <span class="line"></span>
         <?php if ($form_title != ''): ?>
            <h2 class="sectionTitle white"><?php echo wp_kses($form_title,array('b'=>array(),'span'=>array())); ?></h2>
         <?php endif; ?>
         <?php if ($form_subtitle != ''): ?>
            <p class="sectionSubtitle"><?php echo wp_kses($form_subtitle, array()); ?></p>
         <?php endif; ?>
      </div>
   </div>
   <div class="row">
      <div class="col-sm-6">
         <div class="contactInfoLeft">
            <?php if ($info_desc != ''): ?>
               <div class="fotinfoText">
                  <p style="<?php echo esc_attr($info_color); ?>">
                     <?php echo strip_tags($info_desc, '<a><span><strong><br/>'); ?>
                  </p>
               </div>
            <?php endif; ?>
            <?php
            $wc = count($info_widget);
            if (is_array($info_widget) && $wc > 0):
               ?>

               <div class="singleMemDeg">
                  <ul>

                     <?php
                     foreach ($info_widget as $inf)
                     {
                        $info_icon_color = '';
                        $info_title_color = '';
                        $info_content_color = '';
                        if ($inf['info_icon_color'] != '')
                        {
                           $info_icon_color = 'color: ' . $inf['info_icon_color'] . '; ';
                        }
                        if ($inf['info_title_color'] != '')
                        {
                           $info_title_color = 'color: ' . $inf['info_title_color'] . '; ';
                        }
                        if ($inf['info_content_color'] != '')
                        {
                           $info_content_color = 'color: ' . $inf['info_content_color'] . '; ';
                        }
                        ?>
                        <li>
                           <i style="<?php echo esc_attr($info_icon_color); ?>" class="<?php echo esc_attr($inf['info_icon']); ?>"></i>
                           <p  style="<?php echo esc_attr($info_content_color); ?>"><span style="<?php echo esc_attr($info_title_color); ?>"><?php echo esc_html($inf['title']); ?></span><?php echo strip_tags($inf['content'], '<a><b><span><strong><br/>'); ?></p>
                        </li>
                        <?php
                     }
                     ?>
                  </ul>
               </div>
            <?php endif; ?>
         </div>
      </div>
      <div class="col-sm-6">
         <?php echo do_shortcode($con_shortcode); ?>
      </div>
   </div>
</section>