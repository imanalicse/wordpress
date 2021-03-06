<?php
/*
Plugin Name: Banners
Plugin URI: http://www.webalive.com.au/
Description: Banners
Version: 1.0
Author: Iman Ali
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
			//END: Install and unstall
			
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

            add_rewrite_rule('banner/([^/]+)/?','index.php?pagename=banner&banner_slug=$matches[1]','top' );
            add_rewrite_rule('banners/([^/]+)/?','index.php?pagename=banners&banner_category_slug=$matches[1]','top' );
		}

		function admin_uninstall() {
			global $wpdb;
			//$wpdb->query("DROP TABLE ".$wpdb->prefix."banner_categories");
			//$wpdb->query("DROP TABLE ".$this->table_name);
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
					$Banners_Table -> prepare_items($_GET['s']);
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
			
			$wa_data = array();


			$wa_data['title'] = $_POST['wa_data']['title'];
			$wa_data['slug'] = $_POST['wa_data']['slug'];
			$wa_data['description'] = $_POST['wa_data']['description'];
			$wa_data['catid'] = $_POST['wa_data']['catid'];
			
			if(isset($_POST['wa_data']['image'])&&strlen($_POST['wa_data']['image'])>0){
                $wa_data['image'] = $_POST['wa_data']['image'];
            }

            $wa_data['ordering'] = $_POST['wa_data']['ordering'];
            $wa_data['published'] = $_POST['wa_data']['published'];

			if( $_POST['wa_data']['id'] ){
				$wpdb->update( $this->table_name, $wa_data, array( 'ID' => $_POST['wa_data']['id'] ) );
			}
			else{
				$wpdb->insert( $this->table_name, $wa_data );
			}

            $redirect_url = '/wp-admin/admin.php?page=banners';
            if(isset($_POST['wa_data']['paged']) && $_POST['wa_data']['paged']>0){
                $redirect_url .= '&paged='.$_POST['wa_data']['paged'];
            }
            if(isset($_POST['wa_data']['redirect_cat_id']) && $_POST['wa_data']['redirect_cat_id']>0){
                $redirect_url .= '&cat_id='.$_POST['wa_data']['redirect_cat_id'];
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
		
		function getBannerById($id){
			global $wpdb;
			$query = "SELECT * FROM ".$this->table_name." WHERE ID = ".$id." AND published = 1";
			$row = $wpdb->get_row( $query );
			return $row;
		}

	}
	$Banners = new Banners();
}

add_action('wp_ajax_generate_slug', 'generate_slug');
function generate_slug()
{
    $str = $_POST['str'];
    $str = strtolower(trim($str));
    $str = preg_replace('/[^a-z0-9-]/', '-', $str);
    $str = preg_replace('/-+/', "-", $str);
    echo  $str;
    exit();
}
add_action('wp_ajax_check_slug', 'check_slug');

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

add_filter( 'query_vars', 'wa_query_vars' );
function wa_query_vars( $query_vars )
{
    $query_vars[] = 'banner_category_slug';
    $query_vars[] = 'banner_slug';
    return $query_vars;
}