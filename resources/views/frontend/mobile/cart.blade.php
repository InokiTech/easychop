@extends('frontend.mobile.layout')

@section('styles')
    <style>

        main{
            justify-content: flex-start;
        }

        .cart-wrapper{
            background: blue;
            height: 100%;
            width: 100%;
            display: flex;
            padding: 10%;
            /* justify-content: center; */
            align-items: center;
            flex-direction: column;
        }

        .cart-item{
            background: white;
            display: flex;
            width: 100%;
            justify-content: space-between;
        }

        .img{
            flex-grow: 1;
        }

        .cart-item .description{
            flex-grow: 3;
            display: flex;
            flex-direction: column;
        }

    </style>
@endsection

@section('content')
<main>
   <span class="back-btn" onclick="window.history.back();">
    Back
   </span>

   {{-- =============== CART WRAPPER SECTION =============== --}}

   <section class="cart-wrapper">
    <h2>WRAPPER</h2>
    {{-- ========== CART ITEM ============= --}}
    <div class="cart-item">
        <div class="img">
            Image
        </div>
        <div class="description">
            <span class="details">
                description
            </span>
            <span class="plus-minus">
               <button> - </button>
                <button> + </button>
            </span>

        </div>
    </div>


   </section>


{{-- ======= checkout button section =========== --}}
   <Section class="checkout-section">
    <div class="checkout-div">
        <div class="total-price">
            <span>Total</span>
            <span>NGN 2000</span>
        </div>
        <button>  Checkout >      </button>
    </div>

   </Section>

</main>
 @endsection
