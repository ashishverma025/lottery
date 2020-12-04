@include('admin/includes.admin-head')

<!-- /.navbar -->
@include('admin/includes.admin-sidebar')
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
                    Betting Listing
                </div>
                <div class="card-body">
                    <!--EXIST STUDENTS LIST-->
                    <span id="csv_err" class="errMsg"></span>
                    <div class="alert alert-danger" id="res_err" style="display: none"> <strong>Warning!</strong></div>

                    <div class="table-toolbar">
                        <div class="row">
                            <div class="col-md-2">
                                <div class="btn-group">
                                    <a href="{{url('admin/addBetting')}}" id="update_attendance_table" class=" btn btn-primary"> Add New</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <input type="hidden" id="user_type" value="{{@$type}}" />
                    <div>
                        <div>
                            <table class="table  table-striped table-bordered table-hover dataTable no-footer" data-page-length='10' id="institute_table" role="grid">
                                <thead>
                                    <tr role="row">
                                        <th class="wid-20" tabindex="0" rowspan="1" colspan="1">Sl</th>
                                        <th class="sorting wid-25" tabindex="0" rowspan="1" colspan="1">Betting Name</th>
                                        <th class="sorting wid-25" tabindex="0" rowspan="1" colspan="1">Betting Date</th>
                                        <th class="sorting wid-25" tabindex="0" rowspan="1" colspan="1">Start Date</th>
                                        <th class="sorting wid-25" tabindex="0" rowspan="1" colspan="1">End Date</th>
                                        <th class="sorting wid-25" tabindex="0" rowspan="1" colspan="1">Winning Amount</th>
                                        <th class="sorting wid-25" tabindex="0" rowspan="1" colspan="1">Winning Number</th>
                                        <th class="sorting wid-25" tabindex="0" rowspan="1" colspan="1">Announce Winning Number</th>
                                        <th class="sorting wid-10" tabindex="0" rowspan="1" colspan="1">Status</th>
                                        <th class="sorting wid-10" tabindex="0" rowspan="1" colspan="1">Action</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
@include('admin/includes.admin-footer')


<script>
//Bootstrap Duallistbox
$('.duallistbox').bootstrapDualListbox()


$("#classList, #dateFilter").change(function () {
    $("#filterForm").submit()
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
                console.log(response)
                // Show the modal
                if (response.status == "failed") {
                    $("#res_err").show();
                    $("#res_err").html(response.msg);
                    //                    window.location.reload();
                    return false
                }
                if (response.students == "") {
                    $("#res_err").show();
                    $("#res_err").html(response.msg);
                    //                    window.location.reload();
                    return false
                }
                if (response.status == "exist") {
                    //                    $("#csv_err").html(response.msg);
                    $("#res_err").show();
                    $("#res_err").html(response.msg);

                    return false
                }
            },
        });
    }
});

$(document).ready(function () {
    var base_url = "{{asset('/admin')}}";
    var user_type = $('#user_type').val();
    var url = base_url + '/fetchBetting'

    console.log(url);
//alert(base_url + '/admin/fetchUsers');

    var table = $('#institute_table');

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
            {'bSortable': true},
            //{'bSortable': false, "width": "10%"}
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
