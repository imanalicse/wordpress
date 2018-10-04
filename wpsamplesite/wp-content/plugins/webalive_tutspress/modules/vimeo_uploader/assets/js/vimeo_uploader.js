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
     * Getting the video file name onChange
     */
    $('.vimeo-video-file').on('change', function(e) {
        var videoFile = e.target.files;
        var fileName = videoFile[0].name;
        $('.file-name').text(fileName);
    });

    /**
     * Create A New Album
     */
    var createAlbum = function() {
        var appendTo = $('#watp-album-create-form-appender');
        var template = wp.template( 'watp-album-form-template' );
        appendTo.html( template( {title: 'Create Album'} ) );

        $(document.body).on( 'submit', '#watp-create-album', function(e) {
            e.preventDefault();
            $('.loader-status').addClass('loading').html('Creating...');
            $.ajax({
                url: admin_localizer.ajax_url,
                type: 'post',
                data: {
                    action: 'create_vimeo_album',
                    fields: $('#watp-create-album').serialize(),
                    security: admin_localizer.ajax_nonce
                },
                success: function(response) {
                    var flag = JSON.parse(response);
                    if( !flag.error ) {
                        swal( 'Album Created', '', 'success' );
                        $('#watp-create-album')[0].reset();
                        albumList(); // Fetch the album list again!
                        $('.loader-status').empty().removeClass('loading');
                    }else {
                        swal( 'Error occured!', flag.error, 'error' );
                        $('.loader-status').empty().removeClass('loading');
                    }
                }
            });
        })
    }
    createAlbum();

    /**
     * Album List
     */
    var albumList = function() {
        var appendTo = $('#watp-album-list-form');
        var template = wp.template( 'watp-album-list' );
        $('.loader-status').addClass('loading').html('Loading...');
        $.ajax({
            url: admin_localizer.ajax_url,
            method: 'get',
            data: {
                action: 'fetch_albums'
            },
            success: function(response) {
                var data = JSON.parse(response);
                // console.log(data);
                appendTo.html( template( data.data ) );
                $('.loader-status').empty().removeClass('loading');
            }
        })
    }
    albumList();

    /**
     * Delete An Album
     */
    var deleteAlbum = function() {
        $(document.body).on('click', '.watp-album-delete', function(e) {
            e.preventDefault();
            $('.loader-status').addClass('loading').html('Deleting...');
            var albumId = $(this).attr('data-link').split(/[/]+/).pop();
            $.ajax({
                url: admin_localizer.ajax_url,
                method: 'post',
                data: {
                    action: 'delete_vimeo_album',
                    album_id: albumId,
                    security: admin_localizer.ajax_nonce
                },
                success: function(response) {
                    swal( 'Album Deleted', '', 'success' );
                    albumList(); // Fetching the album list after delete an album
                    $('.loader-status').empty().removeClass('loading');
                }
            });
        })
    }
    deleteAlbum();

    /**
     * Generate Edit Album Form
     */
    var editAlbumForm = function() {
        $(document.body).on( 'click', '.watp-album-edit', function(e) {
            e.preventDefault();

            $('.loader-status').addClass('loading').html('Loading...');
            $('#watp-album-create-form-appender').hide();
            $('#watp-album-edit-form-appender').show();
            var albumId = $(this).data('link').split(/[/]+/).pop();

            var template = wp.template( 'watp-album-edit-template' );
            var appendTo = $('#watp-album-edit-form-appender');
            $.ajax({
                url: admin_localizer.ajax_url,
                method: 'post',
                data: {
                    action: 'generate_edit_album_form',
                    album_id: albumId,
                    security: admin_localizer.ajax_nonce
                },
                success: function(response) {
                    var data = JSON.parse(response);
                    // console.log(data);
                    appendTo.html( template( {title: 'Edit Album', album_id: albumId, data: data} ) );
                    $('.loader-status').empty().removeClass('loading');
                }
            });
        });
    }
    // editAlbumForm();

    /**
     * Edit Album
     */
    var editAlbum = function() {
        $(document.body).on('click', '#vimeo-edit-album', function(e) {
            e.preventDefault();
            $('.loader-status').addClass('loading').html('Editing...');
            $.ajax({
                url: admin_localizer.ajax_url,
                type: 'post',
                data: {
                    action: 'edit_vimeo_album',
                    fields: $('#watp-edit-album').serialize(),
                    security: admin_localizer.ajax_nonce
                },
                success: function(response) {
                    var flag = JSON.parse(response);
                    console.log(flag);
                    if( !flag.error ) {
                        swal( 'Album Edited', '', 'success' );
                        $('#watp-edit-album')[0].reset();
                        $('#alter-to-create-album-form').trigger('click');
                        $('.loader-status').empty().removeClass('loading');
                    }else {
                        swal( 'Error occured!', flag.error, 'error' );
                        $('.loader-status').empty().removeClass('loading');
                    }
                }
            });
        });
    }
    editAlbum();
    
    /**
     * Cancel Edit Form
     */
    var cancelEditAlbumForm = function() {
        $(document.body).on('click', '#alter-to-create-album-form', function(e) {
            e.preventDefault();
            $('#watp-album-create-form-appender').show();
            $('#watp-album-edit-form-appender').hide();
        });
    }
    cancelEditAlbumForm();

    /**
     * Upload Video
     */
    var uploadVideo = function() {
        var uploadForm = $('form#upload-video-to-album-form');
        uploadForm.on('submit', function(e) {
            e.preventDefault();
            $('.upload-status').addClass('uploading').html('Uploading...');
            var fileData = $('#watp-video-file').prop('files')[0];
            var fields = $(this).serialize();
            var security = admin_localizer.ajax_nonce;

            var formData = new FormData();
            formData.append('file', fileData);
            formData.append('fields', fields);
            formData.append('action', 'upload_video');
            formData.append('security', security);

            $.ajax({
                url: admin_localizer.ajax_url,
                type: 'post',
                data: formData,               
                cache: false,
                contentType: false,
                processData: false,
                success: function(response) {
                    var flag = JSON.parse(response);
                    if( flag.status == 200 ) {
                        var link = flag.link;
                        swal( 'Video uploaded!', 'Visit : <a href="https://vimeo.com/'+link.split(/[/]+/).pop()+'" target="_blank">https://vimeo.com/'+link.split(/[/]+/).pop()+'</a>', 'success' );
                        $('.upload-status').remove();
                        
                        $('.vimeo-url').html('Visit : <a href="https://vimeo.com/'+link.split(/[/]+/).pop()+'" target="_blank">https://vimeo.com/'+link.split(/[/]+/).pop()+'</a>');
                        $('form#upload-video-to-album-form')[0].reset();
                    }else {
                        swal( 'Something went wrong!', '', 'error' );
                        $('.upload-status').remove();
                    }
                },
            })
        })
    }
    uploadVideo();

    /**
     * Fetch All Videos
     */
    var fetchVideos = function() {
        var appendTo = $('#watp-uploaded-video-appender');
        var template = wp.template( 'watp-uploaded-video-list' );
        $('.loader-status').addClass('loading').html('Loading...');
        $.ajax({
            url: admin_localizer.ajax_url,
            type: 'post',
            data: {
                action: 'fetch_all_videos',
                security: admin_localizer.ajax_nonce
            },
            success: function(response) {
                var data = JSON.parse(response);
                console.log(data);
                appendTo.html( template( data.data ) );
                $('.loader-status').empty().removeClass('loading');
            }
        });
    }
    fetchVideos();

})(jQuery);