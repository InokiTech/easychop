@extends('frontend.layouts')
@section('title','Contact')
@section('content')
<main>
		<div class="hero_single inner_pages background-image" data-background="url('front-assets/img/home_section_1.jpg')">
			<div class="opacity-mask" data-opacity-mask="rgba(0, 0, 0, 0.6)">
				<div class="container">
					<div class="row justify-content-center">
						<div class="col-xl-9 col-lg-10 col-md-8">
							<h1>About EasyChop</h1>
							<p>More bookings from Restaurants around the corner</p>
						</div>
					</div>
					<!-- /row -->
				</div>
			</div>
		</div>
		<!-- /hero_single -->

		<div class="bg_gray">
			<div class="container margin_60_40">
			<div class="main_title center">
				<span><em></em></span>
				<h2>EasyChop</h2>
				<p>Order now, Chop Now.</p>
			</div>

			<div class="row justify-content-center align-items-center add_bottom_15">
					<div class="col-lg-5">
						<div class="box_about">
							<h3>Order food from anywhere</h3>

							<p class="lead">Easychop is a food ordering platform where
                            people can have access to varieties of
                            restaurants of their choice and have any ordered
                            item delivered to their doorstep at a short
                            period of time.</p>
							<img src="{{asset('front-assets/img/arrow_about.png')}}" alt="" class="arrow_1">
						</div>
					</div>
					<div class="col-lg-5 pl-lg-5 text-center d-none d-lg-block">
							<img src="{{asset('front-assets/img/about_1.png')}}" alt="" class="img-fluid" width="250" height="250">
					</div>
				</div>
				<!-- /row -->
				<div class="row justify-content-center align-items-center add_bottom_15">
					<div class="col-lg-5 pr-lg-5 text-center d-none d-lg-block">
							<img src="{{asset('front-assets/img/about_2.svg')}}" alt="" class="img-fluid" width="250" height="250">
					</div>
					<div class="col-lg-5">
						<div class="box_about">
							<h3>Manage Easly</h3>
							<p class="lead">Easychop stands out as it offers it’s users
                            seamless ordering service connecting logistics
                            company, Food vendors and consumers together
                            easily thereby solving the problem of going to
                            buy food manually from a restaurant.</p>
						</div>
					</div>
				</div>

			</div>
			<!-- /container -->
		</div>
		<!-- /bg_gray -->
	</main>
    <!-- /main -->
    @endsection
