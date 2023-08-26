<!DOCTYPE html>
<html>
<head>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBfwsEOktCsEJZf7-21qghK_3KEZM38ZpA&libraries=places"></script>
</head>
<body>

<div id="map" style="height:1900px;width:980px;"></div>

<script>
    function initMap() {
        const myLocation = {lat: 40.730610, lng: -73.935242};
        
        const map = new google.maps.Map(document.getElementById('map'), {
            center: myLocation,
            zoom: 15
        });

        const request = {
            location: myLocation,
            radius: '5000',
            type: ['fire_station']
        };

        const service = new google.maps.places.PlacesService(map);
        service.nearbySearch(request, callback);

        function callback(results, status) {
            if (status === google.maps.places.PlacesServiceStatus.OK) {
                for (let i = 0; i < results.length; i++) {
                    createMarker(results[i]);
                }
            }
        }

        function createMarker(place) {
            const marker = new google.maps.Marker({
                map: map,
                position: place.geometry.location
            });

            google.maps.event.addListener(marker, 'click', function() {
                const directionsService = new google.maps.DirectionsService();
                const directionsRenderer = new google.maps.DirectionsRenderer();
                directionsRenderer.setMap(map);
                
                const request = {
                    origin: myLocation,
                    destination: place.geometry.location,
                    travelMode: 'DRIVING'
                };

                directionsService.route(request, function(result, status) {
                    if (status == 'OK') {
                        directionsRenderer.setDirections(result);
                        const duration = result.routes[0].legs[0].duration.text;
                        alert('Time required to reach: ' + duration);
                    }
                });
            });
        }
    }
    
    window.onload = initMap;
</script>

</body>
</html>
