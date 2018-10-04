<?php
/**
 * The template for displaying course template
 */

get_header();
?>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div id="primary" class="webalive-content-area">
                    <main id="main" class="webalive-site-main">

                        <?php
                        /**
                         * webalive_before_course_content hook
                         */
                        do_action( 'webalive_before_course_content' );

                        while ( have_posts() ) : the_post();

                            the_title( '<h1 class="entry-title">', '</h1>' );

                            ?>
                            <div class="entry-content">
                                <?php
                                the_content( sprintf(
                                    wp_kses(
                                    /* translators: %s: Name of current post. Only visible to screen readers */
                                        __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'webalive' ),
                                        array(
                                            'span' => array(
                                                'class' => array(),
                                            ),
                                        )
                                    ),
                                    get_the_title()
                                ) );

                                ?>
                            </div><!-- .entry-content -->
                            <?php
                        endwhile; // End of the loop.

                        /**
                         * webalive_after_course_content hook
                         */
                        do_action( 'webalive_after_course_content' );

                        if(isset($_POST['course_id']) && $_POST['course_id'] > 0){
                            set_transient( 'course_cart', $_POST);
                            set_transient( 'is_ecommerce', true );
                            $ecommerce_page_slug = get_option( 'watp_ecommerce_page_slug' );
                            if( is_user_logged_in() ) {
                                wp_redirect( home_url( $ecommerce_page_slug['checkout_slug'] ) );
                            }else {
                                wp_redirect( home_url('/login') );
                            }
                            
                            exit;
                        }
                        $cart = get_transient( 'course_cart' );

                        ?>
                        <form action="" method="post">
                            <input type="hidden" name="course_id" value="<?php echo $post->ID; ?>">
                            <input type="hidden" name="price" value="10">
                            <input type="submit" value="Subscribe">
                        </form>


                    </main><!-- #main -->
                </div><!-- #primary -->
            </div>
        </div>
    </div>


<?php
get_footer();
