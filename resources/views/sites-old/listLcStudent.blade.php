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
                    Student Listing
                </div>
                <div class="card-body">
                    <!--EXIST STUDENTS LIST-->
                    <span id="csv_err" class="errMsg"></span>
                    <div class="alert alert-danger" id="res_err" style="display: none"> <strong>Warning!</strong></div>

                    <!--<div class="table-toolbar">-->
                    <div class="row upload-students-btn-grp">
                        <div class="col-md-12">

                            <a href="{{url('lcstudent')}}" id="update_attendance_table" class=" btn btn-primary pull-left mr-4"><i class="fa fa-plus" aria-hidden="true"></i>  Add Student</a>



                            <form enctype="multipart/form-data" method="post" style="display: inline-block; float:left;">
                                {{ csrf_field() }}

                                <div class="btn-group">
                                    <input type="file" name="csv_student" id="csv_student" class="inputfile inputfile-6" data-multiple-caption="{count} files selected" multiple />
                                    <label for="csv_student" > <strong id="fileName">Select CSV</strong></label>

                                    <button type="button" id="upload_students" class=" btn btn-primary upld-csv">
                                        <img src="{{url('public/ajax-loader.gif')}}" id="ajax-loaderimg" height="20" width="20" style="display: none">
                                        <i class="fa fa-upload" aria-hidden="true"></i>
                                    </button>
                                    <!--                                        <div class="btn-group users_grid_tools">
                                                                                <a href="{{asset('public/students.csv')}}" download class=" btn btn-default" ><i class="fa fa-download" title="CSV Format"></i></a>
                                                                                <div class="tools"></div>
                                                                            </div>-->
                                    <div class="clearfix"></div>
                                </div>

                            <!--<input type="file" name="csv_student" id="csv_student" class=" btn btn-default">-->
                                <div class="clearfix"></div>
                            </form>

                            <a href="{{url('lcstudent')}}?addManual=true" class=" btn btn-primary ml-4 pull-left">Add Students from Global List </a>   
                            <div class="clearfix"></div>
                        </div>
                    </div>


                    <div class="col-6" >
                        <form action="{{url('addLcGlobalStudent')}}" id="existEmail" enctype="multipart/form-data" method="post" accept-charset="utf-8" style="display:none">
                            {{ csrf_field() }}
                            <div class="card-bodyYY">
                                <div class="form-group">
                                    <!--<label class="errMsg" id="res_err">These Students are already exist in global list</label>-->
                                    <select class="duallistbox" id="existStudents" name="students[]" multiple="multiple">
                                    </select>
                                </div>
                                <!-- /.form-group --> 
                                <button type="submit" class="btn btn-primary">Save</button> 
                            </div>
                        </form>
                    </div>

                    <!--</div>-->

                    <form action="{{url('updateattendence')}}" class="tuti-form profile-form" id="update_attendance" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                        {{ csrf_field() }}
                        <div>
                            <div>
                                <table class="table  table-striped table-bordered table-hover dataTable no-footer" data-page-length='5' id="editable_table" role="grid">
                                    <thead>
                                        <tr role="row">
                                            <th class="wid-20" tabindex="0" rowspan="1" colspan="1">Sl</th>
                                            <th class="sorting wid-25" tabindex="0" rowspan="1" colspan="1">Image</th>
                                            <th class="sorting_asc wid-20" tabindex="0" rowspan="1" colspan="1">Name</th>
                                            <!--<th class="sorting_asc wid-20" tabindex="0" rowspan="1" colspan="1">Last Name</th>-->
                                            <th class="sorting wid-10" tabindex="0" rowspan="1" colspan="1">Email</th>
                                            <th class="sorting wid-10" tabindex="0" rowspan="1" colspan="1">Contact</th>
                                            <th class="sorting wid-10 bold" tabindex="0" rowspan="1" colspan="1">Classes</th>
                                            <!--<th class="sorting wid-10" tabindex="0" rowspan="1" colspan="1">Class Date</th>-->
                                            <th class="sorting wid-10" tabindex="0" rowspan="1" colspan="1">Address</th>
                                            <th class="sorting wid-10" tabindex="0" rowspan="1" colspan="1">Status</th>
                                            <th class="wid-10" tabindex="0" rowspan="1" colspan="1">Joining Status </th>
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
//Bootstrap Duallistbox
$('.duallistbox').bootstrapDualListbox()


$("#classList, #dateFilter").change(function () {
    $("#filterForm").submit()
});

$("#csv_student").change(function () {
    $("#existStudents").html("");
    $("#res_err").hide();
    $("#existEmail").hide();
});

$(document).on('click', '#update_attendance_table', function () {
    $("#update_attendance").submit();
});

$(document).on('click', '#upload_students', function () {
    var form_data = new FormData();
    var student_data = $('#csv_student').prop('files')[0];
    form_data.append('csv_student', student_data);
    $("#existStudents").html("");
    if (form_data != 'undefined') {
        $.ajax({
            url: $('meta[name="route"]').attr('content') + '/uploadstudents',
            method: 'post',
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            data: form_data,
            cache: false,
            contentType: false,
            processData: false,
            beforeSend: function () {
                $("#ajax-loaderimg").show()
                $("#upload_students").attr('disabled', true);
            },
            success: function (response) {
                // Show the modal
                if (response.status == "error") {
                    $("#res_err").show();
                    $("#res_err").html(response.msg);
//                    window.location.reload();
                    return false
                }
                if (response.status == "failed") {
                    $("#res_err").show();
                    $("#res_err").html(response.msg);
//                    window.location.reload();
                    return false
                }
                if (response.newStudents == "") {
                    $("#res_err").show();
                    $("#res_err").html(response.msg);
//                    window.location.reload();
                    return false
                }
                if (response.status == "exist") {
//                    $("#csv_err").html(response.msg);
                    $("#res_err").show();
                    $("#res_err").html(response.msg);
                    $("#upload_students").attr('disabled', true);
                    $("#existStudents").append(response.newStudents);
                    $(".removeall").trigger('click');
                    $("#existEmail").show();
                    return false
                } else {
                    $("#res_err").show();
                    $("#res_err").html(response.msg);
                    $("#upload_students").attr('disabled', true);
                    $("#existStudents").append(response.newStudents);
                    $(".removeall").trigger('click');
                    $("#existEmail").show();
                    return false
                }
            },

            complete: function () {
                $("#ajax-loaderimg").hide()
                $('#editable_table').DataTable().ajax.reload();
                setTimeout(function () {
                    $("#upload_students").attr('disabled', false);
                    $("#csv_student").val('');
                    $("#fileName").text('Select CSV');
                }, 5000);
            },

        });
    }
});

$(document).ready(function () {
    var base_url = "{{asset('/')}}";

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
        "sAjaxSource": base_url + 'fetchstudents',
        "columnDefs": [
            {"className": "dt-center", "targets": [0, 3, 2]}
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
//                    {'bSortable': false, "width": "10%"}
        ]
    });
    var tableWrapper = $("#editable_table_wrapper");
    tableWrapper.find(".dataTables_length select").select2({
        showSearchInput: false //hide search box with special css class
    }); // initialize select2 dropdown
    $("#editable_table_wrapper .dt-buttons .btn").addClass('btn-secondary').removeClass('btn-default');
    $(".dataTables_wrapper").removeClass("form-inline");
});



/*
 By Osvaldas Valutis, www.osvaldas.info
 Available for use under the MIT License
 */

'use strict';

;
(function (document, window, index)
{
    var inputs = document.querySelectorAll('.inputfile');
    Array.prototype.forEach.call(inputs, function (input)
    {
        var label = input.nextElementSibling,
                labelVal = label.innerHTML;

        input.addEventListener('change', function (e)
        {
            var fileName = '';
            if (this.files && this.files.length > 1)
                fileName = (this.getAttribute('data-multiple-caption') || '').replace('{count}', this.files.length);
            else
                fileName = e.target.value.split('\\').pop();

            if (fileName)
                label.querySelector('strong').innerHTML = fileName;
            else
                label.innerHTML = labelVal;
        });

        // Firefox bug fix
        input.addEventListener('focus', function () {
            input.classList.add('has-focus');
        });
        input.addEventListener('blur', function () {
            input.classList.remove('has-focus');
        });
    });
}(document, window, 0));
</script>
