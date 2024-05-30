<header class="tw-bg-[#FAFAFA]">
    <div class="tw-mx-auto tw-max-w-7xl tw-px-2 sm:tw-px-6 lg:tw-px-8">
      <div class="tw-relative tw-flex tw-h-10 tw-items-center tw-justify-between">
        <div class="tw-absolute tw-inset-y-0 tw-left-0 tw-flex tw-items-center sm:tw-hidden">
          <!-- Mobile menu button-->
          <button type="button" class="tw-relative tw-inline-flex tw-items-center tw-justify-center tw-rounded-md tw-p-2 tw-text-gray-400 hover:tw-bg-gray-700 hover:tw-text-white focus:tw-outline-none focus:tw-ring-2 focus:tw-ring-inset focus:tw-ring-white" aria-controls="mobile-menu" aria-expanded="false">
            <span class="tw-absolute tw--inset-0.5"></span>
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
        
          <div class="tw-hidden sm:tw-ml-6 sm:tw-block">
            <div class="tw-flex tw-space-x-4">

              <a href="{{route('compro-2.index')}}" class="t-font-wo  tw-leading-5 tw-rounded-md tw-px-3 tw-py-2 tw-text-sm tw-font-medium {{ request()->routeIs('compro-2.index') ? 'tw-text-sky-500 tw-underline' : '' }}">Find Job</a>
              <a href="{{route('compro-2.employe')}}" class="tw-text-[#52525B] tw-rounded-md tw-px-3 tw-py-2 tw-leading-5 tw-text-sm tw-font-medium {{ request()->routeIs('compro-2.employe') ? 'tw-text-sky-500 tw-underline' : '' }}">Employers</a>
            </div>
          </div>
        </div>
        <div class="tw-absolute tw-inset-y-0 tw-right-0 tw-flex tw-items-center tw-pr-2 sm:tw-static sm:tw-inset-auto sm:tw-ml-6 sm:tw-pr-0">
     
       
        </div>
      </div>
    </div>
  
    <!-- Mobile menu, show/hide based on menu state. -->
    <div class="sm:tw-hidden" id="mobile-menu">
      <div class="tw-space-y-1 tw-px-2 tw-pb-3 tw-pt-2">
    
    </div>
  </header>
  <nav class="tw-bg-[#FAFAFA]">
    <div class="tw-mx-auto tw-max-w-7xl tw-px-2 sm:tw-px-6 lg:tw-px-8">
      <div class="tw-relative tw-flex tw-h-16 tw-items-center tw-justify-between">
        <div class="tw-absolute tw-inset-y-0 tw-left-0 tw-flex tw-items-center sm:tw-hidden">
          
          <button type="button" class="tw-relative tw-inline-flex tw-items-center tw-justify-center tw-rounded-md tw-p-2 tw-text-gray-400 hover:tw-bg-gray-700 hover:tw-text-white focus:tw-outline-none focus:tw-ring-2 focus:tw-ring-inset focus:tw-ring-white" aria-controls="mobile-menu" aria-expanded="false">
            <span class="tw-absolute tw--inset-0.5"></span>
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
            <div class="tw-flex tw-space-x-4">
       </div>
          </div>
        </div>
        <div class="tw-absolute tw-inset-y-0 tw-right-0 tw-flex tw-items-center tw-pr-2 sm:tw-static sm:tw-inset-auto sm:tw-ml-6 sm:tw-pr-0 ">
            {{-- button --}}
            <a href="" class="tw-py-1 tw-px-5 tw-text-sky-500 tw-bg-white tw-border tw-border-sky-500 tw-rounded-md tw-mr-5">Sign in</a>
            <a href="{{route('compro-2.daftar')}}" class="tw-py-1 tw-px-5 tw-text-white tw-bg-sky-500 tw-rounded-md">Sign up</a>
  
        
        </div>
      </div>
    </div>
  
    <!-- Mobile menu, show/hide based on menu state. -->
    <div class="sm:tw-hidden" id="mobile-menu">
      <div class="tw-space-y-1 tw-px-2 tw-pb-3 tw-pt-2">
        <!-- Current: "tw-bg-gray-900 tw-text-white", Default: "tw-text-gray-300 hover:tw-bg-gray-700 hover:tw-text-white" -->
        <a href="#" class="tw-bg-gray-900 tw-text-white tw-block tw-rounded-md tw-px-3 tw-py-2 tw-text-base tw-font-medium" aria-current="page">Dashboard</a>
        <a href="#" class="tw-text-gray-300 hover:tw-bg-gray-700 hover:tw-text-white tw-block tw-rounded-md tw-px-3 tw-py-2 tw-text-base tw-font-medium">Team</a>
        <a href="#" class="tw-text-gray-300 hover:tw-bg-gray-700 hover:tw-text-white tw-block tw-rounded-md tw-px-3 tw-py-2 tw-text-base tw-font-medium">Projects</a>
        <a href="#" class="tw-text-gray-300 hover:tw-bg-gray-700 hover:tw-text-white tw-block tw-rounded-md tw-px-3 tw-py-2 tw-text-base tw-font-medium">Calendar</a>
      </div>
    </div>
  </nav>