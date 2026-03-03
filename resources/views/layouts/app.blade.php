<!DOCTYPE html>
<html lang="en">
<head>
    <title>@yield('title', env('APP_NAME'))</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Mantis Admin Template">
    <meta name="author" content="CodedThemes">

    <link rel="icon" href="{{ asset('template/assets/images/favicon.svg') }}" type="image/x-icon">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@300;400;500;600;700&display=swap">
    <link rel="stylesheet" href="{{ asset('template/assets/fonts/tabler-icons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('template/assets/fonts/feather.css') }}">
    <link rel="stylesheet" href="{{ asset('template/assets/fonts/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('template/assets/fonts/material.css') }}">
    <link rel="stylesheet" href="{{ asset('template/assets/css/style.css') }}" id="main-style-link">
    <link rel="stylesheet" href="{{ asset('template/assets/css/style-preset.css') }}">
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">

    @stack('css')
</head>

<body data-pc-preset="preset-1" data-pc-direction="ltr" data-pc-theme="light">
    @include('sweetalert::alert')

    <div class="loader-bg">
        <div class="loader-track"><div class="loader-fill"></div></div>
    </div>

    <x-admin.aside />

    <header class="pc-header">
        <div class="header-wrapper">
            <div class="me-auto pc-mob-drp">
                <ul class="list-unstyled">
                    <li class="pc-h-item pc-sidebar-collapse">
                        <a href="#" class="pc-head-link ms-0" id="sidebar-hide"><i class="ti ti-menu-2"></i></a>
                    </li>
                    <li class="pc-h-item pc-sidebar-popup">
                        <a href="#" class="pc-head-link ms-0" id="mobile-collapse"><i class="ti ti-menu-2"></i></a>
                    </li>
                </ul>
            </div>
            <div class="ms-auto">
                <ul class="list-unstyled">
                    <li class="dropdown pc-h-item header-user-profile">
                        <a class="pc-head-link dropdown-toggle arrow-none me-0" data-bs-toggle="dropdown" href="#" role="button">
                            <img src="{{ asset('template/assets/images/user/avatar-2.jpg') }}" alt="user-image" class="user-avtar">
                            <span>{{ auth()->user()->name }}</span>
                        </a>
                        <div class="dropdown-menu dropdown-user-profile dropdown-menu-end pc-h-dropdown">
                            <div class="dropdown-header">
                                <h6 class="mb-1">{{ auth()->user()->name }}</h6>
                                <span>{{ auth()->user()->email }}</span>
                            </div>
                            
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="dropdown-item">
                                    <i class="ti ti-power"></i> 
                                    <span>Logout</span>
                                </button>
                            </form>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </header>

    <div class="pc-container">
        <div class="pc-content">
            @yield('content')
        </div>
    </div>

    <script src="{{ asset('template/assets/js/plugins/popper.min.js') }}"></script>
    <script src="{{ asset('template/assets/js/plugins/simplebar.min.js') }}"></script>
    <script src="{{ asset('template/assets/js/plugins/bootstrap.min.js') }}"></script>
    <script src="{{ asset('template/assets/js/fonts/custom-font.js') }}"></script>
    <script src="{{ asset('template/assets/js/pcoded.js') }}"></script>
    <script src="{{ asset('template/assets/js/plugins/feather.min.js') }}"></script>

    <script>
        layout_change('light');
        change_box_container('false');
        layout_rtl_change('false');
        preset_change("preset-1");
        font_change("Public-Sans");
    </script>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    <!-- DataTables (CUKUP SEKALI) -->
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

    <script>
        $(document).ready(function () {
                $('#datatable').DataTable();
        });
    </script>

    @stack('js')
</body>
</html>