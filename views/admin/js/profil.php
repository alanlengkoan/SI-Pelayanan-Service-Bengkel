<script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.9.2/parsley.min.js"></script>

<script>
    // untuk tambah data
    var untukUbahPassword = function() {
        $('#ubahpassword').click(function() {
            if ($(this).is(':checked')) {
                $('#addpassword').html(`
                <div id="showpassword">
                    <div class="form-group">
                        <label class="col-sm-4 control-label">Masukkan password baru *</label>
                        <div class="col-sm-8">
                            <input type="password" name="inppassword1" id="inppassword1" class="form-control" placeholder="Masukkan password baru">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label">Ulangi password *</label>
                        <div class="col-sm-8">
                            <input type="password" name="inppassword2" id="inppassword2" class="form-control" placeholder="Ulangi password">
                            <div id="pesan"></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label"></label>
                        <div class="col-sm-8">
                            <div class="checkbox-custom checkbox-default">
                                <input type="checkbox" name="lihatpassword" id="lihatpassword" />
                                <label for="lihatpassword">Lihat Password</label>
                            </div>
                        </div>
                    </div>
                </div>`);
            } else {
                $('#showpassword').remove();
            }
        });

        $(document).on('click', '#lihatpassword', function() {
            if ($(this).is(':checked')) {
                $('#inppassword2').attr('type', 'text');
            } else {
                $('#inppassword2').attr('type', 'password');
            }
        });
    }();

    // untuk cek kesamaan passwor
    var untukCekPassword = function() {
        $(document).on('keyup', '#inppassword2', function() {
            var passnm = $('#inppassword1').val();
            var passwd = $(this).val();

            if (passnm != passwd) {
                $('#pesan').html('Password tidak sesuai!');
                return false;
            } else {
                $('#pesan').html('Password sesuai!');
                return true;
            }
        })
    }();

    // untuk ubah data
    var untukUbahData = function() {
        $('#form-add').parsley();

        $(document).on('submit', '#form-add', function(e) {
            e.preventDefault();

            $('#inpnama').attr('required', 'required');
            $('#inpemail').attr('required', 'required');
            $('#inpusername').attr('required', 'required');
            $('#inppassword1').attr('required', 'required');
            $('#inppassword2').attr('required', 'required');

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
                })
            }
        });
    }();

    // eksekusi jquery
    jQuery(document).ready(function() {
        untukUbahPassword;
        untukUbahData;
    });
</script>