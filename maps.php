<?php
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>maps</title>
</head>
<body>
        <h1>Maps</h1>

        <div id="googleMap" style="width:100%;height:600px;"></div>

        <script>
            function myMap() {
                var mapProp= {
                    center:new google.maps.LatLng(51.508742,-0.120850),
                    zoom:5,
                };
                var map = new google.maps.Map(document.getElementById("googleMap"),mapProp);
            }
        </script>

        <script src="https://maps.googleapis.com/maps/api/js?key=key&callback=myMap"></script>
</body>


</html>
