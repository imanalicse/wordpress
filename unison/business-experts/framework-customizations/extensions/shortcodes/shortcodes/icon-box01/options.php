<?php

if (!defined('FW'))
{
   die('Forbidden');
}

$options = array(
    'icon_bg_color' => array(
        'label' => esc_html__('Icon BG Color', 'be'),
        'desc' => esc_html__('Insert your icon bg color. Default color is #FFF.', 'be'),
        'type' => 'color-picker',
        'value' => ''
    ),
    'icon' => array(
        'type' => 'icon',
        'label' => esc_html__('Choose an Icon', 'be'),
        'set' => 'tw_line_icon_set',
    ),
    'icon_color' => array(
        'label' => esc_html__('Icon Color', 'be'),
        'desc' => esc_html__('Insert your section sub title color. Default color is #29c2e1.', 'be'),
        'type' => 'color-picker',
        'value' => ''
    ),
    'icon_position' => array(
        'label' => esc_html__('Icon Position', 'martin'),
        'type' => 'short-select',
        'value' => '1',
        'desc' => esc_html__('Select your Icon Position.', 'martin'),
        'choices' => array(
            '1' => 'Left Side off Content',
            '2' => 'Right Side off Content',
            '3' => 'Top off Content',
        )
    ),
    'title' => array(
        'type' => 'text',
        'label' => esc_html__('Title', 'be'),
    ),
    'title_link' => array(
        'type' => 'text',
        'label' => esc_html__('Title Link', 'be'),
        'desc' => esc_html__('Add your title link here', 'be')
    ),
    'title_color' => array(
        'label' => esc_html__('Title Color', 'be'),
        'desc' => esc_html__('Insert your section sub title color. Default color is #FFFFFF.', 'be'),
        'type' => 'color-picker',
        'value' => ''
    ),
    'content' => array(
        'type' => 'wp-editor',
        'label' => esc_html__('Content', 'be'),
        'desc' => esc_html__('Enter the desired content', 'be'),
        'reinit' => true,
    ),
    'cnt_color' => array(
        'label' => esc_html__('Content Color', 'be'),
        'desc' => esc_html__('Insert your content color. Default color is #FFFFFF.', 'be'),
        'type' => 'color-picker',
        'value' => ''
    ),
    'margin_top' => array(
        'type' => 'text',
        'label' => esc_html__('Margin Top', 'be'),
        'desc' => esc_html__('Do you need be in Top. Please insert a number.', 'be')
    ),
    'margin_bottom' => array(
        'type' => 'text',
        'label' => esc_html__('Margin Bottom', 'be'),
        'desc' => esc_html__('Do you need be in Bottom. Please insert a number.', 'be')
    ),
);
