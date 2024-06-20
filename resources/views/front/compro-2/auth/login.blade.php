@extends('front.compro-2.layouts.default')
@section('content')
@include('front.compro-2.component.noauth')
<div class="tw-bg-[#F3F4F6] md:tw-h-[58vh] tw-py-20  tw-flex tw-items-center ">
    <div class="tw-w-full tw-mx-auto tw-px-4">
        <div class="tw-flex tw-justify-center tw-items-center">
            <div class="tw-w-full tw-max-w-md">
                <div class="tw-bg-white tw-shadow tw-rounded-lg tw-px-8 tw-py-8">
                    <!-- logo tengah -->
                    <div class="tw-flex tw-justify-center tw-items-center tw-mb-3">
                        <img src="{{ asset('frontend') }}/assets/image/akamalogo.png" alt="Logo" class="tw-w-40" />
                    </div>  
                    <h1 class="tw-text-sm tw-text-gray-700 tw-text-center tw-mb-6">Masuk ke dalam akun</h1>
                    <form action="{{ route('front.login.store') }}" method="POST">
                        @csrf
                        <div class="tw-mb-4">
                            <label for="email" class="tw-block tw-text-sm tw-font-medium tw-my-3 tw-text-gray-700">Email</label>
                            <input type="email" name="email" id="email" class="tw-w-full tw-py-2 tw-px-3 tw-border tw-border-gray-300 tw-rounded-md tw-shadow-sm tw-focus:tw-outline-none tw-focus:tw-ring-1 tw-focus:tw-ring-indigo-500 tw-focus:tw-border-indigo-500 tw-transition tw-duration-500" placeholder="Email" required>
                            @error('email')
                                <small class="tw-text-red-500 tw-text-sm" role="alert">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="tw-mb-4">
                            <label for="password" class="tw-block tw-text-sm tw-font-medium tw-my-3 tw-text-gray-700">Password</label>
                            <input type="password" name="password" id="password" class="tw-w-full tw-py-2 tw-px-3 tw-border tw-border-gray-300 tw-rounded-md tw-shadow-sm tw-focus:tw-outline-none tw-focus:tw-ring-1 tw-focus:tw-ring-indigo-500 tw-focus:tw-border-indigo-500 tw-transition tw-duration-500" placeholder="Password" required>
                            @error('password')
                                <small class="tw-text-red-500 tw-text-sm" role="alert">{{ $message }}</small>
                            @enderror
                        </div>
                        <!-- navogate to regis -->
                        <div class="tw-flex tw-justify-between tw-items-center tw-mb-4">
                            <a href="{{ route('front.register') }}" class="tw-text-sm tw-text-sky-500 hover:tw-underline">Belum punya akun?</a>
                            <a href="{{ route('front.password.request') }}" class="tw-text-sm tw-text-sky-500 hover:tw-underline">Lupa password?</a>
                        </div>
                        <div class="tw-mb-4">
                            <button type="submit" class="tw-w-full tw-py-2 tw-bg-sky-500 tw-text-white tw-rounded-md tw-transition tw-duration-500 hover:tw-bg-sky-600 hover:tw-scale-105">Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>  
@endsection
