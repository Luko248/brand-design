var HeaderHeight = $('.header--landing').height();
var Nav = $('.nav');
var Main = $('main');
var Header = $('header');
var Menu = $('.nav__menu');
var NavItem = $('.nav__item');

$(document).ready(function () {

    $('.burger-button').click(function () {
        $(this).toggleClass('burger-button--open');
        Menu.toggleClass('nav__menu--open');
    });

    $(document).click(function (e) {
        if ($(e.target).closest($('.burger-button')).length == 0) {
            $('.burger-button').removeClass('burger-button--open');
            Menu.removeClass('nav__menu--open');
        }
    });

    NavItem.click(function () {
        NavItem.removeClass('nav__item--active');
        $(this).addClass('nav__item--active');
    });

    $('.to-about').click(function () {
        NavItem.removeClass('nav__item--active');
        $('.nav__menu li:nth-child(2) a').addClass('nav__item--active');
    });

    $('.to-contact').click(function () {
        NavItem.removeClass('nav__item--active');
        $('.nav__menu li:nth-child(4) a').addClass('nav__item--active');
    });


    if ($(window).width() > 768 && Header.hasClass('header--landing')) {
        $(window).scroll(function () {
            var scroll = $(window).scrollTop();
            if (scroll > 50) {
                Nav.addClass("nav--fixed");
            }
            else {
                Nav.removeClass("nav--fixed");
            }
        });
    }
    else {
        Nav.addClass("nav--fixed");
    }

    setTimeout(function () {
        $('.loading-anim').css("display", "none");
    }, 1200);

    //$('#HomeScroll').click(function () {
    //    $('html,body').animate({
    //        scrollTop: $('.header--landing').offset().top
    //    }, 1000);
    //});

    //$('#AboutScroll').click(function () {
    //    $('html,body').animate({
    //        scrollTop: $('.section--about').offset().top
    //    }, 1000);
    //});

    //$('#ReferencesScroll').click(function () {
    //    $('html,body').animate({
    //        scrollTop: $('.section--references').offset().top
    //    }, 1000);
    //});

    //$('#ContactScroll').click(function () {
    //    $('html,body').animate({
    //        scrollTop: $('.section--contact').offset().top
    //    }, 1000);
    //});
});