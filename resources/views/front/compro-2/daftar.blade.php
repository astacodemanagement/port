@extends('front.compro-2.layouts.default')
@include('front.compro-2.component.noauth')
@section('content')
    <div class="relative">
        <!-- Gambar sebagai latar belakang -->
        <div class="tw-h-[230px] tw-bg-gradient-to-t tw-from-sky-400 tw-to-sky-600 tw-relative">
            <img src="{{ asset('frontend') }}/assets/image/bg-form.png " alt="" class="tw-absolute tw-inset-0 tw-w-full tw-h-full tw-object-cover">
            <div class="tw-absolute tw-inset-0 tw-flex tw-flex-col tw-items-center tw-justify-center">
                <h3 class="tw-text-white tw-text-center tw-pt-10 tw-font-caveat tw-text-5xl tw-font-bold">Form</h3>
                <h3 class="tw-text-white tw-text-center tw-text-6xl tw-mt-1 tw-font-semibold tw-mb-16 tw-font-clash-display">Pendaftaran</h3>
            </div>
        </div>
    </div>
    <div class="tw-flex tw-flex-row tw-justify-between tw-max-w-7xl tw-mx-auto tw-py-20">
        <!-- Stepper -->
        <div class="tw-w-1/4 tw-relative">
            <div class="tw-flex tw-flex-col tw-items-center ">
            
                <div class="tw-relative  tw-w-full">
                    <div class="tw-h-16 tw-p-5  tw-w-16  tw-flex tw-items-center tw-justify-center tw-bg-sky-500  tw-rounded-xl">
                        <span class="tw-text-white tw-text-2xl tw-font-extrabold">1</span>
                    </div>
                     <div class="tw-relative tw-mx-auto tw-mr-1">
                        <img src="{{ asset('frontend') }}/assets/image/framestriped.png " alt="" class="">
           
                     </div>
                    
                    
                    <div class="tw-absolute tw-top-1 tw-left-1/3 tw-text-2xl tw-font-bold tw-text-sky-500">
                        <h3>Step 1</h3>
                        <p class="tw-text-sm tw-font-normal tw-text-gray-500">Minat Dan Informasi Pribadi</p>
                    </div>
                    
                </div>
                <div class="tw-relative  tw-w-full">
                    <div class="tw-h-16 tw-p-5  tw-w-16  tw-flex tw-items-center tw-justify-center tw-bg-sky-500  tw-rounded-xl">
                        <span class="tw-text-white tw-text-2xl tw-font-extrabold">2</span>
                    </div>
                     <div class="tw-relative tw-mx-auto tw-mr-1">
                        <img src="{{ asset('frontend') }}/assets/image/framestriped.png " alt="" class="">
           
                     </div>
                    
                    
                    <div class="tw-absolute tw-top-1 tw-left-1/3 tw-text-2xl tw-font-bold tw-text-sky-500">
                        <h3>Step 2</h3>
                        <p class="tw-text-sm tw-font-normal tw-text-gray-500">Dokumen Perjalanan Luar Negeri</p>
                    </div>
                    
                </div>
                <div class="tw-relative  tw-w-full">
                    <div class="tw-h-16 tw-p-5  tw-w-16  tw-flex tw-items-center tw-justify-center tw-bg-sky-500  tw-rounded-xl">
                        <span class="tw-text-white tw-text-2xl tw-font-extrabold">3</span>
                    </div>
                     <div class="tw-relative tw-mx-auto tw-mr-1">
                        <img src="{{ asset('frontend') }}/assets/image/framestriped.png " alt="" class="">
           
                     </div>
                    
                    
                    <div class="tw-absolute tw-top-1 tw-left-1/3 tw-text-2xl tw-font-bold tw-text-sky-500">
                        <h3>Step 3</h3>
                        <p class="tw-text-sm tw-font-normal tw-text-gray-500">Pengalaman Kerja</p>
                    </div>
                    
                </div>
                <div class="tw-relative  tw-w-full">
                    <div class="tw-h-16 tw-p-5  tw-w-16  tw-flex tw-items-center tw-justify-center tw-bg-sky-500  tw-rounded-xl">
                        <span class="tw-text-white tw-text-2xl tw-font-extrabold">1</span>
                    </div>
                     <div class="tw-relative tw-mx-auto tw-mr-1">
                        <img src="{{ asset('frontend') }}/assets/image/framestriped.png " alt="" class="">
           
                     </div>
                    
                    
                    <div class="tw-absolute tw-top-1 tw-left-1/3 tw-text-2xl tw-font-bold tw-text-sky-500">
                        <h3>Step 4</h3>
                        <p class="tw-text-sm tw-font-normal tw-text-gray-500">Pengalaman Kerja</p>
                    </div>
                    
                </div>
                <div class="tw-relative  tw-w-full">
                    <div class="tw-h-16 tw-p-5  tw-w-16  tw-flex tw-items-center tw-justify-center tw-bg-sky-500  tw-rounded-xl">
                        <span class="tw-text-white tw-text-2xl tw-font-extrabold">5</span>
                    </div>
                     <div class="tw-relative tw-mx-auto tw-mr-1">
                        <img src="{{ asset('frontend') }}/assets/image/framestriped.png " alt="" class="">
           
                     </div>
                    
                    
                    <div class="tw-absolute tw-top-1 tw-left-1/3 tw-text-2xl tw-font-bold tw-text-sky-500">
                        <h3>Step 5</h3>
                        <p class="tw-text-sm tw-font-normal tw-text-gray-500">Ceklis Dokumen Pribadi</p>
                    </div>
                    
                </div>
                <div class="tw-relative  tw-w-full">
                    <div class="tw-h-16 tw-p-5  tw-w-16  tw-flex tw-items-center tw-justify-center tw-bg-sky-500  tw-rounded-xl">
                        <span class="tw-text-white tw-text-2xl tw-font-extrabold">6</span>
                    </div>
                     <div class="tw-relative tw-mx-auto tw-mr-1">
                        <img src="{{ asset('frontend') }}/assets/image/framestriped.png " alt="" class="">
           
                     </div>
                    
                    
                    <div class="tw-absolute tw-top-1 tw-left-1/3 tw-text-2xl tw-font-bold tw-text-sky-500">
                        <h3>Step 6</h3>
                        <p class="tw-text-sm tw-font-normal tw-text-gray-500">Upload Dokumen</p>
                    </div>
                    
                </div>
                <div class="tw-relative  tw-w-full">
                    <div class="tw-h-16 tw-p-5  tw-w-16  tw-flex tw-items-center tw-justify-center tw-bg-sky-500  tw-rounded-xl">
                        <span class="tw-text-white tw-text-2xl tw-font-extrabold">7</span>
                    </div>
                   
                    
                    <div class="tw-absolute tw-top-1 tw-left-1/3 tw-text-2xl tw-font-bold tw-text-sky-500">
                        <h3>Step 1</h3>
                        <p class="tw-text-sm tw-font-normal tw-text-gray-500">Kontak Akun</p>
                    </div>
                    
                </div>
            </div>
        </div>
        
        
        
        <!-- Form -->
        <div class="tw-flex tw-flex-col tw-w-2/3">
            <label for="" class="tw-text-gray-800 tw-font-medium tw-mb-3 tw-font-work-sans">Minat</label>
            <select name="" id="" class="tw-font-work-sans tw-mb-4 tw-p-3 tw-border tw-px-3 tw-border-gray-300 tw-bg-white tw-text-gray-600 tw-rounded-md">
                <option value="" readonly>Industri Yang Diminati</option>
            </select>
            <label for="" class="tw-text-gray-800 tw-font-medium tw-mb-3 tw-font-work-sans">Informasi Pribadi</label>
            <input type="text" placeholder="Nomor E-KTP (NIK)" class=" tw-font-work-sans tw-font-medium tw-mb-4 tw-p-2 tw-border tw-border-gray-300 tw-rounded-md">
            <input type="text" placeholder="Nama Lengkap" class=" tw-font-work-sans tw-font-medium tw-mb-4 tw-p-2 tw-border tw-border-gray-300 tw-rounded-md">
           
            <div class="tw-flex tw-justify-between tw-gap-5">
                <input type="text" placeholder="Tempat Lahir" class="tw-w-1/2 tw-font-work-sans tw-font-medium tw-mb-4 tw-p-2 tw-border tw-border-gray-300 tw-rounded-md">
                <input type="text" placeholder="Tanggal Lahir" class="tw-w-1/2 tw-font-work-sans tw-font-medium tw-mb-4 tw-p-2 tw-border tw-border-gray-300 tw-rounded-md">
            </div>  
            <select name="" id="" class="tw-font-work-sans tw-text-gray-600 tw-bg-white tw-mb-4 tw-p-3 tw-border tw-px-3 tw-border-gray-300 tw-rounded-md">
                <option value="">Agama</option>
            </select>
            <div class="tw-flex tw-justify-between tw-gap-5">
                <input type="number" placeholder="Berat Badan" class="tw-w-1/2 tw-font-work-sans tw-font-medium tw-mb-4 tw-p-2 tw-border tw-border-gray-300 tw-rounded-md">
                <input type="number" placeholder="Tinggi Badan" class="tw-w-1/2 tw-font-work-sans tw-font-medium tw-mb-4 tw-p-2 tw-border tw-border-gray-300 tw-rounded-md">
            </div> 
            <select name="" id="" class="tw-font-work-sans tw-text-gray-600 tw-bg-white tw-mb-4 tw-p-3 tw-border tw-px-3 tw-border-gray-300 tw-rounded-md">
                <option value="">Jenis Kelamin</option>
            </select>
            <select name="" id="" class="tw-text-gray-600 tw-bg-white tw-mb-4 tw-p-3 tw-border tw-px-3 tw-border-gray-300 tw-rounded-md">
                <option value="">Status Kawin</option>
            </select>
            <input type="text" placeholder="Nama Lengkap ayah" class=" tw-font-work-sans tw-font-medium tw-mb-4 tw-p-2 tw-border tw-border-gray-300 tw-rounded-md">
            <input type="text" placeholder="Nama Lengkap Ibu" class=" tw-font-work-sans tw-font-medium tw-mb-4 tw-p-2 tw-border tw-border-gray-300 tw-rounded-md">
            <textarea placeholder="Alamat" class="tw-p-2 tw-border tw-border-gray-300   tw-mb-4 tw-rounded-md"></textarea>
            <select name="" id="" class="tw-font-work-sans tw-text-gray-600 tw-bg-white tw-mb-4 tw-p-3 tw-border tw-px-3 tw-border-gray-300 tw-rounded-md">
                <option value="">Provinsi</option>
            </select>
            <select name="" id="" class="tw-font-work-sans tw-text-gray-600 tw-bg-white tw-mb-4 tw-p-3 tw-border tw-px-3 tw-border-gray-300 tw-rounded-md">
                <option value="">Kota Kabupaten</option>
            </select>
            {{-- button kirim --}}
            <button class="tw-py-2 tw-px-5 tw-text-white tw-w-20 tw-bg-sky-500 tw-rounded-md">Kirim</button>
        </div>
    </div>
@endsection
