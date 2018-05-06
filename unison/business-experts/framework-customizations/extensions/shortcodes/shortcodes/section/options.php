<?php

if (!defined('FW'))
{
   die('Forbidden');
}

$options = array(
    'is_fullwidth' => array(
        'label' => esc_html__('Is Full Width?', 'martin'),
        'type' => 'switch',
        'right-choice' => array(
            'value' => '1',
            'label' => esc_html__('Yes', 'martin')
        ),
        'left-choice' => array(
            'value' => '2',
            'label' => esc_html__('No', 'martin')
        ),
        'value' => '2',
        'desc' => esc_html__('Do you want to make full width you section? Then please make it Yes.', 'martin'),
    ),
    'is_banner' => array(
        'label' => esc_html__('Is Slider or Banner?', 'martin'),
        'type' => 'switch',
        'right-choice' => array(
            'value' => '1',
            'label' => esc_html__('Yes', 'martin')
        ),
        'left-choice' => array(
            'value' => '2',
            'label' => esc_html__('No', 'martin')
        ),
        'value' => '2',
        'desc' => esc_html__('Do you want to use this section as Slider? Then please make it Yes.', 'martin'),
    ),
    'background_color' => array(
        'label' => esc_html__('Background Color Full', 'martin'),
        'desc' => esc_html__('Please select full section background color. Default color is white.', 'martin'),
        'type' => 'rgba-color-picker',
        'value' => ''
    ),
    'background_image' => array(
        'label' => esc_html__('Background Full Image', 'martin'),
        'desc' => esc_html__('Please select the background image', 'martin'),
        'type' => 'upload',
    ),
    'background_repeat' => array(
        'label' => esc_html__('Background Repeat', 'martin'),
        'type' => 'short-select',
        'value' => 'no-repeat',
        'desc' => esc_html__('Select Background size.', 'martin'),
        'choices' => array(
            'no-repeat' => 'No Repeat',
            'repeat' => 'Repeat'
        ),
    ),
    'background_size' => array(
        'label' => esc_html__('Background Size', 'martin'),
        'type' => 'short-select',
        'value' => '',
        'desc' => esc_html__('Select Background size.', 'martin'),
        'choices' => array(
            '' => 'Auto',
            'cover' => 'Cover',
            '100% 100%' => '100% 100%'
        ),
    ),
    'background_position' => array(
        'label' => esc_html__('Background Position', 'martin'),
        'type' => 'short-select',
        'value' => '',
        'desc' => esc_html__('Select Background Position.', 'martin'),
        'choices' => array(
            '' => 'None',
            'left top' => 'left top',
            'left center' => 'left center',
            'left bottom' => 'left bottom',
            'right top' => 'right top',
            'right center' => 'right center',
            'right bottom' => 'right bottom',
            'center top' => 'center top',
            'center center' => 'center center',
            'center bottom' => 'center bottom'
        ),
    ),
    'background_attachment' => array(
        'label' => esc_html__('Background Attachment', 'martin'),
        'type' => 'short-select',
        'value' => 'scroll',
        'desc' => esc_html__('Select Background Attachment.', 'martin'),
        'choices' => array(
            'scroll' => 'Scroll',
            'fixed' => 'Fixed'
        ),
    ),
    'is_overlay' => array(
        'label' => esc_html__('Is Overlay?', 'martin'),
        'type' => 'switch',
        'right-choice' => array(
            'value' => '1',
            'label' => esc_html__('Yes', 'martin')
        ),
        'left-choice' => array(
            'value' => '2',
            'label' => esc_html__('No', 'martin')
        ),
        'value' => '2',
        'desc' => esc_html__('Do you want to show an overlay? Please turn it to Yes.', 'martin'),
    ),
    'overlay_color' => array(
        'label' => esc_html__('Overlay RGBA Color', 'martin'),
        'type' => 'rgba-color-picker',
        'value' => '',
        'desc' => esc_html__('Select your overlay RGBA color.', 'martin'),
    ),
    'is_half_img' => array(
        'label' => esc_html__('Is Half Image?', 'martin'),
        'type' => 'switch',
        'right-choice' => array(
            'value' => '1',
            'label' => esc_html__('Yes', 'martin')
        ),
        'left-choice' => array(
            'value' => '2',
            'label' => esc_html__('No', 'martin')
        ),
        'value' => '2',
        'desc' => esc_html__('Do you want to inser a half image for this section?', 'martin'),
    ),
    'half_image' => array(
        'label' => esc_html__('Half Image', 'martin'),
        'desc' => esc_html__('Please upload half image.', 'martin'),
        'type' => 'upload',
    ),
    'half_position' => array(
        'label' => esc_html__('Font Weight', 'martin'),
        'type' => 'short-select',
        'value' => '400',
        'desc' => esc_html__('Select your heading font weight.', 'martin'),
        'choices' => array(
            'half_left' => 'Image In Left',
            'half_right' => 'Image In Right',
        )
    ),
    'padding_left' => array(
        'label' => esc_html__('Padding Left', 'martin'),
        'desc' => esc_html__('Don\'t include "px" in your string. e.g "100". Default padding is 0px.', 'martin'),
        'type' => 'text',
    ),
    'padding_right' => array(
        'label' => esc_html__('Padding Right', 'martin'),
        'desc' => esc_html__('Don\'t include "px" in your string. e.g "100". Default padding is 0px.', 'martin'),
        'type' => 'text',
    ),
    'padding_top' => array(
        'label' => esc_html__('Padding Top', 'martin'),
        'desc' => esc_html__('Don\'t include "px" in your string. e.g "100". Default padding is 150px.', 'martin'),
        'type' => 'text',
    ),
    'padding_bottom' => array(
        'label' => esc_html__('Padding Bottom', 'martin'),
        'desc' => esc_html__('Don\'t include "px" in your string. e.g "100". Default padding is 150px.', 'martin'),
        'type' => 'text',
    ),
    'margin_top' => array(
        'label' => esc_html__('Margin Top', 'martin'),
        'desc' => esc_html__('Don\'t include "px" in your string. e.g "100". Default margin is 0px.', 'martin'),
        'type' => 'text',
    ),
    'margin_bottom' => array(
        'label' => esc_html__('Margin Bottom', 'martin'),
        'desc' => esc_html__('Don\'t include "px" in your string. e.g "100". Default margin is 0px.', 'martin'),
        'type' => 'text',
    ),
    'border_top' => array(
        'label' => esc_html__('Border Top', 'martin'),
        'desc' => esc_html__('If you need you can insert border. e.g "1px solid #F1F1F1".', 'martin'),
        'type' => 'text',
    ),
    'border_bottom' => array(
        'label' => esc_html__('Border Bottom', 'martin'),
        'desc' => esc_html__('If you need you can insert border. e.g "1px solid #F1F1F1".', 'martin'),
        'type' => 'text',
    ),
    'custom_class' => array(
        'label' => esc_html__('Custom Class', 'martin'),
        'desc' => esc_html__('Insert custom class name for extra css if you need.', 'martin'),
        'type' => 'text',
    ),
    'custom_id' => array(
        'label' => esc_html__('Custom ID', 'martin'),
        'desc' => esc_html__('Insert custom ID name for extra css if you need.', 'martin'),
        'type' => 'text',
    ),
    'is_absolute' => array(
        'label' => esc_html__('Is Absolute?', 'martin'),
        'type' => 'switch',
        'right-choice' => array(
            'value' => '1',
            'label' => esc_html__('Yes', 'martin')
        ),
        'left-choice' => array(
            'value' => '2',
            'label' => esc_html__('No', 'martin')
        ),
        'value' => '2',
        'desc' => esc_html__('Do you want to make this section to absolute position?', 'martin'),
    ),
);
