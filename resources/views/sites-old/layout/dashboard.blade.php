<!doctype html>
<html class="no-js" lang="en">

    <head>
        <meta charset="UTF-8">
        <title>Education System - Admin</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!--  <link rel="shortcut icon" href="{{ asset('public/admn/img/logo.ico') }}"/> -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="route" content="{{ url('/') }}">
        <!--global styles-->
        <link type="text/css" rel="stylesheet" href="{{ asset('public/admn/css/components.css') }}" />
        <link type="text/css" rel="stylesheet" href="{{ asset('public/admn/css/custom.css') }}" />
        <link type="text/css" rel="stylesheet" href="{{ asset('public/sites/css/style-dashboard.css') }}" />
        <!-- end of global styles-->
        <link type="text/css" rel="stylesheet" href="{{ asset('public/admn/vendors/chartist/css/chartist.min.css') }}" />
        <link type="text/css" rel="stylesheet" href="#" id="skin_change" />
        @yield('css')
       
        <link type="text/css" rel="stylesheet" href="{{ asset('public/admn/vendors/circliful/css/jquery.circliful.css') }}">
        <link type="text/css" rel="stylesheet" href="{{ asset('public/admn/css/pages/index.css') }}">
    </head>

    <body class="body">

        <div class="preloader" style=" position: fixed;
             width: 100%;
             height: 100%;
             top: 0;
             left: 0;
             z-index: 100000;
             backface-visibility: hidden;
             background: #ffffff;">
            <div class="preloader_img" style="width: 200px;
                 height: 200px;
                 position: absolute;
                 left: 48%;
                 top: 48%;
                 background-position: center;
                 z-index: 999999">
                <img src="{{ asset('public/admn/img/loader.gif') }}" style=" width: 50px;" alt="loading...">
            </div>
        </div>


        <?php
        $userDetails = getUserDetails();
        $LcDetails = getLcDetails();
//        pr($LcDetails);
        ?>
        <div id="wrap">
            <div id="top">
                <!-- .navbar -->
                <!-- .navbar -->
                <nav class="navbar navbar-static-top">
                    <div class="container-fluid m-0">
                        <a class="navbar-brand float-left" href="{{url('lc/dashboard')}}">
                            <img class="img-responsive" src="{{ asset('public/sites/users/images/small-logo.png') }}">
                            <!--<h4>Education System</h4>-->
                        </a>
                        <div class="menu">
                            <span class="toggle-left" id="menu-toggle">
                                <i class="fa fa-bars"></i>
                            </span>
                        </div>
                        <div class="topnav dropdown-menu-right float-right">
                            <!--                            <div class="btn-group hidden-md-up small_device_search" data-toggle="modal"
                                                             data-target="#search_modal">
                                                            <i class="fa fa-search text-primary"></i>
                                                        </div>
                            
                                                        <div class="btn-group">
                                                            <div class="notifications request_section no-bg">
                                                                <a class="btn btn-default btn-sm messages" id="request_btn"> <i
                                                                        class="fa fa-sliders" aria-hidden="true"></i>
                                                                </a>
                                                            </div>
                                                        </div>-->
                            <div class="btn-group">
                                <div class="user-settings no-bg">
                                    <button type="button" class="btn btn-default no-bg micheal_btn" data-toggle="dropdown">
                                        @if($userDetails->avatar)
                                        <img src="{{ asset('public/sites/images/tutor')}}/<?= @$userDetails->id . '/' . @$userDetails->avatar ?>" class="admin_img2 img-thumbnail rounded-circle avatar-img"
                                             alt="avatar">
                                        @else
                                        <img src="{{url('public/images/users/default.png')}}" class="admin_img2 img-thumbnail rounded-circle avatar-img"
                                             alt="avatar">
                                        @endif
                                        <strong>{{ $userDetails->name }}</strong>
                                        <span class="fa fa-sort-down white_bg"></span>
                                    </button>
                                    <div class="dropdown-menu admire_admin">
                                        <a class="dropdown-item title" href="#">
                                            {{$userDetails->name}}</a>
                                        <a class="dropdown-item" href="{{url('editprofile')}}/{{@$userDetails->id}}"><i class="fa fa-cogs"></i>
                                            Account Settings</a>
                                        <!--  <a class="dropdown-item" href="#">
                                             <i class="fa fa-user"></i>
                                             User Status
                                         </a> -->
                                         <!-- <a class="dropdown-item" href="mail_inbox.html"><i class="fa fa-envelope"></i>
                                        Inbox</a> -->

                                        <a class="dropdown-item" href="{{url('change_password')}}">
                                            <i class="fa fa-lock"></i>Change Password
                                        </a>

                                        <a class="dropdown-item" href="{{ route('logout') }}"> 
                                            <i class="fa fa-sign-out"></i>
                                            Logout
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="top_search_box float-right hidden-sm-down">
                            <form class="header_input_search float-right">
                                <input type="text" placeholder="Search" name="search">
                                <button type="submit">
                                    <span class="font-icon-search"></span>
                                </button>
                                <div class="overlay"></div>
                            </form>
                        </div>
                    </div>

                    <div class="black_menus container-fluid m-0">
                        <ul id="menu-list">
                            <li class="">
                                <a href="http://54.179.188.91/lc/dashboard">Dashboard</a>
                            </li>

                            <li class="">
                                <a href="#">Inbox</a>
                            </li>

                            <li class="">
                                <a href="#">Your Listings</a>
                            </li>


                            <li class="">
                                <a href="#">Your Engagements</a>
                            </li>

                            <li class="active">
                                <a href="{{url('editprofile')}}/{{@$userDetails->id}}">Profile</a>
                            </li>
                            <li class="">
                                <a href="http://54.179.188.91">Account</a>
                            </li>
                            <li class="">
                                <a href="#">Subscribe</a>
                            </li>
                            <li class="">
                                <a href="#">Invite Friends</a>
                            </li>
                        </ul>
                    </div>
                    <!-- /.container-fluid -->
                </nav>
                <!-- /.navbar -->
                <!-- /.head -->
                @if(Session::has('message'))
                <p class="alert {{ Session::get('alert-class') }} flshmsg" >{{ Session::get('message') }}</p>
                @endif
            </div>

            <!-- /#top -->
            <div class="wrapper">
                <div id="left">
                    <div class="menu_scroll">

                        <ul id="menu">
                            <li>
                                <a href="{{url('lc/dashboard')}}">
                                    <i class="fa fa-home"></i>
                                    <span class="link-title menu_hide">&nbsp;Dashboard</span>
                                </a>
                            </li>
                            <!--                            <li class="dropdown_menu">
                                                            <a href="#">
                                                                <i class="fa fa-user"></i>
                                                                <span class="link-title menu_hide">&nbsp; Tutor Management</span>
                                                                <span class="fa arrow menu_hide"></span>
                                                            </a>
                                                            <ul>
                            
                                                            </ul>
                                                        </li>-->
                            @if(!empty($LcDetails))
                            <li>
                                <a href="{{url('studentlist')}}">
                                    <i class="fa fa-angle-right"></i>
                                    &nbsp; My Students
                                </a>
                            </li>
                            <li>
                                <a href="{{url('classes')}}">
                                    <i class="fa fa-angle-right"></i>
                                    &nbsp; My Classes
                                </a>
                            </li>
                            <li>
                                <a href="{{url('subjects')}}">
                                    <i class="fa fa-angle-right"></i>
                                    &nbsp; My Subjects
                                </a>
                            </li>
                            <li>
                                <a href="{{url('attendence')}}">
                                    <i class="fa fa-angle-right"></i>
                                    &nbsp;Save Attendence
                                </a>
                            </li>
                            <li>
                                <a href="{{url('attendance')}}">
                                    <i class="fa fa-angle-right"></i>
                                    &nbsp;Attendence List
                                </a>
                            </li>
                            <li>
                                <a href="{{url('attendancesummary')}}">
                                    <i class="fa fa-angle-right"></i>
                                    &nbsp;Attendence Summary
                                </a>
                            </li>
                            @endif
                            <li>
                                <a href="{{url('becomeaeducation_partner')}}">
                                    <i class="fa fa-angle-right"></i>
                                    &nbsp;Settings
                                </a>
                            </li>
                        </ul>
                        <!-- /#menu -->
                    </div>
                </div>
                <!-- /#left -->

                @yield('content')
            </div>
            <!-- /.outer -->
            <!-- /#content -->
            <!-- Modal -->
            <div class="modal fade" id="search_modal" tabindex="-1" role="dialog"  aria-hidden="true">
                <form>
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span class="float-right" aria-hidden="true">&times;</span>
                            </button>
                            <div class="input-group search_bar_small">
                                <input type="text" class="form-control" placeholder="Search..." name="search">
                                <span class="input-group-btn">
                                    <button class="btn btn-secondary" type="submit"><i class="fa fa-search"></i></button>
                                </span>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <script type="text/javascript" src="{{ asset('public/sites/users/js/jquery-1.11.2.min.js')}}"></script>
        <script>
$(window).load(function () {
    $('body').backDetect(function () {
        alert("Look forward to the future, not the past!");
    });
});
        </script>
        <!-- /#wrap -->
        <!-- global scripts-->
        <script type="text/javascript" src="{{ asset('public/admn/js/components.js') }}"></script>
        <script type="text/javascript" src="{{ asset('public/admn/js/custom.js') }}"></script>
        <!--end of global scripts-->
        @yield('pagescript')
    </body>
    <!--  plugin scripts -->
    <script type="text/javascript" src="{{ asset('public/admn/vendors/countUp.js/js/countUp.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('public/admn/vendors/flip/js/jquery.flip.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('public/admn/js/pluginjs/jquery.sparkline.js') }}"></script>
    <script type="text/javascript" src="{{ asset('public/admn/vendors/chartist/js/chartist.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('public/admn/js/pluginjs/chartist-tooltip.js') }}"></script>
    <script type="text/javascript" src="{{ asset('public/admn/vendors/swiper/js/swiper.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('public/admn/vendors/circliful/js/jquery.circliful.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('public/admn/vendors/flotchart/js/jquery.flot.js') }}" ></script>
    <script type="text/javascript" src="{{ asset('public/admn/vendors/flotchart/js/jquery.flot.resize.js') }}"></script>
    <!--end of plugin scripts-->
    <script type="text/javascript" src="{{ asset('public/admn/js/pages/index.js') }}"></script>
</html>