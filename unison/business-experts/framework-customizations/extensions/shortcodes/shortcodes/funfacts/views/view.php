<?php
if (!defined('FW'))
{
   die('Forbidden');
}
/**
 * @var array $atts
 */
$style = 1;
if ($atts['style'] != '')
{
   $style = $atts['style'];
}
?>
<?php if ($style == 2): ?>
   <section class="funhomeThree funfactsArea">
      <div class="container">
         <div class="row">
            <?php
            if (is_array($atts['funfacts']) && count($atts['funfacts']) > 0)
            {
               foreach ($atts['funfacts'] as $fact)
               {
                  $icon = '';
                  if ($fact['icon'] != '')
                  {
                     $icon = $fact['icon'];
                  }
                  $amount = '';
                  if ($fact['amount'] != '')
                  {
                     $amount = $fact['amount'];
                  }

                  $fact_title = '';
                  if ($fact['fact_title'] != '')
                  {
                     $fact_title = $fact['fact_title'];
                  }

                  $amount_color = '';
                  if ($fact['amount_color'] != '')
                  {
                     $amount_color = 'color: ' . $fact['amount_color'] . '; ';
                  }

                  $title_color = '';
                  if ($fact['title_color'] != '')
                  {
                     $title_color = 'color: ' . $fact['title_color'] . '; ';
                  }

                  $margin_top = '';
                  if ($fact['margin_top'] != '')
                  {
                     $margin_top = 'margin-top: ' . $fact['margin_top'] . 'px; ';
                  }

                  $margin_bottom = '';
                  if ($fact['margin_bottom'] != '')
                  {
                     $margin_bottom = 'margin-bottom: ' . $fact['margin_bottom'] . 'px; ';
                  }

                  $text_align = '';
                  if ($fact['text_align'] != '')
                  {
                     $text_align = 'text-align: ' . $fact['text_align'] . '; ';
                  }
                  ?>
                  <div class="col-md-3 col-sm-6 text-center wow fadeInUp" data-wow-delay="300ms" data-wow-duration="700ms" style="<?php echo esc_attr($margin_top . $margin_bottom . $text_align); ?>">
                     <div class="funfactsContent">
                        <?php if ($icon != ''): ?>
                           <i class="<?php echo esc_attr($icon); ?>"></i>
                        <?php endif; ?>
                        <div class="funFact-content-Group">
                           <?php if ($amount != ''): ?>
                              <h1 class="count" data-counter="<?php echo esc_attr($amount); ?>" style="<?php echo esc_attr($amount_color); ?>">
                                 <?php echo esc_html($amount); ?>
                              </h1>
                           <?php endif; ?>
                           <?php if ($fact_title != ''): ?>
                              <h3 style="<?php echo esc_attr($title_color); ?>"><?php echo esc_html($fact_title); ?></h3>
                           <?php endif; ?>
                        </div>
                     </div>
                  </div>             
                  <?php
               }
            }
            ?>

         </div>
      </div>
   </section>
<?php else: ?>
   <section class="funfactsArea">
      <div class="container">
         <div class="row">
            <div class="col-sm-12 text-left col-xs-12">
               <?php
               if (is_array($atts['funfacts']) && count($atts['funfacts']) > 0)
               {
                  foreach ($atts['funfacts'] as $fact)
                  {
                     $icon = '';
                     if ($fact['icon'] != '')
                     {
                        $icon = $fact['icon'];
                     }
                     $amount = '';
                     if ($fact['amount'] != '')
                     {
                        $amount = $fact['amount'];
                     }

                     $fact_title = '';
                     if ($fact['fact_title'] != '')
                     {
                        $fact_title = $fact['fact_title'];
                     }

                     $amount_color = '';
                     if ($fact['amount_color'] != '')
                     {
                        $amount_color = 'color: ' . $fact['amount_color'] . '; ';
                     }

                     $title_color = '';
                     if ($fact['title_color'] != '')
                     {
                        $title_color = 'color: ' . $fact['title_color'] . '; ';
                     }

                     $margin_top = '';
                     if ($fact['margin_top'] != '')
                     {
                        $margin_top = 'margin-top: ' . $fact['margin_top'] . 'px; ';
                     }

                     $margin_bottom = '';
                     if ($fact['margin_bottom'] != '')
                     {
                        $margin_bottom = 'margin-bottom: ' . $fact['margin_bottom'] . 'px; ';
                     }

                     $text_align = '';
                     if ($fact['text_align'] != '')
                     {
                        $text_align = 'text-align: ' . $fact['text_align'] . '; ';
                     }
                     ?>
                     <div class="funfactsContent wow fadeInUp" data-wow-delay="300ms" data-wow-duration="700ms"  style="<?php echo esc_attr($margin_top . $margin_bottom . $text_align); ?>">
                        <?php if ($icon != ''): ?>
                           <i class="<?php echo esc_attr($icon); ?>"></i>
                        <?php endif; ?>
                        <div class="funFact-content-Group">
                           <?php if ($amount != ''): ?>
                              <h1 class="count" data-counter="<?php echo esc_attr($amount); ?>" style="<?php echo esc_attr($amount_color); ?>">
                                 <?php echo esc_html($amount); ?>
                              </h1>
                           <?php endif; ?>
                           <?php if ($fact_title != ''): ?>
                              <h3 style="<?php echo esc_attr($title_color); ?>"><?php echo esc_html($fact_title); ?></h3>
                           <?php endif; ?>
                        </div>
                     </div>
                     <?php
                  }
               }
               ?>
            </div>
         </div>
      </div>
   </section>
<?php endif; ?>
