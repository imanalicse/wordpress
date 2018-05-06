(function($){
    'use strict';
    
    //========================
    // Contact Submit
    //========================
    if ($(".contacts_form_martin").length > 0)
    {
        $(".contacts_form_martin").on('submit', function(e) {
            e.preventDefault();
            $("#con_submit").html('<i>Wait...</i><span></span>');
            
            var alldata = $(this).serialize();

            var required = 0;
            $(".required", this).each(function() {
                if ($(this).val() == '')
                {
                    $(this).addClass('reqError');
                    required += 1;
                }
                else
                {
                    if ($(this).hasClass('reqError'))
                    {
                        $(this).removeClass('reqError');
                        if (required > 0)
                        {
                            required -= 1;
                        }
                    }
                }
            });
            if (required === 0)
            {
                $.post(
                    be_ajax.ajaxurl, 
                    {
                        'action': 'contact_mail',
                        'alldata': alldata
                    }, 
                    function(data){
                        /*alert(data);*/
                        $("#con_submit").html('<i>Done!</i><span></span>');
                        $(".contacts_form_martin .emptys").val('');
                    }
                );
            }
            else
            {
                $("#con_submit").html('<i>Failed!</i><span></span>');
            }

        });

        $(".required").on('keyup', function() {
            $(this).removeClass('reqError');
        });
    }
})(jQuery);