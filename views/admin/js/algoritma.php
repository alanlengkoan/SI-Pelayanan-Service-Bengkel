<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB-JpweDJ7_cA9-KiEq-iMjQzlluOemnWo&language=id&region=ID&callback=initMap"></script>

<script>
    let map, infoWindow;

    $(document).ready(function() {
        $.ajax({
            type: 'GET',
            url: 'aksi/?aksi=bengkel',
            dataType: 'json',
            beforeSend: function() {
                $('#add').attr('disabled', 'disabled');
                $('#add').html('<i class="fa fa-spinner"></i> Waiting...');
            },
            success: function(response) {
                initMap(response)
            }
        })
    });

    function initMap(response) {
        infoWindow = new google.maps.InfoWindow();

        map = new google.maps.Map(document.getElementById('map'), {
            zoom: 15,
            center: new google.maps.LatLng(-5.135399, 119.423790),
            mapTypeId: google.maps.MapTypeId.ROADMAP
        });


        $.each(response, function(key, value) {
            var marker = new google.maps.Marker({
                position: new google.maps.LatLng(value.latitude, value.longitude),
                map: map,
                title: value.nama,
                animation: google.maps.Animation.DROP,
                icon: '../../assets/img/pin.png',
            });

            marker.addListener('click', function() {
                infoWindow.setContent(`<h4 class="center">` + value.nama + `</h4><p><b>` + value.alamat + `</b></p><p class="center"><a href="" class="btn btn-primary btn-sm">Lihat Bengkel</a></p>`);
                infoWindow.open(map, marker);
            });
        });

        // Try HTML5 geolocation.
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function(position) {
                const pos = {
                    lat: position.coords.latitude,
                    lng: position.coords.longitude
                };

                document.getElementById("lat").value = position.coords.latitude;
                document.getElementById("lng").value = position.coords.longitude;

                infoWindow.setPosition(pos);
                infoWindow.setContent("Lokasi ditemukan.");
                infoWindow.open(map);
                map.setCenter(pos);

            }, function() {
                handleLocationError(true, infoWindow, map.getCenter());
            });
        } else {
            // apa bila browser tidak support geolocation
            handleLocationError(false, infoWindow, map.getCenter());
        }
    }

    // untuk mengetahui error pada google maps
    function showError(error) {
        switch (error.code) {
            case error.PERMISSION_DENIED:
                view.innerHTML = "Yah, mau deteksi lokasi tapi ga boleh :("
                break;
            case error.POSITION_UNAVAILABLE:
                view.innerHTML = "Yah, Info lokasimu nggak bisa ditemukan nih"
                break;
            case error.TIMEOUT:
                view.innerHTML = "Requestnya timeout bro"
                break;
            case error.UNKNOWN_ERROR:
                view.innerHTML = "An unknown error occurred."
                break;
        }
    }

    // untuk menampilkan error pada geolocation
    function handleLocationError(browserHasGeolocation, infoWindow, pos) {
        infoWindow.setPosition(pos);
        infoWindow.setContent(browserHasGeolocation ?
            'Error: The Geolocation service failed.' :
            'Error: Your browser doesn\'t support geolocation.');
        infoWindow.open(map);
    }
</script>