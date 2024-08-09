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
                                                        <a class="nav-link" data-toggle="tab" href="#cf" role="tab"><i class="fas fa-dollar-sign"></i>Commitment
                                                            Fee</a>
                                                        <div class="slide"></div>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" data-toggle="tab" href="#alasan" role="tab"><i class="fas fa-info"></i>Alasan</a>
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
                                                </ul>

                                                <form id="form_verifikasi" method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    @method('PUT')
                                                    <input type="hidden" id="id" name="id" value="{{ $belum_diverifikasi->id }}">
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
                                                                                    <input type="text" readonly
                                                                                        class="form-control"
                                                                                        id="nama_negara"
                                                                                        name="nama_negara"
                                                                                        value="{{ $belum_diverifikasi->nama_negara }}">


                                                                            <input type="hidden" readonly class="form-control" id="negara_id" name="negara_id" value="{{ $belum_diverifikasi->negara_id }}">
                                                                        </div> --}}
                                                                        <div class="col-sm-12">
                                                                            <label class="col-form-label" for="nama_kategori_job">Industri
                                                                                Industri Pekerjaan</label>
                                                                            <input type="text" readonly class="form-control" id="nama_kategori_job" name="nama_kategori_job" value="{{ $belum_diverifikasi?->kategoriJob?->nama_kategori_job }}">

                                                                            <input type="hidden" readonly class="form-control" id="kategori_job_id" name="kategori_job_id" value="{{ $belum_diverifikasi->kategori_job_id }}">
                                                                        </div>
                                                                    </div>

                                                                    <div class="form-group row">
                                                                        <div class="col-sm-6">
                                                                            <label class="col-form-label" for="nik">NIK</label>
                                                                            <input type="text" readonly class="form-control" id="nik" name="nik" value="{{ $belum_diverifikasi->kandidat->nik }}">
                                                                        </div>
                                                                        <div class="col-sm-6">
                                                                            <label class="col-form-label" for="nama_lengkap">Nama
                                                                                Lengkap</label>
                                                                            <input type="text" readonly class="form-control" id="nama_lengkap" name="nama_lengkap" value="{{ $belum_diverifikasi->kandidat->nama_lengkap }}">

                                                                        </div>
                                                                    </div>

                                                                    <div class="form-group row">
                                                                        <div class="col-sm-6">
                                                                            <label class="col-form-label" for="tempat_lahir">Tempat
                                                                                Lahir</label>
                                                                            <input type="text" readonly class="form-control" id="tempat_lahir" name="tempat_lahir" value="{{ $belum_diverifikasi->kandidat->tempat_lahir }}">
                                                                        </div>
                                                                        <div class="col-sm-6">
                                                                            <label class="col-form-label" for="tanggal_lahir">Tanggal
                                                                                Lahir</label>
                                                                            <input type="date" readonly class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="{{ $belum_diverifikasi->kandidat->tanggal_lahir }}">
                                                                        </div>
                                                                    </div>

                                                                    <div class="form-group row">
                                                                        <div class="col-sm-6">
                                                                            <label class="col-form-label" for="usia">Usia</label>
                                                                            <input type="number" readonly class="form-control" id="usia" name="usia" value="{{ $belum_diverifikasi->kandidat->usia }}">
                                                                        </div>
                                                                        <div class="col-sm-6">
                                                                            <label class="col-form-label" for="agama">Agama</label>
                                                                            <input type="text" readonly class="form-control" id="agama" name="agama" value="{{ $belum_diverifikasi->kandidat->agama }}">
                                                                        </div>
                                                                    </div>

                                                                    <div class="form-group row">
                                                                        <div class="col-sm-6">
                                                                            <label class="col-form-label" for="berat_badan">Berat
                                                                                Badan</label>
                                                                            <input type="number" readonly class="form-control" id="berat_badan" name="berat_badan" value="{{ $belum_diverifikasi->kandidat->berat_badan }}">
                                                                        </div>
                                                                        <div class="col-sm-6">
                                                                            <label class="col-form-label" for="tinggi_badan">Tinggi
                                                                                Badan</label>
                                                                            <input type="number" readonly class="form-control" id="tinggi_badan" name="tinggi_badan" value="{{ $belum_diverifikasi->kandidat->tinggi_badan }}">
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group row">
                                                                        <div class="col-sm-6">
                                                                            <label class="col-form-label" for="jenis_kelamin">Jenis
                                                                                Kelamin</label>
                                                                            <select readonly class="form-control" id="jenis_kelamin" name="jenis_kelamin">
                                                                                <option value="Laki-laki" {{ $belum_diverifikasi->kandidat->jenis_kelamin == 'Laki-laki' ? 'selected' : '' }}>
                                                                                    Laki-laki</option>
                                                                                <option value="Perempuan" {{ $belum_diverifikasi->kandidat->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>
                                                                                    Perempuan</option>
                                                                            </select>
                                                                        </div>

                                                                        <div class="col-sm-6">
                                                                            <label class="col-form-label" for="status_kawin">Status
                                                                                Kawin</label>
                                                                            <input type="text" readonly class="form-control" id="status_kawin" name="status_kawin" value="{{ $belum_diverifikasi->kandidat->status_kawin }}">
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group row">
                                                                        <div class="col-sm-6">
                                                                            <label class="col-form-label" for="nama_lengkap_ayah">Nama
                                                                                Lengkap
                                                                                Ayah</label>
                                                                            <input type="text" readonly class="form-control" id="nama_lengkap_ayah" name="nama_lengkap_ayah" value="{{ $belum_diverifikasi->kandidat->nama_lengkap_ayah }}">
                                                                        </div>
                                                                        <div class="col-sm-6">
                                                                            <label class="col-form-label" for="nama_lengkap_ibu">Nama
                                                                                Lengkap Ibu</label>
                                                                            <input type="text" readonly class="form-control" id="nama_lengkap_ibu" name="nama_lengkap_ibu" value="{{ $belum_diverifikasi->kandidat->nama_lengkap_ibu }}">
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group row">
                                                                        <div class="col-sm-12">
                                                                            <label class="col-form-label" for="alamat">Alamat</label>
                                                                            <textarea readonly class="form-control" name="alamat" id="alamat" cols="30" rows="2">{{ $belum_diverifikasi->kandidat->alamat }}</textarea>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group row">
                                                                        <div class="col-sm-4">
                                                                            <label class="col-form-label" for="kota">Kota</label>
                                                                            <input type="text" readonly class="form-control" id="kota" name="kota" value="{{ $belum_diverifikasi->kandidat->kota?->nama_kota }}">
                                                                        </div>
                                                                        <div class="col-sm-4">
                                                                            <label class="col-form-label" for="kecamatan">Kecamatan</label>
                                                                            <input type="text" readonly class="form-control" id="kecamatan" name="kecamatan" value="{{ $belum_diverifikasi->kandidat->kecamatan?->nama_kecamatan }}">
                                                                        </div>
                                                                        <div class="col-sm-4">
                                                                            <label class="col-form-label" for="provinsi">Provinsi</label>
                                                                            <input type="text" readonly class="form-control" idprovinsi name="provinsi" value="{{ $belum_diverifikasi->kandidat->provinsi?->nama_provinsi }}">
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group row">
                                                                        <div class="col-sm-6">
                                                                            <label class="col-form-label" for="referensi">Referensi</label>
                                                                            <input type="text" readonly class="form-control" id="referensi" name="referensi" value="{{ $belum_diverifikasi->kandidat->referensi }}">
                                                                        </div>
                                                                        <div class="col-sm-6">
                                                                            <label class="col-form-label" for="nama_referensi">Nama
                                                                                Referensi</label>
                                                                            <input type="text" readonly class="form-control" id="nama_referensi" name="nama_referensi" value="{{ $belum_diverifikasi->kandidat->nama_referensi }}">
                                                                        </div>
                                                                    </div>

                                                                    <div class="form-group row">
                                                                        <div class="col-sm-4">
                                                                            <label class="col-form-label" for="email">Email</label>
                                                                            <input type="text" readonly class="form-control" id="email" name="email" value="{{ $belum_diverifikasi->kandidat->email }}">
                                                                        </div>
                                                                        <div class="col-sm-4">
                                                                            <label class="col-form-label" for="no_hp">No
                                                                                Telephone</label>
                                                                            <input type="text" readonly class="form-control" id="no_hp" name="no_hp" value="{{ $belum_diverifikasi->kandidat->no_hp }}">
                                                                        </div>
                                                                        <div class="col-sm-4">
                                                                            <label class="col-form-label" for="no_wa">No
                                                                                WA</label>
                                                                            <input type="text" readonly class="form-control" id="no_wa" name="no_wa" value="{{ $belum_diverifikasi->kandidat->no_wa }}">
                                                                        </div>
                                                                    </div>
                                                                    <br><br>
                                                                    <h4 class="sub-title"> > Kontak Darurat</h4>
                                                                    <div class="form-group row">
                                                                        <div class="col-sm-4">
                                                                            <label class="col-form-label" for="nama_keluarga">Nama
                                                                                Keluarga</label>
                                                                            <input type="text" readonly class="form-control" id="nama_keluarga" name="nama_keluarga" value="{{ $belum_diverifikasi->kandidat->nama_keluarga }}">
                                                                        </div>
                                                                        <div class="col-sm-4">
                                                                            <label class="col-form-label" for="hubungan">Hubungan
                                                                                Keluarga</label>
                                                                            <input type="text" readonly class="form-control" id="hubungan" name="hubungan" value="{{ $belum_diverifikasi->kandidat->hubungan }}">
                                                                        </div>
                                                                        <div class="col-sm-4">
                                                                            <label class="col-form-label" for="no_telp_darurat">No
                                                                                Darurat</label>
                                                                            <input type="text" readonly class="form-control" id="no_telp_darurat" name="no_telp_darurat" value="{{ $belum_diverifikasi->kandidat->no_telp_darurat }}">
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
                                                                            <input type="text" readonly class="form-control" id="no_paspor" name="no_paspor" value="{{ $belum_diverifikasi->kandidat->no_paspor }}">
                                                                        </div>
                                                                        <div class="col-sm-6">
                                                                            <label class="col-form-label" for="tanggal_pengeluaran_paspor">Tanggal
                                                                                Pengeluaran Paspor</label>
                                                                            <input type="date" readonly class="form-control" id="tanggal_pengeluaran_paspor" name="tanggal_pengeluaran_paspor" value="{{ $belum_diverifikasi->kandidat->tanggal_pengeluaran_paspor }}">
                                                                        </div>
                                                                    </div>

                                                                    <div class="form-group row">
                                                                        <div class="col-sm-6">
                                                                            <label class="col-form-label" for="masa_kadaluarsa">Masa
                                                                                Kadaluarsa Paspor</label>
                                                                            <input type="text" readonly class="form-control" id="masa_kadaluarsa" name="masa_kadaluarsa" value="{{ $belum_diverifikasi->kandidat->masa_kadaluarsa }}">
                                                                        </div>
                                                                        <div class="col-sm-6">
                                                                            <label class="col-form-label" for="kantor_paspor">Kantor Yang
                                                                                Mengeluarkan Paspor</label>
                                                                            <input type="text" readonly class="form-control" id="kantor_paspor" name="kantor_paspor" value="{{ $belum_diverifikasi->kandidat->kantor_paspor }}">
                                                                        </div>
                                                                    </div>

                                                                    <div class="form-group row">
                                                                        <div class="col-sm-12">
                                                                            <label class="col-form-label" for="kondisi_paspor">Kondisi
                                                                                Paspor</label>
                                                                            <input type="text" readonly class="form-control" id="kondisi_paspor" name="kondisi_paspor" value="{{ $belum_diverifikasi->kandidat->kondisi_paspor }}">
                                                                        </div>
                                                                    </div>



                                                                </div>
                                                            </div>


                                                        </div>
                                                    </div>

                                                    <div class="tab-pane" id="pengalaman_kerja" role="tabpanel">
                                                        <div class="modal-content">
                                                            <div class="modal-body">
                                                                @foreach ($belum_diverifikasi->pengalamanKerja as $pengalaman)
                                                                <div class="card-block">
                                                                    <h4 class="sub-title">Pengalaman Pekerjaan
                                                                        {{ $loop->iteration }}
                                                                    </h4>
                                                                    <div class="form-group row">
                                                                        <div class="col-sm-6">
                                                                            <label class="col-form-label" for="estimasi_maksimal">Negara
                                                                                Tempat Bekerja</label>
                                                                            <input type="text" readonly class="form-control" value="{{ $pengalaman->negara_tempat_kerja }}">
                                                                        </div>
                                                                        <div class="col-sm-6">
                                                                            <label class="col-form-label" for="estimasi_maksimal">Nama
                                                                                Perusahaan</label>
                                                                            <input type="text" readonly class="form-control" value="{{ $pengalaman->nama_perusahaan }}">
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group row">
                                                                        <div class="col-sm-6">
                                                                            <label class="col-form-label" for="estimasi_maksimal">Tanggal
                                                                                Mulai Bekerja</label>
                                                                            <input type="text" readonly class="form-control" value="{{ $pengalaman->tanggal_mulai_kerja }}">
                                                                        </div>
                                                                        <div class="col-sm-6">
                                                                            <label class="col-form-label" for="estimasi_maksimal">Tanggal
                                                                                Selesai Bekerja</label>
                                                                            <input type="text" readonly class="form-control" value="{{ $pengalaman->tanggal_selesai_kerja }}">
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group row">
                                                                        <div class="col-sm-12">
                                                                            <label class="col-form-label" for="estimasi_maksimal">Posisi</label>
                                                                            <input type="text" readonly class="form-control" value="{{ $pengalaman->posisi }}">
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
                                                                                        <input class="border-checkbox" type="checkbox" id="ada_ktp" name="ada_ktp" value="{{ $belum_diverifikasi->kandidat->ada_ktp }}" {{ $belum_diverifikasi->kandidat->ada_ktp == 'Ya' ? 'checked' : '' }}>
                                                                                        <label class="border-checkbox-label" for="ada_ktp">KTP</label>
                                                                                    </div>



                                                                                    <div class="border-checkbox-group border-checkbox-group-success">
                                                                                        <input class="border-checkbox" type="checkbox" id="ada_kk" name="ada_kk" value="{{ $belum_diverifikasi->kandidat->ada_kk }}" {{ $belum_diverifikasi->kandidat->ada_kk == 'Ya' ? 'checked' : '' }}>
                                                                                        <label class="border-checkbox-label" for="ada_kk">KK</label>
                                                                                    </div>

                                                                                    <div class="border-checkbox-group border-checkbox-group-success">
                                                                                        <input class="border-checkbox" type="checkbox" id="ada_akta_lahir" name="ada_akta_lahir" value="{{ $belum_diverifikasi->kandidat->ada_akta_lahir }}" {{ $belum_diverifikasi->kandidat->ada_akta_lahir == 'Ya' ? 'checked' : '' }}>
                                                                                        <label class="border-checkbox-label" for="ada_akta_lahir">Akta
                                                                                            Lahir</label>
                                                                                    </div>

                                                                                    <div class="border-checkbox-group border-checkbox-group-success">
                                                                                        <input class="border-checkbox" type="checkbox" id="ada_ijazah" name="ada_ijazah" value="{{ $belum_diverifikasi->kandidat->ada_ijazah }}" {{ $belum_diverifikasi->kandidat->ada_ijazah == 'Ya' ? 'checked' : '' }}>
                                                                                        <label class="border-checkbox-label" for="ada_ijazah">Ijazah</label>
                                                                                    </div>

                                                                                    <div class="border-checkbox-group border-checkbox-group-success">
                                                                                        <input class="border-checkbox" type="checkbox" id="ada_buku_nikah" name="ada_buku_nikah" value="{{ $belum_diverifikasi->kandidat->ada_buku_nikah }}" {{ $belum_diverifikasi->kandidat->ada_buku_nikah == 'Ya' ? 'checked' : '' }}>
                                                                                        <label class="border-checkbox-label" for="ada_buku_nikah">Buku
                                                                                            Nikah</label>
                                                                                    </div>

                                                                                    <div class="border-checkbox-group border-checkbox-group-success">
                                                                                        <input class="border-checkbox" type="checkbox" id="ada_paspor" name="ada_paspor" value="{{ $belum_diverifikasi->kandidat->ada_paspor }}" {{ $belum_diverifikasi->kandidat->ada_paspor == 'Ya' ? 'checked' : '' }}>
                                                                                        <label class="border-checkbox-label" for="ada_paspor">Paspor</label>
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
                                                                                    <textarea class="form-control" name="penjelasan_dokumen" id="penjelasan_dokumen" cols="30" rows="4">{{ $belum_diverifikasi->penjelasan_dokumen }} </textarea>
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
                                                                                    $originalFile = $belum_diverifikasi->kandidat->{$doc['key']} ? 'upload/' . $doc['path'] . '/' . $belum_diverifikasi->kandidat->{$doc['key']} : null;
                                                                                    $thumbnailFile = $belum_diverifikasi->kandidat->{$doc['key']} ? 'upload/' . $doc['path'] . '/thumb_' . $belum_diverifikasi->kandidat->{$doc['key']} : null;
                                                                                    $memberFile = memberDocumentImage($originalFile, $thumbnailFile);
                                                                                    @endphp

                                                                                    <label for="{{ $doc['key'] }}" style="cursor: pointer">

                                                                                        @if ($memberFile['is_uploaded'])
                                                                                        <a href="/upload/{{ $doc['path'] }}/{{ $belum_diverifikasi->kandidat->{$doc['key']} }}" target="_blank">
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
                                                        </div>


                                                        <div class="tab-pane" id="cf" role="tabpanel">
                                                            <div class="modal-content">
                                                                <div class="modal-body">
                                                                    <div class="card-block">
                                                                        <h5>COMMITMENT FEE</h5>
                                                                        <div class="form-group row">
                                                                            <div class="col-sm-6">
                                                                                <label class="col-form-label" for="bayar_cf">Bayar Commitment
                                                                                    Fee</label>
                                                                                <input type="text" class="form-control" id="bayar_cf" name="bayar_cf" onkeyup="formatNumber(this)" value="{{ number_format($belum_diverifikasi->bayar_cf, 0, ',', ',') }}">

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
                                                                                <label class="col-form-label" for="tanggal_tf_cf">Tanggal
                                                                                    Transfer</label>
                                                                                <input type="date" class="form-control" id="tanggal_tf_cf" name="tanggal_tf_cf" value="{{ $belum_diverifikasi->tanggal_tf_cf }}">
                                                                            </div>
                                                                        </div>

                                                                        <div class="form-group row">
                                                                            <div class="col-sm-3">
                                                                                <label class="col-form-label" for="bukti_tf_cf">Upload
                                                                                    Transfer</label>
                                                                                <input type="file" class="form-control" id="bukti_tf_cf" name="bukti_tf_cf">
                                                                            </div>
                                                                            <div class="col-sm-3">
                                                                                <label class="col-form-label" for="bukti_tf_cf">Bukti
                                                                                    Transfer</label>
                                                                                <br>
                                                                                <a href="{{ $belum_diverifikasi->bukti_tf_cf ? '/upload/bukti_tf_cf/' . $belum_diverifikasi->bukti_tf_cf : 'https://st.depositphotos.com/34584522/57984/v/1600/depositphotos_579841244-stock-illustration-unpaid-red-rubber-stamp-vector.jpg' }}" target="_blank">
                                                                                    <img title="Bukti Transfer" src="{{ $belum_diverifikasi->bukti_tf_cf ? '/upload/bukti_tf_cf/' . $belum_diverifikasi->bukti_tf_cf : 'https://st.depositphotos.com/34584522/57984/v/1600/depositphotos_579841244-stock-illustration-unpaid-red-rubber-stamp-vector.jpg' }}" alt="" width="60px" height="30px">
                                                                                </a>


                                                                            </div>
                                                                            <div class="col-sm-6">
                                                                                <label class="col-form-label" for="status_paid_cf">Status
                                                                                    Paid</label>
                                                                                <select name="status_paid_cf" id="status_paid_cf" class="form-control">
                                                                                    <option value="Unpaid" {{ $belum_diverifikasi->status_paid_cf == 'Unpaid' ? 'selected' : '' }}>
                                                                                        Unpaid</option>
                                                                                    <option value="Paid" {{ $belum_diverifikasi->status_paid_cf == 'Paid' ? 'selected' : '' }}>
                                                                                        Paid</option>
                                                                                </select>


                                                                            </div>

                                                                            <div class="col-sm-12">
                                                                                <label class="col-form-label" for="catatan_pembayaran_cf">Catatan
                                                                                    Pembayaran</label>
                                                                                <textarea class="form-control" name="catatan_pembayaran_cf" id="catatan_pembayaran_cf" cols="30" rows="3">{{ $belum_diverifikasi->catatan_pembayaran_cf }}</textarea>


                                                                            </div>
                                                                        </div>
                                                                        <hr>
                                                                        <h5>REFUND COMMITMENT FEE</h5>
                                                                        <div class="form-group row">
                                                                            <div class="col-sm-6">
                                                                                <label class="col-form-label" for="tanggal_refund_cf">Tanggal
                                                                                    Refund</label>
                                                                                <input type="date" class="form-control" id="tanggal_refund_cf" name="tanggal_refund_cf" value="{{ $belum_diverifikasi->tanggal_refund_cf }}">
                                                                            </div>

                                                                            <div class="col-sm-6">
                                                                                <label class="col-form-label" for="bayar_refund_cf">Jumlah
                                                                                    Refund</label>
                                                                                <input type="text" class="form-control" id="bayar_refund_cf" name="bayar_refund_cf" onkeyup="formatNumber(this)" value="{{ number_format($belum_diverifikasi->bayar_refund_cf, 0, ',', ',') }}">
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                </div>



                                                            </div>

                                                        </div>

                                                        <div class="tab-pane" id="alasan" role="tabpanel">
                                                            <div class="modal-content">
                                                                <div class="modal-body">
                                                                    <div class="card-block">
                                                                        <h5>REASON</h5>

                                                                        <div class="form-group row">
                                                                            <div class="col-sm-3">
                                                                                <label class="col-form-label" for="tanggal_reject_verifikasi">Tanggal
                                                                                    Verifikasi</label>
                                                                                <input readonly type="text" class="form-control" id="tanggal_reject_verifikasi" name="tanggal_reject_verifikasi" value="{{ $belum_diverifikasi->tanggal_reject_verifikasi }}">
                                                                            </div>
                                                                            <div class="col-sm-9">
                                                                                <label class="col-form-label" for="alasan_reject">Alasan
                                                                                    Reject</label>
                                                                                <input readonly type="text" class="form-control" id="alasan_reject" name="alasan_reject" value="{{ $belum_diverifikasi->alasan_reject }}">
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
                                                                                <input type="email" class="form-control" id="email" name="email" value="{{ $user_info?->email }}">
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
                                                                                    <option value="Beginner English" {{ $belum_diverifikasi->kandidat->level_bahasa_inggris == 'Beginner English' ? 'selected' : '' }}>
                                                                                        Beginner English
                                                                                    </option>
                                                                                    <option value="⁠Medium English" {{ $belum_diverifikasi->kandidat->level_bahasa_inggris == '⁠Medium English' ? 'selected' : '' }}>
                                                                                        ⁠Medium English
                                                                                    </option>
                                                                                    <option value="Advance English" {{ $belum_diverifikasi->kandidat->level_bahasa_inggris == 'Advance English' ? 'selected' : '' }}>
                                                                                        Advance English
                                                                                    </option>
                                                                                </select>




                                                                            </div>
                                                                            <div class="col-sm-6">
                                                                                <label class="col-form-label" for="pic_level">PIC</label>
                                                                                <input type="text" class="form-control
                                                                                        " id="pic_level" name="pic_level" value="{{ $belum_diverifikasi->kandidat->pic_level }}">
                                                                            </div>
                                                                            <div class="col-sm-12">
                                                                                <label class="col-form-label" for="catatan_level">Catatan</label>
                                                                                <textarea class="form-control" name="catatan_level" id="catatan_level" cols="30" rows="3">{{ $belum_diverifikasi->kandidat->catatan_level }}</textarea>
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
                            type: 'POST', // Tetap gunakan 'POST'
                            url: `{{ route('back-office.pelamar.updateDetail.update', $belum_diverifikasi->id) }}`,
                            data: formData,
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
                            },
                            headers: {
                                'X-HTTP-Method-Override': 'PUT' // Tetap gunakan header ini
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