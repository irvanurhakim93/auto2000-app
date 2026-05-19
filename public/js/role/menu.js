$(document).ready(function (e) {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });
    let urldatatable = $('#route-datatable-aksesmenu').val();
    let table2 = $("#table-akses-menu").DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            "url": urldatatable,
            error: function (xhr, error, code) {
                var err = eval("(" + xhr.responseText + ")");
                Swal.fire({
                    html: '<strong>Oops!</strong> ' + err.header.message
                });
            }
        },
        columns: [{
            data: "role"
        },
        {
            data: "akses_menu"
        },
        {
            data: "action",
            orderable: false,
            searchable: false,

        }

        ],
    });

    
});

