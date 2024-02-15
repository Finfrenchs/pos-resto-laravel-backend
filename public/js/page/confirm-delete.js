$(document).ready(function () {
    $('.confirm-delete').on('click', function (e) {
        e.preventDefault();
        var form = $(this).closest('form');
        var name = $(this).data('name');
        var redirectUrl = $(this).data('redirect');

        swal({
            title: "Are you sure?",
            text: "You are going to delete '" + name + "'. This action cannot be undone.",
            icon: "warning",
            buttons: ["Cancel", "Yes, delete it!"],
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    url: form.attr('action'),
                    type: 'POST',
                    data: form.serialize() + '&_method=DELETE', // Tambahkan _method=DELETE
                    success: function (response) {
                // Memeriksa apakah respons berisi kunci 'success'
                if (response.success) {
                    // Tampilkan popup sukses
                    swal("Success!", response.message, "success").then(() => {
                        // Redirect ke halaman user index
                        window.location.href = redirectUrl;
                    });
                } else {
                    // Tampilkan pesan kesalahan jika respons tidak berisi kunci 'success'
                    swal("Oops!", response.message, "error");
                }
            },
            error: function (xhr, status, error) {
                // Tampilkan pesan kesalahan jika terjadi kesalahan pada permintaan AJAX
                swal("Oops!", "Something went wrong!", "error");
                console.error(xhr.responseText);
            }
        });
            } else {
                swal("The user is safe!");
            }
        });
    });
});
