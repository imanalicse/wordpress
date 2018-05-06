<?php

if (!defined('FW'))
{
   die('Forbidden');
}

$options = array(
    'events' => array(
        'title' => esc_html__('Single Event', 'martin'),
        'type' => 'tab',
        'options' => array(
            'events-box' => array(
                'title' => esc_html__('Single Event Settings', 'martin'),
                'type' => 'box',
                'options' => array(
                    'be_event_single_is_breadcrumb' => array(
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
                    'be_event_single_bread_crumb_bg' => array(
                        'label' => esc_html__('Title Sction BG', 'martin'),
                        'desc' => esc_html__('Upload page title section background image if you want.', 'martin'),
                        'type' => 'upload',
                    ),
                    'be_event_single_page_title' => array(
                        'label' => esc_html__('Page Title', 'martin'),
                        'desc' => esc_html__('Insert your single Page title', 'martin'),
                        'type' => 'text',
                        'value' => 'Single Event'
                    ),
                    'be_event_single_sidebar' => array(
                        'type' => 'radio',
                        'label' => 'Sidebar Position',
                        'value' => '1',
                        'choices' => array(
                            '1' => __('left Side'),
                            '2' => __('Right Side'),
                        )
                    ),
                    'be_event_single_is_comment' => array(
                        'label' => esc_html__('Is Comment Enabale?', 'martin'),
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
                        'desc' => esc_html__('Do you want to show Comment section?', 'martin'),
                    ),
                    'be_event_single_subs_title' => array(
                        'label' => esc_html__('Subscription Title', 'martin'),
                        'desc' => esc_html__('Insert your Subscription Title', 'martin'),
                        'type' => 'text',
                        'value' => 'Sign up to know about our latest news'
                    ),
                    'be_event_single_subs_sc' => array(
                        'label' => esc_html__('Subscription From shortcode', 'martin'),
                        'desc' => esc_html__('Insert your Subscription From shortcode', 'martin'),
                        'type' => 'text'
                    ),
                )
            ),
        )
    )
);
