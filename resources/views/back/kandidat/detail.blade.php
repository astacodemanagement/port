@extends('back.layouts.app')
@section('title', 'Halaman Detail Pendaftaran Belum Verifikasi')
@section('subtitle', 'Menu Detail Pendaftaran Belum Verifikasi')
@push('css')
{{-- <link rel="stylesheet" href="{{ asset('template') }}/files/bower_components/select2/css/select2.min.css" />
<link rel="stylesheet" type="text/css" href="{{ asset('template') }}/files/bower_components/bootstrap-multiselect/css/bootstrap-multiselect.css" />
<link rel="stylesheet" type="text/css" href="{{ asset('template') }}/files/bower_components/multiselect/css/multi-select.css" /> --}}


<link rel="stylesheet" type="text/css" href="{{ asset('template') }}/files/assets/icon/font-awesome/css/font-awesome.min.css">

<link rel="stylesheet" type="text/css" href="{{ asset('template') }}/files/bower_components/switchery/css/switchery.min.css">

<link rel="stylesheet" type="text/css" href="{{ asset('template') }}/files/bower_components/bootstrap-tagsinput/css/bootstrap-tagsinput.css" />
@endpush

@section('content')


<div class="pcoded-content">

    <div class="page-header card">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="feather icon-list bg-c-blue"></i>
                    <div class="d-inline">
                        <h5>Detail KANDIDAT</h5>
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
                                                    <a class="nav-link active" data-toggle="tab" href="#data_diri" role="tab"><i class="fas fa-users"></i>Data Diri</a>
                                                    <div class="slide"></div>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" data-toggle="tab" href="#dokumen_ln" role="tab"><i class="fas fa-bookmark"></i>Dokumen
                                                        Luar Negeri</a>
                                                    <div class="slide"></div>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" data-toggle="tab" href="#pengalaman_kerja" role="tab"><i class="fas fa-handshake-o"></i>Pengalaman
                                                        Kerja</a>
                                                    <div class="slide"></div>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" data-toggle="tab" href="#dokumen" role="tab"><i class="fas fa-server"></i>Dokumen</a>
                                                    <div class="slide"></div>
                                                </li>

                                                <li class="nav-item">
                                                    <a class="nav-link" data-toggle="tab" href="#akun" role="tab"><i class="fas fa-user"></i>Akun</a>
                                                    <div class="slide"></div>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" data-toggle="tab" href="#level" role="tab"><i class="fa-solid fa-layer-group"></i>Level
                                                        Bahasa Inggris</a>
                                                    <div class="slide"></div>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" data-toggle="tab" href="#screening" role="tab"><i class="fa-solid fa-question"></i>Pre Screening</a>
                                                    <div class="slide"></div>
                                                </li>
                                            </ul>

                                            <form id="form_verifikasi" action="" method="POST" enctype="multipart/form-data">
                                                @csrf <!-- Tambahkan token CSRF -->
                                                @method('PUT') <!-- Tambahkan method PUT untuk update -->
                                                <input type="hidden" id="id" name="id" value="{{ $detail_kandidat->id }}">
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


                                                                        <input type="hidden" class="form-control" id="negara_id" name="negara_id" value="{{ $belum_diverifikasi->negara_id }}">
                                                                    </div> --}}
                                                                    {{-- <div class="col-sm-12">
                                                                                    <label class="col-form-label"
                                                                                        for="nama_kategori_job">Industri
                                                                                        Industri Pekerjaan</label>
                                                                                    <input type="text" 
                                                                                        class="form-control"
                                                                                        id="nama_kategori_job"
                                                                                        name="nama_kategori_job"
                                                                                        value="{{ $belum_diverifikasi?->kategoriJob?->nama_kategori_job }}">

                                                                    <input type="hidden" class="form-control" id="kategori_job_id" name="kategori_job_id" value="{{ $belum_diverifikasi->kategori_job_id }}">
                                                                </div> --}}
                                                            </div>

                                                            <div class="form-group row">
                                                                <div class="col-sm-6">
                                                                    <label class="col-form-label" for="nik">NIK</label>
                                                                    <input type="text" class="form-control" id="nik" name="nik" value="{{ $detail_kandidat->nik }}">
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <label class="col-form-label" for="nama_lengkap">Nama
                                                                        Lengkap</label>
                                                                    <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" value="{{ $detail_kandidat->nama_lengkap }}">

                                                                </div>
                                                            </div>

                                                            <div class="form-group row">
                                                                <div class="col-sm-6">
                                                                    <label class="col-form-label" for="tempat_lahir">Tempat
                                                                        Lahir</label>
                                                                    <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" value="{{ $detail_kandidat->tempat_lahir }}">
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <label class="col-form-label" for="tanggal_lahir">Tanggal
                                                                        Lahir</label>
                                                                    <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="{{ $detail_kandidat->tanggal_lahir }}">
                                                                </div>
                                                            </div>

                                                            <div class="form-group row">
                                                                <div class="col-sm-6">
                                                                    <label class="col-form-label" for="usia">Usia</label>
                                                                    <input type="number" class="form-control" id="usia" name="usia" value="{{ $detail_kandidat->usia }}">
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <label class="col-form-label" for="agama">Agama</label>

                                                                    <select class="form-control" id="agama" name="agama">
                                                                        <option value="">--Pilih
                                                                            Agama--</option>
                                                                        <option value="Islam" {{ $detail_kandidat->agama == 'Islam' ? 'selected' : '' }}>
                                                                            Islam
                                                                        </option>
                                                                        <option value="Kristen" {{ $detail_kandidat->agama == 'Kristen' ? 'selected' : '' }}>
                                                                            Kristen
                                                                        </option>
                                                                        <option value="Katolik" {{ $detail_kandidat->agama == 'Katolik' ? 'selected' : '' }}>
                                                                            Katolik
                                                                        </option>
                                                                        <option value="Hindu" {{ $detail_kandidat->agama == 'Hindu' ? 'selected' : '' }}>
                                                                            Hindu
                                                                        </option>
                                                                        <option value="Buddha" {{ $detail_kandidat->agama == 'Buddha' ? 'selected' : '' }}>
                                                                            Katolik
                                                                        </option>
                                                                        <option value="Khonghucu" {{ $detail_kandidat->agama == 'Khonghucu' ? 'selected' : '' }}>
                                                                            Khonghucu
                                                                        </option>
                                                                        <option value="Lainnya" {{ $detail_kandidat->agama == 'Lainnya' ? 'selected' : '' }}>
                                                                            Katolik
                                                                        </option>
                                                                    </select>


                                                                </div>
                                                            </div>

                                                            <div class="form-group row">
                                                                <div class="col-sm-6">
                                                                    <label class="col-form-label" for="berat_badan">Berat
                                                                        Badan</label>
                                                                    <input type="number" class="form-control" id="berat_badan" name="berat_badan" value="{{ $detail_kandidat->berat_badan }}">
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <label class="col-form-label" for="tinggi_badan">Tinggi
                                                                        Badan</label>
                                                                    <input type="number" class="form-control" id="tinggi_badan" name="tinggi_badan" value="{{ $detail_kandidat->tinggi_badan }}">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <div class="col-sm-6">
                                                                    <label class="col-form-label" for="jenis_kelamin">Jenis
                                                                        Kelamin</label>
                                                                    <select class="form-control" id="jenis_kelamin" name="jenis_kelamin">
                                                                        <option value="Laki-laki" {{ $detail_kandidat->jenis_kelamin == 'Laki-laki' ? 'selected' : '' }}>
                                                                            Laki-laki</option>
                                                                        <option value="Perempuan" {{ $detail_kandidat->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>
                                                                            Perempuan</option>
                                                                    </select>
                                                                </div>

                                                                <div class="col-sm-6">
                                                                    <label class="col-form-label" for="status_kawin">Status
                                                                        Kawin</label>
                                                                    <input type="text" class="form-control" id="status_kawin" name="status_kawin" value="{{ $detail_kandidat->status_kawin }}">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <div class="col-sm-6">
                                                                    <label class="col-form-label" for="nama_lengkap_ayah">Nama
                                                                        Lengkap
                                                                        Ayah</label>
                                                                    <input type="text" class="form-control" id="nama_lengkap_ayah" name="nama_lengkap_ayah" value="{{ $detail_kandidat->nama_lengkap_ayah }}">
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <label class="col-form-label" for="nama_lengkap_ibu">Nama
                                                                        Lengkap Ibu</label>
                                                                    <input type="text" class="form-control" id="nama_lengkap_ibu" name="nama_lengkap_ibu" value="{{ $detail_kandidat->nama_lengkap_ibu }}">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <div class="col-sm-12">
                                                                    <label class="col-form-label" for="alamat">Alamat</label>
                                                                    <textarea class="form-control" name="alamat" id="alamat" cols="30" rows="2">{{ $detail_kandidat->alamat }}</textarea>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <div class="col-sm-4">
                                                                    <label class="col-form-label" for="provinsi">Provinsi</label>
                                                                    <select name="provinsi_id" class="form-control" id="">

                                                                        <option value="{{ $detail_kandidat->provinsi_id }}">
                                                                            {{ $detail_kandidat->provinsi?->nama_provinsi }}
                                                                        </option>
                                                                        @foreach ($provinsi as $item)
                                                                        <option value="{{ $item->id }}" {{ $detail_kandidat->provinsi_id == $item->id ? 'selected' : '' }}>
                                                                            {{ $item->nama_provinsi }}
                                                                        </option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                                <div class="col-sm-4">
                                                                    <label class="col-form-label" for="kota_id">Kota</label>
                                                                    <select name="kota_id" id="" class="form-control">
                                                                        <option value="{{ $detail_kandidat->kota_id }}">
                                                                            {{ $detail_kandidat->kota?->nama_kota }}
                                                                        </option>
                                                                        @foreach ($kota as $item)
                                                                        <option value="{{ $item->id }}">
                                                                            {{ $item->nama_kota }}
                                                                        </option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                                <div class="col-sm-4">
                                                                    <label class="col-form-label" for="kecamatan_id">Kecamatan</label>
                                                                    <select name="kecamatan_id" id="" class="form-control">
                                                                        <option value="{{ $detail_kandidat->kecamatan_id }}">
                                                                            {{ $detail_kandidat->kecamatan?->nama_kecamatan }}
                                                                        </option>
                                                                        @foreach ($kecamatan as $item)
                                                                        <option value="{{ $item->id }}">
                                                                            {{ $item->nama_kecamatan }}
                                                                        </option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>

                                                            </div>
                                                            <div class="form-group row">
                                                                <div class="col-sm-6">
                                                                    <label class="col-form-label" for="referensi">Referensi</label>
                                                                    <input type="text" class="form-control" id="referensi" name="referensi" value="{{ $detail_kandidat->referensi }}">
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <label class="col-form-label" for="nama_referensi">Nama
                                                                        Referensi</label>
                                                                    <input type="text" class="form-control" id="nama_referensi" name="nama_referensi" value="{{ $detail_kandidat->nama_referensi }}">
                                                                </div>
                                                            </div>

                                                            <div class="form-group row">
                                                                <div class="col-sm-4">
                                                                    <label class="col-form-label" for="email">Email</label>
                                                                    <input type="text" class="form-control" id="email" name="email" value="{{ $detail_kandidat->email }}">
                                                                </div>
                                                                <div class="col-sm-4">
                                                                    <label class="col-form-label" for="no_hp">No
                                                                        Telephone</label>
                                                                    <input type="text" class="form-control" id="no_hp" name="no_hp" value="{{ $detail_kandidat->no_hp }}">
                                                                </div>
                                                                <div class="col-sm-4">
                                                                    <label class="col-form-label" for="no_wa">No
                                                                        WA</label>
                                                                    <input type="text" class="form-control" id="no_wa" name="no_wa" value="{{ $detail_kandidat->no_wa }}">
                                                                </div>
                                                            </div>
                                                            <br><br>
                                                            <h4 class="sub-title"> > Kontak Darurat</h4>
                                                            <div class="form-group row">
                                                                <div class="col-sm-4">
                                                                    <label class="col-form-label" for="nama_keluarga">Nama
                                                                        Keluarga</label>
                                                                    <input type="text" class="form-control" id="nama_keluarga" name="nama_keluarga" value="{{ $detail_kandidat->nama_keluarga }}">
                                                                </div>
                                                                <div class="col-sm-4">
                                                                    <label class="col-form-label" for="hubungan">Hubungan
                                                                        Keluarga</label>
                                                                    <input type="text" class="form-control" id="hubungan" name="hubungan" value="{{ $detail_kandidat->hubungan }}">
                                                                </div>
                                                                <div class="col-sm-4">
                                                                    <label class="col-form-label" for="no_telp_darurat">No
                                                                        Darurat</label>
                                                                    <input type="text" class="form-control" id="no_telp_darurat" name="no_telp_darurat" value="{{ $detail_kandidat->no_telp_darurat }}">
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
                                                                <label class="col-form-label" for="no_paspor">No
                                                                    Paspor</label>
                                                                <input type="text" class="form-control" id="no_paspor" name="no_paspor" value="{{ $detail_kandidat->no_paspor }}">
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <label class="col-form-label" for="tanggal_pengeluaran_paspor">Tanggal
                                                                    Pengeluaran Paspor</label>
                                                                <input type="date" class="form-control" id="tanggal_pengeluaran_paspor" name="tanggal_pengeluaran_paspor" value="{{ $detail_kandidat->tanggal_pengeluaran_paspor }}">
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <div class="col-sm-6">
                                                                <label class="col-form-label" for="masa_kadaluarsa">Masa
                                                                    Kadaluarsa Paspor</label>
                                                                <input type="date" class="form-control" id="masa_kadaluarsa" name="masa_kadaluarsa" value="{{ $detail_kandidat->masa_kadaluarsa }}">
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <label class="col-form-label" for="kantor_paspor">Kantor Yang
                                                                    Mengeluarkan Paspor</label>
                                                                <input type="text" class="form-control" id="kantor_paspor" name="kantor_paspor" value="{{ $detail_kandidat->kantor_paspor }}">
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <div class="col-sm-12">
                                                                <label class="col-form-label" for="kondisi_paspor">Kondisi
                                                                    Paspor</label>
                                                                <input type="text" class="form-control" id="kondisi_paspor" name="kondisi_paspor" value="{{ $detail_kandidat->kondisi_paspor }}">
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
                                                                <label class="col-form-label" for="estimasi_maksimal">Negara
                                                                    Tempat Bekerja</label>
                                                                <input type="text" class="form-control" value="{{ $pengalaman->negara_tempat_kerja }}">
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <label class="col-form-label" for="estimasi_maksimal">Nama
                                                                    Perusahaan</label>
                                                                <input type="text" class="form-control" value="{{ $pengalaman->nama_perusahaan }}">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <div class="col-sm-6">
                                                                <label class="col-form-label" for="estimasi_maksimal">Tanggal
                                                                    Mulai Bekerja</label>
                                                                <input type="text" class="form-control" value="{{ $pengalaman->tanggal_mulai_kerja }}">
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <label class="col-form-label" for="estimasi_maksimal">Tanggal
                                                                    Selesai Bekerja</label>
                                                                <input type="text" class="form-control" value="{{ $pengalaman->tanggal_selesai_kerja }}">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <div class="col-sm-12">
                                                                <label class="col-form-label" for="estimasi_maksimal">Posisi</label>
                                                                <input type="text" class="form-control" value="{{ $pengalaman->posisi }}">
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
                                                                    <div class="border-checkbox-section">
                                                                        <div class="border-checkbox-group border-checkbox-group-success">
                                                                            <input class="border-checkbox" type="checkbox" id="ada_ktp" name="ada_ktp" value="{{ $detail_kandidat->ada_ktp }}" {{ $detail_kandidat->ada_ktp == 'Ya' ? 'checked' : '' }}>
                                                                            <label class="border-checkbox-label" for="ada_ktp">KTP</label>
                                                                        </div>



                                                                        <div class="border-checkbox-group border-checkbox-group-success">
                                                                            <input class="border-checkbox" type="checkbox" id="ada_kk" name="ada_kk" value="{{ $detail_kandidat->ada_kk }}" {{ $detail_kandidat->ada_kk == 'Ya' ? 'checked' : '' }}>
                                                                            <label class="border-checkbox-label" for="ada_kk">KK</label>
                                                                        </div>

                                                                        <div class="border-checkbox-group border-checkbox-group-success">
                                                                            <input class="border-checkbox" type="checkbox" id="ada_akta_lahir" name="ada_akta_lahir" value="{{ $detail_kandidat->ada_akta_lahir }}" {{ $detail_kandidat->ada_akta_lahir == 'Ya' ? 'checked' : '' }}>
                                                                            <label class="border-checkbox-label" for="ada_akta_lahir">Akta
                                                                                Lahir</label>
                                                                        </div>

                                                                        <div class="border-checkbox-group border-checkbox-group-success">
                                                                            <input class="border-checkbox" type="checkbox" id="ada_ijazah" name="ada_ijazah" value="{{ $detail_kandidat->ada_ijazah }}" {{ $detail_kandidat->ada_ijazah == 'Ya' ? 'checked' : '' }}>
                                                                            <label class="border-checkbox-label" for="ada_ijazah">Ijazah</label>
                                                                        </div>

                                                                        <div class="border-checkbox-group border-checkbox-group-success">
                                                                            <input class="border-checkbox" type="checkbox" id="ada_buku_nikah" name="ada_buku_nikah" value="{{ $detail_kandidat->ada_buku_nikah }}" {{ $detail_kandidat->ada_buku_nikah == 'Ya' ? 'checked' : '' }}>
                                                                            <label class="border-checkbox-label" for="ada_buku_nikah">Buku
                                                                                Nikah</label>
                                                                        </div>

                                                                        <div class="border-checkbox-group border-checkbox-group-success">
                                                                            <input class="border-checkbox" type="checkbox" id="ada_paspor" name="ada_paspor" value="{{ $detail_kandidat->ada_paspor }}" {{ $detail_kandidat->ada_paspor == 'Ya' ? 'checked' : '' }}>
                                                                            <label class="border-checkbox-label" for="ada_paspor">Paspor</label>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="form-group row">
                                                                <div class="col-sm-12">
                                                                    <label class="col-form-label" for="penjelasan_dokumen">Penjelasan
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
                                                            <div class="row mt-lg-4 mt-3">
                                                                @php
                                                                $arrDocument = [
                                                                [
                                                                'key' => 'foto',
                                                                'path' => 'foto',
                                                                'name' => 'Foto'
                                                                ],
                                                                [
                                                                'key' => 'paspor',
                                                                'path' => 'paspor',
                                                                'name' => 'Paspor'
                                                                ],
                                                                [
                                                                'key' => 'ktp',
                                                                'path' => 'ktp',
                                                                'name' => 'KTP'
                                                                ],
                                                                [
                                                                'key' => 'sertifikat_kompetensi',
                                                                'path' => 'sertifikat-kompetensi',
                                                                'name' => 'Sertifikat Kompetensi'
                                                                ],
                                                                [
                                                                'key' => 'sertifikat_bahasa_inggris',
                                                                'path' => 'sertifikat-bahasa-inggris',
                                                                'name' => 'Sertifikat Bahasa Inggris'
                                                                ],
                                                                [
                                                                'key' => 'paklaring',
                                                                'path' => 'paklaring',
                                                                'name' => 'Paklaring'
                                                                ],
                                                                [
                                                                'key' => 'kk',
                                                                'path' => 'kartu-keluarga',
                                                                'name' => 'Kartu Keluarga'
                                                                ],
                                                                [
                                                                'key' => 'akta_lahir',
                                                                'path' => 'akta-lahir',
                                                                'name' => 'Akta Lahir'
                                                                ],
                                                                [
                                                                'key' => 'ijazah',
                                                                'path' => 'ijazah',
                                                                'name' => 'Ijazah'
                                                                ],
                                                                [
                                                                'key' => 'buku_nikah',
                                                                'path' => 'buku-nikah',
                                                                'name' => 'Buku Nikah'
                                                                ],
                                                                ];
                                                                @endphp
                                                                @foreach ($arrDocument as $doc)
                                                                <div class="col-6 col-md-2">
                                                                    @php
                                                                    $originalFile = $detail_kandidat->{$doc['key']} ? 'upload/' . $doc['path'] . '/' . $detail_kandidat->{$doc['key']} : null;
                                                                    $thumbnailFile = $detail_kandidat->{$doc['key']} ? 'upload/' . $doc['path'] . '/thumb_' . $detail_kandidat->{$doc['key']} : null;
                                                                    $memberFile = memberDocumentImage($originalFile, $thumbnailFile);
                                                                    @endphp

                                                                    <label for="{{ $doc['key'] }}" style="cursor: pointer">

                                                                        @if ($memberFile['is_uploaded'])
                                                                        <a href="/upload/{{ $doc['path'] }}/{{ $detail_kandidat->{$doc['key']} }}" target="_blank">
                                                                            <img src="{{ asset('member-template/images/transparent.png') }}" alt="{{ $doc['name'] }}" class="rounded-2 img-fluid mb-3 img-preview-doc" style="background-image: url('{{ asset($memberFile['file_image']) }}');">
                                                                        </a>
                                                                        @else
                                                                        <img src="{{ asset('member-template/images/transparent.png') }}" alt="{{ $doc['name'] }}" class="rounded-2 img-fluid mb-3 img-preview-doc" style="background-image: url('{{ asset('member-template/images/upload.png') }}');">
                                                                        @endif

                                                                        <div class="fw-7 text-center mb-4 {{ $memberFile['is_uploaded'] ? '' : 'text-muted' }}">update {{ $doc['name'] }}</div>
                                                                        <input type="file" name="file_{{ $doc['key'] }}" id="{{ $doc['key'] }}" class="d-none file-image" accept="{{ $doc['key'] == 'foto' ? 'image/*' :'image/*,application/pdf' }}">
                                                                    </label>
                                                                </div>
                                                                @endforeach

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
                                                                <label class="col-form-label" for="email">Email</label>
                                                                <input type="email" class="form-control" id="email" name="email" value="{{ $detail_kandidat->user?->email }}">
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <label class="col-form-label" for="password">Password</label>
                                                                <input type="text" class="form-control
                                                                                        " id="password" name="password" placeholder="kosongkan jika tidak ingin mengubah password">
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
                                                                <label class="col-form-label" for="level_bahasa_inggris">Level</label>
                                                                <select class="form-control" id="level_bahasa_inggris" name="level_bahasa_inggris">
                                                                    <option value="">--Pilih
                                                                        Level--</option>
                                                                    <option value="Tingkat Dasar" {{ $detail_kandidat->level_bahasa_inggris == 'Tingkat Dasar' ? 'selected' : '' }}>
                                                                        Tingkat Dasar
                                                                    </option>
                                                                    <option value="Tingkat Menengah" {{ $detail_kandidat->level_bahasa_inggris == 'Tingkat Menengah' ? 'selected' : '' }}>
                                                                        Tingkat Menengah
                                                                    </option>
                                                                    <option value="Tingkat Profesional" {{ $detail_kandidat->level_bahasa_inggris == 'Tingkat Profesional' ? 'selected' : '' }}>
                                                                        Tingkat Profesional
                                                                    </option>
                                                                    <option value="Tingkar Profesional Mahir" {{ $detail_kandidat->level_bahasa_inggris == 'Tingkar Profesional Mahir' ? 'selected' : '' }}>
                                                                        Tingkar Profesional Mahir
                                                                    </option>
                                                                    <option value="Tingkat Fasih Atau Bahasa Ahli" {{ $detail_kandidat->level_bahasa_inggris == 'Tingkat Fasih Atau Bahasa Ahli' ? 'selected' : '' }}>
                                                                        Tingkat Fasih Atau Bahasa Ahli
                                                                    </option>
                                                                </select>




                                                            </div>
                                                            <div class="col-sm-6">
                                                                <label class="col-form-label" for="pic_level">PIC</label>
                                                                <input type="text" class="form-control
                                                                                        " id="pic_level" name="pic_level" value="{{ $detail_kandidat->pic_level }}">
                                                            </div>
                                                            <div class="col-sm-12">
                                                                <label class="col-form-label" for="catatan_level">Catatan</label>
                                                                <textarea class="form-control" name="catatan_level" id="catatan_level" cols="30" rows="3">{{ $detail_kandidat->catatan_level }}</textarea>
                                                            </div>
                                                        </div>




                                                    </div>


                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="screening" role="tabpanel">
                                            <div class="modal-content">
                                                <div class="modal-body">
                                                    <div class="card-block">
                                                        <h5>Pre Screening</h5>
                                                        <div class="border-checkbox-section">
                                                            <div class="border-checkbox-group border-checkbox-group-success">
                                                                <input class="border-checkbox" type="checkbox" id="have_kids" name="have_kids" value="{{ $detail_kandidat->screaning?->have_kids }}" {{ $detail_kandidat->screaning?->have_kids == true ? 'checked' : '' }}>
                                                                <label class="border-checkbox-label" for="have_kids">Mempunyai Anak</label>
                                                            </div>
                                                            <div class="border-checkbox-group border-checkbox-group-success">
                                                                <input class="border-checkbox" type="checkbox" id="pyschical_disability" name="pyschical_disability" value="{{ $detail_kandidat->screaning?->pyschical_disability }}" {{ $detail_kandidat->screaning?->pyschical_disability == true ? 'checked' : '' }}>
                                                                <label class="border-checkbox-label" for="pyschical_disability">Disabilitas Fisik</label>
                                                            </div>
                                                            <div class="border-checkbox-group border-checkbox-group-success">
                                                                <input class="border-checkbox" type="checkbox" id="operation" name="operation" value="{{ $detail_kandidat->screaning?->operation }}" {{ $detail_kandidat->screaning?->operation == true ? 'checked' : '' }}>
                                                                <label class="border-checkbox-label" for="operation">Pernah
                                                                    Operasi</label>
                                                            </div>
                                                            <div cliass="border-checkbox-group border-checkbox-group-success">
                                                                <input class="border-checkbox" type="checkbox" id="disease" name="disease" value="{{ $detail_kandidat->screaning?->disease }}" {{ $detail_kandidat->screaning?->disease == true ? 'checked' : '' }}>
                                                                <label class="border-checkbox-label" for="disease">Penyakit
                                                                    Menahun</label>
                                                            </div>
                                                            <div class="border-checkbox-group border-checkbox-group-success">
                                                                <input class="border-checkbox" type="checkbox" id="pregnant" name="pregnant" value="{{ $detail_kandidat->screaning?->pregnant }}" {{ $detail_kandidat->screaning?->pregnant == true ? 'checked' : '' }}>
                                                                <label class="border-checkbox-label" for="pregnant">Hamil</label>
                                                            </div>
                                                            <!-- siap untuk bekerja -->
                                                            <div class="border-checkbox-group border-checkbox-group-success">
                                                                <input class="border-checkbox" type="checkbox" id="willing_to_work" name="willing_to_work" value="{{ $detail_kandidat->screaning?->willing_to_work }}" {{ $detail_kandidat->screaning?->willing_to_work == true ? 'checked' : '' }}>
                                                                <label class="border-checkbox-label" for="willing_to_work">Siap
                                                                    Bekerja</label>
                                                            </div>
                                                            <!-- willing_to_obey_rules -->
                                                            <div class="border-checkbox-group border-checkbox-group-success">
                                                                <input class="border-checkbox" type="checkbox" id="willing_to_obey_rules" name="willing_to_obey_rules" value="{{ $detail_kandidat->screaning?->willing_to_obey_rules }}" {{ $detail_kandidat->screaning?->willing_to_obey_rules == true ? 'checked' : '' }}>
                                                                <label class="border-checkbox-label" for="willing_to_obey_rules">Siap
                                                                    Patuh Aturan</label>
                                                            </div>
                                                       
                                                        </div>

                                                        <h6 class="mt-5">Jelaskan
                                                            dan
                                                            informasikan
                                                            kosongkan jika tidak meras</h6>
                                                        <div class="form-group row">

                                                            <div class="col-sm-6">
                                                                <label class="col-form-label" for="total_kids">Total Anak</label>
                                                                <input type="number" class="form-control" id="total_kids" name="total_kids" value="{{ $detail_kandidat->screaning?->total_kids }}">
                                                            </div>

                                                            <div class="col-sm-6">
                                                                <label class="col-form-label" for="old_kids">Anak
                                                                    Berusia</label>
                                                                <input type="number" class="form-control" id="old_kids" name="old_kids" value="{{ $detail_kandidat->screaning?->old_kids }}">
                                                            </div>

                                                        </div>
                                                        <!-- text area for explain dan informasikan kosongkan jika tidak merasa-->
                                                        <div class="form-group row">
                                                            <div class="col-sm-12">
                                                                <label class="col-form-label" for="explain">Motivasi Bekerja</label>
                                                               <!-- motivation_work -->
                                                                <select class="form-control" id="motivation_work" name="motivation_work">
                                                                    <option value="">--Pilih
                                                                        Motivasi Bekerja--</option>
                                                                    <option value="Looking money for my future" {{ $detail_kandidat->screaning?->motivation_work == 'Looking money for my future' ? 'selected' : '' }}>
                                                                         Looking money for my future
                                                                    </option>
                                                                    <option value=" Looking money for my family" {{ $detail_kandidat->screaning?->motivation_work == ' Looking money for my family' ? 'selected' : '' }}>
                                                                         Looking money for my family
                                                                    </option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <div class="col-sm-12">
                                                                <label class="col-form-label" for="explain">Penjelasan Disabilitas</label>
                                                                <!-- pyschical_disability_explain -->
                                                                <textarea class="form-control" name="pyschical_disability_explain" id="pyschical_disability_explain" cols="30" rows="2">{{ $detail_kandidat->screaning?->pyschical_disability_explain }}</textarea>
                                                            </div>
                                                            <!-- operation_explain -->
                                                            <div class="col-sm-12">
                                                                <label class="col-form-label" for="explain">Penjelasan Operasi</label>
                                                                <textarea class="form-control" name="operation_explain" id="operation_explain" cols="30" rows="2">{{ $detail_kandidat->screaning?->operation_explain }}</textarea>
                                                            </div>
                                                            <!-- disease_explain -->
                                                            <div class="col-sm-12">
                                                                <label class="col-form-label" for="explain">Penjelasan Penyakit Menahun</label>
                                                                <textarea class="form-control" name="disease_explain" id="disease_explain" cols="30" rows="2">{{ $detail_kandidat->screaning?->disease_explain }}</textarea>
                                                            </div>
                                                            <!-- pregnant_explain -->
                                                            <div class="col-sm-12">
                                                                <label class="col-form-label" for="explain">Penjelasan Kehamilan</label>
                                                                <textarea class="form-control" name="pregnant_explain" id="pregnant_explain" cols="30" rows="2">{{ $detail_kandidat->screaning?->pregnant_explain }}</textarea>
                                                            </div>
                                                        </div>
                                                        <div class="form-group
                                                                row">
                                                            <div class="col-sm-6">
                                                                <label class="col-form-label" for="health">Kesehatan</label>
                                                                <select class="form-control" id="health" name="health">
                                                                    <option value="">--Pilih
                                                                        Kesehatan--</option>
                                                                    <option value="Healthy" {{ $detail_kandidat->screaning?->health == 'Healthy' ? 'selected' : '' }}>
                                                                        Sehat
                                                                    </option>
                                                                    <option value="no" {{ $detail_kandidat->screaning?->health == 'no' ? 'selected' : '' }}>
                                                                        Tidak Sehat
                                                                    </option>
                                                                </select>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <div class="border-checkbox-section">

                                                                    <div class="border-checkbox-group border-checkbox-group-success">
                                                                        <input class="border-checkbox" type="checkbox" id="declaration" name="declaration" value="{{ $detail_kandidat->screaning?->declaration }}" {{ $detail_kandidat->screaning?->declaration == true ? 'checked' : '' }}>
                                                                        <label class="border-checkbox-label" for="declaration">I HEREBY THAT THE INFORMATION GIVEN IS COMPLETE AND ACCURATE TO THE BEST OF MY
                                                                            KNOWLEDGE. I AM AWARE THAT ANY MISREPRESENTATION OR MISSION OF FACTS IN MY
                                                                            APPLICATION WILL JUSTIFY THE DENIAL OF ADMISSION, THE CENCELATION OF ADMISSION OR
                                                                            EXPULSION.</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>


                                                    </div>
                                                </div>
                                            </div>
                                        </div>





                                    </div>


                                    <a href="javascript:history.back()" class="btn btn-warning waves-effect waves-light mt-3">
                                        <i class="fas fa-undo"></i> Kembali
                                    </a>


                                    <button type="button" class="btn btn-primary waves-effect waves-light mt-3" id="btn-update-verifikasi" style="float: right;">
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
    function toggleInput(field, value) {
        if (value == '1' || value == 'Ya') {
            document.getElementById(field + '_details').style.display = 'block';
        } else {
            document.getElementById(field + '_details').style.display = 'none';
        }
    }

    toggleInput('have_kids', document.querySelector('input[name="have_kids"]:checked').value);
    toggleInput('pyschical_disability', document.querySelector('input[name="pyschical_disability"]:checked').value);
    toggleInput('operation', document.querySelector('input[name="operation"]:checked').value);
    toggleInput('disease', document.querySelector('input[name="disease"]:checked').value);
    toggleInput('pregnant', document.querySelector('input[name="pregnant"]:checked').value);
</script>
<script>
    $(document).ready(function() {
        $('.file-image').change(function(event) {
            let input = event.target;
            let reader = new FileReader();

            reader.onload = function(e) {
                let imgElement = $(input).closest('label').find('.img-preview-doc');
                imgElement.css('background-image', 'url(' + e.target.result + ')');
            };

            reader.readAsDataURL(input.files[0]);
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

<script type="text/javascript" src="{{ asset('template') }}/files/bower_components/bootstrap-tagsinput/js/bootstrap-tagsinput.js"></script>



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
                url: `{{ route('back-office.pelamar.kandidat.update', ['id' => $detail_kandidat->id]) }}`,
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

@push('css')

<style>
    .img-preview-doc {
        background-repeat: no-repeat;
        background-position: center;
        background-size: cover;
    }
</style>
@endpush