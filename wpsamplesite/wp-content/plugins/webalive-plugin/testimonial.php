<?php

add_action('init', 'testimonial_cpt');

add_action('admin_enqueue_scripts', 'webalive_testimoinial_scripts');

function webalive_testimoinial_scripts()
{
    wp_enqueue_script("testimonial-script", plugins_url('testimonial/testimonial.js', __FILE__));
    wp_enqueue_style('testimonial', plugins_url('testimonial/testimonial.css', __FILE__));
}

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

    /*Insert testimonial by programming*/

    /*
    $name = "Iman";
    $email = 'imanali.cse@gmail.com';
    $message = "Testimonial content";
    $data = array(
        'name' => $name,
        'email' => $email,
        'approved' => 0,
        'featured' => 0
    );

    $args = array(
        'post_title'=>'Testimonial From '. $name,
        'post_content'=>$message,
        'post_author'=>1,
        'post_status'=>'publish',
        'post_type'=>'testimonial',
        'meta_input'=> array(
            '_webalive_testimonial_key'=>$data
        )
    );

    $postID = wp_insert_post($args);

    */
}

add_action('add_meta_boxes', 'add_meta_boxes');
add_action('save_post', 'save_meta_box');
add_action('manage_testimonial_posts_columns', 'set_custom_columns');
add_action('manage_testimonial_posts_custom_column', 'set_custom_columns_data', 10, 2);

add_filter('manage_edit-testimonial_sortable_columns', 'set_custom_columns_sortable');

add_action('admin_menu', 'create_shortcode_page');

function create_shortcode_page()
{
    add_submenu_page('edit.php?post_type=testimonial', 'Shortcodes', 'Shortcodes', 'manage_options', 'webalive_testimonial_shortcode', 'shortCodePage');
}

add_shortcode('testimonial-form', 'testimonial_form');

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

    add_meta_box(
        'testimonial_tab',
        'Testimonial Tabs',
        'render_tab_box',
        'testimonial',
        'normal',
        'default'
    );

    add_meta_box(
        'testimonial_biography',
        'Biography',
        'render_biography_box',
        'testimonial',
        'normal',
        'default'
    );


}


function render_biography_box($post) {

    $meta_biography = get_post_meta( $post->ID, 'meta_biography', true );

    wp_editor( $meta_biography, 'biography', array(
        'wpautop'       => true,
        'media_buttons' => true,
        'textarea_name' => 'meta_biography',
        'textarea_rows' => 10,
        'teeny'         => true
    ) );
}

function render_tab_box($post)
{
    $data = get_post_meta($post->ID, '_webalive_testimonial_tabs', true);
    $tab1_content1 =
    $tab1_content1 = isset($data['tab1_content1']) ? $data['tab1_content1'] : '';
    $tab2_content1 = isset($data['tab2_content1']) ? $data['tab2_content1'] : '';
//    echo '<pre>';
//    print_r($data);
//    echo '</pre>';
    ?>
    <div class="tabs">
        <nav>
            <a>Tab #1</a>
            <a>Tab #2</a>
            <a>Tab #3</a>
        </nav>

        <div class="content">
            <p>
                <label class="meta-label" for="tab1_content1">tab 1 content</label>
                <input type="text" id="tab1_content1" name="tabs[tab1_content1]" class="widefat" value="<?php echo $tab1_content1; ?>">
            </p>
<!--            <input type="button" value="Save" class="ajax_save">-->
        </div>

        <div class="content">
            <p>
                <label class="meta-label" for="tab2_content1">tab 2 content 1</label>
                <input type="text" id="tab2_content1" name="tabs[tab2_content1]" class="widefat" value="<?php echo $tab2_content1; ?>">
            </p>
        </div>
        <div class="content">
            <p>Content #3</p>
        </div>
    </div>
    <?php
}

function render_author_box($post)
{

    wp_nonce_field('webalive_testimonial', 'webalive_testimonial_nonce');

    $data = get_post_meta($post->ID, '_webalive_testimonial_key', true);
    $approved = get_post_meta($post->ID, '_webalive_testimonial_approved', true);
    $name = isset($data['name']) ? $data['name'] : '';
    $email = isset($data['email']) ? $data['email'] : '';
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

    $approved = isset($_POST['webalive_testimonial_approved']) ? 1 : 0;

    $data = array(
        'name' => sanitize_text_field($_POST['webalive_testimonial_author']),
        'email' => sanitize_text_field($_POST['webalive_testimonial_email']),
        'featured' => isset($_POST['webalive_testimonial_featured']) ? 1 : 0,
    );

    if(isset($_POST['tabs'])) {
        update_post_meta($post_id, '_webalive_testimonial_tabs', $_POST['tabs']);
    }

    if(isset($_POST['meta_biography'])) {
        update_post_meta($post_id, 'meta_biography', $_POST['meta_biography']);
    }


    update_post_meta($post_id, '_webalive_testimonial_key', $data);
    update_post_meta($post_id, '_webalive_testimonial_approved', $approved);
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

    $approved = get_post_meta($post_id, '_webalive_testimonial_approved', true);

    $name = isset($data['name']) ? $data['name'] : '';
    $email = isset($data['email']) ? $data['email'] : '';
    $approved = ($approved == 1) ? '<strong>YES</strong>' : 'NO';
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

function set_custom_columns_sortable($columns)
{

    $columns['name'] = 'name';
    $columns['approved'] = 'approved';
    $columns['featured'] = 'featured';

    return $columns;
}

function shortCodePage()
{
    require_once "testimonial/testimonial-shortcode.php";
}

function testimonial_form()
{
    ob_start();

    require_once "testimonial/contact-form.php";

    echo "<script src='" . plugins_url('testimonial/form.js', __FILE__) . "'>";

    return ob_get_clean();
}


add_action( 'restrict_manage_posts', 'webalive_admin_posts_filter_restrict_manage_posts' );

function webalive_admin_posts_filter_restrict_manage_posts(){

    $type = 'post';
    if (isset($_GET['post_type'])) {
        $type = $_GET['post_type'];
    }

    //only add filter to post type you want
    if ('testimonial' == $type){
        //change this to the list of values you want to show
        //in 'label' => 'value' format
        $values = array(
            'Approved' => 1,
            'Un-Approved' => 0,
        );
        ?>
        <select name="ADMIN_FILTER_APPROVED">
            <option value=""><?php _e('Filter By ', 'webalive'); ?></option>
            <?php
            $current_v = isset($_GET['ADMIN_FILTER_APPROVED'])? $_GET['ADMIN_FILTER_APPROVED']:'';
            foreach ($values as $label => $value) {
                printf
                (
                    '<option value="%s"%s>%s</option>',
                    $value,
                    $value == $current_v? ' selected="selected"':'',
                    $label
                );
            }
            ?>
        </select>
        <?php
    }
}

add_filter( 'parse_query', 'webalive_posts_filter' );

function webalive_posts_filter( $query ){
    global $pagenow;
    $type = 'post';
    if (isset($_GET['post_type'])) {
        $type = $_GET['post_type'];
    }
    if ( 'testimonial' == $type && is_admin() && $pagenow=='edit.php' && isset($_GET['ADMIN_FILTER_APPROVED']) && $_GET['ADMIN_FILTER_APPROVED'] != '') {
        $query->query_vars['meta_key'] = '_webalive_testimonial_approved';
        $query->query_vars['meta_value'] = $_GET['ADMIN_FILTER_APPROVED'];
    }
}