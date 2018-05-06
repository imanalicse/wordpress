<?php

if (!defined('FW'))
{
   die('Forbidden');
}

$options = array(
    'be_teams' => array(
        'title' => esc_html__('Single Team', 'martin'),
        'type' => 'tab',
        'options' => array(
            'be_teams-box' => array(
                'title' => esc_html__('Single Team Settings', 'martin'),
                'type' => 'box',
                'options' => array(
                    'be_is_breadcrumb' => array(
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
                    'be_bread_crumb_bg' => array(
                        'label' => esc_html__('Title Sction BG', 'martin'),
                        'desc' => esc_html__('Upload page title section background image if you want.', 'martin'),
                        'type' => 'upload',
                    ),
                    'be_page_title' => array(
                        'label' => esc_html__('Page Title', 'martin'),
                        'desc' => esc_html__('Insert your single Page title', 'martin'),
                        'type' => 'text',
                        'value' => 'Team Member'
                    ),
                    'be_rp_title' => array(
                        'label' => esc_html__('Related Team Title', 'martin'),
                        'desc' => esc_html__('Insert your Related Team Title', 'martin'),
                        'type' => 'text',
                        'value' => 'Member’s Colleagues'
                    ),
                    'be_rp_subtitle' => array(
                        'label' => esc_html__('Related Team Sub Title', 'martin'),
                        'desc' => esc_html__('Insert your Related Team Sub Title', 'martin'),
                        'type' => 'text',
                        'value' => 'Who member work with'
                    ),
                    'be_skill_bg' => array(
                        'label' => esc_html__('Skill Sction BG', 'martin'),
                        'desc' => esc_html__('Upload skill section background image if you want.', 'martin'),
                        'type' => 'upload',
                    ),
                    'be_subs_title' => array(
                        'label' => esc_html__('Subscription Title', 'martin'),
                        'desc' => esc_html__('Insert your Subscription Title', 'martin'),
                        'type' => 'text',
                        'value' => 'Sign up to know about our latest news'
                    ),
                    'be_subs_sc' => array(
                        'label' => esc_html__('Subscription From shortcode', 'martin'),
                        'desc' => esc_html__('Insert your Subscription From shortcode', 'martin'),
                        'type' => 'text'
                    ),
                )
            ),
        )
    )
);
