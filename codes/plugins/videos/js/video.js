jQuery.noConflict();
jQuery(document).ready(function($){
    $('.video_list').bxSlider({
        pager: false,
       // video: true
    });
});

function showVideo(code){
    jQuery('#video_frame').html('<iframe width="750" height="400" src="https://www.youtube.com/embed/'+code+'?autoplay=1" frameborder="0" allowfullscreen></iframe>');
    jQuery('.popup_video_wrapper').show();
    jQuery('.close_video').show();
}
function closeVideo(){
    jQuery('#video_frame').html('');
    jQuery('.popup_video_wrapper').hide();
    jQuery('.close_video').hide();
}


