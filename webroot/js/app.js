var map;

var CustomMarker = function(latlng, map, spot) {
    this.latlng = latlng;
    this.spot = spot;
    this.div = null;
    this.setMap(map);
};

var EmptySpot = function(latlng, map, spot, date) {
    this.latlng = latlng;
    this.spot = spot;
    this.date = date;
    this.div = null;
    this.setMap(map);
}

function initMap() {
    map = new google.maps.Map(document.getElementById('map'), {
        center: {lat: -33.784750, lng: 151.125639},
        disableDefaultUI: true,
        zoomControl: false,
        scrollwheel: false,
        zoom: 20
    });

    CustomMarker.prototype = new google.maps.OverlayView();

    CustomMarker.prototype.draw = function() {
        var self = this;
        var div = this.div;
        if (!div) {
            var stall = self.spot.day_reservation.stall;
            div = $('<div class="marker"><img src="/img/stalls/' + stall.logo + '" /></div>');
            if (stall.food_type.flag != '') {
                div.append('<span class="flag"><img src="/img/flags/' + stall.food_type.flag + '.png"</span>')
            }

            div = div[0];
            //div = this.div = document.createElement('div');
            //div.className = 'marker';

            //if (typeof(self.args.marker_id) !== 'undefined') {
            //    div.dataset.marker_id = self.args.marker_id;
            //}

            google.maps.event.addDomListener(div, "click", function(event) {
                $('#stall' + self.spot.day_reservation.stall.id).modal('show');
                google.maps.event.trigger(self, "click");
            });

            var panes = this.getPanes();
            panes.overlayImage.appendChild(div);
            this.div = div;
        }

        var point = this.getProjection().fromLatLngToDivPixel(this.latlng);
        if (point) {
            div.style.left = point.x + 'px';
            div.style.top = point.y + 'px';
        }
    };

    CustomMarker.prototype.remove = function() {
        if (this.div) {
            this.div.parentNode.removeChild(this.div);
            this.div = null;
        }
    };

    CustomMarker.prototype.move = function(latlng) {
        var point = this.getProjection().fromLatLngToDivPixel(latlng);
        console.log(this.div);
        if (this.div && point) {
            this.div.style.left = point.x + 'px';
            this.div.style.top = point.y + 'px';
        }
    };

    CustomMarker.prototype.getPosition = function() {
        return this.latlng;
    };

    EmptySpot.prototype = new google.maps.OverlayView();

    EmptySpot.prototype.draw = function() {
        var self = this;
        var div = this.div;
        if (!div) {
            div = $('<div class="marker available"><a href="/reservations/add/?spot_id=' + self.spot.id + '&date=' + self.date + '">Available</a></div>')[0];

            google.maps.event.addDomListener(div, "click", function(event) {
                google.maps.event.trigger(self, "click");
            });

            var panes = this.getPanes();
            panes.overlayImage.appendChild(div);
            this.div = div;
        }

        var point = this.getProjection().fromLatLngToDivPixel(this.latlng);
        if (point) {
            div.style.left = point.x + 'px';
            div.style.top = point.y + 'px';
        }
    };

    EmptySpot.prototype.remove = function() {
        if (this.div) {
            this.div.parentNode.removeChild(this.div);
            this.div = null;
        }
    };

    EmptySpot.prototype.getPosition = function() {
        return this.latlng;
    };

    initMarkers();
}

$(function() {

});
