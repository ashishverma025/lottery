<input type="hidden" name="tutor_listing_id" value="" style="display:none;" />
<input type="hidden" name="section" value="save_options" style="display:none;" />
<div class="right-block col-xs-12 col-sm-12 col-md-12 col-lg-12 addi-spec compress-spacing nopadding body-top-gap">
    <h3 class="res-heading">Additional Specifications</h3>
    <div class="references-content col-xs-12 col-sm-12 col-md-12 col-lg-12 nopadding">
        <div class="row filters-section">
            <div class="col-lg-3 col-md-12 text-right form-label">Services</div>
            <?php
            $Services = [6 => 'Group Lessons', 12 => 'Teaching Material', 5 => 'Private Lessons', 13 => 'Fixed Timeslot', 14 => 'Any Timeslot'];
            $TeachingLocations = [6 => 'Group Lessons', 12 => 'Teaching Material', 5 => 'Private Lessons', 13 => 'Fixed Timeslot', 14 => 'Any Timeslot'];
            $FeeCollection = [6 => 'Group Lessons', 12 => 'Teaching Material', 5 => 'Private Lessons', 13 => 'Fixed Timeslot', 14 => 'Any Timeslot'];
            $srvc = array_chunk($Services, 3);
            $Services1 = $srvc[0];
            $Services2 = $srvc[1];
//            pr(array_chunk($Services, 3));
            ?>
            <div class="col-lg-9 col-md-12 col-xs-12 checkbox-rt-sec">
                <div class="" id="lesson-options">
                    @foreach($Services1 as $id=>$name)
                    <?php
                    $chkd = "";
                    if (in_array($id, (array) @$lessions)) {
                        $chkd = 'checked';
                    }
                    ?>
                    <div class="col-sm-4 check-block">
                        <label class="checkbox-lesson-type lesson-type-box">
                            <div class="checkbox_lesson_label">
                                <img class="img-responsive check-box-img" src="{{ asset('public/sites/users/usr-icon.png')}}">
                                <span>{{$name}}</span>
                            </div>
                            <div class="checkbox_lesson_input">
                                <input type="checkbox" name="lession_ids[]" value="{{$id}}" {{$chkd}}>
                            </div>
                        </label>
                    </div>
                    @endforeach
                    <button type="button" class="checkbox-show"><img class="img-responsive" src="{{ asset('public/sites/users/more-filter-down-arrow.png')}}"></button>
                </div>
                <!--hidden check-box section-->
                <div class="hide-check-box-sec">
                    @foreach($Services2 as $id=>$name)
                    <?php
                    $chkd = "";
                    if (in_array($id, (array) @$lessions)) {
                        $chkd = 'checked';
                    }
                    ?>
                    <div class="col-sm-4 check-block">
                        <label class="checkbox-lesson-type lesson-type-box">
                            <div class="checkbox_lesson_label">
                                <img class="img-responsive check-box-img" src="{{ asset('public/sites/users/usr-icon.png')}}"> 
                                <span>{{$name}}</span>
                            </div>
                            <div class="checkbox_lesson_input">
                                <input type="checkbox" name="lession_ids[]" value="{{$id}}"  {{$chkd}}>
                            </div>
                        </label>
                    </div>
                    @endforeach
                </div>
                <!--end of hidden check-box section-->
            </div>
        </div>



        <?php
        $TeachingLocations = [1 => 'Orange', 2 => 'Hollywood', 3 => 'Mid-Wilshire'];
        $FeeCollection = [6 => 'Group Lessons', 12 => 'Teaching Material', 5 => 'Private Lessons'];
        ?>

        <div class = "checkbox-group neighborhoods filters-section clearfix" data-name = "neighborhoods">
            <div class = "col-lg-3 col-md-12 form-label">Teaching Locations</div>

            <div class = "col-lg-9 col-md-12 col-xs-12 checkbox-rt-sec">
                <div id = "lesson-options">
                    @foreach($TeachingLocations as $id=>$name)
                    <?php
                    $chkd = "";
                    if (in_array($id, (array) @$teachingLocations)) {
                        $chkd = 'checked';
                    }
                    ?>
                    <div class = "col-md-4 check-block">
                        <label class = "media request-check checkbox facet-checkbox" title = "{{$name}}">
                            <div>
                                <input type = "checkbox" name = "loc_ids[]" value = "{{$id}}" {{$chkd}} >
                            </div>
                            <div>
                                <span>{{$name}}</span>
                            </div>
                        </label>
                    </div>
                    @endforeach
                    <button type = "button" class = "checkbox-show"><img class = "img-responsive" src = "{{ asset('public/sites/users/more-filter-down-arrow.png')}}"></button>
                </div>
                <!--Start of hidden check-box Group section-->
                <div class = "hide-check-box-sec">

                    <div class = "col-md-4 check-block">
                        <label class = "media request-check checkbox facet-checkbox" title = "Orange">
                            <div>
                                <input type = "checkbox" name = "loc_ids[]" value = "4" >
                            </div>
                            <div>
                                <span>Orange</span>
                            </div>
                        </label>
                    </div>
                </div>
                <!--End of hidden check-box Group section-->
            </div>
        </div>
        <!--End Teaching Location Section -->

        <!--Start FeeCollection Section -->
        <div class = "checkbox-group neighborhoods filters-section clearfix" data-name = "neighborhoods">
            <div class = "col-lg-3 col-md-12 form-label">Fee Collection</div>

            <div class = "col-lg-9 col-md-12 col-xs-12 checkbox-rt-sec">
                <div id = "lesson-options">


                    @foreach($FeeCollection as $id=>$name)
                    <?php
                    $chkd = "";
                    if (in_array($id, (array) @$feeCollection)) {
                        $chkd = 'checked';
                    }
                    ?>
                    <div class = "col-md-4 check-block">
                        <label class = "media request-check checkbox facet-checkbox" title = "{{$name}}">
                            <div>
                                <input type = "checkbox" name = "fee_collect_id[]" value = "{{$id}}" {{$chkd}}>
                            </div>
							<div class="label-text">
                                <span>{{$name}}</span>
                            </div>
							<div class="info"><span data-toggle="tooltip" title="" data-original-title="Verified Credential / Awaiting Verification"><img class="question-icon" src="http://54.179.188.91/public/sites/users/img/qus-icon.png" alt=""></span></div>
                        </label>
                    </div>
                    @endforeach

                </div>
                <!--End of hidden check-box Group section-->
            </div>
        </div>
        <!--End FeeCollection Section -->

        <!--Start language Section -->

        <?php
        $Languages1 = [1 => 'Afar', 2 => 'Abkhaz', 3 => 'Avestan'];
        $Languages2 = [4 => 'Afrikaans', 5 => 'Akan', 6 => 'Amharic', 7 => 'Aragonese', 8 => 'Arabic', 9 => 'Assamese', 10 => 'Avaric', 11 => 'Aymara', 12 => 'Azerbaijani',
            13 => 'Bashkir', 14 => 'Belarusian', 15 => 'Bulgarian', 16 => 'Bihari', 17 => 'Bislama', 18 => 'Bambara', 19 => 'Bengali', 20 => 'Tibetan Standard, Tibetan, Central', 21 => 'Breton'
        ];
        ?>

        <div class = "checkbox-group neighborhoods filters-section clearfix" data-name = "neighborhoods">
            <div class = "col-lg-3 col-md-12 form-label">Languages</div>

            <div class = "col-lg-9 col-md-12 col-xs-12 checkbox-rt-sec">
                <div id = "lesson-options">
                    @foreach($Languages1 as $id=>$name)
                    <?php
                    $chkd = "";
                    if (in_array($id, (array) @$languages)) {
                        $chkd = 'checked';
                    }
                    ?>
                    <div class = "col-md-4 check-block">
                        <label class = "media request-check checkbox facet-checkbox" title = "{{$name}}">
                            <div>
                                <input type = "checkbox" name = "language_id[]" value = "{{$id}}" {{$chkd}}>
                            </div>
                            <div>
                                <span>{{$name}}</span>
                            </div>
                        </label>
                    </div>
                    @endforeach
                    <button type = "button" class = "checkbox-show"><img class = "img-responsive" src = "{{ asset('public/sites/users/more-filter-down-arrow.png')}}"></button>
                </div>
                <!--Start of hidden check-box Group section-->
                <div class = "hide-check-box-sec">
                    @foreach($Languages2 as $id=>$name)
                    <?php
                    $chkd = "";
                    if (in_array($id, (array) @$languages)) {
                        $chkd = 'checked';
                    }
                    ?>
                    <div class = "col-md-4 check-block">
                        <label class = "media request-check checkbox facet-checkbox" title = "{{$name}}">
                            <div>
                                <input type = "checkbox" name = "language_id[]" value = "{{$id}}" {{$chkd}}>
                            </div>
                            <div>
                                <span>{{$name}}</span>
                            </div>
                        </label>
                    </div>
                    @endforeach
                </div>
                <!--                End of hidden check-box Group section-->
            </div>
        </div>
        <!--End language Section -->
    </div>
    @if(@$sideActive == 'becomeTutor') 
    <div class = "col-xs-12 col-sm-12 col-md-12 col-lg-12 nopadding privacy-btn-sec">
        <button type = "submit" name="saveButton" value="saveOption" class = "add-method-btn">Save Options</button>
    </div>
    @endif
</div>