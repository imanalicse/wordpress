<?php
require_once(ABSPATH . 'wp-admin/includes/class-wp-list-table.php');

class Imn_List_Table extends WP_List_Table
{

    public $data = [
        ['id' => '1', 'name' => 'Iman', 'email' => 'imanali.cse@gmail.com'],
        ['id' => '2', 'name' => 'Ishak', 'email' => 'ishak@gmail.com'],
    ];

    public function prepare_items()
    {
        $this->items = $this->data;
        $columns = $this->get_columns();

        $this->_column_headers = array($columns);
    }

    public function get_columns()
    {
        $columns = array(
            'id' => 'ID',
            'name' => 'Name',
            'email' => 'Email'
        );
        return $columns;
    }

    public function column_default($item, $column_name)
    {
        switch ($column_name) {
            case 'id':
            case 'name':
            case 'email':
                return $item[$column_name];
            default:
                return 'no value';
        }
    }
}

function imn_list_table_layout()
{
    $imn_list_table = new Imn_List_Table();
    echo "<h3>This is list</h3>";
    $imn_list_table->prepare_items();

    $imn_list_table->display();
}

imn_list_table_layout();