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
<div class="row">
    @include('front.member.layouts.profile-info')
    <div class="col-md-9">
    <div class="card">
        <div class="card-body">
        <p class="text-dark">Untuk melihat detail keterangan proses, click tahapan prosesnya!!</p>
        </div>
    </div>

        <div class="card">
            @if ($appliedJob->status == "Batal")
            <!-- Tampilan untuk status Batal -->
            <div class="card-body">
                <div class="card-title d-flex justify-content-between align-items-center">
                    <h5 class="fw-semibold">{{ $appliedJob->job->nama_perusahaan . ' - ' .  $appliedJob->job->nama_job}}</h5>
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
                            <p class="mb-0">Tanggal Pembatalan: {{$appliedJob->tanggal_batal}}</p>
                            <p class="mb-0">Alasan: {{$appliedJob->keterangan_batal ?: 'Tidak ada keterangan'}}</p>
                            <button type="button" class="btn btn-sm btn-outline-danger mt-3" data-bs-toggle="modal" data-bs-target="#modalBatal{{$appliedJob->id}}">
                                Lihat Detail
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Modal untuk status batal -->
            <div class="modal fade" id="modalBatal{{$appliedJob->id}}" tabindex="-1" aria-hidden="true">
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
                                <p class="mb-1"><strong>Perusahaan:</strong> {{$appliedJob->job->nama_perusahaan}}</p>
                                <p class="mb-1"><strong>Posisi:</strong> {{$appliedJob->job->nama_job}}</p>
                                <p class="mb-1"><strong>Lokasi:</strong> {{$appliedJob->job->lokasi}}</p>
                            </div>
                            
                            <div class="mb-4">
                                <h5 class="text-primary fw-semibold">Informasi Pembatalan</h5>
                                <p class="mb-1"><strong>Tanggal Pembatalan:</strong> {{$appliedJob->tanggal_batal}}</p>
                                <p class="mb-1"><strong>Alasan Pembatalan:</strong></p>
                                <div class="p-3 bg-light rounded">
                                    {{$appliedJob->keterangan_batal ?: 'Tidak ada keterangan'}}
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
            @elseif ($appliedJob->status == "Selesai Kontrak")
            <!-- Tampilan untuk status Selesai Kontrak -->
            <div class="card-body">
                <div class="card-title d-flex justify-content-between align-items-center">
                    <h5 class="fw-semibold">{{ $appliedJob->job->nama_perusahaan . ' - ' .  $appliedJob->job->nama_job}}</h5>
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
                            <p class="mb-0">Tanggal Selesai Kontrak: {{$appliedJob->tanggal_selesai_kontrak}}</p>
                            <p class="mb-0">Keterangan: {{$appliedJob->keterangan_seleksi_terbang ?: 'Tidak ada keterangan'}}</p>
                            <button type="button" class="btn btn-sm btn-outline-success mt-3" data-bs-toggle="modal" data-bs-target="#modalSelesai{{$appliedJob->id}}">
                                Lihat Detail
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Modal untuk status Selesai Kontrak -->
            <div class="modal fade" id="modalSelesai{{$appliedJob->id}}" tabindex="-1" aria-hidden="true">
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
                                <p class="mb-1"><strong>Perusahaan:</strong> {{$appliedJob->job->nama_perusahaan}}</p>
                                <p class="mb-1"><strong>Posisi:</strong> {{$appliedJob->job->nama_job}}</p>
                                <p class="mb-1"><strong>Lokasi:</strong> {{$appliedJob->job->lokasi}}</p>
                                <p class="mb-1"><strong>Negara:</strong> {{$appliedJob->job->nama_negara}}</p>
                            </div>
                            
                            <div class="mb-4">
                                <h5 class="text-primary fw-semibold">Informasi Penyelesaian</h5>
                                <p class="mb-1"><strong>Tanggal Berangkat:</strong> {{$appliedJob->tanggal_berangkat}}</p>
                                <p class="mb-1"><strong>Tanggal Selesai Kontrak:</strong> {{$appliedJob->tanggal_selesai_kontrak}}</p>
                                <p class="mb-1"><strong>Keterangan:</strong></p>
                                <div class="p-3 bg-light rounded">
                                    {{$appliedJob->keterangan_seleksi_terbang ?: 'Tidak ada keterangan'}}
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
                    <h5 class="fw-semibold float-start">{{ $appliedJob->job->nama_perusahaan . ' - ' .  $appliedJob->job->nama_job}}</h5>
                </div>
                <hr class="mb-4 mt-5 w-100">
                <h5 class="fw-7 text-primary">Status: {{$appliedJob->status}}</h5>
                @php
                $statuses = [
                'cek_kualifikasi' => $appliedJob->tanggal_cek_kualifikasi ?? '-',
                'lolos_kualifikasi' => $appliedJob->tanggal_lolos_kualifikasi ?? '-',
                'interview' => $appliedJob->tanggal_dari_interview ?? '-',
                'lolos_interview' => $appliedJob->tanggal_dari_lolos_interview ?? '-',
                'dalam_proses' => $appliedJob->tanggal_dalam_proses ?? '-',
                'terbang' => $appliedJob->tanggal_terbang ?? '-',
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
                'cek_kualifikasi' => '-',
                'lolos_kualifikasi' => $appliedJob->keterangan_dari_lolos_kualifikasi,
                'interview' => $appliedJob->keterangan_dari_interview,
                'lolos_interview' => $appliedJob->keterangan_dari_lolos_interview,
                'dalam_proses' => $appliedJob->keterangan_dalam_proses,
                'terbang' => $appliedJob->keterangan_seleksi_terbang,
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
                            <button type="button" class="tw-text-sm tw-font-semibold tw-text-gray-900 md:tw-mx-0 tw-w-full" data-bs-toggle="modal" data-bs-target="#modal_{{ $status }}{{ $appliedJob->id }}">
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
                    <div class="modal fade" id="modal_{{ $status }}{{ $appliedJob->id }}" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modal-{{ $status }}-{{ $appliedJob->id }}Label" class="text-primary tw-text-3xl">{{ $title[$status] }} Details</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group tw-mb-4">
                                        <div class="col-sm-12">
                                            <div class="border-checkbox-section">
                                                <div class="border-checkbox-group border-checkbox-group-success tw-mb-4">
                                                    <input class="border-checkbox" type="checkbox" id="mik" name="mik" value="{{ $appliedJob->mik }}" {{ $appliedJob->mik == 1 ? 'checked' : '' }} readonly disabled>
                                                    <label class="border-checkbox-label" for="mik">Menunggu Izin Kerja</label>
                                                </div>
                                                <div class="border-checkbox-group border-checkbox-group-success tw-mb-4">
                                                    <input class="border-checkbox" type="checkbox" id="iktt" name="iktt" value="{{ $appliedJob->iktt }}" {{ $appliedJob->iktt == 1 ? 'checked' : '' }} readonly disabled>
                                                    <label class="border-checkbox-label" for="iktt">Izin Kerja Telah Terbit</label>
                                                </div>
                                                <div class="border-checkbox-group border-checkbox-group-success tw-mb-4">
                                                    <input class="border-checkbox" type="checkbox" id="mjk" name="mjk" value="{{ $appliedJob->mjk }}" {{ $appliedJob->mjk == 1 ? 'checked' : '' }} readonly disabled>
                                                    <label class="border-checkbox-label" for="mjk">Menunggu Jadwal Kedutaan</label>
                                                </div>
                                                <div class="border-checkbox-group border-checkbox-group-success tw-mb-4">
                                                    <input class="border-checkbox" type="checkbox" id="jak" name="jak" value="{{ $appliedJob->jak }}" {{ $appliedJob->jak == 1 ? 'checked' : '' }} readonly disabled>
                                                    <label class="border-checkbox-label" for="jak">Jadwal Appointment Kedutaan</label>
                                                </div>
                                                <div class="tw-mb-4">
                                                    <label class="border-checkbox-label" for="tanggal_ak">Tanggal AK</label>
                                                    <input class="form-control tw-border tw-rounded tw-p-2 tw-w-full" type="date" id="tanggal_ak" name="tanggal_ak" value="{{ $appliedJob->tanggal_ak }}" readonly>
                                                </div>
                                                <div class="border-checkbox-group border-checkbox-group-success tw-mb-4">
                                                    <input class="border-checkbox" type="checkbox" id="vt" name="vt" value="{{ $appliedJob->vt }}" {{ $appliedJob->vt == 1 ? 'checked' : '' }} readonly disabled>
                                                    <label class="border-checkbox-label" for="vt">Visa Terbit</label>
                                                </div>
                                                <div class="border-checkbox-group border-checkbox-group-success tw-mb-4">
                                                    <input class="border-checkbox" type="checkbox" id="vd" name="vd" value="{{ $appliedJob->vd }}" {{ $appliedJob->vd == 1 ? 'checked' : '' }} readonly disabled>
                                                    <label class="border-checkbox-label" for="vd">Visa Ditolak</label>
                                                </div>
                                                <div class="tw-mb-4">
                                                    <label class="border-checkbox-label" for="tanggal_validity">Tanggal Validity</label>
                                                    <input class="form-control tw-border tw-rounded tw-p-2 tw-w-full" type="date" id="tanggal_validity" name="tanggal_validity" value="{{ $appliedJob->tanggal_validity }}" readonly>
                                                </div>
                                                <div class="tw-mb-4">
                                                    <label class="border-checkbox-label" for="tanggal_terbit">Tanggal Terbit</label>
                                                    <input class="form-control tw-border tw-rounded tw-p-2 tw-w-full" type="date" id="tanggal_terbit" name="tanggal_terbit" value="{{ $appliedJob->tanggal_terbit }}" readonly>
                                                </div>
                                                <div class="tw-mb-4">
                                                    <label class="border-checkbox-label" for="tanggal_habis">Tanggal Habis</label>
                                                    <input class="form-control tw-border tw-rounded tw-p-2 tw-w-full" type="date" id="tanggal_habis" name="tanggal_habis" value="{{ $appliedJob->tanggal_habis }}" readonly>
                                                </div>
                                                <div class="border-checkbox-group border-checkbox-group-success tw-mb-4">
                                                    <input class="border-checkbox" type="checkbox" id="pap" name="pap" value="{{ $appliedJob->pap }}" {{ $appliedJob->pap == 1 ? 'checked' : '' }} readonly disabled>
                                                    <label class="border-checkbox-label" for="pap">P.A.P</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row tw-mb-4">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="tanggal_berangkat">Tanggal Keberangkatan:</label>
                                                <input type="date" class="form-control tw-border tw-rounded tw-p-2 tw-w-full" id="tanggal_berangkat" name="tanggal_berangkat" value="{{ $appliedJob->tanggal_berangkat }}" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="jam_terbang">Jam Terbang:</label>
                                                <select name="jam_terbang" id="jam_terbang" class="form-control tw-border tw-rounded tw-p-2 tw-w-full" readonly disabled>
                                                    @for ($i = 0; $i < 24; $i++)
                                                        @php
                                                        $i=$i < 10 ? '0' . $i : $i;
                                                        @endphp
                                                        <option value="{{ $i }}" {{ $appliedJob->jam_terbang == $i ? 'selected' : '' }}>{{ $i }}</option>
                                                        @endfor
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group tw-mb-4">
                                        <label for="keterangan_dalam_proses">Keterangan Dari Dalam Proses:</label>
                                        <textarea name="keterangan_dalam_proses" id="keterangan_dalam_proses" cols="30" rows="3" class="form-control tw-border tw-rounded tw-p-2 tw-w-full" readonly>{{ $appliedJob->keterangan_dalam_proses }}</textarea>
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary text-primary" data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    @else
                    <div class="modal fade" id="modal_{{ $status }}{{ $appliedJob->id }}" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modal-{{ $status }}-{{ $appliedJob->id }}Label" class="text-primary tw-text-3xl">{{ $title[$status] }} Details</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <h3 class="text-primary tw-font-semibold tw-text-xl">
                                        {{$appliedJob->job->nama_perusahaan . ' - ' .  $appliedJob->job->nama_job}}
                                    </h3>
                                    <h5 class="tw-text-gray-700 tw-text-base">
                                        @if ($tanggal != '-')
                                        {{$title[$status]}} selesai pada tanggal {{$tanggal}}
                                        @else
                                            @if($status === $currentStep)
                                            <span class="status-badge status-badge-active">Tahap saat ini sedang diproses</span>
                                            @else
                                            Belum mencapai tahapan ini
                                            @endif
                                        @endif
                                    </h5>
                                    <p class="mt-3">
                                        <!-- keterangan -->
                                        @if ($keterangan[$status])
                                        {{$keterangan[$status]}}
                                        @else
                                        Belum ada keterangan
                                        @endif
                                    </p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary text-primary" data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                    @endforeach
                </ol>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection

@push('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
@endpush