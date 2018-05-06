<?php

if (!defined('FW'))
{
   die('Forbidden');
}

$options = array(
    'be_event' => array(
        'title' => esc_html__('Event Settings', 'martin'),
        'type' => 'tab',
        'options' => array(
            'be_event-box' => array(
                'title' => esc_html__('Event Settings', 'martin'),
                'type' => 'box',
                'options' => array(
                    'event_subtitle' => array(
                        'label' => esc_html__('Event Sub Title', 'martin'),
                        'desc' => esc_html__('Enter the event sub title.', 'martin'),
                        'type' => 'text',
                    ),
                    'event_location' => array(
                        'label' => esc_html__('Event Location', 'martin'),
                        'desc' => esc_html__('Enter the event Location.', 'martin'),
                        'type' => 'text',
                    ),
                    'event_date' => array(
                        'label' => esc_html__('Event Date', 'martin'),
                        'desc' => esc_html__('Select your event date.', 'martin'),
                        'type' => 'datetime-picker',
                    ),
                   
                )
            ),
        )
    )
);
