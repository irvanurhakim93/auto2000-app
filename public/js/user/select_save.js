let urlselect2 = $('#urlselectRole').val();
$('#user-datatable').on('click', '.edit-role', function () {
    var id_ = $(this).data('id');
    var emailRole = $(this).data('email');
    $('#emailRole').val(emailRole);
    $('#id_').val(id_);
    $('#modalRole').modal('show');
});
$('.select2-multiple2').select2({
    placeholder: "-- Pilih --",
    allowClear: true,
    dropdownParent: $('#modalRole'),
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
$(document).on('click', '#reset-role', function () {
    let urlsimpan2 = $('#urlResetRole').val();
    const id_ = $('#id_').val();
    const role = $('#role_').val();
    let csrfTokenMenu = $('meta[name="csrf-token"]').attr('content');


    if (!role) {
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
            id: id_,
            role_: role
        },
        success: function (response) {
            Swal.fire('Berhasil!', 'Role berhasil disimpan.', 'success');

            $('#modalRole').modal('hide');
            $('#user-datatable').DataTable().ajax.reload();
        },
        error: function (xhr, status, error) {
            Swal.fire('Gagal!', 'Terjadi kesalahan saat menyimpan data.', 'error');
        }
    });
});