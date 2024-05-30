@extends('front.compro-1.layouts.app')
@section('title', $job->nama_job)

@section('content')
    <section class="Element-nav-items-search">
        <div class="container">
            @include('front.compro-1.layouts.navbar')
        </div>
    </section>

    <div style="padding-top:200px"></div>
@endsection