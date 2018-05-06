<?php
/**
 * Creates widget with Your information
 */

class martin_aboutus_widget extends WP_Widget
{
    function __construct() 
    {
        $widget_opt = array(
            'classname'     => 'themewar_aboutus',
            'description'   => 'ThemeWar About Us.'
        );
        
        parent::__construct('themewar-aboutus', esc_html__('ThemeWar About Us.', 'martin'), $widget_opt);
    }
    
    function widget( $args, $instance )
    {
        global $wp_query;
        
        $title = apply_filters( 'widget_title', $instance['title'] );
        echo $args['before_widget'];
        if ( ! empty( $title ) )
        {
            echo $args['before_title'] . esc_html($title) . $args['after_title'];
        }
        $desc = '';
        $phone = '';
        $mail = '';
        $address = '';
        
        if(isset($instance['desc'])){
            $desc = $instance['desc'];
        }
        if(isset($instance['phone'])){
            $phone = $instance['phone'];
        }
        if(isset($instance['mail'])){
            $mail = $instance['mail'];
        }
        if(isset($instance['address'])){
            $address = $instance['address'];
        }
       
        ?>
        <?php if($desc != ''): ?>
        <p class="widgetpera">
            <?php echo strip_tags($desc, '<a><img><br/><br><span>'); ?>
        </p>
        <?php endif; ?>
        <div class="footAddress">
            <?php if($phone != ''): ?>
            <div class="sadds">
                <i class="fa fa-phone"></i>
                <p><?php echo esc_html($phone); ?></p>
            </div>
            <?php endif; ?>
            <?php if($mail != ''): ?>
            <div class="sadds">
                <i class="fa fa-envelope-o"></i>
                <a href="mailto:<?php echo esc_attr($mail); ?>"><?php echo esc_html($mail); ?></a>
            </div>
            <?php endif; ?>
            <?php if($address != ''): ?>
            <div class="sadds">
                <i class="fa fa-map-marker"></i>
                <p><?php echo esc_html($address); ?></p>
            </div>
            <?php endif; ?>
        </div>
                    
        <?php
        
        wp_reset_query();
        
        echo $args['after_widget'];
    }
    
    
    function update ( $new_instance, $old_instance ) 
    {
        $old_instance['title'] = strip_tags( $new_instance['title'] );
        $old_instance['desc'] = $new_instance['desc'];
        $old_instance['phone'] = $new_instance['phone'];
        $old_instance['mail'] = $new_instance['mail'];
        $old_instance['address'] = $new_instance['address'];

        return $old_instance;
    }
    
    function form($instance)
    {
        if(isset($instance['title']))
        {
            $title = $instance['title'];
        }
        else
        {
            $title = esc_html__( 'About Us', 'martin' );
        }
        $desc = '';
        $phone = '';
        $mail = '';
        $address = '';
        
        if(isset($instance['desc'])){
            $desc = $instance['desc'];
        }
        if(isset($instance['phone'])){
            $phone = $instance['phone'];
        }
        if(isset($instance['mail'])){
            $mail = $instance['mail'];
        }
        if(isset($instance['address'])){
            $address = $instance['address'];
        }
        
        ?>
        <p>
	<label for="<?php echo esc_attr($this->get_field_id( 'title' )); ?>"><?php esc_html_e( 'Title:', 'martin' ); ?></label>
	<input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'title' )); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
	</p>
        <p>
	<label for="<?php echo esc_attr($this->get_field_id( 'desc' )); ?>"><?php esc_html_e( 'Description:' , 'martin' ); ?></label>
	<textarea class="widefat" id="<?php echo esc_attr($this->get_field_id( 'desc' )); ?>" 
               name="<?php echo esc_attr($this->get_field_name( 'desc' )); ?>"><?php echo strip_tags( $desc , '<a><img><span><br/><br>'); ?></textarea>
	</p>
        <p>
	<label for="<?php echo esc_attr($this->get_field_id( 'phone' )); ?>"><?php esc_html_e( 'Phone Number:' , 'martin' ); ?></label>
	<input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'phone' )); ?>" 
               name="<?php echo esc_attr($this->get_field_name( 'phone' )); ?>" type="text" 
               value="<?php echo esc_attr( $phone ); ?>" />
	</p>
        <p>
	<label for="<?php echo esc_attr($this->get_field_id( 'mail' )); ?>"><?php esc_html_e( 'Email:' , 'martin' ); ?></label>
	<input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'mail' )); ?>" 
               name="<?php echo esc_attr($this->get_field_name( 'mail' )); ?>" type="text" 
               value="<?php echo esc_attr( $mail ); ?>" />
	</p>
        <p>
	<label for="<?php echo esc_attr($this->get_field_id( 'address' )); ?>"><?php esc_html_e( 'Address:' , 'martin' ); ?></label>
	<input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'address' )); ?>" 
               name="<?php echo esc_attr($this->get_field_name( 'address' )); ?>" type="text" 
               value="<?php echo esc_attr( $address ); ?>" />
	</p>
        
        
        <?php
    }
}
register_widget( 'martin_aboutus_widget' );