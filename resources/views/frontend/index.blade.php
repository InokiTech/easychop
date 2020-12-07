@extends('frontend.layouts')
@section('title','Home Page')

@section('content')

<main id="vue-app">
<div class="preloader">
	<img src="/front-assets/img/logo.png" alt="">
</div>

	

        <div class="hero_single inner_pages background-image" data-background="url('front-assets/img/home_section_1.jpg')">
		{{-- <div class="hero_single version_2"> --}}
			<div class="opacity-mask" data-opacity-mask="rgba(0, 0, 0, 0.6)">
				<div class="container">
					<div class="row justify-content-center">
						<div class="col-xl-9 col-lg-10 col-md-8">
							<!-- <h1>#EndSARS &amp; Book</h1> -->
								<h1>Enjoy tasty meals everyday</h1>
							<!-- <p>The best Restaurants in Nigeria at the best price</p> -->
								<p>Order from the best restaurants in Nigeria at the best price</p>
							<div class="row no-gutters custom-search-input">
                                    <div class="col-lg-6">
                                        <form method="post" action="">
                                            <div class="form-group">
                                                <input class="form-control" type="text" placeholder="Name of Dish..." autocomplete="off" v-model="search_food">
                                                <i class="icon_search"></i>
                                            </div>
                                        </form>
                                    </div>
									<form action="{{url('/place-search')}}" method="GET" class="col-lg-6 px-1">
										@csrf
										<div class="form-row">
												<input class="form-control no_border_r col-lg-8" type="text" name="autocomplete" value="" placeholder="Area or Place..." id="autocomp">
												<input type="text" name="search_place" id="search_place" hidden>
												<input type="text" name="search_lat" id="search_lat" hidden>
												<input type="text" name="search_lng" id="search_lng" hidden>
												<input class="form-control no_border_r col-lg-4" type="submit" value="Search">
										</div>
									</form>
                                </div>
                                <div class="bg-secondary text-left" v-if="search_food">
                                    <div class="" v-if="foods.length > 0" v-for="food in foods">
                                        <a class="bg-secondary dropdown-item border-top border-bottom"
                                        v-bind:href="'/shops/'+food.shop.shop_id" v-cloak>
                                        <span class="mr-2 h6">@{{food.product_name}} - </span>
											<span></span> <span class="h5">@{{food.shop.shop_name}}</span> <span class="">@{{food.shop.shop_address}}, @{{food.shop.shop_city}}</span>
                                        </a>
                                    </div>
                                    <div class="" v-else>
                                        <a class="bg-secondary dropdown-item border-top border-bottom" v-cloak>
                                            <span></span> <span class="h6">No result found</span> <span class=""></span>
                                        </a>
                                    </div>
                                </div>
								<!-- /row -->
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
				    <h2>How it works</h2>
				    <p></p>
				</div>

				<div class="row">
					<div class="col-lg-4 col-md-6">
						<a class="box_topic" href="#0">
							<span><i class="icon_wallet"></i></span>
							<h3>Order</h3>
							<p>Get your favourite meals from the best restaurants around you or far away</p>
						</a>
					</div>
					<div class="col-lg-4 col-md-6">
						<a class="box_topic" href="#0">
							<i class="icon_cloud-upload_alt"></i>
							<h3>Delivery</h3>
							<p>We get your ordered meal delivered to you at the shortest possible time</p>
						</a>
					</div>
					<div class="col-lg-4 col-md-6">
						<a class="box_topic" href="#0">
							<i class="icon_lifesaver"></i>
							<h3>Eat</h3>
							<p>Enjoy your ordered meal at your convenience</p>
						</a>
					</div>

				</div>
			</div>
			<!-- /container -->
		</div>
		<!-- /bg_gray -->

		<div class="container margin_60_40">
			<div class="main_title">
				<span><em></em></span>
				<h2>Popular Vendors</h2>
				<p>Order meal from popular restaurants in town</p>
				<a href="#0">View All</a>
			</div>

			<div class="owl-carousel owl-theme carousel_4">
                @foreach($shops as $shop)
			    <div class="item">
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
			    {{-- <div class="item">
			        <div class="strip">
			            <figure>
			                <span class="ribbon off">-40%</span>
			                <img src="{{asset('front-assets/img/lazy-placeholder.png')}}" data-src="{{asset('front-assets/img/location_3.png')}}" class="owl-lazy" alt="">
			                <a href="#" class="strip_info">
			                    <small>Burghers</small>
			                    <div class="item_title">
			                        <h3>Best Burghers</h3>
			                        <small>27 Old Gloucester St</small>
			                    </div>
			                </a>
			            </figure>
			            <ul>
			                <li><span class="loc_open">Now Open</span></li>
			                <li>
			                    <div class="score"><span>Superb<em>350 Reviews</em></span><strong>9.5</strong></div>
			                </li>
			            </ul>
			        </div>
			    </div>
			    <div class="item">
			        <div class="strip">
			            <figure>
			                <span class="ribbon off">-30%</span>
			                <img src="{{asset('front-assets/img/lazy-placeholder.png')}}" data-src="{{asset('front-assets/img/location_3.jpg')}}" class="owl-lazy" alt="">
			                <a href="#" class="strip_info">
			                    <small>Vegetarian</small>
			                    <div class="item_title">
			                        <h3>Vego Life</h3>
			                        <small>27 Old Gloucester St</small>
			                    </div>
			                </a>
			            </figure>
			            <ul>
			                <li><span class="loc_open">Now Open</span></li>
			                <li>
			                    <div class="score"><span>Superb<em>350 Reviews</em></span><strong>7.5</strong></div>
			                </li>
			            </ul>
			        </div>
			    </div>
			    <div class="item">
			        <div class="strip">
			            <figure>
			                <span class="ribbon off">-25%</span>
			                <img src="{{asset('front-assets/img/lazy-placeholder.png')}}" data-src="{{asset('front-assets/img/location_4.jpg')}}" class="owl-lazy" alt="">
			                <a href="#" class="strip_info">
			                    <small>Japanese</small>
			                    <div class="item_title">
			                        <h3>Sushi Temple</h3>
			                        <small>27 Old Gloucester St</small>
			                    </div>
			                </a>
			            </figure>
			            <ul>
			                <li><span class="loc_open">Now Open</span></li>
			                <li>
			                    <div class="score"><span>Superb<em>350 Reviews</em></span><strong>9.5</strong></div>
			                </li>
			            </ul>
			        </div>
			    </div>
			    <div class="item">
			        <div class="strip">
			            <figure>
			                <span class="ribbon off">-30%</span>
			                <img src="{{asset('front-assets/img/lazy-placeholder.png')}}" data-src="{{asset('front-assets/img/location_5.jpg')}}" class="owl-lazy" alt="">
			                <a href="#" class="strip_info">
			                    <small>Pizza</small>
			                    <div class="item_title">
			                        <h3>Auto Pizza</h3>
			                        <small>27 Old Gloucester St</small>
			                    </div>
			                </a>
			            </figure>
			            <ul>
			                <li><span class="loc_open">Now Open</span></li>
			                <li>
			                    <div class="score"><span>Superb<em>350 Reviews</em></span><strong>7.0</strong></div>
			                </li>
			            </ul>
			        </div>
			    </div>
			    <div class="item">
			        <div class="strip">
			            <figure>
			                <span class="ribbon off">-15%</span>
			                <img src="{{asset('front-assets/img/lazy-placeholder.png')}}" data-src="{{asset('front-assets/img/location_6.jpg')}}" class="owl-lazy" alt="">
			                <a href="#" class="strip_info">
			                    <small>Burghers</small>
			                    <div class="item_title">
			                        <h3>Alliance</h3>
			                        <small>27 Old Gloucester St</small>
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
			    <div class="item">
			        <div class="strip">
			            <figure>
			                <span class="ribbon off">-30%</span>
			                <img src="{{asset('front-assets/img/lazy-placeholder.png')}}" data-src="{{asset('front-assets/img/location_7.jpg')}}" class="owl-lazy" alt="">
			                <a href="#" class="strip_info">
			                    <small>Chinese</small>
			                    <div class="item_title">
			                        <h3>Alliance</h3>
			                        <small>27 Old Gloucester St</small>
			                    </div>
			                </a>
			            </figure>
			            <ul>
			                <li><span class="loc_closed">Now Closed</span></li>
			                <li>
			                    <div class="score"><span>Superb<em>350 Reviews</em></span><strong>8.9</strong></div>
			                </li>
			            </ul>
			        </div>
			    </div> --}}
			</div>
			<!-- /carousel -->

			<div class="banner lazy" data-bg="url(/front-assets/img/banner_bg_desktop.jpg)">
				<div class="wrapper d-flex align-items-center opacity-mask" data-opacity-mask="rgba(0, 0, 0, 0.2)">
					<div>
						<small>EasyChop Vendors</small>
						<h3>More than 300 Restaurants</h3>
						<p class="largescreen-text">
							On our platform you have increased reach to your customers and the chance of 
							creating a new market niche
							</p>
						<a href="#0" class="btn_1 home-search-button">Become a Vendor</a> <a href="#0" style="background:#fff!important;color:#ff2000;" class="btn_1 home-search-button rider-btn">Become a Rider</a>
					</div>
				</div>
				<!-- /wrapper -->
			</div>
			<!-- /banner -->


			{{-- <div class="container margin_60_40">
			<div class="main_title">
				<span><em></em></span>
				<h2>Vendors Near Me <i class="icon_pin_alt"></i></h2>
				<p>Cum doctus civibus efficiantur in imperdiet deterruisset.</p>
				<a href="#0">View All</a>
			</div>

			<div class="owl-carousel owl-theme carousel_4">
			    <div class="item">
			        <div class="strip">
			            <figure>
			                <span class="ribbon off">-30%</span>
			                <img src="{{asset('front-assets/img/lazy-placeholder.png')}}" data-src="{{asset('front-assets/img/location_3.png')}}" class="owl-lazy" alt="">
			                <a href="#" class="strip_info">
			                    <small>Pizza</small>
			                    <div class="item_title">
			                        <h3>Da Alfredo</h3>
			                        <small>27 Old Gloucester St</small>
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
			    <div class="item">
			        <div class="strip">
			            <figure>
			                <span class="ribbon off">-40%</span>
			                <img src="{{asset('front-assets/img/lazy-placeholder.png')}}" data-src="{{asset('front-assets/img/location_4.png')}}" class="owl-lazy" alt="">
			                <a href="#" class="strip_info">
			                    <small>Burghers</small>
			                    <div class="item_title">
			                        <h3>Best Burghers</h3>
			                        <small>27 Old Gloucester St</small>
			                    </div>
			                </a>
			            </figure>
			            <ul>
			                <li><span class="loc_open">Now Open</span></li>
			                <li>
			                    <div class="score"><span>Superb<em>350 Reviews</em></span><strong>9.5</strong></div>
			                </li>
			            </ul>
			        </div>
			    </div>
			    <div class="item">
			        <div class="strip">
			            <figure>
			                <span class="ribbon off">-30%</span>
			                <img src="{{asset('front-assets/img/lazy-placeholder.png')}}" data-src="{{asset('front-assets/img/location_2.png')}}" class="owl-lazy" alt="">
			                <a href="#" class="strip_info">
			                    <small>Vegetarian</small>
			                    <div class="item_title">
			                        <h3>Vego Life</h3>
			                        <small>27 Old Gloucester St</small>
			                    </div>
			                </a>
			            </figure>
			            <ul>
			                <li><span class="loc_open">Now Open</span></li>
			                <li>
			                    <div class="score"><span>Superb<em>350 Reviews</em></span><strong>7.5</strong></div>
			                </li>
			            </ul>
			        </div>
			    </div>
			    <div class="item">
			        <div class="strip">
			            <figure>
			                <span class="ribbon off">-25%</span>
			                <img src="{{asset('front-assets/img/lazy-placeholder.png')}}" data-src="{{asset('front-assets/img/location_4.png')}}" class="owl-lazy" alt="">
			                <a href="#" class="strip_info">
			                    <small>Japanese</small>
			                    <div class="item_title">
			                        <h3>Sushi Temple</h3>
			                        <small>27 Old Gloucester St</small>
			                    </div>
			                </a>
			            </figure>
			            <ul>
			                <li><span class="loc_open">Now Open</span></li>
			                <li>
			                    <div class="score"><span>Superb<em>350 Reviews</em></span><strong>9.5</strong></div>
			                </li>
			            </ul>
			        </div>
			    </div>
			    <div class="item">
			        <div class="strip">
			            <figure>
			                <span class="ribbon off">-30%</span>
			                <img src="{{asset('front-assets/img/lazy-placeholder.png')}}" data-src="{{asset('front-assets/img/location_5.jpg')}}" class="owl-lazy" alt="">
			                <a href="#" class="strip_info">
			                    <small>Pizza</small>
			                    <div class="item_title">
			                        <h3>Auto Pizza</h3>
			                        <small>27 Old Gloucester St</small>
			                    </div>
			                </a>
			            </figure>
			            <ul>
			                <li><span class="loc_open">Now Open</span></li>
			                <li>
			                    <div class="score"><span>Superb<em>350 Reviews</em></span><strong>7.0</strong></div>
			                </li>
			            </ul>
			        </div>
			    </div>
			    <div class="item">
			        <div class="strip">
			            <figure>
			                <span class="ribbon off">-15%</span>
			                <img src="{{asset('front-assets/img/lazy-placeholder.png')}}" data-src="{{asset('front-assets/img/location_6.jpg')}}" class="owl-lazy" alt="">
			                <a href="#" class="strip_info">
			                    <small>Burghers</small>
			                    <div class="item_title">
			                        <h3>Alliance</h3>
			                        <small>27 Old Gloucester St</small>
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
			    <div class="item">
			        <div class="strip">
			            <figure>
			                <span class="ribbon off">-30%</span>
			                <img src="{{asset('front-assets/img/lazy-placeholder.png')}}" data-src="{{asset('front-assets/img/location_7.jpg')}}" class="owl-lazy" alt="">
			                <a href="#" class="strip_info">
			                    <small>Chinese</small>
			                    <div class="item_title">
			                        <h3>Alliance</h3>
			                        <small>27 Old Gloucester St</small>
			                    </div>
			                </a>
			            </figure>
			            <ul>
			                <li><span class="loc_closed">Now Closed</span></li>
			                <li>
			                    <div class="score"><span>Superb<em>350 Reviews</em></span><strong>8.9</strong></div>
			                </li>
			            </ul>
			        </div>
			    </div>
			</div> --}}
			<!-- /carousel -->
		</div>
		<!-- /container -->


    </main>
    @endsection
	@section('script')
	<script>

						function showLoader(){

							//let loaderDiv = document.createElement("div");
							let loaderDiv = document.querySelector(".preloader");
							loaderDiv.style.left = "0";

							
						}

						function hideLoader(){
							let loaderDiv = document.querySelector(".preloader");
							// loaderDiv.style.transition="all 3s ease";
							loaderDiv.style.left = "-150%";
								
						}

					if (document.readyState === 'loading') {

						// showLoader();
						// 

						console.log("it is");
						document.addEventListener('DOMContentLoaded', hideLoader);
						
					}else{
						hideLoader();
					}
					


</script>

    <script>
        var view = new Vue({
            el:"#vue-app",
            data:{
				search_food:'',
                foods:[],
            },
            method:{

            },
            watch:{
                search_food:_.debounce(function(){
                    var detail = this.search_food;
                        axios({
                            method:'POST',
                            url:"/search",
                            data:{
                                detail:detail,
                            },
                        }).then((res)=>{
                            this.foods = res.data
                        }).catch(err=>{
                            console.log(err);
                        });
                },500),

            },
        });
    </script>

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
