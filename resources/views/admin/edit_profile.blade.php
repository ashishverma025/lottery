@extends('admin.layout.profile')
@section('content')

<?php
$dob = get_custom_dob();
$userDetails = (!empty($userData) && isset($userData)) ? $userData : getUserDetails();
$UserDob = currentUser_dob($userDetails->dob);
//prd($userDetails->name);
?>
<div class="main_body">
    <!-- top_header -->
   
    <!-- top_header END -->
    <!-- NAVIGATION  -->
    <div class="menus">
        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <!-- <a class="navbar-brand" href="#">Brand</a> -->
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li class=""><a href="#">Dashbord<span class="sr-only">(current)</span></a></li>
                        <li><a href="#">Inbox</a></li>
                        <li><a href="#">Your Listings</a></li>
                        <li><a href="#">Your Engagments</a></li>
                        <li><a href="#">Profile</a></li>
                        <li><a href="#">Account</a></li>
                        <li><a href="#">Invite Friends</a></li>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>
    </div>
    <!-- NAVIGATION END -->
    <div class="container-fluid">
        <div class="edit_detail">
            <div class="row">
                <div class="col-md-2">
                    <div class="sidebar">
<!--                        <ul>
                            <li><a href="#">Edit Profile</a></li>
                            <li><a href="#">Become a Tutor</a></li>
                            <li><a href="#">Trust and Verification</a></li>
                            <li><a href="#">Your Tutor Requests</a></li>
                            <li><a href="#">e-Resources</a></li>
                            <li><a href="#">Reviews</a></li>
                            <li><a href="#">References</a></li>
                        </ul>-->
                        <a href="/eduexam/admin/dashboard" class="btn_side">Go Back </a>
                    </div>
                </div>
                <?php // pr(currentUser_dob($userDetails->dob)); ?>
                <div class="col-md-10">
                    <form class="form-horizontal  login_validator" id="form_block_validator" action="{{url('/admin/settings')}}"enctype="multipart/form-data" method="post">
                        {{ csrf_field() }}
                        <div class="panel panel-default">
                            <div class="panel-heading">Profile Photo</div>
                            <div class="panel-body">
                                <div class="col-md-2">
                                    <div class="profile_sec">
                                        <img src="{{ asset('admn/images') }}<?= !empty($userDetails->avatar) ? '/profile/' . $userDetails->id . '/' . $userDetails->avatar : 'person.jpg' ?>" id="userImg" class="">
                                    </div>
                                </div>
                                <div class="col-md-10">
                                    <div class="profile_content">
                                        <div class="profile_para">
                                            <p>
                                                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to
                                            </p>
                                        </div>
                                        <div class="profile_box1">
                                            <p><input type="file" name="user_image" id="user_image" onchange= "readURL(this, 'userImg')" ></p>
                                            <!--Take a photo with your webcam</p>-->
                                        </div>
                                        <div class="profile_box1">
                                            <p>Take a photo with your webcam</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default panel_form">
                            <div class="panel-heading">Required</div>
                            <div class="panel-body">
                                <div class="col-md-12">
                                    <div class="profile_form_sec">
                                        <div class="">
                                            <div class="form-group">
                                                <label class="control-label col-sm-2" for="fname">First Namesss</label>
                                                <div class="col-sm-10">
<!--                                                    <input type="text" class="form-control" id="email" placeholder="enter name" name="email">-->
                                                    <input type="text" id="fname" name="fname" class="form-control" value="{{ ($userDetails->fname != '') ? $userDetails->fname : ''}}" required>
                                                    @if ($errors->has('fname'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('fname') }}</strong>
                                                    </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-sm-2" for="lname">Last Name</label>
                                                <div class="col-sm-10">          
                                                    <!--<input type="text" class="form-control" id="pwd" placeholder="enter name" name="pwd">-->
                                                    <input type="text" id="lname" name="lname" class="form-control" value="{{ ($userDetails->lname != '') ? $userDetails->lname : ''}}" required>
                                                    @if ($errors->has('lname'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('lname') }}</strong>
                                                    </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group">        
                                                <div class="col-sm-offset-2 col-sm-10">
                                                    <div class="checkbox">
                                                        <label>This is only shared once you have a confiremed  engagment with another tutify user.</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-sm-2" for="gender">I Am <i class="fa fa-lock red_lock" aria-hidden="true"></i></label>
                                                <div class="col-sm-2">          
                                                    <select class="form-control" name="gender" id="gender">
                                                        <option <?= ($userDetails->gender == 'Male') ? 'selected' : '' ?>>Male</option>
                                                        <option <?= ($userDetails->gender == 'Female') ? 'selected' : '' ?>>Female</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-sm-2" for="months">Birth Date <i class="fa fa-lock red_lock" aria-hidden="true"></i></label>
                                                <div class="col-sm-2">          

                                                    <select class="form-control" name="months" id="months">
                                                        <?php
                                                        foreach ($dob['months'] as $key => $value) {
                                                            ?>
                                                            <option value="<?= $key ?>" <?= ($UserDob['months'] == $key) ? 'selected' : '' ?>><?= $value ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                                <div class="col-sm-1">          
                                                    <select class="form-control" name="days" id="days">
                                                        <?php
                                                        foreach ($dob['days'] as $key => $value) {
                                                            ?>
                                                            <option value="<?= $value ?>" <?= ($UserDob['days'] == ($key + 1)) ? 'selected' : '' ?>><?= $value ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                                <div class="col-sm-1">   
                                                    <select class="form-control" name="years" id="years">
                                                        <?php
                                                        foreach ($dob['years'] as $key => $value) {
                                                            ?>
                                                            <option value="<?= $value ?>" <?= ($UserDob['years'] == $value) ? 'selected' : '' ?>><?= $value ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                                <div class="col-sm-offset-2 col-sm-10">
                                                    <div class="checkbox">
                                                        <label>This is only shared once you have a confiremed  engagment with another tutify user.</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-sm-2" for="email">Email Address <i class="fa fa-lock red_lock" aria-hidden="true"></i></label>
                                                <div class="col-sm-10">          
                                                    <!--<input type="text" class="form-control" id="pwd" placeholder="Leogazmic@gmail.com" name="pwd">-->
                                                    <input type="email" id="email" name="email" class="form-control" value="{{ ($userDetails->email != '') ? $userDetails->email : ''}}" required>
                                                    @if (@$errors->has('email'))
                                                    <span class="help-block">
                                                        <strong>{{ @$errors->first('email') }}</strong>
                                                    </span>
                                                    @endif
                                                </div>
                                                <div class="col-sm-offset-2 col-sm-10">
                                                    <div class="checkbox">
                                                        <label>This is only shared once you have a confiremed  engagment with another tutify user.</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-sm-2" for="phone">Phone Number<i class="fa fa-lock red_lock" aria-hidden="true"></i></label>
                                                <div class="col-sm-10">          
                                                    <div class="input-group">
                                                        <span class="input-group-addon">+65****566</span>
                                                        <input id="phone" type="text" class="form-control" value="{{ ($userDetails->phone != '') ? $userDetails->phone : ''}}" name="phone" placeholder="Verified ">
                                                    </div>
                                                </div>
                                                <div class="col-sm-offset-2 col-sm-10">
                                                    <div class="checkbox">
                                                        <label>This is only shared once you have a confiremed  engagment with another tutify user.</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--                                            <div class="form-group">
                                                                                            <label class="control-label col-sm-2" for="timezone">Time Zone </label>
                                                                                            <div class="col-sm-4">          
                                                                                                <select class="form-control" name="timezone" id="timezone">
                                                                                                    <option >(GMT+08:00)Singapore</option>
                                                                                                    <option>2</option>
                                                                                                    <option>3</option>
                                                                                                    <option>4</option>
                                                                                                </select>
                                                                                            </div>
                                                                                        </div>-->
                                            <div class="form-group">
                                                <label class="control-label col-sm-2" for="address">Where You Live</label>
                                                <div class="col-sm-10">          
                                                    <input type="text" class="form-control" id="address" name="address" value="{{ ($userDetails->address != '') ? $userDetails->address : ''}}" placeholder="Clemeti Town, Singapore" name="pwd">
                                                </div>
                                            </div>
                                            <!--                                             <div class="form-group">
                                                                                            <label class="control-label col-sm-2" for="status">Status <i class="fa fa-lock red_lock" aria-hidden="true"></i></label>
                                                                                            <div class="col-sm-2">          
                                                                                                <select class="form-control" name="status" id="status">
                                                                                                    <option value="1">Active</option>
                                                                                                    <option value="0">Inactive</option>
                                                                                                </select>
                                                                                            </div>
                                                                                        </div>-->
                                            <div class="form-group">        
                                                <div class="col-sm-offset-2 col-sm-10">
                                                    <div class="checkbox">
                                                        <label>This is only shared once you have a confiremed  engagment with another tutify usera confiremed  engagment with another tutify user.</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group frm_btn text-left">        
                            <div class="col-sm-10">
                                <button type="button" id="edit_profile" userId ="<?= $userDetails->id ?>" class="btn btn-default">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection