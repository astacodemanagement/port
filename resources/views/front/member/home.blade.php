@extends('front.member.layouts.app')

{{-- @dd(memberProfileImg(auth()->user())) --}}

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
