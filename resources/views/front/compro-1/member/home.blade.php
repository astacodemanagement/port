@extends('front.compro-1.layouts.app')

@section('content')
    <section class="Element-nav-items-search">
        <div class="container">
            @include('front.compro-1.layouts.navbar')
        </div>
    </section>
    
    <section class="section-login bg-light py-5 py-md-5 py-xl-8">
        <div class="container">
            <div class="row justify-content-center">
                <div class="row g-3 mt-3">
                    <div class="col-md-5 col-lg-4 px-5">
                        <h5 class="d-flex justify-content-between align-items-center mb-3">
                            <span class="text-body-secondary">Akun Anda</span>
                        </h5>
                        <ul class="list-group list-menu mb-3 ">
                            <a href="">
                                <li class="list-group-item d-flex justify-content-between lh-sm active">
                                    <div>
                                        <h6 class="my-0 py-2 text-muted">
                                            <i class="fa fa-user"></i>
                                            <span class="px-1">Info Pelamar</span>
                                        </h6>
                                    </div>
                                </li>
                            </a>
                            <a href="">
                                <li class="list-group-item d-flex justify-content-between lh-sm">
                                    <div>
                                        <h6 class="my-0 py-2 text-muted">
                                            <i class="far fa-address-book"></i>
                                            <span class="px-1">Informasi Kontak</span>
                                        </h6>
                                    </div>
                                </li>
                            </a>
                        </ul>
                    </div>
                    <div class="col-md-7 col-lg-8">
                        <div class="card">
                            <div class="card-header bg-white">
                                <h6 class="card-title mb-0">Info Pelamar</h6>
                                <small class="text-secondary p-0 m-0">Atur informasi dasar akun anda</small>
                            </div>
                            <div class="card-body">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('css')
    <style>
        .list-menu {
            border-radius: unset;
        }

        .list-menu .list-group-item {
            background-color: unset;
            border: unset
        }

        .list-menu .list-group-item {
            padding-left: 15px;
        }

        .list-menu .list-group-item h6 {
            font-size: 15px;
        }

        .list-menu .list-group-item.active {
            background-color: #e3edfe;
            border-left: solid 5px #0d6efd;
            padding-left: 12px;
        }

        .list-menu .list-group-item.active h6 {
            color: #0d6efd !important
        }
        
        .list-menu a {
            text-decoration: unset
        }
    </style>
@endpush