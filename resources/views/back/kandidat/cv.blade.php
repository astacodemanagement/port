<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
            border-radius: 5%;
        }
    </style>
</head>
<body>
    <div class="border">
    </div>
   
            <div>
       
        </div>
        <div style="padding-top: 20px; padding-bottom:20px">
            <div class="profile-wrapper">
                <div>

                    <img 
                        src="data:image/png;base64,<?php echo base64_encode(file_get_contents(base_path('public/upload/foto/thumb_'.$kandidat->foto))); ?>" 
                        onerror="this.src='{{ asset('images/placeholder-user.png') }}'"
                        width="120" 
                        height="200" 
                        class="rounded-circle" 
                        alt="user" 
                        style="object-fit:cover;  object-position: center;"
                    >
                </div>
                
                <div>
                    <h4 class="mt-3 mb-0">{{ $kandidat->nama_lengkap }}</h4>
                </div>
            </div>
        </div>

    
    
    <div class="border">
    </div>

     <script>

    document.body.innerHTML = document.body.innerHTML.toUpperCase();
    </script>
</body>
</html>