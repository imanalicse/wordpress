<?php
$item_per_page = get_option('posts_per_page');

$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
if ($paged == 1) {
    $offset = 0;
} else {
    $offset = ($paged - 1) * $item_per_page;
}

$user_query = new WP_User_Query(array(
    'role' => 'Teacher',
    'number' => $item_per_page,
    'offset' => $offset,
    'orderby' => 'display_name',
    'order' => 'ASC',
));
if (!empty($user_query->results)) {
    foreach ($user_query->results as $teacher) {
        include 'parts/teacher-item.php';
    }
} else {
    echo 'No virtuosi found.';
}
?>

<div class="pagination">
    <?php
    $total_user = $user_query->total_users;
    $total_pages = ceil($total_user / $item_per_page);

    echo paginate_links(array(
        'base' => get_pagenum_link(1) . '%_%',
        'format' => '?paged=%#%',
        'current' => $paged,
        'total' => $total_pages,
        'prev_text' => 'Previous',
        'next_text' => 'Next',
        //'type'     => 'list',
    ));
    ?>
</div>