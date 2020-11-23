
<!doctype html>
<html>
    <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        
        <title>Tutify</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"> 
        <meta property="fb:app_id" content="230063200671778" />
        <meta property="og:url" content="{{ url('/') }}">
        <meta property="og:site_name" content="Tutify">
        <meta property="og:type" content="website" />
        <meta property="og:title" content="Tutify" />
        <meta property="og:description" content="Enagging a tutor has never been easier. Look through out listings and select suitable tutors or post a request for tutors and wait for a suitable match! Tutors pass on savings to students because Tutifyth operates commission-free." />
        <meta property="og:image" content="https://s12.postimg.org/mlpbnvcj1/tutify.png" />
        <meta property="og:image:type" content="image/png" /> 
        <meta property="og:image:width" content="400" /> 
        <meta property="og:image:height" content="300" />
        <meta property="og:locale" content="en_GB">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="route" content="{{ url('/') }}">
        <link rel="stylesheet" type="text/css" href="{{ url('public/sites/users/css/bootstrap.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{ url('public/sites/users/css/normalize.css')}}">
        <link rel="stylesheet" type="text/css" href="{{ url('public/sites/users/css/owl.carousel.css')}}">
        <link rel="stylesheet" type="text/css" href="{{ url('public/sites/users/css/owl.theme.css')}}">
        <link rel="stylesheet" type="text/css" href="{{ url('public/sites/users/css/owl.transitions.css')}}">
        <link rel="stylesheet" type="text/css" href="{{ url('public/sites/users/css/easy-responsive-tabs.css')}}">
        <link rel="stylesheet" type="text/css" href="{{ url('public/sites/users/css/ion.rangeSlider.css')}}">
        <link rel="stylesheet" type="text/css" href="{{ url('public/sites/users/css/ion.rangeSlider.skinHTML5.css')}}">
        <link rel="stylesheet" type="text/css" href="{{ url('public/sites/users/css/font-awesome.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{ url('public/sites/users/css/sweetalert.css')}}">
        <link rel="stylesheet" type="text/css" href="{{ url('public/sites/users/css/formValidation.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{ url('public/sites/users/css/jquery.steps.css')}}">

        <link rel="stylesheet" href="{{ url('public/sites/users/css/jquery.Jcrop.css')}}"> 
        <link rel="stylesheet" type="text/css" href="{{ url('public/sites/users/css/style.css')}}">
        <link rel="stylesheet" type="text/css" href="{{ url('public/sites/users/css/media.css')}}">
        <link rel="stylesheet" type="text/css" href="{{ url('public/sites/users/css/style-custom.css')}}">
        <link rel="stylesheet" href="{{ url('public/sites/users/css/jquery-ui.css')}}">
        <link rel="stylesheet" href="{{ url('public/sites/users/css/jquery.auto-complete.css')}}"> 

        <link rel="shortcut icon" type="image/x-icon" href="{{ url('public/sites/users/images/favicon.icon')}}"/>
        <style>
            /*            .container{
                            margin-left: 123px !important;
                            width:  1244px !important;
                        }*/
        </style>

        <script type="text/javascript" src="{{ asset('public/sites/users/js/jquery-1.11.2.min.js')}}"></script>
		




		
    </head>
    <!--<body onResize="refresh()">-->

    <body>
        <style>
            .alert{
                padding: 15px !important;
                text-align: center !important;		
                margin-bottom: 0px !important;
            }
            .alert-success{
                background: #c2e4e7 !important;
            }
            .alert-error{
                background: #ffd1c4 !important;
            }
            .alert-info{
                background: #ffd1c4 !important;
            }
            .alert-warning{
                background: #ffd1c4 !important;
            }
            .close{
                display: inline-block;
                margin-top: 0px;
                margin-right: 0px;
                width: 9px;
                height: 9px;
                background-repeat: no-repeat !important;
                text-indent: -10000px;
                outline: none;
                background-image: url("./assets/images/red-cross.jpg") !important;
            }
        </style>
        <script>
            $(document).ready(function () {
                setTimeout(function () {
                    $(".alert").fadeOut(2000, function () {});
                }, 5000);
            });
        </script>

        <!-- <style>
        #search_subject_name{display:none;}
        </style> -->
        <div class="inner-header clearfix">
            <div class="inner-header-logo">
                <a href="{{url('/')}}" class=""><img class="img-responsive" src="{{ url('public/sites/users/images/small-logo.png') }}"></a>
            </div>
            <div class="menu-bar hidden-xs desktop">
                <nav class="navbar" role="navigation">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="navbar-collapse collapse menu" id="bs-example-navbar-collapse-1" aria-expanded="false" style="height: 1px;">

                        <?php
                        $userDetails = (!empty($userData) && isset($userData)) ? $userData : getUserDetails();
                        $imgFolder = ($userDetails->user_type == '4') ? 'student' : 'tutor';
//                        pr($userDetails);
                        ?>
                        <ul class="nav navbar-nav ">
                            <!--<li><a href="{{asset('becometutor')}}" class="become-tutor">Become a Tutor </a></li>-->
                            <li><a href="{{url('becomeaeducation_partner')}}" class="become-tutor">Become an Education Partner </a></li>
                            <li><a href="javascript:;" id="help-tab"> help <img class="img-responsive" src="{{ url('public/sites/users/images/help-icon.png')}}"></a>

                                <div class="msg-count hidden"><span></span></div>
                                <ul class="sub-menu h-s-articles">
                                    <div class="hide-elem search-input-container" id="arrowDisplayDiv">
                                        <i class="fa fa-arrow-left" aria-hidden="true" id="arrowDisplayIcon"></i>
                                    </div>
                                    <div class="search-input-container" id="search_btn_div">
                                        <input class="search-input" type="text" placeholder="How can we help you?" placeholder="Search..." id="searchHelp" name="searchHelp">
                                    </div>
                                    <div class="search-panel-content" id="search_list_div">
                                        <div class="search-panel-header" id="resultTitle">Suggested Articles</div>
                                        <ul name="helpResult" id="helpResult">
                                            <li data-id="10"><a href=# class=getdesc>What are profile verifications and how do I get them?</a></li>                                  
                                        </ul>
                                    </div>
                                    <div class="search-panel-content hide-elem" id="search_desc_div">
                                    </div>
                                    <div class="help-link-bottom"><a href="http://tutify.com.sg/Help/helpView"><span>Help Center</span></a></div>
                                </ul>
                            </li>
                            <li><a href="#">Engagements<img class="img-responsive" style="margin-top: -2px;" src="{{ url('public/sites/users/images/engagement-icon.png')}}"></a></li>
                            <li><a href="#">Messages <img class="img-responsive" src="{{ url('public/sites/users/images/massage-icon.png')}}"></a>
                                <div class="msg-count hidden"><span></span></div>
                                <ul class="sub-menu">
                                    <div class="search-input-container">
                                        <input class="search-input" type="text" placeholder="How can we help you?">
                                    </div>
                                    <div class="search-panel-content">
                                        <div class="search-panel-header">Suggested Articles</div>
                                        <li><a href="#">Getting Started Guide</a></li>
                                        <li><a href="#">Change a reservation as a host</a></li>
                                        <li><a href="#" class="">How do I pay for my reservation?</a></li>
                                        <li><a href="#" class="">How does Airbnb process payments?</a></li>
                                        <li><a href="#" class="">What is Verified ID?</a></li>
                                        <li><a href="#" class="">What is a cancellation policy?</a></li>
                                        <li><a href="#" class="">How do I pay for my reservation?</a></li>
                                    </div>
                                    <div class="help-link-bottom"><a href=""><span>Help Center</span></a></div>
                                </ul>
                            </li>
                            <li><a href="#" class=""> 
                                    <?php
                                        if(@$userDetails->social_login_type == 'facebook' || @$userDetails->social_login_type == 'google' ){
                                            $avator = $userDetails->avatar?$userDetails->avatar: url('public/sites/users/images/default_profile_user_img.png');
                                        }else{
                                            $url = $userDetails->avatar ? $imgFolder.'/'.@$userDetails->id.'/'.@$userDetails->avatar:'default_profile_user_img.png';
                                            $avator = url('public/sites/images').'/'.$url;
                                        }
                                    ?>
                                    <?= @$userDetails->name; ?><img class="img-responsive personal-user-icon" src="{{$avator}}">	     
                                </a>
                                <ul class="sub-menu profile-sub-menu"> 
                                    <li><a href="{{url("/editprofile")}}/<?= @$userDetails->id; ?>">Edit Profile</a></li>
                                    <li><a href="{{url('change_password')}}">Change Password</a></li>
                                    <li><a href="{{ route('logout') }}"onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Log Out') }}</a></li>				    
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <!-- /.navbar-collapse -->
                </nav>
            </div>
            <nav class="mobile">
                <div class="mob-navigation">
                    <div class="usr-detail">
                        <img class="img-responsive personal-user-icon" src="{{ url('public/sites/users/images/default_profile_user_img.png')}}">
                        <strong>Hqnsbiy4nv</strong>
                    </div>
                    <ul>
                        <li><a href="/">Home</a></li>
                        <li><a href="{{url('editprofile')}}/{{ @$userDetails->id}}">Profile</a></li>
                        <li><a href="{{ route('logout') }}">Log Out</a></li>
                        <li><a href="#">Search</a></li>
                        <li><a href="">How it Works</a></li>
                        <li><a href="">Help</a></li>
                    </ul>
                </div>
                <div class="nav_bg">
                    <div class="nav_bar">
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </div>
            </nav>


            <div class="header-searchbar">
                <form action="#" role="search" id="formS25" method="get" accept-charset="utf-8">
                    <div class="inner-header-serach-sec">
                            <div class="search-icon"><!--  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" style="fill: currentcolor; height: 1em; width: 1em; display: block;"><path fill-rule="evenodd" d="M23.53 22.47l-6.807-6.808A9.455 9.455 0 0 0 19 9.5 9.5 9.5 0 1 0 9.5 19c2.353 0 4.502-.86 6.162-2.277l6.808 6.807a.75.75 0 0 0 1.06-1.06zM9.5 17.5a8 8 0 1 1 0-16 8 8 0 0 1 0 16z"/></svg> --> <img src="{{ asset('public/sites/users/images/search-icon-new.png')}}" alt=""></div>
                        <div class="search-input-sec">
                            <input type="hidden" name="subject_id" id="search_subject_id" value="">
                            <input type="hidden" name="search_for" id="" value="1">
                            <input type="search" name="subject_name" id="search_subject_name" placeholder="Search for a subject" class="">
                        </div>
                    </div>
                </form> 	
            </div>    
        </div>

        <div id="menu" class="col-lg-12 col-md-12 col-sm-12 col-xs-12 nopadding  {{ @$active == 'invitefriend'?'bgDark':''}}">
            <div class="container">
                <div id="menu-top" class="clearfix" style="display:none">
                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 text-left">
                        Menu
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 text-right">
                        <span id="menu-arrow"><img src="{{ url('public/sites/users/images/menu-down-arrow.png')}}" alt=""></span>
                    </div>
                </div>
                <ul id="menu-list">
                    <li class="{{ @$active == 'dashboard'?'active':''}}">
                        <a href="{{url('/lc/dashboard')}}">Dashboard</a>
                    </li>

                    <li class="{{ @$active == 'inbox'?'active':''}}">
                        <a href="{{url('/inbox')}}">Inbox</a>
                    </li>

                    <li class="{{ @$active == 'listing'?'active':''}}">
                        <a href="{{url('/listing/listing_request')}}">Your Listings</a>
                    </li>


                    <li class="{{ @$active == 'engagement'?'active':''}}">
                        <a href="#">Your Engagements</a>
                    </li>

                    <li class="{{ @$active == 'editprofile'?'active':''}}">
                        <a href="{{asset('editprofile')}}/{{@$userDetails->id}}">Profile</a>
                    </li>
                    <li class="{{ @$active == 'account'?'active':''}}">
                        <a href="{{url('account')}}">Account</a>
                    </li>
                    <li class="{{ @$active == 'subscribe'?'active':''}}">
                        <a href="{{url('plans')}}">Subscribe</a>
                    </li>
                    <li class="{{ @$active == 'invitefriend'?'active':''}}">
                        <a href="{{url('inviteafriend')}}">Invite Friends</a>
                    </li>
                    <li class="{{ @$active == 'onlinePractice'?'active':''}}">
                        <a href="{{url('onlinePractice')}}">Online Practice</a>
                    </li>
                </ul>
            </div>	
        </div>
        @if(Session::has('message'))
        <p class="alert {{ Session::get('alert-class') }}">{{ Session::get('message') }}</p>
        @endif