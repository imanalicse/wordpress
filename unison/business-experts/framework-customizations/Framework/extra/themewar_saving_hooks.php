<?php
$parse_uri = explode( 'wp-content', $_SERVER['SCRIPT_FILENAME'] );
require_once(ABSPATH . 'wp-admin/includes/file.php');

if(defined('FW'))
{
    function martin_theme_process_google_fonts()
    {
        $base_font = fw_get_db_settings_option('base_font', '');
        $sub_fonts = fw_get_db_settings_option('sub_fonts', '');
        $section_fonts = fw_get_db_settings_option('section_fonts', '');
        $font = str_replace(' ', '+', $base_font);
        $font2 = str_replace(' ', '+', $sub_fonts);
        $font3 = str_replace(' ', '+', $section_fonts);
        
        $css = '';
        $baseFonts = '';
        $importa1 = '';
        $importa2 = '';
        $special_fonts = '';
        $section_fontsa = '';
        $importa3 = '';
        if($base_font != '')
        {
            $importa1 .= '@import url(http://fonts.googleapis.com/css?family='.$font.':400,300,600,100,700); '."\n";
            $baseFonts .= 'body, html, .singAdds p, .singleFunfacts p, .weChooseContent p, .greatSerBoxContent p, .con_form3 button, .singleTwitt4 p, 
                            .meta4date h3, .contactAddCol p, .contactForm1 input, .contactForm1 textarea, .singleSkill3 h5, .singleBlogCont blockquote p, 
                            .fourConRight p, .inputSearch, .inputSearch{
                                    font-family: '.$base_font.' !important;
                                }'."\n";
        }
        else
        {
            $importa1 .= '';
            $baseFonts .= '';
        }
        if($sub_fonts != '')
        {
            $importa2 .= '@import url(http://fonts.googleapis.com/css?family='.$font2.':400,300,600,100,700); '."\n";
            $special_fonts .= '.spicial_font, .sectionTitle p, .mainMenu ul li a, .revSlideCont h1, .singlePromo h4, .ab_singleCont h2, .singleFunfacts.one span, 
                .actionCont h1, .servicesHead p, .singleGreadSer h2, .pricHead h1, .pricHead h2, .histroyTimeline, .authordeg h3, .authordec p, .datea, .blogTit, 
                .singleServ5 h2, .contactForminner input, .contactForminner textarea, .singAdds h5, .smallBlogtit, .mainMenu2, .slP, .iconbox h4, .singleFunfacts h4, 
                .singleFunfacts h1, .singleFunfacts h1 .countSpan, .weChooseContent h4, .greatSerBoxContent h4, .greatTeamHead p, .greatTeamDetails p, .tn span, 
                .conform3 input, .conform3 textarea, .subsForm input, .foot_nav2 ul li a, .bancon3 p, .iconbox2 h4, .folioHover h3, .iconbox3 h5, .teamDet p, 
                .team_hover p, .testicon p, .iconBox4 h4, .p_header3 h3, .p_header3 h1, .sb3_date, .sb3_blog_con h3, .add_info3 h5, .con_form3, .foot_nav ul li a, 
                .r4con p, .feature4 h3, .f_img_inner h3, .singleService h3, .parcenHOlder, .singleFeatures h3, .price4head h1, .price4head p, .price4price h3, 
                .feedsbot a, .blog4conttit a, .contact4 input, .contact4 textarea, .contactAddCol h3, .vidBannerContent h4, .expDec , .innerSecTitle p, .contactform5 input, 
                .contactform5 textarea, .filterNav li, .singlProedeta h4, .widget ul li , .recblogTit, .tagcloud a, .calendar_wrap table caption.calendar_wrap table tr th, 
                .calendar_wrap table tr td, .calendar_wrap table tr td, .authorBtit, .comHead h3, .fourContent h1, .fourSubContent h2{
                                    font-family: '.$sub_fonts.' !important;
                                }'."\n";
        }
        else
        {
            $importa2 .= '';
            $special_fonts .= '';
        }
        if($section_fonts != '')
        {
            $importa3 .= '@import url(http://fonts.googleapis.com/css?family='.$font3.':400,300,600,100,700); '."\n";
            $special_fontsa .= '.pageTitle_content h1, .sectionTitle h2, .comonHeading, .revSlideCont h2, .servicesHead h1, .vidContent h2, .footer .widget h2, .whyChooseTitle, 
                .get_inCon h2, .get_inCon h3, .greatTeamHead h1, .greatTeamDetails h6, .colAction_2 h1, .calAcImg h2, .folioHover p, .r4con h1, .contactForm1 button, 
                .vidBannerContent h2, .innerSecTitle h1, .projectDec h2, .similarProject h2, .widgetTitle, .comment-reply-link, #cancel-comment-reply-link, 
                .comTitle {
                                    font-family: '.$section_fonts.' !important;
                                }'."\n";
        }
        else
        {
            $importa3 .= '';
            $special_fontsa .= '';
        }
        
        
        if($importa1 != '')
        {
            $css .= $importa1;
        }
        if($importa2 != '')
        {
            $css .= $importa2;
        }
        if($importa3 != '')
        {
            $css .= $importa3;
        }
        
        
        if($baseFonts != '')
        {
            $css .= $baseFonts;
        }
        if($special_fonts != '')
        {
            $css .= $special_fonts;
        }
        if($special_fontsa != '')
        {
            $css .= $special_fontsa;
        }
        
        if($css != '')
        {

            $css_file = 'fonts.css';

            WP_Filesystem();
            global $wp_filesystem;
            if(!$wp_filesystem->put_contents(get_template_directory().'/framework-customizations/Assets/css/'.$css_file, $css, FS_CHMOD_FILE)) {
                echo 'Generating CSS error!';
            }
        }
        else
        {
            $css_file = 'fonts.css';

            WP_Filesystem();
            global $wp_filesystem;
            if(!$wp_filesystem->put_contents(get_template_directory().'/framework-customizations/Assets/css/'.$css_file, $css, FS_CHMOD_FILE)) {
                echo 'Generating CSS error!';
            }
        }
        
        
        
    }
    add_action('fw_settings_form_saved', 'martin_theme_process_google_fonts', 999, 2);
    
    
    
    function martin_custom_css_generator()
    {
        $custom_css = fw_get_db_settings_option('custom_css', '');
        if($custom_css != '')
        {
            $css_file = 'custom.css';
            $css = $custom_css;

            WP_Filesystem();
            global $wp_filesystem;
            if(!$wp_filesystem->put_contents(get_template_directory().'/framework-customizations/Assets/css/'.$css_file, $css, FS_CHMOD_FILE)) {
                echo 'Generating CSS error!';
            }
        }
        else
        {
            $css_file = 'custom.css';
            $css = '';

            WP_Filesystem();
            global $wp_filesystem;
            if(!$wp_filesystem->put_contents(get_template_directory().'/framework-customizations/Assets/css/'.$css_file, $css, FS_CHMOD_FILE)) {
                echo 'Generating CSS error!';
            }
        }
    }
    
    add_action('fw_settings_form_saved', 'martin_custom_css_generator', 999, 2);
    
    


    function martin_post_per_page_setup()
    {
        $number_blog = fw_get_db_settings_option('post_per_page', 10);
        if($number_blog != '')
        {
            update_option('posts_per_page', $number_blog);
        }
    }
    add_action('fw_settings_form_saved', 'martin_post_per_page_setup', 999, 2);
    
    
    function martin_custom_accent_color_generator()
    {
        $primary_hex = fw_get_db_settings_option('primary_hex', '');
        $primary_rgb = fw_get_db_settings_option('primary_rgb', '');
        $secondary_hex = fw_get_db_settings_option('secondary_hex', '');
        $secondary_rgb = fw_get_db_settings_option('secondary_rgb', '');
        
        if($primary_hex != '' && $secondary_hex != '')
        {
            $custom_css = '/****************** Primary : '.$primary_hex.' and Secondary: '.$secondary_hex.' ***************************/

                    /**Primary color**/
                    .mainMenu ul li a:hover, .mainMenu ul li.active a, .mainMenu ul.sub-menu li:hover > a, .mainMenu ul li:hover > a, .martin_btn.hover_white:hover,
                    .singlePromo h4 a:hover, .folioHover a:hover, .actionCont h1 span, .authordeg p, .smallBlogtit a:hover, .singlatBlog h6.meta a:hover, 
                    .sadds a:hover,
                    .blogTit a:hover,
                    .meta a:hover,
                    .mainMenu2 ul li.active a, 
                    .mainMenu2 ul li a:hover,
                    .mainMenu2 ul li ul.sub-menu li a:hover,
                    .tn h5,
                    .subsForm button:hover,
                    .folioNav ul li:hover, 
                    .folioNav ul li.active,
                    .iconbox3 i,
                    .tesAuthor a,
                    .sb3_blog_con h3 a:hover,
                    .foot_nav ul li a:hover,
                    .martin_btn.noBG,
                    .feature4 i,
                    .mainMenu.home5 ul li a:hover, 
                    .mainMenu.home5 ul li.active a,
                    .mainMenu.home5 ul.sub-menu li:hover > a, 
                    .mainMenu.home5 ul li:hover > a,
                    .singleServ5 i,
                    .expDec p,
                    .ab_singleCont h2 a:hover,
                    .serviceSlide .slick-arrow,
                    .foot_nav2 ul li a:hover,
                    .bredCrumb a:last-child,
                    .filterNav li.active, .filterNav li:hover,
                    .paginations span.current a, .paginations span a:hover,
                    .singlProedeta i,
                    .singlProedeta a:hover,
                    .fourSubContent h2 span,
                    .widget ul li a:hover,
                    .recMeta,
                    .recblogTit a:hover,
                    .tagcloud a:hover,
                    .navigation a:hover,
                    .readMore:hover,
                    .contactAddCol i,
                    .contactAddCol a:hover,
                    .panel-heading.active a,
                    .myAccPanels .panel-title > a::after,
                    .panel-heading.active a{
                        color: '.$primary_hex.';
                    }
                    .yellows{
                        color: '.$primary_hex.' !important;
                    }

                    .home1 .tparrows.default.round:hover,
                    .martin_btn,
                    .singlePromo h4:hover::after,
                    .singleFunfacts h1::after,
                    .martin_btn span,
                    .singlePricing.active .pricHead,
                    .stepsTop::after,
                    .testmoHome1 .owl-theme .owl-dots .owl-dot span,
                    .team_hover,
                    .showit,
                    .singleFunfacts.one h1::after,
                    .mainMenu2 ul li::after,
                    .banner4 .tparrows.default.round:hover,
                    .iconbox i,
                    .greatSerBox:hover,
                    .greatSerBox::before,
                    .skill2,
                    .iconbox2 i,
                    .folioNav ul li::after,
                    .con_form3 button,
                    .singleServ5:hover i,
                    .singleService,
                    .paginations span.current a::after,
                    .paginations span a::after,
                    .search-submit2,
                    .search-submit,
                    .contactForm1 button,
                    .stepsBottom::after,
                    .widgetTitle,
                    .myAccPanels .panel-title > a i.acIcona,
                    .preloader,
                    .stepsTopDots::after, .stepsBottomDots::after,
                    .stepsTopDots::after, .stepsBottomDots::after{
                        background: '.$primary_hex.';
                    }
                    .singleService.color2{
                        background: '.$primary_hex.';
                    }
                    .singleService.color3{
                        background: '.$primary_hex.';
                    }
                    .singlePricing.active .pricHead::after{
                        border-top: 30px solid '.$primary_hex.'
                    }
                    .folioHover a:hover,
                    .borderMiddle,
                    .testmoHome1 .owl-theme .owl-dots .owl-dot.active span,
                    .martin_btn.noBG,
                    #contactForm .required.reqError,
                    .singleServ5 i,
                    .pageTitle_content h1 span::before,
                    .pageTitle_content h1 span::after,
                    .tagcloud a:hover,
                    .contactAddCol i,
                    .stepsTop.active .stepsTopDots::before,
                    .stepsBottom.active .stepsBottomDots::before{
                        border-color: '.$primary_hex.';
                    }
                    .expMember:hover .expDec{
                        background: '.$primary_rgb.';
                    }
                    /**secondary colors**/
                    .singleGreadSer i,
                    .weChooseContent i,
                    .iconBox4 i,
                    .singleFeatures i,
                    .price4head p,
                    .price4price h3,
                    .singleTwitt4 i,
                    .feedsbot a,
                    .ab_singleCont.ab_singleCont2 i{
                        color: '.$secondary_hex.';
                    }
                    .date,
                    .blues,
                    .pricTable4.active .price4head,
                    .skill3,
                    .martin_btn.btn_blue{
                        background: '.$secondary_hex.';
                    }
                    .p_header3::after,
                    .single4blog::before{
                        background: '.$secondary_rgb.';
                    }
                    /**black bg**/
                    .martin_btn.btn_black,
                    .martin_btn.btn_dark2{
                        background: #333;
                    }';
            
            $css_file = 'custom_colors.css';
            $css = $custom_css;

            WP_Filesystem();
            global $wp_filesystem;
            if(!$wp_filesystem->put_contents(get_template_directory().'/framework-customizations/Assets/css/colors/'.$css_file, $css, FS_CHMOD_FILE)) {
                echo 'Generating CSS error!';
            }
        }
        else
        {
            $css_file = 'custom_colors.css';
            $css = '';

            WP_Filesystem();
            global $wp_filesystem;
            if(!$wp_filesystem->put_contents(get_template_directory().'/framework-customizations/Assets/css/colors/'.$css_file, $css, FS_CHMOD_FILE)) {
                echo 'Generating CSS error!';
            }
        }
    }
    add_action('fw_settings_form_saved', 'martin_custom_accent_color_generator', 999, 2);

}