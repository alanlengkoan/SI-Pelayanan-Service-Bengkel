<script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.9.2/parsley.min.js"></script>
<script async defer src="https://maps.googleapis.com/maps/api/js?sensor=false&key=AIzaSyB-JpweDJ7_cA9-KiEq-iMjQzlluOemnWo&callback=initMap"></script>


<script>
    // untuk datatable
    $('#datatable-default').DataTable();

    // untuk google maps
    function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 15,
            center: new google.maps.LatLng(-5.135399, 119.423790),
            mapTypeId: google.maps.MapTypeId.ROADMAP
        });

        var marker = new google.maps.Marker({
            position: new google.maps.LatLng(-5.135399, 119.423790),
            map: map,
            title: 'Click to zoom',
            draggable: true
        });


        marker.addListener('drag', handleEvent);
        marker.addListener('dragend', handleEvent);

        var infowindow = new google.maps.InfoWindow({
            content: '<h4>Drag untuk pindah lokasi</h4>'
        });

        infowindow.open(map, marker);
    }

    // untuk update value latitude & longitude
    function handleEvent(event) {
        document.getElementById('inplatitude').value = event.latLng.lat();
        document.getElementById('inplongitude').value = event.latLng.lng();
    }

    // untuk tambah data
    var untukTambahData = function() {
        $('#form-add-upd').submit(function(e) {
            e.preventDefault();

            $('#inpnode').attr('required', 'required');
            $('#inpnama').attr('required', 'required');
            $('#inpalamat').attr('required', 'required');
            $('#inplatitude').attr('required', 'required');
            $('#inplongitude').attr('required', 'required');
            $('#inpgambar').attr('required', 'required');

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
                        $('#add').html('<i class="fa fa-spinner"></i> Waiting...');
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
                url: "aksi/?aksi=bengkel_get",
                dataType: 'json',
                data: {
                    id: ini.data('id')
                },
                beforeSend: function() {
                    ini.attr('disabled', 'disabled');
                    ini.html('<i class="fa fa-spinner"></i> Waiting...');
                },
                success: function(data) {
                    var lokasi_gambar = "../../assets/uploads/pohon/" + data.gambar;
                    $('#lihat_gambar').html(`<img src="` + lokasi_gambar + `" width="100" heigth="100" />`);
                    $('#centang_gambar').html(`<input type="checkbox" name="ubah_gambar" id="ubah_gambar" /> Ubah gambar!`);

                    $('#inpidbengkel').val(data.id_bengkel);
                    $('#inpnode').val(data.node);
                    $('#inpnama').val(data.nama);
                    $('#inpalamat').val(data.alamat);
                    $('#inplatitude').val(data.latitude);
                    $('#inplongitude').val(data.longitude);
                    $('#inpgambar').attr('disabled', 'disabled');
                    $('#inpgambar').removeAttr('id');

                    ini.removeAttr('disabled');
                    ini.html('<i class="fa fa-edit"></i>');
                }
            });
        });
    }();

    // untuk ubah gambar
    var untukUbahGambar = function() {
        $(document).on('click', '#ubah_gambar', function() {
            var ini = $(this);
            if (ini.is(':checked')) {
                $("input[name*='inpgambar']").removeAttr('disabled');
                $("input[name*='inpgambar']").attr('id', 'inpgambar');
            } else {
                $("input[name*='inpgambar']").attr('disabled', 'disabled');
                $("input[name*='inpgambar']").removeAttr('id');
                $("input[name*='inpgambar']").removeAttr('required');
                ini.parent().parent().find('#error').empty();
            }
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
                            url: "aksi/?aksi=bengkel_del",
                            dataType: 'json',
                            data: {
                                id: ini.data('id')
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