jQuery(document).ready(function ($) {

    var mediaUploader;

    $('#upload-button').on('click', function (e) {
        e.preventDefault();
        if (mediaUploader) {
            mediaUploader.open();
            return;
        }

        mediaUploader = wp.media.frames.file_frame = wp.media({
            title: 'Choose a Profile Picture',
            button: {
                text: 'Choose Picture'
            },
            multiple: false
        });

        mediaUploader.on('select', function () {
            var attachment = mediaUploader.state().get('selection').first().toJSON();
            $('#profile-picture').val(attachment.url);
            $(".profile-picture-preview").attr('src', attachment.url);
        });

        mediaUploader.open();

    });

    $('#remove-picture').on('click', function (e) {
        e.preventDefault();

        var answer = confirm("Are you sure you want to delete your Profile Picture?");

        if(answer ==1) {
            console.log("Yes, please");
            $('#profile-picture').val('');
            $(".profile-picture-preview").attr('src', '');
            $('.sunset-general-form').submit();
        }

        return;

    });

});