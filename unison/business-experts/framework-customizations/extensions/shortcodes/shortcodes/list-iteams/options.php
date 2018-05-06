<?php

if (!defined('FW'))
{
   die('Forbidden');
}

$options = array(
    'margin_top' => array(
        'type' => 'text',
        'label' => esc_html__('Margin Top', 'stellar'),
        'desc' => esc_html__('Insert margin top with numeric value. Default margin top 0px.', 'stellar'),
        'value' => ''
    ),
    'margin_bottom' => array(
        'type' => 'text',
        'label' => esc_html__('Margin Bottom', 'stellar'),
        'desc' => esc_html__('Insert margin bottom with numeric value. Default margin bottom 0px.', 'stellar'),
        'value' => ''
    ),
    'items_color' => array(
        'type' => 'color-picker',
        'label' => 'List items color'
    ),
    'border_bottmon' => array(
        'type' => 'text',
        'label' => 'List items Border bottom',
        'desc' => esc_html__('Add your list items Border bottom like 1px solid #3c3c3c'),
        'value' => '1px solid #3c3c3c'
    ),
    'items' => array(
        'type' => 'addable-popup',
        'label' => esc_html__('List Items', 'stellar'),
        'popup-title' => esc_html__('Add/Edit your List Items', 'stellar'),
        'desc' => esc_html__('Create your item', 'stellar'),
        'template' => '{{=item}}',
        'popup-options' => array(
            'item' => array(
                'type' => 'text',
                'label' => esc_html__('List Item', 'stellar')
            ),
        ),
    )
);
