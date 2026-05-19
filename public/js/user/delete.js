$(document).ready(function (e) {
    $('#user-datatable tbody').on('click', 'td a.btn-danger', function () {
        var urlDelete = $(this).attr('data-url');
        Swal.fire({
            title:"Are you sure?",
            text:"You want delete this!",
            icon:"warning",
            showCancelButton:!0,
            confirmButtonColor:"#34c38f",
            cancelButtonColor:"#f46a6a",
            confirmButtonText:"Yes, delete it!"
        }).then(function(t) {
            if (true == t.isConfirmed) {
                $.ajax({
                    url: urlDelete,
                    type: "DELETE",
                    success: function(response) {
                        Swal.fire(
                            'Good job!',
                            response.header.message,
                            'success'
                        )
                        $('#user-datatable').DataTable().ajax.reload();
                    },
                    error: function (xhr, status, error) {
                        var err = eval("(" + xhr.responseText + ")");
                        Swal.fire({
                            html: '<strong>Oops!</strong> ' + err.header.message
                        });
                    }
                });
            }
        });
    });
});