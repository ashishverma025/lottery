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
                    {{@$BettingDetails->id ? 'Update ':'Add '}}Winning Number 
                </div>
                <div class="card-body">

                    <input type="hidden" id="user_type" value="{{@$type}}" />
                    <form action="{{url('admin/addWinningNumber')}}{{@$BettingDetails->id ? '/'.@$BettingDetails->id : ''}}" id="t_profile" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                        {{ csrf_field() }}
                        <input type="hidden" value="{{@$BettingDetails->id}}" name="subjectId" >
                        <div class="row">

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Winning Number (Enter number between {{@$BettingDetails->start_number}} -  {{@$BettingDetails->end_number}})</label>
                                    <input type="number" id="winning_number" class="form-control" name="winning_number" autocomplete="off" value="<?= @$BettingDetails->winning_number; ?>" placeholder="Winning Number" min="{{@$BettingDetails->start_number}}" max="{{@$BettingDetails->end_number}}" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Num-1</label>
                                    <input id="range_1" type="text" name="num_1" value="">
                                </div>
                            </div>
                        </div>
                        <div class="row">

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Num-2</label>
                                    <input id="range_2" type="text" name="num_2" value="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Num-3</label>
                                    <input id="range_3" type="text" name="num_3" value="">
                                </div>
                            </div>

                        </div>
                        <div class="row">

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Num-4</label>
                                    <input id="range_4" type="text" name="num_4" value="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Num-5</label>
                                    <input id="range_5" type="text" name="num_5" value="">
                                </div>
                            </div>
                        </div>
                        <div class="row">
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



<script src="https://adminlte.io/themes/AdminLTE/bower_components/ckeditor/ckeditor.js"></script>
<script>
$(function () {
    /* BOOTSTRAP SLIDER */
    /* ION SLIDER */
    $('#range_1,#range_2,#range_3,#range_4,#range_5').ionRangeSlider({
        min: {{@$BettingDetails->start_number}},
        max: {{@$BettingDetails->end_number}},
        type: 'single',
        step: 1,
        postfix: '',
        prettify: false,
        hasGrid: true
    })
    /* ION SLIDER */

})

$(function () {
// Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('editor1')
    //bootstrap WYSIHTML5 - text editor
    $('.textarea').wysihtml5()
})
</script>
@include('admin/includes.admin-footer')

