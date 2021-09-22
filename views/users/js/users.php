    <script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.9.2/parsley.min.js"></script>

    <script>
        // untuk datatable
        $('#datatable-default').dataTable();

        // untuk status data
        var untukStatusData = function() {
            $(document).on('click', '#sts', function() {
                var id = $(this).data('id');
                var sts = $(this).data('sts');

                $.ajax({
                    type: "post",
                    url: "aksi/?aksi=profil_status",
                    dataType: 'json',
                    data: {
                        id: id,
                        status: sts
                    },
                    success: function(data) {
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
                });
            });
        }();
    </script>