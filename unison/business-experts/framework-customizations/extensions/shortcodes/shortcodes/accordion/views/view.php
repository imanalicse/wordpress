<?php
if (!defined('FW'))
{
   die('Forbidden');
}
$tabs_id = uniqid('collapse_');
/* view process */


$background = 'abouttwoContent';
if ($atts['background'] != '')
{
   $background = $atts['background'];
}
$tabs = array();
if ($atts['tabs'] != '')
{
   $tabs = $atts['tabs'];
}
$tab_count = count($tabs);
?>
<!--default style-->

<div class="<?php echo esc_attr($background); ?>">
   <div class="panel-group noMarginBottom" id="accordion">
      <?php
      $tc = 1;
      if ($tab_count > 0)
      {
         foreach ($tabs as $tab) :
            $title_color = '';
            if ($tab['title_color'] != '')
            {
               $title_color = 'color: ' . $tab['title_color'] . '; ';
            }
            ?>
            <div class="AboutAcc panel">
               <div class="accoHead <?php
               if ($tc == 1)
               {
                  echo 'active';
               }
               ?>">
                  <h4 class="panel-title">
                     <a style="<?php echo esc_attr($title_color); ?>" data-toggle="collapse" data-parent="#accordion" href="#collapse_<?php echo esc_attr($tc); ?>">
                        <?php echo esc_html($tab['tab_title']); ?></a>
                     <?php
                     if ($tc == 1)
                     {
                        ?>
                        <i class="fa fa-minus pull-right"></i>
                        <?php
                     } else
                     {
                        ?>
                        <i class="fa fa-plus pull-right"></i>
                        <?php
                     }
                     ?>
                  </h4>
               </div>
               <div id="collapse_<?php echo esc_attr($tc); ?>" class="panel-collapse collapse <?php
               if ($tc == 1)
               {
                  echo 'in';
               }
               ?>">
                  <div class="panel-body">
                     <p><?php echo wp_kses($tab['tab_content'], array('span' => array(), 'a' => array(), 'br' => array())); ?></p>
                  </div>
               </div>
            </div>
            <?php
            $tc++;
         endforeach;
      }
      ?>
   </div>
</div>



