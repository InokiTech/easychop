@extends('frontend.layouts')
@section('title','Customer Profile')

@section('content')
<main>
		<div class="hero_single inner_pages background-image" data-background="url(/front-assets/img/home_section_1.jpg)">
			<div class="opacity-mask" data-opacity-mask="rgba(0, 0, 0, 0.6)">
				<div class="container">
					<div class="row justify-content-center">
						<div class="col-xl-9 col-lg-10 col-md-8">
							<h1>Update Your Account</h1>
						</div>
					</div>
					<!-- /row -->
				</div>
			</div>
		</div>
		<!-- /hero_single -->

		<div class="bg_gray">

		@auth
		
			<div class="responsive-nav" >
				<div style="
				    display: flex;
					font-size: 1.03em;
					padding: 15px;
					justify-content: space-around;
				">
					<a href="{{url('/order')}}">My Orders</a>
					<a href="{{url('/cart')}}">Cartlist</a>
					<a href="{{url('/logout')}}" >Logout</a>
				</div>
			</div>
		
		@endauth

			<div class="container margin_60_40">
		    <div class="row justify-content-center">
		        <div class="col-lg-4">
		        	<div class="sign_up">
		                <div class="head">
		                    <div class="title">
		                    <h6 class="text-white">{{auth()->user()->fullname}} | EasyChopper</h6>
		                </div>
		                </div>
		                <!-- /head -->
		                <div class="main">
                            <h6>Personal details</h6>
                        <form action="{{url('/customer/profile')}}" method="post">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <input type="text" class="form-control @error('fullname') is-invalid @enderror" name="fullname" placeholder="First and Last Name" value="{{auth()->user()->fullname}}">
                                    <i class="icon_pencil"></i>
                                </div>
                                <div class="form-group  col-md-12">
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Email Address" value="{{auth()->user()->email}}">
                                    <i class="icon_mail"></i>
                                </div>
                                <div class="form-group  col-md-12">
                                    <input type="text" class="form-control @error('address') is-invalid @enderror" name="address" placeholder="Address" value="{{auth()->user()->address}}">
                                    <i class="icon_pin"></i>
                                </div>
                                <div class="form-group  col-md-12">
                                    <input type="text" class="form-control @error('city') is-invalid @enderror" name="city" placeholder="City" value="{{auth()->user()->city}}">
                                    <i class="icon_pin"></i>
                                </div>
                                <div class="form-group  col-md-12">
                                    <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" placeholder="Phone" value="{{auth()->user()->phone}}">
                                    <i class="icon_phone"></i>
                                </div>
                                <div class="form-group  col-md-12">
                                    <button type="submit" class="btn btn-success btn-block full-width mb_5 col-md-12">Update Profile</a>
                                </div>
                            </div>
                        </form>
		                </div>
		            </div>
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
	<!-- /main -->
@endsection
