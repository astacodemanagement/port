@extends('front.layouts.app')

@section('title', 'Register Completed')

@section('content')
    <section class="Element-nav-items">
        <div class="container">
            @include('front.layouts.navbar')
        </div>
    </section>

    <div class="wrapper-register-sipol">
        <div class="container">
            <div class="row">
                <div class="col-md-12 p-5">
                    <div class="haading" style="text-align: center">
                        <i class="fas fa-check-circle text-success" style="font-size: 8rem;margin-bottom:20px"></i>
                        <h2>Pendaftaran Berhasil</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('css')
    <style>
        .Element-nav-items {
            padding: unset;
            background-color: unset;
            min-height: unset;
        }
    </style>
@endpush