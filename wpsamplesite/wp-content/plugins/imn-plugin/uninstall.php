<?php
/**
 * Imn Plugin Uninstall
 * Uninstalling Imn plugin deletes tables, and options.
 */

defined( 'WP_UNINSTALL_PLUGIN' ) || exit;

global $wpdb, $wp_version;

$wpdb->query( "DELETE FROM {$wpdb->posts} WHERE post_type IN ( 'book' );" );

$wpdb->query( "DELETE meta FROM {$wpdb->postmeta} meta LEFT JOIN {$wpdb->posts} posts ON posts.ID = meta.post_id WHERE posts.ID IS NULL;" );

// Delete orphan relationships.
$wpdb->query( "DELETE tr FROM {$wpdb->term_relationships} tr LEFT JOIN {$wpdb->posts} posts ON posts.ID = tr.object_id WHERE posts.ID IS NULL;" );
