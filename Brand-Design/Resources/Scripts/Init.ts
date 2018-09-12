var HeaderHeight = $('.header--landing').height();
var Nav = $('.nav');
var Main = $('main');
var Header = $('header');
var Menu = $('.nav__menu');

$(document).ready(function () {
   
    $('.burger-button').click(function () {
        $(this).toggleClass('burger-button--open');
        Menu.toggleClass('nav__menu--open');
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