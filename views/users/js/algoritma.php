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

        var icon = {
            url: "../../assets/img/pin.png",
            scaledSize: new google.maps.Size(30, 45),
            origin: new google.maps.Point(0, 0),
        };

        let tujuan = [];
        $.each(response, function(key, value) {
            var marker = new google.maps.Marker({
                position: new google.maps.LatLng(value.latitude, value.longitude),
                map: map,
                title: value.nama,
                animation: google.maps.Animation.DROP,
                icon: icon,
            });

            const titik = {
                lat: value.latitude,
                lng: value.longitude
            };

            tujuan.push(titik);

            marker.addListener('click', function() {
                infoWindow.setContent(`<h4 class="center">` + value.nama + `</h4><p><b>` + value.alamat + `</b></p><p class="center"><a href="bengkel_detail&id_bengkel=` + value.id_bengkel + `" class="btn btn-primary btn-sm">Lihat Bengkel</a></p>`);
                infoWindow.open(map, marker);
            });
        });

        // Try HTML5 geolocation.
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function(position) {
                const lokasi = {
                    lat: position.coords.latitude,
                    lng: position.coords.longitude
                };

                document.getElementById("lat").value = position.coords.latitude;
                document.getElementById("lng").value = position.coords.longitude;

                var html = [];
                var name = 1;
                let go = [];
                $.each(tujuan, function(key, value) {
                    const titik = {
                        lat: value.lat,
                        lng: value.lng
                    };

                    html.push(`<input type="hidden" name="` + name++ + `" value="` + (getDistanceBetweenPoints(lokasi, titik) * 0.001) + `" />`);
                    go.push(lokasi, titik);
                });

                $('#tujuan').html(html);

                new google.maps.Polyline({
                    path: go,
                    map: map,
                    geodesic: true,
                    strokeColor: "#FF0000",
                    strokeOpacity: 1.0,
                    strokeWeight: 2,
                });

                infoWindow.setPosition(lokasi);
                infoWindow.setContent("Lokasi ditemukan.");
                infoWindow.open(map);
                map.setCenter(lokasi);

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

    function degreesToRadians(degrees) {
        return degrees * Math.PI / 180;
    }

    function getDistanceBetweenPoints(start, finish) {
        var lat1 = start.lat;
        var lng1 = start.lng;
        var lat2 = finish.lat;
        var lng2 = finish.lng;

        let R = 6378137;
        let dLat = degreesToRadians(lat2 - lat1);
        let dLong = degreesToRadians(lng2 - lng1);
        let a = Math.sin(dLat / 2) *
            Math.sin(dLat / 2) +
            Math.cos(degreesToRadians(lat1)) *
            Math.cos(degreesToRadians(lat1)) *
            Math.sin(dLong / 2) *
            Math.sin(dLong / 2);

        let c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));
        let distance = R * c;

        return distance;
    }
</script>