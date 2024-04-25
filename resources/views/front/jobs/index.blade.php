@extends('front.layouts.app')

@section('content')

<!-- Navbar -->
<section class="Element-nav-items-search">
    <div class="container">
        @include('front.layouts.navbar')
    </div>
</section>
<!-- #End -->

<!-- List Jobs Search -->
<div class="list-jobs-search">
    <div class="container">
        <!-- Content Search -->
        <div class="search-items-jobs">
            <div class="search-input-items">
                <input class="form-control form-control-lg" type="text" placeholder="Masukkan kata kunci"
                    aria-label=".form-control-lg example">
            </div>
            <div class="search-input-items">
                <select class="form-select form-select-lg" aria-label="Default select example">
                    <option selected>Semua Klasifikasi</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                </select>

            </div>
            <div class="search-input-items">
                <input class="form-control form-control-lg" type="text"
                    placeholder="Masukkan pinggiran kota, kota, atau wilayah" aria-label=".form-control-lg example">
            </div>
            <div class="search-input-items">
                <button type="submit" class="btn btn-primary">Cari</button>
            </div>
        </div>
    </div>
</div>
<!-- #End -->
<!-- Content Search Jobs -->
<section class="Content-search-all-jobs">
    <div class="container">
        <div class="row">
            <div class="col d-flex justify-content-center">
                <div class="card-body">
                    <div class="card-image">
                        <img src="{{ asset('frontend') }}/assets/image/Picture (1).png" alt="">
                    </div>
                    <div class="card-items-bagde gap-1">
                        <img src="{{ asset('frontend') }}/assets/icons/stop-circle.svg" alt="">
                        <span>Tersedia</span>
                    </div>
                    <div class="card-title-heading-card">
                        <h5 class="col-12 text-truncate">General Manager Operation</h5>
                        <span>ALDI</span>
                    </div>
                    <div class="card-content">
                        <div class="row">
                            <div class="col-1 mt-1">
                                <img src="{{ asset('frontend') }}/assets/image/location.png" alt="">
                            </div>
                            <div class="col-11 mt-2">
                                <h6 class="title-heading fw-bold">Negara</h6>
                                <p>New York, NY</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-1 mt-1">
                                <img src="{{ asset('frontend') }}/assets/icons/document-text.svg" alt="">
                            </div>
                            <div class="col-11 mt-2">
                                <h6 class="title-heading fw-bold">Kontrak Kerja</h6>
                                <p>Full Time</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-1 mt-1">
                                <img src="{{ asset('frontend') }}/assets/icons/Component 1.svg" alt="">
                            </div>
                            <div class="col-11 mt-2">
                                <h6 class="title-heading fw-bold">Gaji</h6>
                                <p>$19.50 - $30.00 per jam</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <h6>Berakhir pada tanggal 1 Februari 2024</h6>
                            </div>
                            <div class="col-12 d-flex align-self-center mt-2">
                                <a href="">Lihat Detail <span><svg xmlns="http://www.w3.org/2000/svg" clas="" width="16"
                                            height="16" fill="currentColor" class="bi bi-arrow-right-circle-fill"
                                            viewBox="0 0 16 16">
                                            <path
                                                d="M8 0a8 8 0 1 1 0 16A8 8 0 0 1 8 0M4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5z">
                                            </path>
                                        </svg></span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card-body">
                    <div class="card-image">
                        <img src="{{ asset('frontend') }}/assets/image/Picture (1).png" alt="">
                    </div>
                    <div class="card-items-bagde gap-1">
                        <img src="{{ asset('frontend') }}/assets/icons/stop-circle.svg" alt="">
                        <span>Tersedia</span>
                    </div>
                    <div class="card-title-heading-card">
                        <h5 class="col-10 text-truncate">General Manager Operation</h5>
                        <span>ALDI</span>
                    </div>
                    <div class="card-content">
                        <div class="row">
                            <div class="col-1 mt-1">
                                <img src="{{ asset('frontend') }}/assets/image/location.png" alt="">
                            </div>
                            <div class="col-11 mt-2">
                                <h6 class="title-heading fw-bold">Negara</h6>
                                <p>New York, NY</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-1 mt-1">
                                <img src="{{ asset('frontend') }}/assets/icons/document-text.svg" alt="">
                            </div>
                            <div class="col-11 mt-2">
                                <h6 class="title-heading fw-bold">Kontrak Kerja</h6>
                                <p>Full Time</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-1 mt-1">
                                <img src="{{ asset('frontend') }}/assets/icons/Component 1.svg" alt="">
                            </div>
                            <div class="col-11 mt-2">
                                <h6 class="title-heading fw-bold">Gaji</h6>
                                <p>$19.50 - $30.00 per jam</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <h6>Berakhir pada tanggal 1 Februari 2024</h6>
                            </div>
                            <div class="col-12 d-flex align-self-center mt-2">
                                <a href="">Lihat Detail <span><svg xmlns="http://www.w3.org/2000/svg" clas="" width="16"
                                            height="16" fill="currentColor" class="bi bi-arrow-right-circle-fill"
                                            viewBox="0 0 16 16">
                                            <path
                                                d="M8 0a8 8 0 1 1 0 16A8 8 0 0 1 8 0M4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5z">
                                            </path>
                                        </svg></span></a>
                            </div>
                        </div>
                    </div>
                </div>



            </div>
            <div class="col">
                <div class="card-body">
                    <div class="card-image">
                        <img src="{{ asset('frontend') }}/assets/image/Picture (1).png" alt="">
                    </div>
                    <div class="card-items-bagde gap-1">
                        <img src="{{ asset('frontend') }}/assets/icons/stop-circle.svg" alt="">
                        <span>Tersedia</span>
                    </div>
                    <div class="card-title-heading-card">
                        <h5 class="col-10 text-truncate">General Manager Operation</h5>
                        <span>ALDI</span>
                    </div>
                    <div class="card-content">
                        <div class="row">
                            <div class="col-1 mt-1">
                                <img src="{{ asset('frontend') }}/assets/image/location.png" alt="">
                            </div>
                            <div class="col-11 mt-2">
                                <h6 class="title-heading fw-bold">Negara</h6>
                                <p>New York, NY</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-1 mt-1">
                                <img src="{{ asset('frontend') }}/assets/icons/document-text.svg" alt="">
                            </div>
                            <div class="col-11 mt-2">
                                <h6 class="title-heading fw-bold">Kontrak Kerja</h6>
                                <p>Full Time</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-1 mt-1">
                                <img src="{{ asset('frontend') }}/assets/icons/Component 1.svg" alt="">
                            </div>
                            <div class="col-11 mt-2">
                                <h6 class="title-heading fw-bold">Gaji</h6>
                                <p>$19.50 - $30.00 per jam</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <h6>Berakhir pada tanggal 1 Februari 2024</h6>
                            </div>
                            <div class="col-12 d-flex align-self-center mt-2">
                                <a href="">Lihat Detail <span><svg xmlns="http://www.w3.org/2000/svg" clas="" width="16"
                                            height="16" fill="currentColor" class="bi bi-arrow-right-circle-fill"
                                            viewBox="0 0 16 16">
                                            <path
                                                d="M8 0a8 8 0 1 1 0 16A8 8 0 0 1 8 0M4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5z">
                                            </path>
                                        </svg></span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col d-flex justify-content-center">
                <div class="card-body">
                    <div class="card-image">
                        <img src="{{ asset('frontend') }}/assets/image/Picture (1).png" alt="">
                    </div>
                    <div class="card-items-bagde gap-1">
                        <img src="{{ asset('frontend') }}/assets/icons/stop-circle.svg" alt="">
                        <span>Tersedia</span>
                    </div>
                    <div class="card-title-heading-card">
                        <h5 class="col-12 text-truncate">General Manager Operation</h5>
                        <span>ALDI</span>
                    </div>
                    <div class="card-content">
                        <div class="row">
                            <div class="col-1 mt-1">
                                <img src="{{ asset('frontend') }}/assets/image/location.png" alt="">
                            </div>
                            <div class="col-11 mt-2">
                                <h6 class="title-heading fw-bold">Negara</h6>
                                <p>New York, NY</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-1 mt-1">
                                <img src="{{ asset('frontend') }}/assets/icons/document-text.svg" alt="">
                            </div>
                            <div class="col-11 mt-2">
                                <h6 class="title-heading fw-bold">Kontrak Kerja</h6>
                                <p>Full Time</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-1 mt-1">
                                <img src="{{ asset('frontend') }}/assets/icons/Component 1.svg" alt="">
                            </div>
                            <div class="col-11 mt-2">
                                <h6 class="title-heading fw-bold">Gaji</h6>
                                <p>$19.50 - $30.00 per jam</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <h6>Berakhir pada tanggal 1 Februari 2024</h6>
                            </div>
                            <div class="col-12 d-flex align-self-center mt-2">
                                <a href="">Lihat Detail <span><svg xmlns="http://www.w3.org/2000/svg" clas="" width="16"
                                            height="16" fill="currentColor" class="bi bi-arrow-right-circle-fill"
                                            viewBox="0 0 16 16">
                                            <path
                                                d="M8 0a8 8 0 1 1 0 16A8 8 0 0 1 8 0M4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5z">
                                            </path>
                                        </svg></span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card-body">
                    <div class="card-image">
                        <img src="{{ asset('frontend') }}/assets/image/Picture (1).png" alt="">
                    </div>
                    <div class="card-items-bagde gap-1">
                        <img src="{{ asset('frontend') }}/assets/icons/stop-circle.svg" alt="">
                        <span>Tersedia</span>
                    </div>
                    <div class="card-title-heading-card">
                        <h5 class="col-10 text-truncate">General Manager Operation</h5>
                        <span>ALDI</span>
                    </div>
                    <div class="card-content">
                        <div class="row">
                            <div class="col-1 mt-1">
                                <img src="{{ asset('frontend') }}/assets/image/location.png" alt="">
                            </div>
                            <div class="col-11 mt-2">
                                <h6 class="title-heading fw-bold">Negara</h6>
                                <p>New York, NY</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-1 mt-1">
                                <img src="{{ asset('frontend') }}/assets/icons/document-text.svg" alt="">
                            </div>
                            <div class="col-11 mt-2">
                                <h6 class="title-heading fw-bold">Kontrak Kerja</h6>
                                <p>Full Time</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-1 mt-1">
                                <img src="{{ asset('frontend') }}/assets/icons/Component 1.svg" alt="">
                            </div>
                            <div class="col-11 mt-2">
                                <h6 class="title-heading fw-bold">Gaji</h6>
                                <p>$19.50 - $30.00 per jam</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <h6>Berakhir pada tanggal 1 Februari 2024</h6>
                            </div>
                            <div class="col-12 d-flex align-self-center mt-2">
                                <a href="">Lihat Detail <span><svg xmlns="http://www.w3.org/2000/svg" clas="" width="16"
                                            height="16" fill="currentColor" class="bi bi-arrow-right-circle-fill"
                                            viewBox="0 0 16 16">
                                            <path
                                                d="M8 0a8 8 0 1 1 0 16A8 8 0 0 1 8 0M4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5z">
                                            </path>
                                        </svg></span></a>
                            </div>
                        </div>
                    </div>
                </div>



            </div>
            <div class="col">
                <div class="card-body">
                    <div class="card-image">
                        <img src="{{ asset('frontend') }}/assets/image/Picture (1).png" alt="">
                    </div>
                    <div class="card-items-bagde gap-1">
                        <img src="{{ asset('frontend') }}/assets/icons/stop-circle.svg" alt="">
                        <span>Tersedia</span>
                    </div>
                    <div class="card-title-heading-card">
                        <h5 class="col-10 text-truncate">General Manager Operation</h5>
                        <span>ALDI</span>
                    </div>
                    <div class="card-content">
                        <div class="row">
                            <div class="col-1 mt-1">
                                <img src="{{ asset('frontend') }}/assets/image/location.png" alt="">
                            </div>
                            <div class="col-11 mt-2">
                                <h6 class="title-heading fw-bold">Negara</h6>
                                <p>New York, NY</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-1 mt-1">
                                <img src="{{ asset('frontend') }}/assets/icons/document-text.svg" alt="">
                            </div>
                            <div class="col-11 mt-2">
                                <h6 class="title-heading fw-bold">Kontrak Kerja</h6>
                                <p>Full Time</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-1 mt-1">
                                <img src="{{ asset('frontend') }}/assets/icons/Component 1.svg" alt="">
                            </div>
                            <div class="col-11 mt-2">
                                <h6 class="title-heading fw-bold">Gaji</h6>
                                <p>$19.50 - $30.00 per jam</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <h6>Berakhir pada tanggal 1 Februari 2024</h6>
                            </div>
                            <div class="col-12 d-flex align-self-center mt-2">
                                <a href="">Lihat Detail <span><svg xmlns="http://www.w3.org/2000/svg" clas="" width="16"
                                            height="16" fill="currentColor" class="bi bi-arrow-right-circle-fill"
                                            viewBox="0 0 16 16">
                                            <path
                                                d="M8 0a8 8 0 1 1 0 16A8 8 0 0 1 8 0M4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5z">
                                            </path>
                                        </svg></span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="row mt-5">
            <div class="col">
                <div class="card-body">
                    <div class="card-image">
                        <img src="{{ asset('frontend') }}/assets/image/Picture (1).png" alt="">
                    </div>
                    <div class="card-items-bagde gap-1">
                        <img src="{{ asset('frontend') }}/assets/icons/stop-circle.svg" alt="">
                        <span>Tersedia</span>
                    </div>
                    <div class="card-title-heading-card">
                        <h5 class="col-12 text-truncate">General Manager Operation</h5>
                        <span>ALDI</span>
                    </div>
                    <div class="card-content">
                        <div class="row">
                            <div class="col-1 mt-1">
                                <img src="{{ asset('frontend') }}/assets/image/location.png" alt="">
                            </div>
                            <div class="col-11 mt-2">
                                <h6 class="title-heading fw-bold">Negara</h6>
                                <p>New York, NY</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-1 mt-1">
                                <img src="{{ asset('frontend') }}/assets/icons/document-text.svg" alt="">
                            </div>
                            <div class="col-11 mt-2">
                                <h6 class="title-heading fw-bold">Kontrak Kerja</h6>
                                <p>Full Time</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-1 mt-1">
                                <img src="{{ asset('frontend') }}/assets/icons/Component 1.svg" alt="">
                            </div>
                            <div class="col-11 mt-2">
                                <h6 class="title-heading fw-bold">Gaji</h6>
                                <p>$19.50 - $30.00 per jam</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <h6>Berakhir pada tanggal 1 Februari 2024</h6>
                            </div>
                            <div class="col-12 d-flex align-self-center mt-2">
                                <a href="">Lihat Detail <span><svg xmlns="http://www.w3.org/2000/svg" clas="" width="16"
                                            height="16" fill="currentColor" class="bi bi-arrow-right-circle-fill"
                                            viewBox="0 0 16 16">
                                            <path
                                                d="M8 0a8 8 0 1 1 0 16A8 8 0 0 1 8 0M4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5z">
                                            </path>
                                        </svg></span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card-body">
                    <div class="card-image">
                        <img src="{{ asset('frontend') }}/assets/image/Picture (1).png" alt="">
                    </div>
                    <div class="card-items-bagde gap-1">
                        <img src="{{ asset('frontend') }}/assets/icons/stop-circle.svg" alt="">
                        <span>Tersedia</span>
                    </div>
                    <div class="card-title-heading-card">
                        <h5 class="col-10 text-truncate">General Manager Operation</h5>
                        <span>ALDI</span>
                    </div>
                    <div class="card-content">
                        <div class="row">
                            <div class="col-1 mt-1">
                                <img src="{{ asset('frontend') }}/assets/image/location.png" alt="">
                            </div>
                            <div class="col-11 mt-2">
                                <h6 class="title-heading fw-bold">Negara</h6>
                                <p>New York, NY</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-1 mt-1">
                                <img src="{{ asset('frontend') }}/assets/icons/document-text.svg" alt="">
                            </div>
                            <div class="col-11 mt-2">
                                <h6 class="title-heading fw-bold">Kontrak Kerja</h6>
                                <p>Full Time</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-1 mt-1">
                                <img src="{{ asset('frontend') }}/assets/icons/Component 1.svg" alt="">
                            </div>
                            <div class="col-11 mt-2">
                                <h6 class="title-heading fw-bold">Gaji</h6>
                                <p>$19.50 - $30.00 per jam</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <h6>Berakhir pada tanggal 1 Februari 2024</h6>
                            </div>
                            <div class="col-12 d-flex align-self-center mt-2">
                                <a href="">Lihat Detail <span><svg xmlns="http://www.w3.org/2000/svg" clas="" width="16"
                                            height="16" fill="currentColor" class="bi bi-arrow-right-circle-fill"
                                            viewBox="0 0 16 16">
                                            <path
                                                d="M8 0a8 8 0 1 1 0 16A8 8 0 0 1 8 0M4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5z">
                                            </path>
                                        </svg></span></a>
                            </div>
                        </div>
                    </div>
                </div>



            </div>
            <div class="col">
                <div class="card-body">
                    <div class="card-image">
                        <img src="{{ asset('frontend') }}/assets/image/Picture (1).png" alt="">
                    </div>
                    <div class="card-items-bagde gap-1">
                        <img src="{{ asset('frontend') }}/assets/icons/stop-circle.svg" alt="">
                        <span>Tersedia</span>
                    </div>
                    <div class="card-title-heading-card">
                        <h5 class="col-10 text-truncate">General Manager Operation</h5>
                        <span>ALDI</span>
                    </div>
                    <div class="card-content">
                        <div class="row">
                            <div class="col-1 mt-1">
                                <img src="{{ asset('frontend') }}/assets/image/location.png" alt="">
                            </div>
                            <div class="col-11 mt-2">
                                <h6 class="title-heading fw-bold">Negara</h6>
                                <p>New York, NY</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-1 mt-1">
                                <img src="{{ asset('frontend') }}/assets/icons/document-text.svg" alt="">
                            </div>
                            <div class="col-11 mt-2">
                                <h6 class="title-heading fw-bold">Kontrak Kerja</h6>
                                <p>Full Time</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-1 mt-1">
                                <img src="{{ asset('frontend') }}/assets/icons/Component 1.svg" alt="">
                            </div>
                            <div class="col-11 mt-2">
                                <h6 class="title-heading fw-bold">Gaji</h6>
                                <p>$19.50 - $30.00 per jam</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <h6>Berakhir pada tanggal 1 Februari 2024</h6>
                            </div>
                            <div class="col-12 d-flex align-self-center mt-2">
                                <a href="">Lihat Detail <span><svg xmlns="http://www.w3.org/2000/svg" clas="" width="16"
                                            height="16" fill="currentColor" class="bi bi-arrow-right-circle-fill"
                                            viewBox="0 0 16 16">
                                            <path
                                                d="M8 0a8 8 0 1 1 0 16A8 8 0 0 1 8 0M4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5z">
                                            </path>
                                        </svg></span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col">
                <div class="card-body">
                    <div class="card-image">
                        <img src="{{ asset('frontend') }}/assets/image/Picture (1).png" alt="">
                    </div>
                    <div class="card-items-bagde gap-1">
                        <img src="{{ asset('frontend') }}/assets/icons/stop-circle.svg" alt="">
                        <span>Tersedia</span>
                    </div>
                    <div class="card-title-heading-card">
                        <h5 class="col-12 text-truncate">General Manager Operation</h5>
                        <span>ALDI</span>
                    </div>
                    <div class="card-content">
                        <div class="row">
                            <div class="col-1 mt-1">
                                <img src="{{ asset('frontend') }}/assets/image/location.png" alt="">
                            </div>
                            <div class="col-11 mt-2">
                                <h6 class="title-heading fw-bold">Negara</h6>
                                <p>New York, NY</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-1 mt-1">
                                <img src="{{ asset('frontend') }}/assets/icons/document-text.svg" alt="">
                            </div>
                            <div class="col-11 mt-2">
                                <h6 class="title-heading fw-bold">Kontrak Kerja</h6>
                                <p>Full Time</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-1 mt-1">
                                <img src="{{ asset('frontend') }}/assets/icons/Component 1.svg" alt="">
                            </div>
                            <div class="col-11 mt-2">
                                <h6 class="title-heading fw-bold">Gaji</h6>
                                <p>$19.50 - $30.00 per jam</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <h6>Berakhir pada tanggal 1 Februari 2024</h6>
                            </div>
                            <div class="col-12 d-flex align-self-center mt-2">
                                <a href="">Lihat Detail <span><svg xmlns="http://www.w3.org/2000/svg" clas="" width="16"
                                            height="16" fill="currentColor" class="bi bi-arrow-right-circle-fill"
                                            viewBox="0 0 16 16">
                                            <path
                                                d="M8 0a8 8 0 1 1 0 16A8 8 0 0 1 8 0M4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5z">
                                            </path>
                                        </svg></span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card-body">
                    <div class="card-image">
                        <img src="{{ asset('frontend') }}/assets/image/Picture (1).png" alt="">
                    </div>
                    <div class="card-items-bagde gap-1">
                        <img src="{{ asset('frontend') }}/assets/icons/stop-circle.svg" alt="">
                        <span>Tersedia</span>
                    </div>
                    <div class="card-title-heading-card">
                        <h5 class="col-10 text-truncate">General Manager Operation</h5>
                        <span>ALDI</span>
                    </div>
                    <div class="card-content">
                        <div class="row">
                            <div class="col-1 mt-1">
                                <img src="{{ asset('frontend') }}/assets/image/location.png" alt="">
                            </div>
                            <div class="col-11 mt-2">
                                <h6 class="title-heading fw-bold">Negara</h6>
                                <p>New York, NY</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-1 mt-1">
                                <img src="{{ asset('frontend') }}/assets/icons/document-text.svg" alt="">
                            </div>
                            <div class="col-11 mt-2">
                                <h6 class="title-heading fw-bold">Kontrak Kerja</h6>
                                <p>Full Time</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-1 mt-1">
                                <img src="{{ asset('frontend') }}/assets/icons/Component 1.svg" alt="">
                            </div>
                            <div class="col-11 mt-2">
                                <h6 class="title-heading fw-bold">Gaji</h6>
                                <p>$19.50 - $30.00 per jam</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <h6>Berakhir pada tanggal 1 Februari 2024</h6>
                            </div>
                            <div class="col-12 d-flex align-self-center mt-2">
                                <a href="">Lihat Detail <span><svg xmlns="http://www.w3.org/2000/svg" clas="" width="16"
                                            height="16" fill="currentColor" class="bi bi-arrow-right-circle-fill"
                                            viewBox="0 0 16 16">
                                            <path
                                                d="M8 0a8 8 0 1 1 0 16A8 8 0 0 1 8 0M4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5z">
                                            </path>
                                        </svg></span></a>
                            </div>
                        </div>
                    </div>
                </div>



            </div>
            <div class="col">
                <div class="card-body">
                    <div class="card-image">
                        <img src="{{ asset('frontend') }}/assets/image/Picture (1).png" alt="">
                    </div>
                    <div class="card-items-bagde gap-1">
                        <img src="{{ asset('frontend') }}/assets/icons/stop-circle.svg" alt="">
                        <span>Tersedia</span>
                    </div>
                    <div class="card-title-heading-card">
                        <h5 class="col-10 text-truncate">General Manager Operation</h5>
                        <span>ALDI</span>
                    </div>
                    <div class="card-content">
                        <div class="row">
                            <div class="col-1 mt-1">
                                <img src="{{ asset('frontend') }}/assets/image/location.png" alt="">
                            </div>
                            <div class="col-11 mt-2">
                                <h6 class="title-heading fw-bold">Negara</h6>
                                <p>New York, NY</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-1 mt-1">
                                <img src="{{ asset('frontend') }}/assets/icons/document-text.svg" alt="">
                            </div>
                            <div class="col-11 mt-2">
                                <h6 class="title-heading fw-bold">Kontrak Kerja</h6>
                                <p>Full Time</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-1 mt-1">
                                <img src="{{ asset('frontend') }}/assets/icons/Component 1.svg" alt="">
                            </div>
                            <div class="col-11 mt-2">
                                <h6 class="title-heading fw-bold">Gaji</h6>
                                <p>$19.50 - $30.00 per jam</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <h6>Berakhir pada tanggal 1 Februari 2024</h6>
                            </div>
                            <div class="col-12 d-flex align-self-center mt-2">
                                <a href="">Lihat Detail <span><svg xmlns="http://www.w3.org/2000/svg" clas="" width="16"
                                            height="16" fill="currentColor" class="bi bi-arrow-right-circle-fill"
                                            viewBox="0 0 16 16">
                                            <path
                                                d="M8 0a8 8 0 1 1 0 16A8 8 0 0 1 8 0M4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5z">
                                            </path>
                                        </svg></span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
</section>
<!-- #End -->
<!-- Pagination -->
<div class="container mt-5 mb-5">
    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
            <li class="page-item disabled">
                <a class="page-link">Previous</a>
            </li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item">
                <a class="page-link" href="#">Next</a>
            </li>
        </ul>
    </nav>
</div>
@endsection

@push('css')
    <link rel="stylesheet" href="{{ asset('frontend/css/style.bundle.css') }}">
@endpush