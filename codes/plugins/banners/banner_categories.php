<?php
if (!class_exists("BannerCategories")) {
	require_once('classes/banner_categories.class.php');
	class BannerCategories {
		
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
			$this->table_name = $wpdb->prefix."banner_categories";
			
			//Set Base URL
			$this->base_url = 'admin.php?page=banner_categories';
				
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
			$page_title = "Banner Categories";
			?>							
			<div class="wrap">
				<?php
					echo '<h2>'.$page_title.' <a class="add-new-h2" href="'. $this->base_url.'&amp;action=add">Add New</a></h2>';
					$Banner_Categories_Table = new Banner_Categories_Table();
					$search_sting = isset($_GET['s']) ? $_GET['s'] : '';
					$Banner_Categories_Table -> prepare_items($search_sting);
					
					?>
					<!-- Forms are NOT created automatically, so you need to wrap the table in one to use features like bulk actions -->
			        <form id="banner_categories" method="get">
			        	<?php $Banner_Categories_Table -> search_box( 'Search Title', 'title_search' ); ?>
			            <!-- For plugins, we also need to ensure that the form posts back to our current page -->
			            <input type="hidden" name="page" value="<?php echo $_REQUEST['page'] ?>" />
			            <!-- Now we can render the completed list table -->
			            <?php $Banner_Categories_Table -> display(); ?>
			        </form>
			</div>

			<script>

				jQuery(".category-short-code").click(function () {
					selectText(jQuery(this).attr('id'));
				});

				function selectText(containerid) {
					if (document.selection) {
						var range = document.body.createTextRange();
						range.moveToElementText(document.getElementById(containerid));
						range.select();
					} else if (window.getSelection) {
						var range = document.createRange();
						range.selectNode(document.getElementById(containerid));
						window.getSelection().addRange(range);
					}
				}
			</script>

			<?php
		}		
		
		function add(){

			$page_title = 'Add Banner Category';
			$submit_btn_text = 'Add Banner Category';

			global $wpdb;
			$sql = "SHOW COLUMNS FROM  ".$this->table_name;
			$result = $wpdb->get_results( $sql );
			$row = new stdClass();
			foreach ($result as $r){
				$field = $r->Field;
				$row->$field = '';
			}
			
			require_once( 'views/edit_categories.php' );
		}
		
		function edit(){
			global $wpdb;
			
			$page_title = 'Edit Banner Category';
			$submit_btn_text = 'Save Banner Category';

			$query = "SELECT * FROM ".$this->table_name." WHERE ID = '".$this->ID."'";
			$row = $wpdb->get_row( $query );
			
			require_once( 'views/edit_categories.php' );
		}
		
		function save(){
			global $wpdb;			
			
			$form_data = array();

			$form_data['title'] = $_POST['form_data']['title'];
			$form_data['slug'] = $_POST['form_data']['slug'];
			
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

            wp_redirect(site_url('/wp-admin/admin.php?page=banner_categories'));
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

        function getCategoryBySlug($slug){
			global $wpdb;
			$query = "SELECT * FROM ".$this->table_name." WHERE slug='".$slug."' AND published = 1";
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
	$BannerCategories = new BannerCategories();
}
