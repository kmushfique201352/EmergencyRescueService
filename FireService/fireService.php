<!DOCTYPE html>
<html>
<head>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBfwsEOktCsEJZf7-21qghK_3KEZM38ZpA&libraries=places"></script>
</head>
<body>

<div id="map" style="height:1900px;width:980px;"></div>

<script>
    function initMap() {
        const uiuLocation = {lat: 23.7978829, lng: 90.44971};  // Coordinates for UIU Permanent Campus
        const fireStationLocation = {lat: 23.7979673, lng: 90.4241668};  // Coordinates for FireStation
        
        const map = new google.maps.Map(document.getElementById('map'), {
            center: uiuLocation,
            zoom: 15
        });

        // Create marker for UIU Permanent Campus location
        new google.maps.Marker({
            position: uiuLocation,
            map: map,
            title: 'UIU Permanent Campus, Madani avenue, Dhaka'
        });

        // Create marker for FireStation location
        new google.maps.Marker({
            position: fireStationLocation,
            map: map,
            title: 'FireStation'
        });

        // Draw a direct route from FireStation to UIU Permanent Campus
        const directionsService = new google.maps.DirectionsService();
        const directionsRenderer = new google.maps.DirectionsRenderer();
        directionsRenderer.setMap(map);

        const request = {
            origin: fireStationLocation,
            destination: uiuLocation,
            travelMode: 'DRIVING'
        };

        directionsService.route(request, function(result, status) {
            if (status == 'OK') {
                directionsRenderer.setDirections(result);
            }
        });
    }
    
    window.onload = initMap;
</script>

</body>
</html>
