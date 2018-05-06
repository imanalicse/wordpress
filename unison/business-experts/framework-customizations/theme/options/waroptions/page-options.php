<?php

if (!defined('FW'))
{
   die('Forbidden');
}

$options = array(
    'pagesettings' => array(
        'title' => esc_html__('Page Settings', 'martin'),
        'type' => 'tab',
        'options' => array(
            'pagesettings-box' => array(
                'title' => esc_html__('Page Settings', 'martin'),
                'type' => 'box',
                'options' => array(
                    'page_crumb_bg' => array(
                        'label' => esc_html__('Banner Sction BG', 'martin'),
                        'desc' => esc_html__('Upload page banner section background image if you want.', 'martin'),
                        'type' => 'upload',
                    ),
                    'page_title' => array(
                        'type' => 'text',
                        'label' => esc_html__('Custom Page Title', 'martin'),
                        'value' => '',
                        'desc' => esc_html__('You can insert a custom page title here for title section. ', 'martin')
                    ),
                    'page_is_breadcrumb' => array(
                        'label' => esc_html__('Is Breadcrumb?', 'martin'),
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
                        'desc' => esc_html__('Do you want to show page breadcrumb on banner?', 'martin'),
                    ),
                    'page_bread_title' => array(
                        'type' => 'text',
                        'label' => esc_html__('Breadcrumb Title', 'martin'),
                        'value' => '',
                        'desc' => esc_html__('Insert your breadcrumb title. Otherwise it will show title by degault. ', 'martin')
                    ),
                    'page_sidebar' => array(
                        'label' => esc_html__('Sidebar Position', 'martin'),
                        'type' => 'short-select',
                        'value' => '2',
                        'desc' => esc_html__('Select page sidebar positions. This option only work for default page template.', 'martin'),
                        'choices' => array(
                            '1' => 'Left Sidebar',
                            '2' => 'Right Sidebar',
                            '3' => 'Full Width',
                        )
                    ),
                    'page_subs_title' => array(
                        'label' => esc_html__('Subscription Title', 'martin'),
                        'desc' => esc_html__('Insert your Subscription Title', 'martin'),
                        'type' => 'text',
                        'value' => 'Sign up to know about our latest news'
                    ),
                    'page_subs_sc' => array(
                        'label' => esc_html__('Subscription From shortcode', 'martin'),
                        'desc' => esc_html__('Insert your Subscription From shortcode', 'martin'),
                        'type' => 'text'
                    ),
                )
            ),
        )
    )
);
