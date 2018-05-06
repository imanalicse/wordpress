<?php

if (!defined('FW'))
{
   die('Forbidden');
}

$options = array(
    'service_style' => array(
        'type' => 'radio',
        'label' => 'Service Style',
        'value' => '1',
        'choices' => array(
            '1' => __('Style 1 (Seervice with Left Sidebar)'),
            '2' => __('Style 2 (Seervice with Right Sidebar)'),
            '3' => __('Style 3'),
        )
    ),
    'sidebar_title' => array(
        'type' => 'text',
        'label' => esc_html__('Service Main Title', 'be'),
    ),
    'sidebar_subtitle' => array(
        'type' => 'text',
        'label' => __('Service Main Sub Title', 'be'),
    ),
    'sidebar_content' => array(
        'type' => 'textarea',
        'label' => __('Service Sidebar Content for style 1 and 2', 'be'),
    ),
    'services_link' => array(
        'type' => 'text',
        'label' => __('Services List Page Link', 'be'),
    ),
    'sidebar_image' => array(
        'type' => 'upload',
        'label' => __('Left/Right side Background Pattern', 'be'),
        'value' => '',
        'desc' => __('Upload your background Pattern image here')
    ),
    'sidebar_color' => array(
        'type' => 'color-picker',
        'label' => __('Sidebar Background Color', 'be'),
        'value' => ''
    ),
    'services' => array(
        'label' => esc_html__('Services', 'martin'),
        'popup-title' => esc_html__('Add/Edit service', 'martin'),
        'desc' => esc_html__('Here you can add, remove and edit your service.', 'martin'),
        'type' => 'addable-popup',
        'template' => '{{=title}}',
        'popup-options' => array(
            'icon' => array(
                'type' => 'icon',
                'label' => esc_html__('Choose an Icon', 'be'),
                'set' => 'tw_line_icon_set',
            ),
            'title' => array(
                'type' => 'text',
                'label' => esc_html__('Service Title', 'be'),
            ),
            'title_color' => array(
                'type' => 'color-picker',
                'label' => __('Title Color', 'be'),
                'value' => ''
            ),
            'subtitle' => array(
                'type' => 'text',
                'label' => __('Service Sub Title', 'be'),
                'desc'=>__('Service subtitle for style 1 & 2','be')
            ),
            'content' => array(
                'type' => 'textarea',
                'label' => __('Content', 'be'),
            ),
            'link' => array(
                'type' => 'text',
                'label' => __('Service Link', 'be'),
            )
        )
    )
);

