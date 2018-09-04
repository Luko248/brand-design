

$(document).ready(function () {
    var HeaderHeight = $('.header--landing').height();
    var Nav = $('.navigation');

    $('.burger-button').click(function () {
        $(this).toggleClass('open');
        $('nav').toggleClass('nav-open');
    });

    $(window).scroll(function () {
        var scroll = $(window).scrollTop();
        if (scroll > HeaderHeight) {
            Nav.addClass("fixed");
        }
        else {
            Nav.removeClass("fixed");
        }
    });
});