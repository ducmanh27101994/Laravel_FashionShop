<header class="header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-3 col-lg-2">
                <div class="header__logo">
                    <a href="{{route('home')}}"><img src="img/logo.png" alt=""></a>
                </div>
            </div>
            <div class="col-xl-6 col-lg-7">
                <nav class="header__menu">
                    <ul>
                        <li class="active"><a href="{{route('home')}}">Home</a></li>
                        <li><a href="#">Women’s</a></li>
                        <li><a href="#">Men’s</a></li>
                        <li><a href="{{route('shop')}}">Shop</a></li>
                        <li><a href="#">Pages</a>
                            <ul class="dropdown">
                                <li><a href="{{route('shop')}}">Product Details</a></li>
                                <li><a href="{{route('shop-cart')}}">Shop Cart</a></li>
                                <li><a href="{{route('check-out')}}">Checkout</a></li>
                            </ul>
                        </li>
                        <li><a style="color: deeppink" href="{{route('Home.musics')}}">Music Online</a></li>
{{--                        <li><a href="./contact.html">Contact</a></li>--}}
                    </ul>
                </nav>
            </div>
            <div class="col-lg-3">
                <div class="header__right">
                    <div class="header__right__auth">
                        <a href="{{route('login.index')}}" @if(!empty(\Illuminate\Support\Facades\Session::get('loginAuth'))) hidden @endif >Login</a>
                        <a href="{{route('register')}}" @if(!empty(\Illuminate\Support\Facades\Session::get('loginAuth'))) hidden @endif >Register</a>
                        <a href="{{route('logOut')}}">Logout</a>
                    </div>
                    <ul class="header__right__widget">
                        <li><span class="icon_search search-switch"></span></li>

                        <li>
                            <a href="{{route('shop-cart')}}"><span class="icon_bag_alt"></span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="canvas__open">
            <i class="fa fa-bars"></i>
        </div>
    </div>
</header>



