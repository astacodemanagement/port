@extends('front.compro-2.layouts.default')
@section('content')
@include('front.compro-2.component.noauth')
<div class="tw-bg-[#F3F4F6] tw-h-[58vh] tw-flex tw-items-center ">
    <div class="tw-w-full tw-mx-auto tw-px-4">
        <div class="tw-flex tw-justify-center tw-items-center">
            <div class="tw-w-full tw-max-w-md">
                <div class="tw-bg-white tw-shadow tw-rounded-lg tw-px-8 tw-py-8">
                    <h1 class="tw-text-2xl tw-font-semibold tw-text-center tw-mb-6">Login</h1>
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
                        <div class="tw-mb-4">
                            <button type="submit" class="tw-w-full tw-py-2 tw-bg-sky-500 tw-text-white tw-rounded-md tw-transition tw-duration-500 hover:tw-bg-[#1A237E]">Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>  
@endsection
