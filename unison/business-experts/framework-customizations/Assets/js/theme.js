(function ($) {
   'use strict';
   //=========================
   // Revolution Slider
   //=========================
   if ($(".sliderArea").length > 0)
   {
      $('.tp-banner').revolution({
         delay: 8000,
         startwidth: 1170,
         startheight: 500,
         startWithSlide: 0,
         fullScreenAlignForce: "off",
         navigationType: "bullet",
         navigationArrows: "on",
         navigationStyle: "round",
         touchenabled: "on",
         onHoverStop: "on",
         navOffsetHorizontal: 0,
         navOffsetVertical: 20,
         shadow: 0,
         fullWidth: "on",
         fullScreen: "on",
         navigationVOffset: 35

      });
   }
   //===================================
   // Bootstrap collaps pluse minuse
   //===================================
   if ($('.collapse').length > 0) {
      $('.collapse').on('shown.bs.collapse', function () {
         $(this).parent().find(".fa-plus").removeClass("fa-plus").addClass("fa-minus");
      }).on('hidden.bs.collapse', function () {
         $(this).parent().find(".fa-minus").removeClass("fa-minus").addClass("fa-plus");
      });
   }
   $('.accoHead').on('click', function () {
      $('.accoHead').removeClass('active');
      $(this).addClass('active');
   });


   //========================
   // Testimonial Carousel
   //========================
   if ($("#testiCarousel").length > 0) {
      $('#testiCarousel').bxSlider({
         mode: 'fade',
         auto: true,
         adaptiveHeight: true,
         speed: 1000,
         controls: true,
         nextText: '»',
         prevText: '«'
      });
   }
   //========================
   // polio Carousel
   //========================
   if ($(".polioCarowsel").length > 0) {
      $('.polioCarowsel').bxSlider({
         mode: 'fade',
         auto: true,
         adaptiveHeight: true,
         speed: 1000
      });
   }
   //========================
   // polio Carousel
   //========================
   if ($(".singleTeamcaro").length > 0) {
      $('.singleTeamcaro').bxSlider({
         mode: 'fade',
         auto: true,
         adaptiveHeight: true,
         speed: 1000
      });
   }
   //========================
   // Team Carowsel
   //========================
   if ($(".teamCarousWrap").length > 0) {
      $('.teamCarousWrap').bxSlider({
         mode: 'horizontal',
         auto: false,
         adaptiveHeight: true,
         speed: 1000
      });
   }
   //========================
   // Blog Carowsel
   //========================
   if ($(".blogImgCarowsel").length > 0) {
      $('.blogImgCarowsel').bxSlider({
         mode: 'horizontal',
         auto: false,
         adaptiveHeight: true,
         speed: 1000
      });
   }
   //========================
   // Team Carowsel
   //========================
   if ($('.testmonialTwoCarowsel').length > 0) {
      $('.testmonialTwoCarowsel').bxSlider({
         auto: true,
         adaptiveHeight: true,
         pager: false,
         mode: 'horizontal',
         speed: 4000
      });
   }
   //========================
   // Single Member Carowsel
   //========================
   if ($('.singleMemCaro').length > 0) {
      $('.singleMemCaro').bxSlider({
         auto: false,
         adaptiveHeight: true,
         speed: 1000
      });
   }

   //=========================
   // Mixer
   //=========================
   if ($('.filterContent, .gellaryFilterContent').length > 0) {
      $('.filterContent, .gellaryFilterContent').themeWar();
   }


   //========================
   // Skill Progress
   //========================
   if ($('.skillProgress').length > 0) {
      $('.skillProgress').appear(function () {
         $('.progress .progress-bar').progressbar();
      });
   }

   //========================
   // Recent work carowsel
   //========================
   if ($('#recentWorkImg-carowsel').length > 0) {
      $('#recentWorkImg-carowsel').slick({
         centerMode: true,
         slidesToShow: 1,
         centerPadding: '130px',
         dots: true,
         responsive: [
            {
               breakpoint: 481,
               settings: {
                  slidesToShow: 1,
                  centerPadding: '30px',
                  dots: false
               }
            }
         ]
      });
   }
   //========================
   // Blog Carowsel item2
   //========================
   if ($('.BlogCarowsel').length > 0) {
      $('.BlogCarowsel').owlCarousel({
         items: 2,
         pagination: false,
         itemsMobile: [481, 1],
         responsive: true,
         itemsDesktop: [1199, 2],
         itemsDesktopSmall: [979, 2]
      });
      var owl = $(".BlogCarowsel").data('owlCarousel');
      $('.slidePrev').on('click', function (e) {
         e.preventDefault();
         owl.prev();
      });
      $('.slideNext').on('click', function (e) {
         e.preventDefault();
         owl.next();
      });
   }
   //========================
   // Team Carowsel
   //========================
   if ($('.teamCarowsel').length > 0) {
      $('.teamCarowsel').owlCarousel({
         items: 4,
         itemsMobile: [481, 1],
         responsive: true,
         itemsDesktop: [1199, 2],
         itemsDesktopSmall: [979, 2]
      });
   }
   //========================
   // Team Carowsel
   //========================
   if ($('.teamAreaCaro').length > 0) {
      $('.teamAreaCaro').owlCarousel({
         singleItem: true,
         navigation: true,
         navigationText: ["", ""],
         pagination: false
      });
   }

   //========================
   // Team Carowsel
   //========================
   if ($('.teamCarowselMember').length > 0) {
      $('.teamCarowselMember').owlCarousel({
         items: 4,
         pagination: false,
         itemsMobile: [481, 1],
         responsive: true,
         itemsDesktop: [1199, 2],
         itemsDesktopSmall: [979, 2]
      });
   }

   //========================
   // Team Carowsel
   //========================
   if ($('.teamCarowselMember2').length > 0) {
      $('.teamCarowselMember2').owlCarousel({
         items: 4,
         pagination: false,
         itemsMobile: [481, 1],
         responsive: true,
         itemsDesktop: [1199, 2],
         itemsDesktopSmall: [979, 2],
         navigation: true,
         navigationText: ["", ""]
      });
   }
   //========================
   // Blog Carowsel
   //========================
   if ($('.BlogCarowselTwo').length > 0) {
      $('.BlogCarowselTwo').owlCarousel({
         items: 3,
         pagination: false,
         responsive: true,
         itemsMobile: [481, 1],
         itemsDesktop: [1199, 2],
         itemsDesktopSmall: [979, 2]
      });
      var owl = $(".BlogCarowselTwo").data('owlCarousel');
      $('.slidePrev').on('click', function (e) {
         e.preventDefault();
         owl.prev();
      });
      $('.slideNext').on('click', function (e) {
         e.preventDefault();
         owl.next();
      });
   }
   //========================
   // Mobile Menu
   //========================
   $('.mobileMenu').on('click', function () {
      $('.menus > ul').slideToggle('slow');
      $('this').toggleClass('active');
   });
   if ($(window).width() < 768)
   {
      $(".menus li.hasChild a").on('click', function () {
         $(this).parent().toggleClass('active');
         $(this).parent().children('.subMenu').slideToggle('slow');
      });
   }
   ;


   //=======================================================
   // Google map
   //=======================================================
   if ($('.mapHolder').length > 0) {
      var lat = $('.mapHolder').attr('data-lat');
      var lan = $(".mapHolder").attr('data-lon');
      var mar = $(".mapHolder").attr('data-marker');
      var map;
      map = new GMaps({
         el: '#map',
         lat: lat,
         lng: lan,
         zoomControlOpt: {
            style: 'SMALL',
            position: 'TOP_LEFT'
         },
         scrollwheel: false,
         zoom: 16,
         zoomControl: false,
         panControl: false,
         streetViewControl: false,
         mapTypeControl: false,
         overviewMapControl: false,
         clickable: false
      });
      map.addMarker({
         lat: lat,
         lng: lan,
         icon: mar,
         animation: google.maps.Animation.DROP,
         verticalAlign: 'bottom',
         horizontalAlign: 'center',
         backgroundColor: '#d3cfcf'
      });
   }

   //========================
   // Easye pieChart one
   //========================
   if ($('.chart').length > 0) {
      $('.chart').appear();
      $('.chart').on('appear', function () {
         $('.chart').each(function () {
            $('.chart').easyPieChart({
               barColor: '#EB5055',
               trackColor: '#fff',
               scaleColor: false,
               animate: 2000,
               size: 150,
               lineWidth: 5
            });
         });
      });
   }
   ;

   //========================
   // Easye pieChart Two
   //========================
   if ($('.charttwo').length > 0) {
      $('.charttwo').appear();
      $('.charttwo').on('appear', function () {
         $('.charttwo').each(function () {
            $('.charttwo').easyPieChart({
               barColor: '#EB5055',
               trackColor: '#000',
               scaleColor: false,
               animate: 2000,
               size: 150,
               lineWidth: 5
            });
         });
      });
   }
   ;


   //========================
   // Fixed Header
   //========================
   $(window).on('scroll', function () {
      if ($(window).scrollTop() > 800)
      {
         $(".mainMenu").addClass('fixedHeader animated fadeInDown');
      }
      else
      {
         $(".mainMenu").removeClass('fixedHeader animated fadeInDown');
      }
   });
   $(window).on('scroll', function () {
      if ($(window).scrollTop() > 30)
      {
         $(".HeadeWrap.headerTopmenu").addClass('fixedHeader animated fadeInDown');
      }
      else
      {
         $(".HeadeWrap.headerTopmenu").removeClass('fixedHeader animated fadeInDown');
      }
   });

   //========================
   // Wow Js
   //========================
   new WOW().init();

   //=======================================================
   // magnificPopup
   //=======================================================
   if ($('a.popup').length > 0) {
      $("a.popup").magnificPopup({
         type: 'image',
         gallery: {
            enabled: true
         }
      });
   }
   ;
   if ($('a.popup.a').length > 0) {
      $("a.popup.a").magnificPopup({
         type: 'image',
         gallery: {
            enabled: true
         }
      });
   }
   ;
   //========================
   // Our Incredible Skill
   //========================
   if ($(".skill_set").length > 0)
   {
      $('.skill_set').appear();
      $('.skill_set').on('appear', loadSkills);
   }
   var coun = true;
   function loadSkills()
   {
      $(".singleSkill").each(function () {
         var datacount = $(this).attr("data-limit");
         $(".skill", this).animate({'width': datacount + '%'}, 2000);
         if (coun)
         {
            $(this).find('.parcen').each(function () {
               var $this = $(this);
               $({Counter: 0}).animate({Counter: datacount}, {
                  duration: 2000,
                  easing: 'swing',
                  step: function () {
                     $this.text(Math.ceil(this.Counter) + '%');
                  }
               });
            });

         }
      });
      coun = false;
   }
   ;

   //========================
   // Loader 
   //========================
   $(window).load(function () {
      if ($('.preloader').length > 0) {
         $('.preloader').delay(800).fadeOut('slow');
      }
   });

   //========================================================
   // Fun Fact
   //========================================================
   var skl = true;
   $('.funfactsArea').appear();
   $('.funfactsArea').on('appear', function () {
      if (skl)
      {
         $('.count').each(function () {
            var $this = $(this);
            jQuery({Counter: 0}).animate({Counter: $this.attr('data-counter')}, {
               duration: 6000,
               easing: 'swing',
               step: function () {
                  var num = Math.ceil(this.Counter).toString();
                  if (Number(num) > 999) {
                     while (/(\d+)(\d{3})/.test(num)) {
                        num = num.replace(/(\d+)(\d{3})/, '<span>' + '$1' + '</span> <b>.</b>' + '$2');
                     }
                  }
                  $this.html(num);
               }
            });
         });
         skl = false;
      }
   });

   //=======================================================
   // Color Preset
   //=======================================================
   if ($(".colorPresetArea").length > 0)
   {
      var switchs = true;
      $(".gearBtn").on('click', function (e) {
         e.preventDefault();
         if (switchs)
         {
            $(this).addClass('active');
            $(".colorPresetArea").animate({'left': '0'}, 400);
            switchs = false;
         } else
         {
            $(this).removeClass('active');
            $(".colorPresetArea").animate({'left': '-290px'}, 400);
            switchs = true;
         }
      });

      $("#patterns a").on('click', function (e) {
         e.preventDefault();
         var bg = $(this).attr('href');

         if ($(".boxed").hasClass('active'))
         {
            //alert(bg);
            $('#patterns a').removeClass('active');
            $(this).addClass('active');
            $('body').removeClass('pat1 pat2 pat3 pat4 pat5 pat6 pat7 pat8 pat9 pat10');
            $('body').addClass(bg);
         } else
         {
            alert('Please, active box layout First.');
         }

      });

      $(".layout").on('click', function (e) {
         e.preventDefault();
         var layout = $(this).attr('href');
         if (layout == 'wide')
         {
            $('body').removeClass('pat1 pat2 pat3 pat4 pat5 pat6 pat7 pat8 pat9 pat10');
         }
         $('.layout').removeClass('active');
         $(this).addClass('active');
         $("#layout").attr('href', 'css/lay_colors/' + layout + '.css');
      });

      $(".lightDark a").on('click', function (e) {
         e.preventDefault();
         var colorsch = $(this).attr('href');
         $('.lightDark a').removeClass('active');
         $(this).addClass('active');
         $("#lightDark").attr('href', 'css/lay_colors/' + colorsch + '.css');
      });

      $(".mainColors a").on('click', function (e) {
         e.preventDefault();
         var color = $(this).attr('href');
         $(".mainColors a").removeClass('active');
         $(this).addClass('active');
         $("#colorChem").attr('href', 'css/lay_colors/' + color + '.css');
      });
   }
   ;

   //========================
   // Subscriptions 
   //========================
   if ($("#sub_form").length > 0)
   {
      $("#sub_form").on('submit', function (e) {
         e.preventDefault();
         var sub_email = $("#sub_email").val();
         $("#subs_submit").html('<i class="fa fa-spinner"></i>');
         if (sub_email == '')
         {
            $("#sub_email").addClass('reqError');
            $("#subs_submit").html('<i class="fa fa-warning"></i>');
         }
         else
         {
            $("#sub_email").removeClass('reqError');
            $.ajax({
               type: "POST",
               url: "php/subscribe.php",
               data: {sub_email: sub_email},
               success: function (data)
               {
                  $("#sub_form input").val('');
                  $("#subs_submit").html('<i class="fa fa-thumbs-up"></i>');
               }
            });
         }
      });
      $("#sub_email").on('keyup', function () {
         $(this).removeClass('reqError');
      });
   }


   //========================
   // Contact Submit
   //========================
   if ($("#contactForm").length > 0)
   {
      $("#contactForm").on('submit', function (e) {
         e.preventDefault();
         $("#con_submit").html('Processsing...');
         var con_name = $("#con_name").val();
         var con_email = $("#con_email").val();
         var con_message = $("#con_message").val();


         var required = 0;
         $(".required", this).each(function () {
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
            $.ajax({
               type: "POST",
               url: 'php/mail.php',
               data: {con_name: con_name, con_email: con_email, con_message: con_message},
               success: function (data)
               {
                  $("#con_submit").html('Done!');
                  $("#contactForm input, #contactForm textarea").val('');
               }
            });
         }
         else
         {
            $("#con_submit").html('Failed!');
         }

      });

      $(".required").on('keyup', function () {
         $(this).removeClass('reqError');
      });
   }
   ;



})(jQuery);