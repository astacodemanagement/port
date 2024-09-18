@extends('front.compro-1.layouts.app')
@section('title', 'Home')
@section('subtitle', 'Menu Awal')

@section('content')
@push('css')
<link href="{{ asset('css/app1.css') }}" rel="stylesheet">

<style>
    .wrapper-carousel{
        width: 100%;
        border-radius: 2rem;
        background-color: white;
    }
</style>
    
@endpush

<section class="Element-nav-items">
        <div class="container">
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
       @media (max-width: 767px) {
        .logo{
            width: 50px;
        }
      
        
       }
     

    </style>
@endpush
<div class="container">
<nav class="navbar fixed-top  " style="width: 1320px; margin:auto; margin-top:2rem; margin-bottom: 4rem;">
    <div class="container-fluid">
        <div class="tw-flex tw-flex-wrap tw-justify-start tw-items-center">
            <a href="{{ route('front.home') }}">
            <img src="{{asset('upload/logo/'.$setting->logo)}}"class="logo" alt="">
        </a>
        <span class="navbar-brand text-white fw-semibold mt-2 col-sm-hidden">{{$setting->nama_perusahaan}}</span>
        </div>
        <div class="tw-flex">
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
</div>
            <!-- Caraousel Section -->
            <div class="tw-relative tw-w-full tw-bg-sky-50 tw-pt-16">
    <div class="tw-max-w-7xl tw-px-6 tw-pt-16 tw-mx-auto">
        <div class="tw-items-center lg:tw-flex">
            <div class="tw-w-full lg:tw-w-[60%]">
                <div class="lg:tw-max-w-2xl tw-z-10">
                    <h1 class="tw-z-10 tw-text-3xl tw-font-semibold tw-text-[#00314F] tw-font-caveat lg:tw-text-6xl animate__animated animate__fadeInLeft">Find The Best</h1>
                    
                    <p class="tw-z-10 tw-mt-3 tw-text-[#00314F]  tw-font-work-sans md:tw-text-6xl tw-text-4xl tw-font-bold  animate__animated animate__fadeInLeft">Indonesian Worker To Develop Your Business</p>
                    {{-- desc --}}
                    <p class="tw-z-10 tw-mt-3 tw-text-gray-500 tw-text-lg tw-font-work-sans  animate__animated animate__fadeInLeft ">A simple recruitment system with the best Indonesian Talent Pool. We will help you find one that suits your qualifications</p>

                <!-- kalo kandidat yang masuk -->
                @if(auth()?->user()?->kandidat)
                <div class="tw-mt-6" data-aos="zoom-in" data-aos-duration="1000">

                    <a data-aos="fade-left" href="/" class="tw-z-10  tw-w-full tw-px-5 tw-py-3  tw-text-sm tw-tracking-wider tw-text-white tw-uppercase tw-transition-colors tw-duration-300 tw-transform tw-bg-[#00314F] tw-rounded-lg lg:tw-w-auto hover:tw-bg-[#00314F] focus:tw-outline-none focus:tw-bg-[#00314F]">
                        Start To Found Job 
                        <i class="fas fa-arrow-right tw-ml-2 -tw-rotate-45"></i>
                    </a>
                </div>
                @else
                <div class="tw-mt-6" data-aos="zoom-in" data-aos-duration="1000">
                <a href="{{route('register')}}" class="tw-z-10  tw-w-full tw-px-5 tw-py-3 tw-mt-6 tw-text-sm tw-tracking-wider tw-text-white tw-uppercase tw-transition-colors tw-duration-300 tw-transform tw-bg-[#F97316] tw-rounded-lg lg:tw-w-auto hover:tw-bg-[#F97316] focus:tw-outline-none focus:tw-bg-[#00314F]">
                        Start To Found Worker 
                        <i class="fas fa-arrow-right tw-ml-2 -tw-rotate-45"></i>
                    </a>
                    </div>
                @endif
                
                </div>
            </div>
    
            <div class="tw-relative tw-flex tw-items-center tw-justify-center tw-w-full tw-mt-6 lg:tw-mt-0 lg:tw-w-[40%]">
                <img class="tw-w-full tw-h-full lg:tw-max-w-3xl tw-z-10   " data-aos="fade-left" src="{{ asset('frontend') }}/assets/image/hero_employ.png " alt="Catalogue-pana.svg">
            </div>
        </div>
    </div>
    
    <div class="tw-absolute tw-bottom-0 tw-right-0 tw-w-2/3 md:tw-h-full tw-h-1/2 tw-pointer-events-none tw-z-0">
        <img class="tw-w-full tw-h-full tw-object-cover  "  src="{{ asset('frontend') }}/assets/image/Pattern.png" alt="Pattern">
    </div>
</div>

            <!-- #End -->
        </div>
    </section>


@endsection