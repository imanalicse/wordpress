<?php
$paged = 1;
if(get_query_var('paged'))
{
    $paged = get_query_var('paged');
}
$args = array(
    'post_type' => 'resource',
    'post_status'   => 'publish',
    'paged' => $paged,
    'orderby' 		=> 'date',
    'order' 		=> 'DESC',
    'tax_query'     => array(
        'relation'  => 'AND'
    ),
    'meta_query'    => array(
    )
);
if(!empty($selected_instrument) && $selected_instrument != '')
{
    $args['tax_query'][] = array(
        'taxonomy'  => 'resource_cat',
        'terms'     => array($selected_instrument),
        'field'     => 'slug'
    );
}
if(!empty($search_text) && $search_text != '')
{
    $args['s'] = $search_text;
}
if(!empty($selected_level))
{
    $meta_query = array(
        'key'   => 'level',
        'value' => strtolower($selected_level),
        'compare'   => 'LIKE'
    );
    $args['meta_query'][] = $meta_query;
}

$query = new WP_Query($args);
if($query->have_posts())
{
    while($query->have_posts())
    {
        $query->the_post();
    }
}

?>
<div class="pagination">
    <?php
    $big = 999999;
    echo paginate_links(array(
        'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
        'format'    => '?paged=%#%',
        'current'   => max(1, get_query_var('paged')),
        'total'     => $query->max_num_pages
    ));
    ?>
</div>


<?php

// With Excluded category
$args = array(
    'posts_per_page' => -1,
    'post_type' => 'templates',
    'tax_query' => array(
        'relation' => 'AND',
        array(
            'taxonomy'  => 'template_category',
            'field'     => 'slug',
            'terms'     => 'online-stores',
        ),
        array(
            'taxonomy'  => 'template_category',
            'field'     => 'term_id',
            'terms'     => $results['category_id'],
            'operator'  => 'NOT IN'
        ),
    )
);      
