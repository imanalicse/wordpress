<?php
/*
Plugin Name: Banners
Plugin URI: http://www.webalive.com.au/
Description: Banners
Version: 1.0
Author: Webalive
Author URI: http://www.webalive.com.au/
*/

require_once('banner_categories.php');
if (!class_exists("Banners")) {
	require_once('classes/banners.class.php');
	class Banners {
		
		/** @var string	Database Table Name */
		public $action;
		
		/** @var string	Database Table Name */
		public $ID;
		
		/** @var string	Database Table Name */
		public $table_name;

		public $category_table_name;

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

			add_action('wp_ajax_generate_slug', array( $this, 'generate_slug'));
			add_action('wp_ajax_check_slug', array( $this,'check_slug'));
			//END: Install and unstall
			
			/* START: Initialization */
			
			//Set Action
			$action = (isset($_GET['action']) ? $_GET['action'] : '');
			if($action == ''){
				if(isset($_POST['form_data']['action'])){
					$action = $_POST['form_data']['action'];
				}
				else if (isset($_POST['form_data']['action2'])) {
					$action = $_POST['form_data']['action2'];
				}
			}
			$this->action = $action;
			
			//Set ID
			$ID = (int) (isset($_GET['id']) ? $_GET['id'] : '');
			$this->ID = $ID;
			
			//Set Table Name
			$this->table_name = $wpdb->prefix."banners";

			$this->category_table_name = $wpdb->prefix."banner_categories";

			//Set Base URL
			$this->base_url = 'admin.php?page=banners';
				
			//Set Root Path
			$base = dirname(__FILE__);
			$this->root_path = $base;
			
			/* END: Initialization */

		}


		function admin_menu(){
			add_menu_page('Banners','Banners', 'moderate_comments', 'banners', array($this, 'admin_action'));
			add_submenu_page( 'banners', 'Categories', 'Categories', 'administrator', 'banner_categories', array($this, 'admin_category') );
		}
		
		function admin_image(){
			$bannerimage = new BannerImages();
			$bannerimage->admin_action();
		}
		
		function admin_category(){
			$category = new BannerCategories();
			$category->admin_action();
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
						$this->delete();
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

            $sql = "CREATE TABLE IF NOT EXISTS ".$this->category_table_name." (
                        `ID` int(11) NOT NULL AUTO_INCREMENT,
                        `title` text COLLATE utf8_unicode_ci,
                        `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
                        `description` text COLLATE utf8_unicode_ci NOT NULL,
                        `image` int(11) NOT NULL,
                        `published` tinyint(1) NOT NULL DEFAULT '1',
                        `ordering` int(11) NOT NULL,
                        PRIMARY KEY (`ID`)
					) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1";

            $wpdb->query($sql);

			$sql = "CREATE TABLE IF NOT EXISTS ".$this->table_name." (
                        `ID` int(11) NOT NULL AUTO_INCREMENT,
                        `catid` int(11) NOT NULL,
                        `title` text COLLATE utf8_unicode_ci,
                        `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
                        `description` text COLLATE utf8_unicode_ci NOT NULL,
                        `image` int(11) NOT NULL,
                        `published` tinyint(1) NOT NULL DEFAULT '1',
                        `ordering` int(11) NOT NULL,
                        PRIMARY KEY (`ID`)
				) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1";

			$wpdb->query($sql);
		}

		function admin_uninstall() {
			global $wpdb;
			$wpdb->query("DROP TABLE ".$this->category_table_name);
			$wpdb->query("DROP TABLE ".$this->table_name);
			
		}
		
		/**
		 * Retrive Data
		 *
		 */
		function display(){
			$page_title = "Banners";

            $add_link = $this->base_url.'&amp;action=add';

            if(isset($_REQUEST['cat_id']) && $_REQUEST['cat_id']>0){
                $add_link .='&amp;cat_id='.$_REQUEST['cat_id'];
            }

			?>							
			<div class="wrap">
				    <?php
					echo '<h2>'.$page_title.' <a class="add-new-h2" href="'.$add_link.'">Add New</a></h2>';
					$Banners_Table = new Banners_Table();
					$s = isset($_GET['s']) ? $_GET['s'] : '';
					$Banners_Table -> prepare_items($s);
			        ?>
					<!-- Forms are NOT created automatically, so you need to wrap the table in one to use features like bulk actions -->
			        <form id="banners" method="get">
			        	<?php $Banners_Table -> search_box( 'Search Title', 'title_search' ); ?>
			            <!-- For plugins, we also need to ensure that the form posts back to our current page -->
			            <input type="hidden" name="page" value="<?php echo $_REQUEST['page'] ?>" />
			            <!-- Now we can render the completed list table -->
			            <?php $Banners_Table -> display(); ?>
			        </form>
			</div>
			<?php
		}		
		
		function add(){
			$page_title = 'Add Banner';
			$submit_btn_text = 'Add Banner';

			global $wpdb;

			$query = "SHOW COLUMNS FROM ".$this->table_name;
			$results = $wpdb->get_results( $query );
			$row = new stdClass();
			foreach ($results as $result){
				$field = $result->Field;
				$row->$field = '';
			}

			require_once( 'views/edit.php' );
		}
		
		function edit(){
			global $wpdb;
			
			$page_title = 'Edit Banner';
			$submit_btn_text = 'Save Banner';
			
			$query = "SELECT * FROM ".$this->table_name." WHERE ID = '".$this->ID."'";
			$row = $wpdb->get_row( $query );
			
			require_once( 'views/edit.php' );
		}
		
		function save(){
			global $wpdb;			
			
			$form_data = array();


			$form_data['title'] = $_POST['form_data']['title'];
			$form_data['catid'] = $_POST['form_data']['catid'];
			
			if(isset($_POST['form_data']['image'])&&strlen($_POST['form_data']['image'])>0){
                $form_data['image'] = $_POST['form_data']['image'];
            }

            $form_data['ordering'] = $_POST['form_data']['ordering'];
            $form_data['published'] = $_POST['form_data']['published'];

			if( $_POST['form_data']['id'] ){
				$wpdb->update( $this->table_name, $form_data, array( 'ID' => $_POST['form_data']['id'] ) );
			}
			else{
				$wpdb->insert( $this->table_name, $form_data );
			}

            $redirect_url = '/wp-admin/admin.php?page=banners';
            if(isset($_POST['form_data']['paged']) && $_POST['form_data']['paged']>0){
                $redirect_url .= '&paged='.$_POST['form_data']['paged'];
            }
            if(isset($_POST['form_data']['redirect_cat_id']) && $_POST['form_data']['redirect_cat_id']>0){
                $redirect_url .= '&cat_id='.$_POST['form_data']['redirect_cat_id'];
            }

            wp_redirect(site_url($redirect_url));
		}
		
		/**
		 * Save data
		 *
		 * @param string  $ids Delete ids
		 */
		function delete(){
			global $wpdb;

            $query = "DELETE FROM ".$this->table_name."  WHERE ID = '".$_GET['id']."'";
            $wpdb->query( $query );
		
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
		
		function getBanners(){
			global $wpdb;
			$query = "SELECT * FROM ".$this->table_name." WHERE published = 1 ORDER BY ordering";
			$rows = $wpdb->get_results( $query );
			return $rows;
		}

        function getBannerByCategorySlug($slug=''){
            global $wpdb;
            $query = "SELECT * FROM ".$this->table_name." WHERE published = 1 AND catid = (SELECT ID FROM ".$this->category_table_name." WHERE slug='".$slug."') ORDER BY ordering";
            $rows = $wpdb->get_results( $query );
            return $rows;
        }
		
		function getBannerById($id){
			global $wpdb;
			$query = "SELECT * FROM ".$this->table_name." WHERE ID = ".$id." AND published = 1";
			$row = $wpdb->get_row( $query );
			return $row;
		}

		function generate_slug()
		{
			$str = $_POST['str'];
			$str = strtolower(trim($str));
			$str = preg_replace('/[^a-z0-9-]/', '-', $str);
			$str = preg_replace('/-+/', "-", $str);
			echo  $str;
			exit();
		}

		function check_slug(){
			global $wpdb;
			$slug = $_POST['slug'];
			$id = $_POST['id'];
			$table_name = $wpdb->prefix.$_POST['table_name'];
			$query = "SELECT ID FROM ".$table_name." WHERE slug='".$slug."'";
			if($id>0){
				$query .=" AND ID NOT IN(".$id.")";
			}
			$get_id = (int)$wpdb->get_var($query);
			echo $get_id;
			exit();
		}

		public static function getBannerHtml( $atts ) {

            extract( shortcode_atts( array(
                'slug' => '',
            ), $atts ) );

            $Banners = new Banners();
            $banners = $Banners->getBannerByCategorySlug($slug);
            $image_size = 'full';

            $html ='';
            if(sizeof($banners)>0){
                $html .= '<ul id="'.$slug.'" class="bxslider">';
                        foreach($banners as $row){
                            $image_attributes = wp_get_attachment_image_src(  $row->image, $image_size );
                            if( $image_attributes ) {
                                $html .= '<li>'. wp_get_attachment_image( $row->image, $image_size ).'</li>';
                            }
                        }
                $html .= '</ul>';
            }
            return $html;
        }
	}
	$Banners = new Banners();
}

add_shortcode( 'banner', array('Banners', 'getBannerHtml'));