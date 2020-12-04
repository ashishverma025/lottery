<footer class="main-footer">
    <strong>Copyright &copy; 2020-2021 <a href="http://adminlte.io">Lottery</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> 1.0.0-pre
    </div>
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{ asset('public/admin/plugins/jquery/jquery.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('public/admin/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
$.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{ asset('public/admin/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- ChartJS -->
<script src="{{ asset('public/admin/plugins/chart.js/Chart.min.js') }}"></script>
<!-- Sparkline -->
<script src="{{ asset('public/admin/plugins/sparklines/sparkline.js') }}"></script>
<!-- JQVMap -->
<script src="{{ asset('public/admin/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
<script src="{{ asset('public/admin/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('public/admin/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
<!-- daterangepicker -->
<script src="{{ asset('public/admin/plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset('public/admin/plugins/daterangepicker/daterangepicker.js') }}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('public/admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<!-- Summernote -->
<script src="{{ asset('public/admin/plugins/summernote/summernote-bs4.min.js') }}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('public/admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('public/admin/dist/js/adminlte.js') }}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('public/admin/dist/js/pages/dashboard.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('public/admin/dist/js/demo.js') }}"></script>
<script src="http://localhost:8089/js/bootstrap.min.js"></script>
<!-- jQuery -->
<!-- Bootstrap 4 -->
<!-- DataTables -->
<!--<script src="{{ asset('public/admin/plugins/datatables/jquery.dataTables.js') }}"></script>-->
<!--<script src="{{ asset('public/admin/plugins/datatables-bs4/js/dataTables.bootstrap4.js') }}"></script>-->
<!-- AdminLTE App -->
<script src="{{ asset('public/admin/dist/js/adminlte.min.js') }}"></script>
<script src="{{ asset('public/admin/js/jquery.dataTables.js') }}"></script>
<script src="{{ asset('public/admin/js/jquery.validate.min.js') }}"></script>
<script src="{{ asset('public/admin/customJs/common.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<!-- page script -->
<script>
$(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
    });
});
</script>


<!-- Server response modal -->
<div id="notification_modal" class="modal fade">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body"></div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- //Server response modal -->
<div class="container">
    <!-- Modal -->
    <div class="modal fade" id="adminProfile" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Profile</h4>
                </div>
                <form name="frm_edit_profile" id="frm_edit_profile" method="post" autocomplete="off" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="text">Profile Image:</label>
                            </div>
                            <div class="col-md-6">
                                <img src="{{ url('public/admin/images/profile/') }}/{{$user->profile_image  ?? 'avatar.png' }}" id="profileImg" height="75" width="80" src="#" alt="your image"/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="text">User Name:</label>
                                <input type="text" class="form-control" id="profile_name" name="profile_name" value="{{ $user->name ?? "" }}">
                                <input type="hidden" id="profile_id" name="product_id" value="{{ $user->id ?? "" }}">
                            </div>
                            <div class="col-md-6">
                                <label for="text">Email:</label>
                                <input type="text" class="form-control" id="email" name="email" value="{{ $user->email ?? "" }}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="text">Contact:</label>
                                <input type="text" class="form-control" id="contact" name="contact" value="{{ $user->contact ?? "" }}">
                            </div>
                            <div class="col-md-6">
                                <label for="text">Address:</label>
                                <input type="text" class="form-control" id="address" name="address" value="{{ $user->address ?? "" }}">
                            </div>
                        </div>
                        <div class="row">                          

                            <div class="col-md-6"                              >
                                <label for="text">Status:</label                              >
                                <select class="form-control" id="profile_status" name="status">
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                            </div>
                        </div>
                        <!--                        <div class="form-group">
                                                    <label for="text">Description:</label>
                                                    <textarea type="text" class="form-control" id="description" name="description"></textarea>
                                                </div>-->
                        <!--<button type="submit" class="btn btn-primary" id="btn_save_product">Submit</button>-->
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-primary" id="btn_save_profile" value="Submit" dvxx>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<script>
<!--//PROFILE UPDATE START-->
$('#btn_save_profile').click(function(e){
$this = $(this);
var form_data = new FormData();
var profile_image = $('#profile_image').prop('files')[0];

// for image file
form_data.append('profile_image', profile_image);

// for rest data
form_data.append('name', $('#profile_name').val());
form_data.append('email', $('#email').val());
form_data.append('contact', $('#contact').val());
form_data.append('address', $('#address').val());
form_data.append('profile_id', $('#profile_id').val());
form_data.append('status', $('#profile_status').val());
$.ajax({
url: '/admin/updateprofile',
        method: 'post',
        data: form_data,
        cache: false,
        contentType: false,
        processData: false,
        beforeSend: function () {
        // Show the loading button
        $this.button('loading');
},
headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
},
complete: function ()
{
                // Change the button to previous
                $this.button('reset');
},
success: function (response) {
                if (response.resCode == 0)
        {
        // Close the modal
        $('#adminProfile').modal('hide');
                window.location.reload()
                // Show the alert
                showNotification('Success', response.resMsg);
} else
{
                showNotification('Alert', response.resMsg);
}
}
        });
    });
</script>


</body>
</html>


