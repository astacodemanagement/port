<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from demo.dashboardpack.com/admindek-html/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 31 Jan 2024 00:17:14 GMT -->

<head>
    <title>@yield('title')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">



    <!--[if lt IE 10]>
  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
  <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
  <![endif]-->

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description"
        content="Admindek Bootstrap admin template made using Bootstrap 4 and it has huge amount of ready made feature, UI components, pages which completely fulfills any dashboard needs." />
    <meta name="keywords"
        content="flat ui, admin Admin , Responsive, Landing, Bootstrap, App, Template, Mobile, iOS, Android, apple, creative app">
    <meta name="author" content="colorlib" />

    <link rel="icon" href="{{ asset('template') }}/files/assets/images/favicon.ico" type="image/x-icon">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Quicksand:500,700" rel="stylesheet">

    <link rel="stylesheet" type="text/css"
        href="{{ asset('template') }}/files/bower_components/bootstrap/css/bootstrap.min.css">

    

    <link rel="stylesheet" type="text/css" href="{{ asset('template') }}/files/assets/icon/feather/css/feather.css">

    {{-- <link rel="stylesheet" type="text/css" href="{{ asset('template') }}/files/assets/css/font-awesome-n.min.css"> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" type="text/css" href="{{ asset('template') }}/files/assets/css/style.css">



 

    @stack('css')
</head>

<body>

    <div class="loader-bg">
        <div class="loader-bar"></div>
    </div>

    <div id="pcoded" class="pcoded">
        <div class="pcoded-overlay-box"></div>
        <div class="pcoded-container navbar-wrapper">

            <nav class="navbar header-navbar pcoded-header">
                <div class="navbar-wrapper">
                    <div class="navbar-logo">
                        <a href="{{ route('back-office.home') }}">
                            <img class="img-fluid" src="{{ asset('template') }}/files/assets/images/logo.png"
                                alt="Theme-Logo" />
                        </a>
                        <a class="mobile-menu" id="mobile-collapse" href="#!">
                            <i class="feather icon-menu icon-toggle-right"></i>
                        </a>
                        <a class="mobile-options waves-effect waves-light">
                            <i class="feather icon-more-horizontal"></i>
                        </a>
                    </div>
                    <div class="navbar-container container-fluid">
                        <ul class="nav-left">
                            {{-- <li class="header-search">
                                <div class="main-search morphsearch-search">
                                    <div class="input-group">
                                        <span class="input-group-prepend search-close">
                                            <i class="feather icon-x input-group-text"></i>
                                        </span>
                                        <input type="text" class="form-control" placeholder="Enter Keyword">
                                        <span class="input-group-append search-btn">
                                            <i class="feather icon-search input-group-text"></i>
                                        </span>
                                    </div>
                                </div>
                            </li> --}}
                            <li>
                                <a href="#!" onclick="javascript:toggleFullScreen()"
                                    class="waves-effect waves-light">
                                    <i class="full-screen feather icon-maximize"></i>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav-right">
                            <li class="header-notification">
                                <div class="dropdown-primary dropdown">
                                    <div class="dropdown-toggle" data-toggle="dropdown">
                                        <i class="feather icon-bell"></i>
                                        <span class="badge bg-c-red">5</span>
                                    </div>
                                    <ul class="show-notification notification-view dropdown-menu"
                                        data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                                        <li>
                                            <h6>Notifications</h6>
                                            <label class="label label-danger">New</label>
                                        </li>
                                        <li>
                                            <div class="media">
                                                <img class="img-radius"
                                                    src="{{ asset('template') }}/files/assets/images/avatar-4.jpg"
                                                    alt="Generic placeholder image">
                                                <div class="media-body">
                                                    <h5 class="notification-user">John Doe</h5>
                                                    <p class="notification-msg">Lorem ipsum dolor sit amet, consectetuer
                                                        elit.</p>
                                                    <span class="notification-time">30 minutes ago</span>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="media">
                                                <img class="img-radius"
                                                    src="{{ asset('template') }}/files/assets/images/avatar-3.jpg"
                                                    alt="Generic placeholder image">
                                                <div class="media-body">
                                                    <h5 class="notification-user">Joseph William</h5>
                                                    <p class="notification-msg">Lorem ipsum dolor sit amet,
                                                        consectetuer elit.</p>
                                                    <span class="notification-time">30 minutes ago</span>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="media">
                                                <img class="img-radius"
                                                    src="{{ asset('template') }}/files/assets/images/avatar-4.jpg"
                                                    alt="Generic placeholder image">
                                                <div class="media-body">
                                                    <h5 class="notification-user">Sara Soudein</h5>
                                                    <p class="notification-msg">Lorem ipsum dolor sit amet,
                                                        consectetuer elit.</p>
                                                    <span class="notification-time">30 minutes ago</span>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="header-notification">
                                <div class="dropdown-primary dropdown">
                                    <div class="displayChatbox dropdown-toggle" data-toggle="dropdown">
                                        <i class="feather icon-message-square"></i>
                                        <span class="badge bg-c-green">3</span>
                                    </div>
                                </div>
                            </li>
                            <li class="user-profile header-notification">
                                <div class="dropdown-primary dropdown">
                                    <div class="dropdown-toggle" data-toggle="dropdown">
                                        <img src="{{ asset('template') }}/files/assets/images/avatar-4.jpg"
                                            class="img-radius" alt="User-Profile-Image">
                                        <span>John Doe</span>
                                        <i class="feather icon-chevron-down"></i>
                                    </div>
                                    <ul class="show-notification profile-notification dropdown-menu"
                                        data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                                        <li>
                                            <a href="/pengaturan">
                                                <i class="feather icon-settings"></i> Settings
                                            </a>
                                        </li>
                                        <li>
                                            <a href="/profil">
                                                <i class="feather icon-user"></i> Profile
                                            </a>
                                        </li>
                                        <li>
                                            <form action="{{ route('logout') }}" method="POST" id="form-logout">@csrf</form>
                                            <a href="javascript:void(0)" class="logout" onclick="document.getElementById('form-logout').submit()">
                                                <i class="feather icon-log-out"></i> Logout
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

            <div id="sidebar" class="users p-chat-user showChat">
                <div class="had-container">
                    <div class="p-fixed users-main">
                        <div class="user-box">
                            <div class="chat-search-box">
                                <a class="back_friendlist">
                                    <i class="feather icon-x"></i>
                                </a>
                                <div class="right-icon-control">
                                    <div class="input-group input-group-button">
                                        <input type="text" id="search-friends" name="footer-email"
                                            class="form-control" placeholder="Search Friend">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary waves-effect waves-light" type="button"><i
                                                    class="feather icon-search"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="main-friend-list">
                                <div class="media userlist-box waves-effect waves-light" data-id="1"
                                    data-status="online" data-username="Josephin Doe">
                                    <a class="media-left" href="#!">
                                        <img class="media-object img-radius img-radius"
                                            src="{{ asset('template') }}/files/assets/images/avatar-3.jpg"
                                            alt="Generic placeholder image ">
                                        <div class="live-status bg-success"></div>
                                    </a>
                                    <div class="media-body">
                                        <div class="chat-header">Josephin Doe</div>
                                    </div>
                                </div>
                                <div class="media userlist-box waves-effect waves-light" data-id="2"
                                    data-status="online" data-username="Lary Doe">
                                    <a class="media-left" href="#!">
                                        <img class="media-object img-radius"
                                            src="{{ asset('template') }}/files/assets/images/avatar-2.jpg"
                                            alt="Generic placeholder image">
                                        <div class="live-status bg-success"></div>
                                    </a>
                                    <div class="media-body">
                                        <div class="f-13 chat-header">Lary Doe</div>
                                    </div>
                                </div>
                                <div class="media userlist-box waves-effect waves-light" data-id="3"
                                    data-status="online" data-username="Alice">
                                    <a class="media-left" href="#!">
                                        <img class="media-object img-radius"
                                            src="{{ asset('template') }}/files/assets/images/avatar-4.jpg"
                                            alt="Generic placeholder image">
                                        <div class="live-status bg-success"></div>
                                    </a>
                                    <div class="media-body">
                                        <div class="f-13 chat-header">Alice</div>
                                    </div>
                                </div>
                                <div class="media userlist-box waves-effect waves-light" data-id="4"
                                    data-status="offline" data-username="Alia">
                                    <a class="media-left" href="#!">
                                        <img class="media-object img-radius"
                                            src="{{ asset('template') }}/files/assets/images/avatar-3.jpg"
                                            alt="Generic placeholder image">
                                        <div class="live-status bg-default"></div>
                                    </a>
                                    <div class="media-body">
                                        <div class="f-13 chat-header">Alia<small class="d-block text-muted">10 min
                                                ago</small></div>
                                    </div>
                                </div>
                                <div class="media userlist-box waves-effect waves-light" data-id="5"
                                    data-status="offline" data-username="Suzen">
                                    <a class="media-left" href="#!">
                                        <img class="media-object img-radius"
                                            src="{{ asset('template') }}/files/assets/images/avatar-2.jpg"
                                            alt="Generic placeholder image">
                                        <div class="live-status bg-default"></div>
                                    </a>
                                    <div class="media-body">
                                        <div class="f-13 chat-header">Suzen<small class="d-block text-muted">15 min
                                                ago</small></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="showChat_inner">
                <div class="media chat-inner-header">
                    <a class="back_chatBox">
                        <i class="feather icon-x"></i> Josephin Doe
                    </a>
                </div>
                <div class="main-friend-chat">
                    <div class="media chat-messages">
                        <a class="media-left photo-table" href="#!">
                            <img class="media-object img-radius img-radius m-t-5"
                                src="{{ asset('template') }}/files/assets/images/avatar-2.jpg"
                                alt="Generic placeholder image">
                        </a>
                        <div class="media-body chat-menu-content">
                            <div class>
                                <p class="chat-cont">I'm just looking around. Will you tell me something about
                                    yourself?</p>
                            </div>
                            <p class="chat-time">8:20 a.m.</p>
                        </div>
                    </div>
                    <div class="media chat-messages">
                        <div class="media-body chat-menu-reply">
                            <div class>
                                <p class="chat-cont">Ohh! very nice</p>
                            </div>
                            <p class="chat-time">8:22 a.m.</p>
                        </div>
                    </div>
                    <div class="media chat-messages">
                        <a class="media-left photo-table" href="#!">
                            <img class="media-object img-radius img-radius m-t-5"
                                src="{{ asset('template') }}/files/assets/images/avatar-2.jpg"
                                alt="Generic placeholder image">
                        </a>
                        <div class="media-body chat-menu-content">
                            <div class>
                                <p class="chat-cont">can you come with me?</p>
                            </div>
                            <p class="chat-time">8:20 a.m.</p>
                        </div>
                    </div>
                </div>
                <div class="chat-reply-box">
                    <div class="right-icon-control">
                        <div class="input-group input-group-button">
                            <input type="text" class="form-control" placeholder="Write hear . . ">
                            <div class="input-group-append">
                                <button class="btn btn-primary waves-effect waves-light" type="button"><i
                                        class="feather icon-message-circle"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="pcoded-main-container">
                <div class="pcoded-wrapper">

                    <nav class="pcoded-navbar">
                        <div class="nav-list">
                            <div class="pcoded-inner-navbar main-menu">
                                <div class="pcoded-navigation-label">Dashboard</div>
                                
                                <ul class="pcoded-item pcoded-left-item">
                                    <li class="{{ request()->routeIs('back-office.home') ? 'active' : '' }}" >
                                        <a href="{{ route('back-office.home') }}" class="waves-effect waves-dark " >
                                            <span class="pcoded-micon"><i class="feather icon-home "></i></span>
                                            <span class="pcoded-mtext">Dashboard</span>
                                        </a>
                                    
                                    </li>
                                </ul>
                                <ul class="pcoded-item pcoded-left-item">
                                    <li class="{{ request()->routeIs('back-office.job.index') ? 'active' : '' }}">
                                        <a href="{{ route('back-office.job.index') }}" class="waves-effect waves-dark ">
                                            <span class="pcoded-micon"><i class="feather icon-anchor "></i></span>
                                            <span class="pcoded-mtext">Job</span>
                                        </a>
                                    </li>
                                </ul>
                 
                                <ul class="pcoded-item pcoded-left-item">
                                    <li class="pcoded-hasmenu  {{ request()->routeIs([
                                        'back-office.pengguna.index',
                                        'back-office.negara.index',
                                        'back-office.fasilitas.index',
                                        'back-office.kategori-job.index',
                                        'back-office.slider.index',
                                        'back-office.galeri.index',
                                        'back-office.review.index',
                                        'back-office.faq.index',
                                        'back-office.alasan.index',
                                        'back-office.step.index',
                                        'back-office.supplier.index',
                                        'back-office.agency.index',
                                        'back-office.employer.index',
                                        'other' 
                                    ]) ? 'pcoded-trigger' : '' }}">
                                        <a href="javascript:void(0)" class="waves-effect waves-dark">
                                            <span class="pcoded-micon">
                                                <i class="feather icon-layers"></i>
                                            </span>
                                            <span class="pcoded-mtext">Master</span>
                                        </a>
                                        <ul class="pcoded-submenu" style="{{ request()->routeIs([
                                            'back-office.pengguna.index',
                                            'back-office.negara.index',
                                            'back-office.fasilitas.index',
                                            'back-office.kategori-job.index',
                                            'back-office.slider.index',
                                            'back-office.galeri.index',
                                            'back-office.review.index',
                                            'back-office.faq.index',
                                            'back-office.alasan.index',
                                            'back-office.step.index',
                                            'back-office.supplier.index',
                                            'back-office.agency.index',
                                            'back-office.employer.index',
                                            'other' 
                                        ]) ? 'display: block' : 'display: none' }};">
                                            <li class="{{ request()->routeIs('back-office.pengguna.index') ? 'active' : '' }}">
                                                <a href="{{ route('back-office.pengguna.index') }}" class="waves-effect waves-dark">
                                                    <span class="pcoded-mtext">Pengguna</span>
                                                </a>
                                            </li>
                                            <li class="{{ request()->routeIs('back-office.negara.index') ? 'active' : '' }}">
                                                <a href="{{ route('back-office.negara.index') }}" class="waves-effect waves-dark">
                                                    <span class="pcoded-mtext">Negara</span>
                                                </a>
                                            </li>
                                            <li class="{{ request()->routeIs('back-office.fasilitas.index') ? 'active' : '' }}">
                                                <a href="{{ route('back-office.fasilitas.index') }}" class="waves-effect waves-dark">
                                                    <span class="pcoded-mtext">Fasilitas</span>
                                                </a>
                                            </li>
                                            <li class="{{ request()->routeIs('back-office.kategori-job.index') ? 'active' : '' }}">
                                                <a href="{{ route('back-office.kategori-job.index') }}" class="waves-effect waves-dark">
                                                    <span class="pcoded-mtext">Kategori Job</span>
                                                </a>
                                            </li>
                                            <li class="{{ request()->routeIs('back-office.slider.index') ? 'active' : '' }}">
                                                <a href="{{ route('back-office.slider.index') }}" class="waves-effect waves-dark">
                                                    <span class="pcoded-mtext">Slider</span>
                                                </a>
                                            </li>
                                            <li class="{{ request()->routeIs('back-office.galeri.index') ? 'active' : '' }}">
                                                <a href="{{ route('back-office.galeri.index') }}" class="waves-effect waves-dark">
                                                    <span class="pcoded-mtext">Galeri</span>
                                                </a>
                                            </li>
                                            <li class="{{ request()->routeIs('back-office.review.index') ? 'active' : '' }}">
                                                <a href="{{ route('back-office.review.index') }}" class="waves-effect waves-dark">
                                                    <span class="pcoded-mtext">Review</span>
                                                </a>
                                            </li>
                                            <li class="{{ request()->routeIs('back-office.faq.index') ? 'active' : '' }}">
                                                <a href="{{ route('back-office.faq.index') }}" class="waves-effect waves-dark">
                                                    <span class="pcoded-mtext">FAQ</span>
                                                </a>
                                            </li>
                                            <li class="{{ request()->routeIs('back-office.alasan.index') ? 'active' : '' }}">
                                                <a href="{{ route('back-office.alasan.index') }}" class="waves-effect waves-dark">
                                                    <span class="pcoded-mtext">Alasan</span>
                                                </a>
                                            </li>
                                            <li class="{{ request()->routeIs('back-office.step.index') ? 'active' : '' }}">
                                                <a href="{{ route('back-office.step.index') }}" class="waves-effect waves-dark">
                                                    <span class="pcoded-mtext">Step</span>
                                                </a>
                                            </li>
                                            <li class="{{ request()->routeIs('back-office.supplier.index') ? 'active' : '' }}">
                                                <a href="{{ route('back-office.supplier.index') }}" class="waves-effect waves-dark">
                                                    <span class="pcoded-mtext">Supplier</span>
                                                </a>
                                            </li>
                                            <li class="{{ request()->routeIs('back-office.agency.index') ? 'active' : '' }}">
                                                <a href="{{ route('back-office.agency.index') }}" class="waves-effect waves-dark">
                                                    <span class="pcoded-mtext">Agency</span>
                                                </a>
                                            </li>
                                            <li class="{{ request()->routeIs('back-office.employer.index') ? 'active' : '' }}">
                                                <a href="{{ route('back-office.employer.index') }}" class="waves-effect waves-dark">
                                                    <span class="pcoded-mtext">Employer</span>
                                                </a>
                                            </li>
                                            <li class="{{ request()->routeIs('other') ? 'active' : '' }}">
                                                <a href="/other" class="waves-effect waves-dark">
                                                    <span class="pcoded-mtext">Lainnya</span>
                                                </a>
                                            </li>
                                        </ul>
                                        
                                    </li>
                                   
                                    <li class="pcoded-hasmenu">
                                        <a href="javascript:void(0)" class="waves-effect waves-dark">
                                            <span class="pcoded-micon">
                                                <i class="feather icon-users"></i>
                                            </span>
                                            <span class="pcoded-mtext">Pelamar</span>
                                        </a>
                                        <ul class="pcoded-submenu" style="{{ request()->routeIs([
                                            'back-office.pelamar.index',
                                            'back-office.pelamar.kandidat.index'
                                        ]) ? 'display: block' : 'display: none' }}">
                                        
                                            <li class="{{ request()->fullUrlIs(route('back-office.pelamar.index', ['status' => 'Belum Verifikasi(Pending)'])) ? 'active' : '' }}">
                                                <a data-toggle="tab" href="{{ route('back-office.pelamar.index', ['status' => 'Belum Verifikasi(Pending)']) }}" class="waves-effect waves-dark">
                                                    <span class="pcoded-mtext">Belum Diverifikasi (Pending)</span>
                                                </a>
                                            </li>
                                            <li class="{{ request()->fullUrlIs(route('back-office.pelamar.index', ['status' => 'Verifikasi'])) ? 'active' : '' }}">
                                                <a data-toggle="tab" href="{{ route('back-office.pelamar.index', ['status' => 'Verifikasi']) }}" class="waves-effect waves-dark">
                                                    <span class="pcoded-mtext">Sudah Diverifikasi</span>
                                                </a>
                                            </li>
                                            <li class="{{ request()->fullUrlIs(route('back-office.pelamar.index', ['status' => 'Reject'])) ? 'active' : '' }}">
                                                <a data-toggle="tab" href="{{ route('back-office.pelamar.index', ['status' => 'Reject']) }}" class="waves-effect waves-dark">
                                                    <span class="pcoded-mtext">Reject Verifikasi</span>
                                                </a>
                                            </li>
                                            <li class="{{ request()->routeIs('back-office.pelamar.kandidat.index') ? 'active' : '' }}">
                                                <a data-toggle="tab" href="{{ route('back-office.pelamar.kandidat.index') }}" class="waves-effect waves-dark">
                                                    <span class="pcoded-mtext">Data Kandidat</span>
                                                </a>
                                            </li>
                                        </ul>
                                        
                                    </li>
                                    
                                    <li class="pcoded-hasmenu">
                                        <a href="javascript:void(0)" class="waves-effect waves-dark">
                                            <span class="pcoded-micon">
                                                <i class="feather icon-filter"></i>
                                            </span>
                                            <span class="pcoded-mtext">Proses Seleksi</span>
                                        </a>
                                        <ul class="pcoded-submenu" style="{{ request()->routeIs([
                                            'back-office.seleksi.semua-seleksi',
                                            'back-office.seleksi.seleksi.index',
                                            'back-office.seleksi.seleksi-lolos-kualifikasi',
                                            'back-office.seleksi.seleksi-interview',
                                            'back-office.seleksi.seleksi-lolos-interview',
                                            'back-office.seleksi.seleksi-dalam-proses',
                                            'back-office.seleksi.seleksi-terbang',
                                            'back-office.seleksi.seleksi-selesai-kontrak',
                                            'back-office.seleksi.seleksi-batal'
                                        ]) ? 'display: block' : 'display: none' }}">
                                            <li class="{{ request()->routeIs('back-office.seleksi.semua-seleksi') ? 'active' : '' }}">
                                                <a href="{{ route('back-office.seleksi.semua-seleksi') }}" class="waves-effect waves-dark">
                                                    <span class="pcoded-mtext">All Data</span>
                                                </a>
                                            </li>
                                            <li class="{{ request()->routeIs('back-office.seleksi.seleksi.index') ? 'active' : '' }}">
                                                <a href="{{ route('back-office.seleksi.seleksi.index') }}" class="waves-effect waves-dark">
                                                    <span class="pcoded-mtext">Cek Kualifikasi</span>
                                                </a>
                                            </li>
                                            <li class="{{ request()->routeIs('back-office.seleksi.seleksi-lolos-kualifikasi') ? 'active' : '' }}">
                                                <a href="{{ route('back-office.seleksi.seleksi-lolos-kualifikasi') }}" class="waves-effect waves-dark">
                                                    <span class="pcoded-mtext">Lolos Kualifikasi</span>
                                                </a>
                                            </li>
                                            <li class="{{ request()->routeIs('back-office.seleksi.seleksi-interview') ? 'active' : '' }}">
                                                <a href="{{ route('back-office.seleksi.seleksi-interview') }}" class="waves-effect waves-dark">
                                                    <span class="pcoded-mtext">Interview</span>
                                                </a>
                                            </li>
                                            <li class="{{ request()->routeIs('back-office.seleksi.seleksi-lolos-interview') ? 'active' : '' }}">
                                                <a href="{{ route('back-office.seleksi.seleksi-lolos-interview') }}" class="waves-effect waves-dark">
                                                    <span class="pcoded-mtext">Lolos Interview</span>
                                                </a>
                                            </li>
                                            <li class="{{ request()->routeIs('back-office.seleksi.seleksi-dalam-proses') ? 'active' : '' }}">
                                                <a href="{{ route('back-office.seleksi.seleksi-dalam-proses') }}" class="waves-effect waves-dark">
                                                    <span class="pcoded-mtext">Dalam Proses</span>
                                                </a>
                                            </li>
                                            <li class="{{ request()->routeIs('back-office.seleksi.seleksi-terbang') ? 'active' : '' }}">
                                                <a href="{{ route('back-office.seleksi.seleksi-terbang') }}" class="waves-effect waves-dark">
                                                    <span class="pcoded-mtext">Terbang</span>
                                                </a>
                                            </li>
                                            <li class="{{ request()->routeIs('back-office.seleksi.seleksi-selesai-kontrak') ? 'active' : '' }}">
                                                <a href="{{ route('back-office.seleksi.seleksi-selesai-kontrak') }}" class="waves-effect waves-dark">
                                                    <span class="pcoded-mtext">Selesai Kontrak</span>
                                                </a>
                                            </li>
                                            <li class="{{ request()->routeIs('back-office.seleksi.seleksi-batal') ? 'active' : '' }}">
                                                <a href="{{ route('back-office.seleksi.seleksi-batal') }}" class="waves-effect waves-dark">
                                                    <span class="pcoded-mtext">Batal</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    
                                    
                                     
                                </ul>
                                
                                <ul class="pcoded-item pcoded-left-item">
                                    <li class="pcoded-hasmenu">
                                        <a href="javascript:void(0)" class="waves-effect waves-dark">
                                            <span class="pcoded-micon">
                                                <i class="feather icon-credit-card"></i>
                                            </span>
                                            <span class="pcoded-mtext">Pembayaran</span>
                                        </a>
                                        <ul class="pcoded-submenu" style="{{ request()->routeIs([
                                            'back-office.penempatan',
                                            'back-office.commitment-fee'
                                        ]) ? 'display: block' : 'display: none' }}">
                                            <li class="{{ request()->routeIs('back-office.penempatan') ? 'active' : '' }}">
                                                <a href="{{ route('back-office.penempatan') }}" class="waves-effect waves-dark">
                                                    <span class="pcoded-mtext">Biaya Penempatan</span>
                                                </a>
                                            </li>
                                            <li class="{{ request()->routeIs('back-office.commitment-fee') ? 'active' : '' }}">
                                                <a href="{{ route('back-office.commitment-fee') }}" class="waves-effect waves-dark">
                                                    <span class="pcoded-mtext">Komitmen Fee</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                                
                                <div class="pcoded-navigation-label">Setting</div>
                                
                                <ul class="pcoded-item pcoded-left-item">
                                    <li class="{{ request()->is('pengaturan') ? 'active' : '' }}">
                                        <a href="/pengaturan" class="waves-effect waves-dark">
                                            <span class="pcoded-micon"><i class="feather icon-settings"></i></span>
                                            <span class="pcoded-mtext">Pengaturan Umum</span>
                                        </a>
                                    </li>
                                </ul>
                                <ul class="pcoded-item pcoded-left-item">
                                    <li class="{{ request()->routeIs('back-office.pemasukan.index') ? 'active' : '' }}">
                                        <a href="{{ route('back-office.pemasukan.index') }}" class="waves-effect waves-dark">
                                            <span class="pcoded-micon"><i class="feather icon-corner-down-left"></i></span>
                                            <span class="pcoded-mtext">Pemasukan</span>
                                        </a>
                                    </li>
                                </ul>
                                <ul class="pcoded-item pcoded-left-item">
                                    <li class="{{ request()->routeIs('back-office.pengeluaran.index') ? 'active' : '' }}">
                                        <a href="{{ route('back-office.pengeluaran.index') }}" class="waves-effect waves-dark">
                                            <span class="pcoded-micon"><i class="feather icon-corner-down-right"></i></span>
                                            <span class="pcoded-mtext">Pengeluaran</span>
                                        </a>
                                    </li>
                                </ul>
                                <ul class="pcoded-item pcoded-left-item">
                                    <li class="{{ request()->routeIs('back-office.pengaduan.index') ? 'active' : '' }}">
                                        <a href="{{ route('back-office.pengaduan.index') }}" class="waves-effect waves-dark">
                                            <span class="pcoded-micon"><i class="feather icon-phone-call"></i></span>
                                            <span class="pcoded-mtext">Pengaduan</span>
                                        </a>
                                    </li>
                                </ul>
                                <ul class="pcoded-item pcoded-left-item">
                                    <li class="{{ request()->routeIs('back-office.log-histori.index') ? 'active' : '' }}">
                                        <a href="{{ route('back-office.log-histori.index') }}" class="waves-effect waves-dark">
                                            <span class="pcoded-micon"><i class="feather icon-message-circle"></i></span>
                                            <span class="pcoded-mtext">Log Histori</span>
                                        </a>
                                    </li>
                                </ul>
                                <ul class="pcoded-item pcoded-left-item">
                                    <li class="">
                                        <a href="/home" target="_blank" class="waves-effect waves-dark">
                                            <span class="pcoded-micon"><i class="feather icon-globe"></i></span>
                                            <span class="pcoded-mtext">Lihat Website</span>
                                        </a>
                                    </li>
                                </ul>
                                
                                <ul class="pcoded-item pcoded-left-item">
                                    <li class>
                                         
                                       
                                        <a href="javascript:void(0)" class="logout" onclick="document.getElementById('form-logout').submit()">
                                            <span class="pcoded-micon"><i class="feather icon-log-out"></i></span>
                                            <span class="pcoded-mtext">Logout</span>
                                        </a>
                                    </li>
                                </ul>
                                
                                
                            </div>
                        </div>
                    </nav>
                    @yield('content')
                    <div id="styleSelector">
                    </div>

                </div>
            </div>
        </div>
    </div>


 
 
    <script type="text/javascript" src="{{ asset('template') }}/files/bower_components/jquery/js/jquery.min.js"></script>
    <script type="text/javascript" src="{{ asset('template') }}/files/bower_components/jquery-ui/js/jquery-ui.min.js">
    </script>
    <script type="text/javascript" src="{{ asset('template') }}/files/bower_components/popper.js/js/popper.min.js">
    </script>
    <script type="text/javascript" src="{{ asset('template') }}/files/bower_components/bootstrap/js/bootstrap.min.js">
    </script>

    <script src="{{ asset('template') }}/files/assets/pages/waves/js/waves.min.js"></script>

    <script type="text/javascript" src="{{ asset('template') }}/files/bower_components/jquery-slimscroll/js/jquery.slimscroll.js"></script>

    <script src="{{ asset('template') }}/files/assets/pages/chart/float/jquery.flot.js"></script>
    <script src="{{ asset('template') }}/files/assets/pages/chart/float/jquery.flot.categories.js"></script>
    <script src="{{ asset('template') }}/files/assets/pages/chart/float/curvedLines.js"></script>
    <script src="{{ asset('template') }}/files/assets/pages/chart/float/jquery.flot.tooltip.min.js"></script>

  
    <script src="{{ asset('template') }}/files/assets/js/pcoded.min.js"></script>
    <script src="{{ asset('template') }}/files/assets/js/vertical/vertical-layout.min.js"></script>
    <script type="text/javascript" src="{{ asset('template') }}/files/assets/js/script.min.js"></script>
    <script>const baseUrl='{{route('back-office.home')}}'</script>
    @stack('script')
    
</body>

</html>
