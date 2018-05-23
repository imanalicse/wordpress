// Attribute filter collapsable
jQuery(document).ready(function ($) {
    var attributeContainer = jQuery(".widget_layered_nav");
    attributeContainer.find("ul").hide();
    attributeContainer.find("ul").each(function (index) {
        if(jQuery(this).find("li.chosen").length > 0) {
            jQuery(this).show();
            jQuery(this).parent().addClass("selected");
        }
    });
    attributeContainer.find(".widget-title").click(function () {
        attributeContainer.find("ul").hide();
        //jQuery(".widget_layered_nav:not(.selected)").find("ul").hide();
        if(jQuery(this).parent().hasClass("selected")){
            jQuery(this).parent().removeClass("selected");
            jQuery(this).next().fadeOut();
        }else{
            attributeContainer.removeClass("selected");
            jQuery(this).parent().addClass("selected");
            jQuery(this).next().fadeIn();
        }
    });
});