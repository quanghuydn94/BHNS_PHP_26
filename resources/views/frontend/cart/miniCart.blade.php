        <table data-url="{{ route('update.cart') }}" class="update_cart_url">
            <thead>
                <tr>
                    <th class="img-thumbnail">Image</th>
                    <th class="product-name">Product</th>
                    <th class="product-price">Price</th>
                    <th class="product-quantity">Quantity</th>
                    <th class="product-subtotal">Total</th>
                    <th class="product-remove">Remove</th>
                </tr>
            </thead>
            <tbody>
                @php $total = 0; $cartTotal= 0 @endphp
                @if (session()->get('cart') !== null)
                @foreach ($carts   as $id=>$cart )

                <tr data-id="{{ $id }}">
                    <td class="product-thumbnail"><img src="{{url('/img/products',$cart['image'])}}" width="70px"
                            height="auto" alt=""></td>
                    <td class="product-name"><a href="#">{{$cart['name']}}</a></td>
                    <td class="product-price"><span class="amount">{{number_format($cart['price'])}}</span></td>
                    <td data-th="Quantity" class="product-quantity">
                        <div class="quickview_plus_minus quick_cart">
                            <div class="quickview_plus_minus_inner">
                                <div class="cart-plus-minus cart_page">
                                    <input type="number" min="1" value="{{ $cart['quantity'] }}"
                                        class="form-control quantity " />
                                </div>
                            </div>
                        </div>
                    </td>
                    @php
                    $total = $cart['price'] * $cart['quantity'];
                    $cartTotal += $total;
                    @endphp
                    <td class="product-subtotal">{{number_format($total)}}</td>
                    <td class="product-update">
                        <a href="javascript:" data-id="{{$id}}" class="badge badge-primary update-cart mr-5">U</a>
                        <a href="javascript:" data-id="{{$id}}" class="badge badge-danger remove-from-cart">X</a>
                    </td>
                </tr>
                @endforeach
                @endif
            </tbody>
        </table>
