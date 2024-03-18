@extends('back.layouts.app')
@section('title', 'Halaman Sudah Diverifikasi')
@section('subtitle', 'Menu Sudah Diverifikasi')
@push('css')
    <style>
        .card-sub {
            transition: transform 0.2s ease-in-out;
        }

        .card-sub:hover {
            transform: scale(1.05);
        }

        .card-img-container {
            overflow: hidden;
            height: 200px;
            width: 100%;
            /* Adjust the width as needed */
        }

        .card-img-container img {
            width: 100%;
            object-fit: cover;
            object-position: center;
            height: 100%;
        }


 
      

    </style>
@endpush


@section('content')


    <div class="pcoded-content">

        <div class="page-header card">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <i class="feather icon-list bg-c-blue"></i>
                        <div class="d-inline">
                            <h5>Sudah Diverifikasi</h5>
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
                            <li class="breadcrumb-item"><a href="#!">Halaman Sudah Diverifikasi</a>
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
                                        <h5>Data Pendaftaran Kandidat <span class="badge badge-pill badge-success" style="color: #f9fbfc; display: inline-block;"> <i class="fa fa-check"></i> SUDAH VERIFIKASI </span> </h5>
                                    </div>


                                    <div class="card-block">
                                        <div class="col-lg-12 col-xl-3">
                                            <!-- Add this inside your HTML body -->
                                            <div class="search-container">
                                                <div style="display: inline-block;">
                                                    <input type="text" class="form-control" id="searchInput"
                                                        placeholder="Search...">
                                                </div>
                                                <div style="display: inline-block;">
                                                    <button class="btn btn-primary waves-effect waves-light"
                                                        onclick="searchCards()">Search</button>
                                                </div>
                                            </div>

                                            <br><br>
                                        </div>

                                        <div class="row" id="draggablePanelList">
                                            @forelse ($sudah_diverifikasi as $p)
                                                <div class="col-lg-12 col-xl-3">
                                                    <div class="card-sub shadow p-3 mb-5 bg-white rounded">
                                                        <div class="col-lg-12 col-xl-12">
                                                            <div class="card-img-container d-flex justify-content-between">
                                                                <div style="flex: 1;">
                                                                    <!-- Image -->
                                                                    @if ($p->foto)
                                                                        <a href="/upload/foto/{{ $p->foto }}"
                                                                            target="_blank">
                                                                            <img class="card-img-top img-fluid"
                                                                                src="/upload/foto/{{ $p->foto }}"
                                                                                alt="Card image cap"
                                                                                style="border-radius:1rem;">
                                                                        </a>
                                                                    @else
                                                                        <!-- Default Image if no foto -->
                                                                        <img class="card-img-top img-fluid"
                                                                            src="/upload/foto/foto.png" alt="Default Image">
                                                                    @endif
                                                                </div>
                                                                <div style="flex: 1; text-align: left; padding-left:9px;">
                                                                    <br>
                                                                    <h5 class="card-title">
                                                                        <a href="">
                                                                            <span class="badge badge-pill badge-primary"
                                                                                style="color: #ebeff1;"><i
                                                                                    class="fa fa-eye"></i> Preview</span>
                                                                        </a>
                                                                    </h5>

                                                                    <p><b style="font-weight: bold;">Usia:
                                                                            {{ $p->usia }}
                                                                            Tahun</b></p>
                                                                    <p class="card-text" style="margin-top: -8%"
                                                                        style="font-family: 'Poppins', sans-serif; text-align: justify;">
                                                                        Domisili :
                                                                        {{ $p->alamat }}</p>
                                                                </div>
                                                            </div>
                                                        </div>



                                                        <div class="card-block">


                                                            <a href="{{ route('verifikasi.detail', $p->id) }}">
                                                                <h5 class="card-title">
                                                                    <b
                                                                        style="font-weight: bold; color:#00324F; font-family: 'Poppins', sans-serif;">{{ $p->nama_lengkap }}</b>
                                                                </h5>
                                                            </a>



                                                            <h5 class="card-title">
                                                                <span class="badge badge-pill badge-warning"
                                                                    style="color: #00324F;">{{ $p->nama_kategori_job }}</span>
                                                            </h5>

                                                            <div class="text-left">
                                                                <!-- Adjusted alignment to the left -->
                                                                <small class="text-muted">
                                                                    <i class="fa fa-calendar"></i>
                                                                    <b>{{ $p->created_at->format('l, j F Y') }}</b>
                                                                </small>
                                                            </div>
                                                            <br>

                                                            <div class="text-left">
                                                                <!-- Icon mata untuk detail -->

                                                                <div class="d-flex">
                                                                    <a href="" data-toggle="modal"
                                                                        data-target="#ubahStatusModal{{ $p->id }}"
                                                                        class="form-control mr-2"
                                                                        style="background-color: #00324F; color: #fff; border-radius: 1rem; font-size: 12px; "
                                                                        title="Detail">
                                                                        <i class="fa fa-edit"></i>
                                                                        Ubah Status

                                                                    </a>
                                                                    <a href="{{ route('verifikasi.detail', $p->id) }}"
                                                                        class="form-control"
                                                                        style="background-color: transparent; color: #00324F; border-radius: 1rem; font-size: 12px;  border: 1px solid #00324F;"
                                                                        title="Detail"><i class="fa fa-arrow-right"></i>
                                                                        Lihat Detail</a>

                                                                </div>





                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Modal -->
                                                <div class="modal fade" id="ubahStatusModal{{ $p->id }}"
                                                    tabindex="-1" role="dialog" aria-labelledby="ubahStatusModalLabel"
                                                    aria-hidden="true">
                                                  
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="ubahStatusModalLabel">Ubah
                                                                    Status - {{ $p->nama_lengkap }}</h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <!-- Add your form with combo box for status update -->
                                                                <form id="ubahStatusForm{{ $p->id }}">
                                                                    <!-- Combo box for status update -->
                                                                    <div class="form-group">
                                                                        <label for="statusSelect">Ubah Status:</label>
                                                                        <select class="form-control"
                                                                            id="statusSelect{{ $p->id }}"
                                                                            name="status">
                                                                            <option value="Reject">Reject</option>
                                                                            <option value="Reject-Blacklist">Reject-Blacklist</option>
                                                                            <option value="Pending">Pending</option>
                                                                            <!-- Add other status options if needed -->
                                                                        </select>
                                                                    </div>
                                                                    <!-- Add hidden input for the Pendaftaran ID -->
                                                                    <input type="hidden" name="pendaftaran_id"
                                                                        value="{{ $p->id }}">
                                                                </form>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal"><i class="fas fa-undo"></i>
                                                                    Tutup</button>
                                                                <button type="button" class="btn btn-primary"
                                                                    onclick="submitUbahStatus({{ $p->id }})"><i
                                                                        class="fas fa-save"></i> Simpan</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @empty
                                                <div class="alert alert-warning" role="alert">
                                                    Ooops.... Data Kosong !
                                                </div>
                                            @endforelse



                                        </div>

                                        <!-- Add this inside your HTML body, after the card layout code -->
                                        <!-- Tambahkan ini untuk menampilkan pagination links -->
                                        <div class="pagination-container d-flex justify-content-center">
                                            {{ $sudah_diverifikasi->links('pagination::bootstrap-4') }}
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
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
            
            <!-- Add this inside your HTML body, after the card layout code -->
            <script>
                function searchCards() {
                    var input, filter, cards, card, i, txtValue;
                    input = document.getElementById("searchInput");
                    filter = input.value.toUpperCase();
                    cards = document.getElementById("draggablePanelList").getElementsByClassName("card-sub");

                    for (i = 0; i < cards.length; i++) {
                        card = cards[i];
                        txtValue = card.textContent || card.innerText;

                        if (txtValue.toUpperCase().indexOf(filter) > -1) {
                            card.style.display = "";
                        } else {
                            card.style.display = "none";
                        }
                    }
                }
            </script>


            <script>
                function submitUbahStatus(pendaftaranId) {
                    var formData = $('#ubahStatusForm' + pendaftaranId).serialize();
                    // Tambahkan script berikut di bagian head template atau di dalam tag script Anda
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    $.ajax({
                        type: 'POST',
                        url: '/update-status-verifikasi', // Sesuaikan dengan URL rute Anda
                        data: formData,
                        success: function(response) {
                            // Handle success, tampilkan SweetAlert untuk konfirmasi OK
                            Swal.fire({
                                icon: 'success',
                                title: 'Status berhasil diubah',
                                showConfirmButton: true,
                                confirmButtonText: 'OK'
                            }).then(function() {
                                // Reload halaman setelah pengguna mengklik OK
                                location.reload();
                            });
                        },
                        error: function(error) {
                            // Handle error, tampilkan SweetAlert error jika diperlukan
                            Swal.fire({
                                icon: 'error',
                                title: 'Terjadi kesalahan',
                                text: 'Gagal mengubah data.'
                            });
                            console.error(error);
                        }
                    });
                }
            </script>
        @endpush
