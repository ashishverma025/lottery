@extends('sites.layout.Sites')
@section('content')

<!--- INNER PAGE BANNER START --->
<div class="innerbanner" style="background: url({{url('sites/images/innerbanner.jpg')}})">

</div>
<!--- INNER PAGE BANNER END --->

<!--- GAME PLAY START --->
<div class="gamelisting">
    <div class="container">
        @if(!empty($QuickbetRecords))
        @foreach($QuickbetRecords as $QuickBet)
        <div class="row gameitem">
            <div class="col-md-4 image">
                <div class="imageinner">
                <span class="round firstcircle">{{$QuickBet->num1}},</span>
                <span class="round secondcircle">{{$QuickBet->num2}},</span>
                <span class="round thirdcircle">{{$QuickBet->num3}},</span>
                <span class="round fourthcircle">{{$QuickBet->num4}},</span>
                <span class="round fifthcircle">{{$QuickBet->num5}}</span>                </div>
            </div>
            <div class="col-md-8 text">
                <div class="textinner">
                    <h2>{{$QuickBet->bet_name}}</h2>
                    <p>{!! $QuickBet->bet_description !!} </p>
                </div>
            </div>

        </div>
        @endforeach
        @endif
    </div>
</div>

@endsection
