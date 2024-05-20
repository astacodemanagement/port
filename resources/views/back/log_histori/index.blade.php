@extends('back.layouts.app')
@section('title', 'Halaman Log Histori')
@section('subtitle', 'Menu Log Histori')
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
                            <h5>Log Histori</h5>
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
                            <li class="breadcrumb-item"><a href="#!">Halaman Log Histori</a>
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


                                <div class="card">
                                    <div class="card-header">
                                        <h5>Data Log Histori</h5>

                                    </div>
                                    <div class="card-block">


                                        <a href="{{ route('back-office.log-histori.delete-all') }}" class="btn btn-danger mb-3"
                                            onclick="return confirm('Apakah Anda Yakin Akan Menghapus Semua Data, silahkan Back Up terlebih dahulu?')"><i
                                                class="fas fa-trash"></i> Hapus Semua Data</a>


                                        <br><br>

                                        <div class="dt-responsive table-responsive">
                                            <table id="order-table" class="table table-striped table-bordered nowrap">
                                                <thead>
                                                    <tr>
                                                        <th width="5%">No</th>
                                                        <th width="15%">Tabel</th>
                                                        <th width="5%">ID Entitas</th>
                                                        <th width="5%">Aksi</th>
                                                        <th width="5%">Waktu</th>
                                                        <th width="5%">Pengguna</th>
                                                        <th width="5%">Data Lama</th>
                                                        <th width="5%">Data Baru</th>

                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($log_histori as $p)
                                                        <tr>
                                                            <td>{{ $loop->iteration }}</td>
                                                            <td>{{ $p->Tabel_Asal }}</td>
                                                            <td>{{ $p->ID_Entitas }}</td>
                                                            <td>{{ $p->Aksi }}</td>
                                                            <td>{{ $p->Waktu }}</td>
                                                            <td>{{ $p->Pengguna }}</td>
                                                            <td>{{ $p->Data_Lama }}</td>
                                                            <td>{{ $p->Data_Baru }}</td>

                                                        </tr>
                                                    @endforeach

                                                </tbody>

                                            </table>
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
@endpush
