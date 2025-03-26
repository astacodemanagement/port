<!-- Navbar Navigation -->
@php
    if (request()->host() == "putrasi.id"){
        $setting = App\Models\Setting::where('compro',1)->first();
    }    
    else{
        $setting = App\Models\Setting::where('compro',1)->first();
    }
@endphp
@push('css')
    <style>
.logo {
    width: 80px;
}

.nav-link{
    color: var(--text-w);
}

@media (min-width: 700px) {
    .nav-menu {
        display: flex;
        align-items: center;
        background: transparent; 
        margin-top: 10px;
    }

    .auth-buttons {
        display: flex;
        visibility: visible;
    }

    .nav-link:hover {
        color: var(--orange); 
    }
.nav-link{
    margin-left: 2rem;
    margin-right: 2rem;
}

    .auth-buttons a {
        margin: 0 10px;
        text-decoration: none;
        font-weight: 600;
        color: var(--text-w); 
    }

    .hamburger {
        display: none;
    }

    .navbar .navbar-brand span {
        color: var(--text-w); 
    }
}

@media (max-width: 767px) {
    .logo {
        width: 50px;
    }

    .nav-menu {
        display: none;
        flex-direction: column;
        background-color: var(--biru-n);
        position: absolute;
        top: 60px;
        left: 0;
        right: 0;
        margin-top: 1.7rem;
        border-radius: 8px;
        padding: 20px;
        z-index: -1;
        box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        border-top: 1px solid rgba(255, 255, 255, 0.1);
    }

    input[type="checkbox"]:checked ~ .nav-menu {
        display: flex;
    }

    .hamburger {
        display: block;
        cursor: pointer;
        font-size: 30px;
        color: #fff;
        border: none;
        background: none;
        padding: 10px;
    }

    .nav-link {
        color: var(--text-w);
        text-decoration: none;
        padding: 12px;
        margin: 0;
        font-size: 16px;
    }

    .nav-link:hover {
        color: var(--orange);
        text-decoration: none;
    }
  
    .auth-buttons a {
        color: var(--text-w);
        padding: 12px;
        margin: 5px 0;
        font-weight: 600;
        text-decoration: none;
    }
}

@media (min-width: 768px) {
    .link-mobile {
        display: none;
    }

    .nav-menu {
        display: flex;
        align-items: center;
        background: transparent;
        margin-top: 10px;
    }

    .auth-buttons {
        display: flex;
        margin-left: auto;
    }

    .auth-buttons a {
        margin: 0 10px;
        text-decoration: none;
        font-weight: 600;
        color: var(--text-w);
    }

    .nav-link:hover {
        color: var(--orange);
    }

    .hamburger {
        display: none;
    }

    .navbar .navbar-brand span {
        color: var(--text-w); 
    }
}


    </style>
@endpush

<nav class="navbar fixed-top mb-5" style="max-width:100%">
    <div class="container-fluid">
        <a class="navbar-brand d-flex align-items-center" href="{{ route('front.home') }}">
            <img src="{{ asset('upload/logo/'.$setting->logo) }}" class="logo" alt="">
            <!-- Company Name with White Text -->
            <span class="fw-semibold mt-2 d-none d-sm-block">{{$setting->nama_perusahaan}}</span>
        </a>

        <!-- Toggle button (checkbox) -->
        <input type="checkbox" id="menuToggle" style="display: none;">
        <label for="menuToggle" class="hamburger">&#9776;</label>

        <!-- Navigation links -->
        <div class="nav-menu">
            <a href="https://putrasi.id " class="nav-link fs-6 fw-bold " style="color: white">Halaman Utama</a>

          

            <!-- Auth buttons for desktop and mobile -->
            <div class="auth-buttons">
                @if (auth()->check())
                    <a href="{{ route('member.index') }}" class="link-btn fw-semibold mx-2">Profile</a>
                @else
                    <a href="{{ route('register') }}" class="link-btn fw-semibold mx-2">Daftar</a>
                    <a href="/login" class="link-btn fw-semibold">Masuk</a>
                @endif
            </div>
        </div>
    </div>
</nav>
