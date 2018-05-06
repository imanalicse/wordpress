<?php
if (!defined('FW')) {
    die('Forbidden');
}

$history = array();
if ($atts['history'] != '') {
    $history = $atts['history'];
}

$margin_top = '';
if($atts['margin_top'] != ''){
    $margin_top = 'margin-top: '.$atts['margin_top'].'px; ';
}

$margin_bottom = '';
if($atts['margin_bottom'] != ''){
    $margin_bottom = 'margin-bottom: '.$atts['margin_bottom'].'px; ';
}

?>
<div class="histroyTimeline" style="<?php echo esc_attr($margin_bottom . $margin_top); ?>">
    <div class="contentbar">
    <?php
        if(is_array($history) && count($history) > 0)
        {
            $odd = 1;
            foreach($history as $his)
            {
                if($odd % 2 != 0)
                {
                    ?>
                    <div class="stepsTop <?php if($his['is_active'] == 1) { echo 'active'; } ?>">
                        <h6><?php echo esc_html($his['yesr']); ?></h6>
                        <p><?php echo esc_html($his['desc']); ?></p>
                        <div class="stepsTopDots"></div>
                    </div>
                    <?php
                }
                $odd++;
            }
        }
    ?>
    </div>
    <div class="borderMiddle">&nbsp;</div>
    <div class="contentbar">
        <?php
            if(is_array($history) && count($history) > 0)
            {
                $even = 1;
                foreach($history as $his)
                {
                    if($even % 2 == 0)
                    {
                        ?>
                        <div class="stepsBottom <?php if($his['is_active'] == 1) { echo 'active'; } ?>">
                            <h6><?php echo esc_html($his['yesr']); ?></h6>
                            <p><?php echo esc_html($his['desc']); ?></p>
                            <div class="stepsBottomDots"></div>
                        </div>
                        <?php
                    }
                    $even++;
                }
            }
        ?>
    </div>
</div>