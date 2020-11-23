@include('sites-student/includes.head')
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
                <!-- /.card-header -->
                <div class="card-header " style="background-color: #337ab7; color: white">
                    Attendance Summary Grid
                </div>
                <div class="card-body">
                    <span id="csv_err" class="errMsg"></span>
                    <div class="table-toolbar">
                        <div class="btn-group float-right users_grid_tools">
                            <form action="{{url('attendancesummary')}}" id="filterForm" class="tuti-form profile-form" method="get" accept-charset="utf-8">
                                <div class="btn-group" style="margin-bottom: 7px;">
                                    <select id="classList" name="class" class="form-control">
                                        <option value="">--- Select Class ---</option>
                                        @foreach ($classes as $key => $value)
                                        <option value="{{ $value }}" {{ $classfilter == $value ? 'selected' : ''}}>{{ $value }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="btn-group">
                                    <!--<input type="date" id="dateFilter" class="form-control" name="date" value="{{ $dateFilter }}">-->
                                </div>
                            </form>
                            <div class="tools"></div>
                        </div>
                    </div>
                    <form action="{{url('updateattendence')}}" class="tuti-form profile-form" id="update_attendance" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                        {{ csrf_field() }}
                        <table class="table  table-striped table-bordered table-hover dataTable no-footer" id="editable_tables" role="grid">
                            <thead class="table_head">
                                <tr role="row">
                                    <th class="wid-10" tabindex="0" rowspan="1" colspan="1">Class Name</th>
                                    <th class="wid-10" tabindex="0" rowspan="1" colspan="1">Total Student</th>
                                    <th class="wid-15" tabindex="0" rowspan="1" colspan="1">No of Student Present</th>
                                    <th class="wid-10" tabindex="0" rowspan="1" colspan="1">Persent Percent</th>

                                </tr>
                            </thead>
                            <tbody>
                                @if(!empty($AttendenceSummary && isset($AttendenceSummary)))
                                @foreach($AttendenceSummary  as $key=>$Summary)
                                <?php // prd($Summary);?>
                                <tr role="row">
                                    <td class="" tabindex="0" rowspan="1" colspan="1">{{$key}}</td>
                                    <td class="wid-10" tabindex="0" rowspan="1" colspan="1">{{@$Summary['total_students']}}</td>
                                    <td class="wid-15" tabindex="0" rowspan="1" colspan="1"><span class="badge badge-{{(@$Summary['total_students_present'])?'success':"danger"}}">{{ @$Summary['total_students_present'] ? @$Summary['total_students_present'] :"0"}} Present</span></td>
                                    <!--<td class="wid-10" tabindex="0" rowspan="1" colspan="1">{{round(@$Summary['present_percentage'],2)}} %</td>-->
                                    <td class="wid-10" tabindex="0" rowspan="1" colspan="1"> 
                                        <div class="progress progress-sm">
                                            <div class="progress-bar bg-green" role="progressbar" aria-volumenow="{{round(@$Summary['present_percentage'],0)}}" aria-volumemin="0" aria-volumemax="100" style="width: {{round(@$Summary['present_percentage'],0)}}%">
                                            </div>
                                        </div>
                                        <small>
                                            {{round(@$Summary['present_percentage'],2)}}% Present
                                        </small>
                                    </td>
                                </tr>
                                @endforeach
                                @else
                                <tr role="row">
                                    <td class="" tabindex="0" rowspan="1" colspan="1">N/A</td>
                                    <td class="wid-10" tabindex="0" rowspan="1" colspan="1">0</td>
                                    <td class="wid-15" tabindex="0" rowspan="1" colspan="1">0</td>
                                    <td class="wid-10" tabindex="0" rowspan="1" colspan="1">0 %</td>
                                </tr>
                            <h1>Result not Found</h1>
                            @endif
                            </tbody>
                        </table>
                    </form> 
                </div>
            </div>

        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
@include('sites-student/includes.footer')
<script>
    $("#classList, #dateFilter").change(function () {
        $("#filterForm").submit()
    });
</script>


