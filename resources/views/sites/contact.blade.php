@extends('sites.layout.Sites')
@section('content')

<!--- INNER PAGE BANNER START --->
<div class="innerbanner" style="background: url({{url('sites/images/contact.jpg')}})">

</div>
<!--- INNER PAGE BANNER END --->
@if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif
<!--- GAME PLAY START --->
<div class="gamelisting">
    <div class="container">
   <form action="/contact" method="post">
<h1 align="center">Contact Us</h1>
    @csrf
    <div class="form-group"›
       <label><b>Name</b></label>
       <input type="text" name="name" class="form-contror" required> 
    </div>
	

 
	 <div class="form-group"›
       <label><b>Mobile</b></label>
       <input type="number" name="mobile" class="form-contror" required>

    </div>

    <div class="form-group"›
       <label><b>Message</b></label>
       <br> <br> <br>
       <textarea name="message" class="form-control" required></textarea>
    </div>
	
    <button type="submit" class="btn btn-primary">Submit</button>

</form>
    </div>
</div>

@endsection
