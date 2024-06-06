@extends('front.member.layouts.app')

@section('title', 'Edit Profile')

@section('content')
    <div class="row">
        @include('front.member.layouts.profile-info')
        
        <div class="col-md-9">
            <div class="card">
                <div class="card-body">
                    <ul class="nav nav-pills user-profile-tab justify-content-start mt-2 rounded-2" id="pills-tab"
                        role="tablist">
                        <li class="nav-item" role="presentation">
                            <button
                                class="nav-link position-relative rounded-0 d-flex align-items-center justify-content-center bg-transparent fs-3 py-6 active"
                                id="pills-personal-detail-tab" data-bs-toggle="pill" data-bs-target="#pills-personal-detail"
                                type="button" role="tab" aria-controls="pills-personal-detail" aria-selected="true">
                                <i class="ti ti-user-circle me-2 fs-6"></i>
                                <span class="d-none d-md-block">Data Diri</span>
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button
                                class="nav-link position-relative rounded-0 d-flex align-items-center justify-content-center bg-transparent fs-3 py-6"
                                id="passport-tab" data-bs-toggle="pill" data-bs-target="#pills-passport" type="button"
                                role="tab" aria-controls="pills-passport" aria-selected="false" tabindex="-1">
                                <i class="ti ti-bookmarks me-2 fs-6"></i>
                                <span class="d-none d-md-block">Dokumen Luar Negeri</span>
                            </button>
                        </li>
                        {{-- <li class="nav-item" role="presentation">
                            <button
                                class="nav-link position-relative rounded-0 d-flex align-items-center justify-content-center bg-transparent fs-3 py-6"
                                id="work-experience-tab" data-bs-toggle="pill" data-bs-target="#pills-work-experience" type="button"
                                role="tab" aria-controls="pills-work-experience" aria-selected="false" tabindex="-1">
                                <i class="ti ti-subtask me-2 fs-6"></i>
                                <span class="d-none d-md-block">Pengalaman Kerja</span>
                            </button>
                        </li> --}}
                        <li class="nav-item" role="presentation">
                            <button
                                class="nav-link position-relative rounded-0 d-flex align-items-center justify-content-center bg-transparent fs-3 py-6"
                                id="document-tab" data-bs-toggle="pill" data-bs-target="#pills-document" type="button"
                                role="tab" aria-controls="pills-document" aria-selected="false" tabindex="-1">
                                <i class="ti ti-clipboard-text me-2 fs-6"></i>
                                <span class="d-none d-md-block">Dokumen</span>
                            </button>
                        </li>
                    </ul>
                    <div class="tab-content mt-5" id="pills-tabContent">
                        <div class="tab-pane fade active show" id="pills-personal-detail" role="tabpanel" aria-labelledby="pills-profile-tab" tabindex="0">
                            <form class="form-personal-information">
                                @csrf
                                @method('PUT')
                                <h5 class="fw-7 text-primary">Informasi Dasar</h5>
                                <div class="row mt-4">
                                    <div class="col-lg-4 mb-3 mb-lg-0">
                                        <h6 class="fw-7">NIK</h6>
                                        <input class="form-control id-card-format" value="{{ auth()->user()->kandidat->nik ?? '-' }}" disabled />
                                    </div>
                                    <div class="col-lg-4 mb-3 mb-lg-0">
                                        <h6 class="fw-7">Nama Lengkap</h6>
                                        <input class="form-control" value="{{ auth()->user()->name }}" name="nama_lengkap" required />
                                    </div>
                                    <div class="col-lg-4">
                                        <h6 class="fw-7">Jenis Kelamin</h6>
                                        <select name="jenis_kelamin" id="" class="form-select" required>
                                            <option value="">Pilih Jenis Kelamin</option>
                                            <option value="P" {{ auth()->user()->kandidat->jenis_kelamin == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                            <option value="W" {{ auth()->user()->kandidat->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row mt-lg-4 mt-3">
                                    <div class="col-lg-4 mb-3 mb-lg-0">
                                        <h6 class="fw-7">Tempat Lahir</h6>
                                        <input class="form-control" value="{{ auth()->user()->kandidat->tempat_lahir ?? '-' }}" name="tempat_lahir" required/>
                                    </div>
                                    <div class="col-lg-4 mb-3 mb-lg-0">
                                        <h6 class="fw-7">Tanggal Lahir</h6>
                                        <input type="date" class="form-control" value="{{ auth()->user()->kandidat->tanggal_lahir ?? '-' }}" name="tanggal_lahir" required/>
                                    </div>
                                    <div class="col-lg-4">
                                        <h6 class="fw-7">Usia</h6>
                                        <input type="text" class="form-control" value="{{ auth()->user()->kandidat->usia ?? '-' }}" disabled/>
                                    </div>
                                </div>

                                <div class="row mt-lg-4 mt-3">
                                    <div class="col-lg-4 mb-3 mb-lg-0">
                                        <h6 class="fw-7">Agama</h6>
                                        <select name="agama" id="" class="form-select" name="agama" required>
                                            <option value="">Pilih Agama</option>
                                            <option value="1" {{ auth()->user()->kandidat->agama == 'Islam' ? 'selected' : '' }}>Islam</option>
                                            <option value="2" {{ auth()->user()->kandidat->agama == 'Kristen' ? 'selected' : '' }}>Kristen</option>
                                            <option value="3" {{ auth()->user()->kandidat->agama == 'Katolik' ? 'selected' : '' }}>Katolik</option>
                                            <option value="4" {{ auth()->user()->kandidat->agama == 'Hindu' ? 'selected' : '' }}>Hindu</option>
                                            <option value="5" {{ auth()->user()->kandidat->agama == 'Buddha' ? 'selected' : '' }}>Buddha</option>
                                            <option value="6" {{ auth()->user()->kandidat->agama == 'Khonghucu' ? 'selected' : '' }}>Khonghucu</option>
                                            <option value="7" {{ auth()->user()->kandidat->agama == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-4 mb-3 mb-lg-0">
                                        <h6 class="fw-7">Status Kawin</h6>
                                        <select name="status_kawin" class="form-select">
                                            <option value="">Status Kawin</option>
                                            <option value="1" {{ auth()->user()->kandidat->status_kawin == 'Belum Menikah' ? 'selected' : '' }}>Belum Menikah</option>
                                            <option value="2" {{ auth()->user()->kandidat->status_kawin == 'Menikah' ? 'selected' : '' }}>Menikah</option>
                                            <option value="3" {{ auth()->user()->kandidat->status_kawin == 'Cerai' ? 'selected' : '' }}>Cerai</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-4">
                                        <h6 class="fw-7">Pendidikan</h6>
                                        <select name="pendidikan" class="form-select">
                                            <option value="">Pendidikan Terakhir</option>
                                            <option value="1" {{ auth()->user()->kandidat->pendidikan == 'Tidak/Belum Sekolah' ? 'selected' : '' }}>Tidak/Belum Sekolah</option>
                                            <option value="2" {{ auth()->user()->kandidat->pendidikan == 'SD' ? 'selected' : '' }}>SD</option>
                                            <option value="3" {{ auth()->user()->kandidat->pendidikan == 'SMP/Sederajat' ? 'selected' : '' }}>SMP/Sederajat</option>
                                            <option value="4" {{ auth()->user()->kandidat->pendidikan == 'SMA/SMK/Sederajat' ? 'selected' : '' }}>SMA/SMK/Sederajat</option>
                                            <option value="5" {{ auth()->user()->kandidat->pendidikan == 'Diploma' ? 'selected' : '' }}>Diploma</option>
                                            <option value="6" {{ auth()->user()->kandidat->pendidikan == 'Sarjana' ? 'selected' : '' }}>Sarjana</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mt-lg-4 mt-3">
                                    <div class="col-lg-4 mb-3 mb-lg-0">
                                        <h6 class="fw-7">Berat Badan</h6>
                                        <input type="number" class="form-control" value="{{ auth()->user()->kandidat->berat_badan }}" name="berat_badan" required/>
                                    </div>
                                    <div class="col-lg-4">
                                        <h6 class="fw-7">Tinggi Badan</h6>
                                        <input type="number" class="form-control" value="{{ auth()->user()->kandidat->tinggi_badan }}" name="tinggi_badan" required/>
                                    </div>
                                </div>

                                <div class="row mt-lg-4 mt-3">
                                    <div class="col-lg-4 mb-3 mb-lg-0">
                                        <h6 class="fw-7">Nama Lengkap Ayah</h6>
                                        <input type="text" class="form-control" value="{{ auth()->user()->kandidat->nama_lengkap_ayah }}" name="nama_lengkap_ayah" required/>
                                    </div>
                                    <div class="col-lg-4">
                                        <h6 class="fw-7">Nama Lengkap Ibu</h6>
                                        <input type="text" class="form-control" value="{{ auth()->user()->kandidat->nama_lengkap_ibu }}" name="nama_lengkap_ibu" required/>
                                    </div>
                                </div>

                                <hr class="my-3 my-lg-5">

                                <h5 class="fw-7 mt-4 mt-lg-0 text-primary">Alamat</h5>
                                <div class="row mt-lg-4 mt-3">
                                    <div class="col-lg-12">
                                        <h6 class="fw-7">Alamat Lengkap</h6>
                                        <textarea class="form-control" name="alamat" required>{{ auth()->user()->kandidat->alamat ?? '-' }}</textarea>
                                    </div>
                                </div>

                                <div class="row mt-lg-4 mt-3">
                                    <div class="col-lg-4 mb-3 mb-lg-0">
                                        <h6 class="fw-7">Provinsi, Kota, Kecamatan</h6>
                                        <select class="form-select wilayah" name="wilayah" aria-labelledby="wilayah" required>
                                            <option value="{{ auth()->user()->kandidat->kecamatan_id }}" selected>{{ auth()->user()->kandidat->provinsi->nama_provinsi }}, {{ auth()->user()->kandidat->kota->nama_kota }}, {{ auth()->user()->kandidat->kecamatan->nama_kecamatan }}</option>
                                        </select>
                                    </div>
                                </div>
                                
                                <hr class="my-3 my-lg-5">

                                <h5 class="fw-7 mt-4 mt-lg-0 text-primary">Kontak</h5>
                                <div class="row mt-lg-4 mt-3">
                                    <div class="col-lg-4 mb-3 mb-lg-0">
                                        <h6 class="fw-7">Email</h6>
                                        <input type="email" class="form-control" value="{{ auth()->user()->kandidat->email }}" name="email" required>
                                    </div>
                                    <div class="col-lg-4 mb-3 mb-lg-0">
                                        <h6 class="fw-7">No. Telepon</h6>
                                        <input type="text" class="form-control phone-number" value="{{ auth()->user()->kandidat->no_hp }}" name="no_hp" required>
                                    </div>
                                    <div class="col-lg-4">
                                        <h6 class="fw-7">No Whatsapp</h6>
                                        <input type="text" class="form-control phone-number" value="{{ auth()->user()->kandidat->no_wa }}" name="no_wa" required>
                                    </div>
                                </div>

                                <hr class="my-3 my-lg-5">

                                <h5 class="fw-7 mt-4 mt-lg-0 text-primary">Kontak Darurat</h5>
                                <div class="row mt-lg-4 mt-3">
                                    <div class="col-lg-4 mb-3 mb-lg-0">
                                        <h6 class="fw-7">Nama Keluarga</h6>
                                        <input type="text" class="form-control" value="{{ auth()->user()->kandidat->nama_keluarga }}" name="nama_keluarga" required>
                                    </div>
                                    <div class="col-lg-4 mb-3 mb-lg-0">
                                        <h6 class="fw-7">Hubungan Keluarga</h6>
                                        <input type="text" class="form-control" value="{{ auth()->user()->kandidat->hubungan }}" name="hubungan" required>
                                    </div>
                                    <div class="col-lg-4">
                                        <h6 class="fw-7">No Darurat</h6>
                                        <input type="text" class="form-control phone-number" value="{{ auth()->user()->kandidat->no_telp_darurat }}" name="no_telp_darurat" required>
                                    </div>
                                </div>
                                <div class="row mt-5">
                                    <div class="col-12 text-end">
                                        <a href="{{ route('member.index') }}" class="btn btn-outline-danger">Cancel</a>
                                        <button class="btn btn-primary btn-save">Save</button>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <div class="tab-pane fade" id="pills-passport" role="tabpanel" aria-labelledby="pills-passport-tab" tabindex="0">
                            <form class="form-passport">
                                @csrf
                                @method('PUT')
                                <div class="row mt-4">
                                    <div class="col-lg-4 mb-3 mb-lg-0">
                                        <h6 class="fw-7">No. Paspor</h6>
                                        <input class="form-control id-card-format" value="{{ auth()->user()->kandidat->no_paspor ?? '-' }}" name="no_paspor" required />
                                    </div>
                                    <div class="col-lg-4 mb-3 mb-lg-0">
                                        <h6 class="fw-7">Tanggal Pengeluaran Paspor</h6>
                                        <input type="date" class="form-control" value="{{ auth()->user()->kandidat->tanggal_pengeluaran_paspor }}" name="tanggal_pengeluaran_paspor" required />
                                    </div>
                                    <div class="col-lg-4">
                                        <h6 class="fw-7">Masa Kadaluarsa Paspor</h6>
                                        <input type="date" class="form-control" value="{{ auth()->user()->kandidat->masa_kadaluarsa }}" name="masa_kadaluarsa" required />
                                    </div>
                                </div>
                                <div class="row mt-4">
                                    <div class="col-lg-4 mb-3 mb-lg-0">
                                        <h6 class="fw-7">Kantor yg Mengeluarkan Paspor</h6>
                                        <input class="form-control" value="{{ auth()->user()->kandidat->kantor_paspor }}" name="kantor_paspor" >
                                    </div>
                                    <div class="col-lg-4">
                                        <h6 class="fw-7">Kondisi Paspor</h6>
                                        <select class="form-select" name="kondisi_paspor">
                                            <option value="">Pilihlah Pertanyaan dibawah ini jika kamu memiliki Paspor</option>
                                            <option value="1" {{ auth()->user()->kandidat->kondisi_paspor == 'Paspor saya fisiknya masih ada' ? 'selected' : '' }}>Paspor saya fisiknya masih ada</option>
                                            <option value="2" {{ auth()->user()->kandidat->kondisi_paspor == 'Paspor saya hilang' ? 'selected' : '' }}>Paspor saya hilang</option>
                                            <option value="3" {{ auth()->user()->kandidat->kondisi_paspor == 'Paspor saya rusak' ? 'selected' : '' }}>Paspor saya rusak</option>
                                            <option value="4" {{ auth()->user()->kandidat->kondisi_paspor == 'Paspor saya ditahan agency sebelumnya' ? 'selected' : '' }}>Paspor saya ditahan agency sebelumnya</option>
                                            <option value="5" {{ auth()->user()->kandidat->kondisi_paspor == 'Paspor saya terdapat data yang berbeda' ? 'selected' : '' }}>Paspor saya terdapat data yang berbeda</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mt-5">
                                    <div class="col-12 text-end">
                                        <a href="{{ route('member.index') }}" class="btn btn-outline-danger">Cancel</a>
                                        <button class="btn btn-primary btn-save">Save</button>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <div class="tab-pane fade" id="pills-work-experience" role="tabpanel" aria-labelledby="pills-work-experience-tab" tabindex="0">
                            @php
                                $i = 0;
                            @endphp
                            @foreach (auth()->user()->kandidat->pengalamanKerja as $pengalamanKerja)
                                <h5 class="fw-7 text-primary">{{ $pengalamanKerja->nama_perusahaan . ' - ' . $pengalamanKerja->posisi }}</h5>
                                <div class="row mt-lg-4 mt-3">
                                    <div class="col-lg-4 mb-3 mb-lg-0">
                                        <h6 class="fw-7">Negara Tempat Bekerja</h6>
                                        <span>{{ $pengalamanKerja->negara_tempat_kerja ?? '-' }}</span>
                                    </div>
                                    <div class="col-lg-4 mb-3 mb-lg-0">
                                        <h6 class="fw-7">Nama Perusahaan</h6>
                                        <span>{{ $pengalamanKerja->nama_perusahaan ?? '-' }}</span>
                                    </div>
                                    <div class="col-lg-4">
                                        <h6 class="fw-7">Posisi</h6>
                                        <span>{{ $pengalamanKerja->posisi ?? '-' }}</span>
                                    </div>
                                </div>
                                <div class="row mt-4">
                                    <div class="col-lg-4 mb-3 mb-lg-0">
                                        <h6 class="fw-7">Tanggal Mulai Bekerja</h6>
                                        <span>{{ $pengalamanKerja->tanggal_mulai_kerja ? \Carbon\Carbon::parse($pengalamanKerja->tanggal_mulai_kerja)->format('d F Y') : '-' }}</span>
                                    </div>
                                    <div class="col-lg-4">
                                        <h6 class="fw-7">Tanggal Selesai Bekerja</h6>
                                        <span>{{ $pengalamanKerja->tanggal_selesai_kerja ? Carbon\Carbon::parse($pengalamanKerja->tanggal_selesai_kerja)->format('d F Y') : '-' }}</span>
                                    </div>
                                </div>

                                @if ($i > 0)
                                    <hr class="my-3 my-lg-5">
                                @endif
                                @php
                                    $i++;
                                @endphp
                            @endforeach
                        </div>

                        <div class="tab-pane fade" id="pills-document" role="tabpanel" aria-labelledby="pills-document-tab" tabindex="0">
                            <form class="form-document" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <h5 class="fw-7 mt-4 mt-lg-0 text-primary">Dokumen Persyaratan Jati Diri yang Dimiliki</h5>
                                <div class="row mt-lg-4 mt-3">
                                    <div class="col-lg-12 mb-3">
                                        <h6 class="fw-7">Kelengkapan Dokumen</h6>
                                        <div class="row">
                                            <div class="col-md-auto col-12">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox" id="ada-ktp" {{ auth()->user()->kandidat->ada_ktp == 'Ya' ? 'checked' : '' }} name="ada_ktp">
                                                    <label class="form-check-label" for="ada-ktp">KTP</label>
                                                </div>
                                            </div>
                                            <div class="col-md-auto col-12">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox" id="ada-kk" {{ auth()->user()->kandidat->ada_kk == 'Ya' ? 'checked' : '' }} name="ada_kk">
                                                    <label class="form-check-label" for="ada-kk">KK</label>
                                                </div>
                                            </div>
                                            <div class="col-md-auto col-12">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox" id="ada-akta-lahir" {{ auth()->user()->kandidat->ada_akta_lahir == 'Ya' ? 'checked' : '' }} name="ada_akta_lahir">
                                                    <label class="form-check-label" for="ada-akta-lahir">Akta Lahir</label>
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-auto col-12">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox" id="ada-ijazah" {{ auth()->user()->kandidat->ada_ijazah == 'Ya' ? 'checked' : '' }} name="ada_ijazah">
                                                    <label class="form-check-label" for="ada-ijazah">Ijazah</label>
                                                </div>
                                            </div>
                                                
                                            <div class="col-md-auto col-12">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox" id="ada-buku-nikah" {{ auth()->user()->kandidat->ada_buku_nikah == 'Ya' ? 'checked' : '' }} name="ada_buku_nikah">
                                                    <label class="form-check-label" for="ada-buku-nikah">Buku Nikah</label>
                                                </div>
                                            </div>
                                                
                                            <div class="col-md-auto col-12">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox" id="ada-paspor" {{ auth()->user()->kandidat->ada_paspor == 'Ya' ? 'checked' : '' }} name="ada_paspor">
                                                    <label class="form-check-label" for="ada-paspor">Paspor</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <h6 class="fw-7">Penjelasan Dokumen kelengkapan berkas terdapat perbedaan nama/alamat/tempat tanggal lahir/hilang/rusak/lainnya</h6>
                                        <textarea name="penjelasan_dokumen" class="form-control">{{ auth()->user()->kandidat->penjelasan_dokumen }}</textarea></span>
                                    </div>
                                </div>

                                <hr class="my-3 my-lg-5">
                                
                                <h5 class="fw-7 mt-4 mt-lg-0 text-primary">Berkas Dokumen Persyaratan Jati Diri yang Dimiliki</h5>
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
                                                $originalFile = auth()->user()->kandidat->{$doc['key']} ? 'upload/' . $doc['path'] . '/' . auth()->user()->kandidat->{$doc['key']} : null;
                                                $thumbnailFile = auth()->user()->kandidat->{$doc['key']} ? 'upload/' . $doc['path'] . '/thumb_' . auth()->user()->kandidat->{$doc['key']} : null;
                                                $memberFile = memberDocumentImage($originalFile, $thumbnailFile);
                                            @endphp

                                            <label for="{{ $doc['key'] }}" style="cursor: pointer">
                                                @if ($memberFile['is_uploaded'])
                                                    <img src="{{ asset('member-template/images/transparent.png') }}" alt="{{ $doc['name'] }}" class="rounded-2 img-fluid mb-3 img-preview-doc" style="background-image: url('{{ asset($memberFile['file_image']) }}');">
                                                @else
                                                    <img src="{{ asset('member-template/images/transparent.png') }}" alt="{{ $doc['name'] }}" class="rounded-2 img-fluid mb-3 img-preview-doc" style="background-image: url('{{ asset('member-template/images/upload.png') }}');">
                                                @endif
                                                
                                                <div class="fw-7 text-center mb-4 {{ $memberFile['is_uploaded'] ? '' : 'text-muted' }}">{{ $doc['name'] }}</div>
                                                <input type="file" name="file_{{ $doc['key'] }}" id="{{ $doc['key'] }}" class="d-none file-image" accept="{{ $doc['key'] == 'foto' ? 'image/*' :'image/*,application/pdf' }}">
                                            </label>
                                        </div>
                                    @endforeach
                                </div>

                                <div class="row mt-5">
                                    <div class="col-12 text-end">
                                        <a href="{{ route('member.index') }}" class="btn btn-outline-danger">Cancel</a>
                                        <button class="btn btn-primary btn-save">Save</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('css')
    <style>
        .img-preview-doc {
            background-repeat: no-repeat;
            background-position: center;
            background-size: cover;
        }
        
        .select2-container--bootstrap .select2-selection--single .select2-selection__arrow b {
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16'%3e%3cpath fill='none' stroke='%2378829D' stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='m2 5 6 6 6-6'/%3e%3c/svg%3e");
            background-color: transparent;
            background-size: contain;
            border: none !important;
            height: 12px !important;
            width: 12px !important;
            margin: auto !important;
            top: 16px !important;
            left: -13px !important;
        }

        .select2-container--open .select2-selection__arrow b {
            transform: rotate(180deg) !important;
        }

        .select2-container--bootstrap .select2-selection--single {
            height: 39px !important;
            line-height: 35px !important;
        }

        .select2-container--bootstrap .select2-selection--single .select2-selection__rendered {
            color: var(--bs-gray-700);
            font-weight: 500;
        }

        .select2-container--bootstrap .select2-selection {
            -webkit-box-shadow: usnet;
            box-shadow: unset;
            background-color: #fff;
            border: 1px solid var(--bs-gray-300);
            border-radius: .475rem;
            color: var(--bs-gray-700);
        }
        .select2-container .select2-selection--single .select2-selection__rendered {
            padding-left: 16px !important
        }
        .select2-container--bootstrap .select2-selection--single .select2-selection__arrow {
            position: absolute;
            bottom: 0;
            right: 12px;
            top: 0;
            width: 4px;
        }
        .select2-container--bootstrap .select2-selection--single .select2-selection__arrow b {
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16'%3e%3cpath fill='none' stroke='%23343a40' stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='m2 5 6 6 6-6'/%3e%3c/svg%3e");
            background-color: transparent;
            background-size: contain;
            border: none !important;
            height: 12px !important;
            width: 12px !important;
            margin: auto !important;
            top: 14px !important;
            left: -13px !important;
            position:absolute
        }
        .select2-search--dropdown .select2-search__field {
            border:solid 1px #dfe5ef
        }
        .select2-dropdown {
            border: solid 1px #dfe5ef !important;
        }
    </style>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/css/select2.min.css" integrity="sha512-xrbX64SIXOxo5cMQEDUQ3UyKsCreOEq1Im90z3B7KPoxLJ2ol/tCT0aBhuIzASfmBVdODioUdUPbt5EDEXmD9g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endpush

@push('script')
    @include('vendors.cleave-js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function() {
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

            $('.form-personal-information').on('submit', function() {
                const t = $(this)
                formSubmit(t, 1)

                return false
            })

            $('.form-passport').on('submit', function() {
                const t = $(this)
                formSubmit(t, 2)

                return false
            })

            $('.form-document').on('submit', function() {
                const t = $(this)
                formSubmit(t, 4)

                return false
            })

            $('.file-image').on('change', function() {
                readURL(this, $(this))
            })

            function formSubmit(form, type)
            {
                const t = form;
                var formData = new FormData(form[0]);

                $.ajax({
                    url: `{{ route('member.profile.update') }}?type=${type}`,
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
            }

            function readURL(input, el) {
                var url = input.value;
                var ext = url.substring(url.lastIndexOf('.') + 1).toLowerCase();

                if (input.files && input.files[0] && (ext == "png" || ext == "jpeg" || ext == "jpg" || ext == "webp" || ext == "gif" || ext == "webp" || ext == "pdf")) {
                    var reader = new FileReader();
            
                    reader.onload = function(e) {
                        let filename = ext === "pdf" ? '{{ asset('member-template/images/pdf.png') }}' : e.target.result
                        el.closest('div').find('img.img-preview-doc').attr('style', `background-image: url('${filename}')`)
                    }

                    reader.readAsDataURL(input.files[0]);
            
                } else if (!url) {
                    el.closest('div').find('img.img-preview-doc').attr('style', `background-image: url('{{ asset('member-template/images/upload.png') }}')`)
                } else {
                    el.closest('div').find('img.img-preview-doc').attr('style', `background-image: url('{{ asset('member-template/images/upload.png') }}')`)
                    Swal.fire({
                        icon: 'error',
                        title: 'Terjadi kesalahan',
                        text: 'Jenis file tidak didukung',
                        confirmButtonText: 'OK'
                    })
                }
            }
        })
    </script>
@endpush