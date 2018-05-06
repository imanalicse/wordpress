<?php

if (!defined('FW'))
{
   die('Forbidden');
}

$options = array(
    'posts' => array(
        'title' => esc_html__('Posts Settings', 'martin'),
        'type' => 'tab',
        'options' => array(
            'blog-box' => array(
                'title' => esc_html__('Posts Settings', 'martin'),
                'type' => 'box',
                'options' => array(
                    'post_bread_crumb_bg' => array(
                        'label' => esc_html__('Title Sction BG', 'martin'),
                        'desc' => esc_html__('Upload page title section background image if you want.', 'martin'),
                        'type' => 'upload',
                    ),
                    'single_blog_title' => array(
                        'label' => esc_html__('Page Title', 'martin'),
                        'type' => 'text',
                        'value' => 'Blog Update',
                        'desc' => esc_html__('Insert your single blog page title?', 'martin'),
                    ),
                    'is_single_breadcrumb' => array(
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
                    'single_bread_title' => array(
                        'label' => esc_html__('Breadcrumb Title', 'martin'),
                        'desc' => esc_html__('Insert your portfolio page breadcrumb title', 'martin'),
                        'type' => 'text',
                        'value' => 'martin Blog'
                    ),
                    'is_single_share' => array(
                        'label' => esc_html__('Is Single Share?', 'martin'),
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
                        'desc' => esc_html__('Do you want to show share buttons on single post page?', 'martin'),
                    ),
                    'posts_sidebar' => array(
                        'label' => esc_html__('Posts Sidebar', 'martin'),
                        'type' => 'short-select',
                        'value' => '2',
                        'desc' => esc_html__('Select blog sidebar positions.', 'martin'),
                        'choices' => array(
                            '1' => 'Left Sidebar',
                            '2' => 'Right Sidebar'
                        )
                    ),
                    'is_pagination' => array(
                        'label' => esc_html__('Is Pagination?', 'martin'),
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
                        'desc' => esc_html__('Do you want to show next or prev post link?', 'martin'),
                    ),
                    'is_author' => array(
                        'label' => esc_html__('Is Author?', 'martin'),
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
                        'desc' => esc_html__('Do you want to show author metabox in single post page?', 'martin'),
                    ),
                    'blog_single_subs_title' => array(
                        'label' => esc_html__('Subscription Title', 'martin'),
                        'desc' => esc_html__('Insert your Subscription Title', 'martin'),
                        'type' => 'text',
                        'value' => 'Sign up to know about our latest news'
                    ),
                    'blog_single_subs_sc' => array(
                        'label' => esc_html__('Subscription From shortcode', 'martin'),
                        'desc' => esc_html__('Insert your Subscription From shortcode', 'martin'),
                        'type' => 'text'
                    ),
                )
            ),
        )
    )
);
