$(document).ready(function (e) {
    $('#user-datatable tbody').on('click', 'td a.btn-warning', function () {
        var email = $(this).attr('data-email');
        $("input[name='email']").val(email);
        $('#modal-user-change-password').modal('show');
    });

    $("#btn-user-reset-password").click( function(e) {
        e.preventDefault();
        $("#btn-user-reset-password").prop('disabled', true);

        var fd = new FormData();
        fd.append( 'email', $("input[name=email]").val() );
        fd.append( 'password', $("input[name=password]").val() );

        $.ajax({
            url: $("input[name=route_api_user_reset_password]").val(),
            type: "POST",
            processData: false,
            contentType: false,
            data: fd,
            success: function(response) {
                Swal.fire(
                    'Good job!',
                    response.header.message,
                    'success'
                )

                $("#btn-user-reset-password").prop('disabled', false);
            },
            error: function (xhr, status, error) {
                var err = eval("(" + xhr.responseText + ")");
                $("#btn-user-reset-password").prop('disabled', false);
                Swal.fire({
                    html: '<strong>Oops!</strong> ' + err.header.message
                });
            }
        });
    });
});