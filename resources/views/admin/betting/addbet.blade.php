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
                                    <input type="date" id="bet_date" class="form-control" name="bet_date" autocomplete="off" value="<?= @$BettingDetails->bet_date; ?>" placeholder="Bet Date" required>
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
                                    <label>Winning Number</label>
                                    <input type="number" id="winning_number" class="form-control" name="winning_number" autocomplete="off" value="<?= @$BettingDetails->winning_number; ?>" placeholder="Winning Number" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label> Announce winning number</label>
                                    <input type="number" id="announce_winning_number" class="form-control" name="announce_winning_number" autocomplete="off" value="<?= @$BettingDetails->announce_winning_number; ?>" placeholder="Announce winning number" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Number Length</label>
                                    <input type="number" id="number_length" class="form-control" name="number_length" autocomplete="off" value="<?= @$BettingDetails->number_length; ?>" placeholder="Number Length" required>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Status</label>
                                    <select class="form-control" name="status" id="gender">
                                        <option <?= (@$BettingDetails->status == 'active') ? 'selected' : '' ?>>Active</option>
                                        <option <?= (@$BettingDetails->status == 'inactive') ? 'selected' : '' ?>>Inactive</option>
                                    </select>                                </div>
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
@include('admin/includes.admin-footer')

