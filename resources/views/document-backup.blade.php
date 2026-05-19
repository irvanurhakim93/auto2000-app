@extends('layouts.skote.master')

@section('title') Welcome @endsection

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/libs/sweetalert2/sweetalert2.min.css') }}">
@endsection

@section('content')


    @include('common-components.skote.alert-info-n-error')
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                 @if(auth()->user()->hasRole('admin'))
                 <form action="{{route('document.store')}}" id="uploadForm" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="file" name="file" id="file" class="form-control" placeholder="Unggah data">
                     <div class="d-flex justify-content-end">
                    <button type="submit" style="height:30px; margin-top: 20px;" class="btn btn-primary btn-sm">
                        Submit
                    </button>
                </div>
                </form>
                @endif
  
                <table id="myTable" class="table table-bordered">
                @if(auth()->user()->hasRole('admin'))
                <label for="">Unggah data</label> 
                 <br>
                 @endif
                <thead>
                        <tr>
                            <th>Klien</th>
                            <th>Nama Cabang</th>
                            <th>Lantai</th>
                            <th>Ruangan</th>
                            <th>Product</th>
                            <th>Condition</th>
                            <th>Nama Keterangan</th>
                            <th>Action</th> <!-- kolom baru -->
                        </tr>
                    </thead>
                <tbody>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                </tbody>
                </div>
            </div>
        </div>
    </div>

    @endsection

@section('script')

<script>
$(document).ready(function() {
    $('#myTable').DataTable({
        data: @json($dataDocument),
        columns: [
            { data: 'klien' },
            { data: 'nama_cabang' },
            { data: 'lantai' },
            { data: 'ruangan' },
            { data: 'product' },
            { data: 'condition' },
            { data: 'keterangan' },

            {
                data: 'id',
                render: function(data, type, row) {

                    let url = "{{ route('document.download', ':id') }}";
                    url = url.replace(':id', data);

                    return `
                        <a href="${url}" class="btn btn-success btn-sm">
                            Unduh Excel / CSV
                        </a>
                    `;
                }
            }
        ]
    });
});
</script>

<script>
$(document).ready(function() {

    console.log("JS loaded ✅");

    // 🔥 cek file dipilih atau tidak
    $('#file').on('change', function() {
        let file = this.files[0];
        if (file) {
            // console.log("FILE DIPILIH:", file.name, file.size + " bytes");
        } else {
            // console.log("TIDAK ADA FILE");
        }
    });

    // 🔥 handle submit
    $('#uploadForm').on('submit', function(e) {
        e.preventDefault();

        // console.log("FORM DISUBMIT ✅");

        let formData = new FormData(this);

        // 🔍 cek isi FormData
        for (let pair of formData.entries()) {
            // console.log("FORM DATA:", pair[0], pair[1]);
        }

        $.ajax({
            url: "{{ route('document.store') }}",
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,

            beforeSend: function() {
                // console.log("REQUEST DIKIRIM 🚀");
            },

            success: function(res) {

                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil',
                    text: 'File berhasil diunggah'
                });
            },

            error: function(err) {


            let message = "Upload gagal";

            // 🔥 kalau ada validasi dari Laravel
            if (err.responseJSON && err.responseJSON.errors) {
                let errors = err.responseJSON.errors;

                if (errors.file) {
                    message = "Harus file .XLS atau .CSV yang diunggah";
                }
            }

            Swal.fire({
                icon: 'error',
                title: 'Gagal',
                text: message
            });
        }


        });
    });

});
</script>

@endsection