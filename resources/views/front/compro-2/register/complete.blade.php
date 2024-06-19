@extends('front.compro-2.layouts.default')
@include('front.compro-2.component.noauth')
@section('content')
<div class="tw-max-w-7xl tw-mx-auto tw-py-10">
    <div class="tw-bg-gray-50 tw-border     tw-border-gray-200 tw-rounded-md tw-px-4 tw-py-4 tw-mb-4">
        <div class="tw-text-center tw-flex tw-flex-col tw-justify-center tw-items-center tw-py-16" >
            <h1 class="tw-text-2xl tw-font-bold tw-text-primary-color tw-mb-2 ">Pendaftaran Berhasil</h1>
            <img src="{{ asset('frontend') }}/assets/image/complete.gif" alt="" class="tw-w-60 tw-h-60">
            <p class="tw-text-md tw-text-gray-500 tw-mb-4">Terima kasih telah mendaftar di website kami. Silahkan cek email anda untuk verifikasi akun.</p>
            <a href="/" class="tw-bg-sky-500 tw-text-white hover:tw-text-white hover:tw-scale-105 hover:tw-transition tw-duration-500   tw-py-2 tw-px-4 tw-rounded-md tw-inline-block">Kembali ke halaman utama</a>
        
       </div>
    </div>
</div>

@endsection