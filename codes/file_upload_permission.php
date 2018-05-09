By default the contributor user of wp doesn't have the access to upload image/media type files. 
Without changing the core of wp we can give the access. Which we need to inititate the access in functions.php file in wp_theme by the following:
<?php
//For Contributor to upload images/media
if ( current_user_can('contributor') && !current_user_can('upload_files') ){
    add_action('admin_init', 'allow_contributor_uploads');
}
 
function allow_contributor_uploads() {
    $contributor = get_role('contributor');
    $contributor->add_cap('upload_files');
}