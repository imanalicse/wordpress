<?php

if (!defined('FW'))
{
   die('Forbidden');
}

$options = array(
    'style' => array(
        'label' => esc_html__('Team Style', 'martin'),
        'type' => 'short-select',
        'value' => '1',
        'desc' => esc_html__('Select your team member view style.', 'martin'),
        'choices' => array(
            '1' => 'Style One',
            '2' => 'Style Two'
        ),
    ),
    'background' => array(
        'label' => esc_html__('Background Color', 'martin'),
        'desc' => esc_html__('Select your Content Background color for style 2.', 'martin'),
        'type' => 'short-select',
        'value' => 'white',
        'choices' => array(
            'white' => 'white',
            '' => 'black'
        ),
    ),
    'name_color' => array(
        'label' => esc_html__('Name Font Color', 'martin'),
        'desc' => esc_html__('Insert your member name font color.', 'martin'),
        'type' => 'color-picker',
        'value' => ''
    ),
    'job_color' => array(
        'label' => esc_html__('Designation Font Color', 'martin'),
        'desc' => esc_html__('Insert your member designation font color.', 'martin'),
        'type' => 'color-picker',
        'value' => ''
    ),
);
