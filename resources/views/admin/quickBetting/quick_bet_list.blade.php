@include('admin/includes.admin-head')
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
                    Betting Result Listing
                </div>
                <div class="card-body">
                    <!--EXIST STUDENTS LIST-->
                    <span id="csv_err" class="errMsg"></span>
                    <div class="alert alert-danger" id="res_err" style="display: none"> <strong>Warning!</strong></div>

                    <input type="hidden" id="user_type" value="{{@$type}}" />
                    <div>
                        <div>
                            <table class="table  table-striped table-bordered table-hover dataTable no-footer" data-page-length='10' id="institute_table" role="grid">
                                <thead>
                                    <tr role="row">
                                        <th class="wid-20" tabindex="0" rowspan="1" colspan="1">Sl</th>
                                        <th class="sorting wid-25" tabindex="0" rowspan="1" colspan="1">User Name</th>
                                        <th class="sorting wid-25" tabindex="0" rowspan="1" colspan="1">Betting Name</th>
                                        <th class="sorting wid-25" tabindex="0" rowspan="1" colspan="1">Number-1</th>
                                        <th class="sorting wid-25" tabindex="0" rowspan="1" colspan="1">Number-2</th>
                                        <th class="sorting wid-25" tabindex="0" rowspan="1" colspan="1">Number-3</th>
                                        <th class="sorting wid-25" tabindex="0" rowspan="1" colspan="1">Number-4</th>
                                        <th class="sorting wid-25" tabindex="0" rowspan="1" colspan="1">Number-5</th>
                                        <th class="sorting wid-25" tabindex="0" rowspan="1" colspan="1">Amount</th>
                                        <th class="sorting wid-25" tabindex="0" rowspan="1" colspan="1">Bet Date</th>
                                        <th class="sorting wid-10" tabindex="0" rowspan="1" colspan="1">Status</th>
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



$(document).ready(function () {
    var base_url = "{{asset('/admin')}}";
    var user_type = $('#user_type').val();
    var url = base_url + '/fetchQuickBetting'

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
