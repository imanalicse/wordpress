<?php
/*
Plugin Name: Samples
Plugin URI: http://www.webalive.com.au/
Description: Samples
Version: 1.0
Author: Iman Ali
Author URI: http://www.webalive.com.au/
*/

if (!class_exists("Samples")) {
	require_once('classes/samples.class.php');
	class Samples {
		
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
			$this->table_name = $wpdb->prefix."samples";
			
			//Set Base URL
			$this->base_url = 'admin.php?page=samples';
				
			//Set Root Path
			$base = dirname(__FILE__);
			$this->root_path = $base;
			
			/* END: Initialization */

		}


		function admin_menu(){
			//add_menu_page( $page_title, $menu_title, $capability, $menu_slug, $function, $icon_url, $position );
			add_menu_page('Samples','Samples', 'moderate_comments', 'samples', array($this, 'admin_action'), plugin_dir_url(__FILE__) . 'images/icon.png');

			//add_submenu_page( $parent_slug, $page_title, $menu_title, $capability, $menu_slug, $function );
			add_submenu_page( 'samples', 'Add New', 'Add New', 'moderate_comments', 'samples&action=add', array($this, 'admin_action') );

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
			$sql = "CREATE TABLE IF NOT EXISTS ".$this->table_name." (
                  `ID` int(11) NOT NULL AUTO_INCREMENT,
                  `title` text COLLATE utf8_unicode_ci,
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
			//$wpdb->query('DROP TABLE '.$this->table_name);
		}
		
		/**
		 * Retrive Data
		 *
		 */
		function display(){
			$page_title = "Samples";
			?>							
			<div class="wrap">
				<?php
					echo '<h2>'.$page_title.' <a class="add-new-h2" href="'. $this->base_url.'&amp;action=add">Add New</a></h2>';
					$Samples_Table = new Samples_Table();
                    $s = isset($_GET['s']) ? $_GET['s'] : '';
					$Samples_Table -> prepare_items($s);
					
					?>
					<!-- Forms are NOT created automatically, so you need to wrap the table in one to use features like bulk actions -->
			        <form id="samples" method="get">
			        	<?php $Samples_Table -> search_box( 'Search Title', 'title_search' ); ?>
			            <!-- For plugins, we also need to ensure that the form posts back to our current page -->
			            <input type="hidden" name="page" value="<?php echo $_REQUEST['page'] ?>" />
			            <!-- Now we can render the completed list table -->
			            <?php $Samples_Table -> display(); ?>
			        </form>
			</div>
			<?php
		}		
		
		function add(){
			$page_title = 'Add Sample';
			$submit_btn_text = 'Add Sample';

            global $wpdb;
            $row = new stdClass();
            foreach ($wpdb->get_col( "DESC " . $this->table_name, 0 ) as $column_name ) {
                $row->$column_name = '';
            }

			require_once( 'views/edit.php' );
		}
		
		function edit(){
			global $wpdb;
			
			$page_title = 'Edit Sample';
			$submit_btn_text = 'Save Sample';

			$query = "SELECT * FROM ".$this->table_name." WHERE ID = '".$this->ID."'";
			$row = $wpdb->get_row( $query );

			require_once( 'views/edit.php' );
		}
		
		function save(){
			global $wpdb;			
			
			$wa_data = array();

			$wa_data['title'] = stripslashes_deep($_POST['wa_data']['title']);
			$wa_data['description'] = stripslashes_deep($_POST['wa_data']['description']);
			
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

            wp_redirect(site_url('/wp-admin/admin.php?page=samples'));
		}
		
		/**
		 * Save data
		 *
		 * @param string  $ids Delete ids
		 */
		function delete($ids=null){
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

        // This function is for media uploader
        function wp_manager_admin_scripts() {
            wp_enqueue_script('media-upload');
            wp_enqueue_script('thickbox');
            wp_enqueue_script('jquery');
        }

        function wp_manager_admin_styles() {
            wp_enqueue_style('thickbox');
        }
		

	}
	$Samples = new Samples();
}