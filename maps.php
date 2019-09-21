<?php
require 'config.php';
$sql = "SELECT caches.*, logs.userid, logs.isFound FROM caches LEFT JOIN logs ON caches.cacheid = logs.cacheid";
$query = $db->query($sql);
$caches = $query->fetchAll(PDO:: FETCH_ASSOC);
if(isset($_SESSION['id'])){
    $user = $_SESSION['id'];
}
else{
    $user = false;
}
require 'header.php';
?>
<main>
    <div class="map-container">
        <div class="map-cache-info">
            <div>
                <h1>Dit is de kaart</h1>
                <a href="informatie.php">Klik hier voor meer informatie.</a>
            </div>
            <div class="distance-to">
                <p id="distance-to">Klik op een cache om de afstand te zien.</p>
            </div>
        </div>
        <div class="maps-main">
            <div id="googleMap" style="width:100%;height:826px;"></div>
            <script>
                function myMap() {
                    let mapProp= {
                        center:new google.maps.LatLng(51.508742,-0.120850),
                        zoom:5,
                    };
                    let map = new google.maps.Map(document.getElementById("googleMap"),mapProp);
                    let currentlocation = null;

                    <?php
                    $js_caches = json_encode($caches);
                    $user = json_encode($user);
                    echo "let jscaches = ". $js_caches . ";\n";
                    echo "let userid = ". $user . ";\n";
                    ?>
                    let marker = [];

                    navigator.geolocation.getCurrentPosition(success, error);

                    function success(pos) {
                        let crd = pos.coords;
                        currentlocation = {lat: crd.latitude, lng: crd.longitude};
                        console.log(currentlocation);

                        let usericon = "http://maps.google.com/mapfiles/ms/icons/blue-dot.png"

                        let userlocation = new google.maps.Marker({
                            position: currentlocation,
                            map: map,
                            title: 'Your current location',
                            icon: {
                                url: usericon
                            }
                        });
                    }

                    function error(err) {
                        console.warn(`ERROR(${err.code}): ${err.message}`);
                    }

                    let rad = function(x) {
                        return x * Math.PI / 180;
                    };

                    let getDistance = function(p1, p2) {
                        let R = 6378137; // Earth’s mean radius in meter
                        let dLat = rad(p2.lat - p1.lat);
                        let dLong = rad(p2.lng - p1.lng);
                        let a = Math.sin(dLat / 2) * Math.sin(dLat / 2) +
                            Math.cos(rad(p1.lat)) * Math.cos(rad(p2.lat)) *
                            Math.sin(dLong / 2) * Math.sin(dLong / 2);
                        let c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));
                        let d = R * c;
                        return d; // returns the distance in meter
                    };

                    for (let i = 0; i < jscaches.length; i++) {
                        let latitude = parseFloat(jscaches[i].coordinateY);
                        let longitude = parseFloat(jscaches[i].coordinateX);
                        let myLatLng = {lat: latitude, lng: longitude};

                        let icon;
                        let name;
                        if(jscaches[i].userid == userid && jscaches[i].isFound == true){
                            icon = "http://maps.google.com/mapfiles/ms/icons/green-dot.png";
                            name = "Gevonden: ";
                        }
                        else if(jscaches[i].userid == userid && jscaches[i].isFound == false){
                            icon = "http://maps.google.com/mapfiles/ms/icons/orange-dot.png";
                            name = "Niet gevonden: ";
                        }
                        else{
                            icon = "http://maps.google.com/mapfiles/ms/icons/red-dot.png";
                            name = "";
                        }
                        marker[i] = new google.maps.Marker({
                            position: myLatLng,
                            map: map,
                            description: jscaches[i].description,
                            title: name + jscaches[i].cachename,
                            id: i,
                            icon: {
                                url: icon
                            }

                        });

                        marker[i].addListener('click', function () {
                            let dt = document.getElementById("distance-to");
                            let distance = (getDistance(myLatLng, currentlocation) / 1000);
                            distance = distance.toFixed(2);
                            dt.innerHTML = "Afstand tot deze cache: " + distance + " kilometer";

                        });

                        marker[i].addListener('dblclick', function () {
                            window.location = "cache-detail.php?cacheid=" + jscaches[i].cacheid;
                        });
                    }

                }
            </script>
            <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBkT7PLWK2NvHi-oPt7iPf-wLRix53NUnQ&callback=myMap"></script>
        </div>
    </div>
</main>
<?php require 'footer.php'?>

