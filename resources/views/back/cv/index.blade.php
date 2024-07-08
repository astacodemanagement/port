<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
  <!-- <link href="{{ asset('css/app1.css') }}" rel="stylesheet"> -->
    <style>
       
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
    <style>
    .checkbox-custom {
       
     
        width: 16px;
        height: 16px;
        border: 2px solid #4a5568; 
        border-radius: 4px; 
        outline: none;
        transition: 0.3s; 
    }


    .checkbox-custom:checked {
        background-color: #4a5568; 
        border-color: #4a5568;
    }


    .checkbox-custom:focus {
        box-shadow: 0 0 0 2px rgba(66, 153, 225, 0.5); 
    }
</style>
      <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="p-4 px-12">
    <!-- img -->
     
<!-- flex the kandidat -->

            <div class="border border-3 border-gray-800">
            </div>
           
            <div class="flex flex-wrap gap-10 justify-start px-10" style="padding-top: 20px; padding-bottom:20px">
                <div class="profile-wrapper">
                    @if ($kandidat->foto)
                    <img 
                            src="data:image/png;base64,<?php echo base64_encode(file_get_contents(base_path('public/upload/foto/thumb_'.$kandidat->foto))); ?>" 
                            onerror="this.src='{{ asset('images/placeholder-user.png') }}'"
                            width="120" 
                            height="200" 
                        
                            alt="user" 
                            style="object-fit:cover;  object-position: center;"
                        >
                        @else     
                        <img class="card-img-top img-fluid"
                         src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSGThxD2scluEhl1Ea8rzz5J9ew7I3NEBUq2g&s"
                         width="120" 
                                height="200" 
                            
                                alt="user"    
                         alt="Default Image"
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

        <div class="flex flex-wrap justify-around pt-10">
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
        <div class="flex w-full tw-justify-around items-start pb-10">
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

         <div class="flex flex-wrap justify-start w-full pt-10 pb-10">
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

         <!-- table screening -->
         @php
            $jumlahPengalamanKerja = count($kandidat->pengalamanKerja);
            $class = '';
            if ($jumlahPengalamanKerja == 1) {
                $class = 'pt-64';
            } elseif ($jumlahPengalamanKerja == 2) {
                $class = 'pt-16';
            }else{
                $class = 'pt-[500px]';
            }
        @endphp
          <div class="{{$class}}">
              <table class="w-full " >
                <thead class="bg-gray-500" >
                    <tr class="h-[50px] ">
                        <th colspan="3" class="text-start  font-mono border-2 border-gray-700 border-b-4 px-3" style="background-color: #000;">Personal Question</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="border border-gray-500 h-10 px-3 font-medium">Do you have kids?</td>
                        <td class="border border-gray-500 h-10 px-3 font-medium">
                         
                            <input type="checkbox" name="memiliki_anak" id="memiliki_anak" value="1" {{ $kandidat->screaning?->have_kids ? 'checked' : '' }} disabled class="w-4 h-4 checkbox-custom" >
                            <!-- label yes -->
                            <span class=" font-medium text-gray-600">yes</span>
                        </td>
                        <td class="border border-gray-500 h-10 px-3 font-medium">
                           
                            <input type="checkbox" name="memiliki_anak" id="memiliki_anak" value="0" {{ !$kandidat->screaning?->have_kids ? 'checked' : '' }} disabled class="w-4 h-4 checkbox-custom">
                            no
                        </td>
                    </tr>
                    <!-- How many kids do you have and how old are they? -->
                    <tr>
                        <td class="border border-gray-500 h-10 px-3 font-medium">How many kids do you have and how old are they?</td>
                        <td class="border border-gray-500 h-10 px-3 font-medium" colspan="2">
                            <span class="text-gray-600">{{$kandidat->screaning?->total_kids}} kids and age {{$kandidat->screaning?->old_kids}}</span>
                        </td>   
                    </tr>
                    <!-- Are you willing to work abroad -->
                    <tr>
                        <td class="border border-gray-500 h-10 px-3 font-medium">Are you willing to work abroad?</td>
                        <td class="border border-gray-500 h-10 px-3 font-medium">
                            <input type="checkbox" name="willing_to_work" id="willing_to_work" value="1" {{ $kandidat->screaning?->willing_to_work ? 'checked' : '' }} disabled class="w-4 h-4 checkbox-custom">
                            <!-- label yes -->
                            <span class=" font-medium text-gray-600">yes</span>
                        </td>
                        <td class="border border-gray-500 h-10 px-3 font-medium">
                            <input type="checkbox" name="willing_to_work" id="willing_to_work" value="0" {{ !$kandidat->screaning?->willing_to_work ? 'checked' : '' }} disabled class="w-4 h-4 checkbox-custom">
                            no
                        </td>
                        </tr>
                        <!-- Are you willing to obey all the rules in your job? -->
                        <tr>
                            <td class="border border-gray-500 h-10 px-3 font-medium">Are you willing to obey all the rules in your job?</td>
                            <td class="border border-gray-500 h-10 px-3 font-medium">
                                <input type="checkbox" name="willing_to_obey_rules" id="willing_to_obey_rules" value="1" {{ $kandidat->screaning?->willing_to_obey_rules ? 'checked' : '' }} disabled class="w-4 h-4 checkbox-custom">
                                <!-- label yes -->
                                <span class=" font-medium text-gray-600">yes</span>
                            </td>
                            <td class="border border-gray-500 h-10 px-3 font-medium">
                                <input type="checkbox" name="willing_to_obey_rules" id="willing_to_obey_rules" value="0" {{ !$kandidat->screaning?->willing_to_obey_rules ? 'checked' : '' }} disabled class="w-4 h-4 checkbox-custom">
                                no
                            </td>
                        </tr>
                        <!-- What motivation do you have for working abroad? -->
                        <tr>
                            <td class="border border-gray-500 h-10 px-3 font-medium">Are you willing to obey all the rules in your job?</td>
                            <td class="border border-gray-500 h-10 px-3 font-medium">
                                <input type="checkbox" name="motivation_work" id="motivation_work" value="1" {{ $kandidat->screaning?->motivation_work ? 'checked' : '' }} disabled class="w-4 h-4 checkbox-custom">
                                <!-- label yes -->
                                <span class=" font-medium text-gray-600">yes</span>
                            </td>
                            <td class="border border-gray-500 h-10 px-3 font-medium">
                                <input type="checkbox" name="motivation_work" id="motivation_work" value="0" {{ !$kandidat->screaning?->motivation_work ? 'checked' : '' }} disabled class="w-4 h-4 checkbox-custom">
                                no
                            </td>
                        </tr>
                </tbody>
              </table>
          </div>
          <!-- How is your health ? -->
            <div class="pt-16">
                <table class="w-full">
                    <thead class="bg-gray-500">
                        <tr class="h-[50px]">
                            <th colspan="3" class="text-start  font-mono border-2 border-gray-700 border-b-4 px-3" style="background-color: #000;">Health Question</th>
                        </tr>
                    </thead>
                    <tbody>
                    <!-- How is your health ? -->
                    <tr>
                        <td class="border border-gray-500 h-10 px-3 font-medium">How is your health ?</td>
                        <td class="border border-gray-500 h-10 px-3 font-medium">
                            <input type="checkbox" name="health" id="health" value="1" {{ $kandidat->screaning?->health ? 'checked' : '' }} disabled class="w-4 h-4 checkbox-custom">
                            <!-- label yes -->
                            <span class=" font-medium text-gray-600">Health</span>
                        </td>
                        <td class="border border-gray-500 h-10 px-3 font-medium">
                            <input type="checkbox" name="health" id="health" value="0" {{ !$kandidat->screaning?->health ? 'checked' : '' }} disabled class="w-4 h-4 checkbox-custom">
                            <span class=" font-medium text-gray-600">no</span>
                            
                        </td>
                        
                    </tr>
                    <!-- Do you have any physical disability ? -->
                    <tr>
                        <td class="border border-gray-500 h-10 px-3 font-medium">Do you have any physical disability ?</td>
                        <td class="border border-gray-500 h-10 px-3 font-medium">
                            <input type="checkbox" name="physical_disability" id="physical_disability" value="1" {{ $kandidat->screaning?->physical_disability ? 'checked' : '' }} disabled class="w-4 h-4 checkbox-custom">
                            <!-- label yes -->
                            <span class=" font-medium text-gray-600 text-sm" >yes {{$kandidat->screaning?->pyschical_disability_explain}}</span>
                        </td>
                        <td class="border border-gray-500 h-10 px-3 font-medium">
                            <input type="checkbox" name="physical_disability" id="physical_disability" value="0" {{ !$kandidat->screaning?->physical_disability ? 'checked' : '' }} disabled class="w-4 h-4 checkbox-custom">
                            <span class=" font-medium text-gray-600">no</span>
                        </td>
                        </tr>
                        <!-- Do you suffer from any disease that requires medication ? -->
                        <tr>
                            <td class="border border-gray-500 h-10 px-3 font-medium ">Do you suffer from any disease 
                                <br>that requires medication ?</td>
                            <td class="border border-gray-500 h-10 px-3 font-medium w-1/3">
                                <input type="checkbox" name="disease" id="disease" value="1" {{ $kandidat->screaning?->disease ? 'checked' : '' }} disabled class="w-4 h-4 checkbox-custom">
                                <!-- label yes -->
                                <span class=" font-medium text-gray-600 ">yes {{$kandidat->screaning?->disease_explain}}</span>
                            </td>
                            <td class="border border-gray-500 h-10 px-3 font-medium">
                                <input type="checkbox" name="disease" id="disease" value="0" {{ !$kandidat->screaning?->disease ? 'checked' : '' }} disabled class="w-4 h-4 checkbox-custom">
                                <span class=" font-medium text-gray-600">no</span>
                            </td>
                        </tr>
                        <!-- Are you pregnant ? -->
                        <tr>
                            <td class="border border-gray-500 h-10 px-3 font-medium">Are you pregnant ?</td>
                            <td class="border border-gray-500 h-10 px-3 font-medium">
                                <input type="checkbox" name="pregnant" id="pregnant" value="{{$kandidat->screaning?->pregnant}}" {{ $kandidat->screaning?->pregnant ? 'checked' : '' }} disabled class="w-4 h-4 checkbox-custom">
                                <!-- label yes -->
                                <span class=" font-medium text-gray-600">yes {{$kandidat->screaning?->pregnant_explain}}</span>
                            </td>
                            <td class="border border-gray-500 h-10 px-3 font-medium">
                                <input type="checkbox" name="pregnant" id="pregnant" value="0" {{ !$kandidat->screaning?->pregnant ? 'checked' : '' }} disabled class="w-4 h-4 checkbox-custom">
                                <span class=" font-medium text-gray-600">no</span>
                            </td>
                            </tr>   
                    </tbody>
                </table>
                <h5 class="text-gray-800 pt-5">Declaration</h5>
                <!-- checkbox dan kata kata -->
                <div class="flex flex-wrap gap-10 justify-start">
                    <div>
                        <input type="checkbox" name="declaration" id="declaration" value="{{$kandidat->screaning?->declaration}}" {{ $kandidat->screaning?->declaration ? 'checked' : '' }} disabled class="w-4 h-4 checkbox-custom">
                        <!-- label yes -->
                        <span class=" font-medium text-gray-600">I HEREBY THAT THE INFORMATION GIVEN IS COMPLETE AND ACCURATE TO THE BEST OF MY
KNOWLEDGE. I AM AWARE THAT ANY MISREPRESENTATION OR MISSION OF FACTS IN MY
APPLICATION WILL JUSTIFY THE DENIAL OF ADMISSION, THE CENCELATION OF ADMISSION OR
EXPULSION.</span>
                    </div>
                  
                    
            </div>
</body>
</html>