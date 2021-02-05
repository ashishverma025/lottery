<!DOCTYPE html>
<html>
    <head>
        <title>BETWELLE-Admin</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <!-- <link rel="shortcut icon" href="{{ asset('admn/img/logo.ico')}}"/> -->
        <!--Global styles -->
        <link type="text/css" rel="stylesheet" href="{{ asset('admn/css/components.css')}}" />
        <link type="text/css" rel="stylesheet" href="{{ asset('admn/css/custom.css')}}" />
        <!--End of Global styles -->
        <!--Plugin styles-->
        <link type="text/css" rel="stylesheet" href="{{ asset('admn/vendors/bootstrapvalidator/css/bootstrapValidator.min.css')}}"/>
        <link type="text/css" rel="stylesheet" href="{{ asset('admn/vendors/wow/css/animate.css')}}"/>
        <!--End of Plugin styles-->
        <link type="text/css" rel="stylesheet" href="{{ asset('admn/css/pages/login1.css')}}"/> 

    </head>
    <body>
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
                <img src="{{ asset('admn/img/loader.gif')}}" style=" width: 40px;" alt="loading...">
            </div>
        </div>
        {{-- <div class="container wow fadeInDown" data-wow-delay="0.5s" data-wow-duration="1s"> --}}
        <div class="container">
            <div class="row ">
                @yield('content')
            </div>
        </div>
        <!-- global js -->
        <script type="text/javascript" src="{{ asset('admn/js/jquery.min.js')}}"></script>
        <script type="text/javascript" src="{{ asset('admn/js/tether.min.js')}}"></script>
        <script type="text/javascript" src="{{ asset('admn/js/bootstrap.min.js')}}"></script>
        <!-- end of global js-->
        <!--Plugin js-->
        <script type="text/javascript" src="{{ asset('admn/vendors/bootstrapvalidator/js/bootstrapValidator.min.js')}}"></script>
        <script type="text/javascript" src="{{ asset('admn/vendors/wow/js/wow.min.js')}}"></script>
        <!--End of plugin js-->
        <script type="text/javascript" src="{{ asset('admn/js/pages/login1.js')}}"></script>
    </body>

</html>