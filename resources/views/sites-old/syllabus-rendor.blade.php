<div id="subject_sections">
    <div class="checkbox-group qualifications filters-section noborder clearfix">
        <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 text-right form-label subName">
            <span>{{$subject_name}}</span><br>
            <span class="sub-label fee_range"></span>
            <input type="hidden" name="subjects[]" value="{{$subject_name}}">
        </div>
        <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9 checkbox-rt-sec sibling">
            <div id="lesson-options">
                <?php
                foreach ($syllabus as $key => $value) {
                    ?>
                    <div class="col-md-4 check-block">
                        <label class="media request-check checkbox facet-checkbox" title="{{ @$value }}">
                            <input type="checkbox" class="syll" name="s_id[{{$subject_name}}][{{$key}}]" value="{{$key}}" data-value="{{@$value}}">
                            <input type="hidden" id="{{@$value}}" class="syllabus" name="syllabus_details[{{$subject_name}}][{{$key}}]" value="" >
                            <div>
                                <span>{{ @$value }}</span>
                            </div>
                        </label>
                    </div>

                <?php } ?>
            </div>
            <!--End of hidden check-box Group section-->
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form-inputs"> 
                <div class="row noborder filters-section irs-slide hide-elem " style="display: none;">
                    <div>
                        <!--<input type="hidden" id="range1" value="" name="p_range[{{$subject_id}}]" class="range_slide irs-hidden-input" readonly="">-->
                        <input type="hidden" id="range1" value=""  name="syllabus_details[{{$subject_name}}][p_range]" class="range_slide irs-hidden-input" readonly="">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 nopadding">
            <button type="button" class="add-method-btn subj-done pull-right" style="display:none">Done</button>
        </div>
    </div>
</div>