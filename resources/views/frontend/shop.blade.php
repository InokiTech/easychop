@extends('frontend.layout-two')
@section('content')
    <main>
		<div class="msg"></div>
        <div class="hero_in detail_page background-image" style="height: 350px !important;" data-background="url('/front-assets/img/restaurant_detail_hero_one.jpg')">
			<div class="wrapper opacity-mask" data-opacity-mask="rgba(0, 0, 0, 0.5)">

				<div class="container">
					<div class="main_info">
						<div class="row">
							<div class="col-xl-4 col-lg-5 col-md-6">
								{{-- <div class="head"><div class="score"><span>Superb<em>350 Reviews</em></span><strong>8.9</strong></div></div> --}}
								<h1>{{$shop->shop_name}}</h1>
								{{Str::upper($shop->shop_city)}} - {{$shop->shop_address}}. - <a href="#">Get directions</a>
								{{-- {{Str::upper($shop->shop_city)}} - {{$shop->shop_address}}. - <a href="#https://www.google.com/maps/dir//Assistance+%E2%80%93+H%C3%B4pitaux+De+Paris,+3+Avenue+Victoria,+75004+Paris,+Francia/@48.8606548,2.3348734,14z/data=!4m15!1m6!3m5!1s0x47e66e1de36f4147:0xb6615b4092e0351f!2sAssistance+Publique+-+H%C3%B4pitaux+de+Paris+(AP-HP)+-+Si%C3%A8ge!8m2!3d48.8568376!4d2.3504305!4m7!1m0!1m5!1m1!1s0x47e67031f8c20147:0xa6a9af76b1e2d899!2m2!1d2.3504327!2d48.8568361" target="blank">Get directions</a> --}}
							</div>
							<div class="col-xl-8 col-lg-7 col-md-6">
								<div class="buttons clearfix">
									<span class="magnific-gallery">
										<a href="#menu" class="btn_hero" title="Photo title" data-effect="mfp-zoom-in"><i class="icon_cart"></i>View Menu</a>
									</span>
									{{-- <a href="#0" class="btn_hero wishlist"><i class="icon_heart"></i>Wishlist</a> --}}
								</div>
							</div>
						</div>
						<!-- /row -->
					</div>
					<!-- /main_info -->
				</div>
			</div>
		</div>
		<div class="page_header element_to_stick">
		    <div class="container">
		    	<div class="row">
		    		<div class="col-xl-8 col-lg-7 col-md-7 d-none d-md-block">
		        		<h1 class="h2" id="menu">Menu</h1>
		    		</div>
		    		{{-- <div class="col-xl-4 col-lg-5 col-md-5">
		    			<div class="search_bar_list">
							<input type="text" class="form-control" placeholder="Search again...">
							<input type="submit" value="Search">
						</div>
		    		</div> --}}
		    	</div>
		    	<!-- /row -->
		    </div>
		</div>
		<!-- /page_header -->

		<div class="container margin_30_40">
            <div class="row isotope-wrapper">
                @foreach($shop->products as $product)
                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 isotope-item popular">
                        <div class="strip">
                            <figure>
                                {{-- <span class="ribbon off">-30%</span> --}}
                                <img src="{{$product->product_image? $product->product_image:asset('front-assets/img/lazy-placeholder.png')}}" data-src="{{$product->product_image? $product->product_image:asset('front-assets/img/location_1.jpg')}}" class="img-fluid lazy" alt="">
                                <a href="#" class="strip_info">
                                    {{-- <small>Pizza</small> --}}
                                    <div class="item_title">
                                        <h3>{{$product->product_name}}</h3>
                                        {{-- <small></small> --}}
                                    </div>
                                </a>
                            </figure>
                            <ul>
                                <li><span class="h6"><em>{{money($product->product_price)}}</em></span></li>
                                <li>
									<div class="score"><strong>
									<button class="btn-cart" style="outline:none" id="plus" value="{{$product->product_id}}" >+</button>
									<button class="btn-cart" style="outline:none" id="minus" value="{{$product->product_id}}" >-</button>

								</strong></div>
                                </li>
                            </ul>
                        </div>
                    </div>
                @endforeach
            </div>
            <!-- /row -->
            {{-- <div class="pagination_fg">
                <a href="#">&laquo;</a>
                <a href="#" class="active">1</a>
                <a href="#">2</a>
                <a href="#">3</a>
                <a href="#">4</a>
                <a href="#">5</a>
                <a href="#">&raquo;</a>
            </div> --}}
        </div>
	<!-- /container -->
	</main>
	<!-- /main -->

	<script>


				document.addEventListener("DOMContentLoaded",()=>{





                 async function getCartCount(){
                        let count = await fetch(`/cart/count`);
                        let data = await count.json();
                        return data
				 }



                 function displayCartCount(){

					let count = getCartCount().then(d => {

						let cartCount = document.querySelector("#cart-count");
						cartCount.innerHTML = d.count;
					});



                 }




					let plusBtn = document.querySelector("#plus");
					let minusBtn = document.querySelector("#minus");


					//------- if plus is  clicked -------------

					plusBtn.addEventListener("click", ()=>{

						let id = plusBtn.value;

						//add to cart
						async function addToCart(){
							let action = await fetch(`/add-to-cart/${id}`);
							let data = await action.json();
							return data;
							}

							//get message after success
							function addAndGetMessage(){
								let res = addToCart().then((result)=>{
									let Div = document.querySelector(".msg");
									Div.innerHTML= "";
									Div.classList.add("msgSuccess");

									let newContent = document.createTextNode(result.msg);
									Div.appendChild(newContent);
									setTimeout(() => {
									Div.classList.remove("msgSuccess");
									Div.innerHTML= "";
									}, 1700);
									// console.log(result);
								});
							}


						addAndGetMessage();
						displayCartCount();

					});


					//---------- if minus is clicked ---------

						minusBtn.addEventListener("click", ()=>{

						let id= minusBtn.value;


						////////////////////////
						//Remove from cart
						async function removeFromCart(){
							let action = await fetch(`/cart/destroy/${id}`);
							let data = await action.json();
							return data;
							}

							//get message after success
							function removeAndGetMessage(){
								let res = removeFromCart().then((result)=>{
									let Div = document.querySelector(".msg");
									Div.innerHTML= "";
									Div.classList.add("msgFail");

									let newContent = document.createTextNode(result.msg);
									Div.appendChild(newContent);
									setTimeout(() => {
									Div.classList.remove("msgFail");
									Div.innerHTML= "";
									}, 1300);
									// console.log(result);
								});
							}


						removeAndGetMessage();
						displayCartCount();


					});

				})



	</script>
@endsection

