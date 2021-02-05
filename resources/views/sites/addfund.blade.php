@extends('sites.layout.Sites')
@section('content')
<style>
.red_div {
 
  width: 200px;
  height: 40px;
  -webkit-border-radius: 20px;
    -moz-border-radius: 20px;
     border-radius: 20px;
	  background-color: #efd048;
}
input[type=text]{
    -webkit-border-radius: 20px;
    -moz-border-radius: 20px;
     border-radius: 20px;
     border: 1px solid #eec232;
	 background-color: #D3D3D3;
     color: #000000;
     width: 250px;
     height: 30px;
     padding-left: 10px;
    }
    
input[type=text]:focus {
     outline: none;
     border: 1px solid #000000;
     color: #000000;
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



<!--- End Home Slider ---> 
<div class="quickgame">
    <div class="container">
        <div class="row">
            <div class="col-md-12 heading">
                <h2>Deposit</h2>
            </div>
        </div>
        <div class="row">
           
   <h4>Select Amount to Deposit</h4>
  <br/>  <br/>  <br/>
       

        </div>
		<p style="text-align:center"><b>Add Money</b></p>
		<br>
		<div style="text-align: center">


<form action="https://www.paypal.com/cgi-bin/webscr" method="post">
 
    <input type="hidden" name="cmd" value="_xclick">
    <input type="hidden" name="business" value="sb-a7ygy4133195@personal.example.com">
   
 

 

    $ <input type="text" name="amount">
 
    <input type="hidden" name="no_shipping" value="0">
    <input type="hidden" name="no_note" value="1">
    <input type="hidden" name="currency_code" value="USD">
    <input type="hidden" name="lc" value="AU">
    <input type="hidden" name="bn" value="PP-BuyNowBF">
    <input type="hidden" name="return" value="https://net.tutsplus.com/payment-complete/">
 
    <br /><br />
    <input type="submit" value="Pay with PayPal!">
 
</form>

		  </div>
		  
		  
    </div>
</div>

   <!-- Set up a container element for the button -->
 




@endsection