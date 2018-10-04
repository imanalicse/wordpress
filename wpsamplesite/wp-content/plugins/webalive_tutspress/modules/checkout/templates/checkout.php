<?php get_header(); ?>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div id="primary" class="webalive-content-area">
                    <main id="main" class="webalive-site-main">

                        <?php

                        while (have_posts()) :
                            the_post();

                            the_title('<h1 class="entry-title">', '</h1>');

                            ?>
                            <div class="entry-content">
                                <?php
                                the_content(sprintf(
                                    wp_kses(
                                    /* translators: %s: Name of current post. Only visible to screen readers */
                                        __('Continue reading<span class="screen-reader-text"> "%s"</span>', 'webalive'),
                                        array(
                                            'span' => array(
                                                'class' => array(),
                                            ),
                                        )
                                    ),
                                    get_the_title()
                                ));
                                ?>
                            </div>
                            <?php

                        endwhile; // End of the loop.

                        ?>

                    </main><!-- #main -->
                </div><!-- #primary -->
            </div>
        </div>
    </div>

<?php
get_footer();
