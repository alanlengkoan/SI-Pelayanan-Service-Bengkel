<script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.9.2/parsley.min.js"></script>
<script async defer src="https://maps.googleapis.com/maps/api/js?sensor=false&key=AIzaSyB-JpweDJ7_cA9-KiEq-iMjQzlluOemnWo&callback=initMap"></script>

<script>
    var map;
    var mk1;
    var mk2;
    var awal;
    var akhir;

    // untuk datatable
    $('#datatable-default').DataTable();

    // untuk google maps
    function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
            zoom: 14,
            center: new google.maps.LatLng(-5.135399, 119.423790),
            mapTypeId: google.maps.MapTypeId.ROADMAP
        });

        $(document).on("change", "#inpawal", function() {
            var ini = $(this);

            mk1 = new google.maps.Marker({
                position: new google.maps.LatLng(ini.find(':selected').data('lat'), ini.find(':selected').data('long')),
                title: 'Marker',
                map: map,
                draggable: true
            });

            awal = {
                lat: ini.find(':selected').data('lat'),
                lng: ini.find(':selected').data('long')
            };
        });

        $(document).on("change", "#inpakhir", function() {
            var ini = $(this);

            if ($('#inpawal').val().length === 0) {
                swal({
                    title: 'Peringatan',
                    text: 'Silahkan isi awal terlebih dahulu',
                    icon: 'warning',
                    button: 'Okay!',
                }).then((value) => {
                    ini.val('');
                });
            } else {
                mk2 = new google.maps.Marker({
                    position: new google.maps.LatLng(ini.find(':selected').data('lat'), ini.find(':selected').data('long')),
                    title: 'Marker',
                    map: map,
                    draggable: true
                });

                akhir = {
                    lat: ini.find(':selected').data('lat'),
                    lng: ini.find(':selected').data('long')
                };

                new google.maps.Polyline({
                    path: [awal, akhir],
                    map: map,
                    geodesic: true,
                    strokeColor: "#FF0000",
                    strokeOpacity: 1.0,
                    strokeWeight: 2,
                });

                var distanceInMeters = getDistanceBetweenPoints(awal, akhir);

                // jarak per km
                $('#inpjarak').val((distanceInMeters * 0.001));
            }
        });
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

    // untuk tambah data
    var untukTambahData = function() {
        $('#form-add-upd').submit(function(e) {
            e.preventDefault();

            $('#inpawal').attr('required', 'required');
            $('#inpakhir').attr('required', 'required');
            $('#inpjarak').attr('required', 'required');

            if ($('#form-add-upd').parsley().isValid() == true) {
                $.ajax({
                    method: $(this).attr('method'),
                    url: $(this).attr('action'),
                    data: new FormData(this),
                    contentType: false,
                    processData: false,
                    dataType: 'json',
                    beforeSend: function() {
                        $('#add').attr('disabled', 'disabled');
                        $('#add').html('<i class="fa fa-spinner"></i>');
                    },
                    success: function(data) {
                        if (data.type == 'success') {
                            swal({
                                    title: data.title,
                                    text: data.text,
                                    icon: data.type,
                                    button: data.button,
                                })
                                .then((value) => {
                                    location.reload();
                                });
                        } else {
                            swal({
                                    title: data.title,
                                    text: data.text,
                                    icon: data.type,
                                    button: data.button,
                                })
                                .then((value) => {
                                    location.reload();
                                });
                        }
                    }
                })
            }
        });
    }();

    // untuk ambil data id
    var untukAmbilIdData = function() {
        $(document).on('click', '#upd', function() {
            var ini = $(this);

            $.ajax({
                type: "post",
                url: "aksi/?aksi=evaluasi_get",
                dataType: 'json',
                data: {
                    id: ini.data('id'),
                },
                beforeSend: function() {
                    ini.attr('disabled', 'disabled');
                    ini.html('<i class="fa fa-spinner"></i>');
                },
                success: function(data) {
                    $('#inpidevaluasi').val(data.id_evaluasi);
                    $('#inpawal').val(data.awal).change();
                    $('#inpakhir').val(data.akhir).change();
                    $('#inpjarak').val(data.jarak);
                    ini.removeAttr('disabled');
                    ini.html('<i class="fa fa-edit"></i>');
                }
            });
        });
    }();

    // untuk hapus data
    var untukHapusData = function() {
        $(document).on('click', '#del', function() {
            var ini = $(this);

            swal({
                    title: "Apakah Anda yakin ingin menghapusnya?",
                    text: "Data yang telah dihapus tidak dapat dikembalikan!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((del) => {
                    if (del) {
                        $.ajax({
                            type: "post",
                            url: "aksi/?aksi=evaluasi_del",
                            dataType: 'json',
                            data: {
                                id: ini.data('id'),
                            },
                            beforeSend: function() {
                                ini.attr('disabled', 'disabled');
                                ini.html('<i class="fa fa-spinner"></i>');
                            },
                            success: function(data) {
                                if (data.type == 'success') {
                                    swal({
                                            title: data.title,
                                            text: data.text,
                                            icon: data.type,
                                            button: data.button,
                                        })
                                        .then((value) => {
                                            location.reload();
                                        });
                                } else {
                                    swal({
                                            title: data.title,
                                            text: data.text,
                                            icon: data.type,
                                            button: data.button,
                                        })
                                        .then((value) => {
                                            location.reload();
                                        });
                                }
                            }
                        });
                    } else {
                        return false;
                    }
                });
        });
    }();
</script>