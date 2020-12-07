@extends('frontend.mobile.layout')

@section('styles')
<style>
    *{
        box-sizing: border-box;
    }

    html, body{
        margin: 0;
        padding: 0;
        height: 100%; 
         font-family: "Open Sans", sans-serif;   
    }
    
    a{
        text-decoration: none;
        color: #888;
    }
    .bg-img{
        position: fixed;
        background: url('/front-assets/img/bg_pot.jpg');
        background-size: cover;
        bottom: 0;
        opacity: 10%;
        height: 45%;
        width: 100%;

    }

    .back-btn{
        position: relative;
        margin-top: 6%;
        font-size: 1.2rem;
    }


    .login-box{
        height: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    h2{
        margin-bottom: 20px;
        margin-top: 25px;
    }

.card{
    width: 80%;
}
.register-card-body{
    display: flex;
    flex-direction: column;
    margin: 20px 0;
}
    
/* INPUT TAGS AND DIVS */

div.wrapper{
    height: 46px;
    background: #f8f4f5;
    position: relative;
    text-align: center;
    border-bottom: 1px solid #888;
    margin-bottom: 20px;
    display: flex;
    overflow: hidden;
}

div.wrapper:hover{
    border-bottom: 2px solid #Ff2000;

}

div.wrapper label{
    position: absolute;
    top: 0;
    transition: all 1s ease;
}

div.wrapper input{
    width: 100%;
    margin: 0;
    border: none;
    outline: none;
    background: #f8f4f5;
}

div.wrapper .icon{
    font-size: 23px;
}

div.wrapper:hover label, div.wrapper:active label, div.wrapper:focus label{
    transform: translateY(-20px);
}

/* ============= END ================= */
/* ======= submit btn ========== */

.submit-btn{
    width: 60%;
    margin: 20px 0 10px 0;
    padding: 13px 0;
    background: #Ff2000;
    font-weight: 600;
    color: #fff;
    border: none;
    letter-spacing: 1px;
    border-radius: 10px;
}


/* ============== vendor /Rider ================ */

.vendor-rider{
    display: flex;
    justify-content: space-around;
    width: 100%;
    margin: 20px 0;
}

.vendor-rider a{
    text-decoration: none;
    padding: 5px 14px;
    border-radius: 12px;
    font-size: 0.8rem;
    border: 1px solid #888;
    color: #888;

}
</style>
@endsection

@section('content')

<div style="margin: 20px;">
    <span class="back-btn">
    <a href="{{url('/')}}">
        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" focusable="false" width="1em" height="1em" style="-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24"><path d="M16.62 2.99a1.25 1.25 0 0 0-1.77 0L6.54 11.3a.996.996 0 0 0 0 1.41l8.31 8.31c.49.49 1.28.49 1.77 0s.49-1.28 0-1.77L9.38 12l7.25-7.25c.48-.48.48-1.28-.01-1.76z" fill="#626262"/><rect x="0" y="0" width="24" height="24" fill="rgba(0, 0, 0, 0)" /></svg>
    </a>
</span>

</div>
<div class="login-box">
    

    <div class="card shadow px-3">
      <div class="card-body register-card-body rounded">
     
        <H2 lass="login-box-msg">Sign Up</h2>

      <form method="POST" action="{{ url('register') }}">
          @csrf
        <div class="form-group has-feedback wrapper">
          <!-- Fullname -->
            <input type="text" name="role" value="customers"  hidden>
          <input id="fullname" type="text" placeholder="Fullname" class="form-control @error('fullname') is-invalid @enderror" name="fullname" value="{{ old('fullname') }}"  autofocus>
          <span class="glyphicon glyphicon-user form-control-feedback"></span>
          @error('fullname')
              <span class="invalid-feedback" role="alert">
                 <strong>{{ $message }}</strong>
              </span>
          @enderror
        </div>
        <!-- Fullname -->

        <!-- Email -->
        <div class="form-group has-feedback wrapper">
              <input id="email" type="email" placeholder="Email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"  >
              <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
              @error('email')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
        </div>
        <!-- Email -->

        <!-- Username -->
        <div class="form-group has-feedback wrapper">
              <input type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{old('address')}}" placeholder="Precised Address">
                <i class="icon_pin"></i>
                @error('address')
                <small class="text-danger">
                    {{$message}}
                </small>
                @enderror
        </div>
        <div class="form-group has-feedback wrapper">
            <input type="text" class="form-control @error('city') is-invalid @enderror" name="city" value="{{old('city')}}" placeholder="City">
            <i class="icon_pin"></i>
            @error('city')
            <small class="text-danger">
                {{$message}}
            </small>
            @enderror
        </div>
        <div class="form-group has-feedback wrapper">
              <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{old('phone')}}" placeholder="Phone">
            <i class="icon_phone"></i>
            @error('phone')
            <small class="text-danger">
                {{$message}}
            </small>
            @enderror
        </div>
        <!-- Username -->

        <!-- Password -->
        <div class="form-group has-feedback wrapper">
              <input id="password" type="password" placeholder="Password" class="form-control @error('password') is-invalid @enderror" name="password"  >
              <span class="glyphicon glyphicon-lock form-control-feedback"></span>
              @error('password')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
        </div>
        <!-- Password -->

        <!-- Password-Confirmation -->
        <div class="form-group has-feedback wrapper">
          <input id="password-confirm" type="password" placeholder="Retype password" class="form-control" name="password_confirmation"  >
          <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
        </div>
        <!-- Password-Confirmation -->
        @if(setting('captcha'))
          <div class="form-group has-feedback">
            {!! NoCaptcha::display() !!}
            @if ($errors->has('g-recaptcha-response'))
                <span class="help-block text-danger" role="alert">
                    <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                </span>
            @endif
          </div>
        @endif
        <!-- Submit Button -->
        <div class="row">
          <div class="col-md-12">
            <div class="icheck-primary">
              <input type="checkbox" id="agreeTerms" name="terms" value="agree">
              <label for="agreeTerms">
               I agree to the <a href="#">terms</a>
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-md-12" style="justify-content: center;display: flex;">

            <button type="submit" class="btn btn-primary btn-block submit-btn">Register</button>
          </div>
          <!-- /.col -->
        </div>
        <!-- Submit Button -->
      </form>

      <a href="{{route('login')}}" style="text-align: center;" class="text-center">I already have an account</a>
    </div>

    <div class="vendor-rider">
        <a href="https://vendor.easychop.ng/register">Become a Vendor</a>
        <a href="">Become a Rider</a>
    </div>
    <!-- /.form-box -->
    </div><div class="bg-img"><div class="gradient"></div></div>
</div>
<!-- /.register-box -->


@endsection

@section('scripts')
@endsection