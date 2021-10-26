<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('FrontEndassets/img/favicon.png')}}">

    <!-- all css here -->
    <link rel="stylesheet" href="{{asset('FrontEnd/assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('FrontEnd/assets/css/animate.css')}}">
    <link rel="stylesheet" href="{{asset('FrontEnd/assets/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('FrontEnd/assets/css/jquery-ui.css')}}">
    <link rel="stylesheet" href="{{asset('FrontEnd/assets/css/chosen.min.css')}}">
    <link rel="stylesheet" href="{{asset('FrontEnd/assets/css/ionicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('FrontEnd/assets/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('FrontEnd/assets/css/material-design-iconic-font.min.css')}}">
    <link rel="stylesheet" href="{{asset('FrontEnd/assets/css/meanmenu.min.css')}}">
    <link rel="stylesheet" href="{{asset('FrontEnd/assets/css/bundle.css')}}">
    <link rel="stylesheet" href="{{asset('FrontEnd/assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('FrontEnd/assets/css/responsive.css')}}">
    <script src="{{asset('FrontEnd/assets/js/vendor/modernizr-2.8.3.min.js')}}"></script>

    <!-- Css Alert -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />
    <!-- Default theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css" />

    <!-- Yield styles -->
    @yield('styles')

</head>

<body>
    <!-- Add your site or application content here -->

    <!--organicfood wrapper start-->
    <div class="organic_food_wrapper">

        <header class="header sticky-header">
            <div class="organic_food_wrapper">
                <!--Header start-->
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="header_wrapper_inner">
                                <div class="logo col-xs-12">
                                    <a href="{{route('frontend.index')}}">
                                        <img src="assets/img/logo/logo.png" alt="">
                                    </a>
                                </div>
                                <div class="main_menu_inner">
                                    <div class="menu">
                                        <nav>
                                            <ul>
                                                <li class="active"><a href="{{route('frontend.index')}}">Trang chủ <i
                                                            class="fa fa-angle-down"></i></a>

                                                </li>
                                                <li><a href="about.html">Chúng tôi </a> </li>
                                                <li><a href="{{route('shop.index')}}">Cửa hàng</a> </li>
                                                <li><a href="blog.html">Blog </a>
                                                </li>
                                                <li class="mega_parent"><a href="#">Danh mục <i
                                                            class="fa fa-angle-down"></i></a>
                                                    <ul class="mega_menu">
                                                        <li class="mega_item">
                                                            <a class="mega_title" href="#">1</a>
                                                            <ul>

                                                                <li><a href="shop.html">Sản phẩm</a></li>

                                                                <li><a href="product-details.html">Chi tiết sản phẩm</a>
                                                                </li>
                                                                <li><a href="my-account.html">Tài khoản</a></li>
                                                            </ul>
                                                        </li>
                                                        <li class="mega_item">
                                                            <a class="mega_title" href="#"> 2</a>
                                                            <ul>
                                                                <li><a href="wishlist.html">Danh mục ưu thích</a></li>
                                                                <li><a href="{{route('show.cart')}}">Giỏ hàng</a></li>
                                                                <li><a href="{{route('checkout.cart')}}">Thanh toán</a>
                                                                </li>
                                                                <li><a href="login.html">Đăng nhập</a></li>
                                                                <li><a href="register.html">Đăng ký</a></li>
                                                            </ul>
                                                        </li>
                                                        <li class="mega_item">
                                                            <a class="mega_title" href="#"> 3</a>
                                                            <ul>

                                                                <li><a href="contact.html">Liên hệ </a></li>
                                                                <li><a href="404.html">Báo lỗi</a></li>
                                                            </ul>
                                                        </li>
                                                    </ul>
                                                </li>

                                            </ul>
                                        </nav>
                                    </div>

                                    <div class="mobile-menu d-lg-none">
                                        <nav>
                                            <ul>
                                                <li class="active"><a href="index.html">Trang chủ <i
                                                            class="fa fa-angle-down"></i></a>
                                                    <ul class="sub_menu">
                                                        <li><a href="index.html">Trang chủ 1</a></li>
                                                    </ul>
                                                </li>
                                                <li><a href="about.html">Chúng tôi </a> </li>
                                                <li><a href="shop.html">Cửa hàng</a> </li>
                                                <li><a href="blog.html">Blog </a>
                                                </li>
                                                <li class="mega_parent"><a href="#">Danh mục <i
                                                            class="fa fa-angle-down"></i></a>
                                                    <ul class="mega_menu">
                                                        <li class="mega_item">
                                                            <a class="mega_title" href="#">1</a>
                                                            <ul>

                                                                <li><a href="shop.html">Sản phẩm</a></li>

                                                                <li><a href="product-details.html">Chi tiết sản phẩm</a>
                                                                </li>
                                                                <li><a href="my-account.html">Tài khoản</a></li>
                                                            </ul>
                                                        </li>
                                                        <li class="mega_item">
                                                            <a class="mega_title" href="#"> 2</a>
                                                            <ul>
                                                                <li><a href="wishlist.html">Danh mục ưu thích</a></li>
                                                                <li><a href="{{route('show.cart')}}">Giỏ hàng</a></li>
                                                                <li><a href="checkout.html">Thanh toán</a></li>
                                                                <li><a href="login.html">Đăng nhập</a></li>
                                                                <li><a href="register.html">Đăng ký</a></li>
                                                            </ul>
                                                        </li>
                                                        <li class="mega_item">
                                                            <a class="mega_title" href="#"> 3</a>
                                                            <ul>

                                                                <li><a href="contact.html">Liên hệ </a></li>
                                                                <li><a href="404.html">Báo lỗi</a></li>
                                                            </ul>
                                                        </li>
                                                    </ul>
                                                </li>

                                            </ul>
                                        </nav>
                                    </div>
                                </div>
                                <div class="header_right_info d-flex">
                                    <div class="search_box">
                                        <div class="search_inner">
                                            <form action="#">
                                                <input type="text" placeholder="Tìm sản phẩm">
                                                <button type="submit"><i class="ion-ios-search"></i></button>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="mini__cart">
                                        <div class="mini_cart_inner">
                                            <div id="cart-icon">

                                                <div class="cart_icon ">
                                                    <a href="#">
                                                        @php $totlalQty = 0 @endphp
                                                        @if(session()->get('cart') != null)
                                                        @foreach ( session('cart') as $id => $cart )
                                                        @php
                                                        $totlalQty +=$cart['quantity'];
                                                        @endphp
                                                        @endforeach
                                                        @endif
                                                        <span class="cart_icon_inner">
                                                            <i class="ion-android-cart"></i>
                                                            <span class="cart_count">{{$totlalQty}}</span>
                                                        </span>

                                                    </a>
                                                </div>
                                            </div>
                                            <!--Mini Cart Box-->
                                            <div class="mini_cart_box cart_box_one">
                                                <div id="change-item-cart">
                                                    @if (session('cart'))
                                                    @php $total = 0 @endphp
                                                    @foreach (session('cart') as $id => $cart )
                                                    <div class="mini_cart_item">
                                                        <div class="mini_cart_img">
                                                            <a href="#">
                                                                <img src="{{url('img/products',$cart['image'])}} " width="50px" height="50px">
                                                                <span class="cart_count">{{$cart['quantity']}} </span>
                                                            </a>
                                                        </div>
                                                        <div class="cart_info">
                                                            <h5><a href="product-details.html">{{$cart['name']}} </a>
                                                            </h5>
                                                            <span class="cart_price">{{number_format($cart['price'])}}Vnd </span>
                                                        </div>
                                                        <div class="cart_remove">
                                                            <a href="#"><i data-id="{{$id}}" class="zmdi zmdi-delete"></i></a>
                                                        </div>
                                                    </div>
                                                    @endforeach
                                                    @endif
                                                    <div class="price_content">
                                                        @php $total = 0 @endphp
                                                        @foreach ((array) session('cart') as $id => $cart )
                                                        @php
                                                        $total += $cart['price'] * $cart['quantity'];
                                                        @endphp
                                                        @endforeach

                                                        <div class="cart-total-price">
                                                            <span class="label">Total </span>
                                                            <span class="value"> {{number_format($total)}}Vnd</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="min_cart_view">
                                                    <a href="{{route('show.cart')}}">View Cart</a>
                                                </div>

                                                <div class="min_cart_checkout">
                                                    <a href="{{route('checkout.cart')}}">Checkout</a>
                                                </div>
                                            </div>

                                            <!--Mini Cart Box End -->
                                        </div>
                                    </div>

                                    <div class="header_account">
                                        <div class="account_inner">
                                            <a href="#"><i class="ion-gear-b"></i></a>
                                        </div>
                                        <div class="content-setting-dropdown">
                                            <div class="language-selector-wrapper">
                                                <div class="language-selector">
                                                    <ul>
                                                        <li><a href="#"><img src="assets/img/1.jpg" alt="English"><span
                                                                    class="expand-more">English</span></a></li>

                                                        <li><a href="#"><img src="assets/img/banner/frances2.jpg"
                                                                    alt="Language"><span
                                                                    class="expand-more">Français</span>
                                                            </a></li>

                                                    </ul>

                                                </div>
                                                <div class="currency-selector-wrapper">
                                                    <ul>
                                                        <li><a href="#">EUR $</a></li>
                                                        <li><a href="#">USD $</a></li>
                                                    </ul>
                                                </div>
                                                <div class="user_info_top">
                                                    <ul>
                                                        <li><a href="my-account.html">my account</a></li>
                                                        <li><a href="checkout.html">Checkout</a></li>
                                                        <li><a href="login.html">Sign in</a></li>
                                                    </ul>
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
        </header>
        <!--Header end-->

        <!--Main start-->


        @yield('content')

        <!--Main end-->


        <!-- footer start -->
        <footer class="footer pt-90">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-12 col-xs-12">
                        <!--Single Footer-->
                        <div class="single_footer widget">
                            <div class="single_footer_widget_inner">
                                <div class="footer_logo">
                                    <a href="#"><img src="assets/img/logo/logo_footer.png" alt=""></a>
                                </div>
                                <div class="footer_content">
                                    <p>Address: 123 Main Street, Anytown, CA 12345 - USA.</p>
                                    <p>Phone: +(000) 800 456 789</p>
                                    <p>Email: Contact@posthemes.com</p>
                                </div>
                                <div class="footer_social">
                                    <h4>Get in Touch:</h4>
                                    <div class="footer_social_icon">
                                        <a href="#"><i class="fa fa-twitter"></i></a>
                                        <a href="#"><i class="fa fa-google-plus"></i></a>
                                        <a href="#"><i class="fa fa-facebook"></i></a>
                                        <a href="#"><i class="fa fa-youtube"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Single Footer-->
                    </div>
                    <div class="col-lg-6 col-md-12 col-xs-12">
                        <div class="footer_menu_list d-flex justify-content-between">
                            <!--Single Footer-->
                            <div class="single_footer widget">
                                <div class="single_footer_widget_inner">
                                    <div class="footer_title">
                                        <h2>Products</h2>
                                    </div>
                                    <div class="footer_menu">
                                        <ul>
                                            <li><a href="#">Prices drop</a></li>
                                            <li><a href="#"> New products</a></li>
                                            <li><a href="#"> Best sales</a></li>
                                            <li><a href="#"> Contact us</a></li>
                                            <li><a href="#"> My account</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!--Single footer end-->
                            <!--Single footer start-->
                            <div class="single_footer widget">
                                <div class="single_footer_widget_inner">
                                    <div class="footer_title">
                                        <h2>Login</h2>
                                    </div>
                                    <div class="footer_menu">
                                        <ul>
                                            <li><a href="#">Sitemap</a></li>
                                            <li><a href="#"> Stores</a></li>
                                            <li><a href="#"> Login</a></li>
                                            <li><a href="#"> Contact us</a></li>
                                            <li><a href="#"> My account</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!--Single Footer end-->
                            <!--Single footer start-->
                            <div class="single_footer widget">
                                <div class="single_footer_widget_inner">
                                    <div class="footer_title">
                                        <h2> Your account </h2>
                                    </div>
                                    <div class="footer_menu">
                                        <ul>
                                            <li><a href="#">Personal info</a></li>
                                            <li><a href="#"> Orders</a></li>
                                            <li><a href="#"> Login</a></li>
                                            <li><a href="#"> Credit slips</a></li>
                                            <li><a href="#"> Addresses</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!--Single Footer end-->
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-12 col-xs-12">
                        <div class="footer_title">
                            <h2> Join Our Newsletter Now </h2>
                        </div>
                        <div class="footer_news_letter">
                            <p>Get E-mail updates about our latest shop and special offers.</p>
                            <div class="newsletter_form">
                                <form action="#">
                                    <input type="email" required placeholder="Your Email Address">
                                    <input type="submit" value="Subscribe">
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="copyright">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-xs-12">
                            <div class="copyright_text">
                                <p>Copyright 2018 <a href="#">Organicfood</a>. All Rights Reserved</p>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-xs-12">
                            <div class="footer_mastercard text-right">
                                <a href="#"><img src="assets/img/brand/payment.png" alt=""></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </footer>

        <!-- footer end -->



    </div>



    <!-- all js here -->
    <script src="{{asset('FrontEnd/assets/js/vendor/jquery-1.12.0.min.js')}}"></script>
    <script src="{{asset('FrontEnd/assets/js/popper.js')}}"></script>
    <script src="{{asset('FrontEnd/assets/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('FrontEnd/assets/js/jquery-ui.js')}}"></script>
    <script src="{{asset('FrontEnd/assets/js/isotope.pkgd.min.js')}}"></script>
    <script src="{{asset('FrontEnd/assets/js/imagesloaded.pkgd.min.js')}}"></script>
    <script src="{{asset('FrontEnd/assets/js/jquery.counterup.min.js')}}"></script>
    <script src="{{asset('FrontEnd/assets/js/waypoints.min.js')}}"></script>
    <script src="{{asset('FrontEnd/assets/js/ajax-mail.js')}}"></script>
    <script src="{{asset('FrontEnd/assets/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('FrontEnd/assets/js/plugins.js')}}"></script>
    <script src="{{asset('FrontEnd/assets/js/main.js')}}"></script>
    <script src="{{asset('FrontEnd/assets/js/vendor/modernizr-2.8.3.min.js')}}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>



    @yield('scripts')


    <script src="https://unpkg.com/sweetalert@2.1.2/dist/sweetalert.min.js"></script>

    @if(session()->get('cartNull'))
    <script>
        swal("Notification", "You do not have any orders, go to the shop", "warning");
    </script>
    @endif
    <script type="text/javascript">

        //Remove item product from icon cart
     $("#change-item-cart").on("click", ".zmdi-delete", function (e) {
         e.preventDefault();
         let id = $(this).data("id");
         $.ajax({
             method: "GET",
             url: "remove-from-cart/",
             data: {
                 _token: '{{ csrf_token() }}',
                 id: id
             },
             success: function (repsonse) {
                 $("#cart-icon").load(" #cart-icon");
                 $("#change-item-cart").load(" #change-item-cart");
                 $(".checkout-form").load(" .checkout-form");

                 alertify.set('notifier', 'position', 'bottom-right');
                 alertify.success('You have successfully removed!');
             }
         });
     });
    </script>

</body>

</html>
