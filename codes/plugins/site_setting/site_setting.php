<?php
/*
Plugin Name: Site Settings
Plugin URI: http://webalive.com.au
Description: Site Settings
Version: 1.0
Author: Webalive
Author URI: http://webalive.com.au
*/

if (!class_exists("GeneralSiteSetting")) {
	
	class GeneralSiteSetting {
		
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

			/* START: Initialization */
			
			//Set Action
			$action = (isset($_GET['action']) ? $_GET['action'] : '');
			if($action == ''){
				if(!empty($_POST['form_data']['action'])){
					$action = $_POST['form_data']['action'];
				}
				else if (!empty($_POST['form_data']['action2'])) {
					$action = $_POST['form_data']['action2'];
				}
			}
			$this->action = $action;
			
			//Set ID
			$ID = (int) (isset($_GET['id']) ? $_GET['id'] : '');
			$this->ID = $ID;
			
			//Set Table Name
			$this->table_name = $wpdb->prefix."options";
			
			//Set Base URL
			$this->base_url = 'admin.php?page=site_setting';
				
			//Set Root Path
			$base = dirname(__FILE__);
			$this->root_path = $base;
			
			/* END: Initialization */

		}


		function admin_menu(){
			add_menu_page('Site Settings','Site Settings', 'moderate_comments', 'site_setting', array($this, 'admin_action'));
		}


		function admin_action(){

			global $wpdb;

			switch( $this->action ) {
				case 'save':
					$this->save();
					break;			
				case 'edit':
					$this->edit();
					break;				
				default:					
					$this->edit();
					break;
			}
		}

		function edit(){
			global $wpdb;
			
			$page_title = 'Site Settings';
			$submit_btn_text = 'Save Settings';
			require_once( 'views/edit.php' );			
		}
		
		function save(){
			global $wpdb;
			if(isset($_POST['form_data'])&&sizeof($_POST['form_data'])>0){
				foreach($_POST['form_data'] as $key=>$value){
					if (is_array($value) && array_key_exists($key, $value)) {
                        $option_name = $key;
                        $option_value =stripslashes($value[$key]);
                        update_option($option_name, $option_value);
					}
				}
			}
			$this->edit();
        }			
	}
	$GeneralSiteSetting = new GeneralSiteSetting();
}

