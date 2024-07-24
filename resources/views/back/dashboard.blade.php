@extends('back.layouts.app')
@section('title','Halaman Dashboard')
@section('subtitle','Menu Dashboard')

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


                        <div class="col-xl-12">
                            <div class="card proj-progress-card">
                                <div class="card-block">
                                    <div class="row">
                                        <div class="col-xl-3 col-md-6">
                                            <h6>Published Project</h6>
                                            <h5 class="m-b-30 f-w-700">532<span
                                                    class="text-c-green m-l-10">+1.69%</span></h5>
                                            <div class="progress">
                                                <div class="progress-bar bg-c-red"
                                                    style="width:25%"></div>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-md-6">
                                            <h6>Completed Task</h6>
                                            <h5 class="m-b-30 f-w-700">4,569<span
                                                    class="text-c-red m-l-10">-0.5%</span></h5>
                                            <div class="progress">
                                                <div class="progress-bar bg-c-blue"
                                                    style="width:65%"></div>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-md-6">
                                            <h6>Successfull Task</h6>
                                            <h5 class="m-b-30 f-w-700">89%<span
                                                    class="text-c-green m-l-10">+0.99%</span></h5>
                                            <div class="progress">
                                                <div class="progress-bar bg-c-green"
                                                    style="width:85%"></div>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-md-6">
                                            <h6>Ongoing Project</h6>
                                            <h5 class="m-b-30 f-w-700">365<span
                                                    class="text-c-green m-l-10">+0.35%</span></h5>
                                            <div class="progress">
                                                <div class="progress-bar bg-c-yellow"
                                                    style="width:45%"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="col-md-12 col-xl-4">
                            <div class="card card-blue text-white">
                                <div class="card-block p-b-0">
                                    <div class="row m-b-50">
                                        <div class="col">
                                            <h6 class="m-b-5">Sales In July</h6>
                                            <h5 class="m-b-0 f-w-700">$2665.00</h5>
                                        </div>
                                        <div class="col-auto text-center">
                                            <p class="m-b-5">Direct Sale</p>
                                            <h6 class="m-b-0">$1768</h6>
                                        </div>
                                        <div class="col-auto text-center">
                                            <p class="m-b-5">Referal</p>
                                            <h6 class="m-b-0">$897</h6>
                                        </div>
                                    </div>
                                    <div id="sec-ecommerce-chart-line" class
                                        style="height:60px"></div>
                                    <div id="sec-ecommerce-chart-bar" style="height:195px">
                                    </div>
                                </div>
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
                        </div>
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
    const xValues = [100,200,300,400,500,600,700,800,900,1000];

new Chart("myChart", {
  type: "line",
  data: {
    labels: xValues,
    datasets: [{ 
      data: [860,1140,1060,1060,1070,1110,1330,2210,7830,2478],
      borderColor: "red",
      fill: false
    }, { 
      data: [1600,1700,1700,1900,2000,2700,4000,5000,6000,7000],
      borderColor: "green",
      fill: false
    }, { 
      data: [300,700,2000,5000,6000,4000,2000,1000,200,100],
      borderColor: "blue",
      fill: false
    }]
  },
  options: {
    legend: {display: false}
  }
});
</script>
@endpush


                  