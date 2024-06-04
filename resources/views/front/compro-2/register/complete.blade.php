@extends('front.compro-2.layouts.default')
@include('front.compro-2.component.noauth')
@section('content')
<div class="tw-max-w-7xl tw-mx-auto">
    <div class="tw-bg-white tw-shadow-md tw-rounded-md tw-px-4 tw-py-4 tw-mb-4">
        <div class="tw-text-center">
            <h1 class="tw-text-2xl tw-font-bold tw-text-primary-color tw-mb-2">Pendaftaran Berhasil</h1>
            <p class="tw-text-sm tw-text-gray-500 tw-mb-4">Terima kasih telah mendaftar di website kami. Silahkan cek email anda untuk verifikasi akun.</p>
            <a href="{{ route('compro-2.daftar') }}" class="tw-bg-primary-color tw-text-white tw-py-2 tw-px-4 tw-rounded-md tw-inline-block">Kembali ke halaman utama</a>
        </div>
    </div>
</div>

@endsection