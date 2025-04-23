@extends('back.layouts.app')
@section('title', 'Halaman Seleksi')
@section('subtitle', 'Menu Seleksi')
@push('css')
    @extends('back.layouts.css_datatables')
    <style>
        #tb {
            display: block;
        }

        #tb3 {
            display: none;
        }
        
        /* Styling untuk status batal */
        .batal-warning {
            color: #dc3545;
            font-weight: bold;
        }
    </style>
@endpush

@section('content')
    <div class="pcoded-content">
        <!-- Header dan breadcrumb tetap sama -->
        <div class="page-header card">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <i class="feather icon-list bg-c-blue"></i>
                        <div class="d-inline">
                            <h5>Seleksi</h5>
                            <span>Silahkan isi dengan data yang sesuai dan valid !</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="page-header-breadcrumb">
                        <ul class=" breadcrumb breadcrumb-title">
                            <li class="breadcrumb-item">
                                <a href="{{ route('back-office.home') }}"><i class="feather icon-home"></i></a>
                            </li>
                            <li class="breadcrumb-item"><a href="#!">Halaman Seleksi</a>
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
                                <!-- Tabel pertama tetap sama -->
                                <div class="card" id="tb1">
                                    <div class="card-header">
                                        <h5> <span class="badge badge-pill badge-success"
                                                style="color: #ecf1f3; display: inline-block;"> Data Seleksi Terbang</span>
                                        </h5>

                                    </div>
                                    <div class="card-block">

                                        <div class="dt-responsive table-responsive">
                                            <table id="order-table" class="table table-striped table-bordered nowrap">
                                                <thead>
                                                    <tr>
                                                        <th width="5%">No</th>
                                                        <th width="15%">Posisi</th>

                                                        <th width="15%">Negara</th>
                                                        <th width="15%">Nama Perusahaan</th>
                                                        <th width="5%">Mitra</th>
                                                        <th width="5%">Total Employe</th>
                                                        <th width="5%">Kategori  Industri Pekerjaan</th>
                                                        <th width="5%">Detail</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($seleksi_group as $jobId => $group)
                                                        @foreach ($group as $p)
                                                            <tr>
                                                                <td>{{ $loop->iteration }}</td>
                                                                <td><b>{{ $p->nama_job }}</b></td>


                                                                <td>{{ $p->nama_negara }}</td>
                                                                <td>{{ $p->nama_perusahaan }}</td>
                                                                <td>{{ $p->mitra }}</td>
                                                                <td style="text-align: center; font-size:23px;"><span
                                                                        class="label label-danger">{{ count($group) }}</span>
                                                                </td>
                                                                <td style="text-align: center; font-size:18px;"><span
                                                                        class="label label-warning">{{ $p->nama_kategori_job }}</span>
                                                                </td>

                                                                <td class="text-center">
                                                                    <a style="color: rgb(242, 236, 236)" href="#"
                                                                        class="btn btn-sm btn-primary btn-detail"
                                                                        data-id="{{ $p->id }}" style="color: black">
                                                                        <i class="fas fa-eye"></i> Detail
                                                                    </a>
                                                                </td>


                                                            </tr>
                                                            {{-- Break out of the inner loop after the first iteration --}}
                                                        @break
                                                    @endforeach
                                                @endforeach
                                            </tbody>
                                        </table>


                                    </div>
                                </div>
                            </div>

                                <!-- Tabel kedua dengan modifikasi untuk status batal -->
                                <div class="card" id="tb">
                                    <div class="card-header">
                                        <h5> <span class="badge badge-pill badge-success"
                                                style="color: #ecf1f3; display: inline-block;"> Data Seleksi Terbang</span>
                                        </h5>
                                        <button type="button" class="btn btn-warning" onclick=""><i
                                                class="fas fa-eye"></i>
                                            AN 05</button>
                                        <button type="button" class="btn btn-primary" onclick=""><i
                                                class="fas fa-plane"></i>
                                            Terbang</button>
                                    </div>
                                    <div class="card-block">
                                        <div class="dt-responsive table-responsive">
                                            <table id="order-table2" class="table table-striped table-bordered nowrap">
                                                <thead>
                                                    <tr>
                                                        <th width="5%">No</th>
                                                        <th width="10%">Tanggal Berangkat</th>
                                                        <th width="10%">Nama</th>
                                                        <th width="10%">No Paspor</th>
                                                        <th width="10%">Negara</th>
                                                        <th width="10%">Posisi</th>
                                                        <th width="10%">Mitra</th>
                                                        <th width="10%">ID KTKLN</th>
                                                        <th width="10%">Sponsor</th>
                                                        <th width="5%">Tanggal Akhir Kontrak</th>
                                                        <th width="5%">Status Seleksi</th>
                                                        <th width="15%" class="text-center" width="5%">Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($seleksi_group as $jobId => $group)
                                                        @foreach ($group as $p2)
                                                            <tr data-job-id="{{ $jobId }}">
                                                                <td>{{ $loop->iteration }}</td>
                                                                <td>{{ $p2->tanggal_berangkat }}</td>
                                                                <td>{{ $p2->nama_lengkap }}</td>
                                                                <td>{{ $p2->no_paspor }} </td>
                                                                <td>{{ $p2->nama_negara }}</td>
                                                                <td>{{ $p2->nama_job }}</td>
                                                                <td>{{ $p2->mitra }}</td>
                                                                <td>{{ $p2->mitra }}</td>
                                                                <td>{{ $p2->referensi }}</td>
                                                                <td>{{ $p2->tanggal_akhir_kontrak }}</td>
                                                                <td>{{ $p2->status }}</td>
                                                                <td class="text-center d-flex">
                                                                    <a href="" data-toggle="modal"
                                                                        data-target="#ubahStatusModal{{ $p2->id }}"
                                                                        class="form-control mr-2"
                                                                        style="background-color: #00324F; color: #fff; font-size: 12px; "
                                                                        title="Detail">
                                                                        <i class="fa fa-edit"></i>
                                                                        Ubah Status
                                                                    </a>
                                                                    <a href="{{ route('back-office.seleksi.seleksi-dalam-proses.detail', $p2->id) }}"
                                                                        class="form-control"
                                                                        style="background-color: transparent; color: #00324F; font-size: 12px;  border: 1px solid #00324F;"
                                                                        title="Detail">
                                                                        <i class="fa fa-arrow-right"></i>
                                                                        Lihat Detail
                                                                    </a>
                                                                </td>
                                                            </tr>
                                                            <!-- Modal -->
                                                            <div class="modal fade" id="ubahStatusModal{{ $p2->id }}"
                                                                tabindex="-1" role="dialog"
                                                                aria-labelledby="ubahStatusModalLabel" aria-hidden="true">
                                                                <div class="modal-dialog" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title"
                                                                                id="ubahStatusModalLabel">Ubah
                                                                                Status - {{ $p2->nama_lengkap }}</h5>
                                                                            <button type="button" class="close"
                                                                                data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <form id="ubahStatusForm{{ $p2->id }}">
                                                                                <!-- Combo box for status update -->
                                                                                <div class="form-group">
                                                                                    <label for="statusSelect">Ubah Status:</label>
                                                                                    <select class="form-control"
                                                                                        id="statusSelect{{ $p2->id }}"
                                                                                        name="status" onchange="toggleKeteranganBatal({{ $p2->id }})">
                                                                                        <option value="Selesai Kontrak">Selesai Kontrak</option>
                                                                                        <option value="Batal">Batal</option>
                                                                                        <!-- Batasi opsi hanya "Selesai Kontrak" dan "Batal" -->
                                                                                    </select>
                                                                                </div>
                                                                                
                                                                                <!-- Field untuk keterangan batal -->
                                                                                <div class="form-group" id="keteranganBatalDiv{{ $p2->id }}" style="display: none;">
                                                                                    <label for="keteranganBatal" class="batal-warning">Keterangan Batal:</label>
                                                                                    <textarea name="keterangan_batal" id="keteranganBatal{{ $p2->id }}" 
                                                                                        cols="30" rows="3" class="form-control" 
                                                                                        placeholder="Masukkan alasan pembatalan..."></textarea>
                                                                                </div>
                                                                                
                                                                                <!-- Fields untuk status Selesai Kontrak -->
                                                                                <div class="form-group" id="selesaiKontrakDiv{{ $p2->id }}">
                                                                                    <label for="keterangan_seleksi_terbang">Keterangan Dari Seleksi Terbang:</label>
                                                                                    <textarea name="keterangan_seleksi_terbang" id="keterangan_seleksi_terbang{{ $p2->id }}" 
                                                                                        cols="30" rows="3" class="form-control"></textarea>
                                                                                </div>
                                                                                
                                                                                <!-- Add hidden input for the Pendaftaran ID -->
                                                                                <input type="hidden" name="id"
                                                                                    value="{{ $p2->id }}">
                                                                            </form>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button"
                                                                                class="btn btn-secondary"
                                                                                data-dismiss="modal"><i
                                                                                    class="fas fa-undo"></i>
                                                                                Tutup</button>
                                                                            <button type="button" class="btn btn-primary"
                                                                                onclick="submitUbahStatus({{ $p2->id }})"><i
                                                                                    class="fas fa-save"></i>
                                                                                Simpan</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                                <!-- Tabel ketiga tetap sama -->
                                <div class="card" id="tb3">
                                    <div class="card-header">
                                        <h5> <span class="badge badge-pill badge-success"
                                                style="color: #ecf1f3; display: inline-block;"> Data Seleksi Terbang</span>
                                        </h5>
                                        <button type="button" class="btn btn-warning" onclick=""><i
                                                class="fas fa-eye"></i>
                                            AN 05</button>
                                        <button type="button" class="btn btn-primary" onclick=""><i
                                                class="fas fa-plane"></i>
                                            Terbang</button>

                                    </div>
                                    <div class="card-block">

                                        <div class="dt-responsive table-responsive">
                                            <table id="order-table3" class="table table-striped table-bordered nowrap">
                                                <thead>
                                                    <tr>
                                                        <th width="5%">No</th>

                                                        <th width="10%">Nama</th>
                                                        <th width="10%">Alamat</th>
                                                        <th width="10%">Email</th>
                                                        <th width="10%">No HP</th>
                                                        <th width="10%">Tempat Lahir</th>
                                                        <th width="10%">Tanggal Lahir</th>
                                                        <th width="10%">No Visa</th>

                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($seleksi_group as $jobId => $group)
                                                        @foreach ($group as $p2)
                                                            <tr data-job-id="{{ $jobId }}">
                                                                <td>{{ $loop->iteration }}</td>

                                                                <td>{{ $p2->nama_lengkap }}</td>
                                                                <td>{{ $p2->alamat }} </td>
                                                                <td>{{ $p2->email }}</td>
                                                                <td>{{ $p2->no_hp }}</td>
                                                                <td>{{ $p2->tempat_lahir }}</td>
                                                                <td>{{ $p2->tanggal_lahir }}</td>
                                                                <td>{{ $p2->referensi }}</td>
                                                            </tr>
                                                            <!-- Modal -->
                                                    @endforeach
                                                @endforeach

                                            </tbody>

                                        </table>
                                        {{-- <button id="btnClear" class="btn btn-warning"><i
                                                class="fa fa-undo"></i>Clear</button> --}}
                                    </div>
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
    @include('back.layouts.js_datatables')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    {{-- Toggle script untuk status batal --}}
    <script>
        // Toggle untuk field keterangan batal pada form individual
        function toggleKeteranganBatal(id) {
            var statusSelect = document.getElementById('statusSelect' + id);
            var keteranganBatalDiv = document.getElementById('keteranganBatalDiv' + id);
            var selesaiKontrakDiv = document.getElementById('selesaiKontrakDiv' + id);
            
            if (statusSelect.value === 'Batal') {
                keteranganBatalDiv.style.display = 'block';
                selesaiKontrakDiv.style.display = 'none';
            } else {
                keteranganBatalDiv.style.display = 'none';
                selesaiKontrakDiv.style.display = 'block';
            }
        }
        
        // Initialize toggle status on page load
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize for each modal that might be open
            const modals = document.querySelectorAll('[id^="ubahStatusModal"]');
            modals.forEach(modal => {
                const id = modal.id.replace('ubahStatusModal', '');
                toggleKeteranganBatal(id);
            });
        });
    </script>

    {{-- Button script tetap sama --}}
    <script>
        $(document).ready(function() {
            // Script untuk mengubah tampilan antara #tb dan #tb3
            document.querySelector('#tb .btn-warning').addEventListener('click', function() {
                document.getElementById('tb').style.display = 'none';
                document.getElementById('tb3').style.display = 'block';
            });

            document.querySelector('#tb3 .btn-primary').addEventListener('click', function() {
                document.getElementById('tb3').style.display = 'none';
                document.getElementById('tb').style.display = 'block';
            });

            $('#order-table2').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'excel', 'pdf', 'print'
                ]
            });
            $('#order-table3').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'excel', 'pdf', 'print'
                ]
            });
            // Sembunyikan tabel kedua saat halaman dimuat
            $("#tb1").hide();

            // Tangani klik pada tombol "Detail" pada tabel pertama
            $("#order-table tbody").on("click", ".btn-detail", function() {
                var jobId = $(this).data("id");
                // Cetak nilai jobId ke konsol untuk diinspeksi
                console.log("jobId:", jobId);
                // Sembunyikan tabel pertama
                $("#tb1").hide();
                // Tampilkan baris yang sesuai dengan job_id yang dipilih
                $("#order-table2 tbody tr[data-job-id='" + jobId + "']").show();
                // Tampilkan tabel kedua
                $("#tb2").show();
            });

            // Tangani klik pada tombol Clear
            $("#btnClear").on("click", function() {
                // Sembunyikan tabel kedua
                $("#tb2").hide();
                // Tampilkan tabel pertama
                $("#tb1").show();
            });
        });
    </script>

    {{-- Submit status script dengan validasi pembatalan --}}
    <script>
        function submitUbahStatus(id) {
            var statusSelect = document.getElementById('statusSelect' + id);
            var formData = $('#ubahStatusForm' + id).serialize();
            
            // Tambahkan validasi untuk status Batal
            if (statusSelect.value === 'Batal') {
                var keteranganBatal = document.getElementById('keteranganBatal' + id).value;
                if (!keteranganBatal.trim()) {
                    Swal.fire({
                        icon: 'warning',
                        title: 'Perhatian',
                        text: 'Silakan berikan keterangan untuk pembatalan!'
                    });
                    return;
                }
            }
            
            // Tambahkan script berikut di bagian head template atau di dalam tag script Anda
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: 'POST',
                url: '{{ route('back-office.seleksi.update_seleksi_terbang.status') }}',
                data: formData,
                success: function(response) {
                    // Handle success, tampilkan SweetAlert untuk konfirmasi OK
                    Swal.fire({
                        icon: 'success',
                        title: 'Status berhasil diubah',
                        showConfirmButton: true,
                        confirmButtonText: 'OK'
                    }).then(function() {
                        // Reload halaman setelah pengguna mengklik OK
                        location.reload();
                    });
                },
                error: function(error) {
                    // Handle error, tampilkan SweetAlert error jika diperlukan
                    Swal.fire({
                        icon: 'error',
                        title: 'Terjadi kesalahan',
                        text: 'Gagal mengubah data.'
                    });
                    console.error(error);
                }
            });
        }
    </script>
@endpush
