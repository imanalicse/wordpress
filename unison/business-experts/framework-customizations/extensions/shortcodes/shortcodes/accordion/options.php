<?php

if (!defined('FW'))
{
   die('Forbidden');
}

$options = array(
    'background' => array(
        'type' => 'radio',
        'label' => esc_html__('Title Background Color', 'br'),
        'value' => 'abouttwoContent',
        'choices' => array(
            'aboutThree' => __('Black'),
            'abouttwoContent' => __('White'),
        )
    ),
    'tabs' => array(
        'type' => 'addable-popup',
        'label' => esc_html__('Accordions', 'martin'),
        'popup-title' => esc_html__('Add/Edit Accordion', 'martin'),
        'desc' => esc_html__('Create your Accordion', 'martin'),
        'template' => '{{=tab_title}}',
        'popup-options' => array(
            'tab_title' => array(
                'type' => 'text',
                'label' => esc_html__('Title', 'martin')
            ),
            'title_color' => array(
                'label' => esc_html__('Title Color', 'martin'),
                'type' => 'color-picker',
                'value' => '',
                'desc' => esc_html__('Inser your title color.', 'martin'),
            ),
            'tab_content' => array(
                'label' => esc_html__('Rich Text Editor', 'martin'),
                'type' => 'wp-editor',
                'value' => '',
                'desc' => esc_html__('Insert your content. You can also insert shortcode here.', 'martin'),
                'reinit' => true,
            ),
        )
    )
);
