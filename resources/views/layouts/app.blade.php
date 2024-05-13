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
        <div class="content-wrapper pb-0">
            <div class="page-header flex-wrap">
                <div class="header-left">
                    {{--<button class="btn btn-primary mb-2 mb-md-0 mr-2"> Create new document </button>
                    <button class="btn btn-outline-primary bg-white mb-2 mb-md-0"> Import documents </button>--}}
                </div>
                <div class="header-right d-flex flex-wrap mt-2 mt-sm-0">
                    <div class="d-flex align-items-center">
                        <a href="#">
                            <p class="m-0 pr-3">Profile</p>
                        </a>
                        <a class="pl-3 mr-4" href="#">
                            <p class="m-0">{{ \Illuminate\Support\Facades\Auth::user()->username }}</p>
                        </a>
                    </div>

                    {{-- <button type="button" class="btn btn-primary mt-2 mt-sm-0 btn-icon-text">
                         <i class="mdi mdi-plus-circle"></i> Add Prodcut </button>--}}
                </div>
            </div>

            {{--@include('layouts.dashboard')--}}
            @yield('content')


        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        @include('layouts.partial.footer')
        <!-- partial -->
    </div>




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
<!-- End custom js for this page -->
<script>
    $(function () {
        $(".datepicker").datepicker();
    });
</script>
</body>
</html>
