<?php
if (!class_exists("ProjectImages")) {
	require_once('classes/project_images.class.php');
	class ProjectImages {
		
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

        /** @var int Category Id */
        public $projectId = null;
		
		/**
		 * Constructor set necessary properties.
		 *
		 */
		function __construct() {
			
			global $wpdb;

            add_action('admin_menu', array(&$this, 'admin_menu'));

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
			$this->table_name = $wpdb->prefix."project_images";
			
			//Set Base URL
			$this->base_url = 'admin.php?page=project_images';
				
			//Set Root Path
			$base = dirname(__FILE__);
			$this->root_path = $base;

            if(isset($_REQUEST['projectId']) && $_REQUEST['projectId'] != ''){
                $this->projectId = $_REQUEST['projectId'];
            }
			
			/* END: Initialization */

		}

        function admin_menu(){

            global $_registered_pages;

            $hookname = get_plugin_page_hookname('project_images', 'admin.php');

            if (!empty($hookname)) {
                add_action($hookname, array($this, 'admin_action'));
            }

            $_registered_pages[$hookname] = true;

        }

		function admin_action(){

			global $wpdb;

            if($this->projectId == null){
                wp_die( __( 'Project id not found.' ) );
            }

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
			$page_title = "Project Images";
			?>
            <style>
                #adminmenuwrap, #adminmenuback{
                    display:none;
                }
                #wpcontent{
                    margin-left: 15px;
                }
            </style>
			<div class="wrap">
				<?php
					echo '<h2>'.$page_title.' <a class="add-new-h2" href="'. $this->base_url.'&amp;action=add&projectId='.$this->projectId.'"">Add New</a></h2>';
					$Project_Images_Table = new Project_Images_Table();
					$Project_Images_Table -> prepare_items($_GET['s']);
					
					?>
					<!-- Forms are NOT created automatically, so you need to wrap the table in one to use features like bulk actions -->
			        <form id="project_images" method="get">
			        	<?php $Project_Images_Table -> search_box( 'Search Title', 'title_search' ); ?>
			            <!-- For plugins, we also need to ensure that the form posts back to our current page -->
			            <input type="hidden" name="page" value="<?php echo $_REQUEST['page'] ?>" />
                        <input type="hidden" name="projectId" value="<?php echo $this->projectId; ?>" />
			            <!-- Now we can render the completed list table -->
			            <?php $Project_Images_Table -> display(); ?>
			        </form>
			</div>
			<?php
		}		
		
		function add(){
			$page_title = 'Add Project Image';
			$submit_btn_text = 'Add Project Image';
			
			require_once( 'views/edit_images.php' );
		}
		
		function edit(){
			global $wpdb;
			
			$page_title = 'Edit Project Image';
			$submit_btn_text = 'Save Project Image';
			
			$query = "SELECT * FROM ".$this->table_name." WHERE ID = '".$this->ID."'";
			$row = $wpdb->get_row( $query );
			
			require_once( 'views/edit_images.php' );
		}
		
		function save(){
			global $wpdb;			
			
			$wa_data = array();

			$wa_data['title'] = $_POST['wa_data']['title'];						
			$wa_data['project_id'] = $_POST['wa_data']['project_id'];
			
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


            ob_start();
            wp_redirect(site_url('/wp-admin/admin.php?page=project_images&projectId='. $this->projectId));
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

        function getProjectsImagesByProjectId($project_id){
            global $wpdb;
            $query = "SELECT * FROM ".$this->table_name." WHERE published = 1 AND project_id = (SELECT ID FROM ".$wpdb->prefix."projects WHERE id=".$project_id.")";
            $rows = $wpdb->get_results( $query );
            return $rows;
        }

	}
	$ProjectImages = new ProjectImages();
}
