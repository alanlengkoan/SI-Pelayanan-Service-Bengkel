<script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.9.2/parsley.min.js"></script>

<script>
    var untukTambahData = function() {
        $('#form-login').parsley();

        $('#form-login').submit(function(e) {
            e.preventDefault();

            $('#username').attr('required', 'required');
            $('#password').attr('required', 'required');

            if ($('#form-login').parsley().isValid() == true) {
                $.ajax({
                    method: 'POST',
                    url: $(this).attr('action'),
                    data: $(this).serialize(),
                    dataType: 'json',
                    beforeSend: function() {
                        $('#masuk').html('Wait');
                    },
                    success: function(data) {
                        if (data.status == true) {
                            window.location = data.link;
                        } else {
                            $('#masuk').html('Login');

                            swal({
                                title: data.title,
                                text: data.text,
                                icon: data.type,
                                button: data.button,
                            });
                        }
                    }
                })
            }
        });
    }();
</script>