<?php
require 'config.php';
$sql = "SELECT * FROM caches";
$query = $db->query($sql);
$caches = $query->fetchAll(PDO:: FETCH_ASSOC);
$length = count($caches);

require 'header.php';
?>
<main>
    <h1>Maps</h1>

    <div id="googleMap" style="width:100%;height:600px;"></div>

    <script>
        function myMap() {
            let mapProp= {
                center:new google.maps.LatLng(51.508742,-0.120850),
                zoom:5,
            };
            let map = new google.maps.Map(document.getElementById("googleMap"),mapProp);

            let length = <?php echo $length?>;

            <?php
            $js_caches = json_encode($caches);
            echo "let jscaches = ". $js_caches . ";\n";
            ?>
            let marker = [];

            for (let i = 0; i < jscaches.length; i++) {
                let latitude = parseFloat(jscaches[i].coordinateY);
                let longitude = parseFloat(jscaches[i].coordinateX);
                let myLatLng = {lat: latitude, lng: longitude};
                marker[i] = new google.maps.Marker({
                    position: myLatLng,
                    map: map,
                    description: jscaches[i].description,
                    title: jscaches[i].cachename,
                    id: i

                });

            }

        }
    </script>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBkT7PLWK2NvHi-oPt7iPf-wLRix53NUnQ&callback=myMap"></script>
</main>
<?php require 'footer.php'?>

