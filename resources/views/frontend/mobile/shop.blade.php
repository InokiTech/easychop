@extends('frontend.mobile.layout')

@section('styles')
<style>

    body,html{
        padding: 0;
        margin: 0;
    }

    main{
        font-family: "open sans", sans-serif;
        justify-content: flex-start;
        /* padding-bottom: 20px; */
    }

    .head{
        width: 100%;
        height: 100%;
        background-image: url('/front-assets/img/restr.jpg');
        background-size: cover;
        position: relative;
        padding: 20px;
        border-radius: 0 0 35px 35px;
        z-index: -1;

    }
    .back-btn{
        left: 4%;
        position: absolute;
        top: 6%;
    }

    .back-btn svg{
        color: #ffffff;
        fill: #ffffff!important;
        font-size: 1.5rem;
    }


    .head-section-div{
        position: absolute;
        padding: 20px;
        bottom: 50px;
    }

    .head-section-div h1{
        color: #efefef;
        text-shadow: 0 0 5px #555;
    }

    .head-section-div .text{
        color: #ccc;
        text-shadow: 0 0 3px #333;
    }

    .head-section-div a{
        text-decoration: none;
        color: #888;
        font-size: 0.8rem;
    }

    .gradient{
        background: linear-gradient(#ff000000, #9012009e);
        position: absolute;
        top: 0;
        width: 100%;
        height: 100%;
        z-index: -1;
        border-radius: 0 0 35px 35px;
    }

/* --------------- search form ---------------------  */

    .search-form-section{
        width: 100%;
        padding: 20px;
        display: flex;
        justify-content: center;

    }
    form{
        width: 100%;
        display: flex;
        justify-content: center;
    }

    div.search-input{
        width: 80%;
        background:#f8f4f5;
        border: 1px solid #ddd;
        border-radius: 10px;
        height: 34px;
        display: flex;
        padding: 2px;
    }

    div.search-input input{
        height: 100%;
        width: 100%;
        background: #f8f4f5;
        border: none;
        border-radius: 12px;
        outline: none;
        padding-left: 10px;
    }

    .search-input input:focus,
    .search-input input:hover,
    .search-input input:active{
        outline: none;
    }

    .icon-span{
        padding: 5px 14px 5px 5px;
        display: flex;
        justify-content: center;
        align-items: center;
    }
/* ================== PRODUCT LIST STYLES ============== */

.product-list{
    width: 100%;
    /* height: 100%; */
    overflow-y: scroll;
    display: flex;
    flex-direction: column;
    justify-content: center;
    background: #fff;
    border-radius: 34px;
    padding: 20px 0;
    box-shadow: inset 0 0 11px -5px #888;

}

.product{
    /* background: #fff; */
    /* box-shadow: 0 4px 15px -5px rgb(173 173 173); */
    border-radius: 12px;
    padding: 10px 25px;
    display: flex;
    position: relative;
    width: 100%;
    margin: 0 0 20px 0;
}

.product .img{
    height: 100%;
    flex-grow: 1;

}

.product .img img{
    height: 100%;
    width: 70px;
    border-radius: 12px;
}
.product .details{
    justify-content: space-evenly;
    flex-direction: column;
    display: flex;
    flex-grow: 2;
}

.product .details h3{
    color: #333;
}

.product .details .price-text{
    color: #545454;
}

.product .add-to-cart{
    flex-grow: 3;
    display: flex;
    justify-content: center;
    align-items: center;

}
.product .add-to-cart .btn-cart{
    color: #fff;
    outline: none;
    border-radius: 5px;
    background: #ff2000;
    border: none;
    font-size: 1.13rem;
    padding: 8px 15px;
}

.product .add-to-cart .score{
    padding: 5px;
}
</style>
@endsection

@section('content')
<main>
<div style="width: 100%; height: 40%; position:relative;">

    <section class="head">
    </section>

    {{-- shop name text --}}
        <div class="head-section-div">
            <h1>{{$shop->shop_name}}</h1>
          <span class="text">  {{Str::upper($shop->shop_city)}} - {{$shop->shop_address}}. - <a href="#">Get directions</a></span>
        </div>

        {{-- gradient  --}}
     <div class="gradient"></div>

     {{-- Back button  --}}
     <span class="back-btn" onclick="window.history.back();">
        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" focusable="false" width="1em" height="1em" style="-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);" preserveAspectRatio="xMidYMid meet" viewBox="0 0 512 512"><path fill="none" stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round" stroke-width="48" d="M328 112L184 256l144 144"/><rect x="0" y="0" width="512" height="512" fill="rgba(0, 0, 0, 0)" /></svg>
    </span>
</div>


{{-- ============================== search form =========================== --}}

    <section class="search-form-section">
        <form action="" method="post">
            <div class="search-input">
                  <input type="search" name="search" id="" placeholder="Search Dish...">
                    <span class="icon-span">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" focusable="false" width="1em" height="1em" style="-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24"><g fill="none"><path fill-rule="evenodd" clip-rule="evenodd" d="M18.319 14.433A8.001 8.001 0 0 0 6.343 3.868a8 8 0 0 0 10.564 11.976l.043.045l4.242 4.243a1 1 0 1 0 1.415-1.415l-4.243-4.242a1.116 1.116 0 0 0-.045-.042zm-2.076-9.15a6 6 0 1 1-8.485 8.485a6 6 0 0 1 8.485-8.485z" fill="#626262"/></g><rect x="0" y="0" width="24" height="24" fill="rgba(0, 0, 0, 0)" /></svg>
                    </span>
            </div>
        </form>

    </section >

    {{-- ================= PRODUCT LIST ======================== --}}

    <section class="product-list">

         @foreach($shop->products as $product)

            <div class="product">

                {{-- IMAGE --}}
                <div class="img">
                    <img src="{{$product->product_image? $product->product_image:asset('front-assets/img/lazy-placeholder.png')}}"  class="img-fluid lazy" alt="">
                </div>

                {{-- DETAILS --}}
                <div class="details">
                    <h3>{{$product->product_name}}</h3>
                    <span class="price-text"><em>{{money($product->product_price)}}</em></span></li>
                </div>

                {{-- BUTTONS --}}
                <div class="add-to-cart">
                    <button class="btn-cart" style="outline:none" id="plus" value="{{$product->product_id}}" >+</button>
                    <div class="score"><strong></strong></div>
                    <button class="btn-cart" style="outline:none" id="minus" value="{{$product->product_id}}" >-</button>
                </div>
            </div>

            @endforeach
    </section>
</main>




@endsection
