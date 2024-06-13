<nav class="tw-bg-[#FAFAFA]">
  <div class="tw-mx-auto tw-max-w-7xl tw-px-2 sm:tw-px-6 lg:tw-px-8">
    <div class="tw-relative tw-flex tw-h-16 tw-items-center tw-justify-between">

      <div class="tw-flex tw-flex-1 tw-items-center tw-justify-start">
        <div class="tw-flex tw-flex-shrink-0 tw-items-center">
          <img class="tw-h-8 tw-w-auto" src="{{ asset('frontend') }}/assets/image/akamalogo.png" alt="Your Company">
        </div>

      </div>
      <div class="tw-gap-5 md:tw-block tw-hidden">
      <a href="/" class="tw-text-gray-800 tw-font-semibold tw-rounded-md tw-font-work-sans">Find Job</a>
      <a href="{{route('compro-2.employe')}}" class="tw-text-gray-800 tw-font-semibold tw-rounded-md tw-font-work-sans">Employers</a>
   
      </div>
  
      <div class="tw-absolute tw-inset-y-0 tw-right-0 tw-flex tw-items-center sm:tw-static sm:tw-inset-auto sm:tw-ml-6 sm:tw-pr-0">
      <button id="mobile-menu-button" type="button" class="tw-relative tw-inline-flex tw-items-center tw-justify-center tw-rounded-md tw-p-2 tw-text-gray-400 hover:tw-bg-gray-200 focus:tw-outline-none focus:tw-ring-2 focus:tw-ring-inset focus:tw-ring-sky-500 tw-transition-all tw-duration-300 sm:tw-hidden" aria-controls="mobile-menu" aria-expanded="false">
          <span class="tw-sr-only">Open main menu</span>
          <svg class="tw-block tw-h-10 tw-w-10" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
          </svg>
          <svg class="tw-hidden tw-h-10 tw-w-10" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
          </svg>
        </button>
      </div>
    </div>
  </div>

 
  <div class="tw-hidden" id="mobile-menu">
    <div class="tw-space-y-1 tw-px-2 tw-pb-3 tw-pt-2">
      <a href="/" class="tw-text-gray-800 tw-font-semibold tw-rounded-md tw-font-work-sans">Find Job</a>
      <a href="{{route('compro-2.employe')}}" class="tw-text-gray-800 tw-font-semibold tw-rounded-md tw-font-work-sans">Employers</a>
    </div>
  </div>
</nav>

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
