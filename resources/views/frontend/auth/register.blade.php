@extends('frontend.layouts')
@section('title','Registration')
@section('content')
<main>
		<div class="hero_single inner_pages background-image" data-background="url(/front-assets/img/home_section_1.jpg)">
			<div class="opacity-mask" data-opacity-mask="rgba(0, 0, 0, 0.6)">
				<div class="container">
					<div class="row justify-content-center">
						<div class="col-xl-9 col-lg-10 col-md-8">
							<h1>EasyChop Customer Account SignUp</h1>
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
                    <form method="POST" action="{{ url('/register') }}">
                        @csrf
                        <div class="sign_up">
                            <div class="head">
                                <div class="title">
                                <h3>Sign Up</h3>
                            </div>
                            </div>
                            <!-- /head -->
                            <div class="main">
                                <h6>Customer details</h6>
                                <div class="form-group">
                                    <input type="text" name="role" value="customers"  hidden>
                                    <input type="text" class="form-control @error('fullname') is-invalid @enderror" name="fullname" value="{{old('fullname')}}" placeholder="Fullname">
                                    <i class="icon_name"></i>
                                    @error('fullname')
                                    <small class="text-danger">
                                        {{$message}}
                                    </small>
                                    @enderror
                                </div>
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
                                    <input type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{old('address')}}" placeholder="Precised Address">
                                    <i class="icon_pin"></i>
                                    @error('address')
                                    <small class="text-danger">
                                        {{$message}}
                                    </small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control @error('city') is-invalid @enderror" name="city" value="{{old('city')}}" placeholder="City">
                                    <i class="icon_pin"></i>
                                    @error('city')
                                    <small class="text-danger">
                                        {{$message}}
                                    </small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{old('phone')}}" placeholder="Phone">
                                    <i class="icon_phone"></i>
                                    @error('phone')
                                    <small class="text-danger">
                                        {{$message}}
                                    </small>
                                    @enderror
                                </div>
                                <div class="form-group add_bottom_15">
                                    <input type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" id="password_sign" name="password">
                                    <i class="icon_lock"></i>
                                    @error('password')
                                    <small class="text-danger">
                                        {{$message}}
                                    </small>
                                    @enderror
                                </div>
                                <div class="form-group add_bottom_15">
                                    <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" placeholder="Confirm Password" id="password_confirmation" name="password_confirmation">
                                    <i class="icon_lock"></i>
                                    @error('password_confirmation')
                                    <small class="text-danger">
                                        {{$message}}
                                    </small>
                                    @enderror
                                </div>
                                <button type="submit" class="btn_1 full-width mb_5">Sign up Now</button>
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

@section('script')
<script>
</script>
@endsection
