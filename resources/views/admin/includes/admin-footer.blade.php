<!-- /.content-wrapper -->
<footer class="main-footer">
    <div class="float-right d-none d-sm-block">
        <b>Version</b> 1.0.0-pre
    </div>
    <strong>Copyright &copy; 2020-2021 <a href="{{ url('/')}}">Lottery</a>.</strong> All rights
    reserved.
</footer>

<!-- Control Sidebar -->
<!--<aside class="control-sidebar control-sidebar-dark">
     Control sidebar content goes here 
</aside>
 /.control-sidebar 
</div>-->
<!-- jQuery -->

<!-- ChartJS -->
<script src="{{ asset('public/student/plugins/chart.js/Chart.min.js') }}"></script>
<!-- Sparkline -->
<script src="{{ asset('public/student/plugins/sparklines/sparkline.js') }}"></script>
<!-- JQVMap -->
<script src="{{ asset('public/student/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
<script src="{{ asset('public/student/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('public/student/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
<!-- Summernote -->
<script src="{{ asset('public/student/plugins/summernote/summernote-bs4.min.js') }}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('public/student/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>


<script src="{{ asset('public/student/plugins/bootstrap-slider/bootstrap-slider.min.js') }}"></script>
<script src="{{ asset('public/student/plugins/ion-rangeslider/js/ion.rangeSlider.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('public/student/dist/js/adminlte.js') }}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->


<script src="{{ asset('public/student/dist/js/pages/dashboard.js') }}"></script>
<script src="{{ asset('public/student/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{ asset('public/student/plugins/select2/js/select2.full.min.js')}}"></script>
<script src="{{ asset('public/student/plugins/moment/moment.min.js')}}"></script>
<script src="{{ asset('public/student/plugins/inputmask/min/jquery.inputmask.bundle.min.js')}}"></script>
<script src="{{ asset('public/student/plugins/daterangepicker/daterangepicker.js')}}"></script>
<script src="{{ asset('public/student/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js')}}"></script>
<script src="{{ asset('public/student/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<script src="{{ asset('public/student/plugins/bootstrap-switch/js/bootstrap-switch.min.js')}}"></script>
<script src="{{ asset('public/student/dist/js/adminlte.min.js')}}"></script>
<script src="{{ asset('public/student/dist/js/demo.js')}}"></script>
<script src="{{ asset('public/student/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js')}}"></script>
<script src="{{ asset('public/student/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}"></script>

<script src="{{URL::asset('public/admn/js/pluginjs/jquery.dataTables.min.js')}}"></script>
<script src="{{URL::asset('public/admn/js/pluginjs/dataTables.bootstrap.min.js')}}"></script>
<script src="{{URL::asset('public/admn/js/pluginjs/dataTables.responsive.min.js')}}"></script>
<script src="{{URL::asset('public/admn/js/pluginjs/dataTables.buttons.min.js')}}"></script>
<script src="{{URL::asset('public/admn/js/pluginjs/buttons.colVis.min.js')}}"></script>
<script src="{{URL::asset('public/admn/js/pluginjs/buttons.html5.min.js')}}"></script>
<script src="{{URL::asset('public/admn/js/pluginjs/buttons.bootstrap.min.js')}}"></script>
<script src="{{URL::asset('public/admn/js/pluginjs/buttons.print.min.js')}}"></script>



<script>
$(function () {
// Summernote
    $('.textarea').summernote()
})
$(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
        theme: 'bootstrap4'
    })

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', {'placeholder': 'dd/mm/yyyy'})
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', {'placeholder': 'mm/dd/yyyy'})
    //Money Euro
    $('[data-mask]').inputmask()

    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({
        timePicker: true,
        timePickerIncrement: 30,
        locale: {
            format: 'MM/DD/YYYY hh:mm A'
        }
    })
    //Date range as a button
    $('#daterange-btn').daterangepicker(
            {
                ranges: {
                    'Today': [moment(), moment()],
                    'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                    'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                    'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                    'This Month': [moment().startOf('month'), moment().endOf('month')],
                    'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                },
                startDate: moment().subtract(29, 'days'),
                endDate: moment()
            },
            function (start, end) {
                $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
            }
    )

    //Timepicker
    $('#timepicker').datetimepicker({
        format: 'LT'
    })

    //Bootstrap Duallistbox
//    $('.duallistbox').bootstrapDualListbox()

    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    $('.my-colorpicker2').on('colorpickerChange', function (event) {
        $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
    });

    $("input[data-bootstrap-switch]").each(function () {
        $(this).bootstrapSwitch('state', $(this).prop('checked'));
    });

})
</script>


</body>
</html>
