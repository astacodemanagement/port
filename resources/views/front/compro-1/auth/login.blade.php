@extends('front.compro-1.layouts.app')

@section('content')
    <!-- Navbar -->
    <section class="Element-nav-items-search">
        <div class="container">
            @include('front.compro-1.layouts.navbar')
        </div>
    </section>
    <!-- #End -->
    
    {{-- <section class="section-content">
        <div class="login-area">
            <div class="container">
                <div class="row m-0">
                    <div class="col-12 mb-3">
                        <div class="input-group input-group-lg">
                            <input type="text" class="form-control" placeholder="Masukan Kata Kunci" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg">
                        </div>
                    </div>
                    <div class="col-12 mb-3">
                        <div class="input-group input-group-lg">
                            <input type="text" class="form-control" placeholder="Masukan Kata Kunci" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <button class="btn border-0 w-100">Search</button>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    {{-- <section class="section-login bg-light p-3 p-md-4 p-xl-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-9 col-lg-7 col-xl-6 col-xxl-5">
                    <div class="card border border-light-subtle rounded-4">
                        <div class="card-body p-5 p-md-4 p-xl-5">
                            <div class="row">
                                <div class="col-12">
                                    <div class="mb-5">
                                    <div class="text-center mb-4">
                                    </div>
                                    <h4 class="text-center">Welcome back you've been missed!</h4>
                                    </div>
                                </div>
                            </div>
                            <form action="#!">
                                <div class="row gy-3 overflow-hidden">
                                    <div class="col-12">
                                    <div class="form-floating mb-3">
                                        <input type="email" class="form-control" name="email" id="email" placeholder="name@example.com" required>
                                        <label for="email" class="form-label">Email</label>
                                    </div>
                                    </div>
                                    <div class="col-12">
                                    <div class="form-floating mb-3">
                                        <input type="password" class="form-control" name="password" id="password" value="" placeholder="Password" required>
                                        <label for="password" class="form-label">Password</label>
                                    </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" name="remember_me" id="remember_me">
                                            <label class="form-check-label text-secondary text-muted" for="remember_me">
                                                Keep me logged in
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="d-grid">
                                            <button class="btn bsb-btn-xl btn-primary" type="submit">Log in now</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <div class="row">
                                <div class="col-12">
                                    <hr class="mt-5 mb-4 border-secondary-subtle">
                                    <div class="d-flex gap-2 gap-md-4 flex-column flex-md-row justify-content-md-end">
                                        <a href="#!" class="link-secondary text-muted text-decoration-none">Create new account</a>
                                        <a href="#!" class="link-secondary text-muted text-decoration-none">Forgot password</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    <!-- Login 10 - Bootstrap Brain Component -->
    <section class="section-login bg-light py-5 py-md-5 py-xl-8">
        <div class="container">
            <div class="row justify-content-center">
            <div class="col-12 col-sm-10 col-md-8 col-lg-6 col-xl-5 col-xxl-4">
                <div class="mb-5">
                    <div class="text-center mb-4">
                        {{-- <a href="#!">
                        <img src="./assets/img/bsb-logo.svg" alt="BootstrapBrain Logo" width="175" height="57">
                        </a> --}}
                    </div>
                    <h4 class="text-center mb-4">Welcome back you've been missed!</h4>
                    <div class="text-center">
                        <a href="#!" class="btn bsb-btn-2xl btn-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-google" viewBox="0 0 16 16">
                            <path d="M15.545 6.558a9.42 9.42 0 0 1 .139 1.626c0 2.434-.87 4.492-2.384 5.885h.002C11.978 15.292 10.158 16 8 16A8 8 0 1 1 8 0a7.689 7.689 0 0 1 5.352 2.082l-2.284 2.284A4.347 4.347 0 0 0 8 3.166c-2.087 0-3.86 1.408-4.492 3.304a4.792 4.792 0 0 0 0 3.063h.003c.635 1.893 2.405 3.301 4.492 3.301 1.078 0 2.004-.276 2.722-.764h-.003a3.702 3.702 0 0 0 1.599-2.431H8v-3.08h7.545z" />
                        </svg>
                        <span class="ms-2 fs-6">Sign in with Google</span>
                        </a>
                    </div>
                </div>
                <div class="card border border-light-subtle rounded-4">
                <div class="card-body p-3 p-md-4 p-xl-5">
                    <form action="{{ route('front.jobs.login.store') }}" method="post">
                        @csrf
                        <p class="text-center mb-4">Or sign in using email</p>
                        <div class="row gy-3 overflow-hidden">
                            <div class="col-12">
                                <div class="form-floating mb-3">
                                    <input type="email" class="form-control" name="email" id="email" value="{{ old('email') }}" placeholder="name@example.com" required>
                                    <label for="email" class="form-label">Email</label>
                                </div>
                                @error('email')
                                    <small class="invalid-feedback text-danger" role="alert">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-12">
                                <div class="form-floating mb-3">
                                    <input type="password" class="form-control" name="password" id="password" value="" placeholder="Password" required>
                                    <label for="password" class="form-label">Password</label>
                                </div>
                                @error('password')
                                    <small class="invalid-feedback text-danger" role="alert">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" name="remember_me" id="remember_me">
                                    <label class="form-check-label text-muted" for="remember_me">
                                        Keep me logged in
                                    </label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="d-grid">
                                    <button class="btn btn-primary btn-lg btn-login mt-5" type="submit">Log in</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                </div>
                <div class="d-flex gap-2 gap-md-4 flex-column flex-md-row justify-content-md-center mt-4 text-center">
                    <a href="{{ route('register') }}" class="link-secondary text-muted text-decoration-none">Register SIPOOL</a>
                    <a href="#!" class="link-secondary text-muted text-decoration-none">Forgot password</a>
                </div>
            </div>
            </div>
        </div>
    </section>
    
@endsection

@push('css')
    <link rel="stylesheet" href="{{ asset('frontend/css/style.bundle.css') }}">
    <style>
        .Element-footer {
            width: 100%;
        }
        .section-content {
            margin-top: 120px
        }
        
        .section-login {
            padding-top: 150px !important;
            padding-bottom: 150px !important;
        }

        .login-area .container {
            background-color: var(--bg-src);
        }

        .btn.btn-login,.btn.btn-login:active:not(.btn-active),.btn.btn-login:focus:not(.btn-active),.btn.btn-login:hover:not(.btn-active) {
            background-color: var(--orange) !important;
            color: var(--text-w) !important;
        }
    </style>
@endpush

@push('script')
    <script>
        $(function(){
            $('form').on('submit', function(){
                $(this).find('.btn-login').prop('disabled', true).prepend(`<div class="spinner-border spinner-border-sm" role="status"></div> `)
            })
        })
    </script>
@endpush