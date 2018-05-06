<?php

if (!defined('FW'))
{
   die('Forbidden');
}

$options = array(
    'styles' => array(
        'label' => esc_html__('Style', 'martin'),
        'type' => 'short-select',
        'value' => '1',
        'desc' => esc_html__('Select your Skill style.', 'martin'),
        'choices' => array(
            '1' => 'Style 1',
            '2' => 'Style 2',
        )
    ),
    'title' => array(
        'type' => 'text',
        'label' => esc_html__('Skill Title', 'martin'),
        'value' => ''
    ),
    'title_color' => array(
        'label' => esc_html__('Title Color', 'martin'),
        'type' => 'color-picker',
        'value' => '',
        'desc' => esc_html__('Insert your title color. Default color is #181818.', 'martin'),
    ),
    'skill_percent' => array(
        'label' => esc_html__('Percent', 'martin'),
        'type' => 'text',
        'value' => '',
        'desc' => esc_html__('Insert your skill percent.', 'martin')
    ),
    'margin_top' => array(
        'type' => 'text',
        'label' => esc_html__('Margin Top', 'martin'),
        'desc' => esc_html__('Insert margin top with numeric value. Default margin top 0px.', 'martin'),
        'value' => ''
    ),
    'margin_bottom' => array(
        'type' => 'text',
        'label' => esc_html__('Margin Bottom', 'martin'),
        'desc' => esc_html__('Insert margin bottom with numeric value. Default margin bottom 30px.', 'martin'),
        'value' => ''
    )
);
