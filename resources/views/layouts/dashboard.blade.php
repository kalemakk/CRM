<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Dashboard</title>

    @include('layouts.styles')

</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

    <!-- Preloader -->
{{--    @include('layouts.preloader')--}}

<!-- Navbar -->
@include('layouts.header')
<!-- /.navbar -->

    <!-- Main Sidebar Container -->
@include('layouts.side-bar')
<!-- Content Wrapper. Contains page content -->
    @yield('content')
    <!-- /.content-wrapper -->
@include('layouts.footer')

<!-- Control Sidebar -->
{{--    @include('layouts.side-control')--}}
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
@include('layouts.script')
</body>
</html>
