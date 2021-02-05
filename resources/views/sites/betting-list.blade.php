@extends('sites.layout.Sites')
@section('content')
<!--- INNER PAGE BANNER START --->
<div class="innerbanner" style="background: url({{url('public/sites/images/innerbanner.jpg')}})"></div>
<!--- INNER PAGE BANNER END --->

<!--- LISTING START --->
<div class="gamelisting">
    <div class="container">
        @if(!empty($bettingDetails))
        @foreach($bettingDetails as $betDetail)
        <div class="row gameitem">
            <div class="col-md-4 image">
                <div class="imageinner">
                    <img src="{{url('public/sites/images/gallery-img1.jpg')}}" class="img-responsive"/>
                </div>
            </div>
            <div class="col-md-8 text">
                <div class="textinner">
                    <h2>{{$betDetail['bet_name']}}</h2>
                    <p>{!! $betDetail['bet_description'] !!} </p>
                    <span class="buttonmove getBetDetails" bet-id="{{$betDetail['id']}}"><a href="#" class="clickbtn" data-toggle="modal" data-target="#modalpopup">Bet Details</a></span>
                </div>
            </div>
        </div>
        @endforeach
        @endif
    </div>
</div>


<div class="modal firstpopup in" id="modalpopup">
    <div class="modal-dialog" role="document">
        <div class="modal-content apendBody">
            <img src="{{url('public/ajax-loader.gif')}}" width="50" height="50">
        </div>
    </div>
</div>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

<script>
$(".getBetDetails").click(function () {
    var betId = $(this).attr('bet-id')
    $.ajax({
        url: 'getBetDetails',
        type: 'post',
        data: {betId:betId},
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (data) {
            console.log(data)
            $(".apendBody").html(data)
        }
    })
});
</script>
@endsection
