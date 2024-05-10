<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Reimburs</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="@yield('meta_description', env('DESCRIPTION','This is Laravel application.'))" name="description" />
    <meta content="Fortis Solution" name="author" />
    <link rel="icon" type="image/x-icon" href="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/x-icon" href="{{ asset('storage/default/images/reimburs-logo.png') }}">
    <link rel="stylesheet" href="{{ asset('storage/default/style.css') }}">
    @yield('css')
    @stack('css')
</head>
<body>
    <div id="layout-wrapper">
    <header id="page-topbar">
            <div class="layout-width">
                <div class="navbar-header">
                    <div class="d-flex">
                        <!-- LOGO -->
                        <div class="navbar-brand-box horizontal-logo">
                            <a href="#" class="logo logo-dark">
                                <span class="logo-sm">
                                    <img src="{{ asset('storage/default/images/reimburs-logo.png') }}" alt="" height="150">
                                </span>
                                <span class="logo-lg">
                                    <img src="{{ asset('storage/default/images/reimburs-logo.png') }}" alt="" height="100">
                                </span>
                            </a>

                            <a href="#" class="logo logo-light">
                                <span class="logo-sm">
                                    <img src="{{ asset('storage/default/images/reimburs-logo.png') }}" alt="" height="150">
                                </span>
                                <span class="logo-lg">
                                    <img src="{{ asset('storage/default/images/reimburs-logo.png') }}" alt="" height="100">
                                </span>
                            </a>
                        </div>
                    </div>

                    <div class="d-flex align-items-center">
                        <div class="dropdown d-md-none topbar-head-dropdown header-item">
                            <button type="button" class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle"
                                id="page-header-search-dropdown" data-bs-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                                <i class="bx bx-search fs-22"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                                aria-labelledby="page-header-search-dropdown">
                                <form class="p-3">
                                    <div class="form-group m-0">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Search ..."
                                                aria-label="Recipient's username">
                                            <button class="btn btn-primary" type="submit"><i
                                                    class="mdi mdi-magnify"></i></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div class="ms-1 header-item d-none d-sm-flex">
                            <button type="button" class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle"
                                data-toggle="fullscreen">
                                <i class='bx bx-fullscreen fs-22'></i>
                            </button>
                        </div>

                        <div class="ms-1 header-item d-none d-sm-flex">
                            <button type="button"
                                class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle light-dark-mode">
                                <i class='bx bx-moon fs-22'></i>
                            </button>
                        </div>

                        <div class="dropdown ms-sm-3 header-item topbar-user">
                        <button type="button" class="btn" id="page-header-user-dropdown" data-bs-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <span class="d-flex align-items-center">
                                    <img class="rounded-circle header-profile-user"
                                    src="{{ asset('storage/default/images/' . (Auth::user()->profile_image ?? 'user-default.png')) }}"
                                        alt="Header Avatar">
                                    <span class="text-start ms-xl-2">
                                 
                                </span>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end">
                                <!-- item-->
                                <h6 class="dropdown-header">Welcome</h6>
                    
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                    <i class="mdi mdi-logout text-muted fs-16 align-middle me-1"></i>
                                    <span class="align-middle" data-key="t-logout">Logout</span>
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>

         <!-- ========== App Menu ========== -->
         <div class="app-menu navbar-menu">
            <!-- LOGO -->
            <div class="navbar-brand-box">
                <!-- Dark Logo-->
                <a href="index.html" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="assets/images/logo-sm.png" alt="" height="150">
                    </span>
                    <span class="logo-lg">
                        <img src="assets/images/logo-dark.png" alt="" height="100">
                    </span>
                </a>
                <!-- Light Logo-->
                <a href="index.html" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="assets/images/logo-sm.png" alt="" height="150">
                    </span>
                    <span class="logo-lg">
                        <img src="assets/images/logo-light.png" alt="" height="100">
                    </span>
                </a>
                <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover" id="vertical-hover">
                    <i class="ri-record-circle-line"></i>
                </button>
            </div>

            <div id="scrollbar">
            <div class="container-fluid">
                <div id="two-column-menu"></div>
                <ul class="navbar-nav" id="navbar-nav">
                    <li class="menu-title"><span data-key="t-menu">Menu</span></li>
                    <li class="nav-item">
                        <a class="nav-link menu-link" href="{{ route('home.index') }}">
                            <i class="ri-home-line"></i> <span data-key="t-home">Home</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link menu-link" href="{{ route('reimbursement.index') }}">
                        @if (auth()->user()->jabatan === 'staff')
                            <i class="ri-coins-fill"></i> <span data-key="t-reimbursement">Pengajuan Reimbursement</span>
                        @else
                            <i class="ri-coins-fill"></i> <span data-key="t-reimbursement">Persetujuan Reimbursement</span>
                        @endif
                        </a>
                    </li>
                    @if (auth()->user()->jabatan === 'direktur')
                    <li class="nav-item">
                        <a class="nav-link menu-link" href="{{ route('user.index') }}">
                            <i class="ri-file-user-line"></i> <span data-key="t-management">Manajemen User</span>
                        </a>
                    </li>
                    @endif
                </ul>
            </div>
        </div>    
         </div>
            </div>
        </div>
    </div>

        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">
                     @include('layouts.notif')

                    <!-- Page content here -->
                    @yield('content')
                </div>
            </div>
            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6">
                            <script>document.write(new Date().getFullYear())</script> 
                        </div>
                        <div class="col-sm-6">
                            <div class="text-sm-end d-none d-sm-block">
                            Made by Sinta Nuriah 2024
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <button onclick="topFunction()" class="btn btn-danger btn-icon" id="back-to-top">
        <i class="ri-arrow-up-line"></i>
    </button>
    <div id="preloader">
        <div id="status">
            <div class="spinner-border text-primary avatar-sm" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>
    </div>

    <script src="{{ asset('storage/default') }}/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('storage/default') }}/libs/simplebar/simplebar.min.js"></script>
    <script src="{{ asset('storage/default') }}/libs/node-waves/waves.min.js"></script>
    <script src="{{ asset('storage/default') }}/libs/feather-icons/feather.min.js"></script>
    <script src="{{ asset('storage/default') }}/js/pages/plugins/lord-icon-2.1.0.js"></script>
    <script src="{{ asset('storage/default') }}/js/plugins.js"></script>
    <script src="{{ asset('storage/default') }}/js/app.js"></script>
    @yield('scripts')
    @stack('scripts')
</body>
</html>
