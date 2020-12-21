<div class="modal-header">
    <div class="col-sm-12">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" (click)="hideFooter()">
            <span aria-hidden="true">×</span>
        </button>
    </div>
</div>
<div class="modal-body">
    <h2 class="popuptitle">Bet Details</h2>
    <div class="image">
        <img src="{{url('public/sites/images/gallery-img1.jpg')}}"/>
    </div>
    <div class="text">
        <h2>{{$Betting['bet_name']}}</h2>
        <h6>Bet Date :{{$Betting['bet_date']}}</h2>

        <div class="selectpicks">
            <ul>
                <li class="singlevalue" style="width: 115px;">Start Number :</li>
                <li class="singlevalue" style="width: 50px;">{{$Betting['start_number']}}</li>
                <li class="singlevalue" style="width: 115px;">End Number :</li>
                <li class="singlevalue" style="width: 50px;">{{$Betting['end_number']}}</li>
            </ul>

            <!--<input type="text" value="Input Your Text" class="fullbtn form-control">-->
        </div>
        <p>{!! $Betting['bet_description'] !!}</p>

    </div>
</div>
<div class="modal-footer">
    <div class="col-sm-12">
        <a href="{{url('bet')}}/{{$Betting['id']}}" class="btn proceed-btn">Go to Proceed</a>
    </div>
</div>
