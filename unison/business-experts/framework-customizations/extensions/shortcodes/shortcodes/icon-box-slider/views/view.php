<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
/**
 * @var array $atts
 */

$boxes = array();
if($atts['boxes'] != ''){
    $boxes = $atts['boxes'];
}

$martin_top = '';
if($atts['martin_top'] != ''){
    $martin_top = 'margin-top: '.$atts['martin_top'].'px; ';
}

$martin_bottom = '';
if($atts['martin_bottom'] != ''){
    $martin_bottom = 'margin-bottom: '.$atts['martin_bottom'].'px; ';
}

?>
<?php if(is_array($boxes) && count($boxes) > 0): ?>
<div class="serviceSlide" style="<?php echo esc_attr($martin_bottom . $martin_top); ?>">
    <?php
        $t = 1;
        $total = count($boxes);
        $c1 = array(1, 4, 7, 10, 13, 16, 19);
        $c2 = array(2, 5, 8, 11, 14, 17, 20);
        $c3 = array(3, 6, 9, 12, 15, 18, 21);
        foreach($boxes as $box)
        {
            if($t == 1) { echo '<div class="serviceItem">';}
            $class = '';
            if(in_array($t, $c1))
            {
                $class = '';
            }
            elseif(in_array($t, $c2))
            {
                $class = 'color2';
            }
            else
            {
                $class = 'color3';
            }
            $icon_color = '';
            if($box['icon_color'] != ''){
                $icon_color = 'color: '.$box['icon_color'].'; ';
            }
            $title_color = '';
            if($box['title_color'] != ''){
                $title_color = 'color: '.$box['title_color'].'; ';
            }
            $cnt_color = '';
            if($box['cnt_color'] != ''){
                $cnt_color = 'color: '.$box['cnt_color'].'; ';
            }
            ?>
            <div class="col-sm-4 noPadding">
                <div class="singleService <?php echo esc_attr($class); ?>">
                    <i style="<?php echo esc_attr($icon_color); ?>" class="<?php echo esc_attr($box['icon']); ?>"></i>
                    <h3 style="<?php echo esc_attr($title_color); ?>"><?php echo esc_html($box['title']); ?></h3>
                    <p style="<?php echo esc_attr($cnt_color); ?>">
                        <?php echo strip_tags($box['content'], '<a><span><br/><br>'); ?>
                    </p>
                </div>
            </div>
            <?php

            if($t %  3 == 0 && $t < $total){ echo '</div><div class="serviceItem">';}
            elseif($t % 3 == 0 && $t == $total){echo '</div>';}
            elseif($t == $total){echo '</div>';}
            $t++;
        }
    ?>
</div>
<?php endif; ?>