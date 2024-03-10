@extends('back.layouts.app')
@section('title', 'Halaman Pemasukan')
@section('subtitle', 'Menu Pemasukan')
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
                            <h5>Pemasukan</h5>
                            <span>Silahkan isi dengan data yang sesuai dan valid !</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="page-header-breadcrumb">
                        <ul class=" breadcrumb breadcrumb-title">
                            <li class="breadcrumb-item">
                                <a href="/"><i class="feather icon-home"></i></a>
                            </li>
                            <li class="breadcrumb-item"><a href="#!">Halaman Pemasukan</a>
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
                                        <h5>Data Pemasukan</h5>

                                    </div>
                                    <div class="card-block">
                                        <button type="button" class="btn btn-primary mobtn" data-toggle="modal"
                                            data-target="#modal-pemasukan"><i class="fas fa-plus-circle"></i> Add
                                            Data</button>

                                        <br><br>

                                        <div class="dt-responsive table-responsive">
                                            <table id="order-table" class="table table-striped table-bordered nowrap">
                                                <thead>
                                                    <tr>
                                                        <th width="5%">No</th>

                                                        <th width="15%">Nama Pemasukan</th>
                                                        <th width="5%">Jumlah</th>
                                                        <th width="5%">Gambar</th>
                                                        <th class="text-center" width="5%">Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($pemasukan as $p)
                                                        <tr>
                                                            <td>{{ $loop->iteration }}</td>
                                                            <td>{{ $p->nama_pemasukan }}</td>
                                                            <td>Rp. {{ number_format($p->jumlah_pemasukan) }}</td>
                                                            <td>
                                                                <a href="/upload/pemasukan/{{ $p->gambar }}"
                                                                    target="_blank">
                                                                    <img style="max-width:50px; max-height:50px"
                                                                        src="/upload/pemasukan/{{ $p->gambar }}"
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
            <div class="modal fade" id="modal-pemasukan" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <form id="form-pemasukan" action="" method="POST" enctype="multipart/form-data">
                        @csrf <!-- Tambahkan token CSRF -->
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Form Input Pemasukan</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">


                                <div class="card-block">
                                    <div class="form-group row">
                                        <div class="col-sm-12">
                                            <label class="col-form-label" for="tanggal_pemasukan">Tanggal Pemasukan</label>
                                        </div>
                                        <div class="col-sm-12">
                                            <input type="date" class="form-control form-control-success"
                                                id="tanggal_pemasukan" name="tanggal_pemasukan">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-12">
                                            <label class="col-form-label" for="nama_pemasukan">Nama Pemasukan</label>
                                        </div>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control form-control-success"
                                                id="nama_pemasukan" name="nama_pemasukan">
                                        </div>
                                    </div>

                                    <div class="form-group row" id="jumlah_pemasukan_container">
                                        <div class="col-sm-12">
                                            <label class="col-form-label" for="nama_pemasukan">Jumlah Pemasukan</label>
                                        </div>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control form-control-success jumlah_pemasukan" name="jumlah_pemasukan" id="jumlah_pemasukan">
                                  
                                        </div>
                                    </div>

                                    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

                                    <!-- Script untuk memisahkan ribuan tanpa batasan maksimal -->
                                    <script>
                                        $(document).ready(function() {
                                            $('.jumlah_pemasukan').on('input', function(e) {
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
                                            <label class="col-form-label" for="gambar">Upload Gambar Pemasukan</label>
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
                                    id="btn-save-pemasukan"><i class="fas fa-save"></i> Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>


            <!-- Modal Edit Data -->
            <div class="modal fade" id="modal-edit" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <form id="form-edit-pemasukan" action="" method="POST">
                        @csrf <!-- Tambahkan token CSRF -->
                        @method('PUT') <!-- Tambahkan method PUT untuk update -->
                        <input type="hidden" id="id" name="id">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Form Edit Pemasukan</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">


                                <div class="card-block">
                                    <div class="form-group row">
                                        <div class="col-sm-12">
                                            <label class="col-form-label" for="edit_tanggal_pemasukan">Tanggal Pemasukan</label>
                                        </div>
                                        <div class="col-sm-12">
                                            <input type="date" class="form-control form-control-success"
                                                id="edit_tanggal_pemasukan" name="tanggal_pemasukan">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-12">
                                            <label class="col-form-label" for="edit_nama_pemasukan">Nama Pemasukan</label>
                                        </div>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control form-control-success"
                                                id="edit_nama_pemasukan" name="nama_pemasukan">
                                        </div>
                                    </div>

                                    <div class="form-group row" id="jumlah_pemasukan_container">
                                        <div class="col-sm-12">
                                            <label class="col-form-label" for="jumlah_pemasukan">Jumlah Pemasukan</label>
                                        </div>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control form-control-success jumlah_pemasukan" name="jumlah_pemasukan" id="edit_jumlah_pemasukan">
                                  
                                        </div>
                                    </div>

                                    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

                                    <!-- Script untuk memisahkan ribuan tanpa batasan maksimal -->
                                    <script>
                                        $(document).ready(function() {
                                            $('.edit_jumlah_pemasukan').on('input', function(e) {
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
                                    id="btn-update-pemasukan"><i class="fas fa-save"></i> Simpan Perubahan</button>
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
            $('#btn-save-pemasukan').click(function() {
                event.preventDefault();
                const tombolSimpan = $('#btn-save-pemasukan')
                var form = $('#form-pemasukan');
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
                        $('#modal-pemasukan').modal('hide');
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
                    pemasukan: 'GET',
                    url: '/pemasukan/' + id + '/edit',
                    success: function(data) {
                        // console.log(data); // Cek apakah data terisi dengan benar
                        // Mengisi data pada form modal
                        $('#id').val(data.id); // Menambahkan nilai id ke input tersembunyi
                        $('#edit_tanggal_pemasukan').val(data.tanggal_pemasukan);
                        $('#edit_nama_pemasukan').val(data.nama_pemasukan);
                        $('#edit_jumlah_pemasukan').val(data.jumlah_pemasukan);
                        $('#edit_keterangan').val(data.keterangan);
                        $('#edit_pic').val(data.pic);
                        if (data.gambar) {
                            var gambarImg = '<img src="/upload/pemasukan/' + data.gambar +
                                '" style="max-width: 100px; max-height: 100px;">';
                            var gambarLink = '<a href="/upload/pemasukan/' + data.gambar +
                                '" target="_blank"><i class="fa fa-eye"></i> Lihat Bukti</a>';
                            $('#gambar_edit_container').append(gambarImg + '<br>' + gambarLink);
                        }

                        $('#modal-pemasukan-edit').modal('show');
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
            $('#btn-update-pemasukan').click(function(e) {
                e.preventDefault();
                const tombolUpdate = $('#btn-update-pemasukan');
                var id = $('#id').val();
                var formData = new FormData($('#form-edit-pemasukan')[0]);

                $.ajax({
                    type: 'POST',
                    url: '/pemasukan/update/' + id,
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
                        $('#modal-pemasukan-edit').modal('hide');
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
                            $('#modal-pemasukan-edit').modal('hide');
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

                            url: '/pemasukan/' + id,
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
