
@php
    if (request()->host() == "putrasi.id"){
        $setting = App\Models\Setting::where('compro',1)->first();
    }    
    else{
        $setting = App\Models\Setting::where('compro',2)->first();
    }
@endphp
  
<footer class="footer-part bg-dark pt-9 pb-9">
    <div class="container">
        <div class="row justify-content-center justify-content-lg-start my-4">
            <div class="col-lg-6">
                <div class="text-center text-lg-start">
                    <p class="mb-0 mt-3 text-white">{{$setting->footer}}</p>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="text-center text-lg-end">
                    <a href="{{$setting->facebook}}" class="btn btn-light-dark btn-circle me-3" style="background-color: #3c485c">
                        <i class="fs-5 ti ti-brand-facebook text-white"></i>
                    </a>
                    <a href="{{$setting->instagram}}" class="btn btn-light-dark btn-circle me-3" style="background-color: #3c485c">
                        <i class="fs-5 ti ti-brand-instagram text-white"></i>
                    </a>
                    <a href="" class="btn btn-light-dark btn-circle me-3" style="background-color: #3c485c">
                        <i class="fs-5 ti ti-brand-linkedin text-white"></i>
                    </a>
                    <a href="{{$setting->twitter}}" class="btn btn-light-dark btn-circle" style="background-color: #3c485c">
                        <i class="fs-5 ti ti-brand-twitter text-white"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</footer>
