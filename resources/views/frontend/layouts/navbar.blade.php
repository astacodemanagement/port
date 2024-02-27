<div class="navbar-area" id="stickymenu">
    <!-- Menu For Mobile Device -->
    <div class="mobile-nav">
        <a href="{{ url('/') }}" class="logo">
            <img src="{{ asset('frontend/imgs/logo-psi-new.png') }}" alt="" />
        </a>
    </div>

    <!-- Menu For Desktop Device -->
    <div class="main-nav"style="background-color: #DAF1FF">
        <div class="container">
            <nav class="navbar navbar-expand-md navbar-light">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{ asset('frontend/imgs/logo-psi-new.png') }}" alt="" />
                </a>
                <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item {{ Request::is('/') ? 'active' : '' }}">
                            <a href="{{ url('/') }}" class="nav-link">Worker</a>
                        </li>
                        <li class="nav-item {{ Request::is('employer') ? 'active' : '' }}">
                            <a href="{{ url('employer') }}" class="nav-link">Employer</a>
                        </li>
                        <li class="nav-item">
                            <button type="button" class="btn btn-secondary">Daftar SIPOOL</button>
                        </li>

                    </ul>
                </div>
            </nav>
        </div>
    </div>
</div>
