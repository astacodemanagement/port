<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CV</title>
    <link href="{{ public_path('css/app.css') }}" rel="stylesheet" type="text/css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
        }
        .header-table, .info-table {
            width: 100%;
            margin-bottom: 20px;
        }
        .section-title {
            @apply text-lg font-bold mb-2;
        }
        .work-experience {
            width: 100%;
            height: auto;
        }
        .timeline {
            width: 100%;
            height: 150px;
        }
    </style>
</head>
<body>
    <div class="container mx-auto p-6">
        <table class="header-table mb-4">
            <tr>
                <td rowspan="3"><img src="{{ public_path('path/to/your/profile-picture.jpg') }}" alt="Profile Picture" class="w-40 h-auto"></td>
                <td><strong>Andy Dulianto</strong></td>
            </tr>
            <tr>
                <td>Male</td>
            </tr>
            <tr>
                <td>
                    Passport No: 12345<br>
                    Date of Issue: 03 Jan 2010<br>
                    Date of Expiry: 03 Jan 2015<br>
                    Issuing Office: .....
                </td>
            </tr>
        </table>

        <table class="info-table mb-4">
            <tr>
                <td>Age: 30 yo</td>
                <td>Marital Status: Married</td>
                <td>Father Name: Kusnandar</td>
            </tr>
            <tr>
                <td>Date of Birth: 29 Jun 1997</td>
                <td>Religion: Islam</td>
                <td>Mother Name: Pujiati</td>
            </tr>
            <tr>
                <td>Place of Birth: Purwokerto</td>
                <td>Weight/Height: 80kg/178cm</td>
                <td></td>
            </tr>
            <tr>
                <td colspan="3">Language: English (Fluent)</td>
            </tr>
        </table>

        <div class="section mb-4">
            <div class="section-title">Work Experience</div>
            <img src="{{ public_path('path/to/your/work-experience-image.png') }}" alt="Work Experience" class="work-experience">
        </div>

        <div class="section mb-4">
            <div class="section-title">Education</div>
            <p><strong>Vocational High School | SMK N 1 Purwokerto</strong> - Major: Multimedia (2013 - 2015)</p>
            <p><strong>Bachelor Degree | Diponegoro University</strong> - Major: Computer Science (2015 - 2021)</p>
        </div>

        <div class="section">
            <div class="section-title">Timeline</div>
            <canvas id="timeline" class="timeline"></canvas>
        </div>
    </div>

    <script>
        const canvas = document.getElementById('timeline');
        const ctx = canvas.getContext('2d');

        // Your timeline drawing code here
        ctx.moveTo(0, 0);
        ctx.lineTo(canvas.width, canvas.height);
        ctx.stroke();

        // Convert canvas to image and replace the canvas with the image
        const dataURL = canvas.toDataURL();
        const img = new Image();
        img.src = dataURL;
        canvas.parentNode.replaceChild(img, canvas);
    </script>
</body>
</html>
