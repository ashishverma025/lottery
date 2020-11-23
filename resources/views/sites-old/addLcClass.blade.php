@include('sites-student/includes.head')
<!-- /.navbar -->
@include('sites-student/includes.sidebar')
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
        <div class="container-fluid">
            <!-- SELECT2 EXAMPLE -->
            <div class="card card-default">

                <div class="card-header">
                    <h3 class="card-title">{{ !empty(@$ClassDetails) ? 'Update ' : 'Add ' }}Class</h3>
<!--                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
                    </div>-->
                </div>

                <!-- /.card-header -->
                <div class="card-body">
                    <form action="{{url('addclass')}}" id="t_profile" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                        {{ csrf_field() }}
                        <input type="hidden" value="{{@$ClassDetails->id}}" name="classId" >
                        <div class="row">
                            <div class="col-md-6">

                                <input type="hidden" name="student_id" value="<?= @$TutorStudent->id ?>" >
                                <div class="form-group">
                                    <label> Class Name</label>
                                    <input type="text" id="class_name" class="form-control" name="class_name" autocomplete="off" value="<?= @$ClassDetails->class_name; ?>" placeholder="Class Name" required>
                                    @if (@$errors->has('class_name'))
                                    <span class="help-block">
                                        <strong>{{ @$errors->first('class_name') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label> Class Time</label>    
<!--                                    <input type="time" class="form-control" id="class_time" name="class_time"   required>
                                    -->

                                    <div class="input-group date" id="timepicker" data-target-input="nearest">
                                        <input type="text" class="form-control datetimepicker-input" name="class_time" value="<?= @$ClassDetails->class_time; ?>" data-target="#timepicker"  placeholder="Start Time" />
                                        <div class="input-group-append" data-target="#timepicker" data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="far fa-clock"></i></div>
                                        </div>
                                        @if ($errors->has('class_time'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('class_time') }}</strong>
                                        </span>
                                        @endif
                                    </div>

                                </div>

                                <div class="form-group">
                                    <label> Day </label>
                                    <br>
                                    @foreach ($week_days as $key => $value)
                                    <div class="icheck-success d-inline ">
                                        {{ $value }} :<input type="checkbox" class="form-control" name="class_day[]"  id="checkboxPrimary{{$key}}" value="{{ $value }}" {{ in_array($value, @$selectedClass) ? 'checked' : ''}}>
                                                             <label for="checkboxPrimary{{$key}}">
                                        </label>
                                        @if ($errors->has('class_day'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('class_day') }}</strong>
                                        </span>
                                        @endif 
                                    </div>
                                    @endforeach
                                </div>
                                <div class="form-group">
                                    <div class="col-md-3">
                                        <button type="submit" class="form-control btn-primary" id="save-resume">Save</button>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label> Start date</label>
                                    <input type="date" class="form-control" id="dateFilter" name="class_date" value="{{ @$ClassDetails->class_date }}" placeholder="Class Date">
                                    @if (@$errors->has('class_date'))
                                    <span class="help-block">
                                        <strong>{{ @$errors->first('class_date') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label> Duration</label>
                                    <input type="text" class="form-control" id="duration" name="duration" autocomplete="off" value="<?= @$ClassDetails->duration; ?>" placeholder="Duration" required>

                                </div>

                                <div class="form-group">
                                    <label> Subject</label>
                                    <select id="designation" name="subject" class="form-control">
                                        <option value="">--- Select Subject ---</option>
                                        @foreach ($subjects as $key => $value)
                                        <option value="{{ $key }}" {{ @$ClassDetails->subject == $key ? 'selected' : ''}}>{{ $value }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('subjects'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('subject') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
@include('sites-student/includes.footer')