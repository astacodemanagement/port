@extends('front.member.layouts.app')

@section('title', 'Edit Pengalaman kerja')

@section('content')
    <div class="row">
        @include('front.member.layouts.profile-info')
        <div class="col-md-9">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title fw-semibold">Edit Pengalaman kerja</h5>
                    <hr class="mb-4 mt-4 w-100">
                    @php
                        $i = 0;
                    @endphp
                    @foreach (auth()->user()->kandidat->pengalamanKerja as $pengalamanKerja)
                        <div class="col-experience">
                            <h5 class="fw-7 text-primary">{{ $pengalamanKerja->nama_perusahaan . ' - ' . $pengalamanKerja->posisi }}</h5>
                            <div class="pt-3 float-end">
                                <button class="btn btn-danger btn-sm btn-delete-experience mt-n5 d-none d-lg-block"><i class="ti ti-x"></i> Hapus</button>
                            </div>
                            <div class="row mt-lg-4 mt-4">
                                <div class="col-lg-4 mb-3 mb-lg-0">
                                    <h6 class="fw-7">Negara Tempat Bekerja</h6>
                                    <input type="text" name="negara_tempat_kerja[]" class="form-control" value="{{ $pengalamanKerja->negara_tempat_kerja }}">
                                </div>
                                <div class="col-lg-4 mb-3 mb-lg-0">
                                    <h6 class="fw-7">Nama Perusahaan</h6>
                                    <input type="text" name="nama_perusahaan[]" class="form-control" value="{{ $pengalamanKerja->nama_perusahaan }}">
                                </div>
                                <div class="col-lg-4">
                                    <h6 class="fw-7">Posisi</h6>
                                    <input type="text" name="posisi[]" class="form-control" value="{{ $pengalamanKerja->posisi }}">
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-lg-4 mb-3 mb-lg-0">
                                    <h6 class="fw-7">Tanggal Mulai Bekerja</h6>
                                    <input type="date" name="tanggal_mulai_kerja[]" class="form-control" value="{{ $pengalamanKerja->tanggal_mulai_kerja }}" />
                                </div>
                                <div class="col-lg-4">
                                    <h6 class="fw-7">Tanggal Selesai Bekerja</h6>
                                    <input type="date" name="tanggal_selesai_kerja[]" class="form-control" value="{{ $pengalamanKerja->tanggal_selesai_kerja }}" />
                                </div>
                            </div>
                            <button class="btn btn-danger w-100 d-block d-lg-none mt-3"><i class="ti ti-x"></i> Hapus</button>
                        </div>

                        @if ($i > 0)
                            <hr class="my-3 my-lg-5">
                        @endif
                        @php
                            $i++;
                        @endphp
                    @endforeach
                    

                    <div class="mt-5 text-end">
                        <a href="{{ route('member.index') }}" class="btn btn-outline-danger">Cancel</a>
                        <button class="btn btn-primary btn-save">Save</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection