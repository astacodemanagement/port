<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CV Template</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            line-height: 1.5;
            margin: 20px;
            color: #333;
        }
        .header {
            text-align: center;
            margin-bottom: 15px;
            font-weight: bold;
        }
        .photo-container {
            text-align: center;
            margin-bottom: 15px;
        }
        .section-title {
            background-color: #000;
            color: #fff;
            padding: 5px 10px;
            font-weight: bold;
            margin-top: 15px;
            margin-bottom: 10px;
        }
        .info-list {
            margin-bottom: 15px;
        }
        .info-item {
            padding: 5px 0;
            border-bottom: 1px dotted #ccc;
        }
        .info-label {
            font-weight: bold;
            display: inline-block;
            width: 150px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 15px;
        }
        table, th, td {
            border: 1px solid #333;
        }
        th, td {
            padding: 6px;
            text-align: left;
            vertical-align: top;
        }
        .checkbox {
            width: 12px;
            height: 12px;
            border: 1px solid #000;
            display: inline-block;
            position: relative;
            margin-right: 5px;
        }
        .checkbox.checked:after {
            content: '✓';
            position: absolute;
            top: -3px;
            left: 1px;
        }
        .work-experience {
            margin-bottom: 15px;
        }
        .work-item {
            margin-bottom: 20px;
            padding-left: 15px;
            border-left: 1px solid #333;
            position: relative;
        }
        .work-item:before {
            content: "";
            position: absolute;
            left: -6px;
            top: 5px;
            width: 10px;
            height: 10px;
            background-color: #fff;
            border-radius: 50%;
            border: 1px solid #333;
        }
        .job-desc {
            margin-top: 5px;
            padding-left: 10px;
        }
        h1 {
            font-size: 18px;
            margin: 0 0 5px 0;
        }
        h2 {
            font-size: 16px;
            margin: 0 0 10px 0;
        }
        h3 {
            font-size: 14px;
            margin: 0 0 5px 0;
        }
        .declaration {
            margin-top: 15px;
            text-align: justify;
        }
    </style>
</head>
<body>
    <!-- Photo at the top center -->
    <div class="photo-container">
        @if ($kandidat->foto)
        <img src="data:image/png;base64,<?php echo base64_encode(file_get_contents(base_path('public/upload/foto/thumb_' . $kandidat->foto))); ?>" 
             onerror="this.src='{{ asset('images/placeholder-user.png') }}'"
             width="150" height="200" alt="user" style="object-fit:cover; object-position: center;">
        @else
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSGThxD2scluEhl1Ea8rzz5J9ew7I3NEBUq2g&s"
             width="150" height="200" alt="Default Image" style="object-fit:cover; object-position: center;">
        @endif
    </div>

    <!-- Header -->
    <div class="header">
        <h1>BIODATA APPLICANT</h1>
        <p>Sector Preferred: Hospitality / Domestic Worker / Construction / Etc</p>
        <p>Position Preferred: {{ $kandidat->posisi_dicari ?? '-' }}</p>
    </div>

    <!-- Personal Information -->
    <div class="section-title">Personal Information</div>
    <div class="info-list">
        <div class="info-item">
            <span class="info-label">Full Name:</span> {{ $kandidat->nama_lengkap }}
        </div>
        <div class="info-item">
            <span class="info-label">Gender:</span> {{ $kandidat->jenis_kelamin }}
        </div>
        <div class="info-item">
            <span class="info-label">Age:</span> {{ $kandidat->usia ?? '-' }}
        </div>
        <div class="info-item">
            <span class="info-label">Place and Date of Birth:</span> {{ $kandidat->tempat_lahir }}, {{ $kandidat->tanggal_lahir }}
        </div>
        <div class="info-item">
            <span class="info-label">Height/Weight:</span> {{ $kandidat->tinggi_badan ?? '-' }} CM / {{ $kandidat->berat_badan ?? '-' }} KG
        </div>
        <div class="info-item">
            <span class="info-label">Marital Status:</span> 
            @if(isset($kandidat->status_perkawinan))
                {{ $kandidat->status_perkawinan }}
            @else
                Single/Married/Divorce
            @endif
        </div>
        <div class="info-item">
            <span class="info-label">Religion:</span> {{ $kandidat->agama }}
        </div>
        <div class="info-item">
            <span class="info-label">Last Education:</span> {{ $kandidat->pendidikan_terakhir ?? 'Not specified' }}
        </div>
        <div class="info-item">
            <span class="info-label">English Level:</span> 
            @if($kandidat->screaning && isset($kandidat->screaning->english_level))
                {{ $kandidat->screaning->english_level }}
            @else
                Low/Medium/Professional
            @endif
        </div>
    </div>

    <!-- Travel Document -->
    <div class="section-title">Travel Document</div>
    <div class="info-list">
        <div class="info-item">
            <span class="info-label">Passport Number:</span> {{ $kandidat->no_paspor ?? '-' }}
        </div>
        <div class="info-item">
            <span class="info-label">Date Issued:</span> {{ $kandidat->tanggal_pengeluaran_paspor ?? '-' }}
        </div>
        <div class="info-item">
            <span class="info-label">Date Expiry:</span> {{ $kandidat->tanggal_habis_berlaku_paspor ?? '-' }}
        </div>
        <div class="info-item">
            <span class="info-label">Issuing Office:</span> {{ $kandidat->kantor_paspor ?? '-' }}
        </div>
    </div>

    <!-- Work Experience -->
    <div class="section-title">Work Experience</div>
    <div class="work-experience">
        @foreach ($kandidat->pengalamanKerja as $item)
        <div class="work-item">
            <div class="info-list" style="border: none;">
                <div class="info-item" style="border: none;">
                    <span class="info-label">Employer:</span> {{ $item->nama_perusahaan ?? '-' }}
                </div>
                <div class="info-item" style="border: none;">
                    <span class="info-label">Country:</span> {{ $item->negara_tempat_kerja ?? '-' }}
                </div>
                <div class="info-item" style="border: none;">
                    <span class="info-label">Position:</span> {{ $item->posisi ?? '-' }}
                </div>
                <div class="info-item" style="border: none;">
                    <span class="info-label">Start - End:</span> 
                    {{ $item->tanggal_mulai_kerja ? \Carbon\Carbon::parse($item->tanggal_mulai_kerja)->format('M Y') : '-' }} - 
                    {{ $item->tanggal_selesai_kerja ? \Carbon\Carbon::parse($item->tanggal_selesai_kerja)->format('M Y') : '-' }}
                </div>
            </div>
            <div class="job-desc">
                <strong>Job Description:</strong>
                @if($item->desc_pekerjaan)
                    {{ $item->desc_pekerjaan }}
                @else
                    Not provided
                @endif
            </div>
        </div>
        @endforeach
    </div>

    <!-- Pre-Screening -->
    <div class="section-title">Pre-Screening for Reference</div>
    
    <!-- Health Question -->
    <h3>Health Question</h3>
    <table>
        <tr>
            <td>How is your health?</td>
            <td>
                <span class="checkbox {{ $kandidat->screaning?->health ? 'checked' : '' }}"></span>Healthy
                <span class="checkbox {{ !$kandidat->screaning?->health ? 'checked' : '' }}"></span>No
            </td>
        </tr>
        <tr>
            <td>Do you have any physical disability?</td>
            <td>
                <span class="checkbox {{ $kandidat->screaning?->pyschical_disability ? 'checked' : '' }}"></span>Yes, please explain: {{ $kandidat->screaning?->pyschical_disability_explain ?? '' }}
                <span class="checkbox {{ !$kandidat->screaning?->pyschical_disability ? 'checked' : '' }}"></span>No
            </td>
        </tr>
        <tr>
            <td>Do you suffer from any disease that requires medication?</td>
            <td>
                <span class="checkbox {{ $kandidat->screaning?->disease ? 'checked' : '' }}"></span>Yes, please explain: {{ $kandidat->screaning?->disease_explain ?? '' }}
                <span class="checkbox {{ !$kandidat->screaning?->disease ? 'checked' : '' }}"></span>No
            </td>
        </tr>
        <tr>
            <td>Are you pregnant?</td>
            <td>
                <span class="checkbox {{ $kandidat->screaning?->pregnant ? 'checked' : '' }}"></span>Yes, please explain: {{ $kandidat->screaning?->pregnant_explain ?? '' }}
                <span class="checkbox {{ !$kandidat->screaning?->pregnant ? 'checked' : '' }}"></span>No
            </td>
        </tr>
    </table>

    <!-- Personal Question -->
    <h3>Personal Question</h3>
    <table>
        <tr>
            <td>Do you have kids?</td>
            <td>
                <span class="checkbox {{ $kandidat->screaning?->have_kids ? 'checked' : '' }}"></span>Yes
                <span class="checkbox {{ !$kandidat->screaning?->have_kids ? 'checked' : '' }}"></span>No
            </td>
        </tr>
        <tr>
            <td>How many kids do you have and how old are they?</td>
            <td>{{ $kandidat->screaning?->total_kids ?? '-' }} kids and age {{ $kandidat->screaning?->old_kids ?? '-' }}</td>
        </tr>
        <tr>
            <td>Are you prepared to commit to working abroad?</td>
            <td>
                <span class="checkbox {{ $kandidat->screaning?->willing_to_work ? 'checked' : '' }}"></span>Yes
                <span class="checkbox {{ !$kandidat->screaning?->willing_to_work ? 'checked' : '' }}"></span>No
            </td>
        </tr>
        <tr>
            <td>Do you have tattoos?</td>
            <td>
                <span class="checkbox {{ $kandidat->screaning?->tattoo ?? false ? 'checked' : '' }}"></span>Yes
                <span class="checkbox {{ !($kandidat->screaning?->tattoo ?? true) ? 'checked' : '' }}"></span>No
            </td>
        </tr>
        <tr>
            <td>Do you have any skill certificates as a reference?</td>
            <td>
                <span class="checkbox {{ $kandidat->screaning?->has_certificates ?? false ? 'checked' : '' }}"></span>Yes
                <span class="checkbox {{ !($kandidat->screaning?->has_certificates ?? true) ? 'checked' : '' }}"></span>No
            </td>
        </tr>
    </table>

    <!-- Declaration -->
    <div class="declaration">
        <span class="checkbox {{ $kandidat->screaning?->declaration ? 'checked' : '' }}"></span>
        I CONFIRM THAT THE INFORMATION PROVIDED IS TRUE AND COMPLETE. I UNDERSTAND THAT ANY FALSE STATEMENT OR OMISSION MAY RESULT IN DENIAL, CANCELLATION OF ADMISSION, OR EXPULSION.
    </div>
</body>
</html>