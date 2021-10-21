@extends('layouts.panel')
@section('styles')
<link href="{{ asset('css/admin/detailProduct.css') }}" rel="stylesheet">
@endsection
@section('content')
<div class="card-header py-3">
    <p class="m-0 font-weight-bold text-primary">
        <a href="{{route('warehouses.index')}}" class="border border-primary rounded  ">
            Back</a>
        <span> <i class="fas fa-chevron-right"></i>Update Information Consignment</span>
    </p>
</div>
<div class="container bg-primary">
    <div class="row">
        <div class="card-title border bg-white col-md-4 text-center mt-2 ">

            <span>Name: {{$order->customer_name}}</span><br>
            <span>Phone: {{$order->customer_phone}}</span><br>
            <span>Email: {{$order->customer_email}}</span><br>
            <span>Address: {{$order->customer_address}}</span>
        </div>
    </div>
    <div class="row">
        <div class="card col-sm-12 mb-2">
            <div class="card-title">
                <span class="des">Orders Table</span>
            </div>
            <table class="table table-hover  table-bordered">
                <thead class="bg-primary text-white">
                    <tr>
                        <th width="10%">Id</th>
                        <th width="30%">Product Name</th>
                        <th width="10%">Quantity</th>
                        <th width="30%">Price (VND)</th>
                        <th width="30%">Date </th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $total = 0;
                    @endphp
                    @foreach ($dataOrders as $item )
                    @php
                    // dd($item);
                    $total += $item->order_detail_price ;
                    @endphp
                    <tr>

                        <td width="10%">{{$item->id}}</td>
                        <td width="10%">{{$item->product_name}}</td>
                        <td width="10%">{{$item->order_detail_quantity}}</td>
                        <td width="30%">{{number_format($item->order_detail_price)}}</td>
                        <td width="10%">{{$item->created_at}}</td>


                    </tr>
                    @endforeach

                </tbody>

            </table>
            <h2 name="total_price">Total: {{number_format($total)}} VNĐ</h2>
        </div>
    </div>
    {{-- <table>
        <tr>
            <th>ProductName</th>
            <th>Product Symbol</th>
            <th>Product Image</th>
            <th>Product Price</th>
        </tr>
        @foreach ($itemDetails as $key )

        <tr>
            <td>{{$key['item']}}</td>
    }
    </tr>
    @endforeach
    </table> --}}
</div>
@endsection
