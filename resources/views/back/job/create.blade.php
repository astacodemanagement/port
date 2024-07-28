@extends('back.layouts.app')
@section('title', 'Halaman Job')
@section('subtitle', 'Menu Job')
@push('css')
 


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
                            <span>Silahkan kelola inputan data secara bijak !</span>
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

                                                        <form id="form_job"
                                                            action="{{ route('back-office.job.simpan_job') }}"
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
                                                                                            for="nama_job">Posisi Pekerjaan</label>
                                                                                        <input type="text"
                                                                                            class="form-control "
                                                                                            id="nama_job" name="nama_job">
                                                                                    </div>
                                                                                    <div class="col-sm-6">
                                                                                        <label class="col-form-label"
                                                                                            for="tanggal_tutup">Tanggal
                                                                                            Lowongan
                                                                                            Ditutup</label>
                                                                                        <input type="date"
                                                                                            class="form-control "
                                                                                            id="tanggal_tutup"
                                                                                            name="tanggal_tutup">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group row">
                                                                                    <div class="col-sm-6">
                                                                                        <label class="col-form-label"
                                                                                            for="nama_perusahaan">Nama
                                                                                            Perusahaan</label>
                                                                                        <input type="text"
                                                                                            class="form-control "
                                                                                            id="nama_perusahaan"
                                                                                            name="nama_perusahaan">
                                                                                    </div>
                                                                                    <div class="col-sm-6">
                                                                                        <label class="col-form-label"
                                                                                            for="mitra">Mitra</label>
                                                                                        <input type="text"
                                                                                            class="form-control "
                                                                                            id="mitra" name="mitra">
                                                                                    </div>

                                                                                </div>

                                                                                <div class="form-group row">
                                                                                    <div class="col-sm-6">
                                                                                        <label class="col-form-label"
                                                                                            for="gaji">Gaji</label>
                                                                                        <input type="text"
                                                                                            class="form-control "
                                                                                            id="gaji" name="gaji">
                                                                                    </div>
                                                                                    <div class="col-sm-6">
                                                                                        <label class="col-form-label"
                                                                                            for="jenis_pembayaran">Jenis
                                                                                            Pembayaran</label>
                                                                                        <select class="form-control "
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
                                                                                            for="tanggal_kurs">Tanggal
                                                                                            Kurs</label>
                                                                                        <input type="date"
                                                                                            class="form-control "
                                                                                            id="tanggal_kurs"
                                                                                            name="tanggal_kurs">
                                                                                    </div>
                                                                                    <div class="col-sm-6">
                                                                                        <label class="col-form-label"
                                                                                            for="nominal_kurs">Nominal
                                                                                            Kurs</label>
                                                                                        <input type="text"
                                                                                            class="form-control "
                                                                                            id="nominal_kurs"
                                                                                            name="nominal_kurs">
                                                                                    </div>
                                                                                </div>
                                                                                
                                                                                <div class="form-group row">
                                                                                    <div class="col-sm-6">
                                                                                        <label class="col-form-label"
                                                                                            for="estimasi">Estimasi
                                                                                            IDR</label>
                                                                                        <input type="text"
                                                                                            class="form-control "
                                                                                            id="estimasi"
                                                                                            name="estimasi"
                                                                                            >
                                                                                    </div>
                                                                                    <div class="col-sm-6">
                                                                                    <label class="col-form-label"
                                                                                            for="gaji_diterima">Gaji Yang
                                                                                            Diterima</label>
                                                                                        <select class="form-control "
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
                                                                                            for="negara_id">Negara</label>

                                                                                        <select id="negara_id"
                                                                                            name="negara_id"
                                                                                            class="form-control">
                                                                                            <option value=""
                                                                                                data-nama-negara="">Pilih
                                                                                                Negara</option>
                                                                                        </select>
                                                                                        {{-- <input type="hidden"
                                                                                            id="nama_negara"
                                                                                            name="nama_negara"> --}}
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
                                                                                          <input type="text" class="form-control" name="kontrak_kerja" id="kontrak_kerja">
                                                                                    </div>
                                                                                    <div class="col-sm-6">
                                                                                        <label class="col-form-label"
                                                                                            for="jam_kerja">Jam
                                                                                            Kerja</label>
                                                                                        <input type="text"
                                                                                            class="form-control "
                                                                                            id="jam_kerja"
                                                                                            name="jam_kerja">
                                                                                    </div>
                                                                                </div>

                                                                                <div class="form-group row">
                                                                                    <div class="col-sm-6">
                                                                                        <label class="col-form-label"
                                                                                            for="hari_kerja">Hari
                                                                                            Kerja</label>
                                                                                        <select class="form-control "
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
                                                                                            class="form-control "
                                                                                            id="cuti_kerja"
                                                                                            name="cuti_kerja">
                                                                                    </div>

                                                                                </div>

                                                                                <div class="form-group row">
                                                                                    <div class="col-sm-6">
                                                                                        <label class="col-form-label"
                                                                                            for="masa_percobaan">Masa
                                                                                            Percobaan</label>
                                                                                        <input type="text"
                                                                                            class="form-control "
                                                                                            id="masa_percobaan"
                                                                                            name="masa_percobaan">

                                                                                    </div>
                                                                                    <div class="col-sm-6">
                                                                                        <label class="col-form-label"
                                                                                            for="mata_uang_gaji">Mata Uang
                                                                                            Gaji</label>
                                                                                        <input type="text"
                                                                                            class="form-control "
                                                                                            id="mata_uang_gaji"
                                                                                            name="mata_uang_gaji">
                                                                                    </div>
                                                                                </div>


                                                                                <div class="form-group row">
                                                                                    <div class="col-sm-6">
                                                                                        <label class="col-form-label"
                                                                                            for="kerja_lembur">Kerja
                                                                                            Lembur</label>
                                                                                        <input type="text"
                                                                                            class="form-control "
                                                                                            id="kerja_lembur"
                                                                                            name="kerja_lembur">
                                                                                    </div>
                                                                                    <div class="col-sm-6">
                                                                                        <label class="col-form-label"
                                                                                            for="bahasa">Bahasa Yang
                                                                                            Digunakan</label>
                                                                                        <input type="text"
                                                                                            class="form-control "
                                                                                            id="bahasa" name="bahasa">
                                                                                    </div>
                                                                                </div>

                                                                                <div class="form-group row">
                                                                                    <div class="col-sm-12">
                                                                                        <label class="col-form-label"
                                                                                            for="deskripsi">Deksripsi</label>
                                                                                        <textarea class="form-control " name="deskripsi" id="deskripsi" cols="30" rows="4"></textarea>
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
                                                                                        <select class="form-control "
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
                                                                                            class="form-control "
                                                                                            id="tinggi_badan"
                                                                                            name="tinggi_badan">
                                                                                    </div>
                                                                                    <div class="col-sm-4">
                                                                                        <label class="col-form-label"
                                                                                            for="berat_badan">Berat
                                                                                            Badan</label>
                                                                                        <input type="text"
                                                                                            class="form-control "
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
                                                                                            class="form-control "
                                                                                            id="rentang_usia"
                                                                                            name="rentang_usia">
                                                                                    </div>
                                                                                    <div class="col-sm-4">
                                                                                        <label class="col-form-label"
                                                                                            for="level_bahasa">Level
                                                                                            Bahasa</label>
                                                                                        <select class="form-control "
                                                                                            id="level_bahasa"
                                                                                            name="level_bahasa" required>
                                                                                            <option value="">--Pilih
                                                                                                level bahasa--</option>
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
                                                                                        <select class="form-control "
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
                                                                                    <div class="col-sm-12 mt-3">
                                                                                        <label class="col-form-label"
                                                                                            for="pendidikan">Pendidikan</label>
                                                                                        <select class="form-control "
                                                                                            id="pendidikan"
                                                                                            name="pendidikan" required>
                                                                                            <option value="">--Pilih
                                                                                                pendidikan--</option>
                                                                                            <option value="Tidak diperlukan pendidikan">
                                                                                                Tidak diperlukan pendidikan
                                                                                            </option>
                                                                                            <option value="SMA/SMK">SMA/SMK</option>
                                                                                            <option value="D3">D3</option>
                                                                                            <option value="S1">S1</option>
                                                                                            <option value="S2">S2</option>
                                                                                            <option value="S3">S3</option>
                                                                                        </select>
                                                                                    </div>
                                                                                    <!-- text area ketentuan -->
                                                                                    <div class="col-sm-12 mt-3">
                                                                                        <label class="col-form-label"
                                                                                            for="ketentuan">Ketentuan</label>
                                                                                        <textarea class="form-control " name="ketentuan" id="ketentuan" cols="30" rows="4"></textarea>
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
                                                                                            <textarea class="form-control " name="paragraf_galeri" id="paragraf_galeri" cols="30" rows="4"></textarea>
                                                                                        </div>
                                                                                    </div>
                                                                                    
                                                                                    <div class="form-group row">
                                                                                        <div class="col-sm-12">
                                                                                            <label class="col-form-label"
                                                                                                for="link_video">Link
                                                                                                Video</label>
                                                                                            <input type="text"
                                                                                                class="form-control "
                                                                                                id="link_video"
                                                                                                name="link_video">
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="form-group row">
                                                                                        <div class="col-sm-12">
                                                                                            <label class="col-form-label"
                                                                                                for="info_lain">Informasi
                                                                                                Lainnya</label>
                                                                                            <textarea class="form-control " name="info_lain" id="info_lain" cols="30" rows="4"></textarea>
                                                                                        </div>
                                                                                    </div>


                                                                                    <div class="form-group row">
                                                                                        <div class="col-sm-12">
                                                                                            <label class="col-form-label"
                                                                                                for="disclaimer">Disclaimer</label>
                                                                                            <textarea class="form-control " name="disclaimer" id="disclaimer" cols="30" rows="4"></textarea>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="form-group row">
                                                                                        <div class="col-sm-12">
                                                                                            <label class="col-form-label"
                                                                                                for="gambar">Gambar</label>
                                                                                            <input type="file" class="form-control" id="gambar" name="gambar">
                                                                                            </div>
                                                                                    </div>





                                                                                </div>
                                                                            </div>


                                                                        </div>

                                                                    </div>
                                                                </div>

                                                                <a href="{{ route('back-office.job.index') }}"
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

                <script>
                    $(document).ready(function() {
                        // $('#gaji').on('input', function() {
                        //     let value = $(this).val().replace(/\D/g, '');
                        //     value = value.replace(/\B(?=(\d{3})+(?!\d))/g, '.');
                        //     $(this).val(value);
                        // });
                        $('#estimasi').on('input', function() {
                            let value = $(this).val().replace(/\D/g, '');
                            value = value.replace(/\B(?=(\d{3})+(?!\d))/g, '.');
                            $(this).val(value);
                        });
                      
                     
                    });
                </script>


                {{-- PERINTAH CARI NEGARA --}}
                <script>
                    $(document).ready(function() {
                        $.ajax({
                            url: `{{ route('back-office.job.getNegara') }}`,
                            type: 'GET',
                            success: function(data) {
                                var options = '';
                                data.forEach(function(negara) {
                                    options += '<option value="' + negara.id + '" data-nama-negara="' +
                                        negara.nama_negara + '">' +
                                        negara.nama_negara + '</option>';
                                });
                                $('#negara_id').append(options);
                            }
                        });

                        // Event saat nilai dropdown negara diubah
                        $('#negara_id').change(function() {
                            var selectedOption = $(this).find('option:selected');
                            var namaNegara = selectedOption.data('nama-negara');
                            $('#nama_negara').val(namaNegara);
                        });
                    });
                </script>


                <script>
                    $(document).ready(function() {
                        $.ajax({
                            url: `{{ route('back-office.job.getKategoriJob') }}`,
                            type: 'GET',
                            success: function(response) {
                                console.log(response);
                                var options = '';
                                response.forEach(function(kategori_job) {
                                    options += '<option value="' + kategori_job.id + '">' + kategori_job
                                        .nama_kategori_job + '</option>';
                                });
                                $('#kategori_job_id').append(options);
                            }

                        });
                    });
                </script>



                {{-- TAMBAH --}}
                <script>
                    $(document).ready(function() {
                        $('#btn-save-job').click(function() {
                            var formData = new FormData($('#form_job')[0]);
                            $.ajax({
                                url: $('#form_job').attr('action'),
                                type: 'POST',
                                data: formData,
                                contentType: false,
                                processData: false,
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
            @endpush
