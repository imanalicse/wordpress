<?php
/*
Plugin Name: Videos
Plugin URI: http://www.webalive.com.au/
Description: Videos
Version: 1.0
Author: Iman Ali
Author URI: http://www.webalive.com.au/
*/

if (!class_exists("Videos")) {
	require_once('classes/videos.class.php');
	class Videos {
		
		/** @var string	Database Table Name */
		public $action;
		
		/** @var string	Database Table Name */
		public $ID;
		
		/** @var string	Database Table Name */
		public $table_name;
		
		/** @var string	Base Url */
		public $base_url;
		
		/** @var	string	Root Path */
		public $root_path;
		
		/**
		 * Constructor set necessary properties.
		 *
		 */
		function __construct() {
			
			global $wpdb;
			
			add_action('admin_menu', array(&$this, 'admin_menu'));

			//START: Install and unstall
			register_activation_hook(__FILE__, array($this, 'admin_install'));
			register_deactivation_hook(__FILE__, array($this, 'admin_uninstall'));
			//END: Install and unstall

            // This is for media uploader
            add_action('admin_print_scripts', array($this, 'wp_manager_admin_scripts'));
            add_action('admin_print_styles', array($this,'wp_manager_admin_styles'));
			
			/* START: Initialization */
			
			//Set Action
			$action = (isset($_GET['action']) ? $_GET['action'] : '');
			if($action == ''){
				if(isset($_POST['wa_data']['action'])){
					$action = $_POST['wa_data']['action'];
				}
				else if (isset($_POST['wa_data']['action2'])) {
					$action = $_POST['wa_data']['action2'];
				}
			}
			$this->action = $action;
			
			//Set ID
			$ID = (int) (isset($_GET['id']) ? $_GET['id'] : '');
			$this->ID = $ID;
			
			//Set Table Name
			$this->table_name = $wpdb->prefix."videos";
			
			//Set Base URL
			$this->base_url = 'admin.php?page=videos';
				
			//Set Root Path
			$base = dirname(__FILE__);
			$this->root_path = $base;
			
			/* END: Initialization */

		}


        // This function is for media uploader
        function wp_manager_admin_scripts() {
            wp_enqueue_script('media-upload');
            wp_enqueue_script('thickbox');
            wp_enqueue_script('jquery');
        }

        function wp_manager_admin_styles() {
            wp_enqueue_style('thickbox');
        }

		function admin_menu(){
			//add_menu_page( $page_title, $menu_title, $capability, $menu_slug, $function, $icon_url, $position );
			add_menu_page('Videos','Videos', 'moderate_comments', 'videos', array($this, 'admin_action'));

			//add_submenu_page( $parent_slug, $page_title, $menu_title, $capability, $menu_slug, $function );
			add_submenu_page( 'videos', 'Add New', 'Add New', 'moderate_comments', 'videos&action=add', array($this, 'admin_action') );

		}

		function admin_action(){

			global $wpdb;

			switch( $this->action ) {
				case 'save':
					$this->save();
					break;
			
				case 'add':
					$this->add();
					break;
			
				case 'edit':
					$this->edit();
					break;
						
				case 'published':
					if (isset($_GET['id'])) {
						$ids = implode(",", $_GET['id']);
						$this->published($ids);
						$this->display();
					}
					else {
						$this->display();
					}
					break;
			
				case 'unpublished':
					if (isset($_GET['id'])) {
						$ids = implode(",", $_GET['id']);
						$this->unpublished($ids);
						$this->display();
					}
					else {
						$this->display();
					}
					break;
			
				case 'delete':
						$this->delete($id);
					break;
				
				case 'deleteBulk':
					if (isset($_GET['id'])) {
						$ids = implode(",", $_GET['id']);
						$this->deleteBulk($ids);
						$this->display();
					}
					else {
						$this->display();
					}
					break;
			
				default:
					$this->display();
					break;
			}

		}

		function admin_install() {
		
			global $wpdb;			
			$sql = "CREATE TABLE IF NOT EXISTS ".$this->table_name." (
                    `ID` int(11) NOT NULL AUTO_INCREMENT,
                    `title` text COLLATE utf8_unicode_ci,
                    `video_link` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
                    `image` int(11) NOT NULL,
                    `published` tinyint(1) NOT NULL DEFAULT '1',
                    `ordering` int(11) NOT NULL,
                    PRIMARY KEY (`ID`)
			) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1";

			$wpdb->query($sql);
		}

		function admin_uninstall() {
			global $wpdb;
			$wpdb->query('DROP TABLE '.$this->table_name);
		}
		
		/**
		 * Retrive Data
		 *
		 */
		function display(){
			$page_title = "Videos";
			?>							
			<div class="wrap">
				<?php
					echo '<h2>'.$page_title.' <a class="add-new-h2" href="'. $this->base_url.'&amp;action=add">Add New</a></h2>';
					$Videos_Table = new Videos_Table();
					$Videos_Table -> prepare_items($_GET['s']);
					
					?>
					<!-- Forms are NOT created automatically, so you need to wrap the table in one to use features like bulk actions -->
			        <form id="videos" method="get">
			        	<?php $Videos_Table -> search_box( 'Search Title', 'title_search' ); ?>
			            <!-- For plugins, we also need to ensure that the form posts back to our current page -->
			            <input type="hidden" name="page" value="<?php echo $_REQUEST['page'] ?>" />
			            <!-- Now we can render the completed list table -->
			            <?php $Videos_Table -> display(); ?>
			        </form>
			</div>
			<?php
		}		
		
		function add(){
			$page_title = 'Add Video';
			$submit_btn_text = 'Add Video';
			
			require_once( 'views/edit.php' );
		}
		
		function edit(){
			global $wpdb;
			
			$page_title = 'Edit Video';
			$submit_btn_text = 'Save Video';
			
			$query = "SELECT * FROM ".$this->table_name." WHERE ID = '".$this->ID."'";
			$row = $wpdb->get_row( $query );
			
			require_once( 'views/edit.php' );
		}
		
		function save(){
			global $wpdb;			
			
			$wa_data = array();

			$wa_data['title'] = @stripslashes($_POST['wa_data']['title']);
			$wa_data['video_link'] = @stripslashes($_POST['wa_data']['video_link']);
			$wa_data['ordering'] = $_POST['wa_data']['ordering'];
			$wa_data['published'] = $_POST['wa_data']['published'];

			if(isset($_POST['wa_data']['image'])&&strlen($_POST['wa_data']['image'])>0){
                $wa_data['image'] = $_POST['wa_data']['image'];
            }

			if( $_POST['wa_data']['id'] ){
				$wpdb->update( $this->table_name, $wa_data, array( 'ID' => $_POST['wa_data']['id'] ) );
			}
			else{
				$wpdb->insert( $this->table_name, $wa_data );
			}
						
			
			$this->display();
		}
		
		/**
		 * Save data
		 *
		 * @param string  $ids Delete ids
		 */
		function delete($ids=null){
			global $wpdb;
		
			if($ids){
				$query = "DELETE FROM ".$this->table_name."  WHERE ID IN(".$ids.")";
				$wpdb->query( $query );
			}
			else{
				$query = "DELETE FROM ".$this->table_name."  WHERE ID = '".$_GET['id']."'";
				$wpdb->query( $query );
			}
		
			$this->display();
		}
		
		/**
		 * Save data
		 *
		 * @param string  $ids Delete ids
		 */
		function deleteBulk($ids){
			global $wpdb;
				$query = "DELETE FROM ".$this->table_name."  WHERE ID IN(".$ids.")";
				$wpdb->query( $query );
		}
		
				
		/**
		 * Save data
		 *
		 * @param string  $ids published ids
		 */
		function published($ids){
			global $wpdb;
		
			$query = "UPDATE ".$this->table_name."  SET published = '1' WHERE ID IN(".$ids.")";
			$wpdb->query( $query );
		
		}
		
		/**
		 * Save data
		 *
		 * @param string  $ids unpublished ids
		 */
		function unpublished($ids){
			global $wpdb;
		
			$query = "UPDATE ".$this->table_name."  SET published = '0' WHERE ID IN(".$ids.")";
			$wpdb->query( $query );
		}

        function getVideos(){
            global $wpdb;
            $query = "SELECT * FROM ".$this->table_name." WHERE published = 1";
             return $wpdb->get_results($query);
        }

        function getCodeByURL($url){

            if(strstr($url, 'v=')){
                $queryString = parse_url($url, PHP_URL_QUERY);
                parse_str($queryString, $params);
                $code = $params['v'];
            }else{
                $video_explode = explode('/', $url);
                $code = $video_explode[sizeof($video_explode)-1];
            }
            return $code;
        }

        function getThumb($video_code){
            if($video_code){
                $thumb = 'http://i3.ytimg.com/vi/'.$video_code.'/0.jpg';
                return '<img src="'.$thumb.'">';
            }
        }

        function video_slider() {
            $videos = $this->getVideos();
            if(!empty($videos)){
                echo '<ul class="video_list">';
                foreach($videos as $video){
                    $video_code = $this->getCodeByURL($video->video_link);
                    if($video_code){
                        $thumb = 'http://i3.ytimg.com/vi/'.$video_code.'/0.jpg';
                    ?>
                        <li>
                            <a href="javascript:" onclick="showVideo('<?php echo $video_code; ?>')"><div class="play_icon">Play</div></a>
                            <img src="<?php echo $thumb; ?>" title="<?php echo $video->title; ?>" alt="<?php echo $video->title; ?>">
                        </li>
                    <?php
                    }
                }
                echo '</ul>';
            }
        }

	}
    $videos_obj = new Videos();
}

function videos_sc() {

    $videos_obj = new Videos();
    $videos = $videos_obj->getVideos();
    $output = '';
    if(!empty($videos)){
        $output .= '<ul class="video_list">';
        foreach($videos as $video){
            $video_code = $videos_obj->getCodeByURL($video->video_link);
            $thumb = $videos_obj->getThumb($video_code);
            $output .='<li><a href="javascript:" onclick="showVideo(\"'.$thumb.'\")">Play</a><div class="play_icon"></div>'.$thumb.'</li>';
        }
        $output .='</ul>';
    }
    return $output;
}

add_shortcode( 'videos', 'videos_sc' );

function popup_container(){
    ?>
    <div class="popup_video_wrapper">
        <div class="popup_video_container">
            <div id="video_frame">
            </div>
            <a href="javascript:" class="close_video" onclick="closeVideo()" style="display:none;"><img src="<?php echo get_template_directory_uri(); ?>/images/close_icon_popup.png" alt="Close"/></a>
        </div>
    </div>
<?php
}

add_action('wp_head', 'popup_container');
add_action( 'wp_enqueue_scripts', 'video_scripts');

function video_scripts() {

    wp_register_script( 'boxSlider', plugins_url('videos') . '/js/jquery.bxslider.js', array(), '1.0.0', true );
    wp_enqueue_script( 'boxSlider' );
    wp_register_script( 'video', plugins_url('videos') . '/js/video.js', array(), '1.0.0', true );
    wp_enqueue_script( 'video' );

    wp_register_style( 'video', plugins_url('video.css', __FILE__) );
    wp_enqueue_style( 'video' );

}
