@extends('back.layouts.app')
@section('content')


<div class="pcoded-content">

    <div class="page-header card">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="feather icon-list bg-c-blue"></i>
                    <div class="d-inline">
                        <h5>Pengaturan</h5>
                        <span>Silahkan kelola inputan data secara bijak !</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="page-header-breadcrumb">
                    <ul class=" breadcrumb breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="{{ route('back-office.home') }}"><i class="feather icon-home"></i></a>
                        </li>
                        <li class="breadcrumb-item"><a href="#!">Halaman Pengaturan</a>
                        </li>

                    </ul>
                </div>
            </div>
        </div>
    </div>
\
  <div class="container-fluid">
  @if ($errors->any())
<div class="alert alert-danger">
    <strong>Whoops!</strong> There were some problems with your input.<br><br>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
  </div>
    
    <div class="pcoded-inner-content">

        <div class="main-body">
            <div class="page-wrapper">

                <div class="page-body">
                    <div class="row">
                        <div class="col-sm-12">


                            <div class="card">
                                <div class="card-header">
                                    <h5>Pengaturan</h5>

                                </div>
                                <div class="card-block">
                                    <div class="card">
                                        <div class="card-block tab-icon">
                                            <div class="row">
                                                <div class="col-lg-12 col-xl-12">
                                                    <ul class="nav nav-tabs md-tabs " role="tablist">
                                                        <li class="nav-item">
                                                            <a class="nav-link active" data-toggle="tab" href="#home7"
                                                                role="tab"><i class="fas fa-home"></i>Putrasi</a>
                                                            <div class="slide"></div>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link" data-toggle="tab" href="#profile7"
                                                                role="tab"><i class="fas fa-bookmark"></i>Akama</a>
                                                            <div class="slide"></div>
                                                        </li>

                                                    </ul>

                                                    <div class="tab-content card-block">
                                                        <div class="tab-pane active" id="home7" role="tabpanel">
                                                            <div class="modal-content">
                                                                <div class="modal-body">
                                                                    <div class="card-block">
                                                                        <form  id="putrasi" 
                                                        action="/administrator/pengaturan/update"
                                                        method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        @method('PUT')
                                                                            <input type="hidden" name="compro" id="putrasi" value="1">
                                                                            <div class="form-group row">
                                                                                <div class="col-sm-12">
                                                                                    <label class="col-form-label" for="logo">Logo</label>
                                                                                    <input type="file" class="form-control mb-3" id="logo" name="logo">
                                                                                    <!-- preview img -->
                                                                                    @if(!is_null($putrasi) && !is_null($putrasi->logo))
                                                                                        <img src="{{ asset('upload/logo/' . $putrasi->logo) }}" alt="logo" class="img-thumbnail" style="width: 100px; height: 100px;">
                                                                                    @else
                                                                                        <img src="{{ asset('path/to/default/image.jpg') }}" alt="default logo" class="img-thumbnail" style="width: 100px; height: 100px;">
                                                                                    @endif
                                                                                  
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <div class="col-sm-6">
                                                                                    <label class="col-form-label" for="nama_perusahaan">Nama Perusahaan</label>
                                                                                    <input type="text" name="nama_perusahaan" class="form-control" value="{{$putrasi->nama_perusahaan ?? ''}}">
                                                                                </div>
                                                                                <div class="col-sm-6">
                                                                                    <label class="col-form-label" for="email">Email</label>
                                                                                    <input type="text" name="email" class="form-control" value="{{$putrasi->email ?? ''}}">
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <div class="col-sm-6">
                                                                                    <label class="col-form-label" for="alamat">Alamat</label>
                                                                                    <input type="text" name="alamat" class="form-control" value="{{$putrasi->alamat ?? ''}}">
                                                                                </div>
                                                                                <div class="col-sm-6">
                                                                                    <label class="col-form-label" for="telepon">Telepon</label>
                                                                                    <input type="text" name="telepon" class="form-control" value="{{$putrasi->telepon ?? ''}}">
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <div class="col-sm-4">
                                                                                    <label class="col-form-label" for="twitter">Twitter</label>
                                                                                    <input type="text" name="twitter" class="form-control" value="{{$putrasi->twitter ?? ''}}">
                                                                                </div>
                                                                                <div class="col-sm-4">
                                                                                    <label class="col-form-label" for="facebook">Facebook</label>
                                                                                    <input type="text" name="facebook" class="form-control" value="{{$putrasi->facebook ?? ''}}">
                                                                                </div>
                                                                                <div class="col-sm-4">
                                                                                    <label class="col-form-label" for="instagram">Instagram</label>
                                                                                    <input type="text" name="instagram" class="form-control" value="{{$putrasi->instagram ?? ''}}">
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <div class="col-sm-6">
                                                                                    <label class="col-form-label" for="youtube">YouTube</label>
                                                                                    <input type="text" name="youtube" class="form-control" value="{{$putrasi->youtube ?? ''}}">
                                                                                </div>
                                                                                <div class="col-sm-6">
                                                                                    <label class="col-form-label" for="footer">Footer</label>
                                                                                    <input type="text" name="footer" class="form-control" value="{{$putrasi->footer ?? ''}}">
                                                                                </div>
                                                                            </div>
                                                                            <a href="/administrator/Pengaturan" class="btn btn-warning waves-effect waves-light mt-3">
                                                                <i class="fas fa-undo"></i> Kembali
                                                            </a>

                                                            <button type="submit" class="btn btn-primary waves-effect waves-light mt-3" id="btn-save-putrasi" style="float: right;">
                                                                <i class="fas fa-save"></i> Simpan
                                                            </button>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="tab-pane" id="profile7" role="tabpanel">
                                                            <div class="modal-content">
                                                                <div class="modal-body">
                                                                    <div class="card-block">
                                                                        <form  id="akama"
                                                                    action="/administrator/pengaturan/update"
                                                        method="POST" enctype="multipart/form-data"

                                                                        >
                                                                        @csrf
                                                                        @method('PUT')
                                                                            <input type="hidden" name="compro" id="akama" value="2">
                                                                            <div class="form-group row">
                                                                                <div class="col-sm-12">
                                                                                    <label class="col-form-label" for="logo">logo</label>
                                                                                    <input type="file" class="form-control mb-3" id="logo" name="logo">
                                                                                    <!-- preview img -->
                                                                                    @if(!is_null($akama) && !is_null($akama->logo))
                                                                                        <img src="{{ asset('upload/logo/' . $akama->logo) }}" alt="logo" class="img-thumbnail" style="width: 150px; height: 100px;">
                                                                                    @else
                                                                                        <img src="{{ asset('path/to/default/image.jpg') }}" alt="default logo" class="img-thumbnail" style="width: 150px; height: 150px;">
                                                                                    @endif

                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <div class="col-sm-6">
                                                                                    <label class="col-form-label" for="nama_perusahaan">Nama Perusahaan</label>
                                                                                    <input type="text" name="nama_perusahaan" class="form-control" value="{{$akama->nama_perusahaan ?? ''}}">
                                                                                </div>
                                                                                <div class="col-sm-6">
                                                                                    <label class="col-form-label" for="email">Email</label>
                                                                                    <input type="text" name="email" class="form-control" value="{{$akama->email ?? ''}}">
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <div class="col-sm-6">
                                                                                    <label class="col-form-label" for="alamat">Alamat</label>
                                                                                    <input type="text" name="alamat" class="form-control" value="{{$akama->alamat ?? ''}}">
                                                                                </div>
                                                                                <div class="col-sm-6">
                                                                                    <label class="col-form-label" for="telepon">Telepon</label>
                                                                                    <input type="text" name="telepon" class="form-control" value="{{$akama->telepon ?? ''}}">
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <div class="col-sm-4">
                                                                                    <label class="col-form-label" for="twitter">Twitter</label>
                                                                                    <input type="text" name="twitter" class="form-control" value="{{$akama->twitter ?? ''}}">
                                                                                </div>
                                                                                <div class="col-sm-4">
                                                                                    <label class="col-form-label" for="facebook">Facebook</label>
                                                                                    <input type="text" name="facebook" class="form-control" value="{{$akama->facebook ?? ''}}">
                                                                                </div>
                                                                                <div class="col-sm-4">
                                                                                    <label class="col-form-label" for="instagram">Instagram</label>
                                                                                    <input type="text" name="instagram" class="form-control" value="{{$akama->instagram ?? ''}}">
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <div class="col-sm-6">
                                                                                    <label class="col-form-label" for="youtube">YouTube</label>
                                                                                    <input type="text" name="youtube" class="form-control" value="{{$akama->youtube ?? ''}}">
                                                                                </div>
                                                                                <div class="col-sm-6">
                                                                                    <label class="col-form-label" for="footer">Footer</label>
                                                                                    <input type="text" name="footer" class="form-control" value="{{$akama->footer ?? ''}}">
                                                                                </div>
                                                                            </div>
                                                                            <a href="/administrator/Pengaturan" class="btn btn-warning waves-effect waves-light mt-3">
                                                                <i class="fas fa-undo"></i> Kembali
                                                            </a>

                                                            <button type="submit" class="btn btn-primary waves-effect waves-light mt-3" id="btn-save-akama" style="float: right;">
                                                                <i class="fas fa-save"></i> Simpan
                                                            </button>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                    
                                                        </div>




                                                    </div>

                                                </div>
                                            </div>

                                        </div>
                                    </div>




                                </div>
                            </div>
                        </div>

                    </div>
                </div>

<!-- dispaly error validate -->

                @endsection
