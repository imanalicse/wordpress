<?php
if (!defined('FW'))
{
   die('Forbidden');
}

$styles = '';
if ($atts['styles'] != '')
{
   $styles = $atts['styles'];
}

$testimonials = array();
if ($atts['testimonials'] != '')
{
   $testimonials = $atts['testimonials'];
}
?>
<?php if ($styles == 2): ?>
   <?php
   if (is_array($testimonials) && count($testimonials) > 0)
   {
      ?>
      <section class="TestomonialTwo">
         <div class="container">
            <div class="row">
               <div class="col-sm-10 col-sm-offset-2">
                  <div class="testmonialTwoCarowsel">
                     <?php
                     foreach ($testimonials as $tes)
                     {
                        $img = 'http://placehold.it/90x90';
                        if (isset($tes['client_img']['attachment_id']) && $tes['client_img']['attachment_id'] != '')
                        {
                           $client_img = wp_get_attachment_image_src($tes['client_img']['attachment_id'], 'author');
                           $img = $client_img[0];
                        }
                        $content_color = '';
                        if ($tes['content_color'] != '')
                        {
                           $content_color = 'color: ' . $tes['content_color'] . '; ';
                        }
                        $name_color = '';
                        if ($tes['name_color'] != '')
                        {
                           $name_color = 'color: ' . $tes['name_color'] . '; ';
                        }
                        $des_color = '';
                        if ($tes['des_color'] != '')
                        {
                           $des_color = 'color: ' . $tes['des_color'] . '; ';
                        }
                        $author_name = $tes['author_name'];
                        $author_name = title_style($author_name);
                        ?>
                        <div class="singleTestTwo">
                           <div class="testiImg pull-left">
                              <img src="<?php echo esc_url($img); ?>" alt="<?php echo wp_kses($author_name, array('b' => array(),'span'=>array())); ?>">
                           </div>
                           <div class="testDeg pull-left">
                              <h3 class="titleTwo"><?php echo wp_kses($author_name, array('b' => array(),'span'=>array())); ?></h3>
                              <p style="<?php echo esc_attr($des_color); ?>"><?php echo esc_html($tes['positions']); ?></p>
                              <div class="testdec">
                                 <p style="<?php echo esc_attr($content_color); ?>"><?php echo strip_tags($tes['content'], '<br><br/><span><strong>'); ?></p>
                              </div>
                           </div>
                        </div>
                        <?php
                     }
                     ?>

                  </div>
               </div>
            </div>
         </div>
      </section>
      <?php
   }
   ?>
<?php else: ?>
   <?php
   if (is_array($testimonials) && count($testimonials) > 0)
   {
      ?>
      <section class="testimonialArea">
         <div class="container">
            <div class="row">
               <div class="col-sm-10 col-sm-offset-1 text-center">
                  <div id="testiCarousel">
                     <?php
                     foreach ($testimonials as $tes)
                     {
                        $img = 'http://placehold.it/90x90';
                        if (isset($tes['client_img']['attachment_id']) && $tes['client_img']['attachment_id'] != '')
                        {
                           $client_img = wp_get_attachment_image_src($tes['client_img']['attachment_id'], 'author');
                           $img = $client_img[0];
                        }
                        $content_color = '';
                        if ($tes['content_color'] != '')
                        {
                           $content_color = 'color: ' . $tes['content_color'] . '; ';
                        }
                        $name_color = '';
                        if ($tes['name_color'] != '')
                        {
                           $name_color = 'color: ' . $tes['name_color'] . '; ';
                        }
                        $des_color = '';
                        if ($tes['des_color'] != '')
                        {
                           $des_color = 'color: ' . $tes['des_color'] . '; ';
                        }
                        $author_name = $tes['author_name'];
                        $author_name = title_style($author_name);
                        ?>

                        <div class="testimonialContent">
                           <div class="testiImg">
                              <img src="<?php echo esc_url($img); ?>" alt="<?php echo wp_kses($author_name, array('b' => array())); ?>">
                           </div>
                           <h3 class="titleTwo"  style="<?php echo esc_attr($name_color); ?>"><?php echo wp_kses($author_name, array('b' => array())); ?></h3>
                           <p style="<?php echo esc_attr($des_color); ?>"><?php echo esc_html($tes['positions']); ?></p>
                           <div class="testiQoute">
                              <p style="<?php echo esc_attr($content_color); ?>">
                                 <?php echo strip_tags($tes['content'], '<br><br/><span><strong>'); ?>
                              </p>
                           </div>
                        </div>
                        <?php
                     }
                     ?>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <?php
   }
   ?>

<?php endif; ?>
