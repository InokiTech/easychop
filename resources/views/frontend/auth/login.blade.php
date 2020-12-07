@extends('frontend.layouts')
@section('title','Login')
@section('content')
<main>
		<div class="hero_single inner_pages background-image" data-background="url(/front-assets/img/home_section_1.jpg)">
			<div class="opacity-mask" data-opacity-mask="rgba(0, 0, 0, 0.6)">
				<div class="container">
					<div class="row justify-content-center">
						<div class="col-xl-9 col-lg-10 col-md-8">
							<h1>EasyChop Account Login</h1>
						</div>
					</div>
					<!-- /row -->
				</div>
			</div>
		</div>
		<!-- /hero_single -->

		<div class="bg_gray">
			<div class="container margin_60_40">
		    <div class="row justify-content-center">

		        <div class="col-lg-4">
                  <form method="POST" action="{{ url('/login') }}">
                    @csrf
		        	<div class="sign_up">
		                <div class="head">
		                    <div class="title">
		                    <h3>Sign In</h3>
		                </div>
		                </div>
		                <!-- /head -->
		                <div class="main">
                            <a href="{{url('/login/facebook')}}" class="social_bt facebook">Sign up with Facebook</a>
							<a href="{{url('/login/google')}}" class="social_bt google">Sign up with Google</a>
							<div class="divider"><span>Or</span></div>
		                	<h6>Login details</h6>
		            		  <div class="form-group">
                                    <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{old('email')}}"  placeholder="Email Address">
                                    <i class="icon_mail"></i>
                                    @error('email')
                                    <small class="text-danger">
                                        {{$message}}
                                    </small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" id="password_sign" name="password">
                                    <i class="icon_lock"></i>
                                    @error('password')
                                    <small class="text-danger">
                                        {{$message}}
                                    </small>
                                    @enderror
                                </div>
                                <div class="clearfix add_bottom_15">
                                    <div class="checkboxes float-left">
                                        <label class="container_check">Remember me
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <div class="float-right mt-1"><a id="forgot" href="/password/reset">Forgot Password?</a></div>
                                </div>
                                <div class="text-center">
                                    <input type="submit" value="Log In" class="btn_1 full-width mb_5">
                                    Don’t have an account? <a href="{{url('/register')}}">Sign up</a>
                                </div>
                                <div id="forgot_pw">
                                    <div class="form-group">
                                        <label>Please confirm login email below</label>
                                        <input type="email" class="form-control" name="email_forgot" id="email_forgot">
                                        <i class="icon_mail_alt"></i>
                                    </div>
                                    <p>You will receive an email containing a link allowing you to reset your password to a new preferred one.</p>
                                    <div class="text-center"><input type="submit" value="Reset Password" class="btn_1"></div>
                                </div>
		                </div>
                    </div>
                    </form>
		            <!-- /box_booking -->
		        </div>
		        <!-- /col -->

		    </div>
		    <!-- /row -->
		</div>
		<!-- /container -->
		</div>
		<!-- /bg_gray -->
</main>
@endsection
