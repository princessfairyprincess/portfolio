/**
 * File script.js
 * 
 * General scripts
 */

$ = jQuery

$(document).ready(function(){

    /**
     * Navigation
     */

    const site = $('html');
    const page = $('#page');
    const navToggle = $('.menu-toggler');
    const navMenu = $('.menu-outer');
    const masthead = $('#masthead');
    const menuLink = $('.menu-item');

    $(navToggle).on('click', function() {
        navToggle.toggleClass('animate');
        navMenu.toggleClass('active');
        page.toggleClass('menu-padding');
        masthead.toggleClass('opened');
        site.toggleClass('no-scroll');
        if (navMenu.attr('aria-expanded') === "false") {
            (navMenu.attr('aria-expanded', 'true'));
        } else {
            (navMenu.attr('aria-expanded', 'false'));
        }
    });

    $(menuLink).on('click', function() {
        navToggle.removeClass('animate');
        page.removeClass('menu-padding');
        navMenu.removeClass('active');
        masthead.removeClass('opened');
        site.removeClass('no-scroll');
        navMenu.attr('aria-expanded', 'false');
    });
    
    let scroll = $(window).scrollTop();
    
    $(window).on('scroll', function() {
        console.log(scroll);
        if (scroll > 100) {
            masthead.addClass('sticky');
            page.addClass('menu-padding');
        } else {
            masthead.removeClass('sticky');
            page.removeClass('menu-padding');
        }
    });

    /**
     * Init vendor scripts
     */

    //Animate on Scroll

    AOS.init();

    //TypeIt
    
    new TypeIt('.type-this', {
        waitUntilVisible: true,
        lifeLike: true,
        startDelay: 200
    }).go();

    //Slick.js

    let slider = $('.slick');

    $(slider).slick({
        lazyLoad: 'ondemand',
        fade: true,
        dots: false,
        infinite: true,
        autoplay: true,
        autoplaySpeed: 7000,
        prevArrow: '<button type="button" class="slick-prev"></button>',
        nextArrow: '<button type="button" class="slick-next"></button>',
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    arrows: false,
                    slidesToShow: 1.15,
                    fade: false
                }
            }
        ]
    });



});