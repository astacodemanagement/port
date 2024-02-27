@extends('back.layouts.app')
@section('title', 'Halaman Detail Pendaftaran Sudah Verifikasi')
@section('subtitle', 'Menu Detail Pendaftaran Sudah Verifikasi')
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
                            <h5>Detail Pendaftaran Sudah Verifikasi</h5>
                            <span>Silahkan isi dengan data yang sesuai dan valid !</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="page-header-breadcrumb">
                        <ul class=" breadcrumb breadcrumb-title">
                            <li class="breadcrumb-item">
                                <a href="/"><i class="feather icon-home"></i></a>
                            </li>
                            <li class="breadcrumb-item"><a href="#!">Halaman Detail Pendaftaran Sudah Verifikasi</a>
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
                                        <h5>Data Detail Pendaftaran Sudah Verifikasi : {{ $sudah_diverifikasi->nama_lengkap }}</h5>

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
                                                        <form id="form_job" action="{{ route('simpan_job') }}"
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
                                                                                            for="nama_job">Nama Detail
                                                                                            Pendaftaran Sudah
                                                                                            Verifikasi</label>
                                                                                        <input type="text"
                                                                                            class="form-control form-control-success"
                                                                                            id="nama_job" name="nama_job">
                                                                                    </div>
                                                                                    <div class="col-sm-6">
                                                                                        <label class="col-form-label"
                                                                                            for="tanggal_tutup">Tanggal
                                                                                            Lowongan
                                                                                            Ditutup</label>
                                                                                        <input type="date"
                                                                                            class="form-control form-control-success"
                                                                                            id="tanggal_tutup"
                                                                                            name="tanggal_tutup">
                                                                                    </div>
                                                                                </div>

                                                                                <div class="form-group row">
                                                                                    <div class="col-sm-6">
                                                                                        <label class="col-form-label"
                                                                                            for="gaji">Gaji</label>
                                                                                        <input type="text"
                                                                                            class="form-control form-control-success"
                                                                                            id="gaji" name="gaji">
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
                                                                                                jenis
                                                                                                pembayaran--</option>
                                                                                            <option value="Bulan">Bulan
                                                                                            </option>
                                                                                            <option value="Jam">Jam
                                                                                            </option>
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
                                                                                            name="estimasi_minimal">
                                                                                    </div>
                                                                                    <div class="col-sm-6">
                                                                                        <label class="col-form-label"
                                                                                            for="estimasi_maksimal">Estimasi
                                                                                            IDR
                                                                                            Mak</label>
                                                                                        <input type="text"
                                                                                            class="form-control form-control-success"
                                                                                            id="estimasi_maksimal"
                                                                                            name="estimasi_maksimal">
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
                                                                                                gaji
                                                                                                yang
                                                                                                diterima--</option>
                                                                                            <option value="Bersih">Bersih
                                                                                            </option>
                                                                                            <option value="Kotor">Kotor
                                                                                            </option>
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
                                                                                            name="tanggal_kurs">
                                                                                    </div>
                                                                                    <div class="col-sm-6">
                                                                                        <label class="col-form-label"
                                                                                            for="nominal_kurs">Nominal
                                                                                            Kurs</label>
                                                                                        <input type="text"
                                                                                            class="form-control form-control-success"
                                                                                            id="nominal_kurs"
                                                                                            name="nominal_kurs">
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
                                                                                        </select>
                                                                                        <input type="hidden"
                                                                                            id="nama_negara"
                                                                                            name="nama_negara">
                                                                                    </div>
                                                                                    <div class="col-sm-6">
                                                                                        <label class="col-form-label"
                                                                                            for="kategori_job_id">Industri
                                                                                            Pekerjaan</label>
                                                                                        <select id="kategori_job_id"
                                                                                            name="kategori_job_id"
                                                                                            class="form-control">
                                                                                            <option value="">Pilih
                                                                                                Industri
                                                                                                Pekerjaan</option>
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
                                                                                            <h4 class="sub-title">Benefit
                                                                                                Pekerjaan</h4>
                                                                                            <div
                                                                                                class="border-checkbox-section">

                                                                                                <div
                                                                                                    class="border-checkbox-group border-checkbox-group-success">
                                                                                                    <input
                                                                                                        class="border-checkbox"
                                                                                                        type="checkbox"
                                                                                                        id="dtt"
                                                                                                        name="nama_benefit[]"
                                                                                                        value="disediakan_tempat_tinggal">
                                                                                                    <label
                                                                                                        class="border-checkbox-label"
                                                                                                        for="dtt">Disediakan
                                                                                                        tempat tinggal
                                                                                                    </label>
                                                                                                </div>

                                                                                                <div
                                                                                                    class="border-checkbox-group border-checkbox-group-success">
                                                                                                    <input
                                                                                                        class="border-checkbox"
                                                                                                        type="checkbox"
                                                                                                        name="nama_benefit[]"
                                                                                                        value="disediakan_makan"
                                                                                                        id="dm">
                                                                                                    <label
                                                                                                        class="border-checkbox-label"
                                                                                                        for="dm">Disediakan
                                                                                                        makan
                                                                                                    </label>
                                                                                                </div>

                                                                                                <div
                                                                                                    class="border-checkbox-group border-checkbox-group-success">
                                                                                                    <input
                                                                                                        class="border-checkbox"
                                                                                                        type="checkbox"
                                                                                                        name="nama_benefit[]"
                                                                                                        value="disediakan_tunjangan_makan"
                                                                                                        id="dtm">
                                                                                                    <label
                                                                                                        class="border-checkbox-label"
                                                                                                        for="dtm">Disediakan
                                                                                                        tunjangan makan
                                                                                                    </label>
                                                                                                </div>

                                                                                                <div
                                                                                                    class="border-checkbox-group border-checkbox-group-success">
                                                                                                    <input
                                                                                                        class="border-checkbox"
                                                                                                        type="checkbox"
                                                                                                        name="nama_benefit[]"
                                                                                                        value="disediakan_asuransi_kerja"
                                                                                                        id="dak">
                                                                                                    <label
                                                                                                        class="border-checkbox-label"
                                                                                                        for="dak">Disediakan
                                                                                                        asuransi kerja
                                                                                                    </label>
                                                                                                </div>
                                                                                                <div
                                                                                                    class="border-checkbox-group border-checkbox-group-success">
                                                                                                    <input
                                                                                                        class="border-checkbox"
                                                                                                        type="checkbox"
                                                                                                        name="nama_benefit[]"
                                                                                                        value="disediakan_transportasi_dari_tempat_tinggal_ke_tempat_kerja"
                                                                                                        id="dttk">
                                                                                                    <label
                                                                                                        class="border-checkbox-label"
                                                                                                        for="dttk">Disediakan
                                                                                                        transportasi dari
                                                                                                        tempat
                                                                                                        tinggal ke tempat
                                                                                                        kerja

                                                                                                    </label>
                                                                                                </div>

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

                                                                <a href="/sudah_diverifikasi"
                                                                    class="btn btn-warning waves-effect waves-light mt-3"><i
                                                                        class="fas fa-undo"></i>
                                                                    Kembali
                                                                </a>

                                                                <button type="button"
                                                                    class="btn btn-primary waves-effect waves-light mt-3"
                                                                    id="btn-verifikasi" style="float: right;">
                                                                    <i class="fas fa-save"></i> Verifikasi
                                                                </button>
                                                                <button type="button"
                                                                    class="btn btn-danger waves-effect waves-light mt-3 m-3"
                                                                    id="btn-reject" style="float: right;">
                                                                    <i class="fas fa-ban"></i>Reject
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
            @endpush
