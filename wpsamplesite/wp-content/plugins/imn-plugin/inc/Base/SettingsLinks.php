<?php
/**
 * @package  ImnPlugin
 */
namespace Imn_Inc\Base;


class SettingsLinks
{
	public function register() 
	{
		add_filter( "plugin_action_links_".IMN_PLUGIN_NAME, array( $this, 'settings_link' ) );
	}

	public function settings_link( $links ) 
	{
		$settings_link = '<a href="admin.php?page=imn_plugin">Settings</a>';
		array_push( $links, $settings_link );
		return $links;
	}
}