@extends('front.member.layouts.app')

@section('title', 'Jobs')

@section('content')
    <div class="row">
        @include('front.member.layouts.profile-info')
        <div class="col-md-9">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title fw-semibold">Jobs</h5>
                </div>
            </div>
        </div>
    </div>
@endsection