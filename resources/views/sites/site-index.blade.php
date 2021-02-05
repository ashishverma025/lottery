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
        <div class="carousel-item active"> <img src="{{ asset('sites/images/banner.jpg') }}" alt=""> </div>
        <div class="carousel-item"> <img src="{{ asset('sites/images/banner.jpg') }}" alt=""> </div>
        <div class="carousel-item"> <img src="{{ asset('sites/images/banner.jpg') }}" alt=""> </div>
        <div class="carousel-item"> <img src="{{ asset('sites/images/banner.jpg') }}" alt=""> </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev"> <span class="fa fa-chevron-left btn-slide" aria-hidden="true"></span> <span class="sr-only">Previous</span> </a> <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next"> <span class="fa fa-chevron-right btn-slide" aria-hidden="true"></span> <span class="sr-only">Next</span> </a> </div>

<div class="services">
    <div class="container">
        <div class="row">
            @if(!empty($betListDetail))
            @foreach($betListDetail as $bet)
            <div class="col-xl-4 col-lg-4 col-md-4">
                <div class="card service_item bg-1">
                    <h3 class="sub-title-top">Lotto {{$bet['start_number']}}/{{$bet['end_number']}}</h3>
                    <h2 class="title-main">{{$bet['bet_name']}} <span>EUR {{$bet['winning_amount']}}</span> Million</h2>
                    <h4 class="sub-title-bottom">Daily Drow</h4>
                    @guest
                    <a href="#" id="loginModal" class="btn btn-primary btn-lg play-now-btn">Play Now</a> 
                    @else
                    <a href="{{url('/bet')}}/{{$bet['id']}}" class="btn btn-primary btn-lg play-now-btn">Play Now</a> 
                    @endguest
                </div>
            </div>
            @endforeach
            @endif
            <!--            <div class="col-xl-4 col-lg-4 col-md-4">
                            <div class="card service_item bg-1">
                                <h3 class="sub-title-top">Lotto 5/39</h3>
                                <h2 class="title-main">Over <span>Kes 2.5</span> Million</h2>
                                <h4 class="sub-title-bottom">Daily Drow</h4>
                                @guest
                                <a href="#" id="loginModal" class="btn btn-primary btn-lg play-now-btn">Play Now</a> 
                                @else
                                <a href="bet_list" class="btn btn-primary btn-lg play-now-btn">Play Now</a> 
                                @endguest
                            </div>
                        </div>-->
        </div>
    </div>
</div>

<div class="row px-md-3 mb-3 m-auto pt-3">
    <div class="col-md-12 col-12 mb-2 text-center"> <a href="{{url('bet_list')}}" class="btn btn-primary btn-lg view-more-btn">View All</a> </div>
</div>
<!--- End Services ---> 
<!--- End Home Slider ---> 
<div class="quickgame">
    <div class="container">
        <div class="row">
            <div class="col-md-12 heading">
                <h2>Quick Bet</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 quickright">
                <img src="{{ asset('sites/images/quickgameleft.jpg') }}"/>
            </div>
            <div class="col-md-8 quickleft" style="background: url({{ asset('sites/images/back.jpg') }});">
                <div class="text">
                    <h2>Play Straight From M-Pesa</h2>
                    <span class="successMsg"></span>
                    <input type="text"  placeholder="5/39" class="form-control topscore"/>
                    <div class="mobile">
                        <select id="bet_id" name="bet_id" class="form-control col-md-6">
                            <option value="" >Select Bet</option>
                            @if(!empty($betListDetail))
                            @foreach($betListDetail as $bet)
                            <option value="{{$bet['id']}}" data-betname="{{$bet['winning_amount']}}" >{{$bet['bet_name']}}</option>
                            @endforeach
                            @endif

                        </select><!-- 
                        <input type="text" class="form-control mobilenumber"/>
                        <select id="country"h name="country" class="form-control country">
                            <option value="+SAF">SAF</option>
                            <option value="+AIR">AIR</option>
                            <option value="+TKL">TKL</option>
                        </select>
                        -->
                    </div>
                    <p>Enter 5 numbers from 1 to 39. Or select Random Picks</p>
                    <div class="selectpicks">
                        <input type="button" value="Random Picks" class="fullbtn form-control randomNumber"/></button>
                        <ul>
                            <li class="singlevalue"><input type="text" name="num1" value="5" class="form-control single firstcircle"/></li>
                            <li class="singlevalue"><input type="text" name="num2" value="22" class="form-control single secondcircle"/></li>
                            <li class="singlevalue"><input type="text" name="num3" value="8" class="form-control single thirdcircle"/></li>
                            <li class="singlevalue"><input type="text" name="num4" value="25" class="form-control single fourthcircle"/></li>
                            <li class="singlevalue"><input type="text" name="num5" value="39" class="form-control single fifthcircle"/></li>
                        </ul>
                    </div>
                    <input type="text" value="" style="width:33%;" name="amount" placeholder="EUR" class="form-control finaltext" readonly />
            </div>
        </div>
    </div>
</div>
<!--- Start Services --->
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
                            <figure> <img src="{{ asset('sites/images/gallery-img1.jpg') }}" class="img-fluid" alt=""> </figure>
                        </div>
                    </div>
                    <div class="col-md-6 col-12 px-0 pt-0 col-right">
                        <div class="row mx-0">
                            <div  class="col-6 px-0 pl-2">
                                <div  class="lobby-game img-wrap">
                                    <figure> <img src="{{ asset('sites/images/gallery-img2.jpg') }}" class="img-fluid" alt=""> </figure>
                                </div>
                            </div>
                            <div class="col-6 px-0 pl-2">
                                <div class="lobby-game img-wrap">
                                    <figure> <img src="{{ asset('sites/images/gallery-img3.jpg') }}" class="img-fluid" alt=""> </figure>
                                </div>
                            </div>
                            <div class="col-6 px-0 pl-2">
                                <div  class="lobby-game img-wrap">
                                    <figure> <img src="{{ asset('sites/images/gallery-img4.jpg') }}" class="img-fluid" alt=""> </figure>
                                </div>
                            </div>
                            <div class="col-6 px-0 pl-2 ">
                                <div  class="lobby-game img-wrap">
                                    <figure> <img src="{{ asset('sites/images/gallery-img5.jpg') }}" class="img-fluid" alt=""> </figure>
                                </div>
                            </div>
                        </div>
                    </div>
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
                <div class="text-center"> <img alt="" class=" img-fluid year-impact-50-years" src="{{ asset('sites/images/50year-logo.png') }}"> </div>
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
                <div class="web-year-impact-img text-center w-100"> <img alt="" class="web-year-impact-slides w-100" src="{{ asset('sites/images/pexels-photo-5792861.jpeg') }}"> </div>
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
                                <img src="{{ asset('sites/images/article-img1.jpg') }}"  class="img-fluid" alt="">
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
                                <img src="{{ asset('sites/images/article-img2.jpg') }}"  class="img-fluid" alt="">
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
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

<script>
$("#bet_id").change(function () {
    var betAmount = $(this).find(':selected').attr('data-betname');
    $("input[name=amount]").val('EUR '+betAmount)
});

$("#addbet").click(function () {
    var num1 = $("input[name=num1]").val()
    var num2 = $("input[name=num2]").val()
    var num3 = $("input[name=num3]").val()
    var num4 = $("input[name=num4]").val()
    var num5 = $("input[name=num5]").val()
    var amount = $("input[name=amount]").val()
    var bet_id = $("#bet_id").val()

    if (num1 != '' && num2 != '' && num3 != '' && num4 != '' && num5 != '' && amount != 0 && bet_id != '' ) {

        $.ajax({
            url: "{{url('adduserBet')}}",
            type: 'post',
            data: {num1: num1, num2: num2, num3: num3, num4: num4, num5: num5, amount: amount, bet_id: bet_id, },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (quickBetId) {
                console.log(quickBetId + 'quickBetId')
                if (quickBetId != '') {
                    localStorage.userBetId = quickBetId
                    $(".successMsg").html('Please proceed for payment.')
                }
                setTimeout(function () {
                    $(".successMsg").html('')
                    window.location.href = "{{url('payment')}}/" + bet_id
                }, 3000);
            }
        });
    } else {
        alert('Please fill all fields.')
    }
});


$(".randomNumber").click(function () {
    var fval = Math.floor(Math.random() * 99);
    $(".firstcircle").val(fval)

    var sval = Math.floor(Math.random() * 99);
    $(".secondcircle").val(sval)

    var tval = Math.floor(Math.random() * 99);
    $(".thirdcircle").val(tval)

    var frthval = Math.floor(Math.random() * 99);
    $(".fourthcircle").val(frthval)

    var fvval = Math.floor(Math.random() * 99);
    $(".fifthcircle").val(fvval)

})
</script>
@endsection
