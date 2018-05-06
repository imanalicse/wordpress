<?php if (!defined('FW')) die( 'Forbidden' ); ?>
<?php
/*
 * the `.fw-tabs-container` div also supports
 * a `tabs-justified` class, that strethes the tabs
 * to the width of the whole container
 */

$bar_color = '#F7941D';
if($atts['bar_color'] != '')
{
    $bar_color = $atts['bar_color'];
}

$title = '';
if($atts['title'] != '')
{
    $title = $atts['title'];
}

$title_color = '';
if($atts['title_color'] != ''){
    $title_color = 'color: '.$atts['title_color'].'; ';
}

$skill_percent = '';
if($atts['skill_percent'] != ''){
    $skill_percent = $atts['skill_percent'];
}

$parcent_color = '';
if($atts['parcent_color'] != ''){
    $parcent_color = 'color: '.$atts['parcent_color'].' !important; ';
}

?>
<div class="singlePie text-center">
    <div class="chart" data-percent="<?php echo esc_attr($skill_percent); ?>" data-barcolor="<?php echo esc_attr($bar_color); ?>">
        <div class="chart_con">
            <h2 style="<?php echo esc_attr($title_color); ?>"><?php echo esc_html($title); ?></h2>
            <div class="parcenHOlder" style="<?php echo esc_attr($parcent_color); ?>"><span class="percent"><?php echo esc_attr($skill_percent); ?></span>%</div>
        </div>
    </div>
</div>