@extends('front.member.layouts.app')

@section('title', $appliedJob?->job?->nama_job)

@section('content')
    <div class="row">
        @include('front.member.layouts.profile-info')
        <div class="col-md-9">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title fw-7 text-primary">{{ $appliedJob?->job?->nama_job }}</h5>
                    
                    <div class="mt-5 text-end">
                        <a href="{{ route('member.jobs.applied') }}" class="btn btn-outline-danger">Cancel</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection