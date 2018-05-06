<?php
if (!defined('FW')) {
    die('Forbidden');
}

$pricing_style = 1;
if($atts['pricing_style'] != ''){
    $pricing_style = $atts['pricing_style'];
}

$is_active = 2;
if($atts['is_active'] != '')
{
    $is_active = $atts['is_active'];
}


$plan_name = '';
if ($atts['plan_name'] != '') {
    $plan_name = $atts['plan_name'];
}

$currency = '';
if ($atts['currency'] != '') {
    $currency = $atts['currency'];
}

$price = '';
if ($atts['price'] != '') {
    $price = $atts['price'];
}

$period = '';
if ($atts['period'] != '') {
    $period = $atts['period'];
}

$price_list = array();
if ($atts['price_list'] != '') {
    $price_list = $atts['price_list'];
}

$label = '';
if ($atts['label'] != '') {
    $label = $atts['label'];
}

$link = '#';
if ($atts['link'] != '') {
    $link = $atts['link'];
}

$header_bg = '';
if(isset($atts['header_bg']) && is_array($atts['header_bg']) && isset($atts['header_bg']['url']) && $atts['header_bg']['url'] != ''){
    $bgs = 'background-image: url('.$atts['header_bg']['url'].'); background-repeat: no-repeat; background-position: center center; background-size: cover; ';
}

?>
<?php if($pricing_style == 2): ?>
<div class="singlePricing3 <?php if($is_active == 1) { echo 'active'; } ?>">
    <div class="p_header3 text-center" style="<?php echo esc_attr($bgs); ?>">
        <h3><?php echo esc_html($plan_name); ?></h3>
        <h1><?php echo esc_html($currency . $price); ?></h1>
        <p><?php echo esc_html($period); ?></p>
    </div>
    <div class="p_body3">
        <?php if(is_array($price_list) && count($price_list) > 0): ?>
            <?php foreach($price_list as $list): ?>
                <p><?php echo strip_tags($list['content'], '<a><span><strong><b>'); ?></p>
            <?php endforeach; ?>
        <?php endif; ?>
        <div class="clearfix"></div>
        <div class="p_bottom3">
            <a class="martin_btn btn_blue hover_black" href="<?php echo esc_url($link); ?>"><i><?php echo esc_html($label); ?></i><span></span></a>
        </div>
    </div>
</div>
<?php elseif($pricing_style == 3): ?>
<div class="pricTable4 <?php if($is_active == 1) { echo 'active'; } ?>">
    <div class="price4head">
        <h1><?php echo esc_html($plan_name); ?></h1>
        <p><?php echo esc_html($period); ?></p>
        <div class="price4price">
            <h3><?php echo esc_html($currency.$price); ?></h3>
        </div>
    </div>
    <div class="price4body">
        <ul>
            <?php if(is_array($price_list) && count($price_list) > 0): ?>
                <?php foreach($price_list as $list): ?>
                    <li><?php echo strip_tags($list['content'], '<a><span><strong><b>'); ?></li>
                <?php endforeach; ?>
            <?php endif; ?>
        </ul>
    </div>
    <div class="pricFoot4">
        <a href="<?php echo esc_url($link); ?>" class="martin_btn btn_blue hover_black"><i><?php echo esc_html($label); ?></i><span></span></a>
    </div>
</div>
<?php else: ?>
<div class="singlePricing <?php if($is_active == 1) { echo 'active'; } ?> text-center">
    <div class="pricHead">
        <h1><?php echo esc_html($plan_name); ?></h1>
        <h2><?php echo esc_html($currency); ?><?php echo esc_html($price); ?> <?php if($period != ''): ?><span> <?php echo esc_html__('/ ', 'martin').esc_html($period); ?></span><?php endif; ?></h2>
    </div>
    <div class="priceBody">
        <ul>
            <?php if(is_array($price_list) && count($price_list) > 0): ?>
                <?php foreach($price_list as $list): ?>
                    <li><?php echo strip_tags($list['content'], '<a><span><strong><b>'); ?></li>
                <?php endforeach; ?>
            <?php endif; ?>
        </ul>
    </div>
    <div class="pricFoot">
        <a href="<?php echo esc_url($link); ?>" class="martin_btn btn_blue hover_black"><i><?php echo esc_html($label); ?></i><span></span></a>
    </div>
</div>
<?php endif; ?>
