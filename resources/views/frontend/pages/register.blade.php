@extends('frontend.frontend_master')
@section('frontend-content')
    {{-- <div class="container"></div>,<div class="container">

        <div class="stepwizard col-md-offset-3">
            <div class="stepwizard-row setup-panel">
                <div class="stepwizard-step">
                    <a href="#step-1" type="button" class="btn btn-primary btn-circle">1</a>
                    <p>INFORMASI PRIBADI</p>
                </div>
                <div class="stepwizard-step">
                    <a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>
                    <p>DOKUMEN PERJALANAN LUAR NEGERI</p>
                </div>
                <div class="stepwizard-step">
                    <a href="#step-3" type="button" class="btn btn-default btn-circle" disabled="disabled">3</a>
                    <p>Step 3</p>
                </div>
            </div>
        </div>

        <form role="form" action="" method="post">
            <div class="row setup-content" id="step-1">
                <div class="col-xs-6 col-md-offset-3">
                    <div class="col-md-12">
                        <h3> Step 1</h3>
                        <div class="form-group">
                            <label class="control-label">First Name</label>
                            <input maxlength="100" type="text" required="required" class="form-control"
                                placeholder="Enter First Name">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Last Name</label>
                            <input maxlength="100" type="text" required="required" class="form-control"
                                placeholder="Enter Last Name">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Address</label>
                            <textarea required="required" class="form-control" placeholder="Enter your address"></textarea>
                        </div>
                        <button class="btn btn-primary nextBtn btn-lg pull-right" type="button">Next</button>
                    </div>
                </div>
            </div>
            <div class="row setup-content" id="step-2">
                <div class="col-xs-6 col-md-offset-3">
                    <div class="col-md-12">
                        <h3> Step 2</h3>
                        <div class="form-group">
                            <label class="control-label">Company Name</label>
                            <input maxlength="200" type="text" required="required" class="form-control"
                                placeholder="Enter Company Name">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Company Address</label>
                            <input maxlength="200" type="text" required="required" class="form-control"
                                placeholder="Enter Company Address">
                        </div>
                        <button class="btn btn-primary prevBtn btn-lg pull-left" type="button">Previous</button>
                        <button class="btn btn-primary nextBtn btn-lg pull-right" type="button">Next</button>
                    </div>
                </div>
            </div>
            <div class="row setup-content" id="step-3">
                <div class="col-xs-6 col-md-offset-3">
                    <div class="col-md-12">
                        <h3> Step 3</h3>
                        <button class="btn btn-primary prevBtn btn-lg pull-left" type="button">Previous</button>
                        <button class="btn btn-success btn-lg pull-right" type="submit">Submit</button>
                    </div>
                </div>
            </div>
        </form>

    </div> --}}
    <div class="blog" style="background-color:#DAF1FF">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="haading" style="text-align: center">
                        <h1 style="padding-bottom: 50px">Form Pendaftaran</h1>
                    </div>
                </div>
            </div>
            <!--begin::Stepper-->
            <div class="stepper stepper-pills stepper-column d-flex flex-column flex-lg-row" id="kt_stepper_example_vertical">
                <div class="d-flex flex-row-auto w-100 w-lg-300px">
                    <div class="stepper-nav flex-cente">
                        <div class="stepper-item me-5 current" data-kt-stepper-element="nav">
                            <div class="stepper-wrapper d-flex align-items-center">
                                <div class="stepper-icon w-40px h-40px">
                                    <i class="stepper-check fas fa-check"></i>
                                    <span class="stepper-number">1</span>
                                </div>
                                
                                <div class="stepper-label">
                                    <h3 class="stepper-title">
                                        Step 1
                                    </h3>
                                    <div class="stepper-desc">
                                        Minat & Informasi Pribadi
                                    </div>
                                </div>
                            </div>
                            
                            <div class="stepper-line h-40px"></div>      
                        </div>
                        <div class="stepper-item me-5" data-kt-stepper-element="nav">
                            <div class="stepper-wrapper d-flex align-items-center">
                                <div class="stepper-icon w-40px h-40px">
                                    <i class="stepper-check fas fa-check"></i>
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
                                    <i class="stepper-check fas fa-check"></i>
                                    <span class="stepper-number">3</span>
                                </div>
                                
                                <div class="stepper-label">
                                    <h3 class="stepper-title">
                                        Step 3
                                    </h3>
                                    <div class="stepper-desc">
                                        Pengalaman Kerja & English Skills
                                    </div>
                                </div>
                            </div>
                            
                            <div class="stepper-line h-40px"></div>
                        </div>

                        <div class="stepper-item me-5" data-kt-stepper-element="nav">
                            <div class="stepper-wrapper d-flex align-items-center">
                                <div class="stepper-icon w-40px h-40px">
                                    <i class="stepper-check fas fa-check"></i>
                                    <span class="stepper-number">4</span>
                                </div>
                                
                                <div class="stepper-label">
                                    <h3 class="stepper-title">
                                        Step 4
                                    </h3>
                                    <div class="stepper-desc">
                                        Pertanyaan Screening
                                    </div>
                                </div>
                            </div>
                            
                            <div class="stepper-line h-40px"></div>
                        </div>

                        <div class="stepper-item me-5" data-kt-stepper-element="nav">
                            <div class="stepper-wrapper d-flex align-items-center">
                                <div class="stepper-icon w-40px h-40px">
                                    <i class="stepper-check fas fa-check"></i>
                                    <span class="stepper-number">5</span>
                                </div>
                                
                                <div class="stepper-label">
                                    <h3 class="stepper-title">
                                        Step 5
                                    </h3>
                                    <div class="stepper-desc">
                                        English Skills
                                    </div>
                                </div>
                            </div>
                            
                            {{-- <div class="stepper-line h-40px"></div> --}}
                        </div>



                        {{-- <!--begin::Step 1-->
                        <div class="stepper-item me-5 current" data-kt-stepper-element="nav">
                            <!--begin::Line-->
                            <div class="stepper-line w-40px"></div>
                            <!--end::Line-->

                            <!--begin::Icon-->
                            <div class="stepper-icon w-40px h-40px">
                                <i class="stepper-check fas fa-check"></i>
                                <span class="stepper-number">1</span>
                            </div>
                            <!--end::Icon-->

                            <!--begin::Label-->
                            <div class="stepper-label">
                                <h3 class="stepper-title">
                                    Step 1
                                </h3>

                                <div class="stepper-desc">
                                    Minat & Informasi Pribadi
                                </div>
                            </div>
                            <!--end::Label-->
                        </div> --}}
                        <!--end::Step 1-->

                        <!--begin::Step 2-->
                        {{-- <div class="stepper-item me-5" data-kt-stepper-element="nav">
                            <!--begin::Line-->
                            <div class="stepper-line w-40px"></div>
                            <!--end::Line-->

                            <!--begin::Icon-->
                            <div class="stepper-icon w-40px h-40px">
                                <i class="stepper-check fas fa-check"></i>
                                <span class="stepper-number">2</span>
                            </div>
                            <!--begin::Icon-->

                            <!--begin::Label-->
                            <div class="stepper-label">
                                <h3 class="stepper-title">
                                    Step 2
                                </h3>

                                <div class="stepper-desc">
                                    Dokumen Perjalanan Luar Negeri
                                </div>
                            </div>
                            <!--end::Label-->
                        </div> --}}
                        <!--end::Step 2-->

                        <!--begin::Step 3-->
                        {{-- <div class="stepper-item me-5" data-kt-stepper-element="nav">
                            <!--begin::Line-->
                            <div class="stepper-line w-40px"></div>
                            <!--end::Line-->

                            <!--begin::Icon-->
                            <div class="stepper-icon w-40px h-40px">
                                <i class="stepper-check fas fa-check"></i>
                                <span class="stepper-number">3</span>
                            </div>
                            <!--begin::Icon-->

                            <!--begin::Label-->
                            <div class="stepper-label">
                                <h3 class="stepper-title">
                                    Step 3
                                </h3>

                                <div class="stepper-desc">
                                    Pengalaman Kerja & English Skills
                                </div>
                            </div>
                            <!--end::Label-->
                        </div> --}}
                        <!--end::Step 3-->

                        <!--begin::Step 4-->
                        {{-- <div class="stepper-item me-5" data-kt-stepper-element="nav">
                            <!--begin::Line-->
                            <div class="stepper-line w-40px"></div>
                            <!--end::Line-->

                            <!--begin::Icon-->
                            <div class="stepper-icon w-40px h-40px">
                                <i class="stepper-check fas fa-check"></i>
                                <span class="stepper-number">4</span>
                            </div>
                            <!--begin::Icon-->

                            <!--begin::Label-->
                            <div class="stepper-label">
                                <h3 class="stepper-title">
                                    Step 4
                                </h3>

                                <div class="stepper-desc">
                                    Pertanyaan Screening
                                </div>
                            </div>
                            <!--end::Label-->
                        </div> --}}
                        <!--end::Step 5-->

                        <!--begin::Step 5-->
                        {{-- <div class="stepper-item me-5" data-kt-stepper-element="nav">
                            <!--begin::Line-->
                            <div class="stepper-line w-40px"></div>
                            <!--end::Line-->

                            <!--begin::Icon-->
                            <div class="stepper-icon w-40px h-40px">
                                <i class="stepper-check fas fa-check"></i>
                                <span class="stepper-number">5</span>
                            </div>
                            <!--begin::Icon-->

                            <!--begin::Label-->
                            <div class="stepper-label">
                                <h3 class="stepper-title">
                                    Step 5
                                </h3>

                                <div class="stepper-desc">
                                    English Skills
                                </div>
                            </div>
                            <!--end::Label-->
                        </div> --}}
                        <!--end::Step 5-->

                        <!--begin::Step 4-->
                        {{-- <div class="stepper-item me-5" data-kt-stepper-element="nav">
                            <!--begin::Line-->
                            <div class="stepper-line w-40px"></div>
                            <!--end::Line-->

                            <!--begin::Icon-->
                            <div class="stepper-icon w-40px h-40px">
                                <i class="stepper-check fas fa-check"></i>
                                <span class="stepper-number">4</span>
                            </div>
                            <!--begin::Icon-->

                            <!--begin::Label-->
                            <div class="stepper-label">
                                <h3 class="stepper-title">
                                    Step 4
                                </h3>

                                <div class="stepper-desc">
                                    Pengalaman Kerja
                                </div>
                            </div>
                            <!--end::Label-->
                        </div> --}}
                        <!--end::Step 4-->
                    </div>
                    <!--end::Nav-->
                </div>

                <!--begin::Content-->
                <div class="flex-row-fluid">
                    <!--begin::Form-->
                    <form class="form w-lg-500px mx-auto" novalidate="novalidate">
                        <!--begin::Group-->
                        <div class="mb-5">
                            <!--begin::Step 1-->
                            <div class="flex-column current" data-kt-stepper-element="content">
                                <!--begin::Input group-->
                                <div class="fv-row mb-10">
                                    <!--begin::Label-->
                                    <label class="form-label">Minat Pekerjaan</label>
                                    <!--end::Label-->
                                    <select class="form-select mb-5" aria-label="dropdownNegara">
                                        <option selected>Negara Yang Diminat</option>
                                        @foreach ($countries as $country)
                                            <option value="{{ $country->id }}">{{ $country->nama_negara }}</option>
                                        @endforeach
                                    </select>
                                    <select class="form-select" aria-labelledby="dropdownKategori">
                                        <option selected>Kategori Yang Diminati</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->nama_kategori_job }}</option>
                                        @endforeach
                                    </select>

                                    <!--end::Input-->
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <!--begin::Label-->
                                <label class="form-label">Informasi Pribadi</label>
                                <!--end::Label-->
                                <div class="fv-row mb-10">
                                    <input type="text" class="form-control mb-5" name="nik" placeholder="Nomor E-KTP (NIK)" value="" />
                                    <input type="text" class="form-control mb-5" name="nama" placeholder="Nama Lengkap" value="" />
                                    <input type="text" class="form-control mb-5" name="tmp_lahir" placeholder="Tempat Lahir" value="" />
                                    <div class="input-group">
                                        <input type="text" class="form-control datetimepicker mb-5" placeholder="Tanggal Lahir" value="" />
                                        <input type="hidden" class="d-none tanggal-lahir" name="tanggal_lahir">
                                        <input type="text" class="form-control mb-5 usia" placeholder="Usia" readonly />
                                    </div>
                                    <input type="text" class="form-control mb-5" name="agama" placeholder="Agama" value="" />
                                    <div class="input-group mb-5">
                                        <input type="number" class="form-control" name="bb" placeholder="Berat Badan" value="" />
                                        <input type="number" class="form-control" name="tb" placeholder="Tinggi Badan" value="" />
                                    </div>
                                    <select name="jenis_kelamin" id="" class="form-select mb-5">
                                        <option value="">Jenis Kelamin</option>
                                        <option value="P">Pria</option>
                                        <option value="W">Wanita</option>
                                    </select>
                                    <select name="jenis_kelamin" id="" class="form-select mb-5">
                                        <option value="">Status Kawin</option>
                                        <option value="1">Belum Menikah</option>
                                        <option value="2">Menikah</option>
                                        <option value="3">Cerai</option>
                                    </select>
                                    <input type="text" class="form-control mb-5" name="nik" placeholder="Nama Lengkap Ayah" value="" />
                                    <input type="text" class="form-control mb-5" name="nik" placeholder="Nama Lengkap Ibu" value="" />
                                    <textarea class="form-control mb-5" rows="3" name="input2" placeholder="Alamat"></textarea>
                                    
                                    <select class="form-select mb-5" aria-labelledby="provinsi">
                                        <option selected>Provinsi</option>
                                    </select>
                                    <select class="form-select mb-5" aria-labelledby="kota">
                                        <option selected>Kota/Kaupaten</option>
                                    </select>
                                    <select class="form-select mb-5" aria-labelledby="kecamatan">
                                        <option selected>Kecamatan</option>
                                    </select>
                                    <select name="" id="" class="form-select">
                                        <option value="">Dari mana kamu mengetahui kami ?</option>
                                        <option value="">Google</option>
                                        <option value="">Instagram</option>
                                        <option value="">Facebook</option>
                                        <option value="">Tiktok</option>
                                        <option value="">Teman/Saudara/Keluarga</option>
                                        <option value="">Sponsor</option>
                                    </select>
                                    <input type="text" class="form-control sponsor d-none" name="nik" placeholder="Siapa nama Sponsor kamu ?" value="" />
                                </div>
                            </div>
                            <!--begin::Step 1-->


                            <!--begin::Step 2-->
                            <div class="flex-column" data-kt-stepper-element="content">
                                <!--begin::Input group-->
                                <div class="fv-row mb-10">
                                    <!--begin::Label-->
                                    <label class="form-label">Dokumen Perjalanan Luar Negeri</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input type="text" class="form-control mb-5" name="input1" placeholder="Nomor Paspor"
                                        value="" />
                                    <input type="text" class="form-control mb-5" name="input1"
                                        placeholder="Tanggal Pengeluaran Paspor / Date of Issue" value="" />
                                    <input type="text" class="form-control mb-5" name="input1"
                                        placeholder="Masa Kadaluarsa Paspor / Date of Expiry" value="" />
                                    <input type="text" class="form-control mb-5" name="input1"
                                        placeholder="Kantor Yang Mengeluarkan Paspor / Issuing Office" value="" />
                                    <select class="form-select mb-5" aria-labelledby="dropdownPaspor">
                                        <option selected>Pilihlah Pertanyaan dibawah ini jika kamu memiliki Paspor</option>
                                        <option value="1">Paspor saya fisiknya masih ada</option>
                                        <option value="2">Paspor saya hilang</option>
                                        <option value="3">Paspor saya rusak</option>
                                        <option value="4">Paspor saya ditahan agency sebelumnya</option>
                                        <option value="5">Paspor saya terdapat data yang berbeda</option>
                                    </select>
                                    <!--end::Input-->
                                </div>
                            </div>
                            <!--begin::Step 2-->

                            <!--begin::Step 3-->
                            <div class="flex-column" data-kt-stepper-element="content">
                                <!--begin::Input group-->
                                <div class="fv-row mb-10">
                                    <!--begin::Label-->
                                    <label class="form-label">Pengalaman Kerja</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input type="text" class="form-control mb-5" name="input1" placeholder="Negara Tempat Bekerja" value="" />
                                    <input type="text" class="form-control mb-5" name="input1" placeholder="Nama Perusahaan atau Majikan" value="" />
                                    <input type="text" class="form-control mb-5" name="input1" placeholder="Tanggal mulai bekerja | Tanggal selesai bekerja" value="" />
                                    <input type="text" class="form-control mb-5" name="input1" placeholder="Posisi" value="" />
                                    <!--end::Input-->
                                </div>
                                <!--end::Input group-->

                                <!--begin::Input group-->
                                {{-- <div class="fv-row mb-10">
                                    <!--begin::Label-->
                                    <label class="form-label">English SKills</label>
                                    <select class="form-select" aria-labelledby="english">
                                        <option selected>Level Bahasa Inggris</option>
                                        <option value="1">Belum Bisa</option>
                                        <option value="2">Basic</option>
                                        <option value="3">Intermediate</option>
                                        <option value="3">Advanced</option>
                                    </select>
                                    <label for="formFile" class="form-label">Upload Sertifikat Bahasa Inggris (Jika
                                        ada)</label>
                                    <input class="form-control" type="file" id="formFile">
                                </div> --}}
                                <!--end::Input group-->
                            </div>
                            <!--begin::Step 3-->

                            <!--begin::Step 4-->
                            <div class="flex-column" data-kt-stepper-element="content">
                                <!--begin::Input group-->
                                {{-- <div class="fv-row mb-10">
                                    <!--begin::Label-->
                                    <label class="form-label">Personal Question</label>
                                    <select class="form-select" aria-labelledby="anak">
                                        <option selected>Apakah anda memiliki anak ?</option>
                                        <option value="1">Ya</option>
                                        <option value="2">Tidak</option>
                                    </select>
                                    <input type="text" class="form-control" name="input1"
                                        placeholder="Berapa jumlah anak anda saat ini ?" value="" />
                                    <input type="text" class="form-control" name="input1"
                                        placeholder="Usia berapa mereka ?" value="" />
                                    <select class="form-select" aria-labelledby="yakin">
                                        <option selected>Apakah kamu sudah yakin untuk bekerja di luar negeri ?</option>
                                        <option value="1">Ya</option>
                                        <option value="2">Tidak</option>
                                    </select>
                                    <select class="form-select" aria-labelledby="motivasi">
                                        <option selected>Apa motivasi kamu untuk bekerja di luar negeri ?</option>
                                        <option value="1">Mencari uang untuk diri sendiri/keluarga</option>
                                        <option value="2">Ingin mendapatkan pengalaman kerja internasional</option>
                                        <option value="2">Ingin bekerja sambil jalan-jalan</option>
                                    </select>
                                    <select class="form-select" aria-labelledby="yakin">
                                        <option selected>Apakah kamu bersedia mematuhi seluruh peraturan yang berlaku di
                                            pekerjaan, negara penempatan, maupun negara indonesia ?</option>
                                        <option value="1">Ya</option>
                                        <option value="2">Tidak</option>
                                    </select>
                                </div>

                                <div class="fv-row mb-10">
                                    <!--begin::Label-->
                                    <label class="form-label">Health Question</label>
                                    <select class="form-select" aria-labelledby="anak">
                                        <option selected>Apakah anda sehat ?</option>
                                        <option value="1">Ya</option>
                                        <option value="2">Tidak</option>
                                    </select>
                                    <select class="form-select" aria-labelledby="yakin">
                                        <option selected>Apakah anda memiliki riwayat penyakit ?</option>
                                        <option value="1">Ya</option>
                                        <option value="2">Tidak</option>
                                    </select>
                                    <input type="text" class="form-control" name="input1" placeholder="Jelaskan"
                                        value="" />
                                    <select class="form-select" aria-labelledby="yakin">
                                        <option selected>Apakah anda memiliki keterbatasan fisik ?</option>
                                        <option value="1">Ya</option>
                                        <option value="2">Tidak</option>
                                    </select>
                                    <input type="text" class="form-control" name="input1" placeholder="Jelaskan"
                                        value="" />
                                    <select class="form-select" aria-labelledby="yakin">
                                        <option selected>Apakah anda pernah melakukan operasi dalam 1 tahun terakhir ?
                                        </option>
                                        <option value="1">Ya</option>
                                        <option value="2">Tidak</option>
                                    </select>
                                    <input type="text" class="form-control" name="input1" placeholder="Jelaskan"
                                        value="" />
                                </div> --}}
                                <!--end::Input group-->
                            </div>
                            <!--begin::Step 4-->
                        </div>
                        <!--end::Group-->

                        <!--begin::Actions-->
                        <div class="d-flex flex-stack">
                            <!--begin::Wrapper-->
                            <div class="me-2">
                                <button type="button" class="btn btn-light btn-active-light-primary"
                                    data-kt-stepper-action="previous">
                                    Back
                                </button>
                            </div>
                            <!--end::Wrapper-->

                            <!--begin::Wrapper-->
                            <div>
                                <button type="button" class="btn btn-primary" data-kt-stepper-action="submit">
                                    <span class="indicator-label">
                                        Submit
                                    </span>
                                    <span class="indicator-progress">
                                        Please wait... <span
                                            class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                    </span>
                                </button>

                                <button type="button" class="btn btn-primary" data-kt-stepper-action="next">
                                    Continue
                                </button>
                            </div>
                            <!--end::Wrapper-->
                        </div>
                        <!--end::Actions-->
                    </form>
                    <!--end::Form-->
                </div>
            </div>
            <!--end::Stepper-->
        </div>
    </div>
@endsection
@push('css')
    @include('frontend.css.datetimepicker')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css" integrity="sha512-q3eWabyZPc1XTCmF+8/LuE1ozpg5xxn7iO89yfSOd5/oKvyqLngoNGsx8jq92Y8eXJ/IRxQbEC+FGSYxtk2oiw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://preview.keenthemes.com/html/metronic/docs/assets/css/style.bundle.css">
    <style>
        .stepper.stepper-pills.stepper-column .stepper-line {
            position: unset !important;
            transform: unset !important;
        }
    </style>
@endpush
@push('script')
    @include('frontend.js.datetimepicker')
    <script src="https://preview.keenthemes.com/html/metronic/docs/assets/js/scripts.bundle.js"></script>
    <script src="https://preview.keenthemes.com/html/metronic/docs/assets/js/custom/documentation/general/stepper.js"></script>
    
    <script>
        // Stepper lement
        var element = document.querySelector("#kt_stepper_example_vertical");

        // Initialize Stepper
        var stepper = new KTStepper(element);

        // Handle next step
        stepper.on("kt.stepper.next", function(stepper) {
            stepper.goNext(); // go next step
        });

        // Handle previous step
        stepper.on("kt.stepper.previous", function(stepper) {
            stepper.goPrevious(); // go previous step
        });

        datetimepicker.on('dp.change', function(e){ 
            let selectDate = e.date.format('YYYY-MM-DD')

            $('.tanggal-lahir').val(selectDate)
            calculateUsia(selectDate)
        })

        function calculateUsia(birthdate)
        {
            let diff = moment(birthdate).diff(moment(), 'years');
            // let duration = moment.duration(diff);
            $('.usia').val(diff.toString().replace("-",""))
        }
    </script>
@endpush