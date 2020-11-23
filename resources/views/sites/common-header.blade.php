<!DOCTYPE html>
<html lang="en">
   <head>
      <title>Forms Third</title>
      <meta charset="utf-8">
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <meta name="route" content="{{ url('/') }}">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="{{ url('public/wippli/css/bootstrap.min.css') }}">
      <!-- <script src="js/slider.js"></script> -->
      <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
      <link rel="stylesheet" href="{{ url('public/wippli/css/main.css') }}">
   </head>
   <body>

   <section class="header">
   	<div class="container">
   		<div class="row">
   			<div class="col-lg-2">
   				<img src="{{url('public/wippli/img/Group%201087.png')}}" alt="logo">
   			</div>
   			<div class="col-lg-10">
   				<ul>
   					<li><a href="#"><i class="fas fa-comment"></i></a></li>
   					<li><a href="#"><i class="fas fa-search"></i></a></li>
   					<li><a href="#"><i class="far fa-bell"></i></a></li>
   					<li><a href="{{url('brannium-clients-contacts')}}"><i class="fas fa-user"></i></a> 
   					</li>
   					<li><a href="#"><i class="fas fa-ellipsis-v"></i></a> </li>
   				</ul>
   			</div>
   		</div>
   	</div>
   </section>