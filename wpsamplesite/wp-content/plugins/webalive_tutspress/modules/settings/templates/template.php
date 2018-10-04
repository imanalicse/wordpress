<?php 

namespace Module\Settings;

class Template {
    /**
     * Init
     */
    public function __construct() {}

    public function tab_template() {
        /**
         * Options Values
         */
        $vimeo = get_option( 'watp_vimeo_api' );
        $login_reg_slug = get_option( 'watp_lr_slug' );
        $ecommerce_page_slug = get_option( 'watp_ecommerce_page_slug' );
        $reg_form_fields = get_option( 'watp_reg_form_fields_settings' );

        ?>
        <div class="watp-wrapper">
            <div class="watp-header">
                <h2><span class="dashicons dashicons-admin-settings"></span> Settings</h2>
            </div>

            <div class="watp-row">
            <div class="watp-settings-tabs">
                <ul class="watp-tabs">
                    <li><a href="#general" class="active"><span class="dashicons dashicons-admin-home"></span> <span>General</span></a></li>
                    <li><a href="#registration"><span class="dashicons dashicons-admin-users"></span> <span>Registration</span></a></li>
                    <li><a href="#vimeo"><span class="dashicons dashicons-admin-network"></span> <span>Vimeo API</span></a></li>
                    <li><a href="#ecommerce"><span class="dashicons dashicons-cart"></span> <span>E-Commerce</span></a></li>
                </ul>
                <!-- General Settings -->
                <div id="general" class="watp-settings-tab active">
                    General
                </div>
                <!-- Registration Settings -->
                <div id="registration" class="watp-settings-tab">
                    <div class="watp-row-2">
                        <!-- Add Login / Registration Slugs -->
                        <div class="watp-card">
                            <h4 class="card-title"><span class="dashicons dashicons-admin-links"></span> Login / Register Page Slug : </h4>
                            <form id="login-reg-page-slug">
                                <label for="Register Page Slug"><strong>Register Page Slug : </strong></label>
                                <input type="text" class="regular-text" name="watp_register_slug" value="<?php echo $login_reg_slug['reg_slug']; ?>">

                                <label for="Login page Slug"><strong>Login Page Slug : </strong></label>
                                <input type="text" class="regular-text" name="watp_login_slug" value="<?php echo $login_reg_slug['login_slug']; ?>">

                                <input type="submit" class="button button-primary button-watp" value="Save Changes">
                            </form>
                        </div>

                        <!-- Help Desk -->
                        <div class="watp-card">
                            <h4 class="card-title"><span class="dashicons dashicons-sos"></span> Help Desk :</h4>
                        </div>
                    </div>
                    
                    <div class="watp-row-2 mt-30">
                        <!-- Registration Form Settings -->
                        <div class="watp-card">
                            <h4 class="card-title"><span class="dashicons dashicons-format-aside"></span> Registration Form Settings :</h4>
                            
                            <form id="registration_form_settings">
                                <table class="watp-settings-table mb-20">
                                    <tr>
                                        <td style="width: 30%"><strong>Show Firstname : </strong></td>
                                        <td><input type="checkbox" name="watp_reg_firstname_check" <?php checked( true, $reg_form_fields['firstname'], true ); ?>></td>
                                    </tr>
                                    <tr>
                                        <td style="width: 30%"><strong>Show Lastname : </strong></td>
                                        <td><input type="checkbox" name="watp_reg_lastname_check" <?php checked( true, $reg_form_fields['lastname'], true ); ?>></td>
                                    </tr>
                                    <tr>
                                        <td style="width: 30%"><strong>Show Facebook Login : </strong></td>
                                        <td><input type="checkbox" name="watp_reg_facebook_check" <?php checked( true, $reg_form_fields['facebook'], true ); ?>></td>
                                    </tr>
                                    <tr>
                                        <td style="width: 30%"><strong>Show Google Login : </strong></td>
                                        <td><input type="checkbox" name="watp_reg_google_check" <?php checked( true, $reg_form_fields['google'], true ); ?>></td>
                                    </tr>
                                </table>

                                <input type="submit" class="button button-primary button-watp" value="Save Changes">
                            </form>
                        </div>

                        <!-- Login Form Settings -->
                        <div class="watp-card">
                            <h4 class="card-title"><span class="dashicons dashicons-unlock"></span> Login Form Settings :</h4>
                            <form id="registration_form_settings">
                                <table class="watp-settings-table mb-20">
                                    <tr>
                                        <td style="width: 30%"><strong>Show Facebook Login : </strong></td>
                                        <td><input type="checkbox" name="watp_reg_facebook_check"></td>
                                    </tr>
                                    <tr>
                                        <td style="width: 30%"><strong>Show Google Login : </strong></td>
                                        <td><input type="checkbox" name="watp_reg_google_check"></td>
                                    </tr>
                                </table>

                                <input type="submit" class="button button-primary button-watp" value="Save Changes">
                            </form>
                        </div>
                    </div>
                </div>
                <!-- Vimeo API Settings -->
                <div id="vimeo" class="watp-settings-tab">
                    <div class="watp-row-2">
                        <!-- API Integration Form -->
                        <div class="watp-card">
                            <h4 class="card-title"><span class="dashicons dashicons-admin-plugins"></span> Vimeo API Integration</h4>
                            <form id="vimeo-api-form">
                                <label for="Client ID"><strong>Client ID :</strong></label>
                                <input type="text" class="regulat-text" name="watp_client_id" value="<?php echo esc_attr( $vimeo['client_id'] ); ?>">

                                <label for="Client Secret"><strong>Client Secret :</strong></label>
                                <input type="text" class="regular-text" name="watp_client_secret"  value="<?php echo esc_attr( $vimeo['client_secret'] ); ?>">

                                <label for="Access Token"><strong>Access Token :</strong></label>
                                <input type="text" class="regular-text" name="watp_access_token" value="<?php echo esc_attr( $vimeo['api_token'] ); ?>">

                                <input type="submit" class="button button-primary button-watp" value="Save Changes">
                            </form>
                        </div>

                        <!-- API Integration Help Form -->
                        <div class="watp-card">
                            <h4 class="card-title"><span class="dashicons dashicons-sos"></span> Help Desk :</h4>
                        </div>
                    </div>
                </div>
                <!-- E-Commerce Settings -->
                <div id="ecommerce" class="watp-settings-tab">
                    <div class="watp-row-2">
                        <!-- Add Slugs -->
                        <div class="watp-card">
                            <h4 class="card-title"><span class="dashicons dashicons-admin-links"></span> Add Page Slug : </h4>
                            <form id="ecommerce-page-slug">
                                <label for="Register Page Slug"><strong>Checkout Page Slug : </strong></label>
                                <input type="text" class="regular-text" name="watp_checkout_slug" value="<?php echo $ecommerce_page_slug['checkout_slug']; ?>">

                                <label for="Login page Slug"><strong>Success Page Slug : </strong></label>
                                <input type="text" class="regular-text" name="watp_payment_success_slug" value="<?php echo $ecommerce_page_slug['payment_success_slug']; ?>">

                                <input type="submit" class="button button-primary button-watp" value="Save Changes">
                            </form>
                        </div>

                        <!-- Help Desk -->
                        <div class="watp-card">
                            <h4 class="card-title"><span class="dashicons dashicons-sos"></span> Help Desk :</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
}