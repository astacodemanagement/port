@extends('front.compro-1.layouts.app')
@section('title', $job->nama_job)

@section('content')
@push('css')
<style>
    @media (min-width: 767px) {
        .element-detail-share {
            display: flex;
        }

    }

    #title-job {
        margin-top: -2px;
    }

    @media (max-width: 767px) {
        #title-job {
            margin-top: -0rem;
            margin-left: -1rem;
            font-size: 26px;
        }

    }
    @media (max-width: 767px) {
        #tab-the-content{
            justify-content: center;
        }
    }
    @media (min-width:768px) {
        #tab-the-content{
            justify-content: start;
        }
    }
    @media (max-width: 767px) {
        #gap-job{
            gap:1.5rem
        }
    }
    @media (min-width: 768px) {
        #gap-job{
            gap:1rem
        }
        .content-col{
         
         
        }
    }
</style>

@endpush

<!-- Detail Jobs Information -->
<section class="Element-information-jobs">
    <div class="container p-0">
        <div class="row m-0">
            <div class="col-md-8 col-12 m-0">
                <div class="element-detail-date d-flex align-self-center">
                    <div class="items-icons">
                        <a href="{{ route('front.jobs.index') }}"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8" />
                            </svg></a>
                        |
                    </div>
                    <div class="card-items-bagde gap-1">
                        <img src="{{ asset('frontend/assets/icons/stop-circle.svg') }}" alt="">
                        <span>Tersedia</span>
                    </div>
                    <span class="text-small">Berakhir pada {{ $job->tanggal_tutup ? 'tanggal ' . \Carbon\Carbon::parse($job->tanggal_tutup)->format('d F Y') : '-' }}</span>
                </div>
            </div>

            <div class="col-md-4 col-12">
                <div class="element-detail-share mt-3 gap-1">
                    <span class="fw-bold">Bagikan:</span>
                    <div class="icons-items">
                        <a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                fill="currentColor" class="bi bi-whatsapp" viewBox="0 0 16 16">
                                <path
                                    d="M13.601 2.326A7.85 7.85 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.9 7.9 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.9 7.9 0 0 0 13.6 2.326zM7.994 14.521a6.6 6.6 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.56 6.56 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592m3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.73.73 0 0 0-.529.247c-.182.198-.691.677-.691 1.654s.71 1.916.81 2.049c.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232" />
                            </svg></a>
                        <a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                fill="currentColor" class="bi bi-instagram" viewBox="0 0 16 16">
                                <path
                                    d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.9 3.9 0 0 0-1.417.923A3.9 3.9 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.9 3.9 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.9 3.9 0 0 0-.923-1.417A3.9 3.9 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599s.453.546.598.92c.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.5 2.5 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.5 2.5 0 0 1-.92-.598 2.5 2.5 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233s.008-2.388.046-3.231c.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92s.546-.453.92-.598c.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92m-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217m0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334" />
                            </svg></a>
                    </div>
                    <div class="clipboard-copy">
                        <input type="text" value="{{ url()->current() }}" id="myInput"> |
                        <button onclick="myFunction()"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                                height="16" fill="currentColor" class="bi bi-copy" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M4 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2zm2-1a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1zM2 5a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1v-1h1v1a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h1v1z" />
                            </svg></button>
                    </div>
                </div>
            </div>


        </div>
    </div>
</section>
<!-- #End -->
<!-- Wrapper Detail Pekerjaan -->
<section class="wrapper-detail-pekerjaan" style="background: var(--white-b-d);">
    <div class="container">
        <div class="wrapper-content-detail">
            <div class="wrapper-items d-flex align-self-center" id="gap-job">
                <i class="fa-solid fa-suitcase fs-1 " style="color:#0F5078; margin-bottom:-15px;"></i>
                <h2 id="title-job">{{$job->nama_job ?? "-"}}</h2>
            </div>
        </div>
    </div>
</section>
<!-- End -->
<!-- Content Wrapper -->
<section class="wrapper-content ">
    <div class="container">
        <div class="row m-0">
            <div class="col-8 mb-4">
                <div class="wrapper-content-left bg-white ">
                    <ul class="nav nav-tabs d-flex " id="tab-the-content"   role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active" id="tab-detail-job" data-bs-toggle="tab" href="#tab-panel-job-detail"
                                role="tab" aria-controls="tab-panel-job-detail" aria-selected="true">Detail
                                Pekerjaan</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="tab-job-gallery" data-bs-toggle="tab" href="#tab-panel-job-gallery"
                                role="tab" aria-controls="tab-panel-job-gallery" aria-selected="false">Galeri</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="tab-other-information" data-bs-toggle="tab" href="#tab-panel-other-information"
                                role="tab" aria-controls="tab-panel-other-information" aria-selected="false">Informasi
                                Lainnya</a>
                        </li>
                    </ul>
                    <div class="tab-content pt-5" id="tab-content">
                        <div class="tab-pane active px-3" id="tab-panel-job-detail" role="tabpanel"
                            aria-labelledby="tab-detail-job">
                            <h5 class="fw-bold">Kualifikasi:</h5>
                            <div class="row">
                                <div class="col-6">
                                    <div class="tab-content-items mt-4">
                                        <div class="row d-flex gap-2">
                                            <div class="col-1">
                                                <div class="tab-icons">
                                                    <img src="{{ asset('frontend/assets/icons/button-gender.png') }}" alt="">
                                                </div>
                                            </div>
                                            <div class="col-10">
                                                <h6 class="fw-bold mt-1">Jenis Kelamin</h6>
                                                <span>{{ $job->jenis_kelamin ?? 'Tidak Ada Ketentuan' }}</span>
                                            </div>
                                        </div>

                                        <div class="row d-flex gap-2 mt-3">
                                            <div class="col-1">
                                                <div class="tab-icons">
                                                    <img src="{{ asset('frontend/assets/image/icon/user-tag.png') }}" alt="" height="24">
                                                </div>
                                            </div>
                                            <div class="col-10">
                                                <h6 class="fw-bold mt-1">Usia</h6>
                                                <span>{{ $job->rentang_usia ?? 'Tidak Ada Ketentuan' }}</span>
                                            </div>
                                        </div>

                                        <div class="row d-flex gap-2 mt-3">
                                            <div class="col-1">
                                                <div class="tab-icons">
                                                    <img src="{{ asset('frontend/assets/icons/clarity_language-solid.svg') }}" alt="">
                                                </div>
                                            </div>
                                            <div class="col-10">
                                                <h6 class="fw-bold mt-1">Level Bahasa yang dibutuhkan</h6>
                                                <span>{{ $job->level_bahasa ?? 'Tidak Ada Ketentuan' }}</span>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-6 mt-4">
                                    <div class="d-flex gap-2">
                                        <div class="col-1">
                                            <div class="tab-icons">
                                                <img src="{{ asset('frontend/assets/icons/teacher.svg') }}" alt="">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <h6 class="fw-bold mt-1">Pendidikan</h6>
                                            <span>{{ $job->pendidikan ?? 'Tidak Ada Ketentuan' }}</span>
                                        </div>
                                    </div>
                                    <div class="d-flex gap-2 mt-3">
                                        <div class="col-1">
                                            <div class="tab-icons">
                                                <img src="{{ asset('frontend/assets/icons/briefcase.svg') }}" alt="">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <h6 class="fw-bold mt-1">Pengalaman</h6>
                                            <span>{{ $job->pengalaman_kerja ?? 'Tidak Ada Ketentuan' }}</span>
                                        </div>
                                    </div>


                                </div>
                            </div>
                            <div class="hr"></div>

                            <div class="deskripsi-pekerjaan">
                                <h5 class="fw-bold">Deskripsi Pekerjaan:</h5>
                                <span>{{ $job->deskripsi }}</span>
                            </div>
                            <div class="hr"></div>
                            <div class="benefit-pekerjaan">
                                <h5 class="fw-bold mt-1">Benefit Pekerjaan :</h5>
                                <div class="d-flex gap-3">
                                    @foreach ($job->benefits as $benefit)
                                    <div class="card-item">
                                        <span>{{ $benefit->nama_benefit }}</span>
                                    </div>
                                    @endforeach
                                </div>
                                <div class="hr"></div>
                                <div class="deskripsi-pekerjaan">
                                    <h5 class="fw-bold mt-1">Pekerjaan ini membutuhkan :</h5>
                                    <div class="d-flex gap-3">
                                        {{-- <div class=" card-item">
                                                <span>Keterampilan komunikasi</span>
                                            </div>
                                            <div class=" card-item">
                                                <span>Keterampilan pemasaran</span>
                                            </div>
                                            <div class="card-item">
                                                <span>Berbicara depan umum</span>
                                            </div> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="tab-panel-job-gallery" role="tabpanel" aria-labelledby="tab-job-gallery">
                            <h5 class="fw-bold">Galeri</h5>
                            <div class="row m-0">
                                @foreach ($job->galeri as $galeri)
                                <div class="col-3 border-rounded" style="border-radius: 10px;">
                                    <img src="{{ asset('upload/gambar/thumb_300_' . $galeri->gambar) }}" style="border-radius: 10px;" width="160" alt="">
                                </div>
                                @endforeach
                            </div>
                            <hr>
                            <div class="row">
                                <h5 class="fw-bold">Lorem ipsum dolor sit amet consectetur :</h5>
                                <span class="text-small">{{ $job->paragraf_galeri }}</span>
                            </div>
                        </div>
                        <div class=" tab-pane" id="tab-panel-other-information" role="tabpanel" aria-labelledby="tab-other-information">
                            <div class="content-information">
                                <span class="text-small">{{ $job->info_lain }}</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="content-warning d-none d-lg-block">
                    <div class="row m-0">
                        <div class="col-1 float-right">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                fill="currentColor" class="bi bi-exclamation-circle-fill" viewBox="0 0 16 16">
                                <path
                                    d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4m.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2" />
                            </svg>
                        </div>
                        <div class="col-11">
                            <span>“HATI-HATI DENGAN OKNUM YANG MENGATASNAMAKAN PERUSAHAAN. KAMI
                                TIDAK PERNAH
                                MELAKUKAN
                                PEMBAYARAN
                                DILUAR ATAS NAMA REKENING PERUSAHAAN”. Segala informasi pekerjaan di
                                atas
                                merupakan
                                informasi
                                sebenar-benarnya yang diperoleh dari Perusahaan Pemberi
                                Kerja.</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-4 d-block mb-4">
                <div class="wrapper-content-right">
                    <div class="wrapper-image">
                        <img src="{{ asset('upload/gambar/' . $job->gambar) }}" alt="{{ $job->nama_job }}" style="height: 250px; object-fit:cover; border-radius:8px;" class="tw-rounded-md">
                    </div>
                    <div class="wrapper-salary">
                        <div class="wrapper-icon">
                            <div class="d-flex gap-1">
                                <img src="{{ asset('frontend/assets/icons/bulk/coin.png') }}" width="30" height="30">
                                <h2 class="fw-bolder text-white">GAJI</h2>
                            </div>
                            <div class="salary-items">
                                <div class="d-flex align-middle">
                                    <h5 class="fw-bold text-white"> {{ $job->mata_uang_gaji }} {{$job->gaji}} / {{ $job->jenis_pembayaran }}</h5>
                                   
                                </div>
                                <hr class="text-white">
                            </div>
                            <hr class="text-white">
                            <div class="text-information d-flex">
                                <span class="gap-1"> ± {{number_format($job->estimasi)}} | Kurs: {{ \Carbon\Carbon::parse($job->tanggal_kurs)->format('d/m/Y') }} - IDR {{ number_format($job->nominal_kurs) }}</span>
                                
                            </div>
                        </div>
                        
                    </div>
                    <!-- <div class="d-flex justify-content-center" style="width: 100%; background-color: var(--orange); border-radius:8px;">
    <span style="width: 100%; margin-left: 5px; padding: 10px; color: var(--text-w);  font-size: 12px; border-radius: 8px; text-align: center;">
        Tersedia
    </span>
</div> -->

                    <hr class=" text-white">
                    <div class="d-flex " style="justify-content: space-around;">
                        <div class="col-6 content-col" >
                            <div class="items-negara mx-2">
<div class="row d-flex">
                                    <div class="col-1">
                                        <i class="fa-solid fa-location-dot fs-5 text-light" ></i>                                   
                                    </div>
                                    <div class="col">
                                        <h6 class="text-white " style="margin-left:-0.4rem;">Negara</h6>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                          
                                        <span style="color:#e2e8f0; margin-left:-0.4rem;">{{ $job->negara?->nama_negara }}</span>
                                    </div>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                  
                                </div>
                            </div>

                        </div>
                        <div class="col-6 content-col">
                            <div class="items-negara ">
                                <div class="row d-flex">
                                    <div class="col-1">
                                        <i class="fa-solid fa-file fs-5 text-light"></i>
                                    </div>
                                    <div class="col">
                                        <h6 class="text-white" style="margin-left:-0.4rem;">Kontrak Kerja</h6>
                                        <span class="" style="color:#e2e8f0; margin-left:-0.4rem; ">{{ $job->kontrak_kerja ?? '-' }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex mx-2">

                        <div class="col-6 content-col">
                        <div class="items-negara  mt-3">
                                <div class="row d-flex">
                                    <div class="col-1 ">
                                        <i class="fa-solid fa-clock fs-5 text-light"></i>
                                    </div>
                                    <div class="col">
                                        <h6 class="text-white mb-1" style="margin-left:-0.3rem;">Jam Kerja</h6>
                                        <span style="color:#e2e8f0;  margin-left:-0.3rem;">{{ $job->jam_kerja ?? '-' }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 content-col">
                        <div class="items-negara mt-3">
                                <div class="row d-flex">
                                    <div class="col-1">
                                        <i class="fa-solid fa-calendar-days fs-5 text-light"></i>
                                    </div>
                                    <div class="col">
                                        <h6 class="text-white mb-1" style="margin-left:-0.3rem;">Hari Kerja</h6>
                                        <span style="color:#e2e8f0;  margin-left:-0.3rem;">{{ $job->hari_kerja ?? '-' }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex mx-2">

                        <div class="col-6 content-col">
                        <div class="items-negara mt-3">
                                <div class="row d-flex">
                                    <div class="col-1">
                                        <i class="fa-solid fa-plane fs-5 text-white"></i>
                                    </div>
                                    <div class="col">
                                        <h6 class="text-white" style="margin-left:-0.3rem; ">Cuti Kerja</h6>
                                        <span style="color:#e2e8f0;  margin-left:-0.3rem;">{{ $job->cuti_kerja ?? '-' }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 content-col">
                        <div class="items-negara mt-3">
                                <div class="row d-flex">
                                    <div class="col-1">
                                        <i class="fa-solid fa-language fs-5 text-light"></i>
                                    </div>
                                    <div class="col">
                                        <h6 class="text-white" style="margin-left:-0.2rem; ">Mata Uang Gaji</h6>
                                        <span style="color:#e2e8f0;  margin-left:-0.2rem;">{{ $job->mata_uang_gaji ?? 'tidak ada' }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex mx-2">
                        <div class="col-6 content-col">
                        <div class="items-negara mt-3">
                                <div class="row d-flex">
                                    <div class="col-1">
                                        <i class="fa-solid fa-calendar fs-5 text-white"></i>
                                    </div>
                                    <div class="col">
                                        <h6 class="text-white" style="margin-left:-0.3rem; margin-top:-1px;">Masa Percobaan</h6>
                                        <span style="color:#e2e8f0;  margin-left:-0.3rem; margin-top:-1px;">{{ $job->masa_percobaan ?? 'tidak ada' }}</span>
                                    </div>
                                </div>
                            </div>
                       
                        </div>
                        <div class="col-6 content-col">


                        <div class="items-negara mt-3">
                                <div class="row d-flex">
                                    <div class="col-1">
                                        <i class="fa-solid fa-hourglass-end fs-5 text-light"></i>
                                    </div>
                                    <div class="col">
                                        <h6 class="text-white" style="margin-left:-0.3rem;">Overtime</h6>
                                        <span style="color:#e2e8f0;  margin-left:-0.3rem;">{{ $job->kerja_lembur ?? "tidak ada" }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                  
                    <hr class="text-white">
                    <div class="d-flex mt-4 mb-4 mx-2">
                        <div class="col-sm  content-col">
                            <div class="items-negara">
                                <div class="row d-flex">
                                    <div class="col-1">
                                        <i class="fa-solid fa-building fs-5 text-light"></i>
                                    </div>
                                    <div class="col">
                                        <h6 class="text-white" style="margin-top:-1px;">Industri Pekerjaan</h6>
                                        <span style="color:#e2e8f0; margin-top:-1px; ">{{ $job->jobKategori?->nama_kategori_job }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm   ">
                            <div class="items-negara">
                                <div class="row d-flex ">
                                    <div class="col-1">
                                        <i class="fa-solid fa-file-contract fs-5 text-light"></i>
                                    </div>
                                    <div class="col">
                                        <h6 class="text-white" style="margin-top:-1px;">Jenis Pekerjaan</h6>
                                        <span style="color:#e2e8f0; margin-top:-1px; font-size:0.8rem">{{ $job->jenis_pekerjaan }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex" style="flex-direction: column;">
                        @if (auth()->user()?->kandidat?->pendaftaran->status == 'Verifikasi')
                        <div class="col-12">
                            <button onclick="location.href='{{ route('front.jobs.apply', hashId($job->id)) }}'" class="element-button-action text-center d-block btn-apply" style="width:100%;text-decoration: none;font-weight: 700;color: var(--biru-d);">
                                Lamar Pekerjaan
                            </button>
                        </div>
                        @elseif (auth()?->user()?->kandidat?->pendaftaran?->status == "Belum Verifikasi(Pending)")
                        <div class="col-12">
                            <a href="{{ route('front.profile') }}" class="element-button-action text-center d-block" style="width:100%;text-decoration: none;font-weight: 700;color: var(--biru-d);">
                                Menunggu Verifikasi
                            </a>
                        </div>


                        @else
                        <div class="col-12">
                            <div class="d-flex " style="justify-content: center; align-items: center;">

                                <a href="{{ route('front.login', ['job' => hashId($job->id)]) }}" class="element-button-action text-center d-block" style="magin:0 auto;width:100%;text-decoration: none;font-weight: 700;color: var(--biru-d);">
                                    Masuk Untuk Melamar Pekerjaan
                                </a>
                            </div>
                        </div>
                        @endif
                        <div class="col">
                            <div class="element-akun fs-5 text-center mt-3">
                                <h6 class="text-white" style="font-weight: 400;">Belum Punya Akun? <a href="{{ route('register') }}" class="text-white fw-semibold">Daftar SIPOOL</a></h6>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
        <div class="row m-0">
            <div class="col-8 m-0">
                <div class="content-warning d-block d-lg-none">
                    <div class="gap-2 d-flex" style="flex-direction: column; justify-content:center; align-items:center;">
                        <div class="col-1 col-md-2 ">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                fill="currentColor" class="bi bi-exclamation-circle-fill" viewBox="0 0 16 16">
                                <path
                                    d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4m.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2" />
                            </svg>
                        </div>
                        <div class="col-md-10 col-11 " style="text-align: center;">
                            <span>“HATI-HATI DENGAN OKNUM YANG MENGATASNAMAKAN PERUSAHAAN. KAMI
                                TIDAK PERNAH
                                MELAKUKAN
                                PEMBAYARAN
                                DILUAR ATAS NAMA REKENING PERUSAHAAN”. </span>
                                <br>
                                <span>
                                Segala informasi pekerjaan di
                                atas
                                merupakan
                                informasi
                                sebenar-benarnya yang diperoleh dari Perusahaan Pemberi
                                Kerja.
                                </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End -->
<!-- Section Lamaran pekerjaan -->
<section class="Element-application-jobs">
    <div class="container">
        <div class="title-heading ">
            <h1 class="fw-bold">Pekerjaan Lainnya
            </h1>
        </div>
        <div class="element-items-card mt-5">
            <div class="row">
                @foreach ($relateJobs as $rJob)
                <div class="col-3">
                    <div class="card-body">
                        <div class="card-image">
                            <img src="/upload/gambar/{{$rJob->gambar}}" onerror="this.src='{{ asset('images/no-image.png') }}'" alt="{{ $job->nama_job }}" style="width:100%">
                        </div>
                        <div class="card-items-bagde " >
                            <img src="{{ asset('frontend/assets/icons/stop-circle.svg') }}" alt="">
                            <div class="">
                                <span>Tersedia</span>
                            </div>
                        </div>
                        <div class="card-title-heading-card">
                            <h5 class="col-10 text-truncate">{{ $rJob->nama_job }}
                            </h5>
                            <span>{{ $rJob->nama_perusahaan }}</span>
                        </div>
                        <div class="card-content" >
                            <div class="d-flex">
                                <div class="col-1 mt-1">
                                    <img src="{{ asset('frontend/assets/image/location.png') }}" alt="">
                                </div>
                                <div class="col-10 mt-2">
                                    <h6 class="title-heading fw-bold">Negara</h6>
                                    <p>{{ $rJob->negara?->nama_negara }}</p>
                                </div>
                            </div>
                            <div class="d-flex">
                                <div class="col-1 mt-1">
                                    <img src="{{ asset('frontend/assets/icons/document-text.svg') }}" alt="">
                                </div>
                                <div class="col-10 mt-2">
                                    <h6 class="title-heading fw-bold">Kontrak Kerja</h6>
                                    <p>{{ $rJob->kontrak_kerja }}</p>
                                </div>
                            </div>
                            <div class="d-flex">
                                <div class="col-1 mt-1">
                                    <img src="{{ asset('frontend/assets/icons/Component 1.svg') }}" alt="">
                                </div>
                                <div class="col-10 mt-2">
                                    <h6 class="title-heading fw-bold">Gaji</h6>
                                    <p>Rp {{ $rJob->gaji ?? "-" }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <h6>Berakhir pada {{ $rJob->tanggal_tutup ? 'tanggal ' . \Carbon\Carbon::parse($rJob->tanggal_tutup)->format('d F Y') : '-' }}</h6>
                                </div>
                                <div class="col-12 d-flex align-self-center mt-2">
                                    <a href="">Lihat Detail <span><svg xmlns="http://www.w3.org/2000/svg" clas
                                                width="16" height="16" fill="currentColor"
                                                class="bi bi-arrow-right-circle-fill" viewBox="0 0 16 16">
                                                <path
                                                    d="M8 0a8 8 0 1 1 0 16A8 8 0 0 1 8 0M4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5z" />
                                            </svg></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                <div class="element-next mt-5 text-center mb-5">
                    <a href="{{ route('front.jobs.index', ['category' => hashId($job->kategori_job_id)]) }}">Lihat lebih lanjut
                        <svg xmlns=" http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-arrow-right" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- #End -->
@endsection

@push('css')
<style>
    .Element-application-jobs {
        background-image: url('{{ asset(' frontend/assets/image/image-background.png') }}') !important;
        min-height: unset
    }
</style>
@endpush

@push('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/vanilla-lazyload/19.1.3/lazyload.min.js" integrity="sha512-VMl48m6saA54JWGUPVnSqp9gDFdJ1XPIKHAI+SP05D93n+Ma5T8osuxhTnxNvFfc5zVF+bWbxmCCj4EbsWUVyg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    var lazyLoadInstance = new LazyLoad({});
    $(function() {
        $('.btn-apply').on('click', function() {
            $(this).prop('disabled', true).prepend(`<div class="spinner-border spinner-border-sm" role="status"></div>`)
        })
    })
</script>
<!-- swal2 cdn -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
@if (session('success'))
<script>
    Swal.fire({
        icon: 'success',
        title: 'Berhasil',
        text: '{{ session('
        success ') }}',
        showConfirmButton: false,
        timer: 1500
    })
</script>
@endif
@if (session('error'))
<script>
    Swal.fire({
        icon: 'error',
        title: 'Gagal',
        text: '{{ session('
        error ') }}',
        showConfirmButton: false,
        timer: 3000
    })
</script>
@endif

@endpush