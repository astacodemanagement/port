@extends('back.layouts.app')
@section('title', 'Halaman Faq')
@section('subtitle', 'Menu Faq')
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
                            <h5>Faq</h5>
                            <span>Silahkan isi dengan data yang sesuai dan valid !</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="page-header-breadcrumb">
                        <ul class=" breadcrumb breadcrumb-title">
                            <li class="breadcrumb-item">
                                <a href="{{ route('back-office.faq.index') }}"><i class="feather icon-home"></i></a>
                            </li>
                            <li class="breadcrumb-item"><a href="#!">Halaman Faq</a>
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
                                        <h5>Data Faq</h5>

                                    </div>
                                    <div class="card-block">
                                        <button type="button" class="btn btn-primary mobtn" data-toggle="modal"
                                            data-target="#modal-faq"><i class="fas fa-plus-circle"></i> Add
                                            Data</button>

                                        <br><br>

                                        <div class="dt-responsive table-responsive">
                                            <table id="order-table" class="table table-striped table-bordered nowrap">
                                                <thead>
                                                    <tr>
                                                        <th width="5%">No</th>
                                                        <th width="15%">Pertanyaan</th>
                                                        <th width="10%">Jawaban</th>
                                                        <th width="5%">Urutan</th>
                                                        <th width="10%">Company Profile</th>
                                                        <th class="text-center" width="5%">Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($faq as $p)
                                                        <tr>
                                                            <td>{{ $loop->iteration }}</td>
                                                            <td>{{ $p->pertanyaan }}</td>
                                                            <td>{{ $p->jawaban }}</td>
                                                            <td>{{ $p->urutan }}</td>
                                                            <td>
                                                            @if ($p->compro == 1)
                                                                <span class="badge badge-warning">PSI Jobs</span>
                                                                
                                                            @else
                                                                <span class="badge badge-info">Akama Jobs</span>
                                                            @endif
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
            <div class="modal fade" id="modal-faq" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <form id="form-faq" action="" method="POST">
                        @csrf <!-- Tambahkan token CSRF -->
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Form Input Faq</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">


                                <div class="card-block">

                                    <div class="form-group row">
                                        <div class="col-sm-12">
                                            <label class="col-form-label" for="pertanyaan">Pertanyaan</label>
                                        </div>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control  " id="pertanyaan"
                                                name="pertanyaan">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-sm-12">
                                            <label class="col-form-label" for="jawaban">Jawaban </label>
                                        </div>
                                        <div class="col-sm-12">
                                            <textarea class="form-control  " name="jawaban" id="jawaban" cols="30" rows="3"></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-sm-12">
                                            <label class="col-form-label" for="urutan">Urutan </label>
                                        </div>
                                        <div class="col-sm-12">
                                            <input type="number" class="form-control  " id="urutan"
                                                name="urutan">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-12">
                                            <label class="col-form-label" for="compro">Company Profile</label>
                                        </div>
                                        <div class="col-sm-12">
                                            <select class="form-control" name="compro" id="compro">
                                                <option value="1">PSI Jobs</option>
                                                <option value="2">Akama Jobs</option>
                                            </select>
                                            </div>  
                                    </div>

                                </div>





                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default waves-effect "
                                    data-dismiss="modal">Kembali</button>
                                <button type="button" class="btn btn-primary waves-effect waves-light"
                                    id="btn-save-faq"><i class="fas fa-save"></i> Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>


            <!-- Modal Edit Data -->
            <div class="modal fade" id="modal-edit" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <form id="form-edit-faq" action="" method="POST">
                        @csrf <!-- Tambahkan token CSRF -->
                        @method('PUT') <!-- Tambahkan method PUT untuk update -->
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Form Edit Faq</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="card-block">
                                    <div class="form-group row">
                                        <div class="col-sm-12">
                                            <label class="col-form-label" for="edit_pertanyaan">Nama Kategori
                                                Job</label>
                                        </div>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control  "
                                                id="edit_pertanyaan" name="pertanyaan">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-12">
                                            <label class="col-form-label" for="edit_jawaban">Jawaban </label>
                                        </div>
                                        <div class="col-sm-12">
                                            <textarea class="form-control  " name="jawaban" id="edit_jawaban" cols="30" rows="3"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-12">
                                            <label class="col-form-label" for="edit_urutan">Urutan</label>
                                        </div>
                                        <div class="col-sm-12">
                                            <input type="number" class="form-control  "
                                                id="edit_urutan" name="urutan">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-12">
                                            <label class="col-form-label" for="edit_compro">Company Profile</label>
                                        </div>
                                        <div class="col-sm-12">
                                            <select class="form-control" name="compro" id="edit_compro">
                                                <option value="1">PSI Jobs</option>
                                                <option value="2">Akama Jobs</option>
                                            </select>
                                            </div>  
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default waves-effect"
                                    data-dismiss="modal">Kembali</button>
                                <button type="button" class="btn btn-primary waves-effect waves-light"
                                    id="btn-update-faq"><i class="fas fa-save"></i> Simpan Perubahan</button>
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
            $('#btn-save-faq').click(function() {
                var form = $('#form-faq');
                $.ajax({
                    url: form.attr('action'),
                    type: 'POST',
                    data: form.serialize(),
                    success: function(response) {
                        $('#modal-faq').modal('hide');
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
                    url: `${baseUrl}/faq/${id}/edit`,
                    type: 'GET',
                    success: function(response) {
                        $('#edit_pertanyaan').val(response.pertanyaan);
                        $('#edit_urutan').val(response.urutan);
                        $('#edit_jawaban').val(response.jawaban);
                        if (response.compro == 1) {
                            $('#edit_compro').val(1);
                        } else {
                            $('#edit_compro').val(2);
                        }


                        // Set action form untuk update
                        $('#form-edit-faq').attr('action', `${baseUrl}/faq/${id}`);gar
                        $('#modal-edit').modal('show');
                    },
                    error: function(xhr) {
                        // Handle error\
                    }
                });
            });

            // AJAX untuk update data
            $('#btn-update-faq').click(function() {
                var form = $('#form-edit-faq');
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

                            url: `${baseUrl}/faq/${id}`,
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
