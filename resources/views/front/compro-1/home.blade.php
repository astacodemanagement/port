@extends('front.compro-1.layouts.app')
@section('title', 'Home')
@section('subtitle', 'Menu Awal')

@section('content')
    <section class="Element-nav-items">
        <div class="container">
            @include('front.compro-1.layouts.navbar')
            <!-- Caraousel Section -->
            <div id="slider" class="carousel carousel-dark slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
      

                    @php
                        $i = 0;
                        $count = app\Models\Slider::count() + 1;


                    @endphp
                    @while ($i < $count)

                        <button type="button" data-bs-target="#slider" data-bs-slide-to="{{ $i }}"
                            class="{{ $i == 0 ? 'active' : '' }}" aria-current="true" aria-label="Slide {{ $i + 1 }}"></button>
                        @php
                            $i++;
                        @endphp
                    @endwhile
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
              
                    @foreach ($slider as $p)
                        <div class="carousel-item" data-bs-interval="10000" >
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
                <a class="carousel-control-prev" href="#slider" role="button" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#slider" role="button" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
            <!-- #End -->
        </div>
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
                                <img src="/upload/alasan/{{ $p->gambar }}" alt="" width="100%">
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
    <!-- #End -->

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
    <!-- #End -->

    <!-- Section Langkah Kerja -->
    <section class="Element-work-steps">
        <div class="container">
            <div class="title-heading p-4">
                <h1 class="text-center fw-bold"><span style="color: var(--orange);">4 Langkah </span>mudah mendaftar
                    kerja</h1>
            </div>
            <!-- <div class="text-center">
                <img src="{{ asset('frontend') }}/assets/image/wrapper.png" alt="">
            </div> -->
            
            <div class="d-flex" style="align-items: center; justify-content: start;">
                @foreach ($step as $s  )
                    <div class="" style="width: 25%; display: flex; justify-content: center; align-items:center; flex-direction: column;">
                        <img src="/upload/step/{{$s->gambar}}" width="100" alt="" style="margin: auto; align-items:center;">
                        <div class="text-center mt-3">
                            <h6 class="fw-bold">{{ $s->nama_step }}</h6>
                            <span>{{ $s->keterangan }}</span>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="text-center mt-5">
                <a href="{{ route('register') }}" class="btn-action">Daftar SIPOL</a>
            </div>
        </div>
    </section>
    <!-- #End -->

    <!-- Section Lamaran pekerjaan -->
    <section class="Element-application-jobs">
        <div class="container">
            <div class="title-heading text-center">
                <h1 class="fw-bold"><spanan style="color: var(--orange);">Lihat & lamar pekerjaan</span> yang
                    <br> tersedia untuk kamu
                </h1>
            </div>
        <div class="element-search-items d-flex justify-content-center">
                <form id="search-form">
                @csrf
                    <div class="row">
                        <div class="col-sm-5">
                            <input type="text" class="form-control form-control-lg" placeholder="Masukan Kata Kunci"
                                aria-label="First name" id="search-input" name="query">
                        </div>
                        <!-- <div class="col-sm-3">
                            <select class="form-select form-select-lg" aria-label="Large select example">
                                <option selected>Semua Klasifikasi</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div> -->
                        <div class="col-sm-5">
                         <select class="form-select form-select-lg" id="negara-select" aria-label="Large select example">
                      
                             @foreach ($negara as $item )
                                <option value="{{$item->id}}">{{$item->nama_negara}}</option>

                                 
                             @endforeach
                            </select>   
                        </div>
                        <div class="col-2">
                            <button type="submit">Cari</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="element-items-card mt-5" >
                <div class="row" id="jobs-container">
                    @foreach ($jobs as $job)
                        <div class="col-3">
                            <div class="card-body">
                                <div class="card-image job-image-container">
                                    <a href="{{ route('front.jobs.show', hashId($job->id)) }}"><img class="lazy" src="{{ asset('images/placeholder-image.png') }}" data-src="{{ asset('upload/gambar/' . $job->gambar) }}" onerror="this.src='{{ asset('images/no-image-580.png') }}'" alt="{{ $job->nama_job }}"></a>
                                </div>
                                <div class="card-items-bagde gap-1">
                                    <img src="{{ asset('frontend') }}/assets/icons/stop-circle.svg" alt="">
                                    <span>Tersedia</span>
                                </div>
                                <div class="card-title-heading-card">
                                    <h5 class="col-10 text-truncate"><a href="{{ route('front.jobs.show', hashId($job->id)) }}">{{ $job->nama_job }}</a></h5>
                                    <span>{{ $job->nama_perusahaan }}</span>
                                </div>
                                <div class="card-content">
                                    <div class="row">
                                        <div class="col-1 mt-1">
                                            <img src="{{ asset('frontend') }}/assets/image/location.png" alt="">
                                        </div>
                                        <div class="col-10 mt-2">
                                            <h6 class="title-heading fw-bold">Negara</h6>
                                            <p>{{ $job->negara?->nama_negara }}</p>
                                        </div>
                                    </div>
                                   
                                    <div class="row">
                                        <div class="col-1 mt-1">
                                            <img src="{{ asset('frontend') }}/assets/icons/Component 1.svg"
                                                alt="">
                                        </div>
                                        <div class="col-10 mt-2">
                                            <h6 class="title-heading fw-bold">Gaji</h6>
                                            <p>{{ $job->gaji ?? '-' }}</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 ">
                                            <h6>Berakhir pada {{ $job->tanggal_tutup ? \Carbon\Carbon::parse($job->tanggal_tutup)->format('d F Y') : '-' }}</h6>
                                        </div>
                                        <div class="col-12 d-flex align-self-center mt-2">
                                            <a href="{{ route('front.jobs.show', hashId($job->id)) }}">Lihat Detail
                                                <span>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right-circle-fill" viewBox="0 0 16 16">
                                                    <path d="M8 0a8 8 0 1 1 0 16A8 8 0 0 1 8 0M4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5z"></path>
                                                </svg>
                                                </span>
                                            </a>
                                            @if (auth()?->user()?->kandidat?->pendaftaran?->status == "Verifikasi")
                                  
                                            <a href="{{ route('front.jobs.apply', hashId($job->id)) }}" class="mx-4">Lamar Pekerjaan
                                                <span>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-send-fill " viewBox="0 0 16 16">
                                                    <path d="M15.964.686a.5.5 0 0 0-.672-.672L.854 7.854a.5.5 0 0 0 .112.832l4.241 1.696 1.696 4.24a.5.5 0 0 0 .832.113L15.964.686zM6.81 10.38L5.62 8.792l5.826-5.826-4.637 7.414z"></path>
                                                </svg>
                                                </span>
                                            </a>
                                            @endif
                                        </div>

                                            <div class="col-12 d-flex align-self-center mt-2">
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <div class="element-next mt-5 text-center">
                        <a href="{{ route('front.jobs.index') }}">Lihat lebih lanjut
                            <svg xmlns=" http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-arrow-right" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
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
                                <img src="{{ asset('upload/review/' . $p->gambar ) }}" alt="" width="100%">
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
            </swiper-container>
        </div>
    </section>
    <!-- #End -->
@endsection

@push('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vanilla-lazyload/19.1.3/lazyload.min.js" integrity="sha512-VMl48m6saA54JWGUPVnSqp9gDFdJ1XPIKHAI+SP05D93n+Ma5T8osuxhTnxNvFfc5zVF+bWbxmCCj4EbsWUVyg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        var lazyLoadInstance = new LazyLoad({});
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- search -->
     <script>
        $(document).ready(function() {
            $('#search-form').on('submit', function(e) {
        e.preventDefault();
        let search = $('#search-input').val();
        let negara = $('#negara-select').val(); 
        $.ajax({
            url: `{{route('ajax.job')}}`,
            method: 'GET',
            data: { search: search,negara:negara },
            success: function(response) {
                $('#jobs-container').empty();
                if(response.length > 0) {
                    console.log(response)
                    response.forEach(function(job) {        
                    let jobHtml = (`
                     <div class="col-3 my-3">
                            <div class="card-body">
                                <div class="card-image job-image-container">
                                    <a href=""><img class="lazy" src="{{ asset('images/placeholder-image.png') }}" data-src="/upload/gambar/${job.gambar}" onerror="this.src='{{ asset('images/no-image-580.png') }}'" alt="${job.gambar}"></a>
                                </div>
                                <div class="card-items-bagde gap-1">
                                    <img src="{{ asset('frontend') }}/assets/icons/stop-circle.svg" alt="">
                                    <span>Tersedia</span>
                                </div>
                                <div class="card-title-heading-card">
                                    <h5 class="col-10 text-truncate"><a href="/jobs/${job.hashid}">    ${job.nama_job}</a></h5>
                                    <span>    ${job.nama_perusahaan}</span>
                                </div>
                                <div class="card-content">
                                    <div class="row">
                                        <div class="col-1 mt-1">
                                            <img src="{{ asset('frontend') }}/assets/image/location.png" alt="">
                                        </div>
                                        <div class="col-10 mt-2">
                                            <h6 class="title-heading fw-bold">Negara</h6>
                                            <p>    ${job.nama_negara}</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-1 mt-1">
                                            <img src="{{ asset('frontend') }}/assets/icons/document-text.svg"
                                                alt="">
                                        </div>
                                        <div class="col-10 mt-2">
                                            <h6 class="title-heading fw-bold">Kontrak Kerja</h6>
                                            <p>    ${job.kontrak_kerja}</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-1 mt-1">
                                            <img src="{{ asset('frontend') }}/assets/icons/Component 1.svg"
                                                alt="">
                                        </div>
                                        <div class="col-10 mt-2">
                                            <h6 class="title-heading fw-bold">Gaji</h6>
                                            <p>    ${job.gaji}</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 ">
                                            <h6>Berakhir pada ${job.tanggal_tutup}</h6>
                                        </div>
                                        <div class="col-12 d-flex align-self-center mt-2">
                                            <a href="/jobs/${job.hashid}">Lihat Detail
                                                <span>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right-circle-fill" viewBox="0 0 16 16">
                                                    <path d="M8 0a8 8 0 1 1 0 16A8 8 0 0 1 8 0M4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5z"></path>
                                                </svg>
                                                </span>
                                            </a>
                                            @if (auth()?->user()?->kandidat?->pendaftaran?->status == "Verifikasi")
                                  
                                            <a href="" class="mx-4">Lamar Pekerjaan
                                                <span>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-send-fill " viewBox="0 0 16 16">
                                                    <path d="M15.964.686a.5.5 0 0 0-.672-.672L.854 7.854a.5.5 0 0 0 .112.832l4.241 1.696 1.696 4.24a.5.5 0 0 0 .832.113L15.964.686zM6.81 10.38L5.62 8.792l5.826-5.826-4.637 7.414z"></path>
                                                </svg>
                                                </span>
                                            </a>
                                            @endif
                                        </div>

                                            <div class="col-12 d-flex align-self-center mt-2">
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>  
                    
                        `);
                        $('#jobs-container').append(jobHtml );

                });
            }else{
                $('#jobs-container').append(`<p>gak ada job</p>`);
            }
            
        } 
        });
    })
        });
     </script>
@endpush