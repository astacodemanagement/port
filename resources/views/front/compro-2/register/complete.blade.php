@extends('front.compro-2.layouts.default')
@include('front.compro-2.component.noauth')
@section('content')
<div class="tw-max-w-7xl tw-mx-auto tw-py-10">
    <div class="tw-rounded-md tw-px-4 tw-py-4 tw-mb-4">
        <div class="tw-border-gray-100 tw-border-2 tw-rounded-lg tw-bg-gray-50 tw-text-center tw-flex tw-flex-col tw-justify-center tw-items-center tw-py-16" >
            <img src="{{ asset('frontend') }}/assets/image/complete.svg" alt="" class="tw-w-60 tw-h-60">
            <p class="tw-text-xl tw-font-semibold tw-mt-4 tw-text-sky-500 tw-mb-4">Silahkan cek email untuk verifikasi akun</p>
         
       
       </div>
    </div>
</div>

@endsection