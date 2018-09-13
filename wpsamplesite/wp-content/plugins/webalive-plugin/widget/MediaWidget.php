<?php


class MediaWidget extends WP_Widget
{
    public $widget_ID;

    public $widget_name;

    public $widget_options = array();

    public $control_options = array();

    public function __construct()
    {
        $this->widget_ID = "webalive_media_widget";

        $this->widget_name = "Webalive Media Widget";

        $this->widget_options = array(
            'classname' => $this->widget_ID,
            'description' => $this->widget_name,
            'customize_selective_refresh' => true
        );

        $this->control_options = array(
            'width' => 400,
            'height' => 300
        );

        parent::__construct($this->widget_ID, $this->widget_name, $this->widget_options, $this->control_options);
    }

    //Backend display of widget
    public function form($instance)
    {
        echo '<p>Backend form</p>';
    }

    // Front end display of Widget
    public function widget($args, $instance)
    {
        echo "Media Widget aa";
    }
}


add_action('widgets_init', function () {
    register_widget("MediaWidget");
});