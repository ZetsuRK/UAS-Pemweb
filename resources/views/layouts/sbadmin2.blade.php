<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Dashboard')</title>

    <!-- SB Admin 2 CSS -->
    <link href="{{ asset('sb-admin2/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('sb-admin2/css/sb-admin-2.min.css') }}" rel="stylesheet">
</head>
<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">

        {{-- Sidebar --}}
        @include('partials.sidebar')

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                {{-- Navbar --}}
                @include('partials.navbar')

                <!-- Begin Page Content -->
                <div class="container-fluid pt-4">
                    @yield('content')
                </div>
                <!-- /.container-fluid -->

            </div>

            {{-- Footer --}}
            @include('partials.footer')
        </div>
        <!-- End of Content Wrapper -->

    </div>

    <!-- JS -->
    <script src="{{ asset('sb-admin2/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('sb-admin2/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('sb-admin2/js/sb-admin-2.min.js') }}"></script>

    @yield('scripts')
</body>
</html>
