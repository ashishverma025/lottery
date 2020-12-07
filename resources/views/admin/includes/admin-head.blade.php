<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Betwell Admin</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Font Awesome -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="route" content="{{ url('/') }}">

        <link rel="stylesheet" href="{{ asset('public/student/plugins/fontawesome-free/css/all.min.css')}}">
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <link rel="stylesheet" href="{{ asset('public/student/plugins/daterangepicker/daterangepicker.css')}}">
        <link rel="stylesheet" href="{{ asset('public/student/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{ asset('public/student/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css')}}">
        <link rel="stylesheet" href="{{ asset('public/student/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
        <link rel="stylesheet" href="{{ asset('public/student/plugins/select2/css/select2.min.css')}}">
        <link rel="stylesheet" href="{{ asset('public/student/dist/css/adminlte.min.css')}}">
        <link rel="stylesheet" href="{{ asset('public/student/dist/css/custom.css')}}">
        <!--Duallistbox-->
        <link rel="stylesheet" href="{{ asset('public/student/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css')}}">
        <link rel="stylesheet" href="{{ asset('public/student/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
        <!-- JQVMap -->
        <link rel="stylesheet" href="{{asset('public/student/plugins/jqvmap/jqvmap.min.css')}}">
        <!-- Theme style -->
        <!-- overlayScrollbars -->
        <link rel="stylesheet" href="{{asset('public/student/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
        <!-- Daterange picker -->
        <!-- summernote -->
        <link rel="stylesheet" href="{{asset('public/student/plugins/summernote/summernote-bs4.css')}}">
        <!-- Google Font: Source Sans Pro -->
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
        <script src="{{ asset('public/student/plugins/jquery/jquery.min.js')}}"></script>

        
        
        <link href="{{URL::asset('public/admn/css/select2.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('public/admn/css/plugincss/dataTables.bootstrap.css')}}" rel="stylesheet">
<link href="{{URL::asset('public/admn/css/pages/tables.css')}}" rel="stylesheet">
        <style>
            /*.errMsg{
                color: red;
                text-align: center;
                width: 100%;
                float: left;
                word-break: break-all;
                font-size: medium;
            }*/
        </style>
    </head>
    <body class="hold-transition sidebar-mini layout-fixed js" >
        <div class="wrapper">
            <?php
            $userDetails = getUserDetails();
//            prd($userDetails);
            ?>
            <!-- Navbar -->
            <nav class="main-header navbar navbar-expand navbar-white navbar-light" style="background-color: #001f3f;">
                <!-- Left navbar links -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
                    </li>
                    <li class="nav-item d-none d-sm-inline-block">
                        <a href="{{url('admin/dashboard')}}" class="nav-link">Home</a>
                    </li>
                    <li class="nav-item d-none d-sm-inline-block">
                        <a href="#" class="nav-link">Contact</a>
                    </li>
                </ul>

                <!-- SEARCH FORM -->
                <form class="form-inline ml-3">
                    <div class="input-group input-group-sm">
                        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-navbar" type="submit">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                </form>

                <!-- Right navbar links -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                    @endif
                    @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" style="background-color: #337ab7" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item title" href="#">
                                Admire Admin</a>
                            <a class="dropdown-item" href="{{url('admin/settings')}}"><i class="fa fa-cogs" style="color:graytext"></i>
                                Account Settings</a>

                            <a class="dropdown-item" href="{{url('admin/change_password')}}"><i class="fa fa-lock" style="color:graytext"></i>
                                Change Password</a>

                            {{-- <a class="dropdown-item" href="login2.html"><i class="fa fa-sign-out"></i>
                                Log Out</a                                    > --}}

                                    @if(Auth::guard('admin')->check())
                                    <a class="dropdown-item" href="#" onclick="event.preventDefault();document.querySelector('#admin-logout-form').submit();"> <i class="fa fa-sign-out"></i>
                                Logout
                            </a>
                            <form id="admin-logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                            @endif
                        </div>
                    </li>
                    @endguest
                </ul>
                </li>
            </nav>
            <!-- /.navbar -->