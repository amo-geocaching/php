<?php require 'header.php'?>
<main>
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

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBkT7PLWK2NvHi-oPt7iPf-wLRix53NUnQ&callback=myMap"></script>
</main>
<?php require 'footer.php'?>

