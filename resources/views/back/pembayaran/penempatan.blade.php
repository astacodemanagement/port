@extends('back.layouts.app')
@section('title', 'Halaman Pembayaran')
@section('subtitle', 'Menu Pembayaran')
@push('css')
    @extends('back.layouts.css_datatables')
@endpush

@section('content')


    <div class="pcoded-content">
        <div class="page-header card">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <i class="feather icon-list bg-c-blue"></i>
                        <div class="d-inline">
                            <h5>Pembayaran</h5>
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
                            <li class="breadcrumb-item"><a href="#!">Halaman Pembayaran</a>
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
                                        <h5>Data Pembayaran</h5>

                                    </div>
                                    <div class="card-block">
                                        {{-- <button type="button" class="btn btn-primary mobtn" data-toggle="modal"
                                            data-target="#modal-pembayaran"><i class="fas fa-plus-circle"></i> Add
                                            Data</button>

                                        <br><br> --}}

                                        <div class="dt-responsive table-responsive">
                                            <table id="order-table" class="table table-striped table-bordered nowrap">
                                                <thead>
                                                    <tr>
                                                        <th width="5%">No</th>
                                                        <th width="15%">Nama Kandidat</th>
                                                        <th width="10%">Mitra</th>
                                                        <th width="10%">Biaya Penempatan</th>
                                                        <th width="10%">Total Sudah Dibayar</th>
                                                        <th width="10%">Kekurangan</th>
                                                        <th class="text-center" width="5%">Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($pembayaran as $p)
                                                        <tr>
                                                            <td>{{ $loop->iteration }}</td>
                                                            <td>{{ $p->nama_kandidat }}</td>
                                                            <td>{{ $p->job->mitra }}</td>
                                                            <td>Rp. {{ number_format($p->biaya_penempatan, 0, ',', '.') }}
                                                            </td>
                                                            <td>Rp. {{ number_format($p->total_bayar, 0, ',', '.') }}</td>
                                                            <td>Rp. {{ number_format($p->sisa_bayar, 0, ',', '.') }}</td>

                                                            <td class="text-center">
                                                                <a style="color: rgb(242, 236, 236)" href="#"
                                                                    class="btn btn-sm btn-primary btn-edit"
                                                                    data-toggle="modal" data-target="#modal-edit"
                                                                    data-id="{{ $p->id }}" style="color: black">
                                                                    <i class="fas fa-eye"></i> Detail
                                                                </a>

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

            {{-- Modal Tambah Data --}}
            <div class="modal fade" id="modal-pembayaran" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <form id="form-pembayaran" action="" method="POST">
                        @csrf <!-- Tambahkan token CSRF -->
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Form Input Pembayaran</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">


                                <div class="card-block">

                                    <div class="form-group row">
                                        <div class="col-sm-12">
                                            <label class="col-form-label" for="nama_pembayaran">Nama Pembayaran</label>
                                        </div>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control " id="nama_pembayaran"
                                                name="nama_pembayaran">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-12">
                                            <label class="col-form-label" for="no_telp">No Telp </label>
                                        </div>
                                        <div class="col-sm-12">
                                            <input type="number" class="form-control " id="no_telp" name="no_telp">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-12">
                                            <label class="col-form-label" for="email">Email </label>
                                        </div>
                                        <div class="col-sm-12">
                                            <input type="email" class="form-control " id="email" name="email">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-12">
                                            <label class="col-form-label" for="alamat">Alamat </label>
                                        </div>
                                        <div class="col-sm-12">
                                            <textarea class="form-control" name="alamat" id="alamat" cols="30" rows="3"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-12">
                                            <label class="col-form-label" for="keterangan">Keterangan </label>
                                        </div>
                                        <div class="col-sm-12">
                                            <textarea class="form-control" name="keterangan" id="keterangan" cols="30" rows="3"></textarea>
                                        </div>
                                    </div>

                                </div>





                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default waves-effect "
                                    data-dismiss="modal">Kembali</button>
                                <button type="button" class="btn btn-primary waves-effect waves-light"
                                    id="btn-save-pembayaran"><i class="fas fa-save"></i> Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>


            <!-- Modal Edit Data -->
            <div class="modal fade" id="modal-edit" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <form id="form-edit-pembayaran" action="" method="POST">
                        @csrf <!-- Tambahkan token CSRF -->
                        @method('PUT') <!-- Tambahkan method PUT untuk update -->
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Form Edit Pembayaran</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="card-block">
                                    <div class="form-group row">
                                        <div class="col-sm-12">
                                            <label class="col-form-label" for="edit_nama_pembayaran">Nama Kategori
                                                Job</label>
                                        </div>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control " id="edit_nama_pembayaran"
                                                name="nama_pembayaran">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-12">
                                            <label class="col-form-label" for="edit_no_telp">No Telp</label>
                                        </div>
                                        <div class="col-sm-12">
                                            <input type="number" class="form-control " id="edit_no_telp"
                                                name="no_telp">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-12">
                                            <label class="col-form-label" for="edit_email">Email</label>
                                        </div>
                                        <div class="col-sm-12">
                                            <input type="email" class="form-control " id="edit_email" name="email">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-sm-12">
                                            <label class="col-form-label" for="edit_alamat">Alamat </label>
                                        </div>
                                        <div class="col-sm-12">
                                            <textarea class="form-control" name="alamat" id="edit_alamat" cols="30" rows="3"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-12">
                                            <label class="col-form-label" for="edit_keterangan">Keterangan </label>
                                        </div>
                                        <div class="col-sm-12">
                                            <textarea class="form-control" name="keterangan" id="edit_keterangan" cols="30" rows="3"></textarea>
                                        </div>
                                    </div>


                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default waves-effect"
                                    data-dismiss="modal">Kembali</button>
                                <button type="button" class="btn btn-primary waves-effect waves-light"
                                    id="btn-update-pembayaran"><i class="fas fa-save"></i> Simpan Perubahan</button>
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



    {{-- TAMBAH --}}
    <script>
        $(document).ready(function() {
            $('#btn-save-pembayaran').click(function() {
                var form = $('#form-pembayaran');
                $.ajax({
                    url: form.attr('action'),
                    type: 'POST',
                    data: form.serialize(),
                    success: function(response) {
                        $('#modal-pembayaran').modal('hide');
                        Swal.fire({
                            title: 'Sukses!',
                            text: response.message,
                            icon: 'success',
                            confirmButtonText: 'OK'
                        }).then(function() {
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



    {{-- EDIT dan UPDATE --}}
    <script>
        $(document).ready(function() {
            // Tampilkan data di modal edit
            $('.btn-edit').click(function() {
                var id = $(this).data('id');
                $.ajax({
                    url: '/pembayaran/' + id + '/edit',
                    type: 'GET',
                    success: function(response) {
                        $('#edit_nama_pembayaran').val(response.nama_pembayaran);
                        $('#edit_no_telp').val(response.no_telp);
                        $('#edit_email').val(response.email);
                        $('#edit_alamat').val(response.alamat);
                        $('#edit_keterangan').val(response.keterangan);
                        // Set action form untuk update
                        $('#form-edit-pembayaran').attr('action', '/pembayaran/' + id);
                        $('#modal-edit').modal('show');
                    },
                    error: function(xhr) {
                        // Handle error
                    }
                });
            });

            // AJAX untuk update data
            $('#btn-update-pembayaran').click(function() {
                var form = $('#form-edit-pembayaran');
                $.ajax({
                    url: form.attr('action'),
                    type: 'POST',
                    data: form.serialize() + '&_method=PUT',
                    success: function(response) {
                        $('#modal-edit').modal('hide');
                        Swal.fire({
                            title: 'Sukses!',
                            text: response.message,
                            icon: 'success',
                            confirmButtonText: 'OK'
                        }).then(function() {
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

                            url: '/pembayaran/' + id,
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
