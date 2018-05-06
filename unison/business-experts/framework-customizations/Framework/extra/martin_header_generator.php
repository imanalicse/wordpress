<?php
/**
 * THEME WAR WordPress Framework
 *
 * Copyright (c) 2016, THEME WAR,(http://themewar.com)
 */


function martin_header_generator()
{
    $is_sticky = 1;
    $header_style = 1;
    $phone_number = '';
    $email_address = '';
    $is_social = 2;
    $logo_img = array( 'url' => '');
    $logo_height = '';
    $logo_padding_top = '';
    $logo_padding_bottom = '';

    $facebook = '';
    $twitter = '';
    $google_plus = '';
    $instagram = '';
    $dribbble = '';
    $youtube = '';
    $rss = '';
    $behance = '';
    $linkedin = '';
    $pinterest = '';
    if(defined('FW')){
        $is_sticky = fw_get_db_settings_option('is_sticky', 1);
        $header_style = fw_get_db_settings_option('header_style', 1);
        $phone_number = fw_get_db_settings_option('phone_number', '');
        $email_address = fw_get_db_settings_option('email_address', '');
        $is_social = fw_get_db_settings_option('is_social', 2);
        $logo_img = fw_get_db_settings_option('logo_img', array('url' => ''));
        $logo_height = fw_get_db_settings_option('logo_height', '');
        $logo_padding_top = fw_get_db_settings_option('logo_padding_top', '');
        $logo_padding_bottom = fw_get_db_settings_option('logo_padding_bottom', '');

        $facebook = fw_get_db_settings_option('facebook', '');
        $twitter = fw_get_db_settings_option('twitter', '');
        $google_plus = fw_get_db_settings_option('google_plus', '');
        $instagram = fw_get_db_settings_option('instagram', '');
        $dribbble = fw_get_db_settings_option('dribbble', '');
        $youtube = fw_get_db_settings_option('youtube', '');
        $rss = fw_get_db_settings_option('rss', '');
        $behance = fw_get_db_settings_option('behance', '');
        $linkedin = fw_get_db_settings_option('linkedin', '');
        $pinterest = fw_get_db_settings_option('pinterest', '');
    }
    
    $logo = '';
    $innerLogo = '';
    $lheight = '';
    $lpt = '';
    $lpb = '';
    if(is_array($logo_img) && isset($logo_img['url']) && $logo_img['url'] != '')
    {
        $logo = $logo_img['url'];
    }
    if($logo_height != ''){
        $lheight = 'height: '.$logo_height.'px; ';
    }
    if($logo_padding_top != ''){
        $lpt = 'padding-top: '.$logo_padding_top.'px; ';
    }
    if($logo_padding_bottom != ''){
        $lpb = 'padding-bottom: '.$logo_padding_bottom.'px; ';
    }
    
    if($header_style == 1)
    {
        ?>
        <section class="top_bar">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-sm-6 col-xs-12">
                        <div class="top_bar_info">
                            <?php if($phone_number != ''): ?>
                            <p><i class="fa fa-phone"></i><?php echo esc_html($phone_number); ?></p>
                            <?php endif; ?>
                            <?php if($email_address != ''): ?>
                            <p><i class="fa fa-envelope"></i><?php echo esc_html($email_address); ?></p>
                            <?php endif; ?>
                        </div>
                    </div>
                    <?php if($is_social == 1): ?>
                    <div class="col-lg-3 col-sm-6 col-xs-12 pull-right">
                        <div class="top_bar_social">
                            <?php
                                if($facebook != ''):
                                    echo '<a class="fac" href="'.esc_url($facebook).'"><i class="fa fa-facebook"></i></a>';
                                endif;
                                if($twitter != ''):
                                    echo '<a class="twi" href="'.esc_url($twitter).'"><i class="fa fa-twitter"></i></a>';
                                endif;
                                if($google_plus != ''):
                                    echo '<a href="'.esc_url($google_plus).'" class="goo"><i class="fa fa-google-plus"></i></a>';
                                endif;
                                if($linkedin != ''):
                                    echo '<a class="lin" href="'.esc_url($linkedin).'"><i class="fa fa-linkedin"></i></a>';
                                endif;
                                if($instagram != ''):
                                    echo '<a class="ins" href="'.esc_url($instagram).'"><i class="fa fa-instagram"></i></a>';
                                endif;
                                if($dribbble != ''):
                                    echo '<a class="dri" href="'.esc_url($dribbble).'"><i class="fa fa-dribbble"></i></a>';
                                endif;
                                if($youtube != ''):
                                    echo '<a class="you" href="'.esc_url($youtube).'"><i class="fa fa-youtube"></i></a>';
                                endif;
                                if($rss != ''):
                                    echo '<a class="rss" href="'.esc_url($rss).'"><i class="fa fa-rss"></i></a>';
                                endif;
                                if($behance != ''):
                                    echo '<a class="beh" href="'.esc_url($behance).'"><i class="fa fa-behance"></i></a>';
                                endif;
                                if($pinterest != ''):
                                    echo '<a class="pin" href="'.esc_url($pinterest).'"><i class="fa fa-pinterest"></i></a>';
                                endif;
                            ?>
                        </div>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </section>
        <header class="header <?php if($is_sticky == 1) { echo 'sticky_normal_header'; } ?>">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-sm-2">
                        <div class="logo" style="<?php echo esc_attr($lpt . $lpb); ?>">
                            <?php if($logo != ''): ?>
                                <a href="<?php echo esc_url(home_url('/')) ?>">
                                    <img style="<?php echo esc_attr($lheight); ?>" src="<?php echo esc_url($logo) ?>" alt="<?php bloginfo('name'); ?>"/>
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-lg-9 col-sm-10">
                        <nav class="mainMenu">
                            <div class="mobileMenu">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                            <?php
                                if(has_nav_menu('primary-menu')) 
                                {
                                    wp_nav_menu(array(
                                        'theme_location' => 'primary-menu',
                                        'container' => FALSE,
                                        'menu_class' => 'main_menus',
                                        'menu_id' => '',
                                        'echo' => true
                                    ));
                                } 
                                else 
                                {
                                    echo '<ul class="main_menus">';
                                    echo '<li><a href="#">' . esc_html__('No Menu', 'martin') . '</a></li>';
                                    echo '</ul>';
                                }
                            ?>
                        </nav>
                    </div>
                </div>
            </div>
        </header>
        <?php
    }
    elseif($header_style == 2)
    {
        ?>
        <header class="header2 <?php if($is_sticky == 1) { echo 'sticky_normal_header'; } ?>" id="header2">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-sm-2">
                        <div class="logo2" style="<?php echo esc_attr($lpt . $lpb); ?>">
                            <?php if($logo != ''): ?>
                            <a href="<?php echo esc_url(home_url('/')) ?>"><img style="<?php echo esc_attr($lheight); ?>" src="<?php echo esc_url($logo) ?>" alt="<?php bloginfo('name'); ?>"/></a>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-lg-9 col-sm-10">
                        <nav class="mainMenu2">
                            <div class="mobileMenu">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                            <?php
                                if(has_nav_menu('primary-menu')) 
                                {
                                    wp_nav_menu(array(
                                        'theme_location' => 'primary-menu',
                                        'container' => FALSE,
                                        'menu_class' => 'main_menus',
                                        'menu_id' => '',
                                        'echo' => true
                                    ));
                                } 
                                else 
                                {
                                    echo '<ul class="main_menus">';
                                    echo '<li><a href="#">' . esc_html__('No Menu', 'martin') . '</a></li>';
                                    echo '</ul>';
                                }
                            ?>
                        </nav>
                    </div>
                    <div class="col-xs-12">
                        <div class="headerborder"></div>
                    </div>
                </div>
            </div>
        </header>
        <?php
    }
    elseif($header_style == 3)
    {
        if(!is_front_page())
        {
            ?>
            <header class="header3 <?php if($is_sticky == 1) { echo 'sticky_after_slider'; } ?>">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3 col-sm-2">
                            <div class="logo" style="<?php echo esc_attr($lpt . $lpb); ?>">
                                <?php if($logo != ''): ?>
                                    <a href="<?php echo esc_url(home_url('/')) ?>"><img style="<?php echo esc_attr($lheight); ?>" src="<?php echo esc_url($logo) ?>" alt="<?php bloginfo('name'); ?>"/></a>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-lg-9 col-sm-10">
                            <nav class="mainMenu menu3">
                                <div class="mobileMenu">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </div>
                                <?php
                                    if(has_nav_menu('primary-menu')) 
                                    {
                                        wp_nav_menu(array(
                                            'theme_location' => 'primary-menu',
                                            'container' => FALSE,
                                            'menu_class' => 'main_menus',
                                            'menu_id' => '',
                                            'echo' => true
                                        ));
                                    } 
                                    else 
                                    {
                                        echo '<ul class="main_menus">';
                                        echo '<li><a href="#">' . esc_html__('No Menu', 'martin') . '</a></li>';
                                        echo '</ul>';
                                    }
                                ?>
                            </nav>
                        </div>
                    </div>
                </div>
            </header>
            <?php
        }
    }
    elseif($header_style == 4)
    {
        ?>
        <header class="header4 <?php if($is_sticky == 1) { echo 'sticky_normal_header'; } ?>" id="header4">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-sm-2">
                        <div class="logo2" style="<?php echo esc_attr($lpt . $lpb); ?>">
                            <?php if($logo != ''): ?>
                            <a href="<?php echo esc_url(home_url('/')) ?>"><img style="<?php echo esc_attr($lheight); ?>" src="<?php echo esc_url($logo) ?>" alt="<?php bloginfo('name'); ?>"/></a>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-lg-9 col-sm-10">
                        <nav class="mainMenu2 overlaymenu">
                            <div class="mobileMenu">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                            <?php
                                if(has_nav_menu('primary-menu')) 
                                {
                                    wp_nav_menu(array(
                                        'theme_location' => 'primary-menu',
                                        'container' => FALSE,
                                        'menu_class' => 'main_menus',
                                        'menu_id' => '',
                                        'echo' => true
                                    ));
                                } 
                                else 
                                {
                                    echo '<ul class="main_menus">';
                                    echo '<li><a href="#">' . esc_html__('No Menu', 'martin') . '</a></li>';
                                    echo '</ul>';
                                }
                            ?>
                        </nav>
                    </div>
                </div>
            </div>
        </header>
        <?php
    }
    elseif($header_style == 5)
    {
        ?>
        <section class="top_bar">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-sm-6 col-xs-12">
                        <div class="top_bar_info">
                            <?php if($phone_number != ''): ?>
                            <p><i class="fa fa-phone"></i><?php echo esc_html($phone_number); ?></p>
                            <?php endif; ?>
                            <?php if($email_address != ''): ?>
                            <p><i class="fa fa-envelope"></i><?php echo esc_html($email_address); ?></p>
                            <?php endif; ?>
                        </div>
                    </div>
                    <?php if($is_social == 1): ?>
                    <div class="col-lg-3 col-sm-6 col-xs-12 pull-right">
                        <div class="top_bar_social">
                            <?php
                                if($facebook != ''):
                                    echo '<a class="fac" href="'.esc_url($facebook).'"><i class="fa fa-facebook"></i></a>';
                                endif;
                                if($twitter != ''):
                                    echo '<a class="twi" href="'.esc_url($twitter).'"><i class="fa fa-twitter"></i></a>';
                                endif;
                                if($google_plus != ''):
                                    echo '<a href="'.esc_url($google_plus).'" class="goo"><i class="fa fa-google-plus"></i></a>';
                                endif;
                                if($linkedin != ''):
                                    echo '<a class="lin" href="'.esc_url($linkedin).'"><i class="fa fa-linkedin"></i></a>';
                                endif;
                                if($instagram != ''):
                                    echo '<a class="ins" href="'.esc_url($instagram).'"><i class="fa fa-instagram"></i></a>';
                                endif;
                                if($dribbble != ''):
                                    echo '<a class="dri" href="'.esc_url($dribbble).'"><i class="fa fa-dribbble"></i></a>';
                                endif;
                                if($youtube != ''):
                                    echo '<a class="you" href="'.esc_url($youtube).'"><i class="fa fa-youtube"></i></a>';
                                endif;
                                if($rss != ''):
                                    echo '<a class="rss" href="'.esc_url($rss).'"><i class="fa fa-rss"></i></a>';
                                endif;
                                if($behance != ''):
                                    echo '<a class="beh" href="'.esc_url($behance).'"><i class="fa fa-behance"></i></a>';
                                endif;
                                if($pinterest != ''):
                                    echo '<a class="pin" href="'.esc_url($pinterest).'"><i class="fa fa-pinterest"></i></a>';
                                endif;
                            ?>
                        </div>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </section>
        <header class="header2 home5 <?php if($is_sticky == 1) { echo 'sticky_normal_header'; } ?>" id="header5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-sm-2">
                        <div class="logo" style="<?php echo esc_attr($lpt . $lpb); ?>">
                            <?php if($logo != ''): ?>
                            <a href="<?php echo esc_url(home_url('/')) ?>"><img style="<?php echo esc_attr($lheight); ?>" src="<?php echo esc_url($logo) ?>" alt="<?php bloginfo('name'); ?>"/></a>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-lg-9 col-sm-10">
                        <nav class="mainMenu home5">
                            <div class="mobileMenu">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                            <?php
                                if(has_nav_menu('primary-menu')) 
                                {
                                    wp_nav_menu(array(
                                        'theme_location' => 'primary-menu',
                                        'container' => FALSE,
                                        'menu_class' => 'main_menus',
                                        'menu_id' => '',
                                        'echo' => true
                                    ));
                                } 
                                else 
                                {
                                    echo '<ul class="main_menus">';
                                    echo '<li><a href="#">' . esc_html__('No Menu', 'martin') . '</a></li>';
                                    echo '</ul>';
                                }
                            ?>
                        </nav>
                    </div>
                </div>
            </div>
        </header>
        <?php
    }
    else
    {
        ?>
        <section class="top_bar">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-sm-6 col-xs-12">
                        <div class="top_bar_info">
                            <?php if($phone_number != ''): ?>
                            <p><i class="fa fa-phone"></i><?php echo esc_html($phone_number); ?></p>
                            <?php endif; ?>
                            <?php if($email_address != ''): ?>
                            <p><i class="fa fa-envelope"></i><?php echo esc_html($email_address); ?></p>
                            <?php endif; ?>
                        </div>
                    </div>
                    <?php if($is_social == 1): ?>
                    <div class="col-lg-3 col-sm-6 col-xs-12 pull-right">
                        <div class="top_bar_social">
                            <?php
                                if($facebook != ''):
                                    echo '<a class="fac" href="'.esc_url($facebook).'"><i class="fa fa-facebook"></i></a>';
                                endif;
                                if($twitter != ''):
                                    echo '<a class="twi" href="'.esc_url($twitter).'"><i class="fa fa-twitter"></i></a>';
                                endif;
                                if($google_plus != ''):
                                    echo '<a href="'.esc_url($google_plus).'" class="goo"><i class="fa fa-google-plus"></i></a>';
                                endif;
                                if($linkedin != ''):
                                    echo '<a class="lin" href="'.esc_url($linkedin).'"><i class="fa fa-linkedin"></i></a>';
                                endif;
                                if($instagram != ''):
                                    echo '<a class="ins" href="'.esc_url($instagram).'"><i class="fa fa-instagram"></i></a>';
                                endif;
                                if($dribbble != ''):
                                    echo '<a class="dri" href="'.esc_url($dribbble).'"><i class="fa fa-dribbble"></i></a>';
                                endif;
                                if($youtube != ''):
                                    echo '<a class="you" href="'.esc_url($youtube).'"><i class="fa fa-youtube"></i></a>';
                                endif;
                                if($rss != ''):
                                    echo '<a class="rss" href="'.esc_url($rss).'"><i class="fa fa-rss"></i></a>';
                                endif;
                                if($behance != ''):
                                    echo '<a class="beh" href="'.esc_url($behance).'"><i class="fa fa-behance"></i></a>';
                                endif;
                                if($pinterest != ''):
                                    echo '<a class="pin" href="'.esc_url($pinterest).'"><i class="fa fa-pinterest"></i></a>';
                                endif;
                            ?>
                        </div>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </section>
        <header class="header <?php if($is_sticky == 1) { echo 'sticky_normal_header'; } ?>">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-sm-2">
                        <div class="logo" style="<?php echo esc_attr($lpt . $lpb); ?>">
                            <?php if($logo != ''): ?>
                                <a href="<?php echo esc_url(home_url('/')) ?>">
                                    <img style="<?php echo esc_attr($lheight); ?>" src="<?php echo esc_url($logo) ?>" alt="<?php bloginfo('name'); ?>"/>
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-lg-9 col-sm-10">
                        <nav class="mainMenu">
                            <div class="mobileMenu">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                            <?php
                                if(has_nav_menu('primary-menu')) 
                                {
                                    wp_nav_menu(array(
                                        'theme_location' => 'primary-menu',
                                        'container' => FALSE,
                                        'menu_class' => 'main_menus',
                                        'menu_id' => '',
                                        'echo' => true
                                    ));
                                } 
                                else 
                                {
                                    echo '<ul class="main_menus">';
                                    echo '<li><a href="#">' . esc_html__('No Menu', 'martin') . '</a></li>';
                                    echo '</ul>';
                                }
                            ?>
                        </nav>
                    </div>
                </div>
            </div>
        </header>
        <?php
    }
}