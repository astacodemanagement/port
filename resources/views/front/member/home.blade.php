@extends('front.member.layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-3">
            <div class="card">
                <div class="card-body text-center">
                    <div class="profile-pic mb-3 mt-3">
                        <img src="{{ asset('member-template/images/profile/user-10.jpg') }}" width="120" class="rounded-circle" alt="user">
                        <h4 class="mt-3 mb-0">{{ auth()->user()->name }}</h4>
                        <a href="mailto:{{ auth()->user()->email }}">{{ auth()->user()->email }}</a>
                        <button class="w-75 btn btn-rounded btn-light-secondary text-secondary btn-lg mt-4">
                            <i class="ti ti-edit ms-2 fs-5"></i>
                            Edit Profile
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="card">
                <div class="card-body"></div>
            </div>
        </div>
    </div>
@endsection