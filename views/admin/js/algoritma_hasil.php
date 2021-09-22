<script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.9.2/parsley.min.js"></script>
<script async defer src="https://maps.googleapis.com/maps/api/js?sensor=false&key=AIzaSyB-JpweDJ7_cA9-KiEq-iMjQzlluOemnWo&callback=initMap"></script>

<script>
    var map;
    var mk1;
    var mk2;
    var awal;
    var akhir;

    // untuk google maps
    function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
            zoom: 14,
            center: new google.maps.LatLng(-5.135399, 119.423790),
            mapTypeId: google.maps.MapTypeId.ROADMAP
        });

        mk1 = new google.maps.Marker({
            position: new google.maps.LatLng(<?= $_POST['lat'] ?>, <?= $_POST['lng'] ?>),
            title: 'Marker',
            map: map,
            draggable: true
        });

        awal = {
            lat: <?= $_POST['lat'] ?>,
            lng: <?= $_POST['lng'] ?>,
        };

        mk2 = new google.maps.Marker({
            position: new google.maps.LatLng(<?= $row->latitude ?>, <?= $row->longitude ?>),
            title: 'Marker',
            map: map,
            draggable: true
        });

        akhir = {
            lat: <?= $row->latitude ?>,
            lng: <?= $row->longitude ?>
        };

        new google.maps.Polyline({
            path: [awal, akhir],
            map: map,
            geodesic: true,
            strokeColor: "#FF0000",
            strokeOpacity: 1.0,
            strokeWeight: 2,
        });
    }
</script>