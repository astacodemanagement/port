@extends('back.layouts.app')
@section('title', 'Halaman Pengeluaran')
@section('subtitle', 'Menu Pengeluaran')
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
                            <h5>Pengeluaran</h5>
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
                            <li class="breadcrumb-item"><a href="#!">Halaman Pengeluaran</a>
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
                                        <h5>Data Pengeluaran</h5>

                                    </div>
                                    <div class="card-block">
                                        <button type="button" class="btn btn-primary mobtn" data-toggle="modal"
                                            data-target="#modal-pengeluaran"><i class="fas fa-plus-circle"></i> Add
                                            Data</button>

                                        <br><br>

                                        <div class="dt-responsive table-responsive">
                                            <table id="order-table" class="table table-striped table-bordered nowrap">
                                                <thead>
                                                    <tr>
                                                        <th width="5%">No</th>

                                                        <th width="15%">Nama Pengeluaran</th>
                                                        <th width="5%">Jumlah</th>
                                                        <th width="5%">Gambar</th>
                                                        <th class="text-center" width="5%">Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($pengeluaran as $p)
                                                        <tr>
                                                            <td>{{ $loop->iteration }}</td>
                                                            <td>{{ $p->nama_pengeluaran }}</td>
                                                            <td>Rp. {{ number_format($p->jumlah_pengeluaran) }}</td>
                                                            <td>
                                                                <a href="/upload/pengeluaran/{{ $p->gambar }}"
                                                                    target="_blank">
                                                                    <img style="max-width:50px; max-height:50px"
                                                                        src="/upload/pengeluaran/{{ $p->gambar }}"
                                                                        alt="">
                                                                </a>
                                                            </td>
                                                            <td class="text-center">
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

            {{-- Modal Tambah Data --}}
            <div class="modal fade" id="modal-pengeluaran" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <form id="form-pengeluaran" action="" method="POST" enctype="multipart/form-data">
                        @csrf <!-- Tambahkan token CSRF -->
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Form Input Pengeluaran</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">


                                <div class="card-block">
                                    <div class="form-group row">
                                        <div class="col-sm-12">
                                            <label class="col-form-label" for="tanggal_pengeluaran">Tanggal
                                                Pengeluaran</label>
                                        </div>
                                        <div class="col-sm-12">
                                            <input type="date" class="form-control form-control-success"
                                                id="tanggal_pengeluaran" name="tanggal_pengeluaran">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-12">
                                            <label class="col-form-label" for="nama_pengeluaran">Nama Pengeluaran</label>
                                        </div>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control form-control-success"
                                                id="nama_pengeluaran" name="nama_pengeluaran">
                                        </div>
                                    </div>

                                    <div class="form-group row" id="jumlah_pengeluaran_container">
                                        <div class="col-sm-12">
                                            <label class="col-form-label" for="nama_pengeluaran">Jumlah Pengeluaran</label>
                                        </div>
                                        <div class="col-sm-12">
                                            <input type="text"
                                                class="form-control form-control-success jumlah_pengeluaran"
                                                name="jumlah_pengeluaran" id="jumlah_pengeluaran">

                                        </div>
                                    </div>

                                    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

                                    <!-- Script untuk memisahkan ribuan tanpa batasan maksimal -->
                                    <script>
                                        $(document).ready(function() {
                                            $('.jumlah_pengeluaran').on('input', function(e) {
                                                var inputVal = $(this).val().replace(/[^\d]/g, ''); // Hapus semua karakter non-digit
                                                var formattedVal = addThousandSeparator(inputVal);
                                                $(this).val(formattedVal);
                                            });

                                            function addThousandSeparator(num) {
                                                var parts = num.toString().split(".");
                                                parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                                                return parts.join(".");
                                            }
                                        });
                                    </script>


                                    <div class="form-group row">
                                        <div class="col-sm-12">
                                            <label class="col-form-label" for="keterangan">Keterangan</label>
                                        </div>
                                        <div class="col-sm-12">
                                            <textarea class="form-control form-control-success" name="keterangan" id="keterangan" cols="30"
                                                rows="3"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-12">
                                            <label class="col-form-label" for="pic">PIC</label>
                                        </div>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control form-control-success"
                                                id="pic" name="pic">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-12">
                                            <label class="col-form-label" for="gambar">Upload Gambar Pengeluaran</label>
                                        </div>
                                        <div class="col-sm-12">
                                            <input type="file" class="form-control form-control-success"
                                                id="gambar" name="gambar">
                                        </div>
                                    </div>

                                </div>





                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default waves-effect "
                                    data-dismiss="modal">Kembali</button>
                                <button type="button" class="btn btn-primary waves-effect waves-light"
                                    id="btn-save-pengeluaran"><i class="fas fa-save"></i> Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>


            <!-- Modal Edit Data -->
            <div class="modal fade" id="modal-edit" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <form id="form-edit-pengeluaran" action="" method="POST">
                        @csrf <!-- Tambahkan token CSRF -->
                        @method('PUT') <!-- Tambahkan method PUT untuk update -->
                        <input type="hidden" id="id" name="id">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Form Edit Pengeluaran</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">


                                <div class="card-block">
                                    <div class="form-group row">
                                        <div class="col-sm-12">
                                            <label class="col-form-label" for="edit_tanggal_pengeluaran">Tanggal
                                                Pengeluaran</label>
                                        </div>
                                        <div class="col-sm-12">
                                            <input type="date" class="form-control form-control-success"
                                                id="edit_tanggal_pengeluaran" name="tanggal_pengeluaran">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-12">
                                            <label class="col-form-label" for="edit_nama_pengeluaran">Nama
                                                Pengeluaran</label>
                                        </div>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control form-control-success"
                                                id="edit_nama_pengeluaran" name="nama_pengeluaran">
                                        </div>
                                    </div>

                                    <div class="form-group row" id="jumlah_pengeluaran_container">
                                        <div class="col-sm-12">
                                            <label class="col-form-label" for="jumlah_pengeluaran">Jumlah
                                                Pengeluaran</label>
                                        </div>
                                        <div class="col-sm-12">
                                            <input type="text"
                                                class="form-control form-control-success jumlah_pengeluaran"
                                                name="jumlah_pengeluaran" id="edit_jumlah_pengeluaran">

                                        </div>
                                    </div>

                                    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

                                    <!-- Script untuk memisahkan ribuan tanpa batasan maksimal -->
                                    <script>
                                        $(document).ready(function() {
                                            $('.edit_jumlah_pengeluaran').on('input', function(e) {
                                                var inputVal = $(this).val().replace(/[^\d]/g, ''); // Hapus semua karakter non-digit
                                                var formattedVal = addThousandSeparator(inputVal);
                                                $(this).val(formattedVal);
                                            });

                                            function addThousandSeparator(num) {
                                                var parts = num.toString().split(".");
                                                parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                                                return parts.join(".");
                                            }
                                        });
                                    </script>


                                    <div class="form-group row">
                                        <div class="col-sm-12">
                                            <label class="col-form-label" for="edit_keterangan">Keterangan</label>
                                        </div>
                                        <div class="col-sm-12">
                                            <textarea class="form-control form-control-success" name="keterangan" id="edit_keterangan" cols="30"
                                                rows="3"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-12">
                                            <label class="col-form-label" for="edit_pic">PIC</label>
                                        </div>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control form-control-success"
                                                id="edit_pic" name="pic">
                                        </div>
                                    </div>
                                    <div class="form-group" id="gambar_edit_container">
                                        <label for="gambar_edit">Bukti Pengeluaran</label>

                                        <input type="file" class="form-control" name="gambar" id="gambar_edit">

                                        <div id="gambar_image_container"></div>
                                        <br>
                                        <!-- Tautan untuk mengunduh atau melihat gambar -->
                                        <a id="gambar_download_link" href="" target="_blank">

                                        </a>
                                    </div>

                                </div>






                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default waves-effect"
                                    data-dismiss="modal">Kembali</button>
                                <button type="button" class="btn btn-primary waves-effect waves-light"
                                    id="btn-update-pengeluaran"><i class="fas fa-save"></i> Simpan Perubahan</button>
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
            $('#btn-save-pengeluaran').click(function() {
                event.preventDefault();
                const tombolSimpan = $('#btn-save-pengeluaran')
                var form = $('#form-pengeluaran');
                $.ajax({
                    url: form.attr('action'),
                    type: 'POST',
                    data: new FormData(form[0]),
                    contentType: false,
                    beforeSend: function() {
                        $('form').find('.error-message').remove()
                        tombolSimpan.prop('disabled', true)
                    },
                    processData: false,
                    success: function(response) {
                        $('#modal-pengeluaran').modal('hide');
                        Swal.fire({
                            title: 'Sukses!',
                            text: response.message,
                            icon: 'success',
                            confirmButtonText: 'OK'
                        }).then(function() {
                            location.reload();
                        });
                    },
                    complete: function() {
                        tombolSimpan.prop('disabled', false);
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




    {{-- PERINTAH EDIT DATA --}}
    <script>
        $(document).ready(function() {
            // $('.dataTable tbody').on('click', 'td .btn-edit', function(e) {
            $('.btn-edit').click(function(e) {
                e.preventDefault();

                var id = $(this).data('id');

                $.ajax({
                    pengeluaran: 'GET',
                    url: `${baseUrl}/pengeluaran/${id}/edit`,
                    beforeSend: function() {
                        $('#gambar_edit_container').html('')
                    },
                    success: function(data) {
                        // console.log(data); // Cek apakah data terisi dengan benar
                        // Mengisi data pada form modal
                        $('#id').val(data.id); // Menambahkan nilai id ke input tersembunyi
                        $('#edit_tanggal_pengeluaran').val(data.tanggal_pengeluaran);
                        $('#edit_nama_pengeluaran').val(data.nama_pengeluaran);
                        $('#edit_jumlah_pengeluaran').val(data.jumlah_pengeluaran);
                        $('#edit_keterangan').val(data.keterangan);
                        $('#edit_pic').val(data.pic);
                        if (data.gambar) {
                            var gambarImg = '<img src="/upload/pengeluaran/' + data.gambar +
                                '" style="max-width: 100px; max-height: 100px;">';
                            var gambarLink = '<a href="/upload/pengeluaran/' + data.gambar +
                                '" target="_blank"><i class="fa fa-eye"></i> Lihat Bukti</a>';
                            $('#gambar_edit_container').append(gambarImg + '<br>' + gambarLink);
                        }

                        $('#modal-pengeluaran-edit').modal('show');
                        $('#id').val(id);
                    },

                    error: function(xhr) {
                        // Tangani kesalahan jika ada
                        alert('Error: ' + xhr.statusText);
                    }
                });
            });
        });
    </script>


    {{-- PERINTAH UPDATE DATA --}}
    <script>
        $(document).ready(function() {
            $('#btn-update-pengeluaran').click(function(e) {
                e.preventDefault();
                const tombolUpdate = $('#btn-update-pengeluaran');
                var id = $('#id').val();
                var formData = new FormData($('#form-edit-pengeluaran')[0]);

                $.ajax({
                    type: 'POST',
                    url: `${baseUrl}/pengeluaran/${id}`,
                    data: formData,
                    headers: {
                        'X-HTTP-Method-Override': 'PUT'
                    },
                    contentType: false,
                    processData: false,
                    beforeSend: function() {
                        $('form').find('.error-message').remove();
                        tombolUpdate.prop('disabled', true);
                    },
                    success: function(response) {
                        $('#modal-pengeluaran-edit').modal('hide');
                        Swal.fire({
                            title: 'Sukses!',
                            text: response.message,
                            icon: 'success',
                            confirmButtonText: 'OK'
                        }).then((result) => {
                            if (result.isConfirmed || result.isDismissed) {
                                location.reload();
                            }
                        });
                    },
                    complete: function() {
                        tombolUpdate.prop('disabled', false);
                    },
                    error: function(xhr) {
                        if (xhr.status !== 422) {
                            $('#modal-pengeluaran-edit').modal('hide');
                        }
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


    {{-- HAPUS DATA --}}
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

                            url: `${baseUrl}/pengeluaran/${id}`,
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
