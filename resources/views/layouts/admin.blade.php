<!DOCTYPE html>
<html>
<head>
    <link href="{{ asset('admin_assets/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="{{ asset('admin_assets/css/sb-admin-2.min.css') }}" rel="stylesheet">

    <!-- Your head content -->
</head>
<body>


<div class="container-fluid">

    <div class="row">
        <!-- Sidebar -->
        <div class="col-md-3 bg-light">
            <!-- Your sidebar content -->
            <div class="sidebar">
                @include('layouts.sidebar')

            </div>
        </div>

        <!-- Main Content -->
        <div class="col-md-9">
            <div class="container">
                @yield('content')
            </div>
        </div>
    </div>
</div>





<!-- Bootstrap core JavaScript-->
<script src="{{ asset('admin_assets/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('admin_assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<!-- Core plugin JavaScript -->
<script src="{{ asset('admin_assets/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

<!-- Custom scripts for all pages -->
<script src="{{ asset('admin_assets/js/sb-admin-2.min.js') }}"></script>

<!-- Page level plugins -->
<script src="{{ asset('admin_assets/vendor/chart.js/Chart.min.js') }}"></script>

<!-- Page level custom scripts -->
<script src="{{ asset('admin_assets/js/demo/chart-area-demo.js') }}"></script>
<script src="{{ asset('admin_assets/js/demo/chart-pie-demo.js') }}"></script>
</body>
</html>
