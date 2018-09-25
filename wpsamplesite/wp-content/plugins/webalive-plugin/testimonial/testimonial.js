jQuery(document).ready(function () {

});

$(function() {
    $('.tabs nav a').on('click', function() {
        show_content($(this).index());
    });

    show_content(0);

    function show_content(index) {
        // Make the content visible
        $('.tabs .content.visible').removeClass('visible');
        $('.tabs .content:nth-of-type(' + (index + 1) + ')').addClass('visible');

        // Set the tab to selected
        $('.tabs nav a.selected').removeClass('selected');
        $('.tabs nav a:nth-of-type(' + (index + 1) + ')').addClass('selected');
    }

    // $(".ajax_save").on('click', function () {
    //
    // });
    var container = $(".field-container");
    var i = 1;
    $(".add-more").on('click', function (e) {
        e.preventDefault();
        i++;
        container.append('<p class="row-'+i+'"><input type="text" name="contributors[]" value="" placeholder="Name"><span class="remove" rel="'+i+'">X</span></p>');
    });

    $(document).on("click", '.remove', function (e) {
        e.preventDefault();
        var index = $(this).attr('rel');
        container.find('.row-'+index).remove();
    })

});