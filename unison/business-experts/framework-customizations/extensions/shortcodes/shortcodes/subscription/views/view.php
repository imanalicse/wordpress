<?php
if (!defined('FW'))
{
   die('Forbidden');
}

$shortcode_content = '';
if ($atts['shortcode_content'] != '')
{
   $shortcode_content = $atts['shortcode_content'];
}
$title = '';
if ($atts['title'] != '')
{
   $title = $atts['title'];
}
$title_font_size = '';
if ($atts['title_font_size'] != '')
{
   $title_font_size = 'font-size: ' . $atts['title_font_size'] . 'px;';
}
$title_spacing = '';
if ($atts['title_spacing'] != '')
{
   $title_spacing = 'letter-spacing: ' . $atts['title_spacing'] . 'px !important;';
}

$paragrahp = '';
if ($atts['paragrahp'] != '')
{
   $paragrahp = $atts['paragrahp'];
}
$param_font_size = '';
if ($atts['param_font_size'] != '')
{
   $param_font_size = 'font-size:' . $atts['param_font_size'] . 'px;';
}
$text_transform = '';
if ($atts['text_transform'] != '')
{
   $text_transform = 'text-transform: ' . $atts['text_transform'] . ';';
}


$error_messg = '<p>Please Install this MailChimp WP plugin</p>';
?>
<section class="subscribeArea">
   <div class="container">
      <div class="row">
         <div class="col-lg-8 col-lg-offset-2">
            <div class="row">
               <div class="col-sm-6 col-xs-12 noPaddingRight">
                  <p style='<?php echo esc_attr($title_font_size); ?>'><?php echo esc_html($title); ?></p>
               </div>
               <div class="col-sm-6 col-xs-12">
                  <div class="subscribeForm">
                  <?php
                  if (empty($shortcode_content))
                  {
                     echo strip_tags($error_messg, '<p>');
                  } else
                  {
                     echo do_shortcode($shortcode_content);
                     ?>
                     <p style='<?php echo esc_attr($param_font_size) . esc_attr($text_transform); ?>'><?php echo esc_html($paragrahp); ?></p>
                     <?php
                  }
                  ?>
               </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>