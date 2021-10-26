 @extends('layouts.frontend')
 @section('styles')
 <!-- Css Alert -->
 <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />
 <!-- Default theme -->
 <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css" />

 <link rel="stylesheet" href="{{asset('FrontEnd/assets/css/panigation.css')}}">
 @endsection
 @section('content')


 <!-- Nav Page start-->

 <div class="container mb-3">
     <div class="breadcrumb_container">
         <div class="row">
             <div class="col-12">
                 <nav>
                     <ul>
                         <li>
                             <a href="{{route('frontend.index')}}">Trang chủ ></a>
                         </li>
                         <li>Cửa hàng</li>
                     </ul>
                 </nav>
             </div>
         </div>
     </div>
 </div>
 <!--- Nav Page end -->

 <!--- shop_wrapper area  -->
 <div class="container">
     <div class="row">
         <div class="col-lg-3 col-md-8 col-12">
             <div class="shop_sidebar">
                 <div class="block_categories">
                     <div class="category_top_menu widget">
                         <div class="widget_title">
                             <h3>Danh mục </h3>
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
                                 </ul>
                             </div>
                             <div class="tab_menu_right">
                                 <p></p>
                             </div>
                         </div>
                     </div>
                     <div class="col-lg-6 col-md-5 col-sm-6">
                         <div class="Relevance">
                             <span>Phân loại:</span>
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
                 <div class="tab-content">
                     <div class="tab-pane fade show active" id="shop_active">
                         <div class="row product-content">
                             @foreach ($products as $pro )
                             <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 product">
                                 <div class="single__product">
                                     <div class="single_product__inner">
                                         <span class="new_badge">Mới</span>
                                         <span class="discount_price">-5%</span>
                                         <div class="product_img">
                                             <a href="#">
                                                 <img src="{{url('img/products',$pro->product_image)}} " height="170px"
                                                     width="auto" alt="">
                                             </a>
                                         </div>
                                         <div class="product__content text-center">
                                             <div class="produc_desc_info">
                                                 <div class="product_title">
                                                     <h4><a href="product-details.html">{{$pro->product_name}}</a>
                                                     </h4>
                                                 </div>
                                                 <div class="product_price">
                                                     <input type="hidden" min="1" value="1" name="quantity_modal"
                                                         class="cart-plus-minus-box quantity">
                                                     <p>{{number_format($pro->product_price)}} Vnd</p>
                                                 </div>
                                             </div>
                                             <div class="product__hover">
                                                 <ul>
                                                     <li><a data-id="{{$pro->id}}" href="javascript:" class="add__cart"
                                                             role="button"><i class="ion-android-cart"></i></a>
                                                     </li>
                                                     <li><a class="cart-fore" href="#" data-toggle="modal"
                                                             href="javascript:" data-target="#my_modal{{$pro->id}}"
                                                             title="Xem nhanh"><i class="ion-android-open"></i></a>
                                                     </li>
                                                     <li><a href="{{route('details.product',$pro->id)}}"><i
                                                                 class="ion-clipboard"></i></a>
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
                             Hiện thị 12 sản phẩm
                         </div>
                     </div>
                     <div class="col-lg-6 offset-lg-2 col-md-6 col-sm-6">
                         <div class="page_list_clearfix text-center">
                             <div class="pagination">
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </div>
 <!--- shop_wrapper area end  -->

 <!-- modal area start -->
 @foreach ($products as $pro )

 <div class="modal fade" id="my_modal{{$pro->id}}" tabindex="-1" role="dialog" aria-hidden="true">
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
                                             <a href="#"><img src="{{url('/img/products',$pro->product_image)}}"
                                                     alt=""></a>
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
                                         {{-- <span class="regular">$64.99</span> --}}
                                         <span class="regular_price">{{$pro->product_price}}</span>
                                     </div>
                                     <div class="product_information product_modal">
                                         <div id="product_modal_content">
                                             <p>Gạo trồng theo phương thức hiện đại, dẻo, thơm, ngon.</p>
                                         </div>
                                         <div class="product_variants">
                                             <div class="quickview_plus_minus">
                                                 <span class="control_label">Số lượng</span>
                                                 <div class="quickview_plus_minus_inner">
                                                     <div class="cart-plus-minus">
                                                         <input type="number" min="1" value="1" name="quantity_modal"
                                                             class="cart-plus-minus-box quantity">
                                                     </div>
                                                     <div class="add_button add_modal">
                                                         <button type="button" class="btn_add_cart"
                                                             data-id="{{$pro->id}}"> Thêm giỏ hàng</button>
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
 @section('scripts')
 <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
 <script src="{{asset('FrontEnd/assets/js/panigation.js')}}"></script>


 <script>
     //Add to cart index shop
     $(".add__cart").on('click', function (e) {
         e.preventDefault();
         let id = $(this).data("id");
         let quantity = $(this).parents(".single__product").find('input.quantity').val();
         //  console.log(quantity);
         $.ajax({
             type: "GET",
             url: "add-to-cart/" + id,
             data: {
                 id: id,
                 quantity: quantity
             },
             success: function (repsonse) {
                 $("#cart-icon").load(" #cart-icon");
                 // $("#change-item-cart").html(repsonse);
                 $("#change-item-cart").load(" #change-item-cart");
                 alertify.set('notifier', 'position', 'bottom-right');
                 alertify.success('You have successfully added!');
             }
         });
     });

     //Add to cart modal


     $(".btn_add_cart").on('click', function (e) {
         e.preventDefault();
         let id = $(this).data("id");
         let quantity = $(this).parents(".quickview_plus_minus_inner").find('input.quantity').val();
         $.ajax({
             method: "GET",
             url: "add-to-cart/" + id,
             data: {
                 id: id,
                 quantity: quantity
             },
             success: function (data) {
                 $("#cart-icon").load(" #cart-icon");
                 $("#change-item-cart").load(" #change-item-cart");
                 alertify.set('notifier', 'position', 'bottom-right');
                 alertify.success('You have successfully added!');
             }
         });

     });





     //  $(".mini_cart_checkout").on('click', "a", function (e) {
     //      e.preventDefault();
     //      $.ajax({
     //          method: "get",
     //          url: "check-out",
     //          success: function (response) {
     //              if (response.message == "error") {
     //                  alert('Do not have any products');
     //              }
     //          }
     //      });
     //  });
 </script>
 @endsection
