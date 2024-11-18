@extends('front.member.layouts.app')

@section('title', 'Pengaduan')

@section('content')
<div class="row">
@include('front.member.layouts.profile-info')
<!-- toast succes-->
<div class="col-md-9">
    

    <div class="card">
        <div class="card-body">
            <h4 class="card-title text-center tw-text-2xl">Pengaduan</h4>
            <h5 class="text-center tw-text-gray-600">Silahkan Isi Formulir Berikut Dengan Benar</h5>
            <form action="{{ route('member.pengaduan.store') }}" method="post" enctype="multipart/form-data">
                @csrf
               
                <input type="hidden" name="kandidat_id" value="{{ auth()->user()->kandidat->id }}">
                 
              <div class="tw-mt-10 row">

              
                  <div class="col-sm-6">
                      <label for="Subjek" class="col-form-label">Subjek</label>
                      <input type="text" class="form-control" id="Subjek" name="subjek" required>
                  </div>
               
                  <!-- gambar -->
                  
                  <div class="col-sm-6">
                            <label for="gambar" class="col-form-label">Gambar</label>
                            <input type="file" class="form-control" id="gambar" name="gambar" required>
                        </div>
              </div>    
               
                <div class="tw-mt-10 row">
                    <div class="col-sm-6">
                        <label for="Pesan" class="col-form-label">Pesan</label>
                        <textarea class="form-control" id="Pesan" name="isi" rows="11" required></textarea>
                    </div>
                    <!-- preview -->
                    <div class="col-sm-6">
                    <label for="Pesan" class="col-form-label">Preview Image</label>
                        <div class=" tw-border-2 tw-border-gray-200 tw-rounded-md tw-h-[250px]">
                            <img id="preview" class="img-fluid tw-h-full tw-w-full tw-object-cover " src="/images/no-image.png"  alt="">
                        </div>
                    </div> 
                    
                <!-- btn submit -->
                <div class="tw-mt-10 row">
                    <div class="col-sm-12">
                        <button type="submit" class="btn btn-primary">Kirim</button>
                    </div>
                </div>
</form>

        </div>
    </div>
</div>
    
</div>
<script>
    document.getElementById('gambar').onchange = function () {
        var ext = this.value.match(/\.([^\.]+)$/)[1];
        switch (ext) {
            case 'jpg':
            case 'jpeg':
            case 'png':
                break;
            default:
                alert('Hanya file JPG, JPEG, PNG yang diizinkan');
                this.value = '';
        }

        var reader = new FileReader();
        reader.onload = function (e) {
            document.getElementById('preview').src = e.target.result;
        };
        reader.readAsDataURL(this.files[0]);
    };
</script>
<!-- swal cdn and cetch from succes redirect -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
@if (session('success'))
<script>
    Swal.fire({
        icon: 'success',
        title: 'Berhasil',
        text: '{{ session('success') }}',
        showConfirmButton: false,
        timer: 2000
    });
</script>
@endif
@endsection
