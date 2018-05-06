<?php
/**
 * Creates widget with recent post thumbnail
 */

class martin_social_widget extends WP_Widget
{
    function __construct() 
    {
        $widget_opt = array(
            'classname'     => 'themewar_widget',
            'description'   => 'ThemeWar Social Widgets.'
        );
        
        parent::__construct('themewar-social', esc_html__('ThemeWar Social Widgets.', 'martin'), $widget_opt);
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
        $fac = '';
        $twi = '';
        $goo = '';
        $ins = '';
        $lin = '';
        $pin = '';
        $fli = '';
        $tum = '';
        $dri = '';
        $you = '';
        if(isset($instance['fac'])){
            $fac = $instance['fac'];
        }
        if(isset($instance['twi'])){
            $twi = $instance['twi'];
        }
        if(isset($instance['goo'])){
            $goo = $instance['goo'];
        }
        if(isset($instance['ins'])){
            $ins = $instance['ins'];
        }
        if(isset($instance['lin'])){
            $lin = $instance['lin'];
        }
        if(isset($instance['pin'])){
            $pin = $instance['pin'];
        }
        if(isset($instance['fli'])){
            $fli = $instance['fli'];
        }
        if(isset($instance['tum'])){
            $tum = $instance['tum'];
        }
        if(isset($instance['dri'])){
            $dri = $instance['dri'];
        }
        if(isset($instance['you'])){
            $you = $instance['you'];
        }
       
        ?>
        <div class="socialIcons">
            <?php if($fac != ''): ?>
            <a href="<?php echo esc_url($fac); ?>"><i class="fa fa-facebook"></i></a>
            <?php endif; ?>
            <?php if($twi != ''): ?>
            <a href="<?php echo esc_url($twi); ?>"><i class="fa fa-twitter"></i></a>
            <?php endif; ?>
            <?php if($goo != ''): ?>
            <a href="<?php echo esc_url($goo); ?>"><i class="fa fa-google-plus"></i></a>
            <?php endif; ?>
            <?php if($ins != ''): ?>
            <a href="<?php echo esc_url($ins); ?>"><i class="fa fa-instagram"></i></a>
            <?php endif; ?>
            <?php if($lin != ''): ?>
            <a href="<?php echo esc_url($lin); ?>"><i class="fa fa-linkedin"></i></a>
            <?php endif; ?>
            <?php if($pin != ''): ?>
            <a href="<?php echo esc_url($pin); ?>"><i class="fa fa-pinterest"></i></a>
            <?php endif; ?>
            <?php if($fli != ''): ?>
            <a href="<?php echo esc_url($fli); ?>"><i class="fa fa-flickr"></i></a>
            <?php endif; ?>
            <?php if($tum != ''): ?>
            <a href="<?php echo esc_url($tum); ?>"><i class="fa fa-tumblr"></i></a>
            <?php endif; ?>
            <?php if($dri != ''): ?>
            <a href="<?php echo esc_url($dri); ?>"><i class="fa fa-dribbble"></i></a>
            <?php endif; ?>
            <?php if($you != ''): ?>
            <a href="<?php echo esc_url($you); ?>"><i class="fa fa-youtube"></i></a>
            <?php endif; ?>
        </div>
        <?php
        
        wp_reset_query();
        
        echo $args['after_widget'];
    }
    
    
    function update ( $new_instance, $old_instance ) 
    {
        $old_instance['title'] = strip_tags( $new_instance['title'] );
        $old_instance['fac'] = $new_instance['fac'];
        $old_instance['twi'] = $new_instance['twi'];
        $old_instance['goo'] = $new_instance['goo'];
        $old_instance['ins'] = $new_instance['ins'];
        $old_instance['lin'] = $new_instance['lin'];
        $old_instance['pin'] = $new_instance['pin'];
        $old_instance['fli'] = $new_instance['fli'];
        $old_instance['tum'] = $new_instance['tum'];
        $old_instance['dri'] = $new_instance['dri'];
        $old_instance['you'] = $new_instance['you'];

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
            $title = esc_html__( 'Social Widget', 'martin' );
        }
        $fac = '';
        $twi = '';
        $goo = '';
        $ins = '';
        $lin = '';
        $pin = '';
        $fli = '';
        $tum = '';
        $dri = '';
        $you = '';
        if(isset($instance['fac'])){
            $fac = $instance['fac'];
        }
        if(isset($instance['twi'])){
            $twi = $instance['twi'];
        }
        if(isset($instance['goo'])){
            $goo = $instance['goo'];
        }
        if(isset($instance['ins'])){
            $ins = $instance['ins'];
        }
        if(isset($instance['lin'])){
            $lin = $instance['lin'];
        }
        if(isset($instance['pin'])){
            $pin = $instance['pin'];
        }
        if(isset($instance['fli'])){
            $fli = $instance['fli'];
        }
        if(isset($instance['tum'])){
            $tum = $instance['tum'];
        }
        if(isset($instance['dri'])){
            $dri = $instance['dri'];
        }
        if(isset($instance['you'])){
            $you = $instance['you'];
        }
        
        
        ?>
        <p>
	<label for="<?php echo esc_attr($this->get_field_id( 'title' )); ?>"><?php esc_html_e( 'Title:', 'martin' ); ?></label>
	<input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'title' )); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
	</p>
        <p>
	<label for="<?php echo esc_attr($this->get_field_id( 'fac' )); ?>"><?php esc_html_e( 'Facebook:' , 'martin' ); ?></label>
	<input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'fac' )); ?>" 
               name="<?php echo esc_attr($this->get_field_name( 'fac' )); ?>" type="text" 
               value="<?php echo esc_attr( $fac ); ?>" />
	</p>
        <p>
	<label for="<?php echo esc_attr($this->get_field_id( 'twi' )); ?>"><?php esc_html_e( 'Twitter:' , 'martin' ); ?></label>
	<input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'twi' )); ?>" 
               name="<?php echo esc_attr($this->get_field_name( 'twi' )); ?>" type="text" 
               value="<?php echo esc_attr( $twi ); ?>" />
	</p>
        <p>
	<label for="<?php echo esc_attr($this->get_field_id( 'goo' )); ?>"><?php esc_html_e( 'Google+:' , 'martin' ); ?></label>
	<input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'goo' )); ?>" 
               name="<?php echo esc_attr($this->get_field_name( 'goo' )); ?>" type="text" 
               value="<?php echo esc_attr( $goo ); ?>" />
	</p>
        <p>
	<label for="<?php echo esc_attr($this->get_field_id( 'ins' )); ?>"><?php esc_html_e( 'Instagram:' , 'martin' ); ?></label>
	<input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'ins' )); ?>" 
               name="<?php echo esc_attr($this->get_field_name( 'ins' )); ?>" type="text" 
               value="<?php echo esc_attr( $ins ); ?>" />
	</p>
        <p>
	<label for="<?php echo esc_attr($this->get_field_id( 'lin' )); ?>"><?php esc_html_e( 'Linkedin:' , 'martin' ); ?></label>
	<input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'lin' )); ?>" 
               name="<?php echo esc_attr($this->get_field_name( 'lin' )); ?>" type="text" 
               value="<?php echo esc_attr( $lin ); ?>" />
	</p>
        <p>
	<label for="<?php echo esc_attr($this->get_field_id( 'pin' )); ?>"><?php esc_html_e( 'Pinterest:' , 'martin' ); ?></label>
	<input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'pin' )); ?>" 
               name="<?php echo esc_attr($this->get_field_name( 'pin' )); ?>" type="text" 
               value="<?php echo esc_attr( $pin ); ?>" />
	</p>
        <p>
	<label for="<?php echo esc_attr($this->get_field_id( 'fli' )); ?>"><?php esc_html_e( 'Flickr:' , 'martin' ); ?></label>
	<input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'fli' )); ?>" 
               name="<?php echo esc_attr($this->get_field_name( 'fli' )); ?>" type="text" 
               value="<?php echo esc_attr( $fli ); ?>" />
	</p>
        <p>
	<label for="<?php echo esc_attr($this->get_field_id( 'tum' )); ?>"><?php esc_html_e( 'Tumblr:' , 'martin' ); ?></label>
	<input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'tum' )); ?>" 
               name="<?php echo esc_attr($this->get_field_name( 'tum' )); ?>" type="text" 
               value="<?php echo esc_attr( $tum ); ?>" />
	</p>
        <p>
	<label for="<?php echo esc_attr($this->get_field_id( 'dri' )); ?>"><?php esc_html_e( 'Dribbble:' , 'martin' ); ?></label>
	<input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'dri' )); ?>" 
               name="<?php echo esc_attr($this->get_field_name( 'dri' )); ?>" type="text" 
               value="<?php echo esc_attr( $dri ); ?>" />
	</p>
        <p>
	<label for="<?php echo esc_attr($this->get_field_id( 'you' )); ?>"><?php esc_html_e( 'Youtube:' , 'martin' ); ?></label>
	<input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'you' )); ?>" 
               name="<?php echo esc_attr($this->get_field_name( 'you' )); ?>" type="text" 
               value="<?php echo esc_attr( $you ); ?>" />
	</p>
        
        <?php
    }
}
register_widget( 'martin_social_widget' );