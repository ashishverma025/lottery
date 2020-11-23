<!doctype html>
<html lang="en">

<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	<title>Tutify|Home</title>
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<meta name="route" content="{{ url('/') }}">
	<!-- css stylesheet -->
	<link href="{{ asset('public/sites/css/font-awesome.min.css') }}" rel="stylesheet">
	<link href="{{ asset('public/sites/css/owl-animate.css') }}" rel="stylesheet">
	<link href="{{ asset('public/sites/css/bootstrap.min.css') }}" rel="stylesheet">
	<link href="{{ asset('public/sites/css/owl.carousel.min.css') }}" rel="stylesheet">
	<link href="{{ asset('public/sites/css/owl.theme.default.min.css') }}" rel="stylesheet">
	<link href="{{ asset('public/sites/css/style.css') }}" rel="stylesheet">
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
                  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js') }}"></script>
                  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js')}}"></script>
              <![endif]-->
              <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
              <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
              <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
              <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
              <style>




            /*select#years {
                margin-right: 46px !important;
            }
    
            select#months {
                margin-right: 14px !important;
            }
    
            select#days {
                margin-right: 30px !important;
                }*/
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
        						<div class="logo"> <a class="navbar-brand" href="#"><img src="{{ asset('public/sites/images/logo.png') }}" alt="" class="img-responsive"></a> </div>
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
        							<li class="tour-btn"><a href="{{asset('lc/dashboard')}}">Visit Dashboard</a></li>
        							@if(empty($LcDetails))
        							<li class="tour-btn"><a href="{{asset('becomeaeducation_partner')}}">Become an education Partner</a></li>
        							@else
        							<li class="tour-btn"><a href="{{asset('lc/dashboard')}}">Become an education Partner</a></li>
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
        		

        		<!---Get Tutified Today--->
        		<section class="get-tutified_section">
        			<div class="container">
        				<div class="row">
        					<div class="col-sm-12">
        						<div class="title-heading text-white">
        							<img src="{{ asset('public/sites/images/title-before-white.png') }}" alt="">
        							<h2>Privacy & Policy</h2>
        							<h3>The information we learn from you helps us provide, personalize, and continually improve the Services. Here are the types of information we gather:

        								Information You Give Us: We receive and store any information you enter on our website, provide using the Services, or give us in any other way. Click here to see examples of what we collect. You can choose not to provide certain information, but then you might not be able to use the Services. We use the information that you provide for such purposes as opening your account, processing your transactions, responding to your requests, and communicating with you.
        								Automatic Information: We receive and store certain types of information whenever you interact with us. For example, like many websites, we use "cookies," and we obtain certain types of information when your Web browser accesses our Services. Click here to see examples of the information we receive. When you interact with a third-party site that uses one of our Services, such as Checkout by Amazon, our servers automatically record information that your browser sends. Click here to see examples of the information your browser may send.
        								Mobile: When you download or use apps we create or are created by our affiliates, we may receive information about your location and your mobile device, including a unique identifier for your device. We may use this information to provide you with location-based services, such as advertising, search results, and other personalized content. Most mobile devices allow you to turn off location services. For more information about how to do this, click here.
        								Our Communications with Users: Among other things, we communicate with users on a regular basis via e-mail, and we communicate by phone to resolve user complaints or investigate suspicious transactions. We also use your e-mail address to send you notice of payments that you send or receive through our Services, to send information about important changes to our Services, and to send notices and other disclosures required by law. You agree to receive such communications electronically. We may send you promotional messages about new services, offers or opportunities that may interest you. If you do not want to receive promotional messages or other mail from us, please adjust "your communication preferences" under Your Account on Amazon.com. However, we reserve the right to send you notices for customer service reasons, including notices about your account or transactions using our Services. Also, to help us make e-mails more useful and interesting, we may receive a confirmation when you open or receive e-mail from us. We also compare our customer list to lists received from other companies, in an effort to avoid sending unnecessary messages to our customers.
        								Information from Other Sources: We might receive information about you from other sources and add it to our account information. Click here to see examples of the information we receive.
        							</h3>
        						</div>
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
        								<img class="img-responsive" src="{{ asset('public/sites/images/footer-logo.png') }}">
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
        							    <li><a href="{{ asset('privacy-policy') }}">Privacy & Policy</a></li>
        							    <li><a href="{{ asset('terms-of-service') }}">Terms of service</a></li>
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
        		<script src="{{ asset('public/sites/js/jquery-3.4.1.min.js') }}"></script>
        		<!-- Include all compiled plugins (below), or include individual files as needed -->
        		<script src="{{ asset('public/sites/js/bootstrap.min.js') }}"></script>
        		<script src="{{ asset('public/sites/js/owl.carousel.min.js')}}"></script>
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
                            var dob = years + '-' + months + '-'+days
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