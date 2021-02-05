@include('admin/includes.admin-head')
<!-- /.navbar -->
@include('admin/includes.admin-sidebar')
<!-- Content Wrapper. Contains page content -->


<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css"/>  
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>  
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script> 

<script type="text/javascript">
    $(function () {
        $("#datepicker").datepicker({dateFormat: "yy-mm-dd"}).val()
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

    @if ($errors->any())
    <div>
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- SELECT2 EXAMPLE -->
            <div class="card card-default">
                <!-- /.card-header -->
                <div class="card-header " style="background-color: #337ab7; color: white">
                    {{@$MenuDetails->id ? 'Update ':'Add '}}Menu Betting
                </div>
                <div class="card-body">

                    <input type="hidden" id="user_type" value="{{@$type}}" />
                    <form action="{{url('admin/addMenu')}}{{@$MenuDetails->id ? '/'.@$MenuDetails->id : ''}}" id="t_profile" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                        {{ csrf_field() }}
                        <input type="hidden" value="{{@$MenuDetails->id}}" name="menutId" >
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Parent</label>
                                    <select class="form-control" name="parentid" id="status">
                                        <option  value="0">No Parent</option>
                                        @foreach($parentsList as $parent)
                                        <option  value="{{$parent->id}}" {{$parent->id==@$MenuDetails->parentid?'selected':''}}>{{$parent->menu_name}}</option>
                                        @endforeach
                                    </select>  
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Betting Menu layout</label>
                                    <select class="form-control" name="menu_layout" id="status">
                                        <option  value="0" {{@$MenuDetails->menu_layout==0?'selected':''}}  >Header</option>
                                        <option  value="1" {{@$MenuDetails->menu_layout==1?'selected':''}}>Footer</option>
                                    </select>  
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Position</label>
                                    <select class="form-control" name="position" id="status">
                                        @foreach($positionList as $position)
                                        <option  value="{{$position}}" {{$position==@$MenuDetails->position?'selected':''}}>{{$position}}</option>
                                        @endforeach
                                    </select>  
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Title</label>
                                    <input type="text" id="title" class="form-control" value="{{@$MenuDetails->title}}" name="title" autocomplete="off"  placeholder="Title" >
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Menu Name</label>
                                    <input type="text" id="menu_name" class="form-control" value="{{@$MenuDetails->menu_name}}" name="menu_name" autocomplete="off"  placeholder="Menu Name" >
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">

                                <div class="form-group">
                                    <label>Betting Menu Description</label>
                                    <textarea type="text" id="editor1" class="form-control" value="{{@$MenuDetails->menu_description}}" name="menu_description" autocomplete="off" placeholder="Bet Description" required>{{ @$MenuDetails->menu_description}}</textarea>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Menu Link</label>
                                    <input type="text" class="form-control" value="{{@$MenuDetails->link}}" name="link" autocomplete="off"  placeholder="Menu Link" >
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

    (function () {
        var ga = document.createElement('script');
        ga.type = 'text/javascript';
        ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0];
        s.parentNode.insertBefore(ga, s);
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

