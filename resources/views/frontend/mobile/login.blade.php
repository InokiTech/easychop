@extends('frontend.mobile.layout')

@section('styles')
<style>

/* ------------ LOGIN SCREEN STYLES ------------ */

html, body{
    height: 100%;
    padding: 0;
    margin:0;
}

.bg-img{
    position: absolute;
    background: url('/front-assets/img/bg_pot.jpg');
    background-size: cover;
    bottom: 0;
    opacity: 10%;
    height: 45%;
    width: 100%;

}

main {
     font-family: "Open Sans", sans-serif; 
    display: flex;
    height: 100%;
    width: 100%;
    justify-content: center;
    align-items: center;
    color: #888;
}

.back-btn{
    position: absolute;
    top: 6%;
    left: 6%;
    font-size: 1.2rem;
}

a{
    text-decoration: none;
     color: #888;
}

.form-section{
    width: 85%;
}

.login-input-wrapper{
    display:flex;
    flex-direction: column;
}

h2{
    margin-bottom: 25px;
    color: #5d5959;
}

/* INPUT TAGS AND DIVS */

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

/* ============== check box ================== */
.checkboxes{
    display: flex;
    width: 100%;
    padding: 0 15px;
    justify-content: space-between;
}
/* ============== login button =================== */

.login-btn{
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column;
    margin-bottom: 20px;
}

.login-btn input{
    width: 60%;
    margin: 20px 0;
    padding: 13px 0;
    background: #Ff2000;
    font-weight: 600;
    color: #fff;
    border: none;
    letter-spacing: 1px;
    border-radius: 10px;
}

.dont-have-an-account a{
    font-weight: 900;
    color: #de1d01;
}

/* ======= horrizontal rule ======= */

hr{
    margin: auto;
    width: 50%;
}

/* ==================== sign in with facebook and google ============== */
.signin-with{
    margin-top: 20px;
    display: flex;
    justify-content: center;
    align-items: center;
}

.signin-with svg{
    width: 35px;
    margin: 0 5px;
}

/* ---------------- END OF LOGIN SCREEN STYLES ----------------- */



</style>
@endsection

@section('content')

<main > 

<span class="back-btn">
    <a href="{{url('/')}}">
        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" focusable="false" width="1em" height="1em" style="-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24"><path d="M16.62 2.99a1.25 1.25 0 0 0-1.77 0L6.54 11.3a.996.996 0 0 0 0 1.41l8.31 8.31c.49.49 1.28.49 1.77 0s.49-1.28 0-1.77L9.38 12l7.25-7.25c.48-.48.48-1.28-.01-1.76z" fill="#626262"/><rect x="0" y="0" width="24" height="24" fill="rgba(0, 0, 0, 0)" /></svg>
    </a>
</span>

<section class="form-section">

      <!-- form starts  -->

    <form method="POST" action="{{ url('/login') }}">
        @csrf

        <div class="login-input-wrapper">

            <h2>Login</h2>
            <div class="email-input-div wrapper">
              <label for="email">Email</label>
              <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{old('email')}}"  >
                <span class="icon">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" focusable="false" width="1em" height="1em" style="-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);" preserveAspectRatio="xMidYMid meet" viewBox="0 0 20 20"><path d="M1.574 5.286l7.5 4.029c.252.135.578.199.906.199c.328 0 .654-.064.906-.199l7.5-4.029c.489-.263.951-1.286.054-1.286H1.521c-.897 0-.435 1.023.053 1.286zm17.039 2.203l-7.727 4.027c-.34.178-.578.199-.906.199s-.566-.021-.906-.199s-7.133-3.739-7.688-4.028C.996 7.284 1 7.523 1 7.707V15c0 .42.566 1 1 1h16c.434 0 1-.58 1-1V7.708c0-.184.004-.423-.387-.219z" fill="#626262"/><rect x="0" y="0" width="20" height="20" fill="rgba(0, 0, 0, 0)" /></svg>
                </span>
            </div>

            <div class="pwd-input-div wrapper">
             <label for="password">Password</label>
             <input type="password" class="form-control @error('password') is-invalid @enderror"  id="password_sign" name="password">
                <span class="icon">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" focusable="false" width="1em" height="1em" style="-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24"><path d="M12 2C9.243 2 7 4.243 7 7v3H6a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-8a2 2 0 0 0-2-2h-1V7c0-2.757-2.243-5-5-5zM9 7c0-1.654 1.346-3 3-3s3 1.346 3 3v3H9V7zm4 10.723V20h-2v-2.277a1.993 1.993 0 0 1 .567-3.677A2.001 2.001 0 0 1 14 16a1.99 1.99 0 0 1-1 1.723z" fill="#626262"/><rect x="0" y="0" width="24" height="24" fill="rgba(0, 0, 0, 0)" /></svg>
                </span>
            </div>
        

            <div class="checkboxes float-left">
                <div>
                    <input type="checkbox" name="check">
                    <label class="container_check" for="check">Remember me </label>
                </div>
                
                <a id="forgot" href="/password/reset">Forgot Password?</a>
               
            </div>


            <div class="login-btn text-center">
                <input type="submit" value="Login" class="btn_1 full-width mb_5">
                <span class="dont-have-an-account">
                     Don’t have an account? <a href="{{url('/register')}}">Sign up</a>
                </span>
               
            </div>
            <hr/>
            <div class="signin-with">
                <!-- <p>Sign in </p> -->
                <a href="{{url('/login/facebook')}}" class="social_bt facebook">
                    <svg xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 48 48" width="35px" height="35px"><linearGradient id="Ld6sqrtcxMyckEl6xeDdMa" x1="9.993" x2="40.615" y1="9.993" y2="40.615" gradientUnits="userSpaceOnUse"><stop offset="0" stop-color="#2aa4f4"/><stop offset="1" stop-color="#007ad9"/></linearGradient><path fill="url(#Ld6sqrtcxMyckEl6xeDdMa)" d="M24,4C12.954,4,4,12.954,4,24s8.954,20,20,20s20-8.954,20-20S35.046,4,24,4z"/><path fill="#fff" d="M26.707,29.301h5.176l0.813-5.258h-5.989v-2.874c0-2.184,0.714-4.121,2.757-4.121h3.283V12.46 c-0.577-0.078-1.797-0.248-4.102-0.248c-4.814,0-7.636,2.542-7.636,8.334v3.498H16.06v5.258h4.948v14.452 C21.988,43.9,22.981,44,24,44c0.921,0,1.82-0.084,2.707-0.204V29.301z"/></svg>
                </a>
                <a href="{{url('/login/google')}}" class="social_bt google">
                    <svg xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 48 48" width="35px" height="35px"><path fill="#fbc02d" d="M43.611,20.083H42V20H24v8h11.303c-1.649,4.657-6.08,8-11.303,8c-6.627,0-12-5.373-12-12	s5.373-12,12-12c3.059,0,5.842,1.154,7.961,3.039l5.657-5.657C34.046,6.053,29.268,4,24,4C12.955,4,4,12.955,4,24s8.955,20,20,20	s20-8.955,20-20C44,22.659,43.862,21.35,43.611,20.083z"/><path fill="#e53935" d="M6.306,14.691l6.571,4.819C14.655,15.108,18.961,12,24,12c3.059,0,5.842,1.154,7.961,3.039	l5.657-5.657C34.046,6.053,29.268,4,24,4C16.318,4,9.656,8.337,6.306,14.691z"/><path fill="#4caf50" d="M24,44c5.166,0,9.86-1.977,13.409-5.192l-6.19-5.238C29.211,35.091,26.715,36,24,36	c-5.202,0-9.619-3.317-11.283-7.946l-6.522,5.025C9.505,39.556,16.227,44,24,44z"/><path fill="#1565c0" d="M43.611,20.083L43.595,20L42,20H24v8h11.303c-0.792,2.237-2.231,4.166-4.087,5.571	c0.001-0.001,0.002-0.001,0.003-0.002l6.19,5.238C36.971,39.205,44,34,44,24C44,22.659,43.862,21.35,43.611,20.083z"/></svg>
                </a>
            </div>
            
        
        </div>
      


    </form>

</section>

<div class="bg-img"><div class="gradient"></div></div>

</main>


@endsection

@section('scripts')
<script>



</script>

@endsection