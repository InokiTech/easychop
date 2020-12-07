@extends('frontend.layout-two')
@section('content')
<main class="bg_gray pattern">
		<div class="container margin_60_40">
		    <div class="row justify-content-center">
		        <div class="col-xl-6 col-lg-6">
		        	<div class="box_booking_2 style_2">
					    <div class="head">
					        <div class="title">
					            <h3>Payment Method</h3>
					        </div>
					    </div>
					    <!-- /head -->
					    <div class="main">
                            <h5 class="text-center">Select Payment Method</h5>
                            <form action="{{route('order.payment',$order)}}" class="mb-1" method="POST">
                                @csrf
                                <input type="text" name="payment_method" value="card" hidden>
                                <button type="submit" class="btn_1 full-width mb_5">Pay with card</button>
                            </form>
                            <form action="{{route('order.payment',$order)}}" class="mb-1" method="POST">
                                @csrf
                                <input type="text" name="payment_method" value="on_delivery" hidden>
                                <button type="submit" class="btn_1 full-width mb_5">Pay on delivery</button>
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

	</main>
    <!-- /main -->
@endsection
