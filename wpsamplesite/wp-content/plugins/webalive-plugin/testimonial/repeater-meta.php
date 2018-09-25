<?php
add_action('add_meta_boxes', 'add_meta_boxes_repeater');
add_action('save_post', 'save_meta_box_repeater');

function add_meta_boxes_repeater()
{
    add_meta_box(
        'testimonial_contributor',
        'Testimonial Contributors',
        'render_contributors_box',
        'testimonial',
        'normal',
        'default'
    );
}

function render_contributors_box($post)
{
    $contributors = get_post_meta($post->ID, 'contributors', true);
    echo '<pre>';
    print_r($contributors);
    echo '</pre>';
    ?>
    <div class="contributor-container">

        <label class="meta-label" for="webalive_testimonial_author">Contributor Name</label>
        <div class="field-container">
            <p class="row-1"><input type="text" name="contributors[]"  value="" placeholder="Name"><button class="button button-primary add-more">Add More</button> </p>
        </div>
    </div>
    <?php
}

function save_meta_box_repeater($post_id)
{
    echo '<pre>';
    print_r($_POST['contributors']);
    echo '</pre>';
    
    if(isset($_POST['contributors'])){
        update_post_meta($post_id, 'contributors', $_POST['contributors']);
    }
}