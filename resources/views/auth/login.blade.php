@extends('layouts.appHome')

@section('content')
        <title>Tutify|Login</title>

<!-- about section -->
<section class="login-wrapper">

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ $title }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route($loginRoute) }}">
                            @csrf

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                                    @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                    @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                               <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-success">
                                        {{ __('Login') }}
                                    </button>
                                    @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route($forgotPasswordRoute) }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                    @endif 
                                </div>

                            </div>
                            <br >
                            <div class="form-group row mb-0">
                                <div class="col-md-4  offset-md-4" >
                                    <a href="{{ url('/facebook-login') }}" class="btn btn-primary"> {{ __('Login with Facebook') }} </a>
                                </div>

                                <div class="col-md-4" >
                                    <a href="{{ url('/google-login') }}" class="btn btn-danger"> {{ __('Login with Google+') }} </a>
                                </div>
                            </div>

                        </form>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-8 offset-md-4">

                                    <!--  <div class="login-ft-social">
                                         <ul>
                                             <li><a href="#" class="facebook-col"><i class="fa fa-facebook" aria-hidden="true"></i> Log In With Facebook</a></li>
                                             <li><a href="#" class="google-plus-col"><i class="fa fa-google-plus" aria-hidden="true"></i> Log In With Google+</a></li>
                                         </ul>
                                     </div> 
                                    -->
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

</section>
@endsection
