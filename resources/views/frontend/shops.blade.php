@extends('frontend.layout-two')
@section('content')
    <main>
		<div class="page_header element_to_stick">
		    <div class="container">
		    	<div class="row">
		    		<div class="col-xl-8 col-lg-7 col-md-7 d-none d-md-block">
		        		<h1>All Shops</h1>
		    		</div>
		    		<div class="col-xl-4 col-lg-5 col-md-5">
		    			<div class="search_bar_list">
							<input type="text" class="form-control" placeholder="Search again...">
							<input type="submit" value="Search">
						</div>
		    		</div>
		    	</div>
		    	<!-- /row -->
		    </div>
		</div>
		<!-- /page_header -->

		<div class="container margin_60_40">
            <div class="row">
                @foreach($shops as $shop)
			    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6">
			        <div class="strip">
			            <figure>
			                 <img src="{{$shop->shop_logo?$shop->shop_logo:asset('front-assets/img/easychop-placeholder.jpg')}}" data-src="{{$shop->shop_logo?$shop->shop_logo:asset('front-assets/img/easychop-placeholder.jpg')}}" class="owl-lazy" alt="">
                            <a href="/shops/{{$shop->shop_id}}" class="strip_info">
			                    <small>{{$shop->shop_name}}</small>
			                    <div class="item_title">
			                        <h3>{{$shop->shop_city}}</h3>
			                        <small>{{$shop->shop_address}}</small>
			                    </div>
			                </a>
			            </figure>
			            <ul>
			                <li><span class="loc_open">Now Open</span></li>
			                <li>
			                    <div class="score"><span>Superb<em>350 Reviews</em></span><strong>8.9</strong></div>
			                </li>
			            </ul>
			        </div>
                </div>
                @endforeach
            </div>
        </div>
	<!-- /container -->
	</main>
	<!-- /main -->
@endsection

