@include('admin/includes.admin-head')
<!-- /.navbar -->
@include('admin/includes.admin-sidebar')
<!-- Content Wrapper. Contains page content -->


 <link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css"/>  
   <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>  
   <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script> 

   <script type="text/javascript">
       $(function() {
               $("#datepicker").datepicker({ dateFormat: "yy-mm-dd" }).val()
       });
   </script>
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
                    {{@$BettingDetails->id ? 'Update ':'Add '}}Betting
                </div>
                <div class="card-body">

                    <input type="hidden" id="user_type" value="{{@$type}}" />
                    <form action="{{url('admin/addBetting')}}{{@$BettingDetails->id ? '/'.@$BettingDetails->id : ''}}" id="t_profile" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                        {{ csrf_field() }}
                        <input type="hidden" value="{{@$BettingDetails->id}}" name="subjectId" >

                        <div class="row">
                            <div class="col-md-6">

                                <div class="form-group">
                                    <label>Betting Name</label>
                                    <input type="text" id="bet_name" class="form-control" name="bet_name" autocomplete="off" value="<?= @$BettingDetails->bet_name; ?>" placeholder="Bet Name" required>
                                </div>
                            </div>
                            <div class="col-md-6">
   <div class="form-group">
                                    <label>Bet Date</label>
                                <input type="text" id="datepicker" class="form-control" name="bet_date" autocomplete="off" value="<?= @$BettingDetails->bet_date; ?>" placeholder="Bet Date" required>
                                </div>


                              
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">

                                <div class="form-group">
                                    <label>Betting Description</label>
                                    <textarea type="text" id="editor1" class="form-control" name="bet_description" autocomplete="off" placeholder="Bet Description">{{ @$BettingDetails->bet_description}}</textarea>
                                </div>
                            </div>
                        </div>

				
	
		
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label> Start Number</label>
                                    <input type="number" id="start_number" class="form-control" name="start_number" autocomplete="off" value="<?= @$BettingDetails->start_number; ?>" placeholder="Start Number" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label> End Number</label>
                                    <input type="number" id="end_number" class="form-control" name="end_number" autocomplete="off" value="<?= @$BettingDetails->end_number; ?>" placeholder="End Number" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label> Winning Amount</label>
                                    <input type="number" id="winning_amount" class="form-control" name="winning_amount" autocomplete="off" value="<?= @$BettingDetails->winning_amount; ?>" placeholder="Winning Amount" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Number Length</label>
                                    <select class="form-control" name="number_length" id="number_length">
                                        <option <?= (@$BettingDetails->number_length == '2') ? 'selected' : '' ?>>2</option>
                                        <option <?= (@$BettingDetails->number_length == '3') ? 'selected' : '' ?>>3</option>
                                        <option <?= (@$BettingDetails->number_length == '4') ? 'selected' : '' ?>>4</option>
                                        <option <?= (@$BettingDetails->number_length == '5') ? 'selected' : '' ?>>5</option>
                                    </select>
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Status</label>
                                    <select class="form-control" name="status" id="status">
                                        <option <?= (@$BettingDetails->status == 'active') ? 'selected' : '' ?>>Active</option>
                                        <option <?= (@$BettingDetails->status == 'inactive') ? 'selected' : '' ?>>Inactive</option>
                                    </select>  
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label></label>
                                    <div class="col-md-3">
                                        <button type="submit" value="{{$button}}" name="savebtn" class="form-control btn-primary" id="save-resume">Save</button>
                                    </div>
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

<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-36251023-1']);
  _gaq.push(['_setDomainName', 'jqueryscript.net']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
<script src="https://adminlte.io/themes/AdminLTE/bower_components/ckeditor/ckeditor.js"></script>
<script>
$(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('editor1')
    //bootstrap WYSIHTML5 - text editor
    $('.textarea').wysihtml5()
})
</script>
@include('admin/includes.admin-footer')

