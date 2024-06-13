<!-- Navbar Navigation -->
<nav class="navbar fixed-top">
    <div class="container-fluid">
        <div class="d-flex">
            <a href="{{ route('front.home') }}">
            <img src="{{ asset('frontend') }}/assets/logo/logo.png" alt="">
            <span class="navbar-brand text-white fw-semibold mt-2 col-sm-hidden">PT. PUTRA SAHABAT
                INTERNATIONAL</span>
            </a>
        </div>
        <div class="d-flex">
            <a href="#" class="link-pages">Worker</a>
            <a href="#" class="link-pages">Employer</a>
            <a href="{{ route('register') }}" class="link-btn fw-semibold">Daftar SIPOOL</a>
        </div>
    </div>
</nav>
<!-- #End -->
