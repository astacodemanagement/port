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
                                            <input type="text" name="negara_tempat_kerja[]" class="form-control negara-tempat-kerja" value="{{ $pengalamanKerja->negara_tempat_kerja }}" required />
                                        </div>
                                        <div class="col-lg-4 mb-3 mb-lg-0">
                                            <h6 class="fw-7">Nama Perusahaan</h6>
                                            <input type="text" name="nama_perusahaan[]" class="form-control nama-perusahaan" value="{{ $pengalamanKerja->nama_perusahaan }}" required />
                                        </div>
                                        <div class="col-lg-4">
                                            <h6 class="fw-7">Posisi</h6>
                                            <input type="text" name="posisi[]" class="form-control posisi" value="{{ $pengalamanKerja->posisi }}" required />
                                        </div>
                                    </div>
                                    <div class="row mt-4">
                                        <div class="col-lg-4 mb-3 mb-lg-0">
                                            <h6 class="fw-7">Tanggal Mulai Bekerja</h6>
                                            <input type="date" name="tanggal_mulai_kerja[]" class="form-control tanggal-mulai-kerja" value="{{ $pengalamanKerja->tanggal_mulai_kerja }}" required />
                                        </div>
                                        <div class="col-lg-4">
                                            <h6 class="fw-7">Tanggal Selesai Bekerja</h6>
                                            <input type="date" name="tanggal_selesai_kerja[]" class="form-control tanggal-selesai-kerja" value="{{ $pengalamanKerja->tanggal_selesai_kerja }}" required />
                                        </div>
                                    </div>
                                    <input type="hidden" class="d-none id" name="id[]" value="{{ hashId($pengalamanKerja->id) }}">
                                    <button type="button"  class="btn btn-danger btn-delete-experience w-100 d-block d-lg-none mt-3"><i class="ti ti-x"></i> Hapus</button>
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
                                        <input type="text" class="form-control negara-tempat-kerja">
                                    </div>
                                    <div class="col-lg-4 mb-3 mb-lg-0">
                                        <h6 class="fw-7">Nama Perusahaan</h6>
                                        <input type="text" class="form-control nama-perusahaan">
                                    </div>
                                    <div class="col-lg-4">
                                        <h6 class="fw-7">Posisi</h6>
                                        <input type="text" class="form-control posisi">
                                    </div>
                                </div>
                                <div class="row mt-4">
                                    <div class="col-lg-4 mb-3 mb-lg-0">
                                        <h6 class="fw-7">Tanggal Mulai Bekerja</h6>
                                        <input type="date" class="form-control tanggal-mulai-kerja"/>
                                    </div>
                                    <div class="col-lg-4">
                                        <h6 class="fw-7">Tanggal Selesai Bekerja</h6>
                                        <input type="date" class="form-control tanggal-selesai-kerja" />
                                    </div>
                                </div>
                                <input type="hidden" class="d-none id">
                                <button type="button"  class="btn btn-danger btn-delete-experience w-100 d-block d-lg-none mt-3"><i class="ti ti-x"></i> Hapus</button>
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
            $('.row-list-experience').on('click', '.btn-delete-experience', function(){
                const t = $(this)

                t.closest('div.col-experience').remove()

                if ($('.row-list-experience .col-experience').length === 0) {
                    $('.row-list-experience').html('<div class="text-center no-data">Tidak ada data</div>')
                }
            })
            
            $('.row-list-experience').on('change keyup keydown', '.nama-perusahaan', function(){
                const t = $(this)
                const val = t.val()
                const posisi = t.closest('div.col-experience').find('.posisi').val()
                
                t.closest('div.col-experience').find('.experience-title').text(`${val} - ${posisi}`)
            })
            
            $('.row-list-experience').on('change keyup keydown', '.posisi', function(){
                const t = $(this)
                const val = t.val()
                const namaPerusahaan = t.closest('div.col-experience').find('.nama-perusahaan').val()
                
                t.closest('div.col-experience').find('.experience-title').text(`${namaPerusahaan} - ${val}`)
            })

            $('.btn-add-experience').on('click', function(){
                const el = $('.row-add-experience .col-experience')
                const cloneEl = el.clone()

                el.removeClass('d-none')
                cloneEl.find('.negara-tempat-kerja').attr('name', 'negara_tempat_kerja[]').prop('required', true)
                cloneEl.find('.nama-perusahaan').attr('name', 'nama_perusahaan[]').prop('required', true)
                cloneEl.find('.posisi').attr('name', 'posisi[]').prop('required', true)
                cloneEl.find('.tanggal-mulai-kerja').attr('name', 'tanggal_mulai_kerja[]').prop('required', true)
                cloneEl.find('.tanggal-selesai-kerja').attr('name', 'tanggal_selesai_kerja[]').prop('required', true)

                if ($('.row-list-experience .col-experience').length === 0) {
                    cloneEl.find('hr').remove()
                }

                cloneEl.appendTo('.row-list-experience')

                if ($('.row-list-experience .col-experience').length > 0) {
                    $('.row-list-experience .no-data').remove()
                }
            })

            $('form').on('submit', function(){
                const t = $(this)
                var formData = new FormData(t[0]);

                $.ajax({
                    url: `{{ route('member.work-experience.update') }}`,
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
        })
    </script>
@endpush