<!doctype html>
<html lang="en">

    <head><meta https-equiv="Content-Type" content="text/html; charset=utf-8">

        <meta https-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>Wippli|Home</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="route" content="{{ url('/') }}">
        <!-- css stylesheet -->
        <link href="{{ url('public/sites/css/owl-animate.css') }}" rel="stylesheet">
        <link href="{{ url('public/sites/css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ url('public/sites/css/owl.carousel.min.css') }}" rel="stylesheet">
        <link href="{{ url('public/sites/css/owl.theme.default.min.css') }}" rel="stylesheet">
        <link href="{{ url('public/sites/css/style.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <style>
        </style>
    </head>

    <body>
        <?php
        $dob = get_custom_dob();
        ?>
        <!--- Banner--->
        <header class="header-main">
            <nav id="sticky-top" class="navbar navbar-default navbar-fixed-top custom-nav">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar"> <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
                        <div class="logo"> <a class="navbar-brand" href="#"><img height="150" width="150" src="{{ url('public/sites/wippli-front/logo.png') }}" alt="" class="img-responsive"></a> </div>
                    </div>
                    <div id="navbar" class="navbar-collapse collapse">
                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="#">FAQ</a></li>

                            @guest
                            <!--<li><a href="{{ route('login') }}">{{ __('Log In') }}</a></li>-->
                            <li><a id="loginModal"> Log In</a></li>
                            @if (Route::has('register'))
                            <li><a id="signUpModal">Sign Up</a></li>
                            <!--<li><a class="nav-link" href="{{ route('register') }}">{{ __('Sign Up') }}</a></li>-->
                            @endif
                            @else
                            <!--<li><a href="{{ route('home') }}">{{ __('Dashboard') }}</a></li> -->
                            <li class="tour-btn"><a href="{{url('lc/dashboard')}}">Visit Dashboard</a></li>
                            @if(empty($LcDetails))
                            <li class="tour-btn"><a href="{{url('becomeaeducation_partner')}}">Become an education Partner</a></li>
                            @else
                            <li class="tour-btn"><a href="{{url('lc/dashboard')}}">Become an education Partner</a></li>
                            @endif
                            <li>
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
                    <!--/.nav-collapse -->
                </div>
            </nav>
            <!-- Trigger the modal with a button -->
        </header>

        <!--- Services section --->
       <section class="services-sec">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="title-heading"> <img src="{{ url('public/sites/images/title-before.png') }}" alt="">
                            <h2>Improve Over the Weekend</h2>
                            <h4>Study with Reliable, Qualified Tutors right at home</h4>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-6">
                        <div class="ser-box">
                            <a href="#"><div class="icon-try-angle"><img src="{{ url('public/sites/images/search-icon.png') }}" alt=""></div></a>
                            <div class="text-box">
                                <h2>SEARCH</h2>
                                <p>Browse tutor listings to find the perfect tutor for your child within 24-hours</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6">
                        <div class="ser-box">
                            <a href="#"><div class="icon-try-angle"> <img src="{{ url('public/sites/images/plain-icon.png') }}" alt=""> </div></a>
                            <div class="text-box">
                                <h2>REQUEST</h2>
                                <p>Post a request for tutors and receive instant responses, hassle-free.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6">
                        <div class="ser-box">
                            <a href="#"><div class="icon-try-angle"><img src="{{ url('public/sites/images/assignment-icon.png') }}" alt=""></div></a>
                            <div class="text-box">
                                <h2>ASSIGNMENTS</h2>
                                <p>View Assignments and connect directly with students commission-free Find a suitable match !</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6">
                        <div class="ser-box">
                            <a href="#"><div class="icon-try-angle"><img src="{{ url('public/sites/images/resource-icon.png') }}" alt=""></div></a>
                            <div class="text-box">
                                <h2>RESOURCES</h2>
                                <p>Watch tutorial videos, view study notes and download practice questions today</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section> 

        <!--- Video Section -->
        <section class="video-section">
            <div id="video_banner" class="owl-carousel owl-theme">
                <div class="item">
                    <img src="{{ url('public/sites/images/video-banner.jpg') }}" alt="">
                    <div class="video_title">
                        <h2>LEARN ANYTIME</h2>
                        <p>See how tutify educators create a good learning eniournment for your child</p>
                        <div class="play-btn"><img src="{{ url('public/sites/images/play-btn.png') }}" alt=""></div>
                    </div>

                </div>
                <div class="item">
                    <img src="{{ url('public/sites/images/video-banner.jpg') }}" alt="">
                    <div class="video_title">
                        <h2>LEARN ANYTIME</h2>
                        <p>See how tutify educators create a good learning eniournment for your child</p>
                        <div class="play-btn"><img src="{{ url('public/sites/images/play-btn.png') }}" alt=""></div>
                    </div>

                </div>
                <div class="item">
                    <img src="{{ url('public/sites/images/video-banner.jpg') }}" alt="">
                    <div class="video_title">
                        <h2>LEARN ANYTIME</h2>
                        <p>See how tutify educators create a good learning eniournment for your child</p>
                        <div class="play-btn"><img src="{{ url('public/sites/images/play-btn.png') }}" alt=""></div>
                    </div>

                </div>
            </div>
        </section>

        <!--- Our Edutacor Section -->

        <section class="meet_out_team meet_out_team_first">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="title-heading">
                            <img src="{{ url('public/sites/images/title-before.png') }}" alt="">
                            <h2>Meet our Educators</h2>
                            <h4>Engage with Knowledgeable teachers near you</h4>
                        </div>
                    </div>
                </div>

                <div class="row">
                    @if(!empty($totalTutors))
                    @foreach($totalTutors as $key=>$tutor)
                    <?php
                    $imgFolder = ($tutor->user_type == '4') ? 'student' : 'tutor';
                    if ($tutor->social_login_type == 'facebook' || $tutor->social_login_type == 'google') {
                        $avator = $tutor->avatar ? $tutor->avatar : 'default_profile_user_img.png';
                    } else {
                        $url = $tutor->avatar ? $imgFolder . '/' . $tutor->id . '/' . $tutor->avatar : 'default_profile_user_img.png';
                        $avator = url('public/sites/images') . '/' . $url;
                    }
                    ?>
                    <div class="col-lg-3 col-md-3 col-sm-3">

                        <div class="team_box">
                            <div class="team_img">
                                <img src="{{$avator}}" class="img-responsive">
                                <!--<img src="{{ url('public/sites/images/our-educator.jpg') }}" alt="" class="img-responsive">-->
                            </div>
                            <div class="image-title">
                                <h2>{{$tutor['name']}}</h2>
                            </div>
                            <div class="price_tag">
                                <sub>$</sub>
                                <h3>35</h3>
                                <sub>SGD</sub>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @endif

                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="see_all_btn">
                            <a href="#">SEE ALL EDUCATORS</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!---Get Tutified Today--->
        <section class="get-tutified_section">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="title-heading text-white">
                            <img src="{{ url('public/sites/images/title-before-white.png') }}" alt="">
                            <h2>Get Tutified Today</h2>
                            <h3>Engaging a tutor has never been easier. Look through out listings and select suitable tutors or post a request for tutors and wait for a suitable match! Tutors pass on savings to students because Tutify<i>&#8482;</i> operates commission-free.</h3>
                            <div class="be_a_tutor_btn">
                                <a href="#">BE A TUTOR</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="meet_out_team">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="title-heading">
                            <img src="{{ url('public/sites/images/title-before.png') }}" alt="">
                            <h2>THINGS WE TEACH</h2>
                            <h4>Select from a variety of subject to learn</h4>
                        </div>
                    </div>
                </div>
              

                <div class="row">
                    @if(!empty($Subjects))
                    @foreach($Subjects as $k=>$subject)
                    <?php
                    $image = $subject['subject_image'] ? url('public/sites/images/teach-subjects/1') . '/' . $subject['subject_image'] : url('public/sites/images/chemistory.jpg');
                    ?>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                        <div class="team_box">
                            <div class="team_img">
                                <img src="{{ $image }}" alt="" class="img-responsive">
                            </div>
                            <div class="image-title">
                                <h2>{{$subject['subjects_name']}}</h2>
                            </div>
                            <p style="color:#fff;background-color:black"><?= @$subject['description'] ?></p>
                        </div>
                    </div>
                    @endforeach
                    @endif
                   
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="see_all_btn">
                            <a href="#">SEE ALL SUBJECTS</a>
                        </div>
                    </div>
                </div>
            </div>
            <div id="closeModal"></div>
            <!-- Sign Up Modal -->

            <div class="modal fade " id="SignUpModal" role="dialog">
                <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="btn-dismiss-modal" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                            <div id="socialSignup">
                                <div id="model1" class="model1">
                                    <div class="col-sm-12">

                                        <a href="{{ url('/login/facebook') }}" class="btn-facebook">
                                            <span class="icon-container"><i class="fa fa-facebook"></i></span>
                                            <span class="text-container">Continue with Facebook</span>
                                        </a>
                                        <a href="https://tutify.com.sg/home/g_sign_in" class="btn-google">
                                            <span class="icon-container g-icon"><img src="{{url('public/sites/users/img/google_icon.png')}}"></span>
                                            <span class="text-container continueee">Continue with Google</span>
                                        </a>
                                        <div class="signup-or-separator">
                                            <span class="h6 signup-or-separator--text">or</span>
                                            <hr>
                                        </div>
                                        <a href="#" class="btn-email btn-danger icon-btn btn-block btn-lg signup_with_email" id="signupForm">
                                            <span id="signup_with_email"><img src="{{url('public/sites/users/img/email-icon-white.png')}}"> Sign up with Email</span>
                                        </a>


                                        <div id="tos_outside" class="row-space-top-3 merg-bottttt">
                                            <small>By signing up, I agree to Tutify's <a href="#" data-popup="true">Terms of Service</a>, <a href="#" data-popup="true">Privacy Policy</a>, <a href="#" data-popup="true">Guest Refund Policy</a>, and <a href="#" data-popup="true">Host Guarantee Terms</a>.</small>
                                        </div>

                                        <hr class="bottom-line">
                                        <div class="clearfix">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="signup-login-form-switch-copy">
                                                        Already an Tutify Member?
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <a data-toggle="modal" class="btn btn-default button-rausch-border signup-login-form-switch-button loged-inn border-logg" data-dismiss="modal" id="log-in-link"> Log in </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                            </div>

                            <!--form-->
                            <form class="form-inline" action="{{url('register')}}" id="manualSignup" method="post" style="display: none">
                                @csrf
                                <h6>Sign up with <span>Facebook</span> or <span>Google</span></h6>
                                <div class="signup-or-separator">
                                    <span class="h6 signup-or-separator--text">or</span>
                                    <hr>
                                </div>

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
                                                <span class="form-icon"><img src="{{url('public/sites/users/img/name-icon.png')}}"></span>
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
                                                <span class="form-icon"><img src="{{url('public/sites/users/img/name-icon.png')}}"></span>
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
                                        <span class="form-icon"><img src="{{url('public/sites/users/img/email-icon.png')}}"></span>
                                        @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-field">
                                        <!--<label for="password">Password:</label>-->
                                        <input type="password" class="form-control" id="password" placeholder="Password" name="password">
                                        <span class="form-icon showPwd"><img src="{{url('public/sites/users/img/pass-icon.png')}}"></span>
                                        @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-field">
                                        <!--<label for="cpassword"> Confirm Password:</label>-->
                                        <input type="password" class="form-control" id="password_confirmation" placeholder="Confirm password" name="password_confirmation">
                                        <span class="form-icon showCnfrmPwd"><img src="{{url('public/sites/users/img/pass-icon.png')}}"></span>
                                    </div>
                                </div>
                                <div class="col-md-12">

                                    <div class="form-field has-feedback">
                                        <!--<label for="password">Password:</label>-->
                                        <input type="text" class="form-control" id="address" placeholder="Address" name="address">
                                        <span class="form-icon"><img src="{{url('public/sites/users/img/address-icon.png')}}"></span>
                                        @if ($errors->has('address'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('address') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="row custom-gutter">
                                        <div class="col-sm-6">
                                            <div class="form-field has-feedback">
                                                <!--<label for="password">Password:</label>-->
                                                <input type="text" class="form-control" id="city" placeholder="City" name="city">
                                                <span class="form-icon"><img src="{{url('public/sites/users/img/address-icon.png')}}"></span>
                                                @if ($errors->has('city'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('city') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-field">
                                                <!--<label for="password">Password:</label>-->
                                                <input type="text" class="form-control" id="state" placeholder="State" name="state">
                                                <span class="form-icon"><img src="{{url('public/sites/users/img/address-icon.png')}}"></span>
                                                @if ($errors->has('state'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('state') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-field">
                                        <!--<label for="password">Password:</label>-->
                                        <input type="text" class="form-control" id="country" placeholder="Country" name="country">
                                        <span class="form-icon"><img src="{{url('public/sites/users/img/address-icon.png')}}"></span>
                                        @if ($errors->has('country'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('country') }}</strong>
                                        </span>
                                        @endif
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
                                            <div class="" id="tos_outside">
                                                <label class="container1">
                                                    <input type="checkbox" name="remember_me">
                                                    <span class="checkmark"></span>
                                                    <small>By signing up, I agree to Tutify's <a href="#" data-popup="true">Terms of Service</a>, <a href="#" data-popup="true">Privacy Policy</a>, <a href="#" data-popup="true">Guest Refund Policy</a>, and <a href="#" data-popup="true">Host Guarantee Terms</a>.</small>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <button type="submit" id="btn_registration" class="btn btn-block btn-danger btn-lg " id="user-login-btn">Sign Up</button>
                                            <hr class="bottom-line">
                                            <div class="clearfix">
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="signup-login-form-switch-copy">
                                                            Already an Tutify Member?
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <a data-toggle="modal" class="btn btn-default button-rausch-border signup-login-form-switch-button loged-inn border-logg" data-dismiss="modal" id="log-in-link"> Log in </a>
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
            <div class="modal alert-modal fade" id="LoginModal" tabindex="-1" role="dialog" aria-labelledby="LoginModalLabel" aria-hidden="true">
                <div class="modal-vertical">
                    <div class="modal-vertical-inner">
                        <div class="modal-dialog login-model">
                            <div class="modal-content ">
                                <div class="f_msg" style="display: none;"></div>
                                <div class="modal-header">
                                    <button type="button" class="btn-dismiss-modal" data-dismiss="modal">&times;</button>
                                </div>
                                <div class="modal-body">
                                    <div class="col-sm-12">
                                        <a href='{{ url('/facebook-login') }}' class='btn-facebook'>
                                            <span class="icon-container"><i class="fa fa-facebook"></i></span>
                                            <span class="text-container">Log in with Facebook</span>
                                        </a>

                                        <a href='{{ url('/google-login') }}' class="btn-google">
                                            <span class="icon-container g-icon"><img src="{{url('public/sites/users/img/google_icon.png')}}"></span>
                                            <span class="text-container">Log in with Google</span>
                                        </a>

                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="col-sm-12">

                                        <div class="signup-or-separator">
                                            <span class="h6 signup-or-separator--text">or</span>
                                            <hr>
                                        </div>
                                    </div>

                                    <form action="{{url('login')}}" class="login-form" id="login_form" method="post" accept-charset="utf-8" novalidate="novalidate">
                                        @csrf
                                        <div id="input-formm">
                                            <div class="col-sm-12">    
                                                <div class="errMsg align-center" id="errMsg" style="display: none; text-align: center;height: 40px;padding-top: 6px;font-size: 16px;"></div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-field">

                                                    <input type="email" class="form-control" name="username" id="username" placeholder="Email Address">
                                                    <span class="form-icon"><img src="{{url('public/sites/users/img/email-icon.png')}}"></span>
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
                                                    <span class="form-icon showLoginPwd"><img src="{{url('public/sites/users/img/pass-icon.png')}}"></span>
                                                    @if ($errors->has('password'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('password') }}</strong>
                                                    </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                        <div class="col-sm-12">

                                            <div id="tos_outside" class="row-space-top-3">
                                                <div class="check-sec">
                                                    <label class="container1">
                                                        <input type="checkbox" name="remember_me">
                                                        <span class="checkmark"></span><span>Remember Me</span></label>
                                                </div>
                                                <div class="forget_section">
                                                    <a href="{{url('password/reset')}}" class="btn btn-default button-rausch-border signup-login-form-switch-button logggg" id="log-in-link">Forgot password?</a>
                                                </div>
                                            </div>


                                            <button type="submit" class="btn btn-block btn-danger btn-lg" id="user-login-btn">Log In</button>
                                        </div>

                                    </form>
                                    <div class="col-sm-12">
                                        <hr class="bottom-line">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="signup-login-form-switch-copy">
                                                    Don't have an account?
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <a data-toggle="modal" class="btn btn-default button-rausch-border signup-login-form-switch-button lognMdl border-logg" data-dismiss="modal" id="sign-up-link">Sign up</a>
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
        </section>

         <!--- Video Section -->
         <section class="video-section">
            <div id="video_banner" class="owl-carousel owl-theme">
                <div class="item">
                    <div class="video_title">
                        <h2>Comming soon</h2>
                        <p>UNDER MAINTAINANCE</p>
                    </div>

                </div>
            
            </div>
        </section>



        <footer class="footer-main">
            <div class="container">
                <div class="row">
                    <div class="footer-top-sec clearfix">
                        <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                            <div class="footer-logo">
                                <img class="img-responsive" src="{{ url('public/sites/wippli-front/logo.png') }}">
                            </div>
                            <div class="footer-address">
                                Suite 405/12, Hannover Street<br>
                                XYZ Location<br>
                                Singapore
                            </div>
                            <a class="tel" href="">+65 9458 36528 </a>
                            <a class="mail" href="">info@tutify.com.sg</a>
                        </div>
                        <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                            <div class="footer-title">
                                <h4>company</h4>
                            </div>
                            <ul class="ft-list">
                                <li><a href="{{ url('privacy-policy') }}">Privacy & Policy</a></li>
                                <li><a href="{{ url('terms-of-service') }}">Terms of service</a></li>
                                <li><a href="">About</a></li>
                                <li><a href="">Partners</a></li>
                                <li><a href="">Reources</a></li>
                                <li><a href="">Career</a></li>
                                <li><a href="">Help</a></li>
                            </ul>
                        </div>
                        <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                            <div class="footer-title">
                                <h4>tutors &amp; subjects</h4>
                            </div>
                            <ul class="ft-list">
                                <li><a href="">Meet our tutors</a></li>
                                <li><a href="">Our quality assurance</a></li>
                                <li><a href="">Subjects</a></li>
                                <li><a href="">Become a tutor</a></li>
                            </ul>
                        </div>
                        <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                            <div class="footer-title">
                                <h4>services</h4>
                            </div>
                            <ul class="ft-list">
                                <li><a href="">How it works</a></li>
                                <li><a href="">Pricing &amp; Plan</a></li>
                                <li><a href="">Better result</a></li>
                                <li><a href="">Tutoring Benifits</a></li>
                                <li><a href="">FAQs</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="social-sec">
                        <h4>join us on</h4>
                        <div class="social-block">
                            <a class="social-icon facebook" href=""></a>
                            <a class="social-icon google-plus" href=""></a>
                            <a class="social-icon twitter" href=""></a>
                            <a class="social-icon linkedin" href=""></a>
                            <a class="social-icon youtube" href=""></a>
                        </div>
                    </div>
                    <div class="copyright">
                        © Copyright 2016 Tutify All Rights Reserved
                    </div>
                </div>
            </div>
        </footer>
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <!-- <script src="https://code.jquery.com/jquery-1.12.4.min.js') }}"></script>-->
        <script src="{{ url('public/sites/js/jquery-3.4.1.min.js') }}"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="{{ url('public/sites/js/bootstrap.min.js') }}"></script>
        <script src="{{ url('public/sites/js/owl.carousel.min.js')}}"></script>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery.validation/1.15.0/jquery.validate.min.js"></script>
        <script>
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
                                                            //                                    
                                                            if (response.success) {
                                                                // Reset the form
                                                                $('#errMsg').show();
                                                                $('#login_form')[0].reset();
                                                                $('#errMsg').removeClass('alert-danger').addClass('alert-success');
                                                                $('#errMsg').html(response.message);
                                                                location.reload();
                                                                window.location.href = "{{url('lc/dashboard')}}"
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
                            address: {
                                required: true
                            },
                            city: {
                                required: true
                            },
                            state: {
                                required: true
                            },
                            country: {
                                required: true
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
                            state: {
                                required: 'Please enter state'
                            },
                            address: {
                                required: 'Please enter address'
                            },
                            city: {
                                required: 'Please enter city'
                            },
                            country: {
                                required: 'Please enter country'
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
                                        window.location.href("{{url('registration')}}");
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