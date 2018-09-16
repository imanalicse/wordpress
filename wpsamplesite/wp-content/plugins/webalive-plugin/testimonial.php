<?php

add_action('init', 'testimonial_cpt');

function testimonial_cpt()
{

    $args = array(
        'labels' => array(
            'name' => __('Testimonials'),
            'singular_name' => __('Testimonial'),
            'add_new_item' => __('Add New Testimonial', 'textdomain'),
            'edit_item' => __('Edit Testimonial', 'textdomain'),
        ),
        'public' => true,
        'has_archive' => true,
        'menu_icon' => 'dashicons-testimonial',
        'exclude_from_search' => true,
        'plublicly_queryable' => false,
        'support' => array('title', 'editor')
    );

    register_post_type('testimonial', $args);
}

add_action('add_meta_boxes', 'add_meta_boxes');
add_action('save_post', 'save_meta_box');

function add_meta_boxes()
{

    add_meta_box(
        'testimonial_author',
        'Author',
        'render_author_box',
        'testimonial',
        'side',
        'default'
    );

}

function render_author_box($post)
{

    wp_nonce_field('webalive_testimonial_author', 'webalive_testimonial_author_nonce');

    $value = get_post_meta($post->ID, '_webalive_testimonial_author_key', true);

    ?>
    <label for="webalive_testimonial_author">Testimonial author</label>
    <input type="text" id="webalive_testimonial_author" name="webalive_testimonial_author"
           value="<?php echo esc_attr($value); ?>">
    <?php
}

function save_meta_box($post_id)
{
    if (!isset($_POST['webalive_testimonial_author_nonce'])) {
        return $post_id;
    }

    $nonce = $_POST['webalive_testimonial_author_nonce'];
    if (!wp_verify_nonce($nonce, 'webalive_testimonial_author')) {
        return $post_id;
    }

    if (define('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return $post_id;
    }

    if (!current_user_can('edit_post', $post_id)) {
        return $post_id;
    }

    $data = sanitize_text_field($_POST['webalive_testimonial_author']);

    update_post_meta($post_id, '_webalive_testimonial_author_key', $data);

}
