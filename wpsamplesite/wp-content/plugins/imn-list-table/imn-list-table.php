<?php
/*
 * Plugin Name: Imn List Table
 * Description: This is the simple plugin for WP_List_table
 * Author: Iman
 */

add_action("admin_menu", 'imn_list_table_menu');

function imn_list_table_menu()
{
    add_menu_page("Imn List Table", "Imn List Table", "manage_options", "imn_list_table", "imn_list_table_fun", "
dashicons-list-view");
}

function imn_list_table_fun()
{
    ob_start();
    include_once plugin_dir_path(__FILE__) . 'views/imn-table-list.php';

    $templates = ob_get_contents();

    ob_end_clean();

    echo $templates;
}