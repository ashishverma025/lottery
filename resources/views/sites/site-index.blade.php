@extends('sites.layout.Sites')
@section('content')

<!--- Start Home Slider --->
<div id="carouselExampleFade" class="carousel slide carousel-fade bannerslider" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
    </ol>
    <div class="carousel-inner" role="listbox">
        <div class="carousel-item active"> <img src="{{ url('public/sites/images/banner.jpg') }}" alt=""> </div>
        <div class="carousel-item"> <img src="{{ url('public/sites/images/banner.jpg') }}" alt=""> </div>
        <div class="carousel-item"> <img src="{{ url('public/sites/images/banner.jpg') }}" alt=""> </div>
        <div class="carousel-item"> <img src="{{ url('public/sites/images/banner.jpg') }}" alt=""> </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev"> <span class="fa fa-chevron-left btn-slide" aria-hidden="true"></span> <span class="sr-only">Previous</span> </a> <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next"> <span class="fa fa-chevron-right btn-slide" aria-hidden="true"></span> <span class="sr-only">Next</span> </a> </div>
<!--- End Home Slider ---> 

<!--- Start Services --->
<div class="services">
    <div class="container">
        <div class="row">
            <div class="col-xl-4 col-lg-4 col-md-4">
                <div class="card service_item bg-1">
                    <h3 class="sub-title-top">Lotto 5/39</h3>
                    <h2 class="title-main">Over <span>Kes 2.5</span> Million</h2>
                    <h4 class="sub-title-bottom">Daily Drow</h4>
                    @guest
                    <a href="#" id="loginModal" class="btn btn-primary btn-lg play-now-btn">Play Now</a> </div>
                    @else
                    <a href="game/1" class="btn btn-primary btn-lg play-now-btn">Play Now</a> </div>
                    @endguest
        </div>
        <div class="col-xl-4 col-lg-4 col-md-4">
            <div class="card service_item bg-2">
                <h3 class="sub-title-top">Kenno</h3>
                <h2 class="title-main">Up to <span>Kes 12.5</span> Million</h2>
                <h4 class="sub-title-bottom">Every 30 Minutes</h4>
                <a href="#" class="btn btn-primary btn-lg play-now-btn">Play Now</a> </div>
        </div>
        <div class="col-xl-4 col-lg-4 col-md-4">
            <div class="card service_item bg-3">
                <h3 class="sub-title-top">Lotto 5/39</h3>
                <h2 class="title-main">Up To <br>
                    <span>Kes</span> 300k</h2>
                <h4 class="sub-title-bottom">Every 30 Minutes</h4>
                <a href="#" class="btn btn-primary btn-lg play-now-btn">Play Now</a> </div>
        </div>
    </div>
</div>
</div>
<!--- End Services ---> 

<!--- Scratch & Win --->

<div class="scratch-win-section">
    <div class="container">
        <div class="game-content">
            <div class="row px-md-3 mb-3 title-heading">
                <div class="col-md-12 col-12 mb-2 text-center">
                    <h2 class="title">Scratch &amp; Win</h2>
                </div>
            </div>
            <div class="d-flex flex-wrap gallery-section">
                <div class="row mx-0 w-100 h-100">
                    <div class="col-md-6 col-12 px-0 col-left">
                        <div class="lobby-game">
                            <figure> <img src="{{ url('public/sites/images/gallery-img1.jpg') }}" class="img-fluid" alt=""> </figure>
                        </div>
                    </div>
                    <div class="col-md-6 col-12 px-0 pt-0 col-right">
                        <div class="row mx-0">
                            <div  class="col-6 px-0 pl-2">
                                <div  class="lobby-game img-wrap">
                                    <figure> <img src="{{ url('public/sites/images/gallery-img2.jpg') }}" class="img-fluid" alt=""> </figure>
                                </div>
                            </div>
                            <div class="col-6 px-0 pl-2">
                                <div class="lobby-game img-wrap">
                                    <figure> <img src="{{ url('public/sites/images/gallery-img3.jpg') }}" class="img-fluid" alt=""> </figure>
                                </div>
                            </div>
                            <div class="col-6 px-0 pl-2">
                                <div  class="lobby-game img-wrap">
                                    <figure> <img src="{{ url('public/sites/images/gallery-img4.jpg') }}" class="img-fluid" alt=""> </figure>
                                </div>
                            </div>
                            <div class="col-6 px-0 pl-2 ">
                                <div  class="lobby-game img-wrap">
                                    <figure> <img src="{{ url('public/sites/images/gallery-img5.jpg') }}" class="img-fluid" alt=""> </figure>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row px-md-3 mb-3 m-auto pt-3">
                    <div class="col-md-12 col-12 mb-2 text-center"> <a href="#" class="btn btn-primary btn-lg view-more-btn">View All</a> </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!---End Scratch & Win --->

<div class="year-impact-section">
    <div class="container">
        <div class="row px-md-5 px-1 year-impact-content pt-md-0 pt-4">
            <div class="col-lg-3 col-4 m-auto">
                <div class="text-center"> <img alt="" class=" img-fluid year-impact-50-years" src="{{ url('public/sites/images/50year-logo.png') }}"> </div>
            </div>
            <div class="col-lg-4 my-auto col-8 px-md-0 px-4 pt-md-0 pt-2">
                <div class="">
                    <h2 class="font-weight-bold font-3 custom-color font-chronica-regular text-uppercase text-white">Years of Impact</h2>
                    <div class="web-year-impact-content">
                        <p class="text-left mb-md-0 mb-1">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-12 m-auto">
                <div class="web-year-impact-img text-center w-100"> <img alt="" class="web-year-impact-slides w-100" src="{{ url('public/sites/images/pexels-photo-5792861.jpeg') }}"> </div>
            </div>
        </div>
    </div>
</div>

<div class="quickgame">
    <div class="container">
        <div class="row">
            <div class="col-md-12 heading">
                <h2>Quick Game</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 quickright">
                <img src="{{ url('public/sites/images/quickgameleft.jpg') }}"/>
            </div>
            <div class="col-md-8 quickleft" style="background: url({{ url('public/sites/images/back.jpg') }});">
                <div class="text">
                    <h2>Play Straight From M-Pesa</h2>
                    <input type="text" placeholder="5/39" class="form-control topscore"/>
<!--                    <div class="mobile">
                        <select id="cars" name="cars" class="form-control countrycode">
                            <option value="+254">+254</option>
                            <option value="+254">+254</option>
                            <option value="+254">+254</option>
                            <option value="+254">+254</option>
                        </select>
                        <input type="text" class="form-control mobilenumber"/>
                        <select id="country"h name="country" class="form-control country">
                            <option value="+SAF">SAF</option>
                            <option value="+AIR">AIR</option>
                            <option value="+TKL">TKL</option>
                        </select>
                    </div>-->
                    <p>Enter 5 numbers from 1 to 39. Or select Random Picks</p>
                    <div class="selectpicks">
                        <input type="button" value="Play now" class="fullbtn form-control"/></button>
                        <ul>
                            <li class="singlevalue"><input type="text" value="5" class="form-control single"/></li>
                            <li class="singlevalue"><input type="text" value="22" class="form-control single"/></li>
                            <li class="singlevalue"><input type="text" value="8" class="form-control single"/></li>
                            <li class="singlevalue"><input type="text" value="25" class="form-control single"/></li>
                            <li class="singlevalue"><input type="text" value="39" class="form-control single"/></li>
                        </ul>
                    </div>
                    <input type="text" placeholder="Enter your stake here Min KES 50 - Max KES 1000" class="form-control finaltext"/>
                    <input type="button" placeholder="Play now" value="Play now" class="form-control lastbtn"/></button>
                    <p class="lastpara">Enter 5 numbers from 1 to 39. Or select Random Picks</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!--- Block Artical --->

<div class="blog-section">
    <div class="container">
        <div class="row heading">
            <h2 class="title">ARTICLES ABOUT BETTING SITES IN INDIA</h2>
        </div>
        <div class="articlesingle">
            <div class="row">
                <div class="col-lg-4 col-md-4">
                    <div class="image">
                        <a href="#">
                            <figure>
                                <img src="{{ url('public/sites/images/article-img1.jpg') }}"  class="img-fluid" alt="">
                            </figure>
                        </a>
                    </div>
                </div>
                <div class="col-lg-8 col-md-8">
                    <div class="text">
                        <h3><a href="#" title="How to choose a betting site in India">How to choose a betting site</a></h3>
                        <div class="info">
                            <span class="date">6 February 2019</span>
                        </div>
                        <p>Choosing which betting site to join is one of the most important decisions you will make in your online betting adventure. Each betting site has strong sides and weak sides, and this article will help you choose the best site for your preferences.
                        </p>
                        <a href="#" class="read-more-btn">Read More</a>
                    </div>
                </div>
            </div>

            <hr>
            <div class="row">
                <div class="col-lg-4 col-md-4">
                    <div class="image">
                        <a href="#">
                            <figure>
                                <img src="{{ url('public/sites/images/article-img2.jpg') }}"  class="img-fluid" alt="">
                            </figure>
                        </a>
                    </div>
                </div>
                <div class="col-lg-8 col-md-8">
                    <div class="text">
                        <h3><a href="#" title="How to choose a betting site in India">New Betting Sites (2020)</a></h3>
                        <div class="info">
                            <span class="date">6 February 2019</span>
                        </div>
                        <p>Choosing which betting site to join is one of the most important decisions you will make in your online betting adventure. Each betting site has strong sides and weak sides, and this article will help you choose the best site for your preferences.
                        </p>
                        <a href="#" class="read-more-btn">Read More</a>
                    </div>
                </div>
            </div>
        </div>


    </div>
</div>


@endsection
