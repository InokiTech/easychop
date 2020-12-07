@extends('frontend.layouts')
@section('title','Forgot Password')
@section('content')
<main>
		<div class="hero_single inner_pages background-image" data-background="url(/front-assets/img/home_section_1.jpg)">
			<div class="opacity-mask" data-opacity-mask="rgba(0, 0, 0, 0.6)">
				<div class="container">
					<div class="row justify-content-center">
						<div class="col-xl-9 col-lg-10 col-md-8">
							<h1>EasyChop Account Forgot Password</h1>
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
		                	<h6>Email details</h6>
		            		  <div class="form-group">
                                    <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{old('email')}}"  placeholder="Email Address">
                                    <i class="icon_mail"></i>
                                    @error('email')
                                    <small class="text-danger">
                                        {{$message}}
                                    </small>
                                    @enderror
                                </div>
                                <div class="text-center">
                                    <input type="submit" value="Log In" class="btn_1 full-width mb_5">
                                    Already have an account? <a href="{{url('/login')}}">Sign In</a><br/>
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
