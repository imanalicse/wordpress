<?php

if (!defined('FW'))
{
   die('Forbidden');
}

$options = array(
    'blog' => array(
        'title' => esc_html__('Blog Settings', 'martin'),
        'type' => 'tab',
        'options' => array(
            'blog-box' => array(
                'title' => esc_html__('Blog Settings', 'martin'),
                'type' => 'box',
                'options' => array(
                    'bread_crumb_bg' => array(
                        'label' => esc_html__('Title Sction BG', 'martin'),
                        'desc' => esc_html__('Upload page title section background image if you want.', 'martin'),
                        'type' => 'upload',
                    ),
                    'blog_title' => array(
                        'type' => 'text',
                        'label' => esc_html__('Blog Page Title', 'martin'),
                        'value' => 'Blog Updates',
                        'desc' => esc_html__('Insert Blog Page Title. ', 'martin')
                    ),
                    'is_blog_breadcrumb' => array(
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
                        'value' => '1',
                        'desc' => esc_html__('Do you want to show breadcrumb?', 'martin'),
                    ),
                    'blog_bread_title' => array(
                        'label' => esc_html__('Breadcrumb Title', 'martin'),
                        'desc' => esc_html__('Insert your portfolio page breadcrumb title', 'martin'),
                        'type' => 'text',
                        'value' => 'martin Blog'
                    ),
                    'blog_style' => array(
                        'label' => esc_html__('Blog Style', 'martin'),
                        'type' => 'short-select',
                        'value' => '1',
                        'desc' => esc_html__('Select your blog style.', 'martin'),
                        'choices' => array(
                            '1' => 'List View',
                            '2' => 'Grid View'
                        )
                    ),
                    'blog_sidebar' => array(
                        'label' => esc_html__('Blog Sidebar Position', 'martin'),
                        'type' => 'short-select',
                        'value' => '2',
                        'desc' => esc_html__('Select blog sidebar positions for List View', 'martin'),
                        'choices' => array(
                            '1' => 'Left Sidebar',
                            '2' => 'Right Sidebar',
                            '3' => 'Full Width',
                        )
                    ),
                    'blog_columns' => array(
                        'label' => esc_html__('Blog Columns', 'martin'),
                        'type' => 'short-select',
                        'value' => '2',
                        'desc' => esc_html__('Select blog Columns for Grid View', 'martin'),
                        'choices' => array(
                            '2' => '2 Columns',
                            '3' => '3 Columns',
                        )
                    ),
                    'post_per_page' => array(
                        'label' => esc_html__('Post Per Page', 'martin'),
                        'type' => 'slider',
                        'value' => 5,
                        'desc' => esc_html__('How many post do you want to show in blog page?', 'martin'),
                    ),
                    'blog_subs_title' => array(
                        'label' => esc_html__('Subscription Title', 'martin'),
                        'desc' => esc_html__('Insert your Subscription Title', 'martin'),
                        'type' => 'text',
                        'value' => 'Sign up to know about our latest news'
                    ),
                    'blog_subs_sc' => array(
                        'label' => esc_html__('Subscription From shortcode', 'martin'),
                        'desc' => esc_html__('Insert your Subscription From shortcode', 'martin'),
                        'type' => 'text'
                    ),
                )
            ),
        )
    )
);
