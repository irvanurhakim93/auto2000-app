let urlselect = $('#urlselectMenu').val();
let urlselect2 = $('#urlselectRole').val();
$('.select2-multiple').select2({
    placeholder: "Pilih opsi",
    allowClear: true,
    dropdownParent: $('#modalAksesMenu'),
    ajax: {
        url: urlselect, // Ganti dengan URL endpoint Anda
        type: 'GET',
        dataType: 'json',
        delay: 250, // Menunggu 250ms sebelum request
        data: function (params) {
            return {
                q: params.term // Mengirimkan query pencarian
            };
        },
        processResults: function (data) {
            // Format data untuk Select2
            return {
                results: data.map(item => ({
                    id: item.id,
                    text: item.name
                }))
            };
        },
        cache: true
    } // Ganti dengan ID modal kamu
});
$('.select2-multiple2').select2({
    placeholder: "-- Pilih --",
    allowClear: true,
    dropdownParent: $('#modalAksesMenu'),
    ajax: {
        url: urlselect2, // Ganti dengan URL endpoint Anda
        type: 'GET',
        dataType: 'json',
        delay: 250, // Menunggu 250ms sebelum request
        data: function (params) {
            return {
                q: params.term // Mengirimkan query pencarian
            };
        },
        processResults: function (data) {
            // Format data untuk Select2
            return {
                results: data.map(item => ({
                    id: item.id,
                    text: item.name
                }))
            };
        },
        cache: true
    } // Ganti dengan ID modal kamu
});
$(document).on('click', '#simpan-akses-menu', function () {
    let urlsimpan2 = $('#route-simpan-akses-menu').val();
    const menu = $('#menu_').val();
    const role = $('#role_').val();
    let csrfTokenMenu = $('meta[name="csrf-token"]').attr('content');


    if (!menu || !role) {
        Swal.fire('Peringatan!', 'Nama Role tidak boleh kosong.', 'warning');
        return;
    }

    $.ajax({
        url: urlsimpan2, // Sesuaikan dengan route Anda
        type: "POST",
        headers: {
            'X-CSRF-TOKEN': csrfTokenMenu
        },
        data: {
            menu_: menu,
            role_: role
        },
        success: function (response) {
            Swal.fire('Berhasil!', 'Role berhasil disimpan.', 'success');
            $('#menu_').val(''); // Kosongkan input
            $('#role_').val(''); // Kosongkan input
            $('#modalAksesMenu').modal('hide');
            $('#table-akses-menu').DataTable().ajax.reload();
        },
        error: function (xhr, status, error) {
            Swal.fire('Gagal!', 'Terjadi kesalahan saat menyimpan data.', 'error');
        }
    });
});

$('#table-akses-menu').on('click', '.delete-akses', function () {
    var idDeleteAkses = $(this).data('id'); // Ambil ID dari atribut data-id

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
            let url = routes.deleteAksesMenu.replace(':id', idDeleteAkses);
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
                    $('#table-akses-menu').DataTable().ajax.reload();// Refresh DataTable
                },
                error: function (xhr, status, error) {
                    Swal.fire(
                        'Gagal!',
                        'Terjadi kesalahan saat menghapus data.',
                        'error'
                    );
                }
            });


            // alert(idDeleteAkses);
        }
    });
});