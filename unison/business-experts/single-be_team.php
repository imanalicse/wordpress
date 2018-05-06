<?php
get_header();
while (have_posts())
{
   the_post();
   $title = get_the_title();
   $title_styled = title_style($title);
   $fw_meta = fw_get_db_post_option(get_the_ID());
   $fw_settings = fw_get_db_settings_option();
   $be_is_breadcrumb = 1;
   $be_bread_crumb_bg = array();
   $be_skill_bg = array();
   $be_page_title = 'Team Member';
   $be_rp_subtitle = 'Who member work with';
   $be_subs_title = 'Sign up to know about our latest news';
   $be_subs_sc = '';
   if (defined('FW'))
   {
      $be_is_breadcrumb = fw_get_db_settings_option('be_is_breadcrumb', 1);
      $be_bread_crumb_bg = fw_get_db_settings_option('be_bread_crumb_bg', array());
      $be_skill_bg = fw_get_db_settings_option('be_skill_bg', array());
      $be_page_title = fw_get_db_settings_option('be_title', 'Team Member');
      $be_rp_title = fw_get_db_settings_option('be_rp_title', 'Member’s Colleagues');
      $be_rp_subtitle = fw_get_db_settings_option('be_rp_subtitle', 'Who member work with');
      $be_subs_title = fw_get_db_settings_option('be_subs_title', 'Sign up to know about our latest news');
      $be_subs_sc = fw_get_db_settings_option('be_subs_sc', '');
   }
   $be_page_title = title_style($be_page_title);
   $be_rp_title = title_style($be_rp_title);
   $bgs = '';
   if (is_array($be_bread_crumb_bg) && isset($be_bread_crumb_bg['url']) && $be_bread_crumb_bg['url'] != '')
   {
      $bgs .= 'background: url(' . esc_url($be_bread_crumb_bg['url']) . ') no-repeat scroll center center';
   }
   $skill_bg = '';
   if (is_array($be_skill_bg) && isset($be_skill_bg['url']) && $be_skill_bg['url'] != '')
   {
      $skill_bg .= 'background: url(' . esc_url($be_skill_bg['url']) . ') no-repeat fixed 0 0 / cover;';
   }
   if ($be_is_breadcrumb == 1)
   {
      ?>
      <section class="pageHeadSection" style="<?php echo esc_attr($bgs); ?>">
         <div class="container">
            <div class="col-xs-12 text-center">
               <div class="pageHeadInn">
                  <h2 class="pageTitle"><?php echo wp_kses($be_page_title, array('b' => array(), 'span' => array())) ?></h2>
                  <ul class="breadcrumb">
                     <li><a href="<?php echo esc_url(home_url('/')) ?>"><?php echo esc_html__('Home', 'martin'); ?></a></li>
                     <li><a href="<?php echo esc_url(home_url('/be_team')) ?>"><?php echo esc_html__('Team', 'martin'); ?></a></li>
                     <li><?php echo $title; ?></li>
                  </ul>
               </div>
            </div>
         </div>
      </section>
      <?php
   }
   ?>
   <!-- ========= Member Section ========== -->
   <section class="memberPageSection">
      <div class="container">
         <div class="row">
            <div class="col-sm-12 text-le">
               <span class="line"></span>
               <h2 class="sectionTitle white"><?php echo wp_kses($title_styled, array('b' => array(), 'span' => array())) ?></h2>
               <?php
               if ($fw_meta['job'] != '')
               {
                  ?>
                  <p class="sectionSubtitle"><?php echo esc_html($fw_meta['job']) ?></p>
                  <?php
               }
               ?>
            </div>
         </div>
         <div class="row">
            <div class="col-sm-12">
               <div class="singleMemCaro">

                  <div class="singleMem">
                     <div class="singleMemImg pull-left">
                        <?php echo get_the_post_thumbnail(get_the_ID(), 'portfolio_galary'); ?>
                     </div>
                     <div class="singleMemDec pull-right">
                        <?php
                        if ($fw_meta['qoute_title'] != '')
                        {
                           ?>
                           <h3><a href="#"><?php echo esc_html($fw_meta['qoute_title']) ?></a></h3>
                           <?php
                        }
                        if ($fw_meta['content'] != '')
                        {
                           ?>
                           <p><?php
                              echo wp_kses($fw_meta['content'], array(
                                  'br' => array(),
                                  'b' => array(),
                                  'span' => array(),
                                  'em' => array(),
                                  'strong' => array(),
                                      )
                              )
                              ?></p>
                           <?php
                        }
                        $attributes_count = count($fw_meta['attributes']);
                        if ($attributes_count > 0)
                        {
                           ?>
                           <div class="singleMemDeg">
                              <ul>
                                 <?php
                                 foreach ($fw_meta['attributes'] as $attr)
                                 {
                                    if ($attr['attr_name'] != '' && $attr['attr_description'] != '')
                                    {
                                       ?>
                                       <li>
                                          <i class="<?php echo esc_attr($attr['attr_icon']) ?>"></i>
                                          <p>
                                             <span><?php echo esc_html($attr['attr_name']) ?>:</span>
                                             <?php echo esc_html($attr['attr_description']) ?>
                                          </p>
                                       </li>
                                       <?php
                                    }
                                 }
                                 ?>
                              </ul>
                           </div>
                           <?php
                        }
                        ?>
                        <div class="singleMemSocial">
                           <ul>
                              <?php if ($fw_meta['mem_feacebook'] != ''): ?>
                                 <li><a href="<?php echo esc_url($fw_meta['mem_feacebook']); ?>"><i class=" icon-social-facebook"></i></a></li>
                              <?php endif; ?>
                              <?php if ($fw_meta['mem_twitter'] != ''): ?>
                                 <li><a href="<?php echo esc_url($fw_meta['mem_twitter']); ?>"><i class="icon-social-twitter"></i></a></li>
                              <?php endif; ?>
                              <?php if ($fw_meta['mem_goo'] != ''): ?>
                                 <li><a href="<?php echo esc_url($fw_meta['mem_goo']); ?>" ><i class="icon-google"></i></a></li>
                              <?php endif; ?>
                              <?php if ($fw_meta['mem_lin'] != ''): ?>
                                 <li><a href="<?php echo esc_url($fw_meta['mem_lin']); ?>"><i class="icon-social-linkedin"></i></a></li>
                              <?php endif; ?>
                              <?php if ($fw_meta['mem_dribbble'] != ''): ?>
                                 <li><a href="<?php echo esc_url($fw_meta['mem_dribbble']); ?>"><i class="icon-social-dribbble"></i></a></li>
                              <?php endif; ?>
                           </ul>
                        </div>
                     </div>
                  </div>

               </div>
            </div>
         </div>
      </div>
   </section>
   <!-- ========= Our skill Section ========== -->
   <?php
   $skill_count = count($fw_meta['skills']);
   if ($skill_count > 0)
   {
      ?>
      <section class="member OurSkillArea" style="<?php echo esc_attr($skill_bg); ?>">
         <div class="overlay white"></div>
         <div class="container">
            <div class="row">
               <?php
               foreach ($fw_meta['skills'] as $skill)
               {
                  $skill_percent = ($skill['skill_percent'] > 100) ? 0 : $skill['skill_percent'];
                  ?>
                  <div class="col-sm-3 wow fadeInUp" data-wow-delay="300ms" data-wow-duration="700ms">
                     <div class="singleSkill">
                        <div class="charttwo" data-percent="<?php echo esc_attr($skill_percent); ?>">
                           <p><?php echo esc_attr($skill_percent); ?><span>%</span></p>
                        </div>
                        <?php
                        if ($skill['skill_title'] != '')
                        {
                           $skill_title = title_style($skill['skill_title']);
                           ?>
                           <h4><?php echo wp_kses($skill_title, array('b' => array(), 'span' => array())) ?></h4>
                           <?php
                        }
                        ?>
                     </div>
                  </div>

                  <?php
               }
               ?>
            </div>
         </div>
      </section>
      <?php
   }
   $colleagues_args = array(
       'post_type' => 'be_team',
       'post_status' => 'publish',
       'posts_per_page' => 12,
       'post__not_in' => array(get_the_ID())
   );
   $colleagues = new WP_Query($colleagues_args);
   if ($colleagues->have_posts())
   {
      ?>
      <!-- ========= Our Team Section ========== -->
      <section class="ourTeamSection TeamBgblack single_team">
         <div class="container">
            <div class="row">
               <div class="col-sm-12 text-left">
                  <span class="line"></span>
                  <h2 class="sectionTitle white"><?php echo wp_kses($be_rp_title, array('b' => array(), 'span' => array())) ?></h2>
                  <p class="sectionSubtitle"><?php echo esc_html($be_rp_subtitle); ?></p>
               </div>
            </div>
            <div class="row">
               <div class="teamCarowselMember2">
                  <?php
                  while ($colleagues->have_posts())
                  {
                     $colleagues->the_post();
                     $img = 'http:placehold.it/270x270';
                     if (has_post_thumbnail())
                     {
                        $imgs = wp_get_attachment_image_src(get_post_thumbnail_id(), 'team');
                        $img = $imgs[0];
                     }

                     $member = fw_get_db_post_option(get_the_ID());
                     $content = '';
                     if ($member['content'] != '')
                     {
                        $content = $member['content'];
                     }

                     $job = '';
                     if ($member['job'] != '')
                     {
                        $job = $member['job'];
                     }

                     $member_link = '#';
                     if ($member['member_link'] != '')
                     {
                        $member_link = $member['member_link'];
                     }

                     $mem_feacebook = '';
                     if ($member['mem_feacebook'] != '')
                     {
                        $mem_feacebook = $member['mem_feacebook'];
                     }

                     $mem_twitter = '';
                     if ($member['mem_twitter'] != '')
                     {
                        $mem_twitter = $member['mem_twitter'];
                     }

                     $mem_goo = '';
                     if ($member['mem_goo'] != '')
                     {
                        $mem_goo = $member['mem_goo'];
                     }

                     $mem_lin = '';
                     if ($member['mem_lin'] != '')
                     {
                        $mem_lin = $member['mem_lin'];
                     }
                     $mem_dribbble = '';
                     if ($member['mem_dribbble'] != '')
                     {
                        $mem_dribbble = $member['mem_dribbble'];
                     }
                     $mem_link = '#';
                     if ($member['mem_link'] != '')
                     {
                        $mem_link = $member['mem_link'];
                     }
                     $title = get_the_title();
                     $name = title_style($title);
                     ?>

                     <div class="singleCarowsel text-center">
                        <div class="SingleTeam">
                           <img src="<?php echo esc_url($img); ?>" alt="">
                           <div class="SingleTeamDec <?php echo esc_attr($background); ?>">
                              <h4 style="<?php echo esc_attr($name_color); ?>"><a href="<?php echo get_the_permalink(); ?>"><?php echo wp_kses($name, array('b' => array(), 'span' => array())); ?></a></h4>
                              <p class="deg" style="<?php echo esc_attr($job_color); ?>"><?php echo esc_html($job); ?></p>
                              <p><?php echo wp_kses($content, array()); ?></p>
                           </div>
                           <div class="TeamSocial">
                              <?php if ($mem_feacebook != ''): ?>
                                 <a href="<?php echo esc_url($mem_feacebook); ?>" class="facebook"><i class=" icon-social-facebook"></i></a>
                              <?php endif; ?>
                              <?php if ($mem_twitter != ''): ?>
                                 <a href="<?php echo esc_url($mem_twitter); ?>" class="twitter"><i class="icon-social-twitter"></i></a>
                              <?php endif; ?>
                              <?php if ($mem_goo != ''): ?>
                                 <a href="<?php echo esc_url($mem_goo); ?>" class="gplus"><i class="icon-google"></i></a>
                              <?php endif; ?>
                              <?php if ($mem_lin != ''): ?>
                                 <a href="<?php echo esc_url($mem_lin); ?>" class="linkedin"><i class="icon-social-linkedin"></i></a>
                              <?php endif; ?>
                              <?php if ($mem_dribbble != ''): ?>
                                 <a href="<?php echo esc_url($mem_dribbble); ?>" class="dribble"><i class="icon-social-dribbble"></i></a>
                              <?php endif; ?>
                           </div>
                        </div>
                     </div>
                     <?php
                  }
                  ?>
               </div>
            </div>
         </div>
      </section>
      <?php
   }
   wp_reset_postdata();
}
if ($be_subs_sc != '')
{
   ?>
   <!-- ========= Subscribe Section ========== -->
   <section class="subscribeArea" style="padding: 40px 0 35px;">
      <div class="container">
         <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
               <div class="row">
                  <div class="col-sm-6 col-xs-12 noPaddingRight">
                     <p><?php echo esc_html($be_subs_title); ?></p>
                  </div>
                  <div class="col-sm-6 col-xs-12">
                     <div class="subscribeForm">
                        <?php
                        echo do_shortcode($be_subs_sc);
                        ?>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
   <?php
}
get_footer();
