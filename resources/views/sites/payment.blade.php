@extends('sites.layout.Sites')
@section('content')

<?php
$userDetails = getUserDetails();
$amt = $userDetails['amt']?$userDetails['amt']:0;
$n = $amt - @$bettingDetails->winning_amount;
if ($n > 0) {
    
} else {
    $n = -($n);
}
?>

<input type="hidden" id="sId" value="{{@$bettingDetails->id}}">
<input type="hidden" id="currency" value="EUR">
<input type="hidden" id="amount" value="{{ @$n  }}">
<input type="hidden" id="quickBetquickBetId" value="">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

<style>
    .foo
    {
        margin-left: 150px;
    }
    .hide{display: none}
    .preloader {
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: rgba(0, 0, 0, 0.5);
        z-index: 99;
    }

    #loaderstatus {
        width: 50px;
        height: 50px;
        position: absolute;
        left: 50%;
        top: 40%;
        background-image: url(http://tutify.com.sg/public/sites/images/ajax-loader.gif);
        background-repeat: no-repeat;
        -webkit-transform: translate(-50%, -50%);
        transform: translate(-50%, -50%);
        z-index: 999;
    }

</style>


<!-- <div class="row hide " id="successMsgdiv">
    <div class="col-md-4"></div>
    <div class="col-xs-12 col-md-4">
        <h2 class="centr"><span id="successMsg" style="color:#01d1c0;">Thank you for subscribing with Tutify , Cheers!</span></h2>
        <h3 class="centr">
            <span id="successMsg" style="color:#484848;">
                You can enjoy our services for 7 days as a free trial ,<br>
                during this time you will not be charged. If you don't like our services ,<br>
                you can cancel the subscription within 7 days of activation
            </span>
        </h3>
        <a href="{{url('subscribe')}}" class="btn btn-primary">Go Back</a>
    </div>
</div> -->


<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center subscribe-main-title  hide" id="successMsgdiv" >
    <h2 style="color:#01d1c0;">Thank you for Betting with Betwell Cheers!</h2>
    <p style="color:#484848;" id="successMsg">
        You can enjoy our services for 7 days as a free trial during this time you will not be charged. If you don't like our services you can cancel the subscription within 7 days of activation
    </p>
    <div class="text-center"><a href="{{url('/my-account')}}" class="btn btn-primary centr btnCustNew">Go Back</a></div></div>
</div>

<div id="paymentForm" class="">
    <div class="loaderImg hide">
        <div class="preloader "></div>
        <div id="loaderstatus">&nbsp;</div>
    </div>
    <!--@if(@$planDetails['id'] != 1 && $planExist != 'Yes')-->

    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center subscribe-main-title">

        <h2>Your <span style="color: #efd048;;">plan</span> {{@$bettingDetails->bet_name}}</h2>
        <p>Wallet Amount : £{{@$userDetails['amt']}} <br>
        <p> Betting Amount : £{{@$bettingDetails->winning_amount}} <br>
            Duration : {{@$planDetails['duration']}} <br>
            <!--@if(@$planDetails['discount'] != 0)-->
            <!--Discount : {{@$planDetails['discount']}}%<br>-->
            <!--@endif-->
            <!--After discount you have to pay only : ${{ @$planDetails['subscription_fee'] - (@$planDetails['subscription_fee'] * ( @$planDetails['discount'] / 100)) }}-->
        </p>
    </div>
    @if (\Session::has('success'))
    <div class="alert alert-success">
        <ul>
            <li>{!! \Session::get('success') !!}</li>
        </ul>
    </div>
    @endif
<?php
$userDetails = getUserDetails();


$amt = $userDetails['amt'];

$n = $amt - $bettingDetails->winning_amount;
if ($n > 0) {
    ?>

    </form>
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-xs-12 col-md-4">
            <form action = "/create" method = "post">
                <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
                <table>

                    <input type="hidden" id="userbetid" name="userbetid" value="">




                    <tr>
                    <input type="hidden" name="amount" value="{{@$bettingDetails->winning_amount}}">
                    </tr>

                    <tr>
                    <input type="hidden" name="bid" value="{{@$bettingDetails->id}}">
                    </tr>

                    <tr>
                        <td><input type='hidden' name='wallet' value="{{$n}}"/></td>
                    </tr>
                    <tr>
                        <td colspan = '2'>
                            <input type = 'submit' value = "Add payment" class="foo"/>
                        </td>
                    </tr>
                </table>
            </form>


        </div>
    </div>

<?php } else { ?>

    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-xs-12 col-md-4">
            <div id="paypal-button-container"></div>
            <script src="https://www.paypal.com/sdk/js?client-id=ASt-ItISPYQ6PuxCYR3SQjCrtisNVDEdMaBiSNkh7-0mC_J69iNyJsaOInad-b1Dq6UVWcAMMVEu0tK8"></script>
        </div>
    </div>
    <?php }
?>

<!--@else-->
<style>
    .centr{text-align: center;}
    .plan{color:red;margin-right: 2px;}
    body { margin-top:20px; }
    .panel-title {display: inline;font-weight: bold;}
    .checkbox.pull-right { margin: 0; }
    .pl-ziro { padding-left: 0px; }
</style>
<h3 class="centr">Your <span class="plan"> Plan </span>{{@$planDetails['plan_name']}}</h3>
<div class="row ">
    <div class="col-xs-12 col-md-3"></div>
    <form role="form" name="payform" action="{{url('saveTransaction')}}" method="post" id="directPayment">
        @csrf

        <input type="hidden" name="sId" id="sId" value="{{@$bettingDetails->id}}">
        <input type="hidden" name="cur" id="currency" value="EUR">
        <input type="hidden" name="amt" id="amount" value="{{ @$n }}">
        <input type="hidden" name="details" id="amount" value="">

        <div class="col-xs-12 col-md-6">
            <div class="panel panel-default customInputBox">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        Personal Details
                    </h3>
                </div>

                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="leftone">First Name</div>
                            <div class="rightone"><input name="firstname" id="firstname" type="text" value=""></div>
                        </div>
                        <div class="col-md-6">
                            <div class="leftone">Last Name</div>
                            <div class="rightone"><input name="lastname" id="lastname" type="text" value=""></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="leftone">Email</div>
                            <div class="rightone"><input name="email" id="email" type="text" value=""></div>
                        </div>
                        <div class="col-md-6">
                            <div class="leftone">Address</div>
                            <div class="rightone"><input name="address" id="address" type="text" value=""></div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="leftone">City</div>
                            <div class="rightone"><input name="city" id="city" type="text" value=""></div>
                        </div>
                        <div class="col-md-6">
                            <div class="leftone">State/Zip</div>
                            <div class="rightone"><input name="state" id="state" type="text" maxlength="2" style="width:60px;" value="">
                                <span class="fontSmallt">eg. NY</span>
                                <input name="zip" type="text" id="zip" style="width:70px;" value="">
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="panel panel-default customInputBox">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        Payment Details
                    </h3>
                </div>
                <div class="panel-body">

                    <div class="row">
                        <div class="col-md-6">
                            <div class="leftone">Card Type</div>
                            <div class="rightone">
                                <select name="cardtype" id="cardType" >
                                    <option value="visa" selected="selected">Visa</option>
                                    <option value="MasterCard">Master Card</option>
                                    <option value="AmericanExpress">American Express</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="leftone">Cardholder Name</div>  
                            <div class="rightone">
                                <input name="cardholder" id="cardholder" type="text" value="John Doe">
                            </div>
                        </div>
                    </div>

                    <div class="leftone">Card Number</div>  
                    <div class="rightone"><input type="text" name="cardnumber"  id="cardNumber" data-len='16' maxlength="16" class="numbersOnly" value="4111111111111111"></div>    

                    <div class="row">
                        <div class="col-md-6">
                            <div class="leftone">Expiration <span style=" font:7pt arial; color:gray;">[ mm / yyyy ]</span></div>   
                            <div class="rightone">
                                <input type="text" name="cardmonth" id="expityMonth" data-len='2' maxlength="2" class="sel numbersOnly" style="width:54px;" value="01" />&nbsp;
                                <input type="text" name="cardyear" id="expityYear" data-len='4' maxlength="4" class="sel numbersOnly" style=" width:147px;" value="2021">
                            </div>  
                        </div>
                        <div class="col-md-6">
                            <div class="leftone">CVV Number</div>   
                            <div class="rightone"><input type="password" name="cardcvv"  id="cvCode" data-len='3' maxlength="3" value="962"></div>
                        </div>
                    </div>

                </div>
            </div>
            <br/>
            <button type="button" class="btn btn-success btn-lg btn-block payment customColorBut" role="button">Pay Now</button>
        </div>
    </form>
</div>
<!--@endif-->
</div>



<script>
$("#userbetid").val(localStorage.userBetId);

$('.numbersOnly').keyup(function () {
    var len = $(this).attr('data-len')
    if (this.value.length > parseInt(len)) {
        e.preventDefault();
        return false;
    }
    this.value = this.value.replace(/[^0-9\.]/g, '');
});


function isValidEmailAddress(emailAddress) {
    var pattern = /^([a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+(\.[a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+)*|"((([ \t]*\r\n)?[ \t]+)?([\x01-\x08\x0b\x0c\x0e-\x1f\x7f\x21\x23-\x5b\x5d-\x7e\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|\\[\x01-\x09\x0b\x0c\x0d-\x7f\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))*(([ \t]*\r\n)?[ \t]+)?")@(([a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.)+([a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.?$/i;
    return pattern.test(emailAddress);
}

var sId = $("#sId").val()
var currency = $("#currency").val()
var amount = $("#amount").val()

$(".payment").click(function () {
    var firstname = $("#firstname").val()
    var lastname = $("#lastname").val()
    var city = $("#city").val()
    var state = $("#state").val()
    var country = $("#country").val()
    var zip = $("#zip").val()
    var address = $("#address").val()
    var country = $("#country").val()
    var cardholder = $("#cardholder").val()
    var cardNumber = $("#cardNumber").val()
    var expityMonth = $("#expityMonth").val()
    var expityYear = $("#expityYear").val()
    var cvCode = $("#cvCode").val()
    var cardType = $("#cardType").val()
    var amount = $("#amount").val()
    var currency = $("#currency").val()
    var email = $("#email").val()

    if (firstname == '') {
        swal({title: "Error!", text: "Please fill firstname!", type: "error"});
        $("#firstname").focus()
        return false;
    }
    if (lastname == '') {
        swal({title: "Error!", text: "Please fill lastname!", type: "error"});
        $("#lastname").focus()
        return false;
    }

    if (email != '' && !isValidEmailAddress(email)) {
        swal({title: "Error!", text: "Please fill a valid email address!", type: "error"});
        return false;
    }


    if (city == '') {
        swal({title: "Error!", text: "Please fill city!", type: "error"});
        $("#city").focus()
        return false;
    }
    if (state == '') {
        swal({title: "Error!", text: "Please fill state!", type: "error"});
        $("#state").focus()
        return false
    }
    if (zip == '') {
        swal({title: "Error!", text: "Please fill zip!", type: "error"});
        $("#zip").focus()
        return false;
    }
    if (cardholder == '') {
        swal({title: "Error!", text: "Please fill cardholder!", type: "error"});
        $("#cardholder").focus()
        return false;
    }
    if (cardNumber == '') {
        swal({title: "Error!", text: "Please fill valid card number!", type: "error"});
        $("#cardNumber").focus()
        return false;
    }
    if (expityMonth == '') {
        swal({title: "Error!", text: "Please fill valid expiry month!", type: "error"});
        $("#expityMonth").focus()
        return false;
    }
    if (expityYear == '') {
        swal({title: "Error!", text: "Please fill valid expiry year!", type: "error"});
        $("#expityYear").focus()
        return false;
    }
    if (cvCode == '') {
        swal({title: "Error!", text: "Please fill valid CVV!", type: "error"});
        $("#cvCode").focus()
        return false;
    }

    // var formData = $('#directPayment').serialize()

    if (firstname != '' && lastname != '' && city != '' && address != '' && state != '' && zip != '') {
        $.ajax({
            url: "{{url('saveTransaction')}}",
            type: 'post',
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            data: {
                details: '', cardnumber: cardNumber, cardmonth: expityMonth, cardyear: expityYear,
                cardcvv: cvCode, sId: sId, firstname: firstname, lastname: lastname, city: city, state: state,
                country: country, zip: zip, address: address, country: country, cardholder: cardholder, cardtype: cardType, amt: amount, cur: currency},
            beforeSend: function () {
                $(".loaderImg").removeClass('hide');
            },
            success: function (result) {
                if (result == 'success') {
                    $("#paymentForm").hide()
                    $("#successMsgdiv").removeClass('hide')
                    $(".loaderImg").addClass('hide');
                    setTimeout(function () {
                        // window.location.href = "{{url('subscribe')}}";
                    }, 6000);
                }
            }
        });
    }

    // $('#directPayment').submit()

});

</script>

<script>
    paypal.Buttons({
        createOrder: function (data, actions) {
            return actions.order.create({
                purchase_units: [{
                        amount: {
                            value: amount,
                        }
                    }]
            });
        },
        onApprove: function (data, actions) {
            return actions.order.capture().then(function (details) {
                $.ajax({
                    url: "{{url('saveTransaction')}}",
                    type: 'post',
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    data: {details: details, sId: sId, amt: amount, cur: currency, userBetId: localStorage.userBetId},
                    success: function (result) {
                        if (result == 'success') {
                            localStorage.userBetId = "";
                            $("#paymentForm").hide()
                            $("#successMsg").text('Congratulation! ' + details.payer.name.given_name + ' your payment accepted successfully !')
                            $("#successMsgdiv").removeClass('hide')
                            setTimeout(function () {
                                // window.location.href = "{{url('subscribe')}}";
                            }, 6000);
                        }
                    }
                });
            });
        },
        onError: function (data) {
            alert('Transaction Error ');

        },

    }).render('#paypal-button-container');

</script>
@endsection