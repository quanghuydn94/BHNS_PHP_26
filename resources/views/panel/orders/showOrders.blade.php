@extends('layouts.panel')
@section('styles')
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">

<title>{{ config('app.name', 'Laravel') }}</title>

<!-- CSS -->
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
<link rel="stylesheet" href="{{asset('jquery-ui-1.13.0/jquery-ui.min.css')}}">
<link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">

@endsection
@section('content')
@if ($errors->any())
<div class="alert alert-warning">
    @foreach ($errors->all() as $error)
    {{ $error }}<br />
    @endforeach
</div>
@endif
<div class="container">
    <div class="card-header py-3">
        <p class="m-0 font-weight-bold text-primary">
            <a href="{{route('order.index')}}" class="border border-primary rounded text-decoration-none">
                Danh sách đơn hàng</a>
            <span> <i class="fas fa-chevron-right"></i>Thêm đơn hàng</span>
        </p>
    </div>
    <div class="card-body ">
        <form method="POST" action="{{ route('order.store') }}">

            <!--Form Orders  -->

            <table class="  table table-bordered text-monospace update_cart_url" data-url="{{route('updateCart')}}">
                <thead>
                    <tr>
                        <th>Tên sản phẩm</th>
                        <th>Giá sản phẩm(VNĐ)</th>
                        <th>Số lượng(Kg)</th>
                        <th>Tông tiền</th>
                        <th>Chức năng</th>

                    </tr>
                </thead>
                <tbody>
                    @php
                    $total = 0;
                    @endphp
                    @if (session()->get(key: 'cart') !== null)
                    @foreach ($carts = session()->get(key:'cart') as $id => $cart )
                    @php
                    $total += $cart['price'] * $cart['quantity'];
                    @endphp
                    <tr>
                        {{-- <td>{{$id}}</td> --}}
                        <td>{{$cart['name']}}</td>
                        <td>{{number_format($cart['price'])}}</td>
                        <td>
                            <input type="number" min="1" name="product_quantity" class="w-25 quatity"
                                value="{{$cart['quantity']}}">
                        </td>
                        <td> {{number_format($cart['price']*$cart['quantity'])}}</td>
                        <td><a href=" " data-id="{{$id}}" class="btn-sm btn-primary cart_update">Update</a></td>
                    </tr>
                    @endforeach
                    @endif
                </tbody>
            </table>
            <div class="card-footer">
                <h2 name="total_price">Tổng tiền: {{number_format($total)}} VNĐ</h2>
                <div class="mb-3 row ">
                    <label class="col-sm-2 col-form-label">Tên khách hàng</label>
                    <div class="col-sm-4">
                        <input name="customer_name" id='customer_name' type="text" class="form-control"
                            placeholder="Nguyen Van A">
                    </div>

                    <label class="col-sm-2 col-form-label">SĐT</label>
                    <div class="col-sm-4">
                        <input name="customer_phone" id='customer_phone' type="text" class="form-control"
                            placeholder="+84123456789" autocomplete="text">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-sm-2 col-form-label">Địa chỉ</label>
                    <div class="col-sm-4">
                        <input name="customer_address" type="text" class="form-control" placeholder="">
                    </div>
                    <label class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-4">
                        <input name="customer_email" id='customer_email' type="text" class="form-control"
                            placeholder="email@example.com">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Thanh toán</button>
            </div>

            @csrf
        </form>
    </div>
</div>


@section('scripts')
<!-- Script -->
<script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
<!-- Page level custom scripts -->
<script src="{{ asset('js/demo/datatables-demo.js') }}"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

<!-- Script code  -->
<script type="text/javascript">
    // CSRF Token,  Autocomplete
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    $(document).ready(function () {

        $("#customer_phone").autocomplete({
            source: function (request, response) {
                // Fetch data
                $.ajax({
                    url: "{{route('getCustomers')}}",
                    type: 'post',
                    dataType: "json",
                    data: {
                        _token: CSRF_TOKEN,
                        search: request.term
                    },
                    success: function (data) {
                        // console.log(data);
                        response(data);
                    }
                });
            },
            select: function (event, ui) {
                // Set selection
                $('#customer_phone').val(ui.item.phone); // display the selected text
                $('#customer_name').val(ui.item.label); // save selected name to input
                $('#customer_email').val(ui.item.email); // save selected email to input
                return false;
            }
        });

    });

    function cartUpdate(event) {
        event.preventDefault();
        let urlUpdateCart = $('.update_cart_url').data('url');
        let id = $(this).data('id');
        let quatity = $(this).parents('tr').find('input.quatity').val();
        $.ajax({
            type: "GET",
            url: urlUpdateCart,
            data: {
                id: id,
                quatity: quatity
            },
            success: function (data) {
                if (data.code === 200) {
                    $('body').html(data.cart_component);
                    alert("Updated Successfully");
                }
            }
        });
    }
    $(function () {
        $(document).on('click', '.cart_update', cartUpdate);
    });
</script>
@endsection
@endsection
