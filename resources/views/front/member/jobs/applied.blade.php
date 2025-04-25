@extends('front.member.layouts.app')

@section('title', 'Status Proses Lamaran Kerja')
@push('css')
<link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
<style>
    .current-step {
        background-color: #ffc107 !important;
    }
    .status-badge {
        display: inline-block;
        padding: 0.35em 0.65em;
        font-size: 0.85em;
        font-weight: 700;
        line-height: 1;
        color: #fff;
        text-align: center;
        white-space: nowrap;
        vertical-align: baseline;
        border-radius: 0.375rem;
    }
    .status-badge-batal {
        background-color: #dc3545;
    }
    .status-badge-success {
        background-color: #198754;
    }
    .status-badge-active {
        background-color: #ffc107;
        color: #000;
    }
    .status-badge-done {
        background-color: #198754;
    }
    .status-badge-waiting {
        background-color: #6c757d;
    }
</style>
@endpush
@section('content')
    <div class="row" >
        @include('front.member.layouts.profile-info')
        <div class="col-md-9">

            @foreach ($seleksi as $item)
            <div class="card mb-4">
                @if ($item->status == "Batal")
                <!-- Tampilan untuk status Batal -->
                <div class="card-body">
                    <div class="card-title d-flex justify-content-between align-items-center">
                        <h5 class="fw-semibold">{{ $item->job->nama_perusahaan . ' - ' .  $item->job->nama_job}}</h5>
                        <span class="status-badge status-badge-batal">DIBATALKAN</span>
                    </div>
                    <hr class="mb-4 mt-3 w-100">
                    <div class="alert alert-danger">
                        <div class="d-flex align-items-start">
                            <div class="me-3">
                                <i class="fas fa-times-circle fa-2x"></i>
                            </div>
                            <div>
                                <h5 class="fw-bold mb-1">Lamaran Dibatalkan</h5>
                                <p class="mb-0">Tanggal Pembatalan: {{$item->tanggal_batal}}</p>
                                <p class="mb-0">Alasan: {{$item->keterangan_batal ?: 'Tidak ada keterangan'}}</p>
                                <button type="button" class="btn btn-sm btn-outline-danger mt-3" data-bs-toggle="modal" data-bs-target="#modalBatal{{$item->id}}">
                                    Lihat Detail
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal untuk status batal -->
                <div class="modal fade" id="modalBatal{{$item->id}}" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header bg-danger text-white">
                                <h5 class="modal-title">Detail Pembatalan Lamaran</h5>
                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <h4 class="text-danger mb-4">Lamaran Anda telah dibatalkan</h4>
                                
                                <div class="mb-4">
                                    <h5 class="text-primary fw-semibold">Informasi Pekerjaan</h5>
                                    <p class="mb-1"><strong>Perusahaan:</strong> {{$item->job->nama_perusahaan}}</p>
                                    <p class="mb-1"><strong>Posisi:</strong> {{$item->job->nama_job}}</p>
                                    <p class="mb-1"><strong>Lokasi:</strong> {{$item->job->lokasi}}</p>
                                </div>
                                
                                <div class="mb-4">
                                    <h5 class="text-primary fw-semibold">Informasi Pembatalan</h5>
                                    <p class="mb-1"><strong>Tanggal Pembatalan:</strong> {{$item->tanggal_batal}}</p>
                                    <p class="mb-1"><strong>Alasan Pembatalan:</strong></p>
                                    <div class="p-3 bg-light rounded">
                                        {{$item->keterangan_batal ?: 'Tidak ada keterangan'}}
                                    </div>
                                </div>
                                
                                <div class="alert alert-info">
                                    <i class="fas fa-info-circle me-2"></i>
                                    Jika Anda memiliki pertanyaan tentang pembatalan ini, silakan hubungi admin melalui menu Pengaduan.
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                <a href="{{ route('member.pengaduan.create') }}" class="btn btn-primary">Ajukan Pengaduan</a>
                            </div>
                        </div>
                    </div>
                </div>
                @elseif ($item->status == "Selesai Kontrak")
                <!-- Tampilan untuk status Selesai Kontrak -->
                <div class="card-body">
                    <div class="card-title d-flex justify-content-between align-items-center">
                        <h5 class="fw-semibold">{{ $item->job->nama_perusahaan . ' - ' .  $item->job->nama_job}}</h5>
                        <span class="status-badge status-badge-success">SELESAI KONTRAK</span>
                    </div>
                    <hr class="mb-4 mt-3 w-100">
                    <div class="alert alert-success">
                        <div class="d-flex align-items-start">
                            <div class="me-3">
                                <i class="fas fa-check-circle fa-2x"></i>
                            </div>
                            <div>
                                <h5 class="fw-bold mb-1">Pekerjaan Berhasil Diselesaikan</h5>
                                <p class="mb-0">Tanggal Selesai Kontrak: {{$item->tanggal_selesai_kontrak}}</p>
                                <p class="mb-0">Keterangan: {{$item->keterangan_seleksi_terbang ?: 'Tidak ada keterangan'}}</p>
                                <button type="button" class="btn btn-sm btn-outline-success mt-3" data-bs-toggle="modal" data-bs-target="#modalSelesai{{$item->id}}">
                                    Lihat Detail
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Modal untuk status Selesai Kontrak -->
                <div class="modal fade" id="modalSelesai{{$item->id}}" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header bg-success text-white">
                                <h5 class="modal-title">Detail Penyelesaian Kontrak</h5>
                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <h4 class="text-success mb-4">Selamat! Anda telah menyelesaikan kontrak kerja</h4>
                                
                                <div class="mb-4">
                                    <h5 class="text-primary fw-semibold">Informasi Pekerjaan</h5>
                                    <p class="mb-1"><strong>Perusahaan:</strong> {{$item->job->nama_perusahaan}}</p>
                                    <p class="mb-1"><strong>Posisi:</strong> {{$item->job->nama_job}}</p>
                                    <p class="mb-1"><strong>Lokasi:</strong> {{$item->job->lokasi}}</p>
                                    <p class="mb-1"><strong>Negara:</strong> {{$item->job->nama_negara}}</p>
                                </div>
                                
                                <div class="mb-4">
                                    <h5 class="text-primary fw-semibold">Informasi Penyelesaian</h5>
                                    <p class="mb-1"><strong>Tanggal Berangkat:</strong> {{$item->tanggal_berangkat}}</p>
                                    <p class="mb-1"><strong>Tanggal Selesai Kontrak:</strong> {{$item->tanggal_selesai_kontrak}}</p>
                                    <p class="mb-1"><strong>Keterangan:</strong></p>
                                    <div class="p-3 bg-light rounded">
                                        {{$item->keterangan_seleksi_terbang ?: 'Tidak ada keterangan'}}
                                    </div>
                                </div>
                                
                                <div class="alert alert-info">
                                    <i class="fas fa-info-circle me-2"></i>
                                    Terima kasih telah menggunakan layanan kami. Anda dapat mencari peluang kerja lainnya di halaman lowongan.
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                <a href="{{ route('front.jobs.index') }}" class="btn btn-primary">Cari Lowongan Baru</a>
                            </div>
                        </div>
                    </div>
                </div>
                @else
                <!-- Tampilan untuk status proses normal -->
                <div class="card-body">
                    <div class="card-title">
                        <h5 class="fw-semibold float-start">{{ $item->job->nama_perusahaan . ' - ' .  $item->job->nama_job}}</h5>
                        <!-- <a href="{{ route('member.work-experience.edit') }}" class="float-end btn btn-light-primary text-primary mt-n2"><i class="ti ti-pencil-minus"></i></a> -->
                    </div>
                    <hr class="mb-4 mt-5 w-100">
                    <h5 class="fw-7 text-primary">Status: {{$item->status}}</h5>
                    @php
                    $statuses = [
                        'cek_kualifikasi' => $item->tanggal_cek_kualifikasi ?? '-',
                        'lolos_kualifikasi' => $item->tanggal_lolos_kualifikasi ?? '-',
                        'interview' => $item->tanggal_dari_interview ?? '-',
                        'lolos_interview' => $item->tanggal_dari_lolos_interview ?? '-',
                        'dalam_proses' => $item->tanggal_dalam_proses ?? '-',
                        'terbang' => $item->tanggal_terbang ?? '-',
                    ];

                    $icon = [
                        'cek_kualifikasi' => 'fas fa-clipboard',
                        'lolos_kualifikasi' => 'fas fa-user',
                        'interview' => 'fas fa-eye',
                        'lolos_interview' => 'fas fa-thumbs-up',
                        'dalam_proses' => 'fas fa-clock',
                        'terbang' => 'fas fa-plane',
                    ];

                    $title = [
                        'cek_kualifikasi' => 'Cek Kualifikasi',
                        'lolos_kualifikasi' => 'Lolos Kualifikasi',
                        'interview' => 'Interview',
                        'lolos_interview' => 'Lolos Interview',
                        'dalam_proses' => 'Dalam Proses',
                        'terbang' => 'Terbang',
                    ];

                    $keterangan = [
                        'cek_kualifikasi' => 'Tidak Perlu Keterangan',
                        'lolos_kualifikasi' => $item->keterangan_dari_lolos_kualifikasi,
                        'interview' => $item->keterangan_interview,
                        'lolos_interview' => $item->keterangan_dari_lolos_interview,
                        'dalam_proses' => $item->keterangan_dalam_proses,
                        'terbang' => $item->keterangan_seleksi_terbang,
                    ];
                    
                    // Temukan tahap terakhir yang selesai
                    $lastCompletedStep = null;
                    foreach ($statuses as $status => $tanggal) {
                        if ($tanggal != '-') {
                            $lastCompletedStep = $status;
                        }
                    }
                    
                    // Tentukan tahap saat ini (step setelah tahap terakhir yang selesai)
                    $currentStep = null;
                    $statusKeys = array_keys($statuses);
                    if ($lastCompletedStep) {
                        $lastIndex = array_search($lastCompletedStep, $statusKeys);
                        if ($lastIndex < count($statusKeys) - 1) {
                            $currentStep = $statusKeys[$lastIndex + 1];
                        }
                    } else {
                        // Jika belum ada tahap yang selesai, step saat ini adalah tahap pertama
                        $currentStep = $statusKeys[0];
                    }
                    @endphp

                    <ol class="tw-items-center sm:tw-flex tw-mt-10">
                        @foreach ($statuses as $status => $tanggal)
                        @php
                            $isCompleted = $lastCompletedStep && array_search($status, array_keys($statuses)) <= array_search($lastCompletedStep, array_keys($statuses));
                            $isCurrent = $status === $currentStep;
                            
                            // Pilih ikon dan kelas yang tepat berdasarkan status
                            if ($isCompleted) {
                                $namaIcon = 'fas fa-check';
                                $line = 'bg-success';
                                $bg = 'bg-success';
                                $stepStatus = 'status-badge status-badge-done';
                                $statusText = 'Selesai';
                            } elseif ($isCurrent) {
                                $namaIcon = 'fas fa-hourglass-half';
                                $line = 'tw-bg-gray-200';
                                $bg = 'current-step';
                                $stepStatus = 'status-badge status-badge-active';
                                $statusText = 'Sedang Diproses';
                            } else {
                                $namaIcon = $icon[$status];
                                $line = 'tw-bg-gray-200';
                                $bg = 'bg-primary';
                                $stepStatus = 'status-badge status-badge-waiting';
                                $statusText = 'Menunggu';
                            }
                        @endphp
                        <li class="tw-relative tw-mb-6 sm:tw-mb-0">
                            <div class="tw-flex tw-items-center tw-h-full">
                                <div class="tw-z-10 tw-flex tw-items-center tw-justify-center sm:tw-mx-0 tw-mx-auto tw-w-10 tw-h-10 {{$bg}} tw-rounded-full tw-ring-0 tw-ring-white sm:tw-ring-8 tw-shrink-0">
                                    <i class="{{ $namaIcon }} tw-text-white tw-text-xl"></i>
                                </div>
                                @if (!$loop->last)
                                <div class="tw-hidden sm:tw-flex tw-w-full {{ $line }} tw-h-1"></div>
                                @endif
                            </div>
                            <div class="tw-mt-3 sm:tw-pe-8 tw-mb-4">
                                <button type="button" class="tw-text-sm tw-font-semibold tw-text-gray-900 md:tw-mx-0 tw-w-full" data-bs-toggle="modal" data-bs-target="#modal_{{ $status }}{{ $item->id }}">
                                    {{ $title[$status] }}
                                </button>
                                <div class="tw-mt-1">
                                    @if($isCurrent)
                                        <span class="{{$stepStatus}}">{{ $statusText }}</span>
                                    @else
                                        <time class="tw-block tw-text-sm tw-font-normal tw-leading-none tw-text-gray-400 md:tw-text-start tw-text-center">
                                            {{ $isCompleted ? $tanggal : $statusText }}
                                        </time>
                                    @endif
                                </div>
                            </div>
                        </li>
                       
                        @if ($status == 'dalam_proses')
                        <!-- Modal untuk within_process tetap sama -->
                        <div class="modal fade" id="modal_{{ $status }}{{ $item->id }}" tabindex="-1" aria-hidden="true">
                            <!-- Konten modal tetap sama -->
                        </div>
                        @else
                        <!-- Modal untuk status lainnya tetap sama -->
                        <div class="modal fade" id="modal_{{ $status }}{{ $item->id }}" tabindex="-1" aria-hidden="true">
                            <!-- Konten modal tetap sama -->
                        </div>
                        @endif
                        @endforeach
                    </ol>
                </div>
                @endif
            </div>
            @endforeach
            
            @if(count($seleksi) == 0)
            <div class="card">
                <div class="card-body text-center py-5">
                    <i class="fas fa-clipboard-list fa-4x text-muted mb-3"></i>
                    <h4 class="text-muted">Belum Ada Lamaran</h4>
                    <p class="mb-4">Anda belum pernah melamar pekerjaan atau belum ada lamaran yang diproses.</p>
                    <a href="{{ route('front.jobs.index') }}" class="btn btn-primary">Cari Lowongan Pekerjaan</a>
                </div>
            </div>
            @endif
        </div>
    </div>
@endsection

@push('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
@endpush