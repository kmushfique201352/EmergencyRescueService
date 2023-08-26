<!DOCTYPE html>
<html>
<head>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBfwsEOktCsEJZf7-21qghK_3KEZM38ZpA&libraries=places"></script>
</head>
<body>

<div id="map" style="height:1900px;width:980px;"></div>

<script>
    function initMap() {
        const myLocation = {lat: 23.7978829, lng: 90.44971};
        
        const map = new google.maps.Map(document.getElementById('map'), {
            center: myLocation,
            zoom: 15
        });

        // Add your location with a default marker
        new google.maps.Marker({
            position: myLocation,
            map: map,
            title: 'My Location'
        });

        // Coordinates beside your location
        const nearbyLocations = [
            {lat: 23.7972825, lng: 90.4458574},
            {lat: 23.795280, lng: 90.445847},
            {lat: 23.800153, lng: 90.444168},
            {lat: 23.7985568, lng: 90.4462631}
        ];

        // Adding red circle markers
        for (let i = 0; i < nearbyLocations.length; i++) {
            new google.maps.Marker({
                position: nearbyLocations[i],
                map: map,
                icon: {
                    path: google.maps.SymbolPath.CIRCLE,
                    scale: 10,  // size of circle
                    fillColor: '#F00',  // fill color
                    fillOpacity: 1,  // opacity
                    strokeWeight: 0  // stroke weight
                }
            });
        }
    }
    
    window.onload = initMap;
</script>

</body>
</html>
