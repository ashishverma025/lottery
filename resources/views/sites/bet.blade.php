@extends('sites.layout.Sites')
@section('content')
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

<!--- INNER PAGE BANNER START --->
<div class="innerbanner" style="background: url({{url('sites/images/innerbanner.jpg')}})">

</div>
<!--- INNER PAGE BANNER END --->

<!--- GAME PLAY START --->
<div class="gameplay">
    <div class="container gameplayinner">
        <form>
            @csrf
            <div class="row">
                <div class="col-md-5 gameplayinnerleft">
                    <h2>Select 5 Numbers</h2>
                    <h3>{{@$bettingDetails->bet_name}}</h3>
                    <p>(From {{@$bettingDetails->start_number}}-{{@$bettingDetails->end_number}})</p>
                    <div class="numberbox">
                        <span class="frstrow">0</span>
                        <span class="frstrow">1</span>
                        <span class="frstrow">2</span>
                        <span class="frstrow">3</span>
                        <span class="frstrow">4</span>
                        <span class="frstrow">5</span>
                        <span class="frstrow">6</span>
                        <span class="frstrow">7</span>
                        <span class="frstrow">8</span>
                        <span class="frstrow">9</span>

                        <span class="scndrow">0</span>
                        <span class="scndrow">1</span>
                        <span class="scndrow">2</span>
                        <span class="scndrow">3</span>
                        <span class="scndrow">4</span>
                        <span class="scndrow">5</span>
                        <span class="scndrow">6</span>
                        <span class="scndrow">7</span>
                        <span class="scndrow">8</span>
                        <span class="scndrow">9</span>

                        <span class="thrdrow">0</span>
                        <span class="thrdrow">1</span>
                        <span class="thrdrow">2</span>
                        <span class="thrdrow">3</span>
                        <span class="thrdrow">4</span>
                        <span class="thrdrow">5</span>
                        <span class="thrdrow">6</span>
                        <span class="thrdrow">7</span>
                        <span class="thrdrow">8</span>
                        <span class="thrdrow">9</span>

                        <span class="frthrow">0</span>
                        <span class="frthrow">1</span>
                        <span class="frthrow">2</span>
                        <span class="frthrow">3</span>
                        <span class="frthrow">4</span>
                        <span class="frthrow">5</span>
                        <span class="frthrow">6</span>
                        <span class="frthrow">7</span>
                        <span class="frthrow">8</span>
                        <span class="frthrow">9</span>

                        <span class="fiftrow">0</span>
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
                                <img class="img-responsive randomNumber" src="{{url('sites/images/random.png')}}"/>
                            </div>
                            <div class="buttonround">
                                <span class="round "><input type="number" name="num1" class="firstcircle"></span>
                                <span class="round "><input type="number" name="num2" class="secondcircle"></span>
                                <span class="round "><input type="number" name="num3" class="thirdcircle"></span>
                                <span class="round "><input type="number" name="num4" class="fourthcircle"></span>
                                <span class="round "><input type="number" name="num5" class="fifthcircle"></span>
                            </div>
                            <div class="increasedecrease">
                                <p>Amount To Stake.</p>
                                <div class="increasebuttons">
                                    <span class="decrease"><i class="fa fa-minus" aria-hidden="true"></i></span>
                                    <input type="text" value="22" name="amount" class="form-control value incdecval"/>
                                    <span class="increase"><i class="fa fa-plus" aria-hidden="true"></i></span>
                                </div>
                            </div>
                            <div class="closeitem">
                                <span><i class="fa fa-times-circle"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <p class="morelines"><i class="fa fa-plus" aria-hidden="true"></i> Add More Lines</p>
                    <button type="button" id="buyTicket" onclick="buyticket()" class="buy">Buy Ticket</button>
                </div>
            </div>
        </form>
        <input type="hidden" id="num5" class="fifthcircle">
    </div>
</div>
<!--- GAME PLAY END --->

<script>
    function buyticket() {
    var num1 = $("input[name=num1]").val()
            var num2 = $("input[name=num2]").val()
            var num3 = $("input[name=num3]").val()
            var num4 = $("input[name=num4]").val()
            var num5 = $("input[name=num5]").val()
            var amount = $("input[name=amount]").val()
            var bet_id = '{{$bettingDetails->id}}';

    console.log(bet_id);
    if (num1 != '' && num2 != '' && num3 != '' && num4 != '' && num5 != '' && amount != '' && bet_id != '') {
    $(".buy").text('Processing..');
    $(".buy").prop('disabled', true);
        $.ajax({
            url: "{{url('adduserBet')}}",
            type: 'post',
            data: {num1: num1, num2: num2, num3: num3, num4: num4, num5: num5, amount: amount,bet_id:bet_id},
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (quickBetId) {
               
                if (quickBetId != '') {
                    localStorage.userBetId=quickBetId
                    $(".successMsg").html('Bet Added successfully.')
                }
                setTimeout(function () {
                    window.location.href = "{{url('payment')}}/"+bet_id
                }, 3000);
            }
        });
    } else {
    alert('Please select 5 numbers.')
    }
    };</script>
<script>

    $(".frstrow").click(function () {
    $('.frstrow').removeClass('seltd');
    $(this).addClass('seltd');
    var curval = $(this).text();
    $(".firstcircle").val(curval);
    })

            $(".scndrow").click(function () {
    $('.scndrow').removeClass('seltd');
    $(this).addClass('seltd');
    var curval = $(this).text();
    $(".secondcircle").val(curval);
    })

            $(".thrdrow").click(function () {
    $('.thrdrow').removeClass('seltd');
    $(this).addClass('seltd');
    var curval = $(this).text();
    $(".thirdcircle").val(curval);
    })
            $(".frthrow").click(function () {
    $('.frthrow').removeClass('seltd');
    $(this).addClass('seltd');
    var curval = $(this).text();
    $(".fourthcircle").val(curval);
    })
            $(".fiftrow").click(function () {
    $('.fiftrow').removeClass('seltd');
    $(this).addClass('seltd');
    var curval = $(this).text();
    $(".fifthcircle").val(curval);
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
    var fval = Math.floor(Math.random() * 99);
    $(".firstcircle").val(fval)
            selectCircle('frstrow', fval)


            var sval = Math.floor(Math.random() * 99);
    $(".secondcircle").val(sval)
            selectCircle('scndrow', sval)

            var tval = Math.floor(Math.random() * 99);
    $(".thirdcircle").val(tval)
            selectCircle('thrdrow', tval)

            var frthval = Math.floor(Math.random() * 99);
    $(".fourthcircle").val(frthval)
            selectCircle('frthrow', frthval)

            var fvval = Math.floor(Math.random() * 99);
    $(".fifthcircle").val(fvval)
            selectCircle('fiftrow', fvval)

    })

            function selectCircle(cls, num) {
            $("." + cls).each(function () {
            var circleNum = $(this).text();
            if (circleNum == num) {
            $('.' + cls).removeClass('seltd')
                    $(this).addClass('seltd')
            }
            });
            }
</script>

@endsection
