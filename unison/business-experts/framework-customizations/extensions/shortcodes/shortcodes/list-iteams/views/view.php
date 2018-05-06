<?php if (!defined('FW')) die('Forbidden'); ?>
<?php
/*
 * the `.fw-tabs-container` div also supports
 * a `tabs-justified` class, that strethes the tabs
 * to the width of the whole container
 */

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

$items = array();
if (!empty($atts['items']))
{
   $items = $atts['items'];
}

$style = ($atts['items_color'] != '') ? 'color:' . $atts['items_color'] . ';' : '';
$style .= ($atts['border_bottmon'] != '') ? 'border-bottom:' . $atts['border_bottmon'] . ';' : '';
if (is_array($items) && count($items) > 0)
{
   ?>
   <div class="aboutTwoleft" style="<?php echo esc_attr($margin_top) . esc_attr($margin_bottom); ?>">
      <ul>
         <?php
         foreach ($items as $item)
         {
            ?>
            <li style="<?php echo esc_attr($style); ?>">
               <?php echo esc_html($item['item']); ?>
            </li>  
            <?php
         }
         ?>
      </ul>
   </div>
   <?php
}
?>
