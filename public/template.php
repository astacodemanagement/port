<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: "Roboto", sans-serif;
            font-weight: 400;
            font-style: normal;
        }
        .container {
            padding-left: 4px;
            padding-right: 4px;
        }
        .card {
            border-radius: 12px;
            border: 1px solid #e5e7eb;
            background-color: white;
            padding: 1rem;
        }
        .heading {
            color: #1f2937;
            font-weight: 600;
            font-size: 1.5rem;
        }
        .text {
            color: #374151;
      
            font-weight: 400;
        }
        .btn {
            background-color: #f97316;
            border-radius: 9999px;
            color: white;
            padding: 8px 12px;
            margin-top: 10px;
            text-align: center;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="card">
   
            <a href="{{ route('front.home') }}">
                <img src="{{ asset('frontend') }}/assets/logo/logo.png" alt="">
        
            </a>

            <h2 class="heading">Akun Berhasil Dibuat!!</h2>
            <p class="text">Selamat, {{$nama_lengkap}}</p>
            <p class="text" style="margin-bottom: 20px;">Akun anda berhasil dibuat, tekan tombol di bawah ini untuk verifikasi akun</p>
            <a href="{{ route('register.verify-email', $token) }}" class="btn"><span style="color:white;">Verifikasi Akun</span></a>
        </div>
    </div>
</body>
</html>
