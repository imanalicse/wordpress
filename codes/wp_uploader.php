<?php

// Create Custom Dir Folder
function webalive_create_template_dir() {

	$upload = wp_upload_dir();
	$upload_dir = $upload['basedir'];
	$upload_dir = $upload_dir . '/brief-form';
	if (! is_dir($upload_dir)) {
		mkdir( $upload_dir, 0700 );
	}
}
add_action('after_setup_theme', 'webalive_create_template_dir');

// Custom Dir Overwiding
function webalive_custom_dir( $dir ) {
	return array(
		'path'   => $dir['basedir'] . '/brief-form',
		'url'    => $dir['baseurl'] . '/brief-form',
		'subdir' => '/brief-form',
	) + $dir;
}


// Webalive brief form file upload
function webalive_brief_form_file_uploader() {

	add_filter( 'upload_dir', 'webalive_custom_dir' );

	$fileErrors = array(
		0 => "There is no error, the file uploaded with success",
		1 => "The uploaded file exceeds the upload_max_files in server settings",
		2 => "The uploaded file exceeds the MAX_FILE_SIZE from html form",
		3 => "The uploaded file uploaded only partially",
		4 => "No file was uploaded",
		6 => "Missing a temporary folder",
		7 => "Failed to write file to disk",
		8 => "A PHP extension stoped file to upload" );
	$posted_data =  isset( $_POST ) ? $_POST : array();
	$file_data = isset( $_FILES ) ? $_FILES : array();
	$data = array_merge( $posted_data, $file_data );
	$response = array();
	$uploaded_file = wp_handle_upload( $data['webalive_brief_form_file_uploader'], array( 'test_form' => false ) );
	$full_url = $uploaded_file['url'];
	$partial_url = explode( 'wp-content', $full_url );
	if( $uploaded_file && ! isset( $uploaded_file['error'] ) ) {
		$response['response'] 	= "SUCCESS";
		$response['filename'] 	= basename( $uploaded_file['url'] );
		$response['url'] 		= 'wp-content'.$partial_url[1];
		$response['preview']	= $full_url;
		$response['type']		= $uploaded_file['type'];
	} else {
		$response['response'] = "ERROR";
		$response['error'] = $uploaded_file['error'];
	}

	echo json_encode( $response );
	// Removing the dir override
	remove_filter( 'upload_dir', 'webalive_custom_dir' );
	die();
}
add_action('wp_ajax_nopriv_webalive_brief_form_file_uploader', 'webalive_brief_form_file_uploader');