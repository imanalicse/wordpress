<?php

if (!defined('FW'))
{
   die('Forbidden');
}

$options = array(
    'style' => array(
        'label' => esc_html__('Style', 'martin'),
        'type' => 'short-select',
        'value' => '1',
        'desc' => esc_html__('Select your Funfacts box style.', 'martin'),
        'choices' => array(
            '1' => 'Style One',
            '2' => 'Style Two'
        ),
    ),
    'funfacts' => array(
        'label' => esc_html__('Funfacts', 'martin'),
        'popup-title' => esc_html__('Add/Edit Funfacts', 'martin'),
        'desc' => esc_html__('Here you can add, remove and edit your Funfacts.', 'martin'),
        'type' => 'addable-popup',
        'template' => '{{=fact_title}}',
        'popup-options' => array(
            'icon' => array(
                'type' => 'icon',
                'label' => esc_html__('Choose an Icon', 'be'),
                'set' => 'tw_line_icon_set',
            ),
            'amount' => array(
                'type' => 'text',
                'label' => esc_html__('Amount', 'martin'),
                'desc' => esc_html__('Insert your fact amount here.', 'martin')
            ),
            'amount_color' => array(
                'label' => esc_html__('Amount Color', 'martin'),
                'desc' => esc_html__('Insert your fact amount color. Default color is #FFFFFF.', 'martin'),
                'type' => 'color-picker',
                'value' => ''
            ),
            'fact_title' => array(
                'type' => 'text',
                'label' => esc_html__('Fact Title', 'martin'),
                'desc' => esc_html__('Insert your fact title.', 'martin'),
            ),
            'title_color' => array(
                'label' => esc_html__('Title Color', 'martin'),
                'desc' => esc_html__('Insert your title color. Default color is #FFFFFF.', 'martin'),
                'type' => 'color-picker',
                'value' => ''
            ),
            'margin_top' => array(
                'type' => 'text',
                'label' => esc_html__('Margin Top', 'martin'),
                'desc' => esc_html__('Do you need margin in top. Please insert a number. Default margin 0.', 'martin')
            ),
            'margin_bottom' => array(
                'type' => 'text',
                'label' => esc_html__('Margin Bottom', 'martin'),
                'desc' => esc_html__('Do you need margin in Bottom. Please insert a number. Default margin 0.', 'martin')
            ),
            'text_align' => array(
                'label' => esc_html__('Text Align', 'martin'),
                'type' => 'short-select',
                'value' => 'center',
                'desc' => esc_html__('Select your fact box text alignment.', 'martin'),
                'choices' => array(
                    'left' => 'Left Align',
                    'center' => 'Center Align',
                    'right' => 'Right Align'
                ),
            )
        )
    )
);
