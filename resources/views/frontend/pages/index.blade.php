@extends('frontend.frontend_master')
@section('frontend-content')
    <div style="background-color: #DAF1FF">
        <div id="carouselHome" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselHome" data-slide-to="0" class="active"></li>
                <li data-target="#carouselHome" data-slide-to="1"></li>
                <li data-target="#carouselHome" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-5">
                                <div class="vertical-center">
                                    <p><b>PT. Sahabat Putra International</b></p>
                                    <h1>
                                        <b>Siap bantu proses <br> kamu untuk kerja <br> di luar negeri</b>
                                    </h1>
                                    <p>Kami adalah Perusahaan yang memiliki lisensi resmi P3MI <br> (Penempatan Pekerja
                                        Migran
                                        Indonesia) dibawah naungan <br> Kementrian Tenaga Kerja</p>
                                    <div class="btn-box">
                                        <a href="" class="btn btn-secondary"> Lihat Pekerjaan Tersedia <i
                                                class="bi bi-arrow-right"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-7">
                                <div class="img-box">
                                    <img class="" src="{{ asset('frontend/imgs/header1.png') }}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-5">
                                <div>
                                    <p>PT. Sahabat Putra International</p>
                                    <h1>
                                        Siap bantu proses <br> kamu untuk kerja <br> di luar negeri
                                    </h1>
                                    <p>Kami adalah Perusahaan yang memiliki lisensi resmi P3MI (Penempatan Pekerja Migran
                                        Indonesia)
                                        dibawah naungan Kementrian Tenaga Kerja</p>
                                    <div class="btn-box">
                                        <a href="" class="btn btn-secondary"> Lihat Pekerjaan Tersedia</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-7">
                                <div class="img-box">
                                    <img src="{{ asset('frontend/imgs/banner1.png') }}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-5">
                                <div>
                                    <p>PT. Sahabat Putra International</p>
                                    <h1>
                                        Siap bantu proses <br> kamu untuk kerja <br> di luar negeri
                                    </h1>
                                    <p>Kami adalah Perusahaan yang memiliki lisensi resmi P3MI (Penempatan Pekerja Migran
                                        Indonesia)
                                        dibawah naungan Kementrian Tenaga Kerja</p>
                                    <div class="btn-box">
                                        <a href="" class="btn btn-secondary"> Lihat Pekerjaan Tersedia</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-7">
                                <div class="img-box">
                                    <img src="{{ asset('frontend/imgs/banner2.png') }}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="blog">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="card-ads">
                        <div class="card-ads-body">
                            <div class="card-ads-body deck">
                                <img class="img" src="{{ asset('frontend/imgs/zyro-1.png') }}" alt="">
                                <h3 class="title"><b>8,000</b></h3>
                            </div>
                            <p class="text">Jumlah pekerja yang telah mendaftar di “SIPOOL”</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card-ads">
                        <div class="card-ads-body">
                            <div class="card-ads-body deck">
                                <img class="img" src="{{ asset('frontend/imgs/zyro-2.png') }}" alt="">
                                <h3 class="title"><b>10,000</b></h3>
                            </div>
                            <p class="text">Jumlah pekerja yang telah mendapatkan kerja di luar negeri</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card-ads">
                        <div class="card-ads-body">
                            <div class="card-ads-body deck">
                                <img class="img" src="{{ asset('frontend/imgs/zyro-3.png') }}" alt="">
                                <h3 class="title"><b>13,000</b></h3>
                            </div>
                            <p class="text">Jumlah yang telah bekerja di luar negeri</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="blog">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="haading" style="text-align: center">
                        <h1 style="padding-bottom: 50px"><b>Kenapa Harus Melalui <a class="text-light bg-orange">
                                    Kami</a> ?</b></h1 style="padding-bottom: 50px">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="card-top">
                        <img class="card-top img" src="{{ asset('frontend/imgs/whyus1.png') }}" alt="">
                        <h4 class="title">Pasti Jaminan</h4>
                        <p class="text">Lorem ipsum dolor sit amet consectetur. Ullamcorper tellus amet duis enim
                            dignissim
                            neque nisi sed.</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card-buttom">
                        <img class="card-buttom img" src="{{ asset('frontend/imgs/whyus2.png') }}" alt="">
                        <h4 class="title">Pasti Transparan</h4>
                        <p class="text">Lorem ipsum dolor sit amet consectetur. Ullamcorper tellus amet duis enim
                            dignissim
                            neque nisi sed.</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card-top">
                        <img class="card-top img" src="{{ asset('frontend/imgs/whyus3.png') }}" alt="">
                        <h4 class="title">Pasti Resmi</h4>
                        <p class="text">Lorem ipsum dolor sit amet consectetur. Ullamcorper tellus amet duis enim
                            dignissim neque nisi sed.</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card-buttom">
                        <img class="card-buttom img" src="{{ asset('frontend/imgs/whyus4.png') }}" alt="">
                        <h4 class="title">Pasti Prosedural</h4>
                        <p class="text">Lorem ipsum dolor sit amet consectetur. Ullamcorper tellus amet duis enim
                            dignissim neque nisi sed.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card-about">
                    <div class="body">
                        <h2 class="title">
                            Tentang <a style="color:rgb(231, 121, 54)">SIPOOL</a>
                        </h2>
                        <p class="text">
                            SIPOOL adalah halaman khusus Calon Pekerja dimana kandidat bisa memberikan informasi data
                            diri / CV, melamar pekerjaan dan memantau proses kerja ke luar negeri melalui PT PSI secara
                            transparan
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="blog">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="haading" style="text-align: center">
                        <h1 style="padding-bottom: 50px"><b>Fitur SIPOOL</b></h1>
                    </div>
                </div>

                <div class="col-md-5">
                    <div class="card-feature-left">
                        <div class="body">
                            <h3 class="title">Tersedia Menu Lapor Diri</h3>
                            <p class="text">Khusus yang telah bekerja diluar negeri, wajib perbaharui status kamu setelah
                                tiba, selama, dan selesai bekerja di Luar Negeri</p>
                        </div>
                    </div>
                    <div class="card-feature-left">
                        <div class="body">
                            <h3 class="title">Tersedia Menu Keluhan Permasalahan</h3>
                            <p class="text">Sebelum atau selama bekerja kamu memiliki keluhan ? sampaikan kepada kami</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="card-feature-right">
                        <div class="body">
                            <h3 class="title">All in One</h3>
                            <p class="text">Sekali daftar, bisa melamar sampai mendapatkan pekerjaan tanpa isi data diri
                                lagi. Selain itu, kamu bisa melacak proses dan kesesuaian data kamu.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="blog">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="haading" style="text-align: center">
                        <h1 style="padding-bottom: 50px"><b><a style="color:rgb(231, 121, 54)">4 Langkah Mudah </a>
                                Mendaftar Kerja </b></h1>
                    </div>
                </div>

                <div class="col-md-12">
                    {{-- <div class="tab-timline" role="tabpanel">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active">
                                <a href="#Section1" aria-controls="home" role="tab"
                                    data-toggle="tab"><span>2017</span></a>
                            </li>
                            <li role="presentation">
                                <a href="#Section2" aria-controls="profile" role="tab"
                                    data-toggle="tab"><span>2016</span></a>
                            </li>
                            <li role="presentation">
                                <a href="#Section3" aria-controls="messages" role="tab"
                                    data-toggle="tab"><span>2015</span></a>
                            </li>
                            <li role="presentation">
                                <a href="#Section4" aria-controls="about" role="tab"
                                    data-toggle="tab"><span>2014</span></a>
                            </li>
                            <li role="presentation">
                                <a href="#Section5" aria-controls="contact" role="tab"
                                    data-toggle="tab"><span>2013</span></a>
                            </li>
                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content tabs">
                            <div role="tabpanel" class="tab-pane fade in active" id="Section1">
                                <h3>2017</h3>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras nec urna
                                    aliquam, ornare eros vel, malesuada lorem. Nullam faucibus lorem at eros
                                    consectetur lobortis. Maecenas nec nibh congue, placerat sem id,
                                    rutrum velit. Phasellus porta enim at facilisis condimentum. Maecenas
                                    pharetra dolor vel elit tempor pellentesque sed sed eros. Aenean vitae
                                    mauris tincidunt, imperdiet orci semper, rhoncus ligula. Vivamus
                                    scelerisque.
                                </p>
                            </div>
                            <div role="tabpanel" class="tab-pane fade" id="Section2">
                                <h3>2016</h3>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras nec urna
                                    aliquam, ornare eros vel, malesuada lorem. Nullam faucibus lorem at eros
                                    consectetur lobortis. Maecenas nec nibh congue, placerat sem id,
                                    rutrum velit. Phasellus porta enim at facilisis condimentum. Maecenas
                                    pharetra dolor vel elit tempor pellentesque sed sed eros. Aenean vitae
                                    mauris tincidunt, imperdiet orci semper, rhoncus ligula. Vivamus
                                    scelerisque.
                                </p>
                            </div>
                            <div role="tabpanel" class="tab-pane fade" id="Section3">
                                <h3>2015</h3>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras nec urna
                                    aliquam, ornare eros vel, malesuada lorem. Nullam faucibus lorem at eros
                                    consectetur lobortis. Maecenas nec nibh congue, placerat sem id,
                                    rutrum velit. Phasellus porta enim at facilisis condimentum. Maecenas
                                    pharetra dolor vel elit tempor pellentesque sed sed eros. Aenean vitae
                                    mauris tincidunt, imperdiet orci semper, rhoncus ligula. Vivamus
                                    scelerisque.
                                </p>
                            </div>
                            <div role="tabpanel" class="tab-pane fade" id="Section4">
                                <h3>2014</h3>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras nec urna
                                    aliquam, ornare eros vel, malesuada lorem. Nullam faucibus lorem at eros
                                    consectetur lobortis. Maecenas nec nibh congue, placerat sem id,
                                    rutrum velit. Phasellus porta enim at facilisis condimentum. Maecenas
                                    pharetra dolor vel elit tempor pellentesque sed sed eros. Aenean vitae
                                    mauris tincidunt, imperdiet orci semper, rhoncus ligula. Vivamus
                                    scelerisque.
                                </p>
                            </div>
                            <div role="tabpanel" class="tab-pane fade" id="Section5">
                                <h3>2013</h3>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras nec urna
                                    aliquam, ornare eros vel, malesuada lorem. Nullam faucibus lorem at eros
                                    consectetur lobortis. Maecenas nec nibh congue, placerat sem id,
                                    rutrum velit. Phasellus porta enim at facilisis condimentum. Maecenas
                                    pharetra dolor vel elit tempor pellentesque sed sed eros. Aenean vitae
                                    mauris tincidunt, imperdiet orci semper, rhoncus ligula. Vivamus
                                    scelerisque.
                                </p>
                            </div>
                        </div>
                    </div> --}}

                    {{-- <div class="horizontal-timeline">

                        <ul class="list-inline items">
                            <li class="list-inline-item items-list">
                                <div class="px-4">
                                    <div class="event-date badge bg-info">2 June</div>
                                    <h5 class="pt-2">Event One</h5>
                                    <p class="text-muted">It will be as simple as occidental in fact it will be Occidental
                                        Cambridge
                                        friend</p>
                                    <div>
                                        <a href="#" class="btn btn-primary btn-sm">Read more</a>
                                    </div>
                                </div>
                            </li>
                            <li class="list-inline-item items-list">
                                <div class="px-4">
                                    <div class="event-date badge bg-success">5 June</div>
                                    <h5 class="pt-2">Event Two</h5>
                                    <p class="text-muted">Everyone realizes why a new common language one could refuse
                                        translators.
                                    </p>
                                    <div>
                                        <a href="#" class="btn btn-primary btn-sm">Read more</a>
                                    </div>
                                </div>
                            </li>
                            <li class="list-inline-item items-list">
                                <div class="px-4">
                                    <div class="event-date badge bg-danger">7 June</div>
                                    <h5 class="pt-2">Event Three</h5>
                                    <p class="text-muted">If several languages coalesce the grammar of the resulting simple
                                        and
                                        regular</p>
                                    <div>
                                        <a href="#" class="btn btn-primary btn-sm">Read more</a>
                                    </div>
                                </div>
                            </li>
                            <li class="list-inline-item items-list">
                                <div class="px-4">
                                    <div class="event-date badge bg-warning">8 June</div>
                                    <h5 class="pt-2">Event Four</h5>
                                    <p class="text-muted">Languages only differ in their pronunciation and their most
                                        common words.
                                    </p>
                                    <div>
                                        <a href="#" class="btn btn-primary btn-sm">Read more</a>
                                    </div>
                                </div>
                            </li>
                        </ul>

                    </div> --}}

                </div>
            </div>
        </div>

        <div class="blog">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="haading" style="text-align: center">
                            <h1 style="padding-bottom: 50px"><b><a style="color:rgb(231, 121, 54)">Lihat & lamar pekerjaan
                                    </a>
                                    yang tersedia untuk kamu</b></h1>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="card" style="width: 18rem;">
                        <img src="{{ asset('frontend/imgs/job1.png') }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Conservation Acquisition Representative -
                                Yogyakarta</h5>
                            <p class="card-text">PT Padma Raharja Sentosa</p>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><i class="bi bi-geo-alt-fill" style="color:#E77936"></i>
                                <b>Negara</b>
                            </li>
                            <li class="list-group-item"><i class="bi bi-file-text-fill" style="color:#e77936"></i>
                                <b>Kontrak Kerja</b>
                            </li>
                            <li class="list-group-item"><i class="bi bi-coin" style="color:#e77936"></i> <b>Gaji</b></li>
                        </ul>
                        <div class="card-body">
                            <h5><a href="#" class="card-link" style="color: #E77936">
                                    Lihat Detail <i class="bi bi-arrow-right-circle"></i>
                                </a></h5>
                        </div>
                    </div>
                    <div class="card" style="width: 18rem;">
                        <img src="{{ asset('frontend/imgs/job2.png') }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">General Manager Operation</h5>
                            <p class="card-text">ALDI</p>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><i class="bi bi-geo-alt-fill" style="color:#E77936"></i>
                                <b>Negara</b>
                            </li>
                            <li class="list-group-item"><i class="bi bi-file-text-fill" style="color:#e77936"></i>
                                <b>Kontrak Kerja</b>
                            </li>
                            <li class="list-group-item"><i class="bi bi-coin" style="color:#e77936"></i> <b>Gaji</b></li>
                        </ul>
                        <div class="card-body">
                            <h5><a href="#" class="card-link" style="color: #E77936">
                                    Lihat Detail <i class="bi bi-arrow-right-circle"></i>
                                </a></h5>
                        </div>
                    </div>
                    <div class="card" style="width: 18rem;">
                        <img src="{{ asset('frontend/imgs/job3.png') }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Customer Service Representative</h5>
                            <p class="card-text">New York University</p>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><i class="bi bi-geo-alt-fill" style="color:#E77936"></i>
                                <b>Negara</b>
                            </li>
                            <li class="list-group-item"><i class="bi bi-file-text-fill" style="color:#e77936"></i>
                                <b>Kontrak Kerja</b>
                            </li>
                            <li class="list-group-item"><i class="bi bi-coin" style="color:#e77936"></i> <b>Gaji</b></li>
                        </ul>
                        <div class="card-body">
                            <h5><a href="#" class="card-link" style="color: #E77936">
                                    Lihat Detail <i class="bi bi-arrow-right-circle"></i>
                                </a></h5>
                        </div>
                    </div>
                    <div class="card" style="width: 18rem;">
                        <img src="{{ asset('frontend/imgs/job4.png') }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Budtender/Cashier</h5>
                            <p class="card-text">ALDI</p>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><i class="bi bi-geo-alt-fill" style="color:#E77936"></i>
                                <b>Negara</b>
                            </li>
                            <li class="list-group-item"><i class="bi bi-file-text-fill" style="color:#e77936"></i>
                                <b>Kontrak Kerja</b>
                            </li>
                            <li class="list-group-item"><i class="bi bi-coin" style="color:#e77936"></i> <b>Gaji</b></li>
                        </ul>
                        <div class="card-body">
                            <h5><a href="#" class="card-link" style="color: #E77936">
                                    Lihat Detail <i class="bi bi-arrow-right-circle"></i>
                                </a></h5>
                        </div>
                    </div>

                </div>
                <div class="row" style="margin-top: 30px">
                    <div class="d-flex justify-content-center">
                        <a href="" class="btn btn-outline-dark"> Lihat Pekerjaan Tersedia <i
                                class="bi bi-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="blog" style="background-color: #DAF1FF">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="haading" style="text-align: center">
                            <h1 style="padding-bottom: 50px"><b>Kata mereka yang telah bekerja di
                                    <a style="color:rgb(231, 121, 54)">luar negeri melalui PSI</a></b></h1>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <img class="img-fluid rounded-circle" src="{{ asset('frontend/imgs/t2.jpg') }}">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <p class="card-text">Lacus vestibulum ultricies mi risus, duis non, volutpat nullam non. Magna
                                congue nisi maecenas elit aliquet eu sed consectetur. Vitae quis cras vitae praesent morbi
                                adipiscing purus consectetur mi.</p>
                            <h5 class="card-title">Hellen Jummy</h5>
                            <small class="text-body-secondary">- Financial Counselor</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
