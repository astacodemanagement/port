@extends('back.layouts.app')
@section('title', 'Halaman Belum Diverifikasi')
@section('subtitle', 'Menu Belum Diverifikasi')
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
            min-width: 150px;
            object-fit: cover;
            object-position: center;
            height: 100%;
        }

        .card-sub {
            transition: transform 0.2s ease-in-out;
        }

        .card-sub:hover {
            transform: scale(1.05);
        }

        .card-img-container {
            overflow: hidden;
            position: relative;
        }

        .card-img-container img {
            width: 100%;
            height: auto;
            display: block;
        }

        .card-content {
            padding: 1rem;
        }

        @media (min-width: 150px) {
            .card-sub {
                display: flex;
                flex-direction: column;
                align-items: center;
            }

            .card-img-container {
                max-width: 100%;
                height: auto;
            }

            .card-content {
                width: 100%;
                text-align: center;
            }
        }
        .dark-logo {
    background-color: rgba(255, 255, 255, 0.7);
    position: absolute;
    top: 10px;
    right: 3em;
    width: 30px;
    z-index: 1;
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
                            <h5>Belum Diverifikasi</h5>
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
                            <li class="breadcrumb-item"><a href="#!">Halaman Belum Diverifikasi</a>
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
                                        <h5>Data Pendaftaran Kandidat <span class="badge badge-pill badge-warning"
                                                style="color: #2c2f30; display: inline-block;"> <i
                                                    class="fa fa-spinner"></i> {{$status}}</span> </h5>
                                    </div>


                                    <div class="card-block">
                                        <div class="col-lg-12 col-xl-6">
                                            <!-- Add this inside your HTML body -->
                                            <div class="row mb-5">
                                               <!-- click for filter -->
                                             
                                                <div class="search-container col-md-6">
                                                    {{-- send request --}}

                                                    {{-- form --}}
                                                    <form action="{{ route('back-office.pelamar.index',['status'=>$status]) }}"
                                                        method="GET">
                                                    <div class="d-flex " style="gap: 10px;">
                                                        
                                                        <div>
                                                            <input type="text" class="form-control" id="searchInput"
                                                                placeholder="Search..." name="search"
                                                                value="{{ $search ?? '' }}">
                                                        </div>
                                                        <div>
                                                            <button class="btn btn-primary waves-effect waves-light"
                                                                type="submit">
                                                                <i class="fa fa-search"></i> 
                                                            </button>
                                                        </div>
                                                        <!-- filter icon -->
                                                        <div class="">
                                                            <button type="button" class="btn btn-warning text-dark" data-toggle="modal"
                                                                data-target="#filterContainer">
                                                                <i class="fa-solid fa-sliders"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                    </form>
                                                </div>
                                                {{-- filter container --}}
                                                <!-- modal -->
                                                <div class="modal fade" id="filterContainer" tabindex="-1" role="dialog" aria-labelledby="filterContainerLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="filterContainerLabel">Filter Pencarian</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="{{ route('back-office.pelamar.index',['status'=>$status]) }}" method="GET">
                                                                    <div class="form-group">
                                                                        <label for="filter_job">Filter Minat Industri</label>
                                                                        <select name="filter_job" id="filter_job" class="form-control">
                                                                            <option value="">-- Pilih Kategori Job --</option>
                                                                            @foreach ($kategori_job as $item)
                                                                                <option value="{{ $item->id }}" {{ $filter_job == $item->id ? 'selected' : '' }}>
                                                                                    {{ $item->nama_kategori_job }}
                                                                                </option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="filter_gender">Jenis Kelamin</label>
                                                                        <select name="filter_gender" id="filter_gender" class="form-control">
                                                                            <option value="">-- Pilih Jenis Kelamin --</option>
                                                                            <option value="Laki-laki" {{ $filter_gender == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                                                            <option value="Perempuan" {{ $filter_gender == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="filter_height">Tinggi Badan</label>
                                                                        <input type="text" class="form-control" id="filter_height" name="filter_height" placeholder="-- Masukkan Tinggi Badan --" value="{{ $filter_height ?? '' }}">
                                                                    </div>
                                                                    <!-- level bahasa ingris -->
                                                                    <div class="form-group">
                                                                        <label for="filter_level_bahasa_inggris">Level Bahasa Inggris</label>
                                                                        <select name="filter_level_bahasa_inggris" id="filter_level_bahasa_inggris" class="form-control">
                                                                            <option value="">-- Pilih Level Bahasa Inggris --</option>
                                                                            <option value="Beginner English" {{ $filter_level_bahasa_inggris == 'Beginner English' ? 'selected' : '' }}>Beginner English'</option>
                                                                            <option value="⁠Medium English" {{ $filter_level_bahasa_inggris == '⁠Medium English' ? 'selected' : '' }}>⁠Medium English</option>
                                                                            <option value="Advanced" {{ $filter_level_bahasa_inggris == 'Advance English' ? 'selected' : '' }}>Advance English</option>
                                                                        </select>
                                                                    </div>
                                                                    <button type="submit" class="btn btn-primary">Filter</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>


                                                <br><br>
                                            </div>
                                        </div>

                                        <div class="row" id="draggablePanelList">
                                            @forelse ($pelamar as $p)
                                           <div class="col-lg-12 col-xl-4">
                                                    <div class="card-sub shadow p-3 mb-5 bg-white rounded">
                                                    <div>
                                                                @if ($p->kandidat->pendaftaran->compro == 1)
                                                                    <img src="{{ asset('frontend/assets/logo/logo.png') }}" class="dark-logo" style="background-color: rgba(255, 255, 255, 0.7); position: absolute; top: 10px; right: 2em; width: 35px; z-index: 1;" alt="" />
                                                                @else
                                                                    <img src="{{ asset('frontend/assets/logo/akamalogo.png') }}" class="dark-logo" style="background-color: rgba(255, 255, 255, 0.7); position: absolute; top: 10px; right: 2em; width: 70px; z-index: 1;" alt="" />
                                                                @endif
                                                            </div>
                                                        <div class="col-lg-12 col-xl-12">
                                                            <div class="d-flex justify-content-between ">
                                                           
                                                                <div style="flex: 1;" class="mr-4" >
                                                                    <!-- Image -->
                                                                    @if ($p->kandidat->foto)
                                                                    <a href="/upload/foto/{{ $p->kandidat->foto }}" target="_blank" style="position: relative; display: inline-block;" >
                                                                        <img class="card-img-top img-fluid"
                                                                            src="/upload/foto/thumb_{{ $p->kandidat->foto }}"
                                                                            onerror="this.src='{{ asset('images/placeholder-user.png') }}'"
                                                                            alt="Card image cap"
                                                                            style="border-radius:1rem; border:2px solid #00324F; ">
                                                                        
                                                                    </a>

                                                                    @else
                                                                        <!-- Default Image if no foto -->
                                                                        <img class="card-img-top img-fluid"
                                                                            src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSGThxD2scluEhl1Ea8rzz5J9ew7I3NEBUq2g&s"
                                                                            alt="Default Image">
                                                                    @endif
                                                                </div>
                                                                <div style="flex: 1; text-align: left; padding-left:9px; word-wrap: break-word;">
    <br>
    <h5 class="card-title">
        <a href="{{route('preview-cv', hashId($p->kandidat?->id))}}" target="_blank">
            <span class="badge badge-pill badge-primary" style="color: #ebeff1;">
                <i class="fa fa-eye"></i> Preview
            </span>
        </a>
    </h5>

    <p class="mb-1 text-muted d-flex align-items-center">
        <i class="fas fa-graduation-cap" style="min-width: 24px; margin-right: 8px; text-align: center;"></i>
        <b style="font-weight: bold;">{{ $p->kandidat->pendidikan }}</b>
    </p>

    <p class="mb-1 text-muted d-flex align-items-center">
        <i class="fas fa-weight-scale" style="min-width: 24px; margin-right: 8px; text-align: center;"></i>
        <b style="font-weight: bold;">{{ $p->kandidat->tinggi_badan }} cm | {{ $p->kandidat->berat_badan }} Kg</b>
    </p>

    <p class="mb-1 text-muted d-flex align-items-center">
        <i class="fa fa-user" style="min-width: 24px; margin-right: 8px; text-align: center;"></i>
        <b style="font-weight: bold;">{{ $p->kandidat->usia }} Tahun</b>
    </p>

    <p class="card-text mb-1 text-muted d-flex align-items-center" style="font-family: 'Poppins', sans-serif;">
        <i class="fa fa-book" style="min-width: 24px; margin-right: 8px; text-align: center;"></i>
        <b style="font-weight: bold;">{{ $p->kandidat->no_paspor }}</b>
    </p>
</div>



                                                            </div>
                                                        </div>


                                                        <div class="col-lg-12 col-xl-12">

                                                            <div class="card-block">
                                                                <a
                                                                    href="{{ route('back-office.pelamar.verifikasi.detail', $p->id) }}">
                                                                    <h5 class="card-title">
                                                                        <b
                                                                            style="font-weight: bold; color:#00324F; font-family: 'Poppins', sans-serif;">{{ $p->kandidat->nama_lengkap }}</b>
                                                                    </h5>
                                                                </a>
                                                              <p class="mb-1 text-muted"><i
                                                                        class="fas fa-location-dot"></i><b
                                                                        style="font-weight: bold;">
                                                                        {{ $p->kandidat->provinsi?->nama_provinsi }},
                                                                        {{ $p->kandidat->kota?->nama_kota }},
                                                                        {{ $p->kandidat->kecamatan?->nama_kecamatan }}</b>
                                                                </p>
                                                                </b></p>
                                                                <div style="display: flex; align-items: center;">
                                                                    <h5 class="card-title" style="margin-right: 10px;">
                                                                        <span class="badge badge-pill badge-warning" style="color: #00324F; font-size:12px;">
                                                                            {{ $p?->kategoriJob?->nama_kategori_job }}
                                                                        </span>
                                                                    </h5>
                                                                    <h5 class="card-title">
                                                                        @php
                                                                        $levelBahasaInggris = $p?->kandidat?->level_bahasa_inggris ?? 'Level Kosong';
                                                                        $badgeClass = $levelBahasaInggris === 'Level Kosong' ? 'badge-danger' : 'badge-primary';
                                                                    @endphp
                                                                    
                                                                    <span class="badge badge-pill {{ $badgeClass }}" style="color: #e9ecee; font-size:12px;">
                                                                        {{ $levelBahasaInggris }}
                                                                    </span>
                                                                    
                                                                        
                                                                    </h5>
                                                                </div>
                                                                
                                                                
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

                                                                    <div class="d-flex justify-start text-center" style="width: 100%;">
                                                                        <a href="" data-toggle="modal"
                                                                            data-target="#ubahStatusModal{{ $p->id }}"
                                                                            class="form-control mr-2"
                                                                            style="background-color: #00324F; color: #fff; border-radius: 1rem; font-size: 12px; "
                                                                            title="Detail">
                                                                            <i class="fa fa-edit"></i>
                                                                            Ubah Status

                                                                        </a>
                                                                        <a href="{{ route('back-office.pelamar.verifikasi.detail', $p->id) }}"
                                                                            class="form-control"
                                                                            style="background-color: transparent; color: #00324F; border-radius: 1rem; font-size: 12px;  border: 1px solid #00324F;"
                                                                            title="Detail"><i
                                                                                class="fa fa-arrow-right"></i>
                                                                            Lihat Detail</a>

                                                                    </div>





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
                                                                    Status - {{ $p->kandidat->nama_lengkap }}</h5>
                                                                <button type="button" class="close"
                                                                    data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <!-- Add your form with combo box for status update -->
                                                                <form id="ubahStatusForm{{ $p->id }}">
                                                                    <div class="form-group">
                                                                        <label for="statusSelect{{ $p->id }}">Ubah
                                                                            Status:</label>
                                                                        <select class="form-control"
                                                                            id="statusSelect{{ $p->id }}"
                                                                            name="status"
                                                                            onchange="handleStatusChange(this)">
                                                                            <option value="Belum Verifikasi(Pending)">Belum Verifikasi(Pending)</option>
                                                                            <option value="Verifikasi">Verifikasi</option>
                                                                            <option value="Reject">Reject</option>
                                                                            <option value="Reject-Blacklist">
                                                                                Reject-Blacklist</option>
                                                                            <!-- <option value="Pending">Pending</option> -->
                                                                            <!-- Add other status options if needed -->
                                                                        </select>
                                                                    </div>
                                                                    <div id="alasan_reject_container{{ $p->id }}"
                                                                        style="display: none;">
                                                                        <div class="form-group">
                                                                            <label
                                                                                for="alasan_reject{{ $p->id }}">Alasan
                                                                                :</label>
                                                                            <textarea name="alasan_reject" id="alasan_reject{{ $p->id }}" cols="30" rows="3"
                                                                                class="form-control"></textarea>
                                                                        </div>
                                                                    </div>
                                                                    <script>
                                                                        // Mendengarkan perubahan pada setiap elemen select dengan id yang sesuai
                                                                        document.addEventListener("DOMContentLoaded", function() {
                                                                            var statusSelect = document.getElementById("statusSelect{{ $p->id }}");
                                                                            var alasanRejectContainer = document.getElementById("alasan_reject_container{{ $p->id }}");

                                                                            // Sembunyikan div alasan_reject_container saat halaman dimuat
                                                                            alasanRejectContainer.style.display = "none";

                                                                            // Tambahkan event listener untuk setiap kali pilihan berubah
                                                                            statusSelect.addEventListener("change", function() {
                                                                                // Jika status adalah Reject atau Reject-Blacklist, tampilkan div alasan_reject_container
                                                                                if (statusSelect.value === "Reject" || statusSelect.value === "Reject-Blacklist") {
                                                                                    alasanRejectContainer.style.display = "block";
                                                                                } else {
                                                                                    // Jika tidak, sembunyikan div alasan_reject_container
                                                                                    alasanRejectContainer.style.display = "none";
                                                                                }
                                                                            });
                                                                        });
                                                                    </script>

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
                                            {{ $pelamar->links('pagination::bootstrap-4') }}
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

            <script>
                function SearchName() {
                    var search = $("input[name='search']").val();
                    // snd with ajax
                    $.ajax({
                        url: `{{ route('back-office.pelamar.index', ['status' => $status]) }}`,
                        type: "GET",
                        data: {
                            search: search
                        },
                        success: function(response) {
                            $('#draggablePanelList').html(response);
                        },
                        error: function(error) {
                            console.error(error);
                        }
                    });
                }
            </script>
            {{-- <script>
                function handleStatusChange(selectElement) {
                    var pendaftaranId = selectElement.id.replace('statusSelect', '');
                    var statusBlacklistGroup = document.getElementById("statusBlacklistGroup" + pendaftaranId);

                    // Tampilkan atau sembunyikan group radio berdasarkan pilihan select
                    if (selectElement.value === "Reject") {
                        statusBlacklistGroup.style.display = "block";
                    } else {
                        statusBlacklistGroup.style.display = "none";
                    }
                }
            </script> --}}

            <!-- Add this inside your HTML body, after the card layout code -->


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
                        url: '{{ route('back-office.pelamar.update.status') }}', // Sesuaikan dengan URL rute Anda
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