$(document).ready(function (e) {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });
    let urldatatable = $('#route-datatable').val();
    let table = $("#user-datatable").DataTable({
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
            data: "name"
        },
        {
            data: null,
            orderable: false,
            searchable: false,
            render: function (data, type, row, meta) {
                // Cek jika ID bukan 1, tampilkan tombol Edit dan Hapus
                if (row.id !== 1) {
                    return `
                    <button class="btn btn-sm btn-primary edit-role" data-id="${row.id}" data-name="${row.name}">Edit</button>
                    <button class="btn btn-sm btn-danger delete-role" data-id="${row.id}">Hapus</button>
                `;
                } else {
                    // Jika ID 1, kosongkan kolom
                    return '';
                }
            }
        }

        ],
    });

    $('#user-datatable').on('click', '.edit-role', function () {
        var id = $(this).data('id');
        var name = $(this).data('name');
        // Swal.fire(`Edit role dengan ID: ${id}`);
        $('#id').val(id); // Isi input dengan ID
        $('#namaEdit').val(name); // Isi input dengan nama
        $('#modalUpdate').modal('show');
    });

    $('#simpan-role').on('click', function () {
        let urlsimpan = $('#route-simpan-role').val();
        let nama = $('#nama').val();
        let csrfToken = $('meta[name="csrf-token"]').attr('content');


        if (nama === '') {
            Swal.fire('Peringatan!', 'Nama Role tidak boleh kosong.', 'warning');
            return;
        }

        $.ajax({
            url: urlsimpan, // Sesuaikan dengan route Anda
            type: "POST",
            headers: {
                'X-CSRF-TOKEN': csrfToken
            },
            data: {
                name: nama
            },
            success: function (response) {
                Swal.fire('Berhasil!', 'Role berhasil disimpan.', 'success');
                $('#nama').val(''); // Kosongkan input
                $('#modal-user-change-password').modal('hide');
                table.ajax.reload(); // Refresh DataTable
            },
            error: function (xhr, status, error) {
                Swal.fire('Gagal!', 'Terjadi kesalahan saat menyimpan data.', 'error');
            }
        });
    });

    $('#update-role').on('click', function () {
        let urlupdate = $('#route-update-role').val();
        let namaedit = $('#namaEdit').val();
        let id = $('#id').val();
        let csrfToken = $('meta[name="csrf-token"]').attr('content');


        if (namaedit === '') {
            Swal.fire('Peringatan!', 'Nama Role tidak boleh kosong.', 'warning');
            return;
        }

        $.ajax({
            url: urlupdate, // Sesuaikan dengan route Anda
            type: "POST",
            headers: {
                'X-CSRF-TOKEN': csrfToken
            },
            data: {
                name: namaedit,
                id: id
            },
            success: function (response) {
                Swal.fire('Berhasil!', 'Role berhasil diupdate.', 'success');
                // $('#namaEdit').val(''); // Kosongkan input
                $('#modalUpdate').modal('hide');
                table.ajax.reload(); // Refresh DataTable
            },
            error: function (xhr, status, error) {
                Swal.fire('Gagal!', 'Terjadi kesalahan saat menyimpan data.', 'error');
            }
        });
    });

    $('#user-datatable').on('click', '.delete-role', function () {
        var idDelete = $(this).data('id'); // Ambil ID dari atribut data-id
    
        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: "Data ini akan dihapus secara permanen!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                let url = routes.deleteRole.replace(':id', idDelete);
                $.ajax({
                    url: url, // Sesuaikan dengan route Anda
                    type: 'get', // Gunakan metode POST
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function (response) {
                        Swal.fire(
                            'Dihapus!',
                            'Data berhasil dihapus.',
                            'success'
                        );
                        table.ajax.reload(); // Refresh DataTable
                    },
                    error: function (xhr, status, error) {
                        Swal.fire(
                            'Gagal!',
                            'Terjadi kesalahan saat menghapus data.',
                            'error'
                        );
                    }
                });
                

                // alert(id);
            }
        });
    });
    


});