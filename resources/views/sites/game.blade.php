@extends('sites.layout.Sites')
@section('content')

<div class="blog-section">
    <div class="container">
        <div class="row heading">
            <h2 class="title">{{$bettingDetails['bet_name']}} SELECT {{$bettingDetails['number_length']}} (FROM {{$bettingDetails['start_number'].'-'.$bettingDetails['end_number']}})</h2>
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
                        <div class="row">
<!--                            <div class="form-group">-->
                                <div class="col-md-3">
                                    <input type="text" class="form-control" >
                                </div>  
                                 <div class="col-md-3">
                                    <input type="text" class="form-control" >
                                </div>  
                                <div class="col-md-3">
                                    <input type="text" class="form-control" >
                                </div>
                                <div class="col-md-3">
                                    <input type="text" class="form-control" >
                                </div>
                            <!--</div>-->
                        </div>
                    </div>
                    <a href="#" class="read-more-btn">Buy Ticket</a>
                </div>
            </div>
        </div>

        <hr>
    </div>
</div>
</div>
@endsection
