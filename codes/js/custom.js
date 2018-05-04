jQuery(document).ready(function ($) {
    customScrollTo(jQuery(".case-study-description").offset().top - show_case_top, 500);

    $.ajax({
        method:"POST",
        url:ajax_url,
        data: {
            action:'case_study',
            post_id: 3
        },
        success: function (response) {

        }
    })
});

function customScrollTo(topValue, time) {
    jQuery("html, body").animate({
        scrollTop: topValue
    }, time);
}