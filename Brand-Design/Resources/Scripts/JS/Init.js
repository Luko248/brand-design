var HeaderHeight = $('.header--landing').height();
var Nav = $('.nav');
var Main = $('main');
var Menu = $('.nav__menu');
$(document).ready(function () {
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
//# sourceMappingURL=Init.js.map