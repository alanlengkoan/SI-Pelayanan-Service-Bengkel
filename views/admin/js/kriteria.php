<script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.9.2/parsley.min.js"></script>

<script>
    // untuk datatable
    $('#datatable-default').DataTable();
    
    // untuk tambah data
    var untukTambahData = function() {
        $('#form-add').parsley();

        $('#form-add').submit(function(e) {
            e.preventDefault();

            $('#inpkriteria').attr('required', 'required');

            if ($('#form-add').parsley().isValid() == true) {
                $.ajax({
                    method: 'POST',
                    url: $(this).attr('action'),
                    data: $(this).serialize(),
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
                url: "aksi/?aksi=kriteria_get",
                dataType: 'json',
                data: {
                    id: ini.data('id')
                },
                beforeSend: function() {
                    ini.attr('disabled', 'disabled');
                    ini.html('<i class="fa fa-spinner"></i> Waiting...');
                },
                success: function(data) {
                    $('form').attr('action', 'aksi/?aksi=kriteria_upd');
                    $('form').attr('id', 'form-upd');
                    $('#inpidatribut').attr('value', data.id_atribut);
                    $('#inpkriteria').attr('value', data.atribut);
                    $('#add').html('<i class="fa fa-edit"></i> Upd');
                    ini.removeAttr('disabled');
                    ini.html('<i class="fa fa-edit"></i> Ubah');
                }
            });
        });
    }();

    // untuk ubah data
    var untukUbahData = function() {
        $('#form-upd').parsley();

        $(document).on('submit', '#form-upd', function(e) {
            e.preventDefault();

            $('#inpkriteria').attr('required', 'required');

            if ($('#form-upd').parsley().isValid() == true) {
                $.ajax({
                    method: 'POST',
                    url: $(this).attr('action'),
                    data: $(this).serialize(),
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
                            url: "aksi/?aksi=kriteria_del",
                            dataType: 'json',
                            data: {
                                id: ini.data('id')
                            },
                            beforeSend: function() {
                                ini.attr('disabled', 'disabled');
                                ini.html('<i class="fa fa-spinner"></i> Waiting...');
                            },
                            success: function(data) {
                                console.log(data);

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

    // eksekusi jquery
    jQuery(document).ready(function() {
        untukTambahData;
        untukAmbilIdData;
        untukUbahData;
        untukHapusData;
    });
</script>