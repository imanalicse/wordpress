<?php 
namespace Module;

use Module\Metaboxes;

class Course {

    /**
     * Init
     */
    public function __construct() {
        add_action( 'init', array( $this, 'course_post_type' ) );
        // $metaboxes = new Metaboxes();

		add_filter('single_template', array($this, 'custom_single_template'));
    }

	/**
	 * Load custom Template
	 */
	public function custom_single_template($single) {
		global $post;

		/* Checks for single template by post type */
		if ( $post->post_type == 'webalive_course' ) {
			if ( file_exists( WATP_PATH . 'modules/courses/templates/single-course.php' ) ) {
				return WATP_PATH . 'modules/courses/templates/single-course.php';
			}
		}

		return $single;
	}

    /**
     * Create Course Post Type
     */
    public function course_post_type() {
        $labels = array(
			'name'               => _x( 'Course', 'post type general name', 'webalive_tutspress' ),
			'singular_name'      => _x( 'Course', 'post type singular name', 'webalive_tutspress' ),
			'menu_name'          => _x( 'Course', 'admin menu', 'webalive_tutspress' ),
			'name_admin_bar'     => _x( 'Course', 'add new on admin bar', 'webalive_tutspress' ),
			'add_new'            => _x( 'Add New', 'course', 'webalive_tutspress' ),
			'add_new_item'       => __( 'Add New Course', 'webalive_tutspress' ),
			'new_item'           => __( 'New Course', 'webalive_tutspress' ),
			'edit_item'          => __( 'Edit Course', 'webalive_tutspress' ),
			'view_item'          => __( 'View Course', 'webalive_tutspress' ),
			'all_items'          => __( 'All Course', 'webalive_tutspress' ),
			'search_items'       => __( 'Search Course', 'webalive_tutspress' ),
			'parent_item_colon'  => __( 'Parent Course:', 'webalive_tutspress' ),
			'not_found'          => __( 'No Course found.', 'webalive_tutspress' ),
			'not_found_in_trash' => __( 'No Course found in Trash.', 'webalive_tutspress' ),
		);

		$args = array(
			'labels'             => $labels,
	        'description'        => __( 'Description.', 'webalive_tutspress' ),
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       =>  true,
			'query_var'          => true,
			'rewrite'            => array( 'slug' => 'webalive_course' ),
			'capability_type'    => 'post',
			'has_archive'        => false,
			'hierarchical'       => false,
			'menu_position'      => null,
			'menu_icon'          => 'dashicons-welcome-learn-more',
			'supports'           => array( 'title', 'editor', 'thumbnail' ),
			'show_in_rest'       => true,
		);

		register_post_type( 'webalive_course', $args );
    }

}