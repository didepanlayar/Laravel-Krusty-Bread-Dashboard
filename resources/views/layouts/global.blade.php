<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Krusty Bread - @yield('title')</title>

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('dashboard/assets/vendors/feather/feather.css') }}">
    <link rel="stylesheet" href="{{ asset('dashboard/assets/vendors/ti-icons/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('dashboard/assets/vendors/css/vendor.bundle.base.css') }}">
    <link rel="stylesheet" href="{{ asset('dashboard/assets/vendors/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dashboard/assets/vendors/mdi/css/materialdesignicons.min.css') }}">
    @yield('styles')
    <link rel="stylesheet" href="{{ asset('dashboard/assets/css/style.css') }}">
    <link rel="shortcut icon" href="{{ asset('dashboard/assets/images/favicon.png') }}" />
</head>

<body>
    <!-- container-scroller -->
    <div class="container-scroller">
        <!-- navbar -->
        <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">
                <a class="navbar-brand brand-logo me-5" href="{{ route('home') }}">
                    <img src="{{ asset('dashboard/assets/images/logo.svg') }}" class="me-2" alt="logo" />
                </a>
                <a class="navbar-brand brand-logo-mini" href="{{ route('home') }}">
                    <img src="{{ asset('dashboard/assets/images/logo-mini.svg') }}" alt="logo" />
                </a>
            </div>
            <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
                <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                    <span class="icon-menu"></span>
                </button>
                <ul class="navbar-nav navbar-nav-right">
                    <li class="nav-item nav-profile dropdown">
                        <a class="nav-link dropdown-toggle  d-flex align-items-center" href="#" data-bs-toggle="dropdown" id="profileDropdown">
                            <h5 class="me-3">Halo, {{ Auth::user()->name }}!</h5>
                            <img src="{{ asset('dashboard/assets/images/users/user.png') }}" alt="profile" />
                        </a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown"
                            aria-labelledby="profileDropdown">
                            <a class="dropdown-item"><i class="ti-settings text-primary"></i> Settings</a>
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button class="dropdown-item" style="cursor:pointer"><i class="ti-power-off text-primary"></i> Logout</button>
                            </form>
                        </div>
                    </li>
                </ul>
                <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
                    data-toggle="offcanvas">
                    <span class="icon-menu"></span>
                </button>
            </div>
        </nav>
        <!-- navbar -->

        <!-- container-fluid -->
        <div class="container-fluid page-body-wrapper">
            <!-- sidebar -->
            <nav class="sidebar sidebar-offcanvas" id="sidebar">
                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link" href="/home">
                            <i class="icon-grid menu-icon"></i>
                            <span class="menu-title">Beranda</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link collapsed" data-bs-toggle="collapse" href="#finance" aria-expanded="false" aria-controls="finance">
                            <i class="icon-bar-graph menu-icon"></i>
                            <span class="menu-title">Keuangan</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="finance" style="">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item {{ Request::is('sales-type*') ? 'active' : '' }}">
                                    <a class="nav-link" href="{{ route('sales-type.index') }}">Jenis Penjualan</a>
                                </li>
                                <li class="nav-item {{ Request::is('payments*') ? 'active' : '' }}">
                                    <a class="nav-link" href="{{ route('payments.index') }}">Metode Pembayaran</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item {{ Request::is('customers*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('customers.index') }}">
                            <i class="icon-star menu-icon"></i>
                            <span class="menu-title">Pelanggan</span>
                        </a>
                    </li>
                    <li class="nav-item {{ Request::is('users*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('users.index') }}">
                            <i class="icon-head menu-icon"></i>
                            <span class="menu-title">Karyawan</span>
                        </a>
                    </li>
                </ul>
            </nav>
            <!-- sidebar -->
            
            <!-- main-panel -->
            <div class="main-panel">
                <!-- content -->
                @yield('content')
                <!-- content -->

                <!-- footer -->
                <footer class="footer">
                    <div class="d-sm-flex justify-content-center justify-content-sm-between">
                        <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2024. <a href="{{ route('home') }}" target="_blank">Krusty Bread</a>. All rights reserved.</span>
                        <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="ti-heart text-danger ms-1"></i></span>
                    </div>
                </footer>
                <!-- footer -->
            </div>
            <!-- main-panel -->
        </div>
        <!-- container-fluid -->
    </div>
    <!-- container-scroller -->

    <!-- Scripts -->
    <script src="{{ asset('dashboard/assets/vendors/js/vendor.bundle.base.js') }}"></script>
    <script src="{{ asset('dashboard/assets/js/off-canvas.js') }}"></script>
    <script src="{{ asset('dashboard/assets/js/template.js') }}"></script>
    <script src="{{ asset('dashboard/assets/js/settings.js') }}"></script>
    <script src="{{ asset('dashboard/assets/js/todolist.js') }}"></script>
    @yield('scripts')
</body>

</html>