@extends('frontend.layout-two')
@section('content')
    <main>
		<div class="page_header element_to_stick">
		    <div class="container">
		    	<div class="row">
		    		<div class="col-xl-8 col-lg-7 col-md-7 d-none d-md-block">
                        <h1>Shops located around: <strong>{{$location}}</strong></h1>
		    		</div>
                    <form action="{{url('/place-search')}}" method="GET" class="col-xl-4 col-lg-5 col-md-5">
                        @csrf
		    			<div class="search_bar_list">
                            <input type="text" class="form-control" placeholder="Search again..." name="autocomplete" id="autocomp">
                            <input type="text" name="search_place" id="search_place" hidden>
                            <input type="text" name="search_lat" id="search_lat" hidden>
                            <input type="text" name="search_lng" id="search_lng" hidden>
							<input type="submit" value="Search">
						</div>
		    		</form>
		    	</div>
		    	<!-- /row -->
		    </div>
		</div>
		<!-- /page_header -->

		<div class="container margin_60_40">
            <div class="row">
            @if(count($shops)>0)
                @foreach($shops as $shop)
			    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6">
			        <div class="strip">
			            <figure>
			                {{-- <span class="ribbon off">-30%</span> --}}
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
            @else
                <h4 class="text-center"> No store from this area</h4>
            @endif
            </div>
        </div>
	<!-- /container -->
	</main>
	<!-- /main -->
@endsection
@section('script')
<script src="https://maps.google.com/maps/api/js?key=AIzaSyC90viSvYNl1azNSol1NGvjvzVqYNf8kBs&libraries=places" type="text/javascript"></script>

<script>
   google.maps.event.addDomListener(window, 'load', initialize);
   function initialize() {
       var autocomp = document.getElementById('autocomp');
       var search_place = document.getElementById('search_place');
	   var options = {
			componentRestrictions: {country: 'ng'}
	   };
       var autocomplete = new google.maps.places.Autocomplete(autocomp,options);
       autocomplete.addListener('place_changed', function() {
           place = autocomplete.getPlace();
		   search_place.value = place.name;
		//    input.lat = place.name;
		//    input.lng = place.name;
       });
   }
</script>
@endsection

