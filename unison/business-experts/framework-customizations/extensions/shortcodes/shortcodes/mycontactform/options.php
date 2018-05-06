<?php

if (!defined('FW'))
{
   die('Forbidden');
}

$options = array(
    'form_title' => array(
        'label' => esc_html__('Form Title', 'martin'),
        'type' => 'text',
        'desc' => esc_html__('Insert your contact form title.', 'martin'),
        'value' => ''
    ),
    'form_sub_title' => array(
        'label' => esc_html__('Form Sub Title', 'martin'),
        'type' => 'text',
        'desc' => esc_html__('Insert your contact form sub title.', 'martin'),
        'value' => ''
    ),
    'con_shortcode' => array(
        'type' => 'text',
        'label' => esc_html__('Shortcode', 'martin'),
        'desc' => esc_html__('Please insert your contact form 7 shortcode.', 'martin'),
    ),
    'bg_color' => array(
        'label' => esc_html__('BG Color', 'martin'),
        'type' => 'color-picker',
        'value' => '#262626',
        'desc' => esc_html__('Insert your contact form 5 bg color. Default color is #EDF2F8.', 'martin'),
    ),
);
