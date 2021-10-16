@extends('layouts.panel')
@section('styles')
<link href="{{ asset('css/admin/detailProduct.css') }}" rel="stylesheet">
@endsection
@section('content')
<!-- DataTales Example -->
<div class="card shadow mb-4  bg-primary">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Details GroupGoods > <span>Detail Suppliers</span></h6>
    </div>

    <div class="text-right mr-2">
        <a href="{{route('suppliers.index')}}" class="badge badge-warning">Back</a>
    </div>

    <div class='container-fluid'>
        <div class="card mx-auto col-md-3 col-12 mt-5 pt-4">
            <div class="card-body text-center mx-auto">
                <div class="card-title">
                    <span class="des">Description</span>
                </div>
                <p class="card-text">{{ $supplier->supplier_name }}</p>
                <p class="card-text">{{ $supplier->supplier_address }}</p>
                <p class="card-text">Price: {{ $supplier->supplier_phone }}</p>

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
