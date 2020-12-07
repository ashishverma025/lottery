@extends('sites.layout.Sites')
@section('content')

<!--- INNER PAGE BANNER START --->
<div class="innerbanner" style="background: url({{url('public/sites/images/innerbanner.jpg')}})">

</div>
<!--- INNER PAGE BANNER END --->

<!--- GAME PLAY START --->
<div class="gameplay">
    <div class="container gameplayinner">
        <div class="row">
            <div class="col-md-5 gameplayinnerleft">
                <h2>Select 5 Numbers</h2>
                <p>(From 0-9)</p>
                <div class="numberbox">
                    <span class="frstrow">1</span>
                    <span class="frstrow">2</span>
                    <span class="frstrow">3</span>
                    <span class="frstrow">4</span>
                    <span class="frstrow">5</span>
                    <span class="frstrow">6</span>
                    <span class="frstrow">7</span>
                    <span class="frstrow">8</span>
                    <span class="frstrow">9</span>

                    <span class="scndrow">1</span>
                    <span class="scndrow">2</span>
                    <span class="scndrow">3</span>
                    <span class="scndrow">4</span>
                    <span class="scndrow">5</span>
                    <span class="scndrow">6</span>
                    <span class="scndrow">7</span>
                    <span class="scndrow">8</span>
                    <span class="scndrow">9</span>

                    <span class="thrdrow">1</span>
                    <span class="thrdrow">2</span>
                    <span class="thrdrow">3</span>
                    <span class="thrdrow">4</span>
                    <span class="thrdrow">5</span>
                    <span class="thrdrow">6</span>
                    <span class="thrdrow">7</span>
                    <span class="thrdrow">8</span>
                    <span class="thrdrow">9</span>

                    <span class="frthrow">1</span>
                    <span class="frthrow">2</span>
                    <span class="frthrow">3</span>
                    <span class="frthrow">4</span>
                    <span class="frthrow">5</span>
                    <span class="frthrow">6</span>
                    <span class="frthrow">7</span>
                    <span class="frthrow">8</span>
                    <span class="frthrow">9</span>

                    <span class="fiftrow">1</span>
                    <span class="fiftrow">2</span>
                    <span class="fiftrow">3</span>
                    <span class="fiftrow">4</span>
                    <span class="fiftrow">5</span>
                    <span class="fiftrow">6</span>
                    <span class="fiftrow">7</span>
                    <span class="fiftrow">8</span>
                    <span class="fiftrow">9</span>

                </div>
            </div>
            <div class="col-md-7 gameplayinnerright">
                <h2><i class="fa fa-trash" aria-hidden="true"></i></h2>
                <!--<h2><i class="fa fa-trash" aria-hidden="true"></i></h2>-->
                <div class="gamedetails">

                    <div class="gamedetailssingle">
                        <div class="imagezig">
                            <img class="img-responsive randomNumber" src="{{url('public/sites/images/random.png')}}"/>
                        </div>
                        <div class="buttonround">
                            <span class="round firstcircle"></span>
                            <span class="round secondcircle"></span>
                            <span class="round thirdcircle"></span>
                            <span class="round fourthcircle"></span>
                            <span class="round fifthcircle"></span>
                        </div>
                        <div class="increasedecrease">
                            <p>Amount To Stake.</p>
                            <div class="increasebuttons">
                                <span class="decrease"><i class="fa fa-minus" aria-hidden="true"></i></span>
                                <input type="text" value="22" class="form-control value incdecval"/>
                                <span class="increase"><i class="fa fa-plus" aria-hidden="true"></i></span>
                            </div>
                        </div>
                        <div class="closeitem">
                            <span><i class="fa fa-times-circle"></i></span>
                        </div>
                    </div>

                    <!--                    <div class="gamedetailssingle">
                                            <div class="imagezig">
                                                <img class="img-responsive" src="{{url('public/sites/images/random.png')}}"/>
                                            </div>
                                            <div class="buttonround">
                                                <span class="round"></span>
                                                <span class="round"></span>
                                                <span class="round"></span>
                                            </div>
                                            <div class="increasedecrease">
                                                <p>Amount To Stake.</p>
                                                <div class="increasebuttons">
                                                    <span class="decrease"><i class="fa fa-minus" aria-hidden="true"></i></span>
                                                    <input type="text" value="22" class="form-control value"/>
                                                    <span class="increase"><i class="fa fa-plus" aria-hidden="true"></i></span>
                                                </div>
                                            </div>
                                            <div class="closeitem">
                                                <span><i class="fa fa-times-circle"></i></span>
                                            </div>
                                        </div>
                    
                                        <div class="gamedetailssingle">
                                            <div class="imagezig">
                                                <img class="img-responsive" src="{{url('public/sites/images/random.png')}}"/>
                                            </div>
                                            <div class="buttonround">
                                                <span class="round"></span>
                                                <span class="round"></span>
                                                <span class="round"></span>
                                            </div>
                                            <div class="increasedecrease">
                                                <p>Amount To Stake.</p>
                                                <div class="increasebuttons">
                                                    <span class="decrease"><i class="fa fa-minus" aria-hidden="true"></i></span>
                                                    <input type="text" value="22" class="form-control value"/>
                                                    <span class="increase"><i class="fa fa-plus" aria-hidden="true"></i></span>
                                                </div>
                                            </div>
                                            <div class="closeitem">
                                                <span><i class="fa fa-times-circle"></i></span>
                                            </div>
                                        </div>-->

                </div>

            </div>

        </div>

        <div class="row">
            <div class="col-md-12">
                <!--<p class="morelines"><i class="fa fa-plus" aria-hidden="true"></i> Add More Lines</p>-->
                <p class="morelines"> </p>
                <p class="buy">Buy Ticket</br><span>Total Stake: KES 0 </span></p>
                <p class="maximum">Maximum Stake Per Ticket: KES 1000</p>
            </div>
        </div>

    </div>
</div>
<!--- GAME PLAY END --->

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script>

$(".frstrow").click(function () {
    $('.frstrow').removeClass('seltd');
    $(this).addClass('seltd');
    var curval = $(this).text();
    $(".firstcircle").text(curval);
})

$(".scndrow").click(function () {
    $('.scndrow').removeClass('seltd');
    $(this).addClass('seltd');
    var curval = $(this).text();
    $(".secondcircle").text(curval);
})

$(".thrdrow").click(function () {
    $('.thrdrow').removeClass('seltd');
    $(this).addClass('seltd');
    var curval = $(this).text();
    $(".thirdcircle").text(curval);
})
$(".frthrow").click(function () {
    $('.frthrow').removeClass('seltd');
    $(this).addClass('seltd');
    var curval = $(this).text();
    $(".fourthcircle").text(curval);
})
$(".fiftrow").click(function () {
    $('.fiftrow').removeClass('seltd');
    $(this).addClass('seltd');
    var curval = $(this).text();
    $(".fifthcircle").text(curval);
})


$(".increase").click(function () {
    var curval = $(".incdecval").val();
    $(".incdecval").val(parseInt(curval) + parseInt(1));
})
$(".decrease").click(function () {
    var curval = $(".incdecval").val();
    $(".incdecval").val(parseInt(curval) - parseInt(1));
})

$(".randomNumber").click(function () {
    var fval = Math.floor(Math.random() * 10);
    $(".firstcircle").text(fval)
    selectCircle('frstrow')
    $(".firstcircle").text(fval)


    var sval = Math.floor(Math.random() * 10);
    $(".secondcircle").text(sval)

    var tval = Math.floor(Math.random() * 10);
    $(".thirdcircle").text(tval)

    var fval = Math.floor(Math.random() * 10);
    $(".fourthcircle").text(fval)

    var fvval = Math.floor(Math.random() * 10);
    $(".fifthcircle").text(fvval)
})

function selectCircle(cls) {
    console.log('testttt'+cls)
    $("span > ." + cls).each(function () {
        var Name = $(".name", this).text();
        console.log(Name)
//        var Content = $(".content", this).text();
        $(this).append("<span class=\"additional\"><a href=\"/addinfo.php\">" + Name + "'s additional info</a></span>");
    });
}

</script>
<script>
    $(function () {


        $(".dropdown").hover(
                function () {
                    $('.dropdown-menu', this).stop(true, true).fadeIn("fast");
                    $(this).toggleClass('open');
                    $('b', this).toggleClass("caret caret-up");
                },
                function () {
                    $('.dropdown-menu', this).stop(true, true).fadeOut("fast");
                    $(this).toggleClass('open');
                    $('b', this).toggleClass("caret caret-up");
                });
    });
</script> 
<script>
    $(".navbar-nav a").addClass('nav-link');
</script>
@endsection
