@extends('back.layouts.app')
@section('title', 'Halaman Detail Pendaftaran Belum Verifikasi')
@section('subtitle', 'Menu Detail Pendaftaran Belum Verifikasi')
@push('css')
    {{-- <link rel="stylesheet" href="{{ asset('template') }}/files/bower_components/select2/css/select2.min.css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('template') }}/files/bower_components/bootstrap-multiselect/css/bootstrap-multiselect.css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('template') }}/files/bower_components/multiselect/css/multi-select.css" /> --}}

    @extends('back.layouts.css_datatables')
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
                            <h5>Detail Dalam Proses</h5>
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
                            <li class="breadcrumb-item"><a href="#!">Halaman Detail Dalam Proses</a>
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
                                        <h5>Data Detail Pendaftaran Belum Verifikasi : {{ $seleksi_dalam_proses->nama_lengkap }}</h5>

                                    </div> --}}
                                <div class="card-block">
                                    <div class="card">
                                        <div class="card-block tab-icon">
                                            <div class="row">
                                                <div class="col-lg-12 col-xl-12">
                                                    <ul class="nav nav-tabs md-tabs " role="tablist">
                                                        <li class="nav-item">
                                                            <a class="nav-link " data-toggle="tab" href="#home7"
                                                                role="tab"><i class="fas fa-users"></i>Data Diri</a>
                                                            <div class="slide"></div>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link" data-toggle="tab" href="#profile7"
                                                                role="tab"><i class="fas fa-bookmark"></i>Dokumen
                                                                Perjalanan Luar Negeri</a>
                                                            <div class="slide"></div>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link" data-toggle="tab" href="#messages7"
                                                                role="tab"><i class="fas fa-handshake-o"></i>Pengalaman
                                                                Kerja</a>
                                                            <div class="slide"></div>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link" data-toggle="tab" href="#settings7"
                                                                role="tab"><i class="fas fa-server"></i>Dokumen</a>
                                                            <div class="slide"></div>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link" data-toggle="tab" href="#job"
                                                                role="tab"><i class="fas fa-briefcase"></i>Detail
                                                                Job</a>
                                                            <div class="slide"></div>
                                                        </li>
                                                        <li class="nav-item active">
                                                            <a class="nav-link" data-toggle="tab" href="#pembayaran"
                                                                role="tab"><i
                                                                    class="fas fa-dollar-sign"></i>Pembayaran</a>
                                                            <div class="slide"></div>
                                                        </li>
                                                        <li class="nav-item active">
                                                            <a class="nav-link" data-toggle="tab" href="#cf"
                                                                role="tab"><i class="fas fa-dollar-sign"></i>Comitment
                                                                Fee</a>
                                                            <div class="slide"></div>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link" data-toggle="tab" href="#status"
                                                                role="tab"><i class="fas fa-info"></i>Status Dalam
                                                                Kerja</a>
                                                            <div class="slide"></div>
                                                        </li>
                                                    </ul>

                                                    <form id="form_verifikasi" action="" method="POST"
                                                        enctype="multipart/form-data">
                                                        @csrf <!-- Tambahkan token CSRF -->
                                                        @method('PUT') <!-- Tambahkan method PUT untuk update -->
                                                        <input type="hidden" id="id" name="id"
                                                            value="{{ $id }}">

                                                        <div class="tab-content card-block">

                                                            <div class="tab-pane " id="home7" role="tabpanel">
                                                                <div class="modal-content">

                                                                    <div class="modal-body">
                                                                        <div class="card-block">
                                                                            <div class="form-group row">
                                                                                <div class="col-sm-6">
                                                                                    <label class="col-form-label"
                                                                                        for="nama_negara">Nama
                                                                                        Negara</label>
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        id="nama_negara"
                                                                                        name="nama_negara"
                                                                                        value="{{ $seleksi_dalam_proses->nama_negara }}">
                                                                                </div>
                                                                                <div class="col-sm-6">
                                                                                    <label class="col-form-label"
                                                                                        for="nama_kategori_job">Industri
                                                                                        Pekerjaan</label>
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        id="nama_kategori_job"
                                                                                        name="nama_kategori_job"
                                                                                        value="{{ $seleksi_dalam_proses->nama_kategori_job }}">
                                                                                </div>
                                                                            </div>

                                                                            <div class="form-group row">
                                                                                <div class="col-sm-6">
                                                                                    <label class="col-form-label"
                                                                                        for="nik">NIK</label>
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        id="nik" name="nik"
                                                                                        value="{{ $seleksi_dalam_proses->nik }}">
                                                                                </div>
                                                                                <div class="col-sm-6">
                                                                                    <label class="col-form-label"
                                                                                        for="nama_lengkap">Nama
                                                                                        Lengkap</label>
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        id="nama_lengkap"
                                                                                        name="nama_lengkap"
                                                                                        value="{{ $seleksi_dalam_proses->nama_lengkap }}">

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
                                                                                        value="{{ $seleksi_dalam_proses->tempat_lahir }}">
                                                                                </div>
                                                                                <div class="col-sm-6">
                                                                                    <label class="col-form-label"
                                                                                        for="tanggal_lahir">Tanggal
                                                                                        Lahir</label>
                                                                                    <input type="date"
                                                                                        class="form-control"
                                                                                        id="tanggal_lahir"
                                                                                        name="tanggal_lahir"
                                                                                        value="{{ $seleksi_dalam_proses->tanggal_lahir }}">
                                                                                </div>
                                                                            </div>

                                                                            <div class="form-group row">
                                                                                <div class="col-sm-6">
                                                                                    <label class="col-form-label"
                                                                                        for="usia">Usia</label>
                                                                                    <input type="number"
                                                                                        class="form-control"
                                                                                        id="usia" name="usia"
                                                                                        value="{{ $seleksi_dalam_proses->usia }}">
                                                                                </div>
                                                                                <div class="col-sm-6">
                                                                                    <label class="col-form-label"
                                                                                        for="agama">Agama</label>
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        id="agama" name="agama"
                                                                                        value="{{ $seleksi_dalam_proses->agama }}">
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
                                                                                        value="{{ $seleksi_dalam_proses->berat_badan }}">
                                                                                </div>
                                                                                <div class="col-sm-6">
                                                                                    <label class="col-form-label"
                                                                                        for="tinggi_badan">Tinggi
                                                                                        Badan</label>
                                                                                    <input type="number"
                                                                                        class="form-control"
                                                                                        id="tinggi_badan"
                                                                                        name="tinggi_badan"
                                                                                        value="{{ $seleksi_dalam_proses->tinggi_badan }}">
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
                                                                                            {{ $seleksi_dalam_proses->jenis_kelamin == 'Laki-laki' ? 'selected' : '' }}>
                                                                                            Laki-laki</option>
                                                                                        <option value="Perempuan"
                                                                                            {{ $seleksi_dalam_proses->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>
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
                                                                                        value="{{ $seleksi_dalam_proses->status_kawin }}">
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
                                                                                        value="{{ $seleksi_dalam_proses->nama_lengkap_ayah }}">
                                                                                </div>
                                                                                <div class="col-sm-6">
                                                                                    <label class="col-form-label"
                                                                                        for="nama_lengkap_ibu">Nama
                                                                                        Lengkap Ibu</label>
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        id="nama_lengkap_ibu"
                                                                                        name="nama_lengkap_ibu"
                                                                                        value="{{ $seleksi_dalam_proses->nama_lengkap_ibu }}">
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <div class="col-sm-12">
                                                                                    <label class="col-form-label"
                                                                                        for="alamat">Alamat</label>
                                                                                    <textarea class="form-control" name="alamat" id="alamat" cols="30" rows="2">{{ $seleksi_dalam_proses->alamat }}</textarea>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <div class="col-sm-4">
                                                                                    <label class="col-form-label"
                                                                                        for="kota">Kota</label>
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        id="kota" name="kota"
                                                                                        value="{{ $seleksi_dalam_proses->kota }}">
                                                                                </div>
                                                                                <div class="col-sm-4">
                                                                                    <label class="col-form-label"
                                                                                        for="kecamatan">Kecamatan</label>
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        id="kecamatan" name="kecamatan"
                                                                                        value="{{ $seleksi_dalam_proses->kecamatan }}">
                                                                                </div>
                                                                                <div class="col-sm-4">
                                                                                    <label class="col-form-label"
                                                                                        for="provinsi">Provinsi</label>
                                                                                    <input type="text"
                                                                                        class="form-control" idprovinsi
                                                                                        name="provinsi"
                                                                                        value="{{ $seleksi_dalam_proses->provinsi }}">
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <div class="col-sm-6">
                                                                                    <label class="col-form-label"
                                                                                        for="referensi">Referensi</label>
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        id="referensi" name="referensi"
                                                                                        value="{{ $seleksi_dalam_proses->referensi }}">
                                                                                </div>
                                                                                <div class="col-sm-6">
                                                                                    <label class="col-form-label"
                                                                                        for="nama_referensi">Nama
                                                                                        Referensi</label>
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        id="nama_referensi"
                                                                                        name="nama_referensi"
                                                                                        value="{{ $seleksi_dalam_proses->nama_referensi }}">
                                                                                </div>
                                                                            </div>

                                                                            <div class="form-group row">
                                                                                <div class="col-sm-4">
                                                                                    <label class="col-form-label"
                                                                                        for="email">Email</label>
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        id="email" name="email"
                                                                                        value="{{ $seleksi_dalam_proses->email }}">
                                                                                </div>
                                                                                <div class="col-sm-4">
                                                                                    <label class="col-form-label"
                                                                                        for="no_hp">No
                                                                                        Telephone</label>
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        id="no_hp" name="no_hp"
                                                                                        value="{{ $seleksi_dalam_proses->no_hp }}">
                                                                                </div>
                                                                                <div class="col-sm-4">
                                                                                    <label class="col-form-label"
                                                                                        for="no_wa">No
                                                                                        WA</label>
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        id="no_wa" name="no_wa"
                                                                                        value="{{ $seleksi_dalam_proses->no_wa }}">
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
                                                                                        for="no_paspor">No
                                                                                        Paspor</label>
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        id="no_paspor" name="no_paspor"
                                                                                        value="{{ $seleksi_dalam_proses->no_paspor }}">
                                                                                </div>
                                                                                <div class="col-sm-6">
                                                                                    <label class="col-form-label"
                                                                                        for="tanggal_pengeluaran_paspor">Tanggal
                                                                                        Pengeluaran Paspor</label>
                                                                                    <input type="date"
                                                                                        class="form-control"
                                                                                        id="tanggal_pengeluaran_paspor"
                                                                                        name="tanggal_pengeluaran_paspor"
                                                                                        value="{{ $seleksi_dalam_proses->tanggal_pengeluaran_paspor }}">
                                                                                </div>
                                                                            </div>

                                                                            <div class="form-group row">
                                                                                <div class="col-sm-6">
                                                                                    <label class="col-form-label"
                                                                                        for="masa_kadaluarsa">Masa
                                                                                        Kadaluarsa Paspor</label>
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        id="masa_kadaluarsa"
                                                                                        name="masa_kadaluarsa"
                                                                                        value="{{ $seleksi_dalam_proses->masa_kadaluarsa }}">
                                                                                </div>
                                                                                <div class="col-sm-6">
                                                                                    <label class="col-form-label"
                                                                                        for="kantor_paspor">Kantor Yang
                                                                                        Mengeluarkan Paspor</label>
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        id="kantor_paspor"
                                                                                        name="kantor_paspor"
                                                                                        value="{{ $seleksi_dalam_proses->kantor_paspor }}">
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
                                                                                        value="{{ $seleksi_dalam_proses->kondisi_paspor }}">
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
                                                                            <h4 class="sub-title">(Pengalaman Pekerjaan 1)
                                                                            </h4>
                                                                            <div class="form-group row">
                                                                                <div class="col-sm-6">
                                                                                    <label class="col-form-label"
                                                                                        for="estimasi_maksimal">Negara
                                                                                        Tempat Bekerja</label>
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        id="" name=""
                                                                                        value="">
                                                                                </div>
                                                                                <div class="col-sm-6">
                                                                                    <label class="col-form-label"
                                                                                        for="estimasi_maksimal">Nama
                                                                                        Perusahaan</label>
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        id="" name=""
                                                                                        value="">
                                                                                </div>
                                                                            </div>

                                                                            <div class="form-group row">
                                                                                <div class="col-sm-6">
                                                                                    <label class="col-form-label"
                                                                                        for="estimasi_maksimal">Tanggal
                                                                                        Mulai Bekerja</label>
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        id="" name=""
                                                                                        value="">
                                                                                </div>
                                                                                <div class="col-sm-6">
                                                                                    <label class="col-form-label"
                                                                                        for="estimasi_maksimal">Tanggal
                                                                                        Akhir Bekerja</label>
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        id="" name=""
                                                                                        value="">
                                                                                </div>
                                                                            </div>

                                                                            <div class="form-group row">
                                                                                <div class="col-sm-12">
                                                                                    <label class="col-form-label"
                                                                                        for="estimasi_maksimal">Posisi</label>
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        id="" name=""
                                                                                        value="">
                                                                                </div>
                                                                            </div>
                                                                            <hr>
                                                                            <h4 class="sub-title">(Pengalaman Pekerjaan 2)
                                                                            </h4>
                                                                            <div class="form-group row">
                                                                                <div class="col-sm-6">
                                                                                    <label class="col-form-label"
                                                                                        for="estimasi_maksimal">Negara
                                                                                        Tempat Bekerja</label>
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        id="" name=""
                                                                                        value="">
                                                                                </div>
                                                                                <div class="col-sm-6">
                                                                                    <label class="col-form-label"
                                                                                        for="estimasi_maksimal">Nama
                                                                                        Perusahaan</label>
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        id="" name=""
                                                                                        value="">
                                                                                </div>
                                                                            </div>

                                                                            <div class="form-group row">
                                                                                <div class="col-sm-6">
                                                                                    <label class="col-form-label"
                                                                                        for="estimasi_maksimal">Tanggal
                                                                                        Mulai Bekerja</label>
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        id="" name=""
                                                                                        value="">
                                                                                </div>
                                                                                <div class="col-sm-6">
                                                                                    <label class="col-form-label"
                                                                                        for="estimasi_maksimal">Tanggal
                                                                                        Akhir Bekerja</label>
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        id="" name=""
                                                                                        value="">
                                                                                </div>
                                                                            </div>

                                                                            <div class="form-group row">
                                                                                <div class="col-sm-12">
                                                                                    <label class="col-form-label"
                                                                                        for="estimasi_maksimal">Posisi</label>
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        id="" name=""
                                                                                        value="">
                                                                                </div>
                                                                            </div>
                                                                            <hr>
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
                                                                                                    value="{{ $seleksi_dalam_proses->ada_ktp }}"
                                                                                                    {{ $seleksi_dalam_proses->ada_ktp == 'Ya' ? 'checked' : '' }}>
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
                                                                                                    value="{{ $seleksi_dalam_proses->ada_kk }}"
                                                                                                    {{ $seleksi_dalam_proses->ada_kk == 'Ya' ? 'checked' : '' }}>
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
                                                                                                    value="{{ $seleksi_dalam_proses->ada_akta_lahir }}"
                                                                                                    {{ $seleksi_dalam_proses->ada_akta_lahir == 'Ya' ? 'checked' : '' }}>
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
                                                                                                    value="{{ $seleksi_dalam_proses->ada_ijazah }}"
                                                                                                    {{ $seleksi_dalam_proses->ada_ijazah == 'Ya' ? 'checked' : '' }}>
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
                                                                                                    value="{{ $seleksi_dalam_proses->ada_buku_nikah }}"
                                                                                                    {{ $seleksi_dalam_proses->ada_buku_nikah == 'Ya' ? 'checked' : '' }}>
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
                                                                                                    value="{{ $seleksi_dalam_proses->ada_paspor }}"
                                                                                                    {{ $seleksi_dalam_proses->ada_paspor == 'Ya' ? 'checked' : '' }}>
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
                                                                                        <textarea class="form-control" name="penjelasan_dokumen" id="penjelasan_dokumen" cols="30" rows="4">{{ $seleksi_dalam_proses->penjelasan_dokumen }} </textarea>
                                                                                    </div>
                                                                                </div>
                                                                                <h4 class="sub-title">Upload Dokumen
                                                                                    Persyaratan Jati Diri yang dimiliki</h4>
                                                                                <div class="container">
                                                                                    <div class="row">
                                                                                        <div class="col-sm-4">
                                                                                            <div class="form-group">
                                                                                                <label
                                                                                                    class="col-form-label"
                                                                                                    for="nama_galeri">Foto</label>
                                                                                                <img src="https://png.pngtree.com/png-vector/20190623/ourmid/pngtree-documentfilepagepenresume-flat-color-icon-vector-png-image_1491048.jpg"
                                                                                                    alt="">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-sm-4">
                                                                                            <div class="form-group">
                                                                                                <label
                                                                                                    class="col-form-label"
                                                                                                    for="nama_galeri">Paspor</label>
                                                                                                <img src="https://png.pngtree.com/png-vector/20190623/ourmid/pngtree-documentfilepagepenresume-flat-color-icon-vector-png-image_1491048.jpg"
                                                                                                    alt="">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-sm-4">
                                                                                            <div class="form-group">
                                                                                                <label
                                                                                                    class="col-form-label"
                                                                                                    for="nama_galeri">KTP</label>
                                                                                                <img src="https://png.pngtree.com/png-vector/20190623/ourmid/pngtree-documentfilepagepenresume-flat-color-icon-vector-png-image_1491048.jpg"
                                                                                                    alt="">
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="container">
                                                                                    <div class="row">
                                                                                        <div class="col-sm-6">
                                                                                            <div class="form-group">
                                                                                                <label
                                                                                                    class="col-form-label"
                                                                                                    for="nama_galeri">Sertifikat
                                                                                                    Kompetensi</label>
                                                                                                <img src="https://png.pngtree.com/png-vector/20190623/ourmid/pngtree-documentfilepagepenresume-flat-color-icon-vector-png-image_1491048.jpg"
                                                                                                    alt="">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-sm-6">
                                                                                            <div class="form-group">
                                                                                                <label
                                                                                                    class="col-form-label"
                                                                                                    for="nama_galeri">Paklaring</label>
                                                                                                <img src="https://png.pngtree.com/png-vector/20190623/ourmid/pngtree-documentfilepagepenresume-flat-color-icon-vector-png-image_1491048.jpg"
                                                                                                    alt="">
                                                                                            </div>
                                                                                        </div>

                                                                                    </div>
                                                                                </div>

                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>


                                                            <div class="tab-pane" id="job" role="tabpanel">
                                                                <div class="modal-content">
                                                                    <div class="modal-body">
                                                                        <div class="card-block">
                                                                            <h4 class="sub-title"
                                                                                style="font-size: 25px;">Pre - Job</h4>

                                                                            <div class="form-group row">
                                                                                <div class="col-sm-4">
                                                                                    <label class="col-form-label"
                                                                                        for="no_paspor">Posisi Yang
                                                                                        Dilamar</label>
                                                                                    <input readonly type="text"
                                                                                        class="form-control"
                                                                                        id="no_paspor" name="no_paspor"
                                                                                        value="{{ $seleksi_dalam_proses->nama_job }}">
                                                                                </div>
                                                                                <div class="col-sm-4">
                                                                                    <label class="col-form-label"
                                                                                        for="gaji">Gaji</label>
                                                                                    <input readonly type="text"
                                                                                        class="form-control"
                                                                                        id="gaji" name="gaji"
                                                                                        value="{{ $seleksi_dalam_proses->job->gaji }}">
                                                                                </div>

                                                                                <div class="col-sm-4">
                                                                                    <label class="col-form-label"
                                                                                        for="tanggal_pengeluaran_paspor">Negara</label>
                                                                                    <input readonly type="text"
                                                                                        class="form-control"
                                                                                        id="tanggal_pengeluaran_paspor"
                                                                                        name="tanggal_pengeluaran_paspor"
                                                                                        value="{{ $seleksi_dalam_proses->nama_negara }}">
                                                                                </div>

                                                                            </div>




                                                                            <br>
                                                                            <h4 class="sub-title"
                                                                                style="font-size: 25px;">Job Terseleksi
                                                                            </h4>
                                                                            <div class="form-group row">
                                                                                <div class="col-sm-3">
                                                                                    <label class="col-form-label"
                                                                                        for="tanggal_interview">Tanggal
                                                                                        Interview</label>
                                                                                    <input type="date"
                                                                                        class="form-control"
                                                                                        id="tanggal_interview"
                                                                                        name="tanggal_interview"
                                                                                        value="{{ $seleksi_dalam_proses->tanggal_interview }}">
                                                                                </div>
                                                                                <div class="col-sm-3">
                                                                                    <label class="col-form-label"
                                                                                        for="kantor_paspor">Job
                                                                                        Terselect</label>
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        id="job_terselect"
                                                                                        name="job_terselect"
                                                                                        value="{{ $seleksi_dalam_proses->job_terselect }}">
                                                                                </div>

                                                                                <div class="col-sm-3">
                                                                                    <label class="col-form-label"
                                                                                        for="gaji_akhir">Gaji Akhir</label>
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        id="gaji_akhir" name="gaji_akhir"
                                                                                        value="{{ number_format($seleksi_dalam_proses->gaji_akhir, 0, ',', '.') }}"
                                                                                        onkeyup="formatNumber4(this)">
                                                                                </div>

                                                                                <script>
                                                                                    window.addEventListener('DOMContentLoaded', (event) => {
                                                                                        // Memformat nilai gaji saat tampilan dimuat
                                                                                        formatNumber4(document.getElementById('gaji_akhir'));
                                                                                    });

                                                                                    function formatNumber4(input) {
                                                                                        // Menghapus karakter non-numeric dari input
                                                                                        let value = input.value.replace(/\D/g, '');

                                                                                        // Menggunakan fungsi toLocaleString() untuk memformat angka dengan pemisah ribuan
                                                                                        input.value = parseFloat(value).toLocaleString('en');
                                                                                    }
                                                                                </script>
                                                                                <div class="col-sm-3">
                                                                                    <label class="col-form-label"
                                                                                        for="durasi_kontrak">Durasi Kontrak
                                                                                        (Hitungan Bulan) Contoh : 6</label>
                                                                                    <input type="number"
                                                                                        class="form-control"
                                                                                        id="durasi_kontrak"
                                                                                        name="durasi_kontrak"
                                                                                        value="{{ $seleksi_dalam_proses->durasi_kontrak }}"
                                                                                        onkeyup="formatNumber4(this)">
                                                                                </div>



                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <div class="col-sm-6">
                                                                                    <label class="col-form-label"
                                                                                        for="employer_id">Employer</label>
                                                                                    <select name="employer_id"
                                                                                        id="employer_id"
                                                                                        class="form-control">
                                                                                        @foreach ($employer as $p)
                                                                                            <option
                                                                                                value="{{ $p->id }}"
                                                                                                {{ $p->id == $seleksi_dalam_proses->employer_id ? 'selected' : '' }}>
                                                                                                {{ $p->nama_employer }}
                                                                                            </option>
                                                                                        @endforeach
                                                                                    </select>

                                                                                </div>


                                                                                <div class="col-sm-6">
                                                                                    <label class="col-form-label"
                                                                                        for="alamat_employer">Alamat
                                                                                        Employer</label>
                                                                                    <input readonly type="text"
                                                                                        class="form-control"
                                                                                        id="alamat_employer"
                                                                                        name="alamat_employer"
                                                                                        value="{{ $seleksi_dalam_proses->alamat_agency }}">
                                                                                </div>



                                                                            </div>

                                                                            <div class="form-group row">
                                                                                <div class="col-sm-6">
                                                                                    <label class="col-form-label"
                                                                                        for="agency_id">Agency</label>
                                                                                    <select name="agency_id"
                                                                                        id="agency_id"
                                                                                        class="form-control">
                                                                                        <option value="">--Pilih
                                                                                            Agency--</option>
                                                                                        @foreach ($agency as $p)
                                                                                            <option
                                                                                                value="{{ $p->id }}"
                                                                                                {{ $p->id == $seleksi_dalam_proses->agency_id ? 'selected' : '' }}>
                                                                                                {{ $p->nama_agency }}
                                                                                            </option>
                                                                                        @endforeach
                                                                                    </select>

                                                                                </div>


                                                                                <div class="col-sm-6">
                                                                                    <label class="col-form-label"
                                                                                        for="alamat_agency">Alamat
                                                                                        Agency</label>
                                                                                    <input readonly type="text"
                                                                                        class="form-control"
                                                                                        id="alamat_agency"
                                                                                        name="alamat_agency"
                                                                                        value="{{ $seleksi_dalam_proses->alamat_agency }}">
                                                                                </div>



                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>


                                                            <div class="tab-pane" id="status" role="tabpanel">
                                                                <div class="modal-content">
                                                                    <div class="modal-body">
                                                                        <div class="card-block">
                                                                            <div class="card-block">
                                                                                <div class="form-group row">
                                                                                    <div class="col-sm-3">
                                                                                        <label class="col-form-label"
                                                                                            for="tanggal_ak">Tanggal
                                                                                            Appointment Kedutaan</label>
                                                                                        <input type="date"
                                                                                            class="form-control"
                                                                                            id="tanggal_ak"
                                                                                            name="tanggal_ak"
                                                                                            value="{{ $seleksi_dalam_proses->tanggal_ak }}">
                                                                                    </div>
                                                                                    <div class="col-sm-3">
                                                                                        <label class="col-form-label"
                                                                                            for="tanggal_terbit">Tanggal
                                                                                            Visa Terbit</label>
                                                                                        <input type="date"
                                                                                            class="form-control"
                                                                                            id="tanggal_terbit"
                                                                                            name="tanggal_terbit"
                                                                                            value="{{ $seleksi_dalam_proses->tanggal_terbit }}">
                                                                                    </div>
                                                                                    <div class="col-sm-3">
                                                                                        <label class="col-form-label"
                                                                                            for="tanggal_habis">Masa
                                                                                            Berlaku Visa</label>
                                                                                        <input type="date"
                                                                                            class="form-control"
                                                                                            id="tanggal_habis"
                                                                                            name="tanggal_habis"
                                                                                            value="{{ $seleksi_dalam_proses->tanggal_habis }}">
                                                                                    </div>
                                                                                    <div class="col-sm-3">
                                                                                        <label class="col-form-label"
                                                                                            for="tanggal_pengeluaran_paspor">Tanggal
                                                                                            P.A.P</label>
                                                                                        <input type="date"
                                                                                            class="form-control"
                                                                                            id="tanggal_pengeluaran_paspor"
                                                                                            name="tanggal_pengeluaran_paspor"
                                                                                            value="{{ $seleksi_dalam_proses->nama_perusahaan }}">
                                                                                    </div>
                                                                                </div>
                                                                                <br>
                                                                                <div class="form-group row">
                                                                                    <div class="col-sm-4">
                                                                                        <label class="col-form-label"
                                                                                            for="supplier_id">Supplied
                                                                                            By</label>
                                                                                        <input type="text"
                                                                                            class="form-control"
                                                                                            id="supplier_id"
                                                                                            name="supplier_id"
                                                                                            value="{{ $seleksi_dalam_proses->nama_supplier }}">
                                                                                    </div>
                                                                                    <div class="col-sm-4">
                                                                                        <label class="col-form-label"
                                                                                            for="tanggal_berangkat">Tanggal
                                                                                            Keberangkatan</label>
                                                                                        <input type="date"
                                                                                            class="form-control"
                                                                                            id="tanggal_berangkat"
                                                                                            name="tanggal_berangkat"
                                                                                            value="{{ $seleksi_dalam_proses->tanggal_berangkat }}">
                                                                                    </div>
                                                                                    <div class="col-sm-4">
                                                                                        <label class="col-form-label"
                                                                                            for="jam_terbang">Jam
                                                                                            Terbang</label>
                                                                                        <input type="text"
                                                                                            class="form-control"
                                                                                            id="jam_terbang"
                                                                                            name="jam_terbang"
                                                                                            value="{{ $seleksi_dalam_proses->jam_terbang }}">
                                                                                    </div>

                                                                                </div>
                                                                                <br>
                                                                                <div class="form-group row">
                                                                                    <div class="col-sm-12">
                                                                                        <h4 class="sub-title">Status Dalam
                                                                                            Proses Pada Proses Seleksi</h4>
                                                                                        <div
                                                                                            class="border-checkbox-section">
                                                                                            <div
                                                                                                class="border-checkbox-group border-checkbox-group-success">
                                                                                                <input disabled
                                                                                                    class="border-checkbox"
                                                                                                    type="checkbox"
                                                                                                    id="mik"
                                                                                                    name="mik"
                                                                                                    value="{{ $seleksi_dalam_proses->mik }}"
                                                                                                    {{ $seleksi_dalam_proses->mik == '1' ? 'checked' : '' }}>
                                                                                                <label
                                                                                                    class="border-checkbox-label"
                                                                                                    for="mik">Menunggu
                                                                                                    Izin Kerja</label>
                                                                                            </div>



                                                                                            <div
                                                                                                class="border-checkbox-group border-checkbox-group-success">
                                                                                                <input disabled
                                                                                                    class="border-checkbox"
                                                                                                    type="checkbox"
                                                                                                    id="iktt"
                                                                                                    name="iktt"
                                                                                                    value="{{ $seleksi_dalam_proses->iktt }}"
                                                                                                    {{ $seleksi_dalam_proses->iktt == '1' ? 'checked' : '' }}>
                                                                                                <label
                                                                                                    class="border-checkbox-label"
                                                                                                    for="iktt">Izin
                                                                                                    Kerja Telah
                                                                                                    Terbit</label>
                                                                                            </div>

                                                                                            <div
                                                                                                class="border-checkbox-group border-checkbox-group-success">
                                                                                                <input disabled
                                                                                                    class="border-checkbox"
                                                                                                    type="checkbox"
                                                                                                    id="mjk"
                                                                                                    name="mjk"
                                                                                                    value="{{ $seleksi_dalam_proses->mjk }}"
                                                                                                    {{ $seleksi_dalam_proses->mjk == '1' ? 'checked' : '' }}>
                                                                                                <label
                                                                                                    class="border-checkbox-label"
                                                                                                    for="mjk">Menunggu
                                                                                                    Jadwal Kedutaan</label>
                                                                                            </div>

                                                                                            <div
                                                                                                class="border-checkbox-group border-checkbox-group-success">
                                                                                                <input disabled
                                                                                                    class="border-checkbox"
                                                                                                    type="checkbox"
                                                                                                    id="jak"
                                                                                                    name="jak"
                                                                                                    value="{{ $seleksi_dalam_proses->jak }}"
                                                                                                    {{ $seleksi_dalam_proses->jak == '1' ? 'checked' : '' }}>
                                                                                                <label
                                                                                                    class="border-checkbox-label"
                                                                                                    for="jak">Jadwal
                                                                                                    Appointment
                                                                                                    Kedutaan</label>
                                                                                            </div>



                                                                                            <div
                                                                                                class="border-checkbox-group border-checkbox-group-success">
                                                                                                <input disabled
                                                                                                    class="border-checkbox"
                                                                                                    type="checkbox"
                                                                                                    id="vt"
                                                                                                    name="vt"
                                                                                                    value="{{ $seleksi_dalam_proses->vt }}"
                                                                                                    {{ $seleksi_dalam_proses->vt == '1' ? 'checked' : '' }}>
                                                                                                <label
                                                                                                    class="border-checkbox-label"
                                                                                                    for="vt">Visa
                                                                                                    Terbit</label>
                                                                                            </div>

                                                                                            <div
                                                                                                class="border-checkbox-group border-checkbox-group-success">
                                                                                                <input disabled
                                                                                                    class="border-checkbox"
                                                                                                    type="checkbox"
                                                                                                    id="vd"
                                                                                                    name="vd"
                                                                                                    value="{{ $seleksi_dalam_proses->vd }}"
                                                                                                    {{ $seleksi_dalam_proses->vd == '1' ? 'checked' : '' }}>
                                                                                                <label
                                                                                                    class="border-checkbox-label"
                                                                                                    for="vd">Visa
                                                                                                    Ditolak</label>
                                                                                            </div>

                                                                                            <div
                                                                                                class="border-checkbox-group border-checkbox-group-success">
                                                                                                <input disabled
                                                                                                    class="border-checkbox"
                                                                                                    type="checkbox"
                                                                                                    id="pap"
                                                                                                    name="pap"
                                                                                                    value="{{ $seleksi_dalam_proses->pap }}"
                                                                                                    {{ $seleksi_dalam_proses->pap == '1' ? 'checked' : '' }}>
                                                                                                <label
                                                                                                    class="border-checkbox-label"
                                                                                                    for="pap">P.A.P</label>
                                                                                            </div>

                                                                                        </div>



                                                                                    </div>








                                                                                    <div class="col-sm-12"
                                                                                        style="margin-top: 50px;">
                                                                                        <h4 class="sub-title">Perubahan ID
                                                                                            KTKLN</h4>
                                                                                        <div
                                                                                            class="border-checkbox-section">
                                                                                            <div
                                                                                                class="border-checkbox-group border-checkbox-group-success">
                                                                                                <select
                                                                                                    class="form-control"
                                                                                                    id="id_ktkln"
                                                                                                    name="id_ktkln">
                                                                                                    <option value="Sudah"
                                                                                                        {{ $seleksi_dalam_proses->id_ktkln == 'Sudah' ? 'selected' : '' }}>
                                                                                                        Sudah</option>
                                                                                                    <option value="Belum"
                                                                                                        {{ $seleksi_dalam_proses->id_ktkln == 'Belum' ? 'selected' : '' }}>
                                                                                                        Belum</option>
                                                                                                </select>
                                                                                            </div>




                                                                                        </div>
                                                                                    </div>
                                                                                </div>



                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>


                                                            <div class="tab-pane active" id="pembayaran" role="tabpanel">
                                                                <div class="modal-content">
                                                                    <div class="modal-body">
                                                                        <div class="card-block">
                                                                            <div class="form-group row">
                                                                                <div class="col-sm-3">
                                                                                    <label class="col-form-label"
                                                                                        for="bayar_cf">Commitment
                                                                                        Fee</label>
                                                                                    <input readonly type="text"
                                                                                        class="form-control"
                                                                                        id="bayar_cf" name="bayar_cf"
                                                                                        value="{{ number_format($seleksi_dalam_proses->bayar_cf, 0, ',', ',') }}">
                                                                                </div>
                                                                                <div class="col-sm-3">
                                                                                    <label class="col-form-label"
                                                                                        for="biaya_penempatan">Biaya
                                                                                        Penempatan</label>
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        id="biaya_penempatan"
                                                                                        name="biaya_penempatan"
                                                                                        value="{{ number_format($seleksi_dalam_proses->biaya_penempatan, 0, ',', ',') }}"
                                                                                        oninput="formatNumber2(this)"
                                                                                        onchange="hitungTotalBiaya()">
                                                                                    <script>
                                                                                        function formatNumber2(input) {
                                                                                            // Menghapus semua karakter selain angka
                                                                                            var num = input.value.replace(/\D/g, '');

                                                                                            // Menambahkan separator ribuan setiap 3 digit
                                                                                            var formattedNum = num.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',');

                                                                                            // Memasukkan hasil format kembali ke input
                                                                                            input.value = formattedNum;
                                                                                        }
                                                                                    </script>
                                                                                </div>


                                                                                <div class="col-sm-6">
                                                                                    <label class="col-form-label"
                                                                                        for="total_biaya">Total
                                                                                        Biaya</label>
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        id="total_biaya"
                                                                                        name="total_biaya"
                                                                                        value="{{ number_format($seleksi_dalam_proses->total_biaya, 0, ',', ',') }}"
                                                                                        readonly>
                                                                                </div>

                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <div class="col-sm-6">
                                                                                    <label class="col-form-label"
                                                                                        for="total_bayar">Total
                                                                                        Bayar</label>
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        id="total_bayar"
                                                                                        name="total_bayar"
                                                                                        value="{{ number_format($detail_bayar->sum('jumlah_bayar') - $refund_detail_bayar->sum('jumlah_bayar_refund'), 0, ',', ',') }}"
                                                                                        readonly>
                                                                                </div>
                                                                                <div class="col-sm-6">
                                                                                    <label class="col-form-label"
                                                                                        for="sisa_bayar">Sisa Bayar</label>
                                                                                    <?php
                                                                                    $totalBiaya = $seleksi_dalam_proses->total_biaya + $refund_detail_bayar->sum('jumlah_bayar_refund');
                                                                                    $totalBayar = $detail_bayar->sum('jumlah_bayar');
                                                                                    $sisaBayar = $totalBiaya - $totalBayar;
                                                                                    ?>
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        id="sisa_bayar" name="sisa_bayar"
                                                                                        value="{{ number_format($sisaBayar, 0, ',', ',') }}"
                                                                                        readonly>
                                                                                </div>

                                                                            </div>

                                                                            <script>
                                                                                function hitungTotalBiaya() {
                                                                                    // Ambil nilai dari input biaya_penempatan, biaya_id, dan biaya_mcu
                                                                                    var biaya_penempatan = document.getElementById('biaya_penempatan').value.replace(/[.,]/g, '');

                                                                                    // Konversi nilai biaya_penempatan menjadi float
                                                                                    biaya_penempatan = parseFloat(biaya_penempatan);

                                                                                    var bayar_cf = document.getElementById('bayar_cf').value.replace(/[.,]/g, '');

                                                                                    // Konversi nilai bayar_cf menjadi float
                                                                                    bayar_cf = parseFloat(bayar_cf);

                                                                                    var biaya_id = parseFloat(document.getElementById('biaya_id').value.replace(/[^0-9,]/g, '').replace(',', '.'));
                                                                                    var biaya_mcu = parseFloat(document.getElementById('biaya_mcu').value.replace(/[^0-9,]/g, '').replace(',',
                                                                                        '.'));

                                                                                    // Hitung total biaya
                                                                                    var total_biaya = biaya_penempatan - bayar_cf;

                                                                                    // Tampilkan total biaya pada input total_biaya
                                                                                    document.getElementById('total_biaya').value = formatRupiah(total_biaya, 'Rp ');
                                                                                }

                                                                                // Fungsi untuk memformat angka ke format rupiah
                                                                                function formatRupiah(angka, prefix) {
                                                                                    var number_string = angka.toString().replace(/[^,\d]/g, ''),
                                                                                        split = number_string.split(','),
                                                                                        sisa = split[0].length % 3,
                                                                                        rupiah = split[0].substr(0, sisa),
                                                                                        ribuan = split[0].substr(sisa).match(/\d{3}/gi);

                                                                                    // tambahkan titik jika yang di input sudah menjadi angka ribuan
                                                                                    if (ribuan) {
                                                                                        separator = sisa ? '.' : '';
                                                                                        rupiah += separator + ribuan.join('.');
                                                                                    }

                                                                                    rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
                                                                                    return prefix == undefined ? rupiah : (rupiah ? rupiah : '');
                                                                                }
                                                                            </script>


                                                                            <hr>



                                                                            <div class="form-group row">
                                                                                <div class="col-sm-6">
                                                                                    <label class="col-form-label"
                                                                                        for="biaya_mcu">Biaya MCU</label>
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        id="biaya_mcu" name="biaya_mcu"
                                                                                        value="{{ number_format($seleksi_dalam_proses->biaya_mcu, 0, ',', '.') }}"
                                                                                        oninput="formatNumber3(this)"
                                                                                        onchange="hitungTotalBiaya()">
                                                                                </div>
                                                                                <div class="col-sm-6">
                                                                                    <label class="col-form-label"
                                                                                        for="biaya_id">Biaya ID</label>
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        id="biaya_id" name="biaya_id"
                                                                                        value="{{ number_format($seleksi_dalam_proses->biaya_id, 0, ',', '.') }}"
                                                                                        oninput="formatNumber3(this)"
                                                                                        onchange="hitungTotalBiaya()">
                                                                                </div>
                                                                            </div>

                                                                            <script>
                                                                                function formatNumber3(input) {
                                                                                    // Menghapus semua karakter selain angka
                                                                                    var num = input.value.replace(/\D/g, '');

                                                                                    // Menambahkan separator ribuan setiap 3 digit
                                                                                    var formattedNum = num.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',');

                                                                                    // Memasukkan hasil format kembali ke input
                                                                                    input.value = formattedNum;
                                                                                }
                                                                            </script>
                                                                            <div class="form-group row">
                                                                                <div class="col-sm-12">
                                                                                    <label class="col-form-label"
                                                                                        for="biaya_mcu">Keterangan</label>
                                                                                    <textarea name="keterangan" id="keterangan" cols="30" rows="3" class="form-control">{{ $seleksi_dalam_proses->keterangan }}</textarea>
                                                                                </div>



                                                                            </div>



                                                                            <hr>
                                                                            <br>
                                                                            <h5>Pembayaran</h5>

                                                                            <a href="" data-toggle="modal"
                                                                                data-target="#ubahStatusModal"
                                                                                class="btn btn-success waves-effect waves-light mt-3"
                                                                                style="background-color: #00324F; color: #fff; font-size: 12px;float: left; "
                                                                                title="Tambah Pembayaran">
                                                                                <i class="fa fa-plus-circle"></i>
                                                                                Tambah Pembayaran</a>

                                                                            <br><br>
                                                                            <div class="dt-responsive table-responsive">
                                                                                <table id="order-table"
                                                                                    class="table table-striped table-bordered nowrap">
                                                                                    <thead>
                                                                                        <tr>
                                                                                            <th width="5%">No</th>
                                                                                            <th width="10%">Tanggal
                                                                                                Bayar</th>
                                                                                            <th width="10%">Jumlah Bayar
                                                                                            </th>
                                                                                            <th width="5%"
                                                                                                class="text-center">Bukti
                                                                                                Bayar</th>
                                                                                            <th width="10%">Aksi</th>
                                                                                        </tr>
                                                                                    </thead>
                                                                                    <tbody>
                                                                                        @foreach ($detail_bayar as $p)
                                                                                            <tr>
                                                                                                <td>{{ $loop->iteration }}
                                                                                                </td>
                                                                                                <td>{{ $p->tanggal_bayar }}
                                                                                                </td>
                                                                                                <td>Rp.
                                                                                                    {{ number_format($p->jumlah_bayar, 0, ',', ',') }}
                                                                                                </td>
                                                                                                <td
                                                                                                    class="text-center d-flex">
                                                                                                    <a href="/upload/bukti_bayar/{{ $p->bukti_bayar }}"
                                                                                                        target="_blank">
                                                                                                        <img style="max-width:50px; max-height:50px"
                                                                                                            src="/upload/bukti_bayar/{{ $p->bukti_bayar }}"
                                                                                                            alt="">
                                                                                                    </a>
                                                                                                </td>
                                                                                                <td>
                                                                                                    <a href="#"
                                                                                                        data-id="{{ $p->id }}"
                                                                                                        class="btn btn-sm btn-danger btn-hapus"
                                                                                                        style="color: white">
                                                                                                        <i
                                                                                                            class="fas fa-trash-alt"></i>
                                                                                                        Delete
                                                                                                    </a>
                                                                                                </td>
                                                                                            </tr>
                                                                                        @endforeach
                                                                                    </tbody>
                                                                                    <tfoot>
                                                                                        <tr>
                                                                                            <th colspan="2"></th>
                                                                                            <th>Rp.
                                                                                                {{ number_format($detail_bayar->sum('jumlah_bayar'), 0, ',', ',') }}
                                                                                            </th>
                                                                                            <th></th>
                                                                                            <th></th>
                                                                                        </tr>
                                                                                    </tfoot>
                                                                                </table>

                                                                            </div>
                                                                            <br>
                                                                            <hr>
                                                                            <br>
                                                                            <h5>Refund Pembayaran</h5>
                                                                            <a href="" data-toggle="modal"
                                                                                data-target="#ubahStatusModalRefund"
                                                                                class="btn btn-success waves-effect waves-light mt-3"
                                                                                style="background-color: #00324F; color: #fff; font-size: 12px;float: left; "
                                                                                title="Tambah Refund Pembayaran">
                                                                                <i class="fa fa-plus-circle"></i>
                                                                                Tambah Refund Pembayaran</a>

                                                                            <br><br>
                                                                            <div class="dt-responsive table-responsive">
                                                                                <table id="order-table2"
                                                                                    class="table table-striped table-bordered nowrap">
                                                                                    <thead>
                                                                                        <tr>
                                                                                            <th width="5%">No</th>
                                                                                            <th width="10%">Tanggal
                                                                                                Bayar Refund</th>
                                                                                            <th width="10%">Jumlah Bayar
                                                                                                Refund
                                                                                            </th>
                                                                                            <th width="5%"
                                                                                                class="text-center">Bukti
                                                                                                Bayar Refund</th>
                                                                                            <th width="10%">Aksi</th>
                                                                                        </tr>
                                                                                    </thead>
                                                                                    <tbody>
                                                                                        @foreach ($refund_detail_bayar as $p)
                                                                                            <tr>
                                                                                                <td>{{ $loop->iteration }}
                                                                                                </td>
                                                                                                <td>{{ $p->tanggal_bayar_refund }}
                                                                                                </td>
                                                                                                <td>Rp.
                                                                                                    {{ number_format($p->jumlah_bayar_refund, 0, ',', ',') }}
                                                                                                </td>
                                                                                                <td
                                                                                                    class="text-center d-flex">
                                                                                                    <a href="/upload/bukti_bayar_refund/{{ $p->bukti_bayar_refund }}"
                                                                                                        target="_blank">
                                                                                                        <img style="max-width:50px; max-height:50px"
                                                                                                            src="/upload/bukti_bayar_refund/{{ $p->bukti_bayar_refund }}"
                                                                                                            alt="">
                                                                                                    </a>
                                                                                                </td>
                                                                                                <td>
                                                                                                    <a href="#"
                                                                                                        data-id="{{ $p->id }}"
                                                                                                        class="btn btn-sm btn-danger btn-hapus-refund"
                                                                                                        style="color: white">
                                                                                                        <i
                                                                                                            class="fas fa-trash-alt"></i>
                                                                                                        Delete
                                                                                                    </a>
                                                                                                </td>
                                                                                            </tr>
                                                                                        @endforeach
                                                                                    </tbody>
                                                                                    <tfoot>
                                                                                        <tr>
                                                                                            <th colspan="2"></th>
                                                                                            <th>Rp.
                                                                                                {{ number_format($refund_detail_bayar->sum('jumlah_bayar_refund'), 0, ',', ',') }}
                                                                                            </th>
                                                                                            <th></th>
                                                                                            <th></th>
                                                                                        </tr>
                                                                                    </tfoot>
                                                                                </table>

                                                                            </div>




                                                                        </div>
                                                                    </div>




                                                                </div>

                                                            </div>

                                                            <div class="tab-pane" id="cf" role="tabpanel">

                                                                <div class="modal-content">

                                                                    <div class="modal-body">
                                                                        <div class="card-block">
                                                                            <h5>COMMITMENT FEE</h5>

                                                                            <div class="form-group row">
                                                                                <div class="col-sm-6">
                                                                                    <label class="col-form-label"
                                                                                        for="bayar_cf">Bayar Commitment
                                                                                        Fee</label>
                                                                                    <input readonly type="text"
                                                                                        class="form-control"
                                                                                        id="bayar_cf" name="bayar_cf"
                                                                                        onkeyup="formatNumber(this)"
                                                                                        value="{{ number_format($seleksi_dalam_proses->bayar_cf, 0, ',', ',') }}">

                                                                                    <script>
                                                                                        function formatNumber(input) {
                                                                                            // Menghapus semua karakter selain angka
                                                                                            var num = input.value.replace(/\D/g, '');

                                                                                            // Menambahkan separator ribuan setiap 3 digit
                                                                                            var formattedNum = num.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',');

                                                                                            // Memasukkan hasil format kembali ke input
                                                                                            input.value = formattedNum;
                                                                                        }
                                                                                    </script>

                                                                                </div>
                                                                                <div class="col-sm-6">
                                                                                    <label class="col-form-label"
                                                                                        for="tanggal_tf_cf">Tanggal
                                                                                        Transfer</label>
                                                                                    <input readonly type="date"
                                                                                        class="form-control"
                                                                                        id="tanggal_tf_cf"
                                                                                        name="tanggal_tf_cf"
                                                                                        value="{{ $seleksi_dalam_proses->tanggal_tf_cf }}">
                                                                                </div>
                                                                            </div>

                                                                            <div class="form-group row">
                                                                                <div class="col-sm-3">
                                                                                    <label class="col-form-label"
                                                                                        for="bukti_tf_cf">Upload
                                                                                        Transfer</label>
                                                                                    <input type="file"
                                                                                        class="form-control"
                                                                                        id="bukti_tf_cf"
                                                                                        name="bukti_tf_cf">
                                                                                </div>
                                                                                <div class="col-sm-3">
                                                                                    <label class="col-form-label"
                                                                                        for="bukti_tf_cf">Bukti
                                                                                        Transfer</label>
                                                                                    <br>
                                                                                    <a href="/upload/bukti_tf_cf/{{ $seleksi_dalam_proses->bukti_tf_cf }}"
                                                                                        target="_blank"><img
                                                                                            title="Bukti Transfer"
                                                                                            src="/upload/bukti_tf_cf/{{ $seleksi_dalam_proses->bukti_tf_cf }}"
                                                                                            alt="" width="30px"
                                                                                            height="30px"></a>

                                                                                </div>
                                                                                <div class="col-sm-6">
                                                                                    <label class="col-form-label"
                                                                                        for="status_paid_cf">Status
                                                                                        Paid</label>
                                                                                    <select name="status_paid_cf"
                                                                                        id="status_paid_cf"
                                                                                        class="form-control" readonly>
                                                                                        <option value="Unpaid"
                                                                                            {{ $seleksi_dalam_proses->status_paid_cf == 'Unpaid' ? 'selected' : '' }}>
                                                                                            Unpaid</option>
                                                                                        <option value="Paid"
                                                                                            {{ $seleksi_dalam_proses->status_paid_cf == 'Paid' ? 'selected' : '' }}>
                                                                                            Paid</option>
                                                                                    </select>


                                                                                </div>
                                                                            </div>
                                                                            <hr>
                                                                            <h5>REFUND COMMITMENT FEE</h5>
                                                                            <div class="form-group row">
                                                                                <div class="col-sm-6">
                                                                                    <label class="col-form-label"
                                                                                        for="tanggal_refund_cf">Tanggal
                                                                                        Refund</label>
                                                                                    <input readonly type="date"
                                                                                        class="form-control"
                                                                                        id="tanggal_refund_cf"
                                                                                        name="tanggal_refund_cf"
                                                                                        value="{{ $seleksi_dalam_proses->tanggal_refund_cf }}">
                                                                                </div>

                                                                                <div class="col-sm-6">
                                                                                    <label class="col-form-label"
                                                                                        for="bayar_refund_cf">Jumlah
                                                                                        Refund</label>
                                                                                    <input readonly type="text"
                                                                                        class="form-control"
                                                                                        id="bayar_refund_cf"
                                                                                        name="bayar_refund_cf"
                                                                                        onkeyup="formatNumber(this)"
                                                                                        value="{{ number_format($seleksi_dalam_proses->bayar_refund_cf, 0, ',', ',') }}">
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
                                                                id="btn-update-seleksi" style="float: right;">
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


                <!-- Modal -->
                <div class="modal fade" id="ubahStatusModal" tabindex="-1" role="dialog"
                    aria-labelledby="ubahStatusModalLabel" aria-hidden="true">
                    <!-- Add your form with combo box for status update -->
                    <form action="{{ route('back-office.seleksi.tambahPembayaran') }}" id="form-pembayaran" method="post"
                        enctype="multipart/form-data">
                        @csrf <!-- Tambahkan token CSRF -->
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="ubahStatusModalLabel">
                                        Tambah Pembayaran</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">

                                    <!-- Combo box for status update -->
                                    <input type="hidden" id="seleksi_id" name="seleksi_id"
                                        value="{{ $seleksi_dalam_proses->id }}">
                                    <div class="form-group">
                                        <label for="tanggal_bayar">Tanggal
                                            Bayar :</label>
                                        <input type="date" class="form-control" id="tanggal_bayar"
                                            name="tanggal_bayar" value="<?= date('Y-m-d') ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="jumlah_bayar">Jumlah
                                            Bayar :</label>
                                        <input type="text" class="form-control" id="jumlah_bayar"
                                            name="jumlah_bayar">
                                    </div>
                                    <script>
                                        document.getElementById('jumlah_bayar').addEventListener('input', function(evt) {
                                            var input = evt.target;
                                            var value = input.value.replace(/\D/g, ''); // Menghapus semua karakter non-digit
                                            var formattedValue = formatNumber(value); // Memformat angka dengan pemisah

                                            input.value = formattedValue;
                                        });

                                        function formatNumber(number) {
                                            return number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","); // Menambahkan pemisah setiap 3 digit
                                        }
                                    </script>
                                    <div class="form-group">
                                        <label for="bukti_bayar">Bukti
                                            Bayar :</label>
                                        <input type="file" class="form-control" id="bukti_bayar"
                                            name="bukti_bayar">
                                    </div>
                                    <!-- Add hidden input for the Pendaftaran ID -->


                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i
                                            class="fas fa-undo"></i>
                                        Tutup</button>
                                    <button type="submit" id="btn-save-pembayaran" class="btn btn-primary"><i
                                            class="fas fa-save"></i>
                                        Simpan</button>
                                </div>

                            </div>
                        </div>
                    </form>
                </div>


                <!-- Modal -->
                <div class="modal fade" id="ubahStatusModalRefund" tabindex="-1" role="dialog"
                    aria-labelledby="ubahStatusModalLabelRefund" aria-hidden="true">
                    <!-- Add your form with combo box for status update -->
                    <form action="{{ route('back-office.seleksi.tambahPembayaranRefund') }}" id="form-pembayaran-refund" method="post"
                        enctype="multipart/form-data">
                        @csrf <!-- Tambahkan token CSRF -->
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="ubahStatusModalLabelRefund">
                                        Tambah Pembayaran Refund</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">

                                    <!-- Combo box for status update -->
                                    <input type="hidden" id="seleksi_id" name="seleksi_id"
                                        value="{{ $seleksi_dalam_proses->id }}">
                                    <div class="form-group">
                                        <label for="tanggal_bayar_refund">Tanggal
                                            Bayar Refund :</label>
                                        <input type="date" class="form-control" id="tanggal_bayar_refund"
                                            name="tanggal_bayar_refund" value="<?= date('Y-m-d') ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="jumlah_bayar_refund">Jumlah
                                            Bayar Refund :</label>
                                        <input type="text" class="form-control" id="jumlah_bayar_refund"
                                            name="jumlah_bayar_refund">
                                    </div>
                                    <script>
                                        document.getElementById('jumlah_bayar_refund').addEventListener('input', function(evt) {
                                            var input = evt.target;
                                            var value = input.value.replace(/\D/g, ''); // Menghapus semua karakter non-digit
                                            var formattedValue = formatNumber(value); // Memformat angka dengan pemisah

                                            input.value = formattedValue;
                                        });

                                        function formatNumber(number) {
                                            return number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","); // Menambahkan pemisah setiap 3 digit
                                        }
                                    </script>
                                    <div class="form-group">
                                        <label for="bukti_bayar_refund">Bukti
                                            Bayar Refund :</label>
                                        <input type="file" class="form-control" id="bukti_bayar_refund"
                                            name="bukti_bayar_refund">
                                    </div>
                                    <!-- Add hidden input for the Pendaftaran ID -->


                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i
                                            class="fas fa-undo"></i>
                                        Tutup</button>
                                    <button type="submit" id="btn-save-pembayaran-refund" class="btn btn-primary"><i
                                            class="fas fa-save"></i>
                                        Simpan</button>
                                </div>

                            </div>
                        </div>
                    </form>
                </div>






            @endsection




            @push('script')
                @include('back.layouts.js_datatables')


                <script>
                    document.addEventListener("DOMContentLoaded", function() {
                        var agencySelect = document.getElementById('agency_id');
                        var employerSelect = document.getElementById('employer_id');
                        var alamatAgencyInput = document.getElementById('alamat_agency');
                        var alamatEmployerInput = document.getElementById('alamat_employer');

                        // Fungsi untuk mengambil alamat dari server
                        function getAlamat(url, id, targetInput) {
                            var xhr = new XMLHttpRequest();
                            xhr.onreadystatechange = function() {
                                if (xhr.readyState === XMLHttpRequest.DONE) {
                                    if (xhr.status === 200) {
                                        var response = JSON.parse(xhr.responseText);
                                        targetInput.value = response.alamat;
                                    } else {
                                        // Handling error jika diperlukan
                                    }
                                }
                            };
                            xhr.open('GET', url + id);
                            xhr.send();
                        }

                        // Memanggil fungsi saat halaman dimuat
                        getAlamat(`${baseUrl}/getAgencyAlamat/`, agencySelect.value, alamatAgencyInput);
                        getAlamat(`${baseUrl}/getEmployerAlamat/`, employerSelect.value, alamatEmployerInput);

                        // Event listener untuk select agency
                        agencySelect.addEventListener('change', function() {
                            var agencyId = this.value;
                            if (agencyId !== '') {
                                getAlamat(`${baseUrl}/getAgencyAlamat/`, agencyId, alamatAgencyInput);
                            } else {
                                alamatAgencyInput.value = '';
                            }
                        });

                        // Event listener untuk select employer
                        employerSelect.addEventListener('change', function() {
                            var employerId = this.value;
                            if (employerId !== '') {
                                getAlamat(`${baseUrl}/getEmployerAlamat/`, employerId, alamatEmployerInput);
                            } else {
                                alamatEmployerInput.value = '';
                            }
                        });
                    });
                </script>





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


                <script>
                    $(document).ready(function() {
                        $('#order-table3').DataTable();
                        $('#order-table2').DataTable();
                        // Sembunyikan tabel kedua saat halaman dimuat

                    });
                </script>

                {{-- TAMBAH --}}
                <script>
                    $(document).ready(function() {
                        $('#btn-save-pembayaran').click(function() {
                            event.preventDefault();
                            const tombolSimpan = $(this);
                            var form = $('#form-pembayaran');
                            $.ajax({
                                url: form.attr('action'),
                                type: 'POST',
                                data: new FormData(form[0]),
                                contentType: false,
                                beforeSend: function(xhr) {
                                    xhr.setRequestHeader('X-CSRF-TOKEN', $('meta[name="csrf-token"]').attr(
                                        'content'));
                                    $('form').find('.error-message').remove()
                                    tombolSimpan.prop('disabled', true)
                                },
                                processData: false,
                                success: function(response) {
                                    $('#ubahStatusModal').modal(
                                        'hide'); // Sembunyikan modal setelah berhasil disimpan
                                    Swal.fire({
                                        title: 'Sukses!',
                                        text: response.message,
                                        icon: 'success',
                                        confirmButtonText: 'OK'
                                    }).then(function() {

                                        location.reload();

                                    });
                                },
                                complete: function() {
                                    tombolSimpan.prop('disabled', false);
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



                {{-- TAMBAH REFUND --}}
                <script>
                    $(document).ready(function() {
                        $('#btn-save-pembayaran-refund').click(function() {
                            event.preventDefault();
                            const tombolSimpan = $(this);
                            var form = $('#form-pembayaran-refund');
                            $.ajax({
                                url: form.attr('action'),
                                type: 'POST',
                                data: new FormData(form[0]),
                                contentType: false,
                                beforeSend: function(xhr) {
                                    xhr.setRequestHeader('X-CSRF-TOKEN', $('meta[name="csrf-token"]').attr(
                                        'content'));
                                    $('form').find('.error-message').remove()
                                    tombolSimpan.prop('disabled', true)
                                },
                                processData: false,
                                success: function(response) {
                                    $('#ubahStatusModalRefund').modal(
                                        'hide'); // Sembunyikan modal setelah berhasil disimpan
                                    Swal.fire({
                                        title: 'Sukses!',
                                        text: response.message,
                                        icon: 'success',
                                        confirmButtonText: 'OK'
                                    }).then(function() {

                                        location.reload();

                                    });
                                },
                                complete: function() {
                                    tombolSimpan.prop('disabled', false);
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



                {{-- HAPUS DATA --}}
                <script>
                    $(document).ready(function() {
                        $('.btn-hapus').click(function(e) {
                            e.preventDefault();
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
                                        url: `${baseUrl}/hapus-detail-bayar/${id}`,
                                        type: 'GET',
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

                {{-- HAPUS DATA --}}
                <script>
                    $(document).ready(function() {
                        $('.btn-hapus-refund').click(function(e) {
                            e.preventDefault();
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
                                        url: `${baseUrl}/hapus-detail-bayar-refund/${id}`,
                                        type: 'GET',
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


                <script>
                    // Fungsi untuk mengambil nilai total bayar dari tabel dan memasukkannya ke dalam input
                    function updateTotalBayar() {
                        var totalBayar = 0;
                        $('#order-table tbody tr').each(function() {
                            var jumlahBayar = $(this).find('td:nth-child(3)').text().replace('Rp. ', '').replace(',', '')
                                .trim();
                            totalBayar += parseFloat(jumlahBayar);
                        });
                        $('#total_bayar').val(formatRupiah(totalBayar));
                    }

                    // Fungsi untuk memformat angka menjadi format Rupiah
                    function formatRupiah(angka) {
                        var reverse = angka.toString().split('').reverse().join(''),
                            ribuan = reverse.match(/\d{1,3}/g);
                        ribuan = ribuan.join('.').split('').reverse().join('');
                        return ribuan;
                    }

                    // Panggil fungsi saat halaman dimuat
                    $(document).ready(function() {
                        updateTotalBayar();
                    });
                </script>


                {{-- PERINTAH UPDATE DATA --}}
                <script>
                    $(document).ready(function() {
                        $('#btn-update-seleksi').click(function(e) {
                            e.preventDefault();
                            const tombolUpdate = $('#btn-update-seleksi');
                            var id = $('#id').val();
                            var formData = new FormData($('#form_verifikasi')[0]);

                            $.ajax({
                                type: 'POST',
                                url: `${baseUrl}/seleksi-dalam-proses/update/${id}`,
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
