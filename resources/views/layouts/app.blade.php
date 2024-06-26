

<!DOCTYPE html>
<html lang="en">
<head>

    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Plus Admin</title>

    <!-- plugins:css -->
    <link rel="stylesheet" href="{{asset('assets_pluginAdmin/vendors/mdi/css/materialdesignicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets_pluginAdmin/vendors/flag-icon-css/css/flag-icon.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets_pluginAdmin/vendors/css/vendor.bundle.base.css')}}">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="{{asset('assets_pluginAdmin/vendors/jquery-bar-rating/css-stars.css')}}">
    <link rel="stylesheet" href="{{asset('assets_pluginAdmin/vendors/font-awesome/css/font-awesome.min.css')}}">

    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{asset('assets_pluginAdmin/css/demo_1/style.css')}}">

    <!-- End layout styles -->
    <link rel="shortcut" href="{{asset('assets_pluginAdmin/images/favicon.png')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.11.0/dist/sweetalert2.min.css">
    @yield('datatable-css')
</head>
<body>
<div class="container-scroller">
    <!-- partial:partials/_sidebar.html -->
    @include('layouts.partial.sidebar')
    <!-- partial -->
    <!-- partial:partials/_settings-panel.html -->
    <div id="settings-trigger"><i class="mdi mdi-settings"></i></div>
    @include('layouts.partial.setting_pannel')

    <!-- partial -->
    <!-- partial:partials/_navbar.html -->
    @include('layouts.partial.navbar')

    <!-- partial -->

    <div class="main-panel">
        <div class="content-wrapper">
            <div class="page-header ">

                <div class="header-left">
                    <p> </p>
                   {{-- <button class="btn btn-primary mb-2 mb-md-0 mr-2"> Create new document </button>
                    <button class="btn btn-outline-primary bg-white mb-2 mb-md-0"> Import documents </button>--}}
                </div>

<div class="justify-content-between align-items-baseline"> <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/profile">Profile</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ \Illuminate\Support\Facades\Auth::user()->username }} </li>
        </ol>
    </nav> </div>


                    {{-- <button type="button" class="btn btn-primary mt-2 mt-sm-0 btn-icon-text">
                         <i class="mdi mdi-plus-circle"></i> Add Prodcut </button>--}}
                </div>


            {{--@include('layouts.dashboard')--}}
            @yield('content')
          </div>

        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->

        <!-- partial -->
    </div>
@include('layouts.partial.footer')



    <!-- main-panel ends -->
</div>
<!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->
<!-- plugins:js -->
<script src="{{asset('assets_pluginAdmin/vendors/js/vendor.bundle.base.js')}}"></script>
<!-- endinject -->
<!-- Plugin js for this page -->
<script src="{{asset('assets_pluginAdmin/vendors/jquery-bar-rating/jquery.barrating.min.js')}}"></script>
<script src="{{asset('assets_pluginAdmin/vendors/chart.js/Chart.min.js')}}"></script>
<script src="{{asset('assets_pluginAdmin/vendors/flot/jquery.flot.js')}}"></script>
<script src="{{asset('assets_pluginAdmin/vendors/flot/jquery.flot.resize.js')}}"></script>
<script src="{{asset('assets_pluginAdmin/vendors/flot/jquery.flot.categories.js')}}"></script>
<script src="{{asset('assets_pluginAdmin/vendors/flot/jquery.flot.fillbetween.js')}}"></script>
<script src="{{asset('assets_pluginAdmin/vendors/flot/jquery.flot.stack.js')}}"></script>
<!-- End plugin js for this page -->
<!-- inject:js -->
<script src="{{asset('assets_pluginAdmin/js/off-canvas.js')}}"></script>
<script src="{{asset('assets_pluginAdmin/js/hoverable-collapse.js')}}"></script>
<script src="{{asset('assets_pluginAdmin/js/misc.js')}}"></script>
<script src="{{asset('assets_pluginAdmin/js/settings.js')}}"></script>
<script src="{{asset('assets_pluginAdmin/js/todolist.js')}}"></script>
<!-- endinject -->
<!-- Custom js for this page -->
<script src="{{asset('assets_pluginAdmin/js/dashboard.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.11.0/dist/sweetalert2.all.min.js"></script>
<!-- End custom js for this page -->


@yield('datatable-scripts')
</body>
</html>
