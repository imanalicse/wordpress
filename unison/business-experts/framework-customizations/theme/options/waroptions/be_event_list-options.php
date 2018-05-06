<?php

if (!defined('FW'))
{
   die('Forbidden');
}

$options = array(
    'events-list' => array(
        'title' => esc_html__('Event Settings', 'martin'),
        'type' => 'tab',
        'options' => array(
            'events-list-box' => array(
                'title' => esc_html__('Event Settings', 'martin'),
                'type' => 'box',
                'options' => array(
                    'be_event_is_breadcrumb' => array(
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
                    'be_event_bread_crumb_bg' => array(
                        'label' => esc_html__('Title Sction BG', 'martin'),
                        'desc' => esc_html__('Upload page title section background image if you want.', 'martin'),
                        'type' => 'upload',
                    ),
                    'be_event_page_title' => array(
                        'label' => esc_html__('Page Title', 'martin'),
                        'desc' => esc_html__('Insert your Page title', 'martin'),
                        'type' => 'text',
                        'value' => 'Events List'
                    ),
                    'event_show' => array(
                        'label' => esc_html__('Show items', 'be'),
                        'type' => 'slider',
                        'value' => '12',
                        'desc' => esc_html__('How many item you want to show?', 'be'),
                    ),
                    'be_event_sidebar' => array(
                        'type' => 'radio',
                        'label' => 'Sidebar Position',
                        'value' => '1',
                        'choices' => array(
                            '1' => __('left Side'),
                            '2' => __('Right Side'),
                        )
                    ),
                    'be_event_subs_title' => array(
                        'label' => esc_html__('Subscription Title', 'martin'),
                        'desc' => esc_html__('Insert your Subscription Title', 'martin'),
                        'type' => 'text',
                        'value' => 'Sign up to know about our latest news'
                    ),
                    'be_event_subs_sc' => array(
                        'label' => esc_html__('Subscription From shortcode', 'martin'),
                        'desc' => esc_html__('Insert your Subscription From shortcode', 'martin'),
                        'type' => 'text'
                    ),
                )
            ),
        )
    )
);
