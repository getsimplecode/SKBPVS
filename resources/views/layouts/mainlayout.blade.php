<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>SKBPVS</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Favicons -->
    <link href="{{ asset('sklogo.png') }}" rel="icon">
    <link href="{{ asset('sklogo.png') }}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="{{ 'https://fonts.gstatic.com' }}" rel="preconnect">
    <link
        href="{{ 'https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i' }}"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ 'assets/vendor/bootstrap/css/bootstrap.min.css' }}" rel="stylesheet">
    <link href="{{ 'assets/vendor/bootstrap-icons/bootstrap-icons.css' }}" rel="stylesheet">
    <link href="{{ 'assets/vendor/boxicons/css/boxicons.min.css' }}" rel="stylesheet">
    <link href="{{ 'assets/vendor/quill/quill.snow.css' }}" rel="stylesheet">
    <link href="{{ 'assets/vendor/quill/quill.bubble.css' }}" rel="stylesheet">
    <link href="{{ 'assets/vendor/remixicon/remixicon.css' }}" rel="stylesheet">
    <link href="{{ 'assets/vendor/simple-datatables/style.css' }}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ 'assets/css/style.css' }}" rel="stylesheet">

    <!-- =======================================================
  * Template Name: NiceAdmin
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Updated: Apr 20 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center" style="background-color:#00331a">

        <div class="d-flex align-items-center justify-content-between">
            <a class="logo d-flex align-items-center text-green">
                <img src="{{ asset('sklogo.png') }}" alt="">
                <span class="d-none d-lg-block text-white font-extrabold"><strong>SKBPVS</strong></span>
            </a>
            <i class="bi bi-list toggle-sidebar-btn text-white"></i>
        </div><!-- End Logo -->


        <nav class="header-nav ms-auto">
            <ul class="d-flex align-items-center">

                <li class="nav-item d-block d-lg-none">
                    <a class="nav-link nav-icon search-bar-toggle " href="#">
                        <i class="bi bi-search"></i>
                    </a>
                </li><!-- End Search Icon-->





                <li class="nav-item dropdown pe-3">

                    <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#"
                        data-bs-toggle="dropdown">
                        <img src="{{ asset('userlogo.png') }}" alt="Profile" class="rounded-circle">
                        <span class="d-none d-md-block dropdown-toggle ps-2 text-white">{{ auth()->user()->name }}
                        </span>
                    </a><!-- End Profile Iamge Icon -->

                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                        <li class="dropdown-header">
                            <h6>{{ auth()->user()->name }}</h6>
                            <span>SK CHAIRMAN</span>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="{{ route('gotoprofile.index') }}">
                                <i class="bi bi-person"></i>
                                <span>My Profile</span>
                            </a>
                        </li>

                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </li>

                    </ul><!-- End Profile Dropdown Items -->
                </li><!-- End Profile Nav -->

            </ul>
        </nav><!-- End Icons Navigation -->

    </header><!-- End Header -->

    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">
        <ul class="sidebar-nav" id="sidebar-nav">

            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('dashboard.index') ? 'active' : '' }}"
                    href="{{ route('dashboard.index') }}">
                    <i class="bi bi-grid"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-toggle="collapse" data-bs-target="#manage-nav" href="#">
                    <i class="bi bi-box-seam"></i>
                    <span>Manage Data</span>
                    <i class="bi bi-chevron-down ms-auto"></i>
                </a>

                <ul id="manage-nav"
                    class="nav-content collapse {{ request()->routeIs('kabataaninformation.index', 'kabataaninformation.gotokabataanlist', 'kabataaninformation.statistics') ? 'show' : '' }}"
                    data-bs-parent="#sidebar-nav">
                    <li>
                        <a class="nav-link {{ request()->routeIs('kabataaninformation.index') ? 'bg-success-subtle' : 'collapsed' }}"
                            href="{{ route('kabataaninformation.index') }}">
                            <i class="fas fa-users"></i><span>Kabataan Information</span>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link {{ request()->routeIs('kabataaninformation.list') ? 'bg-success-subtle' : 'collapsed' }}"
                            href="{{ route('kabataaninformation.list') }}">
                            <i class="fas fa-chalkboard-teacher"></i><span>List of Kabataan</span>
                        </a>
                    </li>

                </ul>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('manageevent.index') ? 'active' : '' }}"
                    href="{{ route('manageevent.index') }}">
                    <i class="fas fa-calendar"></i>
                    <span>Manage Events</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('manageqrcode.index') ? 'active' : '' }}"
                    href="{{ route('manageqrcode.index') }}">
                    <i class="fas fa-qrcode"></i>
                    <span>Manage QR Code</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('attendance.index') ? 'active' : '' }}"
                    href="{{ route('attendance.index') }}">
                    <i class="fas fa-user-check"></i>
                    <span>Track Attendance</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('report.index') ? 'active' : '' }}"
                    href="{{ route('report.index') }}">
                    <i class="fas fa-file-signature"></i>
                    <span>Reports</span>
                </a>
            </li>

        </ul>

    </aside>

<main id="main" class="main">
    @hasSection('content')
        @yield('content')
    @else
        <script>
            window.location.href = "{{ route('dashboard.index') }}";
        </script>
    @endif
</main>



    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{ 'assets/vendor/apexcharts/apexcharts.min.js' }}"></script>
    <script src="{{ 'assets/vendor/bootstrap/js/bootstrap.bundle.min.js' }}"></script>
    <script src="{{ 'assets/vendor/chart.js/chart.umd.js' }}"></script>
    <script src="{{ 'assets/vendor/echarts/echarts.min.js' }}"></script>
    <script src="{{ 'assets/vendor/quill/quill.js' }}"></script>
    <script src="{{ 'assets/vendor/simple-datatables/simple-datatables.js' }}"></script>
    <script src="{{ 'assets/vendor/tinymce/tinymce.min.js' }}"></script>
    <script src="{{ 'assets/vendor/php-email-form/validate.js' }}"></script>

    <!-- Template Main JS File -->
    <script src="{{ 'assets/js/main.js' }}"></script>

</body>

</html>
