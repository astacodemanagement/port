<header class="tw-bg-custom">
  <div class="tw-mx-auto tw-max-w-7xl tw-px-2 sm:tw-px-6 lg:tw-px-8">
    <div class="tw-relative tw-flex tw-h-full tw-items-center tw-justify-between tw-w-full">
      <div class="tw-flex tw-flex-1 tw-items-center tw-justify-between">
     
          
          <div class="tw-flex tw-items-start  md:tw-hidden">
            <img class="tw-w-32 h-full tw-p-2 tw-rounded-md " src="{{ asset('frontend') }}/assets/image/akamalogo.png" alt="Logo">
          </div>
       
        <button id="mobile-menu-button" type="button" class="tw-relative tw-inline-flex tw-items-center tw-justify-center tw-rounded-md tw-p-2 tw-text-gray-400 hover:tw-bg-gray-200 focus:tw-outline-none focus:tw-ring-2 focus:tw-ring-inset focus:tw-ring-sky-500 tw-transition-all tw-duration-300 sm:tw-hidden" aria-controls="mobile-menu" aria-expanded="false">
          <span class="tw-sr-only">Open main menu</span>
          <svg class="tw-block tw-h-10 tw-w-10" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
          </svg>
          <svg class="tw-hidden tw-h-10 tw-w-10" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
          </svg>
        </button>
        <div class="tw-hidden md:tw-block">
          <div class="tw-flex tw-space-x-4">
            <a href="{{route('front.index')}}" class="t-font-wo tw-leading-5 tw-rounded-md tw-px-3 tw-py-2 tw-text-sm tw-font-medium {{ request()->routeIs('index') ? 'tw-text-sky-500 tw-underline' : '' }} hover:tw-text-sky-400">Find Job</a>
            <a href="{{route('compro-2.employe')}}" class="tw-text-custom tw-rounded-md tw-px-3 tw-py-2 tw-leading-5 tw-text-sm tw-font-medium {{ request()->routeIs('compro-2.employe') ? 'tw-text-sky-500 tw-underline' : '' }} hover:tw-text-sky-400">Employers</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="tw-hidden" id="mobile-menu">
    <div class="tw-space-y-1 tw-px-2 tw-pb-3 tw-pt-2">
      <a href="{{route('front.index')}}" class="t-font-work-sans tw-leading-5 tw-rounded-md tw-px-3 tw-py-2 tw-text-sm tw-font-medium hover:tw-text-sky-300 {{ request()->routeIs('index') ? 'tw-text-sky-500 tw-underline' : '' }}">Find Job</a>
      <a href="{{route('compro-2.employe')}}" class="tw-text-custom tw-rounded-md tw-px-3 tw-py-2 tw-leading-5 tw-text-sm tw-font-medium hover:tw-text-sky-300 {{ request()->routeIs('compro-2.employe') ? 'tw-text-sky-500 tw-underline' : '' }}">Employers</a>
    </div>
  </div>
</header>

<nav class="tw-bg-custom md:tw-block tw-hidden">
  <div class="tw-mx-auto tw-max-w-7xl tw-px-2 sm:tw-px-6 lg:tw-px-8">
    <div class="tw-relative tw-flex tw-h-16 tw-items-center tw-justify-between">
      <div class="tw-absolute tw-inset-y-0 tw-left-0 tw-flex tw-items-center sm:tw-hidden">
        <button type="button" class="tw-relative tw-inline-flex tw-items-center tw-justify-center tw-rounded-md tw-p-2 tw-text-gray-400 hover:tw-bg-gray-200 focus:tw-outline-none focus:tw-ring-2 focus:tw-ring-inset focus:tw-ring-sky-500" aria-controls="mobile-menu" aria-expanded="false">
          <span class="tw-sr-only">Open main menu</span>
          <svg class="tw-block tw-h-6 tw-w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
          </svg>
          <svg class="tw-hidden tw-h-6 tw-w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
          </svg>
        </button>
      </div>
      <div class="tw-flex tw-flex-1 tw-items-center tw-justify-center sm:tw-items-stretch sm:tw-justify-start">
        <div class="tw-flex tw-flex-shrink-0 tw-items-center">
          <img class="tw-h-8 tw-w-auto" src="{{ asset('frontend') }}/assets/image/akamalogo.png" alt="Your Company">
        </div>
        <div class="tw-hidden sm:tw-ml-6 sm:tw-block">
          <div class="tw-flex tw-space-x-4"></div>
        </div>
      </div>
      <div class="tw-absolute tw-inset-y-0 tw-right-0 tw-flex tw-items-center tw-pr-2 sm:tw-static sm:tw-inset-auto sm:tw-ml-6 sm:tw-pr-0 ">
        @if (Auth::check())
        <a href="{{route('member.index')}}" class="tw-py-1 tw-px-5 tw-text-white tw-bg-sky-500 tw-rounded-md hover:tw-text-white hover:tw-scale-105 animate__bounceIn animate__delay-s" data-aos="zoom-in" data-aos-duration="700">Profile</a>
        @else
        <a href="{{route('compro-2.login')}}" class="tw-py-1 tw-px-5 tw-text-sky-500 tw-bg-white tw-border tw-border-sky-500 tw-rounded-md tw-mr-5 hover:tw-text-sky-500 hover:tw-scale-105" data-aos="zoom-in" data-aos-duration="700">Sign in</a>
        <a href="{{route('compro-2.daftar')}}" class="tw-py-1 tw-px-5 tw-text-white tw-bg-sky-500 tw-rounded-md hover:tw-text-white hover:tw-scale-105" data-aos="zoom-in" data-aos-duration="700">Sign up</a>
        @endif
      </div>
    </div>
  </div>
  <div class="tw-hidden" id="mobile-menu">
    <div class="tw-space-y-1 tw-px-2 tw-pb-3 tw-pt-2">
      <a href="#" class="tw-block tw-rounded-md tw-px-3 tw-py-2 tw-text-base tw-font-medium">Dashboard</a>
    </div>
  </div>
</nav>
@push('css')
  <style>
    @media (min-width: 640px) {
  #mobile-menu {
    display: none;
  }
  #mobile-menu-button {
    display: none;
  }
}

/* Tampilkan elemen yang hanya pada layar besar */
@media (max-width: 639px) {
  .desktop-only {
    display: none;
  }
}
  </style>
@endpush

@push('js')
 <script>
  document.addEventListener('DOMContentLoaded', function() {
  const mobileMenuButton = document.getElementById('mobile-menu-button');
  const mobileMenu = document.getElementById('mobile-menu');
  const svgIcons = mobileMenuButton.querySelectorAll('svg');

  mobileMenuButton.addEventListener('click', function() {
    mobileMenu.classList.toggle('tw-hidden');
    mobileMenuButton.setAttribute('aria-expanded', mobileMenu.classList.contains('tw-hidden') ? 'false' : 'true');
    
    svgIcons[0].classList.toggle('tw-hidden');
    svgIcons[1].classList.toggle('tw-hidden');
  });
});

 </script>
 @endpush