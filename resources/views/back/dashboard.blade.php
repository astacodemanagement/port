@extends('back.layouts.app')
@section('title','Halaman Dashboard')
@section('subtitle','Menu Dashboard')
@push('css')

<link rel="stylesheet" type="text/css" href="{{asset('template/files/assets/css/style.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('template/files/assets/css/widget.css')}}">
@endpush
@section('content')

<div class="pcoded-content">


    <div class="page-header card">

        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="feather icon-home bg-c-blue"></i>
                    <div class="d-inline">
                        <h5>Dashboard</h5>
                        <span>Silahkan kelola inputan data secara bijak !</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="page-header-breadcrumb">
                    <ul class=" breadcrumb breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="index.html"><i class="feather icon-home"></i></a>
                        </li>
                        <li class="breadcrumb-item"><a href="#!">Dashboard</a> </li>
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
                        <div class="col-xl-3 col-md-6">
                            <div class="card prod-p-card card-info">
                                <div class="card-body">
                                    <div class="row align-items-center m-b-30">
                                        <div class="col">
                                            <h6 class="m-b-5 text-white">Total Belum Verifikasi</h6>
                                            <h3 class="m-b-0 f-w-700 text-white">{{$belum_verifikasi}}</h3>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-money-bill-alt text-c-info f-18"></i>
                                        </div>
                                    </div>
                                    <p class="m-b-0 text-white"><span class="label label-info m-r-10">+11%</span>From Previous Month</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card prod-p-card card-blue">
                                <div class="card-body">
                                    <div class="row align-items-center m-b-30">
                                        <div class="col">
                                            <h6 class="m-b-5 text-white">Total Verifikasi</h6>
                                            <h3 class="m-b-0 f-w-700 text-white">{{$verifikasi}}</h3>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-database text-c-blue f-18"></i>
                                        </div>
                                    </div>
                                    <p class="m-b-0 text-white"><span class="label label-primary m-r-10">+12%</span>From Previous Month</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card prod-p-card card-yellow">
                                <div class="card-body">
                                    <div class="row align-items-center m-b-30">
                                        <div class="col">
                                            <h6 class="m-b-5 text-white">Total Reject</h6>
                                            <h3 class="m-b-0 f-w-700 text-white">{{$reject}}</h3>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-dollar-sign text-c-yellow f-18"></i>
                                        </div>
                                    </div>
                                    <p class="m-b-0 text-white"><span class="label label-warning m-r-10">+52%</span>From Previous Month</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card prod-p-card card-red">
                                <div class="card-body">
                                    <div class="row align-items-center m-b-30">
                                        <div class="col">
                                            <h6 class="m-b-5 text-white">Total Reject Backlist</h6>
                                            <h3 class="m-b-0 f-w-700 text-white">{{$backlist}}</h3>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-dollar-sign text-c-red f-18"></i>
                                        </div>
                                    </div>
                                    <p class="m-b-0 text-white"><span class="label label-danger m-r-10">+52%</span>From Previous Month</p>
                                </div>
                            </div>
                        </div>


                        <div class="col-md-12 col-xl-8">
                            <div class="card sale-card">
                                <div class="card-header">
                                    <h5>Deals Analytics</h5>
                                </div>
                                <div class="card-block">
                                    <!-- <canvas id="myChart" style="width:100%;max-width:600px"></canvas> -->

                                    <canvas
                                        id="myChart"
                                        style="height:380px"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-xl-4">
                            <div class="card comp-card">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <h6 class="m-b-25">Total Job</h6>
                                            <h3 class="f-w-700 text-c-blue">{{$count_job}}</h3>
                                            <p class="m-b-0">May 23 - June 01 (2017)</p>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-eye bg-c-blue"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card comp-card">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <h6 class="m-b-25">Total Kandidat</h6>
                                            <h3 class="f-w-700 text-c-green">{{$count_kandidat}}</h3>
                                            <p class="m-b-0">May 23 - June 01 (2017)</p>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-bullseye bg-c-green"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card comp-card">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <h6 class="m-b-25">Total Negara</h6>
                                            <h3 class="f-w-700 text-c-yellow">{{$count_negara}}</h3>
                                            <p class="m-b-0">May 23 - June 01 (2017)</p>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-hand-paper bg-c-yellow"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="col-md-12 col-xl-6">
                            <div class="card table-card">
                                <div class="card-header">
                                    <h5>JOB Active</h5>
                                    <div class="card-header-right">
                                        <ul class="list-unstyled card-option">
                                            <li class="first-opt"><i
                                                    class="feather icon-chevron-left open-card-option"></i>
                                            </li>
                                            <li><i class="feather icon-maximize full-card"></i>
                                            </li>
                                            <li><i class="feather icon-minus minimize-card"></i>
                                            </li>
                                            <li><i
                                                    class="feather icon-refresh-cw reload-card"></i>
                                            </li>
                                            <li><i class="feather icon-trash close-card"></i></li>
                                            <li><i
                                                    class="feather icon-chevron-left open-card-option"></i>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card-block p-b-0">
                                    <div class="table-responsive">
                                        <table class="table table-hover m-b-0">
                                            <thead>
                                                <tr>
                                                    <th>Name</th>

                                                    <th>Perusahaan</th>
                                                    <th>Negara</th>
                                                    <th>Jenis Kelamin</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($jobactive as $j )

                                                <tr>

                                                    <td>{{$j->nama_job}}</td>

                                                    <td>
                                                        {{$j->nama_perusahaan}}
                                                    </td>
                                                    <td>
                                                    {{$j->negara->nama_negara}}
                                                    </td>
                                                    <td>
                                                        @if ($j->jenis_kelamin == 'Laki-laki')
                                                        <span class="badge badge-primary">Laki-laki</span>
                                                        @elseif ($j->jenis_kelamin == 'Perempuan')
                                                        <span class="badge badge-danger">Perempuan</span>
                                                        @else
                                                        <span class="badge badge-warning">-</span>
                                                        @endif
                                                    </td>

                                                   
                                                </tr>
                                                @endforeach

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-xl-6">
    <div class="card table-card">
        <div class="card-header">
            <h5>JOB Inactive</h5>
            <div class="card-header-right">
                <ul class="list-unstyled card-option">
                    <li class="first-opt"><i class="feather icon-chevron-left open-card-option"></i></li>
                    <li><i class="feather icon-maximize full-card"></i></li>
                    <li><i class="feather icon-minus minimize-card"></i></li>
                    <li><i class="feather icon-refresh-cw reload-card"></i></li>
                    <li><i class="feather icon-trash close-card"></i></li>
                    <li><i class="feather icon-chevron-left open-card-option"></i></li>
                </ul>
            </div>
        </div>
        <div class="card-block p-b-0">
            <div class="table-responsive">
                <table class="table table-hover m-b-0">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Perusahaan</th>
                            <th>Negara</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($jobinactive as $j)
                        <tr>
                            <td>{{$j->nama_job}}</td>
                            <td>{{$j->nama_perusahaan}}</td>
                            <td>{{$j->negara->nama_negara}}</td>
                            <td>
                                @php
                                $statusColor = [
                                    'Verifikasi' => 'success',
                                    'Pending' => 'danger',
                                    'Reject' => 'warning'
                                ];
                                @endphp
                                <span class="badge badge-{{$statusColor[$j->status] ?? 'secondary'}}">{{$j->status}}</span>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


                        <div class="col-xl-12">
                            <div class="card proj-progress-card">
                                <div class="card-block">
                                    <div class="row">
                                        <div class="col-xl-4 col-md-6">
                                            <h6>Kandidat Dalam Proses</h6>
                                            <h5 class="m-b-30 text-c-yellow f-w-700">532</h5>
                                            <div class="progress">
                                                <div class="progress-bar bg-c-yellow"
                                                    style="width:50%"></div>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-md-6">
                                            <h6>Kandidat Terbang</h6>
                                            <h5 class="m-b-30 text-c-blue f-w-700">4,569</h5>
                                            <div class="progress">
                                                <div class="progress-bar bg-c-blue"
                                                    style="width:70%"></div>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-md-6">
                                            <h6>Kandidat Selesai Kontrak</h6>
                                            <h5 class="m-b-30  text-c-green f-w-700">89</h5>
                                            <div class="progress">
                                                <div class="progress-bar bg-c-green"
                                                    style="width:100%"></div>
                                            </div>
                                        </div>
                                      
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="col-md-12 col-xl-4">
                            <div class="card latest-update-card text-white">
                                <div class="card-header">
                                <h5>Interview Kandidat</h5>
                                </div>
                                <!-- table -->
                            </div>
                        </div>
                        <div class="col-xl-4 col-md-12">
                            <div class="card latest-update-card">
                                <div class="card-header">
                                    <h5>What’s New</h5>
                                    <div class="card-header-right">
                                        <ul class="list-unstyled card-option">
                                            <li class="first-opt"><i
                                                    class="feather icon-chevron-left open-card-option"></i>
                                            </li>
                                            <li><i class="feather icon-maximize full-card"></i>
                                            </li>
                                            <li><i class="feather icon-minus minimize-card"></i>
                                            </li>
                                            <li><i
                                                    class="feather icon-refresh-cw reload-card"></i>
                                            </li>
                                            <li><i class="feather icon-trash close-card"></i></li>
                                            <li><i
                                                    class="feather icon-chevron-left open-card-option"></i>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card-block">
                                    <div class="scroll-widget">
                                        <div class="latest-update-box">
                                            <div class="row p-t-20 p-b-30">
                                                <div
                                                    class="col-auto text-right update-meta p-r-0">
                                                    <img src="{{ asset('template') }}/files/assets/images/avatar-4.jpg"
                                                        alt="user image"
                                                        class="img-radius img-40 align-top m-r-15 update-icon">
                                                </div>
                                                <div class="col p-l-5">
                                                    <a href="#!">
                                                        <h6>Your Manager Posted.</h6>
                                                    </a>
                                                    <p class="text-muted m-b-0">Jonny michel</p>
                                                </div>
                                            </div>
                                            <div class="row p-b-30">
                                                <div
                                                    class="col-auto text-right update-meta p-r-0">
                                                    <i
                                                        class="feather icon-briefcase bg-c-red update-icon"></i>
                                                </div>
                                                <div class="col p-l-5">
                                                    <a href="#!">
                                                        <h6>You have 3 pending Task.</h6>
                                                    </a>
                                                    <p class="text-muted m-b-0">Hemilton</p>
                                                </div>
                                            </div>
                                            <div class="row p-b-30">
                                                <div
                                                    class="col-auto text-right update-meta p-r-0">
                                                    <i
                                                        class="feather icon-check f-w-600 bg-c-green update-icon"></i>
                                                </div>
                                                <div class="col p-l-5">
                                                    <a href="#!">
                                                        <h6>New Order Received.</h6>
                                                    </a>
                                                    <p class="text-muted m-b-0">Hemilton</p>
                                                </div>
                                            </div>
                                            <div class="row p-b-30">
                                                <div
                                                    class="col-auto text-right update-meta p-r-0">
                                                    <img src="{{ asset('template') }}/files/assets/images/avatar-4.jpg"
                                                        alt="user image"
                                                        class="img-radius img-40 align-top m-r-15 update-icon">
                                                </div>
                                                <div class="col p-l-5">
                                                    <a href="#!">
                                                        <h6>Your Manager Posted.</h6>
                                                    </a>
                                                    <p class="text-muted m-b-0">Jonny michel</p>
                                                </div>
                                            </div>
                                            <div class="row p-b-30">
                                                <div
                                                    class="col-auto text-right update-meta p-r-0">
                                                    <i
                                                        class="feather icon-briefcase bg-c-red update-icon"></i>
                                                </div>
                                                <div class="col p-l-5">
                                                    <a href="#!">
                                                        <h6>You have 3 pending Task.</h6>
                                                    </a>
                                                    <p class="text-muted m-b-0">Hemilton</p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div
                                                    class="col-auto text-right update-meta p-r-0">
                                                    <i
                                                        class="feather icon-check f-w-600 bg-c-green update-icon"></i>
                                                </div>
                                                <div class="col p-l-5">
                                                    <a href="#!">
                                                        <h6>New Order Received.</h6>
                                                    </a>
                                                    <p class="text-muted m-b-0">Hemilton</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </>
                        <div class="col-xl-4 col-md-6">
                            <div class="card latest-update-card">
                                <div class="card-header">
                                    <h5>Pengaduan PSI JOB</h5>
                                    <div class="card-header-right">
                                        <ul class="list-unstyled card-option">
                                            <li class="first-opt"><i
                                                    class="feather icon-chevron-left open-card-option"></i>
                                            </li>
                                            <li><i class="feather icon-maximize full-card"></i>
                                            </li>
                                            <li><i class="feather icon-minus minimize-card"></i>
                                            </li>
                                            <li><i
                                                    class="feather icon-refresh-cw reload-card"></i>
                                            </li>
                                            <li><i class="feather icon-trash close-card"></i></li>
                                            <li><i
                                                    class="feather icon-chevron-left open-card-option"></i>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card-block">
                                    <div class="scroll-widget">
                                        <div class="latest-update-box">
                                            @foreach ($pengaduan as $p )

                                            <div class="row">
                                                <div
                                                    class="col-auto text-right update-meta p-r-0">
                                                    <i class="b-success update-icon ring"></i>
                                                </div>
                                                <div class="col p-l-5">
                                                    <a href="#!">
                                                        <h6>{{$p->kandidat->nama_lengkap}}</h6>
                                                    </a>
                                                    <p class="text-muted m-b-0"> <a href="#!"
                                                            class="text-c-green"> {{$p->subjek}}</a> {{$p->isi}}</p>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="col-md-12">
                            <div class="card table-card">
                                <div class="card-header">
                                    <h5>New Kandidat</h5>
                                    <div class="card-header-right">
                                        <ul class="list-unstyled card-option">
                                            <li class="first-opt"><i
                                                    class="feather icon-chevron-left open-card-option"></i>
                                            </li>
                                            <li><i class="feather icon-maximize full-card"></i>
                                            </li>
                                            <li><i class="feather icon-minus minimize-card"></i>
                                            </li>
                                            <li><i
                                                    class="feather icon-refresh-cw reload-card"></i>
                                            </li>
                                            <li><i class="feather icon-trash close-card"></i></li>
                                            <li><i
                                                    class="feather icon-chevron-left open-card-option"></i>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card-block p-b-0">
                                    <div class="table-responsive">
                                        <table class="table table-hover m-b-0">
                                            <thead>
                                                <tr>
                                                    <th>Name</th>

                                                    <th>Tempat Lahir</th>
                                                    <th>Foto</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($pelamar as $p )

                                                <tr>

                                                    <td>{{$p->nama_lengkap}}</td>

                                                    <td>
                                                        {{$p->tempat_lahir}}
                                                    </td>
                                                    <td>
                                                        <a href="/upload/foto/{{ $p->foto }}" target="_blank">
                                                            <img style="max-width:50px; max-height:50px"
                                                                src="/upload/foto/{{ $p->foto }}"
                                                                alt="">
                                                        </a>
                                                    </td>
                                                    <td>
                                                        @php
                                                        $statusColor = [
                                                        'Verifikasi' => 'success',
                                                        'Pending' => 'danger',
                                                        'Reject' => 'warning'
                                                        ];
                                                        @endphp
                                                        <span class="badge badge-{{$statusColor[$p->status]}}">{{$p->status}}</span>

                                                    </td>
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

<script>
    const xValues = [100, 200, 300, 400, 500, 600, 700, 800, 900, 1000];

    new Chart("myChart", {
        type: "line",
        data: {
            labels: xValues,
            datasets: [{
                data: [860, 1140, 1060, 1060, 1070, 1110, 1330, 2210, 7830, 2478],
                borderColor: "red",
                fill: false
            }, {
                data: [1600, 1700, 1700, 1900, 2000, 2700, 4000, 5000, 6000, 7000],
                borderColor: "green",
                fill: false
            }, {
                data: [300, 700, 2000, 5000, 6000, 4000, 2000, 1000, 200, 100],
                borderColor: "blue",
                fill: false
            }]
        },
        options: {
            legend: {
                display: false
            }
        }
    });
</script>
@endpush