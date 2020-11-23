@extends('sites.layout.tutor')
@section('content')
<?php
//$dob = get_custom_dob();
$EduPartner = (!empty($EducationButtons['LearningCenterDetails']) ? $EducationButtons['LearningCenterDetails'] : "");
//pr($EduPartner);
?>

<?php
//if (empty($EducationButtons['FormShow'])) { 
if (empty($EduPartner) && $EducationButtons['FormShow'] != 'LearningCentre') {
    ?>
    <form class="tuti-form profile-form" id="t_profile" enctype="multipart/form-data" method="get" accept-charset="utf-8">
        <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 nopadding">
            <div class="right-block col-xs-12 col-sm-12 col-md-12 col-lg-12 tutor-prof-summ normal-lable-h nopadding">
                <h3 class="res-heading">Become a Education Partner</h3>
                <div class="sec-content clearfix">
                    <div class="row">
                        <?php
                        foreach ($EducationButtons['Button'] as $key => $value) {
                            $href = url('becomeaeducation_partner').'/'.$key;
                            if ($key == "FreeTutor") {
                                $href = 'becometutor';
                            }
                            ?>
                            <div class="col-md-6 " >
                                <a href="<?= @$href ?>" value="<?= @$key ?>" name="button" class="add-method-btn"><?= @$value ?></a>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </form>
<?php } else { ?>
    <form action="{{url('learningcenter')}}" class="tuti-form profile-form" id="t_profile" enctype="multipart/form-data" method="post" accept-charset="utf-8">
        {{ csrf_field() }}
        <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 nopadding">
            <div class="right-block col-xs-12 col-sm-12 col-md-12 col-lg-12 tutor-prof-summ normal-lable-h nopadding">
                <h3 class="res-heading">Learning Center</h3>
                <div class="sec-content clearfix">
                    <div id="cert_details">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form-block">
                            <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 text-right form-label">
                                <img src="{{ asset('public/sites/images') }}<?= !empty($EduPartner->tutor_logo) ? '/tutor/' . @$EduPartner->user_id . '/' . @$EduPartner->tutor_logo : '/dummy.jpg' ?>" height="65" width="80"  id="userImg" class="">
                            </div>
                            <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9 form-inputs">
                                <input type="file" name="tutor_logo" id="tutor_logo" onchange= "readURL(this, 'userImg')" >
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form-block">
                            <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 text-right form-label">
                                Name
                            </div>
                            <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9 form-inputs">
                                <input type="text" id="lc_name" name="lc_name" value="<?= @$EduPartner->lc_name; ?>" placeholder="" required>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form-block">
                            <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 text-right form-label">
                                Contact
                            </div>
                            <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9 form-inputs">
                                <input type="text" id="lc_contact" name="lc_contact" value="<?= @$EduPartner->lc_contact; ?>" placeholder="Contact" required>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form-block">
                            <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 text-right form-label">
                                Address
                            </div>
                            <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9 form-inputs">
                                <input type="text" id="lc_address" name="lc_address" value="<?= @$EduPartner->lc_address; ?>" placeholder="Address" required>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form-block">
                            <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 text-right form-label">
                                Description
                            </div>
                            <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9 form-inputs">
                                <textarea type="text" id="lc_description" name="lc_description" placeholder="Description" required><?= @$EduPartner->lc_description; ?></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 nopadding privacy-btn-sec">
                    <button type="submit" class="add-method-btn" id="save-resume">Save</button>
                </div>
            </div>
        </div>
    </form>
<?php } ?>
@endsection




