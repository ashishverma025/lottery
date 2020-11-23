<!DOCTYPE html>
<html lang="en">
<head>
  <title>login</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="route" content="{{ url('/') }}">
  <link rel="stylesheet" href="{{ url('public/wippli/css/bootstrap.min.css') }}">
  <script src="{{ url('public/wippli/js/bootstrap.min.js') }}"></script>    
  <script src="{{ url('public/wippli/js/popper.min.js') }}"></script>   
  <script src="{{ url('public/wippli/js/jquery.min.js') }}"></script>  
  <!-- <script src="{{ url('public/wippli/js/slider.js') }}"></script> -->

  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
  <link rel="stylesheet" href="{{ url('public/wippli/css/main.css') }}">
  <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>

</head>
<body>
  <!--------------------------  form1  -------------------------->
  <section class="form1 form">
   <div class="container">
     <div class="form_inner login_inner">

      <div class="header">
       <div class="row">
        <div class="col-lg-12">
         <div class="logo">
          <img src="{{ url('public/wippli/img/logo.jpg') }}" alt="logo">
        </div>
      </div>
    </div>
  </div>

  <div class="row">
   <div class="col-lg-12">
    <div class="form-txt login_txt">
      <div class="login_form">

      <form action="{{url('login')}}" id="login_form" method="post" accept-charset="utf-8" novalidate="novalidate">
         @csrf
         <div class="errMsg align-center" id="errMsg" style="display: none; text-align: center;height: 40px;padding-top: 6px;font-size: 16px;"></div>

         <label for="username"><b>Username</b></label>
          <input type="text" placeholder="Enter Username" name="username" id="username" required>
          @if ($errors->has('email'))
            <span class="help-block">
               <strong>{{ $errors->first('email') }}</strong>
            </span>
         @endif

          <label for="pwd"><b>Password</b></label>
          <input type="password" placeholder="Enter Password" name="password" id="pwd" required>
          @if ($errors->has('password'))
            <span class="help-block">
               <strong>{{ $errors->first('password') }}</strong>
            </span>
         @endif
          <button type="submit" id="user-login-btn">Login</button>
          <label>
            <input type="checkbox" checked="checked" name="remember"> Remember me
          </label>
          <div class="container" style="">
            <button type="button" class="cancelbtn">Cancel</button>
            <span class="psw">Forgot <a href="{{url('password/reset')}}">password?</a></span>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>   
<div class="form-ftr">
  <p>Powerd By
   <img src="img/Group%201087.png" alt="ftr-logo"></p>
 </div>   
</div>
</div>
</section>
</body>
<script src="{{ url('public/wippli/js/custom-index.js') }}"></script>

</html>