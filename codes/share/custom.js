/**
 * Custom Js
 */
jQuery(document).ready(function ($) {
    "use strict";

    /**
     * On share image click show social share option
     */
    $('.post-share-link img').mouseenter( function () {
        $(this).parent('.post-share-link').parent('.post-share-box').siblings('.mrks-share-buttons').fadeIn();
        return false;
    }).mouseleave( function () {
        $(this).parent('.post-share-link').parent('.post-share-box').siblings('.mrks-share-buttons').hide();
        return false;
    });
    $('.mrks-share-buttons').mouseenter( function () {
        $(this).show();
        return false;
    }).mouseleave( function () {
        $(this).fadeOut();
        return false;
    });
});
