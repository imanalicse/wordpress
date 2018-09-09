<?php
/*
* @package ImnPlugin
*/
namespace Inc\Api\Callbacks;

use Inc\Base\BaseController;

class AdminCallbacks extends BaseController
{
    public function AdminDashboard()
    {
        return require_once("$this->plugin_path/templates/admin.php");
    }

    public function ImnOptionsGroup($input)
    {
        return $input;
    }

    public function ImnAdminSection()
    {
        echo "Check the beautiful section";
    }

    public function ImnTextExample()
    {
        $value = esc_attr(get_option('text_example'));
        echo '<input type="text" class="regular-text" name="text_example" value="' . $value . '" placeholder="Write something here">';
    }

    public function ImnFirstName()
    {
        $value = esc_attr(get_option('first_name'));
        echo '<input type="text" class="regular-text" name="first_name" value="' . $value . '" placeholder="Write your first name">';
    }

}