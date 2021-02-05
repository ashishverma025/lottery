<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="route" content="{{ url('/') }}">
        <title>Home</title>
        <!--<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet">-->
        <!--<link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700,700i,900,900i&display=swap" rel="stylesheet">-->
        <!--<link href="https://fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">-->
        <!--<link rel="preconnect" href="https://fonts.gstatic.com">-->
        <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="{{ url('sites/css/all.css') }}">
        <link rel="stylesheet" href="{{ url('sites/css/bootstrap.min.css') }}">
        <link rel='stylesheet' href='{{ url('sites/css/owl.carousel.min.css') }}'>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" ><link href="{{ url('sites/css/style.css') }}" rel="stylesheet">
        <style>
            .button {
                width: 100px;
                background: #efd048;
                border: 2px solid #efd048;
                border-radius: 25px;
            }
        </style>
    </head>
    <body>
        <?php
        $dob = get_custom_dob();
        ?>
        <div id="closeModal"></div>
        <!-- Sign Up Modal -->
        <div class="modal fade SignUpModal" id="SignUpModal" role="dialog">
            <div class="modal-dialog modal-lg">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <h2>REGISTER</h2>
                        <button type="button" class="btn-dismiss-modal" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div id="socialSignup">
                            <div id="model1" class="model1">
                                <!--                                <div class="col-sm-12">
                                                                    <a href="{{ url('/login/facebook') }}" class="btn-facebook">
                                                                        <span class="icon-container"><i class="fa fa-facebook"></i></span>
                                                                        <span class="text-container">Continue with Facebook</span>
                                                                    </a>
                                                                </div>
                                                                <div class="col-sm-12">
                                                                    <a href="https://tutify.com.sg/home/g_sign_in" class="btn-google">
                                                                        <span class="icon-container g-icon"><img src="{{url('sites/images/google_icon.png')}}"></span>
                                                                        <span class="text-container continueee">Continue with Google</span>
                                                                    </a>
                                                                </div>
                                                                <div class="col-sm-12">
                                                                    <div class="signup-or-separator">
                                                                        <span class="h6 signup-or-separator--text">or</span>
                                                                        <hr>
                                                                    </div>
                                                                </div>-->
                                <div class="col-sm-12">
                                    <a href="#" class="btn-google signup_with_email" id="signupForm">
                                        <span id="signup_with_email" class="icon-container g-icon">
                                            <img src="{{url('sites/images/email-icon-white.png')}}">Sign up with Email</span>
                                    </a>
                                </div>
                                <div class="col-sm-12">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="remember" id="tos_outside" >
                                                <label class="container1">
                                                    <input type="checkbox" name="remember_me">
                                                    <span class="checkmark"></span>
                                                    <small>By signing up, I agree to Tutify's <a href="#" data-popup="true">Terms of Service</a>, <a href="#" data-popup="true">Privacy Policy</a>, <a href="#" data-popup="true">Guest Refund Policy</a>, and <a href="#" data-popup="true">Host Guarantee Terms</a>.</small>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr class="bottom-line">
                                <div class="clearfix"></div>
                                <div class="row accountsignup">
                                    <div class="col-sm-6 donotaccount">
                                        <p>Already an Tutify Member?</p>
                                    </div>
                                    <div class="col-sm-6 signup">
                                        <p><a data-toggle="modal" class="btn" data-dismiss="modal" id="log-in-link"> Log in </a></p>
                                    </div>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>

                        <!--form-->
                        <form class="form-inline" action="{{url('register')}}" id="manualSignup" method="post" style="display: none">
                            @csrf
                            <!--<h6 class="btn-google">Sign up with <span>Facebook</span> or <span>Google</span></h6>-->
                            <!--                            <div class="col-sm-12">
                                                            <div class="signup-or-separator">
                                                                <span class="h6 signup-or-separator--text">or</span>
                                                                <hr>
                                                            </div>
                                                        </div>-->
                            <div class="col-sm-12">
                                <div class="form-field">
                                    <div class="alert alert-dismissible text-center" id="server_resposne" style="display: none;">
                                        <button type="button" class="close"></button>
                                        <span id="server_resposne_msg"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="row custom-gutter">
                                    <div class="col-sm-6">
                                        <div class="form-field">
                                            <!--<label for="name">Name:</label>-->
                                            <input type="text" class="form-control" id="fname" placeholder="First name" name="fname">
                                            <span class="form-icon"><img src="{{url('sites/images/name-icon.png')}}"></span>
                                            @if ($errors->has('fname'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('fname') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-field">
                                            <!--<label for="name">Name:</label>-->
                                            <input type="text" class="form-control" id="lname" placeholder="Last name" name="lname">
                                            <span class="form-icon"><img src="{{url('sites/images/name-icon.png')}}"></span>
                                            @if ($errors->has('lname'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('lname') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-field">
                                    <!--<label for="email">Email:</label>-->
                                    <input type="email" class="form-control" id="email" placeholder="Email address" name="email" autocomplete="false">
                                    <span class="form-icon"><img src="{{url('sites/images/email-icon.png')}}"></span>
                                    @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="row custom-gutter">

                                    <div class="col-md-6">
                                        <div class="form-field">
                                            <!--<label for="password">Password:</label>-->
                                            <input type="password" class="form-control" id="password" placeholder="Password" name="password">
                                            <span class="form-icon showPwd"><img src="{{url('sites/images/pass-icon.png')}}"></span>
                                            @if ($errors->has('password'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-field">
                                            <!--<label for="cpassword"> Confirm Password:</label>-->
                                            <input type="password" class="form-control" id="password_confirmation" placeholder="Confirm password" name="password_confirmation">
                                            <span class="form-icon showCnfrmPwd"><img src="{{url('sites/images/pass-icon.png')}}"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-field">
                                            <strong class="brthdy">Birthday </strong>
                                            <strong id="birthday-signup-form-question-trigger"><i class="fa fa-question-circle"></i> </strong>
                                        </div>
                                    </div>
                                </div>
                                <div class="row custom-gutter">
                                    <div class="col-sm-4">
                                        <select class="form-control" name="months" id="months">
                                            <?php
                                            foreach ($dob['months'] as $key => $value) {
                                                ?>
                                                <option value="<?= $key ?>" <?= (@$UserDob['months'] == $key) ? 'selected' : '' ?>><?= $value ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="col-sm-4">
                                        <select class="form-control" name="days" id="days">
                                            <?php
                                            foreach ($dob['days'] as $key => $value) {
                                                ?>
                                                <option value="<?= $value ?>" <?= (@$UserDob['days'] == ($key + 1)) ? 'selected' : '' ?>><?= $value ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="col-sm-4">
                                        <select class="form-control" name="years" id="years">
                                            <?php
                                            foreach ($dob['years'] as $key => $value) {
                                                ?>
                                                <option value="<?= $value ?>" <?= (@$UserDob['years'] == $value) ? 'selected' : '' ?>><?= $value ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <!--<button class="button clear" type="reset">Clear</button>-->

                            <!-- server response -->
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="remember" id="tos_outside">
                                            <label class="container1">
                                                <input type="checkbox" name="remember_me">
                                                <span class="checkmark"></span>
                                                <small>By signing up, I agree to Tutify's <a href="#" data-popup="true">Terms of Service</a>, <a href="#" data-popup="true">Privacy Policy</a>, <a href="#" data-popup="true">Guest Refund Policy</a>, and <a href="#" data-popup="true">Host Guarantee Terms</a>.</small>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 loginbtn">
                                        <button type="submit" id="btn_registration" class="btn btn-block btn-danger btn-lg " >Sign Up</button>

                                    </div>
                                    <div class="col-sm-12">                                        
                                        <hr class="bottom-line">
                                        <div class="clearfix">
                                            <div class="row accountsignup">
                                                <div class="col-sm-6 donotaccount">
                                                    <p>Already an Betting Member?</p>
                                                </div>
                                                <div class="col-sm-6 signup">
                                                    <p><a data-toggle="modal" class="btn" data-dismiss="modal" id="log-in-link"> Log in </a></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </form>
                        <!--end-->
                    </div>

                </div>
            </div>
        </div>
        <!-- Login Modal -->
        <div class="modal alert-modal fade login-model" id="LoginModal" tabindex="-1" role="dialog" aria-labelledby="LoginModalLabel" aria-hidden="true">
            <div class="modal-vertical">
                <div class="modal-vertical-inner">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content ">
                            <div class="f_msg" style="display: none;"></div>
                            <div class="modal-header">
                                <h2>LOGIN</h2>
                                <button type="button" class="btn-dismiss-modal" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body">
                                <!--                                <div class="col-sm-12">
                                                                    <a href='{{ url('/facebook-login') }}' class='btn-facebook'>
                                                                        <span class="icon-container"><i class="fa fa-facebook"></i></span>
                                                                        <span class="text-container">Log in with Facebook</span>
                                                                    </a>
                                
                                                                    <a href='{{ url('/google-login') }}' class="btn-google">
                                                                        <span class="icon-container g-icon"><img src="{{url('sites/images/google_icon.png')}}"></span>
                                                                        <span class="text-container">Log in with Google</span>
                                                                    </a>
                                
                                                                    <div class="clearfix"></div>
                                                                </div>
                                                                <div class="col-sm-12">
                                
                                                                    <div class="signup-or-separator">
                                                                        <span class="h6 signup-or-separator--text">or</span>
                                                                        <hr>
                                                                    </div>
                                                                </div>-->

                                <form action="{{url('login')}}" class="login-form" id="login_form" method="post" accept-charset="utf-8" novalidate="novalidate">
                                    @csrf
                                    <div id="input-formm">
                                        <div class="col-sm-12">    
                                            <div class="errMsg align-center" id="errMsg" style="display: none; text-align: center;height: 40px;padding-top: 6px;font-size: 16px;"></div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-field">

                                                <input type="email" class="form-control" name="username" id="username" placeholder="Email Address">
                                                <span class="form-icon"><img src="{{url('sites/images/email-icon.png')}}"></span>
                                                @if ($errors->has('email'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('email') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-field">

                                                <input type="password" class="form-control" name="password" id="pwd" placeholder="Password">
                                                <span class="form-icon showLoginPwd"><img src="{{url('sites/images/pass-icon.png')}}"></span>
                                                @if ($errors->has('password'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('password') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="row">
                                        <div id="tos_outside" class="remember col-md-6">
                                            <div class="check-sec">
                                                <label class="container1">
                                                    <input type="checkbox" name="remember_me">
                                                    <span class="checkmark"></span><span>Remember Me</span></label>
                                            </div>
                                        </div>
                                        <div class="forget_section col-md-6">
                                            <a href="{{url('password/reset')}}" class="btn" id="log-in-link">Forgot password?</a>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 loginbtn">
                                        <button type="submit" class="btn btn-block btn-danger btn-lg" id="user-login-btn">Log In</button>
                                    </div>

                                </form>
                                <div class="col-sm-12">
                                    <hr class="bottom-line">
                                    <div class="row accountsignup">
                                        <div class="col-sm-6 donotaccount">
                                            <p>Don't have an account?</p>
                                        </div>
                                        <div class="col-sm-6 signup">
                                            <p><a data-toggle="modal" class="btn" data-dismiss="modal" id="sign-up-link">Sign up</a></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                </div>
            </div>
        </div>
        <!-- End User login/signup Modal -->


        <header>
            <div class="topheader">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3 col-md-3 col-sm-6">
                            <div class="logo"> <a href="{{ url('/') }}">
                                    <p>betwelle</p>
                                </a> </div>
                        </div>

                        <div class="col-lg-9 col-md-9 col-sm-9">
                            <nav class="topcontact pull-right navbar navbar-expand-lg">
                                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"><i class="fa fa-bars" aria-hidden="true"></i></span> </button>
                                <div class="collapse navbar-collapse" id="navbarResponsive">
                                    <ul class="navbar-nav ml-auto">
                                        <!--                                        <li class="active"><a class="nav-link" href="#">Vegas</a></li>-->
                                        <!--<li><a class="nav-link" href="#">Results</a></li>-->
                                        <!--<li><a class="nav-link" href="#">Promotions</a></li>-->

                                        <li><a class="nav-link" href="#">Help </a></li>
                                        <li><a href="<?php echo url('contactus') ?>">CONTACT US</a></li>
                                        @guest
                                        <li class="signup"><a class="btn" id="loginModal"> Log In</a></li>
                                        @if (Route::has('register'))
                                        <li class="signup"><a class="btn" id="signUpModal">Sign Up</a></li>
                                        @endif
                                        @else
                                        @php
                                        $userDetails = getUserDetails();
                                        $name = explode(' ',$userDetails['name']);
                                        $amt  = explode(' ',$userDetails['amt']);
                                        @endphp
                                        <li><a href="{{url('/my-account')}}" id="buyTicket" class="buy">My Account</a></li>


                                        <li ><a class="nav-link" href="">Hello, {{$name[0]}}</a></li>
                                        <li ><a class="nav-link" href="my-account">USD {{$amt[0]}}</a></li>


                                        <button onclick="location.href ='{{ url('addfund') }}'" class="button">
                                            Add Fund</button>
                                        <li class="signup">
                                            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                    @csrf
                                                </form>
                                            </div>
                                        </li>
                                        @endguest

                                    </ul>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        @yield('content')
        <?php // pr($menuDetails); ?>
        <div class="footer">
            <div class="container">
                @if(!empty($menuDetails))
                <div class="row">
                    <div class="col-md-6 col-sm-12 item1">
                        @foreach($menuDetails as $menu)
                        @if($menu['position'] == 'Left' && (empty($menu['parentid']) || $menu['parentid'] == 0) )
                        <div class="logo"> 
                            <a href="#">
                                <h2>{{@$menu['title']}}</h2>
                            </a> 
                        </div>
                        @endif

                        @if($menu['position'] == 'Left' && (!empty($menu['parentid']) || $menu['parentid'] != 0))
                        <p>{!! html_entity_decode(@$menu['menu_description']) !!}</p>
                        @endif
                        @endforeach
                    </div>
                    <div class="col-md-3 col-sm-12 item2">
                        @foreach($menuDetails as $menu)
                        @if($menu['position'] == 'Middle' && (empty($menu['parentid']) || $menu['parentid'] == 0) )
                        <h4>{{@$menu['title']}}</h4>  
                        @endif
                        @endforeach
                        <ul>
                            @foreach($menuDetails as $menu)
                            @if($menu['position'] == 'Middle' && (!empty($menu['parentid']) || $menu['parentid'] != 0) )
                            <li><a href="{{url('/').'/'.$menu['link']}}">{{$menu['title']}}</a></li>
                            @endif
                            @endforeach
                        </ul>
                    </div>

                    <div class="col-md-3 col-sm-12 item3">
                        @foreach($menuDetails as $menu)
                        @if($menu['position'] == 'Right' && (empty($menu['parentid']) || $menu['parentid'] == 0) )
                        <h4>{{@$menu['title']}}</h4>  
                        @endif
                        @endforeach
                        <h3><span class="text-green"><i class="fa fa-phone" aria-hidden="true"></i>(000)</span> 123-4567</h3>
                        <p>549  Logan Lane, Denver, Colorado <br>80022</p>

                        <ul class="social-icon">
                            <li><a href="javascript:void(0)"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                            <li><a href="javascript:void(0)"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                            <li><a href="javascript:void(0)"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                            <li><a href="javascript:void(0)"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
                            <li><a href="javascript:void(0)"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                        </ul>

                    </div>
                </div>
                @endif
            </div>
        </div>
        <div class="footerbottom">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-sm-12 image"> 
                        <!--img src="images/footer-payment.png"/--> 
                    </div>
                    <div class="col-md-4 col-sm-12 text">
                        <p>Copyright &copy; 2020 All Rights Reserved.</p>
                    </div>
                    <div class="col-md-4 col-sm-12"> </div>
                </div>
            </div>
        </div>

        <script src='{{ url('sites/js/jquery.min.js') }}'></script> 
        <script src='{{ url('sites/js/owl.carousel.min.js') }}'></script> 
        <!--<script  src="{{ url('sites/js/script.js') }}"></script>--> 
        <script src="{{ url('sites/js/popper.min.js') }}"></script> 
        <script src="{{ url('sites/js/bootstrap.min.js') }}"></script> 
        <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery.validation/1.15.0/jquery.validate.min.js"></script>
        <!--<script type="text/javascript" src="{{ url('sites/js/main.js') }}"></script>--> 
        <script>
                                                        $(function(){
                                                        $(".dropdown").hover(
                                                                function() {
                                                                $('.dropdown-menu', this).stop(true, true).fadeIn("fast");
                                                                $(this).toggleClass('open');
                                                                $('b', this).toggleClass("caret caret-up");
                                                                },
                                                                function() {
                                                                $('.dropdown-menu', this).stop(true, true).fadeOut("fast");
                                                                $(this).toggleClass('open');
                                                                $('b', this).toggleClass("caret caret-up");
                                                                });
                                                        });
                                                        jQuery(".navbar-nav a").addClass('nav-link');
                                                        $(".signup_with_email").click(function () {
                                                        //    $("#manualSignup").reset();
                                                        $("#manualSignup").show();
                                                        $("#socialSignup").hide();
                                                        $('#SignUpModal').addClass('fixedModal');
                                                        });
                                                        $(".showPwd").on('click', function () {
                                                        var input = $("#password");
                                                        if (input.attr("type") === "password") {
                                                        input.attr("type", "text");
                                                        } else {
                                                        input.attr("type", "password");
                                                        }

                                                        });
                                                        $(".showCnfrmPwd").on('click', function () {
                                                        var input = $("#password_confirmation");
                                                        if (input.attr("type") === "password") {
                                                        input.attr("type", "text");
                                                        } else {
                                                        input.attr("type", "password");
                                                        }

                                                        });
                                                        $(".showLoginPwd").on('click', function () {
                                                        var input = $("#pwd");
                                                        if (input.attr("type") === "password") {
                                                        input.attr("type", "text");
                                                        } else {
                                                        input.attr("type", "password");
                                                        }

                                                        });
                                                        function mailCheck() {
                                                        $.ajax({
                                                        url: "{{url('checkexistemail')}}",
                                                                method: "POST",
                                                                data: "email=" + value,
                                                                dataType: "json",
                                                                headers: {
                                                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                                                },
                                                                success: function (res) {
                                                                return res.status == 'true'
                                                                }
                                                        });
                                                        }

                                                        $(document).ready(function () {
                                                        // Initialize the functionality
                                                        loginObj.init();
                                                        $.validator.addMethod("validateEmail", function (value, element) {
                                                        return this.optional(element) || /^[a-zA-Z0-9._-]+@[a-zA-Z0-9-]+\.[a-zA-Z.]{2,5}$/i.test(value);
                                                        }, "Email Address is invalid: Please enter a valid email address.");
                                                        $.validator.addMethod("validatePassword", function (value, element) {
                                                        return this.optional(element) || /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,16}$/i.test(value);
                                                        }, "Password is invalid: Please enter a valid password.");
                                                        $.validator.addMethod("uniqueEmail", function (value, element) {
                                                        $.ajax({
                                                        url: "{{url('checkexistemail')}}",
                                                                method: "POST",
                                                                data: "email=" + value,
                                                                dataType: "json",
                                                                headers: {
                                                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                                                },
                                                                success: function (res) {
                                                                return res.status == 'true'
                                                                }
                                                        });
                                                        });
                                                        });
                                                        var loginObj = {
                                                        init: function () {
                                                        loginObj.holdFormSubmit();
                                                        loginObj.formValidation();
                                                        loginObj.loginFunction();
                                                        },
                                                                holdFormSubmit: function () {
                                                                // Form validations
                                                                $('#login_form').submit(function (e) {
                                                                e.preventDefault();
                                                                });
                                                                },
                                                                formValidation: function () {
                                                                $('#login_form').validate({
                                                                rules: {
                                                                username: {
                                                                required: true,
                                                                        validateEmail: true,
                                                                        email: true,
                                                                },
                                                                        password: {
                                                                        required: {
                                                                        depends: function () {
                                                                        $(this).val($.trim($(this).val()));
                                                                        return true;
                                                                        }
                                                                        },
                                                                        }

                                                                },
                                                                        messages: {
                                                                        username: {
                                                                        required: 'Please enter email address',
                                                                                email: 'Please enter a valid email id',
                                                                                validateEmail: 'Please enter a valid email id'
                                                                        },
                                                                                password: {
                                                                                required: 'Please enter password',
                                                                                },
                                                                        }
                                                                });
                                                                },
                                                                loginFunction: function () {
                                                                // Login functionality
                                                                $('#user-login-btn').click(function () {
                                                                // Check the validation
                                                                if ($('#login_form').valid()) {
                                                                // Hold the button reference
                                                                var btn = $(this);
                                                                $('#server_resposne').hide();
                                                                $('#server_resposne_msg').html('');
                                                                var email = $("#username").val()
                                                                        var password = $("#pwd").val()

                                                                        $.ajax({
                                                                        url: "{{url('signin')}}",
                                                                                method: 'post',
                                                                                data: {
                                                                                'email': email,
                                                                                        'password': password
                                                                                },
                                                                                beforeSend: function () {
                                                                                // Disable the button
                                                                                $(btn).attr('disabled', true);
                                                                                $('#loading_spinner').show();
                                                                                },
                                                                                headers: {
                                                                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                                                                },
                                                                                complete: function () {
                                                                                // Enable the button
                                                                                $(btn).attr('disabled', false);
                                                                                $('#loading_spinner').hide();
                                                                                },
                                                                                success: function (response) {
                                                                                console.log(response)

                                                                                        if (response.success) {
                                                                                // Reset the form
                                                                                $('#errMsg').show();
                                                                                $('#login_form')[0].reset();
                                                                                $('#errMsg').removeClass('alert-danger').addClass('alert-success');
                                                                                $('#errMsg').html(response.message);
                                                                                location.reload();
                                                                                window.location.href = "{{url('/')}}";
                                                                                } else {
                                                                                $('#errMsg').removeClass('alert-success').addClass('alert-danger');
                                                                                $('#errMsg').removeClass('alert-success').addClass('alert-danger');
                                                                                $('#errMsg').html(response.message);
                                                                                $('#errMsg').show();
                                                                                }
                                                                                }
                                                                        });
                                                                }
                                                                });
                                                                }
                                                        }
        </script>

        <script>
                    $(document).ready(function () {
                    // Initialize the functionality
                    signinObj.init();
                    });
                    var signinObj = {
                    init: function () {
                    signinObj.holdFormSubmit();
                    signinObj.formValidation();
                    signinObj.loginFunction();
                    },
                            holdFormSubmit: function () {
                            // Form validations
                            $('#manualSignup').submit(function (e) {
                            e.preventDefault();
                            });
                            },
                            formValidation: function () {
                            $('#manualSignup').validate({
                            rules: {
                            fname: {
                            required: true
                            },
                                    lname: {
                                    required: true
                                    },
                                    email: {
                                    required: true,
                                            email: true,
                                            validateEmail: true,
                                            //uniqueEmail: true,
                                    },
                                    password: {
                                    required: {
                                    depends: function () {
                                    $(this).val($.trim($(this).val()));
                                    return true;
                                    }
                                    },
//                                required: true,
                                            minlength: 8
                                    },
                                    password_confirmation: {
                                    required: {
                                    depends: function () {
                                    $(this).val($.trim($(this).val()));
                                    return true;
                                    }
                                    },
//                                required: true,
                                            equalTo: "#password"
                                    },
                            },
                                    messages: {
                                    fname: {
                                    required: 'Please enter first name'
                                    },
                                            lname: {
                                            required: 'Please enter last name'
                                            },
                                            email: {
                                            required: 'Please enter email address',
                                                    email: 'Please enter a valid email id',
                                                    validateEmail: 'Please enter a valid email id',
//                                uniqueEmail: 'This email id is taken already',
//                                remote: jQuery.validator.format("{0} is already taken."),
                                            },
                                            password: {
                                            required: 'Please enter password',
                                                    minlength: "Password must be at least 8 characters",
                                            },
                                            password_confirmation: {
                                            required: "Please enter confirm password",
                                                    equalTo: "Please enter the same value again: Password doesn't match"

                                            },
                                    }
                            });
                            },
                            loginFunction: function () {
                            // Login functionality
                            $('#btn_registration').click(function () {
                            // Check the validation
                            if ($('#manualSignup').valid()) {
                            // Hold the button reference
                            var btn = $(this);
                            $('#server_resposne').hide();
                            $('#server_resposne_msg').html('');
                            var fname = $("#fname").val()
                                    var lname = $("#lname").val()
                                    var email = $("#email").val()
                                    var password = $("#password").val()
                                    var address = $("#address").val()
                                    var state = $("#state").val()
                                    var city = $("#city").val()
                                    var country = $("#country").val()

                                    var years = $("#years").val()
                                    var months = $("#months").val()
                                    var days = $("#days").val()
                                    var dob = years + '-' + months + '-' + days
                                    var password_confirmation = $("#password_confirmation").val()



                                    $.ajax({
                                    url: "{{url('registration')}}",
                                            method: 'post',
                                            data: {
                                            'fname': fname,
                                                    'lname': lname,
                                                    'email': email,
                                                    'address': address,
                                                    'password': password,
                                                    'password_confirmation': password_confirmation,
                                                    'state': state,
                                                    'city': city,
                                                    'dob': dob,
                                                    'country': country
                                            },
                                            beforeSend: function () {
                                            // Disable the button
                                            $(btn).attr('disabled', true);
                                            $('#loading_spinner').show();
                                            },
                                            headers: {
                                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                            },
                                            complete: function () {
                                            // Enable the button
                                            $(btn).attr('disabled', false);
                                            $('#loading_spinner').hide();
                                            },
                                            success: function (response) {
//                                    console.log(response)
                                            if (response.resCode == 0) {
                                            // Reset the form
                                            $('#manualSignup')[0].reset();
                                            $('#server_resposne').removeClass('alert-danger').addClass('alert-success');
                                            $('#server_resposne_msg').html(response.resMsg);
                                            $('#server_resposne').show();
                                            location.reload();
//                                        window.location.href("{{url('registration')}}");
                                            } else {
                                            $('#server_resposne').removeClass('alert-success').addClass('alert-danger');
                                            $('#server_resposne_msg').html(response.resMsg);
                                            $('#server_resposne').show();
                                            }
                                            }
                                    });
                            }
                            });
                            }
                    }
        </script>

        <script>
                    $(document).ready(function () {
                    $('#loginModal,#log-in-link').click(function () {
                    $('#LoginModal').modal('toggle');
                    $('#SignUpModal').modal('hide');
                    });
                    $('#signUpModal,#sign-up-link').click(function () {
                    $('#SignUpModal').modal('toggle');
                    $("#manualSignup").hide();
                    $("#socialSignup").show();
                    $('#LoginModal').modal('hide');
                    $('#SignUpModal').removeClass('fixedModal');
                    });
                    $('.modal-backdrop').click(function () {
                    $('#LoginModal').modal('hide');
                    $('#SignUpModal').modal('hide');
                    $('.modal').remove();
                    $('.modal-backdrop').remove();
                    $('body').removeClass("modal-open");
                    });
                    //Banner_v1 script
                    $('#banner_home').owlCarousel({
                    items: 1,
                            //animateOut: 'fadeOut',
                            autoplayTimeout: 10000,
                            loop: true,
                            autoplay: true,
                            nav: false,
                            dots: false,
                            mouseDrag: true,
                            margin: 0,
                    });
                    //Banner_v1 script
                    $('#video_banner').owlCarousel({
                    items: 1,
                            //animateOut: 'fadeOut',
                            autoplayTimeout: 10000,
                            loop: true,
                            autoplay: true,
                            nav: true,
                            dots: false,
                            mouseDrag: true,
                            margin: 0,
                    });
                    // Sticky header header_v9
                    $(window).scroll(function () {
                    var scroll = $(window).scrollTop();
                    if (scroll >= 120) {
                    $("#sticky-top").addClass("sticky-nav");
                    } else if (scroll <= 120) {
                    $("#sticky-top").removeClass("sticky-nav");
                    }
                    });
                    });
        </script>
    </body>

</html>
