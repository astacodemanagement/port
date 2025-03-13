@extends('front.compro-1.layouts.app')
@section('title', 'Home')
@section('subtitle', 'Menu Awal')

@section('content')
@push('css')
<link href="{{ asset('css/app1.css') }}" rel="stylesheet">

<style>
    .wrapper-carousel {
        width: 100%;
        border-radius: 2rem;
        background-color: white;
    }
</style>

@endpush

<section class="Element-nav-items" >
@include('front.compro-1.layouts.navbar')
    <div class="container">
        @php
        if (request()->host() == "putrasi.id"){
        $setting = App\Models\Setting::where('compro',1)->first();
        }
        else{
        $setting = App\Models\Setting::where('compro',1)->first();
        }
        @endphp
     
        
        <!-- Caraousel Section -->
        <div class="tw-relative tw-w-full tw-bg-sky-50 tw-pt-16">
            <div class="tw-max-w-7xl tw-px-6 tw-pt-16 tw-mx-auto">
                <div class="tw-items-center lg:tw-flex">
                    <div class="tw-w-full lg:tw-w-[60%]">
                        <div class="lg:tw-max-w-2xl tw-z-10">
                            <h1 class="tw-z-10 tw-text-3xl tw-font-semibold tw-text-[#00314F] tw-font-caveat lg:tw-text-6xl animate__animated animate__fadeInLeft">Find The Best</h1>

                            <p class="tw-z-10 tw-mt-3 tw-text-[#00314F]  tw-font-work-sans md:tw-text-6xl tw-text-4xl tw-font-bold  animate__animated animate__fadeInLeft">Indonesian Worker To Develop Your Business</p>
                            <p class="tw-z-10 tw-mt-3 tw-text-gray-500 tw-text-lg tw-font-work-sans  animate__animated animate__fadeInLeft ">A simple recruitment system with the best Indonesian Talent Pool. We will help you find one that suits your qualifications</p>

                            @if(auth()?->user()?->kandidat)
                            <div class="tw-mt-6" data-aos="zoom-in" data-aos-duration="1000">

                                <a data-aos="fade-left" href="/" class="tw-z-0  tw-w-full tw-px-5 tw-py-3  tw-text-sm tw-tracking-wider tw-text-white tw-uppercase tw-transition-colors tw-duration-300 tw-transform tw-bg-[#00314F] tw-rounded-lg lg:tw-w-auto hover:tw-bg-[#00314F] focus:tw-outline-none focus:tw-bg-[#00314F]">
                                    Start To Found Job
                                    <i class="fas fa-arrow-right tw-ml-2 -tw-rotate-45"></i>
                                </a>
                            </div>
                            @else
                            <div class="tw-mt-6" data-aos="zoom-in" data-aos-duration="1000">
                                <a href="{{route('register')}}" class="tw-z-30  tw-w-full tw-px-5 tw-py-3 tw-mt-6 tw-text-sm tw-tracking-wider tw-text-white tw-uppercase tw-transition-colors tw-duration-300 tw-transform tw-bg-[#F97316] tw-rounded-lg lg:tw-w-auto hover:tw-bg-[#F97316] focus:tw-outline-none focus:tw-bg-[#00314F]">
                                    Start To Found Worker
                                    <i class="fas fa-arrow-right tw-ml-2 -tw-rotate-45"></i>
                                </a>
                            </div>
                            @endif

                        </div>
                    </div>

                    <div class="tw-relative tw-flex tw-items-center tw-justify-center tw-w-full tw-mt-6 lg:tw-mt-0 lg:tw-w-[40%]">
                        <img class="tw-w-full tw-h-full lg:tw-max-w-3xl tw-z-10   " data-aos="fade-left" src="{{ asset('frontend') }}/assets/image/psihome.png " alt="Catalogue-pana.svg">
                    </div>
                </div>
            </div>

            <div class="tw-absolute tw-bottom-0 tw-right-0 tw-w-2/3 md:tw-h-full tw-h-1/2 tw-pointer-events-none tw-z-0">
                <img class="tw-w-full tw-h-full tw-object-cover  " src="{{ asset('frontend') }}/assets/image/pattern.png" alt="Pattern">
            </div>
        </div>

        <!-- #End -->
    </div>
</section>

<section class="container py-5">


    <img src="{{ asset('frontend') }}/assets/image/section3.png" alt="" class="md:tw-w-[40%] md:tw-h-[400px] tw-w-full tw-h-full tw-border-transparent"  style="  display: block;
  margin-left: auto;
  margin-right: auto;
  ">
    <h2 class="text-center tw-text-xl tw-font-semibold tw-text-[#00314F] tw-font-caveat lg:tw-text-4xl tw-mt-10">Our Mision</h2>
    <p class="text-center tw-gray-700 tw-font-medium">Connecting Indonesian workers with international jobs and enhancing their skills.</p>
</section>

<section class="container tw-py-5">
    <div class="tw-flex tw-flex-col md:tw-flex-row md:tw-flex-wrap md:tw-justify-between">
        <div class="tw-flex tw-flex-col md:tw-flex-row md:tw-flex-wrap tw-items-center tw-justify-start ">
            <img src="{{ asset('frontend') }}/assets/image/section5.png" alt="" width="150px" height="150px" style="  display: block" ; />

            <div class="mx-5">
                <h2 class="tw-text-xl tw-font-semibold mb-2 md:tw-text-start tw-text-center tw-text-[#00314F] mt-3 tw-font-caveat lg:tw-text-4xl tw-ml-5">{{number_format(12000)}}</h2>
                <p class="tw-text-gray-800 md:tw-text-start tw-text-center mb-5">The Best Indonesian Workers are Ready <br>for International Employment</p>
            </div>
        </div>

        <div class="tw-flex tw-flex-col md:tw-flex-row md:tw-flex-wrap tw-items-center tw-justify-start">
            <img src="{{ asset('frontend') }}/assets/image/section6.png" alt="" width="150px" height="150px" style="  display: block" ; />

            <div class="mx-5">
                <h2 class="tw-text-xl tw-font-semibold tw-text-[#00314F] mb-2 tw-font-caveat lg:tw-text-4xl mt-3  md:tw-text-start tw-text-center tw-ml-5">{{number_format(12000)}}</h2>
                <p class="tw-text-gray-800  md:tw-text-start tw-text-center">The Best Indonesian Workers are Ready <br>for International Employment</p>

            </div>
        </div>
    </div>

</section>

<section class="tw-py-10 container">
    <h2 class="text-center tw-text-xl tw-font-semibold tw-text-[#00314F] tw-font-caveat lg:tw-text-4xl tw-mt-10">We have official permission to <br> send workers abroad</h2>

    <div class="tw-flex tw-flex-wrap tw-justify-between tw-pt-10 gap-4">
        <div class="tw-w-full sm:tw-w-1/2 lg:tw-w-1/4 tw-rounded-md tw-bg-[#F2FAFF] py-4">
          <div class="tw-flex tw-justify-center tw-flex-col tw-items-center">
              <img src="{{ asset('frontend') }}/assets/image/worker1.png" alt="" width="150px" height="150px" style="display: block;"/>
              <p class="tw-text-gray-800 tw-text-lg tw-text-center pt-3 tw-font-medium">More than 20 years <br>of experience</p>
          </div>
        </div>
        
        <div class="tw-w-full sm:tw-w-1/2 lg:tw-w-1/4 tw-rounded-md tw-bg-[#F2FAFF] py-4">
          <div class="tw-flex tw-justify-center tw-flex-col tw-items-center">
              <img src="{{ asset('frontend') }}/assets/image/worker2.png" alt="" width="150px" height="150px" style="display: block;"/>
              <p class="tw-text-gray-800 tw-text-lg tw-text-center pt-3 tw-font-medium">Our founder established it in <br> 1996.</p>
          </div>
        </div>
        
        <div class="tw-w-full sm:tw-w-1/2 lg:tw-w-1/4 tw-rounded-md tw-bg-[#F2FAFF] py-4">
          <div class="tw-flex tw-justify-center tw-flex-col tw-items-center">
              <img src="{{ asset('frontend') }}/assets/image/worker3.png" alt="" width="150px" height="150px" style="display: block;"/>
              <p class="tw-text-gray-800 tw-text-lg tw-text-center pt-3 tw-font-medium">We have distributed workers to <br> Asia and Europe.</p>
          </div>
        </div>
    </div>
</section>

<!-- Our expertise in the industrial sector -->
<section class="tw-py-10 container">
  <h2 class="text-center tw-text-xl tw-font-semibold tw-text-[#00314F] tw-font-caveat lg:tw-text-4xl tw-mt-10">Our expertise in the industrial sector</h2>
  
  <div class="tw-grid tw-grid-cols-2 sm:tw-grid-cols-3 lg:tw-grid-cols-5 tw-gap-4 tw-pt-10">
    <!-- Hospitality -->
    <div class="tw-rounded-md tw-py-2">
      <div class="tw-flex tw-justify-center tw-flex-col tw-items-center tw-px-3">
        <img src="{{ asset('frontend') }}/assets/image/exp1.png" alt="Hospitality" class="tw-w-16 sm:tw-w-20 lg:tw-w-full" style="display: block;"/>
        <p class="tw-text-gray-800 tw-text-base lg:tw-text-lg tw-text-center tw-pt-3 tw-font-medium">Hospitality</p>
      </div>
    </div>
    
    <!-- Manufacture -->
    <div class="tw-rounded-md tw-py-2">
      <div class="tw-flex tw-justify-center tw-flex-col tw-items-center tw-px-3">
        <img src="{{ asset('frontend') }}/assets/image/exp2.png" alt="Manufacture" class="tw-w-16 sm:tw-w-20 lg:tw-w-full" style="display: block;"/>
        <p class="tw-text-gray-800 tw-text-base lg:tw-text-lg tw-text-center tw-pt-3 tw-font-medium">Manufacture</p>
      </div>
    </div>
    
    <!-- Construction -->
    <div class="tw-rounded-md tw-py-2">
      <div class="tw-flex tw-justify-center tw-flex-col tw-items-center tw-px-3">
        <img src="{{ asset('frontend') }}/assets/image/exp3.png" alt="Construction" class="tw-w-16 sm:tw-w-20 lg:tw-w-full" style="display: block;"/>
        <p class="tw-text-gray-800 tw-text-base lg:tw-text-lg tw-text-center tw-pt-3 tw-font-medium">Construction</p>
      </div>
    </div>
    
    <!-- Domestic worker -->
    <div class="tw-rounded-md tw-py-2">
      <div class="tw-flex tw-justify-center tw-flex-col tw-items-center tw-px-3">
        <img src="{{ asset('frontend') }}/assets/image/exp4.png" alt="Domestic worker" class="tw-w-16 sm:tw-w-20 lg:tw-w-full" style="display: block;"/>
        <p class="tw-text-gray-800 tw-text-base lg:tw-text-lg tw-text-center tw-pt-3 tw-font-medium">Domestic worker</p>
      </div>
    </div>
    
    <!-- Other Sectors -->
    <div class="tw-rounded-md tw-py-2">
      <div class="tw-flex tw-justify-center tw-flex-col tw-items-center tw-px-3">
        <img src="{{ asset('frontend') }}/assets/image/exp5.png" alt="Other Sectors" class="tw-w-16 sm:tw-w-20 lg:tw-w-full" style="display: block;"/>
        <p class="tw-text-gray-800 tw-text-base lg:tw-text-lg tw-text-center tw-pt-3 tw-font-medium">Other Sectors</p>
      </div>
    </div>
  </div>
</section>
<div class="tw-w-full tw-bg-[#F2FAFF]">
<section class="tw-py-10 container ]">
<h2 class="text-start tw-text-xl tw-font-semibold tw-text-[#00314F] tw-font-caveat lg:tw-text-4xl tw-mt-10">How Does Our Work Process Work?</h2>

<div class="tw-flex tw-flex-col md:tw-flex-row md:tw-flex-wrap md:tw-justify-between tw-pt-10">
    <div class="md:tw-w-1/4 tw-w-full my-2  tw-bg-white tw-rounded-lg py-4">
      <div class="tw-flex tw-justify-center tw-flex-col tw-items-center">
      <img src="{{ asset('frontend') }}/assets/image/process1.png" alt="" width="150px" height="150px" style="  display: block;"/>
      <p class="tw-text-gray-800 tw-text-lg tw-text-center pt-3 tw-font-medium">Discussion on the workforce needs for recruitment</p>
      </div>
    </div>
    <div class="md:tw-w-1/4 tw-w-full my-2  tw-bg-white tw-rounded-lg py-4">
      <div class="tw-flex tw-justify-center tw-flex-col tw-items-center">
      <img src="{{ asset('frontend') }}/assets/image/process2.png" alt="" width="150px" height="150px" style="  display: block;"/>
      <p class="tw-text-gray-800 tw-text-lg tw-text-center pt-3 tw-font-medium">Please kindly request support from the Embassy of Indonesia in your country</p>
      </div>
    </div>
    <div class="md:tw-w-1/4 tw-w-full my-2  tw-bg-white tw-rounded-lg py-4">
      <div class="tw-flex tw-justify-center tw-flex-col tw-items-center">
      <img src="{{ asset('frontend') }}/assets/image/process3.png" alt="" width="150px" height="150px" style="  display: block;"/>
      <p class="tw-text-gray-800 tw-text-lg tw-text-center pt-3 tw-font-medium">Start Recruitment: We organize and assist with the interview process (online or on-site).
    </div>
        
    </div>
</div>
</section>
</div>


@endsection