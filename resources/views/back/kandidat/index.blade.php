@extends('back.layouts.app')
@section('title', 'Halaman Kandidat')
@section('subtitle', 'Menu Kandidat')
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
                            <h5>Kandidat</h5>
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
                            <li class="breadcrumb-item"><a href="#!">Halaman Kandidat</a>
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
                                        <h5>Data Kandidat</h5>

                                    </div>
                                    <div class="card-block">
                                        {{-- <button type="button" class="btn btn-primary mobtn" data-toggle="modal"
                                            data-target="#modal-kandidat"><i class="fas fa-plus-circle"></i> Add
                                            Data</button> --}}

                                        {{-- <br><br> --}}

                                        <div class="dt-responsive table-responsive">
                                            <table id="order-table" class="table table-striped table-bordered nowrap">
                                                <thead>
                                                    <tr>
                                                        <th width="5%">No</th>

                                                        <th width="10%">NIK</th>
                                                        <th width="15%">Nama Kandidat</th>
                                                        <th width="5%">Gambar</th>
                                                        <th class="text-center" width="5%">Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($kandidat as $p)
                                                        <tr>
                                                            <td>{{ $loop->iteration }}</td>
                                                            <td>{{ $p->nik }}</td>
                                                            <td>{{ $p->nama_lengkap }}</td>
                                                            <td>
                                                                <a href="/upload/foto/{{ $p->foto }}" target="_blank">
                                                                    <img style="max-width:50px; max-height:50px"
                                                                        src="/upload/foto/{{ $p->foto }}"
                                                                        alt="">
                                                                </a>
                                                            </td>
                                                            <td class="text-center">
                                                                <a title="Detail" style="color: rgb(242, 236, 236)" href="{{ route('back-office.pelamar.kandidat.detail', $p->id) }}"
                                                                    class="btn btn-sm btn-primary btn-detail"
                                                                     style="color: black">
                                                                    <i class="fas fa-eye"></i> Detail
                                                                </a>
                                                                <button title="Hapus"
                                                                    class="btn btn-sm btn-danger btn-hapus"
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
 

 
        </div>
    </div>




@endsection




@push('script')
    @include('back.layouts.js_datatables')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>


 

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
                            url: `${baseUrl}/kandidat/${id}`,
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
                                if (xhr.status == 422) {
                                    Swal.fire({
                                        title: 'Error!',
                                        text: xhr.responseJSON
                                        .message, // Menampilkan pesan spesifik dari server
                                        icon: 'error',
                                        confirmButtonText: 'OK',
                                    });
                                } else {
                                    Swal.fire({
                                        title: 'Error!',
                                        text: 'Gagal menghapus data.',
                                        icon: 'error',
                                        confirmButtonText: 'OK',
                                    });
                                }
                            },
                        });
                    }
                });
            });

        });
    </script>
@endpush
