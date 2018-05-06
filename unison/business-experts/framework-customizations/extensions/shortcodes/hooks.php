<?php if (!defined('FW')) die('Forbidden');

/** @internal */
function _filter_disable_shortcodes($to_disable)
{
	$to_disable[] = 'demo_disabled';
	$to_disable[] = 'calendar';
	$to_disable[] = 'divider';
	$to_disable[] = 'map';
	$to_disable[] = 'icon';
	$to_disable[] = 'media_video';
	$to_disable[] = 'notification';
	$to_disable[] = 'special_heading';
	$to_disable[] = 'table';
	$to_disable[] = 'widget_area';
	$to_disable[] = 'demo_one';
	$to_disable[] = 'demo_three';
	$to_disable[] = 'demo_two';
	$to_disable[] = 'text_block';
	$to_disable[] = 'contact_form';
	$to_disable[] = 'button';
	$to_disable[] = 'icon_box';
	$to_disable[] = 'tab';
	return $to_disable;
}
add_filter('fw_ext_shortcodes_disable_shortcodes', '_filter_disable_shortcodes');