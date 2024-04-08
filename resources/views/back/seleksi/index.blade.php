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
                                <a href="/"><i class="feather icon-home"></i></a>
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
                                        <h5> <span class="badge badge-pill badge-warning"
                                                style="color: #2c2f30; display: inline-block;"> Data Cek Kualifikasi</span>
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
                                                        <th width="5%">Kategori Industri Pekerjaan</th>
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
                                                                    <a title="Detail" style="color: rgb(242, 236, 236)"
                                                                        href="#"
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

                            <div class="card" id="tb2">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <h5>
                                        <span class="badge badge-pill badge-warning" style="color: #2c2f30; display: inline-block;">Data Cek Kualifikasi</span>
                                    </h5>
                                    <div class="d-flex align-items-center">
                                        <!-- Select dropdown -->
                                        <div class="mr-2" style="width: 200px;"> <!-- Sesuaikan lebar yang diinginkan -->
                                      
                                            <select class="form-control" id="status_multiple" name="status_multiple">
                                                <option value="">--Pilih Status--</option>
                                                <option value="Lolos Kualifikasi">Lolos Kualifikasi</option>
                                                <option value="Interview">Interview</option>
                                                <option value="Lolos Interview">Lolos Interview</option>
                                                <option value="Dalam Proses">Dalam Proses</option>
                                                <option value="Terbang">Terbang</option>
                                                <option value="Selesai Kontrak">Selesai Kontrak</option>
                                                <option value="Batal">Batal</option>
                                                <!-- Add other status options if needed -->
                                            </select>
                                        </div>
                                        <!-- Tombol "Update Status" -->
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
                                                            <td>{{ $p2->nama_kandidat }}</td>
                                                            <td>{{ $p2->status }}</td>
                                                            <td class="text-center d-flex">
                                                                <a href="{{ route('seleksi.detail', $p2->id) }}"
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
                                                                <a href="{{ route('seleksi.detail', $p2->id) }}"
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
                                                                            Status - {{ $p2->nama_kandidat }}</h5>
                                                                        <button type="button" class="close"
                                                                            data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <!-- Add your form with combo box for status update -->
                                                                        <form id="ubahStatusForm{{ $p2->id }}">
                                                                            <!-- Combo box for status update -->
                                                                            <div class="form-group">
                                                                                <label for="statusSelect">Ubah
                                                                                    Status:</label>
                                                                                <select class="form-control"
                                                                                    id="statusSelect{{ $p2->id }}"
                                                                                    name="status">
                                                                                    {{-- <option value="Cek Kualifikasi">Cek Kualifikasi</option> --}}
                                                                                    <option value="Lolos Kualifikasi">
                                                                                        Lolos Kualifikasi</option>
                                                                                    <option value="Interview">Interview
                                                                                    </option>
                                                                                    <option value="Lolos Interview">
                                                                                        Lolos Interview</option>
                                                                                    <option value="Dalam Proses">Dalam
                                                                                        Proses</option>
                                                                                    <option value="Terbang">Terbang
                                                                                    </option>
                                                                                    <option value="Selesai Kontrak">
                                                                                        Selesai Kontrak</option>
                                                                                    <option value="Batal">Batal
                                                                                    </option>
                                                                                    <!-- Add other status options if needed -->
                                                                                </select>
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
                                                class="fa fa-undo"></i>Clear</button>
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
            // Sembunyikan tabel kedua saat halaman dimuat
            $("#tb2").hide();

            // Tangani klik pada tombol "Detail" pada tabel pertama
            $("#order-table tbody").on("click", ".btn-detail", function() {
                var jobId = $(this).data("id");

                // Cetak nilai jobId ke konsol untuk diinspeksi
                console.log("jobId:", jobId);

                // Sembunyikan tabel pertama
                $("#tb1").hide();

                // Sembunyikan semua baris pada tabel kedua
                // $("#order-table2 tbody tr").hide();

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
                // Anda bisa menambahkan data lain yang diperlukan di sini
            };

            // Mengirim data ke server menggunakan AJAX
            $.ajax({
                type: 'POST',
                url: '/update-status-multiple', // Sesuaikan dengan URL rute Anda
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
                url: '/update-status-seleksi', // Sesuaikan dengan URL rute Anda
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
