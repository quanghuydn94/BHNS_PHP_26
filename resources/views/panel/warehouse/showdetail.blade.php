@extends('layouts.panel')
@section('styles')
<link href="{{ asset('css/admin/detailProduct.css') }}" rel="stylesheet">
@endsection
@section('content')
<!-- DataTales Example -->
<div class="card shadow mb-4  bg-primary">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Details Consignment </h6>
    </div>

    <div class="text-right mr-2">
        <a href="{{route('warehouses.index')}}" class="badge badge-warning">Back</a>
    </div>

    <div class='container-fluid'>
        <div class="row ">
            <div class="  bg-white  col-lg-12 mt-5 pt-4">
                <div class="card-title">
                    <span class="des">Description</span>
                </div>
                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Symbol</th>
                                <th>Name</th>
                                <th>Expiry</th>
                                <th>Purchase Price (VND/Kg)</th>
                                <th>Sale Price (VND/Kg)</th>
                                <th>Quantity (Kg)</th>
                                <th>Saled (Kg)</th>
                                <th>Return (Kg)</th>
                                <th>Currently(Kg)</th>
                                <th>Product</th>
                                <th>Supplier</th>
                                <th>Date at</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{$data->id}}</td>
                                <td>{{$data->consignment_symbol}}</td>
                                <td>{{$data->consignment_name}}</td>
                                <td>{{$data->consignment_expiry}}</td>
                                <td>{{$data->consignment_purchase_price}}</td>
                                <td>{{$data->consignment_sale_price}}</td>
                                <td>{{$data->consignment_quantity}}</td>
                                <td>{{$data->consignment_saled}}</td>
                                <td>{{$data->consignment_return}}</td>
                                <td>{{$data->consignment_currently}}</td>
                                <td>{{$data->product_id }}</td>
                                <td>{{$data->supplier_id }}</td>
                                <td>{{$data->created_at}}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @endsection
    {{-- @section('scripts')
<!-- Page level plugins -->
<script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('js/demo/datatables-demo.js') }}"></script>
    @endsection --}}
