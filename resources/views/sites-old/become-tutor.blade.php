@extends('sites.layout.tutor')
@section('content')
<?php // pr(@$Tutordetail);  ?>
<div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 nopadding">
    <form action="{{asset('becomea_tutor')}}" class="tuti-form profile-form" id="t_profile" enctype="multipart/form-data" method="post" accept-charset="utf-8" novalidate>
        {{ csrf_field() }}

        <input type="hidden" name="tutor_listing_id" value="<?= @$Tutordetail->user_id; ?>" >
        <input type="hidden" name="section" value="save_summary">
        <div class="right-block col-xs-12 col-sm-12 col-md-12 col-lg-12 tutor-prof-summ normal-lable-h nopadding">
            <h3 class="res-heading">Profile Summary</h3>
            <div class="sec-content clearfix">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form-block">
                    <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 text-right form-label">
                        Profile Description
                    </div>
                    <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9 form-inputs">
                        <input type="text" name="profile_desc" value="<?= @$Tutordetail->profile_description; ?>" placeholder="">
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form-block">
                    <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 text-right form-label">
                        Your Teaching Style
                    </div>
                    <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9 form-inputs">
                        <textarea name="teaching-style"><?= @$Tutordetail->teaching_style; ?></textarea>
                        <div class="form-block-info">
                            Tell them what it’s like to have you as their tutor. What is your teaching approach or professional traits? Do you have a motto?
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 nopadding privacy-btn-sec">
                <button type="submit" name="saveButton" value="saveSummary" class="add-method-btn">Save Summary</button>
            </div>
        </div>
    </form>

    <form action="{{asset('becomea_tutor')}}" class="tuti-form profile-form"  enctype="multipart/form-data" method="post" accept-charset="utf-8" novalidate>
        {{ csrf_field() }}
        <input type="hidden" name="tutor_listing_id" value="" >
        <input type="hidden" name="section" value="save_resume" >
        <div class="right-block col-xs-12 col-sm-12 col-md-12 col-lg-12 normal-lable-h compress-spacing nopadding body-top-gap">
            <h3 class="res-heading">Qualifications</h3>
            <div class="sec-content clearfix">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form-block">
                    <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 text-right form-label">
                        Your Title
                    </div>
                    <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9 form-inputs">
                        <div class="form-select full">
                            <select name="qualification_title">
                                <option  value="Undergraduate" <?= (@$Tutordetail->title == 'Undergraduate') ? 'selected' : '' ?>> Undergraduate </option>
                                <option  value="Graduate" <?= (@$Tutordetail->title == 'Graduate') ? 'selected' : '' ?>> Graduate  </option>
                                <option  value="NIE Trained" <?= (@$Tutordetail->title == 'NIE Trained') ? 'selected' : '' ?>> Lecturer </option>
                                <option  value="test" <?= (@$Tutordetail->title == 'test') ? 'selected' : '' ?>> NIE Trainee (MOE) </option>
                            </select>
                        </div>
                        <div class="form-block-info">
                            <!--Based on your highest qualifications, select the category of tutors you belong to.-->
                            Based on your highest qualifications, select the category of tutors you belong to. <a href="" title="">Learn more</a>.
                        </div>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form-block">
                    <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 text-right lock form-label">
                        Verified Credential
                    </div>
                    <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9 form-inputs">
                        <div class="clearfix univ-detail-block">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 awaiting-approval nopadding">None</div>
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
                        <div class="addbtn red clearfix add-more" id="h">Add More</div>
                        <div class="form-block-info">
                            Add qualifications to your resume.
                        </div>
                    </div>
                </div>
                <div id="cert_details" style="display: none">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form-block">
                        <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 text-right form-label">
                            School/Institution
                        </div>              <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9 form-inputs">
                            <input type="text" name="Qualification[institute_name][]" value="<?= @$Tutordetail->school_institution; ?>" placeholder="" list="institutelist" required>
                            <datalist id="institutelist">
                                @foreach($Institutes as $key=>$value)
                                <option value="{{$key}}" data-id="{{$value}}">
                                    @endforeach

                            </datalist>
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form-block">
                        <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 text-right form-label">
                            Course Title
                        </div>
                        <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9 form-inputs">
                            <input type="text" id="c_title" name="Qualification[certificate_title][]" value="<?= @$Tutordetail->course_title; ?>" placeholder="" required>
                        </div>
                    </div>
                    <?php $dob = get_custom_dob(); ?>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form-block">
                        <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 text-right form-label">
                            Start Year
                        </div>
                        <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9 form-inputs">
                            <div class="form-select ">

                                <select name="Qualification[start_year][]" id="s_year">
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
                                <select name="Qualification[course_duration][]" id="c_dur">
                                    <option value="1" <?= (@$Tutordetail->course_duration == 1) ? 'selected' : '' ?>>1</option>
                                    <option value="2" <?= (@$Tutordetail->course_duration == 2) ? 'selected' : '' ?>>2</option>
                                    <option value="3" <?= (@$Tutordetail->course_duration == 3) ? 'selected' : '' ?>>3</option>
                                    <option value="4" <?= (@$Tutordetail->course_duration == 4) ? 'selected' : '' ?>>4</option>
                                    <option value="5" <?= (@$Tutordetail->course_duration == 5) ? 'selected' : '' ?>>5</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="xs-12 col-sm-12 col-md-12 col-lg-12 nopadding">
                        <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 text-right form-label">
                            Certification
                        </div>
                        <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9 pull-right">
                            <div class="addbtn red clearfix file-plus">
                                <a class="upload-certificate-btn" href="#" onclick="document.getElementById('fileID').click(); return false;">Upload Certificates</a>
                                <input type="file" id="fileID" name="Qualification[certificate][]" style="visibility: hidden;" required/>
                                <div class="certificates-add-btn">
                                    <button type="button" class="add-method-btn"  value="Add" id="add">Add</button>
                                </div>

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
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 nopadding awaiting-approval">2 schools waiting for approval </div>
                            </div>
                            @if(!empty($ResumeDetails))
                            @foreach($ResumeDetails->institute_name as $key=>$institute)
                            <div class="row univ-detail-block">
                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 univ-detail">
                                    <h3 class="univ-name"><strong>{{$institute}}</strong></h3>
                                    <h3 class="univ-sub">{{$ResumeDetails->certificate_title[$key]}}</h3>
                                    <div class="univ-date">{{$ResumeDetails->start_year[$key]}}</div>
                                    <h3 class="univ-name">{{$ResumeDetails->course_duration[$key]}}</h3>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 univ-logo">
                                    <img class="img-responsive" src="{{@get_institute_details($institute)}}">						</div>
                                <input type="hidden" name="Qualification[institute_name][]" value="{{$institute}}">
                                <input type="hidden" name="Qualification[certificate_title][]" value="{{$ResumeDetails->certificate_title[$key]}}">
                                <input type="hidden" name="Qualification[start_year][]" value="{{$ResumeDetails->start_year[$key]}}">
                                <input type="hidden" name="Qualification[course_duration][]" value="{{$ResumeDetails->course_duration[$key]}}">
                            </div>
                            @endforeach
                            @endif
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 nopadding privacy-btn-sec">
                <button type="submit" class="add-method-btn" name="saveButton" value="saveResume" id="save-resume">Save Resume</button>
            </div>
        </div>
    </form>

    <form action="{{asset('becomea_tutor')}}" class="tuti-form profile-form"  enctype="multipart/form-data" method="post" accept-charset="utf-8" novalidate>
        {{ csrf_field() }}
        <div class="right-block col-xs-12 col-sm-12 col-md-12 col-lg-12 normal-lable-h sub-fee compress-spacing nopadding body-top-gap">
            <h3 class="res-heading">Subjects and Fees</h3>
            <div class="sec-content clearfix">

                <!-- Start of Subject Section -->
                <div id="subject_sections">
                </div>
                <!-- End of Subject Section -->
                <input type="hidden" id="selectedSyllabus" value="">
                <?php
//                prd($SyllabusDetails);
                ?>
                @if(!empty($SyllabusDetails))

                @foreach ($SyllabusDetails as $subject => $syllabus) 
                <div class="checkbox-group qualifications filters-section noborder clearfix">
                    <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 text-right form-label">
                        <span>{{$subject}}</span><br>
                        <span class="sub-label">{{@$syllabus->p_range}}<sup>SGD</sup></span>
                    </div>
                    <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9 checkbox-rt-sec">
                        <div id="lesson-options">
                            @foreach ($syllabus as $id => $value) 
                            @if(!empty($value) && $id != 'p_range' )
                            <div class="col-md-4 check-block">
                                <label class="media request-check checkbox facet-checkbox" title="{{@$value}}">
                                    <div>
                                        <input type="checkbox" name="syllabus_details[{{@$subject}}][{{@$id}}]" value="{{@$value}}" data-value="{{@$value}}" checked>
                                        <input type="hidden" id="{{@$value}}" class="syll" name="s_id[{{@$subject}}][{{@$id}}]" value="{{@$value}}" >
                                        <input type="hidden" value="{{@$syllabus->p_range}}"  name="syllabus_details[{{@$subject}}][p_range]">

                                    </div>
                                    <div>
                                        <span>{{@$value}}</span>
                                    </div>
                                </label>
                            </div>
                            @endif
                            @endforeach
                        </div>
                    </div>
                </div>
                @endforeach
                @endif
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 filters-section noborder form-block" style="">
                    <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 text-right form-label">

                    </div>
                    <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9 form-inputs">

                        <div class="form-block-info irs-slide">
                            Specify a range of fees for various syllabi and/or age groups. <br>You may settle on a specific rate after engagement.
                        </div>
                        <div class="addbtn red clearfix add-sub-btn" data-id="open" onclick="formOpenClose('add-sub-btn', 'sub-add-1');">Add Subject</div>
                        <div id="s_err_msg" style="font-size: 15px;"></div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 new-sub form-block sub-add-1" id="" style="display: block;">
                    <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 text-right form-label">
                        New Subject
                    </div>

                    <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9 form-inputs">
                        <div class="col-xs-12 col-sm-10 col-md-10 col-lg-10 nopadding">
                            <!--                                            <div class="form-select">
                                                                            <select name="subject_id" id="s_course">
                                                                            </select>
                                                                        </div>-->
                            <?php // pr($SubjectSyllabus); ?>
                            <input type="hidden" name="subject_id" id="subject_id" value="">
                            <input type="text" name="subject_name" id="subject_name" placeholder="Level &amp; Subject" class="form-control subject" list="subj_list" style="border-top-right-radius: 0;border-bottom-right-radius: 0;">
                            <datalist id="subj_list">
                                <?php foreach ($SubjectSyllabus as $key => $value) { ?>
                                    <option value="<?= $value->subjects_name ?>" data-id="<?= $value->id ?>"></option>
                                <?php } ?>
                            </datalist>

                        </div>

                        <!--<div class="col-xs-12 col-sm-5 col-md-5 col-lg-5 ">
                          <input type="text" name="syllabus_name" value="" placeholder="" id="e_subject">
                        </div>-->
                        <div class="col-xs-5 col-sm-4 col-md-3 col-lg-2 nopadding">
                            <input type="button" name="" value="Enter" id="show-sub">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 nopadding privacy-btn-sec">
                <button type="submit" name="saveButton" value="saveSubject" class="add-method-btn">Save Subjects</button>
            </div>
        </div>
    </form>
    <!--Additional Specifications-->
    <form action="{{asset('becomea_tutor')}}" class="tuti-form profile-form"  enctype="multipart/form-data" method="post" accept-charset="utf-8" novalidate>
        {{ csrf_field() }}
        @include('sites/AdditionalSpecifications')
    </form>
    <!--End Additional Specifications-->

</div>
</div>
<div class="modal fade alert-modal" id="plan_check_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content"> 
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Alert</h4>
            </div>   

            <div class="modal-body">
                <div class="form-group">                       
                    <div class="">
                        Please Purchase Plan First.
                    </div>
                </div>
                <div class="modal-footer">
                    <a class="btn success btn-primary" href="{{url('subscribe')}}">Subscribe</a>
                </div>

            </div>

        </div>
    </div>
</div>

<script>
    var subj_done = 1;

    $(document).ready(function () {
        $(".sub-add-1").hide();
        $(".hide-verify-phone").hide();
        $('.nav_bar').click(function () {
            $('.mob-navigation').toggleClass('visible');
            $('body').toggleClass('opacity');
        });
    });
    $('#help-tab').click(function () {
        $('.h-s-articles').toggle();
    });
    $(".checkbox-show").click(function () {
        $(this).parent().parent().find('.hide-check-box-sec').slideToggle();
        var srcUrl = $(this).find('img').attr('src');
        if (srcUrl == {{url('public/sites/users/images/more-filter-down-arrow.png')}})
            $(this).find('img').attr('src', "{{url('public/sites/users/images/more-filter-down-arrow.png')}}");
        else
            $(this).find('img').attr('src', "{{url('public/sites/users/images/more-filter-up-arrow.png')}}");
    });




    $("#show-sub").click(function (e) {
        var str = '';
        var subject_id = getSubId();
        var subject_name = $.trim($("#subject_name").val());

        if (subj_done == 0) {
            swal("Please done the subject before add new !");
//            confirmBox("Please done the subject before add new !");
        } else if (subject_name == "") {
            $('#s_err_msg').text('Please Enter Subject Name');
            //swal({   title: "Error!",   text: "Please Enter Subject Name!",   type: "error"});
            $("#subject_name").focus();
            e.preventDefault();
        } else if (subject_id == 0) {
            swal({
                title: "Subject " + subject_name + " Not Found Our Database",
                text: "Add the new subject ",
                type: "info",
                showCancelButton: true,
                closeOnConfirm: false,
                showLoaderOnConfirm: true,
                confirmButtonText: "Add"
            },
                    function () {
                        $.ajax({
                            url: "getSubjectSyllabusListById",
                            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                            type: "post",
                            data: {'subject_id': subject_id, 'subject_name': subject_name},
                            datatype: 'json',
                            success: function (res) {
                                data = $.parseJSON(res);
                                if (res == 0) {
                                    swal("Subject Added Successfully ! Wait for admin approval");
                                    $('#save_subject_name').show();
                                }
                            },
                        });
                    });
        } else {
            $.ajax({
                url: "getSubjectSyllabusListById",
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                type: "post",
                data: {'subject_id': subject_id, 'subject_name': subject_name},
                datatype: 'json',
                beforeSend: function () {

                },
                success: function (res) {
//                    data = $.parseJSON(res);
                    if (res.trim() != 'not found') {
//                        $('.irs-slide').show();
                        $('#subject_sections').append(res);
                        subj_done = 0;
//                        $("#subject_name").val('');
                        range_slider();
                        formOpenClose('add-sub-btn', 'sub-add-1')
                    } else {
                        swal({title: "Error!", text: "Not Result Found!", type: "error"});
                    }
                }
            })
        }
    });





    function formOpenClose(str = null, hide_show = null) {
        if (str == null) {
            str = "request_form";
        }
        if (hide_show == null) {
            hide_show = str;
        }

        var btn_id = $("." + str).attr('data-id');
        if (btn_id == "close") {
            $("." + str).attr('data-id', 'open')
            $("." + hide_show).show();
        } else {
            $("." + str).attr('data-id', 'close')
            $("." + hide_show).hide();
    }
    }
    function confirmBox(str = null, url = null, id = null) {
        if (str == null) {
            str = 'Tutify Alert :';
        }
        bootbox.confirm(str, function (result) {
            if (result) {
                window.location.href = url;
                return true;
            }
        });
    }
    function readName(input, id = null) {
        f = input.value.replace(/.*[\/\\]/, '');
        $('.prev_btn').html(f + '<span class="remove_sample"><img src="{{url('"public/sites/users/images/red-cross.jpg"')}}"></span>');
    }


    function clearCoords()
    {
        $('.coords').val(0);
    }
    ;

    function range_slider(range_from = null, range_to = null) {
        if (range_from == null) {
            range_from = 0;
        }
        if (range_to == null) {
            range_to = 10000;
        }

        $(".range_slide,#range").ionRangeSlider({
            hide_min_max: true,
            keyboard: true,
            min: 0,
            max: 10000,
            from: range_from,
            to: range_to,
            type: 'double',
            step: 1,
            prefix: "$",
            grid: true,
        });
    }
    function owlSlider(div_ids) {
        jQuery(div_ids).owlCarousel({
            navigation: true,
            items: 4,
            pagination: false,
            //transitionStyle : "fade",
            autoPlay: 5000,
            stopOnHover: true,
            responsive: {
                0: {
                    items: 1
                },
                480: {
                    items: 2
                },
                768: {
                    items: 3
                },
                1200: {
                    items: 5
                },
            },
            navigationText: ["", ""],
            responsive: true,
            nav: true,
            loop: false,
            dots: true,
            dotsEach: 1,
            autoplaySpeed: 300,
            dotsSpeed: 400,
            navRewind: true,
            animateOut: 'fadeOut'

        });
    }

    $(document).on('change', ".syll", function () {
        var selected_chk = 0;
        $("#selectedSyllabus").val(0);
        if ($(this).prop("checked")) {
            selected_chk = 1;
            var setValue = $(this).attr('data-value');
            $("#" + setValue).val(setValue)
        }

        $("#selectedSyllabus").val(selected_chk);
        if (selected_chk > 0) {
            $(this).parent().parent().parent().siblings('.form-inputs').children('.irs-slide').show();
            $(this).parent().parent().parent().parent().siblings('.nopadding').children('.subj-done').show();
        } else {
            $(this).parent().parent().parent().siblings('.form-inputs').children('.irs-slide').hide();
            $(this).parent().parent().parent().parent().siblings('.nopadding').children('.subj-done').hide();
//            $('.subj-done').hide();
        }
    });

    $(document).on('click', '.subj-done', function () {
        var ch = null;
        var subject_id = getSubId();
        var subject_name = $('#subject_name').val()

//        ch = $('#'+subject_name).val();
        ch = $("#selectedSyllabus").val();

        var slider_range = $(this).parent().siblings('.sibling').children('.form-inputs').children('.irs-slide').children().children('.range_slide').val();
        var splt_value = slider_range.split(';');
        $(this).parent().siblings('.subName').children('.fee_range').html('$' + splt_value[0] + '-' + splt_value[1] + '<sup>SGD</sup>');

        if (ch) {
            subj_done = 1;
            $(this).hide();
            $('.irs-slide').hide();
            ch = null;
        } else {
            swal({title: "Error!", text: "Please Select Syllabus", type: "error"});
//            confirmBox("Please Select Syllabus");
        }
    });

    function getSubId() {
        var val = $('#subject_name').val()
        var xyz = $('#subj_list option').filter(function () {
            return this.value == val;
        }).data('id');
        return subj_id = xyz ? xyz : 0;
    }


//FOR VERIFIED CREDENTIALS
    $(function () {
        $("#cert_details,#sadd").hide();
        range_slider(null, null);
    });

    $(".add-more").click(function ()
    {
        var btn_id = $(this).attr('id');
        if (btn_id == "h") {
            $('.add-more').attr('id', 's')
            $("#cert_details").show();
        } else {
            $('.add-more').attr('id', 'h')
            $("#cert_details").hide();
        }
    });

    $('#save-resume').click(function () {
        $('#cert_details').show();
    });

    document.getElementById('fileID').onchange = function () {
        $('.file-plus').hide();
        $('.block-2').show();
        $('.certificate-name').append('Ashish_13521.' + this.value.split('.')[1]);

        f = this.value.replace(/.*[\/\\]/, '');
        $('.upload-certificate-btn').text(f);

    };
</script>
@endsection
