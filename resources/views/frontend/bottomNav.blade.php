@auth
<style>
    nav{
        font-family: "Open Sans", sans-serif;
    }
       .nav-bottom {
        position: fixed;
        z-index: 10;
        /* left: 25px; */
        bottom: 25px;
        height: 50px;
        justify-content: center;
        display: flex;
        border-radius: 30px;
        width: 100%;
    }

    .bottom_fixed_nav {
        width: 70%;
        background: #ffffff;
        display: flex;
        border-radius: 30px;
        justify-content: space-around;
        align-items: center;
        box-shadow: 0px 0px 15px 0px #ff200014,
            0px 0px 15px 0px rgba(0, 0, 0, 0.05);
    }
    .bottom_fixed_nav a{
        text-decoration: none;
        color: #ff2000;
        font-weight: 700;

    }

    .bottom_fixed_nav_link .svg {
        font-size: 1.2rem;
    }

    .msgSuccess {
    position: fixed;
    top: 50px;
    /* border: 2px solid rgb(0, 58, 0); */
    text-align: center;
    border-radius: 6px;
    z-index: 999999999;

    color: rgb(0, 58, 0);
    font-weight: 500;
    padding: 10px 20px;

    font-size: 1.2rem;
    background: rgb(129 255 129 / 80%);
}

.msgFail {
    position: fixed;
    top: 50px;
    /* border: 2px solid rgb(0, 58, 0); */
    text-align: center;
    border-radius: 6px;
    z-index: 999999999;

    color: rgb(58, 0, 0);
    font-weight: 500;
    padding: 10px 20px;
    font-size: 1.2rem;
    background: rgb(255 129 129 / 80%);
}


</style>

@if (Request::is('cart')||Request::is('checkout'))



@else



<nav class="nav-bottom">
<div class="bottom_fixed_nav">


<a href="{{url('/')}}" class="bottom_fixed_nav_link home-bottom-nav">

    <svg class="svg" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" focusable="false" width="1em" height="1em" style="-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);" preserveAspectRatio="xMidYMid meet" viewBox="0 0 512 512"><path fill="#626262" d="M469.666 216.45L271.078 33.749a34 34 0 0 0-47.062.98L41.373 217.373L32 226.745V496h176V328h96v168h176V225.958zM248.038 56.771c.282 0 .108.061-.013.18c-.125-.119-.269-.18.013-.18zM448 464H336V328a32 32 0 0 0-32-32h-96a32 32 0 0 0-32 32v136H64V240L248.038 57.356c.013-.012.014-.023.024-.035L448 240z"/><rect x="0" y="0" width="512" height="512" fill="rgba(0, 0, 0, 0)" /></svg>

</a>

 <a href="{{url('/cart')}}" class="bottom_fixed_nav_link cart-bottom-nav">

    <svg class="svg" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" focusable="false" width="1em" height="1em" style="-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);" preserveAspectRatio="xMidYMid meet" viewBox="0 0 36 36"><circle cx="13.33" cy="29.75" r="2.25" class="clr-i-outline clr-i-outline-path-1" fill="#626262"/><circle cx="27" cy="29.75" r="2.25" class="clr-i-outline clr-i-outline-path-2" fill="#626262"/><path d="M33.08 5.37a1 1 0 0 0-.77-.37H11.49l.65 2H31l-2.67 12h-15L8.76 4.53a1 1 0 0 0-.66-.65L4 2.62a1 1 0 1 0-.59 1.92L7 5.64l4.59 14.5l-1.64 1.34l-.13.13A2.66 2.66 0 0 0 9.74 25A2.75 2.75 0 0 0 12 26h16.69a1 1 0 0 0 0-2H11.84a.67.67 0 0 1-.56-1l2.41-2h15.44a1 1 0 0 0 1-.78l3.17-14a1 1 0 0 0-.22-.85z" class="clr-i-outline clr-i-outline-path-3" fill="#626262"/><rect x="0" y="0" width="36" height="36" fill="rgba(0, 0, 0, 0)" /></svg>
    <span class="cart-count">
        <sup id="cart-count">
           {{Cart::session(auth()->id())->getContent()->count()}}
        </sup>

    </span>

</a>


 <a href="{{url('/customer/profile')}}" class="bottom_fixed_nav_link user-bottom-nav">


    <svg class="svg" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" focusable="false" width="1em" height="1em" style="-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);" preserveAspectRatio="xMidYMid meet" viewBox="0 0 32 32"><path d="M16 4a5 5 0 1 1-5 5a5 5 0 0 1 5-5m0-2a7 7 0 1 0 7 7a7 7 0 0 0-7-7z" fill="#626262"/><path d="M26 30h-2v-5a5 5 0 0 0-5-5h-6a5 5 0 0 0-5 5v5H6v-5a7 7 0 0 1 7-7h6a7 7 0 0 1 7 7z" fill="#626262"/><rect x="0" y="0" width="32" height="32" fill="rgba(0, 0, 0, 0)" /></svg>

</a>
</div>
</nav>

<script>
    // document.addEventListener("DOMContentLoaded",()=>{




    //              async function getCartCount(){
    //                     let count = await fetch(`/cart/count`);
    //                     let data = await count.json();
    //                     return data
    //              }

    //              function displayCartCount(){
    //                  let data = getCartCount();
    //                 let cartCount = document.querySelector("#cart-count");
    //                 cartCount.innerHTML = data;
    //              }


	// 			})



</script>

@endif
@endauth

@guest


@if (Request::is('login') || Request::is('register') )

<a href="{{url('/')}}" class="float-home-link">
    <span class="floating-home-span">

  <svg class="svg" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" focusable="false" width="1em" height="1em" style="-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg); font-size: 1.5rem; z-index: 9999"  preserveAspectRatio="xMidYMid meet" viewBox="0 0 512 512"><path fill="#Ff2000" d="M469.666 216.45L271.078 33.749a34 34 0 0 0-47.062.98L41.373 217.373L32 226.745V496h176V328h96v168h176V225.958zM248.038 56.771c.282 0 .108.061-.013.18c-.125-.119-.269-.18.013-.18zM448 464H336V328a32 32 0 0 0-32-32h-96a32 32 0 0 0-32 32v136H64V240L248.038 57.356c.013-.012.014-.023.024-.035L448 240z"/><rect x="0" y="0" width="512" height="512" fill="rgba(0, 0, 0, 0)" /></svg>


</span>
</a>
@else

<nav class="bottom-auth-nav">

<!-- <button class="close-x" onClick="close()
function close(){
        let nav = document.querySelector('.bottom-auth-nav');
        nav.style.display='none';
    }

">X</button> -->

    <div class="bottom-auth-heading">
    <h1>Welcome to EasyChop</h1>
        <small> The best restuarants in Nigeria at the best price</small>
    </div>

    <div class="auth-div">

        <a href="{{url('/login')}}" class="login-btn">Sign in</a>
        <a href="{{url('/register')}}" class="register-btn" >Register</a>


    </div>

</nav>
@endif


@endguest


