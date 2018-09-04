$(document).ready(function () {
    var HeaderHeight = $('.header--landing').height();
    var Nav = $('.nav');
    var Main = $('main');
    var Menu = $('.nav__menu');

    $('.burger-button').click(function () {
        $(this).toggleClass('burger-button--open');
        Menu.toggleClass('nav__menu--open');
    });

    $(window).scroll(function () {
        var scroll = $(window).scrollTop();
        if (scroll > HeaderHeight) {
            Nav.addClass("nav--fixed");
            Main.css("margin-top", "5rem");
        }
        else {
            Nav.removeClass("nav--fixed");
            Main.css("margin-top", "0");
        }
    });
});