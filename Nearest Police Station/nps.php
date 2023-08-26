<!DOCTYPE html>
<html>
<head>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBfwsEOktCsEJZf7-21qghK_3KEZM38ZpA&libraries=places"></script>
    <style>
    .bottom-container {
        position: fixed;
        bottom: 0;
        left: 0;
        width: 100%;
        background-color: rgba(0,0,0,0.7); 
        text-align: right; 
        padding: 10px; 
        z-index: 1000;
    }

    .btn-fir {
        padding: 20px 40px; 
        background-color: #ff5722;
        color: #fff;
        width: 300px;
        margin-right: 50px;
        height: 100px;
        border: none;
        border-radius: 50px;
        font-size: 40px; 
        cursor: pointer;
        transition: background-color 0.3s;
    }

    .btn-fir:hover {
        background-color: #e64a19;
    }
    </style>
</head>
<body>

<div id="map" style="height:1900px;width:980px;"></div>

<script>
    function initMap() {
        const myLocation = {lat: 23.7978829, lng: 90.44971};
        const policeStationLocation = {lat: 23.7975500, lng: 90.423995};

        const map = new google.maps.Map(document.getElementById('map'), {
            center: myLocation,
            zoom: 15
        });

        // Create a red marker for My Location
        new google.maps.Marker({
            position: myLocation,
            map: map,
            title: 'My Location',
            icon: 'http://maps.google.com/mapfiles/ms/icons/red-dot.png'
        });

        // Create a circle marker for Police Station
        new google.maps.Marker({
            position: policeStationLocation,
            map: map,
            title: 'Police Station',
            icon: {
                path: google.maps.SymbolPath.CIRCLE,
                scale: 8, // size
                strokeColor: '#00F' // color
            }
        });
    }

    window.onload = initMap;
</script>

<div class="bottom-container">
    <a href="../Nearest Police Station/Fir.html"><button class="btn-fir">FIR</button></a>
</div>

</body>
</html>
