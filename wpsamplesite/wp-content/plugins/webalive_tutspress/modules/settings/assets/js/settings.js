;(function($) {
    "use strict";
    /**
     * Settings Tab
     */
    var settings_tab = function() {
        $( '.watp-tabs li a' ).on( 'click', function(e) {
            e.preventDefault();
            $( '.watp-tabs li a' ).removeClass( 'active' );
            $(this).addClass( 'active' );
            var tab = $(this).attr( 'href' );
            $( '.watp-settings-tab' ).removeClass( 'active' );
            $( '.watp-settings-tabs' ).find( tab ).addClass( 'active' );
        });
    }
    settings_tab();

    /**
     * Saving API Credentials
     */
    var saveAPICredentials = function() {
        var vimeoApiForm = $('form#vimeo-api-form');

        vimeoApiForm.on('submit', function(e) {
            e.preventDefault();
            $.ajax({
                url: admin_localizer.ajax_url,
                type: 'post',
                data: {
                    action: 'save_api_credentials',
                    fields: $('form#vimeo-api-form').serialize(),
                    security: admin_localizer.ajax_nonce
                },
                success: function(response) {
                    var flag = JSON.parse(response);
                    if( flag == 'success' ) {
                        swal( 'Settings saved!', '', 'success' );
                    }else {
                        swal( 'Something went wrong!', '', 'error' );
                    }
                }
            });
        })
    }
    saveAPICredentials();

    /**
     * Getting the video file name onChange
     */
    $('.vimeo-video-file').on('change', function(e) {
        var videoFile = e.target.files;
        var fileName = videoFile[0].name;
        $('.file-name').text(fileName);
    });

    /**
     * Saving Registration Slug
     */
    var saveRegSlug = function() {
        var registrationForm = $('form#login-reg-page-slug');
        registrationForm.on('submit', function(e) {
            console.log('submitted Now');
            e.preventDefault();
            $.ajax({
                url: admin_localizer.ajax_url,
                type: 'post',
                data: {
                    action: 'save_login_reg_page_slug',
                    fields: $('form#login-reg-page-slug').serialize(),
                },
                success: function(response) {
                    var flag = JSON.parse(response);
                    if( flag == 'success' ) {
                        swal( 'Settings saved!', '', 'success' );
                    }else {
                        swal( 'Something went wrong!', '', 'error' );
                    }
                }
            });
        })
    }
    saveRegSlug();

    /**
     * Save Register Form Fields Settings
     */
    var registerFormFieldSettings = function() {
        var self = this;
        var registerFormSettingsForm = $( 'form#registration_form_settings' );
        registerFormSettingsForm.on( 'submit', function(e) {
            e.preventDefault();
            $.ajax({
                url: admin_localizer.ajax_url,
                type: 'post',
                data: {
                    action: 'save_reg_form_field_settings',
                    fields: $( 'form#registration_form_settings' ).serialize()
                },
                success: function(response) {
                    var flag = JSON.parse(response);
                    if( flag === 'success' ) {
                        swal( 'Settings Saved!', '', 'success')
                    }else {
                        swal( 'Something went wrong!', '', 'error' );
                    }
                }
            })
        });
    }
    registerFormFieldSettings();

    /**
     * Save Ecommerce Page Slug
     */
    var saveEcommercePageSlug = function() {
        var registrationForm = $('form#ecommerce-page-slug');
        registrationForm.on('submit', function(e) {
            console.log('submitted Now');
            e.preventDefault();
            $.ajax({
                url: admin_localizer.ajax_url,
                type: 'post',
                data: {
                    action: 'save_ecommerce_page_slug',
                    fields: $('form#ecommerce-page-slug').serialize(),
                },
                success: function(response) {
                    var flag = JSON.parse(response);
                    if( flag == 'success' ) {
                        swal( 'Settings saved!', '', 'success' );
                    }else {
                        swal( 'Something went wrong!', '', 'error' );
                    }
                }
            });
        })
    }
    saveEcommercePageSlug();
})(jQuery);