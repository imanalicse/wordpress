<?php

$args = array('category' => 6 );
$posts = get_posts( $args );
foreach($posts as $post){
    query_posts( array( 'p' => $post->ID ) );
    if ( have_posts() ) {
        while( have_posts() ) {
            the_post();
            ?>
            <div class="blog-post-content">
                <h3><?php the_title(); ?></h3>
                <div class="blog-post-details"><?php the_content(); ?></div>

                <div class="blog-comment">
                    <img class="show" alt="show" src="<?php echo get_template_directory_uri(); ?>/images/blog/plus.png">
                    <img class="hide" alt="hide" src="<?php echo get_template_directory_uri(); ?>/images/blog/minus.png" style="display:none;">
                    <?php echo get_comments_number($post->ID); ?> Comments
                </div>
                <?php comments_template('', true ); ?>
            </div>
        <?php
        }
    }
}
?>