(function ($) {
    jQuery(document).ready(function () {

        function init() {
            // postInit.initVar();
            // postInit.bind();

            var interval_id;
            var miniCartContainer = $('.wa-mini-cart');
            miniCartContainer.hover(
                function(){
                    interval_id = setTimeout(function(){
                        miniCartContainer.find('.site-header-cart').show();
                    }, 100 );
                },
                function(){
                    clearTimeout( interval_id );
                    miniCartContainer.find('.site-header-cart').hide();
                }
            );

            loadMoreProduct.init();
        }

        // var postInit = {
        //     initVar: function () {
        //         loadMoreButton = $('.load-more-product');
        //         productContainer = jQuery(".featured-product-list");
        //     },
        //     bind: function () {
        //         loadMoreButton.click(function (e) {
        //             e.preventDefault();
        //             Inline.loadMoreProduct();
        //         });
        //         loadMoreButton.trigger('click');
        //     }
        // };

        var loadMoreButton;
        var productContainer;
        var loadMoreProduct = {
            init : function () {
                loadMoreProduct.initVar();
                loadMoreProduct.bind();
            },
            initVar: function () {
                loadMoreButton = $('.load-more-product');
                productContainer = jQuery(".featured-product-list");
            },
            bind: function () {
                loadMoreButton.click(function (e) {
                    e.preventDefault();
                    loadMoreProduct.loadMoreProduct();
                });
                loadMoreButton.trigger('click');
            },
            loadMoreProduct: function () {
                var total_item = productContainer.attr('data-total-item');
                var item_per_page = productContainer.attr('data-item-per-page');
                var offset = productContainer.find("li").length;
                jQuery.ajax({
                    type: "GET",
                    url: ajax_url,
                    data: {
                        action: 'load_product',
                        offset: offset,
                        item_per_page: item_per_page
                    },
                    success: function (response) {
                        productContainer.append(response);
                        if (total_item <= offset + item_per_page ) {
                            loadMoreButton.hide();
                        }
                    }
                });
            }
        }
        init();
        console.log("webalive woocommerce plugin")
    });
})(jQuery);