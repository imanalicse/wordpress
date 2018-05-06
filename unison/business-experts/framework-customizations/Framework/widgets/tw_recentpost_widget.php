<?php
/**
 * Creates widget with recent post thumbnail
 */

class martin_recent_post extends WP_Widget
{
    function __construct() 
    {
        $widget_opt = array(
            'classname'     => 'themewar_widget',
            'description'   => 'ThemeWar Recent Post With Thumbnail'
        );
        
        parent::__construct('themewar-rppwt', esc_html__('ThemeWar Recent Post', 'martin'), $widget_opt);
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
        
        if(!empty($instance['number_of_posts1']))
        {
            $ppp = $instance['number_of_posts1'];
        }
        else
        {
            $ppp = 2;
        }
        if(!empty($instance['style']))
        {
            $style = $instance['style'];
        }
        else
        {
            $style = 1;
        }
       
        
        $query = array(
            'post_type'         => array('post'),
            'post_status'       => array('publish'),
            'orderby'           => 'date',
            'order'             => 'DESC',
            'posts_per_page'    => $ppp
        );
        
        $recentposts = new WP_Query($query);
        if($recentposts->have_posts())
        {
            $total = 1;
            if($style == 2 ):
            ?>
            <div class="latestBlog">
                <?php
                    while($recentposts->have_posts()): $recentposts->the_post();
                    $authID = get_the_author_meta('ID');
                    $authURL = get_author_posts_url($authID);
                    ?>
                    <div class="singlatBlog">
                        <?php if(has_post_thumbnail()): ?>
                            <?php echo get_the_post_thumbnail(get_the_ID(), 'martin_testi2'); ?>
                        <?php else: ?>
                            <img src="http://placehold.it/78x78" alt=""/>
                        <?php endif; ?>
                        <h3 class="smallBlogtit"><a href="<?php echo get_the_permalink(); ?>"><?php echo substr(get_the_title(), 0, 27); ?></a></h3>
                        <h6 class="meta">
                            <a href="<?php echo get_the_permalink(); ?>"><?php echo get_the_time('M d'); ?></a>
                            <span>/</span> <?php echo esc_html__('by', 'martin'); ?>
                            <a href="<?php echo esc_url($authURL); ?>"><?php echo get_the_author(); ?></a>
                        </h6>
                    </div>
                    <?php
                    endwhile;
                ?>
            </div>
            <?php
            else:
                echo '<div class="recentPost">';
                while($recentposts->have_posts()): $recentposts->the_post();
            ?>
                <div class="singleRecpost">
                    <?php if(has_post_thumbnail()): ?>
                        <?php echo get_the_post_thumbnail(get_the_ID(), 'martin_testi2'); ?>
                    <?php else: ?>
                        <img src="http://placehold.it/78x78" alt=""/>
                    <?php endif; ?>
                        <h2 class="recblogTit"><a href="<?php echo get_the_permalink(); ?>"><?php echo substr(strip_tags(get_the_title()), 0, 37); ?></a></h2>
                        <p class="recMeta"><?php echo get_the_time('M d, Y'); ?></p>
                </div>
            <?php
                $total++;
                endwhile;
                echo '</div>';
            endif;
        }
        wp_reset_postdata();
        
        echo $args['after_widget'];
    }
    
    
    function update ( $new_instance, $old_instance ) 
    {
        $old_instance['title'] = strip_tags( $new_instance['title'] );
        $old_instance['number_of_posts1'] = $new_instance['number_of_posts1'];
        $old_instance['style'] = $new_instance['style'];

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
            $title = esc_html__( 'Recent Posts', 'martin' );
        }
        if(isset($instance['number_of_posts1']))
        {
            $np = $instance['number_of_posts1'];
        }
        else
        {
            $np = 0;
        }
        if(isset($instance['style']))
        {
            $style = $instance['style'];
        }
        else
        {
            $style = 1;
        }
        
        
        ?>
        <p>
	<label for="<?php echo esc_attr($this->get_field_id( 'title' )); ?>"><?php esc_html_e( 'Title:', 'martin' ); ?></label>
	<input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'title' )); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
	</p>
        <p>
	<label for="<?php echo esc_attr($this->get_field_id( 'style' )); ?>"><?php esc_html_e( 'Style:', 'martin' ); ?></label>
	<select class="widefat" id="<?php echo esc_attr($this->get_field_id( 'style' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'style' )); ?>">
            <option value="1" selected="selected"><?php echo esc_html__('Sidebar Style', 'martin'); ?></option>
            <option value="2" <?php if($style == 2) { echo 'selected="selected"'; } ?>><?php echo esc_html__('Footer Style', 'martin'); ?></option>
        </select>
	</p>
        <p>
	<label for="<?php echo esc_attr($this->get_field_id( 'number_of_posts1' )); ?>"><?php esc_html_e( 'Number Of Posts:' , 'martin' ); ?></label>
	<input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'number_of_posts1' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'number_of_posts1' )); ?>" type="text" value="<?php echo esc_attr( $np ); ?>" />
	</p>
        
        <?php
    }
}
register_widget( 'martin_recent_post' );