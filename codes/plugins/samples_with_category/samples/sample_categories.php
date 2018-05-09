<?php
if (!class_exists("SampleCategories")) {
	require_once('classes/sample_categories.class.php');
	class SampleCategories {
		
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
			$this->table_name = $wpdb->prefix."sample_categories";
			
			//Set Base URL
			$this->base_url = 'admin.php?page=sample_categories';
				
			//Set Root Path
			$base = dirname(__FILE__);
			$this->root_path = $base;
			
			/* END: Initialization */

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

		/**
		 * Retrive Data
		 *
		 */
		function display(){
			$page_title = "Sample Categories";
			?>							
			<div class="wrap">
				<?php
					echo '<h2>'.$page_title.' <a class="add-new-h2" href="'. $this->base_url.'&amp;action=add">Add New</a></h2>';
					$Sample_Categories_Table = new Sample_Categories_Table();
					$Sample_Categories_Table -> prepare_items($_GET['s']);
					
					?>
					<!-- Forms are NOT created automatically, so you need to wrap the table in one to use features like bulk actions -->
			        <form id="sample_categories" method="get">
			        	<?php $Sample_Categories_Table -> search_box( 'Search Title', 'title_search' ); ?>
			            <!-- For plugins, we also need to ensure that the form posts back to our current page -->
			            <input type="hidden" name="page" value="<?php echo $_REQUEST['page'] ?>" />
			            <!-- Now we can render the completed list table -->
			            <?php $Sample_Categories_Table -> display(); ?>
			        </form>
			</div>
			<?php
		}		
		
		function add(){
			$page_title = 'Add Sample Category';
			$submit_btn_text = 'Add Sample Category';
			
			require_once( 'views/edit_categories.php' );
		}
		
		function edit(){
			global $wpdb;
			
			$page_title = 'Edit Sample Category';
			$submit_btn_text = 'Save Sample Category';
			
			$query = "SELECT * FROM ".$this->table_name." WHERE ID = '".$this->ID."'";
			$row = $wpdb->get_row( $query );
			
			require_once( 'views/edit_categories.php' );
		}
		
		function save(){
			global $wpdb;			
			
			$wa_data = array();

			$wa_data['title'] = $_POST['wa_data']['title'];			
			$wa_data['slug'] = $_POST['wa_data']['slug'];
			$wa_data['description'] = $_POST['wa_data']['description'];
			
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

            wp_redirect(site_url('/wp-admin/admin.php?page=sample_categories'));
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
	
		function getCategories(){
			global $wpdb;
			$query = "SELECT * FROM ".$this->table_name." WHERE published = 1";
			return $categories = $wpdb->get_results($query);
			
		}
		
		function getCategoryById($id){
			global $wpdb;
			$query = "SELECT * FROM ".$this->table_name." WHERE ID=".$id." AND published = 1";
			return $row = $wpdb->get_row($query);			
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
	$SampleCategories = new SampleCategories();
}
