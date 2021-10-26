@extends('layouts.frontend')
@section('content')
<!--Checkout page section-->
<div class="Checkout_page_section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="customer-login mb-40">
                    <h3>
                        <i class="fa fa-file-o" aria-hidden="true"></i>
                        Returning customer?
                        <a class="Returning" href="#" data-toggle="collapse" data-target="#Returning_customer"
                            aria-expanded="true">Click here to login</a>

                    </h3>
                    <div id="Returning_customer" class="collapse" data-parent="#accordion">
                        <div class="card-bodyfive">
                            <div class="col-12">
                                <p>Quisque gravida turpis sit amet nulla posuere lacinia. Cras sed est sit amet ipsum
                                    luctus..</p>
                            </div>
                            <div class="col-lg-4">
                                <form action="#">
                                    <div class="Returning_cart_body mb-20">
                                        <label for="b_names">Username or email <span>*</span></label>
                                        <input id="b_names" type="text">
                                    </div>
                                    <div class="Returning_cart_body mb-20">
                                        <label for="names">Password <span>*</span></label>
                                        <input id="names" type="text">
                                    </div>
                                    <div class="Returning_cart_body returning_three login mb-20">
                                        <input value="Login" type="submit">
                                        <label for="remember-me-box">
                                            <input id="remember-me-box" type="checkbox">
                                            Remember me
                                        </label>
                                    </div>
                                    <a href="#">Lost your password?</a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="checkout-form">
            <form action="{{route('paybycash.cart')}}" method="POST">
            <div class="row">
                @if(Auth::user() == null)
                    <div class="col-lg-6 col-md-6">
                        @csrf
                        <h3>Billing Details</h3>
                        @if ($errors->any())
                        <div class="alert alert-warning">
                            @foreach ($errors->all() as $error)
                            {{ $error }}<br />
                            @endforeach
                        </div>
                        @endif
                        <div class="row">
                            <div class="col-lg-6 mb-30">
                                <label for="b_name">Customers Name <span>*</span></label>
                                <input id="b_name" type="text" name="name">
                            </div>
                            <div class="col-12 mb-30">
                                <label>Address <span>*</span></label>
                                <input placeholder="Street/District/City" type="text" name="address">
                            </div>
                            <div class="col-lg-6 mb-30">
                                <label for="b_email">Email Address <span>*</span></label>
                                <input id="b_email" type="text" name="email" placeholder="a@google.com">
                            </div>
                            <div class="col-lg-6 mb-30">
                                <label>Phone <span>*</span></label>
                                <input placeholder="Phone Number" type="text" name="phone">
                            </div>
                            <div class="col-12 mb-30">
                                <input id="b_c_account" type="checkbox" data-target="createp_account" />
                                <label class="righ_0" for="b_c_account" data-toggle="collapse"
                                    data-target="#collapseOne" aria-controls="collapseOne">Create an account?</label>

                                <div id="collapseOne" class="collapse" data-parent="#accordion">
                                    <div class="card-body1">
                                        <p>Create an account by entering the information below. If you are a returning
                                            customer please login at the top of the page.</p>
                                        <label for="b_a_password">Account password <span>*</span></label>
                                        <input id="b_a_password" type="password" name="password">
                                    </div>
                                    <div class="card-body1">

                                        <label for="b_a_password">Confirm password <span>*</span></label>
                                        <input id="b_a_password" type="password" name="password_confirmation">
                                    </div>
                                </div>

                            </div>
                            <div class="col-12">
                                <div class="order-notes">
                                    <label for="order_note">Order Notes</label>
                                    <textarea id="order_note" name="customer_name"
                                        placeholder="Notes about your order, e.g. special notes for delivery."></textarea>
                                </div>
                            </div>
                        </div>

                    </div>
                @endif
                    <div class="col-lg-6 col-md-6">
                        <div class="order-wrapper">
                            <h3>Your order</h3>
                            <div class="order-table table-responsive mb-30">
                                <table>
                                    <thead>
                                        <tr>
                                            <th class="product-name">Product</th>
                                            <th class="product-total">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                        $total= 0
                                        @endphp
                                        @foreach ($carts = Session::get('cart') as $id => $cart )

                                        <tr>
                                            <td class="product-name">{{$cart['name']}} x <strong class="bordered rounded text-white bg-danger px-1">
                                                    {{$cart['quantity']}}</strong></td>
                                            <td class="amount">{{number_format($cart['price']*$cart['quantity'])}}Vnd
                                            </td>
                                        </tr>
                                        @php
                                        $total += $cart['price']*$cart['quantity']
                                        @endphp
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Cart Subtotal</th>
                                            <td>{{number_format($total)}}Vnd</td>
                                        </tr>
                                        <tr>
                                            <th>Order Total</th>
                                            <td><strong>{{number_format($total*1.05)}} Vnd(VAT: 5%)</strong></td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <div class="payment-method d-flex justify-content-center">
                                {{-- <form action="{{route('paybycash.cart')}}" method="POST">
                                    @csrf --}}
                                    <div class="order-button1 mr-2">
                                        <button type="submit">Pay by Cash</button>
                                    </div>
                                {{-- </form> --}}
                                <div class="order-button2">
                                    <button type="submit" name="payonline">Pay Online</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!--Checkout page section end-->
@endsection
@section('scripts')
<script src="https://unpkg.com/sweetalert@2.1.2/dist/sweetalert.min.js"></script>

@if(session()->get('haveordered'))
<script>
    swal("Goods job", "Order has been booked successfully", "success");
</script>
@endif
@endsection
