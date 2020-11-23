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
    <?php // pr($_POST); ?>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- SELECT2 EXAMPLE -->
            <div class="card card-default">
                <!-- /.card-header -->
                <div class="card-header " style="background-color: #337ab7; color: white">
                    Classes Grid
                </div>
                <div class="card-body">
                    <span id="csv_err" class="errMsg"></span>

                    <div class="table-toolbar">
                        <div class="btn-group">
                            <a href="{{url('addclass')}}" id="update_attendance_table" class=" btn btn-primary"> Add Class</a>
                        </div>

                        <div class="btn-group float-right users_grid_tools">
                            <div class="tools"></div>
                        </div>
                        <div class="btn-group users_grid_tools" >
                            <a href="{{asset('assignclass')}}" class=" btn btn-default" style="border:1px solid">Add multiple student to class</i></a>
                            <div class="tools"></div>
                        </div>
                    </div>
                    <form action="{{url('updateattendence')}}" class="tuti-form profile-form" id="update_attendance" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                        {{ csrf_field() }}
                        <div>
                            <div>
                                <table class="table  table-striped table-bordered table-hover dataTable no-footer" id="editable_table" role="grid">
                                    <thead>
                                        <tr role="row">
                                            <th class="sorting_asc wid-20" tabindex="0" rowspan="1" colspan="1">Sl</th>
                                            <th class="sorting wid-25" tabindex="0" rowspan="1" colspan="1">Class Name</th>
                                            <th class="sorting_asc wid-20" tabindex="0" rowspan="1" colspan="1">Class Time</th>
                                            <th class="sorting_asc wid-20" tabindex="0" rowspan="1" colspan="1">Days</th>
                                            <th class="sorting_asc wid-20" tabindex="0" rowspan="1" colspan="1">Start Date</th>
                                            <th class="sorting_asc wid-20" tabindex="0" rowspan="1" colspan="1">Durations</th>
                                            <th class="sorting_asc wid-20" tabindex="0" rowspan="1" colspan="1">Subject</th>
                                            <th class="sorting_asc wid-20" tabindex="0" rowspan="1" colspan="1">Status</th>
                                            <th class="sorting wid-10" tabindex="0" rowspan="1" colspan="1">Created At</th>
                                            <th class="sorting wid-10" tabindex="0" rowspan="1" colspan="1">Action</th>
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

$(document).ready(function () {
    var base_url = "{{asset('/')}}";
    //alert(base_url + '/admin/fetchClasss');
    var table = $('#editable_table');
    table.DataTable({
        dom: "<'text-right'B><f>lr<'table-responsive't><'row'<'col-md-5 col-12'i><'col-md-7 col-12'p>>",
        buttons: [
            'copy', 'csv','print'
        ],
        "sServerMethod": "get",
        "bProcessing": true,
        "bServerSide": true,
        "sAjaxSource": base_url + 'fetchclasses',
        "columnDefs": [
//              {"className": "dt-center", "targets": [0, 3, 1]}
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
            {'bSortable': true},
            {'bSortable': false, "width": "10%"}
        ]
    });
    var tableWrapper = $("#editable_table_wrapper");
    tableWrapper.find(".dataTables_length select").select2({
        showSearchInput: false //hide search box with special css class
    }); // initialize select2 dropdown
    $("#editable_table_wrapper .dt-buttons .btn").addClass('btn-secondary').removeClass('btn-default');
    $(".dataTables_wrapper").removeClass("form-inline");
});
</script>
