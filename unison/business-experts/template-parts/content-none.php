<?php
/**
 * The template part for displaying a message that posts cannot be found
 *
 * @package Martin
 * @subpackage Martin
 * @since Martin  1.0
 */
?>

<section class="no-results not-found">
    <div class="page-content text-center">
        <?php if (is_home() && current_user_can('publish_posts')) : ?>
            <div class="sectionTitle" >
                <h2><?php echo esc_html__('Nothing Found', 'martin'); ?></h2>
                <p><?php printf(__('Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'martin'), esc_url(admin_url('post-new.php'))); ?></p>
            </div>

        <?php elseif (is_search()) : ?>
            <div class="sectionTitle" >
                <h2><?php echo esc_html__('Nothing Found', 'martin'); ?></h2>
                <p><?php echo esc_html__('Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'martin'); ?></p>
            </div>
            <form class="conNoneSearch" id="searchform" role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>">
                <input type="search" class="search-field" value="<?php echo get_search_query(); ?>" name="s" id="s" placeholder="<?php echo esc_html__('Enter any keywords', 'martin') ?>">
                <button type="submit" id="searchsubmit"><i class="sgi-Search"></i></button>
            </form>

        <?php else : ?>
            <div class="sectionTitle" >
                <h2><?php echo esc_html__('Nothing Found', 'martin'); ?></h2>
                <p><?php echo esc_html__('It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'martin'); ?></p>
            </div>
            
            <form class="conNoneSearch" id="searchform" role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>">
                <input type="search" class="search-field" value="<?php echo get_search_query(); ?>" name="s" id="s" placeholder="<?php echo esc_html__('Enter any keywords', 'martin') ?>">
                <button type="submit" id="searchsubmit"><i class="sgi-Search"></i></button>
            </form>

        <?php endif; ?>
    </div><!-- .page-content -->
</section><!-- .no-results -->
