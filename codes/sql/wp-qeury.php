<?php
global $wpdb;

// Get single query
$sql = "SELECT * FROM " . $wpdb->prefix . "wa_order_user_check WHERE hash = '" . $hash . "'";
$user = $wpdb->get_row($sql);

$data = $wpdb->get_results($wpdb->prepare("SELECT * FROM ".$wpdb->prefix."wa_order_details WHERE order_id=%d", $order_id));

// Insert query
$sql = "INSERT INTO " . $wpdb->prefix . "wa_order_user_check
		        ( email, hash, order_id )
		        VALUES ( '" . $email . "', '" . $hash . "', '" . $order_id . "' )";
if ($wpdb->query($sql)) {
    echo "success";
}

// update
$wpdb->update($wpdb->prefix."wa_brief_form", $data, array('order_id'=> $order_id));

