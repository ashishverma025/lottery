<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- <link rel="stylesheet" href="{{ asset('public/css/app.css') }}"> -->

        <!-- Bootstrap core CSS -->
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <!-- FontAwesome CSS -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet">
        <link rel="icon" href="{{ asset('public/sites/images/favicon.ico') }}" type="image/ico" sizes="16x16">

        <!-- Custom styles  -->
        <link href="{{asset('public/sites/css/custom.css')}}" rel="stylesheet">
        <link href="{{asset('public/sites/css/responsive.css')}}" rel="stylesheet">

        <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
        @yield('css')

        <title>{{config('app.name')}}</title>
    </head>
    <style type="text/css">
    .active{
        border-bottom: 2px solid #000;
    }
    </style>
    <body>

        <!--main-header-->
        <div class="top-header">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-sm-12 col-xs-12">
                        <a href="{{  url('/') }}"><img src="{{ asset('public/sites/images/logo.png') }}"></a>

                    </div>
                    <div class="col-md-4 col-sm-12 col-xs-12">
                        <div class="top-mainn-cls">
                            <input type="text" class="search-text" placeholder="Email address" name="Email address">
                            <button type="button" class="search-buton"><i class="fa fa-search" aria-hidden="true"></i></button>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12 col-xs-12">
                        <div class="top-login-wrap">
                            <ul>
                                <li><a href="{{ route('login') }}"><i class="fa fa-sign-in" aria-hidden="true"></i> login</a></li>
                                <li><a href="{{ route('register') }}"><i class="fa fa-sign-in" aria-hidden="true"></i> Register</a></li>
                                <li><i class="fa fa-shopping-bag bags"></i></li>
                            </ul>
                        </div>
						
						
						  <div class="dropdown">
                <button type="button" class="btn btn-info" data-toggle="dropdown">
                    <i class="fa fa-shopping-cart" aria-hidden="true"></i> Cart <span class="badge badge-pill badge-danger">

                    @if(session('cart')!==null)
                    {{ count(session('cart')) }}
                    @endif
            
                </span>
                </button>
                <div class="dropdown-menu">
                    <div class="row total-header-section">
                        <div class="col-lg-6 col-sm-6 col-6">
                            <i class="fa fa-shopping-cart" aria-hidden="true"></i> <span class="badge badge-pill badge-danger">
							
							
							
							
							  @if(session('cart')!==null)
                    {{ count(session('cart')) }}
                    @endif
							
							</span>
                        </div>

                        <?php $total = 0 ?>
						
							@if(session('cart')!==null)
							@foreach(session('cart') as $id => $details)
							  <?php $total += $details['price'] * $details['quantity'] ?>
							@endforeach
							@endif
						
						
                     

                        <div class="col-lg-6 col-sm-6 col-6 total-section text-right">
                            <p>Total: <span class="text-info">$ {{ $total }}</span></p>
                        </div>
                    </div>

                    @if(session('cart'))
                        @foreach(session('cart') as $id => $details)
                            <div class="row cart-detail">
                                <div class="col-lg-4 col-sm-4 col-4 cart-detail-img">
                                    <img src="{{ asset('public/images/books/original/'.$details['photo']) }}" />
                                </div>
                                <div class="col-lg-8 col-sm-8 col-8 cart-detail-product">
                                    <p>{{ $details['name'] }}</p>
                                    <span class="price text-info"> ${{ $details['price'] }}</span> <span class="count"> Quantity:{{ $details['quantity'] }}</span>
                                </div>
                            </div>
                        @endforeach
                    @endif
                    <div class="row">
                        <div class="col-lg-12 col-sm-12 col-12 text-center checkout">
                            <a href="{{ url('cart') }}" class="btn btn-primary btn-block">View all</a>
                        </div>
                    </div>
                </div>
            </div>
						
                    </div>
                </div>
                <div class="navigation-main">
                    <div class="container">
                        <div class="fix-sc" data-toggle="sticky-onscroll">
                            <nav class="cust-nav navbar header-top navbar-expand-lg navbar-dark container">

                                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                                    <span class="navbar-toggler-icon"></span>
                                </button>
                                <div class="collapse navbar-collapse" id="navbarText">
                                    <ul class="navbar-nav">
                                        <li class="nav-item">
                                            <a class="nav-link " href="" onClick="slideDownwindow('home')">BUY </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link {{ request()->is('sell*') ? 'active' : '' }}" href="{{url('/sell')}}" onClick="slideDownwindow('about')">SELL</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link  {{ request()->is('apparel*') ? 'active' : '' }}" href="{{url('/apparel')}} " onClick="slideDownwindow('reifen')">APPAREL</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link {{ request()->is('who*') ? 'active' : '' }}" href="{{url('/who')}}" onClick="slideDownwindow('anhanger')">WHO WE ARE</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link {{ request()->is('faq*') ? 'active' : '' }}" href="{{url('/faq')}}" onClick="slideDownwindow('kfz')">FAQ</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="" onClick="slideDownwindow('kontakt')">SEARCH</a>
                                        </li>
                                    </ul>
                                    <div class="right-text">
                                        <ul>
                                            <li><i class="fa fa-twitter" aria-hidden="true"></i></li>
                                            <li><i class="fa fa-facebook-f"></i></li>
                                            <li><i class="fa fa-instagram"></i></li>
                                            <li><i class="fa fa-shopping-cart" aria-hidden="true"></i></li>

                                        </ul>
                                    </div>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>


    @yield('content')


    <!-- footer section starts-->
    <section class="kontact" id="contact">
        <div class="container-fluid">
            <div class="kfz-servics-main">
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="kontact-icons">
                            <img src="{{ asset('public/sites/images/logo.png') }}">

                        </div>
                        <div class="social-icons">
                            <i class="fa fa-facebook-f"></i>
                            <i class="fa fa-twitter"></i>
                            <i class="fa fa-google-plus-square"></i>
                            <i class="fa fa-rss"></i>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="manues">

                            <ul>
                                <li><a>Search</a></li>
                                <li><a>Buy</a></li>
                                <li><a>FAQ</a></li>
                                <li><a>Contact Us</a></li>
                                <li><a>Sell</a></li>
                            </ul>

                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="text-cls">   <h6>Search for your books here first!</h6>
                            <p>Here at School Shark we work hard to make sure all of our listings are up to date and ready for you to buy to get you the best deal possible. Take advantage of that! </p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="form-sec"> <p>Sign up to our email list for only important updates and deals! (You hate spam? So do we!)</p>
                            <div class="form-vbxcv"><input type="text" class="email-text" placeholder="Email address">
                                <button type="button" class="subs-buton">Subscribe</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

    </section>
    <!-- end of footer section-->
    <!-- copyright section starts-->
    <div class="copyright">
        <div class="container">
            <div class="row">
                <div class="col-md-5 col-sm-12 col-xs-12">
                    <p> © 2019, School Shark Powered by Shopify </p>
                </div>
                <div class="col-md-7 col-sm-12 col-xs-12">
                    <div class="iconddf-img">
                        <img src="{{ asset('public/sites/images/amex.png') }}">
                        <img src="{{ asset('public/sites/images/black-pay.png') }}">
                        <img src="{{ asset('public/sites/images/sdvd.png') }}">
                        <img src="{{ asset('public/sites/images/yeloww.png') }}">
                        <img src="{{ asset('public/sites/images/colg.png') }}">
                        <img src="{{ asset('public/sites/images/circ.png') }}">
                        <img src="{{ asset('public/sites/images/payy.png') }}">
                        <img src="{{ asset('public/sites/images/pay.png') }}">
                        <img src="{{ asset('public/sites/images/vs.png') }}">
                        <img src="{{ asset('public/sites/images/visa.png') }}">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- copyright section ends-->



<!-- Bootstrap core JavaScript -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>

<script type="text/javascript">
// Sticky navbar
// =========================
    $(document).ready(function () {


        // Custom function which toggles between sticky class (is-sticky)
        var stickyToggle = function (sticky, stickyWrapper, scrollElement) {
            var stickyHeight = sticky.outerHeight();
            var stickyTop = stickyWrapper.offset().top;

            if (scrollElement.scrollTop() >= stickyTop) {
                stickyWrapper.height(stickyHeight);
                sticky.addClass("is-sticky");

            }
            else {
                sticky.removeClass("is-sticky");
                stickyWrapper.height('auto');
            }
        };

        // Find all data-toggle="sticky-onscroll" elements
        $('[data-toggle="sticky-onscroll"]').each(function () {
            var sticky = $(this);
            var stickyWrapper = $('<div>').addClass('sticky-wrapper'); // insert hidden element to maintain actual top offset on page
            sticky.before(stickyWrapper);
            sticky.addClass('sticky');

            // Scroll & resize events
            $(window).on('scroll.sticky-onscroll resize.sticky-onscroll', function () {
                stickyToggle(sticky, stickyWrapper, $(this));
            });

            // On page load
            /* stickyToggle(sticky, stickyWrapper, $(window));*/
        });

    });

///////////////////////////////////////

    new WOW().init();
    if ($(window).width() <= 991) {
        $('.wow').addClass('wow-removed').removeClass('wow');
    } else {
        $('.wow-removed').addClass('wow').removeClass('wow-removed');
    }

</script>

@yield('pagescript')


</body>
</html>
