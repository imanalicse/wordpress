<?php

if (!defined('FW'))
{
   die('Forbidden');
}

$options = array(
    'sec_title' => array(
        'label' => esc_html__('Section Title', 'martin'),
        'type' => 'text',
        'value' => '',
        'desc' => esc_html__('Insert your section title here.', 'martin'),
    ),
    'title_color' => array(
        'label' => esc_html__('Sec. Title Color', 'martin'),
        'type' => 'color-picker',
        'value' => '',
        'desc' => esc_html__('Inser your section title color.', 'martin'),
    ),
    'sec_subtitle' => array(
        'label' => esc_html__('Section Sub Title', 'martin'),
        'type' => 'textarea',
        'value' => '',
        'desc' => esc_html__('Insert your section sub title here.', 'martin'),
    ),
    'subtitle_color' => array(
        'label' => esc_html__('Sec. Sub Title Color', 'martin'),
        'type' => 'color-picker',
        'value' => '',
        'desc' => esc_html__('Inser your section sub title color.', 'martin'),
    ),
    'margin_top' => array(
        'label' => esc_html__('Margin Top', 'martin'),
        'type' => 'text',
        'value' => '',
        'desc' => esc_html__('Insert your Margin top here. Please insert a numeric number. Default martion top is 0px.', 'martin'),
    ),
    'margin_bottom' => array(
        'label' => esc_html__('Margin Bottom', 'martin'),
        'type' => 'text',
        'value' => '',
        'desc' => esc_html__('Insert your Margin bottom here. Please insert a numeric number. Default martion bottom is 70px.', 'martin'),
    ),
    'text_align' => array(
        'label' => esc_html__('Text Align', 'martin'),
        'type' => 'short-select',
        'value' => 'center',
        'desc' => esc_html__('Please select your title alignment.', 'martin'),
        'choices' => array(
            'left' => 'Left Align',
            'center' => 'Center Align',
            'right' => 'Right Align'
        ),
    ),
);
