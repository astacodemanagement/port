@extends('back.layouts.app')
@section('title', 'Halaman Seleksi')
@section('subtitle', 'Menu Seleksi')
@push('css')
    @extends('back.layouts.css_datatables')
@endpush

@section('content')


    <div class="pcoded-content">

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


                                <div class="card" id="tb1">
                                    <div class="card-header">
                                        <h5> <span class="badge badge-pill badge-secondary"
                                                style="color: #ecf1f3; display: inline-block;"> Data Interview
                                                Kualifikasi</span> </h5>

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
                                                        <!--  --><th width="5%">Detail</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
    @php $groupIndex = 1; @endphp {{-- Initialize group counter --}}
    @foreach ($seleksi_group as $jobId => $group)
        @php $itemIndex = 1; @endphp 
        @foreach ($group as $p)
            <tr>
                <td>{{ $groupIndex }}</td>
                <td>{{ $p->nama_job }}</td>
                <td>{{ $p->nama_negara }}</td>
                <td>{{ $p->nama_perusahaan }}</td>
                <td>{{ $p->mitra }}</td>
                <td style="text-align: center; font-size:23px;">
                    <span class="label label-danger">{{ count($group) }}</span>
                </td>
                <td style="text-align: center; font-size:18px;">
                    <span class="label label-warning">{{ $p->nama_kategori_job }}</span>
                </td>
                <td class="text-center">
                    <a title="Detail" style="color: rgb(242, 236, 236)"
                        href="#"
                        class="btn btn-sm btn-primary btn-detail"
                        data-id="{{ $jobId }}" style="color: black">
                        <i class="fas fa-eye"></i> Detail
                    </a>
                </td>
            </tr>
            @break {{-- Break out of the inner loop after the first iteration --}}
        @endforeach
        @php $groupIndex++; @endphp {{-- Increment the group counter --}}
    @endforeach
</tbody>

                                        </table>


                                    </div>
                                </div>
                            </div>

                            <div class="card" id="tb2">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <h5> <span class="badge badge-pill badge-secondary"
                                            style="color: #ecf1f3; display: inline-block;"> Data Interview
                                            Kualifikasi</span> </h5>
                                    <div class="d-flex align-items-center">
                                        <!-- Select dropdown -->
                                        <div class="mr-2" style="width: 200px;">
                                            <select class="form-control" id="status_multiple" name="status_multiple" onchange="toggleMultipleBatalField()">
                                                <option value="">--Pilih Status--</option>
                                                <option value="Lolos Interview">Lolos Interview</option>
                                                <option value="Batal">Batal</option>
                                                <!-- Hanya sediakan opsi "Lolos Interview" dan "Batal" -->
                                            </select>
                                        </div>

                                        <!-- Tambahkan field keterangan batal untuk multiple update -->
                                        <div class="mr-2" style="width: 300px;" id="keterangan_multiple_batal_div" style="display: none;">
                                            <input type="text" class="form-control" id="keterangan_multiple_batal" name="keterangan_multiple_batal" placeholder="Alasan Pembatalan">
                                        </div>

                                        <!-- Keterangan Interview untuk status selain Batal -->
                                        <div class="mr-2" style="width: 300px;" id="keterangan_multiple_div">
                                            <input type="text" class="form-control" id="keterangan_multiple" name="keterangan_multiple" placeholder="Keterangan Dari Interview">
                                        </div>

                                        <!-- Tombol Update Status -->
                                        <button id="updateStatusBtn" class="btn btn-primary">Multiple Update Status</button>
                                    </div>
                                </div>


                                <div class="card-block">

<div class="dt-responsive table-responsive">
    <table id="order-table2" class="table table-striped table-bordered nowrap">
        <thead>
            <tr>
                <th width="5%"><input type="checkbox" id="checkAll"></th>
                <!-- Checkbox for "Check All" -->
                <th width="5%">No</th>
                <th width="15%">Tanggal Apply</th>
                <th width="15%">Nama Kandidat</th>
                <th width="5%">Status Seleksi</th>
                <th width="15%" class="text-center" width="5%">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($seleksi_group as $jobId => $group)
                @foreach ($group as $p2)
                    <tr data-job-id="{{ $jobId }}">
                        <td><input type="checkbox" name="selected_items[]"
                                value="{{ $p2->id }}"></td>
                        <!-- Checkbox for each row -->
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $p2->tanggal_apply }}</td>
                        <td>{{ $p2->nama_lengkap }}</td>
                        <td>{{ $p2->status }}</td>
                        <td class="text-center d-flex">
                               <a href="{{ route('preview-cv', hashId($p2->kandidat_id)) }}"
                                class="form-control mr-2"
                                style="background-color: transparent; color: #00324F; font-size: 12px;  border: 1px solid #00324F;"
                                title="Detail">
                                <i class="fa fa-eye"></i>
                                Lihat CV
                            </a>

                            <a href="" data-toggle="modal"
                                data-target="#ubahStatusModal{{ $p2->id }}"
                                class="form-control mr-2"
                                style="background-color: #00324F; color: #fff; font-size: 12px; "
                                title="Ubah Status">
                                <i class="fa fa-edit"></i>
                                Ubah Status

                            </a>
                            <a href="{{ route('back-office.seleksi.seleksi.detail', $p2->id) }}"
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
                                <!-- Modal Body -->
                                <div class="modal-body">
                                    <form id="ubahStatusForm{{ $p2->id }}">
                                        <!-- Combo box for status update -->
                                        <div class="form-group">
                                            <label for="statusSelect">Ubah Status:</label>
                                            <select class="form-control" id="statusSelect{{ $p2->id }}" name="status" onchange="toggleKeteranganBatal({{ $p2->id }})">
                                                <option value="Lolos Interview">Lolos Interview</option>
                                                <option value="Batal">Batal</option>
                                                <!-- Batasi opsi hanya "Lolos Interview" dan "Batal" -->
                                            </select>
                                        </div>
                                            
                                        <!-- Field untuk keterangan batal -->
                                        <div class="form-group" id="keteranganBatalDiv{{ $p2->id }}" style="display: none;">
                                            <label for="keteranganBatal">Keterangan Batal:</label>
                                            <textarea name="keterangan_batal" id="keteranganBatal{{ $p2->id }}" cols="30" rows="3" class="form-control" placeholder="Masukkan alasan pembatalan..."></textarea>
                                        </div>
                                            
                                        <!-- Field untuk keterangan interview -->
                                        <div class="form-group" id="keteranganInterviewDiv{{ $p2->id }}">
                                            <label for="keterangan_dari_interview">Keterangan Dari Interview:</label>
                                            <textarea name="keterangan_dari_interview" id="keterangan_dari_interview{{ $p2->id }}" cols="30" rows="3" class="form-control"></textarea>
                                        </div>
                                            
                                        <!-- Add hidden input for the Pendaftaran ID -->
                                        <input type="hidden" name="id" value="{{ $p2->id }}">
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
    <!-- Tambahkan event listener untuk checkbox "Check All" -->
    <script>
        // Mengambil referensi checkbox "Check All"
        const checkAllCheckbox = document.getElementById('checkAll');

        // Mengambil referensi semua checkbox lainnya di dalam tabel
        const checkboxes = document.querySelectorAll('input[name="selected_items[]"]');

        // Menambahkan event listener untuk checkbox "Check All"
        checkAllCheckbox.addEventListener('change', function() {
            checkboxes.forEach(function(checkbox) {
                checkbox.checked = checkAllCheckbox.checked;
            });
        });
    </script>

    <button id="btnClear" class="btn btn-warning" title="Clear atau Kembali"><i
            class="fa fa-undo"></i>Kembali</button>
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

    <script>
        $(document).ready(function() {
            $('#order-table2').DataTable();
            $("#tb2").hide();

            $("#order-table tbody").on("click", ".btn-detail", function() {
                var jobId = $(this).data("id");

                console.log("jobId:", jobId);
                $("#tb1").hide();
                $("#order-table2 tbody tr").hide();
                $(`#order-table2 tbody tr[data-job-id=${jobId}]`).show();
                $("#tb2").show();
            });

            $("#btnClear").on("click", function() {
                $("#tb2").hide();
                $("#tb1").show();
            });
        });
    </script>


    <script>
        $(document).ready(function() {
            // Ketika tombol "Update Status" diklik
            $('#updateStatusBtn').click(function() {
                // Mendapatkan nilai status dari dropdown select
                var status = $('#status_multiple').val();

                // Memeriksa apakah status telah dipilih
                if (status === '') {
                    Swal.fire({
                        icon: 'warning',
                        title: 'Oops...',
                        text: 'Harap pilih status sebelum memperbarui!',
                    });
                    return; // Menghentikan proses jika status belum dipilih
                }

                // Array untuk menyimpan ID yang dicentang
                var selectedIds = [];

                // Mengambil ID dari setiap checkbox yang dicentang
                $('input[name="selected_items[]"]:checked').each(function() {
                    selectedIds.push($(this).val());
                });

                // Memastikan minimal satu checkbox dicentang
                if (selectedIds.length === 0) {
                    Swal.fire({
                        icon: 'warning',
                        title: 'Oops...',
                        text: 'Pilih setidaknya satu baris untuk diperbarui!',
                    });
                    return;
                }

                // Mengumpulkan data untuk dikirim ke server
                var formData = {
                    ids: selectedIds,
                    status: status,
                };

                // Tambahkan data sesuai dengan status yang dipilih
                if (status === 'Batal') {
                    formData.keterangan_multiple_batal = $('#keterangan_multiple_batal').val();
                } else {
                    formData.keterangan = $('#keterangan_multiple').val();
                }

                // Mengirim data ke server menggunakan AJAX
                $.ajax({
                    type: 'POST',
                    url: '{{ route('back-office.seleksi.update.statusMultipleInterview') }}', 
                    data: formData,
                    dataType: 'json',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        // Handle success
                        Swal.fire({
                            icon: 'success',
                            title: 'Status berhasil diperbarui!',
                            showConfirmButton: true, // Tampilkan tombol OK
                        }).then(function() {
                            location.reload(); // Reload halaman setelah pengguna mengklik OK
                        });
                    },
                    error: function(error) {
                        // Handle error
                        console.error(error);
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Terjadi kesalahan saat memperbarui status.',
                        });
                    }
                });
            });
        });
    </script>

    <script>
        function submitUbahStatus(id) {
            var formData = $('#ubahStatusForm' + id).serialize();
            // Tambahkan script berikut di bagian head template atau di dalam tag script Anda
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: 'POST',
                url: '{{ route('back-office.seleksi.update_seleksi_interview.status') }}', // Sesuaikan dengan URL rute Anda
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

    <script>
    // Fungsi untuk toggle field batal pada form individual
    function toggleKeteranganBatal(id) {
        var statusSelect = document.getElementById('statusSelect' + id);
        var keteranganBatalDiv = document.getElementById('keteranganBatalDiv' + id);
        var keteranganInterviewDiv = document.getElementById('keteranganInterviewDiv' + id);

        if (statusSelect.value === 'Batal') {
            keteranganBatalDiv.style.display = 'block';
            keteranganInterviewDiv.style.display = 'none';
        } else {
            keteranganBatalDiv.style.display = 'none';
            keteranganInterviewDiv.style.display = 'block';
        }
    }

    // Fungsi untuk toggle field batal pada multiple update
    function toggleMultipleBatalField() {
        var statusMultiple = document.getElementById('status_multiple');
        var keteranganMultipleBatalDiv = document.getElementById('keterangan_multiple_batal_div');
        var keteranganMultipleDiv = document.getElementById('keterangan_multiple_div');

        if (statusMultiple.value === 'Batal') {
            keteranganMultipleBatalDiv.style.display = 'block';
            keteranganMultipleDiv.style.display = 'none';
        } else {
            keteranganMultipleBatalDiv.style.display = 'none';
            keteranganMultipleDiv.style.display = 'block';
        }
    }
    
    // Panggil toggle function saat halaman dimuat
    document.addEventListener('DOMContentLoaded', function() {
        toggleMultipleBatalField();
    });
</script>
@endpush
