<?php
if (has_nav_menu('top')) :

    //get_template_part('template-parts/navigation/navigation', 'top');

    global $wp;
    $current_url = home_url($wp->request);
    $menu_items = wp_get_nav_menu_items('top');
    $menu_array = array();
    if (!empty($menu_items)) {
        foreach ($menu_items as $item) {
            $title = $item->title;
            if (!is_user_logged_in() && $title == 'My account') {
                $title = "Login";
            }
            if (!is_user_logged_in() && $title == 'Logout') {
                continue;
            }
            // set current URL
            $current_item = false;
            if ($item->url == $current_url || $item->url == $current_url . '/') {
                $current_item = true;
            }
            $item_array = array(
                'title' => $title,
                'url' => $item->url,
                'current_item' => $current_item
            );
            array_push($menu_array, $item_array);
        }
    }

    ?>

    <ul id="top-menu" class="menu">
        <?php
        foreach ($menu_array as $menu) {
            $current_class = "";
            if ($menu["current_item"]) {
                $current_class = "current-menu-item";
            }
            ?>
            <li class="<?php echo $current_class; ?>"><a
                    href="<?php echo $menu['url']; ?>"><?php echo $menu['title']; ?></a></li>
            <?php
        }

        ?>
    </ul>


<?php endif; ?>