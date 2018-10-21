(function ($) {
    "use strict";
    CustomMarker.prototype = new google.maps.OverlayView();

    function CustomMarker(opts) {
        this.setValues(opts);
    }

    CustomMarker.prototype.draw = function () {
        var self = this;
        var div = this.div;
        if (!div) {
            div = this.div = $('' +
                '<div>' +
                '<div class="shadow"></div>' +
                '<div class="pulse"></div>' +
                '<div class="pin-wrap">' +
                '<div class="pin"></div>' +
                '</div>' +
                '</div>' +
                '')[0];
            this.pinWrap = this.div.getElementsByClassName('pin-wrap');
            this.pin = this.div.getElementsByClassName('pin');
            this.pinShadow = this.div.getElementsByClassName('shadow');
            div.style.position = 'absolute';
            div.style.cursor = 'pointer';
            var panes = this.getPanes();
            panes.overlayImage.appendChild(div);
            google.maps.event.addDomListener(div, "click", function (event) {
                google.maps.event.trigger(self, "click", event);
            });
        }
        var point = this.getProjection().fromLatLngToDivPixel(this.position);
        if (point) {
            div.style.left = point.x + 'px';
            div.style.top = point.y + 'px';
        }
    };


    $(function () {

        var mapPos = new google.maps.LatLng(42.9837, -81.2497);
        var map = new google.maps.Map(document.getElementById("map"), {
            zoom: 14,
            styles: [{
                "featureType": "administrative",
                "elementType": "labels.text.fill",
                "stylers": [{
                    "color": "#444444"
                }]
            }, {
                "featureType": "landscape",
                "elementType": "all",
                "stylers": [{
                    "color": "#f2f2f2"
                }]
            }, {
                "featureType": "poi",
                "elementType": "all",
                "stylers": [{
                    "visibility": "off"
                }]
            }, {
                "featureType": "road",
                "elementType": "all",
                "stylers": [{
                    "saturation": -100
                }, {
                    "lightness": 45
                }]
            }, {
                "featureType": "road.highway",
                "elementType": "all",
                "stylers": [{
                    "visibility": "simplified"
                }]
            }, {
                "featureType": "road.arterial",
                "elementType": "labels.icon",
                "stylers": [{
                    "visibility": "off"
                }]
            }, {
                "featureType": "transit",
                "elementType": "all",
                "stylers": [{
                    "visibility": "off"
                }]
            }, {
                "featureType": "water",
                "elementType": "all",
                "stylers": [{
                    "color": "#f50069"
                }, {
                    "visibility": "on"
                }]
            }],
            center: mapPos,
            disableDefaultUI: true

        });

        var markerAPos = new google.maps.LatLng(42.9737, -81.2297);
        var markerA = new CustomMarker({
            position: markerAPos,
            draggable: true,
            map: map
        });

        var markerBPos = new google.maps.LatLng(42.98, -81.24);
        var markerB = new CustomMarker({
            position: markerBPos,
            map: map
        });

        var markerCPos = new google.maps.LatLng(42.98, -81.20);
        var markerC = new CustomMarker({
            position: markerCPos,
            map: map
        });

        var markerDPos = new google.maps.LatLng(42.99, -81.27);
        var markerD = new CustomMarker({
            position: markerDPos,
            map: map
        });

        var markerEPos = new google.maps.LatLng(42.98, -81.22);
        var markerE = new CustomMarker({
            position: markerEPos,
            map: map
        });

        var markerFPos = new google.maps.LatLng(42.989, -81.21);
        var markerF = new CustomMarker({
            position: markerFPos,
            map: map
        });

        var markerGPos = new google.maps.LatLng(42.989, -81.2489);
        var markerG = new CustomMarker({
            position: markerGPos,
            map: map
        });

        var markerHPos = new google.maps.LatLng(42.987, -81.2289);
        var markerH = new CustomMarker({
            position: markerHPos,
            map: map
        });

        var markerIPos = new google.maps.LatLng(42.986, -81.2889);
        var markerI = new CustomMarker({
            position: markerIPos,
            map: map
        });

        var markerJPos = new google.maps.LatLng(42.980, -81.2650);
        var markerJ = new CustomMarker({
            position: markerJPos,
            map: map
        });

        var markerKPos = new google.maps.LatLng(42.968, -81.2509);
        var markerK = new CustomMarker({
            position: markerKPos,
            map: map
        });

        var markerLPos = new google.maps.LatLng(42.968, -81.2800);
        var markerL = new CustomMarker({
            position: markerLPos,
            map: map
        });

        var markerMPos = new google.maps.LatLng(42.968, -81.2100);
        var markerM = new CustomMarker({
            position: markerMPos,
            map: map
        });

        var markerNPos = new google.maps.LatLng(42.975, -81.2950);
        var markerN = new CustomMarker({
            position: markerNPos,
            map: map
        });

    });

})(jQuery);
