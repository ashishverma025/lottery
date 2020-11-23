@extends('sites.layout.tutor')
@section('content')
<style>
    @import url(https://fonts.googleapis.com/css?family=Lato:400,700);

    body {background: #F2F2F2;padding: 0;maring: 0;}

</style>
<!--ultimite,standard,basic-->


<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center subscribe-main-title">
    <h2>Find the <span>prefect plan</span> <br>for your business</h2>
    <p>All plans include access to matching, attendance and automatic invoicing services as well as resource uploading, downloading and streaming.</p>
</div>

<div id="row">
    @foreach($allPlans as $k=>$plans)
    <?php
//     pr($Subscriber['subscription_id']);
    $planId = $plans['planId'];
    $Button = $plans['button'];
    $Cancel = $plans['cancel'];
    $planName = $plans['planName'];
    $subscriptionFee = $plans['subscriptionFee'];
    $recommended = $plans['recommended'];
    $duration = $plans['duration'];
    $expldDuration = explode(' ', $duration);
    $totalMonths = isset($expldDuration[1]) ? $expldDuration[0] : 1;
    $description = $plans['description'];
    $discount = $plans['discount'];
    $perMonthPrice = ($duration != 0 ) ? $subscriptionFee / $totalMonths : 'Free';
    $remainingDays = $plans['remainingDays'];


    ?>
    <!--price tab-->
    <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
        <div class="plan-inner">
            <div class="entry-title">

                <h3 class="{{$recommended == 'Yes' ? 'active' : ''}}" style="{{($Button == 'Current Plan')?'background-color:#5dab63':''}}">{{$planName}}</h3>
                @if($recommended == 'Yes')
                <div class="active recommendeText">Recommended</div>
                @endif
                <div class="price">{{($planId != 1) ? '$':''}}{{@$perMonthPrice}} <span>/per month</span>
                </div>
            </div>
            <div class="highlightBox"><h5>{{($planId != 1)  ? '$'.$subscriptionFee.' billed every '.$duration : 'Lifetime Free'}}</h5></div>
            <div class="entry-content customUiList">
                <?= $description ?>
            </div>
            <span style="color:#8a8d90;margin-left: 60px;">{{$remainingDays?$remainingDays:''}}</span>

            @if(empty($Subscriber['subscription_id']) && ($planId == 1))
            <div class="buttonCust">
                <a class="add-btn customHoverBut" href="#">Current Plan</a>
            </div>
            @else
                @if($planId != 1)
                     @if($Cancel == 'Cancel')
                        <div class="buttonCust">
                            <a class="add-btn customHoverBut" href="{{url('cancelPlan')}}/{{$planId}}">{{$Cancel}}</a>
                        </div>
                     @endif
                    <div class="buttonCust">
                        <a class="add-btn customHoverBut" href="{{url('subscribePlan')}}/{{$planId}}">{{$Button}}</a>
                    </div>

                @endif
            @endif

        </div>
    </div>
    <!-- end of price tab -->
    @endforeach
</div>

@endsection