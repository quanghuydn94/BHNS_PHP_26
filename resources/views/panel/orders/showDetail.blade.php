@extends('layouts.panel')
@section('content')
<table>

    <tr><td>{{$order->order_customer_name}}</td></tr>
    <tr><td>{{$order->order_customer_phone}}</td></tr>
    <tr><td>{{$order->order_customer_email}}</td></tr>
    <tr><td>{{$order->order_customer_address}}</td></tr>
    {{-- <tr><td>{{$orderDetail->}}</td></tr>
    <tr><td>{{$orderDetail->}}</td></tr>
    <tr><td>{{$orderDetail->}}</td></tr>
    <tr><td>{{$orderDetail->}}</td></tr>
    <tr><td>{{$orderDetail->}}</td></tr>
    <tr><td>{{$orderDetail->}}</td></tr>
    <tr><td>{{$orderDetail->}}</td></tr> --}}
</table>
@endsection
