@extends('front.compro-2.layouts.default')

@section('content')
@include('front.compro-2.component.navdefault')
{{-- Slider section --}}
    <div class="tw-h-[500px]">
        <div class="tw-h-full" style="background: url('{{ asset('frontend') }}/assets/image/carousel.png'); background-position: center; background-size: cover;">
            <section id="image-carousel" class="splide tw-max-w-7xl tw-mx-auto" aria-label="Beautiful Images">
                <div class="splide__track">
                    <ul class="splide__list">
                        <li class="splide__slide">
                            <img src="{{ asset('frontend') }}/assets/image/slider1.jpeg" alt="" class="tw-rounded-lg">
                        </li>
                        <li class="splide__slide">
                            <img src="{{ asset('frontend') }}/assets/image/slider2.jpeg" alt="" class="tw-rounded-lg">
                        </li>
                    </ul>
                </div>
            </section>
        </div>
    </div>
    {{-- End of slider section --}}
    
    {{-- Job section --}}
    <div class="tw-relative tw-mt-[-20px]">
        <div class="tw-max-w-full tw-h-full  tw-bg-[#FFFFFF] tw-rounded-t-3xl tw-shadow-lg tw-px-4 tw-pt-6 tw-pb-4">
            <div class="tw-max-w-7xl tw-mx-auto">
                <div class="tw-flex tw-items-center tw-gap-0 tw-p-2 tw-bg-[#F4F4F5]  tw-rounded-lg">
                    <div class="tw-flex tw-items-center tw-gap-2 tw-p-2 tw-bg-[#F4f4F5] tw-border-r tw-border-gray-300">
                      <img src="{{ asset('frontend') }}/assets/image/indonesia.png" alt="Indonesia Flag" class="tw-w-8 tw-h-8" />
                      <span>ID</span>
                      <svg width="12" height="6" viewBox="0 0 12 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M6 0L12 6H0L6 0Z" fill="#606060" />
                      </svg>
                    </div>
                    <div class="tw-flex tw-items-center tw-gap-2 tw-p-2 tw-bg-[#F4f4F5] tw-flex-1">
                        <i class="fa-solid fa-magnifying-glass tw-text-sky-500"></i>
                      <input type="text" placeholder="Job title, keyword, company" class="tw-border-none tw-outline-none tw-text-base tw-text-gray-600 tw-bg-[#F4F4F5] tw-w-full" />
                    </div>
                    <div class="tw-flex tw-items-center tw-gap-2 tw-p-2 tw-px-4 tw-mr-2 tw-bg-[#F1F9FE] tw-rounded-md tw-cursor-pointer">
                        <i class="fa-solid fa-sliders tw-text-sky-500"></i>
                      <span class="tw-text-sky-500">Filter</span>
                    </div>
                    <button class="tw-p-2 tw-px-4 tw-bg-sky-500 tw-text-white tw-font-bold tw-rounded-lg tw-border-none tw-cursor-pointer">
                      Search
                    </button>
                  </div>
                     <h3 class=" tw-font-clash-display tw-text-[30px] tw-text-[#11181C]  tw-font-bold tw-my-7 tw-mb-10 ">Lowongan Unggulan</h3>

                  {{-- card section --}}
            
                     <div class="tw-grid tw-grid-cols-1 md:tw-grid-cols-2 lg:tw-grid-cols-3 tw-gap-8">
                        {{-- job card --}}
                        @foreach ($job as $item)
                            
                        
                        <div class="tw-relative tw-flex tw-flex-col tw-mt-6 tw-text-gray-700 tw-bg-[#18191C08] tw-border tw-border-[#E4E5E8] tw-rounded-xl tw-w-full">
                            <div class="tw-relative tw-h-[300px] tw-bg-cover tw-bg-fixed tw-overflow-hidden tw-text-white tw-rounded-xl tw-bg-blue-gray-500" style="background-position:center;">
                              @if ($item->gambar)
                              <img src="/upload/gambar/{{$item->gambar->gambar}}" alt="card-image" class="tw-object-cover tw-h-[300px] tw-w-full" />
                           
                              @else
                              <img src="/images/no-image.png" alt="card-image" class="tw-object-cover tw-h-[300px] tw-w-full" />
                                  
                              @endif
                            </div>
                            <div class="tw-p-6">
                               
                                <div class="tw-flex">
                                    <h5 class="tw-block tw-mb-2 tw-font-sans tw-text-xl tw-antialiased tw-font-semibold tw-leading-snug tw-tracking-normal tw-text-[#18191C]">
                                        {{$item->nama_job}}
                                    </h5>
                                    <div class="tw-ml-auto tw-flex tw-items-center tw-justify-center tw-w-8 tw-h-8 tw-rounded-full tw-bg-[#F1F9FE]">
                                        <i class="fa-regular fa-bookmark tw-text-sky-500 tw-text-2xl"></i>
                                    </div>
                                </div>
                                <!-- Button -->
                                <button class="tw-bg-[#DCFCE7] tw-py-2 tw-px-4 tw-rounded-md">
                                    <div class="tw-flex tw-items-center">
                                      <span class="tw-w-4 tw-h-4 tw-rounded-full tw-bg-green-500 tw-border-4 tw-border-green-300 tw-mr-2"></span>
                                        <span class="tw-text-green-700">Available</span>
                                    </div>
                                </button>
                                <p class="tw-mt-5 tw-text-lg tw-font-semibold tw-leading-5 tw-text-[#11181C]">Gaji</p>
                                <p class="tw-block tw-font-sans tw-text-base tw-antialiased tw-font-light tw-leading-relaxed tw-text-inherit">
                                    <span class="tw-text-[#2B9FDC] tw-text-2xl tw-font-semibold tw-font-clash-display tw-mt-1">Rp {{$item->estimasi_minimal}} - {{$item->estimasi_maksimal}} jt/</span> <span class="tw-text-lg tw-font-normal tw-text-[#2B9FDC]">bulan</span>
                                </p>
                                <div class="tw-grid tw-grid-cols-2 tw-gap-4 tw-mt-4">
                                    <div class="tw-flex tw-items-start">
                                        <i class="fa-solid fa-location-dot tw-text-base tw-mr-2" style="color: rgba(43, 159, 220, 1)"></i>
                                        <div>
                                            <p class="tw-text-base tw-font-semibold" style="color: rgba(0, 49, 79, 1)">Negara</p>
                                            <p class="tw-text-sm tw-font-light tw-text-[#52525B]">{{$item->nama_negara}}</p>
                                        </div>
                                    </div>
                                    <div class="tw-flex tw-items-start">
                                        <i class="fa-solid fa-briefcase tw-text-base tw-mr-2" style="color: rgba(43, 159, 220, 1)"></i>
                                        <div>
                                            <p class="tw-text-base tw-font-semibold" style="color: rgba(0, 49, 79, 1)">Kontrak Kerja</p>
                                            <p class="tw-text-sm tw-font-light tw-text-[#52525B]">{{$item->kontrak_kerja}}</p>
                                        </div>
                                    </div>
                                    <div class="tw-flex tw-items-start">
                                        <i class="fa-solid fa-language tw-text-base tw-mr-2" style="color: rgba(43, 159, 220, 1)"></i>
                                        <div>
                                            <p class="tw-text-base tw-font-semibold" style="color: rgba(0, 49, 79, 1)">Level Bahasa</p>
                                            <p class="tw-text-sm tw-font-light tw-text-[#52525B]">{{$item->level_bahasa}}</p>
                                        </div>
                                    </div>
                                    <div class="tw-flex tw-items-start">
                                        <i class="fa-solid fa-calendar-alt tw-text-base tw-mr-2" style="color: rgba(43, 159, 220, 1)"></i>
                                        <div>
                                            <p class="tw-text-base tw-font-semibold" style="color: rgba(0, 49, 79, 1)">Tanggal Berakhir</p>
                                            <p class="tw-text-sm tw-font-light tw-text-[#52525B]">30 Juni 2024</p>
                                        </div>
                                    </div>
                                </div>
                                
                                
                            </div>
                            <div class="tw-p-6 tw-pt-0">
                             <button class="tw-w-full tw-bg-sky-100 tw-text-[#2B9FDC] tw-font-bold tw-rounded-lg tw-border-none tw-cursor-pointer tw-py-2 tw-flex tw-items-center tw-justify-center">
                                Detail
                                <i class="fa-solid fa-arrow-right tw-ml-2 -tw-rotate-45" style="position: relative; top: -2px;"></i>
                            </button>
                            
                            </div>
                        </div>
                        @endforeach
                    </div>
                    {{-- lihat semua lowongan button --}}
                    <div class="tw-flex tw-justify-center tw-mt-6">
                        <button class=" tw-border-2 tw-rounded-md tw-border-sky-400 tw-text-[#2B9FDC] tw-font-bold  tw-cursor-pointer tw-py-2 tw-px-4 tw-flex tw-items-center tw-justify-center">
                            Lihat Semua Lowongan
                            <i class="fa-solid fa-arrow-right tw-ml-2 " style="position: relative;  "></i>
                        </button>
                    </div>
                    {{-- end card section --}}
                 {{-- count star --}}
                    <div class="tw-pt-12 sm:tw-pt-20">
                        <div class="tw-pb-12 tw-mt-10 sm:tw-pb-16">
                          <div class="tw-relative">
                            <div class="tw-absolute tw-inset-0 tw-h-1/2"></div>
                            <div class="tw-relative tw-max-w-full tw-px-4 tw-mx-auto sm:tw-px-6 lg:tw-px-8">
                              <div class="tw-max-w-7xl tw-mx-auto">
                                <dl class="sm:tw-grid sm:tw-grid-cols-3">
                                  <div class="tw-flex tw-flex-col tw-p-6 tw-text-center tw-border-b tw-border-sky-500 sm:tw-border-0 sm:tw-border-r">
                                    <dt class="tw-order-2 tw-mt-2 tw-text-lg tw-font-medium tw-leading-6 tw-text-gray-700 tw-border-l-4 tw-pl-3 tw-border-sky-500" id="item-1">
                                        Kandidat
                                    </dt>
                                    <dd class="tw-order-1 tw-text-5xl tw-font-extrabold tw-leading-none tw-text-sky-500 dark:tw-text-sky-500"
                                      aria-describedby="item-1" id="starsCount">
                                      0
                                    </dd>
                                  </div>
                                  <div class="tw-flex tw-flex-col tw-p-6 tw-text-center tw-border-t tw-border-b tw-border-sky-500 sm:tw-border-0 sm:tw-border-l sm:tw-border-r">
                                    <dt class="tw-order-2 tw-mt-2 tw-text-lg tw-font-medium tw-leading-6 tw-text-gray-700 tw-border-l-4 tw-pl-3 tw-border-sky-500">
                                      Kandidat Proses
                                    </dt>
                                    <dd class="tw-order-1 tw-text-5xl tw-font-extrabold tw-leading-none tw-text-sky-500 dark:tw-text-sky-500"
                                      id="downloadsCount">
                                      0
                                    </dd>
                                  </div>
                                  <div class="tw-flex tw-flex-col tw-p-6 tw-text-center tw-border-t tw-border-sky-500 sm:tw-border-0 sm:tw-border-l">
                                    <dt class="tw-order-2 tw-mt-2 tw-text-lg tw-font-medium tw-leading-6 tw-text-gray-700 tw-border-l-4 tw-pl-3 tw-border-sky-500">
                                      Kandidat Telah Bekerja Di Luar Negeri
                                    </dt>
                                    <dd class="tw-order-1 tw-text-5xl tw-font-extrabold tw-leading-none tw-text-sky-500 dark:tw-text-sky-500"
                                      id="sponsorsCount">
                                      0
                                    </dd>
                                  </div>
                                </dl>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                {{-- count end --}}
                {{-- hero section --}}
                <section class=" tw-py-12 sm:tw-py-20">
                    <div class="tw-max-w-screen-xl tw-mx-auto tw-flex tw-flex-col-reverse lg:tw-flex-row tw-items-center tw-px-4 sm:tw-px-6 lg:tw-px-8">
                      <!-- Right Side - Text -->
                      <div class="tw-w-full lg:tw-w-1/2 tw-text-center lg:tw-text-left">
                        <p class="tw-mt-4 tw-text-xl tw-text-sky-500 sm:tw-mt-6 tw-font-bold lg:tw-text-4xl tw-w-3/4 tw-font-caveat">Mulai</p>
                        <p class=" tw-text-xl tw-text-[#11181C] tw-font-semibold lg:tw-text-4xl tw-w-3/4 tw-font-clash-display">
                            Karir Resmi Anda Di Luar Negeri Dari Sini
                        </p>
                        <p class="tw-mt-4 tw-text-base tw-text-[#52525B] tw-font-base lg:tw-text-lg tw-w-full tw-font-work-sans">
                            Rasakan manfaat dari sebuah proses yang sangat efisien dan transparan yang kami tawarkan melalui layanan kami yang unggul dan terpercaya   </div>
                      <div class="tw-w-full lg:tw-w-1/2 tw-flex tw-justify-center lg:tw-justify-start tw-mt-8 lg:tw-mt-0">
                        <img src="{{ asset('frontend') }}/assets/component/hero1.png" alt="Hero Icon" class="tw-w-full">
                      </div>
                  
                      
                    </div>
                  </section>
                  <section class="tw-bg-gradient-to-r tw-py-12">
                    <div class="tw-container tw-mx-auto">
                        <div class="tw-grid tw-grid-cols-1 md:tw-grid-cols-2 lg:tw-grid-cols-2 tw-gap-8">
                          <div>
                            <img src="{{ asset('frontend') }}/assets/component/candidat1.jpg" class="tw-w-full" alt="">
                          </div>
                          <div>
                            <img src="{{ asset('frontend') }}/assets/component/candidat2.jpg" class="tw-w-full" alt="">
                          </div>
                          <div>
                            <img src="{{ asset('frontend') }}/assets/component/candidat3.jpg" class="tw-w-full" alt="">
                          </div>
                          <div>
                            <img src="{{ asset('frontend') }}/assets/component/candidat4.jpg" class="tw-w-full" alt="">
                          </div>
                        </div>
                    </div>
                </section>
                
                <section class=" tw-py-12">
                    <p class="tw-text-sky-500 tw-text-center tw-font-caveat tw-text-4xl tw-font-bold">Kenapa?</p>
                    <p class="tw-text-[#11181C] tw-text-center tw-text-4xl tw-font-semibold tw-mb-16 tw-font-clash-display">Pilih Kami Untuk Karier <br> Internasional Anda</p>
                    <div class="tw-container tw-mx-auto tw-grid tw-grid-cols-12 tw-gap-8">
                        <div class="tw-col-span-4">
                            <img src="{{ asset('frontend') }}/assets/component/hero2.png" alt="Vector Image" class="tw-w-full tw-h-full">
                        </div>
                        <div class="tw-col-span-4  tw-pt-10 tw-flex tw-flex-col tw-justify-between">
                            <div>
                                <h2 class="tw-text-2xl tw-font-bold tw-mb-2 tw-text-sky-500 tw-font-clash-display">Jaminan mendapat Job Internasional</h2>
                                <p class="tw-text-gray-600 tw-w-full tw-font-work-sans tw-font-medium">Kami akan menghubungi Anda secara langsung untuk merekomendasikan Pekerjaan yang sesuai dengan kualifikasi Anda. Cukup standby sampai kami menghubungi Anda</p>
                            </div>
                            <div>
                                <h2 class="tw-text-2xl tw-font-bold tw-mb-2 tw-text-sky-500 tw-font-clash-display tw-mt-10">Pengalaman</h2>
                                <p class="tw-text-gray-600 tw-w-full tw-font-work-sans tw-font-medium">Kami bagian dari Assalam Group yang telah berpengalaman lebih dari 25 tahun di Industri Tenaga Kerja untuk ditempatkan di Luar Negeri secara resmi dan prosedural</p>
                            </div>
                        </div>
                        <div class="tw-col-span-4 tw-flex tw-flex-col tw-justify-between tw-pt-10">
                            <div>
                                <h2 class="tw-text-2xl tw-font-bold tw-mb-2 tw-text-sky-500 tw-font-clash-display">Jaminan Transparansi</h2>
                                <p class="tw-text-gray-600 tw-w-full tw-font-work-sans tw-font-medium   ">Secara terbuka kami akan menjelaskan kepada Anda mulai dari Pekerjaan yang Anda lamar, Biaya Proses yang dibutuhkan, dan Langkah Proses sampai tiba di Negara tujuan</p>
                            </div>
                            <div>
                                <h2 class="tw-text-2xl tw-font-bold tw-mb-2 tw-text-sky-500 tw-font-clash-display tw-mt-10">Jaminan Keamanan</h2>
                                <p class="tw-text-gray-600 tw-w-full tw-font-work-sans tw-font-medium">Kami akan memberikan jaminan keamanan bagi Anda selama proses perjalanan ke luar negeri, mulai dari keberangkatan sampai tiba di Negara tujuan</p>
                            </div>
                        </div>
                    </div>
                </section>
                
                
                
                  
            </div>     
            </div>
        </div>
        <div class="tw-bg-sky-500 tw-py-12 tw-relative">
            <div class="tw-max-w-7xl tw-mx-auto">
                <div class="tw-p-10">
                    <h2 class="tw-text-white tw-text-center tw-font-caveat tw-text-5xl tw-font-bold">Saatnya Bergabung</h2> 
                    <p class="tw-text-white tw-text-center tw-text-6xl tw-mt-5 tw-font-semibold tw-mb-16 tw-font-clash-display">Buat Akun Dan Lamar Pekerjaan Impianmu</p>
                    {{-- button kuning bergabung sekarang --}}
                    <div class="tw-flex tw-justify-center">
                        <button class="tw-bg-[#FDD003] tw-text-gray-900 tw-font-bold tw-rounded-lg tw-py-3 tw-px-6 tw-cursor-pointer tw-flex tw-items-center tw-justify-center">
                            Bergabung Sekarang
                            <i class="fa-solid fa-arrow-right tw-ml-2" style="position: relative; top: -1px;"></i>
                        </button>
                    </div>
                </div>
            </div>
        
            <svg class="tw-absolute tw-top-1/2 tw-left-40 tw-transform tw--translate-y-1/2" width="100" height="100" viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M50 0L61.18 36.06H100L69.1 57.94L80.29 94L50 74.12L19.71 94L30.9 57.94L0 36.06H38.82L50 0Z" fill="#EDBF3E"/>
            </svg>
    
            <svg class="tw-absolute tw-top-1/2 tw-right-40 tw-transform tw--translate-y-1/2" width="100" height="100" viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M50 0L61.18 36.06H100L69.1 57.94L80.29 94L50 74.12L19.71 94L30.9 57.94L0 36.06H38.82L50 0Z" fill="#EDBF3E"/>
            </svg>
        </div>
            {{-- testi section --}}
            <section class="tw-py-12">
                <div class="tw-max-w-7xl tw-mx-auto">
                 
                    {{-- make a section text --}}
                    <div class="tw-max-w-5xl tw-mt-16 tw-p-10 tw-min-h-[300px] tw-rounded-md tw-mb-10 tw-mx-auto tw-text-center tw-bg-[#F1F9FE]">
                        <!-- Nama -->
                        <h2 class="tw-text-3xl tw-font-bold tw-text-[#11181C] tw-font-work-sans">John Doe</h2>
                        <!-- Deskripsi Testimoni -->
                        <p class="tw-text-lg tw-text-[#52525B] tw-mt-10">"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat."</p>
                    </div>
                    <!-- Avatar Container -->
                    <div class="tw-flex tw-justify-center tw-gap-5 tw-mt-4">
                        <img src="https://raw.githubusercontent.com/creativetimofficial/public-assets/master/soft-ui-dashboard/assets/img/drake.jpg" alt="avatar image" class="tw-inline-flex tw-items-center tw-justify-center tw-mr-2 tw-text-white tw-transition-all tw-duration-200 tw-ease-in-out tw-w-16 tw-h-16 tw-text-sm tw-rounded-full" />
                        <img src="https://raw.githubusercontent.com/creativetimofficial/public-assets/master/soft-ui-dashboard/assets/img/drake.jpg" alt="avatar image" class="tw-inline-flex tw-items-center tw-justify-center tw-mr-2 tw-text-white tw-transition-all tw-duration-200 tw-ease-in-out tw-w-16 tw-h-16 tw-text-sm tw-rounded-full" />
                        <img src="https://raw.githubusercontent.com/creativetimofficial/public-assets/master/soft-ui-dashboard/assets/img/drake.jpg" alt="avatar image" class="tw-inline-flex tw-items-center tw-justify-center tw-mr-2 tw-text-white tw-transition-all tw-duration-200 tw-ease-in-out tw-w-16 tw-h-16 tw-text-sm tw-rounded-full  tw-scale-125" />
                        <img src="https://raw.githubusercontent.com/creativetimofficial/public-assets/master/soft-ui-dashboard/assets/img/drake.jpg" alt="avatar image" class="tw-inline-flex tw-items-center tw-justify-center tw-mr-2 tw-text-white tw-transition-all tw-duration-200 tw-ease-in-out tw-w-16 tw-h-16 tw-text-sm tw-rounded-full" />
                        <img src="https://raw.githubusercontent.com/creativetimofficial/public-assets/master/soft-ui-dashboard/assets/img/drake.jpg" alt="avatar image" class="tw-inline-flex tw-items-center tw-justify-center tw-mr-2 tw-text-white tw-transition-all tw-duration-200 tw-ease-in-out tw-w-16 tw-h-16 tw-text-sm tw-rounded-full" />
                    </div>
                    
                </div>
            </section>
            
          
                   
            
    </div>
    <script>
        const targets = [
          { element: document.getElementById('starsCount'), count: 4670, suffix: '+' },
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
    
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var splide = new Splide('.splide', {
                type: 'loop',
                padding: '5rem',
            });

            splide.mount();
        });
    </script>
@endsection
