@extends('frontend.layout-two')
@section('content')
<main class="bg_gray pattern">
		<div class="container margin_60_40">
		    <div class="row justify-content-center">
		        <div class="col-xl-6 col-lg-8">
		        	<div class="box_booking_2 style_2">
					    <div class="head">
					        <div class="title">
					            <h3>Cart List</h3>
					        </div>
					    </div>
					    <!-- /head -->
					    <div class="main">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(count($items)>0)
                                        @foreach($items as $key => $item)
                                                <tr>
                                                    <th>{{$item->name}}</th>
                                                    <td>
                                                        {{money(Cart::session(auth()->id())->get($item->id)->getPriceSum())}}
                                                    </td>
                                                    <td>
                                                        <form action="/cart/update-quantity/{{$item->id}}" method="POST" class="form mx-auto col-md-9">
                                                            @csrf
                                                            <div class="form-row">
                                                                <input type="number" name="quantity" class="form-control col-md-4 mr-1" value="{{$item->quantity}}">
                                                                <button type="submit" class=" form-control btn btn-primary btn-sm col-md-4">Save</button>
                                                            </div>
                                                        </form>
                                                    </td>
                                                    <td><a href="/cart/destroy/{{$item->id}}">Delete</a></td>
                                                </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="4" class="text-center">Empty Cart list</td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                            @if(count($items)>0)
                                <a href="/order/checkout" class="btn_1 full-width mb_5">Proceed to Checkout</a>
                            @endif

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
