<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <title>@yield('title')</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta content="AnemiaTrackerApp" name="description" />
        <meta content="Yahya Hudan" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <!-- App favicon -->
        <link rel="shortcut icon" href="{{asset('template/dashboard/vertical/assets/images/favicon.ico')}}">
        
        <!-- App css -->
        <link href="{{asset('template/dashboard/vertical/assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('template/dashboard/vertical/assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('template/dashboard/vertical/assets/css/theme.min.css')}}" rel="stylesheet" type="text/css" />

        <!-- Add Your Plugin here : -->
        @yield('plugins')

    </head>

    <body>

        <!-- Begin page -->
        <div id="layout-wrapper">
            <div class="header-border"></div>

            <!-- ========== Header Start ========== -->
            @include('layouts.header')

            <!-- ========== Left Sidebar Start ========== -->
            @include('layouts.sidebar')
            <!-- Left Sidebar End -->

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            
            <div class="main-content">

                @yield('content')
                <!-- End Page-content -->

                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-6">
                                2023 © AnemiaTrackerApp.
                            </div>
                            <div class="col-sm-6">
                                <div class="text-sm-right d-none d-sm-block">
                                    Develop by Yahya
                                </div>
                            </div>
                        </div>
                    </div>
                </footer>

            </div>
            <!-- end main content-->

        </div>
        <!-- END layout-wrapper -->

        <!-- Overlay-->
        <div class="menu-overlay"></div>


        <!-- jQuery  -->
        <script src="{{asset('template/dashboard/vertical/assets/js/jquery.min.js')}}"></script>
        <script src="{{asset('template/dashboard/vertical/assets/js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{asset('template/dashboard/vertical/assets/js/metismenu.min.js')}}"></script>
        <script src="{{asset('template/dashboard/vertical/assets/js/waves.js')}}"></script>
        <script src="{{asset('template/dashboard/vertical/assets/js/simplebar.min.js')}}"></script>

        <!-- Add Plugins or somting else u need here -->
        @yield('plugins-or-somting-else')
        
        <!-- Sparkline Js-->
        <script src="{{asset('template/dashboard/vertical/plugins/jquery-sparkline/jquery.sparkline.min.js')}}"></script>

        <!-- Chart Js-->
        <script src="{{asset('template/dashboard/vertical/plugins/jquery-knob/jquery.knob.min.js')}}"></script>

        <!-- Chart Custom Js-->
        <script src="{{asset('template/dashboard/vertical/assets/pages/knob-chart-demo.js')}}"></script>


        <!-- Morris Js-->
        <script src="{{asset('template/dashboard/vertical/plugins/morris-js/morris.min.js')}}"></script>

        <!-- Raphael Js-->
        <script src="{{asset('template/dashboard/vertical/plugins/raphael/raphael.min.js')}}"></script>

        <!-- Custom Js -->
        <script src="{{asset('template/dashboard/vertical/assets/pages/dashboard-demo.js')}}"></script>

        <!-- App js -->
        <script src="{{asset('template/dashboard/vertical/assets/js/theme.js')}}"></script>

        
    </body>

</html>