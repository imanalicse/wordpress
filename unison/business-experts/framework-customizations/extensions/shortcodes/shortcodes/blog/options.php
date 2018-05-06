<?php

if (!defined('FW'))
{
   die('Forbidden');
}
$p_args = array(
    'sort_order' => 'asc',
    'sort_column' => 'post_title',
    'post_type' => 'page',
    'post_status' => 'publish'
);
$pages = get_pages($p_args);
$page_array['0'] = 'Select your blog page';
if ($pages)
{
   foreach ($pages as $page)
   {
      $page_array[$page->ID] = $page->post_title;
   }
}
$options = array(
    'column' => array(
        'type' => 'radio',
        'label' => esc_html__('Blog Column', 'br'),
        'value' => '2',
        'choices' => array(
            '2' => __('2 Columns'),
            '3' => __('3 Columns'),
        )
    ),
    'title' => array(
        'type' => 'text',
        'label' => esc_html__('Blog Section Title', 'be'),
    ),
    'subtitle' => array(
        'type' => 'text',
        'label' => __('Blog Section Sub Title', 'be'),
    ),
    'blog_show' => array(
        'label' => esc_html__('Show items', 'be'),
        'type' => 'slider',
        'value' => '12',
        'desc' => esc_html__('How many item you want to show?', 'be'),
    ),
    'page_id' => array(
        'label' => esc_html__('Blog List Page', 'be'),
        'type' => 'select',
        'value' => '1',
        'desc' => esc_html__('Select your Blog list page.', 'be'),
        'choices' => $page_array
    ),
);

