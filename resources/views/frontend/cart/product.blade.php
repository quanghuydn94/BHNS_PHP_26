@extends('frontend.cart.shop')
@section('content')
<!--- shop_wrapper area  -->
<div class="container">
    <div class="row">
        <div class="col-lg-3 col-md-8 col-12">
            <div class="shop_sidebar">
                <div class="block_categories">
                    <div class="category_top_menu widget">
                        <div class="widget_title">
                            <h3>Danh mục</h3>
                        </div>
                        <ul class="shop_toggle">

                            <li class="has-sub"><a href="#">Rau tươi </a>
                                <ul class="categorie_sub">
                                    <li><a href="#">Dưa leo</a></li>
                                    <li><a href="#">Cà chùa</a></li>
                                    <li><a href="#">Khoai tây</a></li>
                                    <li><a href="#">Hành</a></li>
                                </ul>

                            </li>

                            <li class="has-sub"><a href="#">Trái cây </a>
                                <ul class="categorie_sub">
                                    <li><a href="#">Chuối</a></li>
                                    <li><a href="#">Cam</a></li>
                                    <li><a href="#">Sầu riêng</a></li>
                                </ul>

                            </li>


                        </ul>
                    </div>
                </div>
                <div class="search_filters_wrapper">
                    <div class="price_filter widget">
                        <div class="widget_title">
                            <h3>Lọc theo giá</h3>
                        </div>
                        <div class="search_filters widget">
                            <div id="slider-range"></div>
                            <input type="text" name="text" id="amount" />
                        </div>
                    </div>

                    <div class="size_clearfix widget  mb-30">
                        <div class="widget_title">
                            <h3>Kích thước</h3>
                        </div>
                        <ul>
                            <li>
                                <input id="facet_size" type="checkbox">
                                <label for="facet_size">S (11)</label>
                            </li>

                            <li>
                                <input id="facet_size_one" type="checkbox">
                                <label for="facet_size_one">M(11)</label>
                            </li>
                            <li>
                                <input id="facet_size_two" type="checkbox">
                                <label for="facet_size_two">L(11)</label>
                            </li>
                        </ul>
                    </div>



                    <div class="Compositions widget mb-30">
                        <div class="widget_title">
                            <h3>Properties</h3>
                        </div>
                        <ul>
                            <li>
                                <input type="checkbox" id="pro1">
                                <label for="pro1"> Colorful Dress(6)</label>
                            </li>
                            <li>
                                <input type="checkbox" id="pro2">
                                <label for="pro2"> Maxi Dress(2)</label>
                            </li>
                            <li>
                                <input type="checkbox" id="pro3">
                                <label for="pro3">Midi Dress(4)</label>
                            </li>
                            <li>
                                <input type="checkbox" id="pro4">
                                <label for="pro4">Short Dress(7)</label>
                            </li>
                            <li>
                                <input type="checkbox" id="pro5">
                                <label for="pro5">Short Sleeve(4)</label>
                            </li>

                        </ul>

                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-9 col-md-12 col-12">
            <div class="categories_banner">
                <div class="categories_banner_inner">
                    <img src="assets/img/banner/shop.jpg" alt="">
                </div>
                <h3>Cửa hàng</h3>
            </div>
            <div class="tav_menu_wrapper">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-7 col-sm-6">
                        <div class="tab_menu shop_menu">
                            <div class="tab_menu_inner">
                                <ul class="nav" role="tablist">
                                    <li><a class="active" data-toggle="tab" href="#shop_active" role="tab"
                                            aria-controls="shop_active" aria-selected="true"><i class="fa fa-th"
                                                aria-hidden="true"></i></a></li>

                                    <li><a data-toggle="tab" href="#featured_active" role="tab"
                                            aria-controls="featured_active" aria-selected="false"><i class="fa fa-list"
                                                aria-hidden="true"></i></a></li>
                                </ul>
                            </div>
                            <div class="tab_menu_right">
                                <p>There are 14 products.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-5 col-sm-6">
                        <div class="Relevance">
                            <span>Sort by:</span>
                            <div class="dropdown dropdown-shop">
                                <select name="drop" id="dropdown">
                                    <option value="1">Relevance</option>
                                    <option value="2">Name, A to Z</option>
                                    <option value="2">Name, Z to A</option>
                                    <option value="2">Price, low to high</option>
                                    <option value="2">Price, high to low</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab_product_wrapper">
                @yield('main')
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="shop_active">
                        <div class="row">
                            @foreach ($products as $pro )
                            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                                <div class="single__product">
                                    <div class="single_product__inner">
                                        <span class="new_badge">new</span>
                                        <span class="discount_price">-5%</span>
                                        <div class="product_img">
                                            <a href="#">
                                                <img src="{{url('img/products',$pro->product_image)}} " height="200px"
                                                    width="auto" alt="">
                                            </a>
                                        </div>
                                        <div class="product__content text-center">
                                            <div class="produc_desc_info">
                                                <div class="product_title">
                                                    <h4><a href="product-details.html">{{$pro->product_name}}</a>
                                                    </h4>
                                                </div>
                                                {{-- <div class="product_qty">
                                                    <input type="hidden" value="1" id="product_qty">
                                                </div> --}}
                                                <div class="product_price">
                                                    <p>{{number_format($pro->product_price)}} Vnd</p>
                                                </div>
                                            </div>
                                            <div class="product__hover">
                                                <ul>

                                                    <li><a href="{{route('add.to.cart',['id'=>$pro->id])}}" role="button"  ><i class="ion-android-cart"></i></a>
                                                    </li>
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

            <div class="shop_pagination">
                <div class="row align-items-center">
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="total_item_shop">
                            Showing 13-14 of 14 item(s)
                        </div>
                    </div>
                    <div class="col-lg-6 offset-lg-2 col-md-6 col-sm-6">
                        <div class="page_list_clearfix text-center">
                            <ul>
                                <li class="prev"><a href="#"><i class="zmdi zmdi-chevron-left"></i>
                                        Previous</a></li>
                                <li><a href="#">1</a></li>
                                <li class="current_page"><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li class="next"><a href="#"> Next <i class="zmdi zmdi-chevron-right"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--- shop_wrapper area end  -->


<!-- modal area start -->

<div class="modal fade" id="my_modal" tabindex="-1" role="dialog" aria-hidden="true">
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
                                    <div class="tab-pane fade show active" id="imgeone" role="tabpanel">
                                        <div class="product_tab_img">
                                            <a href="#"><img src="assets/img/cart/nav12.jpg" alt=""></a>
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
                                        <li>
                                            <a class="nav-link active" data-toggle="tab" href="#imgeone" role="tab"
                                                aria-controls="imgeone" aria-selected="false"><img
                                                    src="assets/img/cart/nav.jpg" alt=""></a>
                                        </li>
                                        <li>
                                            <a class="nav-link" data-toggle="tab" href="#imgetwo" role="tab"
                                                aria-controls="imgetwo" aria-selected="false"><img
                                                    src="assets/img/cart/nav1.jpg" alt=""></a>
                                        </li>
                                        <li>
                                            <a class="nav-link button_three" data-toggle="tab" href="#imgethree"
                                                role="tab" aria-controls="imgethree" aria-selected="false"><img
                                                    src="assets/img/cart/nav2.jpg" alt=""></a>
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
                                        <span class="regular">$64.99</span>
                                        <span class="regular_price">$78.99</span>
                                    </div>
                                    <div class="product_information product_modal">
                                        <div id="product_modal_content">
                                            <p>Short-sleeved blouse with feminine draped sleeve detail.</p>
                                        </div>
                                        <div class="product_variants">
                                            <div class="product_variants_item modal_item">
                                                <span class="control_label">Size</span>
                                                <select id="group_1">
                                                    <option value="1">S</option>
                                                    <option value="2" selected="selected">M</option>
                                                    <option value="3">L</option>
                                                </select>
                                            </div>

                                            <div class="quickview_plus_minus">
                                                <span class="control_label">Quantity</span>
                                                <div class="quickview_plus_minus_inner">
                                                    <div class="cart-plus-minus">
                                                        <input type="text" value="02" name="qtybutton"
                                                            class="cart-plus-minus-box">
                                                    </div>
                                                    <div class="add_button add_modal">
                                                        <button type="submit"> Add to cart</button>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="cart_description">
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
                                                    eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim
                                                    ad minim veniam,</p>
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
                                <h3>Share this product</h3>
                                <ul>
                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                                    <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script type="text/javascript">

    // function addCart(event) {
    //     // event.preventDefault();
    //     let product_qty = $(this).parent('.product_qty').find('input#product_qty').val();
    //     // let urlCart = $(this).data('url');
    //     // $.ajax({
    //     //     type: "GET",
    //     //     url: urlCart,
    //     //     data: {
    //     //         product_qty: product_qty
    //     //     },
    //     //     dataType: "json",
    //     //     success: function (data) {
    //     //         if(data.code === 200) {
    //     //             // window.location.reload();
    //     //             alertify.success('Product added to cart successfully!');
    //     //         }
    //     //     }
    //     // });
    //      alertify.success('Product added to cart successfully!');
    // }
    // $(function () {
    //     $('#add-to-cart').on('click', addCart)
    // });

</script>
@endsection
