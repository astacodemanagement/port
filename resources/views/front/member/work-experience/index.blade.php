@extends('front.member.layouts.app')

@section('title', 'Pengalaman kerja')

@section('content')
    <div class="row">
        @include('front.member.layouts.profile-info')
        <div class="col-md-9">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                        <h5 class="fw-semibold float-start">Pengalaman kerja</h5>
                        <a href="{{ route('member.work-experience.edit') }}" class="float-end btn btn-light-primary text-primary mt-n2"><i class="ti ti-pencil-minus"></i></a>
                    </div>
                    <hr class="mb-4 mt-5 w-100">
                    @php
                        $i = 0;
                    @endphp
                    @foreach (auth()->user()->kandidat->pengalamanKerja as $pengalamanKerja)
                        <h5 class="fw-7 text-primary">{{ $pengalamanKerja->nama_perusahaan . ' - ' . $pengalamanKerja->posisi }}</h5>
                        <div class="row mt-lg-4 mt-3">
                            <div class="col-lg-4 mb-3 mb-lg-0">
                                <h6 class="fw-7">Negara Tempat Bekerja</h6>
                                <span>{{ $pengalamanKerja->negara_tempat_kerja ?? '-' }}</span>
                            </div>
                            <div class="col-lg-4 mb-3 mb-lg-0">
                                <h6 class="fw-7">Nama Perusahaan</h6>
                                <span>{{ $pengalamanKerja->nama_perusahaan ?? '-' }}</span>
                            </div>
                            <div class="col-lg-4">
                                <h6 class="fw-7">Posisi</h6>
                                <span>{{ $pengalamanKerja->posisi ?? '-' }}</span>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-lg-4 mb-3 mb-lg-0">
                                <h6 class="fw-7">Tanggal Mulai Bekerja</h6>
                                <span>{{ $pengalamanKerja->tanggal_mulai_kerja ? \Carbon\Carbon::parse($pengalamanKerja->tanggal_mulai_kerja)->format('d F Y') : '-' }}</span>
                            </div>
                            <div class="col-lg-4">
                                <h6 class="fw-7">Tanggal Selesai Bekerja</h6>
                                <span>{{ $pengalamanKerja->tanggal_selesai_kerja ? Carbon\Carbon::parse($pengalamanKerja->tanggal_selesai_kerja)->format('d F Y') : '-' }}</span>
                            </div>
                        </div>

                        @if ($i > 0)
                            <hr class="my-3 my-lg-5">
                        @endif
                        @php
                            $i++;
                        @endphp
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection