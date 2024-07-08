@extends('front.compro-2.layouts.default')

@section('title', 'Home Akama Job')

@section('content')
@include('front.compro-2.component.navdefault')
{{-- Slider section --}}
    <div class="md:tw-h-[500px] tw-h-[350px]">
        <div class="tw-h-full" style="background: url('{{ asset('frontend') }}/assets/image/carousel.png'); background-position: center; background-size: cover;">
        <section id="image-carousel" class="splide tw-max-w-7xl mx-auto tw-rounded-lg tw-block" aria-label="Beautiful Images">
            <div class="splide__track">
              <ul class="splide__list sm:p-0">
                @foreach ($slider as $r  )
                  
                <li class="splide__slide relative overflow-hidden flex justify-center items-center">
                  <img src="/upload/slider/{{ $r->gambar }}" alt="Slider Image 1" class="tw-rounded-lg block mx-auto rounded-2xl max-w-full tw-w-[75%]  bg-center bg-cover p-8 mt-12 sm:p-4 sm:h-62">
                </li>
                @endforeach
                
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
            <form id="search-form" class="tw-flex tw-items-center tw-gap-0 tw-p-2 tw-bg-[#F4F4F5] tw-rounded-lg" data-aos-duration="1000" data-aos="zoom-in-up">
              <div class="tw-relative tw-flex tw-items-center tw-gap-2 tw-p-2 tw-bg-[#F4F4F5] tw-border-r tw-border-gray-300">
                  <div class="tw-relative tw-cursor-pointer" id="custom-dropdown">
                      <div class="tw-flex tw-items-center tw-gap-2 tw-bg-[#F4F4F5] tw-p-2 tw-rounded-lg tw-border tw-border-gray-300">
                          <img src="/upload/negara/{{ $negara[0]->logo }}" alt="Country Flag" class="tw-w-8 tw-h-8" id="selected-flag"/>
                          <span id="selected-code">{{ $negara[0]->kode_negara }}</span>
                          <svg width="12" height="6" viewBox="0 0 12 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <path d="M6 0L12 6H0L6 0Z" fill="#606060" />
                          </svg>
                      </div>
                      <div id="dropdown-options" class="tw-hidden tw-absolute tw-bg-white tw-shadow-lg tw-rounded-lg tw-z-10 tw-mt-2 tw-w-full">
                          @foreach ($negara as $item)
                          <div class="dropdown-option tw-flex tw-items-center tw-gap-2 tw-p-2 tw-cursor-pointer hover:tw-bg-gray-100" data-code="{{ $item->kode_negara }}" data-logo="/upload/negara/{{ $item->logo }}" data-id="{{ $item->id }}">
                              <img src="/upload/negara/{{ $item->logo }}" alt="Country Flag" class="tw-w-8 tw-h-8" />
                              <span>{{ $item->kode_negara }}</span>
                          </div>
                          @endforeach
                      </div>
                  </div>
              </div>
              <input type="hidden" name="negara" id="negara-select">
              <div class="tw-flex tw-items-center tw-gap-2 tw-p-2 tw-bg-[#F4F4F5] tw-flex-1">
                  <i class="fa-solid fa-magnifying-glass tw-text-sky-500"></i>
                  <input id="search-input" type="text" placeholder="Job title, keyword, company" name="query" class="tw-border-none tw-outline-none tw-text-base tw-text-gray-600 tw-bg-[#F4F4F5] tw-w-full" />
              </div>
              <div class="tw-flex tw-items-center tw-gap-2 tw-p-2 tw-px-4 tw-mr-2 tw-bg-[#F1F9FE] tw-rounded-md tw-cursor-pointer">
                  <i class="fa-solid fa-sliders tw-text-sky-500"></i>
                  <span class="tw-text-sky-500">Filter</span>
              </div>
              <button type="submit" class="tw-p-2 tw-px-4 tw-bg-sky-500 tw-text-white tw-font-bold tw-rounded-lg tw-border-none tw-cursor-pointer">
                  Search
              </button>
          </form>




                     <h3 class=" tw-font-clash-display tw-text-[30px] tw-text-[#11181C]  tw-font-bold tw-my-7 tw-mb-10 ">Lowongan Unggulan</h3>

                  {{-- card section --}}
            
                     <div id="jobs-container" class="tw-grid tw-grid-cols-1 md:tw-grid-cols-2 lg:tw-grid-cols-3 tw-gap-8">
                        {{-- job card --}}
                        @foreach ($jobs as $item)
                            
                        <div data-aos="zoom-in-up" data-aos-duration="1000" class="tw-relative tw-flex tw-flex-col tw-mt-6 tw-text-gray-700 tw-bg-[#18191C08] tw-border tw-border-[#E4E5E8] tw-rounded-xl tw-w-full">
                            <div class="tw-relative tw-h-[300px] tw-bg-cover tw-bg-fixed tw-overflow-hidden tw-text-white tw-rounded-xl tw-bg-blue-gray-500" style="background-position:center;">
                              @if ($item->gambar)
                              <img src="/upload/gambar/{{$item->gambar}}" alt="card-image" class="tw-object-cover tw-h-[300px] tw-w-full" />
                           
                              @else
                              <img src="/images/no-image.png" alt="card-image" class="tw-object-cover tw-h-[300px] tw-w-full" />
                                  
                              @endif
                            </div>
                            <div class="tw-p-6">
                               
                                <div class="tw-flex">
                                    <a href="{{ route('front.jobs.show', hashId($item->id)) }}" class="tw-block tw-mb-2 tw-font-sans tw-text-xl tw-antialiased tw-font-semibold tw-leading-snug tw-tracking-normal tw-text-[#18191C] hover:tw-text-[#18191C] hover:tw-underline ">
                                      {{$item->nama_job}}
                                    </a>
                                    </a>
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
                                    <span class="tw-text-[#2B9FDC] tw-text-lg tw-font-semibold tw-font-clash-display tw-mt-1">Rp {{'Rp'. number_format($item->estimasi_minimal)}} - {{'Rp'.number_format($item->estimasi_maksimal)}} jt/</span> <span class="tw-text-lg tw-font-normal tw-text-[#2B9FDC]">bulan</span>
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
                              <a href="{{ route('front.jobs.show', hashId($item->id)) }}" class="hover:tw-text-sky-600 hover:tw-scale-105 tw-w-full tw-bg-sky-100 tw-text-[#2B9FDC] tw-font-bold tw-rounded-lg tw-border-none tw-cursor-pointer tw-py-2 tw-flex tw-items-center tw-justify-center">
                                Detail
                                <i class="fa-solid fa-arrow-right tw-ml-2 -tw-rotate-45" style="position: relative; top: -2px;"></i>
                              </a>
                                @if (auth()?->user()?->kandidat?->pendaftaran?->status == "Verifikasi")
                                  
                                <a href="{{ route('front.jobs.apply', hashId($item->id)) }}" class="hover:tw-text-green-600 hover:tw-scale-105 tw-w-full tw-bg-green-100 tw-text-[#28a745] tw-font-bold tw-rounded-lg tw-border-none tw-cursor-pointer tw-py-2 tw-flex tw-items-center tw-justify-center tw-mt-4">
                                  Lamar
                                  <i class="fa-solid fa-paper-plane tw-ml-2" style="position: relative; top: -2px;"></i>
                                </a>
                                @endif
                               
                            </div>
                            <!-- <div class="tw-p-6 tw-pt-0 tw-flex tw-gap-4">
                              <a href="{{ route('front.jobs.show', hashId($item->id)) }}" class="hover:tw-text-sky-600 hover:tw-scale-105 tw-w-1/2 tw-bg-sky-100 tw-text-[#2B9FDC] tw-font-bold tw-rounded-lg tw-border-none tw-cursor-pointer tw-py-2 tw-flex tw-items-center tw-justify-center">
                                Detail
                                <i class="fa-solid fa-arrow-right tw-ml-2 -tw-rotate-45" style="position: relative; top: -2px;"></i>
                              </a>
                              
                              <button onclick="location.href='{{ route('front.jobs.apply', hashId($item->id)) }}'" class="hover:tw-text-green-600 hover:tw-scale-105 tw-w-1/2 tw-bg-green-100 tw-text-[#28a745] tw-font-bold tw-rounded-lg tw-border-none tw-cursor-pointer tw-py-2 tw-flex tw-items-center tw-justify-center">
                                Lamar
                                <i class="fa-solid fa-paper-plane tw-ml-2" style="position: relative; top: -2px;"></i>
                              </button>
                            </div> -->


                        </div>
                        @endforeach
                    </div>
                    {{-- lihat semua lowongan button --}}
                    
                    <div class="tw-flex tw-justify-center tw-mt-6" data-aos="zoom-in-up">
                        <a href="{{route('front.jobs.index')}}" class=" tw-border-2 tw-rounded-md tw-border-sky-400 tw-text-[#2B9FDC] tw-font-bold  tw-cursor-pointer tw-py-2 tw-px-4 tw-flex tw-items-center tw-justify-center">
                            Lihat Semua Lowongan
                            <i class="fa-solid fa-arrow-right tw-ml-2 " style="position: relative;  "></i>
                        </a>
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
                                  <div data-aos="fade-up" data-aos-duration="1000" class="tw-flex tw-flex-col tw-p-6 tw-text-center tw-border-b tw-border-sky-500 sm:tw-border-0 sm:tw-border-r">
                                    <dt class="tw-order-2 tw-mt-2 tw-text-lg tw-font-medium tw-leading-6 tw-text-gray-700 tw-border-l-4 tw-pl-3 tw-border-sky-500" id="item-1">
                                        Kandidat
                                    </dt>
                                    <dd class="tw-order-1 tw-text-5xl tw-font-extrabold tw-leading-none tw-text-sky-500 dark:tw-text-sky-500"
                                      aria-describedby="item-1" id="starsCount">
                                      0
                                    </dd>
                                  </div>
                                  <div data-aos="fade-up" data-aos-duration="1000" class="tw-flex tw-flex-col tw-p-6 tw-text-center tw-border-t tw-border-b tw-border-sky-500 sm:tw-border-0 sm:tw-border-l sm:tw-border-r">
                                    <dt class="tw-order-2 tw-mt-2 tw-text-lg tw-font-medium tw-leading-6 tw-text-gray-700 tw-border-l-4 tw-pl-3 tw-border-sky-500">
                                      Kandidat Proses
                                    </dt>
                                    <dd class="tw-order-1 tw-text-5xl tw-font-extrabold tw-leading-none tw-text-sky-500 dark:tw-text-sky-500"
                                      id="downloadsCount">
                                      0
                                    </dd>
                                  </div>
                                  <div data-aos="fade-up" data-aos-duration="1000" class="tw-flex tw-flex-col tw-p-6 tw-text-center tw-border-t tw-border-sky-500 sm:tw-border-0 sm:tw-border-l">
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
                <section class="tw-py-12 sm:tw-py-20">
                  <div class="tw-max-w-screen-xl tw-mx-auto tw-flex tw-flex-col-reverse lg:tw-flex-row tw-items-center tw-px-4 sm:tw-px-6 lg:tw-px-8">
                    <!-- Right Side - Text -->
                    <div class="tw-w-full lg:tw-w-1/2 tw-text-center lg:tw-text-left" data-aos="fade-right" data-aos-duration="1000">
                      <p class="tw-mt-4 tw-text-4xl tw-text-sky-500  sm:tw-mt-6 tw-font-bold lg:tw-text-4xl md:tw-w-3/4 tw-w-full tw-font-caveat">Mulai</p>
                      <p class="tw-text-2xl tw-text-[#11181C] tw-font-semibold lg:tw-text-4xl md:-w-3/4 tw-font-clash-display tw-w-full">
                        Karir Resmi Anda Di Luar Negeri Dari Sini
                      </p>
                      <p class="tw-mt-4 tw-text-base tw-text-[#52525B] tw-font-base lg:tw-text-lg tw-w-full tw-font-work-sans">
                        Rasakan manfaat dari sebuah proses yang sangat efisien dan transparan yang kami tawarkan melalui layanan kami yang unggul dan terpercaya
                      </p>
                    </div>
                    <div class="tw-w-full lg:tw-w-1/2 tw-flex tw-justify-center lg:tw-justify-start tw-mt-8 lg:tw-mt-0" data-aos="fade-left" data-aos-duration="1000">
                      <img src="{{ asset('frontend') }}/assets/component/hero1.png" alt="Hero Icon" class="tw-w-full">
                    </div>
                  </div>
                </section>
                <section class="tw-bg-gradient-to-r tw-py-12">
                  <div class="tw-container tw-mx-auto">
                    <div class="tw-grid tw-grid-cols-1 md:tw-grid-cols-2 lg:tw-grid-cols-2 tw-gap-8">
                      <div>
                        <img src="{{ asset('frontend') }}/assets/component/candidat1.jpg" class="tw-w-full" alt="" data-aos="zoom-in"  data-aos-duration="1000">
                      </div>
                      <div>
                        <img src="{{ asset('frontend') }}/assets/component/candidat2.jpg" class="tw-w-full" alt=""  data-aos="zoom-in"  data-aos-duration="1000">
                      </div>
                      <div>
                        <img src="{{ asset('frontend') }}/assets/component/candidat3.jpg" class="tw-w-full" alt=""  data-aos="zoom-in"  data-aos-duration="1000">
                      </div>
                      <div>
                        <img src="{{ asset('frontend') }}/assets/component/candidat4.jpg" class="tw-w-full" alt=""  data-aos="zoom-in"  data-aos-duration="1000">
                      </div>
                    </div>
                  </div>
                </section>
                
                
                <section class="tw-py-12">
                  <p class="tw-text-sky-500 tw-text-center tw-font-caveat tw-text-4xl tw-font-bold" data-aos="fade-up" data-aos-duration="700">Kenapa?</p>
                  <p class="tw-text-[#11181C] tw-text-center tw-text-2xl lg:tw-text-4xl tw-font-semibold tw-mb-8 lg:tw-mb-16 tw-font-clash-display" data-aos="fade-up" data-aos-duration="700">Pilih Kami Untuk Karier <br> Internasional Anda</p>
                  <div class="tw-container tw-mx-auto tw-grid tw-grid-cols-1 lg:tw-grid-cols-12 tw-gap-8">
                    <div class="tw-col-span-1 lg:tw-col-span-4">
                      <img src="{{ asset('frontend') }}/assets/component/hero2.png" alt="Vector Image" class="tw-w-full tw-h-full" data-aos="fade-right" data-aos-duration="700">
                    </div>
                    <div class="tw-col-span-1 lg:tw-col-span-4 tw-pt-10 lg:tw-pt-0 tw-flex tw-flex-col tw-justify-between">
                      <div>
                        <h2 class="tw-text-xl lg:tw-text-2xl tw-font-bold tw-mb-2 tw-text-sky-500 tw-font-clash-display" data-aos="fade-up" data-aos-duration="700">Jaminan mendapat Job Internasional</h2>
                        <p class="tw-text-gray-600 tw-font-work-sans tw-font-medium" data-aos="fade-up" data-aos-duration="700">Kami akan menghubungi Anda secara langsung untuk merekomendasikan Pekerjaan yang sesuai dengan kualifikasi Anda. Cukup standby sampai kami menghubungi Anda</p>
                      </div>
                      <div class="tw-mt-10 lg:tw-mt-0">
                        <h2 class="tw-text-xl lg:tw-text-2xl tw-font-bold tw-mb-2 tw-text-sky-500 tw-font-clash-display " data-aos="fade-up" data-aos-duration="700">Pengalaman</h2>
                        <p class="tw-text-gray-600 tw-font-work-sans tw-font-medium" data-aos="fade-up" data-aos-duration="700">Kami bagian dari Assalam Group yang telah berpengalaman lebih dari 25 tahun di Industri Tenaga Kerja untuk ditempatkan di Luar Negeri secara resmi dan prosedural</p>
                      </div>
                    </div>
                    <div class="tw-col-span-1 lg:tw-col-span-4 tw-flex tw-flex-col tw-justify-between ">
                      <div>
                        <h2 class="tw-text-xl lg:tw-text-2xl tw-font-bold tw-mb-2 tw-text-sky-500 tw-font-clash-display" data-aos="fade-up" data-aos-duration="700">Jaminan Transparansi</h2>
                        <p class="tw-text-gray-600 tw-font-work-sans tw-font-medium" data-aos="fade-up" data-aos-duration="700">Secara terbuka kami akan menjelaskan kepada Anda mulai dari Pekerjaan yang Anda lamar, Biaya Proses yang dibutuhkan, dan Langkah Proses sampai tiba di Negara tujuan</p>
                      </div>
                      <div class="tw-mt-10 lg:tw-mt-0">
                        <h2 class="tw-text-xl lg:tw-text-2xl tw-font-bold tw-mb-2 tw-text-sky-500 tw-font-clash-display" data-aos="fade-up" data-aos-duration="700">Jaminan Keamanan</h2>
                        <p class="tw-text-gray-600 tw-font-work-sans tw-font-medium">Kami akan memberikan jaminan keamanan bagi Anda selama proses perjalanan ke luar negeri, mulai dari keberangkatan sampai tiba di Negara tujuan</p>
                      </div>
                    </div>
                  </div>
                </section>
                
                
                
                  
            </div>     
            </div>
        </div>
        <div class="tw-bg-sky-500 tw-py-12 tw-relative">
          <div class="tw-max-w-7xl tw-mx-auto">
            <div class="tw-p-5 sm:tw-p-10"> 
              <h2 class="tw-text-white tw-text-center tw-font-caveat tw-text-3xl sm:tw-text-5xl tw-font-bold" data-aos="fade-up" data-aos-duration="700" >Saatnya Bergabung</h2> <!-- Sesuaikan ukuran teks untuk perangkat mobile -->
              <p class="tw-text-white tw-text-center tw-text-4xl sm:tw-text-6xl tw-mt-3 sm:tw-mt-5 tw-font-semibold tw-mb-8 tw-font-clash-display" data-aos="fade-up" data-aos-duration="700">Buat Akun Dan Lamar Pekerjaan Impianmu</p> <!-- Sesuaikan ukuran teks dan margin untuk perangkat mobile -->
             
              <div class="tw-flex tw-justify-center" data-aos="zoom-in" data-aos-duration="700">
                <a href="{{route('compro-2.daftar')}}" class="tw-bg-[#FDD003] tw-text-gray-900 tw-font-bold tw-rounded-lg tw-py-3 tw-px-6 tw-cursor-pointer tw-flex tw-items-center tw-justify-center hover:tw-scale-105 hover:tw-text-gray-900">
                  Bergabung Sekarang
                  <i class="fa-solid fa-arrow-right tw-ml-2" style="position: relative; top: -1px;"></i>
                </a>
              </div>
            </div>
          </div>
         
        <div class=" tw-absolute tw-top-1/2 tw-left-0 sm:tw-left-40 tw-transform tw--translate-y-1/2"  data-aos="zoom-in-up" data-aos-duration="700" >

          <svg class="tw-hidden md:tw-block"  width="100" height="100" viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M50 0L61.18 36.06H100L69.1 57.94L80.29 94L50 74.12L19.71 94L30.9 57.94L0 36.06H38.82L50 0Z" fill="#EDBF3E"/>
          </svg>
        </div>
        
        <div class="tw-absolute tw-top-1/2 tw-right-0 sm:tw-right-40 tw-transform tw--translate-y-1/3" data-aos="zoom-in-up" data-aos-duration="700" >
          
          <svg class="tw-hidden md:tw-block"  width="100" height="100" viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M50 0L61.18 36.06H100L69.1 57.94L80.29 94L50 74.12L19.71 94L30.9 57.94L0 36.06H38.82L50 0Z" fill="#EDBF3E"/>
          </svg>
        </div>
        </div>
        
            {{-- testi section --}}
            <div class="tw-max-w-7xl tw-mx-auto tw-py-10" id="image-carousel2">
        <!-- Testimonial Cards -->
        <div class="tw-max-w-5xl tw-mx-auto tw-p-6 sm:tw-p-10 tw-rounded-md tw-mb-8 sm:tw-mb-10 tw-text-center tw-bg-[#F1F9FE]">
            <div class="testimonial-card active">
                <h2 class="tw-text-xl sm:tw-text-3xl tw-font-bold tw-text-[#11181C] tw-font-work-sans">John Doe</h2>
                <p class="tw-text-base sm:tw-text-lg tw-text-[#52525B] tw-mt-4 sm:tw-mt-6">"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat."</p>
            </div>
            <div class="testimonial-card">
                <h2 class="tw-text-xl sm:tw-text-3xl tw-font-bold tw-text-[#11181C] tw-font-work-sans">Jane Smith</h2>
                <p class="tw-text-base sm:tw-text-lg tw-text-[#52525B] tw-mt-4 sm:tw-mt-6">"Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat."</p>
            </div>
            <div class="testimonial-card">
                <h2 class="tw-text-xl sm:tw-text-3xl tw-font-bold tw-text-[#11181C] tw-font-work-sans">Alice Johnson</h2>
                <p class="tw-text-base sm:tw-text-lg tw-text-[#52525B] tw-mt-4 sm:tw-mt-6">"Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur."</p>
            </div>
            <div class="testimonial-card">
                <h2 class="tw-text-xl sm:tw-text-3xl tw-font-bold tw-text-[#11181C] tw-font-work-sans">Michael Brown</h2>
                <p class="tw-text-base sm:tw-text-lg tw-text-[#52525B] tw-mt-4 sm:tw-mt-6">"Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."</p>
            </div>
        </div>

        <!-- Avatar Images -->
        <div class="tw-flex tw-flex-wrap tw-justify-center tw-gap-3">
            <img data-aos="zoom-in" data-aos-duration="700" src="https://raw.githubusercontent.com/creativetimofficial/public-assets/master/soft-ui-dashboard/assets/img/drake.jpg" alt="avatar image" class="avatar-image tw-inline-flex tw-items-center tw-justify-center tw-mr-2 tw-text-white tw-transition-all tw-duration-200 tw-ease-in-out tw-w-12 h-12 sm:tw-w-16 sm:h-16 tw-text-sm sm:tw-text-base tw-rounded-full active" />
            <img data-aos="zoom-in" data-aos-duration="700" src="https://raw.githubusercontent.com/creativetimofficial/public-assets/master/soft-ui-dashboard/assets/img/drake.jpg" alt="avatar image" class="avatar-image tw-inline-flex tw-items-center tw-justify-center tw-mr-2 tw-text-white tw-transition-all tw-duration-200 tw-ease-in-out tw-w-12 h-12 sm:tw-w-16 sm:h-16 tw-text-sm sm:tw-text-base tw-rounded-full" />
            <img data-aos="zoom-in" data-aos-duration="700" src="https://raw.githubusercontent.com/creativetimofficial/public-assets/master/soft-ui-dashboard/assets/img/drake.jpg" alt="avatar image" class="avatar-image tw-inline-flex tw-items-center tw-justify-center tw-mr-2 tw-text-white tw-transition-all tw-duration-200 tw-ease-in-out tw-w-12 h-12 sm:tw-w-16 sm:h-16 tw-text-sm sm:tw-text-base tw-rounded-full" />
            <img data-aos="zoom-in" data-aos-duration="700" src="https://raw.githubusercontent.com/creativetimofficial/public-assets/master/soft-ui-dashboard/assets/img/drake.jpg" alt="avatar image" class="avatar-image tw-inline-flex tw-items-center tw-justify-center tw-mr-2 tw-text-white tw-transition-all tw-duration-200 tw-ease-in-out tw-w-12 h-12 sm:tw-w-16 sm:h-16 tw-text-sm sm:tw-text-base tw-rounded-full" />
            <img data-aos="zoom-in" data-aos-duration="700" src="https://raw.githubusercontent.com/creativetimofficial/public-assets/master/soft-ui-dashboard/assets/img/drake.jpg" alt="avatar image" class="avatar-image tw-inline-flex tw-items-center tw-justify-center tw-mr-2 tw-text-white tw-transition-all tw-duration-200 tw-ease-in-out tw-w-12 h-12 sm:tw-w-16 sm:h-16 tw-text-sm sm:tw-text-base tw-rounded-full" />
        </div>
    </div>
            
                   
            
    </div>
    @push('css')
     <style>
      .splide__slide {
  position: relative;
  overflow: hidden;
}
.splide__slide{
      display: flex;
    justify-content: center;
    align-items: center;
    border-radius: 20px;
    }
        .splide__slide img {
  width: 100%;
  height: 350px;
  background-position:center;
  background-size: cover; 
  object-fit: cover;
  padding: 2rem;
  border-radius: 20px;
  margin-top: 3rem;
}
/*remove padding in mobile  */
@media (max-width: 767px) {
  .splide__slide img {
    padding: 1em;
    height: 250px;
  }
}
.carousel-image {
    display: none;
    margin: 0 auto;
    border-radius: 15px; 
    max-width: 100%;
    height: auto;
}
.testimonial-card {
            display: none;
            transition: opacity 1s ease;
        }

.active {
            display: block;
        }


     </style> 
@endpush
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  $(document).ready(function() {
    $('#custom-dropdown').on('click', function(event) {
        $('#dropdown-options').toggleClass('tw-hidden');
        event.stopPropagation();
    });

    $('.dropdown-option').on('click', function() {
        var logo = $(this).data('logo');
        var code = $(this).data('code');
        var id = $(this).data('id');

        $('#selected-flag').attr('src', logo);
        $('#selected-code').text(code);
        $('#negara-select').val(id);

        $('#dropdown-options').style.display = 'none';
    });

    $(document).on('click', function(event) {
        if (!$(event.target).closest('#custom-dropdown').length) {
            $('#dropdown-options').style.display = 'none';
        }
    });
});
</script>
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
    
@push('js')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


   <script>
$(document).ready(function() {
    $('#search-form').on('submit', function(e) {
        e.preventDefault();
        let search = $('#search-input').val();
        let negara = $('#negara-select').val(); 
        

        $.ajax({
            url: `{{route('ajax.job')}}`,
            method: 'GET',
            data: { search: search,negara:negara },
            success: function(response) {
            console.log(response);
                $('#jobs-container').empty();
                if(response.length > 0) {
                    response.forEach(function(job) {
                      let id = job.id;
                        let jobHtml = `
                         <div data-aos="zoom-in-up" data-aos-duration="1000" class="tw-relative tw-flex tw-flex-col tw-mt-6 tw-text-gray-700 tw-bg-[#18191C08] tw-border tw-border-[#E4E5E8] tw-rounded-xl tw-w-full">
                            <div class="tw-relative tw-h-[300px] tw-bg-cover tw-bg-fixed tw-overflow-hidden tw-text-white tw-rounded-xl tw-bg-blue-gray-500" style="background-position:center;">
                           
                              <img src="/upload/gambar/${job.gambar}" alt="card-image" class="tw-object-cover tw-h-[300px] tw-w-full" />
                            </div>
                            <div class="tw-p-6">
                               
                                <div class="tw-flex">
                                    <a href="job/${job.id}" class="tw-block tw-mb-2 tw-font-sans tw-text-xl tw-antialiased tw-font-semibold tw-leading-snug tw-tracking-normal tw-text-[#18191C] hover:tw-text-[#18191C] hover:tw-underline ">
                                    ${job.nama_job}
                                    </a>
                                    </a>
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
                                    <span class="tw-text-[#2B9FDC] tw-text-lg tw-font-semibold tw-font-clash-display tw-mt-1">Rp {{'Rp'. number_format($item->estimasi_minimal)}} - {{'Rp'.number_format($item->estimasi_maksimal)}} jt/</span> <span class="tw-text-lg tw-font-normal tw-text-[#2B9FDC]">bulan</span>
                           
                                </p>
                                <div class="tw-grid tw-grid-cols-2 tw-gap-4 tw-mt-4">
                                    <div class="tw-flex tw-items-start">
                                        <i class="fa-solid fa-location-dot tw-text-base tw-mr-2" style="color: rgba(43, 159, 220, 1)"></i>
                                        <div>
                                            <p class="tw-text-base tw-font-semibold" style="color: rgba(0, 49, 79, 1)">Negara</p>
                                            <p class="tw-text-sm tw-font-light tw-text-[#52525B]">${job.nama_negara}</p>
                                        </div>
                                    </div>
                                    <div class="tw-flex tw-items-start">
                                        <i class="fa-solid fa-briefcase tw-text-base tw-mr-2" style="color: rgba(43, 159, 220, 1)"></i>
                                        <div>
                                            <p class="tw-text-base tw-font-semibold" style="color: rgba(0, 49, 79, 1)">Kontrak Kerja</p>
                                            <p class="tw-text-sm tw-font-light tw-text-[#52525B]">${job.kontrak_kerja}</p>
                                        </div>
                                    </div>
                                    <div class="tw-flex tw-items-start">
                                        <i class="fa-solid fa-language tw-text-base tw-mr-2" style="color: rgba(43, 159, 220, 1)"></i>
                                        <div>
                                            <p class="tw-text-base tw-font-semibold" style="color: rgba(0, 49, 79, 1)">Level Bahasa</p>
                                            <p class="tw-text-sm tw-font-light tw-text-[#52525B]">${job.level_bahasa}</p>
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
                                <a href="/jobs/${job.hashid}" class="hover:tw-text-sky-600 hover:tw-scale-105 tw-w-full tw-bg-sky-100 tw-text-[#2B9FDC] tw-font-bold tw-rounded-lg tw-border-none tw-cursor-pointer tw-py-2 tw-flex tw-items-center tw-justify-center">
                                    Detail
                                      <i class="fa-solid fa-arrow-right tw-ml-2 -tw-rotate-45" style="position: relative; top: -2px;"></i>
                                </a>
                            </div>
                        </div>`;
                        $('#jobs-container').append(jobHtml);
                    });
                } else {
                  // di bawah job container jangan di dalam
                    $('#jobs-container').append('<div></div><div><p class="tw-text-center tw-text-lg tw-text-gray-700 tw-mt-6">No jobs found</p></div>');
                }
            }
          });
        // negara search

    });
});
</script>
<script>
       document.addEventListener('DOMContentLoaded', function() {
  new Splide('#image-carousel', {
    type   : 'loop',
    perPage: 1,
    autoplay: true,
    interval: 5000,
  }).mount();
});

    </script>
      <script>
       document.addEventListener('DOMContentLoaded', function() {
  new Splide('#image-carousel2', {
    type   : 'loop',
    perPage: 1,
    autoplay: true,
    interval: 5000, 
  }).mount();
  const testimonialCards = document.querySelectorAll('.testimonial-card');
            const avatarImages = document.querySelectorAll('.avatar-image');

            let currentIndex = 0;
            const intervalTime = 5000;

            function resetCards() {
                testimonialCards.forEach(card => {
                    card.classList.remove('active');
                });
                avatarImages.forEach(image => {
                    image.classList.remove('active');
                    image.style.transform = 'scale(1)';
                });
            }

            function showCard(index) {
                resetCards();
                testimonialCards[index].classList.add('active');
                avatarImages[index].classList.add('active');
             
                avatarImages[index].style.transform = 'scale(1.2)';
            }

            function nextCard() {
                currentIndex = (currentIndex + 1) % testimonialCards.length;
                showCard(currentIndex);
            }


            showCard(currentIndex);
            setInterval(nextCard, intervalTime);
            avatarImages.forEach((image, index) => {
                image.addEventListener('click', () => {
                    currentIndex = index;
                    showCard(currentIndex);
                });
            });
       });
    </script>
@endpush
 
@endsection
