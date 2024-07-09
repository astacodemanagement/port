@extends('front.compro-2.layouts.default')
<!-- title-->
@section('title','Employers Akama Job')
@section('content')
@include('front.compro-2.component.navdefault')
{{--make hero section avatar tulisan kiri --}}
<div class="tw-relative tw-w-full tw-bg-sky-50 ">
    <div class="tw-max-w-7xl tw-px-6 tw-pt-16 tw-mx-auto">
        <div class="tw-items-center lg:tw-flex">
            <div class="tw-w-full lg:tw-w-[60%]">
                <div class="lg:tw-max-w-2xl tw-z-10">
                    <h1 class="tw-z-10 tw-text-3xl tw-font-semibold tw-text-sky-500 tw-font-caveat lg:tw-text-6xl animate__animated animate__fadeInLeft">Find The Best</h1>
                    
                    <p class="tw-z-10 tw-mt-3 tw-text-gray-800 tw-font-work-sans md:tw-text-6xl tw-text-4xl tw-font-bold  animate__animated animate__fadeInLeft">Indonesian Worker To Develop Your Business</p>
                    {{-- desc --}}
                    <p class="tw-z-10 tw-mt-3 tw-text-gray-500 tw-text-lg tw-font-work-sans  animate__animated animate__fadeInLeft ">A simple recruitment system with the best Indonesian Talent Pool. We will help you find one that suits your qualifications</p>

                <!-- kalo kandidat yang masuk -->
                @if(auth()?->user()?->kandidat)
                <div class="tw-mt-6" data-aos="zoom-in" data-aos-duration="1000">

                    <a data-aos="fade-left" href="/" class="tw-z-10  tw-w-full tw-px-5 tw-py-3  tw-text-sm tw-tracking-wider tw-text-white tw-uppercase tw-transition-colors tw-duration-300 tw-transform tw-bg-sky-500 tw-rounded-lg lg:tw-w-auto hover:tw-bg-sky-500 focus:tw-outline-none focus:tw-bg-sky-500">
                        Start To Found Job 
                        <i class="fas fa-arrow-right tw-ml-2 -tw-rotate-45"></i>
                    </a>
                </div>
                @else
                <div class="tw-mt-6" data-aos="zoom-in" data-aos-duration="1000">
                <a href="{{route('register')}}" class="tw-z-10  tw-w-full tw-px-5 tw-py-3 tw-mt-6 tw-text-sm tw-tracking-wider tw-text-white tw-uppercase tw-transition-colors tw-duration-300 tw-transform tw-bg-sky-500 tw-rounded-lg lg:tw-w-auto hover:tw-bg-sky-500 focus:tw-outline-none focus:tw-bg-sky-500">
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
{{-- section 2 width 1/2 1/2--}}
<div class="tw-w-full">
    <div class="tw-max-w-7xl tw-py-16 tw-px-6 tw-mx-auto">
        {{-- width 1/2 1/2 --}}
        <div class="tw-flex tw-items-center tw-justify-between  md:tw-flex-row  tw-flex-col-reverse  tw-gap-6 tw-mt-16 animate__animated animate__fadeIn">
            <div class="tw-relative tw-w-full lg:tw-w-[50%] animate__animated animate__fadeInLeft  ">
                <img class="tw-absolute tw-top-0 -tw-translate-y-20 tw-left-0 tw-z-10" src="{{ asset('frontend') }}/assets/image/group.png" alt="Catalogue-pana.svg">
            
                <img class="tw-relative tw-w-full tw-h-full tw-object-cover tw-z-0" src="{{ asset('frontend') }}/assets/image/indo.png" alt="Catalogue-pana.svg">
            </div>
    
            <div class="tw-w-full lg:tw-w-[50%] animate__animated animate__fadeInRight tw-py-10 tw-pb-20 ">
                {{-- our mission  --}}
                <h2 class="tw-text-xl tw-font-bold tw-text-gray-800 tw-font-clash-display lg:tw-text-5xl">Our Mission</h2>
                <p class="tw-mt-3 tw-text-gray-500 tw-text-lg md:tw-w-2/3 tw-w-full tw-font-work-sans">Connect Indonesian workers with international jobs and enhance their skills</p>
            </div>
        </div>
    </div>
</div>


 {{-- count star --}}
 <div class="tw-pt-12 tw-mx-auto sm:tw-pt-20" ata-aos="fade-left">
    <div class="tw-pb-12 tw-mt-10 sm:tw-pb-16">
        <div class="tw-relative">
            <div class="tw-absolute tw-inset-0 tw-h-1/2"></div>
            <div class="tw-relative tw-max-w-full tw-px-4 tw-mx-auto sm:tw-px-6 lg:tw-px-8">
                <div class="tw-max-w-7xl tw-mx-auto">
                    <div class="sm:tw-grid sm:tw-grid-cols-2">
                        <div class="tw-flex tw-flex-col tw-p-6 tw-text-center tw-border-t tw-border-b tw-border-sky-500 sm:tw-border-0 sm:tw-border-l sm:tw-border-r" data-aos="fade-right">
                            <dt class="tw-order-2 tw-mt-2 tw-text-lg tw-font-medium tw-leading-6 tw-text-gray-700  tw-pl-3 ">
                                Kandidat Proses
                            </dt>
                            <dd class="tw-order-1 tw-text-5xl tw-font-extrabold tw-leading-none tw-text-sky-500 dark:tw-text-sky-500" id="downloadsCount">
                                0
                            </dd>
                        </div>
                        <div class="tw-flex tw-flex-col tw-p-6 tw-text-center tw-border-t tw-border-sky-500 sm:tw-border-0 sm:tw-border-l" data-aos="fade-right">
                            <dt class="tw-order-2 tw-mt-2 tw-text-lg tw-font-medium tw-leading-6 tw-text-gray-700  tw-pl-3 ">
                                Kandidat Telah Bekerja Di Luar Negeri
                            </dt>
                            <dd class="tw-order-1 tw-text-5xl tw-font-extrabold tw-leading-none tw-text-sky-500 dark:tw-text-sky-500" id="sponsorsCount">
                                0
                            </dd>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


{{-- count end --}}
{{-- testimoni section --}}
<div class="tw-w-full" data-aos="fade-right">
    <div class="tw-max-w-7xl tw-px-6 tw-py-16 tw-mx-auto">
        <div class="tw-text-center">
            <h2 class="tw-text-3xl tw-font-bold tw-text-sky-500 tw-font-caveat lg:tw-text-5xl" data-aos="fade-up">Part Of</h2>
            <p class="tw-mt-3 tw-text-gray-900 md:tw-text-5xl tw-text-3xl tw-font-bold tw-font-clash-display" data-aos="fade-up">Assalam Group Member</p>
        </div>
        {{-- client --}}
        <div class="tw-grid tw-grid-cols-2 tw-gap-6 tw-mt-16 sm:tw-grid-cols-3 lg:tw-grid-cols-5">
            <div class="tw-flex tw-items-center tw-justify-center tw-p-6 " data-aos="fade-right">
                @forelse ($partner as $item )
                    
                <img class="tw-w-full tw-h-10" src="/upload/partner/{{$item->logo}}" alt="{{$item->name}}">
                @empty
                    <h4 class="tw-text-center tw-text-rose-400 tw-text-2xl">
                        No Partner
                    </h4>
                @endforelse
            </div>
        </div>
    </div>
</div>

<section class="tw-w-full tw-bg-gradient-to-t tw-from-sky-100 tw-to-white" >
  <div class="tw-max-w-7xl tw-px-6 tw-pt-16 tw-mx-auto">
    <div class="tw-text-center tw-pb-20">
     <div class="tw-flex tw-flex-wrap tw-justify-center tw-gap-5">
      <h2 class="tw-text-3xl tw-font-bold tw-text-sky-500 tw-font-caveat lg:tw-text-5xl" data-aos="fade-up">We Have</h2>
      {{-- <img src="{{ asset('frontend') }}/assets/image/paper.png" alt="" class="" > --}}
     </div>
      <p class="tw-mt-3 tw-text-gray-900 md:tw-text-5xl tw-font-bold tw-font-clash-display tw-text-3xl" data-aos="fade-up">Official Permission To Send <br>Workers Aboard</p>

   
    
        </div>
        {{-- center the image --}}
        <div class="tw-flex tw-justify-center">
          <img src="{{ asset('frontend') }}/assets/image/have.png" data-aos="fade-up"  class="tw-mt-10">   
          <img src="{{ asset('frontend') }}/assets/image/bublechat.png"data-aos="fade-up" alt="" class=" tw-w-1/3 md:tw-w-72 tw-absolute tw-right-0 md:tw-right-[430px]  tw-pb-20">
          <div class="tw-absolute  tw-left-3 md:tw-left-[380px]  ">
            {{-- card --}}
            <div class="md:tw-w-96 tw-w-32 tw-bg-white tw-border tw-border-gray-100 tw-shadow-md tw-rounded-lg tw-p-6 md:tw-mt-10">
              <h4 class="md:tw-text-xl tw-text-sm tw-font-bold tw-text-sky-500 tw-font-work-sans lg:tw-text-xl"  >More Than</h4>
              <h2 class=" tw-text-gray-900 md:tw-text-3xl tw-font-semibold tw-font-clash-display tw-text-sm">20 Years Experience</h2>
            </div>
            <p class="tw-ml-6 tw-mt-5 tw-text-gray-400 tw-font-medium tw-font-work-sans tw-text-lg tw-hidden md:tw-inline">Our founder founded it in 1996</p>
          </div>
        </div>
      </div>
  </div>
  </div>
</section>
<section class="tw-w-full">
    <div class="tw-max-w-7xl tw-px-6 tw-pt-16 tw-mx-auto">
        <div class="tw-text-center tw-pb-20">
            <div class="tw-flex tw-flex-wrap tw-justify-center tw-gap-5">
                <h2 class="tw-text-3xl tw-font-bold tw-text-sky-500 tw-font-caveat lg:tw-text-5xl" data-aos="fade-up">Industrial</h2>
                <img src="{{ asset('frontend') }}/assets/image/paper.png" alt="" class="" data-aos="fade-up">
            </div>
            <p class="tw-mt-3 tw-text-gray-900 tw-text-3xl tw-font-bold tw-font-clash-display md:tw-text-5xl" data-aos="fade-up">Sector Of Our Expertise</p>
            <p class="tw-mt-3 tw-text-gray-500 tw-text-lg tw-font-medium tw-font-work-sans" data-aos="fade-up">Has proven and real experience in distributing Indonesian work abroad</p>
            <div class="tw-grid tw-gap-6 tw-mt-16 tw-grid-cols-1 md:tw-grid-cols-3">
                <div class="tw-flex tw-items-center tw-justify-center">
                    <ul class="tw-list-none tw-w-full" data-aos="fade-right">
                        @foreach ($kategori as $item )
                            
                        <li class="tw-flex tw-items-center tw-mb-10 tw-gap-5 tw-text-2xl">
                            <i class="fa-solid fa-hospital tw-text-sky-500"></i>
                            <span class="tw-text-gray-800 tw-font-work-sans tw-font-medium">{{$item->nama_kategori_job}}</span>
                        </li>
                        @endforeach
                        
                    </ul>
                </div>
              
                <div class="tw-flex tw-items-center tw-justify-center tw-bg-sky-500 tw-rounded-full" data-aos="fade-left">
                    <img src="{{ asset('frontend') }}/assets/image/gedung.png" alt="Description of image" class="tw-w-full tw-h-full tw-rounded-full">
                </div>
            </div>
        </div>
    </div>
</section>



{{-- cyustomer service --}}
<section class="tw-w-full">
    <div class="tw-max-w-7xl tw-px-6 tw-py-16 tw-mx-auto">
        <div class="tw-grid tw-grid-cols-1 md:tw-grid-cols-2 tw-gap-20 tw-mt-16">
            <div class="tw-flex tw-items-center tw-justify-center">
                <img src="{{ asset('frontend') }}/assets/image/cs.png" alt="Description of image" class="tw-w-full tw-h-full">
            </div>
            <div class="tw-flex tw-flex-col tw-justify-center tw-items-center md:tw-items-start">
                <p class="tw-mt-3 tw-text-[#11181C] tw-text-3xl md:tw-text-5xl tw-font-semibold tw-font-clash-display">24/7 Support</p>
                <p class="tw-mt-3 tw-text-gray-500 tw-text-base md:tw-text-lg tw-font-clash-display">We will reply to messages as soon as possible, Submit your requirements today.</p>
            </div>
        </div>
    </div>
</section>
 
{{-- we have section --}}
<section class="tw-w-full tw-bg-sky-50">
    <div class="tw-max-w-7xl tw-px-6 tw-pt-16 tw-mx-auto">
        <div class="tw-text-center tw-pb-20">
            <div class="tw-flex tw-flex-wrap tw-justify-center tw-gap-5" data-aos="fade-in">
                <h2 class="tw-text-3xl tw-font-bold tw-text-sky-500 tw-font-caveat lg:tw-text-5xl">We Have</h2>
                <img src="{{ asset('frontend') }}/assets/image/paper.png" alt="" class="">
            </div>
            <p class="tw-mt-3 tw-text-gray-900 tw-text-3xl md:tw-text-5xl tw-font-bold tw-font-clash-display" data-aos="fade-in">Do We Work</p>
            {{-- card grid 3 with icon in card --}}
            <div class="tw-grid tw-grid-cols-1 md:tw-grid-cols-3 tw-gap-6 tw-mt-16">
                <div class="tw-flex tw-items-center tw-justify-center" data-aos="zoom-in">
                    <div class="tw-w-full tw-bg-white tw-border tw-border-gray-100 tw-shadow tw-rounded-md tw-p-6">
                        <div class="tw-flex tw-items-center tw-justify-center">
                            <div class="tw-w-20 tw-h-20 tw-flex tw-items-center tw-justify-center tw-rounded-full">
                                <img src="{{ asset('frontend') }}/assets/image/icon/Icon.png" alt="" class="tw-w-full tw-h-full">
                            </div>
                        </div>
                        <p class="tw-mt-3 tw-text-gray-500 tw-text-md tw-font-medium tw-font-work-sans">
                            Discussion of manpower requirements for recruitment
                        </p>
                    </div>
                </div>
                <div class="tw-flex tw-items-center tw-justify-center" data-aos="zoom-in">
                    <div class="tw-w-full tw-bg-white tw-border tw-border-gray-100 tw-shadow tw-rounded-md tw-p-6">
                        <div class="tw-flex tw-items-center tw-justify-center">
                            <div class="tw-w-20 tw-h-20 tw-flex tw-items-center tw-justify-center tw-rounded-full tw-bg-sky-500">
                                <img src="{{ asset('frontend') }}/assets/image/icon/Icon1.png" alt="" class="tw-w-full tw-h-full">
                            </div>
                        </div>
                        <p class="tw-mt-3 tw-text-gray-500 tw-text-md tw-font-medium tw-font-work-sans">
                            Request support from the Indonesian Embassy in your country
                        </p>
                    </div>
                </div>
                <div class="tw-flex tw-items-center tw-justify-center" data-aos="zoom-in">
                    <div class="tw-w-full tw-bg-white tw-border tw-border-gray-100 tw-shadow tw-rounded-md tw-p-6">
                        <div class="tw-flex tw-items-center tw-justify-center">
                            <div class="tw-w-20 tw-h-20 tw-flex tw-items-center tw-justify-center tw-rounded-full tw-bg-sky-500">
                                <img src="{{ asset('frontend') }}/assets/image/icon/Icon2.png" alt="" class="tw-w-full tw-h-full">
                            </div>
                        </div>
                        <p class="tw-mt-3 tw-text-gray-500 tw-text-md tw-font-medium tw-font-work-sans">
                            Start Recruitment: We organize and assist with interviews (online or on-site)
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- our galry random  image --}}
<section class="tw-w-full tw-bg-sky-50">
    <div class="tw-max-w-7xl tw-px-6 tw-pt-16 tw-mx-auto">
        <div class="tw-text-center tw-pb-20">
            <div class="tw-flex tw-flex-wrap tw-justify-center tw-gap-5">
                <h2 class="tw-text-3xl tw-font-bold tw-text-sky-500 tw-font-caveat lg:tw-text-5xl">Our</h2>
            </div>
            <p class="tw-mt-3 tw-text-gray-900 tw-text-3xl md:tw-text-5xl tw-font-bold tw-font-clash-display">Gallery Recruitment</p>
            <div class="tw-grid tw-grid-cols-1 sm:tw-grid-cols-2 lg:tw-grid-cols-12 lg:tw-row-span-3 tw-gap-6 tw-pt-16">
                <div class="tw-w-full tw-overflow-hidden tw-rounded-lg tw-col-span-6 tw-row-span-1" data-aos="zoom-in">
                    <img src="https://plus.unsplash.com/premium_photo-1661814856411-0d40c6492d5d?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Job Interview" class="tw-w-full tw-h-[300px] tw-object-cover">
                </div>
                <div class="tw-w-full tw-overflow-hidden tw-rounded-lg tw-col-span-3 tw-row-span-1" data-aos="zoom-in">
                    <img src="https://plus.unsplash.com/premium_photo-1661823262859-b3c97a68d509?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Resume" class="tw-w-full tw-h-[300px] tw-object-cover">
                </div>
                <div class="tw-w-full tw-overflow-hidden tw-rounded-lg tw-col-span-3 tw-row-span-1" data-aos="zoom-in">
                    <img src="https://plus.unsplash.com/premium_photo-1661815691531-5751c20953bf?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Office Meeting" class="tw-w-full tw-h-[300px] tw-object-cover">
                </div>
                <div class="tw-w-full tw-overflow-hidden tw-rounded-lg tw-col-span-4 tw-row-span-1 tw-h-full" data-aos="zoom-in">
                    <img src="https://plus.unsplash.com/premium_photo-1683121455838-25d03a921a27?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Teamwork" class="tw-w-full tw-h-[300px] tw-object-cover">
                </div>
                <div class="tw-w-full tw-overflow-hidden tw-rounded-lg tw-col-span-4 tw-row-span-2 tw-h-full" data-aos="zoom-in">
                    <img src="https://plus.unsplash.com/premium_photo-1682145337370-f02f946ca237?q=80&w=1887&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Hiring" class="tw-w-full tw-h-full tw-object-cover">
                </div>
                <div class="tw-w-full tw-overflow-hidden tw-rounded-lg tw-col-span-4 tw-row-span-1 tw-h-full" data-aos="zoom-in">
                    <img src="https://plus.unsplash.com/premium_photo-1680787309486-b7e082157712?q=80&w=1887&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Job Search" class="tw-w-full tw-h-[300px] tw-object-cover">
                </div>
                <div class="tw-w-full tw-overflow-hidden tw-rounded-lg tw-col-span-4 tw-row-span-1 tw-h-full" data-aos="zoom-in">
                    <img src="https://images.unsplash.com/photo-1613395940649-004104dfbefc?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Job Search" class="tw-w-full tw-h-[300px] tw-object-cover">
                </div>
                <div class="tw-w-full tw-overflow-hidden tw-rounded-lg tw-col-span-2 tw-row-span-1 tw-h-full" data-aos="zoom-in">
                    <img src="https://images.unsplash.com/photo-1531496733133-ef4039cba52e?q=80&w=1886&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Job Search" class="tw-w-full tw-h-[300px] tw-object-cover">
                </div>
                <div class="tw-w-full tw-overflow-hidden tw-rounded-lg tw-col-span-2 tw-row-span-1 tw-h-full" data-aos="zoom-in">
                    <img src="https://plus.unsplash.com/premium_photo-1661695302326-0fae86abf740?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Job Search" class="tw-w-full tw-h-full tw-object-cover">
                </div>
            </div>
        </div>
    </div>
</section>



<script>
  const targets = [
    { element: document.getElementById('downloadsCount'), count: 1500, suffix: '+' },
    { element: document.getElementById('sponsorsCount'), count: 400, suffix: '+' }
  ];

  const maxCount = Math.max(...targets.map(target => target.count));
  function animateCountUp(target, duration) {
    let currentCount = 0;
    const increment = Math.ceil(target.count / (duration / 10));

    const interval = setInterval(() => {
      currentCount += increment;
      if (currentCount >= target.count) {
        clearInterval(interval);
        currentCount = target.count;
        target.element.textContent = currentCount + target.suffix;
      } else {
        target.element.textContent = currentCount;
      }
    }, 10);
  }

  targets.forEach(target => {
    animateCountUp(target, maxCount / 100); 
  });
</script>
@endsection
