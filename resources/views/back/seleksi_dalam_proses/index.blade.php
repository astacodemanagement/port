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
                                        <h5> <span class="badge badge-pill badge-primary"
                                                style="color: #ecf1f3; display: inline-block;"> Data Dalam Proses</span>
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

                            <div class="card" id="tb2">
                                <div class="card-header">
                                    <h5> <span class="badge badge-pill badge-primary"
                                            style="color: #ecf1f3; display: inline-block;"> Data Dalam Proses</span>
                                    </h5>

                                </div>
                                <div class="card-block">

                                    <div class="dt-responsive table-responsive">
                                        <table id="order-table2" class="table table-striped table-bordered nowrap">
                                            <thead>
                                                <tr>
                                                    <th width="5%">No</th>
                                                    <th width="10%">Nama</th>
                                                    <th width="10%">No Paspor</th>
                                                    <th width="10%">Negara</th>
                                                    <th width="10%">Posisi</th>
                                                    <th width="10%">Mitra</th>
                                                    <th width="10%">ID KTKLN</th>
                                                    <th width="10%">Sponsor</th>
                                                    <th width="10%">Tanggal Akhir Kontrak</th>
                                                    <th width="5%">Status Seleksi</th>
                                                    <th width="15%" class="text-center" width="5%">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($seleksi_group as $jobId => $group)
                                                    @foreach ($group as $p2)
                                                        <tr data-job-id="{{ $jobId }}">
                                                            <td>{{ $loop->iteration }}</td>
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
                                                                <a href="{{ route('seleksi_dalam_proses.detail', $p2->id) }}"
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

                                                                                    <option value="Dalam Proses">Dalam
                                                                                        Proses
                                                                                    </option>
                                                                                    <option value="Terbang">Terbang
                                                                                    </option>
                                                                                    <option value="Cek Kualifikasi">Cek
                                                                                        Kualifikasi</option>
                                                                                    <option value="Lolos Kualifikasi">
                                                                                        Lolos Kualifikasi</option>
                                                                                    <option value="Interview">
                                                                                        Interview</option>
                                                                                    <option value="Lolos Interview">
                                                                                        Lolos Interview</option>

                                                                                    <option value="Selesai Kontrak">
                                                                                        Selesai Kontrak</option>
                                                                                    <option value="Batal">Batal
                                                                                    </option>
                                                                                    <!-- Add other status options if needed -->
                                                                                </select>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="statusSelectDk">Status
                                                                                    Dalam Kerja :</label>
                                                                                
                                                                                <div class="col-sm-12">

                                                                                    <div
                                                                                        class="border-checkbox-section">
                                                                                        

                                                                                        <div class="border-checkbox-group border-checkbox-group-success">
                                                                                            <input class="border-checkbox" type="checkbox" id="mik" name="mik" value="{{ $p2->mik }}" {{ $p2->mik == 1 ? 'checked' : '' }}>
                                                                                            <label class="border-checkbox-label" for="mik">Menunggu Izin Kerja</label>
                                                                                        </div>
                                                                                        <br>
                                                                                        <div class="border-checkbox-group border-checkbox-group-success">
                                                                                            <input class="border-checkbox" type="checkbox" id="iktt" name="iktt" value="{{ $p2->iktt }}" {{ $p2->iktt == 1 ? 'checked' : '' }}>
                                                                                            <label class="border-checkbox-label" for="iktt">Izin Kerja Telah Terbit</label>
                                                                                        </div>
                                                                                        <br>
                                                                                        <div class="border-checkbox-group border-checkbox-group-success">
                                                                                            <input class="border-checkbox" type="checkbox" id="mjk" name="mjk" value="{{ $p2->mjk }}" {{ $p2->mjk == 1 ? 'checked' : '' }}>
                                                                                            <label class="border-checkbox-label" for="mjk">Menunggu Jadwal Kedutaan</label>
                                                                                        </div>
                                                                                        
                                                                                        <script>
                                                                                            // Get references to the checkboxes
                                                                                            const ikttCheckbox = document.getElementById("iktt");
                                                                                            const mjkCheckbox = document.getElementById("mjk");
                                                                                        
                                                                                            // Function to update 'mjk' checkbox based on 'iktt' checkbox
                                                                                            function updateMJKCheckbox() {
                                                                                                mjkCheckbox.checked = ikttCheckbox.checked;
                                                                                                mjkCheckbox.readOnly = ikttCheckbox.checked;
                                                                                            }
                                                                                        
                                                                                            // Function to update 'iktt' checkbox based on 'mjk' checkbox
                                                                                            function updateIKTTCheckbox() {
                                                                                                ikttCheckbox.checked = mjkCheckbox.checked;
                                                                                                ikttCheckbox.readOnly = mjkCheckbox.checked;
                                                                                            }
                                                                                        
                                                                                            // Add event listener to the 'iktt' checkbox
                                                                                            ikttCheckbox.addEventListener("change", function() {
                                                                                                // Set 'mjk' checkbox status based on 'iktt' checkbox status
                                                                                                updateMJKCheckbox();
                                                                                            });
                                                                                        
                                                                                            // Add event listener to the 'mjk' checkbox
                                                                                            mjkCheckbox.addEventListener("change", function() {
                                                                                                // Set 'iktt' checkbox status based on 'mjk' checkbox status
                                                                                                updateIKTTCheckbox();
                                                                                            });
                                                                                        
                                                                                        </script>

                                                                                        <br>
                                                                                        <div class="border-checkbox-group border-checkbox-group-success">
                                                                                            <input class="border-checkbox" type="checkbox" id="jak" name="jak" value="{{ $p2->jak }}" {{ $p2->jak == 1 ? 'checked' : '' }}>
                                                                                            <label class="border-checkbox-label" for="jak">Jadwal Appointment Kedutaan</label>
                                                                                        </div>
                                                                                        
                                                                                        <div class="">
                                                                                            <label
                                                                                                class="border-checkbox-label"
                                                                                                for="tanggal_ak">Tanggal
                                                                                                AK</label>
                                                                                            <input class="form-control"
                                                                                                type="date"
                                                                                                id="tanggal_ak"
                                                                                                name="tanggal_ak"
                                                                                                value="{{ $p2->tanggal_ak }}">

                                                                                        </div>

                                                                                        <br>
                                                                                        <div class="border-checkbox-group border-checkbox-group-success">
                                                                                            <input class="border-checkbox" type="checkbox" id="vt" name="vt" value="{{ $p2->vt }}" {{ $p2->vt == 1 ? 'checked' : '' }}>
                                                                                            <label class="border-checkbox-label" for="vt">Visa Terbit</label>
                                                                                        </div>
                                                                                        <div class="border-checkbox-group border-checkbox-group-success">
                                                                                            <input class="border-checkbox" type="checkbox" id="vd" name="vd" value="{{ $p2->vd }}" {{ $p2->vd == 1 ? 'checked' : '' }}>
                                                                                            <label class="border-checkbox-label" for="vd">Visa Ditolak</label>
                                                                                        </div>
                                                                                        
                                                                                        <script>
                                                                                            // Mengambil elemen-elemen kotak centang
                                                                                            const vtCheckbox = document.getElementById('vt');
                                                                                            const vdCheckbox = document.getElementById('vd');

                                                                                            // Menambahkan event listener untuk setiap kotak centang
                                                                                            vtCheckbox.addEventListener('change', function() {
                                                                                                if (this.checked) {
                                                                                                    // Jika kotak centang 'Visa Terbit' dipilih, pastikan kotak centang 'Visa Ditolak' tidak dipilih
                                                                                                    vdCheckbox.checked = false;
                                                                                                }
                                                                                            });

                                                                                            vdCheckbox.addEventListener('change', function() {
                                                                                                if (this.checked) {
                                                                                                    // Jika kotak centang 'Visa Ditolak' dipilih, pastikan kotak centang 'Visa Terbit' tidak dipilih
                                                                                                    vtCheckbox.checked = false;
                                                                                                }
                                                                                            });
                                                                                        </script>
                                                                                        <div class="">
                                                                                            <label
                                                                                                class="border-checkbox-label"
                                                                                                for="tanggal_validity">Tanggal
                                                                                                Validity</label>
                                                                                            <input class="form-control"
                                                                                                type="date"
                                                                                                id="tanggal_validity"
                                                                                                name="tanggal_validity"
                                                                                                value="{{ $p2->tanggal_validity }}">

                                                                                        </div>
                                                                                        <br>
                                                                                        <div class="">
                                                                                            <label
                                                                                                class="border-checkbox-label"
                                                                                                for="tanggal_terbit">Tanggal
                                                                                                Terbit</label>
                                                                                            <input class="form-control"
                                                                                                type="date"
                                                                                                id="tanggal_terbit"
                                                                                                name="tanggal_terbit"
                                                                                                value="{{ $p2->tanggal_terbit }}">

                                                                                        </div>
                                                                                        <br>
                                                                                        <div class="">
                                                                                            <label
                                                                                                class="border-checkbox-label"
                                                                                                for="tanggal_habis">Tanggal
                                                                                                Habis</label>
                                                                                            <input class="form-control"
                                                                                                type="date"
                                                                                                id="tanggal_habis"
                                                                                                name="tanggal_habis"
                                                                                                value="{{ $p2->tanggal_habis }}">

                                                                                        </div>

                                                                                        <br>
                                                                                        <div class="border-checkbox-group border-checkbox-group-success">
                                                                                            <input class="border-checkbox" type="checkbox" id="pap" name="pap" value="{{ $p2->pap }}" {{ $p2->pap == 1 ? 'checked' : '' }}>
                                                                                            <label class="border-checkbox-label" for="pap">P.A.P</label>
                                                                                        </div>
                                                                                        





                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col-md-6">
                                                                                    <div class="form-group">
                                                                                        <label for="tanggal_berangkat">Tanggal Keberangkatan:</label>
                                                                                        <input type="date" class="form-control" id="tanggal_berangkat" name="tanggal_berangkat" value="{{ $p2->tanggal_berangkat }}">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <div class="form-group">
                                                                                        <label for="jam_terbang">Jam Terbang:</label>
                                                                                        <select name="jam_terbang" id="jam_terbang" class="form-control">
                                                                                            <option value="01" {{ $p2->jam_terbang == "01" ? 'selected' : '' }}>01</option>
                                                                                            <option value="02" {{ $p2->jam_terbang == "02" ? 'selected' : '' }}>02</option>
                                                                                            <option value="03" {{ $p2->jam_terbang == "03" ? 'selected' : '' }}>03</option>
                                                                                            <option value="04" {{ $p2->jam_terbang == "04" ? 'selected' : '' }}>04</option>
                                                                                            <option value="05" {{ $p2->jam_terbang == "05" ? 'selected' : '' }}>05</option>
                                                                                            <option value="06" {{ $p2->jam_terbang == "06" ? 'selected' : '' }}>06</option>
                                                                                            <option value="07" {{ $p2->jam_terbang == "07" ? 'selected' : '' }}>07</option>
                                                                                            <option value="08" {{ $p2->jam_terbang == "08" ? 'selected' : '' }}>08</option>
                                                                                            <option value="09" {{ $p2->jam_terbang == "09" ? 'selected' : '' }}>09</option>
                                                                                            <option value="10" {{ $p2->jam_terbang == "10" ? 'selected' : '' }}>10</option>
                                                                                            <option value="11" {{ $p2->jam_terbang == "11" ? 'selected' : '' }}>11</option>
                                                                                            <option value="12" {{ $p2->jam_terbang == "12" ? 'selected' : '' }}>12</option>
                                                                                            <option value="13" {{ $p2->jam_terbang == "13" ? 'selected' : '' }}>13</option>
                                                                                            <option value="14" {{ $p2->jam_terbang == "14" ? 'selected' : '' }}>14</option>
                                                                                            <option value="15" {{ $p2->jam_terbang == "15" ? 'selected' : '' }}>15</option>
                                                                                            <option value="16" {{ $p2->jam_terbang == "16" ? 'selected' : '' }}>16</option>
                                                                                            <option value="17" {{ $p2->jam_terbang == "17" ? 'selected' : '' }}>17</option>
                                                                                            <option value="18" {{ $p2->jam_terbang == "18" ? 'selected' : '' }}>18</option>
                                                                                            <option value="19" {{ $p2->jam_terbang == "19" ? 'selected' : '' }}>19</option>
                                                                                            <option value="20" {{ $p2->jam_terbang == "20" ? 'selected' : '' }}>20</option>
                                                                                            <option value="21" {{ $p2->jam_terbang == "21" ? 'selected' : '' }}>21</option>
                                                                                            <option value="22" {{ $p2->jam_terbang == "22" ? 'selected' : '' }}>22</option>
                                                                                            <option value="23" {{ $p2->jam_terbang == "23" ? 'selected' : '' }}>23</option>
                                                                                            <option value="00" {{ $p2->jam_terbang == "00" ? 'selected' : '' }}>00</option>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            
                                                                            
                                                                            <div class="form-group">
                                                                                <label for="supplier_id">Supplied By :</label>
                                                                                <select name="supplier_id" id="supplier_id" class="form-control">
                                                                                    <option value="">--Pilih Supplier--</option>
                                                                                    @foreach($supplierList as $id => $supplierName)
                                                                                        <option value="{{ $id }}" {{ $p2->supplier_id == $id ? 'selected' : '' }}>{{ $supplierName }}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                            
                                                                            
                                                                            
                                                                            <div class="form-group">
                                                                                <label
                                                                                    for="keterangan_dalam_proses">Keterangan
                                                                                    Dari Dalam Proses :</label>
                                                                                <textarea name="keterangan_dalam_proses" id="keterangan_dalam_proses" cols="30" rows="3"
                                                                                    class="form-control">{{ $p2->keterangan_dalam_proses }}</textarea>

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

@endsection



@push('script')
    @include('back.layouts.js_datatables')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <script>
        $(document).ready(function() {
            $('#order-table2').DataTable();
            // Sembunyikan tabel kedua saat halaman dimuat
            $("#tb1").hide();

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
                url: '/update-status-seleksi_dalam_proses', // Sesuaikan dengan URL rute Anda
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
