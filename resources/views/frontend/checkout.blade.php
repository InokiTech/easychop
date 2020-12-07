@extends('frontend.layout-two')
@section('content')
<main class="bg_gray pattern">
		<div class="container margin_60_40">
		    <div class="row justify-content-center">
		        <div class="col-xl-6 col-lg-6">
		        	<div class="box_booking_2 style_2">
					    <div class="head">
					        <div class="title">
					            <h3>Checkout</h3>
					        </div>
					    </div>
					    <!-- /head -->
					    <div class="main">
                            <h5 class="text-center">Delivery Details</h5>
                            <form action="/order/checkout" class="mb-1" method="POST">
                                @csrf
                                <div class="form-row">
                                    <label for="fullname">Fullname</label>
                                    <input type="text" class="form-control @error('fullname') is-invalid @enderror" name="fullname" placeholder="Fullname" value="{{auth()->user()->fullname}}">
                                </div>
                                <div class="form-row">
                                    <label for="address">Address</label>
                                    <input type="text" class="form-control @error('address') is-invalid @enderror" name="address" placeholder="Address" value="{{auth()->user()->address}}">
                                </div>
                                <div class="form-row">
                                    <label for="city">City</label>
                                    <input type="text" class="form-control @error('city') is-invalid @enderror" name="city" placeholder="City" value="{{auth()->user()->city}}">
                                </div>
                                <div class="form-row">
                                    <label for="phone">Phone</label>
                                    <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" placeholder="Phone" value="{{auth()->user()->phone}}">
                                </div>

                            <h5 class="text-center my-3">Order Summary</h5>
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col">Name of Meal</th>
                                            <th scope="col">Price</th>
                                            <th scope="col">Quantity</th>
                                            <th scope="col">Sub Total</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-center">
                                        @if(count($items)>0)
                                            @foreach($items as $key => $item)
                                                    <tr>
                                                        <th>{{$item->name}}</th>
                                                        <td>
                                                            {{money($item->price)}}
                                                        </td>
                                                        <td>
                                                            {{$item->quantity}}
                                                        </td>
                                                        <td>
                                                            {{money(Cart::session(auth()->id())->get($item->id)->getPriceSum())}}
                                                        </td>
                                                    </tr>
                                            @endforeach
                                                <tr class="h6">
                                                    <th >Grand Total</th>
                                                    <td colspan="3" class="text-right">
                                                        {{money(Cart::session(auth()->id())->getTotal())}}
                                                    </td>
                                                </tr>
                                            @endif
                                    </tbody>

                                </table>
                            </div>

                            <button type="submit" class="btn_1 full-width mb_5">Pay Now</button>
                        </div>
                        </form>
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
