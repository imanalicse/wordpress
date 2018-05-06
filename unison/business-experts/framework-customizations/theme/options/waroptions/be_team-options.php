<?php

if (!defined('FW'))
{
   die('Forbidden');
}

$options = array(
    'teams' => array(
        'title' => esc_html__('Team Member Settings', 'martin'),
        'type' => 'tab',
        'options' => array(
            'teams-box' => array(
                'title' => esc_html__('Posts Settings', 'martin'),
                'type' => 'box',
                'options' => array(
                    'qoute_title' => array(
                        'label' => esc_html__('Quote Title', 'martin'),
                        'desc' => esc_html__('Enter the Quote title here.', 'martin'),
                        'type' => 'text',
                        'value' => ''
                    ),
                    'content' => array(
                        'label' => esc_html__('Quote', 'martin'),
                        'desc' => esc_html__('Enter the Quote here', 'martin'),
                        'type' => 'wp-editor',
                        'teeny' => true
                    ),
                    'job' => array(
                        'label' => esc_html__('Job Title', 'martin'),
                        'desc' => esc_html__('Job title of the person.', 'martin'),
                        'type' => 'text',
                        'value' => ''
                    ),
                    'attributes' => array(
                        'label' => esc_html__('Attributes', 'martin'),
                        'popup-title' => esc_html__('Add/Edit your Attribute', 'martin'),
                        'desc' => esc_html__('Here you can add, remove and edit your Attribute like experience, qualification etc that will show on single page.', 'martin'),
                        'type' => 'addable-popup',
                        'template' => '{{=attr_name}}',
                        'popup-options' => array(
                            'attr_icon' => array(
                                'type' => 'icon',
                                'label' => esc_html__('Attribute Icon', 'martin'),
                                'set' => 'tw_line_icon_set'
                            ),
                            'attr_name' => array(
                                'label' => esc_html__('Attribute Name', 'martin'),
                                'type' => 'text',
                                'value' => '',
                                'desc' => esc_html__('Insert your Attribute Name. Don\'t include Colon(:), it will include colon for separation', 'martin')
                            ),
                            'attr_description' => array(
                                'label' => esc_html__('Attribute Description', 'martin'),
                                'type' => 'text',
                                'value' => '',
                                'desc' => esc_html__('Insert your Attribute Description.', 'martin')
                            ),
                        )
                    ),
                    'skills' => array(
                        'label' => esc_html__('Skills', 'martin'),
                        'popup-title' => esc_html__('Add/Edit your skill', 'martin'),
                        'desc' => esc_html__('Here you can add, remove and edit your skill.', 'martin'),
                        'type' => 'addable-popup',
                        'template' => '{{=skill_title}}',
                        'popup-options' => array(
                            'skill_title' => array(
                                'type' => 'text',
                                'label' => esc_html__('Skill Title', 'martin'),
                                'value' => ''
                            ),
                            'skill_percent' => array(
                                'label' => esc_html__('Percent', 'martin'),
                                'type' => 'text',
                                'value' => '',
                                'desc' => esc_html__('Insert your skill percent.', 'martin')
                            ),
                        )
                    ),
                    'mem_link' => array(
                        'label' => esc_html__('Profile Link', 'martin'),
                        'desc' => esc_html__('Insert Member Profile Link.', 'martin'),
                        'type' => 'text',
                        'value' => ''
                    ),
                    'mem_feacebook' => array(
                        'label' => esc_html__('Facebook', 'martin'),
                        'desc' => esc_html__('Insert Member Facebook Page Link.', 'martin'),
                        'type' => 'text',
                        'value' => ''
                    ),
                    'mem_twitter' => array(
                        'label' => esc_html__('Twitter', 'martin'),
                        'desc' => esc_html__('Insert Member Twitter Page Link.', 'martin'),
                        'type' => 'text',
                        'value' => ''
                    ),
                    'mem_goo' => array(
                        'label' => esc_html__('Google+', 'martin'),
                        'desc' => esc_html__('Insert Member Google+ Page Link.', 'martin'),
                        'type' => 'text',
                        'value' => ''
                    ),
                    'mem_lin' => array(
                        'label' => esc_html__('Linkedin', 'martin'),
                        'desc' => esc_html__('Insert Member Linkedin Page Link. ', 'martin'),
                        'type' => 'text',
                        'value' => ''
                    ),
                    'mem_dribbble' => array(
                        'label' => esc_html__('Dribbble', 'martin'),
                        'desc' => esc_html__('Insert Member Dribbble Page Link. ', 'martin'),
                        'type' => 'text',
                        'value' => ''
                    ),
                )
            ),
        )
    )
);
