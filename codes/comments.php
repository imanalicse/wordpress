<?php
// comment default field remove
add_filter('comment_form_default_fields', 'url_filtered');
function url_filtered($fields)
{
    if(isset($fields['url']))
        unset($fields['url']);
    return $fields;
}

//Remove: Comment notes HTML after the comment form
add_filter('comment_form_defaults', 'remove_comment_styling_prompt');
function remove_comment_styling_prompt($defaults) {
    $defaults['comment_notes_after'] = '';
    return $defaults;
}

