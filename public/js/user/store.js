$(document).ready(function (e) {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $("#btn-store-user").click(function(e) {

        e.preventDefault();
        $("#btn-store-user").prop('disabled', true);

        var fd = new FormData();
        fd.append( 'name', $("input[name=name]").val() );
        fd.append( 'email', $("input[name=email]").val() );
        fd.append( 'password', $("input[name=password]").val() );

        $.ajax({
            url: $("input[name=route_api_user_store]").val(),
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

                $("#btn-store-user").prop('disabled', false);
            },
            error: function (xhr, status, error) {
                var err = eval("(" + xhr.responseText + ")");

                $("#btn-store-user").prop('disabled', false);

                Swal.fire({
                    html: '<strong>Oops!</strong> ' + err.header.message
                });
            }
        });
    });
});