@extends('layouts.frontend')
@section('content')
                <!--breadcrumb area start-->
                <div class="breadcrumb_container">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <nav>
                            <ul>
                                <li>
                                    <a href="index.html">Trang chủ ></a>
                                </li>
                                <li>Thông tin sản phẩm</li>
                            </ul>
                        </nav>
                            </div>
                        </div>
                    </div>
                </div>
                 <!--breadcrumb area end-->


                <!-- primary block area -->
                <div class="table_primary_block pt-100">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-5 col-md-5 col-sm-12">
                                <div class="product-flags">
                                    <div class="tab-content">
                                        <div class="tab-pane fade show active" id="tabone" role="tabpanel" >
                                            <div class="product_tab_img">
                                                <a href="#"><img src="{{url('img/products',$product->product_image)}}" alt=""></a>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="tabtwo" role="tabpanel">
                                            <div class="product_tab_img">
                                                <a href="#"><img src="assets/img/cart/nav11.jpg" alt=""></a>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="tabthree" role="tabpanel">
                                            <div class="product_tab_img">
                                                <a href="#"><img src="assets/img/cart/nav13.jpg" alt=""></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="products_tab_button">
                                        <ul class="nav product_navactive" role="tablist">
                                            <li  class="product_button_one">
                                                <a class="nav-link active"  data-toggle="tab" href="#tabone" role="tab" aria-controls="imgeone" aria-selected="false"><img src="assets/img/cart/nav.jpg" alt=""></a>
                                            </li>
                                            <li>
                                                 <a class="nav-link" data-toggle="tab" href="#tabtwo" role="tab" aria-controls="imgetwo" aria-selected="false"><img src="assets/img/cart/nav1.jpg" alt=""></a>
                                            </li>
                                            <li>
                                               <a class="nav-link" data-toggle="tab" href="#tabthree" role="tab" aria-controls="imgethree" aria-selected="false"><img src="assets/img/cart/nav2.jpg" alt=""></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-7 col-md-7 col-sm-12">
                                <div class="product__details_content">
                                    <div class="demo_product">
                                        <h2>{{$product->product_name}}</h2>
                                    </div>
                                    <div class="product_comments_block">
                                        <div class="comments_note clearfix">
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                        </div>
                                        <div class="comments_advices">
                                            <ul>
                                                <li><a href="#"><i class="fa fa-comment-o" aria-hidden="true"></i>
                                                 Đọc bình luận (<span>1</span>)</a></li>

                                            </ul>
                                        </div>
                                    </div>
                                    <div class="current_price">
                                        <span>{{number_format($product->product_price)}} Vnd</span>
                                    </div>
                                    <div class="product_information">
                                        <div id="product_description_short">
                                            <p>{{$product->product_description}}</p>
                                        </div>
                                        <div class="product_variants">
                                            <div class="quickview_plus_minus">
                                                <span class="control_label">Số lượng</span>
                                                <div class="quickview_plus_minus_inner">
                                                    <div class="cart-plus-minus">
                                                        <input type="text" value="1" name="qtybutton" class="cart-plus-minus-box">
                                                    </div>
                                                    <div class="add_button">
                                                        <button type="submit"> Thêm giỏ hàng</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="product-availability">
                                                <span id="availability">
                                                    <i class="zmdi zmdi-check"></i>
                                                     Kho Hàng
                                                </span>
                                            </div>
                                            <div class="social-sharing">
                                               <span>Chia sẻ</span>
                                                <ul>
                                                    <li><a href="https://facebook.com"><i class="fa fa-facebook text-primary" aria-hidden="true"></i></a></li>
                                                    <li><a href="https://twitter.com"><i class="fa fa-twitter text-white bg-primary" aria-hidden="true"></i></a></li>
                                                    <li><a href="https://google.com"><i class="fa fa-google-plus text-danger" aria-hidden="true"></i></a></li>
                                                </ul>
                                            </div>
                                            <div class="block-reassurance">
                                                <ul>
                                                    <li>
                                                        <img src="assets/img/cart/cart1.png" alt="">
                                                        <span>Bảo mật thông tin</span>
                                                    </li>
                                                    <li>
                                                        <img src="assets/img/cart/cart2.png" alt="">
                                                        <span>Giao hàng nhanh</span>
                                                    </li>
                                                    <li>
                                                        <img src="assets/img/cart/cart3.png" alt="">
                                                        <span>Đổi trả (Theo yêu cầu từ khách hàng)</span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- primary block end -->

                <!-- product page tab -->

                <div class="product_page_tab ptb-100">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <div class="product_tab_button">
                                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                                        <li>
                                            <a class=" tav_past active" id="home-tab" data-toggle="tab" href="#Description" role="tab" aria-controls="Description" aria-selected="true">Mô tả</a>
                                        </li>
                                        <li>
                                            <a class=" tav_past"  id="profile-tab" data-toggle="tab" href="#details" role="tab" aria-controls="details" aria-selected="false">Thông tin</a>
                                        </li>
                                       <li>
                                            <a class=" tav_past"  id="contact-tab" data-toggle="tab" href="#Reviews" role="tab" aria-controls="Reviews" aria-selected="false">Đánh giá</a>
                                       </li>
                                    </ul>
                                </div>
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade show active" id="Description" role="tabpanel" >
                                        <div class="product-description">
                                            <p>Fashion has been creating well-designed collections since 2010. The brand offers feminine designs delivering stylish separates and statement dresses which have since evolved into a full ready-to-wear collection in which every item is a vital part of a woman's wardrobe. The result? Cool, easy, chic looks with youthful elegance and unmistakable signature style. All the beautiful pieces are made in Italy and manufactured with the greatest attention. Now Fashion extends to a range of accessories including shoes, hats, belts and more!</p>
                                       </div>
                                    </div>
                                    <div class="tab-pane fade" id="details" role="tabpanel">
                                        <div class="product-details">
                                            <div class="product-manufacturer">
                                                <a href="#"><img src="assets/img/cart/11.jpg" alt=""></a>
                                            </div>
                                            <div class="product-reference">
                                                <label class="label">Reference </label>
                                                <span>demo_10</span>
                                            </div>
                                            <div class="product-quantities">
                                                <label class="label">In stock</label>
                                                <span>321 Items</span>
                                            </div>
                                            <div class="product-out-of-stock">
                                                <section class="product-features">
                                                    <h3>Data sheet</h3>
                                                    <dl class="data-sheet">
                                                        <dt class="name">Compositions</dt>
                                                        <dd class="value">Viscose</dd>
                                                        <dt class="name">Styles</dt>
                                                        <dd class="value">Dressy</dd>
                                                        <dt class="name">Properties</dt>
                                                        <dd class="value">Short Dress</dd>
                                                    </dl>
                                                </section>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="Reviews" role="tabpanel">
                                        <div class="product_comments_block_tab">
                                            <div class="comment_clearfix">
                                                <div class="comment_author">
                                                    <span>Grade </span>
                                                    <div class="star_content clearfix">
                                                        <ul>
                                                            <li><i class="fa fa-star"></i></li>
                                                            <li><i class="fa fa-star"></i></li>
                                                            <li><i class="fa fa-star"></i></li>
                                                            <li><i class="fa fa-star"></i></li>
                                                            <li><i class="fa fa-star"></i></li>
                                                        </ul>
                                                    </div>

                                                </div>
                                                 <div class="comment_author_infos">
                                                     <strong>posthemes </strong>
                                                     <br>
                                                    <em>05/08/2018</em>
                                                </div>
                                                <div class="comment_details">
                                                    <h4>Demo</h4>
                                                    <p>themes</p>
                                                </div>
                                                <div class="review">
                                                    <p><a href="#">Write your review !</a></p>
                                                </div>
                                            </div>
                                        </div>
                                   </div>
                                </div>
                            </div>
                         </div>
                    </div>
                </div>
                <!-- product page tab end -->

                <!--Features product area-->
                <div class="features_product">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <div class="section_title text-left">
                                    <h3> Sản Phẩm Liên Quan </h3>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="related_product_active owl-carousel">
                                @foreach ($relatedProduct as $pro )


                                <div class="col-lg-2">
                                    <div class="single__product">
                                        <div class="single_product__inner">
                                            <span class="new_badge">new</span>
                                            <div class="product_img">
                                            <a href="#">
                                                <img src="{{url('img/products',$pro->product_image)}}" height="170px" alt="">
                                                </a>
                                            </div>
                                            <div class="product__content text-center">
                                                <div class="produc_desc_info">
                                                    <div class="product_title">
                                                        <h4><a href="product-details.html">{{$pro->product_name}}</a></h4>
                                                    </div>
                                                    <div class="product_price">
                                                        <p>{{number_format($pro->product_price)}}</p>
                                                    </div>
                                                </div>
                                                <div class="product__hover">
                                                    <ul>
                                                        <li><a href="#"><i class="ion-android-cart"></i></a></li>
                                                          <li><a class="cart-fore" href="#" data-toggle="modal" data-target="#my_modal{{$pro->id}}"  title="Xem nhanh" ><i class="ion-android-open"></i></a></li>
                                                        <li><a href="product-details.html"><i class="ion-clipboard"></i></a></li>
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

            <!-- modal area start -->
            @foreach ($relatedProduct as $pro )


            <div class="modal fade" id="my_modal{{$pro->id}}" tabindex="-1" role="dialog"  aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                        <div class="modal-body shop">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-5 col-md-5 col-sm-12">
                                        <div class="product-flags madal">
                                            <div class="tab-content" id="pills-tabContent">
                                                <div class="tab-pane fade show active" id="imgeone" role="tabpanel" >
                                                    <div class="product_tab_img">
                                                        <a href="#"><img src="{{url('img/products',$pro->product_image)}}" alt=""></a>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="imgetwo" role="tabpanel">
                                                    <div class="product_tab_img">
                                                        <a href="#"><img src="assets/img/cart/nav11.jpg" alt=""></a>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="imgethree" role="tabpanel">
                                                    <div class="product_tab_img">
                                                        <a href="#"><img src="assets/img/cart/nav13.jpg" alt=""></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="products_tab_button  modals">
                                                <ul class="nav product_navactive" role="tablist">
                                                    <li >
                                                        <a class="nav-link active" data-toggle="tab" href="#imgeone" role="tab" aria-controls="imgeone" aria-selected="false"><img src="assets/img/cart/nav.jpg" alt=""></a>
                                                    </li>
                                                    <li>
                                                         <a class="nav-link" data-toggle="tab" href="#imgetwo" role="tab" aria-controls="imgetwo" aria-selected="false"><img src="assets/img/cart/nav1.jpg" alt=""></a>
                                                    </li>
                                                    <li>
                                                       <a class="nav-link button_three" data-toggle="tab" href="#imgethree" role="tab" aria-controls="imgethree" aria-selected="false"><img src="assets/img/cart/nav2.jpg" alt=""></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-7 col-md-7 col-sm-12">
                                        <div class="modal_right">
                                            <div class="shop_reviews">
                                                <div class="demo_product">
                                                    <h2>{{$pro->product_name}}</h2>
                                                </div>
                                                <div class="current_price">
                                                    <span class="regular">{{number_format($pro->product_price)}}Vnd</span>
                                                </div>
                                                <div class="product_information product_modal">
                                                    <div id="product_modal_content">
                                                        <p>{{$pro->product_description}}</p>
                                                    </div>
                                                    <div class="product_variants">
                                                       <div class="quickview_plus_minus">
                                                            <span class="control_label">Số lượng</span>
                                                            <div class="quickview_plus_minus_inner">
                                                                <div class="cart-plus-minus">
                                                                    <input type="text" value="01" name="qtybutton" class="cart-plus-minus-box">
                                                                </div>
                                                               <div class="add_button add_modal">
                                                                    <button type="submit"> Thêm giỏ hàng</button>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="cart_description">
                                                            <p>{{$pro->product_description}}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="social-share">
                                            <h3>Chia sẻ sản phẩm này</h3>
                                            <ul>
                                                <li><a href="https://facebook.com"><i class="fa fa-facebook"></i></a></li>
                                                <li><a href="https://twitter.com"><i class="fa fa-twitter"></i></a></li>
                                                <li><a href="https://gmail.com"><i class="fa fa-google-plus"></i></a></li>
                                                <li><a href="https://www.linkedin.com/"><i class="fa fa-linkedin"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach


          <!-- modal area end -->

@endsection
