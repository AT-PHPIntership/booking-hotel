<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{ __('admin/layout.title') }}</title>
    <base href="{{asset('')}}">
    <!-- plugins:css -->
    <link rel="stylesheet" href="admin/vendors/iconfonts/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="admin/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="admin/vendors/css/vendor.bundle.addons.css">
    <link rel="stylesheet" href="admin/css/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="admin/images/favicon.png" />
</head>
<body>
    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
        @include('admin/layout/header')
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_sidebar.html -->
            @include('admin/layout/sidebar')
            <!-- content -->
            @yield('content')
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    @yield('script')
    <!-- container-scroller -->
    <script src="admin/vendors/js/vendor.bundle.base.js"></script>
    <script src="admin/vendors/js/vendor.bundle.addons.js"></script>
    <script src="admin/js/off-canvas.js"></script>
    <script src="admin/js/misc.js"></script>
    <script src="admin/js/dashboard.js"></script>
</body>
</html>
