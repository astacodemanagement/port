@extends("front.compro-2.layouts.default")
@section("content")
@include("front.compro-2.component.navdefault")
<div class="tw-max-w-7xl tw-mx-auto tw-py-10">
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
                        <!-- City input -->
                        <div class="tw-flex tw-items-center tw-gap-2 tw-p-2 tw-bg-[#F4f4F5] tw-flex-1 tw-border-l tw-border-gray-200">
                        <i class="fa-solid fa-city tw-text-sky-500"></i>
                        <input type="text" placeholder="City State or zip code" class="tw-border-none tw-outline-none tw-text-base tw-text-gray-600 tw-bg-[#F4F4F5] tw-w-full" />
                        </div>
                    <div class="tw-flex tw-items-center tw-gap-2 tw-p-2 tw-px-4 tw-mr-2 tw-bg-[#F1F9FE] tw-rounded-md tw-cursor-pointer">
                        <i class="fa-solid fa-sliders tw-text-sky-500"></i>
                      <span class="tw-text-sky-500">Filter</span>
                    </div>
                    <button class="tw-p-2 tw-px-4 tw-bg-sky-500 tw-text-white tw-font-bold tw-rounded-lg tw-border-none tw-cursor-pointer">
                      Search
                    </button>
                  </div>

                  <div class="tw-grid tw-grid-cols-1 md:tw-grid-cols-2 lg:tw-grid-cols-3 tw-gap-8 tw-py-20">
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
                                    <a href="{{ route('compro-2.job.detail', $item->id) }}" class="tw-block tw-mb-2 tw-font-sans tw-text-xl tw-antialiased tw-font-semibold tw-leading-snug tw-tracking-normal tw-text-[#18191C]">
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
                             <a href="{{ route('compro-2.job.detail', $item->id) }}" class="hover:tw-text-sky-600 hover:tw-scale-105 tw-w-full tw-bg-sky-100 tw-text-[#2B9FDC] tw-font-bold tw-rounded-lg tw-border-none tw-cursor-pointer tw-py-2 tw-flex tw-items-center tw-justify-center">
                              Detail
                              <i class="fa-solid fa-arrow-right tw-ml-2 -tw-rotate-45" style="position: relative; top: -2px;"></i>
                            </a>
                          
                            
                            </div>
                        </div>
                        @endforeach
                    </div>
</div>
@endsection