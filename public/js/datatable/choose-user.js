$(document).ready(function (e) {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    $("#user-datatable").DataTable({
        processing: true,
        serverSide: true,
        createdRow: function (row, data) {
            $(row).attr('data-email', data.email)
            $(row).attr('data-name', data.name)
        },
        ajax : {
            "url": $("input[name=route_api_datatable_user]").val(),
            error: function (xhr, error, code)
            {
			    var err = eval("(" + xhr.responseText + ")");
                Swal.fire({
                    html: '<strong>Oops!</strong> ' + err.header.message
                });
            }
        },
        columns: [
            { data: "name" },
            { data: "email" },
        ],
    });

    $('#user-datatable tbody').on('click', 'tr', function () {
        $('input[name="email"]').val($(this).data("email"));
        $('input[name="name"]').val($(this).data("name"));
        $(".modal").modal('hide');
    });

});