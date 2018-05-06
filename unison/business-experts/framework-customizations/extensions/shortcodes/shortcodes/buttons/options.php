<?php

if (!defined('FW'))
{
   die('Forbidden');
}

$options = array(
    'button_label' => array(
        'label' => esc_html__('Button Label', 'martin'),
        'type' => 'text',
        'value' => '',
        'desc' => esc_html__('Insert your button label here.', 'martin'),
    ),
    'button_link' => array(
        'label' => esc_html__('Button Link', 'martin'),
        'type' => 'text',
        'value' => '',
        'desc' => esc_html__('Insert your button link here.', 'martin'),
    ),
    'margin_left' => array(
        'label' => esc_html__('Margin Left', 'martin'),
        'type' => 'text',
        'value' => '',
        'desc' => esc_html__('Insert your Margin left here.', 'martin'),
    ),
    'margin_top' => array(
        'label' => esc_html__('Margin Top', 'martin'),
        'type' => 'text',
        'value' => '',
        'desc' => esc_html__('Insert your Margin top here.', 'martin'),
    ),
    'margin_right' => array(
        'label' => esc_html__('Margin Right', 'martin'),
        'type' => 'text',
        'value' => '',
        'desc' => esc_html__('Insert your Margin right here.', 'martin'),
    ),
    'margin_bottom' => array(
        'label' => esc_html__('Margin Bottom', 'martin'),
        'type' => 'text',
        'value' => '',
        'desc' => esc_html__('Insert your Margin bottom here.', 'martin'),
    ),
);
