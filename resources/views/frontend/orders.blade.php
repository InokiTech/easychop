@extends('frontend.layouts')
@section('title','Home Page')
@section('content')
<main>
        <div class="hero_single inner_pages background-image" data-background="url('front-assets/img/home_section_1.jpg')">
			<div class="opacity-mask" data-opacity-mask="rgba(0, 0, 0, 0.6)">
				<div class="container">
					<div class="row justify-content-center">
						<div class="col-xl-9 col-lg-10 col-md-8">
							<h1>All Orders</h1>
							{{-- <p>A successful restaurant experience</p> --}}
						</div>
					</div>
					<!-- /row -->
				</div>
			</div>
		</div>
		<!-- /hero_single -->


		<div class="bg_gray">
			<div class="container margin_60_40">
				<div class="row">
					<div class="col-lg-12 col-md-12">
						<div class="table-responsive">
                            <table class="table table-hover" id="dataTable">
                                  <caption>Orders Table</caption>
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Order Id</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Ordered items</th>
                                        <th scope="col">Amount</th>
                                        <th scope="col">Payment Status</th>
                                        <th scope="col">Payment Method</th>
                                        <th scope="col">Created</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($orders as $key=>$order)
                                    <tr>
                                        <td scope="row">{{++$key}}</td>
                                        <td>{{$order->order_id}}</td>
                                        <td>{{$order->status}}</td>
                                        <td>{{$order->item_count}}</td>
                                        <td>{{money($order->grand_total)}}</td>
                                        <td>
                                            @if($order->is_paid)
                                                <span class="text-bold text-success">Paid</span>
                                            @else
                                                <span class="text-bold text-danger">Not paid</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if($order->payment_method=='card')
                                                <span class="text-bold text-success">Card</span>
                                            @elseif($order->payment_method=='on_delivery')
                                                <span class="text-bold text-success">Pay on delivery</span>
                                            @endif
                                        </td>
                                        <td>{{$order->created_at}}</td>
                                        <td>
                                            @if(!$order->is_paid)
                                                <a href="{{url('/order/payment',$order->order_id)}}" class="btn btn-sm btn-primary">Pay</a>

                                                {{-- <button href="" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#cancelModal{{$order->order_id}}">Cancel</button>
                                                <div class="modal fade" id="cancelModal{{$order->order_id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Confirm action</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <h5> Are you sure you want to cancel transactions?</h5>
                                                    </div>
                                                    <form action="{{url('/order',$order->order_id)}}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                                                            <button type="submit" class="btn btn-primary">Yes, Cancel</button>
                                                        </div>
                                                    </form>
                                                    </div>
                                                </div> --}}
                                                </div>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                </table>
                        </div>
					</div>
				</div>
			</div>
			<!-- /container -->
		</div>
		<!-- /bg_gray -->
    </main>
    @endsection
