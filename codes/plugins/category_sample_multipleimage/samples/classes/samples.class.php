<?php
if (!class_exists('WP_List_Table')) {
	require_once (ABSPATH . 'wp-admin/includes/class-wp-list-table.php');
}

class Samples_Table extends WP_List_Table {

    function __construct() {
		global $status, $page;

		//Set parent defaults
		parent::__construct(array('singular' => 'Sample', //singular name of the listed records
		'plural' => 'Samples', //plural name of the listed records
		'ajax' => false //does this table support ajax?
		));

	}

	function column_default($item, $column_name) {
		switch($column_name) {			
			case 'title' :				
			case 'description' :
			case 'image' :
            case 'additional_image' :
			case 'catid' :
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
		$actions = array('edit' => sprintf('<a href="?page=%s&action=%s&id=%s&cat_id=%s">Edit</a>', $_REQUEST['page'], 'edit', $item['ID'], $_REQUEST['cat_id']), 'delete' => sprintf('<a href="?page=%s&action=%s&id=%s" onclick="return confirm(\'Are you sure you want to delete this item?\')">Delete</a>', $_REQUEST['page'], 'delete', $item['ID']), );

		//Return the title contents
		return sprintf('%1$s %2$s', $item['title'], $this -> row_actions($actions));
	}
	
	function column_image($item) {
		if($item['image']){ return wp_get_attachment_image( $item['image'], array(48,48));}
	}
	
	function column_catid($item) {
		if($item['catid']){ 		
			$SampleCategories = new SampleCategories();
			$category = $SampleCategories->getCategoryById($item['catid']);
			if(!empty($category)){
				return $category->title;
			}			
		}
	}

    function column_additional_image($item) {
        $countItem = $this->countAdditionalImage($item);
        return "<a onclick=\"void window.open('admin.php?page=sample_images&sampleId=".$item['ID']."', '_blank', 'status=no,toolbar=no,scrollbars=yes,titlebar=no,menubar=no,resizable=yes,width=995,height=780,directories=no,location=no,screenX=100,screenY=50');return false;\" href=\"admin.php?page=sample_images&sampleId=".$item['ID']."\">+ Additional Image (".$countItem.")</a>";
    }

    function countAdditionalImage($item){
        global $wpdb;

        $sql = "SELECT COUNT(*) AS count FROM ".$wpdb->prefix."sample_images WHERE sample_id = '".$item['ID']."'";
        $data = $wpdb -> get_row($sql);
        $total_items = $data->count;

        $total_items = empty($total_items) ? 0 : $total_items;

        return $total_items;
    }

	function column_published($item) {
		if ($item['published'] == 0) {
			return '<img src="'.plugins_url( 'samples' ).'/images/unpublish.png" alt="unpublished" />';
		}
		else {
			return '<img src="'.plugins_url( 'samples' ).'/images/publish.png" alt="published" />';
		} 
			
	}
	function get_columns() {
		$columns = array(
		'cb' => '<input type="checkbox" />',		
		'title' => 'Title',		
		'description' => 'Description',
		'image' => 'Image',
         'additional_image' => 'Additional Image',
		'catid' => 'Category',
        'ordering' => 'Order',
		'published' => 'Published');
		return $columns;
	}

	function get_sortable_columns() {
		$sortable_columns = array('title' => array('title', true), 'catid' => array('catid', true), 'ordering' => array('ordering', true), 'published' => array('published', true) );
		return $sortable_columns;
	}

    function extra_tablenav( $which ) {
        global $wpdb;

        if ( 'top' != $which ){
            return;
        }

        $query = "SELECT * FROM ".$wpdb->prefix."sample_categories WHERE published = 1";
        $rows = $wpdb->get_results($query);

        if(sizeof($rows) > 0){

            $cat_id = !empty( $_REQUEST['cat_id'] ) ? trim( stripslashes( $_REQUEST['cat_id'] ) ) : '';

            echo '<div class="alignleft actions">';

            $output = '';
            $output .= "<select name='cat_id' id='cat_id'>\n";
            $output .= "<option value=''>View all categories</option>\n";

            foreach ($rows as $item) {
                $selected = '';
                if($item->ID == $cat_id){
                    $selected = 'selected="selected"';
                }

                $output .= "<option ".$selected." value='" . $item->ID . "'>" . $item->title . "</option>\n";
            }
            $output .= "</select>\n";

            echo $output;

            submit_button( __( 'Filter' ), 'button', false, false, array( 'id' => 'post-query-submit' ) );

            echo '</div>';
        }
        else{
            return;
        }

    }
	
	function get_bulk_actions() {
        $actions = array(
        	'published'		=> 'Publish',
        	'unpublished'	=> 'Unpublish',
            'deleteBulk'    => 'Delete'
        );
        return $actions;
    }

    function buildConditionWhere(){
        $where = array();

        //Filter Search
        $search = !empty( $_REQUEST['s'] ) ? trim( stripslashes( $_REQUEST['s'] ) ) : '';
        if($search){
            $where[] = "title LIKE '%" . $search . "%'";
        }

        //Filter Category Id
        $cat_id = !empty( $_REQUEST['cat_id'] ) ? trim( stripslashes( $_REQUEST['cat_id'] ) ) : '';
        if($cat_id){
            $where[] = "catid = '".$cat_id."'";
        }

        $where 		= ( count( $where ) ? ' WHERE '. implode( ' AND ', $where ) : '' );

        return $where;
    }

	function prepare_items() {
		$per_page = 10;
		$columns = $this -> get_columns();
		$hidden = array();
		$sortable = $this -> get_sortable_columns();
		$this -> _column_headers = array($columns, $hidden, $sortable);

		global $wpdb;
		$orderby = (!empty($_REQUEST['orderby'])) ? $_REQUEST['orderby'] : 'title';
		$order = (!empty($_REQUEST['order'])) ? $_REQUEST['order'] : 'asc';

        $where = $this->buildConditionWhere();

        $sql = 'SELECT * FROM '.$wpdb->prefix.'samples ' . $where . ' ORDER BY ' . $orderby . ' ' . $order . '';

		$data = $wpdb -> get_results($sql, ARRAY_A);
		$current_page = $this -> get_pagenum();
		$total_items = count($data);
		$data = array_slice($data, (($current_page - 1) * $per_page), $per_page);
		$this -> items = $data;
		$this -> set_pagination_args(array('total_items' => $total_items, 'per_page' => $per_page, 'total_pages' => ceil($total_items / $per_page)));
	}

}
?>