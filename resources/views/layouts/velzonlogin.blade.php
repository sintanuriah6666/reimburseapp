<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg"
    data-sidebar-image="none" data-preloader="disable">

<head>

    <meta charset="utf-8" />
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Aplikasi Presensi" name="description" />
    <meta content="Fortis Solution" name="author" />
    <!-- App favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('storage/default/images/reimburs-logo.png') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Layout config Js -->
    <link rel="stylesheet" href="{{ asset('storage/default/style.css') }}">

</head>

<body>

    <div class="auth-page-wrapper pt-5">
        <!-- auth page bg -->
        <div class="auth-one-bg-position auth-one-bg" id="auth-particles">
            <div class="bg-overlay"></div>

            <div class="shape">
                <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink"
                    viewBox="0 0 1440 120">
                    <path d="M 0,36 C 144,53.6 432,123.2 720,124 C 1008,124.8 1296,56.8 1440,40L1440 140L0 140z"></path>
                </svg>
            </div>
        </div>

        <!-- auth page content -->
        <div class="auth-page-content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center mt-sm-5 mb-4 text-white-50">
                            <div>
                                <a href="{{ route('home.index') }}" class="d-inline-block auth-logo">
                                    <img src="#" alt="" height="20">
                                </a>
                            </div>
                            <p class="mt-3 fs-15 fw-medium">{{ env('APP_NAME') }}</p>
                        </div>
                    </div>
                </div>
                <!-- end row -->
                @yield('content')
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end auth page content -->

        <!-- footer -->
        <footer class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center">
                            <p class="mb-0 text-muted">&copy;
                                <script>document.write(new Date().getFullYear())</script> {{ env('APP_NAME') }}. Crafted with <i
                                    class="mdi mdi-heart text-danger"></i> by Sinta Nuriah
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- end Footer -->
    </div>
    <!-- end auth-page-wrapper -->

    <!-- JAVASCRIPT -->
    <script src="{{ asset('storage/default') }}/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('storage/default') }}/libs/simplebar/simplebar.min.js"></script>
    <script src="{{ asset('storage/default') }}/libs/node-waves/waves.min.js"></script>
    <script src="{{ asset('storage/default') }}/libs/feather-icons/feather.min.js"></script>
    <script src="{{ asset('storage/default') }}/js/pages/plugins/lord-icon-2.1.0.js"></script>
    <script src="{{ asset('storage/default') }}/js/plugins.js"></script>
    <!-- particles js -->
    <script src="{{ asset('storage/default') }}/libs/particles.js/particles.js"></script>
    <!-- App js -->
    <script src="{{ asset('storage/default') }}/js/pages/particles.app.js"></script>
    @yield('scripts')
</body>

</html>