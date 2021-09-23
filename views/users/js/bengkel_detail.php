<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB-JpweDJ7_cA9-KiEq-iMjQzlluOemnWo&language=id&region=ID&callback=initMap"></script>

<script>
    let latitude = $('#latitude');
    let longitude = $('#longitude');
    let nama = $('#nama');

    function initMap(response) {
        let infoWindow = new google.maps.InfoWindow();

        let map = new google.maps.Map(document.getElementById('map'), {
            zoom: 15,
            center: new google.maps.LatLng(latitude.val(), longitude.val()),
            mapTypeId: google.maps.MapTypeId.ROADMAP
        });

        var marker = new google.maps.Marker({
            position: new google.maps.LatLng(latitude.val(), longitude.val()),
            map: map,
            title: nama.val(),
            animation: google.maps.Animation.DROP,
            icon: '../../assets/img/pin.png',
        });
    }
</script>