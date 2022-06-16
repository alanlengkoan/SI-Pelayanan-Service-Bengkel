<script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.9.2/parsley.min.js"></script>

<script>
    var untukLihatPassword = function() {
        $(document).on('click', '#lihatpassword', function() {
            if ($(this).is(':checked')) {
                $('#inppassword1').attr('type', 'text');
                $('#inppassword2').attr('type', 'text');
            } else {
                $('#inppassword1').attr('type', 'password');
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
    var untukDaftarUser = function() {
        $('#form-add').parsley();

        $(document).on('submit', '#form-add', function(e) {
            e.preventDefault();

            $('#inpnama').attr('required', 'required');
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
                        $('.add').attr('disabled', 'disabled');
                        $('.add').html('Waiting...');
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
                                    window.location = 'login';
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

    (function($) {
        $.fn.inputFilter = function(inputFilter) {
            return this.on("input keydown keyup mousedown mouseup select contextmenu drop", function() {
                if (inputFilter(this.value)) {
                    this.oldValue = this.value;
                    this.oldSelectionStart = this.selectionStart;
                    this.oldSelectionEnd = this.selectionEnd;
                } else if (this.hasOwnProperty("oldValue")) {
                    this.value = this.oldValue;
                    this.setSelectionRange(this.oldSelectionStart, this.oldSelectionEnd);
                } else {
                    this.value = "";
                }
            });
        };
    }(jQuery));

    $(".inputNumber").inputFilter(function(value) {
        return /^-?\d*$/.test(value);
    });

    // eksekusi jquery
    jQuery(document).ready(function() {
        untukLihatPassword;
        untukCekPassword;
        untukDaftarUser;
    });
</script>