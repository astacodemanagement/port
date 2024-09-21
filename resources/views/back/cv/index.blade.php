    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <!-- <link href="{{ asset('css/app1.css') }}" rel="stylesheet"> -->



        <style>
            /* Styles for the table and its elements */
            table {
                width: 100%;
                border-collapse: collapse;
            }

            .bar {
                border: 1px solid #333;
                padding: 8px;
                font-family: Arial, sans-serif;
                font-size: 14px;
            
            }

            th {
                background-color: #000;
                color: #fff;
                font-weight: bold;
            }

            .checkbox-custom {
                width: 15px;
                height: 15px;
            }

            /* Custom padding based on the number of work experiences */
            .pt-64 {
                padding-top: 64px;
            }

            .pt-16 {
                padding-top: 16px;
            }

            .pt-500px {
                padding-top: 500px;
            }

            /* General text styling */
            .text-gray-600 {
                color: #4a4a4a;
            }

            .font-medium {
                font-weight: 500;
            }
        </style>

    </head>

    <body class="p-4 px-12">
        <div id="google_translate_element">
        <!-- img -->

        <!-- flex the kandidat -->
        <table style="width: 100%;">
            <thead>
                <tr>
                    <td rowspan="5">
                        @if ($kandidat->foto)
                        <img
                            src="data:image/png;base64,<?php echo base64_encode(file_get_contents(base_path('public/upload/foto/thumb_' . $kandidat->foto))); ?>"
                            onerror="this.src='{{ asset('images/placeholder-user.png') }}'"
                            width="150"
                            height="200"

                            alt="user"
                            style="object-fit:cover;  object-position: center;">
                        @else
                        <img class="card-img-top img-fluid"
                            src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSGThxD2scluEhl1Ea8rzz5J9ew7I3NEBUq2g&s"
                            width="150"
                            height="200"

                            alt="user"
                            alt="Default Image"
                            style="object-fit:cover;  object-position: center;">

                        @endif
                    </td>
                    <td style="font-size:2rem; font-weight: 700; width:100%;" colspan="3">{{ $kandidat->nama_lengkap }}</td>

                </tr>
                <tr>
                    <td style="font-size:1.2rem; ">( {{$kandidat->jenis_kelamin}} )</td>
                </tr>
                <tr style="padding:10px;">
                    <td style="padding-left:10px;  width:25%;">
                        <h4>Passpor</h4>
                        <p class="text-xs text-gray-600">{{$kandidat->paspor ?? "-" }}</p>
                    </td>
                    <td style="padding-left:10px; width:25%;">
                        <h4>Passpor no</h4>
                        <p class="text-xs text-gray-600">{{$kandidat->no_paspor ?? "-"}}</p>
                    </td>
                    <td style="width:25%; padding-left:t10px;">
                        <h4>production date</h4>
                        <p class="text-xs text-gray-600" clas>{{$kandidat->tanggal_pengeluaran_paspor ?? "- "}}</p>
                    </td>

                </tr>
                <tr>


                </tr>
                <tr>

                </tr>
            </thead>
        </table>

        <hr style="margin-top: 1rem; margin-bottom:1rem;">
        <table style="width: 100%; border-collapse: collapse;">

<!-- First Row -->
<tr>
    <td>
        <h4>Age</h4>
        <p class="text-xs text-gray-600">{{$kandidat->usia ?? '-'}}</p>
    </td>
    <td>
        <h4>Number of Children</h4>
        <p class="text-xs text-gray-600">{{$kandidat->memiliki_anak ?? 'no children'}}</p>
    </td>
    <td>
        <h4>Father's Name</h4>
        <p class="text-xs text-gray-600">{{$kandidat->nama_lengkap_ayah}}</p>
    </td>
</tr>

<!-- Second Row -->
<tr>
    <td>
        <h4>Date of Birth</h4>
        <p class="text-xs text-gray-600">{{$kandidat->tanggal_lahir}}</p>
    </td>
    <td>
        <h4>Religion</h4>
        <p class="text-xs text-gray-600">{{$kandidat->agama}}</p>
    </td>
    <td>
        <h4>Mother's Name</h4>
        <p class="text-xs text-gray-600">{{$kandidat->nama_lengkap_ibu}}</p>
    </td>
</tr>

<!-- Third Row -->
<tr>
    <td>
        <h4>Place of Birth</h4>
        <p class="text-xs text-gray-600">{{$kandidat->tempat_lahir}}</p>
    </td>
    <td>
        <h4>Height/Weight</h4>
        <p class="text-xs text-gray-600">{{$kandidat->tinggi_badan}}/{{$kandidat->berat_badan}}</p>
    </td>
    <td></td>
</tr>

</table>


        <!-- Border -->
        <div class="border border-3 border-gray-800"></div>


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
        <div class="{{ $class }}">
            <table>
                <thead>
                    <tr>
                        <th colspan="3">Personal Question</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="bar ">
                        <td class="bar ">Do you have kids?</td>
                        <td class="bar ">
                            <input type="checkbox" {{ $kandidat->screaning?->have_kids ? 'checked' : '' }} disabled class="checkbox-custom">
                            <span>yes</span>
                        </td>
                        <td class="bar ">
                            <input type="checkbox" {{ !$kandidat->screaning?->have_kids ? 'checked' : '' }} disabled class="checkbox-custom">
                            <span>no</span>
                        </td>
                    </tr>
                    <tr class="bar ">
                        <td class="bar ">How many kids do you have and how old are they?</td>
                        <td colspan="2" class="bar ">
                            <span>{{ $kandidat->screaning?->total_kids }} kids and age {{ $kandidat->screaning?->old_kids }}</span>
                        </td>
                    </tr>
                    <tr>
                        <td class="bar ">Are you willing to work abroad?</td>
                        <td class="bar ">
                            <input type="checkbox" {{ $kandidat->screaning?->willing_to_work ? 'checked' : '' }} disabled class="checkbox-custom">
                            <span>yes</span>
                        </td>
                        <td class="bar ">
                            <input type="checkbox" {{ !$kandidat->screaning?->willing_to_work ? 'checked' : '' }} disabled class="checkbox-custom">
                            <span>no</span>
                        </td>
                    </tr>
                    <tr class="bar ">
                        <td class="bar ">Are you willing to obey all the rules in your job?</td>
                        <td class="bar">
                            <input type="checkbox" {{ $kandidat->screaning?->willing_to_obey_rules ? 'checked' : '' }} disabled class="checkbox-custom">
                            <span>yes</span>
                        </td>
                        <td class="bar ">
                            <input type="checkbox" {{ !$kandidat->screaning?->willing_to_obey_rules ? 'checked' : '' }} disabled class="checkbox-custom">
                            <span>no</span>
                        </td>
                    </tr>
                    <tr class="bar ">
                        <td class="bar ">What motivation do you have for working abroad?</td>
                        <td class="bar " colspan="2"> 
                        
                            <span>{{$kandidat->screaning->motivation_work ?? "-"}}</span>
                        </td>
                        
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="pt-16">
            <table>
                <thead>
                    <tr class="bar ">
                        <th colspan="3">Health Question</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="bar ">
                        <td class="bar ">are you healthy??</td>
                        <td class="bar ">
                            <input type="checkbox" {{ $kandidat->screaning?->health ? 'checked' : '' }} disabled class="checkbox-custom">
                            <span>yes</span>
                        </td>
                        <td class="bar ">
                            <input type="checkbox" {{ !$kandidat->screaning?->health ? 'checked' : '' }} disabled class="checkbox-custom">
                            <span>no</span>
                        </td>
                    </tr>
                    <tr class="bar">
                        <td class="bar">Do you have any physical disability?</td>
                        <td class="bar">
                            <input type="checkbox" {{ $kandidat->screaning?->pyschical_disability ? 'checked' : '' }} disabled class="checkbox-custom">
                            <span>yes {{ $kandidat->screaning?->pyschical_disability_explain }}</span>
                        </td>
                        <td class="bar">
                            <input type="checkbox" {{ !$kandidat->screaning?->pyschical_disability ? 'checked' : '' }} disabled class="checkbox-custom">
                            <span>no</span>
                        </td>
                    </tr>
                    <tr class="bar">
                        <td class="bar">Do you suffer from any disease that requires medication?</td>
                        <td class="bar">
                            <input type="checkbox" {{ $kandidat->screaning?->disease ? 'checked' : '' }} disabled class="checkbox-custom">
                            <span>yes {{ $kandidat->screaning?->disease_explain }}</span>
                        </td>
                        <td class="bar">
                            <input type="checkbox" {{ !$kandidat->screaning?->disease ? 'checked' : '' }} disabled class="checkbox-custom">
                            <span>no</span>
                        </td>
                    </tr>
                    <tr class="bar">
                        <td class="bar">Are you pregnant?</td>
                        <td class="bar">
                            <input type="checkbox" {{ $kandidat->screaning?->pregnant ? 'checked' : '' }} disabled class="checkbox-custom">
                            <span>yes {{ $kandidat->screaning?->pregnant_explain }}</span>
                        </td>
                        <td class="bar">
                            <input type="checkbox" {{ !$kandidat->screaning?->pregnant ? 'checked' : '' }} disabled class="checkbox-custom">
                            <span>no</span>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <h5 class="pt-5">Declaration</h5>
        <div>
            <input type="checkbox" {{ $kandidat->screaning?->declaration ? 'checked' : '' }} disabled class="checkbox-custom">
            <span>I HEREBY THAT THE INFORMATION GIVEN IS COMPLETE AND ACCURATE TO THE BEST OF MY KNOWLEDGE. I AM AWARE THAT ANY MISREPRESENTATION OR MISSION OF FACTS IN MY APPLICATION WILL JUSTIFY THE DENIAL OF ADMISSION, THE CENCELATION OF ADMISSION OR EXPULSION.</span>
        </div>
    </div>
    </body>

    <!-- auto translate to english -->
    <script type="text/javascript">
        function googleTranslateElementInit() {
            new google.translate.TranslateElement({
                pageLanguage: 'id', 
                includedLanguages: 'en', 
                layout: google.translate.TranslateElement.InlineLayout.SIMPLE
            }, 'google_translate_element');
        }
    </script>
    <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
    </html>