<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>welcome to Easychop</title>
    <link rel="stylesheet" href="{{asset('front-assets/css/mobile/mobile_style.css')}}">
</head>
<body>
  <main>
    <section class="welcome_title_section">
        <h2>Welcome to</h2>
        <img src="{{asset('front-assets\img\1.png')}}" alt="easychop logo">
        <h3>order now, chop now</h3>
    </section>
    
    <section class="auth_button_group">
        <div class="btn_group">
            <a  href="{{url('/login')}}" class="login">Login</a>
            <a href="{{url('/register')}}" class="signup">Sign up</a>
        </div>
        <h3>Order from the best restraunts in Nigeria at the best prices</h3>
    </section>

    <div class="bg-img">
        <div class="gradient"></div>
    </div>
    
    </main>
</body>
</html>