<?php 
namespace Module;

use Vimeo\Vimeo;
use Vimeo\Exceptions\VimeoUploadException;
use Module\Vimeo_Uploader\Template;

class Vimeo_Uploader {

    public $client_id;
    public $client_secret;
    public $access_token;

    public $template;

    private $wp_nonce = 'webalive_tutspress';

    public function __construct() {
        $this->loader();
        $vimeo = get_option('watp_vimeo_api');
        $this->client_id = $vimeo['client_id'];
        $this->client_secret = $vimeo['client_secret'];
        $this->access_token = $vimeo['api_token'];

        add_action( 'admin_menu', array( $this, 'create_menu' ) );
        add_action( 'wp_ajax_upload_video', array( $this, 'upload' ) );
        add_action( 'wp_ajax_fetch_all_videos', array( $this, 'fetch_all_videos' ) );
        add_action( 'wp_ajax_create_vimeo_album', array( $this, 'create_vimeo_album' ) );
        add_action( 'wp_ajax_fetch_albums', array( $this, 'fetch_albums' ) );
        add_action( 'wp_ajax_delete_vimeo_album', array( $this, 'delete_vimeo_album' ) );
        add_action( 'wp_ajax_generate_edit_album_form', array( $this, 'generate_edit_album_form' ) );
        add_action( 'wp_ajax_edit_vimeo_album', array( $this, 'edit_vimeo_album' ) );
    }

    /**
     * Required File Loader
     */
    public function loader() {
        require_once WATP_PATH . '/libs/vimeo/autoload.php';
    }

    /**
     * Create menu For Course
     */
    public function create_menu() {
        add_submenu_page(
            'webalive-tutpress', 
            __( 'Vimeo Uploader', 'webalive_tutpress' ), 
            'Vimeo Uploader', 
            'manage_options', 
            'webalive-tutpress-vimeo-uploader', 
            array( $this, 'template' )
        );
    }

    /**
     * Course Template
     */
    public function template() {
        // init template
        $this->template = new Template();
        $this->template->tab_template();
    }

    /**
     * Upload Videos
     */
    public function upload() {
        if (!function_exists('wp_handle_upload')) {
            require_once(ABSPATH . 'wp-admin/includes/file.php');
        }

        // Checking wp_nonce
        check_ajax_referer( $this->wp_nonce, 'security' );

        $uploadedfile = $_FILES['file'];
        if( isset($_POST['fields']) ) {
            parse_str( $_POST['fields'], $fields );
        }

        if (empty($this->access_token)) {
            throw new Exception(
                'You can not upload a file without an access token. You can find this token on your app page, or generate ' .
                'one using `auth.php`.'
            );
        }

        // Instantiate the library with your client id, secret and access token (pulled from dev site)
        $lib = new Vimeo($this->client_id, $this->client_secret, $this->access_token);
        $file_name = $uploadedfile['tmp_name'];

        try {

            // Upload the file and include the video title and description.
            $uri = $lib->upload( $file_name, array(
                'name' => $fields['watp_video_title'],
                'description' => $fields['watp_video_description'],
                'privacy' => [
                    'view' => $fields['watp_video_privacy']
                ]
            ));

            // Make an API call to see if the video is finished transcoding.
            $video_data = $lib->request($uri . '?fields=transcode.status');

            // Make an API call to edit the title and description of the video.
            $video_data = $lib->request($uri, array(
                'name' => $fields['watp_video_title'],
                'description' => $fields['watp_video_description'],
                'privacy' => [
                    'view' => $fields['watp_video_privacy']
                ]
            ), 'PATCH');
            
            if( $video_data ) {
                $return_data = array(
                    'link' => $uri,
                    'status' => $video_data['status']
                );
                echo wp_json_encode( $return_data );
            }
            

        }catch(VimeoRequestException $e) {

            // We may have had an error. We can't resolve it here necessarily, so report it to the user.
            echo 'Error uploading ' . $file_name . "\n";
            echo 'Server reported: ' . $e->getMessage() . "\n";

        }catch (VimeoRequestException $e) {

            echo 'There was an error making the request.' . "\n";
            echo 'Server reported: ' . $e->getMessage() . "\n";
            
        }
        
        die();
    }

    /**
     * Fetch All Videos
     */
    public function fetch_all_videos() {
        // Checking wp_nonce
        check_ajax_referer( $this->wp_nonce, 'security' );

        if (empty($this->access_token)) {
            throw new Exception(
                'You can not upload a file without an access token. You can find this token on your app page, or generate ' .
                'one using `auth.php`.'
            );
        }

        // Instantiate the library with your client id, secret and access token (pulled from dev site)
        $lib = new Vimeo($this->client_id, $this->client_secret, $this->access_token);

        $response = $lib->request( '/me/videos', ['per_page' => 10], 'GET' );

        if( $response ) {
            echo wp_json_encode($response['body']);
        }

        die();
    }

    /**
     * Create An Album
     */
    public function create_vimeo_album() {

        // Checking wp_nonce
        check_ajax_referer( $this->wp_nonce, 'security' );

        if (empty($this->access_token)) {
            throw new Exception(
                'You can not upload a file without an access token. You can find this token on your app page, or generate ' .
                'one using `auth.php`.'
            );
        }

        // Getting Fields Value
        if( isset($_POST['fields']) ) {
            parse_str( $_POST['fields'], $fields );
        }else {
            return;
        }

        // Instantiate the library with your client id, secret and access token (pulled from dev site)
        $lib = new Vimeo($this->client_id, $this->client_secret, $this->access_token);

        $response = $lib->request( '/me/albums', array(
            'name' => $fields['watp_album_name'],
            'description' => $fields['watp_album_description'],
            'privacy' => $fields['watp_album_privacy']
        ), 'POST' );

        if( $response ) {
            echo wp_json_encode($response['body']);
        }

        die();
    }

    /**
     * Fetch All Albums
     */
    public function fetch_albums() {

        if (empty($this->access_token)) {
            throw new Exception(
                'You can not upload a file without an access token. You can find this token on your app page, or generate ' .
                'one using `auth.php`.'
            );
        }

        // Instantiate the library with your client id, secret and access token (pulled from dev site)
        $lib = new Vimeo( $this->client_id, $this->client_secret, $this->access_token );

        $response = $lib->request( 
            '/me/albums', 
            ['per_page' => 5], 
            'GET' 
        );

        if( $response ) {
            echo wp_json_encode($response['body']);
        }

        die();
    }

    /**
     * Delete A Vimeo Album
     */
    public function delete_vimeo_album() {
        // Checking wp_nonce
        check_ajax_referer( $this->wp_nonce, 'security' );

        if (empty($this->access_token)) {
            throw new Exception(
                'You can not upload a file without an access token. You can find this token on your app page, or generate ' .
                'one using `auth.php`.'
            );
        }

        // Checking if album id is exists or not
        if( empty($_POST['album_id']) ) {
            return;
        }

        // Instantiate the library with your client id, secret and access token (pulled from dev site)
        $lib = new Vimeo( $this->client_id, $this->client_secret, $this->access_token );

        $response = $lib->request( 
            '/me/albums/'.$_POST['album_id'], 
            '', 
            'DELETE' 
        );

        if( $response ) {
            echo wp_json_encode($response['body']);
        }


        die();
    }

    /**
     * Generate Edit Ablum Form
     */
    public function generate_edit_album_form() {
        // Checking wp_nonce
        check_ajax_referer( $this->wp_nonce, 'security' );

        if (empty($this->access_token)) {
            throw new Exception(
                'You can not upload a file without an access token. You can find this token on your app page, or generate ' .
                'one using `auth.php`.'
            );
        }

        // Checking if album id is exists or not
        if( empty($_POST['album_id']) ) {
            return;
        }

        // Instantiate the library with your client id, secret and access token (pulled from dev site)
        $lib = new Vimeo( $this->client_id, $this->client_secret, $this->access_token );

        $response = $lib->request( 
            '/me/albums/'.$_POST['album_id'], 
            '', 
            'GET' 
        );

        if( $response ) {
            echo wp_json_encode($response['body']);
        }


        die();
    }

    /**
     * Edit Vimeo Album
     */
    public function edit_vimeo_album() {
        // Checking wp_nonce
        check_ajax_referer( $this->wp_nonce, 'security' );

        if (empty($this->access_token)) {
            throw new Exception(
                'You can not upload a file without an access token. You can find this token on your app page, or generate ' .
                'one using `auth.php`.'
            );
        }

        // Getting Fields Value
        if( isset($_POST['fields']) ) {
            parse_str( $_POST['fields'], $fields );
        }else {
            return;
        }

        // Instantiate the library with your client id, secret and access token (pulled from dev site)
        $lib = new Vimeo($this->client_id, $this->client_secret, $this->access_token);

        $response = $lib->request( '/me/albums/'.$fields['watp_album_hidden_id'], array(
            'name'          => $fields['watp_edited_album_name'],
            'description'   => $fields['watp_edited_album_description'],
            'privacy'       => $fields['watp_edited_album_privacy']
        ), 'PATCH' );

        if( $response ) {
            echo wp_json_encode($response['body']);
        }

        die();
    }

    
}