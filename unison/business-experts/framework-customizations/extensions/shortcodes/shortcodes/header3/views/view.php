<?php if (!defined('FW'))
{
die('Forbidden');
}

$is_sticky = 1;
$header_style = 1;
$phone_number = '';
$email_address = '';
$is_social = 2;
$logo_img = array( 'url' => '');
$logo_inner_img = array( 'url' => '');
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
    $logo_inner_img = fw_get_db_settings_option('logo_inner_img', array('url' => ''));
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
if(is_array($logo_inner_img) && isset($logo_inner_img['url']) && $logo_inner_img['url'] != '')
{
    $innerLogo = $logo_inner_img['url'];
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

?>
<?php if($header_style == 3): ?>
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
<?php endif; ?>