<?php
if (!defined('FW'))
{
   die('Forbidden');
}
$style = 1;
if ($atts['style'] != '')
{
   $style = $atts['style'];
}
$background = '';
$bc_class = 'TeamBgblack';
if ($atts['background'] != '')
{
   $background = $atts['background'];
   $bc_class = '';
}

$name_color = '';
if ($atts['name_color'] != '')
{
   $name_color = 'color: ' . $atts['name_color'] . '; ';
}
$job_color = '';
if ($member['job_color'] != '')
{
   $job_color = 'color: ' . $atts['job_color'] . '; ';
}

$teams = array(
    'post_type' => 'be_team',
    'post_status' => 'publish',
    'posts_per_page' => -1
);
$team_members = new WP_Query($teams);
?>
<?php if ($style == 2): ?>
   <?php
   if ($team_members->have_posts())
   {
      ?>
      <section class="ourTeamSection <?php echo esc_attr($bc_class); ?>">
         <div class="teamCarowsel">
            <?php
            while ($team_members->have_posts())
            {
               $team_members->the_post();

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
               if ($pos = strrpos($title, " "))
               {
                  $fst = substr($title, 0, $pos) . '<b>.</b>';
                  $lst = '<span>' . substr($title, $pos + 1) . '</span>';
                  $title = $fst . $lst;
               }
               $name = str_replace(' ', '<b>.</b>', $title);
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
      </section>
      <?php
      wp_reset_postdata();
   }
   ?>
<?php else: ?>
   <?php
   if ($team_members->have_posts())
   {
      ?>
      <section class="teamAreaWrap">
         <div class="teamAreaCaro">
            <?php
            while ($team_members->have_posts())
            {
               $team_members->the_post();

               $img = 'http:placehold.it/930x720';
               if (has_post_thumbnail())
               {
                  $imgs = wp_get_attachment_image_src(get_post_thumbnail_id(), 'team2');
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
               $title = get_the_title();
               if ($pos = strrpos($title, " "))
               {
                  $fst = substr($title, 0, $pos) . '<b>.</b>';
                  $lst = '<span>' . substr($title, $pos + 1) . '</span>';
                  $title = $fst . $lst;
               }
               $name = str_replace(' ', '<b>.</b>', $title);
               ?>
               <div class="teamArea">
                  <div class="teamImg">
                     <img src="<?php echo esc_url($img); ?>" alt="<?php echo esc_attr($name); ?>">
                  </div>
                  <div class="teamDetails">
                     <h3 class="titleTwo" style="<?php echo esc_attr($name_color); ?>"><a href="<?php echo get_the_permalink(); ?>"><?php echo wp_kses($name, array('b' => array(), 'span' => array())); ?></a></h3>
                     <p class="subTitleTwo" style="<?php echo esc_attr($job_color); ?>"><?php echo esc_html($job); ?></p>
                     <ul>
                        <?php if ($mem_feacebook != ''): ?>
                           <li><a href="<?php echo esc_url($mem_feacebook); ?>" class="facebook"><i class=" icon-social-facebook"></i></a></li>
                        <?php endif; ?>
                        <?php if ($mem_twitter != ''): ?>
                           <li><a href="<?php echo esc_url($mem_twitter); ?>" class="twitter"><i class="icon-social-twitter"></i></a></li>
                        <?php endif; ?>
                        <?php if ($mem_goo != ''): ?>
                           <li><a href="<?php echo esc_url($mem_goo); ?>" class="gplus"><i class="icon-google"></i></a></li>
                        <?php endif; ?>
                        <?php if ($mem_lin != ''): ?>
                           <li><a href="<?php echo esc_url($mem_lin); ?>" class="linkedin"><i class="icon-social-linkedin"></i></a></li>
                        <?php endif; ?>
                        <?php if ($mem_dribbble != ''): ?>
                           <li><a href="<?php echo esc_url($mem_dribbble); ?>" class="dribble"><i class="icon-social-dribbble"></i></a></li>
                              <?php endif; ?>
                     </ul>
                     <p>
                        <?php echo wp_kses($content, array()); ?>
                     </p>
                  </div>
               </div>

               <?php
            }
            ?>
         </div>
      </section>
      <?php
      wp_reset_postdata();
   }
   ?>
<?php endif; ?>
