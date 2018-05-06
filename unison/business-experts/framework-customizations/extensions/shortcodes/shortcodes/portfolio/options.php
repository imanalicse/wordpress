<?php

if (!defined('FW'))
{
   die('Forbidden');
}
$args = array(
    'taxonomy' => 'folio_cat',
    'orderby' => 'name',
    'show_count' => 0,
    'pad_counts' => 0,
    'hierarchical' => 1,
    'title_li' => '',
    'hide_empty' => 0
);
$all_categories = get_categories($args);
$categories = array();
foreach ($all_categories as $cat)
{
   if ($cat->category_parent == 0)
   {
      $categories[$cat->term_id] = $cat->name;
   }
}
$p_args = array(
    'sort_order' => 'asc',
    'sort_column' => 'post_title',
    'post_type' => 'page',
    'post_status' => 'publish'
);
$pages = get_pages($p_args);
$page_array['0'] = 'Select your portfolio page';
if ($pages)
{
   foreach ($pages as $page)
   {
      $page_array[$page->ID] = $page->post_title;
   }
}
$options = array(
    'portfolio_categories' => array(
        'label' => __('Portfolio Categories', 'be'),
        'type' => 'checkboxes',
        'value' => array(),
        'desc' => __('Select your portfolio category to show, If you want to show all category then you don\'t need to select any category.', 'be'),
        'choices' => $categories,
    ),
    'portfolio_show' => array(
        'label' => esc_html__('Show items', 'be'),
        'type' => 'slider',
        'value' => '12',
        'desc' => esc_html__('How many item you want to show?', 'be'),
    ),
    'portfolio_style' => array(
        'type' => 'multi-picker',
        'label' => false,
        'desc' => false,
        'value' => array(
            'gadget' => '1',
        ),
        'picker' => array(
            'gadget' => array(
                'label' => esc_html__('Portfolio Style', 'be'),
                'type' => 'select',
                'value' => '1',
                'desc' => esc_html__('Select your portfolio show style.', 'be'),
                'choices' => array(
                    '1' => 'Carousel Style',
                    '2' => 'Gallery with Left/Right description',
                    '3' => 'Gallery with title & filter',
                    '4' => 'Gallery with pagination',
                    '5' => 'Gallery with filter & pagination',
                    '6' => 'Gallery with Detail & pagination',
                )
            )
        ),
        'choices' => array(
            '2' => array(
                'sidebar_alignment' => array(
                    'type' => 'radio',
                    'label' => 'Gallery Sidebar',
                    'value' => '1',
                    'choices' => array(
                        '1' => __('left Side'),
                        '2' => __('Right Side'),
                    )
                ),
                'sidebar_image' => array(
                    'type' => 'upload',
                    'label' => __('Left/Right side Background Pattern', 'be'),
                    'value' => '',
                    'desc' => __('Upload your background Pattern image here')
                ),
                'sidebar_color' => array(
                    'type' => 'color-picker',
                    'label' => __('Left/Right side Background Color', 'be'),
                    'value' => '#fff',
                    'desc' => __('Default background color is white')
                ),
                'title' => array(
                    'type' => 'text',
                    'label' => __('Title', 'be'),
                ),
                'title_color' => array(
                    'type' => 'color-picker',
                    'label' => __('Title Color', 'be'),
                    'value' => '#323232'
                ),
                'subtitle' => array(
                    'type' => 'text',
                    'label' => __('Sub Title', 'be'),
                ),
                'content' => array(
                    'type' => 'textarea',
                    'label' => __('Content', 'be'),
                ),
                'page_id' => array(
                    'label' => esc_html__('Portfolio List Page', 'be'),
                    'type' => 'select',
                    'value' => '1',
                    'desc' => esc_html__('Select your portfolio list page.', 'be'),
                    'choices' =>$page_array
                ),
            ),
            '4' => array(
                'post_column' => array(
                    'type' => 'radio',
                    'label' => 'No of Column',
                    'desc'=>__('How many column do you wanna show?'),
                    'value' => '3',
                    'choices' => array(
                        '3' => __('3 Columns'),
                        '4' => __('4 Columns'),
                    )
                ),
            ),
            '5' => array(
                'post_column' => array(
                    'type' => 'radio',
                    'label' => 'No of Column',
                    'desc'=>__('How many column do you wanna show?'),
                    'value' => '3',
                    'choices' => array(
                        '3' => __('3 Columns'),
                        '4' => __('4 Columns'),
                    )
                ),
            ),
            '6' => array(
                'post_column' => array(
                    'type' => 'radio',
                    'label' => 'No of Column',
                    'desc'=>__('How many column do you wanna show?'),
                    'value' => '2',
                    'choices' => array(
                        '2' => __('2 Columns'),
                        '3' => __('3 Columns'),
                    )
                ),
            ),
        ),
        'show_borders' => false,
    ),
);

