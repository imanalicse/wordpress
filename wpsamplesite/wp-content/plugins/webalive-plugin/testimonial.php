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
add_action('manage_testimonial_posts_columns', 'set_custom_columns');
add_action('manage_testimonial_posts_custom_column', 'set_custom_columns_data', 10, 2);

add_filter('manage_edit-testimonial_sortable_columns', 'set_custom_columns_sortable');

function add_meta_boxes()
{

    add_meta_box(
        'testimonial_author',
        'Testimonial Options',
        'render_author_box',
        'testimonial',
        'side',
        'default'
    );

}

function render_author_box($post)
{

    wp_nonce_field('webalive_testimonial', 'webalive_testimonial_nonce');

    $data = get_post_meta($post->ID, '_webalive_testimonial_key', true);
    $name = isset($data['name']) ? $data['name'] : '';
    $email = isset($data['email']) ? $data['email'] : '';
    $approved = isset($data['approved']) ? $data['approved'] : false;
    $featured = isset($data['featured']) ? $data['featured'] : false;
    ?>
    <p>
        <label class="meta-label" for="webalive_testimonial_author">Author Name</label>
        <input type="text" id="webalive_testimonial_author" name="webalive_testimonial_author" class="widefat"
               value="<?php echo esc_attr($name); ?>">
    </p>
    <p>
        <label class="meta-label" for="webalive_testimonial_email">Author Email</label>
        <input type="email" id="webalive_testimonial_email" name="webalive_testimonial_email" class="widefat"
               value="<?php echo esc_attr($email); ?>">
    </p>
    <div class="meta-container">
        <label class="meta-label w-50 text-left" for="webalive_testimonial_approved">Approved</label>
        <div class="text-right w-50 inline">
            <div class="ui-toggle inline"><input type="checkbox" id="webalive_testimonial_approved"
                                                 name="webalive_testimonial_approved"
                                                 value="1" <?php echo $approved ? 'checked' : ''; ?>>
                <label for="webalive_testimonial_approved">
                    <div></div>
                </label>
            </div>
        </div>
    </div>
    <div class="meta-container">
        <label class="meta-label w-50 text-left" for="webalive_testimonial_featured">Featured</label>
        <div class="text-right w-50 inline">
            <div class="ui-toggle inline"><input type="checkbox" id="webalive_testimonial_featured"
                                                 name="webalive_testimonial_featured"
                                                 value="1" <?php echo $featured ? 'checked' : ''; ?>>
                <label for="webalive_testimonial_featured">
                    <div></div>
                </label>
            </div>
        </div>
    </div>
    <?php
}

function save_meta_box($post_id)
{

    if (!isset($_POST['webalive_testimonial_nonce'])) {
        return $post_id;
    }

    $nonce = $_POST['webalive_testimonial_nonce'];
    if (!wp_verify_nonce($nonce, 'webalive_testimonial')) {
        return $post_id;
    }

    if (define('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return $post_id;
    }

    if (!current_user_can('edit_post', $post_id)) {
        return $post_id;
    }

    $data = array(
        'name' => sanitize_text_field($_POST['webalive_testimonial_author']),
        'email' => sanitize_text_field($_POST['webalive_testimonial_email']),
        'approved' => isset($_POST['webalive_testimonial_approved']) ? 1 : 0,
        'featured' => isset($_POST['webalive_testimonial_featured']) ? 1 : 0,
    );

    update_post_meta($post_id, '_webalive_testimonial_key', $data);
}

function set_custom_columns($columns)
{

    $title = $columns['title'];
    $date = $columns['date'];

    unset($columns['title']);
    unset($columns['date']);

    $columns['name'] = 'Author';
    $columns['title'] = $title;
    $columns['approved'] = 'Approved';
    $columns['featured'] = 'Featured';
    $columns['date'] = $date;

    return $columns;
}

function set_custom_columns_data($column, $post_id)
{

    $data = get_post_meta($post_id, '_webalive_testimonial_key', true);
    $name = isset($data['name']) ? $data['name'] : '';
    $email = isset($data['email']) ? $data['email'] : '';
    $approved = isset($data['approved']) && $data['approved'] === 1 ? '<strong>YES</strong>' : 'NO';
    $featured = isset($data['featured']) && $data['featured'] === 1 ? '<strong>YES</strong>' : 'NO';

    switch ($column) {
        case 'name':
            echo '<strong>' . $name . '</strong><br/><a href="mailto:' . $email . '">' . $email . '</a>';
            break;

        case 'approved':
            echo $approved;
            break;

        case 'featured':
            echo $featured;
            break;
    }
}

function set_custom_columns_sortable($columns) {

    $columns['name'] = 'name';
    $columns['approved'] = 'approved';
    $columns['featured'] = 'featured';
    
    return $columns;
}