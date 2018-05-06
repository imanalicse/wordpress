<?php

if (!defined('FW'))
{
   die('Forbidden');
}

$options = array(
    'heading_type' => array(
        'label' => esc_html__('Heading Type', 'martin'),
        'type' => 'short-select',
        'value' => 'h1',
        'desc' => esc_html__('Select your heading type.', 'martin'),
        'choices' => array(
            'h1' => 'h1',
            'h2' => 'h2',
            'h3' => 'h3',
            'h4' => 'h4',
            'h5' => 'h5',
            'h6' => 'h6'
        )
    ),
    'heading_text' => array(
        'type' => 'text',
        'label' => esc_html__('Your Heading', 'martin'),
        'desc' => esc_html__('Insert your heading text.', 'martin')
    ),
    'font_size' => array(
        'type' => 'text',
        'label' => esc_html__('Font Size', 'martin'),
        'desc' => esc_html__('Insert just numeric value. Don\'t need to insert "px".', 'martin')
    ),
    'heading_color' => array(
        'label' => esc_html__('Heading Color', 'martin'),
        'desc' => esc_html__('Insert your Heading color. Default color is #23282f.', 'martin'),
        'type' => 'color-picker',
        'value' => ''
    ),
    'text_align' => array(
        'label' => esc_html__('Heading Alignment', 'martin'),
        'type' => 'short-select',
        'value' => 'left',
        'desc' => esc_html__('Select your heading alignment.', 'martin'),
        'choices' => array(
            'left' => 'Left Align',
            'center' => 'Center Align',
            'right' => 'Right Align'
        )
    ),
    'font_weight' => array(
        'label' => esc_html__('Font Weight', 'martin'),
        'type' => 'short-select',
        'value' => '400',
        'desc' => esc_html__('Select your heading font weight.', 'martin'),
        'choices' => array(
            '100' => '100',
            '300' => '300',
            '400' => '400',
            '500' => '500',
            '600' => '600',
            '700' => '700',
            '900' => '900',
        )
    ),
    'text_transform' => array(
        'label' => esc_html__('Text Transform', 'martin'),
        'type' => 'short-select',
        'value' => 'none',
        'desc' => esc_html__('Select your heading text transform.', 'martin'),
        'choices' => array(
            'uppercase' => 'Uppercase',
            'capitalize' => 'Capitalize',
            'lowercase' => 'lowercase',
            'none' => 'None',
        )
    ),
    'line_height' => array(
        'type' => 'text',
        'label' => esc_html__('Line Height', 'martin'),
        'desc' => esc_html__('Please insert your line height. Default line height is 0.8.', 'martin')
    ),
    'margin_top' => array(
        'type' => 'text',
        'label' => esc_html__('Margin Top', 'martin'),
        'desc' => esc_html__('Insert just numeric value. Don\'t need to insert "px".', 'martin')
    ),
    'margin_right' => array(
        'type' => 'text',
        'label' => esc_html__('Margin Right', 'martin'),
        'desc' => esc_html__('Insert just numeric value. Don\'t need to insert "px".', 'martin')
    ),
    'margin_bottom' => array(
        'type' => 'text',
        'label' => esc_html__('Margin Bottom', 'martin'),
        'desc' => esc_html__('Insert just numeric value. Don\'t need to insert "px".', 'martin')
    ),
    'margin_left' => array(
        'type' => 'text',
        'label' => esc_html__('Margin Left', 'martin'),
        'desc' => esc_html__('Default Margin Top is 0px. Insert just numeric value. Don\'t need to insert "px".', 'martin')
    ),
);
