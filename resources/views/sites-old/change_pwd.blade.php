@extends('sites.layout.dashboard')
@section('title', 'Change Password')
@section('content')
<div id="content" class="bg-container">
    <header class="head">
        <div class="main-bar">
            <div class="row no-gutters">
                <div class="col-6">
                    <h4 class="m-t-5">
                        <i class="fa fa-home"></i>
                        Change Password
                    </h4>
                </div>
            </div>
        </div>
    </header>
    @if(session()->has('error'))
    <div class="col-md-12">
        <div class="alert alert-danger">
            {{ session()->get('error') }}
        </div>
    </div>
    @endif
    @if(session()->has('success'))
    <div class="col-md-12">
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
    </div>
    @endif
    <div class="outer">
        <div class="inner bg-container">
            <!--top section widgets-->
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header bg-white">
                            Change Password
                        </div>
                        <div class="card-block m-t-35">
                            <form class="form-horizontal  login_validator"
                                  action="{{url('/change_password')}}" 
                                  method="post">
                                {{ csrf_field() }}
                                <div class="form-group row">
                                    <div class="col-lg-4  text-lg-right">
                                        <label for="required2" 
                                               class="col-form-label">
                                            Current Password *</label>
                                    </div>
                                    <div class="col-lg-4">
                                        <input type="password" 
                                               name="current-password" 
                                               class="form-control pwd" 
                                               value="{{ old('current-password')}}" 
                                               >
                                        @if ($errors->has('current-password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('current-password') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-4  text-lg-right">
                                        <label for="required2"
                                               class="col-form-label">New Password *</label>
                                    </div>
                                    <div class="col-lg-4">
                                        <input type="password"
                                               name="password" class="form-control pwd" 
                                               value="{{ old('password')}}">
                                        @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-4 text-lg-right">
                                        <label for="email2" class="col-form-label">Confirm New Password *</label>
                                    </div>
                                    <div class="col-lg-4">
                                        <input type="password"
                                               name="password_confirmation" class="form-control pwd"
                                               value="{{ old('password_confirmation')}}">
                                        @if ($errors->has('password_confirmation'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-actions form-group row">
                                    <div class="col-lg-4 push-lg-4">
                                        <input type="submit" value="Save" class="btn btn-primary">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- /.col-lg-12 -->
            </div>
        </div>
    </div>
    @endsection
    @section('pagescript')
    <script>
        $(document).on('keydown', '.pwd', function (e) {
            if (e.keyCode == 32)
                return false;
        });
    </script>
    @stop