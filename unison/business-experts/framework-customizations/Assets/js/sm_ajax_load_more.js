jQuery(function ($) {
   $(window).load(function () {
      'use strict';

      if ($("#sm_load_more_pagination_portfolio").length > 0)
      {
         $("#sm_load_more_pagination_portfolio").on('click', function () {
            var btn_text = $(this).text();
            $(this).text('loading');
            var $this = $(this),
                    page = $this.data('page'),
                    maxpage = $this.data('maxpage'),
                    data = {
                       action: 'sm_load_more_pagination_portfolio',
                       args: $this.data('args'),
                       pc_columns: $this.data('pc_columns'),
                       page: page
                    };
            $.ajax({
               type: 'post',
               url: sm_load.ajaxurl,
               data: data,
               success: function (resp) {
                  console.log(resp);
                  $('#sm_load_div').append(resp);
                  $this.data('page', page + 1);
                  if (page >= maxpage) {
                     $this.hide();
                  } else {
                     $this.text(btn_text);
                  }

               }
            });
            return false;
         });
      }
      if ($("#sm_load_more_pagination_event").length > 0)
      {
         $("#sm_load_more_pagination_event").on('click', function () {
            var btn_text = $(this).text();
            $(this).text('loading');
            var $this = $(this),
                    page = $this.data('page'),
                    maxpage = $this.data('maxpage'),
                    data = {
                       action: 'sm_load_more_pagination_event',
                       args: $this.data('args'),
                       page: page
                    };
            $.ajax({
               type: 'post',
               url: sm_load.ajaxurl,
               data: data,
               success: function (resp) {
                  $('#sm_load_div').append(resp);
                  $this.data('page', page + 1);
                  console.log(page);
                  if (page >= maxpage) {
                     $this.hide();
                  } else {
                     $this.text(btn_text);
                  }

               }
            });
            return false;
         });
      }
   }); /* END window ready */
}); /* END function */