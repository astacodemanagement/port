@extends('front.member.layouts.app')

@section('title', 'Edit Pengalaman kerja')

@section('content')
    <div class="row">
        @include('front.member.layouts.profile-info')
        <div class="col-md-9">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title fw-semibold">Edit Pengalaman kerja</h5>
                    <hr class="mb-4 mt-4 w-100">

                    <form method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row-list-experience">
                            @php
                                $i = 0;
                            @endphp
                            @foreach (auth()->user()->kandidat->pengalamanKerja as $pengalamanKerja)
                                <div class="col-experience mt-4" >
                                    @if ($i > 0)
                                        <hr class="my-3 my-lg-5">
                                    @endif
                                    <h5 class="fw-7 text-primary experience-title">{{ $pengalamanKerja->nama_perusahaan . ' - ' . $pengalamanKerja->posisi }}</h5>
                                    <div class="pt-3 float-end">
                                        <button type="button" class="btn btn-danger btn-sm btn-delete-experience mt-n5 d-none d-lg-block"><i class="ti ti-x"></i> Hapus</button>
                                    </div>
                                    <div class="row mt-lg-4 mt-4">
                                        <div class="col-lg-4 mb-3 mb-lg-0">
                                            <h6 class="fw-7">Negara Tempat Bekerja</h6>
                                            <input type="text" class="form-control experience-country" name="negara_tempat_kerja[]" value="{{ $pengalamanKerja->negara_tempat_kerja }}" required />
                                        </div>
                                        <div class="col-lg-4 mb-3 mb-lg-0">
                                            <h6 class="fw-7">Nama Perusahaan</h6>
                                            <input type="text" class="form-control experience-company" name="nama_perusahaan[]" value="{{ $pengalamanKerja->nama_perusahaan }}" required />
                                        </div>
                                        <div class="col-lg-4">
                                            <h6 class="fw-7">Posisi</h6>
                                            <input type="text" class="form-control experience-position" name="posisi[]" value="{{ $pengalamanKerja->posisi }}" required />
                                        </div>
                                    </div>
                                    <div class="row mt-4">
                                        <div class="col-lg-4 mb-3 mb-lg-0">
                                            <h6 class="fw-7">Tanggal Mulai Bekerja</h6>
                                            <input type="date" class="form-control experience-start-work-date" name="tanggal_mulai_kerja[]" value="{{ $pengalamanKerja->tanggal_mulai_kerja }}" required />
                                        </div>
                                        <div class="col-lg-4">
                                            <h6 class="fw-7">Tanggal Selesai Bekerja</h6>
                                            <input type="date" class="form-control experience-end-work-date" name="tanggal_selesai_kerja[]" value="{{ $pengalamanKerja->tanggal_selesai_kerja }}" required />
                                        </div>
                                    </div>
                                    <button type="button" class="btn btn-danger btn-delete-experience w-100 d-block d-lg-none mt-3"><i class="ti ti-x"></i> Hapus</button>
                                </div>
                                @php
                                    $i++;
                                @endphp
                            @endforeach
                        </div>
                        <div class="row-add-experience d-none">
                            <div class="col-experience mt-4" >
                                <hr class="my-3 my-lg-5">
                                <h5 class="fw-7 text-primary experience-title">&nbsp;</h5>
                                <div class="pt-3 float-end">
                                    <button type="button"  class="btn btn-danger btn-sm btn-delete-experience mt-n5 d-none d-lg-block"><i class="ti ti-x"></i> Hapus</button>
                                </div>
                                <div class="row mt-lg-4 mt-4">
                                    <div class="col-lg-4 mb-3 mb-lg-0">
                                        <h6 class="fw-7">Negara Tempat Bekerja</h6>
                                        <input type="text" class="form-control experience-country">
                                    </div>
                                    <div class="col-lg-4 mb-3 mb-lg-0">
                                        <h6 class="fw-7">Nama Perusahaan</h6>
                                        <input type="text" class="form-control experience-company">
                                    </div>
                                    <div class="col-lg-4">
                                        <h6 class="fw-7">Posisi</h6>
                                        <input type="text" class="form-control experience-position">
                                    </div>
                                </div>
                                <div class="row mt-4">
                                    <div class="col-lg-4 mb-3 mb-lg-0">
                                        <h6 class="fw-7">Tanggal Mulai Bekerja</h6>
                                        <input type="date" class="form-control experience-start-work-date"/>
                                    </div>
                                    <div class="col-lg-4">
                                        <h6 class="fw-7">Tanggal Selesai Bekerja</h6>
                                        <input type="date" class="form-control experience-end-work-date" />
                                    </div>
                                </div>
                                <button type="button" class="btn btn-danger btn-delete-experience w-100 d-block d-lg-none mt-3"><i class="ti ti-x"></i> Hapus</button>
                            </div>
                        </div>
                        <button type="button" class="btn btn-outline-primary btn-add-experience mt-5"><i class="ti ti-plus"></i> Tambah Pengalaman Kerja</button>

                        <div class="mt-5 text-end">
                            <a href="{{ route('member.work-experience.index') }}" class="btn btn-outline-danger">Cancel</a>
                            <button class="btn btn-primary btn-save">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(function(){
            refreshExperienceList()

            $('.row-list-experience').on('click', '.btn-delete-experience', function(){
                const t = $(this)

                t.closest('div.col-experience').remove()
                refreshExperienceList()

                if ($('.row-list-experience .col-experience').length === 0) {
                    $('.row-list-experience').html('<div class="text-center no-data">Tidak ada data</div>')
                }
            })
            
            $('.row-list-experience').on('change keyup keydown', '.experience-company', function(){
                const t = $(this)
                const val = t.val()
                const position = t.closest('div.col-experience').find('.experience-position').val()
                
                t.closest('div.col-experience').find('.experience-title').text(`${val} - ${position}`)
            })
            
            $('.row-list-experience').on('change keyup keydown', '.experience-position', function(){
                const t = $(this)
                const val = t.val()
                const company = t.closest('div.col-experience').find('.experience-company').val()
                
                t.closest('div.col-experience').find('.experience-title').text(`${company} - ${val}`)
            })

            $('.btn-add-experience').on('click', function(){
                const el = $('.row-add-experience .col-experience')
                const cloneEl = el.clone()

                el.removeClass('d-none')
                cloneEl.find('.experience-country').attr('name', 'negara_tempat_kerja[]').prop('required', true)
                cloneEl.find('.experience-company').attr('name', 'nama_perusahaan[]').prop('required', true)
                cloneEl.find('.experience-position').attr('name', 'posisi[]').prop('required', true)
                cloneEl.find('.experience-start-work-date').attr('name', 'tanggal_mulai_kerja[]').prop('required', true)
                cloneEl.find('.experience-end-work-date').attr('name', 'tanggal_selesai_kerja[]').prop('required', true)

                if ($('.row-list-experience .col-experience').length === 0) {
                    cloneEl.find('hr').remove()
                }

                cloneEl.appendTo('.row-list-experience')
                refreshExperienceList()

                if ($('.row-list-experience .col-experience').length > 0) {
                    $('.row-list-experience .no-data').remove()
                }
            })

            $('form').on('submit', function(){
                const t = $(this)
                var formData = new FormData(t[0]);

                if ($('.row-list-experience .col-experience').length === 0) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Terjadi Kesalahan',
                        text: 'Tidak ada pengalaman kerja yg disimpan',
                        confirmButtonText: 'OK'
                    })

                    return false
                }

                $.ajax({
                    url: t.attr('action'),
                    type: 'POST',
                    data: formData,
                    contentType: false,
                    processData: false,
                    beforeSend: function() {
                        t.find('.error-message').remove()
                        t.find('.btn-save').prop('disabled', true).html(
                            '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Submitting'
                        )
                    },
                    success: function(response) {
                        if (response.success) {
                            if (response.data.length) {
                                let workExperience = '';

                                $(response.data).each(function(i, item){
                                    workExperience += `<a href="javascript:void(0)" class="list-group-item border-0 px-0" aria-current="true">
                                                            <div class="d-flex w-100 justify-content-between">
                                                                <h6 class="mb-1 fw-7">${item.posisi}</h6>
                                                                <small class="text-muted">${item.time}</small>
                                                            </div>
                                                            <p class="mb-1">${item.nama_perusahaan}</p>
                                                        </a>`
                                })
                                
                                $('.sidebar-work-experience-list').html(workExperience)
                            }

                            t.find('.btn-save').text('Save')
                            
                            Swal.fire({
                                icon: 'success',
                                title: 'Sukses',
                                text: response.message,
                                confirmButtonText: 'OK'
                            })
                        }
                    },
                    complete: function(response) {
                        t.find('.btn-save').prop('disabled', false)
                    },
                    error: function(xhr, status, error) {
                        t.find('.btn-save').prop('disabled', false).html('Submit')
                        
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

                return false
            })
            
            function refreshExperienceList()
            {
                $.each($('.col-experience'), function(i, item){
                    const t = $(this)
                    
                    t.find('.experience-country').attr('data-name', `negara_tempat_kerja.${i}`)
                    t.find('.experience-company').attr('data-name', `nama_perusahaan.${i}`)
                    t.find('.experience-start-work-date').attr('data-name', `tanggal_mulai_kerja.${i}`)
                    t.find('.experience-end-work-date').attr('data-name', `tanggal_selesai_kerja.${i}`)
                    t.find('.experience-position').attr('data-name', `posisi.${i}`)
                })
            }
        })
    </script>
@endpush