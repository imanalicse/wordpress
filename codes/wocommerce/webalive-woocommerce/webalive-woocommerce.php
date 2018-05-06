<?php
/**
 * Plugin Name: Webalive WooCommerce Extension
 * Plugin URI: http://webalive.com.au
 * Description: Your extension's description text.
 * Version: 1.0.0
 * Author: Webalive
 * Author URI: http://webalive.com.au
 * Developer: Iman Ali
 * Developer URI: http://webalive.com.au
 * Text Domain: webalive.com.au
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

if (!function_exists('webalive_cart_link')) {
    /**
     * Cart Link
     * Displayed a link to the cart including the number of items present and the cart total
     *
     * @return void
     * @since  1.0.0
     */
    function webalive_cart_link()
    {
        ?>
        <a class="cart-contents" href="<?php echo wc_get_cart_url(); ?>" title="<?php _e( 'View your shopping cart' ); ?>"><?php echo WC()->cart->get_cart_contents_count(); ?></a>
        <?php
    }
}

if (!function_exists('webalive_header_cart')) {
    function webalive_header_cart()
    {
        if (is_cart()) {
            $class = 'current-menu-item';
        } else {
            $class = '';
        }
        ?>

        <div class="wa-mini-cart">
            <?php webalive_cart_link(); ?>
            <div class="site-header-cart" style="display: none">
                    <?php the_widget('WC_Widget_Cart', 'title='); ?>
            </div>
        </div>
        <?php
    }
}

add_action('webalive_header', 'webalive_header_cart', 60);

add_filter( 'woocommerce_add_to_cart_fragments', 'woocommerce_header_add_to_cart_fragment' );
function woocommerce_header_add_to_cart_fragment( $fragments ) {
    ob_start();
    ?>
    <a class="cart-contents" href="<?php echo wc_get_cart_url(); ?>" title="<?php _e( 'View your shopping cart' ); ?>"><?php echo WC()->cart->get_cart_contents_count(); ?></a>
    <?php

    $fragments['a.cart-contents'] = ob_get_clean();

    return $fragments;
}

/*
plugins\woocommerce\includes\wc-template-hooks.php
plugins\woocommerce\includes\class-wc-shortcodes.php
*/
// Category list customization: do_shortcode('[product_categories parent=0]');
function woocommerce_after_subcategory_func($category) {
    echo $category->description;
    echo '<div class="link-arrow"><a href="'.get_term_link($category).'"></a></div>';
}
add_action( 'woocommerce_after_subcategory', 'woocommerce_after_subcategory_func', 40 );

//Produce Review
$args = array(
    'number'      => 100,
    'status'      => 'approve',
    'post_status' => 'publish',
    'post_type'   => 'product',
    'meta_key' => 'rating',
    'meta_value' => array(4, 5),
);
$comments = get_comments( $args );
$rating = intval( get_comment_meta( 2, 'rating', true ) );


function webalive_wc_featured_categories() {
    $terms = get_terms( 'product_cat', array(
        'hide_empty' => false
    ) );
    $html = '';
    if ($terms) {
        $html .= '<section class="three-cell">';
        foreach ($terms as $term) {
            $isFeatured = get_option( "product_cat_".$term->term_id."_featured" );
            if ($isFeatured) {
                $thumbnail_id = absint( get_woocommerce_term_meta( $term->term_id, 'thumbnail_id', true ) );
                if ( $thumbnail_id ) {
                    $img_array = wp_get_attachment_image_src($thumbnail_id, 'full');
                    if(isset($img_array[0])){
                        $image = $img_array[0];
                    }else {
                        $image = wp_get_attachment_thumb_url($thumbnail_id);
                    }
                } else {
                    $image = wc_placeholder_img_src();
                }
                $html .='<a href="'.get_term_link($term).'" class="cell-block">
                        <img alt="Custom Combos" src="'.$image.'" />
                        <h3>'.$term->name.'</h3>
                        <p>'.$term->description.'</p>
                    </a>';
            }
        }
        $html .= '</section>';
        return $html;
    }
}

add_shortcode('webalive_wc_featured_categories', 'webalive_wc_featured_categories');

add_action( 'wp_ajax_load_product', 'load_product' );
add_action( 'wp_ajax_nopriv_load_product', 'load_product' );

function load_product() {

    $offset = $_REQUEST['offset'];
    $item_per_page = $_REQUEST['item_per_page'];
    $meta_query  = WC()->query->get_meta_query();
    $tax_query   = WC()->query->get_tax_query();
    $tax_query[] = array(
        'taxonomy' => 'product_visibility',
        'field'    => 'name',
        'terms'    => 'featured',
        'operator' => 'IN',
    );

    $args = array(
        'post_type'           => 'product',
        'post_status'         => 'publish',
        'ignore_sticky_posts' => 1,
        'offset' => $offset,
        'posts_per_page'      => $item_per_page,
        'meta_query'          => $meta_query,
        'tax_query'           => $tax_query,
    );

    $loop = new WP_Query($args);
    while ($loop->have_posts()) : $loop->the_post();
        global $product;
        do_action('woocommerce_shop_loop');
        wc_get_template_part('content', 'product');
    endwhile;
    wp_reset_query();
    exit();
}

function getTotalCountFeatureProduct() {
    $meta_query  = WC()->query->get_meta_query();
    $tax_query   = WC()->query->get_tax_query();
    $tax_query[] = array(
        'taxonomy' => 'product_visibility',
        'field'    => 'name',
        'terms'    => 'featured',
        'operator' => 'IN',
    );

    $args = array(
        'post_type'           => 'product',
        'post_status'         => 'publish',
        'ignore_sticky_posts' => 1,
        'posts_per_page'      => -1,
        'meta_query'          => $meta_query,
        'tax_query'           => $tax_query,
    );
    $my_query = new WP_Query($args);
    $count = $my_query->post_count;
    return $count;
}

function webalive_wc_featured_products($atts) {

    extract( shortcode_atts( array(
        'columns' => 3,
        'item_per_page' => 6
    ), $atts ) );

    $total = getTotalCountFeatureProduct();
    $html = ' <div class="woocommerce columns-'.$columns.'">                
                <ul class="featured-product-list products columns-'.$columns.'" data-total-item="'.$total.'" data-item-per-page="'.$item_per_page.'"></ul>
                <div class="viewmore-product-link"><a href="javascript:void(0);" class="load-more-product">View More Products</a></div>
            </div>';
    return $html;
}
// echo do_shortcode('[webalive_wc_featured_products columns="3" item_per_page="3"]');
add_shortcode('webalive_wc_featured_products', 'webalive_wc_featured_products');

add_action( 'wp_enqueue_scripts', 'webalive_woocommerce_scripts' );

function webalive_woocommerce_scripts() {
    wp_enqueue_script('webalive_woocommerce', plugin_dir_url(__FILE__) . 'js/webalive-woocommerce.js', array(), false, true);
}