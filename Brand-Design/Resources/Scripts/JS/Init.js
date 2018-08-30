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
});
//# sourceMappingURL=Init.js.map