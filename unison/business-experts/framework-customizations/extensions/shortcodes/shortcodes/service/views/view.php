<?php
if (!defined('FW'))
{
   die('Forbidden');
}
$service_style = ($atts['service_style'] != '') ? $atts['service_style'] : 1;
$sidebar_title = ($atts['sidebar_title'] != '') ? $atts['sidebar_title'] : '';
$sidebar_subtitle = ($atts['sidebar_subtitle'] != '') ? $atts['sidebar_subtitle'] : '';
$sidebar_content = ($atts['sidebar_content'] != '') ? $atts['sidebar_content'] : '';
$sidebar_image = (isset($atts['sidebar_image']['url']) && $atts['sidebar_image']['url'] != '') ? $atts['sidebar_image']['url'] : '#';
$sidebar_color = ($atts['sidebar_color'] != '') ? $atts['sidebar_color'] : '#fff';
$services_link = ($atts['services_link'] != '') ? $atts['services_link'] : '#';
$services = ($atts['services'] != '') ? $atts['services'] : array();
$sidebar_title = title_style($sidebar_title);

if (is_array($services) && count($services) > 0)
{
   if ($service_style == 2)
   {
      ?>
      <section class="ourServicesArea servicesTwo">
         <div class="servicRight pull-left"  style="background:<?php echo esc_attr($sidebar_color); ?> url(<?php echo esc_url($sidebar_image); ?>) repeat scroll center center">
            <span class="line"></span>
            <h2 class="sectionTitle"><?php echo wp_kses($sidebar_title, array('b' => array(), 'span' => array())); ?></h2>
            <p class="sectionSubtitle"><?php echo wp_kses($sidebar_subtitle, array()); ?></p>
            <div class="serviceContent">
               <p>
                  <?php echo wp_kses($sidebar_content, array()); ?>
               </p>
               <a href="<?php echo esc_url($services_link); ?>" class="defaultButton">All Services</a>
            </div>
         </div>
         <div class="servicesWrap">
            <?php
            foreach ($services as $service)
            {
               $icon = ($service['icon'] != '') ? $service['icon'] : '';
               $title = ($service['title'] != '') ? title_style($service['title']) : '';
               $title_color = ($service['title_color'] != '') ? 'color:' . $service['title_color'] : '';
               $subtitle = ($service['subtitle'] != '') ? title_style($service['subtitle']) : '';
               $content = ($service['content'] != '') ? $service['content'] : '';
               ?>
               <div class="services_single">
                  <div class="services_front">
                     <i class="<?php echo esc_attr($icon); ?>"></i>
                     <h4 style="<?php echo esc_attr($title_color); ?>"><?php echo wp_kses($title, array('b' => array(), 'span' => array())); ?></h4>
                  </div>
                  <div class="services_back">
                     <i class="<?php echo esc_attr($icon); ?>"></i>
                     <h4><?php echo wp_kses($subtitle, array('b' => array(), 'span' => array())); ?></h4>
                     <p><?php echo wp_kses($content, array()); ?></p>
                  </div>
               </div>

               <?php
            }
            ?>
         </div>

      </section>
      <?php
   } elseif ($service_style == 3)
   {
      ?>
      <section class="ourServicessHori">
         <div class="container">
            <div class="row">
               <div class="col-sm-12 text-center">
                  <span class="line"></span>
                  <h2 class="sectionTitle white"><?php echo wp_kses($sidebar_title, array('b' => array(), 'span' => array())); ?></h2>
                  <p class="sectionSubtitle"><?php echo wp_kses($sidebar_subtitle, array()); ?></p>
               </div>
            </div>
            <div class="row">
               <div class="col-sm-12">
                  <?php
                  $loop = 0;
                  foreach ($services as $service)
                  {
                     $icon = ($service['icon'] != '') ? $service['icon'] : '';
                     $title = ($service['title'] != '') ? title_style($service['title']) : '';
                     $title_color = ($service['title_color'] != '') ? 'color:' . $service['title_color'] : '';
                     $content = ($service['content'] != '') ? $service['content'] : '';
                     $link = ($service['link'] != '') ? $service['link'] : '#';
                     $even_odd_check = ($loop % 2 == 0) ? true : false;
                     ?>                 
                     <div class="singleHoriservicess clearfix">
                        <div class="singleHoIn pull-left text-right wow fadeInLeft" data-wow-delay="300ms" data-wow-duration="700ms">
                           <?php
                           if ($even_odd_check)
                           {
                              ?>
                              <h3 style="<?php echo esc_attr($title_color); ?>"><a href="<?php echo esc_url($link); ?>"><?php echo wp_kses($title, array('b' => array(), 'span' => array())); ?></a></h3>
                              <?php
                           } else
                           {
                              ?>
                              <p class="pull-left"><?php echo wp_kses($content, array()); ?></p>
                              <?php
                           }
                           ?>
                        </div>
                        <div class="featureIcon pull-left">
                           <i class="<?php echo esc_attr($icon); ?>"></i>
                        </div>
                        <div class="singleHoIn pull-left wow fadeInRight" data-wow-delay="350ms" data-wow-duration="700ms">
                           <?php
                           if ($even_odd_check)
                           {
                              ?>
                              <p class="pull-left"><?php echo wp_kses($content, array()); ?></p>
                              <?php
                           } else
                           {
                              ?>
                              <h3 style="<?php echo esc_attr($title_color); ?>"><a href="#"><?php echo wp_kses($title, array('b' => array(), 'span' => array())); ?></a></h3>
                              <?php
                           }
                           ?>
                        </div>
                     </div>
                     <?php
                     $loop++;
                  }
                  ?>

               </div>
            </div>
         </div>
      </section>
      <?php
   } else
   {
      ?>
      <section class="ourServicesArea">
         <div class="servicesWrap">
            <?php
            foreach ($services as $service)
            {
               $icon = ($service['icon'] != '') ? $service['icon'] : '';
               $title = ($service['title'] != '') ? title_style($service['title']) : '';
               $title_color = ($service['title_color'] != '') ? 'color:' . $service['title_color'] : '';
               $subtitle = ($service['subtitle'] != '') ? title_style($service['subtitle']) : '';
               $content = ($service['content'] != '') ? $service['content'] : '';
               $link = ($service['link'] != '') ? $service['link'] : '#';
               ?>
               <div class="services_single">
                  <div class="services_front">
                     <i class="<?php echo esc_attr($icon); ?>"></i>
                     <h4 style="<?php echo esc_attr($title_color); ?>"><?php echo wp_kses($title, array('b' => array(), 'span' => array())); ?></h4>
                  </div>
                  <div class="services_back">
                     <i class="<?php echo esc_attr($icon); ?>"></i>
                     <h4><?php echo wp_kses($subtitle, array('b' => array(), 'span' => array())); ?></h4>
                     <p><?php echo wp_kses($content, array()); ?></p>
                  </div>
               </div>

               <?php
            }
            ?>
         </div>
         <div class="servicRight" style="background:<?php echo esc_attr($sidebar_color); ?> url(<?php echo esc_url($sidebar_image); ?>) repeat scroll center center">
            <span class="line"></span>
            <h2 class="sectionTitle"><?php echo wp_kses($sidebar_title, array('b' => array(), 'span' => array())); ?></h2>
            <p class="sectionSubtitle"><?php echo wp_kses($sidebar_subtitle, array()); ?></p>
            <div class="serviceContent">
               <p>
                  <?php echo wp_kses($sidebar_content, array()); ?>
               </p>
               <a href="<?php echo esc_url($services_link); ?>" class="defaultButton">All Services</a>
            </div>
         </div>
      </section>
      <?php
   }
}
   