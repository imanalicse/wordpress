<?php

//In functions.php
add_action('init', 'wa_add_init');
function wa_add_init()
{
    ob_start();
    add_rewrite_rule('testimonial/([^/]+)/?', 'index.php?pagename=testimonial&testimonial_slug=$matches[1]', 'top');
    add_rewrite_rule('project/([^/]+)/?', 'index.php?pagename=project&project_slug=$matches[1]', 'top');
    add_rewrite_rule('work-detail/([^/]+)/?', 'index.php?pagename=work-detail&work_slug=$matches[1]', 'top');
    add_rewrite_rule('case-study/([^/]+)/?', 'index.php?pagename=case-study&case_study_slug=$matches[1]', 'top');
    //flush_rewrite_rules();
}


add_filter( 'query_vars', 'wa_query_vars' );
function wa_query_vars( $query_vars )
{
    $query_vars[] = 'work_slug';
    $query_vars[] = 'p1';
    $query_vars[] = 'p2';
    $query_vars[] = 'p3';
    $query_vars[] = 'action';
    return $query_vars;
}

// get value where you need
$slug = get_query_var('work_slug');