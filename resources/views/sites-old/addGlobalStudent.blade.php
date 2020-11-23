@extends('sites-student.layout.student')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    @if(Session::has('message'))
    <p class="alert {{ Session::get('alert-class') }}">{{ Session::get('message') }}</p>
    @endif
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            </div>
        </div>
    </section>
    <?php // pr($_POST); ?>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid add-student">
            <!-- SELECT2 EXAMPLE -->
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title"><?= !empty($TutorStudent) ? 'Update ' : 'Add ' ?>Student Profile </h3>
                    <div style="float: right" class="btn btn-primary">
                        @if($addManual != 'true')
                        <a href="{{url('lcstudent')}}?addManual=true" style="margin-left: 10px; color:whitesmoke;" > Add Students from Global List </a>
                        @else
                        <a href="{{url('lcstudent')}}" style="margin-left: 10px;color:whitesmoke;" > Add students Manually</a>
                        @endif
                    </div>
<!--                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
                    </div>-->
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    @if($addManual != 'true')
                    <form action="{{url('lcstudents')}}" id="t_profile" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                        {{ csrf_field() }}
                        <div class="row">
                            <input type="hidden" name="student_id" value="<?= @$TutorStudent->id ?>" >

                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <img src="{{ asset('public/sites/images') }}<?= !empty($TutorStudent->avatar) ? '/student/' . $tutorId . '/' . $TutorStudent->avatar : '/dummy.jpg' ?>" height="65" width="80"  id="userImg" class="img-thumbnail" />
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group mgt30">
                                            <!--  <div class="custom-file">
                                                 <input type="file" class="custom-file-input" name="student_image" id="tutor_logo" onchange= "readURL(this, 'userImg')" >
                                                 <label class="custom-file-label" for="tutor_logo">Choose file</label>
                                             </div>
                                            -->
                                            <!-- bnew -->
                                            <div class="file btn btn-primary">
                                                Upload
                                                <input type="file" class="custom-file-input hide-this" name="student_image" id="tutor_logo" onchange= "readURL(this, 'userImg')" >
                                            </div>
                                            <!-- bnew -->
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label> First Name</label>
                                    <input class="form-control" type="text" id="fname" name="fname" value="<?= @$TutorStudent->fname; ?>" placeholder="First Name">
                                    @if (@$errors->has('fname'))
                                    <span class="help-block">
                                        <strong>{{ @$errors->first('fname') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label> Email</label>
                                    <input class="form-control" type="text" id="email" name="email" value="<?= @$TutorStudent->email; ?>" placeholder="Email" >
                                    <span id="email-err" style="color: red"></span>
                                    @if (@$errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ @$errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label> Gender</label>
                                    <select class="form-control" name="gender" id="gender">
                                        <option <?= (@$TutorStudent->gender == 'Male') ? 'selected' : '' ?>>Male</option>
                                        <option <?= (@$TutorStudent->gender == 'Female') ? 'selected' : '' ?>>Female</option>
                                    </select> 
                                </div>


                            </div>
                            <div class="col-md-6 mgt10">
                                <div class="form-group">
                                    <label> Last Name</label>
                                    <input class="form-control" type="text" id="lname" name="lname" value="<?= @$TutorStudent->lname; ?>" placeholder="Last Name">
                                    @if (@$errors->has('lname'))
                                    <span class="help-block">
                                        <strong>{{ @$errors->first('lname') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label> Contact</label>
                                    <input class="form-control" type="text" id="phone" name="contact" value="<?= @$TutorStudent->phone; ?>" placeholder="Contact">

                                </div>

                                <div class="form-group">
                                    <label> Address</label>
                                    <input class="form-control" type="text" id="address" name="address" value="<?= @$TutorStudent->address; ?>" placeholder="Address">
                                    @if (@$errors->has('address'))
                                    <span class="help-block">
                                        <strong>{{ @$errors->first('address') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                <!--                                <div class="form-group">
                                                                    <label> Password</label>
                                                                    <input class="form-control" type="password" id="password" name="password" value="<?php // @$TutorStudent->address;   ?>" placeholder="Password">
                                                                    @if (@$errors->has('password'))
                                                                    <span class="help-block">
                                                                        <strong>{{ @$errors->first('password') }}</strong>
                                                                    </span>
                                                                    @endif
                                                                </div>-->

                                <div class="form-group">  <label>&nbsp;</label>
                                    <div class="row"><div class="col-md-4"><button type="submit" class="form-control btn-primary" id="save-resume">Save</button></div></div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <!-- /.col -->
                    @else
                    <form action="{{url('addLcGlobalStudent')}}"  enctype="multipart/form-data" method="post" accept-charset="utf-8">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <div class="custom-control custom-radio">
                                <input class="custom-control-input" type="radio" id="findBy1" value="email" name="findBy" checked>
                                <label for="findBy1" class="custom-control-label">Find By Email</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input class="custom-control-input" type="radio" id="findBy2" value="name" name="findBy">
                                <label for="findBy2" class="custom-control-label">Find By Name</label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group" id="findByEmail">
                                    <label>Find students by Email</label>
                                    <select class="select2" multiple="multiple" name="students[]" id="findStudent" data-placeholder="Select Students" style="width: 50%;">
                                        @if(!empty($students))
                                        @foreach ($students as $key => $student)
                                        <option value="{{ $key }}">{{ $student }}</option>
                                        @endforeach
                                        @endif
                                    </select>
                                    <img src="{{asset('public/sites/images/ajax-loader.gif')}}" id="loaderimg" style="background:none;display: none;" height="30" width="30">
                                </div>
                                <div class="form-group" id="findByName" style="display: none;">
                                    <label>Find students by Name</label>
                                    <select class="select2" multiple="multiple" name="students[]" id="findStudents" data-placeholder="Select Students" style="width: 50%;">
                                        @if(!empty($studentsByName))
                                        @foreach ($studentsByName as $key => $student)
                                        <option value="{{ $key }}">{{ $student }}</option>
                                        @endforeach
                                        @endif
                                    </select>
                                    <img src="{{asset('public/sites/images/ajax-loader.gif')}}" id="loaderimg" style="background:none;display: none;" height="30" width="30">
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-primary" id="save-resume" >submit</button>
                        </div>
                    </form>

                    @endif
                </div>

            </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<script>
    $('input[type=radio]').change(function () {
        var value = $('input[name=findBy]:checked').val();
        console.log(value)
        if (value == 'email') {
            $("#findByEmail").show()
            $("#findByName").hide()
        } else {
            $("#findByEmail").hide()
            $("#findByName").show()
        }
    });

    $(document).ready(function () {
        $("input[type='button']").click(function () {
            var radioValue = $("input[name='gender']:checked").val();
            if (radioValue) {
                alert("Your are a - " + radioValue);
            }
        });
    });

    $("#findStudent").select2({
        allowClear: true,
        width: '300px',
        height: '34px',
        placeholder: 'select..'
                //data: data
    });
    $('#email').on('blur', function () {
        var email = $('#email').val();
        $.ajax({
            url: $('meta[name="route"]').attr('content') + '/isemailexist',
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            method: 'post',
            data: {'email': email},
            success: function (res) {
                if (res.status == 'exist') {
                    $('#email-err').text(res.msg)
                    $("#save-resume").attr('type', 'button');
                } else {
                    $('#email-err').text('')
                    $("#save-resume").attr('type', 'submit');
                }
                console.log(res.status)
            }
        })
    });
</script>
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