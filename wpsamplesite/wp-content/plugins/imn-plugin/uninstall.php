<?php
/**
 * Imn Plugin Uninstall
 * Uninstalling Imn plugin deletes tables, and options.
 */

defined( 'WP_UNINSTALL_PLUGIN' ) || exit;

global $wpdb, $wp_version;

$wpdb->query( "DELETE FROM {$wpdb->posts} WHERE post_type IN ( 'book' );" );