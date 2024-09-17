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
        .logo{
            width: 80px;
            
        }
       /* mobile 50px */
       @media (max-width: 767px) {
        .logo{
            width: 50px;
        }
      
        
       }
       /* badge to mobile-mobile-daftar */
     

    </style>
@endpush
<nav class="navbar fixed-top  " style="max-width:100%">
    <div class="container-fluid">
        <div class="d-flex">
            <a href="{{ route('front.home') }}">
            <img src="{{asset('upload/logo/'.$setting->logo)}}"class="logo" alt="">
            <span class="navbar-brand text-white fw-semibold mt-2 col-sm-hidden">{{$setting->nama_perusahaan}}</span>
            </a>
        </div>
        <div class="d-flex">
            <a href="#" class="link-pages">Worker</a>
            <a href="#" class="link-pages">Employer</a>
            @if (auth()->check())
                <a href="{{route('member.index')}}" class="link-btn fw-semibold mx-2">Profile</a>     
            @else
                
            <a href="{{ route('register') }}" class="link-btn fw-semibold mx-2">Daftar</a>
            <a href="/login" class="link-btn fw-semibold">Masuk</a>

            @endif
        </div>
    </div>
</nav>
<!-- #End -->
