@extends('front.member.layouts.app')

@section('title', 'Status Proses Lamaran Kerja')
@push('css')
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.14.1/dist/cdn.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
@endpush
@section('content')
    <div class="row" >
        @include('front.member.layouts.profile-info')
        <div class="col-md-9">
            @foreach ($seleksi as $item )

          
            <div class="card">
                @if ($item->stasus != "Batal")
                <div class="card-body">
                    <div class="card-title">
                        <h5 class="fw-semibold float-start">{{ $item->job->nama_perusahaan . ' - ' .  $item->job->nama_job}}</h5>
                        <!-- <a href="{{ route('member.work-experience.edit') }}" class="float-end btn btn-light-primary text-primary mt-n2"><i class="ti ti-pencil-minus"></i></a> -->
                    </div>
                    <hr class="mb-4 mt-5 w-100">
                    <h5 class="fw-7 text-primary">Di Lamar tanggal {{$item->tanggal_apply}}</h5>
                    @php
                    $statuses = [
                        'cek_kualifikasi' => $item->tanggal_cek_kualifikasi ?? 'Belum selesai',
                        'lolos_kualifikasi' => $item->tanggal_lolos_kualifikasi ?? 'Belum selesai',
                        'interview' => $item->tanggal_interview ?? 'Belum selesai',
                        'lolos_interview' => $item->tanggal_lolos_interview ?? 'Belum selesai',
                        'dalam_proses' => $item->tanggal_dalam_proses ?? 'Belum selesai',
                        'terbang' => $item->tanggal_terbang ?? 'Belum selesai',
                        'selesai_kontrak' => $item->tanggal_selesai_kontrak ?? 'Belum selesai',
                    ];

                    $icon = [
                        'cek_kualifikasi' => 'fas fa-clipboard',
                        'lolos_kualifikasi' => 'fas fa-user',
                        'interview' => 'fas fa-eye',
                        'lolos_interview' => 'fas fa-thumbs-up',
                        'dalam_proses' => 'fas fa-clock',
                        'terbang' => 'fas fa-plane',
                        'selesai_kontrak' => 'fas fa-calendar'
                    ];

                    $title = [
                        'cek_kualifikasi' => 'Cek Kualifikasi',
                        'lolos_kualifikasi' => 'Lolos Kualifikasi',
                        'interview' => 'Interview',
                        'lolos_interview' => 'Lolos Interview',
                        'dalam_proses' => 'Dalam Proses',
                        'terbang' => 'Terbang',
                        'selesai_kontrak' => 'Selesai Kontrak'
                    ];
                @endphp

                <ol class="tw-items-center sm:tw-flex tw-mt-10">
                    @foreach ($statuses as $status => $tanggal)
                        @php
                            $isCompleted = $tanggal != 'Belum selesai';
                            $namaIcon = $isCompleted ? 'fas fa-check' : $icon[$status];
                            $line = $isCompleted ? 'bg-primary' : 'tw-bg-gray-200';
                        @endphp
                        <li class="tw-relative tw-mb-6 sm:tw-mb-0">
                            <div class="tw-flex tw-items-center tw-h-full">
                                <div class="tw-z-10 tw-flex tw-items-center tw-justify-center tw-w-10 tw-h-10 bg-primary tw-rounded-full tw-ring-0 tw-ring-white sm:tw-ring-8 tw-shrink-0">
                                    <i class="{{ $namaIcon }} tw-text-white tw-text-xl"></i>
                                </div>
                                @if (!$loop->last)
                                    <div class="tw-hidden sm:tw-flex tw-w-full {{ $line }} tw-h-1"></div>
                                @endif
                            </div>
                            <div class="tw-mt-3 sm:tw-pe-8">
                                <button type="button" class="tw-text-sm tw-font-semibold tw-text-gray-900" data-bs-toggle="modal" data-bs-target="#modal_{{ $status }}{{ $item->id }}">{{ $title[$status] }}</button>
                                <time class="tw-block tw-text-sm tw-font-normal tw-leading-none tw-text-gray-400">{{ $tanggal }}</time>
                            </div>
                        </li>
              
                        @if ($status != 'dalam_proses')
                        <div class="modal fade" id="modal_{{ $status }}{{ $item->id }}" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modal-{{ $status }}-{{ $item->id }}Label" class="text-primary tw-text-3xl">{{ $title[$status] }} Details</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                       <h3 class="text-primary tw-font-semibold tw-text-xl">
                                        {{$item->job->nama_perusahaan . ' - ' .  $item->job->nama_job}}
                                       </h3>
                                       <h5 class="tw-text-gray-700 tw-text-lg">
                                        @if ($tanggal != 'Belum selesai')
                                        {{$title[$status]}}  selesai pada tanggal {{$tanggal}}
                                            
                                        @else
                                            Belum mencapai tahapan ini
                                        @endif    
                                    </h5>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-primary text-primary" data-bs-dismiss="modal">Close</button>
                                       
                                    </div>
                                </div>
                            </div>
                        </div>
                        @else
                            
                        @endif
                    @endforeach
                </ol>

      

                </div>   
                @else
                    <div class="card-body">
                    <div class="card-title">
                        <h5 class="fw-semibold float-start">{{ $item->job->nama_perusahaan . ' - ' .  $item->job->nama_job}}</h5>
                        <!-- <a href="{{ route('member.work-experience.edit') }}" class="float-end btn btn-light-primary text-primary mt-n2"><i class="ti ti-pencil-minus"></i></a> -->
                    </div>
                        <h2>
                            <span class="badge bg-danger">Lamaran Dibatalkan</span>
                        </h2>
                    </div>
                @endif
                
            </div>

      
            @endforeach
            
        </div>
    </div>
    <!-- Button trigger modal -->

@endsection
@push('js')
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
@endpush