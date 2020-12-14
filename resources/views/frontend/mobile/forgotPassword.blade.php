@extends('frontend.mobile.layout')

@section('styles')
    <style>
    main{
        justify-content: center;
    }

    .main-div{
        border-radius: 12px;
        padding: 20px 40px;
        box-shadow: 0 0 15px -5px rgb(173 173 173);
    }
        /* ------------------- INPUT TAGS AND DIVS -==========*/

        .title h3{
            margin: 10px 0 50px 0;
            color: #797979;
        }

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
        .login-btn{
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            margin-bottom: 20px;
        }

        .login-btn input{
            width: 60%;
            margin: 20px 0;
            padding: 13px 0;
            background: #Ff2000;
            font-weight: 600;
            color: #fff;
            border: none;
            letter-spacing: 1px;
            border-radius: 10px;
        }

        .dont-have-an-account a{
            font-weight: 900;
            color: #de1d01;
        }
        .back-btn{
            display: flex;
            position: absolute;
            top: 3%;
            left: 5%;

        }

    </style>


@endsection

@section('content')
<span class="back-btn" onclick="window.history.back();">
    <span style="font-size: 1.4rem">
        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" focusable="false" width="1em" height="1em" style="-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24"><path fill="#626262" d="M19 11H7.14l3.63-4.36a1 1 0 1 0-1.54-1.28l-5 6a1.19 1.19 0 0 0-.09.15c0 .05 0 .08-.07.13A1 1 0 0 0 4 12a1 1 0 0 0 .07.36c0 .05 0 .08.07.13a1.19 1.19 0 0 0 .09.15l5 6A1 1 0 0 0 10 19a1 1 0 0 0 .64-.23a1 1 0 0 0 .13-1.41L7.14 13H19a1 1 0 0 0 0-2z"/><rect x="0" y="0" width="24" height="24" fill="rgba(0, 0, 0, 0)" /></svg>
    </span>
    <span style="margin: 0 0 5px 0;">
        Back
    </span>
</span>
<main>
<div class="col-lg-4 main-div">
    <form method="POST" action="{{ route('password.email') }}">
      @csrf
       @if (session('status'))
          <div class="alert alert-success">
              {{ session('status') }}
          </div>
      @endif
      <div class="sign_up">
          <div class="head">
              <div class="title">
              <h3>Forgot Password</h3>
             </div>
          </div>
          <!-- /head -->
          <div class="main">


              <div class="email-input-div wrapper">
                <label for="email">Email</label>
                <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{old('email')}}"  >
                  <span class="icon">
                      <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" focusable="false" width="1em" height="1em" style="-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);" preserveAspectRatio="xMidYMid meet" viewBox="0 0 20 20"><path d="M1.574 5.286l7.5 4.029c.252.135.578.199.906.199c.328 0 .654-.064.906-.199l7.5-4.029c.489-.263.951-1.286.054-1.286H1.521c-.897 0-.435 1.023.053 1.286zm17.039 2.203l-7.727 4.027c-.34.178-.578.199-.906.199s-.566-.021-.906-.199s-7.133-3.739-7.688-4.028C.996 7.284 1 7.523 1 7.707V15c0 .42.566 1 1 1h16c.434 0 1-.58 1-1V7.708c0-.184.004-.423-.387-.219z" fill="#626262"/><rect x="0" y="0" width="20" height="20" fill="rgba(0, 0, 0, 0)" /></svg>
                  </span>
                  @error('email')

                      <small class="text-danger">
                          {{$message}}
                      </small>

                @enderror
              </div>


              <div class="login-btn text-center">
                <input type="submit" value="Login" class="btn_1 full-width mb_5">
                <div class="dont-have-an-account">
                    Already have an account? <a href="{{url('/login')}}">Sign In</a>
                </div>
                <span class="dont-have-an-account">
                     Don’t have an account? <a href="{{url('/register')}}">Sign up</a>
                </span>



                  {{-- <div id="forgot_pw">
                      <div class="form-group">
                          <label>Please confirm login email below</label>
                          <input type="email" class="form-control" name="email_forgot" id="email_forgot">
                          <i class="icon_mail_alt"></i>
                      </div>
                      <p>You will receive an email containing a link allowing you to reset your password to a new preferred one.</p>
                      <div class="text-center"><input type="submit" value="Reset Password" class="btn_1"></div>
                  </div> --}}
          </div>
      </div>
      </form>
      <!-- /box_booking -->
  </div>

</main>
@endsection
