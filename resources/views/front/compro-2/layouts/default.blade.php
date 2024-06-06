<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>test</title>
  <link href="https://fonts.googleapis.com/css2?family=Clash+Display:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<link rel="stylesheet" href="{{ asset('frontend') }}/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('frontend') }}/css/bootstrap-datepicker.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
   
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.rtl.min.css" />

<link href="https://fonts.googleapis.com/css2?family=Caveat:wght@400..700&family=Work+Sans:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
   <script src="https://cdn.tailwindcss.com"></script>
    <script>
      tailwind.config = {
        prefix: 'tw-',
        theme: {
          extend: {
            fontFamily: {
        'clash-display': ['Clash Display', 'sans-serif'],
        'caveat': ['Caveat', 'sans-serif'],
        'work-sans': ['Work Sans', 'sans-serif'],
      },
            colors: {
              clifford: '#da373d',
            }
          }
        }
      }
    </script>
  <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.10.0/css/bootstrap-datepicker.min.css" integrity="sha512-34s5cpvaNG3BknEWSuOncX28vz97bRI59UnVtEEpFX536A7BtZSJHsDyFoCl8S7Dt2TPzcrCEoHBGeM4SUBDBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <link href="
https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css
" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <style>
    .splide__slide{
      display: flex;
    justify-content: center;
    align-items: center;
    }
        .splide__slide img {
  width: 100%;
  height: 400px;
  background-position:center;
  background-size: cover; 
  padding: 2rem;
  border-radius: 10px;
  margin-top: 4rem;
}
/*remove padding in mobile  */
@media (max-width: 767px) {
  .splide__slide img {
    padding: 1rem;
  }
}

.carousel-image {
    display: block;
    margin: 0 auto;
    border-radius: 15px; 
    max-width: 100%;
    height: auto;
}
.job-section{
  padding: 56px, 120px, 56px, 120px;
  border-radius: 32px, 32px, 0px, 0px;
  gap: 100px;
}
.search-bar {
  display: flex;
  align-items: center;
  gap: 16px;
}

.flag-dropdown {
  display: flex;
  align-items: center;
  gap: 8px;
  padding: 8px 12px;
  border-radius: 4px;
  background-color: #fff;
  box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1);
  cursor: pointer;
}

.flag-dropdown img {
  width: 24px;
  height: 16px;
}

.search-input {
  display: flex;
  align-items: center;
  gap: 8px;
  padding: 8px 12px;
  border-radius: 4px;
  background-color: #fff;
  box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1);
  flex: 1;
}

.search-input input {
  border: none;
  outline: none;
  font-size: 16px;
  color: #606060;
}

.filter-button {
  display: flex;
  align-items: center;
  gap: 8px;
  padding: 8px 12px;
  border-radius: 4px;
  background-color: #fff;
  box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1);
  cursor: pointer;
}

.search-button {
  padding: 8px 16px;
  border-radius: 4px;
  background-color: #1976D2;
  color: #fff;
  font-weight: bold;
  border: none;
  cursor: pointer;
}
.tw-bg-custom {
            background-color: #FAFAFA;
        }
        .tw-text-custom {
            color: #52525B;
        }
        .tw-border-custom {
            border-color: #38BDF8;
        }
        <style>
    @media (max-width: 767px) {

        .tw-right-0.sm\:tw-flex {
            display: none;
        }

        .tw-hidden.sm\:tw-block {
            display: block;
        }


        #mobile-menu {
            transition: all 3s ease;
        }
    }
    #mobile-menu{
      transition:1s,
    }
</style>

  </style>
</head>
<body>
  {{-- navbar --}}
  
  
  

  @yield('content')
  <section class="tw-bg-[#154565] tw-w-full">

    <footer class="tw-max-w-7xl tw-mx-auto ">
        <div class="tw-p-6 mx-auto">
            <div class="tw-lg:flex">
               
    
                <div class="tw-mt-6 lg:mt-0 lg:flex-1">
                    <div class="tw-grid tw-grid-cols-1 tw-gap-6 sm:tw-grid-cols-2 md:tw-grid-cols-3 lg:tw-grid-cols-5   ">
                        <div>
                            <a href="#" class="tw-bg-white">
                                <div class="tw-bg-white tw-w-2/3 h-full tw-p-2 tw-rounded-md">
                                    <img class="tw-w-full tw-h-10" src="{{ asset('frontend') }}/assets/image/akamalogo.png" alt="">
                                </div>
                            </a>
                        </div>
                        <div class="">
                            <h3 class="tw-text-lg tw-text-white tw-font-work-sans tw-font-bold  ">Produk dan Layanan</h3>
                            <a href="#" class="tw-block tw-mt-2 tw-text-sm tw-text-[#D4D4D8]  tw-hover:tw-underline">Worker </a>
                            <a href="#" class="tw-block tw-mt-2 tw-text-sm tw-text-[#D4D4D8]  tw-hover:tw-underline">Employer</a>
                        </div>
    
                        <div>
                            <h3 class="tw-text-lg tw-text-white tw-font-work-sans tw-font-bold  ">Perusahaan</h3>
                            <a href="#" class="tw-block tw-mt-2 tw-text-sm tw-text-[#D4D4D8]  tw-hover:tw-underline">Tentang Kami</a>
                            <a href="#" class="tw-block tw-mt-2 tw-text-sm tw-text-[#D4D4D8]  tw-hover:tw-underline">Alamat Kami</a>
                            <a href="#" class="tw-block tw-mt-2 tw-text-sm tw-text-[#D4D4D8]  tw-hover:tw-underline">Faq</a>
                            <a href="#" class="tw-block tw-mt-2 tw-text-sm tw-text-[#D4D4D8]  tw-hover:tw-underline">Galeri</a>


                        </div>
    
                        <div>
                            <h3 class="tw-text-lg tw-text-white tw-font-work-sans tw-font-bold  ">Lainnya</h3>
                            <a href="#" class="tw-block tw-mt-2 tw-text-sm tw-text-[#D4D4D8]  tw-hover:tw-underline">Kebijakan Privasi</a>
                            <a href="#" class="tw-block tw-mt-2 tw-text-sm tw-text-[#D4D4D8]  tw-hover:tw-underline">Syarat & Ketentuan</a>
                        </div>
    
                        <div>
                            <h3 class="tw-text-lg tw-text-white tw-font-work-sans tw-font-bold  ">Get Job Notification</h3>
                            <span class="tw-block tw-mt-2 tw-text-sm tw-text-[#D4D4D8]  tw-hover:tw-underline tw-mb-5">The latest job news, articles, sent to your inbox weekly.</span>
                            <input type="email" class="tw-w-full tw-py-2 tw-px-4 tw-border tw-border-gray-300 tw-rounded-md tw-shadow-sm tw-placeholder-gray-400 tw-focus:tw-outline-none tw-focus:tw-ring-1 tw-focus:tw-ring-blue-500 tw-focus:tw-border-blue-500" placeholder="Enter your email address">
                            <button class="tw-mt-4 tw-py-2 tw-px-4 tw-bg-sky-500 tw-text-white tw-font-semibold tw-rounded-md tw-shadow-sm hover:tw-bg-blue-600">Subscribe</button>
                        </div>
                    </div>
                </div>
            </div>
    
            <hr class="tw-h-px tw-my-6 tw-bg-gray-200 tw-border-none ">
    
            <div>
                <p class="tw-text-start tw-text-[#D4D4D8]">© Brand 2020 - All rights reserved</p>
            </div>
        </div>
    </footer>
</section>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.10.0/js/bootstrap-datepicker.min.js"
integrity="sha512-LsnSViqQyaXpD4mBBdRYeP6sRwJiJveh2ZIbW41EBrNmKxgr/LFZIiWT6yr+nycvhvauz8c2nYMhrP80YhG7Cw=="
crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="{{ asset('frontend') }}/js/moment-duration-format.min.js"
integrity="sha512-ej3mVbjyGQoZGS3JkES4ewdpjD8UBxHRGW+MN5j7lg3aGQ0k170sFCj5QJVCFghZRCio7DEmyi+8/HAwmwWWiA=="
crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js" defer></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
</body>
</html>