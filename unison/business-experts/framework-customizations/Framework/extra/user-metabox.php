<?php
/**
 * THEME WAR WordPress Framework
 *
 * Copyright (c) 2014, THEME WAR,(http://themewar.com)
 */

add_action( 'show_user_profile', 'martin_user_avater' );
add_action( 'edit_user_profile', 'martin_user_avater' );

function martin_user_avater( $user )
{
    $user_facebook = get_user_meta($user->ID, 'user_facebook', TRUE);
    $user_twitter = get_user_meta($user->ID, 'user_twitter', TRUE);
    $user_google_plus = get_user_meta($user->ID, 'user_google_plus', TRUE);
    $user_dribbble = get_user_meta($user->ID, 'user_dribbble', TRUE);
    ?>

        <table class="form-table">
            <tr>
                <th><h3>User Avatar</h3></th>
                <td>
                    <?php
                        $avater_src = get_the_author_meta( 'user_avatar', $user->ID );
                        $user_av_ID = get_the_author_meta( 'user_av_ID', $user->ID );
                        if($avater_src != '')
                        {
                            $av = $avater_src;
                            $vis = 'block';
                        }
                        else
                        {
                            $av = '';
                            $vis = 'none';
                        }
                    ?>
                    <img class="user_logo upImg" src="<?php echo esc_url($av); ?>" height="100" width="100" style="display: <?php echo esc_attr($vis); ?>;"/>
                    <div class="clear"></div>
                    <input type="text" name="user_avatar" value="<?php echo esc_url($av); ?>" class="regular-text user_avater_url" />
                    <input type="hidden" name="user_av_ID" value="<?php echo esc_attr($user_av_ID); ?>" id="user_av_ID"/>
                    <a href="#" class="useravatar_upload button">Upload</a>
                </td>
            </tr>
            <tr>
                <th>
                    <h3><?php echo esc_html__('Facebook Link', 'martin'); ?></h3>
                </th>
                <td><input type="text" name="user_facebook" value="<?php echo esc_attr($user_facebook); ?>"/></td>
            </tr>
            <tr>
                <th>
                    <h3><?php echo esc_html__('Twitter Link', 'martin'); ?></h3>
                </th>
                <td><input type="text" name="user_twitter" value="<?php echo esc_attr($user_twitter); ?>"/></td>
            </tr>
            <tr>
                <th>
                    <h3><?php echo esc_html__('Google+ Link', 'martin'); ?></h3>
                </th>
                <td><input type="text" name="user_google_plus" value="<?php echo esc_attr($user_google_plus); ?>"/></td>
            </tr>
            <tr>
                <th>
                    <h3><?php echo esc_html__('Dribbble Link', 'martin'); ?></h3>
                </th>
                <td><input type="text" name="user_dribbble" value="<?php echo esc_attr($user_dribbble); ?>"/></td>
            </tr>
        </table>
    <?php
}

add_action( 'personal_options_update', 'martin_user_avatar_src' );
add_action( 'edit_user_profile_update', 'martin_user_avatar_src' );

function martin_user_avatar_src( $user_id )
{
    update_user_meta( $user_id,'user_avatar', sanitize_text_field( $_POST['user_avatar'] ) );
    update_user_meta( $user_id,'user_av_ID', sanitize_text_field( $_POST['user_av_ID'] ) );
    update_user_meta( $user_id,'user_facebook', sanitize_text_field( $_POST['user_facebook'] ) );
    update_user_meta( $user_id,'user_twitter', sanitize_text_field( $_POST['user_twitter'] ) );
    update_user_meta( $user_id,'user_google_plus', sanitize_text_field( $_POST['user_google_plus'] ) );
    update_user_meta( $user_id,'user_dribbble', sanitize_text_field( $_POST['user_dribbble'] ) );
}