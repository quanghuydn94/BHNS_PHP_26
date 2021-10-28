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
                        Trở thành thành viên?
                        <a class="Returning text-success" href="#">Nhấp vào đây để đăng ký</a>

                    </h3>
                </div>
            </div>
        </div>
        <div class="checkout-form">
            <form action="{{route('paybycash.cart')}}" method="POST">
            <div class="row">
                @if(Auth::user() == null)
                    <div class="col-lg-6 col-md-6">
                        @csrf
                        <h3>Chi tiết đơn hàng</h3>
                        @if ($errors->any())
                        <div class="alert alert-warning">
                            @foreach ($errors->all() as $error)
                            {{ $error }}<br />
                            @endforeach
                        </div>
                        @endif
                        <div class="row">
                            <div class="col-lg-6 mb-30">
                                <label for="b_name">Tên khách hàng<span>*</span></label>
                                <input id="b_name" type="text" name="name">
                            </div>
                            <div class="col-12 mb-30">
                                <label>Địa chỉ <span>*</span></label>
                                <input placeholder="Tên đường( Thôn)/ Phường( Xã)/ Quận( Huyện)/ Thành phố (Tỉnh)" type="text" name="address">
                            </div>
                            <div class="col-lg-6 mb-30">
                                <label for="b_email">Địa chỉ Email<span>*</span></label>
                                <input id="b_email" type="text" name="email" placeholder="a@google.com">
                            </div>
                            <div class="col-lg-6 mb-30">
                                <label>Số điện thoại <span>*</span></label>
                                <input placeholder="Phone Number" type="text" name="phone">
                            </div>
                            <div class="col-12 mb-30">
                                <input id="b_c_account" type="checkbox" data-target="createp_account" />
                                <label class="righ_0" for="b_c_account" data-toggle="collapse"
                                    data-target="#collapseOne" aria-controls="collapseOne">Tạo tài khoản</label>

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
                                    <label for="order_note">Ghi chú</label>
                                    <textarea id="order_note" name="customer_name"
                                        placeholder="Ghi chú thông tin cần thiết về đơn hàng của bạn, quan trọng cho việc giao hàng"></textarea>
                                </div>
                            </div>
                        </div>

                    </div>
                @endif
                    <div class="col-lg-6 col-md-6">
                        <div class="order-wrapper">
                            <h3>Đơn hàng của bạn</h3>
                            <div class="order-table table-responsive mb-30">
                                <table>
                                    <thead>
                                        <tr>
                                            <th class="product-name">Sản Phẩm</th>
                                            <th class="product-total">Tổng tiền</th>
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
                                            <th>Tổng tiền giỏ hàng</th>
                                            <td>{{number_format($total)}}Vnd</td>
                                        </tr>
                                        <tr>
                                            <th>Tổng tiền đơn hàng (phụ phí)</th>
                                            <td><strong>{{number_format($total*1.05)}} Vnd(VAT: 5%)</strong></td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <div class="payment-method d-flex justify-content-center">
                                <form action="{{route('paybycash.cart')}}" method="POST">
                                    @csrf
                                    <div class="order-button1 mr-2">
                                        <button type="submit">Thanh toán (Tiền mặt)</button>
                                    </div>
                                </form>
                                <div class="order-button2">
                                    <a  href="{{route('payonline.cart')}}" class="text-white">Thanh toán Online </a>
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
@if(session()->get('orders'))
<script>

   swal({title: "Thành công",
                text: "Đơn hàng của bạn đã được đặt",
                icon: "success",
                button: "Quay lại"}).then(function() {
            window.location = "{{route('shop.index')}}";
        });


</script>
@endif
@endsection