@extends('back.layouts.app')
@section('title', 'Halaman Job')
@section('subtitle', 'Menu Job')
@push('css')
    <link rel="stylesheet" type="text/css"
        href="{{ asset('template') }}/files/assets/icon/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-bs4.min.css" integrity="sha512-ngQ4IGzHQ3s/Hh8kMyG4FC74wzitukRMIcTOoKT3EyzFZCILOPF0twiXOQn75eDINUfKBYmzYn2AA8DkAk8veQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
                                                            action="{{ route('back-office.job.update', $data->id) }}"
                                                            method="POST" enctype="multipart/form-data">
                                                            @csrf
                                                            @method('PUT')
                                                            <div class="tab-content card-block">

                                                                <div class="tab-pane active" id="home7" role="tabpanel">



                                                                    <div class="modal-content">

                                                                        <div class="modal-body">
                                                                            <div class="card-block">
                                                                            <div class="form-group row">
                                                                                        <div class="col-sm-12">
                                                                                            <label class="col-form-label"
                                                                                                for="gambar">Gambar</label>
                                                                                            <input type="file"
                                                                                                class="form-control"
                                                                                                id="gambar"
                                                                                                name="gambar">
                                                                                                <br>
                                                                                                <a href="/upload/gambar/{{ $data->gambar }}"
                                                                                                    target="_blank">
                                                                                                    <img style="max-width:150px; max-height:150px"
                                                                                                        src="/upload/gambar/{{ $data->gambar }}"
                                                                                                        alt="">
                                                                                                </a>
                                                                                        </div>
                                                                                    </div>
                                                                                <div class="form-group row">
                                                                                    <div class="col-sm-6">
                                                                                        <label class="col-form-label"
                                                                                            for="nama_job">Posisi Pekerjaan</label>
                                                                                        <input type="text"
                                                                                            class="form-control "
                                                                                            id="nama_job" name="nama_job"
                                                                                            value="{{ $data->nama_job }}">

                                                                                    </div>
                                                                                    <div class="col-sm-6">
                                                                                        <label class="col-form-label"
                                                                                            for="tanggal_tutup">Tanggal
                                                                                            Lowongan
                                                                                            Ditutup</label>
                                                                                        <input type="date"
                                                                                            class="form-control "
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
                                                                                            class="form-control "
                                                                                            id="nama_perusahaan"
                                                                                            name="nama_perusahaan"
                                                                                            value="{{ $data->nama_perusahaan }}">
                                                                                    </div>
                                                                                    <div class="col-sm-6">
                                                                                        <label class="col-form-label"
                                                                                            for="mitra">Mitra</label>
                                                                                        <input type="text"
                                                                                            class="form-control "
                                                                                            id="mitra" name="mitra"
                                                                                            value="{{ $data->mitra }}">
                                                                                    </div>

                                                                                </div>

                                                                                <div class="form-group row">
                                                                                    <div class="col-sm-6">
                                                                                        <label class="col-form-label"
                                                                                            for="gaji">Gaji</label>
                                                                                        <input type="text"
                                                                                            class="form-control "
                                                                                            id="gaji" name="gaji"
                                                                                            value="{{ $data->gaji }}">
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
                                                                                            for="tanggal_kurs">Tanggal
                                                                                            Kurs</label>
                                                                                        <input type="date"
                                                                                            class="form-control "
                                                                                            id="tanggal_kurs"
                                                                                            name="tanggal_kurs"
                                                                                            value="{{$data->tanggal_kurs}}"
                                                                                            >
                                                                                    </div>
                                                                                    <div class="col-sm-6">
                                                                                        <label class="col-form-label"
                                                                                            for="nominal_kurs">Nominal
                                                                                            Kurs</label>
                                                                                        <input type="text"
                                                                                            class="form-control "
                                                                                            id="nominal_kurs"
                                                                                            name="nominal_kurs"
                                                                                            value="{{$data->nominal_kurs}}"
                                                                                            >
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
                                                                                            value="{{ $data->estimasi }}">
                                                                                    </div>
                                                                                    <div class="col-sm-6">
                                                                                        <label class="col-form-label"
                                                                                            for="gaji_diterima">Gaji Yang
                                                                                            Diterima</label>
                                                                                        <select class="form-control "
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
                                                                                                Industri Industri Pekerjaan
                                                                                            </option>

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
                                                                                            <input type="text" class="form-control" name="kontrak_kerja" id="kontrak_kerja" value="{{$data->kontrak_kerja}}">

                                                                                    </div>
                                                                                    <div class="col-sm-6">
                                                                                        <label class="col-form-label"
                                                                                            for="jam_kerja">Jam
                                                                                            Kerja</label>
                                                                                        <input type="text"
                                                                                            class="form-control "
                                                                                            id="jam_kerja"
                                                                                            name="jam_kerja"
                                                                                            value="{{ $data->jam_kerja }}">
                                                                                    </div>
                                                                                </div>

                                                                                <div class="form-group row">
                                                                                    <div class="col-sm-6">
                                                                                        <label class="col-form-label"
                                                                                            for="hari_kerja">Hari
                                                                                            Kerja</label>
                                                                                        <input type="text" class="form-control" name="hari_kerja" id="hari_kerja" value="{{$data->hari_kerja}}">

                                                                                    </div>
                                                                                    <div class="col-sm-6">
                                                                                        <label class="col-form-label"
                                                                                            for="cuti_kerja">Cuti
                                                                                            Kerja</label>
                                                                                        <input type="text"
                                                                                            class="form-control "
                                                                                            id="cuti_kerja"
                                                                                            name="cuti_kerja"
                                                                                            value="{{ $data->cuti_kerja }}">
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
                                                                                            name="masa_percobaan"
                                                                                            value="{{ $data->masa_percobaan }}">


                                                                                    </div>
                                                                                    <div class="col-sm-6">
                                                                                        <label class="col-form-label"
                                                                                            for="mata_uang_gaji">Mata Uang
                                                                                            Gaji</label>
                                                                                        <input type="text"
                                                                                            class="form-control "
                                                                                            id="mata_uang_gaji"
                                                                                            name="mata_uang_gaji"
                                                                                            value="{{ $data->mata_uang_gaji }}">
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
                                                                                            name="kerja_lembur"
                                                                                            value="{{ $data->kerja_lembur }}">
                                                                                    </div>
                                                                                    <!-- jenis pekerjaan -->
                                                                                    <div class="col-sm-6">
                                                                                        <label class="col-form-label"
                                                                                            for="jenis_pekerjaan">Jenis Pekerjaan</label>
                                                                                        <input type="text"
                                                                                            class="form-control "
                                                                                            id="jenis_pekerjaan"
                                                                                            name="jenis_pekerjaan"
                                                                                            value="{{ $data->jenis_pekerjaan }}">
                                                                                    </div>
                                                                                </div>

                                                                                <div class="form-group row">
                                                                                    <div class="col-sm-12">
                                                                                        <label class="col-form-label"
                                                                                            for="deskripsi">Deksripsi</label>
                                                                                        <textarea class="form-control " name="deskripsi" id="deskripsi" cols="30" rows="4">{{ $data->deskripsi }}</textarea>
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
                                                                                                <option value="Pria/Wanita" {{$data->jenis_kelamin == 'Pria/Wanita' ? 'selected' : '' }}>Pria/Wanita
                                                                                                </option>
                                                                                                

                                                                                            <!-- Cek apakah nilai yang sedang diedit adalah '5' -->
                                                                                            <option value="Pria"
                                                                                                {{ $data->jenis_kelamin == 'Pria' ? 'selected' : '' }}>
                                                                                                Pria</option>

                                                                                            <!-- Cek apakah nilai yang sedang diedit adalah '6' -->
                                                                                            <option value="Wanita"
                                                                                                {{ $data->jenis_kelamin == 'Wanita' ? 'selected' : '' }}>
                                                                                                Wanita </option>


                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="col-sm-4">
                                                                                        <label class="col-form-label"
                                                                                            for="tinggi_badan">Tinggi
                                                                                            Badan</label>
                                                                                        <input type="text"
                                                                                            class="form-control "
                                                                                            id="tinggi_badan"
                                                                                            name="tinggi_badan"
                                                                                            value="{{ $data->tinggi_badan }}">
                                                                                    </div>
                                                                                    <div class="col-sm-4">
                                                                                        <label class="col-form-label"
                                                                                            for="berat_badan">Berat
                                                                                            Badan</label>
                                                                                        <input type="text"
                                                                                            class="form-control "
                                                                                            id="berat_badan"
                                                                                            name="berat_badan"
                                                                                            value="{{ $data->berat_badan }}">
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
                                                                                            name="rentang_usia"
                                                                                            value="{{ $data->rentang_usia }}">
                                                                                    </div>
                                                                                    <div class="col-sm-4">
                                                                                        <label class="col-form-label"
                                                                                            for="level_bahasa">Level
                                                                                            Bahasa</label>
                                                                                        <select class="form-control "
                                                                                            id="level_bahasa"
                                                                                            name="level_bahasa" required>
                                                                                            <option value="">--Pilih
                                                                                                Level Bahasa --</option>

                                                                                            <!-- Cek apakah nilai yang sedang diedit adalah '5' -->
                                                                                            <option value="Basic"
                                                                                                {{ $data->level_bahasa == 'Basic' ? 'selected' : '' }}>
                                                                                                Basic</option>

                                                                                            <!-- Cek apakah nilai yang sedang diedit adalah '6' -->
                                                                                            <option value="Intermediate"
                                                                                                {{ $data->level_bahasa == 'Intermediate' ? 'selected' : '' }}>
                                                                                                Intermediate </option>

                                                                                            <!-- Cek apakah nilai yang sedang diedit adalah '6' -->
                                                                                            <option value="Advanced"
                                                                                                {{ $data->level_bahasa == 'Advanced' ? 'selected' : '' }}>
                                                                                                Advanced </option>


                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="col-sm-4">
                                                                                        <label class="col-form-label"
                                                                                            for="pengalaman_kerja">Pengalaman
                                                                                            Kerja</label>
                                                                                        <select class="form-control"
                                                                                            id="pengalaman_kerja"
                                                                                            name="pengalaman_kerja"
                                                                                            required>
                                                                                            <option value="">--Pilih
                                                                                                pengalaman kerja--</option>
                                                                                            <option
                                                                                                value="Tidak diperlukan pengalaman kerja"
                                                                                                {{ $data->pengalaman_kerja == 'Tidak diperlukan pengalaman kerja' ? 'selected' : '' }}>
                                                                                                Tidak diperlukan pengalaman
                                                                                                kerja
                                                                                            </option>
                                                                                            <option
                                                                                                value="Min. 6 bulan bekerja pada posisi yang sama"
                                                                                                {{ $data->pengalaman_kerja == 'Min. 6 bulan bekerja pada posisi yang sama' ? 'selected' : '' }}>
                                                                                                Min. 6 bulan bekerja pada
                                                                                                posisi yang sama
                                                                                            </option>
                                                                                            <option
                                                                                                value="Min. 1 Tahun bekerja pada posisi yang sama"
                                                                                                {{ $data->pengalaman_kerja == 'Min. 1 Tahun bekerja pada posisi yang sama' ? 'selected' : '' }}>
                                                                                                Min. 1 Tahun bekerja pada
                                                                                                posisi yang sama
                                                                                            </option>
                                                                                            <option
                                                                                                value="Min. 2 - 5 Tahun bekerja pada posisi yang sama"
                                                                                                {{ $data->pengalaman_kerja == 'Min. 2 - 5 Tahun bekerja pada posisi yang sama' ? 'selected' : '' }}>
                                                                                                Min. 2 - 5 Tahun bekerja
                                                                                                pada posisi yang sama
                                                                                            </option>
                                                                                            <option
                                                                                                value="Diperlukan pengalaman kerja atau lulusan pendidikan dengan jurusan yang berkaitan"
                                                                                                {{ $data->pengalaman_kerja == 'Diperlukan pengalaman kerja atau lulusan pendidikan dengan jurusan yang berkaitan' ? 'selected' : '' }}>
                                                                                                Diperlukan pengalaman kerja
                                                                                                atau lulusan pendidikan
                                                                                                dengan jurusan yang
                                                                                                berkaitan
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
                                                                                              

                                                                                            <option value="SD"
                                                                                                {{ $data->pendidikan == 'SD' ? 'selected' : '' }}>
                                                                                                SD
                                                                                            </option>
                                                                                            <option value="SMP"
                                                                                                {{ $data->pendidikan == 'SMP' ? 'selected' : '' }}>
                                                                                                SMP
                                                                                            </option>
                                                                                            

                                                                                            <option
                                                                                                value="SMA"
                                                                                                {{ $data->pendidikan == 'SMA' ? 'selected' : '' }}>
                                                                                                SMA
                                                                                            </option>
                                                                                            <option value="SMK"
                                                                                                {{ $data->pendidikan == 'SMK' ? 'selected' : '' }}>
                                                                                                SMK
                                                                                            </option>
                                                                                            <!-- d3 -->
                                                                                            <option
                                                                                                value="D3"
                                                                                                {{ $data->pendidikan == 'D3' ? 'selected' : '' }}>
                                                                                                D3
                                                                                            </option>
                                                                                            <!-- s1 -->
                                                                                            <option
                                                                                                value="S1"
                                                                                                {{ $data->pendidikan == 'S1' ? 'selected' : '' }}>
                                                                                                S1
                                                                                            </option>
                                                                                            <!-- s2 -->
                                                                                            <option
                                                                                                value="S2"
                                                                                                {{ $data->pendidikan == 'S2' ? 'selected' : '' }}>
                                                                                                S2
                                                                                            </option>
                                                                                            <!-- s3 -->
                                                                                            <option
                                                                                                value="S3"
                                                                                                {{ $data->pendidikan == 'S3' ? 'selected' : '' }}>
                                                                                                S3
                                                                                            </option>
                                                                                        </select>
                                                                                    </div>
                                                                                    <!-- text area ketentuan -->
                                                                                    <div class="col-sm-12 mt-3">
                                                                                        <label class="col-form-label"
                                                                                            for="ketentuan">Ketentuan</label>
                                                                                        <textarea class="form-control " name="ketentuan" id="ketentuan" cols="30" rows="4">{{$data->ketentuan}}</textarea>
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
                                                                                                            value="{{ $item->id }}"
                                                                                                            {{ $data->benefits->pluck('fasilitas_id')->contains($item->id) ? 'checked' : '' }}>
                                                                                                        <label
                                                                                                            class="border-checkbox-label"
                                                                                                            for="fasilitas-{{ $item->id }}">
                                                                                                            {{ $item->nama_fasilitas }}
                                                                                                        </label>
                                                                                                    </div>
                                                                                                @endforeach





                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                   
                                                                                  

                                                                                  





                                                                                </div>
                                                                            </div>


                                                                        </div>

                                                                    </div>
                                                                </div>

                                                                <a href="/administrator/job"
                                                                    class="btn btn-warning waves-effect waves-light mt-3"><i
                                                                        class="fas fa-undo"></i>
                                                                    Kembali
                                                                </a>

                                                                <button type="submit"
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
                <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script><script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote.min.js" integrity="sha512-6rE6Bx6fCBpRXG/FWpQmvguMWDLWMQjPycXMr35Zx/HRD9nwySZswkkLksgyQcvrpYMx0FELLJVBvWFtubZhDQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $(function(){
        // deksirpsi summer note
        $('#deskripsi').summernote({
            height: 200,
            placeholder: 'Deskripsi',
            tabsize: 2,
            height: 100
        });
    })
</script>

                <script>
                    // Fungsi untuk menambahkan separator titik
                    function addThousandSeparator(number) {
                        return number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
                    }

                    // Fungsi untuk menghapus semua karakter selain angka
                    function stripNonNumeric(str) {
                        return str.replace(/[^0-9]/g, '');
                    }

                    $(document).ready(function() {
                        // Tambahkan separator saat halaman dimuat
                        // $('#gaji').val(addThousandSeparator($('#gaji').val()));

                        // // Tambahkan separator saat pengguna mengetik
                        // $('#gaji').on('input', function() {
                        //     let value = stripNonNumeric($(this).val());
                        //     $(this).val(addThousandSeparator(value));
                        // });



                        // Tambahkan separator saat halaman dimuat
                        $('#estimasi').val(addThousandSeparator($('#estimasi').val()));

                        // Tambahkan separator saat pengguna mengetik
                        $('#estimasi').on('input', function() {
                            let value = stripNonNumeric($(this).val());
                            $(this).val(addThousandSeparator(value));
                        });





                    });
                </script>


                {{-- handle update ajax --}}
                <script>
                    $(document).ready(function() {
                        //    lewat button btn-save-job
                        $('#btn-save-job').click(function(e) {
                            e.preventDefault();
                            var form = $('#form_job')[0];
                            var formData = new FormData(form);
                            $.ajax({
                                type: "POST",
                                url: "{{ route('back-office.job.update', $data->id) }}",
                                data: formData,
                                contentType: false,
                                processData: false,
                                success: function(response) {
                                    Swal.fire({
                                        title: 'Sukses!',
                                        text: response.message,
                                        icon: 'success',
                                        confirmButtonText: 'OK'
                                    }).then((result) => {
                                        if (result.isConfirmed || result.isDismissed) {
                                            location.reload();
                                        }
                                    });
                                },
                                error: function(xhr) {
                                    var res = xhr.responseJSON;
                                    if ($.isEmptyObject(res) == false) {
                                        $.each(res.errors, function(key, value) {
                                            Swal.fire({
                                                icon: 'error',
                                                title: 'Gagal',
                                                text: value,
                                            });
                                        });
                                    }
                                }
                            });
                        });
                    });
                </script>
                <script type="text/javascript" src="{{ asset('template') }}/files/bower_components/switchery/js/switchery.min.js">
                    <script type = "text/javascript"
                    src = "{{ asset('template') }}/files/bower_components/bootstrap-tagsinput/js/bootstrap-tagsinput.js" >
                </script>
            @endpush
