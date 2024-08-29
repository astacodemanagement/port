@extends('front.compro-2.layouts.default')
@push('css')
<style>
    .red-star {
        position: absolute;
        right: 10px;
        top: 50%;
        transform: translateY(-50%);
        color: #ef4444;
        font-size: 18px;
    }

    .red-star-select {
        position: absolute;

        top: 50%;
        transform: translateY(-50%);
        color: #ef4444;
        font-size: 18px;
    }

    /* mobile */
    @media (max-width: 768px) {
        .red-star-select {
            right: 96%;
        }
    }

    @media (min-width: 768px) {
        .red-star-select {
            right: 98.5%;
        }

    }

    .textarea-red-star {
        position: absolute;
        right: 10px;
        top: 20px;
        color: #ef4444;
        font-size: 18px;
    }

    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }


    input[type=number] {
        -moz-appearance: textfield;
    }
</style>
@endpush
@include('front.compro-2.component.noauth')
@section('content')
<div class="relative">
    <!-- Gambar sebagai latar belakang -->
    <div class="tw-h-[230px] tw-bg-gradient-to-t tw-from-sky-400 tw-to-sky-600 tw-relative">
        <img src="{{ asset('frontend') }}/assets/image/bg-form.png " alt="" class="tw-absolute tw-inset-0 tw-w-full tw-h-full tw-object-cover">
        <div class="tw-absolute tw-inset-0 tw-flex tw-flex-col tw-items-center tw-justify-center">
            <h3 class="tw-text-white tw-text-center tw-pt-10 tw-font-caveat tw-text-5xl tw-font-bold">Form</h3>
            <h3 class="tw-text-white tw-text-center tw-text-6xl tw-mt-1 tw-font-semibold tw-mb-16 tw-font-clash-display">Pendaftaran</h3>
        </div>
    </div>
</div>
<div class="md:tw-flex tw-flex-row md:tw-justify-between tw-max-w-7xl tw-mx-auto tw-py-20  md:px-0 tw-px-5   ">
    <!-- Stepper -->
    <div class="md:tw-w-1/4 tw-w-full  tw-relative stepper" id="kt_stepper_example_vertical" data-kt-stepper="true">
        <div class="tw-flex tw-flex-col tw-items-center stepper-nav">
            <div class="tw-relative tw-w-full stepper-item" data-step="1">
                <div class="tw-h-16 tw-p-5 tw-w-16 tw-flex tw-items-center tw-justify-center tw-bg-sky-500 tw-rounded-xl">
                    <span class="tw-text-white tw-text-2xl tw-font-extrabold stepper-number">1</span>
                    <i class="fas fa-check tw-text-white tw-text-2xl " style="display: none"></i>
                </div>
                <div class="tw-relative tw-mx-auto tw-mr-1">
                    <img src="{{ asset('frontend') }}/assets/image/framestriped.png" alt="" class="">
                </div>
                <div class="tw-absolute tw-top-1 tw-left-24 md:tw-left-1/3 tw-text-2xl tw-font-bold tw-text-sky-500">
                    <h3 class="stepper-title">Step 1</h3>
                    <p class="tw-text-sm tw-font-normal  tw-text-gray-500 stepper-desc">Minat Dan Informasi Pribadi</p>
                </div>
            </div>

            <div class="tw-relative tw-w-full stepper-item" data-step="2">
                <div class="tw-h-16 tw-p-5 tw-w-16 tw-flex tw-items-center tw-justify-center tw-bg-gray-300 tw-rounded-xl">
                    <span class="tw-text-white tw-text-2xl tw-font-extrabold stepper-number">2</span>
                    <i class="fas fa-check tw-text-white tw-text-2xl " style="display: none"></i>
                </div>
                <div class="tw-relative tw-mx-auto tw-mr-1">
                    <img src="{{ asset('frontend') }}/assets/image/framestriped.png" alt="" class="">
                </div>
                <div class="tw-absolute tw-top-1 tw-left-24 md:tw-left-1/3 tw-text-2xl tw-font-bold tw-text-sky-500">
                    <h3 class="stepper-title">Step 2</h3>
                    <p class="tw-text-sm tw-font-normal tw-text-gray-500 stepper-desc">Dokumen Perjalanan Luar Negeri</p>
                </div>
            </div>
            <div class="tw-relative tw-w-full stepper-item" data-step="3">
                <div class="tw-h-16 tw-p-5 tw-w-16 tw-flex tw-items-center tw-justify-center tw-bg-sky-500 tw-rounded-xl">
                    <span class="tw-text-white tw-text-2xl tw-font-extrabold stepper-number">3</span>
                    <i class="fas fa-check tw-text-white tw-text-2xl " style="display: none"></i>
                </div>
                <div class="tw-relative tw-mx-auto tw-mr-1">
                    <img src="{{ asset('frontend') }}/assets/image/framestriped.png" alt="" class="">
                </div>
                <div class="tw-absolute tw-top-1 tw-left-24 md:tw-left-1/3 tw-text-2xl tw-font-bold tw-text-sky-500">
                    <h3 class="stepper-title">Step 3</h3>
                    <p class="tw-text-sm tw-font-normal tw-text-gray-500 stepper-desc">Pengalaman Kerja</p>
                </div>
            </div>



            <div class="tw-relative tw-w-full stepper-item" data-step="4">
                <div class="tw-h-16 tw-p-5 tw-w-16 tw-flex tw-items-center tw-justify-center tw-bg-sky-500 tw-rounded-xl">
                    <span class="tw-text-white tw-text-2xl tw-font-extrabold stepper-number">4</span>
                    <i class="fas fa-check tw-text-white tw-text-2xl " style="display: none"></i>
                </div>
                <div class="tw-relative tw-mx-auto tw-mr-1">
                    <img src="{{ asset('frontend') }}/assets/image/framestriped.png" alt="" class="">
                </div>
                <div class="tw-absolute tw-top-1 tw-left-24 md:tw-left-1/3 tw-text-2xl tw-font-bold tw-text-sky-500">
                    <h3 class="stepper-title">Step 4</h3>
                    <p class="tw-text-sm tw-font-normal tw-text-gray-500 stepper-desc">Centang & Upload dokumen</p>
                </div>
            </div>


            <div class="tw-relative tw-w-full stepper-item" data-step="5">
                <div class="tw-h-16 tw-p-5 tw-w-16 tw-flex tw-items-center tw-justify-center tw-bg-sky-500 tw-rounded-xl">
                    <span class="tw-text-white tw-text-2xl tw-font-extrabold stepper-number">5</span>
                    <i class="fas fa-check tw-text-white tw-text-2xl " style="display: none"></i>
                </div>

                <div class="tw-absolute tw-top-1 tw-left-24 md:tw-left-1/3 tw-text-2xl tw-font-bold tw-text-sky-500">
                    <h3 class="stepper-title">Step 5</h3>
                    <p class="tw-text-sm tw-font-normal tw-text-gray-500 stepper-desc">Kontak Akun</p>
                </div>
            </div>

        </div>
    </div>





    <!-- form 1 -->
    <form data-step="1" method="POST" id="step-form-1" class="md:tw-mt-0 tw-mt-10 tw-flex tw-flex-col md:tw-w-2/3 tw-max-w-full step-form " style="display: none">
        @csrf
        <input type="hidden" name="compro" value="2">
        <label for="" class="tw-text-gray-800 tw-font-medium tw-mt-3 tw-font-work-sans">Industri Pekerjaan</label>
        <div class="tw-relative">

            <select name="kategori_job_id" id="kategori" class="tw-w-full tw-font-work-sans tw-mt-4 tw-p-3 tw-border tw-px-3 tw-border-gray-300 tw-bg-white tw-text-gray-600 tw-rounded-md" required>
                <option value="" readonly>Industri Yang Di Inginkan </option>
                @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->nama_kategori_job }}
                </option>
                @endforeach
            </select>
        </div>
        <p class="tw-text-red-500 error-kategori" style="display: none"></p>
        <label for="nik" class="tw-text-gray-800 tw-font-medium tw-mt-3 tw-font-work-sans">Informasi Pribadi</label>
        <div class="tw-relative">

            <input type="text" name="nik" id="nik" placeholder="Nomor E-KTP (NIK) " class=" tw-font-work-sans tw-font-medium tw-mt-4 tw-p-2 tw-border tw-border-gray-300 tw-rounded-md id-card-format tw-w-full" required>

        </div>
        <p class="tw-text-red-500 error-nik" style="display: none"></p>
        <div class="tw-relative">
            <input type="text" name="nama_lengkap" id="nama_lengkap" placeholder="Nama Lengkap " class="tw-font-work-sans tw-font-medium tw-mt-4 tw-p-2 tw-border tw-border-gray-300 tw-rounded-md tw-w-full" required>
        </div>
        <p class="tw-text-red-500 error-nama_lengkap" style="display: none"></p>

        <div class="tw-flex tw-justify-around tw-flex-wrap md:tw-gap-5">
            <div class="tw-w-[48%] tw-flex tw-flex-col">
                <div class="tw-relative">

                    <input type="text" name="tempat_lahir" id="tempat_lahir" placeholder="Tempat Lahir " class="tw-w-full tw-font-work-sans tw-font-medium tw-mt-4 tw-p-2 tw-border tw-border-gray-300 tw-rounded-md" required>
                </div>
                <p class="tw-text-red-500 error-tempat_lahir" style="display: none"></p>
            </div>
            <div class="tw-w-[48%] tw-flex tw-flex-col">
                <div class="tw-relative">

                    <input type="text" placeholder="Tanggal Lahir " class="tanggal-lahir tw-w-full tw-font-work-sans tw-font-medium tw-mt-4 tw-p-2 tw-border tw-border-gray-300 tw-rounded-md" required>
                    <input type="hidden" name="tanggal_lahir" class="h-tanggal-lahir  tw-font-work-sans tw-font-medium tw-mt-4 tw-p-2 tw-border tw-border-gray-300 tw-rounded-md">
                </div>
                <!-- h_tanggal_lahir -->
                <p class="tw-text-red-500 error-tanggal_lahir" style="display: none"></p>
            </div>
        </div>

        <div class="tw-relative">

            <select name="agama" id="agama" class="tw-w-full tw-font-work-sans tw-text-gray-600 tw-bg-white tw-mt-4 tw-p-3 tw-border tw-px-3 tw-border-gray-300 tw-rounded-md" required>
                <option value="">Agama </option>
                <option value="1">Islam</option>
                <option value="2">Kristen</option>
                <option value="3">Katolik</option>
                <option value="4">Hindu</option>
                <option value="5">Buddha</option>
                <option value="6">Khonghucu</option>
                <option value="7">Lainnya</option>
            </select>
        </div>
        <p class="tw-text-red-500 error-agama" style="display: none"></p>

        <div class="tw-flex tw-justify-between md:tw-gap-5">
            <div class="tw-w-[49%] tw-flex tw-flex-col">
                <div class="tw-relative">
                    <input type="number" name="berat_badan" id="berat_badan" placeholder="Berat Badan " class="tw-w-full tw-font-work-sans tw-font-medium tw-mt-4 tw-p-2 tw-border tw-border-gray-300 tw-rounded-md" required>
                </div>
                <p class="tw-text-red-500 error-berat_badan" style="display: none"></p>
            </div>
            <div class="tw-w-[49%] tw-flex tw-flex-col">
                <div class="tw-relative">
                    <input type="number" name="tinggi_badan" id="tinggi_badan" placeholder="Tinggi Badan " class=" tw-w-full tw-font-work-sans tw-font-medium tw-mt-4 tw-p-2 tw-border tw-border-gray-300 tw-rounded-md" required>
                </div>
                <p class="tw-text-red-500 error-tinggi_badan" style="display: none"></p>
            </div>
        </div>

        <div class="tw-relative">
            <select name="jenis_kelamin" id="jenis_kelamin" class="tw-w-full tw-font-work-sans tw-text-gray-600 tw-bg-white tw-mt-4 tw-p-3 tw-border tw-px-3 tw-border-gray-300 tw-rounded-md" required>
                <option value="">Jenis Kelamin </option>
                <option value="P">Pria</option>
                <option value="W">Wanita</option>
            </select>
        </div>
        <p class="tw-text-red-500 error-jenis_kelamin" style="display: none"></p>

        <div class="tw-relative">
            <select name="status_kawin" id="status_kawin" class="tw-w-full tw-text-gray-600 tw-bg-white tw-mt-4 tw-p-3 tw-border tw-px-3 tw-border-gray-300 tw-rounded-md" required>
                <option value="">Status Kawin </option>
                <option value="1">Belum Menikah</option>
                <option value="2">Menikah</option>
                <option value="3">Cerai</option>
            </select>
        </div>
        <p class="tw-text-red-500 error-status_kawin" style="display: none"></p>
        <div class="tw-relative">
            <select name="pendidikan" id="pendidikan" class="tw-w-full tw-text-gray-600 tw-bg-white tw-mt-4 tw-p-3 tw-border tw-px-3 tw-border-gray-300 tw-rounded-md" required>
                <option value="" disabled selected>Pendidikan Terakhir</option>
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
        <p class="tw-text-red-500 error-pendidikan" style="display: none"></p>

        {{-- flex setagnah setengah ayah ibu--}}
        <div class="tw-flex tw-justify-between md:tw-gap-5">
            <div class="tw-w-[49%] tw-flex tw-flex-col">
                <div class="tw-relative">
                    <input type="text" name="nama_lengkap_ayah" id="nama_lengkap_ayah" placeholder="Nama Ayah " class="tw-w-full tw-font-work-sans tw-font-medium tw-mt-4 tw-p-2 tw-border tw-border-gray-300 tw-rounded-md" required>
                </div>
                <p class="tw-text-red-500 error-nama_lengkap_ayah" style="display: none"></p>
            </div>
            <div class="tw-w-[49%] tw-flex tw-flex-col">
                <div class="tw-relative">
                    <input type="text" name="nama_lengkap_ibu" id="nama_lengkap_ibu" placeholder="Nama Ibu " class="tw-w-full tw-font-work-sans tw-font-medium tw-mt-4 tw-p-2 tw-border tw-border-gray-300 tw-rounded-md" required>
                </div>
                <p class="tw-text-red-500 error-nama_lengkap_ibu" style="display: none"></p>
            </div>
        </div>

        <div class="tw-relative">
            <textarea name="alamat" id="alamat" placeholder="Alamat " class="tw-p-2 tw-w-full tw-mb-4 tw-border tw-border-gray-300 tw-mt-4 tw-rounded-md " rows="3" required></textarea>
            <span class="textarea-red-star">*</span>
        </div>
        <p class="tw-text-red-500 error-alamat" style="display: none"></p>

        <div class="tw-relative">

            <select name="wilayah" id="wilayah" class="tw-w-full tw-font-work-sans tw-text-gray-600 tw-bg-white tw-mt-4 tw-p-3 tw-border tw-px-3 tw-border-gray-300 tw-rounded-md wilayah" required>
            </select>
            <span class="red-star tw-z-10">*</span>
        </div>
        <p class="tw-text-red-500 error-wilayah" style="display: none"></p>

        <!-- <div class="tw-relative">

                    <select name="level_bahasa" id="level_bahasa" class="tw-w-full tw-font-work-sans tw-text-gray-600 tw-bg-white tw-mt-4 tw-p-3 tw-border tw-px-3 tw-border-gray-300 tw-rounded-md" required>
                        <option value="">Level Bahasa Inggris </option>
                        <option value="1">Beginner English (pemula)</option>
                        <option value="2">⁠Medium English (good)</option>
                        <option value="3">Advance English (profesional)</option>
    
                    </select>   
                </div>
                <p class="tw-text-red-500 error-level_bahasa" style="display: none"></p> -->
        {{-- referensi --}}
        <div class="tw-relative">
            <select name="referensi" id="referensi" class="referensi tw-w-full tw-font-work-sans tw-text-gray-600 tw-bg-white tw-mt-4 tw-p-3 tw-border tw-px-3 tw-border-gray-300 tw-rounded-md" required>
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

        <p class="tw-text-red-500 error-referensi" style="display: none"></p>
        <!-- inpur sponsor -->

        <input type="text" name="nama_referensi" id="sponsor" placeholder="Nama Sponsor" class="sponsor tw-w-full tw-font-work-sans  tw-font-medium tw-mt-4 tw-p-2 tw-border tw-border-gray-300 tw-rounded-md" required style="display:none">

        <button type="button" class="tw-py-2 tw-px-5 tw-text-white tw-w-20 tw-bg-sky-500 tw-rounded-md tw-mt-4 next-step">Next</button>
    </form>
    <!-- form 2 -->
    <form data-step="2" method="POST" id="step-form-2" class="md:tw-mt-0 tw-mt-10 tw-flex tw-flex-col md:tw-w-2/3 tw-max-w-full step-form " style="display: none">
        @csrf
        <label for="no_paspor" class="tw-text-gray-800 tw-font-medium tw-mb-3 tw-font-work-sans">Nomor Paspor</label>
        <input type="text" name="no_paspor" id="no_paspor" placeholder="Nomor Paspor" class="tw-font-work-sans tw-font-medium tw-mt-4 tw-p-2 tw-border tw-border-gray-300 tw-rounded-md passpor">
        <p class="tw-text-red-500 error-no_paspor" style="display: none"></p>

        <div class="tw-mt-3">
            <div class="tw-flex tw-gap-2">
                <input type="text" class="tw-w-full tw-p-2 tw-border tw-border-gray-300 tw-rounded-md tanggal-pengeluaran-paspor passpor" placeholder="Tanggal Pengeluaran Paspor / Date of Issue">
                <input type="text" class="tw-hidden h-tanggal-pengeluaran-paspor" name="tanggal_pengeluaran_paspor">
            </div>
        </div>
        <p class="tw-text-red-500 error-tanggal_pengeluaran_paspor" style="display: none"></p>

        <div class="tw-mt-3">
            <div class="tw-flex tw-gap-2">
                <input type="text" class="tw-w-full tw-p-2 tw-border tw-border-gray-300 tw-rounded-md masa-kadaluarsa passpor" placeholder="Masa Kadaluarsa Paspor / Date of Expiry">
                <input type="text" class="tw-hidden h-masa-kadaluarsa" name="masa_kadaluarsa">
            </div>
        </div>
        <p class="tw-text-red-500 error-masa_kadaluarsa" style="display: none"></p>

        <input type="text" name="kantor_paspor" id="kantor_paspor" placeholder="Kantor Yang Mengeluarkan Paspor" class="passpor tw-font-work-sans tw-font-medium tw-mt-4 tw-p-2 tw-border tw-border-gray-300 tw-rounded-md" required>
        <p class="tw-text-red-500 error-kantor_paspor" style="display: none"></p>

        <label for="kondisi_paspor" class="tw-text-gray-800 tw-font-medium tw-mt-3 tw-font-work-sans">Keterangan Passpor</label>
        <select name="kondisi_paspor" id="kondisi_paspor" class="tw-font-work-sans tw-text-gray-600 passpor tw-bg-white tw-mt-4 tw-p-3 tw-border tw-border-gray-300 tw-rounded-md" required>
            <option value="">Pilihlah Pertanyaan dibawah ini jika kamu memiliki Paspor</option>
            <option value="1">Paspor saya fisiknya masih ada</option>
            <option value="2">Paspor saya hilang</option>
            <option value="3">Paspor saya rusak</option>
            <option value="4">Paspor saya ditahan agency sebelumnya</option>
            <option value="5">Paspor saya terdapat data yang berbeda</option>
        </select>
        <p class="tw-text-red-500 error-kondisi_paspor" style="display: none"></p>
        <div class="form-check tw-mt-10">
            <input class="form-check-input" type="checkbox" name="keterangan_tidak_ada_passpor" id="keterangan_tidak_ada_passpor">
            <label class="form-check-label" for="keterangan_tidak_ada_passpor" style="padding-top:2px">
                <b>Ceklis Jika Belum Memiliki Passpor</b>
            </label>
        </div>
        <div class="tw-flex tw-gap-5">
            <button type="button" class="tw-py-2 tw-px-5 tw-text-white tw-w-32 tw-bg-sky-500 tw-rounded-md tw-mt-4 prev-step">Previous</button>
            <button type="button" class="tw-py-2 tw-px-5 tw-text-white tw-w-20 tw-bg-sky-500 tw-rounded-md tw-mt-4 next-step">Next</button>
        </div>
    </form>

    <!-- form 3 -->
    <form data-step="3" method="POST" id="step-form-3" class="md:tw-mt-0 tw-mt-10 tw-flex tw-flex-col md:tw-w-2/3 tw-max-w-full step-form " style="display: none">
        @csrf
        <div class="fv-row">
            <label class="tw-font-medium tw-mb-3">Pengalaman Kerja</label>
        </div>
        <!-- kategori dalam negeri luar negeri -->

        <div class="fv-row row-list-experience"></div>
        <div class="fv-row mb-10 row-add-experience">
            <div class="tw-mb-5">
                <select class="tw-w-full tw-font-work-sans tw-text-gray-600 tw-bg-white tw-mt-4 tw-p-3 tw-border tw-px-3 tw-border-gray-300 tw-rounded-md input-add-experience experience-category" required data-name="kategori.0" name="kategori[]">
                    <option value="">Pilih dimana kamu bekerja </option>
                    <option value="1">Dalam Negeri</option>
                    <option value="2">Luar Negeri</option>
                </select>
            </div>
            <div class="tw-mb-5">
                <input type="text" class="tw-w-full tw-p-2 tw-border tw-border-gray-300 tw-rounded-md experience-country input-add-experience" data-name="negara_tempat_kerja.0" placeholder="Negara Tempat Bekerja" name="negara_tempat_kerja[]">
                <p class="tw-text-red-500 error-negara_tempat_kerja" style="display: none"></p>
            </div>

            <div class="tw-mb-5">
                <input type="text" class="tw-w-full tw-p-2 tw-border tw-border-gray-300 tw-rounded-md experience-company input-add-experience" data-name="nama_perusahaan.0" placeholder="Nama Perusahaan atau Majikan" name="nama_perusahaan[]">
                <p class="tw-text-red-500 error-nama_perusahaan" style="display: none"></p>
            </div>

            <div class="tw-flex tw-gap-5 tw-mb-3">
                <div class="tw-w-1/2">
                    <input type="number" class="tw-w-full tw-p-2 tw-border tw-border-gray-300 tw-rounded-md datetimepicker experience-start-work-date input-add-experience" data-name="tanggal_mulai_kerja.0" name="tanggal_mulai_kerja[]" placeholder="Tahun mulai bekerja">
                    <!-- <input type="hidden" class="tw-hidden h-experience-start-work-date" data-name="tanggal_mulai_kerja.0" name="tanggal_mulai_kerja[]"> -->
                    <p class="tw-text-red-500 error-tanggal_mulai_kerja[]" style="display: none"></p>
                </div>
                <div class="tw-w-1/2">
                    <input type="number" class="tw-w-full tw-p-2 tw-border tw-border-gray-300 tw-rounded-md datetimepicker experience-end-work-date input-add-experience" data-name="tanggal_selesai_kerja.0" name="tanggal_selesai_kerja[]" placeholder="Tahun selesai bekerja">
                    <!-- <input type="hidden" class="tw-hidden h-experience-end-work-date" data-name="tanggal_selesai_kerja.0" name="tanggal_selesai_kerja[]"> -->
                    <p class="tw-text-red-500 error-tanggal_selesai_kerja[]" style="display: none"></p>
                </div>
            </div>
            <div class="fv-row tw-mb-5">
                <!-- desc pekerjaan -->
                <textarea name="deskripsi_pekerjaan" id="deskripsi_pekerjaan" class="tw-p-2 tw-w-full tw-border tw-border-gray-300 tw-rounded-md input-add-experience" placeholder="Deskripsi Pekerjaan" rows="3"></textarea>
            </div>

            <div class="tw-mb-5">
                <input type="text" class="tw-w-full tw-p-2 tw-border tw-border-gray-300 tw-rounded-md experience-position input-add-experience" data-name="posisi.0" placeholder="Posisi" name="posisi[]">
                <p class="tw-text-red-500 error-posisi[]" style="display: none"></p>
            </div>
            <button type="button" class="pengalaman-add tw-w-full tw-py-2 tw-bg-sky-500 tw-rounded-md tw-text-white tw-mt-4 button-experience"><i class="fas fa-plus"></i> Tambahkan Pengalaman Kerja Lainnya</button>
        </div>
        <!-- Ceklis Jika Belum Ada Pengalaman Kerja< -->


        <div class="form-check tw-mt-10">
            <input class="form-check-input" type="checkbox" name="keterangan_belum_kerja" id="keterangan_belum_kerja">
            <label class="form-check-label" for="keterangan_belum_kerja" style="padding-top:2px">
                <b>Ceklis Jika Belum Ada Pengalaman Kerja</b>
            </label>
        </div>

        <div class="tw-flex tw-gap-5">
            <button type="button" class="tw-py-2 tw-px-5 tw-text-white tw-w-32 tw-bg-sky-500 tw-rounded-md tw-mt-4 prev-step">Previous</button>
            <button type="button" class="tw-py-2 tw-px-5 tw-text-white tw-w-20 tw-bg-sky-500 tw-rounded-md tw-mt-4 next-step">Next</button>
        </div>
    </form>


    {{-- form 4 --}}
    <form data-step="4" method="POST" id="step-form-4" class="md:tw-mt-0 tw-mt-10 tw-flex tw-flex-col md:tw-w-2/3 tw-max-w-full step-form " style="display: none">
        @csrf
        <div class="fv-row mb-10">
            <label class="form-label">Dokumen Persyaratan Jati Diri yang dimiliki (wajib ceklist salah satu dokumen)</label>
            <div class="row">
                <div class="col-12">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="check_ktp" id="check_ktp">
                        <label class="form-check-label" for="check_ktp" style="padding-top:2px">
                            <b>KTP</b>
                        </label>
                        <!-- err msg -->
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="check_kartu_keluarga" id="check_kartu_keluarga">
                        <label class="form-check-label" for="check_kartu_keluarga" style="padding-top:2px">
                            <b>Kartu Keluarga</b>

                        </label>

                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="check_akta_lahir" id="check_akta_lahir">
                        <label class="form-check-label" for="check_akta_lahir" style="padding-top:2px">
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
                        <input class="form-check-input" type="checkbox" name="check_buku_nikah" id="check_buku_nikah">
                        <label class="form-check-label" for="check_buku_nikah" style="padding-top:2px">
                            <b>Buku Nikah/Akta Cerai</b>
                        </label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="check_paspor" id="paspor">
                        <label class="form-check-label" for="paspor" style="padding-top:2px">
                            <b>Paspor</b>
                        </label>
                    </div>
                    <p class="tw-text-red-500 error-check_paspor" style="display: none"></p>

                    <div class="form-input mt-3">
                        <label for=""><i>Jelaskan jika kelengkapan berkas anda terdapat perbedaan nama/alamat/tempat tanggal lahir/hilang/rusak/lainnya:</i></label>
                        <textarea name="penjelasan_dokumen" cols="30" rows="2" class="form-control" placeholder=""></textarea>
                    </div>
                    <label class="form-label mt-4">Upload Dokumen</label>
                    <div class="row">
                        <div class="col-12">
                            <div class="form-input">
                                <div class="input-group">
                                    <label class="input-group-text" for="foto" style="width: 150px">Foto </label>
                                    <input type="file" class="form-control tw-w-full" id="foto" name="file_foto" accept="image/*">
                                </div>
                                <label class="text-muted tw-block tw-text-sm"><small> Foto formal background putih/biru/merah <br> Format jpg/jpeg/png/bmp/webp</small></label>

                                <p class="tw-text-red-500 error-file_foto" style="display: none"></p>
                            </div>

                            <div class="form-input mt-2">
                                <div class="input-group">
                                    <label class="input-group-text" for="ktp" style="width: 150px">KTP </label>
                                    <input type="file" class="form-control tw-w-full" id="ktp" name="file_ktp" accept="image/*">
                                </div>
                                <label class="text-muted tw-block tw-text-sm"><small> Mohon di Scan <br>Format jpg/jpeg/png/bmp/webp </small></label>
                                <p class="tw-text-red-500 error-file_ktp" style="display: none"></p>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="tw-flex tw-gap-5">
            <button type="button" class="tw-py-2 tw-px-5 tw-text-white tw-w-32 tw-bg-sky-500 tw-rounded-md tw-mt-4 prev-step">Previous</button>
            <button type="button" class="tw-py-2 tw-px-5 tw-text-white tw-w-20 tw-bg-sky-500 tw-rounded-md tw-mt-4 next-step">Next</button>
        </div>
    </form>

    {{-- form 6 --}}
    <form data-step="5" method="POST" id="step-form-5" class="md:tw-mt-0 tw-mt-10 tw-flex tw-flex-col md:tw-w-2/3 tw-max-w-full step-form " style="display: none">
        <div class="tw-flex tw-flex-col" data-kt-stepper-element="content">
            <div class="tw-mb-10">
                <label class="tw-block tw-font-medium tw-mb-3">Kontak &amp; Akun</label>
                <div class="tw-flex tw-flex-col tw-gap-3">
                    <div class="tw-mb-3 tw-relative">
                        <input type="email" class="tw-w-full tw-p-3 tw-border tw-border-gray-300 tw-rounded-md" placeholder="Email " name="email" required>
                        <label class="text-muted tw-block tw-text-sm">Verifikasi akun akan dikirim melalui email yang didaftarkan</small></label>

                    </div>
                    <p class="tw-text-red-500 error-email" style="display: none"></p>
                    <div class="tw-relative">
                        <input type="text" class="tw-w-full tw-p-3 tw-border tw-border-gray-300 tw-rounded-md phone-number" name="no_hp" id="no_hp" placeholder="Nomor HP Aktif " required>
                    </div>
                    <p class="tw-text-red-500 error-no_hp" style="display: none"></p>
                    <div class="tw-mb-3 tw-pt-3 tw-pl-2 tw-pb-0">
                        <div class="tw-flex tw-items-center">
                            <input class="tw-mr-2" type="checkbox" name="check_whatsapp_number" id="check_whatsapp_number">
                            <label class="tw-text-gray-700" for="check_whatsapp_number">Nomor whatsapp sama dengan nomor handphone aktif</label>
                        </div>
                    </div>

                    <p class="tw-text-red-500 error-whatsapp_number" style="display: none"></p>
                    <div class="tw-mb-3 tw-relative">
                        <input type="text" class="tw-w-full tw-p-3 tw-border tw-border-gray-300 tw-rounded-md phone-number whatsapp-number" name="no_wa" id="no_wa" placeholder="Nomor Whatsapp Aktif " required>
                    </div>
                    <p class="tw-text-red-500 error-no_wa" style="display: none"></p>

                    <div class="tw-mb-3">
                        <div class="tw-flex tw-items-center">
                            <!-- kontak darurat -->
                            <select name="hubungan" id="hubungan" class="tw-w-full tw-font-work-sans tw-text-gray-600 tw-bg-white tw-mt-4 tw-p-3 tw-border tw-px-3 tw-border-gray-300 tw-rounded-md" required>
                                <option value="">Hubungan dengan kontak darurat</option>
                                <option value="1">Orang Tua</option>
                                <option value="2">Saudara Kandung</option>
                                <option value="3">Suami/Istri</option>
                            </select>
                        </div>
                    </div>
                    <!-- nama kontak darurat -->
                    <div class="tw-mb-3">
                        <div class="tw-relative">
                            <input type="text" class="tw-w-full tw-p-3 tw-border tw-border-gray-300 tw-rounded-md" name="nama_kontak_darurat" id="nama_kontak_darurat" placeholder="Nama Kontak Darurat" required>
                        </div>
                    </div>
                    <p class="tw-text-red-500 error-nama_kontak_darurat" style="display: none"></p>
                    <!-- nomor  telp darurat-->
                    <div class="tw-mb-3">
                        <div class="tw-relative">
                            <input type="text" class="tw-w-full tw-p-3 tw-border tw-border-gray-300 tw-rounded-md " name="no_telp_kontak_darurat" id="no_telp_kontak_darurat" placeholder="Nomor Telp Kontak Darurat" required>
                        </div>
                    </div>
                    <div class="tw-mb-3">
                        <div class="tw-relative tw-flex">
                            <input type="password" class="tw-w-full tw-p-3 tw-border tw-border-gray-300 tw-rounded-md" name="password" placeholder="Masukan Password Akun ">
                            <span class="tw-absolute tw-right-0 tw-top-0 tw-h-full tw-px-3 tw-bg-gray-100 tw-rounded-r-md btn-show-password" type="button" id="show-password" style="padding-top: .9rem;"><i class="fas fa-eye-slash"></i></span>

                        </div>
                        <!-- err -->
                    </div>
         
                    <div class="tw-mb-3">
                        <div class="tw-relative tw-flex">
                            <input type="password" class="tw-w-full tw-p-3 tw-border tw-border-gray-300 tw-rounded-md" name="password_confirmation" placeholder="Konfirmasi Password Akun">
                            <span class="tw-absolute tw-right-0 tw-top-0 tw-h-full tw-px-3 tw-bg-gray-100 tw-rounded-r-md btn-show-password" type="button" id="show-password" style="padding-top: .9rem;"><i class="fas fa-eye-slash"></i></span>
                        </div>
                        <!-- err -->
                    </div>
                </div>
                <p class="tw-text-red-500 error-password" style="display: none"></p>
                <p class="tw-text-red-500 error-password_confirmation" style="display: none"></p>
            </div>
        </div>
        <div class="tw-flex tw-gap-5">
            <button type="button" class="tw-py-2 tw-px-5 tw-text-white tw-w-32 tw-bg-sky-500 tw-rounded-md tw-mt-4 prev-step">Previous</button>
            <button type="button" class="tw-py-2 tw-px-5 tw-text-white tw-w-20 tw-bg-sky-500 tw-rounded-md tw-mt-4 finish-step">Kirim</button>
        </div>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.10.0/js/bootstrap-datepicker.min.js"
    integrity="sha512-LsnSViqQyaXpD4mBBdRYeP6sRwJiJveh2ZIbW41EBrNmKxgr/LFZIiWT6yr+nycvhvauz8c2nYMhrP80YhG7Cw=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="{{ asset('frontend') }}/js/moment-duration-format.min.js"
    integrity="sha512-ej3mVbjyGQoZGS3JkES4ewdpjD8UBxHRGW+MN5j7lg3aGQ0k170sFCj5QJVCFghZRCio7DEmyi+8/HAwmwWWiA=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js" defer></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@push('js')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@endpush
<script>
    $(document).ready(function() {
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

        // initExperienceDatepicker()
        // function initExperienceDatepicker() {
        //     $('.experience-start-work-date').datepicker(datepickerOption).on('changeDate', function(e) {
        //         $(this).closest('div').find('.h-experience-start-work-date').val(e.format(0, "yyyy-mm-dd"))
        //     });

        //     $('.experience-end-work-date').datepicker(datepickerOption).on('changeDate', function(e) {
        //         $(this).closest('div').find('.h-experience-end-work-date').val(e.format(0, "yyyy-mm-dd"))
        //     });
        // }
        $(".select2").select2({
            theme: 'bootstrap-5'
        });

        $('.wilayah').select2({
            theme: 'bootstrap-5',
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

        let currentStep = 1;

        function showStep(step) {
            $('.stepper-item').each(function() {
                const stepNumber = $(this).data('step');
                if (stepNumber == step) {
                    $(this).find('.tw-bg-gray-300').removeClass('tw-bg-gray-300').addClass('tw-bg-sky-500');
                } else {
                    $(this).find('.tw-bg-sky-500').removeClass('tw-bg-sky-500').addClass('tw-bg-gray-300');
                }

                if (stepNumber < step) {
                    $(this).find('.fa-check').removeClass('hidden');
                    $(this).find('.stepper-number').addClass('hidden');
                } else {
                    $(this).find('.fa-check').addClass('hidden');
                    $(this).find('.stepper-number').removeClass('hidden');
                }
            });

            $('.step-form').each(function() {
                if ($(this).data('step') == step) {
                    $(this).show();
                } else {
                    $(this).hide();
                }
            });
        }

        function validateStep(step) {

            var formData = new FormData($(`#step-form-${step}`)[0]);
            formData.append('step', step);

            // post ke url validasi
            $.ajax({
                url: `{{ route('register.step.validation') }}`,
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    if (response.success) {
                        currentStep++;
                        showStep(currentStep);
                    }


                },
                error: function(xhr, status, error) {
                    if (xhr.responseJSON) {
                        if (xhr.responseJSON.errors) {
                            for (const key in xhr.responseJSON.errors) {
                                if (Object.hasOwnProperty.call(xhr.responseJSON.errors, key)) {
                                    const element = xhr.responseJSON.errors[key];
                                    $(`.error-${key}`).text(element).show();

                                }
                            }
                        }
                    }

                }

            });

        }

        $('.next-step').click(function() {
            validateStep(currentStep);
        });



        $('.prev-step').click(function() {
            if (currentStep > 1) {
                currentStep--;
                showStep(currentStep);
            }
        });
        $('.finish-step').click(function(event) {
            event.preventDefault();
            let allFormData = new FormData();
            $('.step-form').each(function() {
                const step = $(this).data('step');
                const formData = new FormData($(this)[0]);
                formData.append('step', step);
                for (var pair of formData.entries()) {
                    allFormData.append(pair[0], pair[1]);
                }
            });

            // add csrf token
            allFormData.append('_token', '{{ csrf_token() }}');

            $.ajax({
                url: `{{ route('register') }}`,
                type: 'POST',
                data: allFormData,
                processData: false,
                contentType: false,
                success: function(response) {

                    if (response.success) {
                        window.location.href = `{{ route('compro-2.complete') }}`;
                    }
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
            })
        });


        showStep(currentStep);
        // dynamic experience
        let experienceIndex = 1;
        $('.button-experience').on('click', function() {
            const el = $('.row-add-experience')
            const cloneEl = el.clone()

            el.find('.error-message').remove()
            cloneEl.find('.pengalaman-add').removeClass('tw-bg-sky-500').addClass('tw-bg-rose-500 tw-my-4 btn-remove-experience')
                .html('<i class="fas fa-times"></i> Hapus Pengalaman Kerja');
            cloneEl.find('.input-add-experience')
            cloneEl.find('.error-message').remove()
            cloneEl.removeClass('row-add-experience fv-row mb-10').addClass(
                'list-experience list-experience- mb-10')
            cloneEl.append('<hr>')
            cloneEl.appendTo('.row-list-experience')

 
            cloneEl.find('.input-add-experience').each(function() {
                $(this).val('')
            })
           
        })

        function refreshExperienceList() {
            $('.experience-category').each(function(i) {
                const t = $(this);
                const country = t.closest('div.fv-row').find('.experience-country');
                const company = t.closest('div.fv-row').find('.experience-company');
                const startWorkdate = t.closest('div.fv-row').find('.h-experience-start-work-date');
                const endWorkdate = t.closest('div.fv-row').find('.h-experience-end-work-date');
                const position = t.closest('div.fv-row').find('.experience-position');
                const desc = t.closest('div.fv-row').find('.deskripsi_pekerjaan');


                t.attr('data-name', `kategori.${i}`);
                country.attr('data-name', `negara_tempat_kerja.${i}`);
                company.attr('data-name', `nama_perusahaan.${i}`);
                startWorkdate.attr('data-name', `tanggal_mulai_kerja.${i}`);
                endWorkdate.attr('data-name', `tanggal_selesai_kerja.${i}`);
                position.attr('data-name', `posisi.${i}`);
                desc.attr('data-name', `deskripsi_pekerjaan.${i}`);
               
            

                    t.attr('required', true)
            });
        }
        $('.row-list-experience').on('change', '.experience-category', function() {
            const t = $(this);
            const country = t.closest('div.fv-row').find('.experience-country');
            const company = t.closest('div.fv-row').find('.experience-company');
            const startWorkdate = t.closest('div.fv-row').find('.h-experience-start-work-date');
            const endWorkdate = t.closest('div.fv-row').find('.h-experience-end-work-date');
            const position = t.closest('div.fv-row').find('.experience-position');
            const desc = t.closest('div.fv-row').find('.deskripsi_pekerjaan');
       
            refreshExperienceList()
        });

        $('.row-list-experience').on('change', '.experience-category', function()  {
            const t = $(this);
            const country = t.closest('div.list-experience').find('.experience-country');
            if (t.val() === '1') {
                country.val('Indonesia');
                country.prop('disabled', true);
            } else {
                country.prop('disabled', false);
            }
            refreshExperienceList()
        });

        $('.row-list-experience').on('click', '.list-experience .btn-remove-experience', function() {
            $(this).closest('div.list-experience').remove()
            refreshExperienceList()
        })

        $('#nik').on('input', function() {
            if ($(this).val().length > 16) {
                $(this).val($(this).val().slice(0, 16))
            }
        })
        $('#no_paspor').on('input', function() {
            if ($(this).val().length > 16) {
                $(this).val($(this).val().slice(0, 16))
            }
        })
        $('#no_hp').on('input', function() {
            if ($(this).val().length > 13) {
                $(this).val($(this).val().slice(0, 13))
            }
        })
        $('#no_wa').on('input', function() {
            if ($(this).val().length > 13) {
                $(this).val($(this).val().slice(0, 13))
            }
        })



        $('.referensi').on('change', function() {

            $('.sponsor').hide()

            if ($(this).val() === '7') {
                // remove diaplay none style
                $('.sponsor').show()
            }
        })
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
    });
    $('#keterangan_belum_kerja').on('click', function() {
        // 
        if ($(this).is(':checked')) {
            $('.input-add-experience').prop('disabled', true)
            $('.input-add-experience').addClass('tw-bg-gray-300')

            $('.btn-add-experience').prop('disabled', true)
            $('.btn-remove-experience').prop('disabled', true)
            $('.input-add-experience').val('')
        } else {
            $('.input-add-experience').prop('disabled', false)
            $('.btn-add-experience').prop('disabled', false)
            $('.input-add-experience').removeClass('tw-bg-gray-300')
            $('.btn-remove-experience').prop('disabled', false)
            $('.input-add-experience').val('')
        }
    })
    $('#keterangan_tidak_ada_passpor').on('click', function() {
        if ($(this).is(':checked')) {
            $('.passpor').prop('disabled', true)
            $('.passpor').addClass('tw-bg-gray-300')
            $('.passpor').val('')
        } else {
            $('.passpor').prop('disabled', false)
            $('.passpor').removeClass('tw-bg-gray-300')
            $('.passpor').val('')
        }
    })
</script>
<script>
    $(document).ready(function() {
        $('input[required]').each(function() {
            var $input = $(this);
            var $container = $input.parent();
            $container.append('<span class="red-star">*</span>');
        });

        $('select[required]').each(function() {
            var $input = $(this);
            var $container = $input.parent();
            $container.append('<span class="red-star-select">*</span>');
        });


        $('input').on('input', function() {
            var $input = $(this);
            var $container = $input.parent();
            $container.find('.red-star').remove();
        });

        $('select').on('change', function() {
            var $input = $(this);
            var $container = $input.parent();
            $container.find('.red-star-select').remove();
        });

    });
</script>


@endsection