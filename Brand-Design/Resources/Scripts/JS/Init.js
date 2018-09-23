var google = window.google;
function conferenceMap() {
    var LatLng = { lat: 49.1939695, lng: 16.5654526 };
    var styledMapType = new google.maps.StyledMapType([
        {
            "elementType": "geometry",
            "stylers": [
                {
                    "color": "#231836"
                }
            ]
        },
        {
            "elementType": "labels.icon",
            "stylers": [
                {
                    "visibility": "off"
                }
            ]
        },
        {
            "elementType": "labels.text.fill",
            "stylers": [
                {
                    "color": "#ffffff"
                }
            ]
        },
        {
            "elementType": "labels.text.stroke",
            "stylers": [
                {
                    "color": "#212121"
                }
            ]
        },
        {
            "featureType": "administrative",
            "elementType": "geometry",
            "stylers": [
                {
                    "color": "#a815d7"
                }
            ]
        },
        {
            "featureType": "administrative.country",
            "elementType": "labels.text.fill",
            "stylers": [
                {
                    "color": "#9e9e9e"
                }
            ]
        },
        {
            "featureType": "administrative.land_parcel",
            "stylers": [
                {
                    "visibility": "off"
                }
            ]
        },
        {
            "featureType": "administrative.locality",
            "elementType": "labels.text.fill",
            "stylers": [
                {
                    "color": "#bdbdbd"
                }
            ]
        },
        {
            "featureType": "poi",
            "elementType": "labels.text.fill",
            "stylers": [
                {
                    "color": "#ffffff"
                }
            ]
        },
        {
            "featureType": "poi.park",
            "elementType": "geometry",
            "stylers": [
                {
                    "color": "#5a236c"
                }
            ]
        },
        {
            "featureType": "poi.park",
            "elementType": "labels.text.fill",
            "stylers": [
                {
                    "color": "#fcfcfc"
                }
            ]
        },
        {
            "featureType": "poi.park",
            "elementType": "labels.text.stroke",
            "stylers": [
                {
                    "color": "#1b1b1b"
                }
            ]
        },
        {
            "featureType": "road",
            "elementType": "geometry.fill",
            "stylers": [
                {
                    "color": "#2c2c2c"
                }
            ]
        },
        {
            "featureType": "road",
            "elementType": "labels.text.fill",
            "stylers": [
                {
                    "color": "#8a8a8a"
                }
            ]
        },
        {
            "featureType": "road.arterial",
            "elementType": "geometry",
            "stylers": [
                {
                    "color": "#373737"
                }
            ]
        },
        {
            "featureType": "road.highway",
            "elementType": "geometry",
            "stylers": [
                {
                    "color": "#3c3c3c"
                }
            ]
        },
        {
            "featureType": "road.highway.controlled_access",
            "elementType": "geometry",
            "stylers": [
                {
                    "color": "#4e4e4e"
                }
            ]
        },
        {
            "featureType": "road.local",
            "elementType": "labels.text.fill",
            "stylers": [
                {
                    "color": "#616161"
                }
            ]
        },
        {
            "featureType": "transit",
            "elementType": "labels.text.fill",
            "stylers": [
                {
                    "color": "#ffffff"
                }
            ]
        },
        {
            "featureType": "water",
            "elementType": "geometry",
            "stylers": [
                {
                    "color": "#01ffa9"
                }
            ]
        },
        {
            "featureType": "water",
            "elementType": "labels.text.fill",
            "stylers": [
                {
                    "color": "#3d3d3d"
                }
            ]
        }
    ], { name: 'Styled Map' });
    var map = new google.maps.Map(document.getElementById('ConfMap'), {
        center: LatLng,
        zoom: 14,
        disableDefaultUI: true,
        scaleControl: true,
        zoomControl: true,
        mapTypeControlOptions: {
            mapTypeIds: ['roadmap', 'satellite', 'hybrid', 'terrain',
                'styled_map']
        }
    });
    var image = {
        url: '/Resources/Images/Icons/marker.png',
        origin: new google.maps.Point(0, 0),
        anchor: new google.maps.Point(0, 32)
    };
    var infowindow = new google.maps.InfoWindow({
        content: "<div class='marker-window'><h3>Brand<br>DESIGN</h3><span>graphic solutions</span><br><div>Veslařská 254/349<br>637 00, Brno</div></div>",
        anchor: new google.maps.Point(0, 0)
    });
    var marker = new google.maps.Marker({
        position: LatLng,
        map: map,
        icon: image,
        title: "Headquaters"
    });
    marker.addListener('click', function () { infowindow.open(map, marker); });
    map.mapTypes.set('styled_map', styledMapType);
    map.setMapTypeId('styled_map');
}
;
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
});
//# sourceMappingURL=Init.js.map