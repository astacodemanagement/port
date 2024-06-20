    @extends('front.compro-2.layouts.default')
    @section('content')
    @include('front.compro-2.component.navdefault')
        {{-- bear --}}
        <header class="tw-bg-sky-50 md:tw-h-16 tw-h-20 tw-px-4 sm:tw-px-6 lg:tw-px-8">
                <div class="tw-mx-auto tw-max-w-7xl">
                    <div class="tw-flex tw-flex-col md:tw-flex-row tw-justify-between tw-items-center tw-h-16 ">

                        <h3 class="tw-pt-2 md:tw-pt-5 tw-text-base sm:tw-text-lg tw-text-gray-500 tw-font-work-sans tw-font-medium tw-leading-8">Job Details
                        </h3>

                        <!-- Breadcrumbs -->
                        <div class="tw-flex tw-items-center tw-space-x-2  md:tw-pb-0   md:tw-pt-5 tw-flex-wrap md:tw-flex-nowrap">
                            <!-- Home -->
                            <a href="/" class="tw-text-gray-500 tw-font-work-sans tw-font-medium tw-text-xs sm:tw-text-sm hover:tw-text-gray-600 ">Home</a>
                            <i class="fa-solid fa-chevron-right tw-text-gray-500 tw-text-xs"></i>
                            <!-- Find Job -->
                            <a href="/" class="tw-text-gray-500 tw-font-work-sans tw-font-medium tw-text-xs sm:tw-text-sm hover:tw-text-gray-600">Find Job</a>
                            <i class="fa-solid fa-chevron-right tw-text-gray-500 tw-text-xs"></i>
                            <!-- Job Name -->
                            <a href="/" class="tw-text-gray-500 tw-font-work-sans tw-font-medium tw-text-xs sm:tw-text-sm hover:tw-text-gray-600">{{ $job->nama_job }}</a>
                            <i class="fa-solid fa-chevron-right tw-text-gray-500 tw-text-xs"></i>
                            <!-- Job Details -->
                            <a href="/" class="tw-text-gray-500 tw-font-work-sans tw-font-medium tw-text-xs sm:tw-text-sm hover:tw-text-gray-600">Job Details</a>
                        </div>

                    </div>
                </div>
            </header>


        <div class="tw-flex tw-justify-between tw-mx-auto tw-h-full  tw-max-w-7xl tw-py-5  tw-px-2">
            <div class="">
                {{-- icon text --}}
                <div class="tw-flex tw-justify-start tw-items-center tw-mt-10">
                    <div class="tw-flex tw-items-center tw-space-x-2">
                        <i class="fa-solid fa-briefcase tw-text-sky-500  md:tw-text-3xl tew-text-lg"></i>
                        <p class="md:tw-text-3xl
                    tw-text-[#11181C] tw-font-work-sans tw-font-bold">{{$job->nama_job}}</p>
                    </div>
                </div>
            </div>
            @if (auth()?->user()?->kandidat)
            <div class="">
                {{-- icon button --}}
                <div class="tw-flex tw-justify-center tw-items-center tw-mt-10">
                    <div class="tw-flex tw-items-center tw-space-x-2">
                        <i class="fa-regular    fa-bookmark tw-text-sky-500 tw-text-3xl"></i>
                        {{-- lamar sekarang button using arrow right --}}
                        <button onclick="location.href='{{ route('front.jobs.apply', hashId($job->id)) }}'"
                            class="tw-flex tw-items-center tw-space-x-2 tw-bg-sky-500 tw-text-white tw-py-2 tw-px-4 tw-rounded-lg tw-transition tw-duration-500 tw-ease-in-out hover:tw-bg-sky-400 hover:tw-scale-105 hover:tw-transition ">
                            <p class="tw-text-lg tw-font-work-sans tw-font-medium">Lamar Sekarang</p>
                            <i class="fa-solid fa-arrow-right tw-text-white"></i>
                        </button>
                    </div>
                </div>
            </div>
            @else
            <!-- masuk untuk melamar -->
            <div class="">
                {{-- icon button --}}
                <div class="tw-flex tw-justify-center tw-items-center tw-mt-10">
                    <div class="tw-flex tw-items-center tw-space-x-2">
                   
                        {{-- lamar sekarang button using arrow right --}}
                        <button onclick="location.href='{{ route('front.jobs.apply', hashId($job->id)) }}'"
                            class="tw-flex tw-items-center tw-space-x-2 tw-bg-sky-500 tw-text-white tw-py-2 md:tw-px-4 tw-px-2 tw-rounded-lg tw-transition tw-duration-500 tw-ease-in-out hover:tw-bg-sky-400 hover:tw-scale-105 hover:tw-transition ">
                            <p class="md:tw-text-lg tw-text-sm tw-font-work-sans tw-font-medium">Masuk</p>
                            <i class="fa-solid fa-arrow-right tw-text-white tw-text-sm md:tw-text-2xl"></i>
                        </button>
                    </div>
                </div>
            </div>
            @endif

        </div>


        <div class="tw-w-full tw-h-full ">
            <div class="tw-mx-auto tw-max-w-7xl tw-pb-16">
                <div class="tw-flex tw-flex-col-reverse md:tw-flex-row md:tw-flex-wrap tw-justify-between tw-w-full">
            
                    <div class=" tw-w-full md:tw-w-[60%] tw-pb-10 tw-px-5 md:tw-px-0">
                    <div class="tw-flex tw-px-5 md:tw-px-0 tw-space-x-4 tw-border-b tw-border-gray-200 ">
                        <button id="tab1" class="tab-link tw-text-sky-500 tw-font-work-sans tw-font-medium md:tw-text-lg tw-text-xs tw-leading-snug tw-pb-2 " data-content="content1" onclick="showTab('content1', this)">Detail Pekerjaan</button>
                        <button id="tab2" class="tab-link tw-text-[#575768] tw-font-medium tw-font-work-sans md:tw-text-lg tw-text-xs  tw-leading-snug tw-pb-2" data-content="content2" onclick="showTab('content2', this)">Galeri Pekerjaan</button>
                        <button id="tab3" class="tab-link tw-text-[#71717A] tw-font-medium tw-font-work-sans md:tw-text-lg tw-text-xs  tw-leading-snug tw-pb-2" data-content="content3" onclick="showTab('content3', this)">Informasi Lainnya</button>
                    </div>
                        {{-- detail pekerjaan--}}
                    <div class="tw-w-full tw-flex tw-px-5 md:tw-px-0 tab-content" id="content1" style="display: block;">
                        <div class="tw-w-full">

                        <h3 class="tw-font-semibold tw-text-xl tw-text-[#18191C] tw-font-work-sans tw-mt-8">Kualifikasi</h3>
                            <div class=" tw-flex tw-flex-wrap tw-justify-start">
                                <div class="tw-w-1/2 tw-px-5">
                                    {{-- icon fontaweome and tex t list --}}
                    
                                    <div class="tw-flex tw-items-start tw-space-x-2 tw-mt-5 tw-gap-2">
                                        <div class="">
                                            <img src="{{ asset('frontend') }}/assets/image/icon/gender.png" class="md:tw-w-8 md:tw-h-8 tw-h-6 tw-w-6" alt="">
                                        </div>
                                        <div>
                                            <p class="tw-text-[#262626] tw-font-work-sans tw-font-semibold md:tw-text-lg tw-text-xs tw-mb-1">Jenis Kelamin</p>
                                            <p class="tw-text-[#262626] tw-font-work-sans md:tw-text-lg tw-text-xs ">@if ($job->jenis_kelamin)
                                                {{$job->jenis_kelamin}}
                                            @else
                                                Tidak Ada Ketentuan
                                            @endif</p>
                                        </div>
                                    </div>
                                
                                    <div class="tw-flex tw-items-start tw-space-x-2 tw-mt-5 tw-gap-2">
                                        <div class="">
                                            <img src="{{ asset('frontend') }}/assets/image/icon/user-tag.png" class="md:tw-w-8 md:tw-h-8 tw-h-6 tw-w-6" alt="">
                                        </div>
                                        <div>
                                            <p class="tw-text-[#262626] tw-font-work-sans tw-font-semibold md:tw-text-lg tw-text-xs tw-mb-1">Usia</p>
                                            <p class="tw-text-[#262626] tw-font-work-sans md:tw-text-lg tw-text-xs">@if ($job->rentang_usia)
                                            {{$job->rentang_usia}}
                                            @else
                                                Tidak Ada Ketentuan  
                                            @endif</p>
                                        </div>
                                    </div>
                                    <div class="tw-flex tw-items-start tw-space-x-2 tw-mt-5 tw-gap-2">
                                        <div class="">
                                            <img src="{{ asset('frontend') }}/assets/image/icon/bahasa.png" class="md:tw-w-8 md:tw-h-8 tw-h-6 tw-w-6" alt="">
                                        </div>
                                        <div>
                                            <p class="tw-text-[#262626] tw-font-work-sans tw-font-semibold md:tw-text-lg tw-text-xs tw-mb-1">Level Bahas Yang Di Butuhkan</p>
                                            <p class="tw-text-[#262626] tw-font-work-sans md:tw-text-lg tw-text-xs">
                                                @if ($job->level_bahasa)
                                                {{$job->level_bahasa}}
                                                @else
                                                    Tidak Ada Ketentuan
                                                @endif
                                            </p>    
                                        </div>
                                    </div>
                                </div>
                                <div class="tw-w-1/2 tw-px-5">
                                    {{-- icon fontaweome and tex t list --}}
                                    <div class="tw-flex tw-items-start tw-space-x-2 tw-mt-5 tw-gap-2">
                                        <div class="">
                                            <img src="{{ asset('frontend') }}/assets/image/icon/teacher.png" class="md:tw-w-8 md:tw-h-8 tw-h-6 tw-w-6" alt="">
                                        </div>
                                        <div>
                                            <p class="tw-text-[#262626] tw-font-work-sans tw-font-semibold md:tw-text-lg tw-text-xs tw-mb-1">Pendidikan</p>
                                            <p class="tw-text-[#262626] tw-font-work-sans md:tw-text-lg tw-text-xs">Minimal D3/D4</p>
                                        </div>
                                    </div>
                                    <div class="tw-flex tw-items-start tw-space-x-2 tw-mt-5 tw-gap-2">
                                        <div class="">
                                            <img src="{{ asset('frontend') }}/assets/image/icon/profile.png" class="md:tw-w-8 md:tw-h-8 tw-h-6 tw-w-6" alt="">
                                        </div>
                                        <div>
                                            <p class="tw-text-[#262626] tw-font-work-sans tw-font-semibold md:tw-text-lg tw-text-xs tw-mb-1">Pengalaman</p>
                                            <p class="tw-text-[#262626] tw-font-work-sans md:tw-text-lg tw-text-xs ">Tidak Ada Ketentuan</p>
                                        </div>
                                    </div>
                                </div>
                    
                            </div>
                        </div>
                        <div class="tw-mt-14">
                            <h3 class="tw-font-semibold tw-text-xl tw-text-[#18191C] tw-font-work-sans tw-mb-5">Deskripsi Pekerjaan</h3>
                            {{-- deskripsi pekerjaan --}}
                            <p class="tw-text-[#52525B] tw-pr-12 tw-font-work-sans md:tw-text-lg tw-text-xs">
                                {{$job->deskripsi}}
                            </p>
                        </div>
                        {{-- benefit pekerjaan --}}
                        <div class="tw-mt-14">
                            <h3 class="tw-font-semibold tw-text-xl tw-text-[#18191C] tw-font-work-sans tw-mb-5">Benefit Pekerjaan</h3>
                            {{-- flex warp --}}
                            <div class="tw-flex tw-flex-wrap tw-justify-start tw-gap-5">
                            @foreach ($job->benefits as $item)
                                    <a href="" class="tw-flex tw-items-center tw-bg-[#E8FAF0] tw-rounded-md tw-py-1.5 tw-px-4 tw-gap-3 tw-text-base tw-font-work-sans tw-font-medium tw-text-green-600">
                                        <img src="{{ asset('frontend') }}/assets/image/icon/ceklis.png" class="tw-h-4 tw-w-4 mr-4" alt="">
                                        <span>{{$item->fasilitas->nama_fasilitas}}</span>
                                    </a>
                                @endforeach
                              
                            </div>
                        </div>
                        <div class="tw-w-full" >
                            <div class="tw-w-full">
                                <h3 class="tw-font-semibold tw-text-xl tw-text-[#18191C] tw-font-work-sans tw-mt-8">Pekerjaan Ini Membutuhkan</h3>
                                <div class=" tw-flex tw-flex-wrap tw-justify-start">
                                    <div class="">
                                        {{-- icon fontaweome and tex t list --}}
                                        <div class="tw-flex tw-items-start tw-space-x-2 tw-mt-5 tw-gap-2">
                                            <div class="">
                                                <p class="tw-bg-sky-100 tw-text-sky-500 tw-p-1 tw-px-3 tw-rounded-md">Keterampilan Komunikasi</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- geleri pekerjaan -->
                    <div class="tw-w-full tw-flex tw-px-5 md:tw-px-0 tab-content" id="content2" style="display: none;">
                        <div class="tw-w-full">
                            <!-- video embed yt -->
                            <div class="tw-relative tw-w-full tw-mt-8 tw-h-[300px] tw-bg-cover tw-bg-fixed tw-overflow-hidden tw-text-white tw-rounded-xl tw-bg-blue-gray-500" style="background-position:center;">
                                <iframe class="tw-w-full tw-h-full" src="{{$job->link_video}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            </div>
                            @if ($job->galeri)  

                            @foreach ($job->galeri as $item)
                                <div class="tw-relative tw-flex tw-flex-col tw-mt-6 tw-text-gray-700 tw-bg-[#18191C08] tw-border tw-border-[#E4E5E8] tw-rounded-xl tw-w-full">
                                    <div class="tw-relative tw-h-[300px] tw-bg-cover tw-bg-fixed tw-overflow-hidden tw-text-white tw-rounded-xl tw-bg-blue-gray-500" style="background-position:center;">
                                        <img src="/upload/gambar/{{$item->gambar}}" alt="card-image" class="tw-object-cover tw-h-[300px] tw-w-full" />
                                    </div>
                                    <div class="tw-p-6">
                                        <div class="tw-flex">
                                            <a href="{{ route('compro-2.job.detail', $item->id) }}" class="tw-block tw-mb-2 tw-font-sans tw-text-xl tw-antialiased tw-font-semibold tw-leading-snug tw-tracking-normal tw-text-[#18191C]">
                                                {{$item->nama_gambar}}
                                            </a>
                                            </a>
                                            <div class="tw-ml-auto
                                            tw-flex tw-items-center tw-justify-center tw-w-8 tw-h-8 tw-rounded-full tw-bg-[#F1F9FE]">
                                                <i class="fa-regular
                                                fa-bookmark tw-text-sky-500 tw-text-2xl"></i>
                                            </div>
                                        </div>
                                      </div>    
                                </div>  
                                @endforeach
                                
                            @endif
                        </div>
                    </div>
                    <!-- informasi lainnya -->
                    <div class="tw-w-full tw-flex tw-px-5 md:tw-px-0 tab-content" id="content3" style="display: none;">
                        <div class="tw-w-full">
                        <h3 class="tw-font-semibold tw-text-xl tw-text-[#18191C] tw-font-work-sans tw-mt-8">Informasi Lainya</h3>
                        <p class="tw-font-clash-display  tw-text-gray-600 tw-mt-3 md:tw-text-lg tw-text-xs ">{{$job->info_lain}}</p>
                        <h3 class="tw-font-semibold tw-text-xl tw-text-[#18191C] tw-font-work-sans tw-mt-8">Disclaimer</h3>
                        <p class="tw-font-clash-display md:tw-text-lg tw-text-xs tw-text-gray-600 tw-mt-3 ">{{$job->disclaimer}}</p>
                        
                        </div>
                    </div>  
                       
                    </div>
            
                    <div class="tw-w-full md:tw-w-[40%] tw-pb-10 tw-px-5 md:tw-px-0">
                        <div class="tw-w-full tw-p-5 tw-border   tw-border-slate-200 tw-shadow-sm tw-shadow-slate-200 tw-rounded-lg py-5">
                            @if ($job->gambar)
                                    <img src="/upload/gambar/{{$job->gambar}}" class="tw-w-full tw-h-[200px] tw-object-cover tw-rounded-lg"  alt="">    
                              @else
                              <img src="/images/no-image.png" alt="card-image" class="tw-object-cover tw-h-[300px] tw-w-full" />
                                
                            @endif
                            <h3 class="tw-text-center tw-mt-5 tw-font-semibold tw-font-work-sans tw-text-xl">Gaji</h3>
                            <h5 class="tw-text-green-600 md:tw-my-3 tw-my-2 tw-text-center tw-font-semibold md:tw-text-3xl tw-text-xl tw-font-work-sans">Mulai USD {{$job->estimasi_minimal}} -  {{$job->estimasi_maksimal}}/ jam</h5>
                            <p class="tw-text-gray-500 tw-text-center tw-my-3 tw-font-base tw-text-sm tw-font-clash-display">IDR ± {{$job->gaji}} | Kurs: {{$job->tanggal_kurs}} - {{$job->nominal_kurs}}
                            {{-- badgetersedia --}}
                        <div class="tw-flex tw-justify-center tw-items-center">
                            <p class="tw-bg-green-500 tw-px-5 tw-py-1 tw-rounded-md tw-text-white tw-font-bold">tersedia</p>
                        </div>
                        </div>
                        <div class="tw-w-full tw-p-5 tw-border tw-mt-5  tw-border-slate-200 tw-shadow-sm tw-shadow-slate-200 tw-rounded-lg py-5  tw-flex-wrap">
                            <div class="tw-grid tw-grid-cols-2 tw-gap-5 tw-flex-wrap">
                                <div class="tw-w-full">
                                    <div class="tw-flex tw-items-start tw-space-x-2 tw-mt-5 tw-gap-2">
                                        <div>
                                            <img src="{{ asset('frontend') }}/assets/image/icon/location.png" class="md:tw-w-8 md:tw-h-8 tw-w-6 tw-h-6" alt="">
                                        </div>
                                        <div>
                                            <p class="tw-text-[#262626] tw-font-work-sans tw-font-semibold md:tw-text-lg tw-text-sm  tw-mb-1">Negara</p>
                                            <p class="tw-text-[#262626] tw-font-work-sans md:tw-text-lg tw-text-xs">{{$job->negara->nama_negara}}</p>
                                        </div>
                                    </div>
                                    <div class="tw-flex tw-items-start tw-space-x-2 tw-mt-5 tw-gap-2">
                                        <div>
                                            <img src="{{ asset('frontend') }}/assets/image/icon/document-text.png" class="md:tw-w-8 md:tw-h-8 tw-w-6 tw-h-6" alt="">
                                        </div>
                                        <div>
                                            <p class="tw-text-[#262626] tw-font-work-sans tw-font-semibold md:tw-text-lg tw-text-sm  tw-mb-1">Kontrak Kerja</p>
                                            <p class="tw-text-[#262626] tw-font-work-sans md:tw-text-lg tw-text-xs">{{$job->kontrak_kerja}} tahun</p>
                                        </div>
                                    </div>
                                    <div class="tw-flex tw-items-start tw-space-x-2 tw-mt-5 tw-gap-2">
                                        <div>
                                            <img src="{{ asset('frontend') }}/assets/image/icon/clock.png" class="md:tw-w-8 md:tw-h-8 tw-w-6 tw-h-6" alt="">
                                        </div>
                                        <div>
                                            <p class="tw-text-[#262626] tw-font-work-sans tw-font-semibold md:tw-text-lg tw-text-sm  tw-mb-1">Jam Kerja</p>
                                            <p class="tw-text-[#262626] tw-font-work-sans md:tw-text-lg tw-text-xs">{{$job->jam_kerja}} jam</p>
                                        </div>
                                    </div>
                                    <div class="tw-flex tw-items-start tw-space-x-2 tw-mt-5 tw-gap-2">
                                        <div>
                                            <img src="{{ asset('frontend') }}/assets/image/icon/calendar.png" class="md:tw-w-8 md:tw-h-8 tw-w-6 tw-h-6" alt="">
                                        </div>
                                        <div>
                                            <p class="tw-text-[#262626] tw-font-work-sans tw-font-semibold md:tw-text-lg tw-text-sm  tw-mb-1">Hari  Kerja</p>
                                            <p class="tw-text-[#262626] tw-font-work-sans md:tw-text-lg tw-text-xs">{{$job->hari_kerja}} hari / minggu</p>
                                        </div>
                                    </div>
                                
                                </div>
                                <div class="tw-w-full">
                                    <div class="tw-flex tw-items-start tw-space-x-2 tw-mt-5 tw-gap-2">
                                        <div>
                                            <img src="{{ asset('frontend') }}/assets/image/icon/airplane-square.png" class="md:tw-w-8 md:tw-h-8 tw-w-6 tw-h-6" alt="">
                                        </div>
                                        <div>
                                            <p class="tw-text-[#262626] tw-font-work-sans tw-font-semibold md:tw-text-lg tw-text-sm  tw-mb-1">Cuti Kerja</p>
                                            <p class="tw-text-[#262626] tw-font-work-sans md:tw-text-lg tw-text-xs">{{$job->cuti_kerja}} hari / tahun</p>
                                        </div>
                                    </div>
                                    <div class="tw-flex tw-items-start tw-space-x-2 tw-mt-5 tw-gap-2">
                                        <div>
                                            <img src="{{ asset('frontend') }}/assets/image/icon/calendar-tick.png" class="md:tw-w-8 md:tw-h-8 tw-w-6 tw-h-6" alt="">
                                        </div>
                                        <div>
                                            <p class="tw-text-[#262626] tw-font-work-sans tw-font-semibold md:tw-text-lg tw-text-sm tw-mb-1">Probation</p>
                                            <p class="tw-text-[#262626] tw-font-work-sans md:tw-text-lg tw-text-xs">{{$job->masa_percobaan}} bulan</p>
                                        </div>
                                    </div>
                                    <div class="tw-flex tw-items-start tw-space-x-2 tw-mt-5 tw-gap-2">
                                        <div>
                                            <img src="{{ asset('frontend') }}/assets/image/icon/bahasa.png" class="md:tw-w-8 md:tw-h-8 tw-w-6 tw-h-6" alt="">
                                        </div>
                                        <div>
                                            <p class="tw-text-[#262626] tw-font-work-sans tw-font-semibold md:tw-text-lg tw-text-sm  tw-mb-1">Bahasa </p>
                                            <p class="tw-text-[#262626] tw-font-work-sans md:tw-text-lg tw-text-xs">{{$job->bahasa}}</p>
                                        </div>
                                    </div>
                                    <div class="tw-flex tw-items-start tw-space-x-2 tw-mt-5 tw-gap-2">
                                        <div>
                                            <img src="{{ asset('frontend') }}/assets/image/icon/timer.png" class="md:tw-w-8 md:tw-h-8 tw-w-6 tw-h-6" alt="">
                                        </div>
                                        <div>
                                            <p class="tw-text-[#262626] tw-font-work-sans tw-font-semibold md:tw-text-lg tw-text-sm  tw-mb-1">Overtime</p>
                                            <p class="tw-text-[#262626] tw-font-work-sans md:tw-text-lg tw-text-xs">{{$job->kerja_lembur}} hari</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr class="tw-my-5">
                            <div class="tw-grid tw-grid-cols-2 tw-gap-5 tw-flex-wrap">
                                <div class="tw-w-full">
                                    <div class="tw-flex tw-items-start tw-space-x-2 tw-mt-5 tw-gap-2">
                                        <div>
                                            <img src="{{ asset('frontend') }}/assets/image/icon/building.png" class="md:tw-w-8 md:tw-h-8 tw-w-6 tw-h-6" alt="">
                                        </div>
                                        <div>
                                            <p class="tw-text-[#262626] tw-font-work-sans tw-font-semibold md:tw-text-lg tw-text-sm tw-mb-1">Industri</p>
                                            <p class="tw-text-[#262626] tw-font-work-sans md:tw-text-lg tw-text-xs">{{$job->jobKategori->nama_kategori_job}}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="tw-w-full">
                                    <div class="tw-flex tw-items-start tw-space-x-2 tw-mt-5 tw-gap-2">
                                        <div>
                                            <img src="{{ asset('frontend') }}/assets/image/icon/briefcase.png" class="md:tw-w-8 md:tw-h-8 tw-w-6 tw-h-6" alt="">
                                        </div>
                                        <div>
                                            <p class="tw-text-[#262626] tw-font-work-sans tw-font-semibold md:tw-text-lg tw-text-sm tw-mb-1"> Pekerjaan</p>
                                            <p class="tw-text-[#262626] tw-font-work-sans md:tw-text-lg tw-text-xs">Fulltime</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr class="tw-my-5">
                            <div class="tw-grid tw-grid-cols-2 tw-gap-5 tw-flex-wrap">
                                <div class="tw-w-full">
                                    <div class="tw-flex tw-items-start tw-space-x-2 tw-mt-5 tw-gap-2">
                                        <div>
                                            <img src="{{ asset('frontend') }}/assets/image/icon/calendar-edit.png" class="md:tw-w-8 md:tw-h-8 tw-w-6 tw-h-6" alt="">
                                        </div>
                                        <div>
                                            <p class="tw-text-[#262626] tw-font-work-sans tw-font-semibold md:tw-text-lg tw-text-sm tw-mb-1">Tanggal Posting</p>
                                            <p class="tw-text-[#262626] tw-font-work-sans md:tw-text-lg tw-text-xs">{{$job->tanggal_tutup}}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="tw-w-full">
                                    <div class="tw-flex tw-items-start tw-space-x-2 tw-mt-5 tw-gap-2">
                                        <div>
                                            <img src="{{ asset('frontend') }}/assets/image/icon/calendar-remove.png" class="md:tw-w-8 md:tw-h-8 tw-w-6 tw-h-6" alt="">
                                        </div>
                                        <div>
                                            <p class="tw-text-[#262626] tw-font-work-sans tw-font-semibold md:tw-text-lg tw-text-sm tw-mb-1">Tanngal Berakhir</p>
                                            <p class="tw-text-[#262626] tw-font-work-sans md:tw-text-lg tw-text-sm">{{$job->tanggal_tutup}}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <div class="tw-px-5 md:tw-px-0">

            <div class="tw-w-full tw-py-5 tw-px-3 tw-bg-red-100 tw-text-red-500 tw-rounded-lg tw-mt-5 tw-flex tw-justify-start tw-gap-5 tw-items-center">
                    <img src="{{ asset('frontend') }}/assets/image/icon/alert.png" class="tw-w-5 tw-h-5" alt="">
                    <p class="tw-font-medium tw-font-work-sans  md:tw-text-lg tw-text-xs">
                        “HATI-HATI DENGAN OKNUM YANG MENGATASNAMAKAN PERUSAHAAN. KAMI TIDAK PERNAH MELAKUKAN PEMBAYARAN DILUAR ATAS NAMA REKENING PERUSAHAAN”. Segala informasi pekerjaan di atas merupakan informasi sebenar-benarnya yang diperoleh dari Perusahaan Pemberi Kerja.
                    </p>
                </div>

            </div>
            <div class="tw-flex tw-justify-between tw-mx-auto tw-h-full  tw-max-w-7xl tw-py-5 tw-px-5">
                    <div class="">
                        {{-- icon text --}}
                        <div class="tw-flex tw-justify-center tw-items-center tw-mt-10">
                            <div class="tw-flex tw-items-center tw-space-x-2">
                        
                                <p class="tw-text-3xl
                                tw-text-[#11181C] tw-font-work-sans tw-font-bold">Related Jobs</p>
                            
                            </div>
                        </div>
                    </div>
                    <div class="">
                        {{-- icon button --}}
                        <div class="tw-flex tw-justify-center tw-items-center tw-mt-10">
                            <div class="tw-flex tw-items-center tw-space-x-2 ">
                            
                                <a href="{{route('front.jobs.index')}}"
                                    class="tw-hidden md:tw-flex tw-items-center tw-space-x-2 tw-border tw-border-sky-500 tw-text-white tw-py-2 tw-px-4 tw-rounded-lg tw-transition tw-duration-500 tw-ease-in-out hover:tw-scale-105 ">
                                    <p class="tw-text-lg tw-font-work-sans tw-font-medium tw-text-sky-500">Lihat Semua Lowongan</p>
                                    <i class="fa-solid fa-arrow-right tw-text-sky-500"></i>
                                </a>
                            </div>
                        </div>
                    </div>
            
                </div>
                <div class="tw-grid tw-grid-cols-1 md:tw-grid-cols-2 lg:tw-grid-cols-3 tw-gap-8 tw-px-5 md:tw-px-0">
                    {{-- job card --}}
                    @foreach ($relateJobs as $item)
                            
                        
                
                            <div class="tw-relative tw-flex tw-flex-col tw-mt-6 tw-text-gray-700 tw-bg-[#18191C08] tw-border tw-border-[#E4E5E8] tw-rounded-xl tw-w-full">
                                <div class="tw-relative tw-h-[300px] tw-bg-cover tw-bg-fixed tw-overflow-hidden tw-text-white tw-rounded-xl tw-bg-blue-gray-500" style="background-position:center;">
                                  @if ($item->gambar)
                                     <img  src="/upload/gambar/{{$item->gambar}}" alt="card-image" class="tw-object-cover tw-h-[300px] tw-w-full" />
                               
                                  @else
                                     <img src="/images/no-image.png" alt="card-image" class="tw-object-cover tw-h-[300px] tw-w-full" />
                                      
                                  @endif
                                </div>
                                <div class="tw-p-6">
                                   
                                    <div class="tw-flex">
                                        <a href="{{ route('front.jobs.show', hashId($item->id)) }}" class="tw-block tw-mb-2 tw-font-sans tw-text-xl tw-antialiased tw-font-semibold tw-leading-snug tw-tracking-normal tw-text-[#18191C] hover:tw-text-[#18191C] hover:tw-underline ">
                                          {{$item->nama_job}}
                                        </a>
                                      
                                        <div class="tw-ml-auto tw-flex tw-items-center tw-justify-center md:tw-w-8 md:tw-h-8 tw-w-6 tw-h-6 tw-rounded-full tw-bg-[#F1F9FE]">
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
                              
                                
                                </div>
                            </div>
                            @endforeach
                    
                </div>
            </div>
        </div>

        <script>
           function showTab(contentId, tabElement) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tab-content");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }

      tablinks = document.getElementsByClassName("tab-link");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].classList.remove("tw-border-b-2");
            tablinks[i].classList.remove("tw-border-sky-500");
            tablinks[i].classList.remove("tw-text-sky-500");
            tablinks[i].classList.add("tw-text-[#71717A]");
        }
        document.getElementById(contentId).style.display = "block";
        tabElement.classList.add("tw-border-b-2");
        tabElement.classList.add("tw-border-sky-500");
        tabElement.classList.add("tw-text-sky-500");
        tabElement.classList.remove("tw-text-[#71717A]");
    }


    document.addEventListener("DOMContentLoaded", function() {
        showTab('content1', document.getElementById('tab1'));
    });
        </script>
    @endsection
