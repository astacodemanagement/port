<!-- Navbar Navigation -->
<nav class="navbar fixed-top">
    <div class="container-fluid">
        <div class="d-flex">
            <a href="{{ route('front.home') }}">
            <img src="{{asset('upload/logo/'.$setting->logo)}}" width="80px" alt="">
            <span class="navbar-brand text-white fw-semibold mt-2 col-sm-hidden">{{$setting->nama_perusahaan}}</span>
            </a>
        </div>
        <div class="d-flex">
            <a href="#" class="link-pages">Worker</a>
            <a href="#" class="link-pages">Employer</a>
            @if (auth()->check())
                <a href="{{route('member.index')}}" class="link-btn fw-semibold mx-2">Profile</a>     
            @else
                
            <a href="{{ route('register') }}" class="link-btn fw-semibold mx-2">Daftar SIPOOL</a>
            <a href="/login" class="link-btn fw-semibold">Masuk</a>
            @endif
        </div>
    </div>
</nav>
<!-- #End -->
