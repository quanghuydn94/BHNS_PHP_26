@extends('layouts.panel')
@section('styles')
<link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
<link rel="stylesheet" href="{{asset('css/admin/detail.css')}}">
@endsection
@section('content')

<!-- Modal Customer -->
<div class="modal fade" id="historyCustomerModal" tabindex="-1" role="dialog"
    aria-labelledby="historyCustomerModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="historyCustomerModalLabel">History Sales</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row mb-3">
                    <div class="col-sm-6">
                        <h6 class="text-muted f-w-400">Name Customer</h6>
                        <p class="m-b-10 f-w-600">{{$customer_order->order_customer_name}}</p>
                    </div>
                    <div class="col-sm-6">
                        <p class="m-b-10 f-w-600">Phone</p>
                        <h6 class="text-muted f-w-400">{{$customer_order->order_customer_phone}}</h6>
                    </div>
                    <div class="col-sm-6">
                        <p class="m-b-10 f-w-600">Address</p>
                        <h6 class="text-muted f-w-400">{{$customer_order->order_customer_address}}</h6>
                    </div>
                    <div class="col-sm-6">
                        <p class="m-b-10 f-w-600"> Email</p>
                        <h6 class="text-muted f-w-400">{{$customer_order->order_customer_email}}</h6>
                    </div>
                </div>
                <h6 class="m-b-20 p-b-5 b-b-default f-w-600">Order Number {{$customer_order->id}}</h6>
                {{-- <div class="col-sm-6">
                    <h6 class="text-muted f-w-400">Order Number</h6>
                    <p class="m-b-10 f-w-600">{{$customer_order->id}}</p>
                </div> --}}
                {{-- <hr class="  f-w-600"> --}}
                <div class="row">
                    <div class="col-sm-6">
                        <p class="m-b-10 f-w-600">Date</p>
                        <h6 class="text-muted f-w-400">{{$customer_order->created_at}}</h6>
                    </div>
                    {{-- <div class="col-sm-6">
                        <p class="m-b-10 f-w-600"> Name Product</p>
                        <h6 class="text-muted f-w-400">{{$orderDetail->product_name}}</h6>
                    </div> --}}
                    {{-- <div class="col-sm-6">
                        <p class="m-b-10 f-w-600"> Image</p>
                        <img class="text-muted f-w-400" src="{{url('img/products',$user->avatar)}}" width="100px" alt="{{$orderDetail->product_image}}">
                    </div> --}}
                    {{-- <div class="col-sm-6">
                        <p class="m-b-10 f-w-600"> Quantity</p>
                        <h6 class="text-muted f-w-400">{{$orderDetail->orderdetail_quantity}}</h6>
                    </div> --}}
                    <div class="col-sm-6">
                        <p class="m-b-10 f-w-600"> Status</p>
                        <h6 class="text-muted f-w-400">{{$customer_order->order_status}}</h6>
                    </div>
                    {{-- <div class="col-sm-6">
                        <p class="m-b-10 f-w-600"> Total price</p>
                        <h6 class="text-muted f-w-400">{{$orderDetail->orderdetail_totalprice}} vnđ</h6>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Infor Customer -->

<div class="page-content page-container" id="page-content">
    <div class="padding">
        <div class="row container d-flex justify-content-center">
            <div class="col-xl-6 col-md-12">
                <div class="card user-card-full">
                    <div class="row m-l-0 m-r-0">
                        <div class="col-sm-4 bg-c-lite-green user-profile">
                            <div class="card-block text-center text-white">
                                <div class="m-b-25"> <img src="{{url('img/users/client.jpg')}}" width="100px"
                                        class="img-radius" alt="User-Profile-Image"> </div>
                                <h6 class="f-w-600">{{$customer->customer_name}}</h6>
                                <p>{{$user->rolename}}</p> <i
                                    class=" mdi mdi-square-edit-outline feather icon-edit m-t-10 f-16"></i>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="card-block">
                                <h6 class="m-b-20 p-b-5 b-b-default f-w-600">Information</h6>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">Email</p>
                                        <h6 class="text-muted f-w-400">{{$user->email}}</h6>
                                    </div>
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">Phone</p>
                                        <h6 class="text-muted f-w-400">{{$customer->customer_phone}}</h6>
                                    </div>
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">Address</p>
                                        <h6 class="text-muted f-w-400">{{$customer->customer_address}}</h6>
                                    </div>

                                </div>
                                <h6 class="m-b-20 m-t-40 p-b-5 b-b-default f-w-600">User Account</h6>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">Email</p>
                                        <h6 class="text-muted f-w-400">{{$user->email}}</h6>
                                    </div>
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">Role Name</p>
                                        <h6 class="text-muted f-w-400">{{$user->rolename}}</h6>
                                    </div>
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">Date Join</p>
                                        <h6 class="text-muted f-w-400">{{$user->created_at}}</h6>
                                    </div>
                                    <div class="col-sm-6">
                                        <a href="" class="badge badge-primary" data-toggle="modal"
                                            data-target="#historyCustomerModal">Buyer History </a>
                                    </div>
                                </div>
                                <div class="p-2 text-right">
                                    <a href="{{ route('customers.index') }}" class="badge badge-primary"> Back </a>
                                </div>
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
<!-- Page level plugins -->
{{-- <script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

<!-- Page level custom scripts -->
<script src="{{ asset('js/demo/datatables-demo.js') }}"></script>
@endsection --}}
