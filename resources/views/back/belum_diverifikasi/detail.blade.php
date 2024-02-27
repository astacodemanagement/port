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
                            <h5>Detail Pendaftaran Belum Verifikasi</h5>
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
                            <li class="breadcrumb-item"><a href="#!">Halaman Detail Pendaftaran Belum Verifikasi</a>
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
                                        <h5>Data Detail Pendaftaran Belum Verifikasi : {{ $belum_diverifikasi->nama_lengkap }}</h5>

                                    </div> --}}
                                <div class="card-block">
                                    <div class="card">
                                        <div class="card-block tab-icon">
                                            <div class="row">
                                                <div class="col-lg-12 col-xl-12">
                                                    <ul class="nav nav-tabs md-tabs " role="tablist">
                                                        <li class="nav-item">
                                                            <a class="nav-link active" data-toggle="tab" href="#home7"
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
                                                    </ul>
                                                    <form id="form_job" action="{{ route('simpan_job') }}" method="POST"
                                                        enctype="multipart/form-data">
                                                        @csrf <!-- Tambahkan token CSRF -->
                                                        <div class="tab-content card-block">

                                                            <div class="tab-pane active" id="home7" role="tabpanel">



                                                                <div class="modal-content">

                                                                    <div class="modal-body">
                                                                        <div class="card-block">
                                                                            <div class="form-group row">
                                                                                <div class="col-sm-6">
                                                                                    <label class="col-form-label"
                                                                                        for="nama_job">Nama Negara</label>
                                                                                    <input type="text"
                                                                                        class="form-control form-control-success"
                                                                                        id="" name=""
                                                                                        value="{{ $belum_diverifikasi->nama_negara }}">
                                                                                </div>
                                                                                <div class="col-sm-6">
                                                                                    <label class="col-form-label"
                                                                                        for="tanggal_tutup">Industri
                                                                                        Pekerjaan</label>
                                                                                    <input type="text"
                                                                                        class="form-control form-control-success"
                                                                                        id="" name=""
                                                                                        value="{{ $belum_diverifikasi->nama_kategori_job }}">
                                                                                </div>
                                                                            </div>

                                                                            <div class="form-group row">
                                                                                <div class="col-sm-6">
                                                                                    <label class="col-form-label"
                                                                                        for="gaji">NIK</label>
                                                                                    <input type="text"
                                                                                        class="form-control form-control-success"
                                                                                        id="" name=""
                                                                                        value="{{ $belum_diverifikasi->nik }}">
                                                                                </div>
                                                                                <div class="col-sm-6">
                                                                                    <label class="col-form-label"
                                                                                        for="jenis_pembayaran">Nama
                                                                                        Lengkap</label>
                                                                                    <input type="text"
                                                                                        class="form-control form-control-success"
                                                                                        id="" name=""
                                                                                        value="{{ $belum_diverifikasi->nama_lengkap }}">

                                                                                </div>
                                                                            </div>

                                                                            <div class="form-group row">
                                                                                <div class="col-sm-6">
                                                                                    <label class="col-form-label"
                                                                                        for="estimasi_minimal">Tempat
                                                                                        Lahir</label>
                                                                                    <input type="text"
                                                                                        class="form-control form-control-success"
                                                                                        id="" name=""
                                                                                        value="{{ $belum_diverifikasi->tempat_lahir }}">
                                                                                </div>
                                                                                <div class="col-sm-6">
                                                                                    <label class="col-form-label"
                                                                                        for="estimasi_maksimal">Tanggal
                                                                                        Lahir</label>
                                                                                    <input type="text"
                                                                                        class="form-control form-control-success"
                                                                                        id="" name=""
                                                                                        value="{{ $belum_diverifikasi->tanggal_lahir }}">
                                                                                </div>
                                                                            </div>

                                                                            <div class="form-group row">
                                                                                <div class="col-sm-6">
                                                                                    <label class="col-form-label"
                                                                                        for="estimasi_minimal">Usia</label>
                                                                                    <input type="text"
                                                                                        class="form-control form-control-success"
                                                                                        id="" name=""
                                                                                        value="{{ $belum_diverifikasi->usia }}">
                                                                                </div>
                                                                                <div class="col-sm-6">
                                                                                    <label class="col-form-label"
                                                                                        for="estimasi_maksimal">Agama</label>
                                                                                    <input type="text"
                                                                                        class="form-control form-control-success"
                                                                                        id="" name=""
                                                                                        value="{{ $belum_diverifikasi->agama }}">
                                                                                </div>
                                                                            </div>

                                                                            <div class="form-group row">
                                                                                <div class="col-sm-6">
                                                                                    <label class="col-form-label"
                                                                                        for="estimasi_minimal">Berat
                                                                                        Badan</label>
                                                                                    <input type="text"
                                                                                        class="form-control form-control-success"
                                                                                        id="" name=""
                                                                                        value="{{ $belum_diverifikasi->berat_badan }}">
                                                                                </div>
                                                                                <div class="col-sm-6">
                                                                                    <label class="col-form-label"
                                                                                        for="estimasi_maksimal">Tinggi
                                                                                        Badan</label>
                                                                                    <input type="text"
                                                                                        class="form-control form-control-success"
                                                                                        id="" name=""
                                                                                        value="{{ $belum_diverifikasi->tinggi_badan }}">
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <div class="col-sm-6">
                                                                                    <label class="col-form-label"
                                                                                        for="estimasi_minimal">Jenis
                                                                                        Kelamin</label>
                                                                                    <input type="text"
                                                                                        class="form-control form-control-success"
                                                                                        id="" name=""
                                                                                        value="{{ $belum_diverifikasi->jenis_kelamin }}">
                                                                                </div>
                                                                                <div class="col-sm-6">
                                                                                    <label class="col-form-label"
                                                                                        for="estimasi_maksimal">Status
                                                                                        Kawin</label>
                                                                                    <input type="text"
                                                                                        class="form-control form-control-success"
                                                                                        id="" name=""
                                                                                        value="{{ $belum_diverifikasi->status_kawin }}">
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <div class="col-sm-6">
                                                                                    <label class="col-form-label"
                                                                                        for="estimasi_minimal">Nama Lengkap
                                                                                        Ayah</label>
                                                                                    <input type="text"
                                                                                        class="form-control form-control-success"
                                                                                        id="" name=""
                                                                                        value="{{ $belum_diverifikasi->nama_lengkap_ayah }}">
                                                                                </div>
                                                                                <div class="col-sm-6">
                                                                                    <label class="col-form-label"
                                                                                        for="estimasi_maksimal">Nama
                                                                                        Lengkap Ibu</label>
                                                                                    <input type="text"
                                                                                        class="form-control form-control-success"
                                                                                        id="" name=""
                                                                                        value="{{ $belum_diverifikasi->nama_lengkap_ibu }}">
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <div class="col-sm-12">
                                                                                    <label class="col-form-label"
                                                                                        for="estimasi_minimal">Alamat</label>
                                                                                    <textarea class="form-control form-control-success" name="" id="" cols="30" rows="2">{{ $belum_diverifikasi->nama_lengkap_ayah }}</textarea>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <div class="col-sm-4">
                                                                                    <label class="col-form-label"
                                                                                        for="estimasi_minimal">Kota</label>
                                                                                    <input type="text"
                                                                                        class="form-control form-control-success"
                                                                                        id="" name=""
                                                                                        value="{{ $belum_diverifikasi->kota }}">
                                                                                </div>
                                                                                <div class="col-sm-4">
                                                                                    <label class="col-form-label"
                                                                                        for="estimasi_maksimal">Kecamatan</label>
                                                                                    <input type="text"
                                                                                        class="form-control form-control-success"
                                                                                        id="" name=""
                                                                                        value="{{ $belum_diverifikasi->kecamatan }}">
                                                                                </div>
                                                                                <div class="col-sm-4">
                                                                                    <label class="col-form-label"
                                                                                        for="estimasi_minimal">Provinsi</label>
                                                                                    <input type="text"
                                                                                        class="form-control form-control-success"
                                                                                        id="" name=""
                                                                                        value="{{ $belum_diverifikasi->provinsi }}">
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <div class="col-sm-6">
                                                                                    <label class="col-form-label"
                                                                                        for="estimasi_maksimal">Referensi</label>
                                                                                    <input type="text"
                                                                                        class="form-control form-control-success"
                                                                                        id="" name=""
                                                                                        value="{{ $belum_diverifikasi->referensi }}">
                                                                                </div>
                                                                                <div class="col-sm-6">
                                                                                    <label class="col-form-label"
                                                                                        for="estimasi_maksimal">Nama
                                                                                        Referensi</label>
                                                                                    <input type="text"
                                                                                        class="form-control form-control-success"
                                                                                        id="" name=""
                                                                                        value="{{ $belum_diverifikasi->nama_referensi }}">
                                                                                </div>
                                                                            </div>

                                                                            <div class="form-group row">
                                                                                <div class="col-sm-4">
                                                                                    <label class="col-form-label"
                                                                                        for="estimasi_maksimal">Email</label>
                                                                                    <input type="text"
                                                                                        class="form-control form-control-success"
                                                                                        id="" name=""
                                                                                        value="{{ $belum_diverifikasi->email }}">
                                                                                </div>
                                                                                <div class="col-sm-4">
                                                                                    <label class="col-form-label"
                                                                                        for="estimasi_maksimal">No Telephone</label>
                                                                                    <input type="text"
                                                                                        class="form-control form-control-success"
                                                                                        id="" name=""
                                                                                        value="{{ $belum_diverifikasi->no_hp }}">
                                                                                </div>
                                                                                <div class="col-sm-4">
                                                                                    <label class="col-form-label"
                                                                                        for="estimasi_maksimal">No WA</label>
                                                                                    <input type="text"
                                                                                        class="form-control form-control-success"
                                                                                        id="" name=""
                                                                                        value="{{ $belum_diverifikasi->no_wa }}">
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
                                                                                        for="estimasi_maksimal">No
                                                                                        Paspor</label>
                                                                                    <input type="text"
                                                                                        class="form-control form-control-success"
                                                                                        id="" name=""
                                                                                        value="{{ $belum_diverifikasi->no_paspor }}">
                                                                                </div>
                                                                                <div class="col-sm-6">
                                                                                    <label class="col-form-label"
                                                                                        for="estimasi_maksimal">Tanggal
                                                                                        Pengeluaran Paspor</label>
                                                                                    <input type="text"
                                                                                        class="form-control form-control-success"
                                                                                        id="" name=""
                                                                                        value="{{ $belum_diverifikasi->tanggal_pengeluaran_paspor }}">
                                                                                </div>
                                                                            </div>

                                                                            <div class="form-group row">
                                                                                <div class="col-sm-6">
                                                                                    <label class="col-form-label"
                                                                                        for="estimasi_maksimal">Masa
                                                                                        Kadaluarsa Paspor</label>
                                                                                    <input type="text"
                                                                                        class="form-control form-control-success"
                                                                                        id="" name=""
                                                                                        value="{{ $belum_diverifikasi->masa_kadaluarsa }}">
                                                                                </div>
                                                                                <div class="col-sm-6">
                                                                                    <label class="col-form-label"
                                                                                        for="estimasi_maksimal">Kantor Yang
                                                                                        Mengeluarkan Paspor</label>
                                                                                    <input type="text"
                                                                                        class="form-control form-control-success"
                                                                                        id="" name=""
                                                                                        value="{{ $belum_diverifikasi->kantor_paspor }}">
                                                                                </div>
                                                                            </div>

                                                                            <div class="form-group row">
                                                                                <div class="col-sm-12">
                                                                                    <label class="col-form-label"
                                                                                        for="estimasi_maksimal">Kondisi
                                                                                        Paspor</label>
                                                                                    <input type="text"
                                                                                        class="form-control form-control-success"
                                                                                        id="" name=""
                                                                                        value="{{ $belum_diverifikasi->kondisi_paspor }}">
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
                                                                                        class="form-control form-control-success"
                                                                                        id="" name=""
                                                                                        value="">
                                                                                </div>
                                                                                <div class="col-sm-6">
                                                                                    <label class="col-form-label"
                                                                                        for="estimasi_maksimal">Nama
                                                                                        Perusahaan</label>
                                                                                    <input type="text"
                                                                                        class="form-control form-control-success"
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
                                                                                        class="form-control form-control-success"
                                                                                        id="" name=""
                                                                                        value="">
                                                                                </div>
                                                                                <div class="col-sm-6">
                                                                                    <label class="col-form-label"
                                                                                        for="estimasi_maksimal">Tanggal
                                                                                        Akhir Bekerja</label>
                                                                                    <input type="text"
                                                                                        class="form-control form-control-success"
                                                                                        id="" name=""
                                                                                        value="">
                                                                                </div>
                                                                            </div>

                                                                            <div class="form-group row">
                                                                                <div class="col-sm-12">
                                                                                    <label class="col-form-label"
                                                                                        for="estimasi_maksimal">Posisi</label>
                                                                                    <input type="text"
                                                                                        class="form-control form-control-success"
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
                                                                                        class="form-control form-control-success"
                                                                                        id="" name=""
                                                                                        value="">
                                                                                </div>
                                                                                <div class="col-sm-6">
                                                                                    <label class="col-form-label"
                                                                                        for="estimasi_maksimal">Nama
                                                                                        Perusahaan</label>
                                                                                    <input type="text"
                                                                                        class="form-control form-control-success"
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
                                                                                        class="form-control form-control-success"
                                                                                        id="" name=""
                                                                                        value="">
                                                                                </div>
                                                                                <div class="col-sm-6">
                                                                                    <label class="col-form-label"
                                                                                        for="estimasi_maksimal">Tanggal
                                                                                        Akhir Bekerja</label>
                                                                                    <input type="text"
                                                                                        class="form-control form-control-success"
                                                                                        id="" name=""
                                                                                        value="">
                                                                                </div>
                                                                            </div>

                                                                            <div class="form-group row">
                                                                                <div class="col-sm-12">
                                                                                    <label class="col-form-label"
                                                                                        for="estimasi_maksimal">Posisi</label>
                                                                                    <input type="text"
                                                                                        class="form-control form-control-success"
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
                                                                                            <div class="border-checkbox-group border-checkbox-group-success">
                                                                                                <input class="border-checkbox" type="checkbox" id="ada_ktp" name="ada_ktp[]" value="disediakan_tempat_tinggal" checked>
                                                                                                <label class="border-checkbox-label" for="ada_ktp">KTP</label>
                                                                                            </div>
                                                                                            


                                                                                            <div
                                                                                                class="border-checkbox-group border-checkbox-group-success">
                                                                                                <input
                                                                                                    class="border-checkbox"
                                                                                                    type="checkbox"
                                                                                                    id="ada_kk"
                                                                                                    name="ada_kk[]"
                                                                                                    value="disediakan_tempat_tinggal">
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
                                                                                                    name="ada_akta_lahir[]"
                                                                                                    value="disediakan_tempat_tinggal">
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
                                                                                                    name="ada_ijazah[]"
                                                                                                    value="disediakan_tempat_tinggal">
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
                                                                                                    name="ada_buku_nikah[]"
                                                                                                    value="disediakan_tempat_tinggal">
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
                                                                                                    name="ada_paspor[]"
                                                                                                    value="disediakan_tempat_tinggal">
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
                                                                                            for="paragraf_galeri">Penjelasan Dokumen kelengkapan berkas anda terdapat perbedaan nama/alamat/tempat
                                                                                            tanggal lahir/hilang/rusak/lainnya</label>
                                                                                        <textarea class="form-control form-control-success" name="paragraf_galeri" id="paragraf_galeri" cols="30"
                                                                                            rows="4"></textarea>
                                                                                    </div>
                                                                                </div>
                                                                                <h4 class="sub-title">Upload Dokumen Persyaratan Jati Diri yang dimiliki</h4>
                                                                                <div class="container">
                                                                                    <div class="row">
                                                                                        <div class="col-sm-4">
                                                                                            <div class="form-group">
                                                                                                <label class="col-form-label" for="nama_galeri">Foto</label>
                                                                                                <img src="https://png.pngtree.com/png-vector/20190623/ourmid/pngtree-documentfilepagepenresume-flat-color-icon-vector-png-image_1491048.jpg" alt="">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-sm-4">
                                                                                            <div class="form-group">
                                                                                                <label class="col-form-label" for="nama_galeri">Paspor</label>
                                                                                                <img src="https://png.pngtree.com/png-vector/20190623/ourmid/pngtree-documentfilepagepenresume-flat-color-icon-vector-png-image_1491048.jpg" alt="">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-sm-4">
                                                                                            <div class="form-group">
                                                                                                <label class="col-form-label" for="nama_galeri">KTP</label>
                                                                                                <img src="https://png.pngtree.com/png-vector/20190623/ourmid/pngtree-documentfilepagepenresume-flat-color-icon-vector-png-image_1491048.jpg" alt="">
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="container">
                                                                                    <div class="row">
                                                                                        <div class="col-sm-6">
                                                                                            <div class="form-group">
                                                                                                <label class="col-form-label" for="nama_galeri">Sertifikat Kompetensi</label>
                                                                                                <img src="https://png.pngtree.com/png-vector/20190623/ourmid/pngtree-documentfilepagepenresume-flat-color-icon-vector-png-image_1491048.jpg" alt="">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-sm-6">
                                                                                            <div class="form-group">
                                                                                                <label class="col-form-label" for="nama_galeri">Paklaring</label>
                                                                                                <img src="https://png.pngtree.com/png-vector/20190623/ourmid/pngtree-documentfilepagepenresume-flat-color-icon-vector-png-image_1491048.jpg" alt="">
                                                                                            </div>
                                                                                        </div>
                                                                                        
                                                                                    </div>
                                                                                </div>
                                                                                
                                                                                
 





                                                                            </div>
                                                                        </div>


                                                                    </div>

                                                                </div>
                                                            </div>

                                                            <a href="/belum_diverifikasi"
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









            @endsection




            @push('script')
                <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

                <script type="text/javascript" src="{{ asset('template') }}/files/bower_components/switchery/js/switchery.min.js">
                </script>

                <script type="text/javascript"
                    src="{{ asset('template') }}/files/bower_components/bootstrap-tagsinput/js/bootstrap-tagsinput.js"></script>
            @endpush
