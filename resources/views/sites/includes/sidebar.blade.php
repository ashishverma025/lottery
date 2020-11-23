


<?php
$is_sidebar = ['dashboard', 'inbox', 'listing', 'account', 'subscribe', 'listingClass', 'userProfile','invitefriend','onlineExam'];
$segment1 = Request::segment(1);
$segment2 = Request::segment(2);
$segment3 = Request::segment(3);
?>
@if($active != 'userProfile' && $active != 'invitefriend')
<div id="resource-container" class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    <div class="container">
@endif
        @if(!in_array($active,$is_sidebar))
        <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2 nopadding sidebar">
            <div class="sidebar-menu">
                <?php
                $tutorId = getUser_Detail_ByParam('id');
//                pr($EducationButtons['LearningCenterDetails']);
                $userDetails = getUserDetails();
                $LcDetails = getLcDetails();
//        pr($LcDetails);
                ?>
                <ul>
                    @if (isset($EducationButtons['LearningCenterDetails']) && empty($EducationButtons['LearningCenterDetails']))
                    <li class="{{ (@$sideActive == 'becomeEdu') ? 'active' : '' }}"><a href="{{url('becomeaeducation_partner')}}">Become an Education Partner</a></li>
                    @else
                    <li class="{{ (@$sideActive == 'editProfile') ? 'active' : '' }}"><a href="{{url('userprofile')}}">View Profile</a></li>
                    
                    @endif

                    <li class="{{(@$sideActive == 'becomeTutor') ? 'active' : ''}}"><a href="{{url('becometutor')}}">Become a Tutor</a></li>
                    @if(!empty($LcDetails))
                    <li class=""><a href="{{url('studentlist')}}">My Students</a></li>
                    <li class=""><a href="{{url('classes')}}">My Classes</a></li>
                    <li class=""><a href="{{url('subjects')}}">My Subjects</a></li>
                    <li class=""><a href="{{url('attendence')}}">Save Attendances</a></li>
                    <li class=""><a href="{{url('attendance')}}">Attendance List</a></li>
                    <li class=""><a href="{{url('attendancesummary')}}">Attendance Summary</a></li>
                    @endif
                    <li class="{{(@$sideActive == 'trustVerification') ? 'active' : ''}}"><a href="{{url('trust_verification')}}">Trust and Verification</a></li>
                    <li class="{{(@$sideActive == 'requests') ? 'active' : ''}}"><a href="#">Your Tutor Requests</a></li>
                    <li class="{{(@$sideActive == 'eResource') ? 'active' : ''}}"><a href="#">e-Resources</a></li>
                    <li class="{{(@$sideActive == 'reviews') ? 'active' : ''}}"><a href="#">Reviews</a></li>
                    <li class="{{(@$sideActive == 'references') ? 'active' : ''}}"><a href="#">References</a></li>
                </ul>
            </div>
        </div>
        @endif






