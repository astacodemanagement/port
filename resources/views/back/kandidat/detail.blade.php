@extends('back.layouts.app')
@section('title', 'Halaman Detail Pendaftaran Belum Verifikasi')
@section('subtitle', 'Menu Detail Pendaftaran Belum Verifikasi')
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
                            <h5>Detail Pendaftaran Verifikasi</h5>
                            {{-- <span>Silahkan isi dengan data yang sesuai dan valid !</span> --}}
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="page-header-breadcrumb">
                        <ul class=" breadcrumb breadcrumb-title">
                            <li class="breadcrumb-item">
                                <a href="{{ route('back-office.home') }}"><i class="feather icon-home"></i></a>
                            </li>
                            <li class="breadcrumb-item"><a href="#!">Halaman Detail Pendaftaran Verifikasi</a>
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



                                {{-- <div class="card-header">
                                        <h5>Data Detail Pendaftaran Belum Verifikasi : {{ $detail_kandidat->nama_lengkap }}</h5>

                                    </div> --}}
                                <div class="card-block">
                                    <div class="card">
                                        <div class="card-block tab-icon">
                                            <div class="row">
                                                <div class="col-lg-12 col-xl-12">
                                                    <ul class="nav nav-tabs md-tabs " role="tablist">
                                                        <li class="nav-item">
                                                            <a class="nav-link active" data-toggle="tab" href="#data_diri"
                                                                role="tab"><i class="fas fa-users"></i>Data Diri</a>
                                                            <div class="slide"></div>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link" data-toggle="tab" href="#dokumen_ln"
                                                                role="tab"><i class="fas fa-bookmark"></i>Dokumen
                                                                Luar Negeri</a>
                                                            <div class="slide"></div>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link" data-toggle="tab" href="#pengalaman_kerja"
                                                                role="tab"><i class="fas fa-handshake-o"></i>Pengalaman
                                                                Kerja</a>
                                                            <div class="slide"></div>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link" data-toggle="tab" href="#dokumen"
                                                                role="tab"><i class="fas fa-server"></i>Dokumen</a>
                                                            <div class="slide"></div>
                                                        </li>

                                                        <li class="nav-item">
                                                            <a class="nav-link" data-toggle="tab" href="#akun"
                                                                role="tab"><i class="fas fa-user"></i>Akun</a>
                                                            <div class="slide"></div>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link" data-toggle="tab" href="#level"
                                                                role="tab"><i class="fa-solid fa-layer-group"></i>Level
                                                                Bahasa Inggris</a>
                                                            <div class="slide"></div>
                                                        </li>
                                                    </ul>

                                                    <form id="form_verifikasi" action="" method="POST"
                                                        enctype="multipart/form-data">
                                                        @csrf <!-- Tambahkan token CSRF -->
                                                        @method('PUT') <!-- Tambahkan method PUT untuk update -->
                                                        <input type="hidden" id="id" name="id"
                                                            value="{{ $detail_kandidat->id }}">
                                                        <div class="tab-content card-block">

                                                            <div class="tab-pane active" id="data_diri" role="tabpanel">

                                                                <div class="modal-content">

                                                                    <div class="modal-body">
                                                                        <div class="card-block">
                                                                            <div class="form-group row">
                                                                                {{-- <div class="col-sm-6">
                                                                                    <label class="col-form-label"
                                                                                        for="nama_negara">Nama
                                                                                        Negara</label>
                                                                                    <input type="text" 
                                                                                        class="form-control"
                                                                                        id="nama_negara"
                                                                                        name="nama_negara"
                                                                                        value="{{ $belum_diverifikasi->nama_negara }}">


                                                                                    <input type="hidden" 
                                                                                        class="form-control"
                                                                                        id="negara_id" name="negara_id"
                                                                                        value="{{ $belum_diverifikasi->negara_id }}">
                                                                                </div> --}}
                                                                                {{-- <div class="col-sm-12">
                                                                                    <label class="col-form-label"
                                                                                        for="nama_kategori_job">Industri
                                                                                        Minat Pekerjaan</label>
                                                                                    <input type="text" 
                                                                                        class="form-control"
                                                                                        id="nama_kategori_job"
                                                                                        name="nama_kategori_job"
                                                                                        value="{{ $belum_diverifikasi?->kategoriJob?->nama_kategori_job }}">

                                                                                    <input type="hidden" 
                                                                                        class="form-control"
                                                                                        id="kategori_job_id"
                                                                                        name="kategori_job_id"
                                                                                        value="{{ $belum_diverifikasi->kategori_job_id }}">
                                                                                </div> --}}
                                                                            </div>

                                                                            <div class="form-group row">
                                                                                <div class="col-sm-6">
                                                                                    <label class="col-form-label"
                                                                                        for="nik">NIK</label>
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        id="nik" name="nik"
                                                                                        value="{{ $detail_kandidat->nik }}">
                                                                                </div>
                                                                                <div class="col-sm-6">
                                                                                    <label class="col-form-label"
                                                                                        for="nama_lengkap">Nama
                                                                                        Lengkap</label>
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        id="nama_lengkap"
                                                                                        name="nama_lengkap"
                                                                                        value="{{ $detail_kandidat->nama_lengkap }}">

                                                                                </div>
                                                                            </div>

                                                                            <div class="form-group row">
                                                                                <div class="col-sm-6">
                                                                                    <label class="col-form-label"
                                                                                        for="tempat_lahir">Tempat
                                                                                        Lahir</label>
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        id="tempat_lahir"
                                                                                        name="tempat_lahir"
                                                                                        value="{{ $detail_kandidat->tempat_lahir }}">
                                                                                </div>
                                                                                <div class="col-sm-6">
                                                                                    <label class="col-form-label"
                                                                                        for="tanggal_lahir">Tanggal
                                                                                        Lahir</label>
                                                                                    <input type="date"
                                                                                        class="form-control"
                                                                                        id="tanggal_lahir"
                                                                                        name="tanggal_lahir"
                                                                                        value="{{ $detail_kandidat->tanggal_lahir }}">
                                                                                </div>
                                                                            </div>

                                                                            <div class="form-group row">
                                                                                <div class="col-sm-6">
                                                                                    <label class="col-form-label"
                                                                                        for="usia">Usia</label>
                                                                                    <input type="number"
                                                                                        class="form-control"
                                                                                        id="usia" name="usia"
                                                                                        value="{{ $detail_kandidat->usia }}">
                                                                                </div>
                                                                                <div class="col-sm-6">
                                                                                    <label class="col-form-label"
                                                                                        for="agama">Agama</label>

                                                                                    <select class="form-control"
                                                                                        id="agama" name="agama">
                                                                                        <option value="">--Pilih
                                                                                            Agama--</option>
                                                                                        <option value="Islam"
                                                                                            {{ $detail_kandidat->agama == 'Islam' ? 'selected' : '' }}>
                                                                                            Islam
                                                                                        </option>
                                                                                        <option value="Kristen"
                                                                                            {{ $detail_kandidat->agama == 'Kristen' ? 'selected' : '' }}>
                                                                                            Kristen
                                                                                        </option>
                                                                                        <option value="Katolik"
                                                                                            {{ $detail_kandidat->agama == 'Katolik' ? 'selected' : '' }}>
                                                                                            Katolik
                                                                                        </option>
                                                                                        <option value="Hindu"
                                                                                            {{ $detail_kandidat->agama == 'Hindu' ? 'selected' : '' }}>
                                                                                            Hindu
                                                                                        </option>
                                                                                        <option value="Buddha"
                                                                                            {{ $detail_kandidat->agama == 'Buddha' ? 'selected' : '' }}>
                                                                                            Katolik
                                                                                        </option>
                                                                                        <option value="Khonghucu"
                                                                                            {{ $detail_kandidat->agama == 'Khonghucu' ? 'selected' : '' }}>
                                                                                            Khonghucu
                                                                                        </option>
                                                                                        <option value="Lainnya"
                                                                                            {{ $detail_kandidat->agama == 'Lainnya' ? 'selected' : '' }}>
                                                                                            Katolik
                                                                                        </option>
                                                                                    </select>


                                                                                </div>
                                                                            </div>

                                                                            <div class="form-group row">
                                                                                <div class="col-sm-6">
                                                                                    <label class="col-form-label"
                                                                                        for="berat_badan">Berat
                                                                                        Badan</label>
                                                                                    <input type="number"
                                                                                        class="form-control"
                                                                                        id="berat_badan"
                                                                                        name="berat_badan"
                                                                                        value="{{ $detail_kandidat->berat_badan }}">
                                                                                </div>
                                                                                <div class="col-sm-6">
                                                                                    <label class="col-form-label"
                                                                                        for="tinggi_badan">Tinggi
                                                                                        Badan</label>
                                                                                    <input type="number"
                                                                                        class="form-control"
                                                                                        id="tinggi_badan"
                                                                                        name="tinggi_badan"
                                                                                        value="{{ $detail_kandidat->tinggi_badan }}">
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <div class="col-sm-6">
                                                                                    <label class="col-form-label"
                                                                                        for="jenis_kelamin">Jenis
                                                                                        Kelamin</label>
                                                                                    <select class="form-control"
                                                                                        id="jenis_kelamin"
                                                                                        name="jenis_kelamin">
                                                                                        <option value="Laki-laki"
                                                                                            {{ $detail_kandidat->jenis_kelamin == 'Laki-laki' ? 'selected' : '' }}>
                                                                                            Laki-laki</option>
                                                                                        <option value="Perempuan"
                                                                                            {{ $detail_kandidat->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>
                                                                                            Perempuan</option>
                                                                                    </select>
                                                                                </div>

                                                                                <div class="col-sm-6">
                                                                                    <label class="col-form-label"
                                                                                        for="status_kawin">Status
                                                                                        Kawin</label>
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        id="status_kawin"
                                                                                        name="status_kawin"
                                                                                        value="{{ $detail_kandidat->status_kawin }}">
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <div class="col-sm-6">
                                                                                    <label class="col-form-label"
                                                                                        for="nama_lengkap_ayah">Nama
                                                                                        Lengkap
                                                                                        Ayah</label>
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        id="nama_lengkap_ayah"
                                                                                        name="nama_lengkap_ayah"
                                                                                        value="{{ $detail_kandidat->nama_lengkap_ayah }}">
                                                                                </div>
                                                                                <div class="col-sm-6">
                                                                                    <label class="col-form-label"
                                                                                        for="nama_lengkap_ibu">Nama
                                                                                        Lengkap Ibu</label>
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        id="nama_lengkap_ibu"
                                                                                        name="nama_lengkap_ibu"
                                                                                        value="{{ $detail_kandidat->nama_lengkap_ibu }}">
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <div class="col-sm-12">
                                                                                    <label class="col-form-label"
                                                                                        for="alamat">Alamat</label>
                                                                                    <textarea class="form-control" name="alamat" id="alamat" cols="30" rows="2">{{ $detail_kandidat->alamat }}</textarea>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <div class="col-sm-4">
                                                                                    <label class="col-form-label"
                                                                                        for="kota">Kota</label>
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        id="kota" name="kota"
                                                                                        value="{{ $detail_kandidat->kota?->nama_kota }}">
                                                                                </div>
                                                                                <div class="col-sm-4">
                                                                                    <label class="col-form-label"
                                                                                        for="kecamatan">Kecamatan</label>
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        id="kecamatan" name="kecamatan"
                                                                                        value="{{ $detail_kandidat->kecamatan?->nama_kecamatan }}">
                                                                                </div>
                                                                                <div class="col-sm-4">
                                                                                    <label class="col-form-label"
                                                                                        for="provinsi">Provinsi</label>
                                                                                    <input type="text"
                                                                                        class="form-control" idprovinsi
                                                                                        name="provinsi"
                                                                                        value="{{ $detail_kandidat->provinsi?->nama_provinsi }}">
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <div class="col-sm-6">
                                                                                    <label class="col-form-label"
                                                                                        for="referensi">Referensi</label>
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        id="referensi" name="referensi"
                                                                                        value="{{ $detail_kandidat->referensi }}">
                                                                                </div>
                                                                                <div class="col-sm-6">
                                                                                    <label class="col-form-label"
                                                                                        for="nama_referensi">Nama
                                                                                        Referensi</label>
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        id="nama_referensi"
                                                                                        name="nama_referensi"
                                                                                        value="{{ $detail_kandidat->nama_referensi }}">
                                                                                </div>
                                                                            </div>

                                                                            <div class="form-group row">
                                                                                <div class="col-sm-4">
                                                                                    <label class="col-form-label"
                                                                                        for="email">Email</label>
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        id="email" name="email"
                                                                                        value="{{ $detail_kandidat->email }}">
                                                                                </div>
                                                                                <div class="col-sm-4">
                                                                                    <label class="col-form-label"
                                                                                        for="no_hp">No
                                                                                        Telephone</label>
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        id="no_hp" name="no_hp"
                                                                                        value="{{ $detail_kandidat->no_hp }}">
                                                                                </div>
                                                                                <div class="col-sm-4">
                                                                                    <label class="col-form-label"
                                                                                        for="no_wa">No
                                                                                        WA</label>
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        id="no_wa" name="no_wa"
                                                                                        value="{{ $detail_kandidat->no_wa }}">
                                                                                </div>
                                                                            </div>
                                                                            <br><br>
                                                                            <h4 class="sub-title"> > Kontak Darurat</h4>
                                                                            <div class="form-group row">
                                                                                <div class="col-sm-4">
                                                                                    <label class="col-form-label"
                                                                                        for="nama_keluarga">Nama
                                                                                        Keluarga</label>
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        id="nama_keluarga"
                                                                                        name="nama_keluarga"
                                                                                        value="{{ $detail_kandidat->nama_keluarga }}">
                                                                                </div>
                                                                                <div class="col-sm-4">
                                                                                    <label class="col-form-label"
                                                                                        for="hubungan">Hubungan
                                                                                        Keluarga</label>
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        id="hubungan" name="hubungan"
                                                                                        value="{{ $detail_kandidat->hubungan }}">
                                                                                </div>
                                                                                <div class="col-sm-4">
                                                                                    <label class="col-form-label"
                                                                                        for="no_telp_darurat">No
                                                                                        Darurat</label>
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        id="no_telp_darurat"
                                                                                        name="no_telp_darurat"
                                                                                        value="{{ $detail_kandidat->no_telp_darurat }}">
                                                                                </div>
                                                                            </div>









                                                                        </div>
                                                                    </div>


                                                                </div>




                                                            </div>

                                                            <div class="tab-pane" id="dokumen_ln" role="tabpanel">
                                                                <div class="modal-content">
                                                                    <div class="modal-body">
                                                                        <div class="card-block">
                                                                            <div class="form-group row">
                                                                                <div class="col-sm-6">
                                                                                    <label class="col-form-label"
                                                                                        for="no_paspor">No
                                                                                        Paspor</label>
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        id="no_paspor" name="no_paspor"
                                                                                        value="{{ $detail_kandidat->no_paspor }}">
                                                                                </div>
                                                                                <div class="col-sm-6">
                                                                                    <label class="col-form-label"
                                                                                        for="tanggal_pengeluaran_paspor">Tanggal
                                                                                        Pengeluaran Paspor</label>
                                                                                    <input type="date"
                                                                                        class="form-control"
                                                                                        id="tanggal_pengeluaran_paspor"
                                                                                        name="tanggal_pengeluaran_paspor"
                                                                                        value="{{ $detail_kandidat->tanggal_pengeluaran_paspor }}">
                                                                                </div>
                                                                            </div>

                                                                            <div class="form-group row">
                                                                                <div class="col-sm-6">
                                                                                    <label class="col-form-label"
                                                                                        for="masa_kadaluarsa">Masa
                                                                                        Kadaluarsa Paspor</label>
                                                                                    <input type="date"
                                                                                        class="form-control"
                                                                                        id="masa_kadaluarsa"
                                                                                        name="masa_kadaluarsa"
                                                                                        value="{{ $detail_kandidat->masa_kadaluarsa }}">
                                                                                </div>
                                                                                <div class="col-sm-6">
                                                                                    <label class="col-form-label"
                                                                                        for="kantor_paspor">Kantor Yang
                                                                                        Mengeluarkan Paspor</label>
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        id="kantor_paspor"
                                                                                        name="kantor_paspor"
                                                                                        value="{{ $detail_kandidat->kantor_paspor }}">
                                                                                </div>
                                                                            </div>

                                                                            <div class="form-group row">
                                                                                <div class="col-sm-12">
                                                                                    <label class="col-form-label"
                                                                                        for="kondisi_paspor">Kondisi
                                                                                        Paspor</label>
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        id="kondisi_paspor"
                                                                                        name="kondisi_paspor"
                                                                                        value="{{ $detail_kandidat->kondisi_paspor }}">
                                                                                </div>
                                                                            </div>



                                                                        </div>
                                                                    </div>


                                                                </div>
                                                            </div>
                                                            <div class="tab-pane" id="pengalaman_kerja" role="tabpanel">
                                                                <div class="modal-content">
                                                                    <div class="modal-body">
                                                                        @foreach ($detail_kandidat->pengalamanKerja as $pengalaman)
                                                                            <div class="card-block">
                                                                                <h4 class="sub-title">Pengalaman Pekerjaan
                                                                                    {{ $loop->iteration }}
                                                                                </h4>
                                                                                <div class="form-group row">
                                                                                    <div class="col-sm-6">
                                                                                        <label class="col-form-label"
                                                                                            for="estimasi_maksimal">Negara
                                                                                            Tempat Bekerja</label>
                                                                                        <input type="text"
                                                                                            class="form-control"
                                                                                            value="{{ $pengalaman->negara_tempat_kerja }}">
                                                                                    </div>
                                                                                    <div class="col-sm-6">
                                                                                        <label class="col-form-label"
                                                                                            for="estimasi_maksimal">Nama
                                                                                            Perusahaan</label>
                                                                                        <input type="text"
                                                                                            class="form-control"
                                                                                            value="{{ $pengalaman->nama_perusahaan }}">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group row">
                                                                                    <div class="col-sm-6">
                                                                                        <label class="col-form-label"
                                                                                            for="estimasi_maksimal">Tanggal
                                                                                            Mulai Bekerja</label>
                                                                                        <input type="text"
                                                                                            class="form-control"
                                                                                            value="{{ $pengalaman->tanggal_mulai_kerja }}">
                                                                                    </div>
                                                                                    <div class="col-sm-6">
                                                                                        <label class="col-form-label"
                                                                                            for="estimasi_maksimal">Tanggal
                                                                                            Selesai Bekerja</label>
                                                                                        <input type="text"
                                                                                            class="form-control"
                                                                                            value="{{ $pengalaman->tanggal_selesai_kerja }}">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group row">
                                                                                    <div class="col-sm-12">
                                                                                        <label class="col-form-label"
                                                                                            for="estimasi_maksimal">Posisi</label>
                                                                                        <input type="text"
                                                                                            class="form-control"
                                                                                            value="{{ $pengalaman->posisi }}">
                                                                                    </div>
                                                                                </div>
                                                                                <hr>
                                                                            </div>
                                                                        @endforeach





                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="tab-pane" id="dokumen" role="tabpanel">
                                                                <div class="modal-content">
                                                                    <div class="modal-body">
                                                                        <div class="card-block">
                                                                            <div class="card-block">
                                                                                <div class="form-group row">
                                                                                    <div class="col-sm-12">
                                                                                        <h4 class="sub-title">Dokumen
                                                                                            Persyaratan Jati Diri yang
                                                                                            dimiliki</h4>
                                                                                        <div
                                                                                            class="border-checkbox-section">
                                                                                            <div
                                                                                                class="border-checkbox-group border-checkbox-group-success">
                                                                                                <input
                                                                                                    class="border-checkbox"
                                                                                                    type="checkbox"
                                                                                                    id="ada_ktp"
                                                                                                    name="ada_ktp"
                                                                                                    value="{{ $detail_kandidat->ada_ktp }}"
                                                                                                    {{ $detail_kandidat->ada_ktp == 'Ya' ? 'checked' : '' }}>
                                                                                                <label
                                                                                                    class="border-checkbox-label"
                                                                                                    for="ada_ktp">KTP</label>
                                                                                            </div>



                                                                                            <div
                                                                                                class="border-checkbox-group border-checkbox-group-success">
                                                                                                <input
                                                                                                    class="border-checkbox"
                                                                                                    type="checkbox"
                                                                                                    id="ada_kk"
                                                                                                    name="ada_kk"
                                                                                                    value="{{ $detail_kandidat->ada_kk }}"
                                                                                                    {{ $detail_kandidat->ada_kk == 'Ya' ? 'checked' : '' }}>
                                                                                                <label
                                                                                                    class="border-checkbox-label"
                                                                                                    for="ada_kk">KK</label>
                                                                                            </div>

                                                                                            <div
                                                                                                class="border-checkbox-group border-checkbox-group-success">
                                                                                                <input
                                                                                                    class="border-checkbox"
                                                                                                    type="checkbox"
                                                                                                    id="ada_akta_lahir"
                                                                                                    name="ada_akta_lahir"
                                                                                                    value="{{ $detail_kandidat->ada_akta_lahir }}"
                                                                                                    {{ $detail_kandidat->ada_akta_lahir == 'Ya' ? 'checked' : '' }}>
                                                                                                <label
                                                                                                    class="border-checkbox-label"
                                                                                                    for="ada_akta_lahir">Akta
                                                                                                    Lahir</label>
                                                                                            </div>

                                                                                            <div
                                                                                                class="border-checkbox-group border-checkbox-group-success">
                                                                                                <input
                                                                                                    class="border-checkbox"
                                                                                                    type="checkbox"
                                                                                                    id="ada_ijazah"
                                                                                                    name="ada_ijazah"
                                                                                                    value="{{ $detail_kandidat->ada_ijazah }}"
                                                                                                    {{ $detail_kandidat->ada_ijazah == 'Ya' ? 'checked' : '' }}>
                                                                                                <label
                                                                                                    class="border-checkbox-label"
                                                                                                    for="ada_ijazah">Ijazah</label>
                                                                                            </div>

                                                                                            <div
                                                                                                class="border-checkbox-group border-checkbox-group-success">
                                                                                                <input
                                                                                                    class="border-checkbox"
                                                                                                    type="checkbox"
                                                                                                    id="ada_buku_nikah"
                                                                                                    name="ada_buku_nikah"
                                                                                                    value="{{ $detail_kandidat->ada_buku_nikah }}"
                                                                                                    {{ $detail_kandidat->ada_buku_nikah == 'Ya' ? 'checked' : '' }}>
                                                                                                <label
                                                                                                    class="border-checkbox-label"
                                                                                                    for="ada_buku_nikah">Buku
                                                                                                    Nikah</label>
                                                                                            </div>

                                                                                            <div
                                                                                                class="border-checkbox-group border-checkbox-group-success">
                                                                                                <input
                                                                                                    class="border-checkbox"
                                                                                                    type="checkbox"
                                                                                                    id="ada_paspor"
                                                                                                    name="ada_paspor"
                                                                                                    value="{{ $detail_kandidat->ada_paspor }}"
                                                                                                    {{ $detail_kandidat->ada_paspor == 'Ya' ? 'checked' : '' }}>
                                                                                                <label
                                                                                                    class="border-checkbox-label"
                                                                                                    for="ada_paspor">Paspor</label>
                                                                                            </div>

                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="form-group row">
                                                                                    <div class="col-sm-12">
                                                                                        <label class="col-form-label"
                                                                                            for="penjelasan_dokumen">Penjelasan
                                                                                            Dokumen kelengkapan berkas anda
                                                                                            terdapat perbedaan
                                                                                            nama/alamat/tempat
                                                                                            tanggal
                                                                                            lahir/hilang/rusak/lainnya</label>
                                                                                        <textarea class="form-control" name="penjelasan_dokumen" id="penjelasan_dokumen" cols="30" rows="4">{{ $detail_kandidat->penjelasan_dokumen }} </textarea>
                                                                                    </div>
                                                                                </div>
                                                                                <h4 class="sub-title">Upload Dokumen
                                                                                    Persyaratan Jati Diri yang dimiliki</h4>
                                                                                <div class="container">
                                                                                    <div class="row">
                                                                                        <div class="col-sm-4">
                                                                                            <div class="form-group"
                                                                                                style="text-align: center;">
                                                                                                <label
                                                                                                    class="col-form-label"
                                                                                                    for="">Foto</label>
                                                                                                <br>
                                                                                                <a href="/upload/foto/{{ $detail_kandidat->foto }}"
                                                                                                    target="_blank">
                                                                                                    <img style="max-width:100%; max-height:100%"
                                                                                                        src="/upload/foto/{{ $detail_kandidat->foto }}"
                                                                                                        alt="">
                                                                                                </a>

                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-sm-4">
                                                                                            <div class="form-group"
                                                                                                style="text-align: center;">
                                                                                                <label
                                                                                                    class="col-form-label"
                                                                                                    for="">Paspor</label>
                                                                                                <a href="/upload/paspor/{{ $detail_kandidat->paspor }}"
                                                                                                    target="_blank">
                                                                                                    <img style="max-width:100%; max-height:100%"
                                                                                                        src="/upload/preview.png"
                                                                                                        alt="Preview">
                                                                                                </a>

                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-sm-4">
                                                                                            <div class="form-group"
                                                                                                style="text-align: center;">
                                                                                                <label
                                                                                                    class="col-form-label"
                                                                                                    for="">KTP</label>
                                                                                                <a href="/upload/ktp/{{ $detail_kandidat->ktp }}"
                                                                                                    target="_blank">
                                                                                                    <img style="max-width:100%; max-height:100%"
                                                                                                        src="/upload/preview.png"
                                                                                                        alt="Preview">
                                                                                                </a>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="container">
                                                                                    <div class="row">
                                                                                        <div class="col-sm-4">
                                                                                            <div class="form-group"
                                                                                                style="text-align: center;">
                                                                                                <label
                                                                                                    class="col-form-label"
                                                                                                    for="">Sertifikat
                                                                                                    Kompetensi</label>
                                                                                                <a href="/upload/sertifikat-kompetensi/{{ $detail_kandidat->sertifikat_kompetensi }}"
                                                                                                    target="_blank">
                                                                                                    <img style="max-width:100%; max-height:100%"
                                                                                                        src="/upload/preview.png"
                                                                                                        alt="Preview">
                                                                                                </a>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-sm-4">
                                                                                            <div class="form-group"
                                                                                                style="text-align: center;">
                                                                                                <label
                                                                                                    class="col-form-label"
                                                                                                    for="">Paklaring</label>
                                                                                                <a href="/upload/paspor/{{ $detail_kandidat->paklaring }}"
                                                                                                    target="_blank">
                                                                                                    <img style="max-width:100%; max-height:100%"
                                                                                                        src="/upload/preview.png"
                                                                                                        alt="Preview">
                                                                                                </a>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-sm-4">
                                                                                            <div class="form-group"
                                                                                                style="text-align: center;">
                                                                                                <label
                                                                                                    class="col-form-label"
                                                                                                    for="kk">KK</label>
                                                                                                <a href="/upload/kartu-keluarga/{{ $detail_kandidat->kk }}"
                                                                                                    target="_blank">
                                                                                                    <img style="max-width:100%; max-height:100%"
                                                                                                        src="/upload/preview.png"
                                                                                                        alt="Preview">
                                                                                                </a>
                                                                                            </div>
                                                                                        </div>

                                                                                    </div>
                                                                                </div>
                                                                                <div class="container">
                                                                                    <div class="row">
                                                                                        <div class="col-sm-4">
                                                                                            <div class="form-group"
                                                                                                style="text-align: center;">
                                                                                                <label
                                                                                                    class="col-form-label"
                                                                                                    for="">Akta
                                                                                                    Lahir</label>
                                                                                                <a href="/upload/akta-lahir/{{ $detail_kandidat->akta_lahir }}"
                                                                                                    target="_blank">
                                                                                                    <img style="max-width:100%; max-height:100%"
                                                                                                        src="/upload/preview.png"
                                                                                                        alt="Preview">
                                                                                                </a>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-sm-4">
                                                                                            <div class="form-group"
                                                                                                style="text-align: center;">
                                                                                                <label
                                                                                                    class="col-form-label"
                                                                                                    for="">Ijazah</label>
                                                                                                <a href="/upload/ijazah/{{ $detail_kandidat->ijazah }}"
                                                                                                    target="_blank">
                                                                                                    <img style="max-width:100%; max-height:100%"
                                                                                                        src="/upload/preview.png"
                                                                                                        alt="Preview">
                                                                                                </a>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-sm-4">
                                                                                            <div class="form-group"
                                                                                                style="text-align: center;">
                                                                                                <label
                                                                                                    class="col-form-label"
                                                                                                    for="kk">Buku
                                                                                                    Nikah</label>
                                                                                                <a href="/upload/buku-nikah/{{ $detail_kandidat->buku_nikah }}"
                                                                                                    target="_blank">
                                                                                                    <img style="max-width:100%; max-height:100%"
                                                                                                        src="/upload/preview.png"
                                                                                                        alt="Preview">
                                                                                                </a>
                                                                                            </div>
                                                                                        </div>

                                                                                    </div>
                                                                                </div>








                                                                            </div>
                                                                        </div>


                                                                    </div>

                                                                </div>
                                                            </div>



                                                            <div class="tab-pane" id="akun" role="tabpanel">
                                                                <div class="modal-content">
                                                                    <div class="modal-body">
                                                                        <div class="card-block">
                                                                            <h5>Akun</h5>

                                                                            <div class="form-group row">
                                                                                <div class="col-sm-6">
                                                                                    <label class="col-form-label"
                                                                                        for="email">Email</label>
                                                                                    <input type="email"
                                                                                        class="form-control"
                                                                                        id="email" name="email"
                                                                                        value="{{ $detail_kandidat->user->email }}">
                                                                                </div>
                                                                                <div class="col-sm-6">
                                                                                    <label class="col-form-label"
                                                                                        for="password">Password</label>
                                                                                    <input type="text"
                                                                                        class="form-control
                                                                                        "
                                                                                        id="password" name="password"
                                                                                        placeholder="kosongkan jika tidak ingin mengubah password">
                                                                                </div>
                                                                            </div>




                                                                        </div>


                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="tab-pane" id="level" role="tabpanel">
                                                                <div class="modal-content">
                                                                    <div class="modal-body">
                                                                        <div class="card-block">
                                                                            <h5>Level Bahasa Inggris</h5>

                                                                            <div class="form-group row">
                                                                                <div class="col-sm-6">
                                                                                    <label class="col-form-label"
                                                                                        for="level_bahasa_inggris">Level</label>
                                                                                    <select class="form-control"
                                                                                        id="level_bahasa_inggris"
                                                                                        name="level_bahasa_inggris">
                                                                                        <option value="">--Pilih
                                                                                            Level--</option>
                                                                                        <option value="Beginner English"
                                                                                            {{ $detail_kandidat->level_bahasa_inggris == 'Beginner English' ? 'selected' : '' }}>
                                                                                            Beginner English
                                                                                        </option>
                                                                                        <option value="⁠Medium English"
                                                                                            {{ $detail_kandidat->level_bahasa_inggris == '⁠Medium English' ? 'selected' : '' }}>
                                                                                            ⁠Medium English
                                                                                        </option>
                                                                                        <option value="Advance English"
                                                                                            {{ $detail_kandidat->level_bahasa_inggris == 'Advance English' ? 'selected' : '' }}>
                                                                                            Advance English
                                                                                        </option>
                                                                                    </select>




                                                                                </div>
                                                                                <div class="col-sm-6">
                                                                                    <label class="col-form-label"
                                                                                        for="pic_level">PIC</label>
                                                                                    <input type="text"
                                                                                        class="form-control
                                                                                        "
                                                                                        id="pic_level" name="pic_level"
                                                                                        value="{{ $detail_kandidat->pic_level }}">
                                                                                </div>
                                                                                <div class="col-sm-12">
                                                                                    <label class="col-form-label"
                                                                                        for="catatan_level">Catatan</label>
                                                                                    <textarea class="form-control" name="catatan_level" id="catatan_level" cols="30" rows="3">{{ $detail_kandidat->catatan_level }}</textarea>
                                                                                </div>
                                                                            </div>




                                                                        </div>


                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <a href="javascript:history.back()"
                                                                class="btn btn-warning waves-effect waves-light mt-3">
                                                                <i class="fas fa-undo"></i> Kembali
                                                            </a>


                                                            <button type="button"
                                                                class="btn btn-primary waves-effect waves-light mt-3"
                                                                id="btn-update-verifikasi" style="float: right;">
                                                                <i class="fas fa-save"></i> Update
                                                            </button>
                                                            {{-- <button type="button"
                                                                class="btn btn-danger waves-effect waves-light mt-3 m-3"
                                                                id="btn-reject" style="float: right;">
                                                                <i class="fas fa-ban"></i>Reject
                                                            </button> --}}


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









            @endsection




            @push('script')
                <script>
                    document.addEventListener("DOMContentLoaded", function() {
                        // Ambil semua input dengan kelas border-checkbox
                        var checkboxes = document.querySelectorAll('.border-checkbox');

                        // Iterasi melalui setiap checkbox
                        checkboxes.forEach(function(checkbox) {
                            // Tambahkan event listener untuk setiap checkbox
                            checkbox.addEventListener('change', function() {
                                // Periksa apakah checkbox yang berubah dicek atau tidak
                                if (this.checked) {
                                    // Jika dicek, set nilai atribut checked ke true
                                    this.setAttribute('checked', 'checked');
                                } else {
                                    // Jika tidak dicek, hilangkan atribut checked
                                    this.removeAttribute('checked');
                                }
                            });
                        });
                    });
                </script>
                <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

                <script type="text/javascript" src="{{ asset('template') }}/files/bower_components/switchery/js/switchery.min.js">
                </script>

                <script type="text/javascript"
                    src="{{ asset('template') }}/files/bower_components/bootstrap-tagsinput/js/bootstrap-tagsinput.js"></script>



                {{-- PERINTAH UPDATE DATA --}}
                <script>
                    $(document).ready(function() {
                        $('#btn-update-verifikasi').click(function(e) {
                            e.preventDefault();
                            const tombolUpdate = $('#btn-update-verifikasi');
                            var id = $('#id').val();
                            var formData = new FormData($('#form_verifikasi')[0]);

                            $.ajax({
                                type: 'POST',
                                url: '/verifikasi/update/' + id,
                                data: formData,
                                headers: {
                                    'X-HTTP-Method-Override': 'PUT'
                                },
                                contentType: false,
                                processData: false,
                                beforeSend: function() {
                                    $('form').find('.error-message').remove();
                                    tombolUpdate.prop('disabled', true);
                                },
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
                                complete: function() {
                                    tombolUpdate.prop('disabled', false);
                                },
                                error: function(xhr) {
                                    if (xhr.status !== 422) {

                                    }
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
