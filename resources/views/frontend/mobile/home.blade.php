@extends('frontend.mobile.layout')

@section('styles')

<style>
    body{
        font-family: "Open Sans", sans-serif;
    }
    a{
        text-decoration: none;
    }






    /* //// hamburger menu  //// */



    .hamburger{
        width: 22px;
        justify-content: space-evenly;
        display: flex;
        flex-direction: column;
        left: 5%;
        align-items: center;
        top: 2%;
        height: 22px;
        position: absolute;
        background: transparent;
        z-index: 99;
    }

    .hamburger .hamspan1,.hamburger .hamspan2,.hamburger .hamspan3{
        height: 2px;
        width: 100%;
        background:#fafafa;
        transition: all 0.6s ease;

    }

    .hamburger .hamspan1, .hamburger .hamspan3{
        background: rgb(173,173,173);
    }

    .hamburger .hamspan2::after{
        content: '';
        position: absolute;
        background:#fafafa;
        transform: rotate(0deg);
        height: 2px;
        width: 100%;
        transition: all 0.6s ease;
    }
    .hamburger .hamspan2::before{
        content: '';
        position: absolute;
        background: #fafafa;
        transform: rotate(0deg);
        height: 2px;
        width: 100%;
        transition: all 0.6s ease;
    }

    .active .hamspan1, .active .hamspan3 {
        opacity: 0;
    }
    .active .hamspan2{
        background: transparent;
    }
    .active .hamspan2::after{
        transform: rotate(-45deg);
        background: #Ff2000;
    }
    .active .hamspan2::before{
        transform: rotate(45deg);
        background: #Ff2000;
    }

    /* ====== END OF HAMBURGER MENU  === */

    /* =========================================== start of menu div ==== */

    .menu-section{
        width: 100%;
        height: 100%;
        position: fixed;
        background: #1313138a;
        z-index: 9;
        opacity: 0;
        transform: translateX(-110%);
        transition: all 0.5s ease;
    }

    .active-menu{
        transform: translateX(0);
        opacity: 1;
    }
    .menu-div{
        width: 70%;
        padding: 50px 15px;
        height: 100%;
        flex-direction: column;
        position: fixed;
        display: flex;
        background: rgb(231, 231, 231);
        overflow-y: scroll;
    }
    .menu-div .menu-links{
        display: flex;
        flex-direction: column;
        /* padding: 20px; */
        padding: 20px 20px 5px 20px;
    }

    .menu-div .menu-links .link{
        margin-bottom: 20px;
        display: flex;
        justify-content: end;
        align-items: center;
        font-weight: 600;
        color: #333;
    }

    .menu-div .menu-links .link .icon{
        margin-right: 10px;
    }

    .menu-div .profile{
        padding: 20px;
        border-bottom: 1px solid #c8c8c8;
    }
    .menu-div .profile h2{
        color: #555;
    }
    .menu-div .profile a{
        color: #5d0c00;
        font-size: 0.9rem;
    }

    .become{
        border-radius: 12px;
        display: flex;
        flex-direction: column;
        margin: 7px 5px;
        background: #Ff2000;
        justify-content: center;
        padding: 10px;
        position: relative;
    }
    .become h3{
       color: #fafafa;
    }
    .become a{
        display: flex;
        flex-direction: column;
        justify-content: center;
    }
    .become-vendor{
        /* margin-top: 30px; */
        margin-top: 10px;
        color: #fafafa;
    }
    .become-rider{
        background: grey;
        color: #fafafa;
    }
    .become h3{
        font-size: 0.8rem;
    }
    .become span{
        font-size: 0.7rem;
        color: #dcdcdc;
    }
    .become-right-icon{
        position: absolute;
        right: 5px;
        font-size: 1.1rem;
    }
    .become-right-icon svg{
        font-size: 1.1rem;
    }
    .become-right-icon path{
        color: #fafafa;
        fill: #fafafa;
    }

    .menu-div > span{
        position: relative;
        display: flex;
        align-items: center;
        justify-content: end;
        color: #ff5d5d;
        font-size: 0.9rem;
        /* margin: 20px; */
        margin: 14px 20px;

    }

    .menu-div > span::after{
        content: '';
        height: 2px;
        right: 0px;
        width: 40%;
        background: #c5c5c5;
        position: absolute;

    }

    .logout-btn{
        justify-content: center;
        display: flex;
        margin: 20px 0;
        font-weight: 700;
        padding: 9px;
        border-radius: 12px;
        width: 50%;
        align-self: center;
        border: 1px solid #ccc;
    }

    .logout-btn a{
        color: #545454;
    }

    /* ========================================= End of menu div ====== */

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
        margin-top: 50px;
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
        position: relative;
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

    .search-suggest{
        box-shadow: 0 10px 15px -10px #555;
        background: #f5f5f5;
        font-size: 0.8rem;
        position: absolute;
        border-radius: 12px;
        padding: 10px;
        width: 100%;
        z-index: 12;
        display: none;
    }
    .search-suggest li{
        border-bottom: 1px solid grey;
        padding: 5px;
        list-style: none;
        font-weight: 700;
        color: #333;
        display: flex;
        justify-content: space-between;
        margin: 10px 5px;
    }

    .search-suggest li small{
        font-weight: 600;
        color: #696969;
    }

    /* ====== END OF HEAD SECTION WITH SEARCH INPUTS ====== */

  /* ====  START OF SHOPS SECTION ==== */
    .shops-section{
        width: 100%;
        height: 100%;
        display: flex;
        flex-direction: column;
        /* justify-content: space-around; */
        justify-content: flex-start;
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
        height: 100%;
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



  /* media query for tablet devices */
@media screen and (min-width:500px){

        .shops-section-div {
            max-height: 150px;
            max-width: 400px;
            display: grid;
            grid-template-areas:
                "img about about about about about about"
                "img det det det det det det";
            width: 100%;
            grid-template-columns: 60px 60px;
            margin: auto;
            background: #ffffff;
            grid-gap: 8px;
            padding: 10px 15px;
            border-radius: 12px;
            box-shadow: 0 5px 20px 0 #e6e6e6;
        }
        .img {
            grid-area: img;
            position: relative;
            display: flex;
            /* max-width: 100%; */
            max-height: 120px;
            justify-content: center;
            align-items: center;
        }
        .img img {
            height: 100%;
            width: 100%;
            border-radius: 12px;
        }

        .about-shop {
            grid-area: about;
            position: relative;
            display: flex;
            padding: 10px;
            justify-content: space-between;
            font-weight: 600;
            color: #888;
        }
        .about-shop::after {
            content: '';
            position: absolute;
            width: 100%;
            bottom: 0;
            /* border-bottom: 1.5px solid #c5c5c5; */
            background: #c5c5c54f;
            height: 2px;
        }

        .details {
            grid-area: det;
            display: flex;
            justify-content: flex-end;
            align-items: center;
        }




}



</style>


@endsection

@section('content')

    {{-- hamburger menu --}}
     <div class="hamburger">
        <div class="hamspan1"></div>
        <div class="hamspan2"></div>
        <div class="hamspan3"></div>
    </div>
    {{-- end of hamburger --}}


    <section class="menu-section">
        <div class="menu-div">

            <div class="profile">
                <h2>{{auth()->user()->fullname}}</h2>
                <a href="{{url('/customer/profile')}}">Edit Profile</a>
            </div>

            <div class="menu-links">
                <a class="link" href="{{url('/')}}">
                   <span class="icon">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" focusable="false" width="1em" height="1em" style="-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);" preserveAspectRatio="xMidYMid meet" viewBox="0 0 36 36"><path class="clr-i-outline clr-i-outline-path-1" d="M33.71 17.29l-15-15a1 1 0 0 0-1.41 0l-15 15a1 1 0 0 0 1.41 1.41L18 4.41l14.29 14.3a1 1 0 0 0 1.41-1.41z" fill="#626262"/><path class="clr-i-outline clr-i-outline-path-2" d="M28 32h-5V22H13v10H8V18l-2 2v12a2 2 0 0 0 2 2h7V24h6v10h7a2 2 0 0 0 2-2V19.76l-2-2z" fill="#626262"/><rect x="0" y="0" width="36" height="36" fill="rgba(0, 0, 0, 0)" /></svg>
                    </span>
                    <span>
                        Home
                    </span>
                </a>

                <a class="link" href="{{url('/contact')}}">
                    <span class="icon">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" focusable="false" width="1em" height="1em" style="-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);" preserveAspectRatio="xMidYMid meet" viewBox="0 0 512 512"><path fill="#626262" d="M448.205 392.507c30.519-27.2 47.8-63.455 47.8-101.078c0-39.984-18.718-77.378-52.707-105.3C410.218 158.963 366.432 144 320 144s-90.218 14.963-123.293 42.131C162.718 214.051 144 251.445 144 291.429s18.718 77.378 52.707 105.3c33.075 27.168 76.861 42.13 123.293 42.13c6.187 0 12.412-.273 18.585-.816l10.546 9.141A199.849 199.849 0 0 0 480 496h16v-34.057l-4.686-4.685a199.17 199.17 0 0 1-43.109-64.751zM370.089 423l-21.161-18.341l-7.056.865A180.275 180.275 0 0 1 320 406.857c-79.4 0-144-51.781-144-115.428S240.6 176 320 176s144 51.781 144 115.429c0 31.71-15.82 61.314-44.546 83.358l-9.215 7.071l4.252 12.035a231.287 231.287 0 0 0 37.882 67.817A167.839 167.839 0 0 1 370.089 423z"/><path fill="#626262" d="M60.185 317.476a220.491 220.491 0 0 0 34.808-63.023l4.22-11.975l-9.207-7.066C62.918 214.626 48 186.728 48 156.857C48 96.833 109.009 48 184 48c55.168 0 102.767 26.43 124.077 64.3c3.957-.192 7.931-.3 11.923-.3q12.027 0 23.834 1.167c-8.235-21.335-22.537-40.811-42.2-56.961C270.072 30.279 228.3 16 184 16S97.928 30.279 66.364 56.206C33.886 82.885 16 118.63 16 156.857c0 35.8 16.352 70.295 45.25 96.243a188.4 188.4 0 0 1-40.563 60.729L16 318.515V352h16a190.643 190.643 0 0 0 85.231-20.125a157.3 157.3 0 0 1-5.071-33.645a158.729 158.729 0 0 1-51.975 19.246z"/><rect x="0" y="0" width="512" height="512" fill="rgba(0, 0, 0, 0)" /></svg>
                    </span>
                    <span>
                        Support
                    </span>
                </a>

                <a class="link" href="{{url('/order')}}">
                    <span class="icon">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" focusable="false" width="1em" height="1em" style="-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24"><path d="M13.26 3C8.17 2.86 4 6.95 4 12H2.21c-.45 0-.67.54-.35.85l2.79 2.8c.2.2.51.2.71 0l2.79-2.8a.5.5 0 0 0-.36-.85H6c0-3.9 3.18-7.05 7.1-7c3.72.05 6.85 3.18 6.9 6.9c.05 3.91-3.1 7.1-7 7.1c-1.61 0-3.1-.55-4.28-1.48a.994.994 0 0 0-1.32.08c-.42.42-.39 1.13.08 1.49A8.858 8.858 0 0 0 13 21c5.05 0 9.14-4.17 9-9.26c-.13-4.69-4.05-8.61-8.74-8.74zm-.51 5c-.41 0-.75.34-.75.75v3.68c0 .35.19.68.49.86l3.12 1.85c.36.21.82.09 1.03-.26c.21-.36.09-.82-.26-1.03l-2.88-1.71v-3.4c0-.4-.34-.74-.75-.74z" fill="#626262"/><rect x="0" y="0" width="24" height="24" fill="rgba(0, 0, 0, 0)" /></svg>
                    </span>
                    <span>
                         History
                    </span>
                </a>

                <a class="link" href="#0">
                    <span class="icon">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" focusable="false" width="1em" height="1em" style="-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);" preserveAspectRatio="xMidYMid meet" viewBox="0 0 64 64"><path d="M59.595 35.879c3.831-7.298-3.956-12.359-14.137-14.841c.766-1.741.988-4.02-1.172-6.196C41.516 12.057 43.357 8 43.357 8s-5.814 5.363-2.143 9.061c1.354 1.363 2.059 2.56 2.396 3.561a64.873 64.873 0 0 0-8.519-1.174c.855-2.324.938-5.243-1.756-8.038C29.647 7.579 32.103 2 32.103 2s-7.753 7.374-2.858 12.458c1.787 1.854 2.728 3.486 3.184 4.854c-3.034-.091-5.954.042-8.548.405c.309-1.495.051-3.214-1.598-4.874C19.513 12.058 21.355 8 21.355 8s-5.815 5.363-2.143 9.061c1.15 1.158 1.824 2.192 2.211 3.093c-.438.096-.863.2-1.272.313C7.509 19.284 1.995 21.896 4.514 27.02C.118 31.416 1.77 36.433 7.271 40.272C10.141 52.093 10.88 62 32.496 62c19.288 0 21.953-7.89 24.342-17.988c7.168-1.427 5.641-4.863 2.757-8.133m-1.787-1.181c-2.401 5.12-12.821 8.974-25.312 8.974c-12.49 0-22.91-3.854-25.312-8.974c-.051-.152-.1-.31-.149-.464c1.144-2.902 4.862-5.42 10.084-7.106c-1.227 1.186-1.482 2.957 1.747 3.578c.924.178 3.461-.438 2.352-3.586c-.155-.44-.408-.735-.719-.913c3.588-.821 7.661-1.294 11.997-1.294c.486 0 .963.017 1.442.028c-2.502.888-4.543 3.624.566 4.431c1.128.178 4.225-.438 2.871-3.586a1.746 1.746 0 0 0-.55-.71c4.787.352 9.124 1.274 12.63 2.603c-3.083-.172-6.503 1.728-1.026 4.403c1.175.574 4.745 1.101 4.254-2.375a1.785 1.785 0 0 0-.26-.706c2.803 1.477 4.758 3.268 5.533 5.233l-.148.464" fill="#626262"/><path d="M25.837 36.841c3.233 0 5.389-2.923 7.078-4.067c2.36-1.6 8.294-2.224 3.068-2.35c-4.957-.119-11.077 3.905-15.167 3.628c-6.772-.46.164 2.789 5.021 2.789" fill="#626262"/><path d="M32.823 42.813c1.142.22 4.281-.542 2.908-4.435c-1.551-4.405-10.94 2.889-2.908 4.435" fill="#626262"/><path d="M15.047 33.178c-1.091-1.54-2.673-3.493-3.328-2.476c-.895 1.391-1.177 4.19-.527 4.314c5.096.977 4.739-.591 3.855-1.838" fill="#626262"/><path d="M44.672 33.802c.919-1.138-.916-3.877-2.094-3.398c-1.844.75-2.907.242-3.717 1.38c-1.897 2.665 4.562 3.563 5.811 2.018" fill="#626262"/><path d="M44.098 37.063c-1.322-.583-1.01 1.37-2.963-.197c-1.398-1.122-4.406 1.708-2.422 3.63c2.208 2.139 2.796.106 3.724.277c1.886.347 5.129-2.18 1.661-3.71" fill="#626262"/><path d="M22.116 37.731c-.689-.678-1.613.14-2.135 1.138c-.517-.254-.938-.313-.938-.313c-.395-1.126-1.57-1.898-1.57-1.898s.107 1.171.262 1.742c-1.298-.461-1.338-2.781-1.338-2.781s-.871.521-.792 1.406c-1.429-1.153-2.646-.614-2.646-.614s1.813 1.02 2.063 1.708c-1.018.079-1.612.431-1.958 1.25c.001.007 2.012-.957 3.5-.261c-.587.48-.295 1.679-.295 1.679c1.385-1.468 2.491-1.311 3.376-1.048c-.107.449-.1.859.09 1.108c1.535 2.018 6.882 1.564 8.318.072c1.739-1.805-3.093-.389-5.937-3.188" fill="#626262"/><path d="M25.893 30.13c-.455.914-.458 1.604.068 2.322c.007.002.212-2.218 1.573-3.138c.111.75 1.289 1.114 1.289 1.114c-.942-3.336 1.808-3.51 1.795-4.707c-1.458.123-2.286 1.183-2.286 1.183c-1.169-.239-2.436.372-2.436.372s1.061.509 1.63.67c-1.062.877-3.074-.28-3.074-.28s0 1.016.8 1.401c-1.723.635-1.885 1.955-1.885 1.955s1.806-1.031 2.526-.892" fill="#626262"/><path d="M51.444 34.686c.414-.786-.19-1.603-.19-1.603s-.929 2.127-2.304 2.054c.362-.468.912-1.508.912-1.508s-1.382.263-2.18 1.15c0 0-1.296-.359-2.54.409c.702.97 3.016-.527 4.243 2.715c0 0 .73-.993.373-1.662c1.642-.071 3.128 1.591 3.133 1.585c-.006-.89-.418-1.442-1.329-1.906c.496-.539 2.562-.784 2.562-.784s-.916-.965-2.68-.45" fill="#626262"/><rect x="0" y="0" width="64" height="64" fill="rgba(0, 0, 0, 0)" /></svg>
                    </span>
                    <span>
                         Free meal
                    </span>
                </a>

                {{-- <a class="link" href="{{url('/contact')}}">
                    <span class="icon">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" focusable="false" width="1em" height="1em" style="-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);" preserveAspectRatio="xMidYMid meet" viewBox="0 0 256 256"><path d="M128 24A104.028 104.028 0 0 0 36.81 178.042l-8.548 29.915a16 16 0 0 0 19.78 19.78l29.916-8.548A104.007 104.007 0 1 0 128 24zm0 192a87.879 87.879 0 0 1-44.909-12.305a7.996 7.996 0 0 0-6.286-.816l-33.157 9.473l9.473-33.156a8 8 0 0 0-.817-6.287A88.011 88.011 0 1 1 128 216zm12-88a12 12 0 1 1-12-12a12 12 0 0 1 12 12zm-48 0a12 12 0 1 1-12-12a12 12 0 0 1 12 12zm96 0a12 12 0 1 1-12-12a12 12 0 0 1 12 12z" fill="#626262"/><rect x="0" y="0" width="256" height="256" fill="rgba(0, 0, 0, 0)" /></svg>
                    </span>
                    <span>
                        Contact us
                    </span>
                </a> --}}
            </div>
            <span></span>

            <div class="become become-vendor">
                <a href="https://vendor.easychop.ng/register">
                <h3>Become a vendor</h3>
                <span>Get more customers everyday</span>
                <span class="become-right-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" focusable="false" width="1em" height="1em" style="-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);" preserveAspectRatio="xMidYMid meet" viewBox="0 0 20 20"><path d="M9.163 4.516c.418.408 4.502 4.695 4.502 4.695a1.095 1.095 0 0 1 0 1.576s-4.084 4.289-4.502 4.695c-.418.408-1.17.436-1.615 0c-.446-.434-.481-1.041 0-1.574L11.295 10L7.548 6.092c-.481-.533-.446-1.141 0-1.576c.445-.436 1.197-.409 1.615 0z" fill="#626262"/><rect x="0" y="0" width="20" height="20" fill="rgba(0, 0, 0, 0)" /></svg>
                </span>
                </a>
            </div>
            <div class="become become-rider">
                <h3>Become a Rider</h3>
                <span>Get more customers everyday</span>
                <span class="become-right-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" focusable="false" width="1em" height="1em" style="-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);" preserveAspectRatio="xMidYMid meet" viewBox="0 0 20 20"><path d="M9.163 4.516c.418.408 4.502 4.695 4.502 4.695a1.095 1.095 0 0 1 0 1.576s-4.084 4.289-4.502 4.695c-.418.408-1.17.436-1.615 0c-.446-.434-.481-1.041 0-1.574L11.295 10L7.548 6.092c-.481-.533-.446-1.141 0-1.576c.445-.436 1.197-.409 1.615 0z" fill="#626262"/><rect x="0" y="0" width="20" height="20" fill="rgba(0, 0, 0, 0)" /></svg>
                </span>
            </div>
            <div class="logout-btn">
            <a href="{{url('/logout')}}">Logout</a>
            </div>
        </div>
    </section>

  <main>
      <section class="head">

     {{-- HEAD SECTION OF THE MOBILE SCREEN --}}

     <div class="head-text">
         <span>Welcome</span>
         <h1>Enjoy Tasty meals <br/>Everyday!</h1>
     </div>

        <form action="{{url('/place-search')}}" method="GET" class="col-lg-6 px-1">
            @csrf

            <div class="form-group">
                {{-- SEARCH DISH INPUT  --}}
                <div class="search-dish-input">
                        <input class="form-control" type="search" placeholder="Search Dish..." autocomplete="off" v-model="search_food" id="dishInput">
                        <span class="icon_search">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" focusable="false" width="1em" height="1em" style="-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24"><g fill="#efefef"><path fill-rule="evenodd" clip-rule="evenodd" d="M18.319 14.433A8.001 8.001 0 0 0 6.343 3.868a8 8 0 0 0 10.564 11.976l.043.045l4.242 4.243a1 1 0 1 0 1.415-1.415l-4.243-4.242a1.116 1.116 0 0 0-.045-.042zm-2.076-9.15a6 6 0 1 1-8.485 8.485a6 6 0 0 1 8.485-8.485z" fill="#efefef"/></g><rect x="0" y="0" width="24" height="24" fill="rgba(0, 0, 0, 0)" /></svg>
                        </span>
                </div>
                <!--<div class="form-row search-loc-input">

                    {{-- search location --}}
                    <input class="form-control no_border_r col-lg-8" type="search" name="autocomplete" value="" placeholder="Area or Place..." id="autocomp">
                    <input type="text" name="search_place" id="search_place" hidden>
                    <input type="text" name="search_lat" id="search_lat" hidden>
                    <input type="text" name="search_lng" id="search_lng" hidden>

                    <span class="icon_search">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" focusable="false" width="1em" height="1em" style="-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24"><g fill="none"><path fill-rule="evenodd" clip-rule="evenodd" d="M18.319 14.433A8.001 8.001 0 0 0 6.343 3.868a8 8 0 0 0 10.564 11.976l.043.045l4.242 4.243a1 1 0 1 0 1.415-1.415l-4.243-4.242a1.116 1.116 0 0 0-.045-.042zm-2.076-9.15a6 6 0 1 1-8.485 8.485a6 6 0 0 1 8.485-8.485z" fill="#626262"/></g><rect x="0" y="0" width="24" height="24" fill="rgba(0, 0, 0, 0)" /></svg>
                    </span>
                    <input class="form-control no_border_r col-lg-4" type="submit" value="Search" style="display: none;">
                </div> -->
            </div>

            {{-- AJAX RESULT SUGGEST DIV  --}}
            <div class="search-suggest">
                <ul class="list-group">
                    <li class="list"></li>
                </ul>

            </div>
            {{-- End result suggest div  --}}

        </form>


    </section>

    <Section class="shops-section">
        @if (count($shops) > 0)




        @foreach($shops as $shop)
        <span class="clickable-wrapper">
        <a href="/shops/{{$shop->shop_id}}" class="strip_info">
        <div class="shops-section-div">

            <div class="img">
                <img src="{{$shop->shop_logo?$shop->shop_logo:asset('front-assets/img/easychop-placeholder.jpg')}}" data-src="{{$shop->shop_logo?$shop->shop_logo:asset('front-assets/img/easychop-placeholder.jpg')}}" class="owl-lazy" alt="">
            </div>
            <div class="about-shop">
                <h3 style="font-size: 0.9rem;">{{$shop->shop_name}}</h3>
                <small style="font-size: 0.7rem;">{{$shop->shop_address}}</small>
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

        @else
         <H1 style="color: #333;font-size: 1.1rem;">Sorry nothing was found.</H1>
          <a href="{{url('/')}}"><span> Return home</span></a>
          <div style="font-style: italic;color: grey;">or</div>
          <span style="font-size: 1.1rem;font-weight: 600;color: #8f8f8f;">Search again</span>
        @endif


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


@section('scripts')
<script>


    let hamburger = document.querySelector('.hamburger');
    let mobileMenu = document.querySelector('.menu-section');

    hamburger.addEventListener('click',()=>{
            hamburger.classList.toggle('active');
            mobileMenu.classList.toggle('active-menu');
    });


             //============= ajax Search =======


    let dishSearchField = document.querySelector('#dishInput');
    let searchResult = document.querySelector('.search-suggest');

        dishSearchField.addEventListener("keyup", event => {
            searchResult.style.display = "block";

            if (!dishSearchField.value) {
                let sug = document.querySelector('.search-suggest');
                sug.style.display="none";
                document.querySelector('.list-result').remove();
            }


            if (event.isComposing || event.keyCode === 229) {
                return;
            }

            async function find() {

                let token = document.querySelector('[name="_token"]');

                let findit = await fetch('/search',{
                    headers: {
                        "Content-Type": "application/json",
                        "Accept": "application/json",
                        "X-Requested-With": "XMLHttpRequest",
                        "X-CSRF-Token": token.value
                    },
                    method: 'POST',
                    credentials: "same-origin",
                    body: JSON.stringify({
                            detail: dishSearchField.value
                        })
                });

                let data = await findit.json();

                return data;

            }


            let data = find();
            let searchResultDiv = document.querySelector('.list-group');
                data.then((res)=>{
                    searchResultDiv.innerHTML="";

                    for (let i = 0; i < res.length; i++) {

                             searchResultDiv.innerHTML+=`
                             <a href="/shops/${res[i].shop.shop_id}" >
                             <li class="list"> ${res[i].product_name} <small> ${res[i].shop.shop_name}</small></li>
                             </a>
                            `;

                            // let node = document.createElement("LI");
                            // node.classList.add('list-result');
                            // let textnode = document.createTextNode(`${res[i].product_name}`);
                            // node.appendChild(textnode);
                            // searchResultDiv.appendChild(node);

                            // searchResultDiv.appendChild(`<li class="list"> ${res[i].product_name} </li>`);



                    }

                        // console.log(res);
                    }
                )


            // console.log(dishSearchField.value);

            let main = document.querySelector('main');
                main.addEventListener('click',()=>{
                let sug = document.querySelector('.search-suggest');
                sug.style.display="none";
                })

        });

</script>

@endsection
