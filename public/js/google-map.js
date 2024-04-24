var google;

function initMap() {
    var chehimeCoords = new google.maps.LatLng(33.6210785, 35.4551373); // Coordinates for Chehime

    var mapOptions = {
        zoom: 12, // Adjust the initial zoom level as needed
        center: chehimeCoords,
        scrollwheel: false,
        styles: [
            {
                "featureType": "administrative.country",
                "elementType": "geometry",
                "stylers": [
                    {
                        "visibility": "simplified"
                    },
                    {
                        "hue": "#ff0000"
                    }
                ]
            }
        ]
    };

    var mapElement = document.getElementById('map');
    var map = new google.maps.Map(mapElement, mapOptions);

    // Add a marker for Chehime
    new google.maps.Marker({
        position: chehimeCoords,
        map: map,
        icon: 'https://maps.google.com/mapfiles/ms/icons/red-dot.png' // Use a default Google Maps icon
    });
}

// Trigger the initMap() function when the window loads
google.maps.event.addDomListener(window, 'load', initMap);
