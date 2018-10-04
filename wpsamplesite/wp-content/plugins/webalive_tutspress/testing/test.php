<?php 
/**
 * Author: Md Rabiul Islam Robi
 * Description: Custom Post Searchable Metabox
 */


class RIR_Custom_Post_Searchable_Metabox {
    
    /**
     * Construct Function
     */
    public function __construct() {
        add_action( 'admin_enqueue_scripts', array( $this, 'dependent_scripts' ) );
        add_action( 'add_meta_boxes', array( $this, 'add_metabox' ) );
        add_action( 'save_post', array( $this, 'save_metabox_value' ) );
    }

    /**
     * Dependent Scripts
     */
    public function dependent_scripts() {

    }

    /**
     * Add Metabox
     */
    public function add_metabox() {
        $screens = array( 'post' );
        foreach( $screens as $screen ) {
            add_meta_box(
                'rir_searchable_metabox_id',
                'Searchable Metabox',
                array( $this, 'metabox_template' ),
                $screen
            );
        }
    }

    /**
     * Metabox Template
     */
    public function metabox_template($post) {
        $custom_post_id = get_post_meta( $post->ID, '_rir_custom_post_meta_key', true );
        ?>
        <table style="width: 100%">
            <tr>
                <td style="width: 20%">Seacrh Custom Post :</td>
                <td>
                    <select name="rir_search_custom_post" id="rir_search_custom_post">
                        <option>Select One</option>
                        <?php foreach( $this->fetch_custom_post('webalive_course') as $post ) : ?>
                            <option value="<?php echo $post->ID; ?>" <?php selected( $post->ID, $custom_post_id ); ?>><?php echo $post->post_title; ?></option>
                        <?php endforeach; ?>
                    </select>
                </td>
            </tr>
        </table>
        <?php
    }

    /**
     * Save Metabox Value
     */
    public function save_metabox_value($post_id) {
        if( array_key_exists( 'rir_search_custom_post', $_POST ) ) {
            update_post_meta(
                $post_id,
                '_rir_custom_post_meta_key',
                $_POST['rir_search_custom_post']
            );
        }
    }

    /**
     * Fetch Custom Post Type
     */
    public function fetch_custom_post($post_slug) {
        $query = new WP_Query( array( 'post_type' => $post_slug ) );
        return $query->posts;
    }



}
new RIR_Custom_Post_Searchable_Metabox();