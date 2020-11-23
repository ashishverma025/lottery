@include('sites-student/includes.head')
<link href="{{URL::asset('public/admn/css/select2.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('public/admn/css/plugincss/dataTables.bootstrap.css')}}" rel="stylesheet">
<link href="{{URL::asset('public/admn/css/pages/tables.css')}}" rel="stylesheet">
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
    <?php
// pr($_POST); 
    ?>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- SELECT2 EXAMPLE -->
            <div class="card card-default">
                <!-- /.card-header -->
                <div class="card-header " style="background-color: #337ab7; color: white">
                    Attendance Grid
                </div>
                <div class="card-body">
                    <span id="csv_err" class="errMsg"></span>
                    <div class="table-toolbar">

                        <form action="{{url('attendence')}}" id="filterForm" class="tuti-form profile-form" method="get" accept-charset="utf-8">
                            <div class="btn-group">
                                <input type="button" value="Update Attendance" id="update_attendance_table" class=" btn btn-primary">
                            </div>
                            <div class="btn-group">
                                <select id="classList" name="class" class="form-control">
                                    <option value="">--- Select Class ---</option>
                                    @foreach ($classes as $key => $value)
                                    <option value="{{ $key }}" {{ $classfilter == $key ? 'selected' : ''}}>{{ $value }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="btn-group">
                                <input type="date" id="dateFilter" class="form-control" name="date" value="{{ $dateFilter }}">
                            </div>
                        </form>
                        <div class="btn-group float-right users_grid_tools">
                            <div class="tools"></div>
                        </div>
                    </div>

                    <form action="{{url('saveattendence')}}" class="tuti-form profile-form" id="update_attendance" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                        {{ csrf_field() }}
                        <input type="hidden" name="class" value="{{@$classfilter}}">
                        <input type="hidden" name="date" value="{{@$dateFilter}}">
                        <div>
                            <div>
                                <table class="table  table-striped table-bordered table-hover dataTable no-footer" id="editable_table" role="grid">
                                    <thead>
                                        <tr role="row">
                                            <th class="wid-20" tabindex="0" rowspan="1" colspan="1">Sl</th>
                                            <th class="wid-15" tabindex="0" rowspan="1" colspan="1">Image</th>
                                            <th class="wid-10" tabindex="0" rowspan="1" colspan="1">Name</th>
                                            <th class="wid-15" tabindex="0" rowspan="1" colspan="1">Class Date</th>
                                            <th class="wid-10" tabindex="0" rowspan="1" colspan="1">Class</th>
                                            <th class="wid-10" tabindex="0" rowspan="1" colspan="1">Present</th>
                                            <th class="wid-10" tabindex="0" rowspan="1" colspan="1">Absent</th>
                                            <th class="wid-10" tabindex="0" rowspan="1" colspan="1">Not Engaged</th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
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
<script src="{{URL::asset('public/admn/js/pluginjs/jquery.dataTables.min.js')}}"></script>
<script src="{{URL::asset('public/admn/js/pluginjs/dataTables.bootstrap.min.js')}}"></script>
<script src="{{URL::asset('public/admn/js/pluginjs/dataTables.responsive.min.js')}}"></script>
<script src="{{URL::asset('public/admn/js/pluginjs/dataTables.buttons.min.js')}}"></script>
<script src="{{URL::asset('public/admn/js/pluginjs/buttons.colVis.min.js')}}"></script>
<script src="{{URL::asset('public/admn/js/pluginjs/buttons.html5.min.js')}}"></script>
<script src="{{URL::asset('public/admn/js/pluginjs/buttons.bootstrap.min.js')}}"></script>
<script src="{{URL::asset('public/admn/js/pluginjs/buttons.print.min.js')}}"></script>


<script>
$("#classList,#dateFilter").change(function () {
    $("#filterForm").submit()
});

$(document).on('click', '#update_attendance_table', function () {
    $("#update_attendance").submit();
});

$(document).ready(function () {
    $(function () {
        $("#datepicker").datepicker();
    });
})


$(document).on('click', '#update_attendance_table', function () {
    $("#update_attendance").submit();
});

$(document).ready(function () {
    var base_url = "{{asset('/')}}";
    var queryString = "{{ QueryString() }}";
    var url = base_url + 'fetchattendancestudent';
//    console.log(queryString)
    if (queryString != "") {
        url = base_url + 'fetchattendancestudent?' + queryString;
    }
    //	alert('jdsjsjd');
    //alert(base_url + '/admin/fetchUsers');

    var table = $('#editable_table');
    table.DataTable({
        dom: "<'text-right'B><f>lr<'table-responsive't><'row'<'col-md-5 col-12'i><'col-md-7 col-12'p>>",
        buttons: [
            'copy', 'csv', 'print'
        ],
        "sServerMethod": "get",
        "bProcessing": true,
        "bServerSide": true,
        "sAjaxSource": url,
        "columnDefs": [
            {"className": "dt-center", "targets": [0, 3, 5]}
        ],
        "aoColumns": [
            {'bSortable': true},
            {'bSortable': true},
            {'bSortable': true},
            {'bSortable': true},
            {'bSortable': true},
            {'bSortable': true},
            {'bSortable': true},
            {'bSortable': true},
        ]
    });
    $('#editable_table').DataTable().ajax.reload();

    var tableWrapper = $("#editable_table_wrapper");
    tableWrapper.find(".dataTables_length select").select2({
        showSearchInput: false //hide search box with special css class
    }); // initialize select2 dropdown
    $("#editable_table_wrapper .dt-buttons .btn").addClass('btn-secondary').removeClass('btn-default');
    $(".dataTables_wrapper").removeClass("form-inline");
});
</script>
