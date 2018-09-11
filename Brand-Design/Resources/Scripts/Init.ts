var HeaderHeight = $('.header--landing').height();
var Nav = $('.nav');
var Main = $('main');
var Menu = $('.nav__menu');

$(document).ready(function () {
   
    $('.burger-button').click(function () {
        $(this).toggleClass('burger-button--open');
        Menu.toggleClass('nav__menu--open');
    });

    if ($(window).width() > 768) {
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
   
});