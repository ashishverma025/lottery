@extends('sites.layout.tutor')
@section('content')

<?php
$dob = get_custom_dob();
$userDetails = (!empty($userData) && isset($userData)) ? $userData : getUserDetails();
//$imgFolder =  ($userDetails->user_type == '4')?'student':'tutor';
//pr($userDetails);
$UserDob = currentUser_dob($userDetails->dob);
?>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

<link rel="stylesheet" href="{{ asset('public/admn/css/profile_bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('public/admn/css/profile_style.css') }}">
<div class="col-xs-12 col-sm-9 col-md-9 col-lg-9 nopadding">
    <form class="form-horizontal  login_validator" id="form_block_validator" action="{{url('updateprofile')}}"enctype="multipart/form-data" method="post">
        {{ csrf_field() }}
        <div class="panel panel-default">
            <div class="panel-heading">Profile Photo</div>
            
                            <?php
                    if(@$userDetails->social_login_type == 'facebook' || @$userDetails->social_login_type == 'google' ){
                        $avator = $userDetails->avatar?$userDetails->avatar: 'default_profile_user_img.png';
                    }else{
                        $url = $userDetails->avatar ? $imgFolder.'/'.@$userDetails->id.'/'.@$userDetails->avatar:'default_profile_user_img.png';
                        $avator = url('public/sites/images').'/'.$url;
                    }
                ?>
                
            <div class="panel-body">
                <div class="col-md-3">
                    <div class="profile_sec" id="webcam_div">
                        @if(!empty($userDetails->avatar))
                        <img src="{{ $avator }}" id="userImg" class="img-responsive center-block" alt="User Image">
                        @else
                        <img src="{{ url('public/sites/users/images/default_profile_user_img.png')}}" class="img-responsive center-block " alt="User Image">
                        @endif
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="profile_content">
                        <div class="row profile_para">
                            <div class="col-md-12">
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 profile_box2">
                                <button class="webcambtn webcamera" type="button">Take a photo with your webcam</button>
                            </div>
                            <div class="col-md-6 profile_box1">
                                <label for="user_image" class="uploadbtn">Upload a file from your computer.</label>
                                <input id="user_image" style="visibility:hidden;" type="file" name="user_image" id="user_image" onchange= "readURL(this, 'userImg')" >
                            </div>
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
                                <label class="control-label col-sm-2" for="fname">First Name</label>
                                <div class="col-sm-10">
                                    <!--                                                    <input type="text" class="form-control" id="email" placeholder="enter name" name="email">-->
                                    <input type="text" id="fname" name="fname" class="form-control" value="<?= @$userDetails->fname ?>" required>
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
                                    <input type="text" id="lname" name="lname" class="form-control" value="<?= @$userDetails->lname ?>" required>
                                    @if ($errors->has('lname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('lname') }}</strong>
                                    </span>
                                    @endif
                                    <div class="checkbox">
                                        <label>This is only shared once you have a confirmed engagement with another Tutify user.</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">        
                                <div class="col-sm-offset-2 col-sm-10">

                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="gender">I Am <i class="fa fa-lock red_lock" aria-hidden="true"></i></label>
                                <div class="col-sm-2 pr-0">          
                                    <select class="form-control" name="gender" id="gender">
                                        <option <?= ($userDetails->gender == 'Male') ? 'selected' : '' ?>>Male</option>
                                        <option <?= ($userDetails->gender == 'Female') ? 'selected' : '' ?>>Female</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="months">Birth Date <i class="fa fa-lock red_lock" aria-hidden="true"></i></label>
                                <div class="col-sm-2 pr-0">          

                                    <select class="form-control" name="months" id="months">
                                        <?php
                                        foreach ($dob['months'] as $key => $value) {
                                            ?>
                                            <option value="<?= $key ?>" <?= ($UserDob['months'] == $key) ? 'selected' : '' ?> <?= (@$months == $value) ? 'selected' : '' ?> ><?= $value ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col-sm-1">          
                                    <select class="form-control" name="days" id="days">
                                        <?php
                                        foreach ($dob['days'] as $key => $value) {
                                            ?>
                                            <option value="<?= $value ?>" <?= ($UserDob['days'] == ($key + 1)) ? 'selected' : '' ?> <?= (@$days == $value) ? 'selected' : '' ?> ><?= $value ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col-sm-1">   
                                    <select class="form-control" name="years" id="years">
                                        <?php
                                        foreach ($dob['years'] as $key => $value) {
                                            ?>
                                            <option value="<?= $value ?>" <?= ($UserDob['years'] == $value) ? 'selected' : '' ?>  <?= (@$years == $value) ? 'selected' : '' ?> ><?= $value ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col-sm-offset-2 col-sm-10">
                                    <div class="checkbox">
                                        <label>We use this data for analysis and never share it with other users.</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="email">Email Address <i class="fa fa-lock red_lock" aria-hidden="true"></i></label>
                                <div class="col-sm-10">          
                                    <!--<input type="text" class="form-control" id="pwd" placeholder="Leogazmic@gmail.com" name="pwd">-->
                                    <input type="email" id="email" name="email" class="form-control" value="{{ ($userDetails->email != '') ? $userDetails->email : ''}}" disabled="true">
                                    @if (@$errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ @$errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="col-sm-offset-2 col-sm-10">
                                    <div class="checkbox">
                                        <label>We won’t share your private email address with other Tutify users. <a href="" title="">Learn more</a>.</label>
                                    </div>
                                </div>
                            </div>



                            @if((!empty($userDetails->verifyOtp) && (@$userDetails->verifyOtp !='verified')) )
                            <div class="form-group" id="success_msg" style="display: <?= !empty(@$userDetails->phone) ? (@$userDetails->verifyOtp == 'verified') ? 'none' : '' : '' ?>">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <div class="checkbox">
                                        <label>Your application status updates will be sent to this mobile number.</label>
                                    </div>
                                </div>
                            </div>
                            @endif


                            <!--/* Country */-->
                            <div class="form-group">
                                <input type="hidden" id="isVerified" value="<?= $phoneValidate == 'validate' ? 'Yes' : 'No' ?>">
                                <input type="hidden" id="verifiedNumber" value="<?= @$userDetails->phone ?>">
                                <label class="control-label col-sm-2" for="phone">Phone Number<i class="fa fa-lock red_lock" aria-hidden="true"></i></label>
                                <div class="col-sm-2 pr-0 <?= $phoneValidate ?>" id="countrydiv" <?= $disabled ?>>
                                    <input type="text" name="country" value="+65" class="form-control" id="country" list="datalist" {{@$disabled}}>
                                    @include('sites/countryList')
                                </div>
                                <div class="col-sm-4 pr-0 <?= $phoneValidate ?>" id="numberdiv" <?= $disabled ?> >
                                    <input id="phone" type="number" class="form-control" value="<?= @$userDetails->phone ?>" name="phone" placeholder="Verified" <?= $disabled ?>>
                                </div>

                                <div class="col-sm-4" style="display:<?= !empty(@$userDetails->phone) ? (@$userDetails->verifyOtp == 'verified') ? 'none' : '' : '' ?>" id="otpSection">   
                                    <div class="row">
                                        <div class="col-sm-8 pr-0" id="otpdiv">
                                            <input id="otp" type="password" class="form-control" otp-data="" name="otp" placeholder="Enter OTP">
                                        </div>
                                        <div class="col-sm-4">          
                                            <button type="button" class="btn btn-primary" id="verifyOtp">Verify</button>
                                        </div>
                                    </div>
                                </div>

                                <!-- Add another phone number -->
                                <div class="add-more" style="display:{{@$userDetails->alternatephone ? '' : 'none'}}" >
                                    <div class="col-sm-2"></div>
                                    <div class="col-sm-2 pr-0" id="countrydiv">
                                        <input type="text" name="country" value="+65" class="form-control" id="country" list="datalist" {{@$userDetails->alternatephone ? 'readonly' : ''}} >
                                        @include('sites/countryList')
                                    </div>
                                    <div class="col-sm-4 pr-0" id="numberdiv"> 
                                        <input id="alternatephone" type="number" class="form-control" value="{{@$userDetails->alternatephone}}" name="alternatephone" placeholder="Alternate Number" {{@$userDetails->alternatephone ? 'readonly' : ''}} >
                                    </div>
                                    <!--                                    <div class="col-sm-4" style="display:bloc" id="otpSection">      
                                <div class="col-sm-8" id="otpdiv">
                                    <input id="otp" type="text" class="form-control" otp-data="" name="otp" placeholder="Enter OTP">
                                </div>
                                <div class="col-sm-4">          
                                    <button type="button" class="btn btn-primary" id="verifyOtp">Verify</button>
                                </div>
                            </div>-->
                                </div>
                                <div class="col-sm-offset-2 col-sm-10" style="display:{{@$userDetails->alternatephone ? 'none' : ''}}">
                                    <div class="checkbox">
                                        <label id="addNumber"><i class="fa fa-plus" ></i> Add a phone number</label>
                                    </div>
                                </div>
                            </div>
                            <!--/* Country */-->

                            <div class="form-group">
                                <label class="control-label col-sm-2" for="timezone">Time Zone </label>
                                <div class="col-sm-6">
                                    <!--<input type="text" name="country" value="+65" class="form-control" id="country" list="datalist" {{@$disabled}}>-->
<!--                                    <select class="form-control" name="timezone" id="timezone">
                                        <option >(GMT+08:00) Singapore</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                    </select>-->
                                    @include('sites/TimeZones')
                                    <div class="checkbox">
                                        <label>Your home time zone.</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="address">Where You Live</label>
                                <div class="col-sm-10">          
                                    <!--<input type="text" class="form-control" id="address" name="address" value="<?= @$userDetails->address ?>" name="pwd">-->
                                    @include('sites/Address')
                                    <div class="checkbox">
                                        <label>This is only shared once you have a confirmed engagement with another Tutify user. A portion will be displayed on your profile. </label>
                                    </div>
                                </div>
                            </div>
                            <!--                                        <div class="form-group">
                                                                            <label class="control-label col-sm-2" for="status">Status <i class="fa fa-lock red_lock" aria-hidden="true"></i></label>
                                                                            <div class="col-sm-2">          
                                                                                <select class="form-control" name="status" id="status">
                                                                                    <option value="1">Active</option>
                                                                                    <option value="0">Inactive</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>-->

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group frm_btn text-left">        
            <div class="col-sm-10">
                <button type="button" id="edit_profile" userId ="<?= @$tutorId ?>" class="btn btn-default">Save</button>
            </div>
        </div>
    </form>
</div>

<script>

    $("#addNumber").click(function () {
        $(".add-more").show()
    })

    $(document).ready(function () {
// Initialize the functionality
        loginObj.init();
        $.validator.addMethod("validateEmail", function (value, element) {
            return this.optional(element) || /^[a-zA-Z0-9._-]+@[a-zA-Z0-9-]+\.[a-zA-Z.]{2,5}$/i.test(value);
        }, "Email Address is invalid: Please enter a valid email address.");

        $.validator.addMethod("validatePassword", function (value, element) {
            return this.optional(element) || /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,16}$/i.test(value);
        }, "Password is invalid: Please enter a valid password.");


        $.validator.addMethod("uniqueEmail", function (value, element) {
            $.ajax({
                url: "{{url('checkexistemail')}}",
                method: "POST",
                data: "email=" + value,
                dataType: "json",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (res) {
                    return res.status == 'true'
                }
            });
        });
    });
    var loginObj = {
        init: function () {
            loginObj.holdFormSubmit();
            loginObj.formValidation();
            loginObj.loginFunction();
        },
        holdFormSubmit: function () {
// Form validations
            $('#login_form').submit(function (e) {
                e.preventDefault();
            });
        },
        formValidation: function () {
            $('#login_form').validate({
                rules: {
                    username: {
                        required: true,
                        validateEmail: true,
                        email: true,
                    },
                    password: {
                        required: {
                            depends: function () {
                                $(this).val($.trim($(this).val()));
                                return true;
                            }
                        },
                    }

                },
                messages: {
                    username: {
                        required: 'Please enter email address',
                        email: 'Please enter a valid email id',
                        validateEmail: 'Please enter a valid email id'
                    },
                    password: {
                        required: 'Please enter password',
                    },
                }
            });
        },
        loginFunction: function () {
// Login functionality
            $('#user-login-btn').click(function () {
// Check the validation
                if ($('#login_form').valid()) {
// Hold the button reference
                    var btn = $(this);
                    $('#server_resposne').hide();
                    $('#server_resposne_msg').html('');
                    var email = $("#username").val()
                    var password = $("#pwd").val()

                    $.ajax({
                        url: "{{url('signin')}}",
                        method: 'post',
                        data: {
                            'email': email,
                            'password': password
                        },
                        beforeSend: function () {
// Disable the button
                            $(btn).attr('disabled', true);
                            $('#loading_spinner').show();
                        },
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        complete: function () {
// Enable the button
                            $(btn).attr('disabled', false);
                            $('#loading_spinner').hide();
                        },
                        success: function (response) {
                            console.log(response)
//                                    
                            if (response.success) {
// Reset the form
                                $('#errMsg').show();
                                $('#login_form')[0].reset();
                                $('#errMsg').removeClass('alert-danger').addClass('alert-success');
                                $('#errMsg').html(response.message);
                                location.reload();
                                window.location.href = "{{url('lc/dashboard')}}"
                            } else {
                                $('#errMsg').removeClass('alert-success').addClass('alert-danger');
                                $('#errMsg').removeClass('alert-success').addClass('alert-danger');
                                $('#errMsg').html(response.message);
                                $('#errMsg').show();
                            }
                        }
                    });
                }
            });
        }
    }
</script>
@endsection