<?php
global $wpdb;

// Get single query
$sql = "SELECT * FROM " . $wpdb->prefix . "wa_order_user_check WHERE hash = '" . $hash . "'";
$user = $wpdb->get_row($sql);

// Insert query
$sql = "INSERT INTO " . $wpdb->prefix . "wa_order_user_check
		        ( email, hash, order_id )
		        VALUES ( '" . $email . "', '" . $hash . "', '" . $order_id . "' )";
if ($wpdb->query($sql)) {
    echo "success";
}