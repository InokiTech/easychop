<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>welcome to Easychop</title>
    <link rel="stylesheet" href="{{asset('front-assets/css/mobile/mobile_style.css')}}">
    <style>
        *{
            font-family: "Open Sans", sans-serif;
        }
    </style>
@yield('styles')
</head>
<body>
<div class="msg"></div>
@yield('content')
@yield('scripts')
@include('frontend.bottomNav')













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
                        console.log(result);
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
                        console.log(result);
                    });
                }


            removeAndGetMessage();
            displayCartCount();


        });

    })



</script>
</body>
</html>
