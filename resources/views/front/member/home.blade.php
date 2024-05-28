@extends('front.member.layouts.app')

{{-- @dd(memberProfileImg(auth()->user())) --}}

@section('content')
    <div class="row">
        <div class="col-md-3">
            <div class="card mb-4">
                <div class="card-body text-center">
                    <div class="profile-pic mb-3 mt-3">
                        <img src="{{ memberProfileImg(auth()->user()) }}" onerror="this.src='{{ asset('member-template/images/profile/user-1.jpg') }}'" width="120" height="120" class="rounded-circle" alt="user" style="object-fit:cover;object-position: center;">
                        <h4 class="mt-3 mb-0">{{ auth()->user()->name }}</h4>
                        <a href="mailto:{{ auth()->user()->email }}">{{ auth()->user()->email }}</a>
                        <button class="w-75 btn btn-rounded btn-light-secondary text-primary btn-lg mt-4">
                            <i class="ti ti-pencil-minus ms-2 fs-5"></i>
                            Edit Profile
                        </button>
                    </div>
                </div>
            </div>
            <div class="card mb-4">
                <div class="card-body py-4 px-3">
                    <h6 class="text-primary fw-7">
                        Work Experience
                        <button class="btn btn-primary btn-sm btn-light-secondary float-end text-primary mt-n2"><i class="ti ti-pencil-minus fs-4"></i></button>
                    </h6>
                    <div class="list-group mt-3">
                        <a href="#" class="list-group-item border-0 px-0" aria-current="true">
                            <div class="d-flex w-100 justify-content-between">
                                <h6 class="mb-1 fw-7">
                                    Senior Web Developer
                                </h6>
                                <small class="text-muted">2 months</small>
                            </div>
                            <p class="mb-1">
                                Company ABC - Full time
                            </p>
                        </a>
                        <a href="#" class="list-group-item border-0 px-0">
                            <div class="d-flex w-100 justify-content-between">
                                <h6 class="mb-1 fw-7">
                                    Senior Web Developer
                                </h6>
                                <small class="text-muted">2 months</small>
                            </div>
                            <p class="mb-1">
                                Company ABC - Full time
                            </p>
                        </a>
                    </div>
                </div>
            </div>
            <div class="card mb-4">
                <div class="card-body py-4 px-3">
                    <h6 class="text-primary fw-7">
                        Recent Applied Jobs
                        <button class="btn btn-primary btn-sm btn-light-secondary float-end text-primary mt-n2"><i class="ti ti-external-link fs-4"></i></button>
                    </h6>
                    <div class="list-group mt-3">
                        <a href="#" class="list-group-item border-0 px-0" aria-current="true">
                            <div class="d-flex w-100 justify-content-between">
                                <h6 class="mb-1 fw-7">
                                    Senior Web Developer
                                </h6>
                                <small class="text-muted">View</small>
                            </div>
                        </a>
                        <a href="#" class="list-group-item border-0 px-0">
                            <div class="d-flex w-100 justify-content-between">
                                <h6 class="mb-1 fw-7">
                                    Senior Web Developer
                                </h6>
                                <small class="text-muted">View</small>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            
            <div class="text-center mb-4">
                <button class="btn btn-primary w-100">
                    Preview CV
                    <i class="ms-2 ti ti-external-link"></i>
                </button>
                <button class="btn btn-warning text-dark mt-2 w-100">
                    Download CV
                    <i class="ms-2 ti ti-download"></i>
                </button>
            </div>
        </div>
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
                                <span class="d-none d-md-block">Personal Detail</span>
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button
                                class="nav-link position-relative rounded-0 d-flex align-items-center justify-content-center bg-transparent fs-3 py-6"
                                id="education-tab" data-bs-toggle="pill" data-bs-target="#pills-education" type="button"
                                role="tab" aria-controls="pills-education" aria-selected="false" tabindex="-1">
                                <i class="ti ti-school me-2 fs-6"></i>
                                <span class="d-none d-md-block">Education</span>
                            </button>
                        </li>
                    </ul>
                    <div class="tab-content mt-5" id="pills-tabContent">
                        <div class="tab-pane fade active show" id="pills-personal-detail" role="tabpanel" aria-labelledby="pills-profile-tab" tabindex="0">
                            <h5 class="fw-7 text-primary">Basic Information</h3>
                            <div class="row mt-4">
                                <div class="col-12">
                                    <h6 class="fw-7">Full Name</h6>
                                    {{ auth()->user()->name }}
                                </div>
                            </div>

                            <div class="row mt-lg-4 mt-3">
                                <div class="col-lg-4 mb-3 mb-lg-0">
                                    <h6 class="fw-7">Gender</h6>
                                    <span>{{ auth()->user()->kandidat->jenis_kelamin ?? '-' }}</span>
                                </div>
                                <div class="col-lg-4 mb-3 mb-lg-0">
                                    <h6 class="fw-7">Marital Status</h6>
                                    <span>{{ auth()->user()->kandidat->status_kawin ?? '-' }}</span>
                                </div>
                                <div class="col-lg-4">
                                    <h6 class="fw-7">Citizenship</h6>
                                    <span>Indonesia</span>
                                </div>
                            </div>

                            <div class="row mt-lg-4 mt-3">
                                <div class="col-lg-4 mb-3 mb-lg-0">
                                    <h6 class="fw-7">Birthday</h6>
                                    <span>{{ auth()->user()->kandidat->tanggal_lahir ? \Carbon\Carbon::parse(auth()->user()->kandidat->tanggal_lahir)->format('d F Y') : '-' }}</span>
                                </div>
                                <div class="col-lg-4 mb-3 mb-lg-0">
                                    <h6 class="fw-7">Age</h6>
                                    <span>0 years</span>
                                </div>
                            </div>

                            <hr class="my-3 my-lg-5">

                            <h5 class="fw-7 mt-4 mt-lg-0 text-primary">Address</h3>
                            <div class="row mt-lg-4 mt-3">
                                <div class="col-lg-12">
                                    <h6 class="fw-7">Complete Address</h6>
                                    <span>{{ auth()->user()->kandidat->alamat ?? '-' }}</span>
                                </div>
                            </div>

                            <div class="row mt-lg-4 mt-3">
                                <div class="col-lg-3 mb-3 mb-lg-0">
                                    <h6 class="fw-7">City</h6>
                                    <span>{{ auth()->user()->kandidat->kota ?? '-' }}</span>
                                </div>
                                <div class="col-lg-3 mb-3 mb-lg-0">
                                    <h6 class="fw-7">Province</h6>
                                    <span>{{ auth()->user()->kandidat->provinsi ?? '-' }}</span>
                                </div>
                                <div class="col-lg-3 mb-3 mb-lg-0">
                                    <h6 class="fw-7">Zip / Postal Code</h6>
                                    <span>-</span>
                                </div>
                                <div class="col-lg-3 mb-3 mb-lg-0">
                                    <h6 class="fw-7">Country</h6>
                                    <span>Indonesia</span>
                                </div>
                            </div>

                            <hr class="my-3 my-lg-5">

                            <div class="mt-4 mt-lg-0">
                                <div class="col-lg-6 mb-4">
                                    <h5 class="fw-7 text-primary">Contact</h5>
                                    <h6 class="mt-4 fw-7">Mobile</h6>
                                    <span>{{ auth()->user()->kandidat->no_hp ?? '-' }}</span>
                                </div>
                                <div class="col-lg-6">
                                    <h5 class="fw-7 text-primary">In case of emergency</h5>
                                    <h6 class="mt-4 fw-7">Mobile</h6>
                                    <span>{{ auth()->user()->kandidat->no_telp_darurat ?? '-' }}</span>
                                </div>
                            </div>

                        </div>

                        <div class="tab-pane fade" id="pills-education" role="tabpanel" aria-labelledby="pills-followers-tab" tabindex="0">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
