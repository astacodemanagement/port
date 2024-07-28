<header class="app-header">
    <nav class="navbar navbar-expand-xl navbar-light container-fluid px-0">
        <ul class="navbar-nav">
            <li class="nav-item d-block d-xl-none">
                <a class="nav-link sidebartoggler ms-n3" id="sidebarCollapse" href="javascript:void(0)">
                    <i class="ti ti-menu-2"></i>
                </a>
            </li>
            <li class="nav-item d-none d-xl-block">
                <a href="{{ route('member.index') }}" class="text-nowrap nav-link">
                    <img src="{{ asset('images/psi-logo.webp') }}" class="dark-logo"
                        width="180" alt="" />
                    <img src="{{ asset('member-template/images/logos/light-logo.svg') }}" class="light-logo"
                        width="180" alt="" />
                </a>
            </li>
        </ul>
        <ul class="navbar-nav quick-links d-none d-xl-flex ms-5">
            <li class="nav-item hover-dd d-none d-xl-block ms-5">
                <a class="nav-link" href="{{ route('member.index') }}"><i class="ti ti-user me-3 text-primary fs-5"></i> Profile</a>
            </li>
            <li class="nav-item hover-dd d-none d-xl-block">
                <a class="nav-link" href="javascript:void(0)"><i
                        class="ti ti-briefcase me-3 text-primary fs-5"></i> Jobs</a>
            </li>
            <li class="nav-item hover-dd d-none d-xl-block">
                <!-- proses -->
                <a class="nav-link" href="{{route('member.pengaduan.create')}}"><i
                        class="ti ti-user me-3 text-primary fs-5"></i>Pengaduan</a>
            </li>
                {{-- <a href="./app-invoice.html" class="d-flex align-items-center pb-9 position-relative    ">
                                        <div class="bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                                        <img src="../../dist/images/svgs/icon-dd-invoice.svg" alt="" class="img-fluid" width="24" height="24">
                                        </div>
                                        <div class="d-inline-block">
                                        <h6 class="mb-1 fw-semibold bg-hover-primary">Invoice App</h6>
                                        <span class="fs-2 d-block text-dark">Get latest invoice</span>
                                        </div>
                                    </a>
                                    <a href="./app-contact2.html" class="d-flex align-items-center pb-9 position-relative    ">
                                        <div class="bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                                        <img src="../../dist/images/svgs/icon-dd-mobile.svg" alt="" class="img-fluid" width="24" height="24">
                                        </div>
                                        <div class="d-inline-block">
                                        <h6 class="mb-1 fw-semibold bg-hover-primary">Contact Application</h6>
                                        <span class="fs-2 d-block text-dark">2 Unsaved Contacts</span>
                                        </div>
                                    </a>
                                    <a href="./app-email.html" class="d-flex align-items-center pb-9 position-relative    ">
                                        <div class="bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                                        <img src="../../dist/images/svgs/icon-dd-message-box.svg" alt="" class="img-fluid" width="24" height="24">
                                        </div>
                                        <div class="d-inline-block">
                                        <h6 class="mb-1 fw-semibold bg-hover-primary">Email App</h6>
                                        <span class="fs-2 d-block text-dark">Get new emails</span>
                                        </div>
                                    </a>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="position-relative">
                                    <a href="./page-user-profile.html" class="d-flex align-items-center pb-9 position-relative    ">
                                        <div class="bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                                        <img src="../../dist/images/svgs/icon-dd-cart.svg" alt="" class="img-fluid" width="24" height="24">
                                        </div>
                                        <div class="d-inline-block">
                                        <h6 class="mb-1 fw-semibold bg-hover-primary">User Profile</h6>
                                        <span class="fs-2 d-block text-dark">learn more information</span>
                                        </div>
                                    </a>
                                    <a href="./app-calendar.html" class="d-flex align-items-center pb-9 position-relative    ">
                                        <div class="bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                                        <img src="../../dist/images/svgs/icon-dd-date.svg" alt="" class="img-fluid" width="24" height="24">
                                        </div>
                                        <div class="d-inline-block">
                                        <h6 class="mb-1 fw-semibold bg-hover-primary">Calendar App</h6>
                                        <span class="fs-2 d-block text-dark">Get dates</span>
                                        </div>
                                    </a>
                                    <a href="./app-contact.html" class="d-flex align-items-center pb-9 position-relative    ">
                                        <div class="bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                                        <img src="../../dist/images/svgs/icon-dd-lifebuoy.svg" alt="" class="img-fluid" width="24" height="24">
                                        </div>
                                        <div class="d-inline-block">
                                        <h6 class="mb-1 fw-semibold bg-hover-primary">Contact List Table</h6>
                                        <span class="fs-2 d-block text-dark">Add new contact</span>
                                        </div>
                                    </a>
                                    <a href="./app-notes.html" class="d-flex align-items-center pb-9 position-relative    ">
                                        <div class="bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                                        <img src="../../dist/images/svgs/icon-dd-application.svg" alt="" class="img-fluid" width="24" height="24">
                                        </div>
                                        <div class="d-inline-block">
                                        <h6 class="mb-1 fw-semibold bg-hover-primary">Notes Application</h6>
                                        <span class="fs-2 d-block text-dark">To-do and Daily tasks</span>
                                        </div>
                                    </a>
                                    </div>
                                </div>
                                </div>
                            </div>
                            <div class="row align-items-center py-3">
                                <div class="col-8">
                                <a class="fw-semibold text-dark d-flex align-items-center lh-1 " href="#"><i class="ti ti-help fs-6 me-2"></i>Frequently Asked Questions</a>
                                </div>
                                <div class="col-4">
                                <div class="d-flex justify-content-end pe-4">
                                    <button class="btn btn-primary">Check</button>
                                </div>
                                </div>
                            </div>
                            </div>
                        </div>
                        <div class="col-4 ms-n4">
                            <div class="position-relative p-7 border-start h-100">
                            <h5 class="fs-5 mb-9 fw-semibold">Quick Links</h5>
                            <ul class="">
                                <li class="mb-3">
                                <a class="fw-semibold text-dark bg-hover-primary    " href="./page-pricing.html">Pricing Page</a>
                                </li>
                                <li class="mb-3">
                                <a class="fw-semibold text-dark bg-hover-primary    " href="./authentication-login.html">Authentication Design</a>
                                </li>
                                <li class="mb-3">
                                <a class="fw-semibold text-dark bg-hover-primary    " href="./authentication-register.html">Register Now</a>
                                </li>
                                <li class="mb-3">
                                <a class="fw-semibold text-dark bg-hover-primary    " href="authentication-error.html">404 Error Page</a>
                                </li>
                                <li class="mb-3">
                                <a class="fw-semibold text-dark bg-hover-primary    " href="./app-notes.html">Notes App</a>
                                </li>
                                <li class="mb-3">
                                <a class="fw-semibold text-dark bg-hover-primary    " href="./page-user-profile.html">User Application</a>
                                </li>   
                                <li class="mb-3">
                                <a class="fw-semibold text-dark bg-hover-primary    " href="./page-account-settings.html">Account Settings</a>
                                </li>
                            </ul>
                            </div>
                        </div>
                        </div>
                    </div>
                </li>
                <li class="nav-item dropdown-hover d-none d-xl-block">
                <a class="nav-link" href="app-chat.html">Chat</a>
                </li>
                <li class="nav-item dropdown-hover d-none d-xl-block">
                <a class="nav-link" href="app-calendar.html">Calendar</a>
                </li>
                <li class="nav-item dropdown-hover d-none d-xl-block">
                <a class="nav-link" href="app-email.html">Email</a>
                </li> --}}
        </ul>
        <div class="d-block d-xl-none">
            <a href="{{ route('member.index') }}" class="text-nowrap nav-link">
                <img src="{{ asset('images/psi-logo.webp') }}" width="180"
                    alt="" />
            </a>
        </div>
     
        <button class="navbar-toggler p-0 border-0" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="p-2">
                <i class="ti ti-dots fs-7"></i>
            </span>
        </button>
        
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <div class="d-flex align-items-center justify-content-between px-0 px-xl-8">
                <a href="javascript:void(0)"
                    class="nav-link round-40 p-1 ps-0 d-flex d-xl-none align-items-center justify-content-center"
                    type="button" data-bs-toggle="offcanvas" data-bs-target="#mobilenavbar"
                    aria-controls="offcanvasWithBothOptions">
                    <i class="ti ti-align-justified fs-7"></i>
                </a>
                <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-center">
                    <li class="nav-item dropdown">
                        <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="ti ti-bell-ringing"></i>
                            <div class="notification bg-danger rounded-circle"></div>
                        </a>
                        <div class="dropdown-menu content-dd dropdown-menu-end dropdown-menu-animate-up"
                            aria-labelledby="drop2">
                            <div class="d-flex align-items-center justify-content-between py-3 px-7">
                                <h5 class="mb-0 fs-5 fw-semibold">Notifications</h5>
                                <span class="badge bg-primary rounded-4 px-3 py-1 lh-sm">1 new</span>
                            </div>
                            <div class="message-body" data-simplebar>
                                <a href="javascript:void(0)"
                                    class="py-6 px-7 d-flex align-items-center dropdown-item">
                                    <span class="me-3">
                                        <img src="{{ asset('member-template/images/profile/user-1.jpg') }}" alt="user"
                                            class="rounded-circle" width="48" height="48" />
                                    </span>
                                    <div class="w-75 d-inline-block v-middle">
                                        <h6 class="mb-1 fw-semibold">Roman Joined the Team!</h6>
                                        <span class="d-block">Congratulate him</span>
                                    </div>
                                </a>
                            </div>
                            <div class="py-6 px-7 mb-1">
                                <button class="btn btn-outline-primary w-100"> See All Notifications </button>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link pe-0" href="javascript:void(0)" id="drop1"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <div class="d-flex align-items-center">
                                <div class="user-profile-img">
                                    <img src="{{ memberProfileImg(auth()->user()) }}"
                                        class="rounded-circle" width="35" height="35"
                                        alt="" />
                                </div>
                                <h6 class="ms-2 my-2 fw-semibold bg-hover-primary d-none d-lg-block">
                                    {{ auth()->user()->name }}</h6>
                                <i class="ms-3 ti ti-chevron-down d-none d-lg-block"></i>
                            </div>
                        </a>
                        <div class="dropdown-menu content-dd dropdown-menu-end dropdown-menu-animate-up"
                            aria-labelledby="drop1">
                            <div class="profile-dropdown position-relative" data-simplebar>
                                <div class="py-3 px-7 pb-0">
                                    <h5 class="mb-0 fs-5 fw-semibold">User Profile</h5>
                                </div>
                                <div class="d-flex align-items-center py-9 mx-7 border-bottom">
                                    <img src="{{ memberProfileImg(auth()->user()) }}"
                                        class="rounded-circle" width="80" height="80"
                                        alt="" />
                                    <div class="ms-3">
                                        <h5 class="mb-1 fs-3">{{ auth()->user()->name }}</h5>
                                        <span class="mb-1 d-block text-dark">Pelamar</span>
                                        <p class="mb-0 d-flex text-dark align-items-center gap-2">
                                            <i class="ti ti-mail fs-4"></i> {{ auth()->user()->email }}
                                        </p>
                                    </div>
                                </div>
                                <div class="message-body">
                                    <a href="#"
                                        class="py-8 px-7 mt-8 d-flex align-items-center">
                                        <span
                                            class="d-flex align-items-center justify-content-center bg-light rounded-1 p-6">
                                            <img src="{{ asset('member-template/images/svgs/icon-account.svg') }}"
                                                alt="" width="24" height="24">
                                        </span>
                                        <div class="w-75 d-inline-block v-middle ps-3">
                                            <h6 class="mb-1 bg-hover-primary fw-semibold"> My Profile </h6>
                                            <span class="d-block text-dark">Account Settings</span>
                                        </div>
                                    </a>
                                </div>
                                <div class="d-grid py-4 px-7 pt-8">
                                    <form action="{{ route('front.logout') }}" method="POST" id="form-logout">@csrf</form>
                                    <a href="javascript:void(0)" class="btn btn-outline-primary" onclick="document.getElementById('form-logout').submit()">Log Out</a>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
 
    </nav>
</header>