<?php

if (!defined('FW'))
{
   die('Forbidden');
}

$options = array(
    'styles' => array(
        'label' => esc_html__('Style', 'martin'),
        'type' => 'short-select',
        'value' => '1',
        'desc' => esc_html__('Select your testimonials style.', 'martin'),
        'choices' => array(
            '1' => 'Style 1',
            '2' => 'Style 2',
        )
    ),
    'testimonials' => array(
        'label' => esc_html__('Testimonials', 'martin'),
        'popup-title' => esc_html__('Add/Edit Testimonial', 'martin'),
        'desc' => esc_html__('Here you can add, remove and edit your Testimonials.', 'martin'),
        'type' => 'addable-popup',
        'template' => '{{=author_name}}',
        'popup-options' => array(
            'client_img' => array(
                'label' => esc_html__('Image', 'martin'),
                'desc' => esc_html__('Upload Client Image.', 'martin'),
                'type' => 'upload',
            ),
            'content' => array(
                'label' => esc_html__('Quote', 'martin'),
                'desc' => esc_html__('Enter the testimonial here', 'martin'),
                'type' => 'textarea',
                'teeny' => true
            ),
            'content_color' => array(
                'label' => esc_html__('Quote Font Color', 'martin'),
                'desc' => esc_html__('Insert your content font color.', 'martin'),
                'type' => 'color-picker',
                'value' => ''
            ),
            'author_name' => array(
                'label' => esc_html__('Client Name', 'martin'),
                'desc' => esc_html__('Enter the Name of the Person to quote', 'martin'),
                'type' => 'text'
            ),
            'name_color' => array(
                'label' => esc_html__('Name Font Color', 'martin'),
                'desc' => esc_html__('Insert your author font color.', 'martin'),
                'type' => 'color-picker',
                'value' => ''
            ),
            'positions' => array(
                'label' => esc_html__('Client Designation', 'martin'),
                'desc' => esc_html__('Enter the client Designation', 'martin'),
                'type' => 'text'
            ),
            'des_color' => array(
                'label' => esc_html__('Designation Font Color', 'martin'),
                'desc' => esc_html__('Insert your position font color.', 'martin'),
                'type' => 'color-picker',
                'value' => ''
            )
        )
    )
);
