@extends('front.compro-2.layouts.default')

@section('content')
    {{-- bear --}}
    <header class="tw-bg-sky-50 tw-h-16 ">
        <div class="tw-mx-auto tw-max-w-7xl">
            <div class="tw-flex tw-justify-between">

                <h3 class="tw-pt-5 tw-text-lg tw-text-gray-500 tw-font-work-sans tw-font-medium tw-leading-8">Job Details
                </h3>
                <h3 class="tw-pt-5 tw-text-gray-500 tw-font-work-sans tw-font-medium tw-text-sm">Home / Find Job / Graphics &
                    Design / <span class="tw-text-gray-900 tw-font-semibold">Job Details</span></h3>
            </div>


        </div>
        </div>
    </header>

    <div class="tw-flex tw-justify-between tw-mx-auto tw-h-full  tw-max-w-7xl tw-py-5 ">
        <div class="">
            {{-- icon text --}}
            <div class="tw-flex tw-justify-center tw-items-center tw-mt-10">
                <div class="tw-flex tw-items-center tw-space-x-2">
                    <i class="fa-solid fa-briefcase tw-text-sky-500  tw-text-3xl"></i>
                    <p class="tw-text-3xl
                tw-text-[#11181C] tw-font-work-sans tw-font-bold">Techical Support
                        Specialist</p>
                </div>
            </div>
        </div>
        <div class="">
            {{-- icon button --}}
            <div class="tw-flex tw-justify-center tw-items-center tw-mt-10">
                <div class="tw-flex tw-items-center tw-space-x-2">
                    <i class="fa-regular fa-bookmark tw-text-sky-500 tw-text-3xl"></i>
                    {{-- lamar sekarang button using arrow right --}}
                    <a href="#"
                        class="tw-flex tw-items-center tw-space-x-2 tw-bg-sky-500 tw-text-white tw-py-2 tw-px-4 tw-rounded-lg tw-transition tw-duration-500 tw-ease-in-out hover:tw-bg-sky-600">
                        <p class="tw-text-lg tw-font-work-sans tw-font-medium">Lamar Sekarang</p>
                        <i class="fa-solid fa-arrow-right tw-text-white"></i>
                    </a>
                </div>
            </div>
        </div>

    </div>


    <div class="tw-w-full tw-h-full ">
        <div class="tw-mx-auto tw-max-w-7xl tw-pb-16">
            <div class="tw-grid tw-grid-cols-12 tw-gap-5">
          
                <div class="tw-col-span-7  tw-pb-10">
                    <div class="tw-flex tw-flex-wrap tw-justify-start tw-w-full tw-gap-10 tw-pt-5 tw-px-5 tw-border-b-gray-300 tw-border-b">
                        <p class="tw-text-sky-500 tw-font-work-sans tw-font-medium text-lg tw-leading-snug tw-pb-2  tw-border-b-4 tw-border-sky-500">Detail Pekerjaan</p>
                        <p class="tw-text-[#71717A] tw-font-medium tw-font-work-sans ">Gelari Pekerjaan</p>
                        <p class="tw-text-[#71717A] tw-font-medium tw-font-work-sans ">Informasi Lainnya</p>
                    </div>
                    {{-- kualifikasi --}}
                    <div class="tw-w-full">

                        <h3 class="tw-font-semibold tw-text-xl tw-text-[#18191C] tw-font-work-sans tw-mt-8">Kualifikasi</h3>
                        <div class=" tw-flex tw-flex-wrap tw-justify-start">
                            <div class="tw-w-1/2 tw-px-5">
                                {{-- icon fontaweome and tex t list --}}
                   
                                <div class="tw-flex tw-items-start tw-space-x-2 tw-mt-5 tw-gap-2">
                                    <div class="">
                                        <img src="{{ asset('frontend') }}/assets/image/icon/gender.png" class="tw-w-8 tw-h-8" alt="">
                                    </div>
                                    <div>
                                        <p class="tw-text-[#262626] tw-font-work-sans tw-font-semibold tw-text-lg tw-mb-1">Jenis Kelamin</p>
                                        <p class="tw-text-[#262626] tw-font-work-sans">Tidak Ada Keterangan</p>
                                    </div>
                                </div>
                               
                                <div class="tw-flex tw-items-start tw-space-x-2 tw-mt-5 tw-gap-2">
                                    <div class="">
                                        <img src="{{ asset('frontend') }}/assets/image/icon/user-tag.png" class="tw-w-8 tw-h-8" alt="">
                                    </div>
                                    <div>
                                        <p class="tw-text-[#262626] tw-font-work-sans tw-font-semibold tw-text-lg tw-mb-1">Usia</p>
                                        <p class="tw-text-[#262626] tw-font-work-sans">Tidak Ada Ketentuan</p>
                                    </div>
                                </div>
                                <div class="tw-flex tw-items-start tw-space-x-2 tw-mt-5 tw-gap-2">
                                    <div class="">
                                        <img src="{{ asset('frontend') }}/assets/image/icon/bahasa.png" class="tw-w-8 tw-h-8" alt="">
                                    </div>
                                    <div>
                                        <p class="tw-text-[#262626] tw-font-work-sans tw-font-semibold tw-text-lg tw-mb-1">Level Bahas Yang Di Butuhkan</p>
                                        <p class="tw-text-[#262626] tw-font-work-sans">Mahir</p>
                                    </div>
                                </div>
                             </div>
                            <div class="tw-w-1/2 tw-px-5">
                                {{-- icon fontaweome and tex t list --}}
                                <div class="tw-flex tw-items-start tw-space-x-2 tw-mt-5 tw-gap-2">
                                    <div class="">
                                        <img src="{{ asset('frontend') }}/assets/image/icon/teacher.png" class="tw-w-8 tw-h-8" alt="">
                                    </div>
                                    <div>
                                        <p class="tw-text-[#262626] tw-font-work-sans tw-font-semibold tw-text-lg tw-mb-1">Pendidikan</p>
                                        <p class="tw-text-[#262626] tw-font-work-sans">Minimal D3/D4</p>
                                    </div>
                                </div>
                                <div class="tw-flex tw-items-start tw-space-x-2 tw-mt-5 tw-gap-2">
                                    <div class="">
                                        <img src="{{ asset('frontend') }}/assets/image/icon/profile.png" class="tw-w-8 tw-h-8" alt="">
                                    </div>
                                    <div>
                                        <p class="tw-text-[#262626] tw-font-work-sans tw-font-semibold tw-text-lg tw-mb-1">Pengalaman</p>
                                        <p class="tw-text-[#262626] tw-font-work-sans">Tidak Ada Ketentuan</p>
                                    </div>
                                </div>
                            </div>
                
                        </div>
                    </div>
                    <div class="tw-mt-14">
                        <h3 class="tw-font-semibold tw-text-xl tw-text-[#18191C] tw-font-work-sans tw-mb-5">Deskripsi Pekerjaan</h3>
                        {{-- deskripsi pekerjaan --}}
                        <p class="tw-text-[#52525B] tw-pr-12 tw-font-work-sans">Lorem ipsum dolor sit amet consectetur. Amet sociis diam tempus pharetra tortor sed pharetra sit. Morbi rhoncus tempor dolor metus ultricies velit hendrerit. Bibendum accumsan semper condimentum cursus porttitor. Pretium odio nunc mi amet eget in auctor ut. Cursus varius quam in eget nibh. Id hac blandit dui est. Cum quisque est sed morbi pretium lectus netus netus justo. Imperdiet ultricies sed velit elementum morbi. Fusce nunc arcu cursus nunc. Arcu etiam purus aliquam ultrices. Non ultrices convallis vestibulum nisi at at pulvinar lectus. Platea lectus facilisi viverra eget metus consectetur.</p>
                    </div>
                    {{-- benefit pekerjaan --}}
                    <div class="tw-mt-14">
                        <h3 class="tw-font-semibold tw-text-xl tw-text-[#18191C] tw-font-work-sans tw-mb-5">Benefit Pekerjaan</h3>
                        {{-- flex warp --}}
                        <div class="tw-flex tw-flex-wrap tw-justify-start tw-gap-5">
                            <a href="" class="tw-flex tw-items-center tw-bg-[#E8FAF0] tw-rounded-md tw-py-1.5 tw-px-4 tw-gap-3 tw-text-base tw-font-work-sans tw-font-medium tw-text-green-600">
                                <img src="{{ asset('frontend') }}/assets/image/icon/ceklis.png" class="tw-h-4 tw-w-4 mr-4" alt="">
                                <span>Bonus Kinerja</span>
                            </a>
                            <a href="" class="tw-flex tw-items-center tw-bg-[#E8FAF0] tw-rounded-md tw-py-1.5 tw-px-4 tw-gap-3 tw-text-base tw-font-work-sans tw-font-medium tw-text-green-600">
                                <img src="{{ asset('frontend') }}/assets/image/icon/ceklis.png" class="tw-h-4 tw-w-4 mr-4" alt="">
                                <span>Asuransi Kesehatan</span>
                            </a>
                            <a href="" class="tw-flex tw-items-center tw-bg-[#E8FAF0] tw-rounded-md tw-py-1.5 tw-px-4 tw-gap-3 tw-text-base tw-font-work-sans tw-font-medium tw-text-green-600">
                                <img src="{{ asset('frontend') }}/assets/image/icon/ceklis.png" class="tw-h-4 tw-w-4 mr-4" alt="">
                                <span>Pelatihan / Kursus</span>
                            </a>
                            <a href="" class="tw-flex tw-items-center tw-bg-[#E8FAF0] tw-rounded-md tw-py-1.5 tw-px-4 tw-gap-3 tw-text-base  tw-font-work-sans tw-font-medium tw-text-green-600">
                                <img src="{{ asset('frontend') }}/assets/image/icon/ceklis.png" class="tw-h-4 tw-w-4 mr-4" alt="">
                                <span>Perawatan Gigi</span>
                            </a>
                        </div>
                    </div>
                </div>
        
                <div class="tw-col-span-5 pb-5">
                    <div class="tw-w-full tw-p-5 tw-border   tw-border-slate-200 tw-shadow-sm tw-shadow-slate-200 tw-rounded-lg py-5">
                        <img src="https://s3-alpha-sig.figma.com/img/ef94/5651/de35d8ed78dfdfcb603b26e763f562b6?Expires=1717372800&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4&Signature=mvf3msVZVItgBbqpQ-3fhmr-Oy6XkCQhpZmAcXKg8cmCqom8sbdr0h4KyDZNcXPk-FJgsShOR0tur9AQ4bknllsgMH89p1VfsXd~9zdwDu8fXs5TIg0VI2oOZQ7laixl7ey2SmPRgOKTBv3vAoRNswBTe0nR1gqzvRkgwKKF07sF8DCR0weewiMLhcq~3rcUlz30TBzlfxyOJBnmnKnIB4ioFpxn7gPINsWGQbXLEuZp0fZ9v4-3NhRBGhpO5y77EzKitK4hH1W249mmFqwNIN25cfKMPKdQErmR4roni3O1c1igTjKws1gM6yekmFmy7190xPswRECZdYgKU6Rs9Q__" class="tw-w-full tw-h-[200px] tw-object-cover tw-rounded-lg"  alt="">
                        <h3 class="tw-text-center tw-mt-5 tw-font-semibold tw-font-work-sans tw-text-xl">Gaji</h3>
                        <h5 class="tw-text-green-600 my-3 tw-text-center tw-font-semibold tw-text-3xl tw-font-work-sans">Mulai USD $31.26 -  $50.00 / jam</h5>
                        <p class="tw-text-gray-500 tw-text-center tw-my-3 tw-font-base tw-text-sm tw-font-clash-display">IDR ± 487.343 - 779.500 | Kurs: 12/02/2024 - IDR 15.591</p>
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
                                        <img src="{{ asset('frontend') }}/assets/image/icon/location.png" class="tw-w-8 tw-h-8" alt="">
                                    </div>
                                    <div>
                                        <p class="tw-text-[#262626] tw-font-work-sans tw-font-semibold tw-text-lg tw-mb-1">Negara</p>
                                        <p class="tw-text-[#262626] tw-font-work-sans">Ingris</p>
                                    </div>
                                </div>
                                <div class="tw-flex tw-items-start tw-space-x-2 tw-mt-5 tw-gap-2">
                                    <div>
                                        <img src="{{ asset('frontend') }}/assets/image/icon/document-text.png" class="tw-w-8 tw-h-8" alt="">
                                    </div>
                                    <div>
                                        <p class="tw-text-[#262626] tw-font-work-sans tw-font-semibold tw-text-lg tw-mb-1">Kontrak Kerja</p>
                                        <p class="tw-text-[#262626] tw-font-work-sans">1 - 2 tahun</p>
                                    </div>
                                </div>
                                <div class="tw-flex tw-items-start tw-space-x-2 tw-mt-5 tw-gap-2">
                                    <div>
                                        <img src="{{ asset('frontend') }}/assets/image/icon/clock.png" class="tw-w-8 tw-h-8" alt="">
                                    </div>
                                    <div>
                                        <p class="tw-text-[#262626] tw-font-work-sans tw-font-semibold tw-text-lg tw-mb-1">Jam Kerja</p>
                                        <p class="tw-text-[#262626] tw-font-work-sans">200 jam perminggu</p>
                                    </div>
                                </div>
                                <div class="tw-flex tw-items-start tw-space-x-2 tw-mt-5 tw-gap-2">
                                    <div>
                                        <img src="{{ asset('frontend') }}/assets/image/icon/calendar.png" class="tw-w-8 tw-h-8" alt="">
                                    </div>
                                    <div>
                                        <p class="tw-text-[#262626] tw-font-work-sans tw-font-semibold tw-text-lg tw-mb-1">Hari  Kerja</p>
                                        <p class="tw-text-[#262626] tw-font-work-sans">6 hari / minggu</p>
                                    </div>
                                </div>
                             
                            </div>
                            <div class="tw-w-full">
                                <div class="tw-flex tw-items-start tw-space-x-2 tw-mt-5 tw-gap-2">
                                    <div>
                                        <img src="{{ asset('frontend') }}/assets/image/icon/airplane-square.png" class="tw-w-8 tw-h-8" alt="">
                                    </div>
                                    <div>
                                        <p class="tw-text-[#262626] tw-font-work-sans tw-font-semibold tw-text-lg tw-mb-1">Cuti Kerja</p>
                                        <p class="tw-text-[#262626] tw-font-work-sans">20 hari / tahun</p>
                                    </div>
                                </div>
                                <div class="tw-flex tw-items-start tw-space-x-2 tw-mt-5 tw-gap-2">
                                    <div>
                                        <img src="{{ asset('frontend') }}/assets/image/icon/calendar-tick.png" class="tw-w-8 tw-h-8" alt="">
                                    </div>
                                    <div>
                                        <p class="tw-text-[#262626] tw-font-work-sans tw-font-semibold tw-text-lg tw-mb-1">Masa Percobaan</p>
                                        <p class="tw-text-[#262626] tw-font-work-sans">3 bulan</p>
                                    </div>
                                </div>
                                <div class="tw-flex tw-items-start tw-space-x-2 tw-mt-5 tw-gap-2">
                                    <div>
                                        <img src="{{ asset('frontend') }}/assets/image/icon/bahasa.png" class="tw-w-8 tw-h-8" alt="">
                                    </div>
                                    <div>
                                        <p class="tw-text-[#262626] tw-font-work-sans tw-font-semibold tw-text-lg tw-mb-1">Bahasa </p>
                                        <p class="tw-text-[#262626] tw-font-work-sans">English</p>
                                    </div>
                                </div>
                                <div class="tw-flex tw-items-start tw-space-x-2 tw-mt-5 tw-gap-2">
                                    <div>
                                        <img src="{{ asset('frontend') }}/assets/image/icon/timer.png" class="tw-w-8 tw-h-8" alt="">
                                    </div>
                                    <div>
                                        <p class="tw-text-[#262626] tw-font-work-sans tw-font-semibold tw-text-lg tw-mb-1">Overtime</p>
                                        <p class="tw-text-[#262626] tw-font-work-sans">Dibayar</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr class="tw-my-5">
                        <div class="tw-grid tw-grid-cols-2 tw-gap-5 tw-flex-wrap">
                            <div class="tw-w-full">
                                <div class="tw-flex tw-items-start tw-space-x-2 tw-mt-5 tw-gap-2">
                                    <div>
                                        <img src="{{ asset('frontend') }}/assets/image/icon/building.png" class="tw-w-8 tw-h-8" alt="">
                                    </div>
                                    <div>
                                        <p class="tw-text-[#262626] tw-font-work-sans tw-font-semibold tw-text-lg tw-mb-1">Industri</p>
                                        <p class="tw-text-[#262626] tw-font-work-sans">Hospitalty</p>
                                    </div>
                                </div>
                            </div>
                            <div class="tw-w-full">
                                <div class="tw-flex tw-items-start tw-space-x-2 tw-mt-5 tw-gap-2">
                                    <div>
                                        <img src="{{ asset('frontend') }}/assets/image/icon/briefcase.png" class="tw-w-8 tw-h-8" alt="">
                                    </div>
                                    <div>
                                        <p class="tw-text-[#262626] tw-font-work-sans tw-font-semibold tw-text-lg tw-mb-1">Jenis Pekerjaan</p>
                                        <p class="tw-text-[#262626] tw-font-work-sans">Fulltime</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr class="tw-my-5">
                        <div class="tw-grid tw-grid-cols-2 tw-gap-5 tw-flex-wrap">
                            <div class="tw-w-full">
                                <div class="tw-flex tw-items-start tw-space-x-2 tw-mt-5 tw-gap-2">
                                    <div>
                                        <img src="{{ asset('frontend') }}/assets/image/icon/calendar-edit.png" class="tw-w-8 tw-h-8" alt="">
                                    </div>
                                    <div>
                                        <p class="tw-text-[#262626] tw-font-work-sans tw-font-semibold tw-text-lg tw-mb-1">Tanggal Posting</p>
                                        <p class="tw-text-[#262626] tw-font-work-sans">24 Mei 2024</p>
                                    </div>
                                </div>
                            </div>
                            <div class="tw-w-full">
                                <div class="tw-flex tw-items-start tw-space-x-2 tw-mt-5 tw-gap-2">
                                    <div>
                                        <img src="{{ asset('frontend') }}/assets/image/icon/calendar-remove.png" class="tw-w-8 tw-h-8" alt="">
                                    </div>
                                    <div>
                                        <p class="tw-text-[#262626] tw-font-work-sans tw-font-semibold tw-text-lg tw-mb-1">Tanngal Berakhir</p>
                                        <p class="tw-text-[#262626] tw-font-work-sans">24 Juni 2024</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
          
            <div class="tw-w-full tw-py-5 tw-px-3 tw-bg-red-100 tw-text-red-500 tw-rounded-lg tw-mt-5 tw-flex tw-justify-start tw-gap-5 tw-items-center">
                <img src="{{ asset('frontend') }}/assets/image/icon/alert.png" class="tw-w-5 tw-h-5" alt="">
                <p class="tw-font-medium tw-font-work-sans">
                    “HATI-HATI DENGAN OKNUM YANG MENGATASNAMAKAN PERUSAHAAN. KAMI TIDAK PERNAH MELAKUKAN PEMBAYARAN DILUAR ATAS NAMA REKENING PERUSAHAAN”. Segala informasi pekerjaan di atas merupakan informasi sebenar-benarnya yang diperoleh dari Perusahaan Pemberi Kerja.
                </p>
            </div>

          <div class="tw-flex tw-justify-between tw-mx-auto tw-h-full  tw-max-w-7xl tw-py-5 ">
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
                        <div class="tw-flex tw-items-center tw-space-x-2">
                           
                            <a href="#"
                                class="tw-flex tw-items-center tw-space-x-2 tw-border tw-border-sky-500 tw-text-white tw-py-2 tw-px-4 tw-rounded-lg tw-transition tw-duration-500 tw-ease-in-out hover:tw-scale-105 ">
                                <p class="tw-text-lg tw-font-work-sans tw-font-medium tw-text-sky-500">Lihat Semua Lowongan</p>
                                <i class="fa-solid fa-arrow-right tw-text-sky-500"></i>
                            </a>
                        </div>
                    </div>
                </div>
        
            </div>
            <div class="tw-grid tw-grid-cols-1 md:tw-grid-cols-2 lg:tw-grid-cols-3 tw-gap-8">
                {{-- job card --}}
                <div class="tw-relative tw-flex tw-flex-col tw-mt-6 tw-text-gray-700 tw-bg-[#18191C08] tw-border tw-border-[#E4E5E8] tw-rounded-xl tw-w-full">
                    <div class="tw-relative tw-h-[300px] tw-bg-cover tw-bg-fixed tw-overflow-hidden tw-text-white tw-rounded-xl tw-bg-blue-gray-500" style="background-position:center;">
                        <img src="https://s3-alpha-sig.figma.com/img/ef94/5651/de35d8ed78dfdfcb603b26e763f562b6?Expires=1717372800&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4&Signature=mvf3msVZVItgBbqpQ-3fhmr-Oy6XkCQhpZmAcXKg8cmCqom8sbdr0h4KyDZNcXPk-FJgsShOR0tur9AQ4bknllsgMH89p1VfsXd~9zdwDu8fXs5TIg0VI2oOZQ7laixl7ey2SmPRgOKTBv3vAoRNswBTe0nR1gqzvRkgwKKF07sF8DCR0weewiMLhcq~3rcUlz30TBzlfxyOJBnmnKnIB4ioFpxn7gPINsWGQbXLEuZp0fZ9v4-3NhRBGhpO5y77EzKitK4hH1W249mmFqwNIN25cfKMPKdQErmR4roni3O1c1igTjKws1gM6yekmFmy7190xPswRECZdYgKU6Rs9Q__" alt="card-image" class="tw-object-cover tw-h-[300px] tw-w-full" />
                    </div>
                    <div class="tw-p-6">
                       
                        <div class="tw-flex">
                            <h5 class="tw-block tw-mb-2 tw-font-sans tw-text-xl tw-antialiased tw-font-semibold tw-leading-snug tw-tracking-normal tw-text-[#18191C]">
                                Technical Support Specialist
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
                            <span class="tw-text-[#2B9FDC] tw-text-2xl tw-font-semibold tw-font-clash-display tw-mt-1">Rp 3.4 - 4.5 jt/</span> <span class="tw-text-lg tw-font-normal tw-text-[#2B9FDC]">bulan</span>
                        </p>
                        <div class="tw-grid tw-grid-cols-2 tw-gap-4 tw-mt-4">
                            <div class="tw-flex tw-items-start">
                                <i class="fa-solid fa-location-dot tw-text-base tw-mr-2" style="color: rgba(43, 159, 220, 1)"></i>
                                <div>
                                    <p class="tw-text-base tw-font-semibold" style="color: rgba(0, 49, 79, 1)">Negara</p>
                                    <p class="tw-text-sm tw-font-light tw-text-[#52525B]">Indonesia</p>
                                </div>
                            </div>
                            <div class="tw-flex tw-items-start">
                                <i class="fa-solid fa-briefcase tw-text-base tw-mr-2" style="color: rgba(43, 159, 220, 1)"></i>
                                <div>
                                    <p class="tw-text-base tw-font-semibold" style="color: rgba(0, 49, 79, 1)">Kontrak Kerja</p>
                                    <p class="tw-text-sm tw-font-light tw-text-[#52525B]">Full-Time</p>
                                </div>
                            </div>
                            <div class="tw-flex tw-items-start">
                                <i class="fa-solid fa-language tw-text-base tw-mr-2" style="color: rgba(43, 159, 220, 1)"></i>
                                <div>
                                    <p class="tw-text-base tw-font-semibold" style="color: rgba(0, 49, 79, 1)">Level Bahasa</p>
                                    <p class="tw-text-sm tw-font-light tw-text-[#52525B]">Intermediate</p>
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
                     {{-- job card --}}
                     <div class="tw-relative tw-flex tw-flex-col tw-mt-6 tw-text-gray-700 tw-bg-[#18191C08] tw-border tw-border-[#E4E5E8] tw-rounded-xl tw-w-full">
                        <div class="tw-relative tw-h-[300px] tw-bg-cover tw-bg-fixed tw-overflow-hidden tw-text-white tw-rounded-xl tw-bg-blue-gray-500" style="background-position:center;">
                            <img src="https://s3-alpha-sig.figma.com/img/ef94/5651/de35d8ed78dfdfcb603b26e763f562b6?Expires=1717372800&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4&Signature=mvf3msVZVItgBbqpQ-3fhmr-Oy6XkCQhpZmAcXKg8cmCqom8sbdr0h4KyDZNcXPk-FJgsShOR0tur9AQ4bknllsgMH89p1VfsXd~9zdwDu8fXs5TIg0VI2oOZQ7laixl7ey2SmPRgOKTBv3vAoRNswBTe0nR1gqzvRkgwKKF07sF8DCR0weewiMLhcq~3rcUlz30TBzlfxyOJBnmnKnIB4ioFpxn7gPINsWGQbXLEuZp0fZ9v4-3NhRBGhpO5y77EzKitK4hH1W249mmFqwNIN25cfKMPKdQErmR4roni3O1c1igTjKws1gM6yekmFmy7190xPswRECZdYgKU6Rs9Q__" alt="card-image" class="tw-object-cover tw-h-[300px] tw-w-full" />
                        </div>
                        <div class="tw-p-6">
                           
                            <div class="tw-flex">
                                <h5 class="tw-block tw-mb-2 tw-font-sans tw-text-xl tw-antialiased tw-font-semibold tw-leading-snug tw-tracking-normal tw-text-[#18191C]">
                                    Technical Support Specialist
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
                                <span class="tw-text-[#2B9FDC] tw-text-2xl tw-font-semibold tw-font-clash-display tw-mt-1">Rp 3.4 - 4.5 jt/</span> <span class="tw-text-lg tw-font-normal tw-text-[#2B9FDC]">bulan</span>
                            </p>
                            <div class="tw-grid tw-grid-cols-2 tw-gap-4 tw-mt-4">
                                <div class="tw-flex tw-items-start">
                                    <i class="fa-solid fa-location-dot tw-text-base tw-mr-2" style="color: rgba(43, 159, 220, 1)"></i>
                                    <div>
                                        <p class="tw-text-base tw-font-semibold" style="color: rgba(0, 49, 79, 1)">Negara</p>
                                        <p class="tw-text-sm tw-font-light tw-text-[#52525B]">Indonesia</p>
                                    </div>
                                </div>
                                <div class="tw-flex tw-items-start">
                                    <i class="fa-solid fa-briefcase tw-text-base tw-mr-2" style="color: rgba(43, 159, 220, 1)"></i>
                                    <div>
                                        <p class="tw-text-base tw-font-semibold" style="color: rgba(0, 49, 79, 1)">Kontrak Kerja</p>
                                        <p class="tw-text-sm tw-font-light tw-text-[#52525B]">Full-Time</p>
                                    </div>
                                </div>
                                <div class="tw-flex tw-items-start">
                                    <i class="fa-solid fa-language tw-text-base tw-mr-2" style="color: rgba(43, 159, 220, 1)"></i>
                                    <div>
                                        <p class="tw-text-base tw-font-semibold" style="color: rgba(0, 49, 79, 1)">Level Bahasa</p>
                                        <p class="tw-text-sm tw-font-light tw-text-[#52525B]">Intermediate</p>
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
                         {{-- job card --}}
                <div class="tw-relative tw-flex tw-flex-col tw-mt-6 tw-text-gray-700 tw-bg-[#18191C08] tw-border tw-border-[#E4E5E8] tw-rounded-xl tw-w-full">
                    <div class="tw-relative tw-h-[300px] tw-bg-cover tw-bg-fixed tw-overflow-hidden tw-text-white tw-rounded-xl tw-bg-blue-gray-500" style="background-position:center;">
                        <img src="https://s3-alpha-sig.figma.com/img/ef94/5651/de35d8ed78dfdfcb603b26e763f562b6?Expires=1717372800&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4&Signature=mvf3msVZVItgBbqpQ-3fhmr-Oy6XkCQhpZmAcXKg8cmCqom8sbdr0h4KyDZNcXPk-FJgsShOR0tur9AQ4bknllsgMH89p1VfsXd~9zdwDu8fXs5TIg0VI2oOZQ7laixl7ey2SmPRgOKTBv3vAoRNswBTe0nR1gqzvRkgwKKF07sF8DCR0weewiMLhcq~3rcUlz30TBzlfxyOJBnmnKnIB4ioFpxn7gPINsWGQbXLEuZp0fZ9v4-3NhRBGhpO5y77EzKitK4hH1W249mmFqwNIN25cfKMPKdQErmR4roni3O1c1igTjKws1gM6yekmFmy7190xPswRECZdYgKU6Rs9Q__" alt="card-image" class="tw-object-cover tw-h-[300px] tw-w-full" />
                    </div>
                    <div class="tw-p-6">
                       
                        <div class="tw-flex">
                            <h5 class="tw-block tw-mb-2 tw-font-sans tw-text-xl tw-antialiased tw-font-semibold tw-leading-snug tw-tracking-normal tw-text-[#18191C]">
                                Technical Support Specialist
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
                            <span class="tw-text-[#2B9FDC] tw-text-2xl tw-font-semibold tw-font-clash-display tw-mt-1">Rp 3.4 - 4.5 jt/</span> <span class="tw-text-lg tw-font-normal tw-text-[#2B9FDC]">bulan</span>
                        </p>
                        <div class="tw-grid tw-grid-cols-2 tw-gap-4 tw-mt-4">
                            <div class="tw-flex tw-items-start">
                                <i class="fa-solid fa-location-dot tw-text-base tw-mr-2" style="color: rgba(43, 159, 220, 1)"></i>
                                <div>
                                    <p class="tw-text-base tw-font-semibold" style="color: rgba(0, 49, 79, 1)">Negara</p>
                                    <p class="tw-text-sm tw-font-light tw-text-[#52525B]">Indonesia</p>
                                </div>
                            </div>
                            <div class="tw-flex tw-items-start">
                                <i class="fa-solid fa-briefcase tw-text-base tw-mr-2" style="color: rgba(43, 159, 220, 1)"></i>
                                <div>
                                    <p class="tw-text-base tw-font-semibold" style="color: rgba(0, 49, 79, 1)">Kontrak Kerja</p>
                                    <p class="tw-text-sm tw-font-light tw-text-[#52525B]">Full-Time</p>
                                </div>
                            </div>
                            <div class="tw-flex tw-items-start">
                                <i class="fa-solid fa-language tw-text-base tw-mr-2" style="color: rgba(43, 159, 220, 1)"></i>
                                <div>
                                    <p class="tw-text-base tw-font-semibold" style="color: rgba(0, 49, 79, 1)">Level Bahasa</p>
                                    <p class="tw-text-sm tw-font-light tw-text-[#52525B]">Intermediate</p>
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
                
            </div>
        </div>
    </div>
@endsection
