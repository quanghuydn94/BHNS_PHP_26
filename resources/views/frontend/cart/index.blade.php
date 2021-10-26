@extends('layouts.frontend')
@section('content')



        <!--Slider start-->
        <div class="slider_area">
            <div class="slider_list  owl-carousel">
                <div class="single_slide" style="background-image: url(assets/img/slider/1.jpg);">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <div class="slider__content">
                                    <p>Giảm giá -10% Chỉ trong tuần này</p>
                                    <h2>Tràn đầy <strong>sức sống</strong> với một ly</h2>
                                    <h3><strong>nước ép</strong> mỗi ngày</h3>
                                    <h6>Giá chỉ<span> {{number_format(25000)}} Vnd</span></h6>
                                    <div class="slider_btn">
                                        <a href="{{route('shop.index')}}">Mua Ngay</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="single_slide" style="background-image: url(assets/img/slider/2.jpg);">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <div class="slider__content">
                                    <p>Giảm giá -10% Chỉ trong tuần này</p>
                                    <h2>Chúng tôi <strong>cung cấp</strong> sản phẩm </h2>
                                    <h3> <strong>tốt nhất </strong> cho bạn</h3>
                                    <h6>Giá chỉ <span>{{number_format(35000)}} Vnd</span></h6>
                                    <div class="slider_btn">
                                        <a href="{{route('shop.index')}}">Mua ngay</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Slider end-->


        <!--Banner area start-->
        <div class="banner_area home1_banner mt-30">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="single_banner">
                            <a href="#">
                                <img src="assets/img/banner/1.jpg" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="single_banner">
                            <a href="#">
                                <img src="assets/img/banner/2.jpg" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="single_banner banner_three">
                            <a href="#">
                                <img src="assets/img/banner/3.jpg" alt="">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Banner area end-->

        <!--Features product area-->
        <div class="features_product pt-90">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="section_title text-center">
                            <h3> Sản phẩm đặc trưng</h3>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="features_product_active owl-carousel">
                        @foreach ($products as $pro )

                        <div class="col-lg-2">
                            <div class="single__product">
                                <div class="single_product__inner">
                                    <span class="new_badge">new</span>
                                    <div class="product_img">
                                        <a href="#">
                                            <img src="{{url('/img/products',$pro->product_image)}}" height="200px" width="" alt="">
                                        </a>
                                    </div>
                                    <div class="product__content text-center">
                                        <div class="produc_desc_info">
                                            <div class="product_title">
                                                <h4><a href="product-details.html">{{$pro->product_name}}</a></h4>
                                            </div>
                                            <div class="product_price">
                                                <p>{{number_format($pro->product_price)}} Vnd</p>
                                            </div>
                                        </div>
                                        <div class="product__hover">
                                            <ul>
                                                <li><a href="#"><i class="ion-android-cart"></i></a></li>
                                                <li><a class="cart-fore" href="#" data-toggle="modal"
                                                        data-target="#my_modal" title="Quick View"><i
                                                            class="ion-android-open"></i></a></li>
                                                <li><a href="product-details.html"><i class="ion-clipboard"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
        <!--Features product end-->

        <!--Shipping area start-->
        <div class="shipping_area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="shipping_list d-flex justify-content-between flex-xs-column">
                            <div class="single_shipping_box d-flex">
                                <div class="shipping_icon">
                                    <img src="assets/img/ship/1.png" alt="shipping icon">
                                </div>
                                <div class="shipping_content">
                                    <h6>Miễn phí giao hàng hóa đơn trên</h6>
                                    <p>{{number_format(200000)}} Vnd</p>
                                </div>
                            </div>
                            <div class="single_shipping_box one d-flex">
                                <div class="shipping_icon">
                                    <img src="assets/img/ship/2.png" alt="shipping icon">
                                </div>
                                <div class="shipping_content">
                                    <h6>Đổi trả</h6>
                                    <p>Trả lại đơn hàng trong 3 ngày</p>
                                </div>
                            </div>
                            <div class="single_shipping_box two d-flex">
                                <div class="shipping_icon">
                                    <img src="assets/img/ship/3.png" alt="shipping icon">
                                </div>
                                <div class="shipping_content">
                                    <h6>Giảm giá cho thành viên</h6>
                                </div>
                            </div>
                            <div class="single_shipping_box three d-flex">
                                <div class="shipping_icon">
                                    <img src="assets/img/ship/4.png" alt="shipping icon">
                                </div>
                                <div class="shipping_content">
                                    <h6>Hỗ trợ 24/7</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Shipping area end-->


        <!--shop product area start-->
        <div class="shop_product">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="shop_product_head d-flex justify-content-between mb-30">
                            <div class="section_title space_2 text-left">
                                <h3>Cửa hàng</h3>
                            </div>
                            <div class="home_shop_product text-right">
                                <ul class="product-tab-list nav d-flex flex-wrap justify-content-end" role="tablist">
                                    <li><a class="active" href="#fresh" data-toggle="tab" role="tab"
                                            aria-selected="true" aria-controls="vegetables">
                                            Rau tươi
                                        </a></li>
                                    <li><a href="#flowers" data-toggle="tab" role="tab" aria-selected="false"
                                            aria-controls="flowers"> Trái cây </a></li>
                                    <li><a href="#rices" data-toggle="tab" role="tab" aria-selected="false"
                                            aria-controls="rices">Gạo </a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="shop_larg_product">
                            <div class="single__product_2">
                                <div class="product_img">
                                    <a href="#">
                                        <img src="{{url('img/products/1634440383.png')}}" alt="">
                                    </a>
                                </div>
                                <div class="product__content text-center">
                                    <div class="product_title">
                                        <h4><a href="product-details.html">Chôm Chôm Nhãn</a></h4>
                                    </div>
                                    <div class="product_price">
                                        <p>{{number_format(35000)}} Vnd</p>
                                    </div>
                                    <div class="product-add-to-cart">
                                        <a href="#">add to cart</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-6">
                        <div class="tab-content">
                            <div class="tab-pane active show fade" id="vegetables" role="tabpanel">
                                <div class="row">
                                    <div class="shop-product_list owl-carousel">
                                        <div class="col-12">
                                            <div class="shop_single_prduct_item">

                                                <div class="single__product">
                                                    <div class="single_product__inner">
                                                        <span class="new_badge">new</span>
                                                        <div class="product_img">
                                                            <a href="#">
                                                                <img src="assets/img/product/1.jpg" alt="">
                                                            </a>
                                                        </div>
                                                        <div class="product__content text-center">
                                                            <div class="produc_desc_info">
                                                                <div class="product_title">
                                                                    <h4><a href="product-details.html">Healthy Melt</a>
                                                                    </h4>
                                                                </div>
                                                                <div class="product_price">
                                                                    <p>$90.66</p>
                                                                </div>
                                                            </div>

                                                            <div class="product__hover">
                                                                <ul>
                                                                    <li><a href="#"><i class="ion-android-cart"></i></a>
                                                                    </li>
                                                                    <li><a class="cart-fore" href="#"
                                                                            data-toggle="modal" data-target="#my_modal"
                                                                            title="Quick View"><i
                                                                                class="ion-android-open"></i></a></li>
                                                                    <li><a href="product-details.html"><i
                                                                                class="ion-clipboard"></i></a></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="single__product">
                                                    <div class="single_product__inner">
                                                        <span class="new_badge">new</span>
                                                        <div class="product_img">
                                                            <a href="#">
                                                                <img src="assets/img/product/2.jpg" alt="">
                                                            </a>
                                                        </div>
                                                        <div class="product__content text-center">
                                                            <div class="produc_desc_info">
                                                                <div class="product_title">
                                                                    <h4><a href="product-details.html">Healthy Melt</a>
                                                                    </h4>
                                                                </div>
                                                                <div class="product_price">
                                                                    <p>$90.66</p>
                                                                </div>
                                                            </div>

                                                            <div class="product__hover">
                                                                <ul>
                                                                    <li><a href="#"><i class="ion-android-cart"></i></a>
                                                                    </li>
                                                                    <li><a class="cart-fore" href="#"
                                                                            data-toggle="modal" data-target="#my_modal"
                                                                            title="Quick View"><i
                                                                                class="ion-android-open"></i></a></li>
                                                                    <li><a href="product-details.html"><i
                                                                                class="ion-clipboard"></i></a></li>
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
                            <div class="tab-pane fade" id="flowers" role="tabpanel">
                                <div class="row">
                                    <div class="shop-product_list owl-carousel">

                                        <div class="col-12">
                                            <div class="shop_single_prduct_item">

                                                <div class="single__product">
                                                    <div class="single_product__inner">
                                                        <span class="new_badge">new</span>
                                                        <div class="product_img">
                                                            <a href="#">
                                                                <img src="assets/img/product/5.jpg" alt="">
                                                            </a>
                                                        </div>
                                                        <div class="product__content text-center">
                                                            <div class="produc_desc_info">
                                                                <div class="product_title">
                                                                    <h4><a href="product-details.html">Sprite Yoga
                                                                            Straps1</a></h4>
                                                                </div>
                                                                <div class="product_price">
                                                                    <p>$70.66</p>
                                                                </div>
                                                            </div>
                                                            <div class="product__hover">
                                                                <ul>
                                                                    <li><a href="#"><i class="ion-android-cart"></i></a>
                                                                    </li>
                                                                    <li><a class="cart-fore" href="#"
                                                                            data-toggle="modal" data-target="#my_modal"
                                                                            title="Quick View"><i
                                                                                class="ion-android-open"></i></a></li>
                                                                    <li><a href="product-details.html"><i
                                                                                class="ion-clipboard"></i></a></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="single__product">
                                                    <div class="single_product__inner">
                                                        <span class="new_badge">new</span>
                                                        <div class="product_img">
                                                            <a href="#">
                                                                <img src="assets/img/product/6.jpg" alt="">
                                                            </a>
                                                        </div>
                                                        <div class="product__content text-center">
                                                            <div class="produc_desc_info">
                                                                <div class="product_title">
                                                                    <h4><a href="product-details.html">Wayfarer
                                                                            Messenger Bag</a></h4>
                                                                </div>
                                                                <div class="product_price">
                                                                    <p>$55.66</p>
                                                                </div>
                                                            </div>
                                                            <div class="product__hover">
                                                                <ul>
                                                                    <li><a href="#"><i class="ion-android-cart"></i></a>
                                                                    </li>
                                                                    <li><a class="cart-fore" href="#"
                                                                            data-toggle="modal" data-target="#my_modal"
                                                                            title="Quick View"><i
                                                                                class="ion-android-open"></i></a></li>
                                                                    <li><a href="product-details.html"><i
                                                                                class="ion-clipboard"></i></a></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="shop_single_prduct_item">

                                                <div class="single__product">
                                                    <div class="single_product__inner">
                                                        <span class="new_badge">new</span>
                                                        <div class="product_img">
                                                            <a href="#">
                                                                <img src="assets/img/product/7.jpg" alt="">
                                                            </a>
                                                        </div>
                                                        <div class="product__content text-center">
                                                            <div class="produc_desc_info">
                                                                <div class="product_title">
                                                                    <h4><a href="product-details.html">Donec sem
                                                                            tellus</a></h4>
                                                                </div>
                                                                <div class="product_price">
                                                                    <p>$45.66</p>
                                                                </div>
                                                            </div>
                                                            <div class="product__hover">
                                                                <ul>
                                                                    <li><a href="#"><i class="ion-android-cart"></i></a>
                                                                    </li>
                                                                    <li><a class="cart-fore" href="#"
                                                                            data-toggle="modal" data-target="#my_modal"
                                                                            title="Quick View"><i
                                                                                class="ion-android-open"></i></a></li>
                                                                    <li><a href="product-details.html"><i
                                                                                class="ion-clipboard"></i></a></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="single__product">
                                                    <div class="single_product__inner">
                                                        <span class="new_badge">new</span>
                                                        <div class="product_img">
                                                            <a href="#">
                                                                <img src="assets/img/product/8.jpg" alt="">
                                                            </a>
                                                        </div>
                                                        <div class="product__content text-center">
                                                            <div class="produc_desc_info">
                                                                <div class="product_title">
                                                                    <h4><a href="#">Country Burger</a></h4>
                                                                </div>
                                                                <div class="product_price">
                                                                    <p>$35.66</p>
                                                                </div>
                                                            </div>
                                                            <div class="product__hover">
                                                                <ul>
                                                                    <li><a href="#"><i class="ion-android-cart"></i></a>
                                                                    </li>
                                                                    <li><a class="cart-fore" href="#"
                                                                            data-toggle="modal" data-target="#my_modal"
                                                                            title="Quick View"><i
                                                                                class="ion-android-open"></i></a></li>
                                                                    <li><a href="product-details.html"><i
                                                                                class="ion-clipboard"></i></a></li>
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
                            <div class="tab-pane fade" id="rices" role="tabpanel">
                                <div class="row">
                                    <div class="shop-product_list owl-carousel">

                                        <div class="col-12">
                                            <div class="shop_single_prduct_item">
                                                <div class="single__product">
                                                    <div class="single_product__inner">
                                                        <span class="new_badge">new</span>
                                                        <div class="product_img">
                                                            <a href="#">
                                                                <img src="{{url('img/products/1634368660.png')}}" height="170px" width="auto" alt="">
                                                            </a>
                                                        </div>
                                                        <div class="product__content text-center">
                                                            <div class="produc_desc_info">
                                                                <div class="product_title">
                                                                    <h4><a href="product-details.html">Gạo thơm Minh Tâm</a></h4>
                                                                </div>
                                                                <div class="product_price">
                                                                    <p>$75.66</p>
                                                                </div>
                                                            </div>
                                                            <div class="product__hover">
                                                                <ul>
                                                                    <li><a href="#"><i class="ion-android-cart"></i></a>
                                                                    </li>
                                                                    <li><a class="cart-fore" href="#"
                                                                            data-toggle="modal" data-target="#my_modal"
                                                                            title="Quick View"><i
                                                                                class="ion-android-open"></i></a></li>
                                                                    <li><a href="product-details.html"><i
                                                                                class="ion-clipboard"></i></a></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="single__product">
                                                    <div class="single_product__inner">
                                                        <span class="new_badge">new</span>
                                                        <div class="product_img">
                                                            <a href="#">
                                                                <img src="assets/img/product/10.jpg" alt="">
                                                            </a>
                                                        </div>
                                                        <div class="product__content text-center">
                                                            <div class="produc_desc_info">
                                                                <div class="product_title">
                                                                    <h4><a href="product-details.html">Chaz Kangeroo
                                                                            Hoodie3</a></h4>
                                                                </div>
                                                                <div class="product_price">
                                                                    <p>$75.66</p>
                                                                </div>
                                                            </div>
                                                            <div class="product__hover">
                                                                <ul>
                                                                    <li><a href="#"><i class="ion-android-cart"></i></a>
                                                                    </li>
                                                                    <li><a class="cart-fore" href="#"
                                                                            data-toggle="modal" data-target="#my_modal"
                                                                            title="Quick View"><i
                                                                                class="ion-android-open"></i></a></li>
                                                                    <li><a href="product-details.html"><i
                                                                                class="ion-clipboard"></i></a></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="shop_single_prduct_item">
                                                <div class="single__product">
                                                    <div class="single_product__inner">
                                                        <span class="new_badge">new</span>
                                                        <div class="product_img">
                                                            <a href="#">
                                                                <img src="assets/img/product/11.jpg" alt="">
                                                            </a>
                                                        </div>
                                                        <div class="product__content text-center">
                                                            <div class="produc_desc_info">
                                                                <div class="product_title">
                                                                    <h4><a href="product-details.html">Donec sem
                                                                            tellus</a></h4>
                                                                </div>
                                                                <div class="product_price">
                                                                    <p>$45.66</p>
                                                                </div>
                                                            </div>
                                                            <div class="product__hover">
                                                                <ul>
                                                                    <li><a href="#"><i class="ion-android-cart"></i></a>
                                                                    </li>
                                                                    <li><a class="cart-fore" href="#"
                                                                            data-toggle="modal" data-target="#my_modal"
                                                                            title="Quick View"><i
                                                                                class="ion-android-open"></i></a></li>
                                                                    <li><a href="product-details.html"><i
                                                                                class="ion-clipboard"></i></a></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="single__product">
                                                    <div class="single_product__inner">
                                                        <span class="new_badge">new</span>
                                                        <div class="product_img">
                                                            <a href="#">
                                                                <img src="assets/img/product/12.jpg" alt="">
                                                            </a>
                                                        </div>
                                                        <div class="product__content text-center">
                                                            <div class="produc_desc_info">
                                                                <div class="product_title">
                                                                    <h4><a href="#">Country Burger</a></h4>
                                                                </div>
                                                                <div class="product_price">
                                                                    <p>$35.66</p>
                                                                </div>
                                                            </div>
                                                            <div class="product__hover">
                                                                <ul>
                                                                    <li><a href="#"><i class="ion-android-cart"></i></a>
                                                                    </li>
                                                                    <li><a class="cart-fore" href="#"
                                                                            data-toggle="modal" data-target="#my_modal"
                                                                            title="Quick View"><i
                                                                                class="ion-android-open"></i></a></li>
                                                                    <li><a href="product-details.html"><i
                                                                                class="ion-clipboard"></i></a></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="shop_single_prduct_item">
                                                <div class="single__product">
                                                    <div class="single_product__inner">
                                                        <span class="new_badge">new</span>
                                                        <div class="product_img">
                                                            <a href="#">
                                                                <img src="assets/img/product/13.jpg" alt="">
                                                            </a>
                                                        </div>
                                                        <div class="product__content text-center">
                                                            <div class="produc_desc_info">
                                                                <div class="product_title">
                                                                    <h4><a href="product-details.html">Chaz Kangeroo
                                                                            Hoodie3</a></h4>
                                                                </div>
                                                                <div class="product_price">
                                                                    <p>$62.66</p>
                                                                </div>
                                                            </div>
                                                            <div class="product__hover">
                                                                <ul>
                                                                    <li><a href="#"><i class="ion-android-cart"></i></a>
                                                                    </li>
                                                                    <li><a class="cart-fore" href="#"
                                                                            data-toggle="modal" data-target="#my_modal"
                                                                            title="Quick View"><i
                                                                                class="ion-android-open"></i></a></li>
                                                                    <li><a href="product-details.html"><i
                                                                                class="ion-clipboard"></i></a></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="single__product">
                                                    <div class="single_product__inner">
                                                        <span class="new_badge">new</span>
                                                        <div class="product_img">
                                                            <a href="#">
                                                                <img src="assets/img/product/8.jpg" alt="">
                                                            </a>
                                                        </div>
                                                        <div class="product__content text-center">
                                                            <div class="produc_desc_info">
                                                                <div class="product_title">
                                                                    <h4><a href="product-details.html">Fusce nec
                                                                            facilisi</a></h4>
                                                                </div>
                                                                <div class="product_price">
                                                                    <p>$68.66</p>
                                                                </div>
                                                            </div>
                                                            <div class="product__hover">
                                                                <ul>
                                                                    <li><a href="#"><i class="ion-android-cart"></i></a>
                                                                    </li>
                                                                    <li><a class="cart-fore" href="#"
                                                                            data-toggle="modal" data-target="#my_modal"
                                                                            title="Quick View"><i
                                                                                class="ion-android-open"></i></a></li>
                                                                    <li><a href="product-details.html"><i
                                                                                class="ion-clipboard"></i></a></li>
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
                    </div>
                </div>
            </div>
        </div>
        <!--shop product area end-->

        <!--Banner area start-->
        <div class="banner_area home1_banner2 pb-90">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="single_banner">
                            <a href="#">
                                <img src="assets/img/banner/big-1.jpg" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="single_banner">
                            <a href="#">
                                <img src="assets/img/banner/big-2.jpg" alt="">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Banner area end-->



        <!--New product area-->
        <div class="new_product">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="section_title space_2 text-left">
                            <h3>Sản phẩm mới</h3>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="features_product_active owl-carousel">
                        @foreach ($products as $pro )

                        <div class="col-lg-2">
                            <div class="single__product">
                                <div class="single_product__inner">
                                    <span class="new_badge">new</span>
                                    <div class="product_img">
                                        <a href="#">
                                            <img src="{{url('/img/products',$pro->product_image)}}" height="200px" width="" alt="">
                                        </a>
                                    </div>
                                    <div class="product__content text-center">
                                        <div class="produc_desc_info">
                                            <div class="product_title">
                                                <h4><a href="product-details.html">{{$pro->product_name}}</a></h4>
                                            </div>
                                            <div class="product_price">
                                                <p>{{number_format($pro->product_price)}} Vnd</p>
                                            </div>
                                        </div>
                                        <div class="product__hover">
                                            <ul>
                                                <li><a href="#"><i class="ion-android-cart"></i></a></li>
                                                <li><a class="cart-fore" href="#" data-toggle="modal"
                                                        data-target="#my_modal" title="Quick View"><i
                                                            class="ion-android-open"></i></a></li>
                                                <li><a href="product-details.html"><i class="ion-clipboard"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach


                    </div>
                </div>
            </div>
        </div>
        <!--new product end-->

        <!--Banner area start-->
        <div class="banner_area banner_area-2 pb-90">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-4">
                        <div class="single_banner">
                            <a href="#">
                                <img src="assets/img/banner/banner-4.jpg" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-4">
                        <div class="single_banner">
                            <a href="#">
                                <img src="assets/img/banner/banner-5.jpg" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4">
                        <div class="single_banner">
                            <a href="#">
                                <img src="assets/img/banner/banner-6.jpg" alt="">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Banner area end-->


        <!--Best seller product -->
        <div class="best_seller_product">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="section_title space_2 text-left">
                            <h3> Sản phẩm bán chạy</h3>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="best_selling_product_list owl-carousel">
                            <div class="best_selling_product">
                                <div class="single_small_product mb-30">
                                    <div class="product_thumb">
                                        <a href="#">
                                            <img src="assets/img/product/1.jpg" alt="">
                                        </a>
                                    </div>
                                    <div class="product_content">
                                        <h4><a href="product-details.html">Wayfarer Messenger Bag</a></h4>
                                        <div class="product_ratting">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-half-o"></i>
                                            <i class="fa fa-star-o"></i>
                                        </div>
                                        <div class="product_price">
                                            <span class="regular_price">$57.50</span>
                                            <span class="old_price">$62.23</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="single_small_product ">
                                    <div class="product_thumb">
                                        <a href="#">
                                            <img src="assets/img/product/2.jpg" alt="">
                                        </a>
                                    </div>
                                    <div class="product_content">
                                        <h4><a href="#">Field Messenger</a></h4>
                                        <div class="product_ratting">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <div class="product_price">
                                            <span class="regular_price">$65.23</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="best_selling_product">
                                <div class="single_small_product mb-30">
                                    <div class="product_thumb">
                                        <a href="#">
                                            <img src="assets/img/product/4.jpg" alt="">
                                        </a>
                                    </div>
                                    <div class="product_content">
                                        <h4><a href="product-details.html">Impulse Duffle</a></h4>
                                        <div class="product_ratting">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-half-o"></i>
                                            <i class="fa fa-star-o"></i>
                                        </div>
                                        <div class="product_price">
                                            <span class="regular_price">$62.23</span>
                                            <span class="old_price">$62.23</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="single_small_product ">
                                    <div class="product_thumb">
                                        <a href="#">
                                            <img src="assets/img/product/3.jpg" alt="">
                                        </a>
                                    </div>
                                    <div class="product_content">
                                        <h4><a href="product-details.html">Sprite Yoga Straps1</a></h4>
                                        <div class="product_ratting">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <div class="product_price">
                                            <span class="regular_price">$46.99</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="best_selling_product">
                                <div class="single_small_product mb-30">
                                    <div class="product_thumb">
                                        <a href="#">
                                            <img src="assets/img/product/5.jpg" alt="">
                                        </a>
                                    </div>
                                    <div class="product_content">
                                        <h4><a href="product-details.html">Cheese Butter Burger</a></h4>
                                        <div class="product_ratting">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-half-o"></i>
                                            <i class="fa fa-star-o"></i>
                                        </div>
                                        <div class="product_price">
                                            <span class="regular_price">$62.23</span>
                                            <span class="old_price">$62.23</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="single_small_product ">
                                    <div class="product_thumb">
                                        <a href="#">
                                            <img src="assets/img/product/6.jpg" alt="">
                                        </a>
                                    </div>
                                    <div class="product_content">
                                        <h4><a href="product-details.html">Voyage Yoga Bag</a></h4>
                                        <div class="product_ratting">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <div class="product_price">
                                            <span class="regular_price">$50.23</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="best_selling_product">
                                <div class="single_small_product mb-30">
                                    <div class="product_thumb">
                                        <a href="#">
                                            <img src="assets/img/product/7.jpg" alt="">
                                        </a>
                                    </div>
                                    <div class="product_content">
                                        <h4><a href="product-details.html">Chaz Kangeroo Hoodie3</a></h4>
                                        <div class="product_ratting">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-half-o"></i>
                                            <i class="fa fa-star-o"></i>
                                        </div>
                                        <div class="product_price">
                                            <span class="regular_price">$56.20</span>
                                            <span class="old_price">$62.23</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="single_small_product ">
                                    <div class="product_thumb">
                                        <a href="#">
                                            <img src="assets/img/product/8.jpg" alt="">
                                        </a>
                                    </div>
                                    <div class="product_content">
                                        <h4><a href="product-details.html">Fusion Backpac</a></h4>
                                        <div class="product_ratting">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <div class="product_price">
                                            <span class="regular_price">$76.50</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="best_selling_product">
                                <div class="single_small_product mb-30">
                                    <div class="product_thumb">
                                        <a href="#">
                                            <img src="assets/img/product/9.jpg" alt="">
                                        </a>
                                    </div>
                                    <div class="product_content">
                                        <h4><a href="product-details.html">Healthy Melt</a></h4>
                                        <div class="product_ratting">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-half-o"></i>
                                            <i class="fa fa-star-o"></i>
                                        </div>
                                        <div class="product_price">
                                            <span class="regular_price">$67.50</span>
                                            <span class="old_price">$62.23</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="single_small_product ">
                                    <div class="product_thumb">
                                        <a href="#">
                                            <img src="assets/img/product/10.jpg" alt="">
                                        </a>
                                    </div>
                                    <div class="product_content">
                                        <h4><a href="product-details.html">Donec sem tellus</a></h4>
                                        <div class="product_ratting">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <div class="product_price">
                                            <span class="regular_price">$65.50</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Best seller product  end-->

        <!--Brand logo start-->
        <div class="brand_logo">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="brand_list_carousel owl-carousel">
                            <div class="single_brand_logo">
                                <a href="#">
                                    <img src="assets/img/brand/1.png" alt="brand logo">
                                </a>
                            </div>
                            <div class="single_brand_logo">
                                <a href="#">
                                    <img src="assets/img/brand/2.png" alt="brand logo">
                                </a>
                            </div>
                            <div class="single_brand_logo">
                                <a href="#">
                                    <img src="assets/img/brand/3.png" alt="brand logo">
                                </a>
                            </div>
                            <div class="single_brand_logo">
                                <a href="#">
                                    <img src="assets/img/brand/4.png" alt="brand logo">
                                </a>
                            </div>
                            <div class="single_brand_logo">
                                <a href="#">
                                    <img src="assets/img/brand/5.png" alt="brand logo">
                                </a>
                            </div>
                            <div class="single_brand_logo">
                                <a href="#">
                                    <img src="assets/img/brand/1.png" alt="brand logo">
                                </a>
                            </div>
                            <div class="single_brand_logo">
                                <a href="#">
                                    <img src="assets/img/brand/2.png" alt="brand logo">
                                </a>
                            </div>
                            <div class="single_brand_logo">
                                <a href="#">
                                    <img src="assets/img/brand/3.png" alt="brand logo">
                                </a>
                            </div>
                            <div class="single_brand_logo">
                                <a href="#">
                                    <img src="assets/img/brand/4.png" alt="brand logo">
                                </a>
                            </div>
                            <div class="single_brand_logo">
                                <a href="#">
                                    <img src="assets/img/brand/5.png" alt="brand logo">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Brand logo end-->








@endsection

