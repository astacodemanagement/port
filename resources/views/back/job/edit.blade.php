@extends('back.layouts.app')
@section('title', 'Halaman Job')
@section('subtitle', 'Menu Job')
@push('css')
    {{-- <link rel="stylesheet" href="{{ asset('template') }}/files/bower_components/select2/css/select2.min.css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('template') }}/files/bower_components/bootstrap-multiselect/css/bootstrap-multiselect.css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('template') }}/files/bower_components/multiselect/css/multi-select.css" /> --}}


    <link rel="stylesheet" type="text/css"
        href="{{ asset('template') }}/files/assets/icon/font-awesome/css/font-awesome.min.css">

    <link rel="stylesheet" type="text/css"
        href="{{ asset('template') }}/files/bower_components/switchery/css/switchery.min.css">

    <link rel="stylesheet" type="text/css"
        href="{{ asset('template') }}/files/bower_components/bootstrap-tagsinput/css/bootstrap-tagsinput.css" />
@endpush

@section('content')


    <div class="pcoded-content">

        <div class="page-header card">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <i class="feather icon-list bg-c-blue"></i>
                        <div class="d-inline">
                            <h5>Job</h5>
                            <span>lorem ipsum dolor sit amet, consectetur adipisicing elit</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="page-header-breadcrumb">
                        <ul class=" breadcrumb breadcrumb-title">
                            <li class="breadcrumb-item">
                                <a href="{{ route('back-office.home') }}"><i class="feather icon-home"></i></a>
                            </li>
                            <li class="breadcrumb-item"><a href="#!">Halaman Job</a>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="pcoded-inner-content">

            <div class="main-body">
                <div class="page-wrapper">

                    <div class="page-body">
                        <div class="row">
                            <div class="col-sm-12">


                                <div class="card">
                                    <div class="card-header">
                                        <h5>Data Job</h5>

                                    </div>
                                    <div class="card-block">
                                        <div class="card">
                                            <div class="card-block tab-icon">
                                                <div class="row">
                                                    <div class="col-lg-12 col-xl-12">
                                                        <ul class="nav nav-tabs md-tabs " role="tablist">
                                                            <li class="nav-item">
                                                                <a class="nav-link active" data-toggle="tab" href="#home7"
                                                                    role="tab"><i class="fas fa-home"></i>Informasi
                                                                    Umum</a>
                                                                <div class="slide"></div>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link" data-toggle="tab" href="#profile7"
                                                                    role="tab"><i class="fas fa-bookmark"></i>Ketentuan
                                                                    Pekerjaan</a>
                                                                <div class="slide"></div>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link" data-toggle="tab" href="#messages7"
                                                                    role="tab"><i class="fas fa-users"></i>Kualifikasi
                                                                    Kandidat</a>
                                                                <div class="slide"></div>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link" data-toggle="tab" href="#settings7"
                                                                    role="tab"><i class="fas fa-server"></i>Lainnya</a>
                                                                <div class="slide"></div>
                                                            </li>
                                                        </ul>
                                                        <form id="form_job" action="{{ route('back-office.job.simpan_job') }}"
                                                            method="POST" enctype="multipart/form-data">
                                                            @csrf <!-- Tambahkan token CSRF -->
                                                            <div class="tab-content card-block">

                                                                <div class="tab-pane active" id="home7" role="tabpanel">



                                                                    <div class="modal-content">

                                                                        <div class="modal-body">
                                                                            <div class="card-block">
                                                                                <div class="form-group row">
                                                                                    <div class="col-sm-6">
                                                                                        <label class="col-form-label"
                                                                                            for="nama_job">Nama Job</label>
                                                                                        <input type="text"
                                                                                            class="form-control form-control-success"
                                                                                            id="nama_job" name="nama_job"
                                                                                            value="{{ $data->nama_job }}">

                                                                                    </div>
                                                                                    <div class="col-sm-6">
                                                                                        <label class="col-form-label"
                                                                                            for="tanggal_tutup">Tanggal
                                                                                            Lowongan
                                                                                            Ditutup</label>
                                                                                        <input type="date"
                                                                                            class="form-control form-control-success"
                                                                                            id="tanggal_tutup"
                                                                                            name="tanggal_tutup"
                                                                                            value="{{ $data->tanggal_tutup }}">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group row">
                                                                                    <div class="col-sm-6">
                                                                                        <label class="col-form-label"
                                                                                            for="nama_perusahaan">Nama
                                                                                            Perusahaan</label>
                                                                                        <input type="text"
                                                                                            class="form-control form-control-success"
                                                                                            id="nama_perusahaan"
                                                                                            name="nama_perusahaan"
                                                                                            value="{{ $data->nama_perusahaan }}">
                                                                                    </div>
                                                                                    <div class="col-sm-6">
                                                                                        <label class="col-form-label"
                                                                                            for="mitra">Mitra</label>
                                                                                        <input type="text"
                                                                                            class="form-control form-control-success"
                                                                                            id="mitra" name="mitra"
                                                                                            value="{{ $data->mitra }}">
                                                                                    </div>

                                                                                </div>

                                                                                <div class="form-group row">
                                                                                    <div class="col-sm-6">
                                                                                        <label class="col-form-label"
                                                                                            for="gaji">Gaji</label>
                                                                                        <input type="text"
                                                                                            class="form-control form-control-success"
                                                                                            id="gaji" name="gaji"
                                                                                            value="{{ $data->gaji }}">
                                                                                    </div>
                                                                                    <div class="col-sm-6">
                                                                                        <label class="col-form-label"
                                                                                            for="jenis_pembayaran">Jenis
                                                                                            Pembayaran</label>
                                                                                        <select
                                                                                            class="form-control form-control-success"
                                                                                            id="jenis_pembayaran"
                                                                                            name="jenis_pembayaran"
                                                                                            required>
                                                                                            <option value="">--Pilih
                                                                                                jenis pembayaran--</option>

                                                                                            <!-- Menandai opsi yang sudah dipilih -->
                                                                                            <option value="Bulan"
                                                                                                {{ $data->jenis_pembayaran == 'Bulan' ? 'selected' : '' }}>
                                                                                                Bulan</option>
                                                                                            <option value="Jam"
                                                                                                {{ $data->jenis_pembayaran == 'Jam' ? 'selected' : '' }}>
                                                                                                Jam</option>
                                                                                        </select>
                                                                                    </div>

                                                                                </div>

                                                                                <div class="form-group row">
                                                                                    <div class="col-sm-6">
                                                                                        <label class="col-form-label"
                                                                                            for="estimasi_minimal">Estimasi
                                                                                            IDR
                                                                                            Min</label>
                                                                                        <input type="text"
                                                                                            class="form-control form-control-success"
                                                                                            id="estimasi_minimal"
                                                                                            name="estimasi_minimal"
                                                                                            value="{{ $data->estimasi_minimal }}">
                                                                                    </div>
                                                                                    <div class="col-sm-6">
                                                                                        <label class="col-form-label"
                                                                                            for="estimasi_maksimal">Estimasi
                                                                                            IDR
                                                                                            Mak</label>
                                                                                        <input type="text"
                                                                                            class="form-control form-control-success"
                                                                                            id="estimasi_maksimal"
                                                                                            name="estimasi_maksimal"
                                                                                            value="{{ $data->estimasi_maksimal }}">
                                                                                    </div>
                                                                                </div>

                                                                                <div class="form-group row">
                                                                                    <div class="col-sm-12">
                                                                                        <label class="col-form-label"
                                                                                            for="gaji_diterima">Gaji Yang
                                                                                            Diterima</label>
                                                                                        <select
                                                                                            class="form-control form-control-success"
                                                                                            id="gaji_diterima"
                                                                                            name="gaji_diterima" required>
                                                                                            <option value="">--Pilih
                                                                                                gaji yang diterima--
                                                                                            </option>

                                                                                            <!-- Cek apakah nilai yang sedang diedit adalah 'Bersih' -->
                                                                                            <option value="Bersih"
                                                                                                {{ $data->gaji_diterima == 'Bersih' ? 'selected' : '' }}>
                                                                                                Bersih</option>

                                                                                            <!-- Cek apakah nilai yang sedang diedit adalah 'Kotor' -->
                                                                                            <option value="Kotor"
                                                                                                {{ $data->gaji_diterima == 'Kotor' ? 'selected' : '' }}>
                                                                                                Kotor</option>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>


                                                                                <div class="form-group row">
                                                                                    <div class="col-sm-6">
                                                                                        <label class="col-form-label"
                                                                                            for="tanggal_kurs">Tanggal
                                                                                            Kurs</label>
                                                                                        <input type="date"
                                                                                            class="form-control form-control-success"
                                                                                            id="tanggal_kurs"
                                                                                            name="tanggal_kurs"
                                                                                            value="{{ $data->tanggal_kurs }}">
                                                                                    </div>
                                                                                    <div class="col-sm-6">
                                                                                        <label class="col-form-label"
                                                                                            for="nominal_kurs">Nominal
                                                                                            Kurs</label>
                                                                                        <input type="text"
                                                                                            class="form-control form-control-success"
                                                                                            id="nominal_kurs"
                                                                                            name="nominal_kurs"
                                                                                            value="{{ $data->nominal_kurs }}">
                                                                                    </div>
                                                                                </div>

                                                                                <div class="form-group row">
                                                                                    <div class="col-sm-6">
                                                                                        <label class="col-form-label"
                                                                                            for="negara_id">Negara</label>

                                                                                        <select id="negara_id"
                                                                                            name="negara_id"
                                                                                            class="form-control">
                                                                                            <option value=""
                                                                                                data-nama-negara="">Pilih
                                                                                                Negara</option>

                                                                                            <!-- Loop untuk negara, dengan opsi yang dipilih -->
                                                                                            @foreach ($negara as $n)
                                                                                                <option
                                                                                                    value="{{ $n->id }}"
                                                                                                    {{ $data->negara_id == $n->id ? 'selected' : '' }}
                                                                                                    data-nama-negara="{{ $n->nama_negara }}">
                                                                                                    {{ $n->nama_negara }}
                                                                                                </option>
                                                                                            @endforeach
                                                                                        </select>

                                                                                        <!-- Hidden field untuk nama negara -->
                                                                                        <input type="hidden"
                                                                                            id="nama_negara"
                                                                                            name="nama_negara"
                                                                                            value="{{ $data->nama_negara }}">
                                                                                    </div>

                                                                                    <div class="col-sm-6">
                                                                                        <label class="col-form-label"
                                                                                            for="kategori_job_id">Industri
                                                                                            Pekerjaan</label>

                                                                                        <select id="kategori_job_id"
                                                                                            name="kategori_job_id"
                                                                                            class="form-control">
                                                                                            <option value="">Pilih
                                                                                                Industri Minat Pekerjaan</option>

                                                                                            <!-- Loop untuk kategori job -->
                                                                                            @foreach ($kategori_job as $k)
                                                                                                <option
                                                                                                    value="{{ $k->id }}"
                                                                                                    {{ $data->kategori_job_id == $k->id ? 'selected' : '' }}>
                                                                                                    {{ $k->nama_kategori_job }}
                                                                                                </option>
                                                                                            @endforeach
                                                                                        </select>
                                                                                    </div>
                                                                                </div>




                                                                            </div>
                                                                        </div>


                                                                    </div>




                                                                </div>
                                                                <div class="tab-pane" id="profile7" role="tabpanel">

                                                                    <div class="modal-content">

                                                                        <div class="modal-body">
                                                                            <div class="card-block">
                                                                                <div class="form-group row">
                                                                                    <div class="col-sm-6">
                                                                                        <label class="col-form-label"
                                                                                            for="kontrak_kerja">Kontrak
                                                                                            Kerja</label>
                                                                                        <input type="text"
                                                                                            class="form-control form-control-success"
                                                                                            id="kontrak_kerja"
                                                                                            name="kontrak_kerja">
                                                                                    </div>
                                                                                    <div class="col-sm-6">
                                                                                        <label class="col-form-label"
                                                                                            for="jam_kerja">Jam
                                                                                            Kerja</label>
                                                                                        <input type="text"
                                                                                            class="form-control form-control-success"
                                                                                            id="jam_kerja"
                                                                                            name="jam_kerja">
                                                                                    </div>
                                                                                </div>

                                                                                <div class="form-group row">
                                                                                    <div class="col-sm-6">
                                                                                        <label class="col-form-label"
                                                                                            for="hari_kerja">Hari
                                                                                            Kerja</label>
                                                                                        <select
                                                                                            class="form-control form-control-success"
                                                                                            id="hari_kerja"
                                                                                            name="hari_kerja" required>
                                                                                            <option value="">--Pilih
                                                                                                hari
                                                                                                kerja--</option>
                                                                                            <option value="5">5 Hari
                                                                                                Per
                                                                                                Minggu</option>
                                                                                            <option value="6">6 Hari
                                                                                                Per
                                                                                                Minggu</option>
                                                                                        </select>

                                                                                    </div>
                                                                                    <div class="col-sm-6">
                                                                                        <label class="col-form-label"
                                                                                            for="cuti_kerja">Cuti
                                                                                            Kerja</label>
                                                                                        <input type="text"
                                                                                            class="form-control form-control-success"
                                                                                            id="cuti_kerja"
                                                                                            name="cuti_kerja">
                                                                                    </div>

                                                                                </div>

                                                                                <div class="form-group row">
                                                                                    <div class="col-sm-6">
                                                                                        <label class="col-form-label"
                                                                                            for="masa_percobaan">Masa
                                                                                            Percobaan</label>
                                                                                        <select
                                                                                            class="form-control form-control-success"
                                                                                            id="masa_percobaan"
                                                                                            name="masa_percobaan" required>
                                                                                            <option value="">--Pilih
                                                                                                hari
                                                                                                kerja--</option>
                                                                                            <option value="5">5 Hari
                                                                                                Per
                                                                                                Minggu</option>
                                                                                            <option value="6">6 Hari
                                                                                                Per
                                                                                                Minggu</option>
                                                                                        </select>

                                                                                    </div>
                                                                                    <div class="col-sm-6">
                                                                                        <label class="col-form-label"
                                                                                            for="mata_uang_gaji">Mata Uang
                                                                                            Gaji</label>
                                                                                        <input type="text"
                                                                                            class="form-control form-control-success"
                                                                                            id="mata_uang_gaji"
                                                                                            name="mata_uang_gaji">
                                                                                    </div>
                                                                                </div>


                                                                                <div class="form-group row">
                                                                                    <div class="col-sm-6">
                                                                                        <label class="col-form-label"
                                                                                            for="kerja_lembur">Kerja
                                                                                            Lembur</label>
                                                                                        <input type="date"
                                                                                            class="form-control form-control-success"
                                                                                            id="kerja_lembur"
                                                                                            name="kerja_lembur">
                                                                                    </div>
                                                                                    <div class="col-sm-6">
                                                                                        <label class="col-form-label"
                                                                                            for="bahasa">Bahasa Yang
                                                                                            Digunakan</label>
                                                                                        <input type="text"
                                                                                            class="form-control form-control-success"
                                                                                            id="bahasa" name="bahasa">
                                                                                    </div>
                                                                                </div>

                                                                                <div class="form-group row">
                                                                                    <div class="col-sm-12">
                                                                                        <label class="col-form-label"
                                                                                            for="deskripsi">Deksripsi</label>
                                                                                        <textarea class="form-control form-control-success" name="deskripsi" id="deskripsi" cols="30" rows="4"></textarea>
                                                                                    </div>


                                                                                </div>



                                                                            </div>
                                                                        </div>


                                                                    </div>

                                                                </div>
                                                                <div class="tab-pane" id="messages7" role="tabpanel">

                                                                    <div class="modal-content">

                                                                        <div class="modal-body">
                                                                            <div class="card-block">
                                                                                <div class="form-group row">
                                                                                    <div class="col-sm-4">
                                                                                        <label class="col-form-label"
                                                                                            for="jenis_kelamin">Jenis
                                                                                            Kelamin</label>
                                                                                        <select
                                                                                            class="form-control form-control-success"
                                                                                            id="jenis_kelamin"
                                                                                            name="jenis_kelamin" required>
                                                                                            <option value="">--Pilih
                                                                                                jenis kelamin--</option>
                                                                                            <option value="Laki-laki">
                                                                                                Laki-laki
                                                                                            </option>
                                                                                            <option value="Perempuan">
                                                                                                Perempuan
                                                                                            </option>
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="col-sm-4">
                                                                                        <label class="col-form-label"
                                                                                            for="tinggi_badan">Tinggi
                                                                                            Badan</label>
                                                                                        <input type="text"
                                                                                            class="form-control form-control-success"
                                                                                            id="tinggi_badan"
                                                                                            name="tinggi_badan">
                                                                                    </div>
                                                                                    <div class="col-sm-4">
                                                                                        <label class="col-form-label"
                                                                                            for="berat_badan">Berat
                                                                                            Badan</label>
                                                                                        <input type="text"
                                                                                            class="form-control form-control-success"
                                                                                            id="berat_badan"
                                                                                            name="berat_badan">
                                                                                    </div>
                                                                                </div>

                                                                                <div class="form-group row">
                                                                                    <div class="col-sm-4">
                                                                                        <label class="col-form-label"
                                                                                            for="rentang_usia">Rentang
                                                                                            Usia</label>
                                                                                        <input type="text"
                                                                                            class="form-control form-control-success"
                                                                                            id="rentang_usia"
                                                                                            name="rentang_usia">
                                                                                    </div>
                                                                                    <div class="col-sm-4">
                                                                                        <label class="col-form-label"
                                                                                            for="level_bahasa">Level
                                                                                            Bahasa</label>
                                                                                        <select
                                                                                            class="form-control form-control-success"
                                                                                            id="level_bahasa"
                                                                                            name="level_bahasa" required>
                                                                                            <option value="">--Pilih
                                                                                                jenis kelamin--</option>
                                                                                            <option value="Basic">Basic
                                                                                            </option>
                                                                                            <option value="Intermediate">
                                                                                                Intermediate</option>
                                                                                            <option value="Advanced">
                                                                                                Advanced
                                                                                            </option>
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="col-sm-4">
                                                                                        <label class="col-form-label"
                                                                                            for="pengalaman_kerja">Pengalaman
                                                                                            Kerja</label>
                                                                                        <select
                                                                                            class="form-control form-control-success"
                                                                                            id="pengalaman_kerja"
                                                                                            name="pengalaman_kerja"
                                                                                            required>
                                                                                            <option value="">--Pilih
                                                                                                pengalaman kerja--</option>
                                                                                            <option
                                                                                                value="Tidak diperlukan pengalaman kerja">
                                                                                                Tidak diperlukan pengalaman
                                                                                                kerja
                                                                                            </option>
                                                                                            <option
                                                                                                value="Min. 6 bulan bekerja pada posisi yang sama">
                                                                                                Min. 6 bulan bekerja pada
                                                                                                posisi
                                                                                                yang sama
                                                                                            </option>
                                                                                            <option
                                                                                                value="Min. 1 Tahun bekerja pada posisi yang sama">
                                                                                                Min. 1 Tahun bekerja pada
                                                                                                posisi
                                                                                                yang sama
                                                                                            </option>
                                                                                            <option
                                                                                                value="Min. 2 - 5 Tahun bekerja pada posisi yang sama">
                                                                                                Min. 2 - 5 Tahun bekerja
                                                                                                pada
                                                                                                posisi yang sama
                                                                                            </option>
                                                                                            <option
                                                                                                value="Diperlukan pengalaman kerja atau lulusan pendidikan dengan jurusan yang berkaitan">
                                                                                                Diperlukan pengalaman kerja
                                                                                                atau
                                                                                                lulusan pendidikan dengan
                                                                                                jurusan yang berkaitan
                                                                                            </option>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>





                                                                            </div>
                                                                        </div>


                                                                    </div>

                                                                </div>
                                                                <div class="tab-pane" id="settings7" role="tabpanel">
                                                                    <div class="modal-content">

                                                                        <div class="modal-body">
                                                                            <div class="card-block">

                                                                                <div class="card-block">
                                                                                    <div class="form-group row">
                                                                                        <div class="col-sm-12">
                                                                                            <h4 class="sub-title">Fasilitas
                                                                                                Pekerjaan</h4>
                                                                                            <div
                                                                                                class="border-checkbox-section">

                                                                                                {{-- Looping untuk checkbox fasilitas --}}
                                                                                                @foreach ($fasilitas as $item)
                                                                                                    <div
                                                                                                        class="border-checkbox-group border-checkbox-group-success">
                                                                                                        <input
                                                                                                            class="border-checkbox"
                                                                                                            type="checkbox"
                                                                                                            id="fasilitas-{{ $item->id }}"
                                                                                                            name="fasilitas_id[]"
                                                                                                            value="{{ $item->id }}">
                                                                                                        {{-- Gunakan ID atau nama fasilitas --}}
                                                                                                        <label
                                                                                                            class="border-checkbox-label"
                                                                                                            for="fasilitas-{{ $item->id }}">
                                                                                                            {{ $item->nama_fasilitas }}
                                                                                                            {{-- Nama dari fasilitas --}}
                                                                                                        </label>
                                                                                                    </div>
                                                                                                @endforeach



                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="form-group row">
                                                                                        <div class="col-sm-12">
                                                                                            <label class="col-form-label"
                                                                                                for="paragraf_galeri">Paragraf
                                                                                                Galeri</label>
                                                                                            <textarea class="form-control form-control-success" name="paragraf_galeri" id="paragraf_galeri" cols="30"
                                                                                                rows="4"></textarea>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="form-group row">
                                                                                        <div class="col-sm-12">
                                                                                            <label class="col-form-label"
                                                                                                for="nama_galeri">Upload
                                                                                                Galeri</label>
                                                                                            <input type="file"
                                                                                                class="form-control form-control-success"
                                                                                                id="nama_galeri"
                                                                                                name="nama_galeri[]"
                                                                                                multiple>

                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="form-group row">
                                                                                        <div class="col-sm-12">
                                                                                            <label class="col-form-label"
                                                                                                for="link_video">Link
                                                                                                Video</label>
                                                                                            <input type="text"
                                                                                                class="form-control form-control-success"
                                                                                                id="link_video"
                                                                                                name="link_video">
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="form-group row">
                                                                                        <div class="col-sm-12">
                                                                                            <label class="col-form-label"
                                                                                                for="info_lain">Informasi
                                                                                                Lainnya</label>
                                                                                            <textarea class="form-control form-control-success" name="info_lain" id="info_lain" cols="30" rows="4"></textarea>
                                                                                        </div>
                                                                                    </div>


                                                                                    <div class="form-group row">
                                                                                        <div class="col-sm-12">
                                                                                            <label class="col-form-label"
                                                                                                for="disclaimer">Disclaimer</label>
                                                                                            <textarea class="form-control form-control-success" name="disclaimer" id="disclaimer" cols="30"
                                                                                                rows="4"></textarea>
                                                                                        </div>
                                                                                    </div>





                                                                                </div>
                                                                            </div>


                                                                        </div>

                                                                    </div>
                                                                </div>

                                                                <a href="/job"
                                                                    class="btn btn-warning waves-effect waves-light mt-3"><i
                                                                        class="fas fa-undo"></i>
                                                                    Kembali
                                                                </a>

                                                                <button type="button"
                                                                    class="btn btn-primary waves-effect waves-light mt-3"
                                                                    id="btn-save-job" style="float: right;">
                                                                    <i class="fas fa-save"></i> Simpan
                                                                </button>


                                                            </div>

                                                        </form>


                                                    </div>

                                                </div>
                                            </div>

                                        </div>
                                    </div>




                                </div>
                            </div>
                        </div>

                    </div>
                </div>









            @endsection




            @push('script')
                <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

                <script type="text/javascript" src="{{ asset('template') }}/files/bower_components/switchery/js/switchery.min.js">
                </script>

                <script type="text/javascript"
                    src="{{ asset('template') }}/files/bower_components/bootstrap-tagsinput/js/bootstrap-tagsinput.js"></script>


                {{-- <script>
                    $(document).ready(function() {
                        // Dapatkan data negara dan tambahkan ke dropdown
                        $.ajax({
                            url: '{{ route('getNegara') }}',
                            type: 'GET',
                            success: function(data) {
                                var options = '';
                                data.forEach(function(negara) {
                                    // Tambahkan opsi ke dropdown
                                    var selected = ''; // Variabel untuk menandai opsi terpilih
                                    if ({{ $data->negara_id }} == negara.id) {
                                        selected = 'selected'; // Jika sesuai dengan negara_id
                                    }
                                    options += '<option value="' + negara.id + '" data-nama-negara="' +
                                        negara.nama_negara + '" ' + selected + '>' + negara.nama_negara +
                                        '</option>';
                                });
                                $('#negara_id').append(options);

                                // Set hidden field untuk nama negara jika diperlukan
                                var selectedOption = $('#negara_id').find('option:selected');
                                $('#nama_negara').val(selectedOption.data('nama-negara'));
                            }
                        });

                        // Event saat dropdown negara diubah
                        $('#negara_id').change(function() {
                            var selectedOption = $(this).find('option:selected');
                            var namaNegara = selectedOption.data('nama-negara');
                            $('#nama_negara').val(namaNegara);
                        });

                        // AJAX untuk kategori pekerjaan
                        $.ajax({
                            url: '{{ route('getKategoriJob') }}',
                            type: 'GET',
                            success: function(data) {
                                var options = '';
                                data.forEach(function(kategori_job) {
                                    // Variabel untuk menandai opsi terpilih
                                    var selected = '';
                                    if ({{ $data->kategori_job_id }} == kategori_job.id) {
                                        selected = 'selected'; // Jika sesuai dengan kategori_job_id
                                    }
                                    options += '<option value="' + kategori_job.id + '" ' + selected + '>' +
                                        kategori_job.nama_kategori_job + '</option>';
                                });
                                $('#kategori_job_id').append(options);
                            }
                        });
                    });
                </script>


                --}}





                {{-- TAMBAH --}}
                <script>
                    $(document).ready(function() {
                        $('#btn-save-job').click(function() {
                            var form = $('#form_job');
                            $.ajax({
                                url: form.attr('action'),
                                type: 'POST',
                                data: form.serialize(),
                                success: function(response) {

                                    Swal.fire({
                                        title: 'Sukses!',
                                        text: response.message,
                                        icon: 'success',
                                        confirmButtonText: 'OK'
                                    }).then(function() {
                                        location.reload();
                                    });
                                },
                                error: function(xhr) {
                                    var errorMessages = xhr.responseJSON.errors;
                                    var errorMessage = '';
                                    $.each(errorMessages, function(key, value) {
                                        errorMessage += value + '<br>';
                                    });
                                    Swal.fire({
                                        title: 'Error!',
                                        html: errorMessage,
                                        icon: 'error',
                                        confirmButtonText: 'OK'
                                    });
                                }
                            });
                        });
                    });
                </script>

                {{-- EDIT dan UPDATE --}}
                <script>
                    $(document).ready(function() {
                        // Tampilkan data di modal edit
                        $('.btn-edit').click(function() {
                            var id = $(this).data('id');
                            $.ajax({
                                url: '/job/' + id + '/edit',
                                type: 'GET',
                                success: function(response) {
                                    $('#edit_nama_job').val(response.nama_job);
                                    $('#edit_urutan').val(response.urutan);
                                    // Set action form untuk update
                                    $('#form-edit-kategori-job').attr('action', '/job/' + id);
                                    $('#modal-edit').modal('show');
                                },
                                error: function(xhr) {
                                    // Handle error
                                }
                            });
                        });

                        // AJAX untuk update data
                        $('#btn-update-kategori-job').click(function() {
                            var form = $('#form-edit-kategori-job');
                            $.ajax({
                                url: form.attr('action'),
                                type: 'POST',
                                data: form.serialize() + '&_method=PUT',
                                success: function(response) {
                                    $('#modal-edit').modal('hide');
                                    Swal.fire({
                                        title: 'Sukses!',
                                        text: response.message,
                                        icon: 'success',
                                        confirmButtonText: 'OK'
                                    }).then(function() {
                                        location.reload();
                                    });
                                },
                                error: function(xhr) {
                                    var errorMessages = xhr.responseJSON.errors;
                                    var errorMessage = '';
                                    $.each(errorMessages, function(key, value) {
                                        errorMessage += value + '<br>';
                                    });
                                    Swal.fire({
                                        title: 'Error!',
                                        html: errorMessage,
                                        icon: 'error',
                                        confirmButtonText: 'OK'
                                    });
                                }
                            });
                        });
                    });
                </script>

                {{-- DELET --}}
                <script>
                    $(document).ready(function() {
                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });

                        $('.btn-hapus').click(function() {
                            var id = $(this).data('id');

                            Swal.fire({
                                title: 'Apakah Anda yakin?',
                                text: 'Data akan dihapus permanen!',
                                icon: 'warning',
                                showCancelButton: true,
                                confirmButtonColor: '#3085d6',
                                cancelButtonColor: '#d33',
                                confirmButtonText: 'Ya, hapus!',
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    $.ajax({

                                        url: '/job/' + id,
                                        type: 'DELETE',

                                        success: function(response) {
                                            Swal.fire({
                                                title: 'Sukses!',
                                                text: response.message,
                                                icon: 'success',
                                                confirmButtonText: 'OK',
                                            }).then(function() {
                                                location.reload();
                                            });
                                        },
                                        error: function(xhr) {
                                            // Handle error
                                            Swal.fire({
                                                title: 'Error!',
                                                text: 'Gagal menghapus data.',
                                                icon: 'error',
                                                confirmButtonText: 'OK',
                                            });
                                        },
                                    });
                                }
                            });
                        });
                    });
                </script>
            @endpush
