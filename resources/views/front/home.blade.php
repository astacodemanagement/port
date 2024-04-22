@extends('front.app')
@section('title', 'Halaman Awal')
@section('subtitle', 'Menu Awal')

@section('content')


    
            

            <!-- Caraousel Section -->
            <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active"
                        aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1"
                        aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2"
                        aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active" data-bs-interval="1000">
                        <div class="carousel-items">
                            <div class="carousel-items-left">
                                <div class="items-left-text">
                                    <div class="text-heading">
                                        <h6>PT. Sahabat Putra International</h6>
                                    </div>
                                    <div class="carousel-title-heading">
                                        <h1>Siap bantu proses kamu untuk kerja di luar negeri</h1>
                                    </div>
                                    <div class="carousel-text">
                                        <span>Kami adalah Perusahaan yang memiliki lisensi resmi P3MI (Penempatan
                                            Pekerja Migran
                                            Indonesia) dibawah naungan Kementrian Tenaga Kerja</span>
                                    </div>
                                    <div class="carousel-link-button mt-4">
                                        <a href="detailpekerjaan.html">Lihat Pekerjaan Tersedia</a>
                                    </div>
                                </div>
                            </div>
                            <div class="items-right-image">
                                <div class="carousel-image">
                                    <img src="{{ asset('frontend') }}/assets/image/image-header.png" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="carousel-item" data-bs-interval="1000">
                        <div class="carousel-items">
                            <div class="carousel-items-left">
                                <div class="items-left-text">
                                    <div class="text-heading">
                                        <h6>PT. Sahabat Putra International</h6>
                                    </div>
                                    <div class="carousel-title-heading">
                                        <h1>Siap bantu proses kamu untuk kerja di luar negeri</h1>
                                    </div>
                                    <div class="carousel-text">
                                        <span>Kami adalah Perusahaan yang memiliki lisensi resmi P3MI (Penempatan
                                            Pekerja Migran
                                            Indonesia) dibawah naungan Kementrian Tenaga Kerja</span>
                                    </div>
                                    <div class="carousel-link-button mt-4">
                                        <a href="#">Lihat Pekerjaan Tersedia</a>
                                    </div>
                                </div>
                            </div>
                            <div class="items-right-image">
                                <div class="carousel-image">
                                    <img src="{{ asset('frontend') }}/assets/image/image-header.png" alt="">
                                </div>
                            </div>
                        </div>
                    </div> --}}
                    @foreach ($slider as $p)
                    <div class="carousel-item" data-bs-interval="1000">
                        <div class="carousel-items">
                            <div class="carousel-items-left">
                                <div class="items-left-text">
                                    <div class="text-heading">
                                        <h6>PT. Sahabat Putra International</h6>
                                    </div>
                                    <div class="carousel-title-heading">
                                        <h1>{{ $p->nama_slider }}</h1>
                                    </div>
                                    <div class="carousel-text">
                                        <span>{{ $p->keterangan }}</span>
                                    </div>
                                    <div class="carousel-link-button mt-4">
                                        <a href="#">Lihat Pekerjaan Tersedia</a>
                                    </div>
                                </div>
                            </div>
                            <div class="items-right-image">
                                <div class="carousel-image">
                                    <img src="/upload/slider/{{ $p->gambar }}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

            </div>
            <!-- #End -->
  
    </section>


    <!-- Card Items -->
    <section class="Element-card-items">
        <div class="container text-center">
            <div class="row">
                <div class="col">
                    <div class="card-items">
                        <div class="box-items">
                            <img src="{{ asset('frontend') }}/assets/icons/zyro-image 1.png" alt="">
                            <h3 class="fw-bold mt-2" style="color:var(--orange)">10,000</h3>
                        </div>
                        <div class="title-text">
                            <h6 class="fw-reguler mt-3">Jumlah pekerja yang telah mendaftar di
                                “SIPOOL”</h6>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card-items">
                        <div class="box-items">
                            <img src="{{ asset('frontend') }}/assets/icons/zyro-image-2 3.png" alt="">
                            <h3 class="fw-bold mt-2" style="color:var(--orange)">8,000</h3>
                        </div>
                        <div class="title-text">
                            <h6 class="fw-reguler mt-3">Jumlah pekerja yang telah mendapatkan kerja di luar negeri</h6>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card-items">
                        <div class="box-items">
                            <img src="{{ asset('frontend') }}/assets/icons/zyro-image-3 1.png" alt="">
                            <h3 class="fw-bold mt-2" style="color:var(--orange)">10,000</h3>
                        </div>
                        <div class="title-text">
                            <h6 class="fw-reguler mt-3">Jumlah yang telah bekerja <br>
                                di luar negeri</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- #End -->
    <!-- Hero Section -->
    <section class="Element-herosection">
        <div class="container gap-3">
            <div class="title-heading">
                <h1 class="text-center fw-bold">Kenapa harus melalui <span
                        class="
                    bagde p-1">kami</span>?</h1>
            </div>
            <div class="container-sm text-center">
                <div class="row">
                    @foreach ($alasan as $p)
                    <div class="col-sm-3 align-self-top">

                        <div class="element-image">
                            <img src="/upload/alasan/{{ $p->gambar }}" alt="">
                        </div>
                        <div class="title-heading">
                            <h3 class="fw-bold">{{ $p->nama_alasan }}</h3>
                            <span>{{ $p->keterangan }}</span>
                        </div>
                    </div>
                    @endforeach
                    {{-- <div class="col-sm-3 align-self-center mt-5">
                        <div class="element-image">
                            <img src="{{ asset('frontend') }}/assets/icons/image-character-2.png" alt="">
                        </div>
                        <div class="title-heading">
                            <h3 class="fw-bold">Pasti Transparan</h3>
                            <span>Lorem ipsum dolor sit amet consectetur. Ullamcorper tellus amet duis enim dignissim
                                neque nisi sed.</span>
                        </div>
                    </div>
                    <div class="col-sm-3 align-self-top">
                        <div class="element-image">
                            <img src="{{ asset('frontend') }}/assets/icons/image-character-3.png" alt="">
                        </div>
                        <div class="title-heading">
                            <h3 class="fw-bold">Pasti Resmi</h3>
                            <span>Lorem ipsum dolor sit amet consectetur. Ullamcorper tellus amet duis enim dignissim
                                neque nisi sed.</span>
                        </div>
                    </div>
                    <div class="col-sm-3 align-self-end">
                        <div class="element-image">
                            <img src="{{ asset('frontend') }}/assets/icons/image-character-4.png" alt="">
                        </div>
                        <div class="title-heading">
                            <h3 class="fw-bold">Pasti Prosedural</h3>
                            <span>Lorem ipsum dolor sit amet consectetur. Ullamcorper tellus amet duis enim dignissim
                                neque nisi sed.</span>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
    </section>
    <!-- #End -->
    <!-- Tentang Sipol -->
    <section class="Element-about-sipol">
        <div class="container text-center">
            <div class="Element-sipol-tentang-content">
                <div class="title-heading">
                    <h1 class="fw-bold text-white">Tentang <span style="color:var(--orange);">SIPOL</span></h1>
                </div>
                <div class="text-title-sipol">
                    <span class="text-white">SIPOOL adalah halaman khusus Calon Pekerja dimana kandidat bisa memberikan
                        informasi data diri / CV, melamar pekerjaan dan memantau proses kerja ke luar negeri melalui PT
                        PSI secara transparan</span>
                </div>
            </div>
        </div>
    </section>
    <!-- Fitur SIPOL Section -->
    <section class="Element-fitur-sipol">
        <div class="container">
            <div class="title-heading text-center">
                <h1 class="fw-bold">Fitur SIPOOL</h1>
            </div>
            <div class="container d-flex justify-content-evenly">
                <div class="row mt-5">
                    <div class="col-6">
                        <div class="card-fitur-sipool-items">
                            <div class="title-heading">
                                <div class="row">
                                    <div class="col-7">
                                        <h3>Tersedia Menu Lapor Diri</h3>
                                        <div class="text-title">
                                            <span>Khusus yang telah bekerja diluar negeri, wajib perbaharui status kamu
                                                setelah
                                                tiba, selama, dan selesai bekerja di Luar Negeri</span>
                                        </div>
                                    </div>
                                    <div class="col-1 float-end">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-fitur-sipool-danger mt-4">
                            <div class="title-heading">
                                <div class="row">
                                    <div class="col-7">
                                        <h3>Tersedia Menu Keluhan Permasalahan</h3>
                                        <div class="text-title">
                                            <span>Khusus yang telah bekerja diluar negeri, wajib perbaharui status kamu
                                                setelah
                                                tiba, selama, dan selesai bekerja di Luar Negeri</span>
                                        </div>
                                    </div>
                                    <div class="col-1">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 text-center">
                        <div class="card-fitur-sipool-items-r">
                            <div class="title-heading">
                                <h3>All in One</h3>
                            </div>
                            <div class="text-title">
                                <span>Sekali daftar, bisa melamar sampai mendapatkan pekerjaan tanpa isi data diri
                                    lagi.
                                    Selain itu, kamu bisa melacak proses dan kesesuaian data kamu.</span>
                            </div>
                            <div class="image-items mt-4">
                                <img src="{{ asset('frontend') }}/assets/icons/Desktop.png" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- #end -->
    <!-- Section Langkah Kerja -->
    <section class="Element-work-steps">
        <div class="container">
            <div class="title-heading p-4">
                <h1 class="text-center fw-bold"><span style="color: var(--orange);">4 Langkah </span>mudah mendaftar
                    kerja</h1>
            </div>
            <div class="text-center">
                <img src="{{ asset('frontend') }}/assets/image/wrapper.png" alt="">
            </div>
            <div class="text-center mt-5">
                <a href="register.html" class="btn-action">Daftar SIPOL</a>
            </div>
        </div>
        </div>
    </section>
    <!-- Section Lamaran pekerjaan -->
    <section class="Element-application-jobs">
        <div class="container">
            <div class="title-heading text-center">
                <h1 class="fw-bold"><span style="color: var(--orange);">Lihat & lamar pekerjaan</span> yang
                    <br> tersedia untuk kamu
                </h1>
            </div>
            <div class="element-search-items d-flex justify-content-center">
                <div class="row">
                    <div class="col-sm-3">
                        <input type="text" class="form-control form-control-lg" placeholder="Masukan Kata Kunci"
                            aria-label="First name">
                    </div>
                    <div class="col-sm-3">
                        <select class="form-select form-select-lg" aria-label="Large select example">
                            <option selected>Semua Klasifikasi</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                    </div>
                    <div class="col-sm-3">
                        <input type="text" class="form-control form-control-lg" placeholder="Masukan Negara"
                            aria-label="First name">
                    </div>
                    <div class="col-2">
                        <button type="submit">Cari</button>
                    </div>
                </div>
            </div>
            <div class="element-items-card mt-5">
                <div class="row">
                    @foreach ($job as $p)
                    <div class="col-3">
                        <div class="card-body">
                            <div class="card-image">
                                <img src="{{ asset('frontend') }}/assets/image/Picture.png" alt="">
                            </div>
                            <div class="card-items-bagde gap-1">
                                <img src="{{ asset('frontend') }}/assets/icons/stop-circle.svg" alt="">
                                <span>Tersedia</span>
                            </div>
                            <div class="card-title-heading-card">
                                <h5 class="col-10 text-truncate">{{ $p->nama_job }}
                                </h5>
                                <span>{{ $p->nama_perusahaan }}</span>
                            </div>
                            <div class="card-content">
                                <div class="row">
                                    <div class="col-1 mt-1">
                                        <img src="{{ asset('frontend') }}/assets/image/location.png" alt="">
                                    </div>
                                    <div class="col-10 mt-2">
                                        <h6 class="title-heading fw-bold">Negara</h6>
                                        <p>Kalimantan Timur, Indonesia</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-1 mt-1">
                                        <img src="{{ asset('frontend') }}/assets/icons/document-text.svg" alt="">
                                    </div>
                                    <div class="col-10 mt-2">
                                        <h6 class="title-heading fw-bold">Kontrak Kerja</h6>
                                        <p>Full Time</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-1 mt-1">
                                        <img src="{{ asset('frontend') }}/assets/icons/Component 1.svg" alt="">
                                    </div>
                                    <div class="col-10 mt-2">
                                        <h6 class="title-heading fw-bold">Gaji</h6>
                                        <p>Rp 3.000.000</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <h6>Berakhir pada tanggal 1 Februari 2024</h6>
                                    </div>
                                    <div class="col-12 d-flex align-self-center mt-2">
                                        <a href="">Lihat Detail <span><svg xmlns="http://www.w3.org/2000/svg" clas
                                                    width="16" height="16" fill="currentColor"
                                                    class="bi bi-arrow-right-circle-fill" viewBox="0 0 16 16">
                                                    <path
                                                        d="M8 0a8 8 0 1 1 0 16A8 8 0 0 1 8 0M4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5z" />
                                                </svg></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    {{-- <div class="col-3">
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
                                    <div class="col-10 mt-2">
                                        <h6 class="title-heading fw-bold">Negara</h6>
                                        <p>New York, NY</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-1 mt-1">
                                        <img src="{{ asset('frontend') }}/assets/icons/document-text.svg" alt="">
                                    </div>
                                    <div class="col-10 mt-2">
                                        <h6 class="title-heading fw-bold">Kontrak Kerja</h6>
                                        <p>Full Time</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-1 mt-1">
                                        <img src="{{ asset('frontend') }}/assets/icons/Component 1.svg" alt="">
                                    </div>
                                    <div class="col-10 mt-2">
                                        <h6 class="title-heading fw-bold">Gaji</h6>
                                        <p>$19.50 - $30.00 per jam</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <h6>Berakhir pada tanggal 1 Februari 2024</h6>
                                    </div>
                                    <div class="col-12 d-flex align-self-center mt-2">
                                        <a href="">Lihat Detail <span><svg xmlns="http://www.w3.org/2000/svg" clas
                                                    width="16" height="16" fill="currentColor"
                                                    class="bi bi-arrow-right-circle-fill" viewBox="0 0 16 16">
                                                    <path
                                                        d="M8 0a8 8 0 1 1 0 16A8 8 0 0 1 8 0M4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5z" />
                                                </svg></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="card-body">
                            <div class="card-image">
                                <img src="{{ asset('frontend') }}/assets/image/Picture (2).png" alt="">
                            </div>
                            <div class="card-items-bagde gap-1">
                                <img src="{{ asset('frontend') }}/assets/icons/stop-circle.svg" alt="">
                                <span>Tersedia</span>
                            </div>
                            <div class="card-title-heading-card">
                                <h5 class="col-10 text-truncate">Customer Service Representative</h5>
                                <span>New York University</span>
                            </div>
                            <div class="card-content">
                                <div class="row">
                                    <div class="col-1 mt-1">
                                        <img src="{{ asset('frontend') }}/assets/image/location.png" alt="">
                                    </div>
                                    <div class="col-10 mt-2">
                                        <h6 class="title-heading fw-bold">Negara</h6>
                                        <p>New York, NY</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-1 mt-1">
                                        <img src="{{ asset('frontend') }}/assets/icons/document-text.svg" alt="">
                                    </div>
                                    <div class="col-10 mt-2">
                                        <h6 class="title-heading fw-bold">Kontrak Kerja</h6>
                                        <p>Full time & Internship</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-1 mt-1">
                                        <img src="{{ asset('frontend') }}/assets/icons/Component 1.svg" alt="">
                                    </div>
                                    <div class="col-10 mt-2">
                                        <h6 class="title-heading fw-bold">Gaji</h6>
                                        <p>$30.00 per jam</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <h6>Berakhir pada tanggal 1 Februari 2024</h6>
                                    </div>
                                    <div class="col-12 d-flex align-self-center mt-2">
                                        <a href="">Lihat Detail <span><svg xmlns="http://www.w3.org/2000/svg" clas
                                                    width="16" height="16" fill="currentColor"
                                                    class="bi bi-arrow-right-circle-fill" viewBox="0 0 16 16">
                                                    <path
                                                        d="M8 0a8 8 0 1 1 0 16A8 8 0 0 1 8 0M4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5z" />
                                                </svg></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="card-body">
                            <div class="card-image">
                                <img src="{{ asset('frontend') }}/assets/image/Picture (3).png" alt="">
                            </div>
                            <div class="card-items-bagde gap-1">
                                <img src="{{ asset('frontend') }}/assets/icons/stop-circle.svg" alt="">
                                <span>Tersedia</span>
                            </div>
                            <div class="card-title-heading-card">
                                <h5 class="col-10 text-truncate">Budtender/Cashier</h5>
                                <span>ALDI</span>
                            </div>
                            <div class="card-content">
                                <div class="row">
                                    <div class="col-1 mt-1">
                                        <img src="{{ asset('frontend') }}/assets/image/location.png" alt="">
                                    </div>
                                    <div class="col-10 mt-2">
                                        <h6 class="title-heading fw-bold">Negara</h6>
                                        <p>New York, NY</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-1 mt-1">
                                        <img src="{{ asset('frontend') }}/assets/icons/document-text.svg" alt="">
                                    </div>
                                    <div class="col-10 mt-2">
                                        <h6 class="title-heading fw-bold">Kontrak Kerja</h6>
                                        <p>Full Time</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-1 mt-1">
                                        <img src="{{ asset('frontend') }}/assets/icons/Component 1.svg" alt="">
                                    </div>
                                    <div class="col-10 mt-2">
                                        <h6 class="title-heading fw-bold">Gaji</h6>
                                        <p>$31.26 per jam</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <h6>Berakhir pada tanggal 1 Februari 2024</h6>
                                    </div>
                                    <div class="col-12 d-flex align-self-center mt-2">
                                        <a href="">Lihat Detail <span><svg xmlns="http://www.w3.org/2000/svg" clas
                                                    width="16" height="16" fill="currentColor"
                                                    class="bi bi-arrow-right-circle-fill" viewBox="0 0 16 16">
                                                    <path
                                                        d="M8 0a8 8 0 1 1 0 16A8 8 0 0 1 8 0M4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5z" />
                                                </svg></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                    <div class="element-next mt-5 text-center">
                        <a href="detailpekerjaan.html">Lihat lebih lanjut
                            <svg xmlns=" http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-arrow-right" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8" />
                            </svg>
                        </a>
                    </div>
    </section>
    <!-- #End -->

    <!--Section they said-->
    <section class="Elemenet-they-said">
        <div class="container">
            <div class="title-heading">
                <h1 class="text-center fw-bold">Kata mereka yang telah bekerja di <br><span
                        style="color: var(--orange);">luar negeri melalui PSI</span>
                </h1>
            </div>
            <swiper-container class="mySwiper" navigation="true">
                @foreach ($review as $p)
                <swiper-slide>
                    <div class="swiper-items">
                        <div class="swiper-image">
                            <img src="/upload/review/{{ $p->gambar }}" alt="">
                        </div>
                        <div class="swiper-text">
                            <div class="swiper-heading">
                                <span>{{ $p->keterangan }}</span>
                                <p>{{ $p->nama_review }} <span class="fw-semibold">Financial Counselor</span>~</p>
                            </div>
                        </div>
                    </div>
                </swiper-slide>
                @endforeach
                {{-- <swiper-slide>
                    <div class="swiper-items">
                        <div class="swiper-image">
                            <img src="{{ asset('frontend') }}/assets/slider/image.png" alt="">
                        </div>
                        <div class="swiper-text">
                            <div class="swiper-heading">
                                <span>Lacus vestibulum ultricies mi risus, duis non, volutpat nullam non. Magna
                                    congue nisi maecenas elit aliquet eu sed consectetur. Vitae quis cras vitae
                                    praesent morbi adipiscing purus consectetur mi.</span>
                                <p>~ Hellen Jummy - <span class="fw-semibold">Financial Counselor</span>~</p>
                            </div>
                        </div>
                    </div>
                </swiper-slide>
                <swiper-slide>
                    <div class="swiper-items">
                        <div class="swiper-image">
                            <img src="{{ asset('frontend') }}/assets/slider/image.png" alt="">
                        </div>
                        <di class="swiper-text">
                            <div class="swiper-heading">
                                <span>Lacus vestibulum ultricies mi risus, duis non, volutpat nullam non. Magna
                                    congue nisi maecenas elit aliquet eu sed consectetur. Vitae quis cras vitae
                                    praesent morbi adipiscing purus consectetur mi.</span>
                                <p>~ Hellen Jummy - <span class="fw-semibold">Financial Counselor</span>~</p>
                            </div>
                    </div>
                </swiper-slide> --}}

            </swiper-container>
        </div>
    </section>
    <!-- #End -->

@endsection
