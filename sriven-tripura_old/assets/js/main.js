!function(e){"use strict";e(window).on("load",function(){e("#ctn-preloader").addClass("loaded"),e("#loading").fadeOut(500),e("#ctn-preloader").hasClass("loaded")&&e("#preloader").delay(500).queue(function(){e(this).remove()})});var a=e(".homepage-slide");a.owlCarousel({items:1,loop:!0,margin:0,smartSpeed:800,animateIn:"fadeIn",animateOut:"fadeOut",loop:!0,slideSpeed:3e3,autoplay:!0,nav:!0,dots:!0,navText:["<i class='fas fa-long-arrow-alt-left'></i>","<i class='fas fa-long-arrow-alt-right'></i>"]});var a=e(".homepage-slide-2");a.owlCarousel({items:1,loop:!0,margin:0,smartSpeed:800,animateIn:"fadeIn",animateOut:"fadeOut",items:1.4,loop:!0,slideSpeed:3e3,autoplay:!0,nav:!0,dots:!0,navText:["<i class='fas fa-long-arrow-alt-left'></i>","<i class='fas fa-long-arrow-alt-right'></i>"]});var a=e(".homepage-slide-custom");a.owlCarousel({items:1,loop:!0,margin:0,smartSpeed:800,animateIn:"fadeIn",animateOut:"fadeOut",loop:!0,slideSpeed:3e3,nav:!0,dots:!0,navText:["<i class='fas fa-long-arrow-alt-left'></i>","<i class='fas fa-long-arrow-alt-right'></i>"]}),e("[data-delay]").each(function(){var a=e(this).data("delay");e(this).css("animation-delay",a)}),e("[data-duration]").each(function(){var a=e(this).data("duration");e(this).css("animation-duration",a)}),a.on("translated.owl.carousel",function(){a.find(".owl-item.active").find("[data-animation]").each(function(){var a=e(this).data("animation");e(this).addClass("animated "+a).css("opacity","1")})}),jQuery("#mobile-menu").meanmenu({meanScreenWidth:"991",meanMenuContainer:".mobile-menu"}),e("#service-carousel-3").owlCarousel({loop:!0,smartSpeed:800,nav:!0,dots:!0,margin:30,navText:["<i class='fal fa-angle-left'></i>","<i class='fal fa-angle-right'></i>"],responsiveClass:!0,responsive:{0:{items:1,margin:0},576:{items:2},992:{items:3}}}),e("#scroll-top").on("click",function(){e("html , body").animate({scrollTop:0},1e3)}),e("select").niceSelect(),e(".menu-tigger").on("click",function(){return e(".extra-info,.offcanvas-overly").addClass("active"),!1}),e(".menu-close,.offcanvas-overly").on("click",function(){e(".extra-info,.offcanvas-overly").removeClass("active")}),e("a[data-rel^=lightcase]").lightcase(),e(".project-carousel").owlCarousel({loop:!0,smartSpeed:800,dots:!1,margin:30,stagePadding:130,autoplay:!0,navText:["<i class='fal fa-angle-left'></i>","<i class='fal fa-angle-right'></i>"],responsiveClass:!0,center:!0,responsive:{0:{items:1,stagePadding:0,margin:0,nav:!1},992:{items:2,stagePadding:65,margin:20,nav:!0},1500:{items:2,nav:!0}}}),e(".brand-carousel").owlCarousel({loop:!0,margin:100,smartSpeed:800,nav:!0,dots:!1,margin:30,autoplay:!0,responsiveClass:!0,navText:["<i class='fas fa-long-arrow-alt-left'></i>","<i class='fas fa-long-arrow-alt-right'></i>"],responsive:{0:{items:2,nav:!1,dots:!0},576:{items:3,nav:!1},992:{items:4,nav:!1},1200:{items:5},1500:{items:5}}}),e(".testimonial-carousel").owlCarousel({items:1,loop:!0,smartSpeed:800,nav:!0,dots:!0}),e(".cta-slider").owlCarousel({items:1,loop:!0,smartSpeed:800,nav:!1,dots:!0}),e(".odometer").appear(function(a){e(".odometer").each(function(){var a=e(this).attr("data-count");e(this).html(a)})});var t=e(".search-wrap"),i=e(".search-trigger"),o=e("#search-close");e(".search-trigger").on("click",function(e){e.preventDefault(),t.animate({opacity:"toggle"},500),i.add(o).addClass("open")}),e(".search-close").on("click",function(e){e.preventDefault(),t.animate({opacity:"toggle"},500),i.add(o).removeClass("open")}),e(document.body).on("click",function(e){t.fadeOut(200),i.add(o).removeClass("open")}),e(".search-trigger, .main-search-input").on("click",function(e){e.stopPropagation()}),e(".hamburger-menu-trigger").on("click",function(){return e(".extra-info,.offcanvas-overly").addClass("active"),!1}),e(".menu-close,.offcanvas-overly").on("click",function(){e(".extra-info,.offcanvas-overly").removeClass("active")}),e(".row-portfolio").imagesLoaded(function(){var a=e(".row-portfolio").isotope({itemSelector:".grid-item",percentPosition:!0,masonry:{columnWidth:".grid-sizer"}});e(".portfolio-filter").on("click","button",function(){var t=e(this).attr("data-filter");a.isotope({filter:t})})}),e(".portfolio-filter button").on("click",function(a){e(this).siblings(".active").removeClass("active"),e(this).addClass("active"),a.preventDefault()}),e("#showlogin").on("click",function(){e("#checkout-login").slideToggle(900)}),e("#showcoupon").on("click",function(){e("#checkout_coupon").slideToggle(900)}),e("#cbox").on("click",function(){e("#cbox_info").slideToggle(900)}),e("#ship-box").on("click",function(){e("#ship-box-info").slideToggle(1e3)}),e(".single-pricing-box").on("mouseenter",function(){e(this).addClass("active").parent().siblings().find(".single-pricing-box").removeClass("active")}),e(".single-process-box").on("mouseenter",function(){e(this).addClass("active").parent().siblings().find(".single-process-box").removeClass("active")}),e(".wcu-box-2").on("mouseenter",function(){e(".wcu-box-2").removeClass("active"),e(this).addClass("active")}),e(".js-tilt").length&&e(".js-tilt").tilt(),e(".post_gallery").owlCarousel({items:1,loop:!0,smartSpeed:800,nav:!1,animateIn:"fadeIn",animateOut:"fadeOut",dots:!1,nav:!0,navText:["<i class='fal fa-arrow-left'></i>","<i class='fal fa-arrow-right'></i>"],dots:!1}),e(".counter").countUp({time:1e3,delay:10}),new WOW().init(),e.scrollUp({scrollName:"scrollUp",topDistance:"300",topSpeed:300,animation:"fade",animationInSpeed:200,animationOutSpeed:200,scrollText:'<i class="fas fa-chevron-up"></i>',activeOverlay:!1}),0!=e("#contact-map").length&&google.maps.event.addDomListener(window,"load",function e(){var a={zoom:13,scrollwheel:!1,center:new google.maps.LatLng(23.7031006,90.4596732),styles:[{stylers:[{hue:"#AADAFF"}]},{featureType:"road",elementType:"labels",stylers:[{visibility:"off"}]},{featureType:"road",elementType:"geometry",stylers:[{lightness:100},{visibility:"simplified"}]}]},t=document.getElementById("contact-map"),i=new google.maps.Map(t,a);new google.maps.Marker({position:new google.maps.LatLng(23.7031006,90.4596732),map:i,icon:"assets/images/icons/map-marker.png",title:"Cryptox"})}),514>e(window).width()?e("#remove").removeClass("vertical-center"):e("#remove").addClass("vertical-center"),e(document).on("click",'a[href^="#frmContact"]',function(a){var t=e(this).attr("href"),i=e(t);if(0!==i.length){a.preventDefault();var o=i.offset().top;e("body, html").animate({scrollTop:o-200})}})}(jQuery),$(".filters ul li").click(function(){$(".filters ul li").removeClass("after-click"),$(this).addClass("after-click");var e=$(this).attr("data-filter");$grid.isotope({filter:e})});var $grid=$(".grid").isotope({itemSelector:".all",percentPosition:!0,masonry:{columnWidth:".all"}});const accordionItems=document.querySelectorAll("[data-accordion] > details"),siblings=e=>null===e.parentNode?[]:Array.prototype.filter.call(e.parentNode.children,function(a){return a!==e});accordionItems.forEach(e=>{e.addEventListener("click",()=>{let a=siblings(e);a.forEach(e=>{e.removeAttribute("open")})})});