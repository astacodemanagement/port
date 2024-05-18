@extends('back.layouts.app')
@section('title', 'Halaman Job')
@section('subtitle', 'Menu Job')
@push('css')
    @extends('back.layouts.css_datatables')
    {{-- <link rel="stylesheet" type="text/css" href="{{ asset('template') }}/custom.css" /> --}}
@endpush

@section('content')


    <div class="pcoded-content">

        <div class="page-header card">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <i class="feather icon-list bg-c-blue"></i>
                        <div class="d-inline">
                            <h5>Job</h5>
                            <span>Silahkan isi dengan data yang sesuai dan valid !</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="page-header-breadcrumb">
                        <ul class=" breadcrumb breadcrumb-title">
                            <li class="breadcrumb-item">
                                <a href="{{ route('back-office.home') }}"><i class="feather icon-home"></i></a>
                            </li>
                            <li class="breadcrumb-item"><a href="#!">Halaman Job</a>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="pcoded-inner-content">

            <div class="main-body">
                <div class="page-wrapper">

                    <div class="page-body">
                        <div class="row">
                            <div class="col-sm-12">


                                <div class="card">
                                    <div class="card-header">
                                        <h5>Data Job</h5>

                                    </div>
                                    <div class="card-block">
                                        <a href="{{ route('back-office.job.create') }}" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Add
                                            Data</a>

                                        <br><br>

                                        <div class="dt-responsive table-responsive">
                                            <table id="order-table" class="table table-striped table-bordered nowrap">
                                                <thead>
                                                    <tr>
                                                        <th width="5%">No</th>

                                                        <th width="15%">Nama Job</th>
                                                        <th width="5%">Negara</th>
                                                        <th class="text-center" width="5%">Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($job as $p)
                                                        <tr>
                                                            <td>{{ $loop->iteration }}</td>
                                                            <td>{{ $p->nama_job }}</td>
                                                            <td>{{ $p->nama_negara }}</td>
                                                            <td class="text-center">
                                                                <a style="color: rgb(242, 236, 236)" href="#"
                                                                    class="btn btn-sm btn-secondary btn-gambar"
                                                                    data-toggle="modal" data-target="#modal-gambar"
                                                                    data-id="{{ $p->id }}"
                                                                    data-nama-job="{{ $p->nama_job }}"
                                                                    style="color: black">
                                                                    <i class="fas fa-image"></i> Gambar
                                                                </a>

                                                                <a style="color: rgb(242, 236, 236)" href="#"
                                                                    class="btn btn-sm btn-primary btn-edit"
                                                                    data-toggle="modal" data-target="#modal-edit"
                                                                    data-id="{{ $p->id }}" style="color: black">
                                                                    <i class="fas fa-edit"></i> Edit
                                                                </a>
                                                                <button class="btn btn-sm btn-danger btn-hapus"
                                                                    data-id="{{ $p->id }}" style="color: white">
                                                                    <i class="fas fa-trash-alt"></i> Delete
                                                                </button>
                                                            </td>
                                                        </tr>
                                                    @endforeach

                                                </tbody>

                                            </table>
                                        </div>
                                    </div>
                                </div>




                            </div>
                        </div>
                    </div>

                </div>
            </div>


            {{-- Modal Upload Gambar --}}
            <div class="modal fade" id="modal-gambar" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <form id="form-gambar" action="{{ route('back-office.job.upload-gambar') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Tambah Gambar untuk Job: <span id="nama-job-info"></span></h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <!-- Input Nama Gambar dan File -->
                                <div class="form-group">
                                    <label for="nama_gambar">Nama Gambar</label>
                                    <input type="text" class="form-control" id="nama_gambar" name="nama_gambar" required>
                                </div>
                                <div class="form-group">
                                    <label for="gambar">Gambar</label>
                                    <input type="file" class="form-control-file" id="gambar" name="gambar" required>
                                </div>

                                <!-- Input Hidden untuk Menyimpan ID Job -->
                                <input type="hidden" id="job_id" name="job_id">

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Kembali</button>
                                <button type="button" id="btn-simpan-gambar" class="btn btn-primary">Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>




@endsection




@push('script')
    @include('back.layouts.js_datatables')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>


    <script>
        $(document).ready(function() {
            var namaJob; // Deklarasikan variabel di luar event

            // Event klik tombol gambar
            $('.btn-gambar').on('click', function() {
                var job_id = $(this).data('id');
                namaJob = $(this).closest('tr').find('td:eq(1)')
                    .text(); // Mendapatkan nama_job dari kolom kedua
                $('#job_id').val(job_id);
                $('#nama-job-info').text(namaJob);
                $('#modal-gambar').modal('show');
            });

            // Event klik tombol upload gambar
            $('#btn-simpan-gambar').on('click', function() {
                var formData = new FormData($('#form-gambar')[0]);

                $.ajax({
                    url: '{{ route('back-office.job.upload-gambar') }}',
                    type: 'POST',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        Swal.fire({
                            title: 'Sukses!',
                            html: 'Data berhasil disimpan untuk Job: <strong>' +
                                namaJob + '</strong>',
                            icon: 'success',
                            confirmButtonText: 'OK'
                        }).then(function() {
                            $('#modal-gambar').modal('hide');
                            location.reload();
                        });
                    },
                    error: function(xhr) {
                        var errorMessages = xhr.responseJSON.errors;
                        var errorMessage = '';
                        $.each(errorMessages, function(key, value) {
                            errorMessage += value + '<br>';
                        });
                        Swal.fire({
                            title: 'Error!',
                            html: errorMessage,
                            icon: 'error',
                            confirmButtonText: 'OK'
                        });
                    }
                });
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('.btn-hapus').click(function() {
                var id = $(this).data('id');

                Swal.fire({
                    title: 'Apakah Anda yakin?',
                    text: 'Data akan dihapus permanen!',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, hapus!',
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({

                            url: `${baseUrl}/job/${id}`,
                            type: 'DELETE',

                            success: function(response) {
                                Swal.fire({
                                    title: 'Sukses!',
                                    text: response.message,
                                    icon: 'success',
                                    confirmButtonText: 'OK',
                                }).then(function() {
                                    location.reload();
                                });
                            },
                            error: function(xhr) {
                                // Handle error
                                Swal.fire({
                                    title: 'Error!',
                                    text: 'Gagal menghapus data.',
                                    icon: 'error',
                                    confirmButtonText: 'OK',
                                });
                            },
                        });
                    }
                });
            });
        });
    </script>
@endpush
