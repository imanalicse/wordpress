<?php
if (!defined('FW')) {
    die('Forbidden');
}

$styles = 1;
if ($atts['styles'] != '') {
    $styles = $atts['styles'];
}

$number_of_item = 3;
if ($atts['number_of_item'] != '') {
    $number_of_item = $atts['number_of_item'];
}

?>

<?php if($styles == 2): ?>
<div class="row">
    <?php
        $blogs = array(
            'post_type'             => array('post'),
            'post_status'           => array('publish'),
            'posts_per_page'        => $number_of_item,
            'orderby'               => 'date',
            'order'                 => 'DESC'
        );
        
        $posta = new WP_Query($blogs);
        if($posta->have_posts())
        {
            while($posta->have_posts())
            {
                $posta->the_post();
                $authID = get_the_author_meta('ID');
                $authURL = get_author_posts_url($authID);
                $num_comments = get_comments_number(get_the_ID());

                if ( $num_comments == 0 ) {
                    $com = esc_html__('0 Comment', 'martin');
                } 
                elseif ( $num_comments > 1 ) 
                {
                    $com = $num_comments . esc_html__(' Comments', 'martin');
                } 
                else 
                {
                    $com = esc_html__('1 Comment', 'martin');
                }
                ?>
                <div data-wow-delay="300ms" data-wow-duration="700ms" class="col-sm-6 wow fadeInUp">
                    <div class="singleBlog3">
                        <div class="sb3_img">
                            <?php 
                                if(has_post_thumbnail())
                                {
                                    echo get_the_post_thumbnail(get_the_ID(), 'martin_latesblog1');
                                }
                                else
                                {
                                    echo '<img alt="" src="http://placehold.it/560x350">';
                                }
                            ?>
                        </div>
                        <div class="sb3_details">
                            <div class="sb3_date">
                                <h2><?php echo get_the_time('d'); ?></h2>
                                <span><?php echo get_the_time('M'); ?></span>
                            </div>
                            <div class="sb3_blog_con">
                                <h3><a href="<?php echo get_the_permalink(); ?>"><?php echo get_the_title(); ?></a></h3>
                                <div class="sb3_meta">
                                    <?php echo esc_html__('By', 'martin'); ?>
                                    <a href="<?php echo esc_url($authURL); ?>"><?php echo get_the_author(); ?></a> 
                                    <span>|</span> 
                                    <a href="<?php echo get_the_permalink(); ?>"> <?php echo esc_html($com); ?></a>  
                                    <span>|</span> <?php echo esc_html__('In', 'martin'); ?> 
                                    <?php
                                        $categories = wp_get_object_terms(get_the_ID(), 'category');
                                        if (is_array($categories)) {
                                            $lastCat = count($categories);
                                            $lp = 1;
                                            foreach ($categories as $cats) {
                                                if($lp > 1){ break; }
                                                echo '<a href="' . get_category_link($cats->term_id) . '">' . $cats->name . '</a>';
                                                $lp++;
                                            }
                                        } else {
                                            echo '<a href="#">Uncategorized</a>';
                                        }
                                    ?>
                                </div>
                                <p>
                                    <?php echo substr(strip_tags(get_the_content()), 0, 202); ?>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
            }
        }
        wp_reset_postdata();
    ?>
</div>
<?php elseif($styles == 3): ?>
<div class="row">
    <?php
        $blogs = array(
            'post_type'             => array('post'),
            'post_status'           => array('publish'),
            'posts_per_page'        => $number_of_item,
            'orderby'               => 'date',
            'order'                 => 'DESC'
        );
        
        $posta = new WP_Query($blogs);
        if($posta->have_posts())
        {
            while($posta->have_posts())
            {
                $posta->the_post();
                $authID = get_the_author_meta('ID');
                $authURL = get_author_posts_url($authID);
                $num_comments = get_comments_number(get_the_ID());

                if ( $num_comments == 0 ) {
                    $com = esc_html__('0 Comment', 'martin');
                } 
                elseif ( $num_comments > 1 ) 
                {
                    $com = $num_comments . esc_html__(' Comments', 'martin');
                } 
                else 
                {
                    $com = esc_html__('1 Comment', 'martin');
                }
                $post_views_count = 0;
                if(get_post_meta(get_the_ID(), 'post_views_count', TRUE) != '')
                {
                    $post_views_count = get_post_meta(get_the_ID(), 'post_views_count', TRUE);
                }
                $background = '';
                if(has_post_thumbnail())
                {
                    $imgs = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full');
                    $background = 'background-image: url('.esc_url($imgs[0]).'); background-repeat: repeat; background-position: center center; ';
                }
                ?>
                <div data-wow-delay="400ms" data-wow-duration="700ms" class="single4blog text-center wow fadeInUp">
                    <div class="blHOverDiv" style="<?php echo esc_attr($background); ?>"></div>
                    <div class="single4blogIn">
                        <div class="meta4date">
                            <h3><?php echo get_the_time('F d, Y'); ?> <?php echo esc_html__('By', 'martin'); ?> <a href="<?php echo esc_url($authURL); ?>"><?php echo get_the_author(); ?></a></h3>
                        </div>
                        <h2 class="blog4conttit">
                            <a href="<?php echo get_the_permalink(); ?>"><?php echo get_the_title(); ?></a>
                        </h2>
                        <div class="meta4bot">
                            <a href="<?php echo get_the_permalink(); ?>"><i class="fa fa-heart-o"></i><?php echo esc_attr($post_views_count).' '.esc_html__('Views', 'martin'); ?></a>
                            <a href="<?php echo get_the_permalink(); ?>"><i class="fa fa-comment-o"></i><?php echo esc_html($com); ?></a>
                        </div>
                    </div>
                </div>
                <?php
            }
        }
        wp_reset_postdata();
    ?>
</div>
<?php else: ?>
<div class="row">
    <?php
        $blogs = array(
            'post_type'             => array('post'),
            'post_status'           => array('publish'),
            'posts_per_page'        => $number_of_item,
            'orderby'               => 'date',
            'order'                 => 'DESC'
        );
        
        $posta = new WP_Query($blogs);
        if($posta->have_posts())
        {
            while($posta->have_posts())
            {
                $posta->the_post();
                $authID = get_the_author_meta('ID');
                $authURL = get_author_posts_url($authID);
                $num_comments = get_comments_number(get_the_ID());

                if ( $num_comments == 0 ) {
                    $com = esc_html__('0 Comment', 'martin');
                } 
                elseif ( $num_comments > 1 ) 
                {
                    $com = $num_comments . esc_html__(' Comments', 'martin');
                } 
                else 
                {
                    $com = esc_html__('1 Comment', 'martin');
                }
                ?>
                <div data-wow-delay="300ms" data-wow-duration="700ms" class="col-md-4 col-sm-6 col-xs-12 wow fadeInUp">
                    <div class="singleBlog">
                        <div class="blogimg">
                            <?php 
                                if(has_post_thumbnail())
                                {
                                    echo get_the_post_thumbnail(get_the_ID(), 'martin_latesblog1');
                                }
                                else
                                {
                                    echo '<img alt="" src="http://placehold.it/436x291">';
                                }
                            ?>
                            
                        </div>
                        <div class="blogDec">
                            <div class="datea">
                                <h2><?php echo get_the_time('d'); ?></h2>
                                <p><?php echo get_the_time('M'); ?></p>
                            </div>
                            <div class="titMeta">
                                <h2 class="blogTit">
                                    <a href="<?php echo get_the_permalink(); ?>"><?php echo substr(get_the_title(), 0, 24); ?></a>
                                </h2>
                                <div class="meta"><?php echo esc_html__('By', 'martin') ?>
                                    <a href="<?php echo esc_url($authURL); ?>"><?php echo get_the_author(); ?></a> 
                                    <span>|</span> 
                                    <a href="<?php echo get_the_permalink(); ?>"> <?php echo esc_html($com); ?></a>  
                                    <span>|</span> <?php echo esc_html__('In', 'martin'); ?> 
                                    <?php
                                        $categories = wp_get_object_terms(get_the_ID(), 'category');
                                        if (is_array($categories)) {
                                            $lastCat = count($categories);
                                            $lp = 1;
                                            foreach ($categories as $cats) {
                                                if($lp > 1){ break; }
                                                echo '<a href="' . get_category_link($cats->term_id) . '">' . $cats->name . '</a>';
                                                $lp++;
                                            }
                                        } else {
                                            echo '<a href="#">Uncategorized</a>';
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
            }
        }
        wp_reset_postdata();
    ?>
</div>
<?php endif; ?>
