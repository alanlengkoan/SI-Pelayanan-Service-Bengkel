<script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.9.2/parsley.min.js"></script>
<script async defer src="https://maps.googleapis.com/maps/api/js?sensor=false&key=AIzaSyB-JpweDJ7_cA9-KiEq-iMjQzlluOemnWo&callback=initMap"></script>

<script>
    var map, mk1, mk2, awal, akhir;

    let latitude_users = $('#latitude_users');
    let longitude_users = $('#longitude_users');
    let latitude_bengkel = $('#latitude_bengkel');
    let longitude_bengkel = $('#longitude_bengkel');

    // untuk datatable
    $('#datatable-default').DataTable();

    // untuk google maps
    function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
            zoom: 14,
            center: new google.maps.LatLng(-5.135399, 119.423790),
            mapTypeId: google.maps.MapTypeId.ROADMAP
        });

        mk1 = new google.maps.Marker({
            position: new google.maps.LatLng(latitude_users.val(), longitude_users.val()),
            title: 'Marker',
            map: map,
            draggable: true
        });

        awal = {
            lat: parseFloat(latitude_users.val()),
            lng: parseFloat(longitude_users.val())
        };

        mk2 = new google.maps.Marker({
            position: new google.maps.LatLng(latitude_bengkel.val(), longitude_bengkel.val()),
            title: 'Marker',
            map: map,
            draggable: true
        });

        akhir = {
            lat: parseFloat(latitude_bengkel.val()),
            lng: parseFloat(longitude_bengkel.val())
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