@extends('sites.layout.tutor')
@section('content')
<?php // pr($EducationButtons); ?>
<div class="right-block col-xs-12 col-sm-12 col-md-12 col-lg-12 normal-lable-h compress-spacing nopadding body-top-gap">
    <h3 class="res-heading">Qualifications</h3>
    <div class="sec-content clearfix">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form-block">
            <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 text-right form-label">
                Your Title
            </div>
            <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9 form-inputs">
                <div class="form-select full">
                    <select name="q_title">
                        <option  value="Undergraduate" <?= (@$Tutordetail->title == 'Undergraduate') ? 'selected' : '' ?>> Undergraduate </option>
                        <option  value="Graduate" <?= (@$Tutordetail->title == 'Graduate') ? 'selected' : '' ?>> Graduate  </option>
                        <option  value="NIE Trained" <?= (@$Tutordetail->title == 'NIE Trained') ? 'selected' : '' ?>> Lecturer </option>
                        <option  value="test" <?= (@$Tutordetail->title == 'test') ? 'selected' : '' ?>> NIE Trainee (MOE) </option>
                    </select>
                </div>
                <div class="form-block-info">
                    Based on your highest qualifications, select the category of tutors you belong to.
                    <!--                                            Based on your highest qualifications, select the category of tutors you belong to. <a href="" title="">Learn more</a>.-->
                </div>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form-block">
            <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 text-right lock form-label">
                Verified Credentials
            </div>
            <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9 form-inputs">
                <div class="clearfix univ-detail-block">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 awaiting-approval nopadding">None</div>
                </div>
                <!--<div class="addbtn red clearfix add-more" id="h">Add More</div>-->
                <div class="form-block-info">
                    Add qualifications to your resume.
                </div>
            </div>
        </div>
        <div id="cert_details">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form-block">
                <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 text-right form-label">
                    School/Institution
                </div>              <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9 form-inputs">
                    <input type="text" name="school" value="<?= @$Tutordetail->institute; ?>" placeholder="" list="datalist" required>
                    <datalist id="datalist">
                        <option value="Parasmani School" data-id="2">
                        <option value="" data-id="3">
                        <option value="Ahmad Ibrahim Primary School" data-id="4">
                        <option value="Ahmad Ibrahim Secondary School" data-id="5">
                        <option value="Ai Tong School" data-id="6">
                        <option value="Al-Khairiah Islamic School" data-id="7">
                        <option value="Alexandra Primary School" data-id="8">
                        <option value="Alsagoff Arab School" data-id="9">
                        <option value="Anchor Green Primary School" data-id="10">
                    </datalist>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form-block">
                <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 text-right form-label">
                    Course Title
                </div>
                <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9 form-inputs">
                    <input type="text" id="c_title" name="c_title" value="<?= @$Tutordetail->course_title; ?>" placeholder="" required>
                </div>
            </div>
            <?php $dob = get_custom_dob(); ?>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form-block">
                <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 text-right form-label">
                    Start Year
                </div>
                <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9 form-inputs">
                    <div class="form-select ">

                        <select name="s_year" id="s_year">
                            <?php
                            foreach ($dob['years'] as $key => $value) {
                                ?>
                                <option value="<?= $value ?>" <?= (@$Tutordetail->start_year == $value) ? 'selected' : '' ?>><?= $value ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form-block">
                <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 text-right form-label">
                    Course Duration
                </div>
                <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9 form-inputs">
                    <div class="form-select">
                        <select name="c_duration" id="c_dur">
                            <option value="1" <?= (@$Tutordetail->course_duration == 1) ? 'selected' : '' ?>>1</option>
                            <option value="2" <?= (@$Tutordetail->course_duration == 2) ? 'selected' : '' ?>>2</option>
                            <option value="3" <?= (@$Tutordetail->course_duration == 3) ? 'selected' : '' ?>>3</option>
                            <option value="4" <?= (@$Tutordetail->course_duration == 4) ? 'selected' : '' ?>>4</option>
                            <option value="5" <?= (@$Tutordetail->course_duration == 5) ? 'selected' : '' ?>>5</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form-block">
                <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 text-right form-label">
                    Awaiting Verification
                </div>
                <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
                    <div class="row univ-detail-block block-2" style="display: none;">
                        <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 text-right form-label certificate-name"></div>
                    </div>
                    <div class="clearfix univ-detail-block">
                        <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 text-right form-label">None</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 nopadding privacy-btn-sec">
        <button type="submit" class="add-method-btn" id="save-resume">Save Resume</button>
    </div>
</div>
@endsection




