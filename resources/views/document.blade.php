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

            <!-- Progress Bar -->
        <div class="progress mt-2" style="height: 20px; display:none;" id="uploadProgressWrapper">
            <div id="uploadProgress" class="progress-bar progress-bar-striped progress-bar-animated" 
                role="progressbar" style="width: 0%">0%</div>
        </div>


            <div class="card-body">

                {{-- 🔥 UPLOAD --}}

                @if(auth()->user()->hasRole('admin'))

                {{-- Debug role info --}}
                <div class="alert alert-warning">
                    <strong>DEBUG ROLE INFO:</strong><br>
                    User ID: {{ auth()->id() }} <br>
                    Roles: {{ implode(',', auth()->user()->getRoleNames()->toArray()) }} <br>
                    Has Admin? {{ auth()->user()->hasRole('admin') ? 'YA' : 'TIDAK' }}
                </div>

                <form action="{{ route('document.store') }}" id="uploadForm" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="file" name="file" id="file" class="form-control" placeholder="Unggah data">

                    <div class="d-flex justify-content-end mt-2">
                        <button type="submit" class="btn btn-primary btn-sm">
                            Submit
                        </button>
                    </div>
                </form>

            @endif


                {{-- 🔥 FILTER --}}
                <form method="GET" action="{{ route('document.index') }}" class="mb-4 mt-3">
                    <div class="row">

                        <div class="col-md-3">
                            <label>Dari Tanggal</label>
                            <input type="date" name="start_date" class="form-control" value="{{ request('start_date') }}">
                        </div>

                        <div class="col-md-3">
                            <label>Sampai Tanggal</label>
                            <input type="date" name="end_date" class="form-control" value="{{ request('end_date') }}">
                        </div>

                        <div class="col-md-3">
                            <label>Nama Cabang</label>
                            <select name="nama_cabang" class="form-control">
                                <option value="">-- Semua Cabang --</option>
                                @foreach($listCabang as $cabang)
                                    <option value="{{ $cabang }}" {{ request('nama_cabang') == $cabang ? 'selected' : '' }}>
                                        {{ $cabang }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                            <div class="col-md-3">
                            <label>Kondisi</label>
                            <select name="condition" class="form-control">
                                <option value="">-- Pilih Kondisi --</option>
                                @foreach($listKondisi as $kondisi)
                                    <option value="{{ $kondisi }}" {{ request('condition') == $kondisi ? 'selected' : '' }}>
                                        {{ $kondisi }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-3 d-flex align-items-end">
                            <button type="submit" class="btn btn-primary btn-sm me-2">Filter</button>
                            <a href="{{ route('document.index') }}" class="btn btn-secondary btn-sm">Reset</a>
                        </div>

                    </div>
                </form>

                {{-- 🔥 TABLE --}}
                <div class="table-responsive">
                    <table id="myTable" class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Nama Klien</th>
                                <th>Nama Cabang</th>
                                <th>Nama TAD</th>
                                <th>Kategori 1</th>
                                <th>Kategori 2</th>
                                <th>Kategori 3</th>
                                <th>Kondisi</th>
                                <th>Tanggal Pengerjaan</th>
                                <th>Jam Pengerjaan</th>
                                <th>Keterangan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- isi data -->
                        </tbody>
                    </table>
                </div>


                {{-- 🔥 DOWNLOAD BUTTON (SUDAH BENAR POSISI) --}}
                <div class="fab-wrapper">

                <button id="downloadFab" class="fab-main" type="button">
                    ⬇
                </button>

                <div id="fabMenu" class="fab-menu">

                <a href="{{ route('document.downloadExcel', request()->query()) }}" class="fab-item">
                        Unduh Excel
                    </a>

                    <a href="{{ route('document.downloadCsv', request()->query()) }}" class="fab-item">
                        Unduh CSV
                    </a>

                    <a href="{{ route('document.downloadJson', request()->query()) }}" class="fab-item">
                        Unduh JSON
                    </a>

                </div>

            </div>
                <!-- 🔥 END OF DOWNLOAD BUTTON -->

            </div>
        </div>
    </div>
</div>

<!-- 🔥 FAB -->
<style>
    .fab-wrapper{
    position: fixed;
    right: 30px;
    bottom: 30px;
    z-index: 999;
}

.fab-main{
    width:60px;
    height:60px;
    border:none;
    border-radius:50%;
    font-size:28px;
    color:#fff;
    background:#198754;
    box-shadow:0 4px 12px rgba(0,0,0,.25);
}

.fab-menu{
    position:absolute;
    bottom:75px;
    right:0;
    display:flex;
    flex-direction:column;
    gap:12px;

    opacity:0;
    visibility:hidden;
    transform:translateY(20px);
    transition:.25s ease;
}

.fab-menu.show{
    opacity:1;
    visibility:visible;
    transform:translateY(0);
}

.fab-item{
    background:white;
    color:#333;
    text-decoration:none;
    padding:10px 18px;
    border-radius:30px;
    box-shadow:0 3px 10px rgba(0,0,0,.15);
    white-space:nowrap;
}

.fab-item:hover{
    text-decoration:none;
}
</style>
<!-- 🔥 END OF FAB HTML -->
@endsection


@section('script')

<script>
$(document).ready(function() {
    $('#myTable').DataTable({
        data: @json($dataDocument),
        columns: [
            { data: 'nama_klien' },
            { data: 'nama_cabang' },
            { data: 'nama_tad'},
            { data: 'kategori_1' },
            { data: 'kategori_2' },
            { data: 'kategori_3' },
            { data: 'condition' },
            { data: 'tanggal_pengerjaan' },
            {data: 'jam_pengerjaan'},
            { data: 'keterangan' }
        ]
    });
});
</script>

<script>
$(document).ready(function() {

    $('#uploadForm').on('submit', function(e) {
        e.preventDefault();

        let formData = new FormData(this);

        $.ajax({
            url: "{{ route('document.store') }}",
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,

            success: function(res) {
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil',
                    text: 'File berhasil diunggah'
                }).then(() => {
                    location.reload();
                });
            },

        error: function(err) {

            console.log("DETAIL ERROR:", err);

            let message = "Upload gagal";

            // Status HTTP
            console.log("Status:", err.status);

            // Response asli dari server
            console.log("FULL ERROR:", err.responseJSON);
            console.log("RAW:", err.responseText);

            // Jika Laravel validation error
            if (err.responseJSON) {

                console.log("JSON Response:", err.responseJSON);

                // Validation errors
                if (err.responseJSON.errors) {

                    let errors = err.responseJSON.errors;

                    console.log("Validation Errors:", errors);

                    // Ambil semua pesan error
                    message = Object.values(errors)
                        .flat()
                        .join('\n');
                }

                // Jika ada message umum
                else if (err.responseJSON.message) {
                    message = err.responseJSON.message;
                }
            }

Swal.fire({
    icon: 'error',
    title: 'Gagal',
    text: message
});
}

}); // penutup $.ajax

}); // penutup submit

}); // penutup document.ready

</script>

<!-- 🔥 FAB SCRIPT -->
 <script>
$(function(){

    $('#downloadFab').on('click', function(){
        $('#fabMenu').toggleClass('show');
    });

    $(document).on('click', function(e){
        if(!$(e.target).closest('.fab-wrapper').length){
            $('#fabMenu').removeClass('show');
        }
    });

});
</script>
<!-- END OF FAB SCRIPT -->

<!-- Progress bar script -->
<script>
$(document).ready(function() {

    $('#uploadForm').on('submit', function(e) {
        e.preventDefault();

        let formData = new FormData(this);

        $.ajax({
            url: "{{ route('document.store') }}",
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,

            // 🔥 Tambahkan xhr untuk progress bar
            xhr: function() {
                let xhr = new window.XMLHttpRequest();
                xhr.upload.addEventListener("progress", function(evt) {
                    if (evt.lengthComputable) {
                        let percentComplete = Math.round((evt.loaded / evt.total) * 100);
                        $('#uploadProgressWrapper').show();
                        $('#uploadProgress').css('width', percentComplete + '%');
                        $('#uploadProgress').text(percentComplete + '%');
                    }
                }, false);
                return xhr;
            },

            success: function(res) {
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil',
                    text: 'File berhasil diunggah'
                }).then(() => {
                    location.reload();
                });
            },

            error: function(err) {
                let message = "Upload gagal";

                if (err.responseJSON && err.responseJSON.errors) {
                    if (err.responseJSON.errors.file) {
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
<!-- Progress bar script -->

@endsection