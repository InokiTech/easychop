<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>{{_('Login')}} - @setting('app_name')</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  @if(setting('recaptcha'))
      {!! htmlScriptTagJsApi([
              'action' => 'login',])
      !!}
  @endif
  {!! NoCaptcha::renderJs() !!}

  <!-- FAVICON -->
  <link rel="apple-touch-icon" sizes="180x180" href="favicon/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="favicon/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="favicon/favicon-16x16.png">
  <link rel="manifest" href="favicon/site.webmanifest">
  <link rel="mask-icon" href="favicon/safari-pinned-tab.svg" color="#5bbad5">
  <meta name="msapplication-TileColor" content="#da532c">
  <meta name="theme-color" content="#ffffff">
  <!-- FAVICON -->

  <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
  <link rel="stylesheet" href="{{asset('plugins/fontawesome/css/font-awesome.min.css')}}">
  <link rel="stylesheet" href="{{asset('plugins/select2/css/select2.min.css')}}">
  <link rel="stylesheet" href="{{asset('plugins/icheck/skin/all.css')}}">
  <link rel="stylesheet" href="{{ asset('plugins/datatable/css/datatables.min.css') }}">
  <link rel="stylesheet" href="{{ asset('plugins/summernote/dist/summernote-bs4.min.css') }}">
  <link rel="stylesheet" href="{{asset('plugins/datepicker/css/bootstrap-datepicker.standalone.css')}}">
  <script src="{{asset('plugins/sweetalert/js/sweetalert.min.js')}}"></script>
  <style>
    .has-feedback{
        color: red;
    }

    body{
      background: aliceblue!important;
    }

    .twitter-blue{
      color: #00acee;
    }
  </style>

  <!-- Google Font -->
  <link rel="stylesheet" href="{{('plugins/googlefont/css.css')}}">
</head>

<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <div class=" d-block text-center mt-5">
      <a href="{{url('/')}}">
        <img src="{{setting('app_dark_logo')? setting('app_dark_logo'):asset('uploads/appLogo/logo-dark.png')}}" class="img img-responsive" height="60px" width="220px" alt="App Logo">
      </a>
    </div>
  </div>
  <!-- /.login-logo -->
  <div class="card mb-0 shadow px-3">
    <div class="card-body">
      <p class="login-box-msg">EasyChop Vendor and Administrator Login</p>
      @include('sweet::alert')
      @include('layouts.includes.alerts')
    <form method="POST" action="{{ route('login') }}">
        @csrf
      <div class="form-group has-feedback">
        <input id="login" type="text" placeholder="{{ __('Email') }}" class="form-control @error('email') is-invalid' @enderror" name="email" value="{{old('email') }}" autofocus>
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        @error('email')
            <small class="text-danger">
                <strong>{{ $message }}</strong>
            </small>
        @enderror
      </div>
      <div class="form-group has-feedback">
        <input id="password" type="password" placeholder="{{ __('Password') }}" class="form-control @error('password') is-invalid @enderror" name="password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        @error('password')
            <div class="invalid-feedback" role="alert">
                <strong>{{ $message}}</strong>
            </div>
        @enderror
      </div>
      @if(setting('captcha'))
        <div class="form-group has-feedback">
          {!! NoCaptcha::display() !!}
          @if ($errors->has('g-recaptcha-response'))
              <span class="help-block" role="alert">
                  <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
              </span>
          @endif
        </div>
      @endif
      <div class="row">
        <div class="col-12">
          <div class="checkbox">
            <input type="checkbox" id="remember">
            <label for="remember">
              Remember Me
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-12 mt-2">
          <button type="submit" class="btn btn-primary btn-block  col-12">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
    </form>
    <p class="mb-1 mt-2">
      <a href="/password/reset">I forgot my password</a>
    </p>
    <p class="mb-0">
      <a href="{{route('register')}}" class="text-center">Create new EasyChop vendor account</a>
    </p>
  </div>

  <!-- /.login-box-body -->
</div>

<!-- /.login-box -->

<!-- Script -->
<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/js/theme.min.js') }}"></script>
<script src="{{asset('plugins/datatable/js/datatables.min.js')}}"></script>
<script src="{{asset('plugins/summernote/dist/summernote-bs4.min.js')}}"></script>
<script src="{{asset('plugins/croppie/js/croppie.min.js')}}"></script>
<script src="{{asset('plugins/datepicker/js/bootstrap-datepicker.min.js')}}"></script>
<script src="{{asset('assets/js/custom.js')}}"></script>


</body>
</html>
