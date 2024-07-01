<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
  <!-- <link href="{{ asset('css/app1.css') }}" rel="stylesheet"> -->
    <style>
        body {
            background-color: #fafafa
        }
        .border {
            border-top: 3px solid #000;
        }
        .profile-wraper{
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            align-items: center;
            padding-top: 30px;
            padding-bottom: 30px;
        
        }
        .profile-wrapper img {
            width: 120px;
            height: 200px;
            object-fit: cover;
            object-position: center;
            border:  3px solid #000;
          
        }
    </style>
      <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="p-4">
    <!-- img -->
     
<!-- flex the kandidat -->

            <div class="border border-3 border-gray-800">
            </div>
           
            <div class="flex flex-wrap gap-10 justify-start px-10" style="padding-top: 20px; padding-bottom:20px">
                <div class="profile-wrapper">
                    @if ($kandidat->foto == null)
                    <img class="card-img-top img-fluid"
                     src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSGThxD2scluEhl1Ea8rzz5J9ew7I3NEBUq2g&s"
                     width="120" 
                            height="200" 
                        
                            alt="user"    
                     alt="Default Image"
                        style="object-fit:cover;  object-position: center;"
                        >
                    @else     
                            <img 
                            src="data:image/png;base64,<?php echo base64_encode(file_get_contents(base_path('public/upload/foto/thumb_'.$kandidat->foto))); ?>" 
                            onerror="this.src='{{ asset('images/placeholder-user.png') }}'"
                            width="120" 
                            height="200" 
                        
                            alt="user" 
                            style="object-fit:cover;  object-position: center;"
                        >
                    @endif
            </div>
            <div>

                <div>
    
                    <h4 class="mt-3 mb-0 font-semibold text-gray-900 font-sans text-2xl">{{ $kandidat->nama_lengkap }}</h4>
                    <h4 class="font-xl">( {{$kandidat->jenis_kelamin}} )</h4>
                </div>
                <!--  -->
                <div class="flex flex-wrap gap-10 mt-10">
                    <div>
                        <h3>Passpor</h3>
                        <h3 class="text-xs text-gray-600">{{$kandidat->paspor}}</h3>
                    </div>
                    <div>
                        <h3>Passpor no</h3>
                        <h3 class="text-xs text-gray-600">{{$kandidat->no_paspor}}</h3>
                    </div>
                    <div>
                        <h3>Tanggal pengeluaran</h3>
                        <h3 class="text-xs text-gray-600">{{$kandidat->tanggal_pengeluaran_paspor}}</h3>
                    </div>
                    
                </div>
            </div>
        </div>  
       
    <div class="border border-3 border-gray-800">
        </div>

        <div class="flex flex-wrap justify-start pt-10">
        <div class="flex w-full tw-justify-center items-center">
            <div class="w-1/3">
                <h3>Umur</h3>
                <h3 class="text-xs text-gray-600">{{$kandidat->usia}}</h3>
            </div>
            <div class="w-1/3">
                <h3>Jumlah anak</h3>
                <h3 class="text-xs text-gray-600">{{$kandidat->memiliki_anak ?? 'tidak memiliki anak'}}</h3>
            </div>
            <div class="w-1/3">
                <h3>Nama Ayah</h3>
                <h3 class="text-xs text-gray-600">{{$kandidat->nama_lengkap_ayah}}</h3>
            </div>
        </div>
        <div class="flex w-full tw-justify-center items-center py-10">
         <div class="w-1/3">
                <h3>Tanggal Lahir</h3>
                <h3 class="text-xs text-gray-600">{{$kandidat->tanggal_lahir}}</h3>
            </div>
            <div class="w-1/3">
                <h3>Agama</h3>
                <h3 class="text-xs text-gray-600">{{$kandidat->agama}}</h3>
            </div>
            <div class="w-1/3">
                <h3>Nama Ibu</h3>
                <h3 class="text-xs text-gray-600">{{$kandidat->nama_lengkap_ibu}}</h3>
            </div>
        </div>
        <div class="flex w-full tw-justify-start items-start pb-10">
        <div class="w-1/3">
                <h3>Tempat Lahir</h3>
                <h3 class="text-xs text-gray-600">{{$kandidat->tempat_lahir}}</h3>
            </div>
            <div class="w-1/3">
                <h3>Tinggi/berat badan</h3>
                <h3 class="text-xs text-gray-600">{{$kandidat->tinggi_badan}}/{{$kandidat->berat_badan}}</h3>
            </div>
        </div>

        </div>

        <!-- table -->
      
         <!-- <table>
            <thead>
                <tr>
                    <th>Beginner</th>
                    <th>⁠Medium</th>
                    <th>Advance</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            </tbody>
         </table> -->

         <div class="flex flex-wrap justify-start w-full pt-10">
            <div class="w-1/2 px-4">

            <ol class="relative border-s border-gray-600">
                @foreach ($kandidat->pengalamanKerja as $item)
                <li class="mb-10 ms-6">            
                    <span class="absolute flex items-center justify-center w-6 h-6 bg-gray-500 rounded-full -start-3 ring-4 ring-green-400">
                        <!-- counter -->
                        <span class="text-white">{{$loop->iteration}}</span>
                    </span>
                    <h3 class="flex items-center mb-1 text-base font-semibold text-gray-900">{{$item->negara_tempat_kerja}} | <span class="text-blue-500 font-normal"> {{ $item->tanggal_mulai_kerja ? \Carbon\Carbon::parse($item->tanggal_mulai_kerja)->format('Y') : '-' }} - {{ $item->tanggal_selesai_kerja ? \Carbon\Carbon::parse($item->tanggal_selesai_kerja)->format('Y') : '-' }} </span></h3>
                    <time class="block mb-2 text-sm font-normal leading-none text-blue-500">{{$item->nama_perusahaan}} | {{$item->posisi}}</time>
                    <p class="mb-4 text-base font-normal text-gray-500">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Adipisci nam dolore molestias cupiditate beatae animi temporibus cumque dignissimos vitae nobis!</p>
                r
                </li>    
                @endforeach  
            </ol>


            </div>
            <div></div>
         </div>
</body>
</html>