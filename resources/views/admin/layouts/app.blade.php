<!DOCTYPE html>
<html>
    <head>
        <title>Admin Panel</title>
        <link rel="stylesheet" href="{{ asset('vendor/adminlte/dist/css/adminlte.min.css') }}">
        <link rel="stylesheet" href="{{ asset('vendor/adminlte/plugins/fontawesome-free/css/all.min.css') }}">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    </head>
    <body class="hold-transition sidebar-mini">
        <div class="wrapper">
            @include('admin.layouts.navbar')
            @include('admin.layouts.sidebar')
            <div class="content-wrapper">
                <section class="content pt-3">
                @yield('content')
                </section>
            </div>
            @include('admin.layouts.footer')
        </div>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script>
    $(document).ready(function () {
        if ($('#table').length) {
            $('#table').DataTable();
        }
    });
    </script>
    @stack('scripts')
    </body>
</html>
