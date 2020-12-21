@extends('sites.layout.Sites')
@section('content')

<?php $userDetails = getUserDetails(); ?>
<!--- GAME PLAY START --->
<div class="myaccountpage">
    <div class="container myaccountinner">
        <div class="row">
            <!-- start accordian -->
            <div class="accordion md-accordion" id="accordionEx" role="tablist" aria-multiselectable="true">
                <div class="card">
                    <div class="card-header" role="tab" id="headingThree3">
                        <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx" href="#collapseThree3" aria-expanded="false" aria-controls="collapseThree3">
                            <h5 class="mb-0"> Edit Profile Details <i class="fas fa-angle-down rotate-icon"></i> </h5> </a>
                    </div>
                    <div id="collapseThree3" class="collapse " role="tabpanel" aria-labelledby="headingThree3" data-parent="#accordionEx">
                        <div class="card-body editprofiledetails">							
                            <form>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label>Profile Picture</label>
                                        <img src="{{url('sites/images/default_profile_user_img.png')}}" class="profilepic" id="userImg" height="80" width="80" />
                                        <input type="file" name="" onchange= "readURL(this, 'userImg')" value="Upload Picture"/>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <div class="form-group col-md-12">
                                            <label>Name</label>
                                            <input type="text" class="form-control" value="{{@$userDetails['name']}}" placeholder="Enter Name">
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label>Email</label>
                                            <input type="email" class="form-control" value="{{@$userDetails['email']}}" placeholder="Email Id">
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label>Phone Number</label>
                                            <input type="text" class="form-control" value="{{@$userDetails['phone']}}" placeholder="Enter Phone Number">
                                        </div>
                                    </div>
                                    <div class="form-group col-md-12 text-center">
                                        <button type="submit" class="btn btn-primary submitbtn">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" role="tab" id="headingThree4">
                        <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx" href="#collapseThree4" aria-expanded="false" aria-controls="collapseThree4">
                            <h5 class="mb-0"> My Bets <i class="fas fa-angle-down rotate-icon"></i> </h5> </a>
                    </div>
                    <div id="collapseThree4" class="collapse show" role="tabpanel" aria-labelledby="headingThree4" data-parent="#accordionEx">
                        <div class="card-body tickethistory table-responsive">
                            <!--                            <div class="headtext">
                                                            <select name="days" id="Days"  class="form-control">
                                                                <option value="7">Last 7 days</option>
                                                                <option value="15">Last 15 days</option>
                                                                <option value="21">Last 21 days</option>
                                                                <option value="30">Last 30 days</option>
                                                            </select>
                                                        </div>-->
                            <table class="table">
                                <tr>
                                    <th>Bet Name</th>
                                    <th>My Bet Numbers</th>
                                    <th>Bet Details</th>
                                    <th>Date & Time</th>
                                    <th>Winning Number</th>
                                    <th>Matched Number</th>
                                    <th>Bet Amount</th> 
                                    <th>Draw ID</th>
                                </tr>
                                @if(!empty($QuickbetRecords))
                                @foreach($QuickbetRecords as $QuickBet)
                                <tr>
                                    <td>{{$QuickBet->bet_name}}</td>
                                    <td>{{$QuickBet->num1}},{{$QuickBet->num2}},{{$QuickBet->num3}},{{$QuickBet->num4}},{{$QuickBet->num5}}</td>
                                    <td>{!! $QuickBet->bet_description !!}</td>
                                    <td>{{$QuickBet->created_at}}</td>
                                    <td>{{$QuickBet->ANum1}},{{$QuickBet->ANum2}},{{$QuickBet->ANum3}},{{$QuickBet->ANum4}},{{$QuickBet->ANum5}}</td>
                                    <td>{{$QuickBet->matchNumbers}}</td>
                                    <td>USD {{$QuickBet->amount}}</td> 
                                    <td>2</td>
                                </tr>
                                @endforeach
                                @endif
                            </table>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" role="tab" id="headingTwo2">
                        <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx" href="#collapseTwo2" aria-expanded="false" aria-controls="collapseTwo2">
                            <h5 class="mb-0">Transaction History <i class="fas fa-angle-down rotate-icon"></i></h5></a>
                    </div>
                    <div id="collapseTwo2" class="collapse" role="tabpanel" aria-labelledby="headingTwo2" data-parent="#accordionEx">
                        <div class="card-body transactionhistory">
                            <div class="headtex                        t">
<!--                                <select name="days" id="Days" class="form-control">
                                    <option value="7">Last 7 days</option>
                                    <option value="15">Last 15 days</option>
                                    <option value="21">Last 21 days</option>
                                    <option value="30">Last 30 days</option>
                                </select>-->
                            </div>
                            <table class="table">
                                <tr>
                                    <th>S.No</th>
                                    <th>User Name</th>
                                    <th>Bet Name</th> 
                                    <th>Amount</th>
                                    <th>Transaction Id</th>
                                    <th>Transaction Time</th>
                                    <th>Payment Status</th>
                                    <th>Created Time</th>
                                </tr>
                                @if(!empty($TransactionHistory))
                                @foreach($TransactionHistory as $key=>$payment)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$payment->UserName}}</td>
                                    <td>{{$payment->bet_name}}</td>
                                    <td>{{$payment->currency}} {{$payment->amount}}</td> 
                                    <td>{{$payment->transaction_id}}</td>
                                    <td>{{$payment->transaction_time}}</td>
                                    <td>{{$payment->payment_status}}</td>
                                    <td>{{$payment->created_at}}</td>
                                </tr>
                                @endforeach
                                @endif
                            </table>
                        </div>
                    </div>
                </div>


                <div class="card">
                    <div class="card-header" role="tab" id="headingOne1">
                        <a data-toggle="collapse" data-parent="#accordionEx" href="#collapseOne1" aria-expanded="true" aria-controls="collapseOne1">
                            <h5 class="mb-0">My Rewards <i class="fas fa-angle-down rotate-icon"></i></h5></a>
                    </div>
                    <div id="collapseOne1" class="collapse " role="tabpanel" aria-labelledby="headingOne1" data-parent="#accordionEx">
                        <div class="card-body myrewards">
                            <table class="table">
                                <tr>
                                    <th>Date & Time</th>
                                    <th>Amount</th> 
                                    <th>Action</th>
                                </tr>
                                <tr>
                                    <td>27 Feb 22:10:32</td>
                                    <td>$200</td> 
                                    <td>Yes</td>
                                </tr>
                                <tr>
                                    <td>27 Feb 22:10:32</td>
                                    <td>$200</td> 
                                    <td>Yes</td>
                                </tr>
                                <tr>
                                    <td>27 Feb 22:10:32</td>
                                    <td>$200</td> 
                                    <td>Yes</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header" role="tab" id="headingThree5">
                        <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx" href="#collapseThree5" aria-expanded="false" aria-controls="collapseThree5">
                            <h5 class="mb-0"> Withdraw <i class="fas fa-angle-down rotate-icon"></i> </h5> </a>
                    </div>
                    <div id="collapseThree5" class="collapse" role="tabpanel" aria-labelledby="headingThree5" data-parent="#accordionEx">
                        <div class="card-body withdraw table-responsive">
                            <div class="headtext">
                                <h2>Withdraw</h2>
                            </div>
                            <table class="table">
                                <tr>
                                    <th>Date & Time</th>
                                    <th>Amount</th> 
                                    <th>Action</th>
                                </tr>
                                <tr>
                                    <td>N/A</td>
                                    <td>N/A</td> 
                                    <td>N/A</td>
                                </tr>

                            </table>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" role="tab" id="headingThree6">
                        <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx" href="#collapseThree6" aria-expanded="false" aria-controls="collapseThree6">
                            <h5 class="mb-0"> Responsible Gaming <i class="fas fa-angle-down rotate-icon"></i> </h5> </a>
                    </div>
                    <div id="collapseThree6" class="collapse" role="tabpanel" aria-labelledby="headingThree6" data-parent="#accordionEx">
                        <div class="card-body responsiblegaming">
                            <div class="headtext">								
                            </div>
                            <h2>RESPONSIBLE GAMING</h2>
                            <p>Kenya Charity Sweepstake  practices Responsible Gaming to ensure that its  gaming operations uphold the highest standards of the law, fair and safe gaming experience and to protect players from the adverse consequences of gaming and gambling. This requires close cooperation with  gaming operators, service providers, vendors and affiliates. Kenya Charity Sweepstake practices transparency and fairness in its business dealings, tax compliance, , legal and regulatory obligations in Kenya. In cooperation with its partners, the company upholds ethical and responsible marketing, in compliance with international standards.</p>
                            <p>The company ensures that its machines, sites, software and payment options  are equipped with safety measures to prevent criminal activity, fixing or interference with results and other unethical behaviour. All digital systems incorporate the most advanced software to protect information privacy and payment protection. All suspicious activities reported to our organization or detected through our digital infrastructure are investigated immediately and measures are taken to protect individuals and system vulnerabilities.</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end accordian -->
        </div>	
    </div>
</div>
<!--- GAME PLAY END --->

<script>
    function readURL(input, divID) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            $('#' + divID).show()
            reader.onload = function (e) {
                $('#' + divID).attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
@endsection
