$(document).ready(function (e) {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    $("#user-datatable").DataTable({
        processing: true,
        serverSide: true,
        ajax : {
            "url": $("input[name=route_api_user_datatable_index]").val(),
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
            {
                data: "action",
                orderable: false,
                searching: false
            }
        ],
    });
});