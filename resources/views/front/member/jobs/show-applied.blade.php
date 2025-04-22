@extends('front.member.layouts.app')

@section('title', 'Status Proses Lamaran Kerja')
@push('css')
<link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
@endpush
@section('content')
<div class="row">
    @include('front.member.layouts.profile-info')
    <div class="col-md-9">
    <div class="card">
        <div class="card-body">
        <p class=" text-dark">Untuk melihat detail keterangan  proses, click tahapan prosesnya!!</p>
            
        </div>
    </div>


        <div class="card">
           
            @if ($appliedJob->stasus == "Batal")
            <div class="card-body">
                <div class="card-title">
                    <h5 class="fw-semibold float-start">{{ $appliedJob->job->nama_perusahaan . ' - ' .  $appliedJob->job->nama_job}}</h5>
                    <!-- <a href="{{ route('member.work-experience.edit') }}" class="float-end btn btn-light-primary text-primary mt-n2"><i class="ti ti-pencil-minus"></i></a> -->
                </div>
                <h2>
                    <span class="badge bg-danger">Lamaran Dibatalkan</span>
                </h2>
            </div>
           
            @else
            <div class="card-body">
                <div class="card-title">
                    <h5 class="fw-semibold float-start">{{ $appliedJob->job->nama_perusahaan . ' - ' .  $appliedJob->job->nama_job}}</h5>
                    <!-- <a href="{{ route('member.work-experience.edit') }}" class="float-end btn btn-light-primary text-primary mt-n2"><i class="ti ti-pencil-minus"></i></a> -->
                </div>
                <hr class="mb-4 mt-5 w-100">
                <h5 class="fw-7 text-primary">Selesai Pada tanggal {{$appliedJob->tanggal_selesai_kontrak}}</h5>
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
                'interview' => $appliedJob->keterangan_interview,
                'lolos_interview' => $appliedJob->keterangan_dari_lolos_interview,
                'dalam_proses' => $appliedJob->keterangan_dalam_proses,
                'terbang' => $appliedJob->keterangan_seleksi_terbang,

                ];
                $lastCompletedStep = null;
                foreach ($statuses as $status => $tanggal) {
                if ($tanggal != '-') {
                $lastCompletedStep = $status;
                }
                }
                @endphp

                <ol class="tw-items-center sm:tw-flex tw-mt-10">
                    @foreach ($statuses as $status => $tanggal)
                    @php
                    $isCompleted = $lastCompletedStep && array_search($status, array_keys($statuses)) <= array_search($lastCompletedStep, array_keys($statuses));

                        $namaIcon=$isCompleted ? 'fas fa-check' : $icon[$status];
                        $line=$isCompleted ? 'bg-success' : 'tw-bg-gray-200' ;
                        $bg=$isCompleted ? 'bg-success' : 'bg-primary' ;
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
                            <button type="button" class="tw-text-sm tw-font-semibold tw-text-gray-900 md:tw-mx-0 tw-w-full" data-bs-toggle="modal" data-bs-target="#modal_{{ $status }}{{ $appliedJob->id }}">{{ $title[$status] }}</button>
                            <time class="tw-block tw-text-sm tw-font-normal tw-leading-none tw-text-gray-400 md:tw-text-start tw-text-center ">{{ $tanggal }}</time>
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
                                            Belum mencapai tahapan ini
                                            @endif
                                        </h5>
                                        <p>
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
<!-- Button trigger modal -->

@endsection