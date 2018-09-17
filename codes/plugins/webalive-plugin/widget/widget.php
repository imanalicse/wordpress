<?php


class ProfileWidget extends WP_Widget
{

//    public function __construct($id_base, $name, array $widget_options, array $control_options)
//    {
//        parent::__construct($id_base, $name, $widget_options, $control_options);
//    }

    public function __construct()
    {
        $widget_opt = array(
            'classname' => 'webalive-profile-widget',
            'description' => 'Custom webalive profile widget'
        );

        parent::__construct('webalive_profile', 'Webalvie Profile', $widget_opt);
    }

    //Backend display of widget

    public function form($instance)
    {
        echo '<p>Backend form</p>';
    }

    // Front end display of Widget
    public function widget($args, $instance)
    {
        echo $args['before_widget'];
        echo "Webalive profile";
        echo $args['after_widget'];
    }
}

add_action('widgets_init', function () {
    register_widget("ProfileWidget");
});
