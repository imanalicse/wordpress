<?php
if (!class_exists('WP_List_Table')) {
	require_once (ABSPATH . 'wp-admin/includes/class-wp-list-table.php');
}

class Sample_Categories_Table extends WP_List_Table {
	function __construct() {
		global $status, $page;

		//Set parent defaults
		parent::__construct(array('singular' => 'Sample Category', //singular name of the listed records
		'plural' => 'Sample Categories', //plural name of the listed records
		'ajax' => false //does this table support ajax?
		));

	}

	function column_default($item, $column_name) {
		switch($column_name) {			
			case 'title' :							
			case 'image' :
            case 'ordering' :
			case 'published' :									
					return $item[$column_name];
			default :
				return print_r($item, true);
			//Show the whole array for troubleshooting purposes
		}
	}
	
	function column_cb($item){
        return sprintf(
            '<input type="checkbox" name="%1$s[]" value="%2$s" />',
            /*$1%s*/ id,  //Let's simply repurpose the table's singular label ("movie")
            /*$2%s*/ $item['ID']                //The value of the checkbox should be the record's id
        );
    }

	function column_title($item) {

		//Build row actions
		$actions = array('edit' => sprintf('<a href="?page=%s&action=%s&id=%s">Edit</a>', $_REQUEST['page'], 'edit', $item['ID']), 'delete' => sprintf('<a href="?page=%s&action=%s&id=%s" onclick="return confirm(\'Are you sure you want to delete this item?\')">Delete</a>', $_REQUEST['page'], 'delete', $item['ID']), );

		//Return the title contents
		return sprintf('%1$s %2$s', $item['title'], $this -> row_actions($actions));
	}
	
	function column_image($item) {
		if($item['image']){ return wp_get_attachment_image( $item['image'], array(48,48));}
	}

	function column_published($item) {
		if ($item['published'] == 0) {
			return '<img src="'.plugins_url( 'sample_categories' ).'/images/unpublish.png" alt="unpublished" />';
		}
		else {
			return '<img src="'.plugins_url( 'sample_categories' ).'/images/publish.png" alt="published" />';
		} 
			
	}
	function get_columns() {
		$columns = array(
		'cb' => '<input type="checkbox" />',		
		'title' => 'Title',				
		'image' => 'Image',
        'ordering' => 'Order',
		'published' => 'Published');
		return $columns;
	}

	function get_sortable_columns() {
		$sortable_columns = array('title' => array('title', true), 'ordering' => array('ordering', true), 'published' => array('published', true) );
		return $sortable_columns;
	}
	
	function get_bulk_actions() {
        $actions = array(
        	'published'		=> 'Publish',
        	'unpublished'	=> 'Unpublish',
            'deleteBulk'    => 'Delete'
        );
        return $actions;
    }

	function prepare_items($s=null) {
		$per_page = 10;
		$columns = $this -> get_columns();
		$hidden = array();
		$sortable = $this -> get_sortable_columns();
		$this -> _column_headers = array($columns, $hidden, $sortable);

		global $wpdb;
		$orderby = (!empty($_REQUEST['orderby'])) ? $_REQUEST['orderby'] : 'title';
		$order = (!empty($_REQUEST['order'])) ? $_REQUEST['order'] : 'asc';

		if (strlen($s)>0) {
			$sql = 'SELECT * FROM '.$wpdb->prefix.'sample_categories WHERE title LIKE "%'.$s.'%" ORDER BY ' . $orderby . ' ' . $order . '';
		}
		else {
			$sql = 'SELECT * FROM '.$wpdb->prefix.'sample_categories ORDER BY ' . $orderby . ' ' . $order . '';
		}
		$data = $wpdb -> get_results($sql, ARRAY_A);
		$current_page = $this -> get_pagenum();
		$total_items = count($data);
		$data = array_slice($data, (($current_page - 1) * $per_page), $per_page);
		$this -> items = $data;
		$this -> set_pagination_args(array('total_items' => $total_items, 'per_page' => $per_page, 'total_pages' => ceil($total_items / $per_page)));
	}

}
?>