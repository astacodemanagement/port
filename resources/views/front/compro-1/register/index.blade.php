@extends('front.compro-1.layouts.app')
@push('css')
<style>
    .required-label::after {
        content: " *";
        color: red;
    }

    .form-control[required]::placeholder {
        content: attr(placeholder) " *";

    }
</style>

@endpush
@section('title', 'Register')

@section('content')
<!-- Navbar Section Register -->
<!-- Navbar -->
<section class="Element-nav-items">
    <div class="container">
        @include('front.compro-1.layouts.navbar')
    </div>
</section>
<!-- #End -->
<!-- #endregion -->
<!-- Wrapper Register Sipool -->
<div class="wrapper-register-sipol">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="haading" style="text-align: center">
                    <h1 style="padding-bottom: 50px">Form Pendaftaran</h1>
                </div>
            </div>
        </div>
        <!--begin::Stepper-->
        <div class="stepper stepper-pills stepper-column d-flex flex-column flex-lg-row" id="kt_stepper_example_vertical"
            data-kt-stepper="true">
            <div class="d-flex flex-row-auto w-100 w-lg-300px">
                <div class="stepper-nav flex-cente">
                    <div class="stepper-item me-5 current" data-kt-stepper-element="nav">
                        <div class="stepper-wrapper d-flex align-items-center">
                            <div class="stepper-icon w-40px h-40px">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="stepper-check bi bi-check2" viewBox="0 0 16 16">
                                    <path
                                        d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0" />
                                </svg>
                                <span class="stepper-number">1</span>
                            </div>

                            <div class="stepper-label">
                                <h3 class="stepper-title">
                                    Step 1
                                </h3>
                                <div class="stepper-desc">
                                    Minat &amp; Informasi Pribadi
                                </div>
                            </div>
                        </div>

                        <div class="stepper-line h-40px"></div>
                    </div>
                    <div class="stepper-item me-5" data-kt-stepper-element="nav">
                        <div class="stepper-wrapper d-flex align-items-center">
                            <div class="stepper-icon w-40px h-40px">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="stepper-check bi bi-check2" viewBox="0 0 16 16">
                                    <path
                                        d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0" />
                                </svg>
                                <span class="stepper-number">2</span>
                            </div>

                            <div class="stepper-label">
                                <h3 class="stepper-title">
                                    Step 2
                                </h3>
                                <div class="stepper-desc">
                                    Dokumen Perjalanan Luar Negeri
                                </div>
                            </div>
                        </div>

                        <div class="stepper-line h-40px"></div>
                    </div>

                    <div class="stepper-item me-5" data-kt-stepper-element="nav">
                        <div class="stepper-wrapper d-flex align-items-center">
                            <div class="stepper-icon w-40px h-40px">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="stepper-check bi bi-check2" viewBox="0 0 16 16">
                                    <path
                                        d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0" />
                                </svg>
                                <span class="stepper-number">3</span>
                            </div>

                            <div class="stepper-label">
                                <h3 class="stepper-title">
                                    Step 3
                                </h3>
                                <div class="stepper-desc">
                                    Pengalaman Kerja
                                </div>
                            </div>
                        </div>

                        <div class="stepper-line h-40px"></div>
                    </div>

                    <div class="stepper-item me-5" data-kt-stepper-element="nav">
                        <div class="stepper-wrapper d-flex align-items-center">
                            <div class="stepper-icon w-40px h-40px">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="stepper-check bi bi-check2" viewBox="0 0 16 16">
                                    <path
                                        d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0" />
                                </svg>
                                <span class="stepper-number">4</span>
                            </div>

                            <div class="stepper-label">
                                <h3 class="stepper-title">
                                    Step 4
                                </h3>
                                <div class="stepper-desc">
                                    Centang & Upload dokumen
                                </div>
                            </div>
                        </div>

                        <div class="stepper-line h-40px"></div>
                    </div>


                    <div class="stepper-item me-5" data-kt-stepper-element="nav">
                        <div class="stepper-wrapper d-flex align-items-center">
                            <div class="stepper-icon w-40px h-40px">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="stepper-check bi bi-check2" viewBox="0 0 16 16">
                                    <path
                                        d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0" />
                                </svg>
                                <span class="stepper-number">5</span>
                            </div>

                            <div class="stepper-label">
                                <h3 class="stepper-title">
                                    Step 5
                                </h3>
                                <div class="stepper-desc">
                                    Kontak &amp; Akun
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end::Nav-->
            </div>

            <div class="flex-row-fluid">
                <div class="content-from-action">
                    <form class="form mx-auto form-register" novalidate="novalidate">
                        @csrf
                        <input type="hidden" name="compro" value="1">
                        <div class="mb-5">

                            <!--begin::Step 1-->
                            <div class="flex-column current" data-kt-stepper-element="content">
                                <label class="form-label required-label">Industri Pekerjaan</label>
                                <div class="fv-row mb-10">
                                    <div class="form-group">
                                        <select class="form-select" name="kategori_job_id" aria-labelledby="dropdownKategori" required>
                                            <option value="">Industri Yang Diinginkan</option>
                                            @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->nama_kategori_job }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <label class="form-label required-label">Informasi Pribadi</label>
                                <div class="fv-row mb-10">
                                    <div class="form-group mb-5">
                                        <input type="text" class="form-control id-card-format" name="nik" placeholder="Nomor E-KTP (NIK)" value="" required>
                                    </div>
                                    <div class="form-group mb-5">
                                        <input type="text" class="form-control" name="nama_lengkap" placeholder="Nama Lengkap" value="" required>
                                    </div>
                                    <div class="form-group row mb-5">
                                        <div class="col-6">
                                            <input type="text" class="form-control" name="tempat_lahir" placeholder="Tempat Lahir" value="" required>
                                        </div>
                                        <div class="col-6">
                                            <input type="text" class="form-control tanggal-lahir" placeholder="Tanggal Lahir" value="" required>
                                            <input type="hidden" class="d-none h-tanggal-lahir" name="tanggal_lahir">
                                        </div>
                                    </div>
                                    <div class="form-group mb-5">
                                        <select type="text" class="form-control form-select" name="agama" required>
                                            <option value="">Agama</option>
                                            <option value="1">Islam</option>
                                            <option value="2">Kristen</option>
                                            <option value="3">Katolik</option>
                                            <option value="4">Hindu</option>
                                            <option value="5">Buddha</option>
                                            <option value="6">Khonghucu</option>
                                            <option value="7">Lainnya</option>
                                        </select>
                                    </div>
                                    <div class="form-group row mb-5">
                                        <div class="col-6"><input type="number" class="form-control" name="berat_badan" min="0" placeholder="Berat Badan" value="" required></div>
                                        <div class="col-6"><input type="number" class="form-control" name="tinggi_badan" min="0" placeholder="Tinggi Badan" value="" required></div>
                                    </div>
                                    <div class="form-group mb-5">
                                        <select name="jenis_kelamin" class="form-select">
                                            <option value="">Jenis Kelamin</option>
                                            <option value="P">Pria</option>
                                            <option value="W">Wanita</option>
                                        </select>
                                    </div>
                                    <div class="form-group mb-5">
                                        <select name="status_kawin" class="form-select">
                                            <option value="">Status Kawin</option>
                                            <option value="1">Belum Menikah</option>
                                            <option value="2">Menikah</option>
                                            <option value="3">Cerai</option>
                                        </select>
                                    </div>
                                    <div class="form-group mb-5">
                                        <select name="pendidikan" class="form-select">
                                            <option value="">Pendidikan Terakhir</option>
                                            <option value="1">SD</option>
                                            <option value="2">SMP</option>
                                            <option value="3">SMA</option>
                                            <option value="4">SMK</option>
                                            <option value="5">D3</option>
                                            <option value="6">D4</option>
                                            <option value="7">S1</option>
                                            <option value="8">S2</option>
                                            <option value="9">S3</option>
                                        </select>
                                    </div>
                                    <div class="form-group mb-5">
                                        <input type="text" class="form-control" name="nama_lengkap_ayah" placeholder="Nama Lengkap Ayah" value="">
                                    </div>
                                    <div class="form-group mb-5">
                                        <input type="text" class="form-control" name="nama_lengkap_ibu" placeholder="Nama Lengkap Ibu" value="">
                                    </div>
                                    <div class="form-group mb-5">
                                        <textarea class="form-control" rows="3" name="alamat" placeholder="Alamat"></textarea>
                                    </div>
                                    <div class="form-group mb-5">
                                        <select class="form-select wilayah" name="wilayah" aria-labelledby="wilayah">
                                        </select>
                                    </div>

                                    <!-- <div class="form-group mb-5">
                                        <select class="form-select" name="level_bahasa" aria-labelledby="levelBahasa">
                                            <option value="">Level Bahasa Inggris</option>
                                            <option value="1">Beginner English (pemula)</option>
                                            <option value="2">⁠Medium English (good)</option>
                                            <option value="3">Advance English (profesional)</option>
                                        </select>
                                    </div> -->
                                    <div class="form-group mb-5">
                                        <select name="referensi" class="form-select reference">
                                            <option value="">Dari mana kamu mengetahui kami ?</option>
                                            <option value="1">Google</option>
                                            <option value="2">Instagram</option>
                                            <option value="3">Facebook</option>
                                            <option value="4">Tiktok</option>
                                            <option value="5">Teman/Saudara/Keluarga</option>
                                            <option value="6">Disnaker/ BP2MI/ Instansi</option>
                                            <option value="7">Partnership/Sponsor/PL</option>

                                        </select>
                                    </div>
                                    <div class="form-group mb-5">
                                        <input type="text" class="form-control sponsor d-none" name="nama_referensi" placeholder="Siapa nama Sponsor kamu ?" value="">
                                    </div>
                                </div>
                            </div>
                            </body>

                            </html>

                            <!--end::Step 1-->


                            <!--begin::Step 2-->
                            <div class="flex-column" data-kt-stepper-element="content">
                                <label class="form-label">Dokumen Perjalanan Luar Negeri</label>
                                <div class="fv-row mb-10">
                                    <div class="form-group mb-5">
                                        <input type="text" class="form-control" name="no_paspor" placeholder="Nomor Paspor" value="">
                                    </div>
                                    <div class="form-group mb-5">
                                        <div class="input-group">
                                            <input type="text" class="form-control tanggal-pengeluaran-paspor" placeholder="Tanggal Pengeluaran Paspor / Date of Issue">
                                            <input type="text" class="form-control h-tanggal-pengeluaran-paspor d-none" name="tanggal_pengeluaran_paspor">
                                        </div>
                                    </div>
                                    <div class="form-group mb-5">
                                        <div class="input-group">
                                            <input type="text" class="form-control masa-kadaluarsa" placeholder="Masa Kadaluarsa Paspor / Date of Expiry" value="">
                                            <input type="text" class="form-control h-masa-kadaluarsa d-none" name="masa_kadaluarsa">
                                        </div>
                                    </div>
                                    <div class="form-group mb-5">
                                        <input type="text" class="form-control" name="kantor_paspor" placeholder="Kantor Yang Mengeluarkan Paspor / Issuing Office" value="">
                                    </div>
                                    <div class="form-group mb-5">
                                        <select class="form-select" name="kondisi_paspor" aria-labelledby="dropdownPaspor">
                                            <option value="">Pilihlah Pertanyaan dibawah ini jika kamu memiliki Paspor</option>
                                            <option value="1">Paspor saLuya fisiknya masih ada</option>
                                            <option value="2">Paspor saya hilang</option>
                                            <option value="3">Paspor saya rusak</option>
                                            <option value="4">Paspor saya ditahan agency sebelumnya</option>
                                            <option value="5">Paspor saya terdapat data yang berbeda</option>
                                        </select>
                                    </div>
                                    <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="keterangan_tidak_ada_passpor" id="keterangan_tidak_ada_passpor">
                                    <label class="form-check-label" for="keterangan_tidak_ada_passpor " style="padding-top:2px">
                                        <b>Ceklis Jika Belum Ada Passpor</b>
                                    </label>
                                </div>
                                </div>
                            </div>
                            <!--end::Step 2-->


                            <!--begin::Step 3-->
                            <div class="flex-column" data-kt-stepper-element="content">

                                <div class="fv-row">
                                    <label class="form-label">Pengalaman Kerja</label>
                                </div>
                                <div class="fv-row row-list-experience"></div>
                                <div class="fv-row mb-10 row-add-experience">
                                    <div class="form-group mb-5">
                                        <!-- <input type="text" class="form-control input-add-experience experience-category" data-name="kategori.0" placeholder="Negara Tempat Bekerja" name="kategori[]"> -->
                                        <select name="kategori[]" data-name="kategori.0" class="form-select input-add-experience experience-category" id="">
                                            <option value="">Pilih Kategori Pengalaman Kerja</option>
                                            <option value="1">Dalam Negeri</option>
                                            <option value="2">Luar Negeri</option>
                                        </select>
                                    </div>

                                    <div class="form-group mb-5">
                                        <input type="text" class="form-control input-add-experience experience-country" data-name="negara_tempat_kerja.0" placeholder="Negara Tempat Bekerja" name="negara_tempat_kerja[]">
                                    </div>

                                    <div class="form-group mb-5">
                                        <input type="text" class="form-control input-add-experience experience-company" data-name="nama_perusahaan.0" placeholder="Nama Perusahaan atau Majikan" name="nama_perusahaan[]">
                                    </div>

                                    <div class="form-group row mb-5">
                                        <div class="col-6">
                                            <input type="text" class="form-control datetimepicker input-add-experience experience-start-work-date" placeholder="Tahun mulai bekerja" name="tanggal_mulai_kerja[]">
                                        </div>
                                        <div class="col-6">
                                            <input type="text" class="form-control datetimepicker input-add-experience experience-end-work-date" placeholder="Tahun selesai bekerja" name="tanggal_selesai_kerja[]">
                                        </div>
                                    </div>
                                    <!-- desc Pekerjaan -->
                                    <div class="form-group mb-5">
                                        <textarea class="form-control input-add-experience experience-job-desc" data-name="deskripsi_pekerjaan.0" name="deskripsi_pekerjaan[]" placeholder="Deskripsi Pekerjaan"></textarea>
                                    </div>

                                    <div class="form-group mb-5">
                                        <input type="text" class="form-control input-add-experience experience-position" placeholder="Posisi" data-name="posisi.0" name="posisi[]">
                                    </div>
                                    <button type="button" class="btn btn-add-experience btn-primary w-100"><i
                                            class="fas fa-plus"></i> Tambahkan
                                        Pengalaman Kerja Lainnya</button>
                                </div>
                                <!-- belum ada pengalaman kerja -->
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="keterangan_belum_kerja" id="keterangan_belum_kerja">
                                    <label class="form-check-label" for="keterangan_belum_kerja " style="padding-top:2px">
                                        <b>Ceklis Jika Belum Ada Pengalaman Kerja</b>
                                    </label>
                                </div>
                            </div>
                            <!--end::Step 3-->


                            <!--begin::Step 4-->
                            <div class="flex-column" data-kt-stepper-element="content">
                                <div class="fv-row mb-10">
                                    <label class="form-label">Centang dokumen jati diri yang dimiliki</label>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="check_ktp" id="ktp">
                                                <label class="form-check-label" for="ktp" style="padding-top:2px">
                                                    <b>KTP</b>
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="check_kartu_keluarga" id="kk">
                                                <label class="form-check-label" for="kk" style="padding-top:2px">
                                                    <b>Kartu Keluarga</b>
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="check_akta_lahir" id="akta_lahir">
                                                <label class="form-check-label" for="akta_lahir" style="padding-top:2px">
                                                    <b>Akta Lahir</b>
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="check_ijazah" id="ijazah">
                                                <label class="form-check-label" for="ijazah" style="padding-top:2px">
                                                    <b>Ijazah</b>
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="check_buku_nikah" id="buku_nikah">
                                                <label class="form-check-label" for="buku_nikah" style="padding-top:2px">
                                                    <b>Buku Nikah/Akta Cerai</b>
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="check_paspor" id="paspor">
                                                <label class="form-check-label" for="paspor" style="padding-top:2px">
                                                    <b>Paspor</b>
                                                </label>
                                            </div>
                                            <div class="form-input mt-3">
                                                <label for=""><i>Jelaskan jika kelengkapan berkas anda terdapat perbedaan nama/alamat/tempat tanggal lahir/hilang/rusak/lainnya:</i></label>
                                                <textarea name="penjelasan_dokumen" cols="30" rows="2" class="form-control" placeholder=""></textarea>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="row mt-4">
                                        <div class="col-12">
                                            <div class="form-input">
                                                <div class="input-group">
                                                    <label class="input-group-text" for="foto" style="width: 150px">Foto </label>
                                                    <input type="file" class="form-control" id="foto" name="file_foto" accept="image/*">
                                                </div>
                                                <label class="text-muted"><small>*)Foto formal background putih/biru/merah <br>*)Format jpg/jpeg/png/bmp/webp</small></label>
                                            </div>
                                            <!-- <div class="form-input mt-2">
                                                    <div class="input-group">
                                                        <label class="input-group-text" for="paspor" style="width: 150px">Paspor</label>
                                                        <input type="file" class="form-control" id="paspor" name="file_paspor" accept="image/*,application/pdf">
                                                    </div>
                                                    <label class="text-muted"><small>Jika ada</small></label>
                                                </div> -->
                                            <div class="form-input mt-2">
                                                <div class="input-group">
                                                    <label class="input-group-text" for="ktp" style="width: 150px">KTP </label>
                                                    <input type="file" class="form-control" id="ktp" name="file_ktp" accept="image/*">
                                                </div>
                                                <label class="text-muted"><small>*)Mohon di Scan <br>*)Format jpg/jpeg/png/bmp/webp </small></label>
                                            </div>
                                            <!-- <div class="form-input mt-2">
                                                    <div class="input-group">
                                                        <label class="input-group-text" for="kk" style="width: 150px">Kartu Keluarga</label>
                                                        <input type="file" class="form-control" id="kk" name="file_kk" accept="image/*,application/pdf">
                                                    </div>
                                                    <label class="text-muted"><small>Mohon di Scan</small></label>
                                                </div> -->
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <!--begin::Step 6-->
                            <div class="flex-column" data-kt-stepper-element="content">
                                <div class="fv-row mb-10">
                                    <label class="form-label">Kontak &amp; Akun</label>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-input mb-3">
                                                <input type="email" class="form-control" placeholder="Email *" name="email">
                                                <p class="text-muted py-1">*) Verifikasi akun akan dikirim melalui email yang didaftarkan</p>
                                            </div>
                                            <div class="form-input">
                                                <input type="text" class="form-control phone-number phone-number" name="no_hp" placeholder="Nomor HP Aktif *">
                                            </div>
                                            <div class="form-input mb-3 pt-3 pl-2 pb-0">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="check_whatsapp_number" id="check_whatsapp_number">
                                                    <label class="form-check-label" for="check_whatsapp_number" style="padding-top:2px">Nomor whatsapp sama dengan nomor handphone aktif</label>
                                                </div>
                                            </div>
                                            <div class="form-input mb-3">
                                                <input type="text" class="form-control phone-number whatsapp-number" name="no_wa" placeholder="Nomor Whatsapp Aktif *">
                                            </div>
                                            <div class="form-input mb-3">
                                                <!-- kontrak darurat -->
                                                 <select name="hubungan" class="form-select">
                                                    <option value="">Hubungan dengan kontak darurat</option>
                                                    <option value="1">Orang Tua</option>
                                                    <option value="2">Saudara Kandung</option>
                                                    <option value="3">Suami/Istri</option>
                                                </select>
                                            </div>
                                            <div class="form-input mb-3">

                                                <input type="text" class="form-control" name="nama_kontak_darurat" placeholder="Nama Kontak Darurat">
                                            </div>
                                            <div class="form-input mb-3">
                                                <input type="text" class="form-control phone-number" name="no_telp_darurat"  placeholder="Nomor Telepon Darurat">
                                            </div>
                                            <div class="form-input mb-3">
                                                <div class="input-group">
                                                    <input type="password" class="form-control" name="password" placeholder="Password Akun">
                                                    <span class="btn btn-show-password text-white" style="padding-top: .8rem;" type="button" id="show-password"><i class="fas fa-eye-slash"></i></span>
                                                </div>
                                            </div>
                                            <div class="form-input mb-3">
                                                <div class="input-group">
                                                    <input type="password" class="form-control" name="password_confirmation" placeholder="Konfirmasi Password Akun">
                                                    <span class="btn btn-show-password text-white" type="button" id="show-password"><i class="fas fa-eye-slash"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--end::Step 6-->
                        </div>
                    </form>
                    <div class="me-2">
                        <button type="button"
                            class="btn btn-light btn-prev float-start mt-5 btn-active-light-primary"
                            data-kt-stepper-action="previous">
                            Kembali
                        </button>
                        <button type="button" class="btn btn-primary float-end mt-5 btn-next" data-kt-stepper-action="next">
                        Selanjutnya
                        </button>
                        <button type="button" class="btn btn-primary float-end mt-5 btn-submit"
                            data-kt-stepper-action="submit">
                            Kirim
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('css')
<link rel="stylesheet" href="{{ asset('frontend/css/register.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.10.0/css/bootstrap-datepicker.min.css" integrity="sha512-34s5cpvaNG3BknEWSuOncX28vz97bRI59UnVtEEpFX536A7BtZSJHsDyFoCl8S7Dt2TPzcrCEoHBGeM4SUBDBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endpush

@push('script')
@include('vendors.cleave-js')
<script src="{{ asset('frontend/js/ajax-setup.js') }}"></script>
<script src="{{ asset('frontend') }}/js/validate.js"></script>
<script src="{{ asset('frontend') }}/js/scripts.bundle.js"></script>
<script src="{{ asset('frontend') }}/js/core.js"></script>
<script type="text/javascript" src="{{ asset('frontend') }}/js/moment-with-locales.min.js"></script>
{{-- <script type="text/javascript" src="{{ asset('frontend') }}/js/bootstrap-datetimepicker.min.js"></script> --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.10.0/js/bootstrap-datepicker.min.js"
    integrity="sha512-LsnSViqQyaXpD4mBBdRYeP6sRwJiJveh2ZIbW41EBrNmKxgr/LFZIiWT6yr+nycvhvauz8c2nYMhrP80YhG7Cw=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="{{ asset('frontend') }}/js/moment-duration-format.min.js"
    integrity="sha512-ej3mVbjyGQoZGS3JkES4ewdpjD8UBxHRGW+MN5j7lg3aGQ0k170sFCj5QJVCFghZRCio7DEmyi+8/HAwmwWWiA=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js" defer></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    $(document).ready(function() {
        $(".select2").select2({
            theme: "bootstrap"
        });

        $('.wilayah').select2({
            theme: "bootstrap",
            placeholder: "Cari Kecamatan, Kota atau Provinsi",
            minimumInputLength: 1,
            ajax: {
                url: `{{ route('ajax.wilayah.search') }}`,
                dataType: 'json',
                delay: 250,
                processResults: function(data) {
                    return {
                        results: $.map(data.data, function(item) {
                            return {
                                text: `${item.nama_provinsi}, ${item.nama_kota}, ${item.nama_kecamatan}`,
                                id: item.id,
                            }
                        }),
                        pagination: {
                            more: data.more_pagination
                        }
                    }
                },
                cache: true
            }
        })
    })

    let datepickerOption = {
        format: "dd MM yyyy",
        autoclose: true
    }

    $('.tanggal-lahir').datepicker(datepickerOption).on('changeDate', function(e) {
        $('.h-tanggal-lahir').val(e.format(0, "yyyy-mm-dd"))
    });

    $('.tanggal-pengeluaran-paspor').datepicker(datepickerOption).on('changeDate', function(e) {
        $('.h-tanggal-pengeluaran-paspor').val(e.format(0, "yyyy-mm-dd"))
    });

    $('.masa-kadaluarsa').datepicker(datepickerOption).on('changeDate', function(e) {
        $('.h-masa-kadaluarsa').val(e.format(0, "yyyy-mm-dd"))
    });

    initExperienceDatepicker()

    function initExperienceDatepicker() {
        $('.experience-start-work-date').datepicker(datepickerOption).on('changeDate', function(e) {
            $(this).closest('div').find('.h-experience-start-work-date').val(e.format(0, "yyyy-mm-dd"))
        });

        $('.experience-end-work-date').datepicker(datepickerOption).on('changeDate', function(e) {
            $(this).closest('div').find('.h-experience-end-work-date').val(e.format(0, "yyyy-mm-dd"))
        });
    }

    var element = document.querySelector("#kt_stepper_example_vertical");

    var stepper = new KTStepper(element);

    stepper.on("kt.stepper.next", function(stepper) {
        const nextBtn = stepper.btnNext.classList[4]

        var formData = new FormData($('.form-register')[0]);

        formData.append('step', stepper.currentStepIndex)

        $.ajax({
            url: `{{ route('register.step.validation') }}`,
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            beforeSend: function() {
                $('form').find('.error-message').remove()
                $(`.${nextBtn}`).prop('disabled', true).prepend('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>')
            },
            success: function(response) {
                if (response.success) {
                    stepper.goNext()
                }
                console.log(response)
            },
            complete: function() {
                $(`.${nextBtn}`).find('.spinner-border').remove()
                $(`.${nextBtn}`).prop('disabled', false)
            },
            error: function(xhr, status, error) {
                if (xhr.responseJSON) {
                    if (xhr.responseJSON.errors) {
                        $.each(xhr.responseJSON.errors, function(i, item) {
                            let attribute = `input[name="${i}"],select[name="${i}"],textarea[name="${i}"]`

                            if (i.match(/\./g)) {
                                attribute = `input[data-name="${i}"],select[data-name="${i}"],textarea[data-name="${i}"]`
                            }

                            $('form').find(attribute).closest('div').append(`<div class="w-100"><small class="error-message text-danger">${item}</small></div>`)

                        })
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Terjadi Kesalahan',
                            text: xhr.responseJSON.message,
                            confirmButtonText: 'OK'
                        })
                    }
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Terjadi Kesalahan',
                        text: '',
                        confirmButtonText: 'OK'
                    })
                }
            }
        });
    })

    // Handle previous step
    stepper.on("kt.stepper.previous", function(stepper) {
        stepper.goPrevious(); // go previous step
    });

    // function calculateUsia(birthdate) {
    //     let diff = moment(birthdate).diff(moment(), 'years');
    //     $('.usia').val(diff.toString().replace("-", ""))
    // }

    $('.provinsi').on('change', function() {
        let provinceId = $(this).val()

        if (provinceId) {
            $.ajax({
                url: `{{ route('ajax.city') }}/${provinceId}`,
                type: 'get',
                beforeSend: function() {
                    $('.kota').prop('disabled', true).val('').change()
                    $('.kecamatan').prop('disabled', true).val('').change()
                },
                success: function(response) {
                    let cities = '<option value="">Kota/Kabupaten</option>'

                    $.each(response.data, function(i, item) {
                        cities += `<option value="${item.id}">${item.nama_kota}</option>`
                    })

                    $('.kota').html(cities).prop('disabled', false)
                }
            })
        } else {
            $('.kota').prop('disabled', true).val('').change()
            $('.kecamatan').prop('disabled', true).val('').change()
        }
    })

    $('.kota').on('change', function() {
        let cityId = $(this).val()

        if (cityId) {
            $.ajax({
                url: `{{ route('ajax.subdistrict') }}/${cityId}`,
                type: 'get',
                beforeSend: function() {
                    $('.kecamatan').prop('disabled', true).val('').change()
                },
                success: function(response) {
                    let subdistrict = '<option value="">Kecamatan</option>'

                    $.each(response.data, function(i, item) {
                        subdistrict +=
                            `<option value="${item.id}">${item.nama_kecamatan}</option>`
                    })

                    $('.kecamatan').html(subdistrict).prop('disabled', false)
                }
            })
        } else {
            $('.kecamatan').prop('disabled', true).val('').change()
        }
    })

    $('.reference').on('change', function() {
        $('.sponsor').addClass('d-none')

        if ($(this).val() === '7') {
            $('.sponsor').removeClass('d-none')
        }
    })


    $('.btn-add-experience').on('click', function() {
        const el = $('.row-add-experience')
        const cloneEl = el.clone()

        el.find('.error-message').remove()
        cloneEl.find('.btn-primary').removeClass('btn-primary').addClass('btn-danger btn-remove-experience')
            .html('<i class="fas fa-times"></i> Hapus Pengalaman Kerja');
        cloneEl.find('.input-add-experience')
        cloneEl.find('.error-message').remove()
        cloneEl.removeClass('row-add-experience fv-row mb-10').addClass(
            'list-experience list-experience- mb-10')
        cloneEl.append('<hr>')
        cloneEl.appendTo('.row-list-experience')
        // delete value input sebelumnya

        cloneEl.find('.input-add-experience').val('')
        cloneEl.find('.experience-category').val('')
        cloneEl.find('.experience-country').val('')
        cloneEl.find('.experience-company').val('')
        cloneEl.find('.experience-start-work-date').val('')
        cloneEl.find('.experience-end-work-date').val('')
        cloneEl.find('.experience-position').val('')
        cloneEl.find('.experience-job-desc').val('')

        refreshExperienceList()
        initExperienceDatepicker()
    })

    function refreshExperienceList() {
        $.each($('.experience-country'), function(i, item) {
            const t = $(this)
            const category = t.closest('div.fv-row').find('.experience-category')
            const company = t.closest('div.fv-row').find('.experience-company')
            const startWorkdate = t.closest('div.fv-row').find('.h-experience-start-work-date')
            const endWorkdate = t.closest('div.fv-row').find('.h-experience-end-work-date')
            const position = t.closest('div.fv-row').find('.experience-position')
            const desc = t.closest('div.fv-row').find('.experience-job-desc')

            t.attr('data-name', `negara_tempat_kerja.${i}`)
            category.attr('data-name', `kategori.${i}`)
            company.attr('data-name', `nama_perusahaan.${i}`)
            startWorkdate.attr('data-name', `tanggal_mulai_kerja.${i}`)
            endWorkdate.attr('data-name', `tanggal_selesai_kerja.${i}`)
            position.attr('data-name', `posisi.${i}`)
            desc.attr('data-name', `deskripsi_pekerjaan.${i}`)

        })
    }

    $('.row-list-experience').on('click', '.list-experience .btn-remove-experience', function() {
        $(this).closest('div.list-experience').remove()
        refreshExperienceList()
    })
    $('.row-list-experience').on('change', '.experience-category', function() {
        const t = $(this);
        const country = t.closest('div.fv-row').find('.experience-country');
        const company = t.closest('div.fv-row').find('.experience-company');
        const startWorkdate = t.closest('div.fv-row').find('.h-experience-start-work-date');
        const endWorkdate = t.closest('div.fv-row').find('.h-experience-end-work-date');
        const position = t.closest('div.fv-row').find('.experience-position');
        const desc = t.closest('div.fv-row').find('.experience-job-desc ');
        if (t.val() === '1') {
            country.val('Indonesia');
            country.prop('disabled', true);
        } else {
            country.val('');
            country.prop('disabled', false);
        }
        refreshExperienceList()
    });

    $('.experience-category').change(function() {
        console.log($(this).val());
        if ($(this).val() == '1') {
            $('.experience-country').val('Indonesia');
            $('.experience-country').prop('disabled', true);
        } else {
            $('.experience-country').val('');
        }
    });

    $('#check_whatsapp_number').on('click', function() {
        const t = $(this)

        if (t.is(':checked')) {
            $('.whatsapp-number').prop('disabled', true)
            $('.whatsapp-number').val($('.phone-number').val())
        } else {
            $('.whatsapp-number').prop('disabled', false)
        }
    })

    $('.phone-number').on('keyup keydown change', function() {
        if ($('#check_whatsapp_number').is(':checked')) {
            $('.whatsapp-number').val($(this).val())
        }
    })

    $('.btn-show-password').on('click', function() {
        const t = $(this)

        if (t.closest('div').find('input').attr('type') === 'password') {
            t.closest('div').find('input').attr('type', 'text')
            t.find('i').removeClass('fa-eye-slash').addClass('fa-eye')
        } else {
            t.closest('div').find('input').attr('type', 'password')
            t.find('i').removeClass('fa-eye').addClass('fa-eye-slash')
        }
    })
    // handle tidak ada pengalaman kerja
    $('#keterangan_belum_kerja').on('click', function() {
        // 
        if ($(this).is(':checked')) {
            $('.input-add-experience').prop('disabled', true)
            $('.btn-add-experience').prop('disabled', true)
            $('.btn-remove-experience').prop('disabled', true)
            $('.input-add-experience').val('')
        } else {
            $('.input-add-experience').prop('disabled', false)
            $('.btn-add-experience').prop('disabled', false)
            $('.btn-remove-experience').prop('disabled', false)
            $('.input-add-experience').val('')
        }
    })
    $('.btn-submit').on('click', function() {
        const t = $(this)
        var formData = new FormData($('.form-register')[0]);

        $.ajax({
            url: `{{ route('register') }}`,
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            beforeSend: function() {
                $('form').find('.error-message').remove()
                t.prop('disabled', true).html(
                    '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Submitting'
                )
                $('.btn-prev').prop('disabled', true)
            },
            success: function(response) {
                console.log(response);
                if (response.success) {
                    t.prop('disabled', true).html(
                        '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Redirect'
                    )
                    location.href = `{{ route('register.complete') }}`
                }
            },
            error: function(xhr, status, error) {
                t.prop('disabled', false).html('Submit')
                $('.btn-prev').prop('disabled', false)

                if (xhr.responseJSON) {
                    if (xhr.responseJSON.errors) {
                        $.each(xhr.responseJSON.errors, function(i, item) {
                            let attribute = `input[name="${i}"],select[name="${i}"],textarea[name="${i}"]`

                            if (i.match(/\./g)) {
                                attribute = `input[data-name="${i}"],select[data-name="${i}"],textarea[data-name="${i}"]`
                            }

                            $('form').find(attribute).closest('div').append(`<div class="w-100"><small class="error-message text-danger">${item}</small></div>`)

                        })
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Terjadi Kesalahan',
                            text: xhr.responseJSON.message,
                            confirmButtonText: 'OK'
                        })
                    }
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Terjadi Kesalahan',
                        text: '',
                        confirmButtonText: 'OK'
                    })
                }
            }
        })
    })
</script>
<script>

</script>
@endpush