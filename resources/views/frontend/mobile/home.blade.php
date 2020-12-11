@extends('frontend.mobile.layout')

@section('styles')

<style>
    body{
        font-family: "Open Sans", sans-serif;
    }
    a{
        text-decoration: none;
    }
    .bg-top{
        background: url('front-assets/img/home_page_bg.png');
        background-size: cover;
        height: 49%;
        position: absolute;
        top: 0;
        width: 100%;
        z-index: -2;
    }

    main{
        justify-content: flex-start;
    }


    input,
    input:active,
    input:focus,
    input:hover{
        outline: none;
    }


     /* ===== HEAD SECTION WITH SEARCH INPUTS ==== */
    .head{
        width: 80%;
        display: flex;
        height: 50%;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        color: #efefef;
    }

    /* Head text */
    .head-text{
        width: 100%;
    }
     /* form group */
    form{
        width: 100%;
    }

    .form-group, .form-row{
        width: 100%;
    }
    .form-control{
        width: 90%;
    }

    /* dish search input field */
    .search-dish-input{
        display: flex;
        margin: 30px 0 5px 0;
        background: #Ff2000;
        padding: 2px 15px;
        border-radius: 13px;
        color: #efefef;
        box-shadow: 0 5px 20px 0 #00000029;
    }
    .search-dish-input input{
        border: none;
        background: #Ff2000;
        color: #efefef;
        border-radius: 13px;
        height: 100%;
        padding: 10px 0px;
        text-align: start;
    }
    .search-dish-input input::placeholder{
        color: #ffa4a4;
        padding: 0 10px;

    }

    /* location search input field  */
    .search-loc-input{
        display: flex;
        margin: 10px 0 5px 0;
        background: #efefef;
        padding: 2px 15px;
        border-radius: 13px;
        color: #FF2000;
        box-shadow: 0 5px 20px 0 #00000029;
    }

    .search-loc-input input{
        border: none;
        background: #efefef;
        color: #555;
        border-radius: 13px;
        height: 100%;
        padding: 10px 0px;
        text-align: start;
    }

    .icon_search{
        justify-content: center;
        align-items: center;
        display: flex;
        color: #efefef;
        padding: 5px;
    }

    /* ====== END OF HEAD SECTION WITH SEARCH INPUTS ====== */

  /* ====  START OF SHOPS SECTION ==== */
    .shops-section{
        width: 100%;
        display: flex;
        flex-direction: column;
        justify-content: space-around;
        align-items:center;

    }
    .clickable-wrapper{
        width: 75%;
        margin-bottom: 28px;
    }
    .shops-section-div{
        display: grid;
        grid-template-areas:
            "img img img img about about about"
            "img img img img det det det";
        width: 100%;
        margin: auto;
        background: #ffffff;
        grid-gap: 8px;
        padding: 10px 15px;
        border-radius: 12px;
        box-shadow: 0 5px 20px 0 #e6e6e6;
    }

    .img{
        grid-area: img;
        position: relative;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .img img{
        width: 100%;
        border-radius: 12px;
    }
    .about-shop{
        grid-area: about;
        position: relative;
        font-weight: 600;
        color: #888;
    }
    .about-shop h3{
        font-weight: 900;
        color: #545454;
    }

    .about-shop::after{
        content: '';
        position: absolute;
        width: 70%;
        bottom: 0;
        /* border-bottom: 1.5px solid #c5c5c5; */
        left: 0;
        background: #c5c5c54f;
        height: 2px;
    }
    .details{
        grid-area: det;
        display: flex;
        justify-content: center;
        align-items: center;

    }
    .details .star, .details .duration, .details .open{
        margin:0 5px;
        font-size: 0.6rem;
    }

    .details .open{
        background: green;
        color: #fff;
        padding: 5px 7px;
        border-radius: 5px;

    }

  /* === END OF SHOPS SECTION === */

</style>


@endsection

@section('content')

  <main>
      <section class="head">

     {{-- HEAD SECTION OF THE MOBILE SCREEN --}}

     <div class="head-text">
         <span>Welcome</span>
         <h1>Enjoy Tasty meals <br/>Everyday!</h1>
     </div>

        <form action="{{url('/search')}}" method="GET" class="col-lg-6 px-1">
            @csrf

            <div class="form-group">
                {{-- SEARCH DISH INPUT  --}}
                <div class="search-dish-input">
                        <input class="form-control" type="text" placeholder="Search Dish..." autocomplete="off" v-model="search_food">
                        <span class="icon_search">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" focusable="false" width="1em" height="1em" style="-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24"><g fill="#efefef"><path fill-rule="evenodd" clip-rule="evenodd" d="M18.319 14.433A8.001 8.001 0 0 0 6.343 3.868a8 8 0 0 0 10.564 11.976l.043.045l4.242 4.243a1 1 0 1 0 1.415-1.415l-4.243-4.242a1.116 1.116 0 0 0-.045-.042zm-2.076-9.15a6 6 0 1 1-8.485 8.485a6 6 0 0 1 8.485-8.485z" fill="#efefef"/></g><rect x="0" y="0" width="24" height="24" fill="rgba(0, 0, 0, 0)" /></svg>
                        </span>
                </div>
                <div class="form-row search-loc-input">

                    {{-- search location --}}
                    <input class="form-control no_border_r col-lg-8" type="text" name="autocomplete" value="" placeholder="Area or Place..." id="autocomp">
                    <input type="text" name="search_place" id="search_place" hidden>
                    <input type="text" name="search_lat" id="search_lat" hidden>
                    <input type="text" name="search_lng" id="search_lng" hidden>

                    <span class="icon_search">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" focusable="false" width="1em" height="1em" style="-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24"><g fill="none"><path fill-rule="evenodd" clip-rule="evenodd" d="M18.319 14.433A8.001 8.001 0 0 0 6.343 3.868a8 8 0 0 0 10.564 11.976l.043.045l4.242 4.243a1 1 0 1 0 1.415-1.415l-4.243-4.242a1.116 1.116 0 0 0-.045-.042zm-2.076-9.15a6 6 0 1 1-8.485 8.485a6 6 0 0 1 8.485-8.485z" fill="#626262"/></g><rect x="0" y="0" width="24" height="24" fill="rgba(0, 0, 0, 0)" /></svg>
                    </span>
                    <input class="form-control no_border_r col-lg-4" type="submit" value="Search">
            </div>
            </div>

        </form>


    </section>

    <Section class="shops-section">
        @foreach($shops as $shop)
        <span class="clickable-wrapper">
        <a href="/shops/{{$shop->shop_id}}" class="strip_info">
        <div class="shops-section-div">

            <div class="img">
                <img src="{{$shop->shop_logo?$shop->shop_logo:asset('front-assets/img/easychop-placeholder.jpg')}}" data-src="{{$shop->shop_logo?$shop->shop_logo:asset('front-assets/img/easychop-placeholder.jpg')}}" class="owl-lazy" alt="">
            </div>
            <div class="about-shop">
                <h3>{{$shop->shop_name}}</h3>
                <small>{{$shop->shop_address}}</small>
            </div>
            <div class="details">
                <span class="star">5
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" focusable="false" width="1em" height="1em" style="-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);" preserveAspectRatio="xMidYMid meet" viewBox="0 0 36 36"><path fill="#FFAC33" d="M27.287 34.627c-.404 0-.806-.124-1.152-.371L18 28.422l-8.135 5.834a1.97 1.97 0 0 1-2.312-.008a1.971 1.971 0 0 1-.721-2.194l3.034-9.792l-8.062-5.681a1.98 1.98 0 0 1-.708-2.203a1.978 1.978 0 0 1 1.866-1.363L12.947 13l3.179-9.549a1.976 1.976 0 0 1 3.749 0L23 13l10.036.015a1.975 1.975 0 0 1 1.159 3.566l-8.062 5.681l3.034 9.792a1.97 1.97 0 0 1-.72 2.194a1.957 1.957 0 0 1-1.16.379z"/><rect x="0" y="0" width="36" height="36" fill="rgba(0, 0, 0, 0)" /></svg>
                    </span>
                </span>
                <span class="duration">30 mins</span>
                <span class="open">Now Open</span>
            </div>
        </div>
        </a>
    </span>
          @endforeach
    </Section>

 {{-- @foreach($shops as $shop)
			    <div class="item">
			        <div class="strip">
			            <figure>
			                {{-- <span class="ribbon off">-30%</span> --}}
			                {{-- <img src="{{$shop->shop_logo?$shop->shop_logo:asset('front-assets/img/easychop-placeholder.jpg')}}" data-src="{{$shop->shop_logo?$shop->shop_logo:asset('front-assets/img/easychop-placeholder.jpg')}}" class="owl-lazy" alt=""> --}}
                            {{-- <a href="/shops/{{$shop->shop_id}}" class="strip_info">
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
                @endforeach --}}
















    <div class="bg-top"></div>
    </main>

@endsection
