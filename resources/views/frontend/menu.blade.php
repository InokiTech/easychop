<nav class="main-menu">
    <div id="header_menu">
        <a href="#0" class="open_close">
            <i class="icon_close"></i><span>Menu</span>
        </a>
        <a href="/"><img src="{{asset('front-assets/img/logo.png')}}" width="140" alt=""></a>
    </div>
    <ul>
        <li><a href="{{url('/')}}">Home</a></li>
        <li><a href="{{url('/contact')}}">Contact</a></li>
        <li><a href="{{url('/about')}}">About</a></li>
        @guest
        <li><a href="{{url('/register')}}">Sign-up</a></li>
        <li><a href="{{url('/login')}}">Sign-in</a></li>
        @if(App::environment('local'))
            <li><a href="http://localhost:9000">Vendor</a></li>
        @else
            <li><a href="https://vendor.easychop.ng">Vendor</a></li>
        @endif
        @endguest
        @auth
        @role('customers')
        <li class="submenu">
                <a href="#" class="show-submenu">{{auth()->user()->firstname}}</a>
                <ul >
                    <li><a href="#">{{auth()->user()->fullname}}</a></li>
                    <li><a href="{{url('/customer/profile')}}">Update Profile</a></li>
                    <li><a href="/order">My Orders</a></li>
                    <li><a href="cart">Cart List</a></li>
                    <li><a href="{{url('/logout')}}">Logout</a></li>
                </ul>
            </li>
        @endrole
        @unlessrole('customers')
            <li><a href="{{url('/dashboard')}}">{{auth()->user()->firstname}}</a></li>
            @endunlessrole
            @endauth
            <li><a href="{{url('/cart')}}"><i class="icon_cart 2x"></i>
                @auth
                    <span class="ml-0 badge badge-danger">{{Cart::session(auth()->id())->getContent()->count()}}</span>
                @endauth
            </a></li>
    </ul>
</nav>


