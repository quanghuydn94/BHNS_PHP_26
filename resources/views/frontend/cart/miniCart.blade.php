 @if (session('cart'))
 @php $total = 0 @endphp
 @foreach (session('cart') as $id => $details )
 <div class="mini_cart_item">
     <div class="mini_cart_img">
         <a href="#">
             <img src="{{url('img/products', $details['image'])}}" width="50px" height="50px">
             <span class="cart_count">{{$details['quantity']}}</span>
         </a>
     </div>
     <div class="cart_info">
         <h5><a href="product-details.html">{{$details['name']}}</a>
         </h5>
         <span class="cart_price">{{number_format($details['price'])}}</span>
     </div>
     <div class="cart_remove">
         <a href="#"><i class="zmdi zmdi-delete"></i></a>
     </div>
 </div>

 @endforeach
 @endif
 <div class="price_content">
     @php $total = 0 @endphp
     @foreach ((array) session('cart') as $id => $details )
     @php
     $total += $details['price'] * $details['quantity'];
     @endphp
     @endforeach

     <div class="cart-total-price">
         <span class="label">Total </span>
         <span class="value">{{number_format($total)}}Vnd</span>
     </div>
 </div>
