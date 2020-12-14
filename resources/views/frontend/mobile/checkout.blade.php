@extends('frontend.mobile.layout')

@section('styles')
    <style>

        main{
            margin-top: 10%;
            justify-content: flex-start;
        }


        div.wrapper{
            height: 46px;
            background: #f8f4f5;
            position: relative;
            text-align: center;
            border-bottom: 1px solid #888;
            margin-bottom: 20px;
            display: flex;
            overflow: hidden;
        }

        div.wrapper:hover{
            border-bottom: 2px solid #Ff2000;

        }

        div.wrapper label{
            position: absolute;
            top: 0;
            transition: all 1s ease;
        }

        div.wrapper input{
            width: 100%;
            margin: 0;
            border: none;
            outline: none;
            background: #f8f4f5;
        }

        div.wrapper .icon{
            font-size: 23px;
        }

        div.wrapper:hover label, div.wrapper:active label, div.wrapper:focus label{
            transform: translateY(-20px);
        }

        .delivery-details-form{
            display: flex;
            flex-direction: column;
            width: 80%;
        }


        .delivery-details-section{
            width: 100%;
            justify-content: center;
            display: flex;
            margin-top: 30px;
            flex-direction: column;
            align-items: center;
        }

        .delivery-details-section h1{
            align-self: flex-start;
            margin-left: 10%;
            margin-bottom: 25px;
            font-size: 1.4rem;

        }
        .order-summary-section{
            width: 100%;
            justify-content: center;
            display: flex;
        }


        .det{
            justify-content: space-between;
            display: flex;
            font-weight: 700;
            font-size: 0.9rem;
            color: #545454;
        }
        .order-wrapper{
            background: #fff;
            padding: 20px;
            border-radius: 12px;
            width: 70%;
            position: relative;
        }
        .total{
            margin: 10px 0;
            width: 100%;
            left: 0;
            box-shadow: 0px 6px 7px 0px #ff00004d;
            position: absolute;
            display: flex;
            justify-content: space-between;
            border-radius: 4px;
            background: #ff2000;
            padding: 8px 10px;
            color: #fff;
            font-weight: 800;
        }
        .back-btn{
            display: flex;
            position: absolute;
            top: 3%;
            left: 5%;

        }

        /* ===== PAY BTN ==== */

        .pay-btn-section{
            position: fixed;
            bottom: 0;
            background: #fff;
            padding: 10px;
            width: 100%;
            height: 13%;
            box-shadow: 0 -4px 20px -9px #555;
        }


        .pay-btn-div{
            display: flex;
        }


        .pay-btn-div a{
            background: #318601;
            font-weight: 700;
            color: #fff;
            box-shadow: 0 0 6px -1px #085408, 0 0 10px 5px #c5f1c5;
            font-size: 1.4rem;
            text-decoration: none;
            text-align: center;
            border-radius: 5px;
            padding: 10px 30px;
            width: 100%;
        }

    </style>
@endsection

@section('content')
<span class="back-btn" onclick="window.history.back();">
    <span style="font-size: 1.4rem">
        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" focusable="false" width="1em" height="1em" style="-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24"><path fill="#626262" d="M19 11H7.14l3.63-4.36a1 1 0 1 0-1.54-1.28l-5 6a1.19 1.19 0 0 0-.09.15c0 .05 0 .08-.07.13A1 1 0 0 0 4 12a1 1 0 0 0 .07.36c0 .05 0 .08.07.13a1.19 1.19 0 0 0 .09.15l5 6A1 1 0 0 0 10 19a1 1 0 0 0 .64-.23a1 1 0 0 0 .13-1.41L7.14 13H19a1 1 0 0 0 0-2z"/><rect x="0" y="0" width="24" height="24" fill="rgba(0, 0, 0, 0)" /></svg>
    </span>
    <span style="margin: 0 0 5px 0;">
        Back
    </span>
</span>
    <main>

        <section class="delivery-details-section">
            <h1>Delivery details</h1>
            <form action="" class="delivery-details-form">
                @csrf
                <div class="name-input-div wrapper">
                    {{-- <label for="fullname">Fullname</label> --}}
                    <input type="text" class="form-control" @error('fullname') is-invalid @enderror" name="fullname" placeholder="Fullname" value="{{auth()->user()->fullname}}">
                    <span class="icon">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" focusable="false" width="1em" height="1em" style="-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);" preserveAspectRatio="xMidYMid meet" viewBox="0 0 72 72"><rect x="4.7" y="20.147" rx="3.409" ry="3.409" width="62.599" height="38.705" fill="#d0cfce"/><rect x="31.396" y="10.599" rx="1.557" ry="1.557" width="9.003" height="15.673" fill="#9b9b9a"/><path fill="#9b9b9a" d="M17.403 30.65h37.703a5.747 5.747 0 0 1 5.748 5.748v14.304a2.918 2.918 0 0 1-2.919 2.919H12.783a2.918 2.918 0 0 1-2.918-2.919V38.19a7.539 7.539 0 0 1 7.538-7.538z"/><rect x="11.474" y="31.367" rx="2.918" ry="2.918" width="48" height="19.731" fill="#fff"/><g fill="none" stroke="#000" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M40.502 20.647H63.89a3.41 3.41 0 0 1 3.41 3.41v31.886a3.41 3.41 0 0 1-3.41 3.41H8.11a3.41 3.41 0 0 1-3.41-3.41V24.057a3.41 3.41 0 0 1 3.41-3.41h23.286"/><rect x="11.474" y="31.367" rx="2.918" ry="2.918" width="48" height="19.731" stroke-linecap="round" stroke-linejoin="round"/><path stroke-linecap="round" stroke-linejoin="round" d="M52.396 38.141h-4v7h4"/><path stroke-linecap="round" stroke-linejoin="round" d="M48.396 41.641h3"/><path stroke-linecap="round" stroke-linejoin="round" d="M34.396 45.141l-3-7l-3 7"/><path stroke-linecap="round" stroke-linejoin="round" d="M29.396 43.465h4"/><path stroke-linecap="round" stroke-linejoin="round" d="M19.396 45.141v-7l5 7v-7"/><path stroke-linecap="round" stroke-linejoin="round" d="M44.396 45.141v-7l-3 6l-3-6v7"/><rect x="31.499" y="10.237" rx="1.557" ry="1.557" width="9.003" height="15.673" stroke-miterlimit="10"/></g><rect x="0" y="0" width="72" height="72" fill="rgba(0, 0, 0, 0)" /></svg>
                    </span>
                </div>

                <div class="address-input-div wrapper">
                    {{-- <label for="address">Address</label> --}}
                    <input type="text" class="form-control @error('address') is-invalid @enderror" name="address" placeholder="Address" value="{{auth()->user()->address}}">
                    <span class="icon">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" focusable="false" width="1em" height="1em" style="-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);" preserveAspectRatio="xMidYMid meet" viewBox="0 0 20 20"><path d="M19.799 5.165l-2.375-1.83a1.997 1.997 0 0 0-.521-.237A2.035 2.035 0 0 0 16.336 3H9.5l.801 5h6.035c.164 0 .369-.037.566-.098s.387-.145.521-.236l2.375-1.832c.135-.091.202-.212.202-.334s-.067-.243-.201-.335zM8.5 1h-1a.5.5 0 0 0-.5.5V5H3.664c-.166 0-.37.037-.567.099c-.198.06-.387.143-.521.236L.201 7.165C.066 7.256 0 7.378 0 7.5c0 .121.066.242.201.335l2.375 1.832c.134.091.323.175.521.235c.197.061.401.098.567.098H7v8.5a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-17a.5.5 0 0 0-.5-.5z" fill="#626262"/><rect x="0" y="0" width="20" height="20" fill="rgba(0, 0, 0, 0)" /></svg>
                    </span>
                </div>

                <div class="city-input-div wrapper">
                    {{-- <label for="city">City</label> --}}
                    <input type="text" class="form-control @error('city') is-invalid @enderror" name="city" placeholder="City" value="{{auth()->user()->city}}">
                    <span class="icon">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" focusable="false" width="1.07em" height="1em" style="-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);" preserveAspectRatio="xMidYMid meet" viewBox="0 0 17 16"><g fill="#626262" fill-rule="evenodd"><path d="M1 8v8h3V8H1zm2 7H1.979v-2.021H3V15zm.021-3H1.98V9.979h1.041V12z"/><path d="M10 5V3H9V0H8v3H7v2H5v11h7V5h-2zM7 15H6v-2h1v2zm0-2.958H6V10h1v2.042zm0-3H6V7h1v2.042zM9 15H8v-2h1v2zm0-2.958H8V10h1v2.042zm0-3H8V7h1v2.042zM11 15h-1v-2h1v2zm0-2.958h-1V10h1v2.042zm0-3h-1V7h1v2.042z"/><path d="M13 7v9h4v-5l-4-4zm2.031 8.062H14v-1.094h1.031v1.094zm0-2H14v-1.094h1.031v1.094zm0-2H14V9.968h1.031v1.094z"/></g><rect x="0" y="0" width="17" height="16" fill="rgba(0, 0, 0, 0)" /></svg>
                    </span>
                </div>

                <div class="phone-input-div wrapper">
                    {{-- <label for="phone">Phone</label> --}}
                    <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" placeholder="Phone" value="{{auth()->user()->phone}}">
                    <span class="icon">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" focusable="false" width="1em" height="1em" style="-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);" preserveAspectRatio="xMidYMid meet" viewBox="0 0 20 20"><path d="M11.229 11.229c-1.583 1.582-3.417 3.096-4.142 2.371c-1.037-1.037-1.677-1.941-3.965-.102c-2.287 1.838-.53 3.064.475 4.068c1.16 1.16 5.484.062 9.758-4.211c4.273-4.274 5.368-8.598 4.207-9.758c-1.005-1.006-2.225-2.762-4.063-.475c-1.839 2.287-.936 2.927.103 3.965c.722.725-.791 2.559-2.373 4.142z" fill="#626262"/><rect x="0" y="0" width="20" height="20" fill="rgba(0, 0, 0, 0)" /></svg>
                    </span>
                </div>

            </form>

        </section>

        <section class="order-summary-section">
            <div class="order-wrapper">
                <span class="subtotal-det">
                <div class="det">
                    <span>Subtotal:</span>
                    <span>NGN 3000</span>
                </div>
                <div class="det">
                    <span>Delivery Fee:</span>
                     <span>NGN 1000</span>
                </div>
                </span>

            <div class="total">
                <span>Total:</span>
                <span>{{money(Cart::session(auth()->id())->getTotal())}}</span>
            </div>
        </section>

        <section class="pay-btn-section">
            <div class="pay-btn-div">
                <a href="">PAY</a>
            </div>
        </section>
    </main>
@endsection

@section('scripts')

@endsection
