/*global $ */

$(document).ready(function () {

    'use strict';
    /* Run Material Design */

    // Header Fixed Top 
    $(window).scroll(function () {
        var ScrollTop = $(window).scrollTop();

        if (ScrollTop > 310 && $(window).width() > 767) {
            $("header").addClass('header-bg');
            $("#head-pages").addClass('fixed-head');
            $(".section-fix-header").addClass('fixed-header-content');
        } else {
            $("header").removeClass('header-bg');
            $("#head-pages").removeClass('fixed-head');
            $(".section-fix-header").removeClass('fixed-header-content');
        }


    });

    /* Start Scroll Top Background Section Head Pages Animation */
    if ($("#head-pages").length) {
        $(window).scroll(function () {
            var ScrollTop = $(window).scrollTop();
            if (ScrollTop > 10 && $(window).width() > 991 && ScrollTop < 310) {
                $("#head-pages").css({

                    backgroundPosition: '50% ' + -ScrollTop / 2 + 'px'

                });
            }
        });
    }

    $(".btn-contactus-form").on('click', function(){
        $('form').slideToggle();
    });

    
    /* Start Owl Carousel Project Details */
    $('#header-Slider .owl-carousel').owlCarousel({
        loop: true,
        margin: 15,
        navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
        autoplay: true,
        autoplayTimeout: 3000,
        autoplayHoverPause: true,
        nav: false,
        responsive: {
            0: {
                items: 1,
                nav: true
            },
            600: {
                items: 1,
                nav: false
            },
            1000: {
                items: 1,
                nav: true,
                loop: false
            }
        }
    });
    /* Start Owl Carousel Project Details */
    $('#item-details .owl-carousel').owlCarousel({
        loop: true,
        margin: 15,
        navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
        autoplay: true,
        autoplayTimeout: 3000,
        autoplayHoverPause: true,
        nav: false,
        responsive: {
            0: {
                items: 1,
                nav: true
            },
            600: {
                items: 1,
                nav: false
            },
            1000: {
                items: 1,
                nav: true,
                loop: false
            }
        }
    });




});


