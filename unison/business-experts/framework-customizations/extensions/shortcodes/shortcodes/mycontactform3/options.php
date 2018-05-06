<?php

if (!defined('FW'))
{
   die('Forbidden');
}

$options = array(

    'form_title' => array(
        'type' => 'text',
        'label' => esc_html__('Form Title', 'martin'),
        'desc' => esc_html__('Please insert your contact form Title.', 'martin'),
    ),
    'form_subtitle' => array(
        'type' => 'text',
        'label' => esc_html__('Form Sub Title', 'martin'),
        'desc' => esc_html__('Please insert your contact form Sub Title.', 'martin'),
    ),
    'info_desc' => array(
        'label' => esc_html__('Info Description', 'martin'),
        'desc' => esc_html__('Please insert your info descriptions here.', 'martin'),
        'type' => 'textarea',
    ),
    'info_color' => array(
        'label' => esc_html__('Info Color', 'martin'),
        'type' => 'color-picker',
        'value' => '',
        'desc' => esc_html__('Change your description color if you want. Default color is #b3b3b3.', 'martin'),
    ),
    'con_shortcode' => array(
        'type' => 'text',
        'label' => esc_html__('Shortcode', 'martin'),
        'desc' => esc_html__('Please insert your contact form 7 shortcode.', 'martin'),
    ),
    'info_widget' => array(
        'label' => esc_html__('Info Widget', 'martin'),
        'popup-title' => esc_html__('Add/Edit Info Widget', 'martin'),
        'desc' => esc_html__('Here you can add, remove and edit your Info Widgets. You can display 3 widget.', 'martin'),
        'type' => 'addable-popup',
        'template' => '{{=title}}',
        'popup-options' => array(
            'info_icon' => array(
                'type' => 'icon',
                'label' => esc_html__('Choose an Icon', 'martin'),
                'set' => 'tw_line_icon_set',
            ),
            'info_icon_color' => array(
                'label' => esc_html__('Icon Color', 'martin'),
                'type' => 'color-picker',
                'value' => '',
                'desc' => esc_html__('Select your icon color. Default color is #797a7c.', 'martin'),
            ),
            'title' => array(
                'label' => esc_html__('Widget Title', 'martin'),
                'desc' => esc_html__('Insert widget title here.', 'martin'),
                'type' => 'text',
            ),
            'info_title_color' => array(
                'label' => esc_html__('Title Color', 'martin'),
                'type' => 'color-picker',
                'value' => '',
                'desc' => esc_html__('Select your title color. Default color is #FFFFFF.', 'martin'),
            ),
            'content' => array(
                'label' => esc_html__('Widget Content', 'martin'),
                'type' => 'wp-editor',
                'value' => '',
                'desc' => esc_html__('Insert your widget content.', 'martin'),
                'reinit' => true,
            ),
            'info_content_color' => array(
                'label' => esc_html__('Content Color', 'martin'),
                'type' => 'color-picker',
                'value' => '',
                'desc' => esc_html__('Select your content color.', 'martin'),
            ),
        )
    ),
);
