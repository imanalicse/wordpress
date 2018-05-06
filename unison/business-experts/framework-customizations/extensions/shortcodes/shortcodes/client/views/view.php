<?php
if (!defined('FW')) {
    die('Forbidden');
}

$clients = array();
if ($atts['clients'] != '') {
    $clients = $atts['clients'];
}

$style = 1;
if ($atts['style'] != '') {
    $style = $atts['style'];
}

if (is_array($clients) && count($clients) > 0): 
?>
    <?php if($style == 2): ?>
    <div class="row">
        <div class="client_log_style_01">
            <?php 
                foreach ($clients as $clt) 
                {
                    if(is_array($clt['client_img']) && isset($clt['client_img']['url']) && $clt['client_img']['url'] != '')
                    {
                        ?>
                        <div class="col-lg-2 clietnItem">
                            <div class="singlePart2">
                                <a target="_blank" href="<?php echo esc_url($clt['client_url']); ?>">
                                    <img src="<?php echo esc_url($clt['client_img']['url']); ?>" alt="<?php echo esc_attr($clt['client_name']); ?>">
                                </a>
                            </div>
                        </div> 
                        <?php
                    }
                }
            ?>
                     
        </div>
    </div>
    <?php else: ?>
    <div class="row">
        <div class="client_log_style_01">
            <?php 
                foreach ($clients as $clt) 
                {
                    if(is_array($clt['client_img']) && isset($clt['client_img']['url']) && $clt['client_img']['url'] != '')
                    {
                        ?>
                        <div class="col-lg-2 clietnItem">
                            <div class="singlePart">
                                <a target="_blank" href="<?php echo esc_url($clt['client_url']); ?>">
                                    <img src="<?php echo esc_url($clt['client_img']['url']); ?>" alt="<?php echo esc_attr($clt['client_name']); ?>">
                                </a>
                            </div>
                        </div> 
                        <?php
                    }
                }
            ?>
                     
        </div>
    </div>
    <?php endif; ?>
<?php endif; ?>