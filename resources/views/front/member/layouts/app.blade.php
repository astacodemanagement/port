<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Title -->
    <title>Job Seeker | @yield('title', 'Halaman Pencari Kerja')</title>
    <!-- Required Meta Tag -->
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="handheldfriendly" content="true" />
    <meta name="MobileOptimized" content="width" />
    <meta name="description" content="Mordenize" />
    <meta name="author" content="" />
    <meta name="keywords" content="Mordenize" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="shortcut icon" type="image/png" href="{{ asset('member-template/images/logos/favicon.ico') }}" />
    {{-- <link id="themeColors" rel="stylesheet" href="{{ asset('member-template/css/style-compro-1.css') }}" /> --}}
    @include(partialCompro('member.theme-colors'))
  <link href="{{ asset('css/app1.css') }}" rel="stylesheet">

    <style>
        body {
            background-color: #fafafa
        }

        @media (min-width: 1300px) {
            #main-wrapper[data-layout=horizontal][data-sidebar-position=fixed] .body-wrapper>.container-fluid {
                padding-top: 115px !important
            }

            #main-wrapper[data-layout=horizontal] .body-wrapper>.container-fluid,
            #main-wrapper[data-layout=horizontal] .navbar {
                max-width: 1500px
            }

            footer .container {
                max-width: 1450px !important
            }
        }

        .fw-7 {
            font-weight: 700
        }
    </style>
    @stack('css')
</head>

<body>
    <!-- Preloader -->
    <div class="preloader">
        <img src="{{ asset('member-template/images/logos/favicon.ico') }}" alt="loader"
            class="lds-ripple img-fluid" />
    </div>
    <!-- Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="horizontal" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        <!-- Header Start -->
        @include(partialCompro('member.header'))
        <!-- Header End -->
        <!-- Sidebar Start -->
        <aside class="left-sidebar d-md-none">
            <!-- Sidebar scroll-->
            <div>
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav scroll-sidebar container-fluid">
                    <ul id="sidebarnav">
                        <!-- ============================= -->
                        <!-- Home -->
                        <!-- ============================= -->
                        <li class="sidebar-item">
                            <a class="sidebar-link sidebar-link" href="{{ route('member.index') }}" aria-expanded="false">
                                <span class="rounded-3">
                                    <i class="ti ti-home"></i>
                                </span>
                                <span class="hide-menu">Beranda</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link sidebar-link" href="{{ route('member.profile.edit') }}" aria-expanded="false">
                                <span class="rounded-3">
                                    <i class="ti ti-user"></i>
                                </span>
                                <span class="hide-menu">Profil</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link sidebar-link" href="{{ route('member.jobs.index') }}" aria-expanded="false">
                                <span class="rounded-3">
                                    <i class="ti ti-subtask"></i>
                                </span>
                                <span class="hide-menu">Pengalaman Kerja</span>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
            <div class="fixed-profile p-3 bg-light-secondary rounded sidebar-ad mt-3 mx-9 d-block d-lg-none">
                <div class="hstack gap-3 justify-content-between">
                    <div class="john-img">
                        <img src="{{ asset('member-template/images/profile/user-1.jpg') }}" class="rounded-circle" width="42"
                            height="42" alt="">
                    </div>
                    <div class="john-title">
                        <h6 class="mb-0 fs-4">John Doe</h6>
                        <span class="fs-2">Designer</span>
                    </div>
                    <button class="border-0 bg-transparent text-primary ms-2" tabindex="0" type="button"
                        aria-label="logout" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="logout">
                        <i class="ti ti-power fs-6"></i>
                    </button>
                </div>
            </div>
        </aside>
        <!-- Sidebar End -->
        <!-- Main wrapper -->
        <div class="body-wrapper">
            <div class="container-fluid">
                @yield('content')
            </div>
        </div>
        <div class="dark-transparent sidebartoggler"></div>
        
        @include(partialCompro('member.footer'))
    </div>
    <!-- Import Js Files -->
    <script src="{{ asset('member-template/libs/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('member-template/libs/simplebar/dist/simplebar.min.js') }}"></script>
    <script src="{{ asset('member-template/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <!-- core files -->
    <script src="{{ asset('member-template/js/app.min.js') }}"></script>
    <script src="{{ asset('member-template/js/app.horizontal.init.js') }}"></script>
    <script src="{{ asset('member-template/js/app-style-switcher.js') }}"></script>
    <script src="{{ asset('member-template/js/sidebarmenu.js') }}"></script>

    <script src="{{ asset('member-template/js/custom.js') }}"></script>
    @stack('script')
    <!-- current page js files -->
    {{-- <script src="../../dist/libs/owl.carousel/dist/owl.carousel.min.js"></script>
        <script src="../../dist/libs/apexcharts/dist/apexcharts.min.js"></script>
        <script src="../../dist/js/dashboard.js"></script> --}}
</body>

</html>
