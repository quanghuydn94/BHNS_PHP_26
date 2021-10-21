@extends('layouts.panel')
@section('content')
@if ($errors->any())
<div class="alert alert-warning">
    @foreach ($errors->all() as $error)
    {{ $error }}<br />
    @endforeach
</div>
@endif
<form method="POST" action="{{ route('order.update',$order->id) }}">
    <div class="mb-3 row text-center">
        <label class="col-sm-1 col-form-label">Name</label>
        <div class="col-sm-4">
            <input name="order_customer_name" type="text" class="form-control"  value="{{$order->order_customer_name}}">
        </div>
        <label class="col-sm-1 col-form-label">Phone</label>
        <div class="col-sm-4">
            <input name="order_customer_phone" type="text" class="form-control" value="{{$order->order_customer_phone}}">
        </div>
    </div>
    <div class="mb-3 row text-center">
        <label class="col-sm-1 col-form-label">Address</label>
        <div class="col-sm-4">
            <input name="order_customer_address" type="text" class="form-control"  value="{{$order->order_customer_address}}">
        </div>
        <label class="col-sm-1 col-form-label">Email</label>
        <div class="col-sm-4">
            <input name="order_customer_email" type="text" class="form-control"  value="{{$order->order_customer_email}}">
        </div>
    </div>
    <div class="mb-3 row text-center">
        <label class="col-sm-1 col-form-label">Note</label>
        <div class="col-sm-4">
            <textarea name="order_note" type="text" class="form-control"  value="{{$order->order_note}}">{{$order->order_note}}</textarea>
        </div>
        <label class="col-sm-1 col-form-label">Status</label>
        <div class="col-sm-4">
            <input name="order_status" type="text" class="form-control"  value="{{$order->order_status}}">
        </div>
    </div>
    <div class="mb-3 row text-center">
        <label class="col-sm-1 col-form-label">Product Orders</label>
        <div class="col-sm-9">
            <table class="table table-hover table-bordered">
                <thead class="bg-primary text-white">
                    <tr>
                        <th>Product Name</th>
                        <th>Product Symbol</th>
                        <th>Product Quantity</th>
                        <th>Product Price</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dataOrders as $item )
                    <tr>
                        <td><input type="text" name="product_name" value="{{$item->product_name}}"></td>
                        <td><input type="text" name="product_symbol" value="{{$item->product_symbol}}"></td>
                        <td><input type="text" name="order_detail_quantity" value="{{$item->order_detail_quantity}}"></td>
                        <td><input type="text" name="order_detail_price" value="{{$item->order_detail_price}}"></td>
                    </tr>

                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    @csrf
    <button class="btn btn-primary">Submit</button>
</form>
@endsection
