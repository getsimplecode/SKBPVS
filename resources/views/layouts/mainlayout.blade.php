<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>SKBPVS</title>

    <!-- Favicons -->
    <link href="{{ asset('sklogo.png') }}" rel="icon">
    <link href="{{ asset('sklogo.png') }}" rel="apple-touch-icon">

    <!-- Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css2?family=Rajdhani:wght@600;700&family=DM+Sans:wght@400;500;700&family=Nunito:wght@300;400;600;700&family=Open+Sans:wght@300;400;600;700&display=swap"
        rel="stylesheet">

    <!-- Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">

    <!-- Bootstrap & Vendor CSS -->
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/quill/quill.snow.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/quill/quill.bubble.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/simple-datatables/style.css') }}" rel="stylesheet">

    <!-- NiceAdmin Base -->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/mystyle.css') }}" rel="stylesheet">

</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">

        <div class="d-flex align-items-center justify-content-between">
            <a class="logo d-flex align-items-center">
                <img src="{{ asset('sklogo.png') }}" alt="SK Logo" onerror="this.style.opacity='0.5'">
                <span class="d-none d-lg-block"><strong>EASYKEY</strong></span>
            </a>
            <i class="bi bi-list toggle-sidebar-btn"></i>
        </div>

        <nav class="header-nav ms-auto">
            <ul class="d-flex align-items-center list-unstyled mb-0 gap-2">

                <li class="nav-item d-none d-md-flex align-items-center me-2">
                    <span style="font-size:0.75rem; color:var(--text-muted); background:var(--gray-100); border:1px solid var(--border); padding:5px 12px; border-radius:20px;">
                        <i class="bi bi-building me-1" style="color:var(--forest);"></i>
                        Barangay Balintawak
                    </span>
                </li>

                <li class="nav-item">
                    <a href="{{ route('gotoprofile.index') }}" class="nav-link d-flex align-items-center gap-2">
                        <img src="{{ asset('userlogo.png') }}" alt="Profile" class="rounded-circle" width="34" height="34" style="border:2px solid var(--border);">
                        <div class="d-none d-md-block">
                            <div style="font-size:0.82rem;font-weight:700;color:var(--text-main);line-height:1.2;">{{ auth()->user()->name }}</div>
                            <div style="font-size:0.62rem;color:var(--forest-3);font-weight:600;letter-spacing:0.5px;">SK Admin</div>
                        </div>
                    </a>
                </li>

                <li class="nav-item">
                    <div style="width:1px;height:28px;background:var(--border);"></div>
                </li>

                <li class="nav-item">
                    <form method="POST" action="{{ route('logout') }}" class="mb-0">
                        @csrf
                        <button type="submit" class="btn btn-outline-light btn-sm d-flex align-items-center gap-1">
                            <i class="bi bi-box-arrow-right"></i>
                            <span class="d-none d-sm-inline">Logout</span>
                        </button>
                    </form>
                </li>

            </ul>
        </nav>
    </header>
    <!-- End Header -->

    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">
        <ul class="sidebar-nav" id="sidebar-nav">

            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('dashboard.index') ? 'active' : '' }}"
                    href="{{ route('dashboard.index') }}">
                    <i class="bi bi-grid-1x2-fill"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <li class="nav-heading">Youth Management</li>

            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-toggle="collapse" data-bs-target="#manage-nav" href="#"
                    aria-expanded="{{ request()->routeIs('kabataaninformation.*', 'SkOfficial.index') ? 'true' : 'false' }}">
                    <i class="bi bi-people-fill"></i>
                    <span>Manage Data</span>
                    <i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="manage-nav"
                    class="nav-content collapse {{ request()->routeIs('kabataaninformation.*', 'SkOfficial.index') ? 'show' : '' }}">
                    <li>
                        <a href="{{ route('kabataaninformation.index') }}"
                            class="nav-link {{ request()->routeIs('kabataaninformation.index') ? 'bg-success-subtle' : '' }}">
                            <i class="fas fa-user-plus"></i>
                            <span>Registration</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('SkOfficial.index') }}"
                            class="nav-link {{ request()->routeIs('SkOfficial.index') ? 'bg-success-subtle' : '' }}">
                            <i class="fas fa-list-ul"></i>
                            <span>SK Official</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('kabataaninformation.list') }}"
                            class="nav-link {{ request()->routeIs('kabataaninformation.list') ? 'bg-success-subtle' : '' }}">
                            <i class="fas fa-list-ul"></i>
                            <span>Master List</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('manageevent.index') ? 'active' : '' }}"
                    href="{{ route('manageevent.index') }}">
                    <i class="fas fa-calendar-check"></i>
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

            <li class="nav-heading">Reports</li>

            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('report.index') ? 'active' : '' }}"
                    href="{{ route('report.index') }}">
                    <i class="fas fa-file-signature"></i>
                    <span>Reports</span>
                </a>
            </li>

        </ul>
    </aside>
    <!-- End Sidebar -->

    <main id="main" class="main p-2">
        @include('Alert.alerts')
        @if (View::hasSection('content'))
            @yield('content')
        @else
            <script>
                window.location.href = "{{ route('dashboard.index') }}";
            </script>
        @endif
    </main>

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center">
        <i class="bi bi-arrow-up-short"></i>
    </a>

    <!-- Vendor JS -->
    <script src="{{ asset('assets/vendor/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/chart.js/chart.umd.js') }}"></script>
    <script src="{{ asset('assets/vendor/echarts/echarts.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/quill/quill.js') }}"></script>
    <script src="{{ asset('assets/vendor/simple-datatables/simple-datatables.js') }}"></script>
    <script src="{{ asset('assets/vendor/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
    <script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>

</body>

</html>