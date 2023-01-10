<div class="header-middle pt--10 pb--10">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-3">
                <a href="{{route('home')}}" class="site-brand">
                    <img src="{{asset('user/image/logo.png')}}" alt="">
                </a>
            </div>
            <div class="col-lg-5">
                <div class="header-search-block">
                    <form action="{{route('search')}}" method="POST">
                        @csrf
                        <input type="text" id="search" name="search" placeholder="Search entire store here" autocomplete="off">
                        <button type="submit">Search</button>
                    </form>
                    <div id="result" class="panel panel-default" style="position: absolute; z-index: 2; width: 450px;display: none">
                        <ul class="list-group" id="bookList">

                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="main-navigation flex-lg-right">
                    <div class="cart-widget">
                        <div class="login-block">
                            <a href="{{route('login')}}" class="font-weight-bold">Login</a> <br>
                            <span>or</span><a href="{{route('registerPage')}}">Register</a>
                        </div>
                        <div class="cart-block">
                            <div class="cart-total">
                                            <span class="text-number">
                                                1
                                            </span>
                                <span class="text-item">
                                                Shopping Cart
                                            </span>
                                <span class="price">
                                                £0.00
                                                <i class="fas fa-chevron-down"></i>
                                            </span>
                            </div>
                            <div class="cart-dropdown-block">
                                <div class=" single-cart-block ">
                                    <div class="cart-product">
                                        <a href="product-details.html" class="image">
                                            <img src="image/products/cart-product-1.jpg" alt="">
                                        </a>
                                        <div class="content">
                                            <h3 class="title"><a href="product-details.html">Kodak PIXPRO
                                                    Astro Zoom AZ421 16 MP</a>
                                            </h3>
                                            <p class="price"><span class="qty">1 ×</span> £87.34</p>
                                            <button class="cross-btn"><i class="fas fa-times"></i></button>
                                        </div>
                                    </div>
                                </div>
                                <div class=" single-cart-block ">
                                    <div class="btn-block">
                                        <a href="cart.html" class="btn">View Cart <i
                                                class="fas fa-chevron-right"></i></a>
                                        <a href="checkout.html" class="btn btn--primary">Check Out <i
                                                class="fas fa-chevron-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
