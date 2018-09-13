<?php
/*
Plugin Name: Webalive Plugin
Plugin URI: https://webalive.com.au/plugin
Description: This is plugin for development
Author: IMN
Author URI: https://webalive.com.au/
Text Domain: webalive-plugin
Version: 1.0.0

@package WebalivePlugin
*/

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

require_once "setting-api/settings.php";

require_once "post-type.php";

require_once "widget/widget.php";

require_once "widget/MediaWidget.php";
