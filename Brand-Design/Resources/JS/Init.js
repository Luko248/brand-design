$(document).ready(function () {
    var HeaderHeight = $('header.grid-header__landing').innerHeight();
    var Nav = $('nav');

    $(window).scroll(function () {
        var scroll = $(window).scrollTop();
        if (scroll >= HeaderHeight) {
            Nav.addClass("fixed");
        }
        else {
            Nav.removeClass("fixed");
        }
    });

    $('.burger-button').click(function () {
        $(this).toggleClass('open');
        $('nav').toggleClass('nav-open');
    });

    //$('.slider').slick({
    //    infinite: true,
    //    slidesToShow: 1,
    //    slidesToScroll: 1,
    //    speed: 1000,
    //    autoplay: true,
    //    autoplaySpeed: 4000,
    //    dots: false,
    //    fade: true
    //});
});