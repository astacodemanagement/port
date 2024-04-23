@extends('front.layouts.app')

@section('title', 'Register')

@section('content')
    <!-- Navbar Section Register -->
    <!-- Navbar -->
    <section class="Element-nav-items">
        <div class="container">
            @include('front.layouts.navbar')
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
                                        Pengalaman Kerja &amp; English Skills
                                    </div>
                                </div>
                            </div>

                            {{-- <div class="stepper-line h-40px"></div> --}}
                        </div>

                        {{-- <div class="stepper-item me-5" data-kt-stepper-element="nav">
                            <div class="stepper-wrapper d-flex align-items-center">
                                <div class="stepper-icon w-40px h-40px">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="stepper-check bi bi-check2" viewBox="0 0 16 16">
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
                                        Pertanyaan Screening
                                    </div>
                                </div>
                            </div>

                            <div class="stepper-line h-40px"></div>
                        </div> --}}

                        {{-- <div class="stepper-item me-5" data-kt-stepper-element="nav">
                            <div class="stepper-wrapper d-flex align-items-center">
                                <div class="stepper-icon w-40px h-40px">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="stepper-check bi bi-check2" viewBox="0 0 16 16">
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
                                        English Skills
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                    <!--end::Nav-->
                </div>

                <div class="flex-row-fluid">
                    <div class="content-from-action">
                        <form class="form mx-auto form-register" novalidate="novalidate">
                            @csrf
                            <div class="mb-5">
                                <!--begin::Step 1-->
                                <div class="flex-column current" data-kt-stepper-element="content">
                                    <div class="fv-row mb-10">
                                        <label class="form-label">Minat Pekerjaan</label>
                                        <select class="form-select mb-5" name="negara_id" aria-label="dropdownNegara">
                                            <option selected="">Negara Yang Diminat</option>
                                            @foreach ($countries as $country)
                                                <option value="{{ $country->id }}">{{ $country->nama_negara }}</option>
                                            @endforeach
                                        </select>
                                        <select class="form-select" name="kategori_job_id"
                                            aria-labelledby="dropdownKategori">
                                            <option selected="">Kategori Yang Diminati</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->nama_kategori_job }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <label class="form-label">Informasi Pribadi</label>
                                    <div class="fv-row mb-10">
                                        <input type="text" class="form-control mb-5" name="nik"
                                            placeholder="Nomor E-KTP (NIK)" value="">
                                        <input type="text" class="form-control mb-5" name="nama_lengkap"
                                            placeholder="Nama Lengkap" value="">

                                        <div class="input-group">
                                            <input type="text" class="form-control mb-5" name="tempat_lahir"
                                                placeholder="Tempat Lahir" value="">
                                            <input type="text" class="form-control datetimepicker mb-5"
                                                placeholder="Tanggal Lahir" value="">
                                            <input type="hidden" class="d-none tanggal-lahir" name="tanggal_lahir">
                                        </div>
                                        <input type="text" class="form-control mb-5" name="agama"
                                            placeholder="Agama" value="">
                                        <div class="input-group mb-5">
                                            <input type="number" class="form-control" name="berat_badan"
                                                placeholder="Berat Badan" value="">
                                            <input type="number" class="form-control" name="tinggi_badan"
                                                placeholder="Tinggi Badan" value="">
                                        </div>
                                        <select name="jenis_kelamin" id="" class="form-select mb-5">
                                            <option value="">Jenis Kelamin</option>
                                            <option value="P">Pria</option>
                                            <option value="W">Wanita</option>
                                        </select>
                                        <select name="status_kawin" id="" class="form-select mb-5">
                                            <option value="">Status Kawin</option>
                                            <option value="1">Belum Menikah</option>
                                            <option value="2">Menikah</option>
                                            <option value="3">Cerai</option>
                                        </select>
                                        <input type="text" class="form-control mb-5" name="nama_lengkap_ayah"
                                            placeholder="Nama Lengkap Ayah" value="">
                                        <input type="text" class="form-control mb-5" name="nama_lengkap_ibu"
                                            placeholder="Nama Lengkap Ibu" value="">
                                        <textarea class="form-control mb-5" rows="3" name="alamat" placeholder="Alamat"></textarea>

                                        <select class="form-select mb-5 select2 provinsi" name="provinsi_id" aria-labelledby="provinsi">
                                            <option value="">Provinsi</option>
                                            @foreach ($provinces as $province)
                                                <option value="{{ $province->id }}">{{ $province->nama_provinsi }}</option>
                                            @endforeach
                                        </select>
                                        <select class="form-select mb-5 kota" name="kota_id" aria-labelledby="kota" disabled>
                                            <option value="">Kota/Kabupaten</option>
                                        </select>
                                        <select class="form-select mb-5 kecamatan" name="kecamatan_id" aria-labelledby="kecamatan" disabled>
                                            <option value="">Kecamatan</option>
                                        </select>
                                        <select name="referensi" id="" class="form-select reference mb-5">
                                            <option value="">Dari mana kamu mengetahui kami ?</option>
                                            <option value="1">Google</option>
                                            <option value="2">Instagram</option>
                                            <option value="3">Facebook</option>
                                            <option value="4">Tiktok</option>
                                            <option value="5">Teman/Saudara/Keluarga</option>
                                            <option value="6">Sponsor</option>
                                        </select>
                                        <input type="text" class="form-control sponsor d-none" name="nama_referensi"
                                            placeholder="Siapa nama Sponsor kamu ?" value="">
                                    </div>
                                </div>
                                <!--end::Step 1-->


                                <!--begin::Step 2-->
                                <div class="flex-column" data-kt-stepper-element="content">
                                    <div class="fv-row mb-10">
                                        <label class="form-label">Dokumen Perjalanan Luar Negeri</label>
                                        <input type="text" class="form-control mb-5" name="no_paspor"
                                            placeholder="Nomor Paspor" value="">
                                        <input type="text" class="form-control mb-5" name="tanggal_pengeluaran_paspor"
                                            placeholder="Tanggal Pengeluaran Paspor / Date of Issue" value="">
                                        <input type="text" class="form-control mb-5" name="masa_kadaluarsa"
                                            placeholder="Masa Kadaluarsa Paspor / Date of Expiry" value="">
                                        <input type="text" class="form-control mb-5" name="kantor_paspor"
                                            placeholder="Kantor Yang Mengeluarkan Paspor / Issuing Office" value="">
                                        <select class="form-select mb-5" name="kondisi_paspor"
                                            aria-labelledby="dropdownPaspor">
                                            <option value="">Pilihlah Pertanyaan dibawah ini jika kamu memiliki
                                                Paspor
                                            </option>
                                            <option value="1">Paspor saya fisiknya masih ada</option>
                                            <option value="2">Paspor saya hilang</option>
                                            <option value="3">Paspor saya rusak</option>
                                            <option value="4">Paspor saya ditahan agency sebelumnya</option>
                                            <option value="5">Paspor saya terdapat data yang berbeda</option>
                                        </select>
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
                                        <input type="text" class="form-control mb-5 input-add-experience experience-country"
                                            placeholder="Negara Tempat Bekerja">
                                        <input type="text" class="form-control mb-5 input-add-experience experience-company"
                                            placeholder="Nama Perusahaan atau Majikan">
                                        <div class="input-group">
                                            <input type="text" class="form-control datetimepicker mb-5 input-add-experience experience-start-work-date"
                                                placeholder="Tanggal mulai bekerja">
                                            <input type="text" class="form-control datetimepicker mb-5 input-add-experience experience-end-work-date"
                                                placeholder="Tanggal selesai bekerja">
                                            <input type="hidden" class="d-none tanggal-mulai-bekerja input-add-experience experience-h-start-work-date">
                                            <input type="hidden" class="d-none tanggal-selesai-bekerja input-add-experience experience-h-end-work-date">
                                        </div>
                                        <input type="text" class="form-control mb-5 input-add-experience experience-position"
                                            placeholder="Posisi">
                                        <button type="button" class="btn btn-add-experience btn-primary w-100"><i class="fas fa-plus"></i> Tambahkan
                                            Pengalaman Kerja Lainnya</button>
                                    </div>
                                </div>
                                <!--end::Step 3-->

                                {{-- <!--begin::Step 4-->
                                <div class="flex-column" data-kt-stepper-element="content">
                                </div>
                                <!--end::Step 4--> --}}
                            </div>
                        </form>
                        <div class="me-2">
                            <button type="button" class="btn btn-light btn-prev float-start mt-5 btn-active-light-primary"
                                data-kt-stepper-action="previous">
                                Back
                            </button>
                            <button type="button" class="btn btn-primary float-end mt-5" data-kt-stepper-action="next">
                                Continue
                            </button>
                            <button type="button" class="btn btn-primary float-end mt-5 btn-submit"
                                data-kt-stepper-action="submit">
                                Submit
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('css')
    <link rel="stylesheet" href="{{ asset('frontend') }}/css/stepper.css">
    <style>
        .stepper.stepper-pills.stepper-column .stepper-line {
            position: unset !important;
            transform: unset !important;
        }
    </style>
@endpush

@push('script')
    <script src="{{ asset('frontend') }}/js/validate.js"></script>
    <script src="{{ asset('frontend') }}/js/scripts.bundle.js"></script>
    <script src="{{ asset('frontend') }}/js/core.js"></script>
    <script type="text/javascript" src="{{ asset('frontend') }}/js/moment-with-locales.min.js"></script>
    <script type="text/javascript" src="{{ asset('frontend') }}/js/bootstrap-datetimepicker.min.js"></script>
    <script src="{{ asset('frontend') }}/js/moment-duration-format.min.js"
        integrity="sha512-ej3mVbjyGQoZGS3JkES4ewdpjD8UBxHRGW+MN5j7lg3aGQ0k170sFCj5QJVCFghZRCio7DEmyi+8/HAwmwWWiA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js" defer></script>
    <script>
        $( document ).ready(function() {
            // $(".select2").select2({
            //     theme: "bootstrap",
            // });
        })
        let datetimepicker = $('.datetimepicker').datetimepicker({
            format: 'DD MMMM YYYY',
            locale: 'id',
            icons: {
                time: "fa fa-clock-o",
                date: "fa fa-calendar",
                up: "fa fa-arrow-up",
                down: "fa fa-arrow-down",
                previous: "fa fa-chevron-left",
                next: "fa fa-chevron-right",
                today: "fa fa-clock-o",
                clear: "fa fa-trash-o"
            }
        })

        var element = document.querySelector("#kt_stepper_example_vertical");

        var stepper = new KTStepper(element);

        stepper.on("kt.stepper.next", function(stepper) {
            stepper.goNext(); // go next step
        });

        // Handle previous step
        stepper.on("kt.stepper.previous", function(stepper) {
            stepper.goPrevious(); // go previous step
        });

        datetimepicker.on('dp.change', function(e) {
            let selectDate = e.date.format('YYYY-MM-DD')

            $('.tanggal-lahir').val(selectDate)
            calculateUsia(selectDate)
        })

        function calculateUsia(birthdate) {
            let diff = moment(birthdate).diff(moment(), 'years');
            $('.usia').val(diff.toString().replace("-", ""))
        }

        $('.provinsi').on('change', function() {
            let provinceId = $(this).val()

            if (provinceId) {
                $.ajax({
                    url: `{{ route('ajax.city') }}/${provinceId}`,
                    type: 'get',
                    beforeSend: function(){
                        $('.kota').prop('disabled', true).val('').change()
                        $('.kecamatan').prop('disabled', true).val('').change()
                    },
                    success: function(response){
                        let cities = '<option value="">Kota/Kabupaten</option>'

                        $.each(response.data, function(i, item){
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
                    beforeSend: function(){
                        $('.kecamatan').prop('disabled', true).val('').change()
                    },
                    success: function(response){
                        let subdistrict = '<option value="">Kecamatan</option>'

                        $.each(response.data, function(i, item){
                            subdistrict += `<option value="${item.id}">${item.nama_kecamatan}</option>`
                        })

                        $('.kecamatan').html(subdistrict).prop('disabled', false)
                    }
                })
            } else {
                $('.kecamatan').prop('disabled', true).val('').change()
            }
        })

        $('.reference').on('change', function(){
            $('.sponsor').addClass('d-none')

            if ($(this).val() === '6') {
                $('.sponsor').removeClass('d-none')
            }
        })

        $('.btn-add-experience').on('click', function(){
            const el = $('.row-add-experience')
            const cloneEl = el.clone()

            cloneEl.find('.btn-primary').removeClass('btn-primary').addClass('btn-danger btn-remove-experience').html('<i class="fas fa-times"></i> Hapus Pengalaman Kerja');
            cloneEl.find('.input-add-experience').removeClass('input-add-experience')
            cloneEl.find('.experience-country').attr('name', 'negara_tempat_kerja[]')
            cloneEl.find('.experience-company').attr('name', 'nama_perusahaan[]')
            cloneEl.find('.experience-h-start-work-date').attr('name', 'tanggal_mulai_kerja[]')
            cloneEl.find('.experience-h-end-work-date').attr('name', 'tanggal_selesai_kerja[]')
            cloneEl.find('.experience-position').attr('name', 'posisi[]')
            cloneEl.removeClass('row-add-experience fv-row mb-10').addClass('list-experience list-experience- mb-10')
            cloneEl.append('<hr>')
            cloneEl.appendTo('.row-list-experience')

            $('.input-add-experience').val('')
        })

        $('.row-list-experience').on('click', '.list-experience .btn-remove-experience', function() {
            $(this).closest('div.list-experience').remove()
        })

        $('.btn-submit').on('click', function(){
            const t = $(this)

            $.ajax({
                url: `{{ route('register') }}/`,
                type: 'POST',
                data: $('.form-register').serialize(),
                beforeSend: function(){
                    t.prop('disabled', true).html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Submitting')
                    $('.btn-prev').prop('disabled', true)
                },
                success: function(response){
                    console.log(response)
                }
            })
        })
    </script>
@endpush
